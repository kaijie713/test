<?php $this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'Home', 'url'=>array('/site/index')),
        array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
        array('label'=>'Contact', 'url'=>array('/site/contact')),
        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
    ),
    'htmlOptions'=>array(
        'class'=>'nav',
    ),
)); ?>