<script>
  var app = {};
  app.debug = <?php if(YII_DEBUG) { ?>true<?php }else{ ?>false<?php } ?>;
  app.basePath = "<?php echo Yii::app()->baseUrl;?>";
  app.version = "<?php echo Yii::app()->params['version']; ?>";
  app.httpHost = '<?php Yii::app()->request->hostInfo;?>';
  app.theme    = "<?php echo Yii::app()->theme->baseUrl;?>";

  var CKEDITOR_BASEPATH = app.themeGlobalScript + '/ckeditor/4.6.7/';

  app.config = {};

  app.config.loading_img_path = "<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/default/loading.gif";

  app.arguments = {};

  <?php if (isset($this->script_controller)) {  ?>
    app.controller = '<?php echo $this->script_controller;?>';
  <? } ?>

  <?php if (isset($this->script_arguments)) { ?>
    app.arguments = '<?php echo $this->script_arguments;?>';
  <? } ?>

  app.mainScript = '<?php echo Yii::app()->theme->baseUrl;?>/assets/js/app.js';
</script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/seajs/seajs/2.2.1/sea.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/seajs/seajs-style/1.0.2/seajs-style.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/seajs-global-config.js"></script>
<script>
  seajs.use(app.mainScript);
</script>