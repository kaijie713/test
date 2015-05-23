<?php

/**
 * This is the model class for table "t_prjexeitems".
 *
 * The followings are the available columns in table 't_prjexeitems':
 * @property string $es_id
 * @property string $ra_id
 * @property string $exename
 * @property string $bdate
 * @property string $edate
 * @property string $pre_amount
 * @property string $infact_cost
 * @property string $isactive
 * @property string $createby
 * @property string $createdate
 * @property string $updateby
 * @property string $updatedate
 */
class Prjexeitems extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_prjexeitems';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('es_id', 'required'),
			array('es_id, ra_id, createby, updateby', 'length', 'max'=>36),
			array('exename', 'length', 'max'=>50),
			array('pre_amount', 'length', 'max'=>13),
			array('infact_cost', 'length', 'max'=>12),
			array('isactive', 'length', 'max'=>1),
			array('bdate, edate, createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('es_id, ra_id, exename, bdate, edate, pre_amount, infact_cost, isactive, createby, createdate, updateby, updatedate', 'safe', 'on'=>'search'),
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
			'es_id' => 'Es',
			'ra_id' => 'Ra',
			'exename' => 'Exename',
			'bdate' => 'Bdate',
			'edate' => 'Edate',
			'pre_amount' => 'Pre Amount',
			'infact_cost' => 'Infact Cost',
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

		$criteria->compare('es_id',$this->es_id,true);
		$criteria->compare('ra_id',$this->ra_id,true);
		$criteria->compare('exename',$this->exename,true);
		$criteria->compare('bdate',$this->bdate,true);
		$criteria->compare('edate',$this->edate,true);
		$criteria->compare('pre_amount',$this->pre_amount,true);
		$criteria->compare('infact_cost',$this->infact_cost,true);
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
	 * @return Prjexeitems the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
