<?php
if ($flashMessages = Yii::app()->session->get('flashMessages')) { 
    foreach ($flashMessages as $key => $flashMessage) {
    	 echo "<div class='alert alert-".$key." alert-block'> ";
    	// echo " <h4 class='alert-heading'>Error!</h4>";
    	 echo $flashMessage;
		 echo "</div>";
    } 
    Yii::app()->session->remove('flashMessages');
} 

