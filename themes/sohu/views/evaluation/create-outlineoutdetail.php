<div class="panel panel-default panel-col">
	<div class="panel-heading">线下支出</div>
	<div class="panel-body">
		<div class="evaform-outlineoutdetail-base row">
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">线下总支出：</label>
					<div class="col-md-6 controls">
						<p class="form-control-static">0</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">案场奖励总额：</label>
					<div class="col-md-6 controls">
						<p class="form-control-static">0</p>
					</div>
				</div>
				<div class="form-group ">
					<div >
						<label class="col-md-6 control-label">短信、call客、 派单费用总额：</label>
						<div class="col-md-6 controls">
							<p class="form-control-static"><span data-role="dxckpdfyze">0</span>元 <button type="button" class="btn-xs btn btn-link pull-right" data-role="add-outlineoutdetail" data-for="#outlineoutdetail-body-dxckpdfyze">添加</button></p>

						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">看房团及其它线下活动费用总额：</label>
					<div class="col-md-6 controls">
						<p class="form-control-static"><span data-role="kftdxxhdze">0</span>元 <button type="button" class="btn-xs btn btn-link pull-right" data-role="add-outlineoutdetail" data-for="#outlineoutdetail-body-kftdxxhdze">添加</button></p>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label">线下总支出比例：</label>
					<div class="col-md-6 controls">
						<p class="form-control-static">0</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">门店经纪人服务费总额：</label>
					<div class="col-md-6 controls">
						<p class="form-control-static">0</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">驻场人员劳务费总额：</label>
					<div class="col-md-6 controls">
						<p class="form-control-static"><span data-role="zcrnlwfyze">0</span>元 <button type="button" class="btn-xs btn btn-link pull-right" data-role="add-outlineoutdetail" data-for="#outlineoutdetail-body-zcrnlwfyze">添加</button></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label">项目备用金：</label>
					<div class="col-md-6 controls">
						<p class="form-control-static"><span data-role="xmbyj">0</span>元 <button type="button" class="btn-xs btn btn-link pull-right" data-role="add-outlineoutdetail" data-for="#outlineoutdetail-body-xmbyj">添加</button></p>
					</div>
				</div>
			</div>
		</div>

		<table class="table table-striped table-condensed table-hover hide outlineoutdetail-table">
		  <thead>
		    <tr>
		      <th width="30%">属于</th>
		      <th width="30%">支出项名称</th>
		      <th width="30%">支出项金额</th>
		      <th width="10%">操作</th>
		    </tr>
		  </thead>

		  <?php foreach ($outType as $key => $value) { ?>
			  <tbody id="outlineoutdetail-body-<?php echo $value['dkey'];?>" data-dictId="<?php echo $key;?>" data-key="<?php echo $value['dkey'];?>" data-dvalue="<?php echo $value['dvalue'];?>">
			  </tbody>
		  <?php } ?>
		  

		</table>
	</div>
</div>

<script type="text/x-handlebars-template" data-role="outlineoutdetail-template">
	<tr data-charge="false" data-role="outlineoutdetail" id="outlineoutdetail-tr{{id}}" data-id="{{id}}">
	  <td class="code">{{dvalue}}</td>
	  <td>
	  	<div class="form-group">
	  		<label for="out_name{{id}}" class="col-md-6 control-label hide">支出项名称</label>
		  	<div class="input-group controls">
		  		<input type="text" id="out_name{{id}}" name="Outlineoutdetail[out_name][]" class="form-control">
		  	</div>
	  	</div>
	  </td>
	  <td>
	  	<div class="form-group">
	  		<label for="out_amount{{id}}" class="col-md-6 control-label hide">支出项金额</label>
		  	<div class="input-group controls">
		  		<div class="input-group">
			  		<input type="text" id="out_amount{{id}}" name="Outlineoutdetail[out_amount][]" class="form-control">
			  		<span class="input-group-addon">元</span>
			  	</div>
		  	</div>
	  	</div>
	  </td>
	  <td >
		  <button class="btn btn-default btn-sm" data-role="delete-outlineoutdetail" type="button">删除</button>
	  </td>
	</tr>

	<input type="hidden" name="Outlineoutdetail[out_type]" id="out_type{{id}}" value="">
</script>