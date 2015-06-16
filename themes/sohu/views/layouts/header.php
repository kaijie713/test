<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
  <meta content="<?php echo Yii::app()->request->getCsrfToken();?>" name="YII_CSRF_TOKEN" />

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

<div id="header">
  <h1><a href="#">搜狐焦点</a></h1>
</div>

<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">

    <li class="menu-text"><a title="" href="#"> <span class="text"><?php echo Yii::app()->session['name'];?>你好<?php echo Yii::app()->user->__get('name');?>，你现在的身份是：销售</span></a></li>
    <li class=""><a title="" href="/index.php?r=login/Logout"><i class="icon icon-share-alt"></i> <span class="text">安全退出</span></a></li>
  </ul>
</div>

<div id="sidebar">
  <ul>
    <li class="submenu open"> <a href="#"><i class="icon icon-th-list"></i> <span>电商评估管理</span> </a>
      <ul>
        <li><a href="/index.php?r=evaluation/admin">评估单列表</a></li>
        <li><a href="/index.php?r=evaluation/adminApprover">审批列表</a></li>
        <li><a href="/index.php?r=evaluation/create">新建评估单</a></li>
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
