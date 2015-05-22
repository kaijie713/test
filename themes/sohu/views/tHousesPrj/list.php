<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">项目列表</h4>
    </div>
    <div class="modal-body">
		  <div class="row form-group">
		    <div class="col-md-2 control-label">
		      <label for="title">查找</label>
		    </div>
		    <div class="col-md-8 controls">
		    	<div class="input-group">
			      <input type="text" class="form-control" value="<?php echo isset($params['group_name'])?$params['group_name']:'';?>" name="THousesPrj[group_name]" placeholder="搜索 项目名称">
			      <span class="input-group-btn">
			        <button type="button" data-url="/index.php?r=THousesPrj/list"  class="btn btn-default btn-submit">&nbsp;<span aria-hidden="true" class="glyphicon glyphicon-search"></span>&nbsp;</button>
			      </span>
			    </div>
		    </div>
		  </div>
		<?php include('list-tr.php');?>

    </div>
      <div class="modal-footer">
		  <button id="announcement-create-btn"  class="btn btn-primary pull-right btn-confirm" data-page="tHousesPrj" >确定</button>
		  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">取消</button>
		  <script>//app.load('thouses-prj/list');</script>
      </div>
  </div>
</div>