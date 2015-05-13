<div class="wide form">

<?php $form=$this->beginWidget('BActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="clearfix">
		<?php echo $form->label($model,'E_ID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'E_ID',array('size'=>36,'maxlength'=>36)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'P_ID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'P_ID',array('size'=>36,'maxlength'=>36)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'PRJNAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'PRJNAME',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'CITYID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CITYID',array('size'=>36,'maxlength'=>36)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'CITYNAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CITYNAME',array('size'=>20,'maxlength'=>20)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'ECID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ECID',array('size'=>36,'maxlength'=>36)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'ECNAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ECNAME',array('size'=>50,'maxlength'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'COOPERETIONMODE'); ?>
		<div class="input">
			<?php echo $form->textField($model,'COOPERETIONMODE',array('size'=>2,'maxlength'=>2)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'SALEID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'SALEID',array('size'=>36,'maxlength'=>36)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'SALENAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'SALENAME',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'ACUSTOMERTYPE'); ?>
		<div class="input">
			<?php echo $form->textField($model,'ACUSTOMERTYPE',array('size'=>2,'maxlength'=>2)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'CUSTOMERLEVEL'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CUSTOMERLEVEL',array('size'=>1,'maxlength'=>1)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'PREOPENDATE'); ?>
		<div class="input">
			<?php echo $form->textField($model,'PREOPENDATE'); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'PRJAREA'); ?>
		<div class="input">
			<?php echo $form->textField($model,'PRJAREA',array('size'=>50,'maxlength'=>50)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'PRJCONDITION'); ?>
		<div class="input">
			<?php echo $form->textField($model,'PRJCONDITION',array('size'=>60,'maxlength'=>2000)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'CTORID'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CTORID',array('size'=>36,'maxlength'=>36)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'CTORNAME'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CTORNAME',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="clearfix">
		<?php echo $form->label($model,'CDATE'); ?>
		<div class="input">
			<?php echo $form->textField($model,'CDATE'); ?>
		</div>
	</div>

	<div class="actions">
		<?php echo BHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->