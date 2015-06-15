<?php
/* @var $this DictChengshiController */
/* @var $model DictChengshi */
?>

<?php
$this->breadcrumbs=array(
	'Dict Chengshis'=>array('index'),
	$model->city_id=>array('view','id'=>$model->city_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DictChengshi', 'url'=>array('index')),
	array('label'=>'Create DictChengshi', 'url'=>array('create')),
	array('label'=>'View DictChengshi', 'url'=>array('view', 'id'=>$model->city_id)),
	array('label'=>'Manage DictChengshi', 'url'=>array('admin')),
);
?>

    <h1>Update DictChengshi <?php echo $model->city_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>