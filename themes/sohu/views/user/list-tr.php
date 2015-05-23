<div style="max-height: 260px; overflow-x:hidden;overflow-y:auto;" id="tr-content">	
	<table class="table table-condensed table-hover table-list">
	  <thead>
	    <tr>
	      <th>姓名</th>
	      <th>员工编号</th>
	      <th>邮箱</th>
	      <th>创建者</th>
	      <th>创建时间</th>
	      <th>修改者</th>
	      <th>修改时间</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($dataProvider as $key => $value) { ?>
	      	<tr id="<?php echo $value['u_id']?>" data-name="<?php echo $value['name']?>">
	          <th scope="row"><?php echo $value['name']?></th>
	          <td><?php echo $value['employee_number']?></td>
	          <td><?php echo $value['email']?></td>
	          <td><?php echo $value['createby']?></td>
	          <td><?php echo $value['createdate']?></td>
	          <td><?php echo $value['updateby']?></td>
	          <td><?php echo $value['updatedate']?></td>
	        </tr>
	  	<?php } ?>
	    <?php if(empty($dataProvider)){ ?>
	    	<tr><td colspan="20"><div class="empty">无信息</div></td></tr>
	  	<?php } ?>
	  </tbody>
	</table>

</div>
<div class="row">
	<?php $this->widget(
	        'bootstrap.widgets.TbLinkPager',
	        array(
	            'pages' => $pages,
	            'currentPage'=>$pageIndex,
	            'pageSize'=>$this->pagesize
	        )
	    );?>
</div>