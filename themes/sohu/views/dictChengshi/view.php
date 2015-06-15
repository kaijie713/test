<?php
/* @var $this DictChengshiController */
/* @var $model DictChengshi */
?>

<?php
$this->breadcrumbs=array(
	'Dict Chengshis'=>array('index'),
	$model->city_id,
);

$this->menu=array(
	array('label'=>'List DictChengshi', 'url'=>array('index')),
	array('label'=>'Create DictChengshi', 'url'=>array('create')),
	array('label'=>'Update DictChengshi', 'url'=>array('update', 'id'=>$model->city_id)),
	array('label'=>'Delete DictChengshi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->city_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DictChengshi', 'url'=>array('admin')),
);
?>

<h1>View DictChengshi #<?php echo $model->city_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'city_id',
		'city_name',
		'simpy',
		'fullpy',
		'province',
		'isactive',
		'createby',
		'createdate',
		'updateby',
		'updatedate',
	),
)); ?>