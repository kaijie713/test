<?php 
    //引用公共头部模板    
  $this->renderPartial('/layouts/header');
?>

<div id="content">
	<?php echo $content; ?>
</div>

<?php 
  //引用公共底部模板   
  $this->renderPartial('/layouts/footer');
?>
