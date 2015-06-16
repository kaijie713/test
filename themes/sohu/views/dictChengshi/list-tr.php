<div style="max-height: 260px; overflow-x:hidden;overflow-y:auto;" id="tr-content">	
	<table class="table table-condensed table-hover table-list cursor">
	  <thead>
	    <tr>
	      <th>城市</th>
	      <th>省份</th>
	      <th>创建者</th>
	      <th>创建时间</th>
	      <th>修改者</th>
	      <th>修改时间</th>
	      <th class="hide">操作</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($dataProvider as $key => $value) { ?>
	      	<tr id="<?php echo $value['city_id']?>" data-name="<?php echo $value['city_name']?>">
	          <th scope="row"><?php echo $value['city_name']?></th>
	          <td><?php echo $value['province']?></td>
	          <td><?php echo $users[$value['createby']]['name'];?></td>
	          <td><?php echo date('Y-m-d',strtotime($value['createdate']));?></td>
	          <td><?php echo $users[$value['updateby']]['name'];?></td>
	          <td><?php echo date('Y-m-d',strtotime($value['updatedate']));?></td>
	          <td class="hide"><button class="btn btn-mini btn-model-select"><i class="icon-plus"></i></button></td>
	          
	        </tr>
	  	<?php } ?>
	    <?php if(empty($dataProvider)){ ?>
	    	<tr><td colspan="20"><div class="empty">无信息</div></td></tr>
	  	<?php } ?>
	  </tbody>
	</table>

</div>
<div class="row-fluid">
	<?php $this->widget(
	        'application.widget.TbLinkPager',
	        array(
	            'pages' => $pages,
	            'currentPage'=>$pageIndex,
	            'pageSize'=>$this->pagesize
	        )
	    );?>
</div>