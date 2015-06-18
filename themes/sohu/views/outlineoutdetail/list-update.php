<?php if(!empty($outlineoutdetail)) {?>
<div class="widget-box outlineoutdetail-table hide">
	<div class="widget-content nopadding ">
		<table class=" table table-striped table-condensed table-hover  ">
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
<script type="text/plain" data-role="outlineoutdetail-data"><?php  echo $outlineoutdetail;?></script>
<?php } ?>

<script type="text/x-handlebars-template" data-role="outlineoutdetail-template">
	<tr data-charge="false" data-role="outlineoutdetail" id="outlineoutdetail-tr{{id}}" data-id="{{id}}">
	  <td class="code">{{dvalue}}</td>
	  <td>
	  	<div class="control-group form-group">
	  		<label for="out_name{{id}}" class="control-label hide">支出项名称</label>
		  	<div class="input-group controls mlz">
		  		<input type="text" id="out_name{{id}}" {{#if out_type }}value="{{out_name}}"{{/if}} name="Outlineoutdetail[out_name][]" class="mlz form-control" />
		  	</div>
	  	</div>
	  </td>
	  <td>
	  	<div class="control-group form-group">
	  		<label for="out_amount{{id}}" class="control-label hide">支出项金额</label>
		  	<div class="input-group controls mlz">
		  		<div class="input-group">
			  		<input type="text" id="out_amount{{id}}" {{#if out_type }}value="{{out_amount}}"{{/if}} name="Outlineoutdetail[out_amount][]" class="mlz form-control" />
			  		<span class="input-group-addon">元</span>
			  	</div>
		  	</div>
	  	</div>
	  </td>
	  <td >
		  <button class="btn btn-default btn-sm" data-role="delete-outlineoutdetail" type="button">删除</button>
	  </td>
	  <input type="hidden" name="Outlineoutdetail[out_type][]" id="out_type{{id}}" {{#if out_type }}value="{{out_type}}"{{/if}} />
	</tr>
</script>