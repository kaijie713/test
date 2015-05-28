<?php
if ($flashMessages = Yii::app()->session->get('flashMessages')) { 
    foreach ($flashMessages as $key => $flashMessage) {
         echo "<div class='alert alert-".$key."'>$flashMessage</div>";
    } 
    Yii::app()->session->remove('flashMessages');
} 