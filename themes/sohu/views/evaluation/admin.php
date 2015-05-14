<?php
/* @var $this EvaluationController */
/* @var $model Evaluation */

$this->breadcrumbs=array(
	'Evaluations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Evaluation', 'url'=>array('index')),
	array('label'=>'Create Evaluation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#evaluation-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Evaluations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'evaluation-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'GROUP_ID',
		'EVA_ID',
		'EVA_NO',
		'CITY_ID',
		'EC_INCHARGE_ID',
		'COOPERETION_MODE',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
