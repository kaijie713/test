<?php
abstract class AbstractCalculator extends BaseModel
{
	public $cal;

	public function tableName()
    {
        return 't_prj_evaluationforms';
    }

    public function hasMissScore()
    {
        return false;
    }

    public function initFilter($evaformPayment = array())
    {
    	$this->cal=(object) array(
            'pdetail' => (object) array(),
            'evaformPayment' => (object) array(),
        );

        foreach ($evaformPayment as $key => $value) {
        	$this->cal->evaformPayment->$key = $value;
        }

        $this->cal->pdetail->sell_house_num = $this->cal->pdetail->ajcard_price = $this->cal->pdetail->pre_volumn = $this->cal->pdetail->prjreword_perunit = $this->cal->pdetail->prevolumn_perunit = $this->cal->pdetail->brokerfees_perunit = $this->cal->pdetail->prebrokervolumn = $this->cal->pdetail->pre_amount = $this->cal->pdetail->commission_rate = $this->cal->pdetail->commission_perunit = $this->cal->pdetail->pre_commission_amount = $this->cal->pdetail->pre_incoming = $this->cal->pdetail->jd_retain_ratio = $this->cal->pdetail->jd_retain_amount = $this->cal->pdetail->divideSum = $this->cal->pdetail->divideAmountSum = $this->cal->pdetail->divideSumKFS = $this->cal->pdetail->divideAmountSumKFS = $this->cal->pdetail->divideSumDSF = $this->cal->pdetail->divideAmountSumDSF = 0;

        $this->cal->ol_fee1 = 0;
        $this->cal->ol_fee2 = 0;
        $this->cal->ol_fee3 = 0;
        $this->cal->ol_fee84 = 0;
        //线下总支出
        $this->cal->offline_amount_sum = 0;
        //线下总支出比例
        $this->cal->offline_ratio = 0;
        //焦点支出总比例
        $this->cal->amount_ratio = 0;
        //预计焦点净收益
        $this->cal->net_income = 0;
        //案场奖励总额
        $this->cal->prjreword_perunit_sum = 0;
        //门店经纪人服务费总额
        $this->cal->brokerfees_perunit_sum = 0;

    }


    public function preparePdetail($pdetailPost)
    {
        if(empty($pdetailPost['pd_id'])) return false;

        foreach ($pdetailPost['pd_id'] as $key => $value) 
        {
            if(empty($value)) continue;

            if(!($Pdetail = Pdetail::model()->findByPk($value))) continue;

            $Pdetail->preparePdetail($Pdetail);

            $this->cal->pdetail->sell_house_num     =  $this->cal->pdetail->sell_house_num +  $Pdetail->sell_house_num;
            $this->cal->pdetail->ajcard_price       =  $this->cal->pdetail->ajcard_price +  $Pdetail->ajcard_price;
            $this->cal->pdetail->pre_volumn         =  $this->cal->pdetail->pre_volumn +  $Pdetail->pre_volumn;
            $this->cal->pdetail->prjreword_perunit  =  $this->cal->pdetail->prjreword_perunit +  $Pdetail->prjreword_perunit;
            $this->cal->pdetail->prevolumn_perunit  =  $this->cal->pdetail->prevolumn_perunit +  $Pdetail->prevolumn_perunit;
            $this->cal->pdetail->brokerfees_perunit =  $this->cal->pdetail->brokerfees_perunit +  $Pdetail->brokerfees_perunit;
            $this->cal->pdetail->prebrokervolumn    =  $this->cal->pdetail->prebrokervolumn +  $Pdetail->prebrokervolumn;
            $this->cal->pdetail->pre_amount         =  $this->cal->pdetail->pre_amount +  $Pdetail->pre_amount;
            $this->cal->pdetail->commission_rate    =  $this->cal->pdetail->commission_rate +  $Pdetail->commission_rate;
            $this->cal->pdetail->commission_perunit =  $this->cal->pdetail->commission_perunit +  $Pdetail->commission_perunit;
            $this->cal->pdetail->pre_commission_amount =  $this->cal->pdetail->pre_commission_amount +  $Pdetail->pre_commission_amount;
            $this->cal->pdetail->pre_incoming       =  $this->cal->pdetail->pre_incoming +  $Pdetail->pre_incoming;
            $this->cal->pdetail->jd_retain_ratio    =  $this->cal->pdetail->jd_retain_ratio +  $Pdetail->jd_retain_ratio;
            $this->cal->pdetail->jd_retain_amount   =  $this->cal->pdetail->jd_retain_amount +  $Pdetail->jd_retain_amount;
            $this->cal->pdetail->divideSum          =  $this->cal->pdetail->divideSum +  $Pdetail->divideSum;
            $this->cal->pdetail->divideAmountSum    =  $this->cal->pdetail->divideAmountSum +  $Pdetail->divideAmountSum;
            $this->cal->pdetail->divideSumKFS       =  $this->cal->pdetail->divideSumKFS +  $Pdetail->divideSumKFS;
            $this->cal->pdetail->divideAmountSumKFS =  $this->cal->pdetail->divideAmountSumKFS +  $Pdetail->divideAmountSumKFS;
            $this->cal->pdetail->divideSumDSF       =  $this->cal->pdetail->divideSumDSF +  $Pdetail->divideSumDSF;
            $this->cal->pdetail->divideAmountSumDSF =  $this->cal->pdetail->divideAmountSumDSF +  $Pdetail->divideAmountSumDSF;
        }
    }

