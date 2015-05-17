<?php
/* @var $this EvaluationController */
/* @var $model Evaluation */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evaluation-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eva_id'); ?>
		<?php echo $form->textField($model,'eva_id',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'eva_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'eva_no'); ?>
		<?php echo $form->textField($model,'eva_no',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'eva_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->textField($model,'city_id',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ec_incharge_id'); ?>
		<?php echo $form->textField($model,'ec_incharge_id',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'ec_incharge_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cooperetion_mode'); ?>
		<?php echo $form->textField($model,'cooperetion_mode',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'cooperetion_mode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sales_id'); ?>
		<?php echo $form->textField($model,'sales_id',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'sales_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_type'); ?>
		<?php echo $form->textField($model,'customer_type',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'customer_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customer_level'); ?>
		<?php echo $form->textField($model,'customer_level',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'customer_level'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pre_opendatetime'); ?>
		<?php echo $form->textField($model,'pre_opendatetime'); ?>
		<?php echo $form->error($model,'pre_opendatetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area_id'); ?>
		<?php echo $form->textField($model,'area_id',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'area_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prj_condition'); ?>
		<?php echo $form->textField($model,'prj_condition',array('size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'prj_condition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->textField($model,'isactive',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'isactive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createby'); ?>
		<?php echo $form->textField($model,'createby',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'createby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdate'); ?>
		<?php echo $form->textField($model,'createdate'); ?>
		<?php echo $form->error($model,'createdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updateby'); ?>
		<?php echo $form->textField($model,'updateby',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'updateby'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updatedate'); ?>
		<?php echo $form->textField($model,'updatedate'); ?>
		<?php echo $form->error($model,'updatedate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attribute1'); ?>
		<?php echo $form->textField($model,'attribute1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'attribute1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attribute2'); ?>
		<?php echo $form->textField($model,'attribute2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'attribute2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attribute3'); ?>
		<?php echo $form->textField($model,'attribute3',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'attribute3'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->