<div class="form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'id'=>'evaluation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php $this->widget('BAlert',array(

		'content'=>'<p>Fields with <span class="required">*</span> are required.</p>'
	)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="<?php echo $form->fieldClass($model, 'E_ID'); ?>">
		<?php echo $form->labelEx($model,'E_ID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'E_ID',array('size'=>36,'maxlength'=>36)); ?>
			<?php echo $form->error($model,'E_ID'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'P_ID'); ?>">
		<?php echo $form->labelEx($model,'P_ID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'P_ID',array('size'=>36,'maxlength'=>36)); ?>
			<?php echo $form->error($model,'P_ID'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'PRJNAME'); ?>">
		<?php echo $form->labelEx($model,'PRJNAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'PRJNAME',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'PRJNAME'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'CITYID'); ?>">
		<?php echo $form->labelEx($model,'CITYID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CITYID',array('size'=>36,'maxlength'=>36)); ?>
			<?php echo $form->error($model,'CITYID'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'CITYNAME'); ?>">
		<?php echo $form->labelEx($model,'CITYNAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CITYNAME',array('size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'CITYNAME'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'ECID'); ?>">
		<?php echo $form->labelEx($model,'ECID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ECID',array('size'=>36,'maxlength'=>36)); ?>
			<?php echo $form->error($model,'ECID'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'ECNAME'); ?>">
		<?php echo $form->labelEx($model,'ECNAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ECNAME',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'ECNAME'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'COOPERETIONMODE'); ?>">
		<?php echo $form->labelEx($model,'COOPERETIONMODE'); ?>
		<div class="input">
			<?php echo $form->textField($model,'COOPERETIONMODE',array('size'=>2,'maxlength'=>2)); ?>
			<?php echo $form->error($model,'COOPERETIONMODE'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'SALEID'); ?>">
		<?php echo $form->labelEx($model,'SALEID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'SALEID',array('size'=>36,'maxlength'=>36)); ?>
			<?php echo $form->error($model,'SALEID'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'SALENAME'); ?>">
		<?php echo $form->labelEx($model,'SALENAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'SALENAME',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'SALENAME'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'ACUSTOMERTYPE'); ?>">
		<?php echo $form->labelEx($model,'ACUSTOMERTYPE'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ACUSTOMERTYPE',array('size'=>2,'maxlength'=>2)); ?>
			<?php echo $form->error($model,'ACUSTOMERTYPE'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'CUSTOMERLEVEL'); ?>">
		<?php echo $form->labelEx($model,'CUSTOMERLEVEL'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CUSTOMERLEVEL',array('size'=>1,'maxlength'=>1)); ?>
			<?php echo $form->error($model,'CUSTOMERLEVEL'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'PREOPENDATE'); ?>">
		<?php echo $form->labelEx($model,'PREOPENDATE'); ?>
		<div class="input">
			<?php echo $form->textField($model,'PREOPENDATE'); ?>
			<?php echo $form->error($model,'PREOPENDATE'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'PRJAREA'); ?>">
		<?php echo $form->labelEx($model,'PRJAREA'); ?>
		<div class="input">
			<?php echo $form->textField($model,'PRJAREA',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'PRJAREA'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'PRJCONDITION'); ?>">
		<?php echo $form->labelEx($model,'PRJCONDITION'); ?>
		<div class="input">
			<?php echo $form->textField($model,'PRJCONDITION',array('size'=>60,'maxlength'=>2000)); ?>
			<?php echo $form->error($model,'PRJCONDITION'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'CTORID'); ?>">
		<?php echo $form->labelEx($model,'CTORID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CTORID',array('size'=>36,'maxlength'=>36)); ?>
			<?php echo $form->error($model,'CTORID'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'CTORNAME'); ?>">
		<?php echo $form->labelEx($model,'CTORNAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CTORNAME',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'CTORNAME'); ?>
		</div>
	</div>

	<div class="<?php echo $form->fieldClass($model, 'CDATE'); ?>">
		<?php echo $form->labelEx($model,'CDATE'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CDATE'); ?>
			<?php echo $form->error($model,'CDATE'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->