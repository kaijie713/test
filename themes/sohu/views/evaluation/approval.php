<?php
$this->pageTitle='审批评估单 - '.Yii::app()->name;
$this->script_controller = 'evaluation/approval';
?>

<div id="content-header">
    <div id="breadcrumb"> 
    	<a class="tip-bottom" href="/index.php?r=evaluation/admin" data-original-title="去首页"><i class="icon-home"></i> 首页</a> 
    	<a  href="/index.php?r=evaluation/admin">评估单列表</a> 
    	<a class="current" href="#">审批评估单</a> </div>
</div>

<div class="container-fluid">
	<hr>
	<div class="row-fluid evaluation-create">
		<div class="span12" id="evaluation-create-widget">

				    <form method="post" id="evaluation-form" class="form-horizontal" enctype="multipart/form-data" novalidate="novalidate" data-role="evaluation-form">

<div class="widget-box">
	<div class="widget-title"><h5>项目基本情况</h5></div>
	<div class="widget-content nopadding ">
		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label">项目名称：</label>
				<div class="controls">
					<span class="form-control" readonly ><?php echo $hourse['group_name'];?></span>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="city_name">城市：</label>
				<div class="controls">
					<span class="form-control" readonly ><?php echo $city['city_name'];?></span>
				</div>
			</div>
			
		</div>

		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label" for="userName">申请人：</label>
				<div class="controls">
					<span class="form-control" readonly ><?php echo $user['name'];?></span>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="ec_incharge_name">电商负责人：</label>
				<div class="controls">
					<span class="form-control" readonly ><?php echo $ecIncharge['name'];?></span>
				</div>
			</div>
			
		</div>

			<div class="clear">
			</div>
	</div>
</div>

<div class="widget-box">
	<div class="widget-title"><h5>优惠明细</h5></div>
	<div class="widget-content nopadding">
		<table class="table table-striped table-hover table-form" data-search-form="#user-search-form" >
		  <thead>
		    <tr>
		      <th width="3%">行号</th>
		      <th width="10%">开始时间</th>
		      <th width="10%">结束时间</th>
		      <th width="8%">可售房源数量</th>
		      <th width="8%">房源类型</th>
		      <th width="7%">预计毛收入</th>
		      <th width="9%">收费方式</th>
		      <th width="10%">操作</th>
		    </tr>
		  </thead>
		  <tbody id="pdetail-body" data-role="pdetails">
		  	<?php $i = 1;?>
		  	<?php foreach ($pdetails as $key => $pdetail) {?>
			  	<tr>
				  <td class="code"><?php echo $i;?></td>
				  <td><p class="form-control-static"><?php echo $pdetail['bdate'];?></td>
				  <td><p class="form-control-static"><?php echo $pdetail['bdate'];?></td>
				  <td><p class="form-control-static"><?php echo $pdetail['sell_house_num'];?>套</td>
				  <?php 
				  	$sourceType = Dict::gets('sourceType');
				  	$chargeType = Dict::gets('chargeType');
				  ?>
				  <td><p class="form-control-static"><?php echo $sourceType[$pdetail['source_type']]['dvalue'];?></td>
				  <td><p class="form-control-static"><?php echo $pdetail['pre_incoming'];?>元</p></td>
				  <td><p class="form-control-static"><?php echo $chargeType[$pdetail['charge_type']]['dvalue'];?></td>
				  <td>
				  	  <button type="button" class="btn btn-default btn-sm" data-url="/index.php?r=Pdetail/Update&id={{pdid}}" data-toggle="modal" data-target="#modal">查看详情</button>
				  </td>
				</tr>
			<?php $i++;   }?>
	 	  </tbody>
		</table>
	<div class="clear">
	</div>
	</div>
</div>

<div class="widget-box">
	<div class="widget-title"><h5>预期收益</h5></div>
	<div class="widget-content nopadding">
		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label">可售房源总数：</label>
				<div class="controls">
					<p class="form-control-static sell_house_sum" ></p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">预计成交总额：</label>
				<div class="controls">
					<p class="form-control-static pre_amount_sum">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="pre_ad_amount">保底广告费金额：</label>
				<div class="controls">
					<p class="form-control-static sell_house_sum" ><?php echo $evaformPayment['pre_ad_amount'];?>元</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">预计焦点净收益：</label>
				<div class="controls">
					<p class="form-control-static net_income">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">第三方分成比例：</label>
				<div class="controls">
					<p class="form-control-static splitdetail_divide_sum">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="pre_tax_ratio">税金比例：</label>
				<div class="controls">
					<p class="form-control-static sell_house_sum" ><?php echo $evaformPayment['pre_tax_ratio'];?>%</p>
				</div>
			</div>

		</div>
		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label">预计成交套数：</label>
				<div class="controls">
					<p class="form-control-static pre_volumn_sum">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">预计焦点毛收入：</label>
				<div class="controls">
					<p class="form-control-static pre_incoming">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="pre_ad_deal_bind1">保底广告费是否和成交绑定：</label>
				<div class="controls">
					<p class="form-control-static pre_incoming"><?php if($evaformPayment['pre_ad_deal_bind'] == 0) {?>否<?php } else {?>是<?php }?></p>
				</div>
				<div style="" class="y"><span class="text-danger"></span></div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">线下总支出比例：</label>
				<div class="controls">
					<p class="form-control-static offline_ratio">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">开发商分成比例：</label>
				<div class="controls">
					<p class="form-control-static developers_divide_sum">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">营销费用比例：</label>
				<div class="controls">
					<p class="form-control-static ad_markting_ratio">0</p>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>

