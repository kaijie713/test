<?php

/**
 * This is the model class for table "t_prform_by_eva".
 *
 * The followings are the available columns in table 't_prform_by_eva':
 * @property string $pr_id
 * @property string $group_id
 * @property string $eva_id
 * @property string $pr_number
 * @property string $prstatus
 * @property string $pramount
 * @property string $pryue
 * @property string $isactive
 * @property string $createby
 * @property string $createdate
 * @property string $updateby
 * @property string $updatedate
 */
class PrformByEva extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_prform_by_eva';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pr_id', 'required'),
			array('pr_id, group_id, eva_id, createby, updateby', 'length', 'max'=>36),
			array('pr_number', 'length', 'max'=>50),
			array('prstatus', 'length', 'max'=>10),
			array('pramount, pryue', 'length', 'max'=>13),
			array('isactive', 'length', 'max'=>1),
			array('createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pr_id, group_id, eva_id, pr_number, prstatus, pramount, pryue, isactive, createby, createdate, updateby, updatedate', 'safe', 'on'=>'search'),
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
			'pr_id' => 'Pr',
			'group_id' => 'Group',
			'eva_id' => 'Eva',
			'pr_number' => 'Pr Number',
			'prstatus' => 'Prstatus',
			'pramount' => 'Pramount',
			'pryue' => 'Pryue',
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

		$criteria->compare('pr_id',$this->pr_id,true);
		$criteria->compare('group_id',$this->group_id,true);
		$criteria->compare('eva_id',$this->eva_id,true);
		$criteria->compare('pr_number',$this->pr_number,true);
		$criteria->compare('prstatus',$this->prstatus,true);
		$criteria->compare('pramount',$this->pramount,true);
		$criteria->compare('pryue',$this->pryue,true);
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
	 * @return PrformByEva the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
