<?php

/**
 * This is the model class for table "t_prj_evaluationforms".
 *
 * The followings are the available columns in table 't_prj_evaluationforms':
 * @property string $group_id
 * @property string $eva_id
 * @property string $eva_no
 * @property string $city_id
 * @property string $ec_incharge_id
 * @property string $cooperetion_mode
 * @property string $sales_id
 * @property string $customer_type
 * @property string $customer_level
 * @property string $pre_opendatetime
 * @property string $area_id
 * @property string $prj_condition
 * @property string $isactive
 * @property string $createby
 * @property string $createdatetime
 * @property string $updateby
 * @property string $updatedatetime
 * @property string $attribute1
 * @property string $attribute2
 * @property string $attribute3
 */
class Evaluation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_prj_evaluationforms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
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
			array('pre_opendatetime, createdatetime, updatedatetime', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('group_id, eva_id, eva_no, city_id, ec_incharge_id, cooperetion_mode, sales_id, customer_type, customer_level, pre_opendatetime, area_id, prj_condition, isactive, createby, createdatetime, updateby, updatedatetime, attribute1, attribute2, attribute3', 'safe', 'on'=>'search'),
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
			'createdatetime' => 'Createdatetime',
			'updateby' => 'Updateby',
			'updatedatetime' => 'Updatedatetime',
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
		$criteria->compare('createdatetime',$this->createdatetime,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedatetime',$this->updatedatetime,true);
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
	 * @return Evaluation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
