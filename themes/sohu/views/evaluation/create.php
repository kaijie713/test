<?php
$this->pageTitle='新建评估单 - '.Yii::app()->name;
$this->script_controller = 'evaluation/create';
?>

<div id="content-header">
    <div id="breadcrumb"> <a class="tip-bottom" href="/index.php?r=evaluation/admin" data-original-title="去首页"><i class="icon-home"></i> 首页</a> <a class="current" href="#">创建评估单</a> </div>
    <h1>新建评估单</h1>
</div>

<div class="container-fluid">
	<hr>
	<div class="row-fluid evaluation-create">
		<div class="span12" id="evaluation-create-widget">

		    <form method="post" id="evaluation-form" class="form-horizontal" novalidate="novalidate" data-role="evaluation-form">

				<?php require_once('create-evaluation.php');?>

				<?php require_once('create-pdetail.php');?>

				<?php require_once('create-evaform-payment-2.php');?>

				<?php require_once('create-evaform-payment.php');?>

				<?php require_once('create-outlineoutdetail.php');?>

				<div class="form-group  evaluation-bottom" >
				    <div class="offset1 span4 controls pull-right">
				    	<button type="submit" id="evaluation-create-btn" class="btn btn-fat btn-primary">保存</button>
				    	<a class="btn btn-link" href="/index.php?r=evaluation/admin">返回</a>
				    </div>
				</div>

				<input type="hidden" name="Evaluation[hourse_id]" id="hourse_id" value="" >
				<input type="hidden" name="Evaluation[city_id]" id="city_id" value="" >
				<input type="hidden" name="Evaluation[ec_incharge_id]" id="ec_incharge_id" value="" >
				<input type="hidden" name="Evaluation[sales_id]" id="sales_id" value="" >

				<input type="hidden"  id="modalType" value="" >

				<div class="float-consult" id="float-consult" style="margin-top: -21.5px; visibility: visible;">
				    <div class="consult-contents">
				      <button type="button" class="btn btn-success" data-role="btn-calculator">计算数值</button>
				    </div>
				  </div>
				  <input type="hidden" name="YII_CSRF_TOKEN" value="<?php echo Yii::app()->request->getCsrfToken();?>">
		    </form>
		</div>



	</div>
</div>
