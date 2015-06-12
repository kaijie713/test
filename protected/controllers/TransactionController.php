<?php
Yii::import("application.models.Evaluation.CalculatorFactory"); 
Yii::import("application.service.Approval.Impl.ApprovalServiceImpl"); 

class TransactionController extends BaseController
{
	public $filter;
    public $pagesize = 18;
    public $bill_type = 'evaluation';
    public $code = 'evaluation';
    public function __construct($id,$module)
    {
        parent::__construct($id,$module);
    }

	public function filters()
	{
		return array(
			'accessControl', 
			'postOnly + delete', 
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
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
		);
	}

	public function actionDownload()  
    {  
    	$fields['bill_id'] =  isset($_GET['bill_id'])?$_GET['bill_id']:1;
        $fields['bill_type'] =  isset($_GET['bill_type'])?$_GET['bill_type']:$this->bill_type;
        $fields['code'] =  isset($_GET['code'])?$_GET['code']:$this->code;
        $fileId =  isset($_GET['fileId'])?$_GET['fileId']:'';

        $isPermissions = ApprovalServiceImpl::isPermissions($fields);

        $this->fileDownload($fileId);
    } 


	public function actionView()
	{
		$fields['bill_id'] =  isset($_GET['bill_id'])?$_GET['bill_id']:1;
        $fields['bill_type'] =  isset($_GET['bill_type'])?$_GET['bill_type']:$this->bill_type;
        $fields['code'] =  isset($_GET['code'])?$_GET['code']:$this->code;

		$approvaProcess = ApprovalServiceImpl::getApprovaProcess($fields);

        $files = ArrayToolkit::index(File::model()->findFilesByIds(ArrayToolkit::column($approvaProcess, 'file_id')), 'id');
        $users = ArrayToolkit::index(User::model()->findUsersByIds(ArrayToolkit::column($approvaProcess, 'approver_id')), 'u_id');


		$this->renderPartial('view',array(
			'approvaProcess'=>$approvaProcess,
			'files'=>$files,
			'users'=>$users,
		));
	}

	public function actionCreate()
	{

		$billId = isset($_GET['bill_id'])?$_GET['bill_id']:1;
		$billType = isset($_GET['bill_type'])?$_GET['bill_type']:$this->bill_type;
		$code = isset($_GET['code'])?$_GET['code']:$this->code;

		$model=new Transaction;

		if(isset($_POST['Transaction']))
		{
			$_POST['Transaction']['code'] = isset($_POST['Transaction']['code'])?$_POST['Transaction']['code']:$this->code;

			// ApprovalServiceImpl::approvalCheckByUserId($_POST['Transaction']);

			$result = ApprovalServiceImpl::updateTransationUserId($_POST['Transaction']);

			ApprovalServiceImpl::approvaNext($_POST['Transaction']);
			
			$this->setFlashMessage('success', '单据提交成功，请等待审批！');
			$this->redirect('/index.php?r=evaluation/admin');
		}

		$nodes = ApprovalServiceImpl::findApproveNodesByCode($code);

		$users = ApprovalServiceImpl::findusersByNodeIds(ArrayToolkit::column($nodes, 'node_id'));

		$this->renderPartial('create',array(
			'model'=>$model,
			'nodes'=>$nodes,
			'users'=>$users,
			'billId'=>$billId,
			'billType'=>$billType,
		));
	}

	public function actionApproval(){

        $id = isset($_GET['bill_id'])?$_GET['bill_id']:1;
		$billType = isset($_GET['bill_type'])?$_GET['bill_type']:$this->bill_type;
		$code = isset($_GET['code'])?$_GET['code']:$this->code;

        $model = Evaluation::model()->findByPk($id);

        if(empty($model)){
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $fields['bill_id'] =  $id;
        $fields['bill_type'] =  $billType;
        $fields['code'] =  $code;

        ApprovalServiceImpl::approvalCheckByUserId($fields);

        if(isset($_POST['Approval']))
        {
            $file = $this->uploadFile(CUploadedFile::getInstanceByName('file'));

        	$condition = $_POST['Approval'];

            if (!empty($file)) {
            	$condition['file_id'] = $file->id;
            }
            $condition['code'] = isset($_POST['Approval']['code'])?$_POST['Approval']['code']:$this->code;


            $transaction = ApprovalServiceImpl::approvaling($condition);

            $PermissionAccessLog = new PermissionAccessLog();

            $PermissionAccessLog->status=Dict::get('evaStatus',empty($isNext)? 'zstg':$flag);
            $PermissionAccessLog->createby=Yii::app()->user->__get('u_id');
            $PermissionAccessLog->createdate=date("Y-m-d H:i");
            $PermissionAccessLog->id=$this->getUUID();
            $PermissionAccessLog->eva_id=$id;
                
            if($PermissionAccessLog->save()){
                $this->setFlashMessage('success', '审批评估单成功');
            } else {
                $this->setFlashMessage('error', '审批评估单失败');
            }

            $this->redirect('/index.php?r=evaluation/admin');
        }


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


        $fields['bill_id'] =  $id;
        $fields['bill_type'] =  $billType;
        $fields['code'] =  $code;

		$status = ApprovalServiceImpl::getApprovaStatus($fields);



        // $hourse = THousesPrj::model()->findByPk($model->group_id);
        // $user = User::model()->findByPk($model->createby);
        // $ecIncharge = User::model()->findByPk($model->ec_incharge_id);
        // $city = DictChengshi::model()->findByPk($model->city_id);

        // $pdetails = Pdetail::model()->findPdetailsByEvaId($id);
        // $evaformPayment = EvaformPayment::model()->getEvaformPaymentByEvaId($id);

        //$logs = PermissionAccessLog::model()->findPermissionAccessLogByEvaId($id);

        $this->render('approval',array(
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
			'billId'=>$id,
			'billType'=>$billType,
			'code'=>$code,
        ));
    }

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Transaction']))
		{
			var_dump($_POST['Transaction']);
			exit();
			$model->attributes=$_POST['Transaction'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->transaction_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Transaction');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new Transaction('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Transaction']))
			$model->attributes=$_GET['Transaction'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=Transaction::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='transaction-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
