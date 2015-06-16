<?php
class PermissionAccessController extends BaseController {

    public $script_controller = null;

    public $filter;
    public $pagesize = 18;
    public function __construct($id,$module)
    {
        parent::__construct($id,$module);
    }
    
	public function actionIndex()
    {
        $this->redirect('/index.php?r=evaluation');
    }

    public function actionApproval(){

        $id = isset($_GET['id'])?$_GET['id']:1;

        $model = Evaluation::model()->findByPk($id);

        if(empty($model)){
            throw new CHttpException(404,'The requested page does not exist.');
        }

        if(isset($_POST['Approval']))
        {
            $flag = $_POST['Approval']['flag'];

            $flag = $flag == 1? 'shtg':'bh';

            PermissionAccess::model()->approval($id, $flag);

            $isNext  = PermissionAccess::model()->getPermissionAccessCurrentByEvaId($id);

            $PermissionAccessLog = new PermissionAccessLog();
            $PermissionAccessLog->attributes = $_POST['Approval'];

            $uploadedFile=CUploadedFile::getInstanceByName('attachment'); 

            if($uploadedFile != null && !$uploadedFile->hasError)
            {
                $save_path = Yii::app()->basePath.$this->uploadPath.  '/' . date("Ymd") . "/";

                if(! file_exists($save_path))
                {
                    mkdir($save_path, 0777, true);
                }
                $file_name = $uploadedFile->getName();
                $file_size = $uploadedFile->getSize();
                $file_type = $uploadedFile->getType();
                    
                $new_file_name = date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_name;
                    
                $uploadedFile->saveAs($save_path . $new_file_name);

                $PermissionAccessLog->attachment=$file_name;
                $PermissionAccessLog->path=$save_path . $new_file_name;
                $PermissionAccessLog->size=$file_size;
                $PermissionAccessLog->type=$file_type;
            }
            
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

        $isApproval =PermissionAccess::model()->checkApproval($id);

        $hourse = THousesPrj::model()->findByPk($model->hourse_id);
        $user = User::model()->findByPk($model->createby);
        $ecIncharge = User::model()->findByPk($model->ec_incharge_id);
        $city = DictChengshi::model()->findByPk($model->city_id);

        $pdetails = Pdetail::model()->findPdetailsByEvaId($id);
        $evaformPayment = EvaformPayment::model()->getEvaformPaymentByEvaId($id);

        $logs = PermissionAccessLog::model()->findPermissionAccessLogByEvaId($id);

        $this->render('approval',array(
            'model'=>$model,
            'user'=>$user,
            'hourse'=>$hourse,
            'city'=>$city,
            'ecIncharge'=>$ecIncharge,
            'pdetails'=>$pdetails,
            'evaformPayment'=>$evaformPayment,
            'isApproval'=>$isApproval,
            'logs'=>$logs,
        ));
    }

    public function actionAttachmentDownload()  
    {  
        $id = isset($_GET['id']) ? $_GET['id'] : 1;

        $PermissionAccessLog = PermissionAccessLog::model()->findByPk($id);

        if(empty($PermissionAccessLog) ){
            throw new CHttpException ('500', '文件不存在'); 
        }

        $path = $PermissionAccessLog->path ; 
                 
        if (file_exists($path)){ 
            yii::app ()->request->sendFile ($PermissionAccessLog->attachment,  file_get_contents ($path));
        } 

    } 


    public function actionSetPermissionAccess()
    {
        $id = isset($_GET['id'])?$_GET['id']:1;
        $evaluation = Evaluation::model()->findByPk($id);
      
        if(empty($evaluation)){
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $THousesPrj = new THousesPrj();
        $hourses = $THousesPrj->findTHousrsPtjsByIds(array($evaluation->hourse_id));
        $hourses = ArrayToolkit::index($hourses, 'hourse_id');

        $PermissionAccess = new PermissionAccess();
        $result = $PermissionAccess->findPermissionAccessByEvaId($id);

        $User = new User();
        $users = ArrayToolkit::index($User->findUsersByIds(ArrayToolkit::column($result, 'u_id')), 'u_id');

        $this->render('set-permission',array(
            'dataProvider'=>$result,
            'evaluation'=>$evaluation,
            'users'=>$users,
            'hourses'=>$hourses,
        ));
    }

    public function actionAddPermissionAccess()
    {
        $evaId = isset($_GET['evaId'])?$_GET['evaId']:0;
        $uId = isset($_GET['uId'])?$_GET['uId']:0;

        $evaluation = Evaluation::model()->findByPk($evaId);

        if(empty($evaluation)){
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $users = ArrayToolkit::index(User::model()->findUsersByIds(array($uId)),'u_id');

        $PermissionAccess = new PermissionAccess();
        $isNull = $PermissionAccess->getPermissionAccessByEvaIdAndUid($evaId, $uId);
        if (!empty($isNull))
            exit(null);
        
        $PermissionAccess->prmid=$this->getUUID();
        $PermissionAccess->eva_id=$evaId;
        $PermissionAccess->u_id=$uId;
        $PermissionAccess->seq=$PermissionAccess->getPermissionAccessNextSeqByEvaId($evaId);
        $PermissionAccess->createby = Yii::app()->user->__get('u_id');
        $PermissionAccess->createdate = date("Y-m-d H:i");
        $PermissionAccess->isactive = 0;
        $PermissionAccess->save(false);

        $this->renderPartial('set-permission-li',array(
            'value'=>$PermissionAccess,
            'users'=>$users,
        ));
    }

    public function actionViewBox()
    {
        $evaId = isset($_GET['evaId'])?$_GET['evaId']:0;

        $permission = PermissionAccess::model()->findPermissionAccessByEvaId($evaId);

        $users = ArrayToolkit::index(User::model()->findUsersByIds(ArrayToolkit::column($permission, 'u_id')),"u_id");

        $this->renderPartial('view-box',array(
            'permission'=>$permission,
            'users'=>$users,
        ));
    }

    public function actionPermissionAccessSort()
    {
        $ids = isset($_POST['ids'])?$_POST['ids']:null;

        if(!empty($ids)){
            $isNull = PermissionAccess::model()->sortPermissionAccess($ids);
        }

        exit(CJSON::encode(true));
    }

    public function actionDeletePermissionAccess()
    {
        $id = isset($_GET['id'])?$_GET['id']:null;
        if (!empty($id)) {
            PermissionAccess::model()->deleteByPk($id);
        }

        exit(CJSON::encode(true));
    }




	

	public function loadModel($id)
	{
		$model=PermissionAccess::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PermissionAccess $model the model to be validated
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