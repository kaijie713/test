<?php
interface ApprovalService
{
    //查询审批节点
    public function findApproveNodesByCode($code);

    //按条件过滤审批节点
    public function filterApproveNodes($nodes, $billId, $billType);

    //查询节点上的用户
    public function findusersByNodeIds(array $nodeIds);

    //创建审批流程 bill_id bill_type code
    public function createTransation($fields);

    //node_ids   key->value  node_id->user_id
    //更新审批流程的审批人id
    public function updateTransationUserId($fields);

    /**
     *  fields (bill_id,bill_type,code,estate) require
     *  fields (content,approval_date,code,updateby)
     */
    //审批
    public function approvaling($fields);


    //推送普通节点到审批节点 bill_id bill_type code
    public function approvaNext($fields);

    //通过审批人id和当前id判断审批权限 bill_id bill_type code
    public function approvalCheckByUserId($fields);

    //根据授权表 和 审批流程 判断是否有查看权限 bill_id bill_type code
    public function isPermissions($fields);

    //推送给其他系统消息
    public function approvaPushMessage($fields, $billId, $billType, $code);

    //获得审批状态 bill_id bill_type code
    public function getApprovaStatus($fields);

    //是否已存在审批流程 bill_id bill_type code
    public function hasApproval($fields);

    //是否新建状态 bill_id bill_type code
    public function isCreate($fields);

    //审批记录
    public function getApprovaProcess($fields);

    public function checkFields($fields);

    //获取状态
    //自动推进
    //验证审批权限
    //审批流程查看
    //其他系统推送审批

    //审批
    //通过
    //驳回
}