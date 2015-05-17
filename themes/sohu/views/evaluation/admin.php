<?php
$this->breadcrumbs=array(
    '电商评估管理'=>array(''),
    '电商评估单列表'
);
?>

<div class="page-heading">
	<h1 style="color:#000">电商评估单列表
		<div class="pull-right">
		    <a target="blank" href="/course/create" class="btn btn-success btn-sm">新建评估单</a>
		</div>
		


	</h1>
</div>
<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
    'links' => $this->breadcrumbs,
)); ?>
<?php echo $this->renderPartial('filter',array('params'=>$params));?>

<div class="page-body clearfix">
	<table data-search-form="#user-search-form" class="table table-striped table-hover" id="user-table">
	  <thead>
	    <tr>
	      <th width="5%"><input type="checkbox" data-role="batch-select"></th>
	      <th>评估单编号</th>
	      <th>项目名称</th>
	      <th>城市</th>
	      <th>申请人</th>
	      <th>电商负责人</th>
	      <th>最新动态</th>
	      <th>预计净收益</th>
	      <th>操作</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php foreach ($dataProvider as $v):?>
		    <tr id="table-tr-62022">
		      <td><input type="checkbox" data-role="batch-item" value="2"></td>
			  <td>
			    <strong><a href="javascript:;"><?php echo $v['eva_id'];?></a></strong>
			  </td>
			  <td>
			    <?php echo $v['eva_id'];?>
			  </td>
			  <td>
			    <?php echo $v['eva_id'];?>
			  </td>
			  <td>
			    <?php echo $v['eva_id'];?>
			  </td>
			  <td>
			    <?php echo $v['eva_id'];?>
			  </td>
			  <td>
			    <?php echo $v['eva_id'];?>
			  </td>
			  <td>
			    <?php echo $v['eva_id'];?>
			  </td>
			  <td>
				<div class="btn-group">
				  <a class="btn btn-default btn-sm" href="/admin/article/2/edit">查看</a>
				  <a data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle" type="button" href="#">
				    <span class="caret"></span>&nbsp;
				  </a>
				  <ul class="dropdown-menu">
				  	<li><a data-url="/admin/article/2/unpublish" data-role="unpublish-item" href="javascript:">调整评估单</a></li>
				    <li><a data-url="/admin/article/2/trash" data-role="trash-item" href="javascript:">删除</a></li>
				    </ul>
				</div>
			  </td>
			</tr>
	 	<?php endforeach;?>
	  </tbody>
	</table>
	<div class="row">
    
    </div>

</div>
<script>
$element.on('click', '[data-role=batch-delete]', function() {
	var $btn = $(this);
		name = $btn.data('name');

	var ids = [];
	$element.find('[data-role=batch-item]:checked').each(function(){
	    ids.push(this.value);
	});

	if (ids.length == 0) {
	    Notify.danger('未选中任何' + name);
	    return ;
	}

	if (!confirm('确定要删除选中的' + ids.length + '条' + name + '吗？')) {
	    return ;
	}

	$element.find('.btn').addClass('disabled');

	Notify.info('正在删除' + name + '，请稍等。', 60);

	$.post($btn.data('url'), {ids:ids}, function(response){
	    window.location.reload();
	});

});
</script>