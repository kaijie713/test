<?php
class PrjPartnerSplitdetail extends BaseModel
{
	public function tableName()
	{
		return 't_prj_partner_splitdetail';
	}

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pd_id, sp_id', 'required'),
			array('divide', 'numerical', 'integerOnly'=>true),
			array('pd_id, sp_id, createby, updateby', 'length', 'max'=>36),
			array('partner_type', 'length', 'max'=>2),
			array('partner_name', 'length', 'max'=>50),
			array('divide_amount', 'length', 'max'=>12),
			array('partner_memo', 'length', 'max'=>2000),
			array('isactive', 'length', 'max'=>1),
			array('createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pd_id, sp_id, partner_type, partner_name, divide, divide_amount, partner_memo, isactive, createby, createdate, updateby, updatedate', 'safe', 'on'=>'search'),
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
			'pd_id' => 'Pd',
			'sp_id' => 'Sp',
			'partner_type' => 'Partner Type',
			'partner_name' => 'Partner Name',
			'divide' => 'Divide',
			'divide_amount' => 'Divide Amount',
			'partner_memo' => 'Partner Memo',
			'isactive' => 'Isactive',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
		);
	}


	public function createSplitdetails($fields, $pdetailId){

		foreach ($fields['partner_type'] as $key => $value) {
			$arr = array();
    		$arr['partner_type']  =  $fields['partner_type'][$key];
    		$arr['partner_name']  =  $fields['partner_name'][$key];
    		$arr['divide']  =  $fields['divide'][$key];
    		$arr['divide_amount']  =  $fields['divide_amount'][$key];
    		$arr['partner_memo']  =  $fields['partner_memo'][$key];
    		$arr['partner_memo']  =  $fields['partner_memo'][$key];
    		$arr['pd_id']  =  $pdetailId;
    		$this->createSplitdetail($arr);
    	}
	}

	public function createSplitdetail($fields){
		$model = new PrjPartnerSplitdetail();
		$model->attributes = $fields;
	
		$model->createby = Yii::app()->user->__get('u_id');
    	$model->createdate = date("Y-m-d H:i");
    	$model->sp_id = $this->getUUID();
    	$model->isactive = 1;

		$model->save(false);
	}


	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pd_id',$this->pd_id,true);
		$criteria->compare('sp_id',$this->sp_id,true);
		$criteria->compare('partner_type',$this->partner_type,true);
		$criteria->compare('partner_name',$this->partner_name,true);
		$criteria->compare('divide',$this->divide);
		$criteria->compare('divide_amount',$this->divide_amount,true);
		$criteria->compare('partner_memo',$this->partner_memo,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
