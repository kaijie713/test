<?php
class Evaluation extends BaseModel
{
    public $arr = array();
    public $arrPdetail = array();

    public function tableName()
    {
        return 't_prj_evaluationforms';
    }

    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('group_id, eva_id', 'required'),
            array('group_id, eva_id, city_id, ec_incharge_id, sales_id, area_id, createby, updateby', 'length', 'max'=>36),
            array('eva_no', 'length', 'max'=>50),
            array('cooperetion_mode, customer_type, customer_level', 'length', 'max'=>2),
            array('prj_condition', 'length', 'max'=>2000),
            array('isactive', 'length', 'max'=>1),
            array('attribute1, attribute2, attribute3', 'length', 'max'=>100),
            array('pre_opendatetime, createdate, updatedate', 'safe'),
            array('group_id, eva_id, eva_no, city_id, ec_incharge_id, cooperetion_mode, sales_id, customer_type, customer_level, pre_opendatetime, area_id, prj_condition, isactive, createby, createdate, updateby, updatedate, attribute1, attribute2, attribute3', 'safe', 'on'=>'search'),
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
            'group_id' => 'Group',
            'eva_id' => 'Eva',
            'eva_no' => 'Eva No',
            'city_id' => 'City',
            'ec_incharge_id' => 'Ec Incharge',
            'cooperetion_mode' => 'Cooperetion Mode',
            'sales_id' => 'Sales',
            'customer_type' => 'Customer Type',
            'customer_level' => 'Customer Level',
            'pre_opendatetime' => 'Pre Opendatetime',
            'area_id' => 'Area',
            'prj_condition' => 'Prj Condition',
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

    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('group_id',$this->group_id,true);
        $criteria->compare('eva_id',$this->eva_id,true);
        $criteria->compare('eva_no',$this->eva_no,true);
        $criteria->compare('city_id',$this->city_id,true);
        $criteria->compare('ec_incharge_id',$this->ec_incharge_id,true);
        $criteria->compare('cooperetion_mode',$this->cooperetion_mode,true);
        $criteria->compare('sales_id',$this->sales_id,true);
        $criteria->compare('customer_type',$this->customer_type,true);
        $criteria->compare('customer_level',$this->customer_level,true);
        $criteria->compare('pre_opendatetime',$this->pre_opendatetime,true);
        $criteria->compare('area_id',$this->area_id,true);
        $criteria->compare('prj_condition',$this->prj_condition,true);
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

    public function items($params,$pageIndex,$pageSize)
    {

        if (!empty($params['group_name']) && $params['group_name'] != '') 
            $condition[] = "h.group_name LIKE '%{$params['group_name']}%'";

        if (!empty($params['city_name']) && $params['city_name'] != '') 
            $condition[] = "dc.city_name LIKE '%{$params['city_name']}%'";

        if (!empty($params['name1']) && $params['name1'] != '') 
            $condition[] = "u.name LIKE '%{$params['name1']}%'";

        if (!empty($params['cooperetion_mode']) && $params['cooperetion_mode'] != '') 
            $condition[] = "s.dict_id = '{$params['cooperetion_mode']}'";

        if (!empty($params['status']) && $params['status'] != '') 
            $condition[] = "s.dict_id = '{$params['status']}'";

        if (!empty($params['name']) && $params['name'] != '') 
            $condition[] = "u2.name LIKE '%{$params['name']}%'";

        $condition[] = "e.isactive = '0'";
        $condition = implode(' AND ',$condition);


        $select = ' e.*,dc.city_name,h.group_name,s.dvalue as cooperetion_mode_name,s2.dvalue as status_name,u.name as ec_incharge_name,u2.name as createby_name,ep.net_income ';
        $sql = $this->items_sql($select,$condition);

        $count = $this->RowCount($this->items_sql('count(*)',$condition));
        $start = ($pageIndex - 1)*$pageSize;
        $sql .= " ORDER BY createdate DESC LIMIT $start,$pageSize";

        return array('items'=>$this->QueryAll($sql),'count'=>$count);
    }

