<?php
class AdjustOutlineoutdetail extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_adjust_outlineoutdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('outl_id, eva_id, seq', 'required'),
			array('seq', 'numerical', 'integerOnly'=>true),
			array('outl_id, eva_id, out_type, createby', 'length', 'max'=>36),
			array('out_name', 'length', 'max'=>50),
			array('out_amount', 'length', 'max'=>12),
			array('isactive', 'length', 'max'=>1),
			array('createdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('outl_id, eva_id, out_type, out_name, out_amount, seq, isactive, createby, createdate', 'safe', 'on'=>'search'),
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
			'outl_id' => 'Outl',
			'eva_id' => 'Eva',
			'out_type' => 'Out Type',
			'out_name' => 'Out Name',
			'out_amount' => 'Out Amount',
			'seq' => 'Seq',
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

		$criteria->compare('outl_id',$this->outl_id,true);
		$criteria->compare('eva_id',$this->eva_id,true);
		$criteria->compare('out_type',$this->out_type,true);
		$criteria->compare('out_name',$this->out_name,true);
		$criteria->compare('out_amount',$this->out_amount,true);
		$criteria->compare('seq',$this->seq);
		$criteria->compare('isactive',$this->isactive,true);
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
	 * @return AdjustOutlineoutdetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getAdjustOutlineoutdetailMaxSeqByPdId($evaId)
	{
		$sql = "select max(seq) as seq from t_adjust_outlineoutdetail where eva_id = '".$evaId."' ";
		$result = $this->QueryRow($sql);
		return empty($result['seq']) ? 1 : $result['seq']+1;
	}

}
