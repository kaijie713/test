<?php
$this->breadcrumbs=array(
    '电商评估管理'=>array('admin'),
    '设置授权人'
);
$this->pageTitle='设置授权人 - '.Yii::app()->name;
$this->script_controller = 'permission-access/set-approve';
?>

<div id="content-header">
    <div id="breadcrumb"> 
    	<a class="tip-bottom" href="/index.php?r=evaluation/admin" data-original-title="去首页"><i class="icon-home"></i> 首页</a> 
    	<a  href="/index.php?r=evaluation/admin">评估单列表</a> 
    	<a class="current" href="#">设置授权人</a> </div>
    <h1><?php echo $hourses[$evaluation->hourse_id]['group_name'];?></h1>
</div>

<div class="container-fluid">
	<hr>
	<div class="row-fluid evaluation-create">
		<div class="row-fluid">
	      <div class="widget-box">
	        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
	          <h5>授权人</h5>
	          <button class="btn btn-info pull-right set-user" data-url="/index.php?r=User/list" data-add="/index.php?r=PermissionAccess/AddPermissionAccess"  data-toggle="modal" data-target="#modal">添加授权</button>
	        </div>
	        <div class="widget-content" style="min-height:150px">
	          <div class="row-fluid">
	            <div class="span12">
	              <ul class="site-stats" data-sort-url="/index.php?r=PermissionAccess/PermissionAccessSort">
	                <?php foreach ($dataProvider as $key => $value) { ?>
					   	<?php include ('set-permission-li.php');?>
				  	<?php } ?>
				    
				    <div class="empty <?php if(!empty($dataProvider)){ ?>hide<?php } ?>">暂无授权记录</div>
				  	
	              </ul>
	            </div>
	          </div>
	        </div>
	      </div>


	      <div class="form-group">
		    <div class="pull-right offset2 span3 controls">
		    	<a href="/index.php?r=evaluation/admin" class="btn btn-default">返回</a>
		    </div>
		</div>


	    </div>
	</div>
</div>
<input  type="hidden" id="evaId" value="<?php echo $evaluation->eva_id;?>"/>
