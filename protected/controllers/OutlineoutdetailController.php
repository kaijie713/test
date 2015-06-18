<?php

class OutlineoutdetailController extends BaseController
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
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Outlineoutdetail;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Outlineoutdetail']))
		{
			$model->attributes=$_POST['Outlineoutdetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->outl_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Outlineoutdetail']))
		{
			$model->attributes=$_POST['Outlineoutdetail'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->outl_id));
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
		$dataProvider=new CActiveDataProvider('Outlineoutdetail');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Outlineoutdetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Outlineoutdetail']))
			$model->attributes=$_GET['Outlineoutdetail'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionList()
	{
		$id = empty($_GET['eva_id']) ? -1 : trim($_GET['eva_id']);

		$outlineoutdetail = Outlineoutdetail::model()->findOutlineoutdetailsByEvaId($id);

		$this->renderPartial('list',array(
			'outlineoutdetail' => $outlineoutdetail,
		));
	}

	public function actionUpdateList()
	{
		$id = empty($_GET['eva_id']) ? -1 : trim($_GET['eva_id']);

		$outlineoutdetail = Outlineoutdetail::model()->findOutlineoutdetailsByEvaId($id);

		$dicts = ArrayToolkit::index(SysDict::model()->findSysDictsByIds(ArrayToolkit::column($outlineoutdetail, 'out_type')), 'dict_id');

		foreach ($outlineoutdetail as $key => $value) {
			if( empty($dicts[$value['out_type']]) )
			{
				$outlineoutdetail[$key]['out_type_name'] = '';
			} else {
				$outlineoutdetail[$key]['out_type_name'] = $dicts[$value['out_type']]['dvalue'];
			}
		}

		$outlineoutdetail = CJSON::encode($outlineoutdetail);
		$this->renderPartial('list-update',array(
			'outlineoutdetail' => $outlineoutdetail,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Outlineoutdetail the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Outlineoutdetail::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Outlineoutdetail $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='outlineoutdetail-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
