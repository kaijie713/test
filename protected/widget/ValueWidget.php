<?php
class ValueWidget extends CWidget{
	public $value;
	public $default = 'null';
	
	public function init(){
	}
	
	public function run(){
        
        if (empty($this->value[0])) {

        	echo $this->default;
        } else {

        	if (is_array($this->value)) {

        		$arr1 = $this->value[0];
        		$arr2 = $this->value[1];

        		if (empty($arr1[$arr2])) {

        			echo $this->default;
        		} else {

        			echo $arr1[$arr2]['city_name'];
        		}
	        } else {

	        	echo $this->value;
	        }
        }
	}
	
}