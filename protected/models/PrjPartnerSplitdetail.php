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


	public function createSplitdetails($fields, $pdetailId)
	{

		foreach ($fields['partner_type'] as $key => $value) {

			$arr = array();
    		$arr['partner_type']  =  $fields['partner_type'][$key];
    		$arr['partner_name']  =  $fields['partner_name'][$key];
    		$arr['divide']        =  $fields['divide'][$key];
    		$arr['divide_amount'] =  $fields['divide_amount'][$key];
    		$arr['partner_memo']  =  $fields['partner_memo'][$key];
    		$arr['partner_memo']  =  $fields['partner_memo'][$key];
    		$arr['pd_id']         =  $pdetailId;

    		if(empty($fields['sp_id'][$key])){
				$model = new PrjPartnerSplitdetail();
    			$model->isactive = 1;
    			$arr['createby']  =  Yii::app()->user->__get('u_id');
    			$arr['createdate']  =  date("Y-m-d H:i");
    			$arr['sp_id']  =  $this->getUUID();
    			$arr['isactive']  =  1;;
    		} else {
    			$model = PrjPartnerSplitdetail::model()->findByPk($fields['sp_id'][$key]);
    			$model->isNewRecord = false;
    			$arr['sp_id']  =  $fields['sp_id'][$key];
    			$arr['updateby']  =  Yii::app()->user->__get('u_id');
    			$arr['updatedate']  =  date("Y-m-d H:i");
    		}
    		
			$model->attributes = $arr;
			$model->save(false);

    	}
	}






	public function findSplitdetailByPdId($pdid)

	{
		$pdid = (int) $pdid;
		$sql = "select * from t_prj_partner_splitdetail where pd_id = $pdid";
		return $this->QueryAll($sql);
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

    public function prepareSplitdetailByPdId($pdids){

    	$arr = array(
    		"divideSum" => 0,
    		"divideAmountSum" => 0,
    		"divideSumKFS" => 0,
    		"divideSumDSF" => 0,
    		"divideAmountSumKFS" => 0,
    		"divideAmountSumDSF" => 0,
    	);

        $items = self::findSplitdetailByPdId($pdids);

        if(!empty($items)){
        	foreach ($items as $item) {
        		if($item['partner_type'] == Dict::get('partnerType','kfs')){
                    $arr['divideSumKFS'] = $item['divide']+$arr['divideSumKFS'];
                    $arr['divideAmountSumKFS'] = $item['divide_amount']+$arr['divideAmountSumKFS'];
                } else if($item['partner_type'] == Dict::get('partnerType','hzmt')){
                    $arr['divideSumDSF'] = $item['divide']+$arr['divideSumDSF'];
                    $arr['divideAmountSumDSF'] = $item['divide_amount']+$arr['divideAmountSumDSF'];
                }
        	}

        	$arr['divideSum']  =  $arr['divideSumKFS'] +  $arr['divideSumDSF'];
    		$arr['divideAmountSum']  =  $arr['divideAmountSumKFS'] +  $arr['divideAmountSumDSF'];
        }
  
        return $arr;
    }

}
