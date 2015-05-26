<?php
class EvaluationController extends BaseController
{
	public $filter;
    public $pagesize = 18;
    public function __construct($id,$module)
    {
        parent::__construct($id,$module);
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
			array('deny',  // deny all users
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evaluation']))
		{
			$model->attributes=$_POST['Evaluation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->eva_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Evaluation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$pageIndex = isset($_GET['page'])?$_GET['page']:1;
        $params = $this->get('Evaluation');
        $Evaluation = new Evaluation();
        $result = $Evaluation->items(EvaluationFilter::evaluation($params),$pageIndex,$this->pagesize);
        $items = $result['items'];
        $count = $result['count'];

        $pages = new CPagination($count);
        $this->render('admin',array(
            'dataProvider'=>$items,
            'pages' => $pages,
            'pageIndex'=>$pageIndex-1,
            'params'=>$params,
        ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		$id = $this->get('id');
		if (empty($id)) {
			echo $this->renderJSON(false);
		}

		Evaluation::model()->delete($id);

		echo $this->renderJSON(true);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Evaluation;

		if(isset($_POST['Evaluation']))
		{
			$model->attributes=$_POST['Evaluation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->eva_id));
		}

		$SysDict = new SysDict();
		$cooperation = $SysDict->findSysDictByGroup('cooperation');
		$customerLevel = $SysDict->findSysDictByGroup('customerLevel');
		$customerType = $SysDict->findSysDictByGroup('customerType');
		$sourceType = $SysDict->findSysDictByGroup('sourceType');
		$chargeType = $SysDict->findSysDictByGroup('chargeType');
		$outType = $SysDict->findSysDictByGroup('outType');
		
		$this->render('create',array(
			'model'=>$model,
			'cooperation'=>$cooperation,
			'customerLevel'=>$customerLevel,
			'customerType'=>$customerType,
			'sourceType'=>$sourceType,
			'chargeType'=>$chargeType,
			'outType'=>$outType,
		));
	}

	









	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Evaluation the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Evaluation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Evaluation $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
