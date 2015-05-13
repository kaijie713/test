<?php
$this->pageCaption='Create Evaluation';
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='Define a new evaluation';
$this->breadcrumbs=array(
	'Evaluations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Evaluations', 'url'=>array('index')),
	array('label'=>'Manage Evaluations', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>