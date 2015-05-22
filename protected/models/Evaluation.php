<?php
class Evaluation extends BaseModel
{
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

    public function items($condition,$pageIndex,$pageSize)
    {
        $select = ' * ';
        $sql = $this->items_sql($select,$condition);

        $count = $this->RowCount($this->items_sql('count(*)',$condition));
        $start = ($pageIndex - 1)*$pageSize;
        $sql .= " ORDER BY createdate DESC LIMIT $start,$pageSize";

        return array('items'=>$this->QueryAll($sql),'count'=>$count);
    }

    public function items_sql($select,$condition)
    {
        $sql = "SELECT {$select} FROM t_prj_evaluationforms ";

        if ($condition) $sql .= " WHERE $condition";

        return $sql;
    }

    public function delete($id)
    {
        $sql = "update t_prj_evaluationforms set isactive = 0 WHERE eva_id = $id";
        return $sql?$this->Execute($sql):true;
    }
}
