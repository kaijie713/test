<form action="" method="get" class="well well-sm form-inline clearfix">
	<div class="form-group col-md-3">
		<input type="text" value="<?php echo isset($params['group_name'])?$params['group_name']:'';?>" placeholder="项目名称" name="Evaluation[group_name]" class="form-control">
	</div>
	<div class="form-group col-md-3">
		<input type="text" value="" placeholder="城市" name="Evaluation[city_name]" class="form-control">
	</div>
	<div class="form-group col-md-3">
		<input type="text" value="" placeholder="电商负责人" name="Evaluation[ec_incharge_name]" class="form-control">
	</div>

	<div class="form-group col-md-3">
		<button type="submit" class="btn btn-primary">搜索</button>
	</div>	

	<div class="form-group col-md-3">
		<select name="Evaluation[cooperetion_mode]" class="form-control">
		  <option value="">--合作方式--</option>
		  <option value="1">焦点独家</option>
		  <option value="1">联合电商</option>
		</select>
	</div>
	<div class="form-group col-md-3">
		<input type="text" value="" placeholder="申请人" name="createby" class="form-control">
	</div>

	<div class="form-group col-md-3">
		<select name="Evaluation[pstatus]" class="form-control">
		  <option value="">--状态--</option>
		  <option value="1">新建</option>
		  <option value="1">提交审核</option>
		  <option value="1">审核中</option>
		  <option value="1">终审通过</option>
		  <option value="1">驳回</option>
		</select>
	</div>
	

</form>