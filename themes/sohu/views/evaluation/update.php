<?php
/* @var $this EvaluationController */
/* @var $model Evaluation */

$this->breadcrumbs=array(
	'Evaluations'=>array('index'),
	$model->EVA_ID=>array('view','id'=>$model->EVA_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Evaluation', 'url'=>array('index')),
	array('label'=>'Create Evaluation', 'url'=>array('create')),
	array('label'=>'View Evaluation', 'url'=>array('view', 'id'=>$model->EVA_ID)),
	array('label'=>'Manage Evaluation', 'url'=>array('admin')),
);
?>

<h1>Update Evaluation <?php echo $model->EVA_ID; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>