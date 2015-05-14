<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/javascripts/jquery/jquery-1.11.3.min.js"></script>
	<?php //Yii::app()->bootstrap->register(); ?>

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/bootstrap/css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/bootstrap/css/bootstrap-theme.min.css" media="all" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/bootstrap/js/bootstrap.min.js"></script>
    
    <!--[if lt IE 9]>
    	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/javascripts/ie/html5shiv.js" type="text/javascript"></script>
    <![endif]-->
    <!--[if IE 8]>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/javascripts/ie/respond.js" type="text/javascript"></script>
	<![endif]-->
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container-fluid" id="sohu">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
<?php echo TbHtml::muted('Fusce dapibus, tellus ac cursus commodo, tortor mauris nibh.'); ?>
<?php echo TbHtml::em('Etiam porta sem malesuada magna mollis euismod.', array('color' => TbHtml::TEXT_COLOR_WARNING)); ?>
<?php echo TbHtml::em('Donec ullamcorper nulla non metus auctor fringilla.', array('color' => TbHtml::TEXT_COLOR_ERROR)); ?>
<?php echo TbHtml::em('Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis.', array('color' => TbHtml::TEXT_COLOR_INFO)); ?>
<?php echo TbHtml::em('Duis mollis, est non commodo luctus, nisi erat porttitor ligula.', array('color' => TbHtml::TEXT_COLOR_SUCCESS)); ?>
<?php
Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_INFO,
    '<strong>Heads up!</strong> This alert needs your attention, but it\'s not super important.');
    ?>

    <?php

    Yii::app()->user->setFlash(TbHtml::ALERT_COLOR_SUCCESS,
    '<strong>Well done!</strong> You successfully read this important alert message.');?>
</body>
</html>
