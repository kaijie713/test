<?php
class Transaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('transaction_id, currently, file_id', 'required'),
			array('currently', 'numerical', 'integerOnly'=>true),
			array('transaction_id, node_id, bill_id, approver_id, file_id, createby, updateby', 'length', 'max'=>36),
			array('bill_type, attribute2, attribute3, attribute4, attribute5, attribute1', 'length', 'max'=>200),
			array('content', 'length', 'max'=>2000),
			array('estate', 'length', 'max'=>10),
			array('isactive', 'length', 'max'=>1),
			array('approval_type', 'length', 'max'=>50),
			array('approval_date, createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('transaction_id, node_id, bill_type, bill_id, approver_id, approval_date, content, estate, isactive, approval_type, currently, file_id, createby, createdate, updateby, updatedate, attribute2, attribute3, attribute4, attribute5, attribute1', 'safe', 'on'=>'search'),
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
			'transaction_id' => 'Transaction',
			'node_id' => 'Node',
			'bill_type' => 'Bill Type',
			'bill_id' => 'Bill',
			'approver_id' => 'Approver',
			'approval_date' => 'Approval Date',
			'content' => 'Content',
			'estate' => 'Estate',
			'isactive' => 'Isactive',
			'approval_type' => 'Approval Type',
			'currently' => 'Currently',
			'file_id' => 'File',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
			'attribute2' => 'Attribute2',
			'attribute3' => 'Attribute3',
			'attribute4' => 'Attribute4',
			'attribute5' => 'Attribute5',
			'attribute1' => 'Attribute1',
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

		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('node_id',$this->node_id,true);
		$criteria->compare('bill_type',$this->bill_type,true);
		$criteria->compare('bill_id',$this->bill_id,true);
		$criteria->compare('approver_id',$this->approver_id,true);
		$criteria->compare('approval_date',$this->approval_date,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('estate',$this->estate,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('approval_type',$this->approval_type,true);
		$criteria->compare('currently',$this->currently);
		$criteria->compare('file_id',$this->file_id,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		$criteria->compare('attribute2',$this->attribute2,true);
		$criteria->compare('attribute3',$this->attribute3,true);
		$criteria->compare('attribute4',$this->attribute4,true);
		$criteria->compare('attribute5',$this->attribute5,true);
		$criteria->compare('attribute1',$this->attribute1,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TTransaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
