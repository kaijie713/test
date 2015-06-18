<?php
class AdjustDetail extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_adjust_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('adjust_detail_id', 'required'),
			array('pre_volumn, prevolumn_perunit, prebrokervolumn, isactive', 'numerical', 'integerOnly'=>true),
			array('adjust_detail_id, ad_id, pd_id, createby', 'length', 'max'=>36),
			array('createdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('adjust_detail_id, ad_id, pd_id, pre_volumn, prevolumn_perunit, prebrokervolumn, isactive, createby, createdate', 'safe', 'on'=>'search'),
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
			'adjust_detail_id' => 'Adjust Detail',
			'ad_id' => 'Ad',
			'pd_id' => 'Pd',
			'pre_volumn' => 'Sell House Num',
			'prevolumn_perunit' => 'Prevolumn Perunit',
			'prebrokervolumn' => 'Prebrokervolumn',
			'isactive' => 'Isactive',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
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

		$criteria->compare('adjust_detail_id',$this->adjust_detail_id,true);
		$criteria->compare('ad_id',$this->ad_id,true);
		$criteria->compare('pd_id',$this->pd_id,true);
		$criteria->compare('pre_volumn',$this->pre_volumn);
		$criteria->compare('prevolumn_perunit',$this->prevolumn_perunit);
		$criteria->compare('prebrokervolumn',$this->prebrokervolumn);
		$criteria->compare('isactive',$this->isactive);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdjustDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getAdjustDetailMaxSeqByPdId($pdId)
	{
		$sql = "select max(seq) as seq from t_adjust_detail where pd_id = '".$pdId."' ";
		$result = $this->QueryRow($sql);
		return empty($result['seq']) ? 1 : $result['seq']+1;
	}

}
