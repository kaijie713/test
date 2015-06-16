<?php
class Outlineoutdetail extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_outlineoutdetail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('v_id, outl_id', 'required'),
			array('v_id, outl_id, createby, updateby', 'length', 'max'=>36),
			array('out_type, isadjust', 'length', 'max'=>2),
			array('out_name', 'length', 'max'=>50),
			array('out_amount', 'length', 'max'=>12),
			array('isactive', 'length', 'max'=>1),
			array('createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('v_id, outl_id, out_type, out_name, out_amount, isadjust, isactive, createby, createdate, updateby, updatedate', 'safe', 'on'=>'search'),
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
			'v_id' => 'V',
			'outl_id' => 'Outl',
			'out_type' => 'Out Type',
			'out_name' => 'Out Name',
			'out_amount' => 'Out Amount',
			'isadjust' => 'Isadjust',
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

		$criteria->compare('v_id',$this->v_id,true);
		$criteria->compare('outl_id',$this->outl_id,true);
		$criteria->compare('out_type',$this->out_type,true);
		$criteria->compare('out_name',$this->out_name,true);
		$criteria->compare('out_amount',$this->out_amount,true);
		$criteria->compare('isadjust',$this->isadjust,true);
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
	 * @return Outlineoutdetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findOutlineoutdetailsByVid($vid)
	{
		$sql = "select * from t_outlineoutdetail where v_id = '$vid' and isactive = 0 order by out_type,createdate desc ";
		return $this->QueryAll($sql);
	}
}