    public function items_sql($select,$condition)
    {
        $sql = "SELECT {$select} FROM t_prj_evaluationforms e ";
        $sql = $sql." left join sys_dict s on e.cooperetion_mode = s.dict_id";
        $sql = $sql." left join sys_dict s2 on e.status = s2.dict_id";
        $sql = $sql." left join t_houses_prj h on e.group_id = h.group_id";
        $sql = $sql." left join dict_chengshi dc on e.city_id = dc.city_id";
        $sql = $sql." left join user u on e.ec_incharge_id = u.u_id";
        $sql = $sql." left join user u2 on e.createby = u2.u_id";
        $sql = $sql." left join t_evaform_payment ep on e.eva_id = ep.eva_id";

        if ($condition) $sql .= " WHERE $condition";

        return $sql;
    }

    public function delete($id)
    {
        $sql = "update t_prj_evaluationforms set isactive = 0 WHERE eva_id = $id";
        return $sql?$this->Execute($sql):true;
    }

    public function create($evaluation, $evaformPayment, $outlineoutdetail, $pdetail)
    {
        $this->calculator($evaluation, $evaformPayment, $outlineoutdetail, $pdetail);

        $model=new Evaluation;
        $model->attributes=$_POST['Evaluation'];
        $model->eva_id=$this->getUUID();
        $model->createby = Yii::app()->user->__get('u_id');
        $model->createdate = date("Y-m-d H:i");
        $model->status = Dict::get('evaStatus','cj');
        $model->isactive = 0;
        $model->save(false);

        $EvaformPayment=new EvaformPayment;
        $EvaformPayment->attributes=$_POST['EvaformPayment'];
        $EvaformPayment->v_id=$this->getUUID();
        $EvaformPayment->eva_id=$model->eva_id;
        $EvaformPayment->createby = Yii::app()->user->__get('u_id');
        $EvaformPayment->createdate = date("Y-m-d H:i");
        $EvaformPayment->isactive = 0;
        $EvaformPayment->isadjust = 0;
        $EvaformPayment->ol_fee1 = $this->arr['ol_fee1'];
        $EvaformPayment->ol_fee2 = $this->arr['ol_fee2'];
        $EvaformPayment->ol_fee3 = $this->arr['ol_fee3'];
        $EvaformPayment->ol_fee84 = $this->arr['ol_fee84'];
        $EvaformPayment->pre_deal_amount = $this->arrPdetail['pre_amount'];
        $EvaformPayment->pre_ad_deal_bind = $this->arr['pre_ad_deal_bind'];
        $EvaformPayment->offline_amount = $this->arr['offline_amount_sum'];

        $EvaformPayment->offline_ratio = $this->arr['offline_ratio'];
        $EvaformPayment->resource_income_multiples = $this->arr['resource_income_multiples'];
        $EvaformPayment->prjreword_perunit_sum = $this->arr['prjreword_perunit_sum'];
        $EvaformPayment->brokerfees_perunit_sum = $this->arr['brokerfees_perunit_sum'];
        $EvaformPayment->sale_ad_kanli_amount = $this->arr['sale_ad_kanli_amount'];
        $EvaformPayment->net_income = $this->arr['net_income'];
        $EvaformPayment->save(false);

        if(isset($_POST['Outlineoutdetail']))
        {
            foreach ($_POST['Outlineoutdetail']['out_name'] as $key => $value) {
                $Outlineoutdetail=new Outlineoutdetail;
                $Outlineoutdetail->out_name=$_POST['Outlineoutdetail']['out_name'][$key];
                $Outlineoutdetail->out_amount=$_POST['Outlineoutdetail']['out_amount'][$key];
                $Outlineoutdetail->out_type=$_POST['Outlineoutdetail']['out_type'][$key];
                $Outlineoutdetail->outl_id=$this->getUUID();
                $Outlineoutdetail->v_id=$EvaformPayment->v_id;
                $Outlineoutdetail->createby = Yii::app()->user->__get('u_id');
                $Outlineoutdetail->createdate = date("Y-m-d H:i");
                $Outlineoutdetail->isactive = 0;
                $Outlineoutdetail->save(false);
            }
            
        }

        if(!empty($pdetail) && !empty($pdetail['pd_id'])){
            foreach ($pdetail['pd_id'] as $key => $value) {
                if(!empty($value)){
                    $Pdetail = Pdetail::model()->findByPk($value);
                    $Pdetail->isNewRecord = false;
                    $Pdetail->eva_id = $model->eva_id;
                    $Pdetail->isactive = 0;
                    $Pdetail->save(false);
                }
            }
        }
        return $model;
    }

