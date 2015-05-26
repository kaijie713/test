<div class="panel panel-default panel-col">
	<div class="panel-heading">项目基本情况</div>
	<div class="panel-body">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-6 control-label" for="group_name"><span class="color-danger">*</span>项目名称：</label>
				<div class="col-md-6 controls">
					<div class="input-group">
				      <input type="text" readonly class="form-control" name="Evaluation[group_name]" id="group_name">
				      <span class="input-group-btn controls">
				        <button class="btn btn-default for-modal form-control" data-type="tHousesPrj" type="button" data-target="#modal" data-toggle="modal" data-url="/index.php?r=THousesPrj/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
				      </span>
				    </div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 control-label" for="city_name"><span class="color-danger">*</span>城市：</label>
				<div class="col-md-6 controls">
					<div class="input-group">
				      <input type="text" class="form-control" readonly name="Evaluation[city_name]" id="city_name">
				      <span class="input-group-btn">
				        <button class="btn btn-default for-modal form-control" data-type="dictChengshi" type="button" data-target="#modal" data-toggle="modal" data-url="/index.php?r=DictChengshi/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
				      </span>
				    </div>
				</div>
			</div>
			<div class="form-group">
			  <label class="col-md-6 control-label"  for="cooperetion_mode">合作方式：</label>
			  <div class="col-md-6 controls">
			    <select class="form-control width-input width-input-large" name="Evaluation[cooperetion_mode]" id="cooperetion_mode">
			    	<option value="">--请选择--</option>
			    	<?php foreach ($cooperation as $value) { ?>
			    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			    	<?php } ?>
			    </select>
			  </div>
			</div>
			<div class="form-group">
			  <label class="col-md-6 control-label"  for="customer_type"><span class="color-danger">*</span>甲方客户类型：</label>
			  <div class="col-md-6 controls">
			    <select class="form-control width-input width-input-large" name="Evaluation[customer_type]" id="customer_type">
			    	<option value="">--请选择--</option>
			    	<?php foreach ($customerType as $value) { ?>
			    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			    	<?php } ?>
			    </select>
			  </div>
			</div>
			<div class="form-group">
				<label class="col-md-6 control-label" for="pre_opendatetime">预计开盘时间：</label>
				<div class="col-md-6 controls">
					<input type="text" class="form-control" name="Evaluation[pre_opendatetime]" id="pre_opendatetime" >
				</div>
			</div>
		</div>

		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-6 control-label" for="userName">申请人：</label>
				<div class="col-md-6 controls">
					<span class="form-control" readonly >default</span>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 control-label" for="ec_incharge_name"><span class="color-danger">*</span>电商负责人：</label>
				<div class="col-md-6 controls">
					<div class="input-group">
				      <input type="text" class="form-control" readonly name="Evaluation[ec_incharge_name]" id="ec_incharge_name">
				      <span class="input-group-btn">
					        <button class="btn btn-default for-modal form-control" type="button" data-type="ecIncharge" data-target="#modal" data-toggle="modal" data-url="/index.php?r=User/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
					  </span>
				    </div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-6 control-label" for="sales_name">销售姓名：</label>
				<div class="col-md-6 controls">
					<div class="input-group">
				      <input type="text" class="form-control" readonly name="Evaluation[sales_name]" id="sales_name" >
				      <span class="input-group-btn">
					        <button class="btn btn-default for-modal form-control" type="button" data-type="sales" data-target="#modal" data-toggle="modal" data-url="/index.php?r=User/list">&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>
					  </span>
				    </div>
				</div>
			</div>
			<div class="form-group">
			  <label class="col-md-6 control-label" for="customer_level"><span class="color-danger">*</span>客户级别：</label>
			  <div class="col-md-6 controls">
			    <select class="form-control width-input width-input-large" name="Evaluation[customer_level]" id="customer_level">
			    	<option value="">--请选择--</option>
			    	<?php foreach ($customerLevel as $value) { ?>
			    		<option value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			    	<?php } ?>
			    </select>
			  </div>
			</div>
			<div class="form-group">
			  <label class="col-md-6 control-label" for="area_id">项目地区：</label>
			  <div class="col-md-6 controls">
			    <select class="form-control width-input width-input-large" name="Evaluation[area_id]" id="area_id" data-url="/index.php?r=Area/getAreaByCityId">
			    	<option value="">--请选择--</option>
			    </select>
			  </div>
			</div>
		</div>

		<div class="form-group col-md-12">
			<label class="col-md-3 control-label" for="prj_condition">项目情况说明：</label>
			<div class="col-md-9 controls phl">
				<textarea class="form-control" rows="7" cols="20" name="Evaluation[prj_condition]" id="prj_condition" ></textarea>
			</div>
		</div>
	</div>
</div>