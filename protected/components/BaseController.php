<?php
/**
 * 控制器基础类，所有控制器均需继承此类
 * @author chenfenghua <843958575@qq.com>
 */

class BaseController extends Controller
{
    public $connection;
    public $layout='//layouts/column2';
    public $action;
    public $pagesize = 15;
    public $ActList = array();
    public $admini;
    public $module;
    public $controller;
    public $script_controller = null;
    public $script_arguments = null;
    public $default_img = '/images/';
    public $image_url = '/';
    public $uploadPath = '/file/attachment';

    public function __construct($id,$module)
    {
        //       Yii::app()->user->__get('u_id')
        parent::__construct($id,$module);
        if (isset($this->getModule()->id)) $this->module = $this->getModule()->id;
        $this->controller = $this->getId();
        
        if(Yii::app()->user->getIsGuest()){
            $this->redirect("/index.php?r=login/login");
        }
        try{
            Yii::app()->user->__get('u_id');
        }catch ( Exception $e ) {
            $this->redirect("/index.php?r=login/Logout");
        }
        
        $this->connection = Yii::app()->db;
    }

    public function actions(){
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),);
    }

    protected function beforeAction($action){
        if(Yii::app()->user->isGuest&&$action->getId()!='login'&&$action->getId()!='captcha'){
            $this->redirect(Yii::app()->user->loginUrl);
        }
        return parent::beforeAction($action);
    }


    /**
     * 控制器Act解析
     *
     * @param $acl
     * @return array
     */
    public function Act($acl)
    {
        $item = array();
        foreach (explode(',',$acl) as $v) {
            if (strpos($v,'|') === false) {
                $item[] = $v;
                continue;
            }
            $route = explode('_',$v);
            $mod = $route[0];
            $ctl = $route[1];
            $act = $route[2];
            $actList = explode('|',$act);
            foreach ($actList as $vv) $item[] = $mod.'_'.$ctl.'_'.$vv;
        }

        return $item;
    }

    /**
     * 权限验证
     *
     * @param $acl
     * @param $super
     */
    public function Pemission($acl,$super)
    {
        if ($super == 1) return;
        $r = $_GET['r'];
        $permission = str_replace('/','_',$r);
        $except = array(
            'desktop/default/index',
            'desktop/default/permission'
        );
        if (!in_array($r,$except) && !in_array($permission,$acl)) {

            $this->redirect('?r=desktop/default/permission&redirect='.Yii::app()->request->urlReferrer);
        }
    }

    /**
     * 页面按钮是否显示
     *
     * @param $route
     * @return bool
     */
    public function ButtonPermission($route)
    {
        $acl = $this->admini['acl'];
        $super = $this->admini['super'];

        if ($super == 1) return true;
        $route = str_replace('/','_',$route);

        if (!in_array($route,explode(',',$acl))) return false;
        return true;
    }

    /**
     * 列表页按钮是否显示
     *
     * @param $actArr
     * @param string $implode
     * @return string
     */
    public function TemplateButton($actArr,$implode='&nbsp&nbsp&nbsp')
    {
        $item = array();
        foreach ($actArr as $v) {
            $route = $this->module.'/'.$this->controller.'/'.$v;
            if ($this->ButtonPermission($route)) $item[] = '{'.$v.'}';
        }
        return implode($implode,$item);
    }

    /**
     * GET获取单个数据
     */
    public function get($val,$type='str')
    {
        if ($type == 'str') {
            $data = isset($_GET[$val])?$_GET[$val]:'';
        } else if($type == 'int') {
            $data = isset($_GET[$val])?$_GET[$val]:0;
        }
        return $this->_CheckAndQuote($data);
    }

    /**
     * GET获取多个数据
     */
    public function gets(Array $arr)
    {
        foreach ($arr as $v) {
            $item[] = $this->get($v);
        }

        return $item;
    }

    /**
     * POST获取单个数据
     */
    public function post($val,$type='str')
    {
        if ($type == 'str') {
            $data = isset($_POST[$val])?$_POST[$val]:'';
        } else if($type == 'int') {
            $data = isset($_POST[$val])?$_POST[$val]:0;
        }
        return $this->_CheckAndQuote($data);
    }

    /**
     * POST获取多个数据
     */
    public function posts(Array $arr)
    {
        foreach ($arr as $v) {
            $item[$v] = $this->post($v);
        }

        return $item;
    }

    /**
     * prevent from invalidate sql sentense is put in advanced
     *
     * @param  $value value of waiting for format
     * @return string formatted value
     */
    function _CheckAndQuote($value)
    {
        if (is_int($value) || is_float($value)) {
            return $value;
        }

        //return '\'' . mysql_real_escape_string($value) . '\'';
        return $value;
    }

    /**
     * 事务开启
     */
    public function begin()
    {

    }

    /**
     * 事务结束
     */
    public function end()
    {

    }

    /**
     * 加载js文件
     * @param $file
     * @param string $type
     * @param string $theme
     */
    public function registerJs($file,$type='end',$theme='sohu')
    {
        switch($type) {
            case 'end':
                $js = CClientScript::POS_END;
                break;
            default:
                $js = CClientScript::POS_END;
        }
        if (is_array($file)) {
            foreach ($file as $model)
                Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/themes/'.$theme.'/assets/js/'.$model.'.js',$js);
        } else
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl .'/themes/'.$theme.'/assets/js/'.$file.'.js',$js);
    }

    /**
     * 提示信息
     */
    public function message( $action = 'success', $content = '', $redirect = '', $timeout = 3 )
    {
        $body = $this->renderPartial(
            '//site/popup',
            array(
                'action'=>$action,
                'redirect'=>$redirect,
                'content'=>$content,
                'timeout'=>$timeout
            )
        );
        exit ($body);
    }

    /**
     * 返回上一个页面
     */
    public function referrer($type = 0,$action = array('index'))
    {
        if ($type == 1) {
            if (isset(Yii::app()->request->urlReferrer) && Yii::app()->request->urlReferrer)
                $this->redirect(Yii::app()->request->urlReferrer);
        } else {
            $this->redirect($action);
        }
    }

    public function renderJSON($data)
    {
        header('Content-type: application/json');
        return CJSON::encode($data);
    }

    public function setFlashMessage ($level, $message, $key = 'flashMessages')
    {
        return Yii::app()->session->setFlashBag($key, array($level=>$message));
    }
    
    public function getUUID()
    {
        $Idwork = new idwork();
        return $Idwork->nextId();
    }

    public function uploadFile($uploadedFile)
    {
        if($uploadedFile == null || $uploadedFile->hasError)
        {
            return array();
        } 

        $File = new File();

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

        $File->name = $file_name;
        $File->uri=$this->uploadPath.  '/' . date("Ymd") . "/" . $new_file_name;
        $File->size=$file_size;
        $File->mime=$file_type;

        $File->user_id=Yii::app()->user->__get('u_id');
        $File->createdate=date("Y-m-d H:i");
        $result = $File->save();
       
        return empty($result)?$result:$File;
    }

    public function fileDownload($id)  
    {  
        $File = File::model()->findByPk($id);

        if(empty($File) ){
            throw new CHttpException ('500', '文件不存在'); 
        }

        $path = Yii::app()->basePath . $File->uri ; 
                 
        if (file_exists($path)){ 
            yii::app ()->request->sendFile ($File->name,  file_get_contents ($path));
        } 

    } 

    

}