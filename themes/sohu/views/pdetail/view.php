<?php
$this->pageTitle='结案报告查看 - '.Yii::app()->name;
// $this->script_controller = 'evaluation/create';
?>

<div id="content-header">
    <div id="breadcrumb"> 
    	<a class="tip-bottom" href="/index.php?r=evaluation/admin" data-original-title="去首页">
    		<i class="icon-home"></i> 首页</a> 
    		<a class="current" href="/index.php?r=evaluation/view&id=<?php echo $model->eva_id;?>">查看评估单</a> 
    		<a class="current" href="#">结案报告查看</a> 
    	</div>
    <h1>结案报告查看</h1>
</div>

<div class="container-fluid">
	<hr>
	<div class="row-fluid evaluation-create">
		<div class="span12" id="evaluation-create-widget">


<div class="widget-box">
	<div class="widget-title"><h5>项目明细信息</h5></div>
	<div class="widget-content nopadding">
		<div class="row-fluid wt-at form-horizontal" >
			<div class="span6">
				<div class="form-group control-group">
					<label class="control-label" for="bdate">开始时间：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo F::ymd($model->bdate);?>
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="sell_house_num">可售房源数量：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo $model->sell_house_num;?>套
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="yujimaoshouru">预计毛收入：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo F::d2($model->pre_incoming);?>元
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="ajcard_price">爱家卡单价：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo F::d2($model	->ajcard_price);?>元
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="prjreword_perunit">案场奖励/每套：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo F::d2($model->prjreword_perunit);?>元
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="brokerfees_perunit">经纪人服务费/每套：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo F::d2($model->brokerfees_perunit);?>元
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="jd_retain_ratio">焦点留存比例：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo $model->jd_retain_ratio;?>%
						</span>
					</div>
				</div>
			</div>

			<div class="span6">
				
				<div class="form-group control-group">
					<label class="control-label" for="edate">结束时间：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo F::ymd($model->edate);?>元
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="source_type">房源类型：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo  Dict::getValue($model->source_type);?>
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="">收费方式：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo $chargeType['dvalue'];?>
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="pre_volumn">预计成交套数：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo $model->pre_volumn;?>套
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="prevolumn_perunit">预估案场奖励成交套数：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo $model->prevolumn_perunit;?>套
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="prebrokervolumn">预计经纪人成交套数：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo $model->prebrokervolumn;?>套
						</span>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="jd_retain_amount">焦点留存金额：</label>
					<div class="controls">
						<span class="help-block">
							<?php echo F::d2($model->jd_retain_amount);?>元
						</span>
					</div>
				</div>
		    </div>

		    <div class="form-group control-group span12">
				<label class="span3 control-label" for="pref_context">优惠情况</label>
				<div class="controls">
					<span class="help-block">
							<?php echo isset($model['pref_context'])?$model['pref_context']:'';?>
						</span>
				</div>
			</div>

			<?php if(!empty($splitdetails)){?>
				<script type="text/plain" data-role="splitdetails-data"><?php  echo $splitdetails;?></script>
			<?php }?>
		    <?php //include('splitdetail-modal.php');?>

	<div class="clear">
	</div>
	</div>
</div>









		</div>



	</div>
</div>
