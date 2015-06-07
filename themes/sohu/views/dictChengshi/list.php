<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">城市列表</h4>
    </div>
    <div class="modal-body">
	  <div class="row-fluid form-group">
	    <div class="span2 control-label">
	      <label for="title">查找</label>
	    </div>
	    <div class="span10 controls">
	    	<div class="input-prepend span10">
		      <input type="text" class="form-control span10" name="DictChengshi[city_name]" value="<?php echo isset($params['city_name'])?$params['city_name']:'';?>" placeholder="搜索 城市名称">
		        <button type="button" class="btn  btn-submit" data-url="/index.php?r=DictChengshi/list" ><span class="icon icon-search" aria-hidden="true"></span></button>
		    </div>
	    </div>
	  </div>
	  <?php include('list-tr.php');?>

    </div>
      <div class="modal-footer">
		  <button id="announcement-create-btn"  class="btn btn-primary pull-right btn-confirm">确定</button>
		  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">取消</button>
		  <script>app.load('dict-chengshi/index');</script>
      </div>
  </div>
</div>