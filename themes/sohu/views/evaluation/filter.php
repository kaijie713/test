<div class="row-fluid">
  <div class="widget-box">
    <div class="widget-content">
      <div class="row-fluid">
		<form action="" method="get" class="form-search">
			<div class="span3 control-group">
				<div class="control-group">
					<input type="text" value="<?php echo isset($params['group_name'])?$params['group_name']:'';?>" placeholder="项目名称" name="Evaluation[group_name]" class="form-control">
				</div>
				<div class="control-group">
					<input type="text" value="" placeholder="城市" name="Evaluation[city_name]" class="form-control">
				</div>
			</div>
			<div class="span3 control-group">
				<div class="control-group">
					<input type="text" value="" placeholder="电商负责人" name="Evaluation[name1]" class="form-control">
				</div>

				<div class="control-group">
					<select name="Evaluation[cooperetion_mode]" class="form-control">
					  <option value="">--合作方式--</option>
					    <?php foreach (Dict::gets('cooperation') as $value) { ?>
			    			<option <?php if (isset($params['cooperetion_mode']) && $params['cooperetion_mode']== $value['dict_id']) {?> selected <?php }?> value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			    		<?php } ?>
					</select>
				</div>
			</div>
			<div class="span3 control-group">
				<div class="control-group">
					<input type="text" value="" name="Evaluation[name]" placeholder="申请人" name="createby" class="form-control">
				</div>

				<div class="control-group">
					<select name="Evaluation[status]" class="form-control">
					  <option value="">--状态--</option>
			    		<?php foreach (Dict::gets('evaStatus') as $value) { ?>
			    			<option <?php if (isset($params['status']) && $params['status']== $value['dict_id']) {?> selected <?php }?> value="<?php echo $value['dict_id'];?>"><?php echo $value['dvalue'];?></option>
			    		<?php } ?>
					</select>
				</div>
			</div>
		    <div class="span3 control-group">
		        <div class="control-group">
				<button type="submit" class="btn btn-primary">搜索</button>
			</div>	

		</form>

      </div>
    </div>
  </div>
</div>


