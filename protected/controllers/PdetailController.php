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

	public function actionUpdates($id)
	{
		$model=$this->loadModel($id);

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

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{

		// $dataProvider=new CActiveDataProvider('Pdetail');
		// $this->render('index',array(
		// 	'dataProvider'=>$dataProvider,
		// ));
	}

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

		$chargeType = SysDict::model()->getSysDictById($this->get('id'));

		if(empty($chargeType)){
			throw new CHttpException(400, 'Invalid chargeTypeId '.$dict_id.' . Please do not repeat this request again.');
		}

		$this->renderPartial('create-'.$chargeType['dkey'],array(
			'chargeType' => $chargeType,
		));
	}

	public function actionUpdate()
	{
		if(isset($_POST['Pdetail'])) {
			if(empty($_POST['Splitdetail'])){
				$_POST['Splitdetail'] = null;
			}

			$result = $model->createPdtail($_POST['Pdetail'], $_POST['Splitdetail']);
			$var['status'] = true;
  			$var['message'] = $result->pd_id;

			exit(CJSON::encode($var));
		}
		
		$id = empty($_GET['id']) ? '0' : trim($_GET['id']);
		
		$model=$this->loadModel($id);

		$chargeType = SysDict::model()->getSysDictById($model->charge_type);

		if(empty($chargeType)){
			throw new CHttpException(400, 'Invalid chargeType {$dict_id} . Please do not repeat this request again.');
		}

		$Splitdetail = new PrjPartnerSplitdetail();

		$splitdetails = CJSON::encode($Splitdetail->findSplitdetailByPdId($model->pd_id));

		$this->renderPartial('create-'.$chargeType['dkey'],array(
			'chargeType' => $chargeType,
			'splitdetails' => $splitdetails,
			'model' => $model,
		));
	}

	public function actionAdjust()
	{
		if(isset($_POST['Pdetail'])) {

			$result = Pdetail::model()->updatePdtail($_POST['Pdetail']);

  			$pdetail = pdetail::model()->getPdetailByPdId($_POST['Pdetail']['pd_id']);

  			return $this->renderPartial('list-tr',array(
				'pdetail' => $pdetail,
				'adjust_detail_id' => empty($result['adjust_detail_id'])?false:$result['adjust_detail_id'],
			));
		}
		
		$id = empty($_GET['id']) ? '0' : trim($_GET['id']);
		
		$model=$this->loadModel($id);

		$chargeType = SysDict::model()->getSysDictById($model->charge_type);

		$Splitdetail = new PrjPartnerSplitdetail();

		$splitdetails = $Splitdetail->findSplitdetailByPdId($model->pd_id);

		$this->renderPartial('update-'.$chargeType['dkey'],array(
			'chargeType' => $chargeType,
			'splitdetails' => $splitdetails,
			'model' => $model,
			'update' => true,
		));
	}

	public function actionView()
	{
		$id = empty($_GET['id']) ? '0' : trim($_GET['id']);
		
		$model=$this->loadModel($id);

		$chargeType = SysDict::model()->getSysDictById($model->charge_type);

		if(empty($chargeType)){
			throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
		}

		$Splitdetail = new PrjPartnerSplitdetail();

		$splitdetails = CJSON::encode($Splitdetail->findSplitdetailByPdId($model->pd_id));

		$this->render('view',array(
			'chargeType' => $chargeType,
			'splitdetails' => $splitdetails,
			'type' => $chargeType['dkey'],
			'model' => $model,
		));
	}

	public function actionList()
	{
		$id = empty($_GET['evaId']) ? -1 : trim($_GET['evaId']);
		$type = empty($_GET['type']) ? -1 : trim($_GET['type']);

		$pdetails = Pdetail::model()->findPdetailsByEvaId($id);

		$this->renderPartial('list',array(
			'pdetails' => $pdetails,
			'type' => $type,
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
