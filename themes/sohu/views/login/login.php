<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title><meta charset="UTF-8" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/bootstrap-responsive.min.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/matrix-login.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/font-awesome/css/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css2/google.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/favicon.ico">

<style>
<?php
$this->script_controller = 'login/index';
?>
img{
    padding:5px 10px;
    background-color: #FFF;
}
</style>
    </head>
    <body>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="post" action="/index.php?r=login/login">
				 <div class="control-group normal_text"> <h3><img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/logo.gif" alt="Logo" /></h3></div>
                <?php if(!empty($errorMsg)) {?>
                    <div class="alert alert-error alert-block"> 
                        <?php echo $errorMsg;?>
                    </div>
                <?php }?>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" placeholder="邮箱" name="User[email]" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="密码" name="User[password]" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><button type="submit" class="btn btn-success" /> 登录</button></span>
                </div>
            </form>
        </div>
        <?php include('../layouts/script_boot.php');?>
    </body>

</html>
