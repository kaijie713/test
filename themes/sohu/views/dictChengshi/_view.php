<?php
/* @var $this DictChengshiController */
/* @var $data DictChengshi */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->city_id),array('view','id'=>$data->city_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_name')); ?>:</b>
	<?php echo CHtml::encode($data->city_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('simpy')); ?>:</b>
	<?php echo CHtml::encode($data->simpy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullpy')); ?>:</b>
	<?php echo CHtml::encode($data->fullpy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('province')); ?>:</b>
	<?php echo CHtml::encode($data->province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('createby')); ?>:</b>
	<?php echo CHtml::encode($data->createby); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createdate')); ?>:</b>
	<?php echo CHtml::encode($data->createdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updateby')); ?>:</b>
	<?php echo CHtml::encode($data->updateby); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updatedate')); ?>:</b>
	<?php echo CHtml::encode($data->updatedate); ?>
	<br />

	*/ ?>

</div>