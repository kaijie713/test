<?php

class THousesPrj extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_houses_prj';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id', 'required'),
			array('group_id, city_id, area_id, createby, updateby', 'length', 'max'=>36),
			array('group_name, prj_licence', 'length', 'max'=>100),
			array('isactive', 'length', 'max'=>1),
			array('open_date, createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_id, group_name, open_date, city_id, area_id, prj_licence, isactive, createby, createdate, updateby, updatedate', 'safe', 'on'=>'search'),
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
			'group_id' => 'Group',
			'group_name' => 'Group Name',
			'open_date' => 'Open Date',
			'city_id' => 'City',
			'area_id' => 'Area',
			'prj_licence' => 'Prj Licence',
			'isactive' => 'Isactive',
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

		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('group_name',$this->group_name,true);
		$criteria->compare('open_date',$this->open_date,true);
		$criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('area_id',$this->area_id,true);
		$criteria->compare('prj_licence',$this->prj_licence,true);
		$criteria->compare('isactive',$this->isactive,true);
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
	 * @return THousesPrj the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function searchTHousesPrjs($condition,$pageIndex,$pageSize,$sort = 'createDate')
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
        $sql = $this->searchTHousesPrjsSql($select,$condition);

        $count = $this->RowCount($this->searchTHousesPrjsSql('count(*)',$condition));
        $start = ($pageIndex - 1)*$pageSize;
        $sql .= " ORDER BY $sort[0] $sort[1] LIMIT $start,$pageSize";

        return array('items'=>$this->QueryAll($sql),'count'=>$count);
    }

    public function searchTHousesPrjsSql($select,$condition)
    {
        $sql = "SELECT {$select}
        FROM t_houses_prj ";

        if (!empty($condition)) 
    	{
    		$sql .= " WHERE 1";
    		if(!empty($condition['group_name']))
    			$sql .= " and group_name = '".$condition['group_name']."' ";
    	};

        return $sql;
    }


}
