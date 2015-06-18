<?php
class User extends BaseModel {

	public $remember_me;
	public $_identity;
	public $error;

	public function tableName() {
		return 'user';
	}

	public function rules() {

		return array( 
			array('password, email', 'required'), 
			array('email, password', 'length', 'max' => 32), array('created', 'safe'),
			array('password', 'check_user'),
			array('u_id, email, name, password, created', 'safe', 'on' => 'search'), 
			array('remember_me, email', 'safe'), 
		);
	}

	// public function rules()
	// {
	// 	// NOTE: you should only define rules for those attributes that
	// 	// will receive user inputs.
	// 	return array(
	// 		array('u_id, name, employee_number, email, roles, createby, createdate, updateby, updatedate', 'required'),
	// 		array('u_id, name, employee_number, createby, updateby', 'length', 'max'=>36),
	// 		array('email', 'length', 'max'=>65),
	// 		array('roles', 'length', 'max'=>255),
	// 		// The following rule is used by search().
	// 		// @todo Please remove those attributes that should not be searched.
	// 		array('u_id, name, employee_number, email, roles, createby, createdate, updateby, updatedate', 'safe', 'on'=>'search'),
 // 		);
 // 	}

	public function attributeLabels()
	{
		return array(
			'u_id' => 'U',
			'name' => 'Name',
			'employee_number' => 'Employee Number',
			'email' => 'Email',
			'roles' => 'Roles',
			'createby' => 'Createby',
			'createdate' => 'Createdate',
			'updateby' => 'Updateby',
			'updatedate' => 'Updatedate',
		);
	}

	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'newscomment' => array(self::HAS_MANY, 'NewsComment', 'u_id'), 
			'myMessage' => array(self::HAS_MANY, 'Message', 'receiver_uid'),
			'sendMessage' => array(self::HAS_MANY, 'Message', 'sender_uid'),
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('u_id',$this->u_id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('employee_number',$this->employee_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('roles',$this->roles,true);
		$criteria->compare('createby',$this->createby,true);
		$criteria->compare('createdate',$this->createdate,true);
		$criteria->compare('updateby',$this->updateby,true);
		$criteria->compare('updatedate',$this->updatedate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function check_user($attribute,$params)
    {
        $this->_identity = new WebUserIdentity($this->email,$this->password);
        $res = $this->_identity->authenticate();	
        if($res == true){
        	// $duration=3600*24*7; // 30 days  
        	// $duration=1; // 30 days  
        	$duration=Yii::app()->params['sessionTimeoutSeconds'];
        	// $duration=$this->remember_me ? 3600*24*30 : 0; // 30 days  
        	Yii::app()->user->login($this->_identity,$duration); 
        	// $this->error = 
            return true;
        }else{
            return false;
        }
    }

    public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function searchUsers($condition,$pageIndex,$pageSize,$sort = 'createDate')
    {
		   	switch ($sort) {
				case 'createDate':
					$sort = array('createdate','DESC');
					break;
				default:
					$sort = array('createdate','asc');
					break;
			}

		    $select = ' * ';
		    $sql = User::searchUsersSql($select,$condition);

		    $count = $this->RowCount(User::searchUsersSql('count(*)',$condition));
		    $start = ($pageIndex - 1)*$pageSize;
		    $sql .= " ORDER BY $sort[0] $sort[1] LIMIT $start,$pageSize";
		    
		    return array('items'=>$this->QueryAll($sql),'count'=>$count);
    }
 
	public function searchUsersSql($select,$condition)
	{
	    $sql = "SELECT {$select} FROM user WHERE 1";

	    if (!empty($condition)) 
		{
			if(!empty($condition['multiple'])){
				$sql .= " and CONCAT(name,employee_number,email) like '%".$condition['multiple']."%' ";
			}
		};

		$sql .= " and isactive = 0 ";

	    return $sql;
	}

	public function findUsersByIds($ids)
	{
		if(empty($ids)){
			return array();
		}
		$ids = implode("','", $ids);
		$sql = "select * from user where u_id in ('$ids')";
		return $this->QueryAll($sql);
	}

}