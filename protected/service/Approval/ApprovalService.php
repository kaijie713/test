<?php
interface ApprovalService
{
    //查出该工作流的审批节点
    public function findApproveNodesByCode($code);

    //根据nodeid查询用户
    public function findusersByNodeIds(array $nodeIds);

    //创建审批流程
    public function createTransation($fields);

    //获取状态
    //自动推进
    //验证审批权限
    //审批流程查看
    //其他系统推送审批
    
    //审批
    //通过
    //驳回
}