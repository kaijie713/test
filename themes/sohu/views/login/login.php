<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--[if lt IE 7]>      <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class=""> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/gallery2/bootstrap/3.1.1/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/style.css" media="all" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/favicon.ico">
<!--[if lt IE 9]>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/ie/html5shiv.js" type="text/javascript"></script>
<![endif]-->
<!--[if IE 8]>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/ie/respond.js" type="text/javascript"></script>
<![endif]-->
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<style>
.panel-page {
    min-height: 500px;
    padding: 45px 50px 50px;
}
.panel-page .panel-heading h2 {
    font-size: 25px;
    margin-top: 0;
    color:#000;
}
.panel-page .panel-heading {
    background: transparent none repeat scroll 0 0;
    border-bottom: medium none;
    margin: 0 0 30px;
    padding: 0;
}
label {
    display: inline-block;
    font-weight: 700;
    margin-bottom: 5px !important;
}
.form-group {
    margin-bottom: 40px;
}
.form-control {
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
    color: #555;
    display: block;
    font-size: 14px;
    height: 38px;
    line-height: 1.42857;
    padding: 6px 12px;
    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
    width: 100%;
}
</style>
</head>

<body >
	<div id="site-navbar">
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
	          
			    <ul class="nav navbar-nav navbar-right">
                    <li><a href="/index.php?r=login/index"><i class="glyphicon glyphicon-off"></i> 登录</a></li>
                </ul>
	        </div>
        </div>
	</div>
</div>


	  <div id="content-container" class="container">
	        
	<div class="row row-6">
	  <div class="col-md-6 col-md-offset-3">

	    <div class="panel panel-default panel-page">
	      <div class="panel-heading"><h2>登录</h2></div>

	      <form id="login-form" class="form-vertical" method="post" action="/index.php?r=login/login">
	      	<?php if(!empty($errorMsg)) {?>
	        	<div class="alert alert-danger"><?php echo $errorMsg;?></div>
	        <?php }?>
	        <div class="form-group">
	          <label class="control-label" for="email">邮箱</label>
	          <div class="controls">
	            <input class="form-control" id="email" type="text" name="User[email]" value="" required placeholder='邮箱' />
	          </div>
	        </div>
	        <div class="form-group">
	          <label class="control-label" for="password">密码</label>
	          <div class="controls">
	            <input class="form-control" id="password" type="password" name="User[password]" required placeholder='密码'/>
	          </div>
	        </div>

	        <div class="form-group">
	          <div class="controls">
	            <span class="checkbox mtm pull-right">
	              <label> <input type="checkbox" name="User[remember_me]" checked="checked"> 记住密码 </label>
	            </span>
	            <button type="submit" class="btn btn-fat btn-primary btn-large">登录</button>
	          </div>
	        </div>

	      </form>


	    </div>

	  </div>
	</div>
	    
	  </div><!-- /container -->

</body>
</html>