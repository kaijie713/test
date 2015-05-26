<?php
class PrjAdjustItems extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_prj_adjust_items';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eva_id, ad_id', 'required'),
			array('ad_distribution_ratio, ad_markting_ratio, pre_tax_ratio', 'numerical', 'integerOnly'=>true),
			array('eva_id, ad_id, v_id, createby, updateby', 'length', 'max'=>36),
			array('adjust_memo', 'length', 'max'=>500),
			array('ad_discount', 'length', 'max'=>3),
			array('ad_amount_infact, pre_deal_amount, pre_ad_amount', 'length', 'max'=>16),
			array('pre_ad_deal_bind', 'length', 'max'=>2),
			array('isactive', 'length', 'max'=>1),
			array('createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('eva_id, ad_id, v_id, adjust_memo, ad_discount, ad_distribution_ratio, ad_amount_infact, ad_markting_ratio, pre_deal_amount, pre_ad_amount, pre_ad_deal_bind, pre_tax_ratio, isactive, createby, createdate, updateby, updatedate', 'safe', 'on'=>'search'),
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
			'eva_id' => 'Eva',
			'ad_id' => 'Ad',
			'v_id' => 'V',
			'adjust_memo' => 'Adjust Memo',
			'ad_discount' => 'Ad Discount',
			'ad_distribution_ratio' => 'Ad Distribution Ratio',
			'ad_amount_infact' => 'Ad Amount Infact',
			'ad_markting_ratio' => 'Ad Markting Ratio',
			'pre_deal_amount' => 'Pre Deal Amount',
			'pre_ad_amount' => 'Pre Ad Amount',
			'pre_ad_deal_bind' => 'Pre Ad Deal Bind',
			'pre_tax_ratio' => 'Pre Tax Ratio',
			'isactive' => 'Isactive',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
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

		$criteria->compare('eva_id',$this->eva_id,true);
		$criteria->compare('ad_id',$this->ad_id,true);
		$criteria->compare('v_id',$this->v_id,true);
		$criteria->compare('adjust_memo',$this->adjust_memo,true);
		$criteria->compare('ad_discount',$this->ad_discount,true);
		$criteria->compare('ad_distribution_ratio',$this->ad_distribution_ratio);
		$criteria->compare('ad_amount_infact',$this->ad_amount_infact,true);
		$criteria->compare('ad_markting_ratio',$this->ad_markting_ratio);
		$criteria->compare('pre_deal_amount',$this->pre_deal_amount,true);
		$criteria->compare('pre_ad_amount',$this->pre_ad_amount,true);
		$criteria->compare('pre_ad_deal_bind',$this->pre_ad_deal_bind,true);
		$criteria->compare('pre_tax_ratio',$this->pre_tax_ratio);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrjAdjustItems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
