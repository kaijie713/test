<?php

class THousesPrjController extends BaseController
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
		$model=new THousesPrj;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['THousesPrj']))
		{
			$model->attributes=$_POST['THousesPrj'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->group_id));
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

		if(isset($_POST['THousesPrj']))
		{
			$model->attributes=$_POST['THousesPrj'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->group_id));
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
		$dataProvider=new CActiveDataProvider('THousesPrj');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new THousesPrj('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['THousesPrj']))
			$model->attributes=$_GET['THousesPrj'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return THousesPrj the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=THousesPrj::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionList()
	{
        $pageIndex = isset($_GET['page'])?$_GET['page']:1;
        $params = $this->get('THousesPrj');

        $THousesPrj = new THousesPrj();
        $result = $THousesPrj->searchTHousesPrjs($params,$pageIndex,$this->pagesize);

        $items = $result['items'];
        $count = $result['count'];


		$DictChengshi = new DictChengshi();
        $chengshis = $DictChengshi->findictChengshisByIds(ArrayToolkit::column($items, 'city_id'));
		$chengshis = ArrayToolkit::index($chengshis, 'city_id');

		$User = new User();
		$ids = array_merge(ArrayToolkit::column($items, 'createby'), ArrayToolkit::column($items, 'updateby'));
        $users = ArrayToolkit::index($User->findUsersByIds($ids), 'u_id');
        
        $pages = new CPagination($count);
        return $this->renderPartial('list',array(
            'dataProvider'=>$items,
            'pages' => $pages,
            'pageIndex'=>$pageIndex-1,
            'params'=>$params,
            'chengshis'=>$chengshis,
            'users'=>$users,
        ));
		
	}



	/**
	 * Performs the AJAX validation.
	 * @param THousesPrj $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='thouses-prj-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}