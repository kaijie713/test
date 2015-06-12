<?php

class File extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_file';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uri', 'required'),
			array('groupId, size', 'length', 'max'=>10),
			array('uri, mime', 'length', 'max'=>255),
			array('user_id, createdate', 'length', 'max'=>36),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, groupId, user_id, uri, mime, size, status, createdate', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'groupId' => 'Group',
			'user_id' => 'User',
			'uri' => 'Uri',
			'mime' => 'Mime',
			'size' => 'Size',
			'status' => 'Status',
			'createdate' => 'Created Time',
		);
	}

	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('groupId',$this->groupId,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('uri',$this->uri,true);
		$criteria->compare('mime',$this->mime,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('createdate',$this->createdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findFilesByIds($ids)
	{
		if(empty($ids)){
			return array();
		}
		$ids = implode(",", $ids);
		$sql = "select * from t_file where id in ($ids)";
		return $this->QueryAll($sql);
	}


}
