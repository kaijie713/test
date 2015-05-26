<div class="modal-dialog modal-lg">
  <div class="modal-content"  id="pdetail-create-widget">
   <form method="post" class="form-horizontal" novalidate="novalidate" data-role="pdetail-form">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	      <h4 class="modal-title">项目明细信息</h4>
	    </div>
	    <div class="modal-body clearfix" >
			<div class="col-md-6">
				<div class="form-group">
					<label class="col-md-6 control-label" for="bdate">开始时间：</label>
					<div class="col-md-6 controls">
					    <input type="text" class="form-control" name="Pdetail[bdate]" id="bdate"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="sell_house_num">可售房源数量：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[sell_house_num]" id="sell_house_num"/>
						  		<span class="input-group-addon">套</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="yujimaoshouru">预计毛收入：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" readonly class="form-control" id="yujimaoshouru"/>
						  		<span class="input-group-addon">元</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="ajcard_price">爱家卡单价：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" readonly class="form-control" name="Pdetail[ajcard_price]" id="ajcard_price"/>
						  		<span class="input-group-addon">元</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="pre_amount">预计成交总额：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[pre_amount]" id="pre_amount"/>
						  		<span class="input-group-addon">元</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="commission_rate">佣金比例：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[commission_rate]" id="commission_rate"/>
						  		<span class="input-group-addon">%</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="prjreword_perunit">案场奖励/每套：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[prjreword_perunit]" id="prjreword_perunit"/>
						  		<span class="input-group-addon">元</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="brokerfees_perunit">经纪人服务费/每套：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[brokerfees_perunit]" id="brokerfees_perunit"/>
						  		<span class="input-group-addon">元</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="jd_retain_ratio">焦点留存比例：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
						  		<input type="text" readonly class="form-control" name="Pdetail[jd_retain_ratio]" id="jd_retain_ratio"/>
					  	</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				
				<div class="form-group">
					<label class="col-md-6 control-label" for="edate">结束时间：</label>
					<div class="col-md-6 controls">
					    <input type="text" class="form-control" name="Pdetail[edate]" id="edate"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="source_type">房源类型：</label>
					<div class="col-md-6 controls">
						<select class="form-control width-input width-input-large" name="Pdetail[source_type]" id="source_type">
					    	<option value="">--请选择--</option>
					    	<?php foreach ($sourceType as $value) { ?>
					    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
					    	<?php } ?>
					    </select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="">收费方式：</label>
					<div class="col-md-6 controls">
					      <input readonly type="text" class="form-control" value="<?php echo $chargeType['dvalue'];?>" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="pre_volumn">预计成交套数：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[pre_volumn]" id="pre_volumn"/>
						  		<span class="input-group-addon">套</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="commission_perunit">每套收取佣金：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[commission_perunit]" id="commission_perunit"/>
						  		<span class="input-group-addon">元</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="pre_commission_amount">预计佣金毛收入：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[pre_commission_amount]" id="pre_commission_amount"/>
						  		<span class="input-group-addon">元</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="prevolumn_perunit">预估案场奖励成交套数：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[prevolumn_perunit]" id="prevolumn_perunit"/>
						  		<span class="input-group-addon">套</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="prebrokervolumn">预估经纪人成交套数：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
					  		<div class="input-group">
						  		<input type="text" class="form-control" name="Pdetail[prebrokervolumn]" id="prebrokervolumn"/>
						  		<span class="input-group-addon">套</span>
						  	</div>
					  	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-6 control-label" for="jd_retain_amount">焦点留存金额：</label>
					<div class="col-md-6 controls">
					    <div class="input-group ">
						  		<input type="text" readonly class="form-control" name="Pdetail[jd_retain_amount]" id="jd_retain_amount"/>
					  	</div>
					</div>
				</div>
		    </div>

		    <div class="form-group col-md-12">
				<label class="col-md-3 control-label" for="pref_context">优惠情况</label>
				<div class="col-md-9 controls phl">
					<textarea class="form-control" rows="4" cols="20" name="Pdetail[pref_context]" id="pref_context" ></textarea>
				</div>
			</div>
		    
			<?php include('splitdetail-modal.php');?>
		
	    </div>
	    <div class="modal-footer">
			<button id="pdetail-create-btn" type="submit" class="btn btn-primary pull-right">确定</button>
			<button type="button" class="btn btn-link pull-right" data-dismiss="modal">取消</button>
	    </div>
		<input type="hidden" name="Pdetail[charge_type]" id="charge_type" value="<?php echo $chargeType['dict_id'];?>">
    </form>
  </div>
  <script>app.load("pdetail/create");</script>