    public function calculator($evaluation, $evaformPayment, $outlineoutdetail, $pdetail)
    {
        $this->arr = $evaformPayment;

        //线下总支出 
        $this->arr['offline_amount_sum'] = $this->getOfflineAmountSum($outlineoutdetail);

        //获取优惠明细相关数据
        $this->arrPdetail = $this->preparePdetail($pdetail);

        //线下总支出比例  预计焦点净收益 焦点支出总比例
        $this->getElse($pdetail);

        //按销售政策计算广告刊例金额
        $this->getSaleAdKanliAmount();

        // 资源比预计收入倍数
        $this->arr['resource_income_multiples'] = $this->arr['sale_ad_kanli_amount'] / $this->arrPdetail['pre_incoming'];

        $this->arr['resource_income_multiples'] = number_format($this->arr['resource_income_multiples'], 2, '.', '');

        //案场奖励总和 经纪人奖励
        $this->getPrjrewordAndBrokerfees($pdetail);
    }

    public function getOfflineAmountSum($outlineoutdetail){
        $num = 0;
        $this->arr['ol_fee1'] = 0;
        $this->arr['ol_fee2'] = 0;
        $this->arr['ol_fee3'] = 0;
        $this->arr['ol_fee84'] = 0;

        if(count($outlineoutdetail)>0){
            foreach ($outlineoutdetail['out_amount'] as $key => $value) {
                $num = $num + $value;
                if($outlineoutdetail['out_type'][$key] == Dict::get('outType', 'dxckpdfyze')){
                    $this->arr['ol_fee1'] = $this->arr['ol_fee1'] + $outlineoutdetail['out_amount'][$key];
                }
                if($outlineoutdetail['out_type'][$key] == Dict::get('outType', 'zcrnlwfyze')){
                    $this->arr['ol_fee2'] = $this->arr['ol_fee2'] + $outlineoutdetail['out_amount'][$key];
                }
                if($outlineoutdetail['out_type'][$key] == Dict::get('outType', 'kftdxxhdze')){
                    $this->arr['ol_fee3'] = $this->arr['ol_fee3'] + $outlineoutdetail['out_amount'][$key];
                }
                if($outlineoutdetail['out_type'][$key] == Dict::get('outType', 'xmbyj')){
                    $this->arr['ol_fee84'] = $this->arr['ol_fee84'] + $outlineoutdetail['out_amount'][$key];
                }

            }
        }
        return $num;
    }

    public function getSaleAdKanliAmount(){
        if($this->arr['ad_discount']  == 0){
            $sale1 = 0;
        } else {
            $sale1=$this->arrPdetail['pre_incoming'] / ($this->arr['ad_discount'] / 100);
        }

        if($this->arr['ad_distribution_ratio']  == 0){
            $sale2 = 0;
        } else {
            $sale2=$this->arrPdetail['pre_incoming'] * ($this->arr['ad_distribution_ratio'] / 100);
        }

        $this->arr['sale_ad_kanli_amount'] = $sale1 - $sale2;

        $this->arr['sale_ad_kanli_amount'] =  number_format($this->arr['sale_ad_kanli_amount'], 2, '.', '');
    }


