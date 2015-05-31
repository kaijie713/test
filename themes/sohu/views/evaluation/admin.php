<?php
$this->breadcrumbs=array(
    '电商评估管理'=>array('admin'),
    '电商评估单列表'
);
$this->pageTitle='电商评估单列表 - '.Yii::app()->name;
$this->script_controller = 'evaluation/admin';
?>
<div class="page-heading">
	<h1 style="color:#000">电商评估单列表
		<div class="pull-right">
		    <a  href="/index.php?r=evaluation/create" class="btn btn-success btn-sm">新建评估单</a>
		</div>
	</h1>
</div>

<?php //$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    //'links' => $this->breadcrumbs,
//)); ?>

<?php echo $this->renderPartial('filter',array('params'=>$params));?>
<?php $this->renderPartial('/macro/flashMessage');?>

<div class="page-body clearfix">
	<table class="table table-striped table-hover">
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
		    <tr id="<?php echo $v['eva_id'];?>">
		      <td><input type="checkbox" data-role="batch-item" value="2"></td>
			  <td>
			    <strong><a href="javascript:;"><?php echo $v['eva_id'];?></a></strong>
			  </td>
			  <td>
			    <?php echo $hourses[$v['group_id']]['group_name'];?>
			  </td>
			  <td>
			    <?php echo $citys[$v['city_id']]['city_name'];?>
			  </td>
			  <td>
			    <?php echo $users[$v['createby']]['name'];?>
			  </td>
			  <td>
			    <?php echo $users[$v['ec_incharge_id']]['name'];?>
			  </td>
			  <td>
			    <?php //echo $v['eva_id'];?>
			  </td>
			  <td>
			    <?php //echo $v['eva_id'];?>
			  </td>
			  <td>
				<div class="btn-group">
				  <a class="btn btn-default btn-sm" href="#">查看</a>
				  <a data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle" type="button" href="#">
				    <span class="caret"></span>&nbsp;
				  </a>
				  <ul class="dropdown-menu">
				  	<li><a data-url="#" data-role="unpublish-item" href="javascript:">调整评估单</a></li>
				    <li><a data-url="?r=evaluation/delete&id=<?php echo $v['eva_id'];?>" data-target="<?php echo $v['eva_id'];?>" class="delete-btn" href="javascript:">删除</a></li>
				    </ul>
				</div>
			  </td>
			</tr>
	 	<?php endforeach;?>
	  </tbody>
	</table>
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

</div>
