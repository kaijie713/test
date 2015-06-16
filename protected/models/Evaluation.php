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
            array('hourse_id, eva_id', 'required'),
            array('hourse_id, eva_id, city_id, ec_incharge_id, sales_id, area_id, createby, updateby', 'length', 'max'=>36),
            array('eva_no', 'length', 'max'=>50),
            array('cooperetion_mode, customer_type, customer_level', 'length', 'max'=>2),
            array('prj_condition', 'length', 'max'=>2000),
            array('isactive', 'length', 'max'=>1),
            array('attribute1, attribute2, attribute3', 'length', 'max'=>100),
            array('pre_opendatetime, createdate, updatedate', 'safe'),
            array('hourse_id, eva_id, eva_no, city_id, ec_incharge_id, cooperetion_mode, sales_id, customer_type, customer_level, pre_opendatetime, area_id, prj_condition, isactive, createby, createdate, updateby, updatedate, attribute1, attribute2, attribute3', 'safe', 'on'=>'search'),
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
            'hourse_id' => 'Group',
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

        $criteria->compare('hourse_id',$this->hourse_id,true);
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

        if (!empty($params['ids']) && $params['ids'] != '') {
            $ids = implode("','", $params['ids']);
            $condition[] = "e.eva_id in ('{$ids}')";
        }

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
        $sql = $sql." left join t_houses_prj h on e.hourse_id = h.hourse_id";
        $sql = $sql." left join dict_chengshi dc on e.city_id = dc.city_id";
        $sql = $sql." left join user u on e.ec_incharge_id = u.u_id";
        $sql = $sql." left join user u2 on e.createby = u2.u_id";
        $sql = $sql." left join t_evaform_payment ep on e.eva_id = ep.eva_id";

        if ($condition) $sql .= " WHERE $condition";

        return $sql;
    }

    public function delete($id)
    {
        $sql = "update t_prj_evaluationforms set isactive = 1 WHERE eva_id = $id";
        return $sql?$this->Execute($sql):true;
    }

    public function create($evaluation, $evaformPayment, $outlineoutdetail, $pdetail)
    {

        $fields = CalculatorFactory::create('Post')->calculator($_POST['Evaluation'],$_POST['EvaformPayment'],$_POST['Outlineoutdetail'],$_POST['Pdetail']);
   
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
        $EvaformPayment->ol_fee1 = $fields->ol_fee1;
        $EvaformPayment->ol_fee2 = $fields->ol_fee2;
        $EvaformPayment->ol_fee3 = $fields->ol_fee3;
        $EvaformPayment->ol_fee84 = $fields->ol_fee84;
        $EvaformPayment->pre_deal_amount = $fields->pdetail->pre_amount;
        $EvaformPayment->pre_ad_deal_bind = $fields->evaformPayment->pre_ad_deal_bind;
        $EvaformPayment->offline_amount = $fields->offline_amount_sum;

        $EvaformPayment->offline_ratio = $fields->offline_ratio;
        $EvaformPayment->resource_income_multiples = $fields->resource_income_multiples;
        $EvaformPayment->prjreword_perunit_sum = $fields->prjreword_perunit_sum;
        $EvaformPayment->brokerfees_perunit_sum = $fields->brokerfees_perunit_sum;
        $EvaformPayment->sale_ad_kanli_amount = $fields->sale_ad_kanli_amount;
        $EvaformPayment->net_income = $fields->net_income;
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
                if(empty($value)) continue;
                
                $Pdetail = Pdetail::model()->findByPk($value);
                $Pdetail->isNewRecord = false;
                $Pdetail->eva_id = $model->eva_id;
                $Pdetail->isactive = 0;
                $Pdetail->save(false);
            }
        }
        return $model;
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