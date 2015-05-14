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
		<?php echo $form->label($model,'GROUP_ID'); ?>
		<?php echo $form->textField($model,'GROUP_ID',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVA_ID'); ?>
		<?php echo $form->textField($model,'EVA_ID',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EVA_NO'); ?>
		<?php echo $form->textField($model,'EVA_NO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CITY_ID'); ?>
		<?php echo $form->textField($model,'CITY_ID',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EC_INCHARGE_ID'); ?>
		<?php echo $form->textField($model,'EC_INCHARGE_ID',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COOPERETION_MODE'); ?>
		<?php echo $form->textField($model,'COOPERETION_MODE',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SALES_ID'); ?>
		<?php echo $form->textField($model,'SALES_ID',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CUSTOMER_TYPE'); ?>
		<?php echo $form->textField($model,'CUSTOMER_TYPE',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CUSTOMER_LEVEL'); ?>
		<?php echo $form->textField($model,'CUSTOMER_LEVEL',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRE_OPENDATETIME'); ?>
		<?php echo $form->textField($model,'PRE_OPENDATETIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'AREA_ID'); ?>
		<?php echo $form->textField($model,'AREA_ID',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PRJ_CONDITION'); ?>
		<?php echo $form->textField($model,'PRJ_CONDITION',array('size'=>60,'maxlength'=>2000)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ISACTIVE'); ?>
		<?php echo $form->textField($model,'ISACTIVE',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATEBY'); ?>
		<?php echo $form->textField($model,'CREATEBY',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATEDATETIME'); ?>
		<?php echo $form->textField($model,'CREATEDATETIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UPDATEBY'); ?>
		<?php echo $form->textField($model,'UPDATEBY',array('size'=>36,'maxlength'=>36)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UPDATEDATETIME'); ?>
		<?php echo $form->textField($model,'UPDATEDATETIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATTRIBUTE1'); ?>
		<?php echo $form->textField($model,'ATTRIBUTE1',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATTRIBUTE2'); ?>
		<?php echo $form->textField($model,'ATTRIBUTE2',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ATTRIBUTE3'); ?>
		<?php echo $form->textField($model,'ATTRIBUTE3',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->