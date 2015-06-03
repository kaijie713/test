<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">项目列表</h4>
    </div>
    <div class="modal-body">
		  <div class="row-fluid  control-group">
		    <div class="span2 control-label">
		      <label for="title">查找</label>
		    </div>
		    <div class="span10 controls">
		    	<div class="input-prepend span10">
			      <input type="text" class="span10" value="<?php echo isset($params['group_name'])?$params['group_name']:'';?>" name="THousesPrj[group_name]" placeholder="搜索 项目名称">
			      <button type="button" data-url="/index.php?r=THousesPrj/list"  class="btn btn-submit"><span class="icon icon-search" aria-hidden="true"></span></button>
			    </div>
		    </div>
		  </div>
		<?php include('list-tr.php');?>

    </div>
      <div class="modal-footer">
		  <button id="announcement-create-btn"  class="btn btn-primary pull-right btn-confirm">确定</button>
		  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">取消</button>
		  <script>app.load('thouses-prj/index');</script>
      </div>
  </div>
</div>