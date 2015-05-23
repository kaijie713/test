<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">用户列表</h4>
    </div>
    <div class="modal-body">
	  <div class="row form-group">
	    <div class="col-md-2 control-label">
	      <label for="title">查找</label>
	    </div>
	    <div class="col-md-8 controls">
	    	<div class="input-group">
		      <input type="text" class="form-control" name="User[multiple]" value="<?php echo isset($params['multiple'])?$params['multiple']:'';?>" placeholder="搜索  姓名、员工编号或sohu-inc邮箱前缀">
		      <span class="input-group-btn">
		        <button type="button" class="btn btn-default btn-submit" data-url="/index.php?r=User/list" >&nbsp;<span aria-hidden="true" class="glyphicon glyphicon-search"></span>&nbsp;</button>
		      </span>
		    </div>
	    </div>
	  </div>
	  <?php include('list-tr.php');?>

    </div>
      <div class="modal-footer">
		  <button id="announcement-create-btn"  class="btn btn-primary pull-right btn-confirm">确定</button>
		  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">取消</button>
		  <script>//app.load('dict-chengshi/list');</script>
      </div>
  </div>
</div>