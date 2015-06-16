

<div class="widget-box">
	<div class="widget-title"><h5>授权使用</h5></div>
	<div class="widget-content nopadding">
		<table class="table table-striped table-hover table-form" data-search-form="#user-search-form" >
		  <thead>
		    <tr>
		      <th width="33%">授权人</th>
		      <th width="33%">授权时间</th>
		      <th width="33%">授权说明</th>
		    </tr>
		  </thead>
		  <tbody id="pdetail-body" data-role="pdetails">
		  	<?php foreach ($permission as $key => $val) {?>
			  	<tr>
				  <td><p class="form-control-static"><?php echo $users[$val['u_id']]['name'];?></td>
				  <td><p class="form-control-static"><?php echo F::ymd($val['createdate']);?></td>
				  <td><p class="form-control-static"><?php echo $val['content'];?></td>
				</tr>
			<?php }?>
	 	  </tbody>
		</table>

		<div class="clear">
		</div>
	</div>
</div>
