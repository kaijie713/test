<?php
class WorkflowAll extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_workflow_all';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('workflow_id', 'required'),
			array('workflow_id, createby, updateby', 'length', 'max'=>36),
			array('workflow_name, workflow_code, attribute1, attribute2, attribute3, attribute4, attribute5', 'length', 'max'=>200),
			array('description', 'length', 'max'=>400),
			array('disabled', 'length', 'max'=>1),
			array('disable_date, enable_date, createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('workflow_id, workflow_name, workflow_code, description, disabled, disable_date, enable_date, createby, createdate, updateby, updatedate, attribute1, attribute2, attribute3, attribute4, attribute5', 'safe', 'on'=>'search'),
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
			'workflow_id' => 'Workflow',
			'workflow_name' => 'Workflow Name',
			'workflow_code' => 'Workflow Code',
			'description' => 'Description',
			'disabled' => 'Disabled',
			'disable_date' => 'Disable Date',
			'enable_date' => 'Enable Date',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
			'attribute1' => 'Attribute1',
			'attribute2' => 'Attribute2',
			'attribute3' => 'Attribute3',
			'attribute4' => 'Attribute4',
			'attribute5' => 'Attribute5',
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

		$criteria->compare('workflow_id',$this->workflow_id,true);
		$criteria->compare('workflow_name',$this->workflow_name,true);
		$criteria->compare('workflow_code',$this->workflow_code,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('disabled',$this->disabled,true);
		$criteria->compare('disable_date',$this->disable_date,true);
		$criteria->compare('enable_date',$this->enable_date,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);
		$criteria->compare('attribute1',$this->attribute1,true);
		$criteria->compare('attribute2',$this->attribute2,true);
		$criteria->compare('attribute3',$this->attribute3,true);
		$criteria->compare('attribute4',$this->attribute4,true);
		$criteria->compare('attribute5',$this->attribute5,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TWorkflowAll the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
