<div class="panel panel-default panel-col">
	<div class="panel-heading">优惠明细</div>
	<div class="panel-body">
		<table class="table table-striped table-hover table-form" data-search-form="#user-search-form" >
		  <thead>
		  	<tr>
		  		<th colspan="8" style="text-align:center">明细信息
					<div class="pull-right ">
				    	  <?php foreach ($chargeType as $value) { ?>
				    	  <a class="btn btn-default btn-sm" data-role="add-pdetail" data-target="#modal" data-toggle="modal" data-url="/index.php?r=Pdetail/create&id=<?php echo $value['dict_id'];?>" >+<?php echo $value['dvalue'];?></a>
					      <?php } ?>
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
<tr id="tr{{id}}" data-role="pdetail" data-id={{id}} data-charge="false">
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
		<input type="hidden" id="sell_house_num{{id}}" value="{{arr.sell_house_num}}">
		<input type="hidden" id="ajcard_price{{id}}" value="{{arr.ajcard_price}}">
		<input type="hidden" id="pre_volumn{{id}}" value="{{arr.pre_volumn}}">
		<input type="hidden" id="prjreword_perunit{{id}}" value="{{arr.prjreword_perunit}}">
		<input type="hidden" id="prevolumn_perunit{{id}}" value="{{arr.prevolumn_perunit}}">
		<input type="hidden" id="brokerfees_perunit{{id}}" value="{{arr.brokerfees_perunit}}">
		<input type="hidden" id="prebrokervolumn{{id}}" value="{{arr.prebrokervolumn}}">
		<input type="hidden" id="pre_amount{{id}}" value="{{arr.pre_amount}}">
		<input type="hidden" id="commission_rate{{id}}" value="{{arr.commission_rate}}">
		<input type="hidden" id="commission_perunit{{id}}" value="{{arr.commission_perunit}}">
		<input type="hidden" id="pre_commission_amount{{id}}" value="{{arr.pre_commission_amount}}">
		<input type="hidden" id="pre_incoming{{id}}" value="{{arr.pre_incoming}}">
		<input type="hidden" id="jd_retain_ratio{{id}}" value="{{arr.jd_retain_ratio}}">
		<input type="hidden" id="jd_retain_amount{{id}}" value="{{arr.jd_retain_amount}}">
		<input type="hidden" id="divideSum{{id}}" value="{{arr.divideSum}}">
		<input type="hidden" id="divideAmountSum{{id}}" value="{{arr.divideAmountSum}}">
		<input type="hidden" id="splitdetailNum{{id}}" value="{{arr.splitdetailNum}}">
		<input type="hidden" id="jd_retain_ratio{{id}}" value="{{arr.jd_retain_ratio}}">
		<input type="hidden" id="jd_retain_amount{{id}}" value="{{arr.jd_retain_amount}}">
  	  </span>
  </td>
</tr>
</script>
