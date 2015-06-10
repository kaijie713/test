<?php
include('AbstractCalculator.php');

class ViewCalculator extends AbstractCalculator
{
    public $cal;
    public $evaformPayment;

    public function hasMissScore()
    {
        return true;
    }

    public function calculator($eavId)
    {
        $this->initFilter();
        $this->cal->evaformPayment=(object) EvaformPayment::model()->getEvaformPaymentByEvaId($eavId);
        $pdetail['pd_id']=ArrayToolkit::column(Pdetail::model()->findPdetailsByEvaId($eavId), 'pd_id');
 
        //线下总支出 
        //$this->getOfflineAmountSum($outlineoutdetail);

        //获取优惠明细相关数据
        $this->preparePdetail($pdetail);

        //线下总支出比例  预计焦点净收益 焦点支出总比例
        $this->getElse($pdetail);

        //按销售政策计算广告刊例金额
        $this->getSaleAdKanliAmount();

        // 资源比预计收入倍数

        if(empty($this->cal->pdetail->pre_incoming) || $this->cal->pdetail->pre_incoming == 0){
            $this->cal->resource_income_multiples = 0;
        }else{
            $this->cal->resource_income_multiples = $this->cal->sale_ad_kanli_amount / $this->cal->pdetail->pre_incoming;
        }

        $this->cal->resource_income_multiples = number_format($this->cal->resource_income_multiples, 4, '.', '');

        //案场奖励总和 经纪人奖励
        $this->getPrjrewordAndBrokerfees($pdetail);

        return $this->cal;
    }

    public function getOfflineAmountSum($outlineoutdetail){
        if(count($outlineoutdetail)>0){
            foreach ($outlineoutdetail['out_amount'] as $key => $value) {
                $this->cal->offline_amount_sum = $this->cal->offline_amount_sum + $value;
                if($outlineoutdetail['out_type'][$key] == Dict::get('outType', 'dxckpdfyze')){
                    $this->cal->ol_fee1 = $this->cal->ol_fee1 + $outlineoutdetail['out_amount'][$key];
                }
                if($outlineoutdetail['out_type'][$key] == Dict::get('outType', 'zcrnlwfyze')){
                    $this->cal->ol_fee2 = $this->cal->ol_fee2 + $outlineoutdetail['out_amount'][$key];
                }
                if($outlineoutdetail['out_type'][$key] == Dict::get('outType', 'kftdxxhdze')){
                    $this->cal->ol_fee3 = $this->cal->ol_fee3 + $outlineoutdetail['out_amount'][$key];
                }
                if($outlineoutdetail['out_type'][$key] == Dict::get('outType', 'xmbyj')){
                    $this->cal->ol_fee84 = $this->cal->ol_fee84 + $outlineoutdetail['out_amount'][$key];
                }

            }
        }
    }

    public function getSaleAdKanliAmount(){

        if($this->cal->evaformPayment->ad_discount  == 0){
            $sale1 = 0;
        } else {
            $sale1=$this->cal->pdetail->pre_incoming / ($this->cal->evaformPayment->ad_discount / 100);
        }

        if($this->cal->evaformPayment->ad_distribution_ratio  == 0){
            $sale2 = 0;
        } else {
            $sale2=$this->cal->pdetail->pre_incoming * ($this->cal->evaformPayment->ad_distribution_ratio / 100);
        }

        $this->cal->sale_ad_kanli_amount = $sale1 - $sale2;

        $this->cal->sale_ad_kanli_amount =  number_format($this->cal->sale_ad_kanli_amount, 4, '.', '');
    }



    


    

}