<?php
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

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		
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

	public function actionIndex()
	{
		$this->redirect('/index.php?r=evaluation/admin');
	}

	public function actionAdmin()
	{
		$pageIndex = isset($_GET['page'])?$_GET['page']:1;
        $params = $this->get('Evaluation');
        $Evaluation = new Evaluation();
        $result = $Evaluation->items(EvaluationFilter::evaluation($params),$pageIndex,$this->pagesize);
        $items = $result['items'];
        $count = $result['count'];


        $THousesPrj = new THousesPrj();
        $hourses = $THousesPrj->findTHousrsPtjsByIds(ArrayToolkit::column($items, 'group_id'));
		$hourses = ArrayToolkit::index($hourses, 'group_id');

		$DictChengshi = new DictChengshi();
        $citys = $DictChengshi->findictChengshisByIds(ArrayToolkit::column($items, 'city_id'));
		$citys = ArrayToolkit::index($citys, 'city_id');

		$User = new User();
		$ids = array_merge(ArrayToolkit::column($items, 'createby'), ArrayToolkit::column($items, 'ec_incharge_id'));
        $users = ArrayToolkit::index($User->findUsersByIds($ids), 'u_id');

        $pages = new CPagination($count);
        $this->render('admin',array(
            'dataProvider'=>$items,
            'pages' => $pages,
            'pageIndex'=>$pageIndex-1,
            'params'=>$params,
            'citys'=>$citys,
            'hourses'=>$hourses,
            'users'=>$users,
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
			$model->eva_id=$this->getUUID();
			$model->createby = Yii::app()->user->__get('u_id');
	    	$model->createdate = date("Y-m-d H:i");
	    	$model->isactive = 0;
	    	$model->save(false);
	    	
	    	if(isset($_POST['EvaformPayment']))
			{
				$EvaformPayment=new EvaformPayment;
				$EvaformPayment->attributes=$_POST['EvaformPayment'];
				$EvaformPayment->v_id=$this->getUUID();
				$EvaformPayment->eva_id=$model->eva_id;
				$EvaformPayment->createby = Yii::app()->user->__get('u_id');
		    	$EvaformPayment->createdate = date("Y-m-d H:i");
		    	$EvaformPayment->isactive = 0;
		    	$EvaformPayment->save(false);

				if(isset($_POST['Outlineoutdetail']))
				{
					$Outlineoutdetail=new Outlineoutdetail;
					$Outlineoutdetail->attributes=$_POST['Outlineoutdetail'];
					$Outlineoutdetail->outl_id=$this->getUUID();
					$Outlineoutdetail->v_id=$EvaformPayment->v_id;
					$Outlineoutdetail->createby = Yii::app()->user->__get('u_id');
			    	$Outlineoutdetail->createdate = date("Y-m-d H:i");
			    	$Outlineoutdetail->isactive = 0;
			    	$Outlineoutdetail->save(false);

				}

			}

	    	$this->setFlashMessage('success', '评估单创建成功');
			$this->redirect('/index.php?r=evaluation/admin');
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
