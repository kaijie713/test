<?php
/* @var $this EvaluationController */
/* @var $model Evaluation */

$this->breadcrumbs=array(
	'Evaluations'=>array('index'),
	$model->EVA_ID,
);

$this->menu=array(
	array('label'=>'List Evaluation', 'url'=>array('index')),
	array('label'=>'Create Evaluation', 'url'=>array('create')),
	array('label'=>'Update Evaluation', 'url'=>array('update', 'id'=>$model->EVA_ID)),
	array('label'=>'Delete Evaluation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->EVA_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Evaluation', 'url'=>array('admin')),
);
?>

<h1>View Evaluation #<?php echo $model->EVA_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'GROUP_ID',
		'EVA_ID',
		'EVA_NO',
		'CITY_ID',
		'EC_INCHARGE_ID',
		'COOPERETION_MODE',
		'SALES_ID',
		'CUSTOMER_TYPE',
		'CUSTOMER_LEVEL',
		'PRE_OPENDATETIME',
		'AREA_ID',
		'PRJ_CONDITION',
		'ISACTIVE',
		'CREATEBY',
		'CREATEDATETIME',
		'UPDATEBY',
		'UPDATEDATETIME',
		'ATTRIBUTE1',
		'ATTRIBUTE2',
		'ATTRIBUTE3',
	),
)); ?>
