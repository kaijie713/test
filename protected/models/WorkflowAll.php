<?php
class WorkflowAll extends BaseModel
{
	public function tableName()
	{
		return 't_workflow_all';
	}

	public function rules()
	{
		return array(
			array('workflow_id', 'required'),
			array('workflow_id, createby, updateby', 'length', 'max'=>36),
			array('workflow_name, workflow_code, attribute1, attribute2, attribute3, attribute4, attribute5', 'length', 'max'=>200),
			array('description', 'length', 'max'=>400),
			array('disabled', 'length', 'max'=>1),
			array('disable_date, enable_date, createdate, updatedate', 'safe'),
			array('workflow_id, workflow_name, workflow_code, description, disabled, disable_date, enable_date, createby, createdate, updateby, updatedate, attribute1, attribute2, attribute3, attribute4, attribute5', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'workflow_id' => 'Workflow',
			'workflow_name' => 'Workflow Name',
			'workflow_code' => 'Workflow Code',
			'description' => 'Description',
			'disabled' => 'Disabled',
			'disable_date' => 'Disable Date',
			'enable_date' => 'Enable Date',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
			'attribute1' => 'Attribute1',
			'attribute2' => 'Attribute2',
			'attribute3' => 'Attribute3',
			'attribute4' => 'Attribute4',
			'attribute5' => 'Attribute5',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('workflow_id',$this->workflow_id,true);
		$criteria->compare('workflow_name',$this->workflow_name,true);
		$criteria->compare('workflow_code',$this->workflow_code,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('disable_date',$this->disable_date,true);
		$criteria->compare('enable_date',$this->enable_date,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		$criteria->compare('attribute1',$this->attribute1,true);
		$criteria->compare('attribute2',$this->attribute2,true);
		$criteria->compare('attribute3',$this->attribute3,true);
		$criteria->compare('attribute4',$this->attribute4,true);
		$criteria->compare('attribute5',$this->attribute5,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
