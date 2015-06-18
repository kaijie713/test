<div class="widget-box">
	<div class="widget-title"><h5>项目基本情况</h5></div>
	<div class="widget-content nopadding ">
		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label" for="group_name"><span class="color-danger">*</span>项目名称：</label>
				<div class="controls">
					<div class="input-prepend">
				      <input type="text" readonly class="form-control" name="Evaluation[group_name]" id="group_name">
				      <button class="btn for-modal" data-type="tHousesPrj" type="button" data-target="#modal" data-toggle="modal" data-url="/index.php?r=THousesPrj/list">&nbsp;<span class="icon icon-search" aria-hidden="true"></span>&nbsp;</button>
				    </div>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="city_name"><span class="color-danger">*</span>城市：</label>
				<div class="controls">
					<div class="input-prepend">
				      <input type="text" class="form-control" readonly name="Evaluation[city_name]" id="city_name">
				      <button class="btn for-modal" data-type="dictChengshi" type="button" data-target="#modal" data-toggle="modal" data-url="/index.php?r=DictChengshi/list">&nbsp;<span class="icon icon-search" aria-hidden="true"></span>&nbsp;</button>
				    </div>
				</div>
			</div>
			<div class="control-group form-group">
			  <label class="control-label"  for="cooperetion_mode">合作方式：</label>
			  <div class="controls">
			    <select class="form-control width-input width-input-large" name="Evaluation[cooperetion_mode]" id="cooperetion_mode">
			    	<option value="">--请选择--</option>
			    	<?php foreach (Dict::gets('cooperation') as $value) { ?>
			    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			    	<?php } ?>
			    </select>
			  </div>
			</div>
			<div class="control-group form-group">
			  <label class="control-label"  for="customer_type"><span class="color-danger">*</span>甲方客户类型：</label>
			  <div class="controls">
			    <select class="form-control width-input width-input-large" name="Evaluation[customer_type]" id="customer_type">
			    	<option value="">--请选择--</option>
			    	<?php foreach (Dict::gets('customerType') as $value) { ?>
			    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			    	<?php } ?>
			    </select>
			  </div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="pre_opendatetime">预计开盘时间：</label>
				<div class="controls">
					<input type="text" class="form-control" name="Evaluation[pre_opendatetime]" id="pre_opendatetime" >
				</div>
			</div>
		</div>

		<div class="span6">
			<div class="control-group form-group">
				<label class="control-label" for="userName">申请人：</label>
				<div class="controls">
					<span class="form-control" readonly ><?php echo Yii::app()->user->__get('name');?></span>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="ec_incharge_name"><span class="color-danger">*</span>电商负责人：</label>
				<div class="controls">
					<div class="input-prepend">
				      <input type="text" class="form-control" readonly name="Evaluation[ec_incharge_name]" id="ec_incharge_name">
					  <button class="btn for-modal" type="button" data-type="ecIncharge" data-target="#modal" data-toggle="modal" data-url="/index.php?r=User/list">&nbsp;<span class="icon icon-search" aria-hidden="true"></span>&nbsp;</button>
				    </div>
				</div>
			</div>
			<div class="control-group form-group">
				<label class="control-label" for="sales_name">销售姓名：</label>
				<div class="controls">
					<div class="input-prepend">
				      <input type="text" class="form-control" readonly name="Evaluation[sales_name]" id="sales_name" >
					  <button class="btn for-modal" type="button" data-type="sales" data-target="#modal" data-toggle="modal" data-url="/index.php?r=User/list">&nbsp;<span class="icon icon-search" aria-hidden="true"></span>&nbsp;</button>
				    </div>
				</div>
			</div>
			<div class="control-group form-group">
			  <label class="control-label" for="customer_level"><span class="color-danger">*</span>客户级别：</label>
			  <div class="controls">
			    <select class="form-control width-input width-input-large" name="Evaluation[customer_level]" id="customer_level">
			    	<option value="">--请选择--</option>
			    	<?php foreach (Dict::gets('customerLevel') as $value) { ?>
			    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			    	<?php } ?>
			    </select>
			  </div>
			</div>
			<div class="control-group form-group">
			  <label class="control-label" for="area_id">项目地区：</label>
			  <div class="controls">
			    <select class="form-control width-input width-input-large" name="Evaluation[area_id]" id="area_id" data-url="/index.php?r=Area/getAreaByCityId">
			    	<option value="">--请选择--</option>
			    </select>
			  </div>
			</div>
		</div>
			<div class="control-group form-group span12">
				<label class="control-label span3"  for="prj_condition">项目情况说明：</label>
				<div class="controls " >
					<textarea class="span11" rows="4" cols="20" name="Evaluation[prj_condition]" id="prj_condition" ></textarea>
				</div>
			</div>

			<div class="clear">
			</div>
	</div>
</div>