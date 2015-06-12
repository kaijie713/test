<?php
class Transaction extends BaseModel
{

	public function tableName()
	{
		return 't_transaction';
	}

	public function rules()
	{
		return array(
			array('transaction_id', 'required'),
			array('currently', 'numerical', 'integerOnly'=>true),
			array('transaction_id, node_id, bill_id, approver_id, file_id, createby, updateby', 'length', 'max'=>36),
			array('bill_type, attribute2, attribute3, attribute4, attribute5, attribute1', 'length', 'max'=>200),
			array('content', 'length', 'max'=>2000),
			array('estate', 'length', 'max'=>10),
			array('isactive', 'length', 'max'=>1),
			array('approval_type', 'length', 'max'=>50),
			array('approval_date, createdate, updatedate', 'safe'),
			array('transaction_id, node_id, bill_type, bill_id, approver_id, approval_date, content, estate, isactive, approval_type, currently, file_id, createby, createdate, updateby, updatedate, attribute2, attribute3, attribute4, attribute5, attribute1', 'safe', 'on'=>'search'),
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
			'transaction_id' => 'Transaction',
			'node_id' => 'Node',
			'bill_type' => 'Bill Type',
			'bill_id' => 'Bill',
			'approver_id' => 'Approver',
			'approval_date' => 'Approval Date',
			'content' => 'Content',
			'estate' => 'Estate',
			'isactive' => 'Isactive',
			'approval_type' => 'Approval Type',
			'currently' => 'Currently',
			'file_id' => 'File',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
			'attribute2' => 'Attribute2',
			'attribute3' => 'Attribute3',
			'attribute4' => 'Attribute4',
			'attribute5' => 'Attribute5',
			'attribute1' => 'Attribute1',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('node_id',$this->node_id,true);
		$criteria->compare('bill_type',$this->bill_type,true);
		$criteria->compare('bill_id',$this->bill_id,true);
		$criteria->compare('approver_id',$this->approver_id,true);
		$criteria->compare('approval_date',$this->approval_date,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('estate',$this->estate,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('approval_type',$this->approval_type,true);
		$criteria->compare('currently',$this->currently);
		$criteria->compare('file_id',$this->file_id,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		$criteria->compare('attribute2',$this->attribute2,true);
		$criteria->compare('attribute3',$this->attribute3,true);
		$criteria->compare('attribute4',$this->attribute4,true);
		$criteria->compare('attribute5',$this->attribute5,true);
		$criteria->compare('attribute1',$this->attribute1,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function clearTransactionByBillAndCode($billId, $billType, $code)
	{
		$params['isactive'] = 1;
		$condition['bill_id'] = $billId;
		$condition['bill_type'] = $billType;
		$condition['workflow_code'] = $code;
		return $this->ModelEdit($this->tableName(),$condition,$params);
	}

	public function getTransactionCurrentByBillAndCode($billId, $billType, $code)
	{
		$billId = (int) $billId;

		$sql = "select * from t_transaction where bill_id = '".$billId."'  and bill_type = '".$billType."'  and workflow_code = '".$code."'  and currently = 1 and isactive = 0  order by seq desc limit 1";

		// echo $sql;
		return $this->QueryRow($sql);
	}

	public function getTransactionNextByBillAndCode($billId, $billType, $code)
	{
		$billId = (int) $billId;

		$sql = "select * from t_transaction where bill_id = '".$billId."'  and bill_type = '".$billType."'  and workflow_code = '".$code."'  and currently = 0 and isactive = 0  order by seq asc limit 1";
		return $this->QueryRow($sql);
	}

	public function findTransactionByBillAndCode($billId, $billType, $code)
	{
		$billId = (int) $billId;

		$sql = "select * from t_transaction where bill_id = '".$billId."'  and bill_type = '".$billType."'  and workflow_code = '".$code."' and isactive = 0  order by seq asc";
		return $this->QueryAll($sql);
	}

	public function getLastTransactionByBillAndCode($billId, $billType, $code)
	{
		$billId = (int) $billId;

		$sql = "select * from t_transaction where bill_id = '".$billId."'  and bill_type = '".$billType."'  and workflow_code = '".$code."' and isactive = 0  order by seq desc limit 1";
		return $this->QueryRow($sql);
	}

	public function findTransactionByBillAndCodeAndApproverId($billId, $billType, $code, $approverId)
	{
		$billId = (int) $billId;
		$approverId = (int) $approverId;

		$sql = "select * from t_transaction where bill_id = '".$billId."'  and bill_type = '".$billType."'  and workflow_code = '".$code."' and approver_id = '".$approverId."' and isactive = 0  order by seq asc";
		return $this->QueryAll($sql);
	}

	public function findTransactionByBillAndCodeAndCurrently($billId, $billType, $code, $currently)
	{
		$billId = (int) $billId;
		$currently = (int) $currently;

		$sql = "select * from t_transaction where bill_id = '".$billId."'  and bill_type = '".$billType."'  and workflow_code = '".$code."' and currently = '".$currently."' and isactive = 0  order by seq asc";
		// echo $sql;
		return $this->QueryAll($sql);
	}

	public function getTransactionByBillAndCodeAndNodeIdAndCurrently($billId, $billType, $code, $nodeId, $currently)
	{
		$billId = (int) $billId;
		$nodeId = (int) $nodeId;

		$sql = "select * from t_transaction where bill_id = '".$billId."'  and node_id = '".$nodeId."'  and bill_type = '".$billType."'  and workflow_code = '".$code."' and currently = '".$currently."' and isactive = 0  order by seq asc limit 1";
		return $this->QueryRow($sql);
	}



	public function setTransactionNextByBillAndCode($billId, $billType, $code)
	{
		$transaction = $this->getTransactionNextByBillAndCode($billId, $billType, $code);
		if(empty($transaction)){
			return array();
		}

		$params['currently'] = 1;
		$condition['transaction_id'] = $transaction['transaction_id'];
		return $this->ModelEdit($this->tableName(),$condition,$params);
	}

	public function updateUserIdById($id, $userId)
	{
		$sql = "update t_transaction set approver_id  = '".$userId."' where transaction_id = '".$id."' ";
		return $this->Execute($sql);
	}

	public function deleteTransactionByIds($ids)
	{
		if(empty($ids)){
			return array();
		}
		$ids = implode(",", $ids);
		$sql = "update t_transaction set isactive  = 1 where transaction_id in (".$ids.") ";

		return $this->Execute($sql);
	}

	public function findTransactionByBillAndCodeAndDelete($billId, $billType, $code)
	{
		$billId = (int) $billId;

		$sql = "select * from t_transaction where bill_id = '".$billId."'  and bill_type = '".$billType."'  and workflow_code = '".$code."' and isactive = 1  order by seq desc limit 1";
		return $this->QueryRow($sql);
	}
}
