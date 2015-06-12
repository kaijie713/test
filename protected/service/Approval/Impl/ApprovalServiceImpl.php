<?php
Yii::import("application.models.*"); 
require_once('Transaction.php'); 
require_once('WorkflowNodeUser.php'); 
require_once('WorkflowNode.php'); 
require_once dirname(__FILE__).'/../ApprovalService.php';  

class ApprovalServiceImpl extends BaseModel implements ApprovalService
{

    //查询审批节点
    public function findApproveNodesByCode($code){
        $nodes = WorkflowNode::model()->findFlowNodesByCode($code);

        foreach ($nodes as $key => $node) 
        {
            if($node['node_type'] != "approve")  {
                unset($nodes[$key]);
                continue;
            }
        }
        return $nodes;
    }


    //查询节点上的用户
    public function findusersByNodeIds(array $nodeIds){

        if (empty($nodeIds)) {
            return array();
        }

        $users = array();
        foreach ($nodeIds as $nodeId) 
        {
            $nodeUsers = WorkflowNodeUser::model()->findFlowNodeUsersByNodeId($nodeId);

            $users[$nodeId] = ArrayToolkit::index(user::model()->findUsersByIds(ArrayToolkit::column($nodeUsers, 'u_id')), 'u_id');
        }

        return $users;
    }


    //创建审批流程 bill_id bill_type code
    public function createTransation($fields)
    {
        list($billId, $billType, $code) = self::checkFields($fields);

        $node = WorkflowNode::model()->getFlowNodeByCodeAndType($code ,'start');

        if(empty($node)) {
             throw new CHttpException(500,'工作流不存在!');
        }

        $result = transaction::model()->getLastTransactionByBillAndCode($billId, $billType, $code);
        if(empty($result['seq'])){
            $seq = 1;
        }else{
            $seq = $result['seq']+5;
        }

        $currently = 1;

        do
        {
            $model = new transaction;
            $model->transaction_id = $this->getUUID();
            $model->workflow_code = $node['workflow_code'];
            $model->node_id = $node['node_id'];
            $model->bill_type = $billType;
            $model->bill_id = $billId;
            $model->isactive = 0;
            $model->createby = Yii::app()->user->__get('u_id');
            $model->createdate = date("Y-m-d H:i:s");
            $model->currently = $currently;
            $model->seq = $seq;

            // if($node['node_type'] == "approve" && empty($fields[$node['node_id']]))
            // {
            //     transaction::model()->clearTransactionByBillAndCode($fields['bill_id'], $fields['bill_type'], $node['workflow_code']);
            //     throw new CHttpException(500,'缺少必要参数approve node_id!');
            // }
            // else if ($node['node_type'] == "approve")
            // {
            //     $model->approver_id =(int) $fields[$node['node_id']];
            // }

            $model->save();

            $currently = 0;
            $seq ++;

        } while ($node = WorkflowNode::model()->getFlowNodeByCodeAndPreviousNodeId($code ,$node['node_id']));

        return true;
    }

    //node_ids   key->value  node_id->user_id
    //更新审批流程的审批人id
    public function updateTransationUserId($fields)
    {
        list($billId, $billType, $code) = self::checkFields($fields);

        if (!ArrayToolkit::requireds($fields, array('node_ids'))) {
             throw new CHttpException(500,'缺少必要参数 !');
        }

        foreach ($fields['node_ids'] as $key => $value) {

            $result = transaction::model()->getTransactionByBillAndCodeAndNodeIdAndCurrently($billId, $billType, $code, $key, '0');
            

            if(!empty($result)){
                $result = transaction::model()->updateUserIdById($result['transaction_id'], $value);
            }

        }

        transaction::model()->setTransactionNextByBillAndCode($fields['bill_id'], $fields['bill_type'], $fields['code']);

       
        return true;
    }

    /**
     *  fields (bill_id,bill_type,code,estate) require
     *  fields (content,approval_date,code,updateby)
     */
    //审批
    public function approvaling($fields)
    {
        list($billId, $billType, $code) = self::checkFields($fields);

        if(!ArrayToolkit::requireds($fields, array('estate'))){
            throw new CHttpException(500,'缺少必要参数!');
        }

        $fields['content'] = empty($fields['content'])?"同意":$fields['content'];
        $fields['approval_date'] = empty($fields['approval_date'])?date("Y-m-d H:i:s"):$fields['approval_date'];
        $fields['updateby'] = empty($fields['updateby'])?Yii::app()->user->__get('u_id'):$fields['updateby'];

        $fields['estate'] = $fields['estate'] == 1 ? 1 : 0;
        $fields['approval_type'] = $fields['estate'] == 1 ? '同意' : '驳回';

        $result = transaction::model()->getTransactionCurrentByBillAndCode($billId, $billType, $code);

        if(empty($result))
        {
            throw new CHttpException(500,' ');
        }

        $transaction = transaction::model()->findByPk($result['transaction_id']);
        $transaction->attributes= $fields;
        $transaction->isNewRecord = false;
        $transaction->save();
   
        if($fields['estate'] == 1)
        {
            transaction::model()->setTransactionNextByBillAndCode($fields['bill_id'], $fields['bill_type'], $fields['code']);
        } else {
            $result = transaction::model()->findTransactionByBillAndCodeAndCurrently($billId, $billType, $code, 0);

            // var_dump(ArrayToolkit::column($result, 'transaction_id'));
            // exit();

            $result = transaction::model()->deleteTransactionByIds(ArrayToolkit::column($result, 'transaction_id'));

            self::createTransation($fields);
            
        }
    }

