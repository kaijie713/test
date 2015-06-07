<?php
class Dict{
	static $dict = array(
		'evaStatus' => array(
			'cj'=>'528584156529680',
			'shtg'=>'528584156529682',
			'1'=>'528584156529682',
			'bh'=>'528584156529683',
			'0'=>'528584156529683',
			'zstg'=>'528584156529684',
		),
		'partnerType' => array(
			'hzmt'=>'528584156529664',
			'kfs'=>'528584156513310',
		),
		'outType' => array(
			'xmbyj'=>'528584156513309',
			'zcrnlwfyze'=>'528584156513308',
			'kftdxxhdze'=>'528584156513307',
			'dxckpdfyze'=>'528584156513306',
		),
		'chargeType' => array(
			'mkcps'=>'528584156513305',
			'cpsyfc'=>'528584156513304',
			'cpswfc'=>'528584156513303',
			'mkyfc'=>'528584156513302',
			'mkwfc'=>'528584156513301',
		),
		'roles' => array(
			'dqfzr'=>'528584156496924',
			'dsfzr'=>'528584156496925',
			'xs'=>'528584156496926',
		),
		'sourceType' => array(
			'bz'=>'528584156513300',
			'ptzz'=>'528584156513299',
		),
		'customerLevel' => array(
			'a'=>'528584156496901',
			'b'=>'528584156496902',
			'c'=>'528584156496903',
			'd'=>'528584156496905',
		),
		'customerType' => array(
			'dlgs'=>'528584156496900',
			'kfs'=>'528584156496899',
		),
		'cooperation' => array(
			'yesld'=>'528584156496896',
			'lhds'=>'528584156496897',
			'jddj'=>'528584156496898',
		),
	);
	
	static public function get($type, $val){
		return self::$dict[$type][$val];
	}

	static public function gets($type){
		return SysDict::model()->findSysDictByGroup($type);
	}
}
