<?php
/* @var $this DictChengshiController */
/* @var $model DictChengshi */
?>

<?php
$this->breadcrumbs=array(
	'Dict Chengshis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DictChengshi', 'url'=>array('index')),
	array('label'=>'Manage DictChengshi', 'url'=>array('admin')),
);
?>

<h1>Create DictChengshi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>