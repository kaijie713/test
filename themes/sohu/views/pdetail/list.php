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
			  	<?php include('list-tr.php');?>
			<?php $i++;   }?>
	 	  </tbody>
		</table>
	<div class="clear">
	</div>
	</div>
</div>