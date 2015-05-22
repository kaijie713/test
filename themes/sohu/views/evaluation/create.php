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

	<form method="post" id="course-form" class="form-horizontal" novalidate="novalidate" data-widget-cid="widget-0">

	<input type="hidden" name="Evaluation[group_id]" id="group_id" value="" >
	<input type="hidden" name="Evaluation[city_id]" id="city_id" value="" >

	<div class="panel panel-default panel-col">
		<div class="panel-heading">项目基本情况</div>
		<div class="panel-body">

			<div class="col-md-6">
				<div class="form-group">
						<label class="col-md-6 control-label">项目名称：</label>
						<div class="col-md-6 controls">
							<div class="input-group">
						      <input type="text" class="form-control" name="Evaluation[group_name]" id="group_name">
						      <span class="input-group-btn">
						        <button class="btn btn-default" type="button" data-target="#modal" data-toggle="modal" data-url="/index.php?r=THousesPrj/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
						      </span>
						    </div>
						</div>

				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">城市：</label>
					<div class="col-md-6 controls">
						<div class="input-group">
					      <input type="text" class="form-control" name="Evaluation[city_name]" id="city_name">
					      <span class="input-group-btn">
					        <button class="btn btn-default" type="button" data-target="#modal" data-toggle="modal" data-url="/index.php?r=DictChengshi/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
					      </span>
					    </div>
					</div>
				</div>
				<div class="form-group">
				  <label class="col-md-6 control-label">合作方式：</label>
				  <div class="col-md-6 controls">
				    <select class="form-control width-input width-input-large" name="" id="">
				    	<option value="">--请选择--</option>
				    	<?php foreach ($cooperation as $value) { ?>
				    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
				    	<?php } ?>
				    </select>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-md-6 control-label">甲方客户类型：</label>
				  <div class="col-md-6 controls">
				    <select class="form-control width-input width-input-large" name="" id="">
				    	<option value="">--请选择--</option>
				    	<?php foreach ($customerType as $value) { ?>
				    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
				    	<?php } ?>
				    </select>
				  </div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">预计开盘时间：</label>
					<div class="col-md-6 controls">
						<input type="text" class="form-control" name="startTime" id="" >
					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">申请人：</label>
					<div class="col-md-6 controls">
						<input type="text" class="form-control" name="" id="" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">电商负责人：</label>
					<div class="col-md-6 controls">
						<div class="input-group">
					      <input type="text" class="form-control">
					      <span class="input-group-btn">
					        <button class="btn btn-default" type="button">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
					      </span>
					    </div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">销售姓名：</label>
					<div class="col-md-6 controls">
						<div class="input-group">
					      <input type="text" class="form-control">
					      <span class="input-group-btn">
					        <button class="btn btn-default" type="button">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
					      </span>
					    </div>
					</div>
				</div>
				<div class="form-group">
				  <label class="col-md-6 control-label">客户级别：</label>
				  <div class="col-md-6 controls">
				    <select class="form-control width-input width-input-large" name="" id="">
				    	<option value="">--请选择--</option>
				    	<?php foreach ($customerLevel as $value) { ?>
				    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
				    	<?php } ?>
				    </select>
				  </div>
				</div>
				<div class="form-group">
				  <label class="col-md-6 control-label">项目地区：</label>
				  <div class="col-md-6 controls">
				    <select class="form-control width-input width-input-large" name="" id="">
				    	<option value="">--请选择--</option>
				    </select>
				  </div>
				</div>
			</div>

			<div class="form-group col-md-12">
				<label class="col-md-3 control-label">项目情况说明：</label>
				<div class="col-md-9 controls">
					<textarea class="form-control" rows="7" cols="20" name="" id="" ></textarea>
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-default panel-col">
		<div class="panel-heading">广告资源</div>
		<div class="panel-body">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">广告折扣：</label>
					<div class="col-md-6 controls">
						<input type="text" class="form-control" name="" id="" >
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
					<label class="col-md-6 control-label">广告配送比：</label>
					<div class="col-md-6 controls">
						<input type="text" class="form-control" name="" id="" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">实际申请的广告刊例金额：</label>
					<div class="col-md-6 controls">
						<input type="text" class="form-control" name="" id="" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">营销费用比例：</label>
					<div class="col-md-6 controls">
						<input type="text" class="form-control" name="" id="" >
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
						<input type="text" class="form-control" name="" id="" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">看房团及其它线下活动费用总额：</label>
					<div class="col-md-6 controls">
						<input type="text" class="form-control" name="" id="" >
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
						<input type="text" class="form-control" name="" id="" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">项目备用金：</label>
					<div class="col-md-6 controls">
						<input type="text" class="form-control" name="" id="" >
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
					<label class="col-md-6 control-label">保底广告费是否和成交绑定：</label>
					<div class="col-md-6 controls">
						<label class="radio-inline">
						  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> 是
						</label>
						<label class="radio-inline">
						  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> 否
						</label>
					</div>
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
				  	<tr><th colspan="7" style="text-align:center">明细信息</th></tr>
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
				  <tbody>
			 		<tr id="2">
					  <td>1</td>
					  <td>
					  	<div class="input-group">
					  		<input type="text" class="form-control" name="startTime"/>
					  	</div>
					  </td>
					  <td>
					  	<div class="input-group">
					  		<input type="text" class="form-control" name="endTime"/>
					  	</div>
					  </td>
					  <td>
					  	<div class="input-group">
					  		<input type="text" id="appendedInput" name="appendedInput" value="" class="form-control">
					  		<span class="input-group-addon">套</span>
					  	</div>
    				  </td>
					  <td>
					  	<select class="form-control width-input width-input-large" name="" id="">
				    	  <option value="">请选择</option>
				    	  <option value="">设置详情设置</option>
				    	</select>
					  </td>
					  <td><p class="form-control-static">22万元</p></td>
					  <td>
					  	<select class="form-control width-input width-input-large" name="" id="">
				    	  <option value="">请选择</option>
				    	  <option value="">设置详情设置</option>
				    	</select>
					  </td>
					  <td>
					  	<button type="button" class="btn btn-default btn-sm">设置详情</button>
  						<button type="button" class="btn btn-default btn-sm">删除</button>
					  </td>
					</tr>
			 	  </tbody>
				</table>
		
		</div>
	</div>

    <div class="panel panel-default panel-col">
		<div class="panel-heading">授权使用</div>
		<div class="panel-body">
				<table id="user-table" class="table table-striped table-hover" data-search-form="#user-search-form">
				 <thead>
				    <tr>
				      <th colspan="7" style="text-align:center">明细信息</th>
				    </tr>
				  </thead>
				  <thead>
				    <tr>
				      <th width="20%">授权人</th>
				      <th width="20%">授权时间</th>
				      <th width="45%">授权说明</th>
				      <th width="15%">操作</th>
				    </tr>
				  </thead>
				  <tbody>
			 		<tr id="2">
					  <td>
					  	<div class="input-group">
					  		<input type="text" id="appendedInput" name="appendedInput" value="" class="form-control">
					  		<span class="input-group-btn">
						        <button class="btn btn-default" type="button">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
						    </span>
					  	</div>
					  </td>
					  <td>
					  	<div class="input-group">
					  		<input type="text" class="form-control" name="startTime"/>
					  	</div>
					  </td>
					  <td>
					  	<p class="form-control-static">申请人、销售、电商负责人、地区负责人、授权人可以看此单据</p>
					  </td>
					  <td>
					  	<button type="button" class="btn btn-default btn-sm">设置详情</button>
  						<button type="button" class="btn btn-default btn-sm">删除</button>
					  </td>
					</tr>
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

</div>
