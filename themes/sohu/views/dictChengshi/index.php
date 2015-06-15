<?php
/* @var $this DictChengshiController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Dict Chengshis',
);

$this->menu=array(
	array('label'=>'Create DictChengshi','url'=>array('create')),
	array('label'=>'Manage DictChengshi','url'=>array('admin')),
);
?>

<h1>Dict Chengshis</h1>

<?php $this->widget('YiiStrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>