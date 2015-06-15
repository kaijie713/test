<?php
class Pdetail extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public $divideSum = 0;
	public $divideAmountSum = 0;
	public $divideSumDSF = 0;
	public $divideSumKFS = 0;
	public $divideAmountSumDSF = 0;
	public $divideAmountSumKFS = 0;

	public function tableName()
	{
		return 't_pdetail';
	}

	public function rules()
	{
		return array(
			array('pd_id' , 'required'),
			array('sell_house_num, pre_volumn, prevolumn_perunit, prebrokervolumn, jd_retain_ratio, commission_rate', 'numerical', 'integerOnly'=>true),
			array('group_id, eva_id, pd_id, createby, updateby', 'length', 'max'=>36),
			array('source_type, charge_type', 'length', 'max'=>36),
			array('pre_incoming, jd_retain_amount, commission_perunit', 'length', 'max'=>16),
			array('ajcard_price, prjreword_perunit, brokerfees_perunit, pre_amount', 'length', 'max'=>13),
			array('pref_context', 'length', 'max'=>2000),
			array('pre_commission_amount', 'length', 'max'=>18),
			array('isactive', 'length', 'max'=>1),
			array('attribute1, attribute2, attribute3', 'length', 'max'=>100),
			array('group_id, eva_id, pd_id, bdate, edate, sell_house_num, source_type, pre_incoming, charge_type, ajcard_price, pre_volumn, prjreword_perunit, prevolumn_perunit, brokerfees_perunit, prebrokervolumn, pref_context, jd_retain_ratio, jd_retain_amount, pre_amount, commission_rate, commission_perunit, pre_commission_amount, isactive, createby, createdate, updateby, updatedate, attribute1, attribute2, attribute3', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_id, eva_id, pd_id, bdate, edate, sell_house_num, source_type, pre_incoming, charge_type, ajcard_price, pre_volumn, prjreword_perunit, prevolumn_perunit, brokerfees_perunit, prebrokervolumn, pref_context, jd_retain_ratio, jd_retain_amount, pre_amount, commission_rate, commission_perunit, pre_commission_amount, isactive, createby, createdate, updateby, updatedate, attribute1, attribute2, attribute3', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
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
			'eva_id' => 'Eva',
			'pd_id' => 'Pd',
			'bdate' => 'Bdate',
			'edate' => 'Edate',
			'sell_house_num' => 'Sell House Num',
			'source_type' => 'Source Type',
			'pre_incoming' => 'Pre Incoming',
			'charge_type' => 'Charge Type',
			'ajcard_price' => 'Ajcard Price',
			'pre_volumn' => 'Pre Volumn',
			'prjreword_perunit' => 'Prjreword Perunit',
			'prevolumn_perunit' => 'Prevolumn Perunit',
			'brokerfees_perunit' => 'Brokerfees Perunit',
			'prebrokervolumn' => 'Prebrokervolumn',
			'pref_context' => 'Pref Context',
			'jd_retain_ratio' => 'Jd Retain Ratio',
			'jd_retain_amount' => 'Jd Retain Amount',
			'pre_amount' => 'Pre Amount',
			'commission_rate' => 'Commission Rate',
			'commission_perunit' => 'Commission Perunit',
			'pre_commission_amount' => 'Pre Commission Amount',
			'isactive' => 'Isactive',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
			'attribute1' => 'Attribute1',
			'attribute2' => 'Attribute2',
			'attribute3' => 'Attribute3',
		);
	}

	public function searchPdetails($condition,$pageIndex,$pageSize,$sort = 'createDate')
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
        $sql = Pdetail::searchPdetailSql($select,$condition);

        $count = $this->RowCount(Pdetail::searchPdetailSql('count(*)',$condition));
        $start = ($pageIndex - 1)*$pageSize;
        $sql .= " ORDER BY $sort[0] $sort[1] LIMIT $start,$pageSize";

        return array('items'=>$this->QueryAll($sql),'count'=>$count);
    }

    public function searchPdetailSql($select,$condition)
    {
        $sql = "SELECT {$select}
        FROM t_pdetail WHERE 1";

        if (!empty($condition)) 
    	{
    		if(!empty($condition['id']))
    			$sql .= " and pd_id = '".$condition['id']."' ";

    		if(!empty($condition['evaId']))
    			$sql .= " and eva_id = '".$condition['evaId']."' ";

    		if(!empty($condition['ids']))
    			$sql .= " and pd_id in ( ".join (',', $condition['ids']).")";

    	};
    	$sql .= " and isactive = 0 ";

        return $sql;
    }

    public function createPdtail($con, $splitdetail){

    	if(empty($con['pd_id']))
    	{
    		$model=new Pdetail;
    		$model->createby   = Yii::app()->user->__get('u_id');
	    	$model->createdate = date("Y-m-d H:i");
	    	$model->pd_id      = $this->getUUID();
	    	$model->isactive   = 1;
    	} else {
    		$model = Pdetail::model()->findByPk($con['pd_id']);
    		$model->isNewRecord = false;
    		$model->updateby    = Yii::app()->user->__get('u_id');
    		$model->updatedate  = date("Y-m-d H:i");
    	}

    	if(!empty($splitdetail)){
    		$Splitdetail = new PrjPartnerSplitdetail();
			$Splitdetail->createSplitdetails($splitdetail, $model->pd_id);
    	}

		$model->attributes=$con;

		$this->requiredChargeType($con['charge_type']);

    	$this->filterPdetail($model, $con);

    	$this->preparePdetail($model);

    	$result = $model->save(false);

    	if(!$result)
    	{
            throw new Exception('error');
    	}


    	return $model;
    }

    public function preparePdetail($model){

    	$model->pre_incoming = $model->ajcard_price * $model->pre_volumn + $model->commission_perunit * $model->pre_volumn;

    	$this->prepareSplitdetail($model, $model->pd_id);

    	$this->getJDRetain($model);

    	if($model->jd_retain_ratio != 0)
    	{
            $model->pre_incoming = $model->pre_incoming * $model->jd_retain_ratio / 100;
        }else{

            $model->pre_incoming = $model->pre_incoming - $model->divideAmountSum;
        }

        $model->pre_incoming = $model->pre_incoming - $model->prjreword_perunit * $model->prevolumn_perunit - $model->brokerfees_perunit * $model->prebrokervolumn;

        $model->pre_incoming = number_format($model->pre_incoming, 4, '.', '');

		return $model;
    }

    public function prepareSplitdetail($model, $pdid){

    	$result = PrjPartnerSplitdetail::model()->prepareSplitdetailByPdId($pdid);

        $model->divideSum =  $result['divideSum'];
        $model->divideAmountSum =  $result['divideAmountSum'];
        $model->divideSumKFS =  $result['divideSumKFS'];
        $model->divideSumDSF =  $result['divideSumDSF'];
        $model->divideAmountSumKFS =  $result['divideAmountSumKFS'];
        $model->divideAmountSumDSF =  $result['divideAmountSumDSF'];
    }


    public function getJDRetain($model){
    	$model->jd_retain_ratio = 100 - $model->divideSum;
    	$model->jd_retain_amount = $model->pre_incoming;
    	return $model;
    }

   
    public function filterPdetail($model, $con){
    	
    	$model->sell_house_num = !empty($con['sell_house_num']) && $con['sell_house_num'] != "" ? number_format($con['sell_house_num'], 0, '.', '') : 0 ; 
    	$model->ajcard_price = !empty($con['ajcard_price']) && $con['ajcard_price'] != "" ? number_format($con['ajcard_price'], 4, '.', '') : 0 ; 
    	$model->pre_volumn = !empty($con['pre_volumn']) && $con['pre_volumn'] != "" ? number_format($con['pre_volumn'], 0, '.', '') : 0 ; 
    	$model->prjreword_perunit = !empty($con['prjreword_perunit']) && $con['prjreword_perunit'] != "" ? number_format($con['prjreword_perunit'], 4, '.', '') : 0 ; 
    	$model->prevolumn_perunit = !empty($con['prevolumn_perunit']) && $con['prevolumn_perunit'] != "" ? number_format($con['prevolumn_perunit'], 0, '.', '') : 0 ; 
    	$model->brokerfees_perunit = !empty($con['brokerfees_perunit']) && $con['brokerfees_perunit'] != "" ? number_format($con['brokerfees_perunit'], 4, '.', '') : 0 ; 
    	$model->prebrokervolumn = !empty($con['prebrokervolumn']) && $con['prebrokervolumn'] != "" ? number_format($con['prebrokervolumn'], 0, '.', '') : 0 ; 
    	$model->pre_amount = !empty($con['pre_amount']) && $con['pre_amount'] != "" ? number_format($con['pre_amount'], 4, '.', '') : 0 ; 
    	$model->commission_rate = !empty($con['commission_rate']) && $con['commission_rate'] != "" ? number_format($con['commission_rate'], 4, '.', '') : 0 ; 
    	$model->commission_perunit = !empty($con['commission_perunit']) && $con['commission_perunit'] != "" ? number_format($con['commission_perunit'], 4, '.', '') : 0 ; 
    	$model->commission_perunit = !empty($con['commission_perunit']) && $con['commission_perunit'] != "" ? number_format($con['commission_perunit'], 4, '.', '') : 0 ; 
    	$model->pre_commission_amount = !empty($con['pre_commission_amount']) && $con['pre_commission_amount'] != "" ? number_format($con['pre_commission_amount'], 4, '.', '') : 0 ; 
    	$model->jd_retain_ratio = !empty($con['jd_retain_ratio']) && $con['jd_retain_ratio'] != "" ? number_format($con['jd_retain_ratio'], 4, '.', '') : 0 ; 
    	$model->jd_retain_amount = !empty($con['jd_retain_amount']) && $con['jd_retain_amount'] != "" ? number_format($con['jd_retain_amount'], 4, '.', '') : 0 ; 
    }


	public function requiredChargeType($id)
    {
        $chargeType = SysDict::model()->getSysDictById($id);
        if(empty($chargeType)){
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
        return $chargeType;
    }

    public function getPdetailById($pa_id)
	{
		$id = (int) $id;
		$sql = "select * from t_pdetail where pd_id = '$id' limit 1";
		return $this->QueryRow($sql);
	}

	public function findPdetailsByEvaId($evaid)
	{
		$evaid = (int) $evaid;
		$sql = "select * from t_pdetail where eva_id = '$evaid'";
		return $this->QueryAll($sql);
	}


	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('eva_id',$this->eva_id,true);
		$criteria->compare('pd_id',$this->pd_id,true);
		$criteria->compare('bdate',$this->bdate,true);
		$criteria->compare('edate',$this->edate,true);
		$criteria->compare('sell_house_num',$this->sell_house_num);
		$criteria->compare('source_type',$this->source_type,true);
		$criteria->compare('pre_incoming',$this->pre_incoming,true);
		$criteria->compare('charge_type',$this->charge_type,true);
		$criteria->compare('ajcard_price',$this->ajcard_price,true);
		$criteria->compare('pre_volumn',$this->pre_volumn);
		$criteria->compare('prjreword_perunit',$this->prjreword_perunit,true);
		$criteria->compare('prevolumn_perunit',$this->prevolumn_perunit);
		$criteria->compare('brokerfees_perunit',$this->brokerfees_perunit,true);
		$criteria->compare('prebrokervolumn',$this->prebrokervolumn);
		$criteria->compare('pref_context',$this->pref_context,true);
		$criteria->compare('jd_retain_ratio',$this->jd_retain_ratio);
		$criteria->compare('jd_retain_amount',$this->jd_retain_amount,true);
		$criteria->compare('pre_amount',$this->pre_amount,true);
		$criteria->compare('commission_rate',$this->commission_rate);
		$criteria->compare('commission_perunit',$this->commission_perunit,true);
		$criteria->compare('pre_commission_amount',$this->pre_commission_amount,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		$criteria->compare('attribute1',$this->attribute1,true);
		$criteria->compare('attribute2',$this->attribute2,true);
		$criteria->compare('attribute3',$this->attribute3,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

}
