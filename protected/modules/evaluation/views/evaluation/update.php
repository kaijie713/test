<?php
$this->pageCaption='Update Evaluation '.$model->E_ID;
$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
$this->pageDescription='';
$this->breadcrumbs=array(
	'Evaluations'=>array('index'),
	$model->E_ID=>array('view','id'=>$model->E_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Evaluations', 'url'=>array('index')),
	array('label'=>'Create Evaluation', 'url'=>array('create')),
	array('label'=>'View Evaluation', 'url'=>array('view', 'id'=>$model->E_ID)),
	array('label'=>'Manage Evaluations', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>