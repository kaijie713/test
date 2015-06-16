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
<?php echo $this->renderPartial('filter',array('params'=>$params,'page'=>$page,'isApprover'=>$isApprover));?>
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="<?php echo $isApprover=='0' ? 'active':'';?>"><a href="/index.php?r=evaluation/adminApprover&isApprover=0" >待审批列表</a></li>
    <li class="<?php echo $isApprover=='1' ? 'active':'';?>"><a href="/index.php?r=evaluation/adminApprover&isApprover=1" >已审批列表</a></li>
  </ul>
</div>

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
	              <tbody class="is-null <?php if(!empty($dataProvider)) echo 'hide';?>">
		                  <tr><td colspan="20"><div class="empty">暂无记录.</div></td></tr>
		          </tbody>
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
						     <?php echo ApprovalServiceImpl::getApprovaStatus(array('bill_id'=>$v['eva_id'],'bill_type'=>'evaluation','code'=>'evaluation'));?>
						  </td>
						  <td class="center">
						     <?php F::ds4($v['net_income']);?>万元
						  </td>
						  <td class="center">
							<div class="btn-group">

							  <a class="btn btn-default btn-sm <?php echo $isApprover=='1' ? 'hide':'';?>" href="/index.php?r=Transaction/approval&bill_id=<?php echo $v['eva_id'];?>&bill_type=evaluation">审批</a>
							  <a class="btn btn-default btn-sm <?php echo $isApprover=='0' ? 'hide':'';?>" href="/index.php?r=evaluation/view&id=<?php echo $v['eva_id'];?>">查看</a>
							   
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

