<?php
class LoginController extends Controller {

	public function actionIndex()
    {
        $this->redirect('/index.php?r=evaluation');
    }

	public function actionLogin()
    {
        $model=new User;
        $errorMsg = "";
	        // var_dump(Yii::app()->user->__get('is_login'));
	        // exit();
        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            if($r = $model->validate())
            {
            	$errorMsg = $model->_identity->errorMessage;

                // $this->actionIndex();
            } 
        }

        if(!Yii::app()->user->getIsGuest()){
            $this->redirect('/index.php?r=evaluation');
        }
        

        $this->renderPartial('login',array(
        	'model'=>$model,
        	'errorMsg'=>$errorMsg,
        ));
    }

    public function actionLogout(){
        Yii::app()->user->logout();
        $this->actionLogin();
    }


	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param User $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pdetail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}