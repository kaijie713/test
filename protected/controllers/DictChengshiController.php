<?php

class DictChengshiController extends BaseController
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
		$model=new DictChengshi;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DictChengshi']))
		{
			$model->attributes=$_POST['DictChengshi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->city_id));
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

		if(isset($_POST['DictChengshi']))
		{
			$model->attributes=$_POST['DictChengshi'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->city_id));
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
		$dataProvider=new CActiveDataProvider('DictChengshi');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DictChengshi('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DictChengshi']))
			$model->attributes=$_GET['DictChengshi'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return DictChengshi the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=DictChengshi::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionList()
	{
        $pageIndex = isset($_GET['page'])?$_GET['page']:1;
        $params = $this->get('DictChengshi');

        if(empty($params['sort'])){
        	$params['sort'] ="";
        }

        $DictChengshi = new DictChengshi();
        $result = $DictChengshi->searchDictChengshis($params, $pageIndex, $this->pagesize, $params['sort']);

        $items = $result['items'];
        $count = $result['count'];


        $User = new User();
		$ids = array_merge(ArrayToolkit::column($items, 'createby'), ArrayToolkit::column($items, 'updateby'));
        $users = ArrayToolkit::index($User->findUsersByIds($ids), 'u_id');

        $pages = new CPagination($count);

        return $this->renderPartial('list',array(
            'dataProvider'=>$items,
            'pages' => $pages,
            'pageIndex'=>$pageIndex-1,
            'params'=>$params,
            'users'=>$users,
        ));
		
	}

	/**
	 * Performs the AJAX validation.
	 * @param DictChengshi $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='dict-chengshi-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
