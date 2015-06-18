<div class="widget-box">
	<div class="widget-title"><h5>优惠明细</h5></div>
	<div class="widget-content nopadding">
		<table class="table table-striped table-hover table-form" data-search-form="#user-search-form" >
		  <thead>
		  	<tr>
		  		<th colspan="8" style="text-align:center">
					<div class="pull-right ">
				    	  <?php foreach (Dict::gets('chargeType') as $value) { ?>
				    	  <a class="btn btn-info btn-sm" data-role="add-pdetail" data-target="#modal" data-toggle="modal" data-url="/index.php?r=Pdetail/create&id=<?php echo $value['dict_id'];?>" ><span class=" icon icon-plus" aria-hidden="true"></span><?php echo $value['dvalue'];?></a>
					      <?php } ?>
					</div>
		  		</th>
		  	</tr>
		    <tr>
		      <th width="3%">行号</th>
		      <th width="8%">开始时间</th>
		      <th width="8%">结束时间</th>
		      <th width="8%">可售房源数量</th>
		      <th width="8%">房源类型</th>
		      <th width="7%">预计毛收入</th>
		      <th width="9%">收费方式</th>
		      <th width="14%">操作</th>

		    </tr>
		  </thead>
		  <tbody class="is-null">
                  <tr><td colspan="20"><div class="empty">暂无记录,请添加.</div></td></tr>
          </tbody>
		  <tbody id="pdetail-body" data-role="pdetails">

	 	  </tbody>
		</table>
	<div class="clear">
	</div>
	</div>
</div>

<script type="text/x-handlebars-template" data-role="pdetail-template">
<tr id="tr{{id}}" data-role="pdetail" data-id={{id}} data-type="{{chargeType}}" data-charge="false">
  <td class="code">{{code}}</td>
  <td><p class="form-control-static">{{arr.bdate}}</td>
  <td><p class="form-control-static">{{arr.bdate}}</td>
  <td><p class="form-control-static">{{arr.sell_house_num}}套</td>
  <td><p class="form-control-static">{{arr.fanyuan}}</td>
  <td><p class="form-control-static"><span class="yujimaoshouru">{{arr.pre_incoming}}</span>元</p></td>
  <td><p class="form-control-static">{{arr.shoufei}}</td>
  <td>
  	  <button type="button" class="btn btn-default btn-sm" data-url="/index.php?r=Pdetail/Update&id={{pdid}}" data-toggle="modal" data-target="#modal" id="{{pdid}}">设置详情</button>
	  <button type="button" data-role="delete-pdetail" class="btn btn-default btn-sm">删除</button>
	  <span data-role="calculator" data-id="{{id}}">
	  <input type="hidden" name="Pdetail[pd_id][]" id="pd_id{{id}}" value="{{pdid}}">
  	  </span>
  </td>
</tr>
</script>
