<?php
/* @var $this SysWorkflowNodeController */
/* @var $model SysWorkflowNode */

$this->breadcrumbs=array(
	'Sys Workflow Nodes'=>array('index'),
	$model->node_id,
);

$this->menu=array(
	array('label'=>'List SysWorkflowNode', 'url'=>array('index')),
	array('label'=>'Create SysWorkflowNode', 'url'=>array('create')),
	array('label'=>'Update SysWorkflowNode', 'url'=>array('update', 'id'=>$model->node_id)),
	array('label'=>'Delete SysWorkflowNode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->node_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SysWorkflowNode', 'url'=>array('admin')),
);
?>

<h1>View SysWorkflowNode #<?php echo $model->node_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'workflow_id',
		'node_id',
		'node_name',
		'node_code',
		'node_type',
		'previous_node_id',
		'next_node_id',
		'rejected_node_id',
		'purview_type',
		'description',
		'attribute1',
		'attribute2',
		'attribute3',
		'attribute4',
		'attribute5',
		'disabled',
		'enable_date',
		'disable_date',
		'createby',
		'createdate',
		'updateby',
		'updatedate',
		'approval_type',
		'overrule',
	),
)); ?>
