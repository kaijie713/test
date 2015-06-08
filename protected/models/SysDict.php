<?php

/**
 * This is the model class for table "sys_dict".
 *
 * The followings are the available columns in table 'sys_dict':
 * @property string $dict_id
 * @property string $dkey
 * @property string $dvalue
 * @property string $group_code
 * @property string $uper_group_code
 * @property integer $group_order
 * @property string $createby
 * @property string $createdate
 * @property string $isactive
 */
class SysDict extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sys_dict';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dict_id', 'required'),
			array('group_order', 'numerical', 'integerOnly'=>true),
			array('dict_id', 'length', 'max'=>8),
			array('dkey', 'length', 'max'=>10),
			array('dvalue', 'length', 'max'=>50),
			array('group_code, uper_group_code', 'length', 'max'=>16),
			array('createby', 'length', 'max'=>36),
			array('isactive', 'length', 'max'=>1),
			array('createdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('dict_id, dkey, dvalue, group_code, uper_group_code, group_order, createby, createdate, isactive', 'safe', 'on'=>'search'),
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
			'dict_id' => 'Dict',
			'dkey' => 'Dkey',
			'dvalue' => 'Dvalue',
			'group_code' => 'Group Code',
			'uper_group_code' => 'Uper Group Code',
			'group_order' => 'Group Order',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'isactive' => 'Isactive',
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

		$criteria->compare('dict_id',$this->dict_id,true);
		$criteria->compare('dkey',$this->dkey,true);
		$criteria->compare('dvalue',$this->dvalue,true);
		$criteria->compare('group_code',$this->group_code,true);
		$criteria->compare('uper_group_code',$this->uper_group_code,true);
		$criteria->compare('group_order',$this->group_order);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('isactive',$this->isactive,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SysDict the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function findSysDictByGroup($group, $sort = 'groupOrder')
	{
		switch ($sort) {
			case 'created':
				$sort = array('createdate','DESC');
				break;
			case 'createdByAsc':
				$sort = array('createdate','ASC');
				break;	
			case 'groupOrder':
				$sort = array('group_order','asc');
				break;			
			default:
				$sort = array('group_order','asc');
				break;
		}

		$sql = "select * from sys_dict where group_code = '$group' order by $sort[0] $sort[1]";
		$data = $this->QueryAll($sql);
		return ArrayToolkit::index($data, 'dict_id');
	}

	public function getSysDictById($id)
	{
		$id = (int) $id;
		$sql = "select * from sys_dict where dict_id = $id limit 1 ";
		return $this->QueryRow($sql);
	}

	public function getSysDictByDkeyAndGroupCode($code, $key)
	{
		$sql = "select * from sys_dict where dkey = '$key' and group_code = '$code' limit 1 ";
		return $this->QueryRow($sql);
	}

	public function findSysDictsByIds($ids)
	{
		if(empty($ids)){
			return array();
		}
		$ids = implode(",", $ids);
		$sql = "select * from sys_dict where dict_id in ($ids)";
		return $this->QueryAll($sql);
	}

}