    public function preparePdetail($pdetailPost)
    {
        $arr =  array();
        $arr['sell_house_num'] = $arr['ajcard_price'] = $arr['pre_volumn'] = $arr['prjreword_perunit'] = $arr['prevolumn_perunit'] = $arr['brokerfees_perunit'] = $arr['prebrokervolumn'] = $arr['pre_amount'] = $arr['commission_rate'] = $arr['commission_perunit'] = $arr['pre_commission_amount'] = $arr['pre_incoming'] = $arr['jd_retain_ratio'] = $arr['jd_retain_amount'] = $arr['divideSum'] = $arr['divideAmountSum'] = $arr['jd_retain_ratio'] = $arr['jd_retain_amount'] = $arr['divideSumKFS'] = $arr['divideAmountSumKFS'] = $arr['divideSumDSF'] = $arr['divideAmountSumDSF'] = 0;


        if(empty($pdetailPost) && empty($pdetailPost['pd_id'])) return $arr;

        foreach ($pdetailPost['pd_id'] as $key => $value) 
        {
            if(empty($value)) continue;

            if(!($Pdetail = Pdetail::model()->findByPk($value))) continue;

            $Pdetail->preparePdetail($Pdetail);

            $arr['sell_house_num'] =  $arr['sell_house_num'] +  $Pdetail->sell_house_num;
            $arr['ajcard_price'] =  $arr['ajcard_price'] +  $Pdetail->ajcard_price;
            $arr['pre_volumn'] =  $arr['pre_volumn'] +  $Pdetail->pre_volumn;
            $arr['prjreword_perunit'] =  $arr['prjreword_perunit'] +  $Pdetail->prjreword_perunit;
            $arr['prevolumn_perunit'] =  $arr['prevolumn_perunit'] +  $Pdetail->prevolumn_perunit;
            $arr['brokerfees_perunit'] =  $arr['brokerfees_perunit'] +  $Pdetail->brokerfees_perunit;
            $arr['prebrokervolumn'] =  $arr['prebrokervolumn'] +  $Pdetail->prebrokervolumn;
            $arr['pre_amount'] =  $arr['pre_amount'] +  $Pdetail->pre_amount;
            $arr['commission_rate'] =  $arr['commission_rate'] +  $Pdetail->commission_rate;
            $arr['commission_perunit'] =  $arr['commission_perunit'] +  $Pdetail->commission_perunit;
            $arr['pre_commission_amount'] =  $arr['pre_commission_amount'] +  $Pdetail->pre_commission_amount;
            $arr['pre_incoming'] =  $arr['pre_incoming'] +  $Pdetail->pre_incoming;
            $arr['jd_retain_ratio'] =  $arr['jd_retain_ratio'] +  $Pdetail->jd_retain_ratio;
            $arr['jd_retain_amount'] =  $arr['jd_retain_amount'] +  $Pdetail->jd_retain_amount;
            $arr['divideSum'] =  $arr['divideSum'] +  $Pdetail->divideSum;
            $arr['divideAmountSum'] =  $arr['divideAmountSum'] +  $Pdetail->divideAmountSum;
            $arr['divideSumKFS'] =  $arr['divideSumKFS'] +  $Pdetail->divideSumKFS;
            $arr['divideAmountSumKFS'] =  $arr['divideAmountSumKFS'] +  $Pdetail->divideAmountSumKFS;
            $arr['divideSumDSF'] =  $arr['divideSumDSF'] +  $Pdetail->divideSumDSF;
            $arr['divideAmountSumDSF'] =  $arr['divideAmountSumDSF'] +  $Pdetail->divideAmountSumDSF;
            
        }

        return $arr;
    }

