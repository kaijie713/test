<div class="widget-box">
	<div class="widget-title"><h5>优惠明细</h5></div>
	<div class="widget-content nopadding">
		<table class="table table-striped table-hover table-form" data-search-form="#user-search-form" >
		  <thead>
		  	<tr>
		  		<th colspan="8" style="text-align:center">
					<div class="pull-right ">
				    	  <?php foreach (Dict::gets('chargeType') as $value) { ?>
				    	  <a class="btn btn-default btn-sm" data-role="add-pdetail" data-target="#modal" data-toggle="modal" data-url="/index.php?r=Pdetail/create&id=<?php echo $value['dict_id'];?>" ><span class=" icon icon-plus" aria-hidden="true"></span><?php echo $value['dvalue'];?></a>
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
		<input type="hidden" name="Pdetail[sell_house_num][]" id="sell_house_num{{id}}" value="{{arr.sell_house_num}}">
		<input type="hidden" name="Pdetail[ajcard_price][]" id="ajcard_price{{id}}" value="{{arr.ajcard_price}}">
		<input type="hidden" name="Pdetail[pre_volumn][]" id="pre_volumn{{id}}" value="{{arr.pre_volumn}}">
		<input type="hidden" name="Pdetail[prjreword_perunit][]" id="prjreword_perunit{{id}}" value="{{arr.prjreword_perunit}}">
		<input type="hidden" name="Pdetail[prevolumn_perunit][]" id="prevolumn_perunit{{id}}" value="{{arr.prevolumn_perunit}}">
		<input type="hidden" name="Pdetail[brokerfees_perunit][]" id="brokerfees_perunit{{id}}" value="{{arr.brokerfees_perunit}}">
		<input type="hidden" name="Pdetail[prebrokervolumn][]" id="prebrokervolumn{{id}}" value="{{arr.prebrokervolumn}}">
		<input type="hidden" name="Pdetail[pre_amount][]" id="pre_amount{{id}}" value="{{arr.pre_amount}}">
		<input type="hidden" name="Pdetail[commission_rate][]" id="commission_rate{{id}}" value="{{arr.commission_rate}}">
		<input type="hidden" name="Pdetail[commission_perunit][]" id="commission_perunit{{id}}" value="{{arr.commission_perunit}}">
		<input type="hidden" name="Pdetail[pre_commission_amount][]" id="pre_commission_amount{{id}}" value="{{arr.pre_commission_amount}}">
		<input type="hidden" name="Pdetail[pre_incoming][]" id="pre_incoming{{id}}" value="{{arr.pre_incoming}}">
		<input type="hidden" name="Pdetail[jd_retain_ratio][]" id="jd_retain_ratio{{id}}" value="{{arr.jd_retain_ratio}}">
		<input type="hidden" name="Pdetail[jd_retain_amount][]" id="jd_retain_amount{{id}}" value="{{arr.jd_retain_amount}}">
		<input type="hidden" name="Pdetail[divideSum][]" id="divideSum{{id}}" value="{{arr.divideSum}}">
		<input type="hidden" name="Pdetail[divideAmountSum][]" id="divideAmountSum{{id}}" value="{{arr.divideAmountSum}}">
		<input type="hidden" name="Pdetail[splitdetailNum][]" id="splitdetailNum{{id}}" value="{{arr.splitdetailNum}}">
		<input type="hidden" name="Pdetail[divideSumKaifashang][]" id="divideSumKaifashang{{id}}" value="{{arr.divideSumKaifashang}}">
		<input type="hidden" name="Pdetail[divideAmountKaifashang][]" id="divideAmountKaifashang{{id}}" value="{{arr.divideAmountKaifashang}}">
		<input type="hidden" name="Pdetail[divideSumDisanfang][]" id="divideSumDisanfang{{id}}" value="{{arr.divideSumDisanfang}}">
		<input type="hidden" name="Pdetail[divideAmountSumDisanfang][]" id="divideAmountSumDisanfang{{id}}" value="{{arr.divideAmountSumDisanfang}}">
		<input type="hidden" name="Pdetail[type][]" id="type{{id}}" value="{{arr.type}}">
		<input type="hidden" name="Pdetail[pd_id][]" id="pd_id{{id}}" value="{{pdid}}">
  	  </span>
  </td>
</tr>
</script>
