<?php

class PdetailController extends BaseController
{
	public $filter;
    public $pagesize = 18;
    public function __construct($id,$module)
    {
        parent::__construct($id,$module);
    }
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	// /**
	//  * Creates a new model.
	//  * If creation is successful, the browser will be redirected to the 'view' page.
	//  */
	// public function actionCreate()
	// {
	// 	$model=new Pdetail;

	// 	// Uncomment the following line if AJAX validation is needed
	// 	// $this->performAjaxValidation($model);

	// 	if(isset($_POST['Pdetail']))
	// 	{
	// 		$model->attributes=$_POST['Pdetail'];
	// 		if($model->save())
	// 			$this->redirect(array('view','id'=>$model->pd_id));
	// 	}

	// 	$this->render('create',array(
	// 		'model'=>$model,
	// 	));
	// }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdates($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pdetail']))
		{
			$model->attributes=$_POST['Pdetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pd_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

		// $dataProvider=new CActiveDataProvider('Pdetail');
		// $this->render('index',array(
		// 	'dataProvider'=>$dataProvider,
		// ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pdetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pdetail']))
			$model->attributes=$_GET['Pdetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionCreate()
	{
		$model=new Pdetail;
		if(isset($_POST['Pdetail']))
		{
			// try
			// {
				if(empty($_POST['Splitdetail'])){
					$_POST['Splitdetail'] = null;
				}

				$result = $model->createPdtail($_POST['Pdetail'], $_POST['Splitdetail']);
				$var['status'] = true;
      			$var['message'] = $result->pd_id;
			// }
			// catch ( Exception $e ) {
			// 	$var['status'] = false;
   //    			$var['message'] = '出现错误';
		 //    }
			exit(CJSON::encode($var));
		}

		$dict_id = $this->get('id');

		$SysDict = new SysDict();
		$sourceType = $SysDict->findSysDictByGroup('sourceType');
		$partnerType = $SysDict->findSysDictByGroup('partnerType');
		$chargeType = $SysDict->getSysDictById($dict_id);

		if(empty($chargeType)){
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}

		$this->renderPartial('create-'.$chargeType['dkey'],array(
			'sourceType' => $sourceType,
			'chargeType' => $chargeType,
			'partnerType' => $partnerType,
		));
	}

	public function actionUpdate()
	{
		if(isset($_POST['Pdetail']))
		{
			// try
			// {
				if(empty($_POST['Splitdetail'])){
					$_POST['Splitdetail'] = null;
				}

				$result = $model->createPdtail($_POST['Pdetail'], $_POST['Splitdetail']);
				$var['status'] = true;
      			$var['message'] = $result->pd_id;
			// }
			// catch ( Exception $e ) {
			// 	$var['status'] = false;
   //    			$var['message'] = '出现错误';
		 //    }
			exit(CJSON::encode($var));
		}
		$id = empty($_GET['id']) ? '0' : trim($_GET['id']);
		
		$model=$this->loadModel($id);

		$dict_id = $model->charge_type;

		$SysDict = new SysDict();
		$sourceType = $SysDict->findSysDictByGroup('sourceType');
		$partnerType = $SysDict->findSysDictByGroup('partnerType');
		$chargeType = $SysDict->getSysDictById($dict_id);

		if(empty($chargeType)){
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}

		$Splitdetail = new PrjPartnerSplitdetail();
		$splitdetails = CJSON::encode($Splitdetail->findSysDictByPdId($model->pd_id));

		$this->renderPartial('create-'.$chargeType['dkey'],array(
			'sourceType' => $sourceType,
			'chargeType' => $chargeType,
			'partnerType' => $partnerType,
			'splitdetails' => $splitdetails,
			'model' => $model,
		));
	}


	public function loadModel($id)
	{
		$model=Pdetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pdetail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
