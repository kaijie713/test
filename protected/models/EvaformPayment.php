<?php
class EvaformPayment extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_evaform_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('group_id, eva_id, v_id', 'required'),
			array('ad_distribution_ratio, ad_markting_ratio, pre_tax_ratio', 'numerical', 'integerOnly'=>true),
			array('group_id, eva_id, v_id, createby, updateby', 'length', 'max'=>36),
			array('ad_discount', 'length', 'max'=>3),
			array('ad_amount_infact, ol_fee1, ol_fee2, ol_fee3, ol_fee84, pre_deal_amount, pre_ad_amount, online_amount, offline_amount', 'length', 'max'=>16),
			array('pre_ad_deal_bind, isadjust', 'length', 'max'=>2),
			array('isactive', 'length', 'max'=>1),
			array('attribute1, attribute2, attribute3', 'length', 'max'=>100),
			array('createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_id, eva_id, v_id, ad_discount, ad_distribution_ratio, ad_amount_infact, ad_markting_ratio, ol_fee1, ol_fee2, ol_fee3, ol_fee84, pre_deal_amount, pre_ad_amount, pre_ad_deal_bind, pre_tax_ratio, online_amount, offline_amount, isadjust, isactive, createby, createdate, updateby, updatedate, attribute1, attribute2, attribute3', 'safe', 'on'=>'search'),
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
			'v_id' => 'V',
			'ad_discount' => 'Ad Discount',
			'ad_distribution_ratio' => 'Ad Distribution Ratio',
			'ad_amount_infact' => 'Ad Amount Infact',
			'ad_markting_ratio' => 'Ad Markting Ratio',
			'ol_fee1' => 'Ol Fee1',
			'ol_fee2' => 'Ol Fee2',
			'ol_fee3' => 'Ol Fee3',
			'ol_fee84' => 'Ol Fee84',
			'pre_deal_amount' => 'Pre Deal Amount',
			'pre_ad_amount' => 'Pre Ad Amount',
			'pre_ad_deal_bind' => 'Pre Ad Deal Bind',
			'pre_tax_ratio' => 'Pre Tax Ratio',
			'online_amount' => 'Online Amount',
			'offline_amount' => 'Offline Amount',
			'isadjust' => 'Isadjust',
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
		$criteria->compare('v_id',$this->v_id,true);
		$criteria->compare('ad_discount',$this->ad_discount,true);
		$criteria->compare('ad_distribution_ratio',$this->ad_distribution_ratio);
		$criteria->compare('ad_amount_infact',$this->ad_amount_infact,true);
		$criteria->compare('ad_markting_ratio',$this->ad_markting_ratio);
		$criteria->compare('ol_fee1',$this->ol_fee1,true);
		$criteria->compare('ol_fee2',$this->ol_fee2,true);
		$criteria->compare('ol_fee3',$this->ol_fee3,true);
		$criteria->compare('ol_fee84',$this->ol_fee84,true);
		$criteria->compare('pre_deal_amount',$this->pre_deal_amount,true);
		$criteria->compare('pre_ad_amount',$this->pre_ad_amount,true);
		$criteria->compare('pre_ad_deal_bind',$this->pre_ad_deal_bind,true);
		$criteria->compare('pre_tax_ratio',$this->pre_tax_ratio);
		$criteria->compare('online_amount',$this->online_amount,true);
		$criteria->compare('offline_amount',$this->offline_amount,true);
		$criteria->compare('isadjust',$this->isadjust,true);
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
	 * @return EvaformPayment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getEvaformPaymentByEvaId($evaid)
	{
		$sql = "select * from t_evaform_payment where eva_id = '$evaid' and isactive = 0 limit 1";
		return $this->QueryRow($sql);
	}


}
