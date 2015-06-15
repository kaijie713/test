<?php
class PermissionAccessLog extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_permission_access_log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, status, createby, updateby', 'length', 'max'=>36),
			array('content', 'length', 'max'=>2000),
			array('attachment', 'length', 'max'=>540),
			array('createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, attachment, status, createby, createdate, updatedate, updateby', 'safe', 'on'=>'search'),
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
			'id' => 'Pst',
			'content' => 'Content',
			'attachment' => 'Attachment',
			'status' => 'status',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updatedate' => 'Updatedate',
			'updateby' => 'Updateby',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('attachment',$this->attachment,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		$criteria->compare('updateby',$this->updateby,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PermissionAccessLog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findPermissionAccessLogByEvaId($evaId)
	{
		$sql = "select l.*,u.name as uname,d.dvalue as ddvalue from t_permission_access_log l left join sys_dict d on  l.status = d.dict_id left join user u on l.createby = u.u_id where eva_id = '$evaId' order by l.createdate asc";
		return $this->QueryAll($sql);
	}
}
