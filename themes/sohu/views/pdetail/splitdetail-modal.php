<table id="splitdetail-body" class="table table-striped table-hover table-form">
  <thead>
  	<tr>
  		<td style="text-align:center" colspan="8">开发商/合作媒体分成明细
			<div class="pull-right mrm">
			    <a data-role="add-splitdetail" class="btn btn-default btn-sm">添加</a>
			</div>
  		</td>
  	</tr>
    <tr>
        <td width="16%">开发商/合作媒体</td>
        <td width="25%">开发商/合作媒体名称</td>
        <td width="15%">分成比例</td>
        <td width="16%">分成金额</td>
        <td width="20%">备注</td>
        <td width="8%">操作</td>
    </tr>
  </thead>
  <tbody data-role="splitdetails" id="splitdetail-tbody">
  </tbody>
<script type="text/x-handlebars-template" data-role="splitdetail-template">
<tr data-charge="false" data-role="splitdetail" data-id ="{{id}}" id="tr{{id}}">
  <td>
  	<div class="form-group">
  		<label for="partner_type{{id}}" class="col-md-6 control-label hide">开发商/合作媒体</label>
  		<div class="input-group controls">
		  	<select id="partner_type{{id}}" name="Splitdetail[partner_type][]" class="form-control width-input width-input-large" data-widget-cid="widget-17" data-explain="">
	    	  <option value="">请选择</option>
	    	  <?php foreach ($partnerType as $value) { ?>
			    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			  <?php } ?>
		    </select>
    	</div>
  </td>
  <td>
  	<div class="form-group">
  		<label for="partner_name{{id}}" class="col-md-6 control-label hide">开发商/合作媒体名称</label>
	  	<div class="input-group controls">
		    <input type="text" id="partner_name{{id}}" name="Splitdetail[partner_name][]" class="form-control" data-widget-cid="widget-15" data-explain="">
  		</div>
  </td>
  <td>
  	<div class="form-group">
  		<label for="divide{{id}}" class="col-md-6 control-label hide">分成比例</label>
	  	<div class="input-group controls">
	  		<div class="input-group">
		  		<input type="text" id="divide{{id}}" name="Splitdetail[divide][]" class="form-control" data-widget-cid="widget-15" data-explain="">
		  		<span class="input-group-addon">%</span>
		  	</div>
  		</div>
  </td>
  <td>
  	<div class="form-group">
  		<label for="divide_amount{{id}}" class="col-md-6 control-label hide">分成金额</label>
	  	<div class="input-group controls">
	  		<div class="input-group">
		  		<input type="text" id="divide_amount{{id}}" name="Splitdetail[divide_amount][]" class="form-control" data-widget-cid="widget-15" data-explain="">
		  		<span class="input-group-addon">元</span>
		  	</div>
  		</div>
  </td>
  <td>
  	<div class="form-group">
  		<label for="partner_memo{{id}}" class="col-md-6 control-label hide">备注</label>
	  	<div class="input-group controls">
			<input type="text" id="partner_memo{{id}}" name="Splitdetail[partner_memo][]" class="form-control" data-widget-cid="widget-15" data-explain="">
  		</div>
  </td>
  <td>
	  <button class="btn btn-default btn-sm" data-role="delete-splitdetail" type="button">删除</button>
  </td>
</tr>
</script>
</table>

