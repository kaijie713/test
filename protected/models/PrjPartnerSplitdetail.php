<?php

/**
 * This is the model class for table "t_prj_partner_splitdetail".
 *
 * The followings are the available columns in table 't_prj_partner_splitdetail':
 * @property string $pd_id
 * @property string $sp_id
 * @property string $partner_type
 * @property string $partner_name
 * @property integer $divide
 * @property string $divide_amount
 * @property string $partner_memo
 * @property string $isactive
 * @property string $createby
 * @property string $createdate
 * @property string $updateby
 * @property string $updatedate
 */
class PrjPartnerSplitdetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_prj_partner_splitdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
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

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PrjPartnerSplitdetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
