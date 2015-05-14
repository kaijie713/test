<?php

/**
 * This is the model class for table "T_PRJ_EVALUATIONFORMS".
 *
 * The followings are the available columns in table 'T_PRJ_EVALUATIONFORMS':
 * @property string $GROUP_ID
 * @property string $EVA_ID
 * @property string $EVA_NO
 * @property string $CITY_ID
 * @property string $EC_INCHARGE_ID
 * @property string $COOPERETION_MODE
 * @property string $SALES_ID
 * @property string $CUSTOMER_TYPE
 * @property string $CUSTOMER_LEVEL
 * @property string $PRE_OPENDATETIME
 * @property string $AREA_ID
 * @property string $PRJ_CONDITION
 * @property string $ISACTIVE
 * @property string $CREATEBY
 * @property string $CREATEDATETIME
 * @property string $UPDATEBY
 * @property string $UPDATEDATETIME
 * @property string $ATTRIBUTE1
 * @property string $ATTRIBUTE2
 * @property string $ATTRIBUTE3
 */
class Evaluation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'T_PRJ_EVALUATIONFORMS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('GROUP_ID, EVA_ID', 'required'),
			array('GROUP_ID, EVA_ID, CITY_ID, EC_INCHARGE_ID, SALES_ID, AREA_ID, CREATEBY, UPDATEBY', 'length', 'max'=>36),
			array('EVA_NO', 'length', 'max'=>50),
			array('COOPERETION_MODE, CUSTOMER_TYPE, CUSTOMER_LEVEL', 'length', 'max'=>2),
			array('PRJ_CONDITION', 'length', 'max'=>2000),
			array('ISACTIVE', 'length', 'max'=>1),
			array('ATTRIBUTE1, ATTRIBUTE2, ATTRIBUTE3', 'length', 'max'=>100),
			array('PRE_OPENDATETIME, CREATEDATETIME, UPDATEDATETIME', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('GROUP_ID, EVA_ID, EVA_NO, CITY_ID, EC_INCHARGE_ID, COOPERETION_MODE, SALES_ID, CUSTOMER_TYPE, CUSTOMER_LEVEL, PRE_OPENDATETIME, AREA_ID, PRJ_CONDITION, ISACTIVE, CREATEBY, CREATEDATETIME, UPDATEBY, UPDATEDATETIME, ATTRIBUTE1, ATTRIBUTE2, ATTRIBUTE3', 'safe', 'on'=>'search'),
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
			'GROUP_ID' => 'Group',
			'EVA_ID' => 'Eva',
			'EVA_NO' => 'Eva No',
			'CITY_ID' => 'City',
			'EC_INCHARGE_ID' => 'Ec Incharge',
			'COOPERETION_MODE' => 'Cooperetion Mode',
			'SALES_ID' => 'Sales',
			'CUSTOMER_TYPE' => 'Customer Type',
			'CUSTOMER_LEVEL' => 'Customer Level',
			'PRE_OPENDATETIME' => 'Pre Opendatetime',
			'AREA_ID' => 'Area',
			'PRJ_CONDITION' => 'Prj Condition',
			'ISACTIVE' => 'Isactive',
			'CREATEBY' => 'Createby',
			'CREATEDATETIME' => 'Createdatetime',
			'UPDATEBY' => 'Updateby',
			'UPDATEDATETIME' => 'Updatedatetime',
			'ATTRIBUTE1' => 'Attribute1',
			'ATTRIBUTE2' => 'Attribute2',
			'ATTRIBUTE3' => 'Attribute3',
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

		$criteria->compare('GROUP_ID',$this->GROUP_ID,true);
		$criteria->compare('EVA_ID',$this->EVA_ID,true);
		$criteria->compare('EVA_NO',$this->EVA_NO,true);
		$criteria->compare('CITY_ID',$this->CITY_ID,true);
		$criteria->compare('EC_INCHARGE_ID',$this->EC_INCHARGE_ID,true);
		$criteria->compare('COOPERETION_MODE',$this->COOPERETION_MODE,true);
		$criteria->compare('SALES_ID',$this->SALES_ID,true);
		$criteria->compare('CUSTOMER_TYPE',$this->CUSTOMER_TYPE,true);
		$criteria->compare('CUSTOMER_LEVEL',$this->CUSTOMER_LEVEL,true);
		$criteria->compare('PRE_OPENDATETIME',$this->PRE_OPENDATETIME,true);
		$criteria->compare('AREA_ID',$this->AREA_ID,true);
		$criteria->compare('PRJ_CONDITION',$this->PRJ_CONDITION,true);
		$criteria->compare('ISACTIVE',$this->ISACTIVE,true);
		$criteria->compare('CREATEBY',$this->CREATEBY,true);
		$criteria->compare('CREATEDATETIME',$this->CREATEDATETIME,true);
		$criteria->compare('UPDATEBY',$this->UPDATEBY,true);
		$criteria->compare('UPDATEDATETIME',$this->UPDATEDATETIME,true);
		$criteria->compare('ATTRIBUTE1',$this->ATTRIBUTE1,true);
		$criteria->compare('ATTRIBUTE2',$this->ATTRIBUTE2,true);
		$criteria->compare('ATTRIBUTE3',$this->ATTRIBUTE3,true);

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
