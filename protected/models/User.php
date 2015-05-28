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

	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'newscomment' => array(self::HAS_MANY, 'NewsComment', 'u_id'), 
			'myMessage' => array(self::HAS_MANY, 'Message', 'receiver_uid'),
			'sendMessage' => array(self::HAS_MANY, 'Message', 'sender_uid'),
		);
	}

	public function check_user($attribute,$params)
    {
        $this->_identity = new WebUserIdentity($this->email,$this->password);
        $res = $this->_identity->authenticate();	

        if($res == true){
        	$duration=3600*24*30; // 30 days  
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

}