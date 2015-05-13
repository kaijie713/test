<?php

/**
 * This is the model class for table "T_PRJEVALUATIONFORMS".
 *
 * The followings are the available columns in table 'T_PRJEVALUATIONFORMS':
 * @property string $E_ID
 * @property string $P_ID
 * @property string $PRJNAME
 * @property string $CITYID
 * @property string $CITYNAME
 * @property string $ECID
 * @property string $ECNAME
 * @property string $COOPERETIONMODE
 * @property string $SALEID
 * @property string $SALENAME
 * @property string $ACUSTOMERTYPE
 * @property string $CUSTOMERLEVEL
 * @property string $PREOPENDATE
 * @property string $PRJAREA
 * @property string $PRJCONDITION
 * @property string $CTORID
 * @property string $CTORNAME
 * @property string $CDATE
 */
class Evaluation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'T_PRJEVALUATIONFORMS';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('E_ID', 'required'),
			array('E_ID, P_ID, CITYID, ECID, SALEID, CTORID', 'length', 'max'=>36),
			array('PRJNAME, SALENAME, CTORNAME', 'length', 'max'=>100),
			array('CITYNAME', 'length', 'max'=>20),
			array('ECNAME, PRJAREA', 'length', 'max'=>50),
			array('COOPERETIONMODE, ACUSTOMERTYPE', 'length', 'max'=>2),
			array('CUSTOMERLEVEL', 'length', 'max'=>1),
			array('PRJCONDITION', 'length', 'max'=>2000),
			array('PREOPENDATE, CDATE', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('E_ID, P_ID, PRJNAME, CITYID, CITYNAME, ECID, ECNAME, COOPERETIONMODE, SALEID, SALENAME, ACUSTOMERTYPE, CUSTOMERLEVEL, PREOPENDATE, PRJAREA, PRJCONDITION, CTORID, CTORNAME, CDATE', 'safe', 'on'=>'search'),
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
			'E_ID' => 'e_id',
			'P_ID' => 'p_id',
			'PRJNAME' => '项目名称',
			'CITYID' => '城市id',
			'CITYNAME' => '城市',
			'ECID' => '电商负责人id',
			'ECNAME' => '电商负责人姓名',
			'COOPERETIONMODE' => '合作方式',
			'SALEID' => '销售id',
			'SALENAME' => '销售姓名',
			'ACUSTOMERTYPE' => '甲方客户类型',
			'CUSTOMERLEVEL' => '客户级别',
			'PREOPENDATE' => '预计开盘日期',
			'PRJAREA' => '项目地区',
			'PRJCONDITION' => '项目情况说明',
			'CTORID' => '创建人id',
			'CTORNAME' => '调整人姓名',
			'CDATE' => '创建时间',
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

		$criteria->compare('E_ID',$this->E_ID,true);
		$criteria->compare('P_ID',$this->P_ID,true);
		$criteria->compare('PRJNAME',$this->PRJNAME,true);
		$criteria->compare('CITYID',$this->CITYID,true);
		$criteria->compare('CITYNAME',$this->CITYNAME,true);
		$criteria->compare('ECID',$this->ECID,true);
		$criteria->compare('ECNAME',$this->ECNAME,true);
		$criteria->compare('COOPERETIONMODE',$this->COOPERETIONMODE,true);
		$criteria->compare('SALEID',$this->SALEID,true);
		$criteria->compare('SALENAME',$this->SALENAME,true);
		$criteria->compare('ACUSTOMERTYPE',$this->ACUSTOMERTYPE,true);
		$criteria->compare('CUSTOMERLEVEL',$this->CUSTOMERLEVEL,true);
		$criteria->compare('PREOPENDATE',$this->PREOPENDATE,true);
		$criteria->compare('PRJAREA',$this->PRJAREA,true);
		$criteria->compare('PRJCONDITION',$this->PRJCONDITION,true);
		$criteria->compare('CTORID',$this->CTORID,true);
		$criteria->compare('CTORNAME',$this->CTORNAME,true);
		$criteria->compare('CDATE',$this->CDATE,true);

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
