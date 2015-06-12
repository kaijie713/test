<?php

Yii::import("application.models.Evaluation.CalculatorFactory"); 
Yii::import("application.service.Approval.Impl.ApprovalServiceImpl"); 

class EvaluationController extends BaseController
{
	public $filter;
    public $pagesize = 18;
    public function __construct($id,$module)
    {
        parent::__construct($id,$module);
    }

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

	public function actionView()
	{
		$id = isset($_GET['id'])?$_GET['id']:1;

		$model = $this->loadModel($id);

		$permission = PermissionAccess::model()->findPermissionAccessByEvaId($id);

		$userIds =ArrayToolkit::column($permission, 'u_id') + array($model->ec_incharge_id,$model->createby,$model->sales_id);

		$users = ArrayToolkit::index(User::model()->findUsersByIds($userIds),"u_id");

        $project = THousesPrj::model()->findByPk($model->group_id);

		$city = DictChengshi::model()->findByPk($model->city_id);

		$area = Area::model()->findByPk($model->area_id);

		$pdetails = Pdetail::model()->findPdetailsByEvaId($id);

		$evaformPayment = EvaformPayment::model()->getEvaformPaymentByEvaId($id);

		$outlineoutdetail = Outlineoutdetail::model()->findOutlineoutdetailsByVid($evaformPayment['v_id']);

        $calculator = CalculatorFactory::create('View')->calculator($id);


        $fields['bill_id'] = $id;
        $fields['bill_type'] = 'evaluation';
        $fields['code'] = 'evaluation';

		$status = ApprovalServiceImpl::getApprovaStatus($fields);

		$isCreate = ApprovalServiceImpl::isCreate($fields);
		

// echo "<pre>";
//         var_dump($calculator);
// echo "</pre>";
// exit();
		$this->render('view',array(
			'model'=>$model,
			'users'=>$users,
			'project'=>$project,
			'city'=>$city,
			'area'=>$area,
			'pdetails'=>$pdetails,
			'evaformPayment'=>$evaformPayment,
			'outlineoutdetail'=>$outlineoutdetail,
			'permission'=>$permission,
			'calculator'=>$calculator,
			'status'=>$status,
			'isCreate'=>$isCreate,
		));
	}

	public function actionUpdate()
	{
		$model=new Evaluation;

		if(isset($_POST['Evaluation']))
		{
			if (empty($_POST['Pdetail']))
				throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');

			if (empty($_POST['Outlineoutdetail']))
				$_POST['Outlineoutdetail'] = null;

			$evaluation = $model->create($_POST['Evaluation'],$_POST['EvaformPayment'],$_POST['Outlineoutdetail'],$_POST['Pdetail']);


			PermissionAccess::model()->createPermissionAccessByEvaId($evaluation->eva_id);

	    	$this->setFlashMessage('success', '评估单创建成功');
			$this->redirect('/index.php?r=evaluation/admin');
		}
		
		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionIndex()
	{
		$this->redirect('/index.php?r=evaluation/admin');
	}

	public function actionAdmin()
	{
		$pageIndex = isset($_GET['page'])?$_GET['page']:1;
        $params = $this->get('Evaluation');
        $Evaluation = new Evaluation();
        $result = $Evaluation->items($params,$pageIndex,$this->pagesize);
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

	public function actionDelete()
	{
		$id = $this->get('id');
		if (empty($id)) {
			echo $this->renderJSON(false);
		}

		Evaluation::model()->delete($id);

		echo $this->renderJSON(true);
	}

	public function actionCreate()
	{
		
		$model=new Evaluation;

		if(isset($_POST['Evaluation']))
		{
			if (empty($_POST['Pdetail']))
				throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');

			if (empty($_POST['Outlineoutdetail']))
				$_POST['Outlineoutdetail'] = null;

			$evaluation = $model->create($_POST['Evaluation'],$_POST['EvaformPayment'],$_POST['Outlineoutdetail'],$_POST['Pdetail']);


			$fields['bill_id'] =  $evaluation->eva_id;
			$fields['bill_type'] =  'evaluation';
			$fields['code']  =  'evaluation';
			ApprovalServiceImpl::createTransation($fields);
			PermissionAccess::model()->createPermissionAccessByEvaId($evaluation->eva_id);

	    	$this->setFlashMessage('success', '评估单创建成功');
			$this->redirect('/index.php?r=evaluation/admin');
		}
		
		$this->render('create',array(
			'model'=>$model,
		));
	}


	public function actionCalculatorOnCreate()
	{
		if (empty($_POST['Pdetail']) || empty($_POST['Evaluation']))
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');

		if (empty($_POST['Outlineoutdetail'])) $_POST['Outlineoutdetail'] = null;

        $fields = CalculatorFactory::create('Post')->calculator($_POST['Evaluation'],$_POST['EvaformPayment'],$_POST['Outlineoutdetail'],$_POST['Pdetail']);

		exit(CJSON::encode($fields));
	}





	public function loadModel($id)
	{
		$model=Evaluation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluation-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	


}
