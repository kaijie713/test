<?php
/* @var $this DictChengshiController */
/* @var $model DictChengshi */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('\TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'city_id',array('span'=>5,'maxlength'=>36)); ?>

                    <?php echo $form->textFieldControlGroup($model,'city_name',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'simpy',array('span'=>5,'maxlength'=>10)); ?>

                    <?php echo $form->textFieldControlGroup($model,'fullpy',array('span'=>5,'maxlength'=>100)); ?>

                    <?php echo $form->textFieldControlGroup($model,'province',array('span'=>5,'maxlength'=>20)); ?>

                    <?php echo $form->textFieldControlGroup($model,'isactive',array('span'=>5,'maxlength'=>1)); ?>

                    <?php echo $form->textFieldControlGroup($model,'createby',array('span'=>5,'maxlength'=>36)); ?>

                    <?php echo $form->textFieldControlGroup($model,'createdate',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'updateby',array('span'=>5,'maxlength'=>36)); ?>

                    <?php echo $form->textFieldControlGroup($model,'updatedate',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->