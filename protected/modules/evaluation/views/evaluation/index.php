<?php
$this->pageCaption='Evaluations';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='List of all evaluations';
$this->breadcrumbs=array(
	'Evaluations',
);

$this->menu=array(
	array('label'=>'Create Evaluation', 'url'=>array('create')),
	array('label'=>'Manage Evaluation', 'url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
