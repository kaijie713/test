<?php

class User extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('u_id, name, employee_number, email, roles, createby, createdate, updateby, updatedate', 'required'),
			array('u_id, name, employee_number, createby, updateby', 'length', 'max'=>36),
			array('email', 'length', 'max'=>65),
			array('roles', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('u_id, name, employee_number, email, roles, createby, createdate, updateby, updatedate', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'u_id' => 'U',
			'name' => 'Name',
			'employee_number' => 'Employee Number',
			'email' => 'Email',
			'roles' => 'Roles',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('u_id',$this->u_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('employee_number',$this->employee_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('roles',$this->roles,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function searchUsers($condition,$pageIndex,$pageSize,$sort = 'createDate')
    {
    	switch ($sort) {
			case 'createDate':
				$sort = array('createdate','DESC');
				break;
			default:
				$sort = array('createdate','asc');
				break;
		}

        $select = ' * ';
        $sql = User::searchUsersSql($select,$condition);

        $count = $this->RowCount(User::searchUsersSql('count(*)',$condition));
        $start = ($pageIndex - 1)*$pageSize;
        $sql .= " ORDER BY $sort[0] $sort[1] LIMIT $start,$pageSize";
        
        return array('items'=>$this->QueryAll($sql),'count'=>$count);
    }

    public function searchUsersSql($select,$condition)
    {
        $sql = "SELECT {$select} FROM user WHERE 1";

        if (!empty($condition)) 
    	{
    		if(!empty($condition['multiple'])){
    			$sql .= " and CONCAT(name,employee_number,email) like '%".$condition['multiple']."%' ";
    		}
    	};

    	$sql .= " and isactive = 0 ";

        return $sql;
    }

}