    //推送普通节点到审批节点 bill_id bill_type code
    public function approvaNext($fields){

        list($billId, $billType, $code) = self::checkFields($fields);

        $transaction = transaction::model()->getTransactionCurrentByBillAndCode($billId, $billType, $code);

        if(empty($transaction)){
            return array();
        }

        while($transaction['approver_id'] ==null || $transaction['approver_id'] =='')
        {

            transaction::model()->setTransactionNextByBillAndCode($billId, $billType, $code);

            $transaction = transaction::model()->getTransactionCurrentByBillAndCode($billId, $billType, $code);

            if(empty($transaction)){
                break;
            }
        };
        
    }

    //通过审批人id和当前id判断审批权限 bill_id bill_type code
    public function approvalCheckByUserId($fields)
    {
        list($billId, $billType, $code) = self::checkFields($fields);

        $transaction = transaction::model()->getTransactionCurrentByBillAndCode($billId, $billType, $code);

        if(empty($transaction)){
            throw new CHttpException(404,'The requested page Access denied.');
        }
        if($transaction['approver_id']  ==  Yii::app()->user->__get('u_id')){
            return true;
        }
        throw new CHttpException(404,'The requested page Access denied.');
    } 

    //根据授权表 和 审批流程 判断是否有查看权限 bill_id bill_type code
    public function isPermissions($fields)
    {
        list($billId, $billType, $code) = self::checkFields($fields);
        $userId = Yii::app()->user->__get('u_id');
        $transaction = transaction::model()->findTransactionByBillAndCodeAndApproverId($billId, $billType, $code, $userId);
        
        $permissionAccess = PermissionAccess::model()->getPermissionAccessByEvaIdAndUid($billId, $userId);

        if(!empty($transaction) || !empty($permissionAccess)){
            return true;
        }else{
            return false;
        }
      
    } 

    //推送给其他系统消息
    public function approvaPushMessage($fields, $billId, $billType, $code){

        
    }

    //获得审批状态 bill_id bill_type code
    public function getApprovaStatus($fields)
    {
        list($billId, $billType, $code) = self::checkFields($fields);

        $transaction = transaction::model()->getTransactionCurrentByBillAndCode($billId, $billType, $code);
        if(empty($transaction)){
            return "null";
        }

        $node= WorkflowNode::model()->findByPk($transaction['node_id']);

        if(empty($node)){
            return 'null';
        }

        if($node['node_type']=="start" || $node['node_type']=="end"){
            return $node['node_name'];
        }
        return $node['node_name'].'中';
    }

    //是否已存在审批流程 bill_id bill_type code
    public function hasApproval($fields)
    {
        list($billId, $billType, $code) = self::checkFields($fields);

        $transaction = transaction::model()->findTransactionByBillAndCode($billId, $billType, $code);
        if(empty($transaction)){
            return false;
        }
        return true;
    }

    //是否新建状态 bill_id bill_type code
    public function isCreate($fields)
    {
        list($billId, $billType, $code) = self::checkFields($fields);

        $transaction = transaction::model()->getTransactionCurrentByBillAndCode($billId, $billType, $code);
        if(empty($transaction)){
            throw new CHttpException(404,'The requested page Access denied.');
        }

        $node= WorkflowNode::model()->findByPk($transaction['node_id']);
        if(empty($node['node_code'])){
            throw new CHttpException(404,'The requested page Access denied.');
        }

        if($node['node_code'] == 'create'){
            return true;
        }
        return false;
    }


    //审批记录
    public function getApprovaProcess($fields){
        list($billId, $billType, $code) = self::checkFields($fields);
        $transactions = transaction::model()->findTransactionByBillAndCode($billId, $billType, $code);
        
        return $transactions;
    }

   



    public function checkFields($fields){
         if (!ArrayToolkit::requireds($fields, array('bill_id','bill_type', 'code'))) {
             throw new CHttpException(500,'缺少必要参数 bill code!');
        }

        return array($fields['bill_id'], $fields['bill_type'], $fields['code']);
    }

}

