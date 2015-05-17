<?php
/* @var $this EvaluationController */
/* @var $data Evaluation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->eva_id), array('view', 'id'=>$data->eva_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::encode($data->group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eva_no')); ?>:</b>
	<?php echo CHtml::encode($data->eva_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::encode($data->city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ec_incharge_id')); ?>:</b>
	<?php echo CHtml::encode($data->ec_incharge_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cooperetion_mode')); ?>:</b>
	<?php echo CHtml::encode($data->cooperetion_mode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_id')); ?>:</b>
	<?php echo CHtml::encode($data->sales_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_type')); ?>:</b>
	<?php echo CHtml::encode($data->customer_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_level')); ?>:</b>
	<?php echo CHtml::encode($data->customer_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_opendatetime')); ?>:</b>
	<?php echo CHtml::encode($data->pre_opendatetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_id')); ?>:</b>
	<?php echo CHtml::encode($data->area_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prj_condition')); ?>:</b>
	<?php echo CHtml::encode($data->prj_condition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createby')); ?>:</b>
	<?php echo CHtml::encode($data->createby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createdate')); ?>:</b>
	<?php echo CHtml::encode($data->createdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateby')); ?>:</b>
	<?php echo CHtml::encode($data->updateby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedate')); ?>:</b>
	<?php echo CHtml::encode($data->updatedate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute1')); ?>:</b>
	<?php echo CHtml::encode($data->attribute1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute2')); ?>:</b>
	<?php echo CHtml::encode($data->attribute2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute3')); ?>:</b>
	<?php echo CHtml::encode($data->attribute3); ?>
	<br />

	*/ ?>

</div>