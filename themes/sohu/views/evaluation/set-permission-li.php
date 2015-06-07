<li class="bg_lh" id="<?php echo $value['prmid'];?>">
	<small class="user-name"><?php echo $users[$value['u_id']]['name'];?></small>
	<i class="icon-user "></i> 
	<i class="icon-remove-sign delete-btn" data-url="/index.php?r=evaluation/DeletePermissionAccess&id=<?php echo $value['prmid'];?>"></i> 
	<strong class="code"><?php echo $value['seq'];?></strong> 
</li>