<div class="widget-box">
	<div class="widget-title"><h5>广告资源</h5></div>
	<div class="widget-content nopadding">
		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label" for="ad_discount">广告折扣：</label>
				<div class="controls">
					<p class="help-block ad_discount"><?php echo $evaformPayment['ad_discount'];?></p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">按销售政策计算广告刊例金额：</label>
				<div class="controls">
					<p class="help-block sale_ad_kanli_amount"><?php echo $evaformPayment['sale_ad_kanli_amount'];?></p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">资源比预计收入倍数：</label>
				<div class="controls">
					<p class="form-control-static resource_income_multiples"><?php echo $evaformPayment['resource_income_multiples'];?></p>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label" for="ad_distribution_ratio">广告配送比：</label>
				<div class="controls">
					<p class="help-block ad_distribution_ratio"><?php echo $evaformPayment['ad_distribution_ratio'];?></p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="ad_amount_infact">实际申请的广告刊例金额：</label>
				<div class="controls">
					<p class="help-block ad_amount_infact"><?php echo $evaformPayment['ad_amount_infact'];?></p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="ad_markting_ratio">营销费用比例：</label>
				<div class="controls">
					<p class="help-block ad_markting_ratio"><?php echo $evaformPayment['ad_markting_ratio'];?></p>
				</div>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>

<div class="widget-box">
	<div class="widget-title"><h5>线下支出</h5></div>
	<div class="widget-content nopadding ">
		<div class="evaform-outlineoutdetail-base span12">
			<div class="span6">
				<div class="control-group form-group">
					<label class="control-label">线下总支出：</label>
					<div class="controls">
						<p class="form-control-static offline_amount"><?php echo $evaformPayment['offline_amount'];?></p>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">案场奖励总额：</label>
					<div class="controls">
						<p class="form-control-static prjreword_perunit_sum"><?php echo $evaformPayment['prjreword_perunit_sum'];?></p>
					</div>
				</div>
				<div class="control-group form-group ">
					<div >
						<label class="control-label">短信、call客、 派单费用总额：</label>
						<div class="controls">
							<p class="form-control-static"><?php echo $evaformPayment['ol_fee1'];?></p>

						</div>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">看房团及其它线下活动费用总额：</label>
					<div class="controls">
						<p class="form-control-static"><?php echo $evaformPayment['ol_fee3'];?></p>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="control-group form-group">
					<label class="control-label">线下总支出比例：</label>
					<div class="controls">
						<p class="form-control-static offline_ratio"><?php echo $evaformPayment['offline_ratio'];?></p>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">门店经纪人服务费总额：</label>
					<div class="controls">
						<p class="form-control-static  brokerfees_perunit_sum"><?php echo $evaformPayment['brokerfees_perunit_sum'];?></p>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">驻场人员劳务费总额：</label>
					<div class="controls">
						<p class="form-control-static "><?php echo $evaformPayment['ol_fee2'];?></p>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">项目备用金：</label>
					<div class="controls">
						<p class="form-control-static"><?php echo $evaformPayment['ol_fee84'];?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"> </div>
	</div>
</div>

<div class="widget-box">
	<div class="widget-title"><h5>审批信息</h5></div>
	<div class="widget-content nopadding">
		<table class="table table-striped table-hover table-form" data-search-form="#user-search-form" >
		  <thead>
		    <tr>
		      <th width="25%">审批人</th>
		      <th width="25%">审批时间</th>
		      <th width="20%">审批动作</th>
		      <th width="20%">审批意见</th>
		      <th width="10%">附件</th>
		    </tr>
		  </thead>
		  <tbody id="pdetail-body" data-role="pdetails">
		  	<?php $i = 1;?>
		  	<?php foreach ($logs as $key => $log) {?>
			  	<tr>
				  <td><p class="form-control-static"><?php echo $log['uname'];?></td>
				  <td><p class="form-control-static"><?php echo $log['createdate'];?></td>
				  <td><p class="form-control-static"><?php echo $log['ddvalue'];?></td>
				  <td><p class="form-control-static"><?php echo $log['content'];?></td>
				  <td>
				  	<?php if(!empty($log['attachment'])) {?>
				  	  <a  class="btn btn-default btn-sm" target="_blank" href="/index.php?r=Evaluation/LogAttachmentDownload&id=<?php echo $log['id'];?>" >附件下载</a>
				  	  <?php }?>
				  </td>
				</tr>
			<?php $i++;   }?>
	 	  </tbody>
		</table>
		<div class="mtl">
			<?php if(!empty($isApproval)){?>
			<textarea name="Approval[content]" style="width:50%;height:100px;margin:10px;" class="pull-left" placeholder="请输入审批意见"></textarea>
			<div class="pull-left">
				附件:
				<input type="file" name="attachment" value="上传附件"/>
			</div>
			<?php }?>


		</div>
	<div class="clear">
	</div>
	</div>
</div>


						<div class="form-group">
						    <div class="pull-right span3 controls">
						    	<?php if(!empty($isApproval)){?>
						    	<button type="button" data-role = "1" class="btn btn-success btn-submit">通过</button>
						    	<button type="button" data-role = "0" class="btn btn-success btn-submit">驳回</button>
						    	<a class="btn btn-link" href="/index.php?r=evaluation/admin">返回</a>
						    	<?php } else {?>
						    	<a href="/index.php?r=evaluation/admin" class="btn btn-default">返回</a>
						    	<?php }?>

						    </div>
						</div>

					<input type="hidden" name="Approval[flag]" id="flag" value="">
				    </form>
				</div>




	</div>
</div>
