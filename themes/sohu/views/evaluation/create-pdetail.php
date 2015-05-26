<div class="panel panel-default panel-col">
	<div class="panel-heading">优惠明细</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-form" data-search-form="#user-search-form" >
		  <thead>
		  	<tr>
		  		<th colspan="8" style="text-align:center">明细信息
					<div class="pull-right ">
					    <select class="form-control width-input width-input-large" name="Pdetail[charge_type][]" id="charge_type{{id}}">
				    	  <option value="">请选择</option>
				    	  <?php foreach ($chargeType as $value) { ?>
					    	<option  data-target="#modal" data-toggle="modal" data-url="/index.php?r=Pdetail/create&id=<?php echo $value['dict_id'];?>"  value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
					      <?php } ?>
				    	</select>
					</div>
					<div class="pull-right mrm">
					    <a class="btn btn-default btn-sm" data-role="add-pdetail">添加</a>
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
		  <tbody id="pdetail-body" data-role="pdetails">

	 	  </tbody>
		</table>
	
	</div>
</div>

<script type="text/x-handlebars-template" data-role="pdetail-template">
	<tr id="tr{{id}}" data-role="pdetail" data-charge="false">
	  <td class="code">{{code}}</td>
	  <td>
  		<div class="form-group">
	  		<label class="col-md-6 control-label hide" for="bdate{{id}}">开始时间</label>
		  	<div class="input-group controls">
		  		<input type="text" class="form-control" name="Pdetail[bdate][]" id="bdate{{id}}"/>
		  	</div>
	  	</div>
	  </td>
	  <td>
	  	<div class="form-group">
	  		<label class="col-md-6 control-label hide" for="edate{{id}}">结束时间</label>
		  	<div class="input-group controls">
		  		<input type="text" class="form-control" name="Pdetail[edate][]" id="edate{{id}}"/>
		  	</div>
	  	</div>
	  </td>
	  <td>
	  	<div class="form-group">
	  		<label class="col-md-6 control-label hide" for="sell_house_num{{id}}">可售房源数量</label>
		  	<div class="input-group controls">
		  		<div class="input-group">
			  		<input type="text" class="form-control" name="Pdetail[sell_house_num][]" id="sell_house_num{{id}}"/>
			  		<span class="input-group-addon">套</span>
			  	</div>
		  	</div>
	  	</div>
	  </td>
	  <td>
	  	<div class="form-group">
	  		<label class="col-md-6 control-label hide" for="source_type{{id}}">房源类型</label>
	  		<div class="input-group controls">
			  	<select class="form-control width-input width-input-large" name="Pdetail[source_type][]" id="source_type{{id}}">
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
			  	<select class="form-control width-input width-input-large" name="Pdetail[charge_type][]" id="charge_type{{id}}">
		    	  <option value="">请选择</option>
		    	  <?php foreach ($chargeType as $value) { ?>
			    	<option  data-target="#modal" data-toggle="modal" data-url="/index.php?r=Pdetail/create&type=<?php echo $value['dict_id'];?>"  value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			      <?php } ?>
		    	</select>
		    </div>
	    </div>
	  </td>
	  <td>
	  	  <button type="button" class="btn btn-default btn-sm">设置详情</button>
		  <button type="button" data-role="delete-pdetail" class="btn btn-default btn-sm">删除</button>
	  </td>
	</tr>
</script>