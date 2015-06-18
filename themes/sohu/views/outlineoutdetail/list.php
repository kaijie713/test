<?php if(!empty($outlineoutdetail)) {?>
<div class="widget-box">
	<div class="widget-content nopadding ">
		<table class=" table table-striped table-condensed table-hover outlineoutdetail-table">
		  <thead>
		    <tr>
		      <th width="30%">属于</th>
		      <th width="30%">支出项名称</th>
		      <th width="20%">支出项金额</th>
		    </tr>
		  </thead>
		  <?php foreach ($outlineoutdetail as $key => $value) { ?>
		    <tr>
		  	  <td>
		  	  	<?php echo Dict::getValue($value['out_type']);?>
		  	  </td>
			  <td>
			  	<div class="control-group form-group">
			  		<label for="out_name{{id}}" class="control-label hide">支出项名称</label>
				  	<div class="input-group controls mlz">
				  		<?php echo $value['out_name'];?>
				  	</div>
			  	</div>
			  </td>
			  <td>
			  	<div class="control-group form-group">
			  		<label for="out_amount{{id}}" class="control-label hide">支出项金额</label>
				  	<div class="input-group controls mlz">
				  		<div class="input-group">
					  		<?php echo F::d2($value['out_amount']);?>
					  	</div>
				  	</div>
			  	</div>
			  </td>
			</tr>
		  <?php } ?>
		</table>
    </div>
</div>
<?php } ?>