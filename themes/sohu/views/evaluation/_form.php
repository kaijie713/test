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
		<?php echo $form->labelEx($model,'GROUP_ID'); ?>
		<?php echo $form->textField($model,'GROUP_ID',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'GROUP_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EVA_ID'); ?>
		<?php echo $form->textField($model,'EVA_ID',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'EVA_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EVA_NO'); ?>
		<?php echo $form->textField($model,'EVA_NO',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'EVA_NO'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CITY_ID'); ?>
		<?php echo $form->textField($model,'CITY_ID',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'CITY_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EC_INCHARGE_ID'); ?>
		<?php echo $form->textField($model,'EC_INCHARGE_ID',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'EC_INCHARGE_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COOPERETION_MODE'); ?>
		<?php echo $form->textField($model,'COOPERETION_MODE',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'COOPERETION_MODE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SALES_ID'); ?>
		<?php echo $form->textField($model,'SALES_ID',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'SALES_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CUSTOMER_TYPE'); ?>
		<?php echo $form->textField($model,'CUSTOMER_TYPE',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'CUSTOMER_TYPE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CUSTOMER_LEVEL'); ?>
		<?php echo $form->textField($model,'CUSTOMER_LEVEL',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'CUSTOMER_LEVEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRE_OPENDATETIME'); ?>
		<?php echo $form->textField($model,'PRE_OPENDATETIME'); ?>
		<?php echo $form->error($model,'PRE_OPENDATETIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'AREA_ID'); ?>
		<?php echo $form->textField($model,'AREA_ID',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'AREA_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PRJ_CONDITION'); ?>
		<?php echo $form->textField($model,'PRJ_CONDITION',array('size'=>60,'maxlength'=>2000)); ?>
		<?php echo $form->error($model,'PRJ_CONDITION'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ISACTIVE'); ?>
		<?php echo $form->textField($model,'ISACTIVE',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'ISACTIVE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATEBY'); ?>
		<?php echo $form->textField($model,'CREATEBY',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'CREATEBY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATEDATETIME'); ?>
		<?php echo $form->textField($model,'CREATEDATETIME'); ?>
		<?php echo $form->error($model,'CREATEDATETIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UPDATEBY'); ?>
		<?php echo $form->textField($model,'UPDATEBY',array('size'=>36,'maxlength'=>36)); ?>
		<?php echo $form->error($model,'UPDATEBY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'UPDATEDATETIME'); ?>
		<?php echo $form->textField($model,'UPDATEDATETIME'); ?>
		<?php echo $form->error($model,'UPDATEDATETIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ATTRIBUTE1'); ?>
		<?php echo $form->textField($model,'ATTRIBUTE1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ATTRIBUTE1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ATTRIBUTE2'); ?>
		<?php echo $form->textField($model,'ATTRIBUTE2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ATTRIBUTE2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ATTRIBUTE3'); ?>
		<?php echo $form->textField($model,'ATTRIBUTE3',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'ATTRIBUTE3'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->