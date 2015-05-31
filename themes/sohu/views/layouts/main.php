<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	 <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/bootstrap-responsive.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/matrix-style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/matrix-media.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/font-awesome/css/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/jquery.gritter.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/google.css" media="all" rel="stylesheet" type="text/css" />

    <!--
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/gallery2/bootstrap/3.1.1/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
    -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/common.css" media="all" rel="stylesheet" type="text/css" />


    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/favicon.ico">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

</head>

<body >
<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<!--close-Header-part--> 

<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">

    <li class="menu-text"><a title="" href="#"> <span class="text"><?php echo Yii::app()->session['name'];?>你好<?php echo Yii::app()->user->__get('name');?>，你现在的身份是：销售</span></a></li>
    <li class=""><a title="" href="/index.php?r=login/Logout"><i class="icon icon-share-alt"></i> <span class="text">安全退出</span></a></li>
  </ul>
</div>

<!-- <div id="site-navbar">
	<div class="container">
		<div class="container-gap">
	        <div class="navbar-header">
		          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a href="/" class="navbar-brand"><?php echo CHtml::encode(Yii::app()->name); ?></a>
	        </div>
	        <div class="navbar-collapse collapse">
	            <ul class="nav navbar-nav">
	                <li class=""><a class="" href="/teacher">电商评估 </a></li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
                    <li class="right-li-text"><?php echo Yii::app()->session['name'];?>你好<?php echo Yii::app()->user->__get('name');?>，你现在的身份是：销售</li>
                    <li><a href="/index.php?r=login/Logout"><i class="glyphicon glyphicon-off"></i> 安全退出</a></li>
                </ul>
	        </div>
        </div>
	</div>
</div> -->

<!--sidebar-menu-->
<div id="sidebar">
  <ul>
    <li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>电商评估管理</span> </a>
      <ul>
        <li><a href="/index.php?r=evaluation/admin">评估单列表</a></li>
        <li><a href="/index.php?r=evaluation/create">新建评估单</a></li>
        <li><a href="#">调整评估单</a></li>
        <li><a href="#">审批评估单</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon  icon-folder-open"></i> <span>电商执行管理</span> </a>
      <ul>
        <li><a href="#">电商执行资源申请</a></li>
        <li><a href="#">电商执行资源审批</a></li>
        <li><a href="#">执行工单管理</a></li>
        <li><a href="#">电商执行反馈</a></li>
        <li><a href="#">执行进程管理</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-folder-close"></i> <span>电商结项管理</span> </a>
      <ul>
        <li><a href="#">项目列表</a></li>
        <li><a href="#">电商项目归档</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon  icon-wrench"></i> <span>基础信息管理</span> </a>
      <ul>
        <li><a href="#">维护用户</a></li>
        <li><a href="#">维护城市</a></li>
        <li><a href="#">维护项目</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon  icon-lock"></i> <span>帐号权限管理</span> </a>
      <ul>
        <li><a href="#">帐号管理</a></li>
        <li><a href="#">角色管理</a></li>
        <li><a href="#">权限管理</a></li>
      </ul>
    </li>
  
    
  </ul>
</div>
<!--sidebar-menu-->

<div class="container-fluid hide" id="content-container">
	<div class="col-md-2 main-nav">
		<div class="panel panel-default main-panel">
			<ul class="nav">
	            <li class="">
	                <a data-toggle="collapse" data-parent="main-nav" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
	                	<span>电商评估管理</span>
	                    <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
	                </a>
	                
	                <ul id="collapse1" class="nav nav-stacked collapse in" aria-labelledby="headingOne">
	                    <li class="">
	                        <a href="/index.php?r=evaluation/admin">
	                            <i class="icon-caret-right"></i>
	                            <span>电商评估单列表</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="/index.php?r=evaluation/create">
	                            <i class="icon-caret-right"></i>
	                            <span>新建评估单</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>调整评估单</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>审批评估单</span>
	                        </a>
	                    </li>
	                </ul>
	            </li>

	            <li class="">
	                <a data-toggle="collapse" data-parent="main-nav" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
	                	<span>电商执行管理</span>
	                    <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
	                </a>
	                
	                <ul id="collapse2" class="nav nav-stacked collapse in" aria-labelledby="headingOne">
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>电商执行资源申请</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>电商执行资源审批</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>执行工单管理</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>电商执行反馈</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>执行进程管理</span>
	                        </a>
	                    </li>
	                </ul>
	            </li>

	            <li class="">
	                <a data-toggle="collapse" data-parent="main-nav" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
	                	<span>电商结项管理</span>
	                    <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
	                </a>
	                
	                <ul id="collapse3" class="nav nav-stacked collapse in" aria-labelledby="headingOne">
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>项目列表</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>电商项目归档</span>
	                        </a>
	                    </li>
	                </ul>
	            </li>

	            <li class="">
	                <a data-toggle="collapse" data-parent="main-nav" href="#collapse4" aria-expanded="true" aria-controls="collapse3">
	                	<span>基础信息管理</span>
	                    <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
	                </a>
	                
	                <ul id="collapse4" class="nav nav-stacked collapse in" aria-labelledby="headingOne">
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>维护用户</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>维护城市</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>维护项目</span>
	                        </a>
	                    </li>
	                </ul>
	            </li>

	            <li class="">
	                <a data-toggle="collapse" data-parent="main-nav" href="#collapse5" aria-expanded="true" aria-controls="collapse3">
	                	<span>帐号权限管理</span>
	                    <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
	                </a>
	                
	                <ul id="collapse5" class="nav nav-stacked collapse in" aria-labelledby="headingOne">
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>帐号管理</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>角色管理</span>
	                        </a>
	                    </li>
	                    <li class="">
	                        <a href="#">
	                            <i class="icon-caret-right"></i>
	                            <span>权限管理</span>
	                        </a>
	                    </li>
	                </ul>
	            </li>

	        </ul>

		</div>
	</div>

	<div class="col-md-10 main-right">

		<div class="page-default">
		
			<?php echo $content; ?>
			
		</div>
	</div>
</div>


<div class="row-fluid">
  <div id="footer" class="span12">Copyright © 2014 Sohu.com Inc. All Rights Reserved. 搜狐公司 <a href="http://house.focus.cn/aboutus/banquanshengming.html" target="_blank" rel="nofollow">版权所有</a></div>
</div>
<div id="modal" class="modal"></div>
<?php //$this->renderPartial('/layouts/script_boot');?>
<?php include('script_boot.php');?>
</body>
</html>
