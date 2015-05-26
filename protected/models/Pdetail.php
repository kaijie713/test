<?php
class Pdetail extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_pdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, eva_id, pd_id', 'required'),
			array('sell_house_num, pre_volumn, prevolumn_perunit, prebrokervolumn, jd_retain_ratio, commission_rate', 'numerical', 'integerOnly'=>true),
			array('group_id, eva_id, pd_id, createby, updateby', 'length', 'max'=>36),
			array('source_type, charge_type', 'length', 'max'=>2),
			array('pre_incoming, jd_retain_amount, commission_perunit', 'length', 'max'=>16),
			array('ajcard_price, prjreword_perunit, brokerfees_perunit, pre_amount', 'length', 'max'=>13),
			array('pref_context', 'length', 'max'=>2000),
			array('pre_commission_amount', 'length', 'max'=>18),
			array('isactive', 'length', 'max'=>1),
			array('attribute1, attribute2, attribute3', 'length', 'max'=>100),
			array('bdate, edate, createdate, updatedate', 'safe'),
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
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
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

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
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


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pdetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
