<?php
class WebUserIdentity extends CUserIdentity
{
    private $_id;
    private $_isssd;
    public $realname;
    public $is_login;
    public $user;

    public function authenticate()
    {
        $record = User::model()->findByAttributes(array('email'=>$this->username));
        if($record===null)
        {
            $this->errorMessage = '用户名不存在';
            $this->errorCode=true;
        }
        else if($record->password!==md5($this->password))
        {
            $this->errorMessage = '密码不正确';
            $this->errorCode=true;
        }
        else
        {
            $this->_id=$record->u_id;
            $this->_isssd=$record->u_id;
            $this->errorCode = false;

            $this->setUser($record);
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($record)
    {
        $this->user=$record;
    }

}