    public function getElse($pdetailPost){

        $offlineRatio = $amountRatio = $netIncome = 0;

        if(empty($pdetailPost['pd_id'])) return false;

        foreach ($pdetailPost['pd_id'] as $key => $value) 
        {
            if(empty($value) || !($model = Pdetail::model()->findByPk($value))) continue;

            if($model->charge_type==Dict::get('chargeType','mkwfc')){

                // $offlineRatio = $this->cal->offline_amount_sum/$model->pre_incoming;

                $amountRatio = $this->cal->offline_amount_sum/$model->pre_incoming;

                $netIncome = $model->pre_incoming/(1 - $amountRatio);
            } else if($model->charge_type==Dict::get('chargeType','mkyfc')){
                // $offlineRatio = $this->cal->offline_amount_sum/($model->pre_incoming+$this->cal->evaformPayment->pre_ad_amount);

                $netIncome = $model->pre_incoming*(100-$this->cal->evaformPayment->ad_markting_ratio-$this->cal->evaformPayment->pre_tax_ratio)/100-$this->cal->offline_amount_sum;

                $amountRatio =1-($netIncome/($model->pre_incoming+$this->cal->evaformPayment->pre_ad_amount));

            } else if($model->charge_type==Dict::get('chargeType','cpswfc')){

                // $offlineRatio = $this->cal->offline_amount_sum/($model->pre_incoming+$pdetail['pre_commission_amount'][$key]+$this->cal->evaformPayment->ad_amount_infact);

                $netIncome = $model->pre_incoming*(1-$offlineRatio);

                $amountRatio =$this->cal->evaformPayment->pre_tax_ratio + $offlineRatio + $netIncome;


            }else if($model->charge_type==Dict::get('chargeType','cpsyfc')){
                // $offlineRatio = $this->cal->offline_amount_sum/$model->pre_incoming;

                $netIncome = $model->pre_incoming * (1-$offlineRatio);

                $amountRatio = $this->cal->pdetail->divideSum+ $this->cal->evaformPayment->pre_tax_ratio + $this->cal->evaformPayment->ad_markting_ratio + $offlineRatio;
                

            }else if($model->charge_type==Dict::get('chargeType','mkcps')){
                // $offlineRatio = $this->cal->offline_amount_sum/$model->pre_incoming;

                $netIncome = $model->pre_incoming*(100-$this->cal->evaformPayment->ad_markting_ratio-$this->cal->evaformPayment->pre_tax_ratio)/100-$this->cal->offline_amount_sum;

                $amountRatio = 1 - ($netIncome/($model->pre_incoming+$this->cal->pdetail->pre_commission_amount+$this->cal->evaformPayment->ad_amount_infact));
            } 

            $this->cal->amount_ratio     = $this->cal->amount_ratio + $amountRatio;
            $this->cal->net_income     = $this->cal->net_income + $netIncome;
        }


        $offlineSum = $this->cal->evaformPayment->pre_ad_amount + $model->pre_incoming ;
        $this->cal->offline_ratio = $this->cal->offline_amount_sum/$offlineSum;

        $this->cal->offline_ratio  = number_format($this->cal->offline_ratio*100, 4, '.', '');
        $this->cal->amount_ratio     = number_format($this->cal->amount_ratio*100, 4, '.', '');
        $this->cal->net_income     = number_format($this->cal->net_income, 4, '.', '');
    }

    public function returnFilter(){

    }
    public function getPrjrewordAndBrokerfees($pdetailPost){

        $anchang = $jingjiren = 0;
        if(empty($pdetailPost['pd_id'])) return false;

        foreach ($pdetailPost['pd_id'] as $key => $value) 
        {

            if(empty($value) || !($model = Pdetail::model()->findByPk($value))) continue;

            $anchang  = $model->prjreword_perunit * $model->prevolumn_perunit+ $anchang;
            $jingjiren  = $model->brokerfees_perunit * $model->prebrokervolumn+ $anchang;
        }

        $this->cal->prjreword_perunit_sum  = number_format($anchang, 4, '.', '');
        $this->cal->brokerfees_perunit_sum = number_format($jingjiren, 4, '.', '');

    }

}