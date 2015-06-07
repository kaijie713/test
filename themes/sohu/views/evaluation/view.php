<?php
$this->pageTitle='调整评估单 - '.Yii::app()->name;
// $this->script_controller = 'evaluation/create';
?>

<div id="content-header">
    <div id="breadcrumb"> <a class="tip-bottom" href="/index.php?r=evaluation/admin" data-original-title="去首页"><i class="icon-home"></i> 首页</a> <a class="current" href="#">创建评估单</a> </div>
    <h1>调整评估单</h1>
</div>

<div class="container-fluid">
	<hr>
	<div class="row-fluid evaluation-create">
		<div class="span12" id="evaluation-create-widget">

				    <form method="post" id="evaluation-form" class="form-horizontal" novalidate="novalidate" data-role="evaluation-form">



<div class="widget-box">
	<div class="widget-title"><h5>项目基本情况</h5></div>
	<div class="widget-content nopadding ">
		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label" for="group_name">单据编号：</label>
				<div class="controls">
					<span class="help-block"><?php echo $model->eva_id;?></span>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="group_name">项目名称：</label>
				<div class="controls">
					<span class="help-block"><?php echo $project['group_name'];?></span>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="city_name">城市：</label>
				<div class="controls">
					<span class="help-block"><?php echo $city['city_name'];?></span>
				</div>
			</div>
			<div class="control-group form-group">
			  <label class="control-label"  for="cooperetion_mode">合作方式：</label>
			  <div class="controls">
					<span class="help-block"><?php echo Dict::getValue($model->cooperetion_mode);?></span>
			  </div>
			</div>
			<div class="control-group form-group">
			  <label class="control-label"  for="customer_type">甲方客户类型：</label>
			  <div class="controls">
					<span class="help-block"><?php echo Dict::getValue($model->customer_type);?></span>
			  </div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="pre_opendatetime">预计开盘时间：</label>
				<div class="controls">
					<span class="help-block"><?php F::ymd($model->pre_opendatetime);?></span>
				</div>
			</div>
		</div>

		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label" for="userName">申请状态：</label>
				<div class="controls">
					<span></span>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="userName">申请人：</label>
				<div class="controls">
					<span class="help-block"><?php echo $users[$model->createby]['name']?></span>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="ec_incharge_name">电商负责人：</label>
				<div class="controls">
					<span class="help-block"><?php echo $users[$model->ec_incharge_id]['name']?></span>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="sales_name">销售姓名：</label>
				<div class="controls">
					<span class="help-block"><?php echo $users[$model->sales_id]['name']?></span>
				</div>
			</div>
			<div class="control-group form-group">
			  <label class="control-label" for="customer_level">客户级别：</label>
			  <div class="controls">
				  <span class="help-block"><?php echo Dict::getValue($model->customer_level);?></span>
			  </div>
			</div>
			<div class="control-group form-group">
			  <label class="control-label" for="area_id">项目地区：</label>
			  <div class="controls">
				  <span class="help-block"><?php echo $area['name'];?></span>

			    
			  </div>
			</div>
		</div>
		<!-- style="margin-left:172px" style="width:153px" -->
			<div class="control-group form-group span12">
				<label class="control-label span3"  for="prj_condition">项目情况说明：</label>
				<div class="controls " >
					<span><?php echo $model->prj_condition;?></span>
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
		  	<?php 
			  	$sourceType = Dict::gets('sourceType');
			  	$chargeType = Dict::gets('chargeType');
			?>
		  	<?php foreach ($pdetails as $key => $pdetail) {?>
			  	<tr>
				  <td class="code"><?php echo $i;?></td>
				  <td><p class="help-block"><?php F::ymd($pdetail['bdate']);?></td>
				  <td><p class="help-block"><?php F::ymd($pdetail['bdate']);?></td>
				  <td><p class="help-block"><?php echo $pdetail['sell_house_num'];?>套</td>
				  
				  <td><p class="help-block"><?php echo $sourceType[$pdetail['source_type']]['dvalue'];?></td>
				  <td><p class="help-block"><?php F::d2($pdetail['pre_incoming']);?>元</p></td>
				  <td><p class="help-block"><?php echo $chargeType[$pdetail['charge_type']]['dvalue'];?></td>
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
					<p class="help-block sell_house_sum" >0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">预计成交总额：</label>
				<div class="controls">
					<p class="help-block pre_amount_sum">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="pre_ad_amount">保底广告费金额：</label>
				<div class="controls">
					<p class="help-block pre_ad_amount">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">预计焦点净收益：</label>
				<div class="controls">
					<p class="help-block net_income">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">第三方分成比例：</label>
				<div class="controls">
					<p class="help-block splitdetail_divide_sum">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="pre_tax_ratio">税金比例：</label>
				<div class="controls">
					<p class="help-block pre_tax_ratio">0</p>
				</div>
			</div>

		</div>
		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label">预计成交套数：</label>
				<div class="controls">
					<p class="help-block pre_volumn_sum">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">预计焦点毛收入：</label>
				<div class="controls">
					<p class="help-block pre_incoming">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="pre_ad_deal_bind1">保底广告费是否和成交绑定：</label>
				<div class="controls">
					<p class="help-block "><?php if($evaformPayment['pre_ad_deal_bind'] == 0) {?>否<?php } else {?>是<?php }?></p>
				</div>
				<div style="" class="y"><span class="text-danger"></span></div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">线下总支出比例：</label>
				<div class="controls">
					<p class="help-block offline_ratio">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">开发商分成比例：</label>
				<div class="controls">
					<p class="help-block developers_divide_sum">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">营销费用比例：</label>
				<div class="controls">
					<p class="help-block ad_markting_ratio">0</p>
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
					<p class="help-block ad_discount">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">按销售政策计算广告刊例金额：</label>
				<div class="controls">
					<p class="help-block sale_ad_kanli_amount">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label">资源比预计收入倍数：</label>
				<div class="controls">
					<p class="help-block resource_income_multiples">0</p>
				</div>
			</div>
		</div>
		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label" for="ad_distribution_ratio">广告配送比：</label>
				<div class="controls">
					<p class="help-block ad_distribution_ratio">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="ad_amount_infact">实际申请的广告刊例金额：</label>
				<div class="controls">
					<p class="help-block ad_amount_infact">0</p>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="ad_markting_ratio">营销费用比例：</label>
				<div class="controls">
					<p class="help-block ad_markting_ratio">0</p>
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
						<p class="help-block offline_amount_sum">0</p>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">案场奖励总额：</label>
					<div class="controls">
						<p class="help-block prjreword_perunit_sum">0</p>
					</div>
				</div>
				<div class="control-group form-group ">
					<div >
						<label class="control-label">短信、call客、 派单费用总额：</label>
						<div class="controls">
							<p class="help-block"><span id="dxckpdfyze">0</span>元</p>

						</div>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">看房团及其它线下活动费用总额：</label>
					<div class="controls">
						<p class="help-block"><span id="kftdxxhdze">0</span>元</p>
					</div>
				</div>
			</div>
			<div class="span6">
				<div class="control-group form-group">
					<label class="control-label">线下总支出比例：</label>
					<div class="controls">
						<p class="help-block offline_ratio">0</p>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">门店经纪人服务费总额：</label>
					<div class="controls">
						<p class="help-block  brokerfees_perunit_sum">0</p>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">驻场人员劳务费总额：</label>
					<div class="controls">
						<p class="help-block "><span id="zcrnlwfyze">0</span>元</p>
					</div>
				</div>
				<div class="control-group form-group">
					<label class="control-label">项目备用金：</label>
					<div class="controls">
						<p class="help-block"><span id="xmbyj">0</span>元</p>
					</div>
				</div>
			</div>
		</div>
		<div class="widget-box">
			<div class="widget-content nopadding ">
				<table class=" table table-striped table-condensed table-hover hide outlineoutdetail-table">
				  <thead>
				    <tr>
				      <th width="30%">属于</th>
				      <th width="30%">支出项名称</th>
				      <th width="20%">支出项金额</th>
				      <th width="10%">操作</th>
				    </tr>
				  </thead>

				  <?php foreach (Dict::gets('outType') as $key => $value) { ?>
					  <tbody id="outlineoutdetail-body-<?php echo $value['dkey'];?>" data-dictId="<?php echo $key;?>" data-key="<?php echo $value['dkey'];?>" data-dvalue="<?php echo $value['dvalue'];?>">
					  </tbody>
				  <?php } ?>

				</table>
		    </div>
		</div>

		<div class="clear"> </div>
	</div>
</div>

<script type="text/x-handlebars-template" data-role="outlineoutdetail-template">
	<tr data-charge="false" data-role="outlineoutdetail" id="outlineoutdetail-tr{{id}}" data-id="{{id}}">
	  <td class="code">{{dvalue}}</td>
	  <td>
	  	<div class="control-group form-group">
	  		<label for="out_name{{id}}" class="control-label hide">支出项名称</label>
		  	<div class="input-group controls mlz">
		  		<input type="text" id="out_name{{id}}" name="Outlineoutdetail[out_name][]" class="mlz form-control">
		  	</div>
	  	</div>
	  </td>
	  <td>
	  	<div class="control-group form-group">
	  		<label for="out_amount{{id}}" class="control-label hide">支出项金额</label>
		  	<div class="input-group controls mlz">
		  		<div class="input-group">
			  		<input type="text" id="out_amount{{id}}" name="Outlineoutdetail[out_amount][]" class="mlz form-control">
			  		<span class="input-group-addon">元</span>
			  	</div>
		  	</div>
	  	</div>
	  </td>
	  <td >
		  <button class="btn btn-default btn-sm" data-role="delete-outlineoutdetail" type="button">删除</button>
	  </td>
	</tr>

	<input type="hidden" name="Outlineoutdetail[out_type][]" id="out_type{{id}}" value="">
</script>





						<div class="form-group">
						    <div class="offset4 span5 controls pull-right">
						    	<a type="button"class="btn btn-fat btn-primary" href="/index.php?r=evaluation/admin">返回</a>
						    </div>
						</div>

				    </form>
				</div>



	</div>
</div>
