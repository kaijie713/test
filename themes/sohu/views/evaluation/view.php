<?php
/* @var $this EvaluationController */
/* @var $model Evaluation */

$this->breadcrumbs=array(
	'Evaluations'=>array('index'),
	$model->eva_id,
);

$this->menu=array(
	array('label'=>'List Evaluation', 'url'=>array('index')),
	array('label'=>'Create Evaluation', 'url'=>array('create')),
	array('label'=>'Update Evaluation', 'url'=>array('update', 'id'=>$model->eva_id)),
	array('label'=>'Delete Evaluation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->eva_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Evaluation', 'url'=>array('admin')),
);
?>

<h1>View Evaluation #<?php echo $model->eva_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'group_id',
		'eva_id',
		'eva_no',
		'city_id',
		'ec_incharge_id',
		'cooperetion_mode',
		'sales_id',
		'customer_type',
		'customer_level',
		'pre_opendatetime',
		'area_id',
		'prj_condition',
		'isactive',
		'createby',
		'createdate',
		'updateby',
		'updatedate',
		'attribute1',
		'attribute2',
		'attribute3',
	),
)); ?>

