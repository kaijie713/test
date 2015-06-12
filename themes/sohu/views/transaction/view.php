
<div class="widget-box">
	<div class="widget-title"><h5>审批信息</h5></div>
	<div class="widget-content nopadding">
		<table class="table table-striped table-hover table-form" data-search-form="#user-search-form" >
		  <thead>
		    <tr>
		      <th width="25%">审批人</th>
		      <th width="25%">审批时间</th>
		      <th width="20%">审批动作</th>
		      <th width="20%">审批意见</th>
		      <th width="10%">附件</th>
		    </tr>
		  </thead>

          <tbody id="pdetail-body" data-role="pdetails">
		  	<?php $i = 1;?>
		  	<?php foreach ($approvaProcess as $key => $val) {?>
		  	<?php if($val['approval_date'] == '' || $val['approval_date'] == null)   continue;?>
			  	<tr>
				  <td><p class="form-control-static"><?php echo empty($users[$val['approver_id']])?'':$users[$val['approver_id']]['name'];?></td>
				  <td><p class="form-control-static"><?php echo F::ymd($val['approval_date']);?></td>
				  <td><p class="form-control-static"><?php echo $val['approval_type'];?></td>
				  <td><p class="form-control-static"><?php echo $val['content'];?></td>
				  <td>
				  	<?php if(!empty($files[$val['file_id']])) {?>
				  	  <a  class="btn btn-default btn-sm" target="_blank" href="/index.php?r=Transaction/Download&bill_id=<?php echo $val['bill_id'];?>&bill_type=<?php echo $val['bill_type'];?>&code=<?php echo $val['workflow_code'];?>&fileId=<?php echo $files[$val['file_id']]['id'];?>" >附件下载</a>
				  	  <?php }?>
				  </td>
				</tr>
			<?php $i++;   }?>
	 	  </tbody>
	 	   <?php if($i ==1) {?>
		  <tbody class="is-null">
                  <tr><td colspan="20"><div class="empty">暂无审批记录.</div></td></tr>
          </tbody>
          <?php }?>
		</table>
		<div class="mtl <?php if(!empty($isView)) { ?> hide <?php } ?>">
			<textarea name="Approval[content]" style="width:50%;height:100px;margin:10px;" class="pull-left" placeholder="请输入审批意见"></textarea>
			<div class="pull-left">
				附件:
				<input type="file" name="file" value="上传附件"/>
			</div>

		</div>

		<div class="clear">
		</div>
	</div>
</div>