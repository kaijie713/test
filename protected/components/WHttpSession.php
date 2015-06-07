<?php
class WHttpSession extends CHttpSession
{

  // $arr = array(array(array(1,1,2),array(1,2,3)),array(array(4,5,6),array(7,8,9))); 
  // Yii::app()->session->add('test',$arr);  
  // $tt =  Yii::app()->session->get('test.1');  
  // print_r($tt);
  public function get ($key, $default=null )
  {
    $see = $default;
    $key = explode(".",$key);
    if (count($key)>=2) {
      if(isset($_SESSION[$key[0]])) {
        $see =$_SESSION[$key[0]];
        $i=0;
        foreach($key as $v) {	
          $i++;
          if($i==1)
            continue;
            $see = $see[$v];
        }	
      }
    } else {
      if (isset($_SESSION[$key[0]])) {
        $see = $_SESSION[$key[0]];
      }
    }
    return $see;
  }
 
  public function setFlashBag ($key, array $value)
  {
      if ($this->get($key)) { 
          $this->add($key, $this->get($key) + $value); 
      }else{
          $this->add($key, $value); 
      }
  }

  

}