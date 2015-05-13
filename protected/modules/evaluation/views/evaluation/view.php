<?php
$this->pageCaption='View Evaluation #'.$model->E_ID;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Evaluations'=>array('index'),
	$model->E_ID,
);

$this->menu=array(
	array('label'=>'List Evaluations', 'url'=>array('index')),
	array('label'=>'Create Evaluation', 'url'=>array('create')),
	array('label'=>'Update Evaluation', 'url'=>array('update', 'id'=>$model->E_ID)),
	array('label'=>'Delete Evaluation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->E_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Evaluations', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'baseScriptUrl'=>false,
	'cssFile'=>false,
	'attributes'=>array(
		'E_ID',
		'P_ID',
		'PRJNAME',
		'CITYID',
		'CITYNAME',
		'ECID',
		'ECNAME',
		'COOPERETIONMODE',
		'SALEID',
		'SALENAME',
		'ACUSTOMERTYPE',
		'CUSTOMERLEVEL',
		'PREOPENDATE',
		'PRJAREA',
		'PRJCONDITION',
		'CTORID',
		'CTORNAME',
		'CDATE',
	),
)); ?>