    public function getElse($pdetail){

        //线下总支出比例
        $this->arr['offline_ratio'] = 0;
        //焦点支出总比例
        $this->arr['amount_ratio'] = 0;
        //预计焦点净收益
        $this->arr['net_income'] = 0;

        $offlineRatio = $amountRatio = $netIncome = 0;

        if(empty($pdetailPost) && empty($pdetailPost['pd_id'])) return ;

        foreach ($pdetailPost['pd_id'] as $key => $value) 
        {

            if(empty($value) || !($model = Pdetail::model()->findByPk($value))) continue;

            if($model->charge_type=="mkwfc"){

                $offlineRatio = $this->arr['offline_amount_sum']/$this->arrPdetail['pre_incoming'];

                $amountRatio = $this->arr['offline_amount_sum']/$this->arrPdetail['pre_incoming'];

                $netIncome = $this->arrPdetail['pre_incoming']/(1 - $amountRatio);
            } else if($model->charge_type=="mkyfc"){
                $offlineRatio = $this->arr['offline_amount_sum']/($this->arrPdetail['pre_incoming']+$this->arr['pre_ad_amount']);

                $netIncome = $this->arrPdetail['pre_incoming']*(100-$this->arr['ad_markting_ratio']-$this->arr['pre_tax_ratio'])/100-$this->arr['offline_amount_sum'];

                $amountRatio =1-($netIncome/($this->arrPdetail['pre_incoming']+$this->arr['pre_ad_amount']));

            } else if($model->charge_type=="cpswfc"){

                $offlineRatio = $this->arr['offline_amount_sum']/($this->arrPdetail['pre_incoming']+$pdetail['pre_commission_amount'][$key]+$this->arr['ad_amount_infact']);

                $netIncome = $this->arrPdetail['pre_incoming']*(1-$offlineRatio);

                $amountRatio =$this->arr['pre_tax_ratio'] + $offlineRatio + $netIncome;


            }else if($model->charge_type=="cpsyfc"){
                $offlineRatio = $this->arr['offline_amount_sum']/$this->arrPdetail['pre_incoming'];

                $netIncome = $this->arrPdetail['pre_incoming'] * (1-$offlineRatio);

                $amountRatio = $pdetail['divideSum'][$key]+ $this->arr['pre_tax_ratio'] + $this->arr['ad_markting_ratio'] + $offlineRatio;
                

            }else if($model->charge_type=="mkcps"){
                $offlineRatio = $this->arr['offline_amount_sum']/$this->arrPdetail['pre_incoming'];

                $netIncome = $this->arrPdetail['pre_incoming']*(100-$this->arr['ad_markting_ratio']-$this->arr['pre_tax_ratio'])/100-$this->arr['offline_amount_sum'];

                $amountRatio = 1 - ($netIncome/($this->arrPdetail['pre_incoming']+$pdetail['pre_commission_amount'][$key]+$this->arr['ad_amount_infact']));
            } 

            $this->arr['offline_ratio']  = $this->arr['offline_ratio'] + $offlineRatio;
            $this->arr['amount_ratio']     = $this->arr['amount_ratio'] + $amountRatio;
            $this->arr['net_income']     = $this->arr['net_income'] + $netIncome;
        }

        $this->arr['offline_ratio']  = number_format($this->arr['offline_ratio']*100, 2, '.', '');
        $this->arr['amount_ratio']     = number_format($this->arr['amount_ratio']*100, 2, '.', '');
        $this->arr['net_income']     = number_format($this->arr['net_income'], 2, '.', '');
    }


    public function getPrjrewordAndBrokerfees($pdetail){


        $this->arr['prjreword_perunit_sum'] = 0;
        $this->arr['brokerfees_perunit_sum'] = 0;

        $anchang = $jingjiren = 0;
        if(empty($pdetailPost) && empty($pdetailPost['pd_id'])) return ;

        foreach ($pdetailPost['pd_id'] as $key => $value) 
        {

            if(empty($value) || !($model = Pdetail::model()->findByPk($value))) continue;

            $anchang  = $model->prjreword_perunit * $model->prevolumn_perunit+ $anchang;
            $jingjiren  = $model->brokerfees_perunit * $model->prebrokervolumn+ $anchang;
        }

        $this->arr['prjreword_perunit_sum']  = number_format($anchang, 2, '.', '');
        $this->arr['brokerfees_perunit_sum'] = number_format($jingjiren, 2, '.', '');

    }

    public function setEvaluationStatusById($id, $flag){

        $Evaluation = Evaluation::model()->findByPk($id);
        if(empty($Evaluation)) return false;;
        
        $Evaluation->status= Dict::get('evaStatus',$flag);
        $Evaluation->isNewRecord =  false;
        $Evaluation->save(false);
        return $Evaluation;

    }


}