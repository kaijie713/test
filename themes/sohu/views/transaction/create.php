<div class="modal-dialog ">
  <div class="modal-content"  id="pdetail-create-widget">
    <form method="post" class="form-horizontal" novalidate="novalidate" data-role="transaction-form" action="/index.php?r=Transaction/create">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	      <h4 class="modal-title">请选择审批人</h4>
	    </div>
	    <div class="modal-body row-fluid wt-at">
			
	    	<div class="widget-box">
		        <div class="widget-content nopadding">

		        	<?php foreach ($nodes as $key => $node) { ?>
			        	<?php if(!empty($users[$node['node_id']])) {?>
				            <div class="control-group">
				              <label class="control-label"><?php echo $node['node_name']?></label>
				              <div class="controls">
				                <select name="Transaction[node_ids][<?php echo $node['node_id'];?>]">
				                	<?php foreach ($users[$node['node_id']] as $key => $user) { ?>
				                		<option value="<?php echo $user['u_id']?>"><?php echo $user['name']?></optioin>
				        			<?php } ?>
				                </select>
				              </div>
				            </div>

			        	<?php } ?>
		        	<?php } ?>
		     	


		        </div>
		    </div>
	    </div>
	    <div class="modal-footer">
			<button type="submit" id="transaction-create-btn" class="btn btn-primary pull-right">确定</button>
			<button type="button" class="btn btn-link pull-right" data-dismiss="modal">取消</button>
	    </div>


		<input type="hidden" name="YII_CSRF_TOKEN" value="<?php echo Yii::app()->request->getCsrfToken();?>">
		<input type="hidden" name="Transaction[bill_id]" value="<?php echo $billId;?>">
		<input type="hidden" name="Transaction[bill_type]" value="<?php echo $billType;?>">
    </form>
  </div>
  <script>//app.load("transaction/create");</script>
