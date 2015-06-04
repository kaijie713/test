<?php
$this->pageTitle='电商评估单列表 - '.Yii::app()->name;
$this->script_controller = 'evaluation/admin';
?>

<div id="content-header">
    <div id="breadcrumb"> <a class="tip-bottom" href="/index.php?r=evaluation/admin" data-original-title="去首页"><i class="icon-home"></i> 首页</a> <a class="current" href="/index.php?r=evaluation/admin">评估单列表</a> </div>
</div>

<?php //$this->widget('bootstrap.widgets.TbBreadcrumb', array(
    //'links' => $this->breadcrumbs,
//)); ?>
<div class="container-fluid">
<hr>
<?php echo $this->renderPartial('filter',array('params'=>$params));?>


<?php $this->renderPartial('/macro/flashMessage');?>

	<div class="row-fluid">
        <div class="span12">
			<div class="widget-box">
	          <div class="widget-content nopadding">
	            <table class="table table-bordered table-striped">
	              <thead>
	                <tr>
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
						  <td class="center">
						    <strong><a href="javascript:;"><?php echo $v['eva_id'];?></a></strong>
						  </td>
						  <td class="center">
						    <?php echo $v['group_name'];?>
						  </td>
						  <td class="center">
						    <?php echo $v['city_name'];?>
						  </td>
						  <td class="center">
						    <?php echo $v['createby_name'];?>
						  </td>
						  <td class="center">
						    <?php echo $v['ec_incharge_name'];?>
						  </td>
						  <td class="center">
						     <?php echo $v['status'];?>
						  </td>
						  <td class="center">
						     <?php F::subDecimal($v['net_income']);?>
						  </td>
						  <td class="center">
							<div class="btn-group">

							  <a class="btn btn-default btn-sm" href="#">查看</a>
							  <a data-toggle="dropdown" class="btn btn-default btn-sm dropdown-toggle" type="button" href="javascript:;">
							    <span class="caret"></span>&nbsp;
							  </a>
							  <ul class="dropdown-menu">
							    <li><a href="/index.php?r=evaluation/Approval&id=<?php echo $v['eva_id'];?>"><i class="glyphicon glyphicon-cog"></i> 审批评估单</a></li>
							    <li><a href="/index.php?r=evaluation/SetPermissionAccess&id=<?php echo $v['eva_id'];?>"><i class="glyphicon glyphicon-cog"></i> 设置授权</a></li>
							    <li><a href="#"><i class="glyphicon glyphicon-cog"></i> 调整评估单</a></li>
							    <li><a data-url="/index.php?r=evaluation/delete&id=<?php echo $v['eva_id'];?>" data-target="<?php echo $v['eva_id'];?>" class="delete-btn" href="javascript:">删除</a></li>
							  </ul>
							</div>
						  </td>
						</tr>
				 	<?php endforeach;?>
			               
	              </tbody>
	            </table>
	            <div class="row">
					<div class="span1">
					</div>
					
					    <?php $this->widget(
					            'application.widget.TbLinkPager',
					            array(
					                'pages' => $pages,
					                'currentPage'=>$pageIndex,
					                'pageSize'=>$this->pagesize
					            )
					    );?>
			    </div>
	          </div>
	        </div>


	

		</div>

    </div>
</div>

