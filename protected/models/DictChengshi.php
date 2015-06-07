<?php
class DictChengshi extends BaseModel
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dict_chengshi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id', 'required'),
			array('city_id, createby, updateby', 'length', 'max'=>36),
			array('city_name, province', 'length', 'max'=>20),
			array('simpy', 'length', 'max'=>10),
			array('fullpy', 'length', 'max'=>100),
			array('isactive', 'length', 'max'=>1),
			array('createdate, updatedate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('city_id, city_name, simpy, fullpy, province, isactive, createby, createdate, updateby, updatedate', 'safe', 'on'=>'search'),
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
			'city_id' => 'Citys',
			'city_name' => 'City Name',
			'simpy' => 'Simpy',
			'fullpy' => 'Fullpy',
			'province' => 'Province',
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

		$criteria->compare('city_id',$this->city_id,true);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('simpy',$this->simpy,true);
		$criteria->compare('fullpy',$this->fullpy,true);
		$criteria->compare('province',$this->province,true);
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
	 * @return DictChengshi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function searchDictChengshis($condition,$pageIndex,$pageSize,$sort = 'createDate')
    {
    	switch ($sort) {
			case 'createDate':
				$sort = array('createdate','DESC');
				break;
			case 'cityName':
				$sort = array('city_name','DESC');
				break;
			default:
				$sort = array('createdate','asc');
				break;
		}

        $select = ' * ';
        $sql = DictChengshi::searchDictChengshiSql($select,$condition);

        $count = $this->RowCount(DictChengshi::searchDictChengshiSql('count(*)',$condition));
        $start = ($pageIndex - 1)*$pageSize;
        $sql .= " ORDER BY $sort[0] $sort[1] LIMIT $start,$pageSize";

        return array('items'=>$this->QueryAll($sql),'count'=>$count);
    }

    public function searchDictChengshiSql($select,$condition)
    {
        $sql = "SELECT {$select}
        FROM dict_chengshi WHERE 1";

        if (!empty($condition)) 
    	{
    		if(!empty($condition['id']))
    			$sql .= " and city_id = '".$condition['id']."' ";

    		if(!empty($condition['ids']))
    			$sql .= " and city_id in ( ".join (',', $condition['ids']).")";

    		if(!empty($condition['city_name']))
    			$sql .= " and city_name like '%".$condition['city_name']."%' ";
    	};
    	$sql .= " and isactive = 0 ";

        return $sql;
    }

    public function findictChengshisByIds($ids)
	{
		if(empty($ids)){
			return array();
		}
		$ids = implode(",", $ids);
		$sql = "select * from dict_chengshi where city_id in ($ids)";
		return $this->QueryAll($sql);
	}

}
