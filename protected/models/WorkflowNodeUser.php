<?php
class WorkflowNodeUser extends BaseModel
{
	public function tableName()
	{
		return 't_workflow_node_user';
	}

	public function rules()
	{
		return array(
			array('no_uid', 'required'),
			array('no_uid, wordflow_code, node_id, citi_id, user_id, createby, updateby', 'length', 'max'=>36),
			array('attribute1, attribute2, attribute3, attribute4, attribute5', 'length', 'max'=>200),
			array('enable_date, disable_date, createdate, updatedate', 'safe'),
			array('no_uid, wordflow_code, node_id, citi_id, user_id, enable_date, disable_date, createby, createdate, updateby, updatedate, attribute1, attribute2, attribute3, attribute4, attribute5', 'safe', 'on'=>'search'),
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
			'no_uid' => 'No Uid',
			'wordflow_code' => 'Wordflow Code',
			'node_id' => 'Node',
			'citi_id' => 'Citi',
			'user_id' => 'User',
			'enable_date' => 'Enable Date',
			'disable_date' => 'Disable Date',
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

		$criteria->compare('no_uid',$this->no_uid,true);
		$criteria->compare('wordflow_code',$this->wordflow_code,true);
		$criteria->compare('node_id',$this->node_id,true);
		$criteria->compare('citi_id',$this->citi_id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('enable_date',$this->enable_date,true);
		$criteria->compare('disable_date',$this->disable_date,true);
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

	public function findFlowNodeUsersByNodeId($nodeId)
	{
		$sql = "select * from t_workflow_node_user where node_id = '".$nodeId."'  and isactive = 0  ";
		return $this->QueryAll($sql);
	}
}
