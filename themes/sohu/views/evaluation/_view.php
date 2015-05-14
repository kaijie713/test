<?php
/* @var $this EvaluationController */
/* @var $data Evaluation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVA_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->EVA_ID), array('view', 'id'=>$data->EVA_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GROUP_ID')); ?>:</b>
	<?php echo CHtml::encode($data->GROUP_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EVA_NO')); ?>:</b>
	<?php echo CHtml::encode($data->EVA_NO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CITY_ID')); ?>:</b>
	<?php echo CHtml::encode($data->CITY_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EC_INCHARGE_ID')); ?>:</b>
	<?php echo CHtml::encode($data->EC_INCHARGE_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COOPERETION_MODE')); ?>:</b>
	<?php echo CHtml::encode($data->COOPERETION_MODE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SALES_ID')); ?>:</b>
	<?php echo CHtml::encode($data->SALES_ID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('CUSTOMER_TYPE')); ?>:</b>
	<?php echo CHtml::encode($data->CUSTOMER_TYPE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CUSTOMER_LEVEL')); ?>:</b>
	<?php echo CHtml::encode($data->CUSTOMER_LEVEL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRE_OPENDATETIME')); ?>:</b>
	<?php echo CHtml::encode($data->PRE_OPENDATETIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('AREA_ID')); ?>:</b>
	<?php echo CHtml::encode($data->AREA_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRJ_CONDITION')); ?>:</b>
	<?php echo CHtml::encode($data->PRJ_CONDITION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISACTIVE')); ?>:</b>
	<?php echo CHtml::encode($data->ISACTIVE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATEBY')); ?>:</b>
	<?php echo CHtml::encode($data->CREATEBY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATEDATETIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATEDATETIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UPDATEBY')); ?>:</b>
	<?php echo CHtml::encode($data->UPDATEBY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UPDATEDATETIME')); ?>:</b>
	<?php echo CHtml::encode($data->UPDATEDATETIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATTRIBUTE1')); ?>:</b>
	<?php echo CHtml::encode($data->ATTRIBUTE1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATTRIBUTE2')); ?>:</b>
	<?php echo CHtml::encode($data->ATTRIBUTE2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATTRIBUTE3')); ?>:</b>
	<?php echo CHtml::encode($data->ATTRIBUTE3); ?>
	<br />

	*/ ?>

</div>