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
		<h1 style="color:#000">新建评估单
			<!-- <div class="pull-right">
			    <a href="/index.php?r=evaluation/admin" class="btn btn-success btn-sm">电商评估单列表</a>
			</div> -->
		</h1>
	</div>

	<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
	    'links' => $this->breadcrumbs,
	)); ?>
	<div data-role="evaluation-create-widget">

		<form method="post" id="course-form" class="form-horizontal" novalidate="novalidate" data-role="evaluation-form">

		<input type="hidden" name="Evaluation[group_id]" id="group_id" value="" >
		<input type="hidden" name="Evaluation[city_id]" id="city_id" value="" >
		<input type="hidden" name="Evaluation[ec_incharge_id]" id="ec_incharge_id" value="" >
		<input type="hidden" name="Evaluation[sales_id]" id="sales_id" value="" >
		<input type="hidden"  id="modalType" value="" >

		<div class="panel panel-default panel-col">
			<div class="panel-heading">项目基本情况</div>
			<div class="panel-body">

				<div class="col-md-6">
					<div class="form-group">
					<label class="col-md-6 control-label" for="group_name">项目名称：</label>
					<div class="col-md-6 controls">
						<div class="input-group">
					      <input type="text" class="form-control" name="Evaluation[group_name]" id="group_name">
					      <span class="input-group-btn">
					        <button class="btn btn-default for-modal" data-type="tHousesPrj" type="button" data-target="#modal" data-toggle="modal" data-url="/index.php?r=THousesPrj/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
					      </span>
					    </div>
					</div>

					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" for="city_name">城市：</label>
						<div class="col-md-6 controls">
							<div class="input-group">
						      <input type="text" class="form-control" name="Evaluation[city_name]" id="city_name">
						      <span class="input-group-btn">
						        <button class="btn btn-default for-modal" data-type="dictChengshi" type="button" data-target="#modal" data-toggle="modal" data-url="/index.php?r=DictChengshi/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
						      </span>
						    </div>
						</div>
					</div>
					<div class="form-group">
					  <label class="col-md-6 control-label"  for="cooperetion_mode">合作方式：</label>
					  <div class="col-md-6 controls">
					    <select class="form-control width-input width-input-large" name="Evaluation[cooperetion_mode]" id="cooperetion_mode">
					    	<option value="">--请选择--</option>
					    	<?php foreach ($cooperation as $value) { ?>
					    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
					    	<?php } ?>
					    </select>
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-md-6 control-label"  for="customer_type">甲方客户类型：</label>
					  <div class="col-md-6 controls">
					    <select class="form-control width-input width-input-large" name="Evaluation[customer_type]" id="customer_type">
					    	<option value="">--请选择--</option>
					    	<?php foreach ($customerType as $value) { ?>
					    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
					    	<?php } ?>
					    </select>
					  </div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" for="pre_opendatetime">预计开盘时间：</label>
						<div class="col-md-6 controls">
							<input type="text" class="form-control" name="Evaluation[pre_opendatetime]" id="pre_opendatetime" >
						</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-6 control-label" for="userName">申请人：</label>
						<div class="col-md-6 controls">
							<input type="text" class="form-control" value="default" id="userName">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" for="ec_incharge_name">电商负责人：</label>
						<div class="col-md-6 controls">
							<div class="input-group">
						      <input type="text" class="form-control" name="Evaluation[ec_incharge_name]" id="ec_incharge_name">
						      <span class="input-group-btn">
							        <button class="btn btn-default for-modal" type="button" data-type="ecIncharge" data-target="#modal" data-toggle="modal" data-url="/index.php?r=User/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
							  </span>
						    </div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" for="sales_name">销售姓名：</label>
						<div class="col-md-6 controls">
							<div class="input-group">
						      <input type="text" class="form-control" name="Evaluation[sales_name]" id="sales_name" >
						      <span class="input-group-btn">
							        <button class="btn btn-default for-modal" type="button" data-type="sales" data-target="#modal" data-toggle="modal" data-url="/index.php?r=User/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
							  </span>
						    </div>
						</div>
					</div>
					<div class="form-group">
					  <label class="col-md-6 control-label" for="customer_level">客户级别：</label>
					  <div class="col-md-6 controls">
					    <select class="form-control width-input width-input-large" name="Evaluation[customer_level]" id="customer_level">
					    	<option value="">--请选择--</option>
					    	<?php foreach ($customerLevel as $value) { ?>
					    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
					    	<?php } ?>
					    </select>
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-md-6 control-label" for="area_id">项目地区：</label>
					  <div class="col-md-6 controls">
					    <select class="form-control width-input width-input-large" name="Evaluation[area_id]" id="area_id" data-url="/index.php?r=Area/getAreaByCityId">
					    	<option value="">--请选择--</option>
					    </select>
					  </div>
					</div>
				</div>

				<div class="form-group col-md-12">
					<label class="col-md-3 control-label" for="prj_condition">项目情况说明：</label>
					<div class="col-md-9 controls">
						<textarea class="form-control" rows="7" cols="20" name="Evaluation[prj_condition]" id="prj_condition" ></textarea>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-default panel-col">
			<div class="panel-heading">广告资源</div>
			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-6 control-label" for="ad_discount">广告折扣：</label>
						<div class="col-md-6 controls">
							<input type="text" class="form-control" name="TEvaformPayment[ad_discount]" id="ad_discount">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">按销售政策计算广告刊例金额：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">资源比预计收入倍数：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-6 control-label" for="ad_distribution_ratio">广告配送比：</label>
						<div class="col-md-6 controls">
							<input type="text" class="form-control" name="TEvaformPayment[ad_distribution_ratio]" id="ad_distribution_ratio">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" for="ad_amount_infact">实际申请的广告刊例金额：</label>
						<div class="col-md-6 controls">
							<input type="text" class="form-control" name="TEvaformPayment[ad_amount_infact]" id="ad_amount_infact">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" for="ad_markting_ratio">营销费用比例：</label>
						<div class="col-md-6 controls">
							<input type="text" class="form-control" name="TEvaformPayment[ad_markting_ratio]" id="ad_markting_ratio">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-default panel-col">
			<div class="panel-heading">线下支出</div>
			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-6 control-label">线下总支出：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">案场奖励总额：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">短信，call客，派单费用总额：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">看房团及其它线下活动费用总额：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-6 control-label">线下总支出比例：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">门店经纪人服务费总额：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">驻场人员劳务费总额：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">项目备用金：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-default panel-col">
			<div class="panel-heading">预期收益</div>
			<div class="panel-body">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-6 control-label">可售房源总数：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">预计成交总额：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">保底广告费金额：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">预计焦点净收益：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">第三方分成比例：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">税金比例：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>

				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-6 control-label">预计成交套数：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">预计焦点毛收入：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" for="pre_ad_deal_bind1">保底广告费是否和成交绑定：</label>
						<div class="col-md-6 controls">
							<label class="radio-inline">
							  <input type="radio" name="TEvaformPayment[pre_ad_deal_bind]" id="pre_ad_deal_bind1" value="1"> 是
							</label>
							<label class="radio-inline">
							  <input type="radio" name="TEvaformPayment[pre_ad_deal_bind]" id="pre_ad_deal_bind0" value="0"> 否
							</label>
						</div>
						<div style="" class="y"><span class="text-danger"></span></div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">线下总支出比例：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">开发商分成比例：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label">营销费用比例：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static">2222</p>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="panel panel-default panel-col">
			<div class="panel-heading">优惠明细</div>
			<div class="panel-body">
				<table id="user-table" class="table table-striped table-hover" data-search-form="#user-search-form">
				  <thead>
				  	<tr>
				  		<th colspan="8" style="text-align:center">明细信息
							<div class="pull-right">
							    <a class="btn btn-default btn-sm" data-role="addPdetail">添加</a>
							</div>
				  		</th>
				  	</tr>
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
				  <tbody id="pdetail-body">

			 	  </tbody>
				</table>
			
			</div>
		</div>

		<div class="form-group">
		    <div class="col-md-offset-1 col-md-8 controls">
		    	<button type="submit" id="course-create-btn" class="btn btn-fat btn-primary">保存</button>
		    	<a class="btn btn-link" href="/index.php?r=evaluation/admin">返回</a>
		    </div>
		</div>

		</form>

		<script type="text/x-handlebars-template" data-role="pdetail-template">
			<tr id="tr{{id}}">
			  <td>{{id}}</td>
			  <td>
		  		<div class="form-group">
			  		<label class="col-md-6 control-label hide" for="bdate{{id}}">开始时间</label>
				  	<div class="input-group controls">
				  		<input type="text" class="form-control" name="TPdetail[bdate][]" id="bdate{{id}}"/>
				  	</div>
			  	</div>
			  </td>
			  <td>
			  	<div class="form-group">
			  		<label class="col-md-6 control-label hide" for="edate{{id}}">结束时间</label>
				  	<div class="input-group controls">
				  		<input type="text" class="form-control" name="TPdetail[edate][]" id="edate{{id}}"/>
				  	</div>
			  	</div>
			  </td>
			  <td>
			  	<div class="form-group">
			  		<label class="col-md-6 control-label hide" for="sell_house_num{{id}}">可售房源数量</label>
				  	<div class="input-group controls">
				  		<div class="input-group">
					  		<input type="text" class="form-control" name="TPdetail[sell_house_num][]" id="sell_house_num{{id}}"/>
					  		<span class="input-group-addon">套</span>
					  	</div>
				  	</div>
			  	</div>
			  </td>
			  <td>
			  	<div class="form-group">
			  		<label class="col-md-6 control-label hide" for="source_type{{id}}">房源类型</label>
			  		<div class="input-group ">
					  	<select class="form-control width-input width-input-large" name="TPdetail[source_type][]" id="source_type{{id}}">
				    	  <option value="">请选择</option>
				    	  <?php foreach ($sourceType as $value) { ?>
					    	<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
					      <?php } ?>
				    	</select>
				    </div>
			    </div>
			  </td>
			  <td><p class="form-control-static"><span class="yuan">0</span>万元</p></td>
			  <td>
			  	<div class="form-group">
			  		<label class="col-md-6 control-label hide" for="charge_type{{id}}">收费方式</label>
			  		<div class="input-group controls">
					  	<select class="form-control width-input width-input-large" name="TPdetail[charge_type][]" id="charge_type{{id}}">
				    	  <option value="">请选择</option>
				    	  <option value="卖卡无分成">卖卡无分成</option>
				          <option value="卖卡有分成">卖卡有分成</option>
				          <option value="CPS无分成">CPS无分成</option>
				          <option value="CPS有分成">CPS有分成</option>
				          <option value="卖卡+CPS">卖卡+CPS</option>
				    	</select>
				    </div>
			    </div>
			  </td>
			  <td>
			  	<button type="button" class="btn btn-default btn-sm">设置详情</button>
					<button type="button" class="btn btn-default btn-sm">删除</button>
			  </td>
			</tr>
		</script>



	</div>


	

</div>
