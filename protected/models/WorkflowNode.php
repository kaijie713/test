<?php
class WorkflowNode extends BaseModel
{
	public function tableName()
	{
		return 't_workflow_node';
	}

	public function rules()
	{
		return array(
			array('node_id', 'required'),
			array('overrule', 'numerical', 'integerOnly'=>true),
			array('workflow_code, node_id, previous_node_id, next_node_id, rejected_node_id, createby, updateby', 'length', 'max'=>36),
			array('node_name, node_code, attribute1, attribute2, attribute3, attribute4, attribute5', 'length', 'max'=>200),
			array('node_type', 'length', 'max'=>7),
			array('purview_type', 'length', 'max'=>50),
			array('description', 'length', 'max'=>2000),
			array('disabled', 'length', 'max'=>1),
			array('approval_type', 'length', 'max'=>2),
			array('enable_date, disable_date, createdate, updatedate', 'safe'),
			array('workflow_code, node_id, node_name, node_code, node_type, previous_node_id, next_node_id, rejected_node_id, purview_type, description, attribute1, attribute2, attribute3, attribute4, attribute5, disabled, enable_date, disable_date, createby, createdate, updateby, updatedate, approval_type, overrule', 'safe', 'on'=>'search'),
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
			'workflow_code' => 'Workflow Code',
			'node_id' => 'Node',
			'node_name' => 'Node Name',
			'node_code' => 'Node Code',
			'node_type' => 'Node Type',
			'previous_node_id' => 'Previous Node',
			'next_node_id' => 'Next Node',
			'rejected_node_id' => 'Rejected Node',
			'purview_type' => 'Purview Type',
			'description' => 'Description',
			'attribute1' => 'Attribute1',
			'attribute2' => 'Attribute2',
			'attribute3' => 'Attribute3',
			'attribute4' => 'Attribute4',
			'attribute5' => 'Attribute5',
			'disabled' => 'Disabled',
			'enable_date' => 'Enable Date',
			'disable_date' => 'Disable Date',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
			'approval_type' => 'Approval Type',
			'overrule' => 'Overrule',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('workflow_code',$this->workflow_code,true);
		$criteria->compare('node_id',$this->node_id,true);
		$criteria->compare('node_name',$this->node_name,true);
		$criteria->compare('node_code',$this->node_code,true);
		$criteria->compare('node_type',$this->node_type,true);
		$criteria->compare('previous_node_id',$this->previous_node_id,true);
		$criteria->compare('next_node_id',$this->next_node_id,true);
		$criteria->compare('rejected_node_id',$this->rejected_node_id,true);
		$criteria->compare('purview_type',$this->purview_type,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('attribute1',$this->attribute1,true);
		$criteria->compare('attribute2',$this->attribute2,true);
		$criteria->compare('attribute3',$this->attribute3,true);
		$criteria->compare('attribute4',$this->attribute4,true);
		$criteria->compare('attribute5',$this->attribute5,true);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('enable_date',$this->enable_date,true);
		$criteria->compare('disable_date',$this->disable_date,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		$criteria->compare('approval_type',$this->approval_type,true);
		$criteria->compare('overrule',$this->overrule);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function findFlowNodesByCode($code)
	{
		if(empty($code)){
			return array();
		}

		$sql = "select * from t_workflow_node where workflow_code = '".$code."' and isactive = 0  ";
		return $this->QueryAll($sql);
	}


	public function getFlowNodeByCodeAndType($code, $type)
	{
		if(empty($code) || empty($type)){
			return array();
		}

		$sql = "select * from t_workflow_node where workflow_code = '".$code."' and node_type = '".$type."'  and isactive = 0  limit 1";
		return $this->QueryRow($sql);
	}

	public function getFlowNodeById($id)
	{
		if(empty($id)){
			return array();
		}
		
		$sql = "select * from t_workflow_node where node_id = '".$id."' and  and isactive = 0  limit 1";
		return $this->QueryRow($sql);
	}

	public function getFlowNodeByCodeAndPreviousNodeId($code, $nodeId)
	{
		if(empty($code) || empty($nodeId)){
			return array();
		}

		$sql = "select * from t_workflow_node where workflow_code = '".$code."' and previous_node_id = '".$nodeId."' and isactive = 0 limit 1";
		return $this->QueryRow($sql);
	}
}
