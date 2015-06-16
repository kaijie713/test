<?php
class Dict{
	static $dict = array(
		'evaStatus' => array(),
		'partnerType' => array(),
		'outType' => array(),
		'chargeType' => array(),
		'roles' => array(),
		'sourceType' => array(),
		'customerLevel' => array(),
		'customerType' => array(),
		'cooperation' => array(),
		'approvalType' => array(
			"1" => "同意",
			"-1" => "驳回",
		),
		'approvalStatus' => array(
			"create" => "新建",
			"commmit" => "提交",
			"commerce" => "电商审批",
			"delegate" => "首代审批",
			"finance" => "财务审批",
			"general" => "总代审批",
			"approval" => "审批通过",
		),
	);
	
	static public function _get($type, $val){
		$row = self::$dict[$type][$val];
		return empty($row)?'':$row;
	}
	static public function _gets($type){
		return self::$dict[$type];
	}
	static public function get($type, $val){
		$row = SysDict::model()->getSysDictByDkeyAndGroupCode($type, $val);
		return empty($row['dict_id'])?'':$row['dict_id'];
	}
	static public function gets($type){
		return SysDict::model()->findSysDictByGroup($type);
	}
	static public function getValue($id){
		$row = SysDict::model()->getSysDictById($id);
		return empty($row['dvalue'])?'':$row['dvalue'];
	}
}



// 'evaStatus' => array(
// 			'cj'=>'528584156529680',
// 			'shtg'=>'528584156529682',
// 			'bh'=>'528584156529683',
// 			'zstg'=>'528584156529684',
// 		),
// 		'partnerType' => array(
// 			'hzmt'=>'528584156529664',
// 			'kfs'=>'528584156513310',
// 		),
// 		'outType' => array(
// 			'xmbyj'=>'528584156513309',
// 			'zcrnlwfyze'=>'528584156513308',
// 			'kftdxxhdze'=>'528584156513307',
// 			'dxckpdfyze'=>'528584156513306',
// 		),
// 		'chargeType' => array(
// 			'mkcps'=>'528584156513305',
// 			'cpsyfc'=>'528584156513304',
// 			'cpswfc'=>'528584156513303',
// 			'mkyfc'=>'528584156513302',
// 			'mkwfc'=>'528584156513301',
// 		),
// 		'roles' => array(
// 			'dqfzr'=>'528584156496924',
// 			'dsfzr'=>'528584156496925',
// 			'xs'=>'528584156496926',
// 		),
// 		'sourceType' => array(
// 			'bz'=>'528584156513300',
// 			'ptzz'=>'528584156513299',
// 		),
// 		'customerLevel' => array(
// 			'a'=>'528584156496901',
// 			'b'=>'528584156496902',
// 			'c'=>'528584156496903',
// 			'd'=>'528584156496905',
// 		),
// 		'customerType' => array(
// 			'dlgs'=>'528584156496900',
// 			'kfs'=>'528584156496899',
// 		),
// 		'cooperation' => array(
// 			'yesld'=>'528584156496896',
// 			'lhds'=>'528584156496897',
// 			'jddj'=>'528584156496898',
// 		),