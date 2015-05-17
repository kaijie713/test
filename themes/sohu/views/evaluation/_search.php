<?php
/* @var $this EvaluationController */
/* @var $model Evaluation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_id'); ?>
		<?php echo $form->textField($model,'eva_id',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eva_no'); ?>
		<?php echo $form->textField($model,'eva_no',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city_id'); ?>
		<?php echo $form->textField($model,'city_id',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ec_incharge_id'); ?>
		<?php echo $form->textField($model,'ec_incharge_id',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cooperetion_mode'); ?>
		<?php echo $form->textField($model,'cooperetion_mode',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sales_id'); ?>
		<?php echo $form->textField($model,'sales_id',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_type'); ?>
		<?php echo $form->textField($model,'customer_type',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_level'); ?>
		<?php echo $form->textField($model,'customer_level',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pre_opendatetime'); ?>
		<?php echo $form->textField($model,'pre_opendatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area_id'); ?>
		<?php echo $form->textField($model,'area_id',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prj_condition'); ?>
		<?php echo $form->textField($model,'prj_condition',array('size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isactive'); ?>
		<?php echo $form->textField($model,'isactive',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createby'); ?>
		<?php echo $form->textField($model,'createby',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'createdate'); ?>
		<?php echo $form->textField($model,'createdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updateby'); ?>
		<?php echo $form->textField($model,'updateby',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updatedate'); ?>
		<?php echo $form->textField($model,'updatedate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attribute1'); ?>
		<?php echo $form->textField($model,'attribute1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attribute2'); ?>
		<?php echo $form->textField($model,'attribute2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'attribute3'); ?>
		<?php echo $form->textField($model,'attribute3',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->