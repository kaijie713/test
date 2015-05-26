<?php
$this->breadcrumbs=array(
    '电商评估管理'=>array('admin'),
    '新建评估单'
);
$this->pageTitle='新建评估单 - '.Yii::app()->name;
$this->script_controller = 'evaluation/create';
?>
<div class="evaluation-create">
	<div class="page-heading">
		<h1 style="color:#000">新建评估单</h1>
	</div>

	<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
	    'links' => $this->breadcrumbs,
	)); ?>

	<div id="evaluation-create-widget">

	    <form method="post" id="evaluation-form" class="form-horizontal" novalidate="novalidate" data-role="evaluation-form">

			<?php require_once('create-evaluation.php');?>
			
			<?php require_once('create-pdetail.php');?>

			<?php require_once('create-evaform-payment.php');?>

			<?php require_once('create-outlineoutdetail.php');?>

			<?php require_once('create-evaform-payment-2.php');?>


			<div class="form-group">
			    <div class="col-md-offset-1 col-md-8 controls">
			    	<button type="submit" id="evaluation-create-btn" class="btn btn-fat btn-primary">保存</button>
			    	<a class="btn btn-link" href="/index.php?r=evaluation/admin">返回</a>
			    </div>
			</div>

			<input type="hidden" name="Evaluation[group_id]" id="group_id" value="" >
			<input type="hidden" name="Evaluation[city_id]" id="city_id" value="" >
			<input type="hidden" name="Evaluation[ec_incharge_id]" id="ec_incharge_id" value="" >
			<input type="hidden" name="Evaluation[sales_id]" id="sales_id" value="" >
			<input type="hidden"  id="modalType" value="" >

	    </form>
	</div>

	

</div>
