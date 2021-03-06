<div class="modal-dialog modal-lg">
  <div class="modal-content"  id="pdetail-create-widget">
   <form method="post" class="form-horizontal" novalidate="novalidate" data-role="pdetail-form" action="/index.php?r=Pdetail/Adjust">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	      <h4 class="modal-title">调整项目明细信息</h4>
	    </div>
	    <div class="modal-body row-fluid wt-at" >
			<div class="span6">
				<div class="form-group control-group">
					<label class="control-label" for="bdate">开始时间：</label>
					<div class="controls">
					    <input type="text" class="form-control" readonly value="<?php echo isset($model['bdate'])?F::ymd($model['bdate']):'';?>"  name="Pdetail[bdate]" id="bdate"/>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="sell_house_num">可售房源数量：</label>
					<div class="controls">
					    <div class="input-prepend input-append">
					  		<input type="text" readonly class="form-control span11" value="<?php echo isset($model['sell_house_num'])?$model['sell_house_num']:'';?>"  name="Pdetail[sell_house_num]" id="sell_house_num"/>
					  		<span class="add-on">套</span>
					  	</div>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="yujimaoshouru">预计毛收入：</label>
					<div class="controls">
					    <div class="input-prepend input-append">
					  		<input type="text" readonly class="form-control span11" value="<?php echo isset($model['pre_incoming'])?F::d2($model['pre_incoming']):'';?>"  name="yujimaoshouru" id="yujimaoshouru"/>
					  		<span class="add-on">元</span>
					  	</div>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="ajcard_price">爱家卡单价：</label>
					<div class="controls">
					    <div class="input-prepend input-append">
					  		<input type="text" readonly class="form-control span11" value="<?php echo isset($model['ajcard_price'])?F::d2($model['ajcard_price']):'';?>"  name="Pdetail[ajcard_price]" id="ajcard_price"/>
					  		<span class="add-on">元</span>
					  	</div>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="prjreword_perunit">案场奖励/每套：</label>
					<div class="controls">
					    <div class="input-prepend input-append">
					  		<input type="text" readonly class="form-control span11" value="<?php echo isset($model['prjreword_perunit'])?F::d2($model['prjreword_perunit']):'';?>"  name="Pdetail[prjreword_perunit]" id="prjreword_perunit"/>
					  		<span class="add-on">元</span>
					  	</div>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="brokerfees_perunit">经纪人服务费/每套：</label>
					<div class="controls">
					    <div class="input-prepend input-append">
					  		<input type="text" readonly class="form-control span11" value="<?php echo isset($model['brokerfees_perunit'])?F::d2($model['brokerfees_perunit']):'';?>"  name="Pdetail[brokerfees_perunit]" id="brokerfees_perunit"/>
					  		<span class="add-on">元</span>
					  	</div>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="jd_retain_ratio">焦点留存比例：</label>
					<div class="controls">
					    <div class="input-group ">
						  		<input type="text" readonly class="form-control" value="<?php echo isset($model['jd_retain_ratio'])?$model['jd_retain_ratio']:'';?>"  name="Pdetail[jd_retain_ratio]" id="jd_retain_ratio"/>
					  	</div>
					</div>
				</div>
			</div>

			<div class="span6">
				
				<div class="form-group control-group">
					<label class="control-label" for="edate">结束时间：</label>
					<div class="controls">
					    <input type="text" readonly class="form-control" value="<?php echo isset($model['edate'])?F::ymd($model['edate']):'';?>"  name="Pdetail[edate]" id="edate"/>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="source_type">房源类型：</label>
					<div class="controls">
						<input readonly type="text" class="form-control" name="Pdetail[source_type]" id="source_type" value="<?php echo Dict::getValue($model->source_type);?>" >

					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="">收费方式：</label>
					<div class="controls">
					      <input readonly type="text" class="form-control" id="shoufei" value="<?php echo $chargeType['dvalue'];?>" >
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="pre_volumn">预计成交套数：</label>
					<div class="controls">
					    <div class="input-prepend input-append">
					  		<input type="text" class="form-control span11" value="<?php echo isset($model['pre_volumn'])?$model['pre_volumn']:'';?>"  name="Pdetail[pre_volumn]" id="pre_volumn"/>
					  		<span class="add-on">套</span>
					  	</div>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="prevolumn_perunit">预估案场奖励成交套数：</label>
					<div class="controls">
					    <div class="input-prepend input-append">
					  		<input type="text" class="form-control span11" value="<?php echo isset($model['prevolumn_perunit'])?$model['prevolumn_perunit']:'';?>"  name="Pdetail[prevolumn_perunit]" id="prevolumn_perunit"/>
					  		<span class="add-on">套</span>
					  	</div>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="prebrokervolumn">预计经纪人成交套数：</label>
					<div class="controls">
					    <div class="input-prepend input-append">
					  		<input type="text" class="form-control span11" value="<?php echo isset($model['prebrokervolumn'])?$model['prebrokervolumn']:'';?>"  name="Pdetail[prebrokervolumn]" id="prebrokervolumn"/>
					  		<span class="add-on">套</span>
					  	</div>
					</div>
				</div>
				<div class="form-group control-group">
					<label class="control-label" for="jd_retain_amount">焦点留存金额：</label>
					<div class="controls">
					    <div class="input-group ">
						  		<input type="text" readonly class="form-control" value="<?php echo isset($model['jd_retain_amount'])?F::d2($model['jd_retain_amount']):'';?>"  name="Pdetail[jd_retain_amount]" id="jd_retain_amount"/>
					  	</div>
					</div>
				</div>
		    </div>

		    <div class="form-group control-group span12">
				<label class="span3 control-label" for="pref_context">优惠情况</label>
				<div class="controls">
					<textarea class="span11" rows="2" cols="20" name="Pdetail[pref_context]" id="pref_context" ><?php echo isset($model['pref_context'])?$model['pref_context']:'';?></textarea>
				</div>
			</div>

		    <?php include('splitdetail-update-modal.php');?>

	    </div>
	    <div class="modal-footer">
			<button id="pdetail-create-btn" type="submit" class="btn btn-primary pull-right">确定</button>
			<button type="button" class="btn btn-link pull-right" data-dismiss="modal">取消</button>
	    </div>

		<input type="hidden" name="Pdetail[pd_id]" id="pd_id" value="<?php echo $model->pd_id;?>">
		
		<input type="hidden" name="Pdetail[charge_type]" id="charge_type" data-type="<?php echo $chargeType['dkey'];?>" value="<?php echo $chargeType['dict_id'];?>">
		<input type="hidden" name="YII_CSRF_TOKEN" value="<?php echo Yii::app()->request->getCsrfToken();?>">
    </form>
  </div>
  <script>app.load("pdetail/update");</script>
