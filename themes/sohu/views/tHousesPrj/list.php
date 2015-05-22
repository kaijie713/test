<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">项目列表</h4>
    </div>
    <div class="modal-body">
		<form id="house-list" class="form-horizontal" method="post" action="">

		  <div class="row form-group">
		    <div class="col-md-2 control-label">
		      <label for="title">查找</label>
		    </div>
		    <div class="col-md-8 controls">
		    	<div class="input-group">
			      <input type="text" class="form-control"  placeholder="搜索 项目名称">
			      <span class="input-group-btn">
			        <button type="button" class="btn btn-default">&nbsp;<span aria-hidden="true" class="glyphicon glyphicon-search"></span>&nbsp;</button>
			      </span>
			    </div>
		    </div>
		  </div>

		</form>
		<div style="max-height: 260px; overflow: scroll;" id="tr-content">
		    <?php include('list-tr.php');?>
		</div>
    </div>
      <div class="modal-footer">
		  <button id="announcement-create-btn" data-submiting-text="正在提交" type="submit" class="btn btn-primary pull-right" data-toggle="form-submit" data-target="#announcement-create-form">确定</button>
		  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">取消</button>
		  <script>app.load('thouses-prj/list');</script>
      </div>
  </div>
</div>