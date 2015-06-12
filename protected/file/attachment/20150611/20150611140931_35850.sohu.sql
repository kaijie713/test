-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-06-10 11:32:16
-- 服务器版本： 5.5.43-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sohu`
--

-- --------------------------------------------------------

--
-- 表的结构 `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `a_id` varchar(36) NOT NULL COMMENT 'a_id',
  `name` varchar(20) DEFAULT NULL COMMENT '城市',
  `simpy` varchar(10) DEFAULT NULL COMMENT '简拼',
  `fullpy` varchar(100) DEFAULT NULL COMMENT '全拼',
  `city_id` varchar(36) DEFAULT NULL COMMENT 'city_id',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市字典表';

--
-- 转存表中的数据 `area`
--

INSERT INTO `area` (`a_id`, `name`, `simpy`, `fullpy`, `city_id`, `isactive`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES
('528584156513290', '日本', 'aaaa', 'aaaaa', '528584156529666', '0', '528584156513292', '2015-05-13 10:30:00', '528584156513292', '2015-05-11 00:00:00'),
('528584156513291', '美国', 'aaaa', 'aaaaa', '528584156529666', '0', '528584156513292', '2015-05-27 00:00:00', '528584156513292', '2015-05-11 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `dict_chengshi`
--

CREATE TABLE IF NOT EXISTS `dict_chengshi` (
  `city_id` varchar(36) NOT NULL COMMENT 'city_id',
  `city_name` varchar(20) DEFAULT NULL COMMENT '城市',
  `simpy` varchar(10) DEFAULT NULL COMMENT '简拼',
  `fullpy` varchar(100) DEFAULT NULL COMMENT '全拼',
  `province` varchar(20) DEFAULT NULL COMMENT '省份名称',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='城市字典表';

--
-- 转存表中的数据 `dict_chengshi`
--

INSERT INTO `dict_chengshi` (`city_id`, `city_name`, `simpy`, `fullpy`, `province`, `isactive`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES
('528584156529665', '三亚', 'sy', 'sanya', NULL, '0', '528584156513292', '2015-05-06 00:00:00', '528584156513292', '2015-05-06 00:00:00'),
('528584156529666', '上海', 'sh', 'shanghai', '上海市', '0', '528584156513292', '2015-05-06 00:00:00', '528584156513292', '2015-05-06 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `sys_approval_all`
--

CREATE TABLE IF NOT EXISTS `sys_approval_all` (
  `approval_id` varchar(36) NOT NULL COMMENT '审批id',
  `nodeapproval_id` varchar(36) DEFAULT NULL COMMENT 'id',
  `approval_type` varchar(50) DEFAULT NULL COMMENT '审批类型（同意、驳回）',
  `bill_type` varchar(200) DEFAULT NULL COMMENT '单据类型',
  `bill_id_i2` varchar(200) DEFAULT NULL COMMENT '单据id',
  `approver_id` varchar(36) DEFAULT NULL COMMENT '目标审批人id',
  `fact_approver_id` varchar(36) DEFAULT NULL COMMENT '实际审批人id',
  `approval_date` date DEFAULT NULL COMMENT '审批日期',
  `description` varchar(2000) DEFAULT NULL COMMENT '审批说明',
  `estate` varchar(10) DEFAULT NULL COMMENT '审批状态',
  `attribute1` varchar(200) DEFAULT NULL,
  `attribute2` varchar(200) DEFAULT NULL,
  `attribute3` varchar(200) DEFAULT NULL,
  `attribute4` varchar(200) DEFAULT NULL,
  `attribute5` varchar(200) DEFAULT NULL,
  `disabled` char(1) DEFAULT NULL COMMENT '是否失效',
  `createdate` date DEFAULT NULL,
  `createby` varchar(36) DEFAULT NULL,
  `updatedate` date DEFAULT NULL,
  `updateby` varchar(36) DEFAULT NULL,
  `seq` int(11) DEFAULT NULL COMMENT '审批顺序',
  `bill_id` varchar(36) DEFAULT NULL COMMENT '真正单据id',
  `family_uid` varchar(200) DEFAULT NULL COMMENT 'family唯一标识',
  `approve_action` char(1) DEFAULT NULL COMMENT '1:同意并加签 0/null:同意或驳回',
  `approve_url` varchar(200) DEFAULT NULL COMMENT '审批同意url',
  `detail_url` varchar(200) DEFAULT NULL COMMENT '详情url',
  `reject_url` varchar(200) DEFAULT NULL COMMENT '审批驳回url'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `sys_dict`
--

CREATE TABLE IF NOT EXISTS `sys_dict` (
  `dict_id` varchar(36) NOT NULL COMMENT 'dict_id',
  `dkey` varchar(10) DEFAULT NULL COMMENT '字典索引键',
  `dvalue` varchar(50) DEFAULT NULL COMMENT '字典值',
  `group_code` varchar(16) DEFAULT NULL COMMENT '分组编码',
  `uper_group_code` varchar(16) DEFAULT NULL COMMENT '上级分组',
  `group_order` int(11) DEFAULT NULL COMMENT '分组排序',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='系统字典表';

--
-- 转存表中的数据 `sys_dict`
--

INSERT INTO `sys_dict` (`dict_id`, `dkey`, `dvalue`, `group_code`, `uper_group_code`, `group_order`, `createby`, `createdate`, `isactive`) VALUES
('528584156496896', 'jddj', '焦点独家', 'cooperation', 'root', 1, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496897', 'lhds', '联合电商', 'cooperation', 'root', 5, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496898', 'yesld', '一二手联动', 'cooperation', 'root', 10, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496899', 'kfs', '开发商', 'customerType', 'root', 1, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496900', 'dlgs', '代理公司', 'customerType', 'root', 5, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496901', 'a', 'A', 'customerLevel', 'root', 1, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496902', 'b', 'B', 'customerLevel', 'root', 5, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496903', 'c', 'C', 'customerLevel', 'root', 10, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496905', 'd', 'D', 'customerLevel', 'root', 15, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496924', 'xs', '销售', 'roles', 'root', 1, '528584156513292', '2015-05-27 00:00:00', '0'),
('528584156496925', 'ds', '电商', 'roles', 'root', 5, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156496926', 'sd', '首代', 'roles', 'root', 10, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513299', 'ptzz', '普通住宅', 'sourceType', 'root', 1, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513300', 'bz', '别墅', 'sourceType', 'root', 5, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513301', 'mkwfc', '卖卡无分成', 'chargeType', 'root', 1, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513302', 'mkyfc', '卖卡有分成', 'chargeType', 'root', 5, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513303', 'cpswfc', 'CPS无分成', 'chargeType', 'root', 10, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513304', 'cpsyfc', 'CPS有分成', 'chargeType', 'root', 15, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513305', 'mkcps', '卖卡+CPS', 'chargeType', 'root', 20, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513306', 'dxckpdfyze', '短信、call客、 派单费用总额', 'outType', 'root', 1, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513307', 'kftdxxhdze', '看房团及其它线下活动费用总额', 'outType', 'root', 5, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513308', 'zcrnlwfyze', '驻场人员劳务费总额', 'outType', 'root', 10, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513309', 'xmbyj', '项目备用金', 'outType', 'root', 15, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156513310', 'kfs', '开发商', 'partnerType', 'root', 1, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156529664', 'hzmt', '合作媒体', 'partnerType', 'root', 5, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156529680', 'cj', '创建', 'evaStatus', 'root', 1, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156529682', 'shtg', '审核通过', 'evaStatus', 'root', 5, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156529683', 'bh', '驳回', 'evaStatus', 'root', 10, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156529684', 'zstg', '终审通过', 'evaStatus', 'root', 15, '528584156513292', '2015-05-19 00:00:00', '0'),
('528584156529687', 'cw', '财务', 'roles', 'root', 15, '528584156513292', '2015-05-19 00:00:00', '0');

-- --------------------------------------------------------

--
-- 表的结构 `sys_transaction`
--

CREATE TABLE IF NOT EXISTS `sys_transaction` (
  `transaction_id` varchar(36) NOT NULL COMMENT '事务处理id',
  `workflow_id` varchar(36) DEFAULT NULL COMMENT '工作流id',
  `node_id` varchar(36) DEFAULT NULL COMMENT '节点id',
  `transaction_type` varchar(200) DEFAULT NULL COMMENT '事务处理类型',
  `transaction_date` date DEFAULT NULL COMMENT '事务处理日期',
  `transaction_name` varchar(200) DEFAULT NULL COMMENT '事务事务处理名称',
  `transaction_result` varchar(200) DEFAULT NULL COMMENT '事务处理结果',
  `description` varchar(2000) DEFAULT NULL COMMENT '说明',
  `attribute1` varchar(200) DEFAULT NULL,
  `attribute2` varchar(200) DEFAULT NULL,
  `attribute3` varchar(200) DEFAULT NULL,
  `attribute4` varchar(200) DEFAULT NULL,
  `attribute5` varchar(200) DEFAULT NULL,
  `disabled` char(1) DEFAULT NULL COMMENT '是否失效',
  `createby` varchar(36) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `updateby` varchar(36) DEFAULT NULL,
  `updatedate` date DEFAULT NULL,
  `bill_type` varchar(50) DEFAULT NULL COMMENT '单据类型',
  `currently` int(11) DEFAULT NULL COMMENT '状态（1-最后节点 0-过去节点）',
  `bill_id_i2` varchar(200) DEFAULT NULL COMMENT '单据编号',
  `bill_id` varchar(36) DEFAULT NULL COMMENT '单据id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_evaform_payment`
--

CREATE TABLE IF NOT EXISTS `t_evaform_payment` (
  `group_id` varchar(36) NOT NULL COMMENT 'group_id',
  `eva_id` varchar(36) NOT NULL COMMENT 'eva_id',
  `v_id` varchar(36) NOT NULL COMMENT 'v_id',
  `ad_discount` decimal(3,2) DEFAULT NULL COMMENT '广告折扣',
  `ad_distribution_ratio` decimal(3,2) DEFAULT NULL COMMENT '广告配送比',
  `ad_amount_infact` decimal(16,4) DEFAULT NULL COMMENT '实际申请的广告刊例金额',
  `ad_markting_ratio` decimal(3,2) DEFAULT NULL COMMENT '营销费用比例',
  `ol_fee1` decimal(16,4) DEFAULT NULL COMMENT '短信、call客、 派单费用总额',
  `ol_fee2` decimal(16,4) DEFAULT NULL COMMENT '驻场人员劳务费总额',
  `ol_fee3` decimal(16,4) DEFAULT NULL COMMENT '看房团及其它线下活动费用总额',
  `ol_fee84` decimal(16,4) DEFAULT NULL COMMENT '项目备用金',
  `pre_deal_amount` decimal(16,4) DEFAULT NULL COMMENT '预计成交总额',
  `pre_ad_amount` decimal(16,4) DEFAULT NULL COMMENT '保底广告费金额',
  `sale_ad_kanli_amount` decimal(16,4) NOT NULL COMMENT '按销售政策计算广告刊例金额',
  `pre_ad_deal_bind` char(2) DEFAULT NULL COMMENT '保底广告费是否和成交绑定',
  `pre_tax_ratio` int(11) DEFAULT NULL COMMENT '税金比例',
  `online_amount` decimal(16,4) DEFAULT NULL COMMENT '线上支出总额',
  `offline_amount` decimal(16,4) DEFAULT NULL COMMENT '线下支出总额',
  `offline_ratio` int(11) NOT NULL COMMENT ' 线下总支出比例',
  `prjreword_perunit_sum` decimal(16,4) NOT NULL COMMENT ' 案场奖励总额',
  `brokerfees_perunit_sum` decimal(16,4) NOT NULL COMMENT '门店经纪人服务费总额',
  `resource_income_multiples` decimal(16,4) NOT NULL COMMENT '资源比预计收入倍数',
  `net_income` decimal(16,4) NOT NULL COMMENT '预计净收益',
  `isadjust` char(2) DEFAULT NULL COMMENT '是否调整记录',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期',
  `attribute1` varchar(100) DEFAULT NULL COMMENT '预留字段1',
  `attribute2` varchar(100) DEFAULT NULL COMMENT '预留字段2',
  `attribute3` varchar(100) DEFAULT NULL COMMENT '预留字段3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评估单支出收益表';

--
-- 转存表中的数据 `t_evaform_payment`
--

INSERT INTO `t_evaform_payment` (`group_id`, `eva_id`, `v_id`, `ad_discount`, `ad_distribution_ratio`, `ad_amount_infact`, `ad_markting_ratio`, `ol_fee1`, `ol_fee2`, `ol_fee3`, `ol_fee84`, `pre_deal_amount`, `pre_ad_amount`, `sale_ad_kanli_amount`, `pre_ad_deal_bind`, `pre_tax_ratio`, `online_amount`, `offline_amount`, `offline_ratio`, `prjreword_perunit_sum`, `brokerfees_perunit_sum`, `resource_income_multiples`, `net_income`, `isadjust`, `isactive`, `createby`, `createdate`, `updateby`, `updatedate`, `attribute1`, `attribute2`, `attribute3`) VALUES
('', '539782472942592', '539782473073664', 9.99, 2.00, 2.0000, 2.00, NULL, NULL, NULL, NULL, NULL, 2.0000, 0.0000, NULL, 2, NULL, NULL, 0, 0.0000, 0.0000, 0.0000, 0.0000, NULL, '0', '528584156513292', '2015-05-29 16:41:00', NULL, NULL, NULL, NULL, NULL),
('', '539782870107136', '539782870270976', 9.99, 2.00, 2.0000, 2.00, NULL, NULL, NULL, NULL, NULL, 2.0000, 0.0000, NULL, 2, NULL, NULL, 0, 0.0000, 0.0000, 0.0000, 0.0000, NULL, '0', '528584156513292', '2015-05-29 16:42:00', NULL, NULL, NULL, NULL, NULL),
('', '539824479208448', '539824479421440', 9.99, 9.99, 10000.0000, 9.99, NULL, NULL, NULL, NULL, NULL, 10000.0000, 0.0000, '', 10, NULL, NULL, 0, 0.0000, 0.0000, 0.0000, 0.0000, NULL, '0', '528584156513292', '2015-05-29 17:24:00', NULL, NULL, NULL, NULL, NULL),
('', '539827012125696', '539827012338688', 0.00, 0.00, 0.0000, 0.00, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, NULL, NULL, NULL, NULL, 0, 0.0000, 0.0000, 0.0000, 0.0000, NULL, '0', '528584156513292', '2015-05-29 17:27:00', NULL, NULL, NULL, NULL, NULL),
('', '539858196841472', '539858196956160', 9.99, 2.00, 2.0000, 2.00, NULL, NULL, NULL, NULL, NULL, 2.0000, 0.0000, NULL, 2, NULL, NULL, 0, 0.0000, 0.0000, 0.0000, 0.0000, NULL, '0', '528584156513292', '2015-05-29 17:58:00', NULL, NULL, NULL, NULL, NULL),
('', '539860284097536', '539860284261376', 0.00, 0.00, 0.0000, 0.00, NULL, NULL, NULL, NULL, NULL, 0.0000, 0.0000, NULL, NULL, NULL, NULL, 0, 0.0000, 0.0000, 0.0000, 0.0000, NULL, '0', '528584156513292', '2015-05-29 18:00:00', NULL, NULL, NULL, NULL, NULL),
('', '542275797812224', '542275798139904', 9.99, 1.00, 11.0000, 9.99, NULL, NULL, NULL, NULL, NULL, 11.0000, 0.0000, NULL, 11, NULL, NULL, 0, 0.0000, 0.0000, 0.0000, 0.0000, NULL, '0', '528584156513292', '2015-05-31 10:58:00', NULL, NULL, NULL, NULL, NULL),
('', '544162269168640', '544162269348864', 1.00, 1.00, 1.0000, 1.00, 1.0000, 1.0000, 1.0000, 1.0000, 0.0000, 1.0000, 0.0000, '1', 1, NULL, 4.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-01 18:57:00', NULL, NULL, NULL, NULL, NULL),
('', '544173069632512', '544173069796352', 1.00, 1.00, 1.0000, 1.00, 1.0000, 0.0000, 1.0000, 1.0000, 33.0000, 1.0000, 0.0000, '1', 1, NULL, 3.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-01 19:08:00', NULL, NULL, NULL, NULL, NULL),
('', '545307951137792', '545307951301632', 1.00, 9.99, 1.0000, 0.00, 11.0000, 1.0000, 1.0000, 1.0000, 0.0000, 1.0000, 0.0000, '1', 1, NULL, 14.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-02 14:22:00', NULL, NULL, NULL, NULL, NULL),
('', '545308580185088', '545308580283392', 1.00, 9.99, 1.0000, 0.00, 11.0000, 1.0000, 1.0000, 1.0000, 0.0000, 1.0000, 0.0000, '1', 1, NULL, 14.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-02 14:23:00', NULL, NULL, NULL, NULL, NULL),
('', '545444765320192', '545444765549568', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-02 16:41:00', NULL, NULL, NULL, NULL, NULL),
('', '545449090417664', '545449090630656', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-02 16:46:00', NULL, NULL, NULL, NULL, NULL),
('', '545456695804928', '545456695985152', 0.00, 0.00, 0.0000, 0.00, 33.0000, 0.0000, 11.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 44.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-02 16:53:00', NULL, NULL, NULL, NULL, NULL),
('', '545463221715968', '545463221830656', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-02 17:00:00', NULL, NULL, NULL, NULL, NULL),
('', '545465740231680', '545465740395520', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-02 17:03:00', NULL, NULL, NULL, NULL, NULL),
('', '546827924505600', '546827924964352', 0.00, 1.00, 1.0000, 1.00, 22.0000, 222.0000, 22.0000, 2222.0000, 111.0000, 21.0000, -28800.4800, '1', 1, NULL, 2488.0000, 0, 264.0000, 266.0000, -0.0100, 5702497.4700, '0', '0', '528584156513289', '2015-06-03 16:08:00', NULL, NULL, NULL, NULL, NULL),
('', '546834981667840', '546834981749760', 9.99, 1.00, 1.0000, 2.00, 123134.0000, 0.0000, 0.0000, 0.0000, 123.0000, 11.0000, -88854.5200, '1', 11, NULL, 123134.0000, -2516, 15250.0000, 30379.0000, 9.0800, -133639.0600, '0', '0', '528584156513289', '2015-06-03 16:16:00', NULL, NULL, NULL, NULL, NULL),
('', '552735061984256', '552735062098944', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-07 20:17:00', NULL, NULL, NULL, NULL, NULL),
('', '552736404833280', '552736404980736', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-07 20:19:00', NULL, NULL, NULL, NULL, NULL),
('', '552761341510656', '552761341641728', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-07 20:44:00', NULL, NULL, NULL, NULL, NULL),
('', '553028439196672', '553028439409664', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 01:16:00', NULL, NULL, NULL, NULL, NULL),
('', '553039052882944', '553039053128704', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 01:27:00', NULL, NULL, NULL, NULL, NULL),
('', '553046656730112', '553046656844800', 0.00, 0.00, 0.0000, 2.00, 222.0000, 0.0000, 222.0000, 22.0000, 11.0000, 0.0000, 0.0000, '1', NULL, NULL, 466.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 01:34:00', NULL, NULL, NULL, NULL, NULL),
('', '553069599540224', '553069599654912', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 01:58:00', NULL, NULL, NULL, NULL, NULL),
('', '553070413661184', '553070416266240', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 01:59:00', NULL, NULL, NULL, NULL, NULL),
('', '553071101543424', '553071101674496', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 01:59:00', NULL, NULL, NULL, NULL, NULL),
('', '553071513568256', '553071514108928', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 02:00:00', NULL, NULL, NULL, NULL, NULL),
('', '553071866905600', '553071867134976', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 02:00:00', NULL, NULL, NULL, NULL, NULL),
('', '553072309994496', '553072310223872', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 02:00:00', NULL, NULL, NULL, NULL, NULL),
('', '553072676848640', '553072676996096', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 02:01:00', NULL, NULL, NULL, NULL, NULL),
('', '553126343967744', '553126344147968', 0.00, 0.00, 0.0000, 0.00, 26.0000, 0.0000, 0.0000, 25.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 51.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-08 02:55:00', NULL, NULL, NULL, NULL, NULL),
('', '555843951936512', '555843952247808', 0.00, 0.00, 0.0000, 0.00, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, '1', NULL, NULL, 0.0000, 0, 0.0000, 0.0000, 0.0000, 0.0000, '0', '0', '528584156513292', '2015-06-10 01:00:00', NULL, NULL, NULL, NULL, NULL),
('', '555867013792768', '555867013891072', 9.99, 9.99, 11.0000, 9.99, 1111.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1.0000, 12848543.6979, '1', 11, NULL, 1111.0000, 0, 0.0000, 0.0000, 8.9809, 0.0000, '0', '0', '528584156513292', '2015-06-10 01:23:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_file`
--

CREATE TABLE IF NOT EXISTS `t_file` (
  `id` int(10) unsigned NOT NULL COMMENT '上传文件ID',
  `groupId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传文件组ID',
  `userId` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上传人ID',
  `uri` varchar(255) NOT NULL COMMENT '文件URI',
  `mime` varchar(255) NOT NULL COMMENT '文件MIME',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '文件状态',
  `createdTime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件上传时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_file_group`
--

CREATE TABLE IF NOT EXISTS `t_file_group` (
  `id` int(11) NOT NULL COMMENT '上传文件组ID',
  `name` varchar(255) NOT NULL COMMENT '上传文件组名称',
  `code` varchar(255) NOT NULL COMMENT '上传文件组编码',
  `public` tinyint(4) NOT NULL DEFAULT '1' COMMENT '文件组文件是否公开'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_file_group`
--

INSERT INTO `t_file_group` (`id`, `name`, `code`, `public`) VALUES
(1, '默认文件组', 'default', 1),
(2, '缩略图', 'thumb', 1),
(4, '用户', 'user', 1),
(5, '私有文件', 'private', 0),
(7, '临时目录', 'tmp', 1),
(10, '编辑区', 'block', 1);

-- --------------------------------------------------------

--
-- 表的结构 `t_houses_prj`
--

CREATE TABLE IF NOT EXISTS `t_houses_prj` (
  `group_id` varchar(36) NOT NULL COMMENT 'group_id',
  `group_name` varchar(100) DEFAULT NULL COMMENT '楼盘/项目名称',
  `open_date` datetime DEFAULT NULL COMMENT '开盘时间',
  `city_id` varchar(36) DEFAULT NULL COMMENT '开盘城市',
  `area_id` varchar(36) DEFAULT NULL COMMENT '开盘地区',
  `prj_licence` varchar(100) DEFAULT NULL COMMENT '许可证',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='楼盘项目表';

--
-- 转存表中的数据 `t_houses_prj`
--

INSERT INTO `t_houses_prj` (`group_id`, `group_name`, `open_date`, `city_id`, `area_id`, `prj_licence`, `isactive`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES
('528584156496914', '锦城名都', '2015-05-28 00:00:00', '528584156529665', NULL, 'ssss', '0', '528584156513292', '2015-05-19 00:00:00', '528584156513292', '2015-05-28 00:00:00'),
('528584156496915', '首创国际城', '2015-05-28 00:00:00', '528584156529665', NULL, 'ssss', '0', '528584156513292', '2015-05-19 00:00:00', '528584156513292', '2015-05-28 00:00:00'),
('528584156496916', '首创城', '2015-05-28 00:00:00', '528584156529666', NULL, 'ssss', '0', '528584156513292', '2015-05-19 00:00:00', '528584156513292', '2015-05-28 00:00:00'),
('528584156496917', '锦都', '2015-05-28 00:00:00', '528584156529666', NULL, 'ssss', '0', '528584156513292', '2015-05-19 00:00:00', '528584156513292', '2015-05-28 00:00:00'),
('528584156496918', '锦城', '2015-05-28 00:00:00', '528584156529666', NULL, 'ssss', '0', '528584156513292', '2015-05-19 00:00:00', '528584156513292', '2015-05-28 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `t_outlineoutdetail`
--

CREATE TABLE IF NOT EXISTS `t_outlineoutdetail` (
  `v_id` varchar(36) NOT NULL COMMENT 'v_id',
  `outl_id` varchar(36) NOT NULL COMMENT 'outl_id',
  `out_type` varchar(36) DEFAULT NULL COMMENT '支出类别',
  `out_name` varchar(50) DEFAULT NULL COMMENT '支出项名称',
  `out_amount` decimal(12,4) DEFAULT NULL COMMENT '支出项金额',
  `isadjust` char(2) DEFAULT NULL COMMENT '是否调整记录',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='线下支出明细';

--
-- 转存表中的数据 `t_outlineoutdetail`
--

INSERT INTO `t_outlineoutdetail` (`v_id`, `outl_id`, `out_type`, `out_name`, `out_amount`, `isadjust`, `isactive`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES
('545456695985152', '545456696083456', '52', '1', 22.0000, NULL, '0', '528584156513292', '2015-06-02 16:53:00', NULL, NULL),
('545456695985152', '545456696116224', '52', '2', 11.0000, NULL, '0', '528584156513292', '2015-06-02 16:53:00', NULL, NULL),
('545456695985152', '545456696148992', '52', '11', 11.0000, NULL, '0', '528584156513292', '2015-06-02 16:53:00', NULL, NULL),
('546827924964352', '546827925079040', '528584156513306', 'qq', 11.0000, NULL, '0', '528584156513289', '2015-06-03 16:08:00', NULL, NULL),
('546827924964352', '546827925128192', '528584156513306', '11', 11.0000, NULL, '0', '528584156513289', '2015-06-03 16:08:00', NULL, NULL),
('546827924964352', '546827925160960', '528584156513307', '22', 22.0000, NULL, '0', '528584156513289', '2015-06-03 16:08:00', NULL, NULL),
('546827924964352', '546827925193728', '528584156513308', '22', 222.0000, NULL, '0', '528584156513289', '2015-06-03 16:08:00', NULL, NULL),
('546827924964352', '546827925210112', '528584156513309', '11', 2222.0000, NULL, '0', '528584156513289', '2015-06-03 16:08:00', NULL, NULL),
('546834981749760', '546834981815296', '528584156513306', '111', 123123.0000, NULL, '0', '528584156513289', '2015-06-03 16:16:00', NULL, NULL),
('546834981749760', '546834981848064', '528584156513306', '11', 11.0000, NULL, '0', '528584156513289', '2015-06-03 16:16:00', NULL, NULL),
('553046656844800', '553046656893952', '528584156513306', '11', 222.0000, NULL, '0', '528584156513292', '2015-06-08 01:34:00', NULL, NULL),
('553046656844800', '553046656943104', '528584156513307', '11', 222.0000, NULL, '0', '528584156513292', '2015-06-08 01:34:00', NULL, NULL),
('553046656844800', '553046656959488', '528584156513309', '11', 22.0000, NULL, '0', '528584156513292', '2015-06-08 01:34:00', NULL, NULL),
('553126344147968', '553126344229888', '528584156513306', '11', 22.0000, NULL, '0', '528584156513292', '2015-06-08 02:55:00', NULL, NULL),
('553126344147968', '553126344262656', '528584156513306', '11', 2.0000, NULL, '0', '528584156513292', '2015-06-08 02:55:00', NULL, NULL),
('553126344147968', '553126344295424', '528584156513306', '1', 2.0000, NULL, '0', '528584156513292', '2015-06-08 02:55:00', NULL, NULL),
('553126344147968', '553126344311808', '528584156513309', '2', 1.0000, NULL, '0', '528584156513292', '2015-06-08 02:55:00', NULL, NULL),
('553126344147968', '553126344344576', '528584156513309', '2', 2.0000, NULL, '0', '528584156513292', '2015-06-08 02:55:00', NULL, NULL),
('553126344147968', '553126344360960', '528584156513309', '1', 22.0000, NULL, '0', '528584156513292', '2015-06-08 02:55:00', NULL, NULL),
('555867013891072', '555867013956608', '528584156513306', '11', 1111.0000, NULL, '0', '528584156513292', '2015-06-10 01:23:00', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_pdetail`
--

CREATE TABLE IF NOT EXISTS `t_pdetail` (
  `group_id` varchar(36) NOT NULL COMMENT 'group_id',
  `eva_id` varchar(36) NOT NULL COMMENT 'eva_id',
  `pd_id` varchar(36) NOT NULL COMMENT 'pd_id',
  `bdate` datetime DEFAULT NULL COMMENT '开始时间',
  `edate` datetime DEFAULT NULL COMMENT '结束时间',
  `sell_house_num` int(11) DEFAULT NULL COMMENT '可售房源数量',
  `source_type` char(36) DEFAULT NULL COMMENT '房源类型',
  `pre_incoming` decimal(16,4) DEFAULT NULL COMMENT '预计毛收入',
  `charge_type` varchar(36) DEFAULT NULL COMMENT '收费方式',
  `ajcard_price` decimal(13,4) DEFAULT NULL COMMENT '爱家卡单价',
  `pre_volumn` int(11) DEFAULT NULL COMMENT '预计成交套数',
  `prjreword_perunit` decimal(13,4) DEFAULT NULL COMMENT '案场奖励/每套',
  `prevolumn_perunit` int(11) DEFAULT NULL COMMENT '预估案场奖励成交套数',
  `brokerfees_perunit` decimal(13,4) DEFAULT NULL COMMENT '经纪人服务费/每套',
  `prebrokervolumn` int(11) DEFAULT NULL COMMENT '预计经纪人成交套数',
  `pref_context` varchar(2000) DEFAULT NULL COMMENT '优惠情况',
  `jd_retain_ratio` int(11) DEFAULT NULL COMMENT '焦点留存比例',
  `jd_retain_amount` decimal(16,4) DEFAULT NULL COMMENT '焦点留存金额',
  `pre_amount` decimal(13,4) DEFAULT NULL COMMENT '预计成交总额',
  `commission_rate` int(11) DEFAULT NULL COMMENT '佣金比例',
  `commission_perunit` decimal(16,4) DEFAULT NULL COMMENT '每套收取佣金',
  `pre_commission_amount` decimal(18,4) DEFAULT NULL COMMENT '预计佣金毛收入',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期',
  `attribute1` varchar(100) DEFAULT NULL COMMENT '预留字段1',
  `attribute2` varchar(100) DEFAULT NULL COMMENT '预留字段2',
  `attribute3` varchar(100) DEFAULT NULL COMMENT '预留字段3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目优惠明细详细';

--
-- 转存表中的数据 `t_pdetail`
--

INSERT INTO `t_pdetail` (`group_id`, `eva_id`, `pd_id`, `bdate`, `edate`, `sell_house_num`, `source_type`, `pre_incoming`, `charge_type`, `ajcard_price`, `pre_volumn`, `prjreword_perunit`, `prevolumn_perunit`, `brokerfees_perunit`, `prebrokervolumn`, `pref_context`, `jd_retain_ratio`, `jd_retain_amount`, `pre_amount`, `commission_rate`, `commission_perunit`, `pre_commission_amount`, `isactive`, `createby`, `createdate`, `updateby`, `updatedate`, `attribute1`, `attribute2`, `attribute3`) VALUES
('', '553072676848640', '553068784075776', '2015-05-26 18:30:00', '2015-05-27 06:50:00', 111, '528584156513299', 238.0000, '528584156513301', 22.0000, 11, 2.0000, 1, 2.0000, 1, '2', 100, 242.0000, 0.0000, 0, 0.0000, 0.0000, '0', '528584156513292', '2015-06-08 01:57:00', NULL, NULL, NULL, NULL, NULL),
('', '553126343967744', '553123939599360', '2015-05-26 18:30:00', '2015-05-27 17:55:00', 111, '528584156513299', -242.0000, '528584156513301', 22.0000, 11, 22.0000, 11, 22.0000, 11, '22', 100, 242.0000, 0.0000, 0, 0.0000, 0.0000, '0', '528584156513292', '2015-06-08 02:53:00', NULL, NULL, NULL, NULL, NULL),
('', '', '555471588557824', '2015-05-28 00:00:00', '2015-06-16 00:00:00', 111, '528584156513300', -2442.0000, '528584156513301', 111.0000, 222, 11.0000, 222, 111.0000, 222, '11', 100, 24642.0000, 0.0000, 0, 0.0000, 0.0000, '1', '528584156513292', '2015-06-09 18:41:00', NULL, NULL, NULL, NULL, NULL),
('', '', '555820916802560', '2015-07-23 00:00:00', '2015-06-10 00:00:00', 11, '528584156513299', 1111110.0000, '528584156513301', 111.0000, 11122, 1111.0000, 111, 111.0000, 1, '11', 100, 1234542.0000, 0.0000, 0, 0.0000, 0.0000, '1', '528584156513292', '2015-06-10 00:36:00', NULL, NULL, NULL, NULL, NULL),
('', '', '555826835129344', '2015-07-09 00:00:00', '2015-06-17 00:00:00', 1111, '528584156513299', 2393336.6400, '528584156513305', 2222.0000, 1111, 11.0000, 2, 1.0000, 2, '1', 96, 2493084.0000, 11.0000, 1, 22.0000, 2.0000, '1', '528584156513292', '2015-06-10 00:43:00', NULL, NULL, NULL, NULL, NULL),
('', '', '555827571426304', '2015-07-09 00:00:00', '2015-06-10 00:00:00', 11, '528584156513300', 218.0000, '528584156513302', 11.0000, 22, 11.0000, 2, 1.0000, 2, '1', 100, 242.0000, 0.0000, 0, 0.0000, 0.0000, '1', '528584156513292', '2015-06-10 00:43:00', NULL, NULL, NULL, NULL, NULL),
('', '', '555827977618432', '1899-12-31 00:00:00', '1899-12-31 00:00:00', 1, '528584156513299', 4400.0000, '528584156513303', 0.0000, 222, 22.0000, 11, 22.0000, 11, '22', 100, 4884.0000, 1111.0000, 11, 22.0000, 11.0000, '1', '528584156513292', '2015-06-10 00:44:00', NULL, NULL, NULL, NULL, NULL),
('', '', '555828330988544', '2015-08-07 00:00:00', '2015-06-17 00:00:00', 11, '528584156513299', 476.0000, '528584156513304', 0.0000, 22, 2.0000, 2, 2.0000, 2, '1', 100, 484.0000, 22.0000, 22, 22.0000, 2.0000, '1', '528584156513292', '2015-06-10 00:44:00', NULL, NULL, NULL, NULL, NULL),
('', '', '555839347999744', '2015-07-16 00:00:00', '2015-11-26 00:00:00', 111, '528584156513300', 197358.0000, '528584156513301', 1111.0000, 222, 111.0000, 222, 111.0000, 222, '1', 100, 246642.0000, 0.0000, 0, 0.0000, 0.0000, '1', '528584156513292', '2015-06-10 00:55:00', NULL, NULL, NULL, NULL, NULL),
('', '', '555840019563520', '2015-07-02 00:00:00', '2015-07-08 00:00:00', 111, '528584156513299', 1468942.0000, '528584156513301', 1212.0000, 1212, 1.0000, 1, 1.0000, 1, '1', 100, 1468944.0000, 0.0000, 0, 0.0000, 0.0000, '1', '528584156513292', '2015-06-10 00:56:00', NULL, NULL, NULL, NULL, NULL),
('', '555843951936512', '555843184034816', '2015-07-08 00:00:00', '2015-06-17 00:00:00', 111, '528584156513299', 24418.0000, '528584156513301', 222.0000, 111, 222.0000, 1, 2.0000, 1, '1', 100, 24642.0000, 0.0000, 0, 0.0000, 0.0000, '0', '528584156513292', '2015-06-10 00:59:00', NULL, NULL, NULL, NULL, NULL),
('', '555867013792768', '555866280461312', '2015-07-09 00:00:00', '2015-06-10 00:00:00', 111111, '528584156513300', 1454398.0000, '528584156513301', 1212.0000, 1212, 1212.0000, 12, 1.0000, 2, '1212', 100, 1468944.0000, 0.0000, 0, 0.0000, 0.0000, '0', '528584156513292', '2015-06-10 01:23:00', NULL, NULL, NULL, NULL, NULL),
('', '555867013792768', '555866763609088', '2015-07-09 00:00:00', '2015-06-10 00:00:00', 1212, '528584156513299', -23747.3200, '528584156513302', 1212.0000, 12, 1221.0000, 31, 2.0000, 2, '22', 97, 14544.0000, 0.0000, 0, 0.0000, 0.0000, '0', '528584156513292', '2015-06-10 01:23:00', NULL, NULL, NULL, NULL, NULL),
('', '', '556396398838784', '2015-07-08 00:00:00', '2015-07-15 00:00:00', 111, '528584156513299', 21958.0000, '528584156513301', 111.0000, 222, 111.0000, 22, 11.0000, 22, '11', 100, 24642.0000, 0.0000, 0, 0.0000, 0.0000, '1', '528584156513292', '2015-06-10 10:22:00', NULL, NULL, NULL, NULL, NULL),
('', '', '556450384561152', '2015-07-08 00:00:00', '2015-07-14 00:00:00', 111, '528584156513299', 24638.0000, '528584156513301', 111.0000, 222, 1.0000, 2, 1.0000, 2, '1', 100, 24642.0000, 0.0000, 0, 0.0000, 0.0000, '1', '528584156513292', '2015-06-10 11:17:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_permission_access`
--

CREATE TABLE IF NOT EXISTS `t_permission_access` (
  `group_id` varchar(36) NOT NULL COMMENT 'group_id',
  `eva_id` varchar(36) NOT NULL COMMENT 'eva_id',
  `prmid` varchar(36) NOT NULL COMMENT 'prmid',
  `u_id` varchar(36) DEFAULT NULL COMMENT 'u_id',
  `isApproval` tinyint(4) NOT NULL COMMENT '是否审批通过',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `seq` int(10) NOT NULL COMMENT '排序',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='授权表';

--
-- 转存表中的数据 `t_permission_access`
--

INSERT INTO `t_permission_access` (`group_id`, `eva_id`, `prmid`, `u_id`, `isApproval`, `isactive`, `seq`, `createby`, `createdate`, `updatedate`) VALUES
('', '545465740231680', '546442283746304', '528584156513292', 1, '0', 2, '528584156513292', '2015-06-03 09:36:00', '2015-06-03 15:16:00'),
('', '545465740231680', '546445376128000', '528584156513289', 1, '0', 1, '528584156513289', '2015-06-03 09:39:00', '2015-06-03 15:16:00'),
('', '546827924505600', '546827925767168', '528584156513283', 0, '0', 1, '528584156513289', '2015-06-03 16:08:00', NULL),
('', '546827924505600', '546827925799936', '528584156513283', 0, '0', 2, '528584156513289', '2015-06-03 16:08:00', NULL),
('', '546827924505600', '546827925832704', '528584156513289', 0, '0', 3, '528584156513289', '2015-06-03 16:08:00', NULL),
('', '546834981667840', '546834982093824', '528584156513283', 0, '0', 3, '528584156513289', '2015-06-03 16:16:00', '2015-06-04 15:24:00'),
('', '546834981667840', '546834982110208', '528584156513282', 0, '0', 4, '528584156513289', '2015-06-03 16:16:00', '2015-06-04 15:24:00'),
('', '546834981667840', '546834982142976', '528584156513289', 0, '0', 2, '528584156513289', '2015-06-03 16:16:00', '2015-06-04 15:24:00'),
('', '546834981667840', '548151275144192', '528584156513284', 0, '0', 5, '528584156513292', '2015-06-04 14:35:00', '2015-06-04 15:24:00'),
('', '546834981667840', '548200006534144', '528584156513292', 0, '0', 1, '528584156513292', '2015-06-04 15:24:00', '2015-06-04 15:24:00'),
('', '552735061984256', '552735062262784', '528584156513283', 0, '0', 1, '528584156513292', '2015-06-07 20:17:00', NULL),
('', '552735061984256', '552735062295552', '528584156513284', 0, '0', 2, '528584156513292', '2015-06-07 20:17:00', NULL),
('', '552735061984256', '552735062311936', '528584156513292', 0, '0', 3, '528584156513292', '2015-06-07 20:17:00', NULL),
('', '552736404833280', '552736405095424', '528584156513282', 0, '0', 1, '528584156513292', '2015-06-07 20:19:00', NULL),
('', '552736404833280', '552736405128192', '528584156513284', 0, '0', 2, '528584156513292', '2015-06-07 20:19:00', NULL),
('', '552736404833280', '552736405144576', '528584156513292', 0, '0', 3, '528584156513292', '2015-06-07 20:19:00', NULL),
('', '552761341510656', '552761341740032', '528584156513282', 0, '0', 2, '528584156513292', '2015-06-07 20:44:00', '2015-06-07 21:33:00'),
('', '552761341510656', '552761341756416', '528584156513284', 0, '0', 3, '528584156513292', '2015-06-07 20:44:00', '2015-06-07 21:33:00'),
('', '552761341510656', '552761341789184', '528584156513292', 1, '0', 1, '528584156513292', '2015-06-07 20:44:00', '2015-06-07 21:33:00'),
('', '553028439196672', '553028439491584', '528584156513283', 0, '0', 1, '528584156513292', '2015-06-08 01:16:00', NULL),
('', '553028439196672', '553028439507968', '528584156513282', 0, '0', 2, '528584156513292', '2015-06-08 01:16:00', NULL),
('', '553028439196672', '553028439573504', '528584156513292', 0, '0', 3, '528584156513292', '2015-06-08 01:16:00', NULL),
('', '553039052882944', '553039053210624', '528584156513282', 0, '0', 1, '528584156513292', '2015-06-08 01:27:00', NULL),
('', '553039052882944', '553039053243392', '528584156513280', 0, '0', 2, '528584156513292', '2015-06-08 01:27:00', NULL),
('', '553039052882944', '553039053259776', '528584156513292', 0, '0', 3, '528584156513292', '2015-06-08 01:27:00', NULL),
('', '553046656730112', '553046657025024', '528584156513285', 0, '0', 1, '528584156513292', '2015-06-08 01:34:00', NULL),
('', '553046656730112', '553046657041408', '528584156513280', 0, '0', 2, '528584156513292', '2015-06-08 01:34:00', NULL),
('', '553046656730112', '553046657074176', '528584156513292', 0, '0', 3, '528584156513292', '2015-06-08 01:34:00', NULL),
('', '553072676848640', '553072677143552', '528584156513280', 0, '0', 1, '528584156513292', '2015-06-08 02:01:00', NULL),
('', '553072676848640', '553072677176320', '528584156513283', 0, '0', 2, '528584156513292', '2015-06-08 02:01:00', NULL),
('', '553072676848640', '553072677209088', '528584156513292', 0, '0', 3, '528584156513292', '2015-06-08 02:01:00', NULL),
('', '553126343967744', '553126344475648', '528584156513283', 0, '0', 1, '528584156513292', '2015-06-08 02:55:00', NULL),
('', '553126343967744', '553126344508416', '528584156513284', 0, '0', 2, '528584156513292', '2015-06-08 02:55:00', NULL),
('', '553126343967744', '553126344541184', '528584156513292', 0, '0', 3, '528584156513292', '2015-06-08 02:55:00', NULL),
('', '555843951936512', '555843952411648', '528584156513282', 0, '0', 1, '528584156513292', '2015-06-10 01:00:00', NULL),
('', '555843951936512', '555843952460800', '528584156513280', 0, '0', 2, '528584156513292', '2015-06-10 01:00:00', NULL),
('', '555843951936512', '555843952493568', '528584156513292', 0, '0', 3, '528584156513292', '2015-06-10 01:00:00', NULL),
('', '555867013792768', '555867014136832', '528584156496924', 0, '0', 4, '528584156513292', '2015-06-10 01:23:00', '2015-06-10 11:21:00'),
('', '555867013792768', '556384239256576', '528584156513289', 0, '0', 1, '528584156513292', '2015-06-10 10:10:00', '2015-06-10 11:21:00'),
('', '555867013792768', '556448841417728', '528584156513286', 0, '0', 5, '528584156513292', '2015-06-10 11:15:00', '2015-06-10 11:21:00');

-- --------------------------------------------------------

--
-- 表的结构 `t_permission_access_log`
--

CREATE TABLE IF NOT EXISTS `t_permission_access_log` (
  `id` varchar(36) NOT NULL COMMENT 'id',
  `eva_id` varchar(36) NOT NULL,
  `content` varchar(2000) NOT NULL COMMENT '审批意见',
  `attachment` varchar(540) NOT NULL COMMENT '附件',
  `path` varchar(654) NOT NULL COMMENT '路径',
  `size` int(11) NOT NULL COMMENT '大小',
  `type` varchar(36) NOT NULL COMMENT '类型',
  `status` varchar(36) NOT NULL COMMENT '审批状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期',
  `updateby` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='审批记录表';

--
-- 转存表中的数据 `t_permission_access_log`
--

INSERT INTO `t_permission_access_log` (`id`, `eva_id`, `content`, `attachment`, `path`, `size`, `type`, `status`, `createby`, `createdate`, `updatedate`, `updateby`) VALUES
('546441495315456', '545465740231680', '1111', 'favicon.ico', '/var/www/sohu/protected/file/attachment/20150603/20150603093544_63778.favicon.ico', 1406, 'image/vnd.microsoft.icon', '528584156529683', '528584156513292', '2015-06-03 09:35:00', NULL, ''),
('546445725713408', '545465740231680', '2222211', 'logo.gif', '/var/www/sohu/protected/file/attachment/20150603/20150603094003_12939.logo.gif', 3118, 'image/gif', '528584156529683', '528584156513292', '2015-06-03 09:40:00', NULL, ''),
('546513046897664', '545465740231680', '1111', 'Metronic   eCommerce   Dashboard.png', '/var/www/sohu/protected/file/attachment/20150603/20150603104832_66796.Metronic   eCommerce   Dashboard.png', 138971, 'image/png', '528584156529683', '528584156513289', '2015-06-03 10:48:00', NULL, ''),
('546513974281216', '545465740231680', 'ssss', 'Metronic   eCommerce   Dashboard.png', '/var/www/sohu/protected/file/attachment/20150603/20150603104928_23401.Metronic   eCommerce   Dashboard.png', 138971, 'image/png', '528584156529683', '528584156513289', '2015-06-03 10:49:00', NULL, ''),
('546552516346880', '545465740231680', '1111', '', '', 0, '', '528584156529682', '528584156513292', '2015-06-03 11:28:00', NULL, ''),
('546561103463424', '545465740231680', 'sasasa', '', '', 0, '', '528584156529683', '528584156513289', '2015-06-03 11:37:00', NULL, ''),
('546561315865600', '545465740231680', '11111', '', '', 0, '', '528584156529682', '528584156513292', '2015-06-03 11:37:00', NULL, ''),
('546561465811968', '545465740231680', '1111', '', '', 0, '', '528584156529682', '528584156513289', '2015-06-03 11:37:00', NULL, ''),
('546568421229568', '545465740231680', '5r', 'logo.gif', '/var/www/sohu/protected/file/attachment/20150603/20150603114451_38793.logo.gif', 3118, 'image/gif', '528584156529684', '528584156513289', '2015-06-03 11:44:00', NULL, ''),
('552809153758208', '552761341510656', '4444', 'favicon.ico', '/var/www/sohu2/protected/file/attachment/20150607/20150607213315_11032.favicon.ico', 1406, 'image/vnd.microsoft.icon', '528584156529682', '528584156513292', '2015-06-07 21:33:00', NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `t_presappl`
--

CREATE TABLE IF NOT EXISTS `t_presappl` (
  `ra_id` varchar(36) NOT NULL COMMENT 'ra_id',
  `group_id` varchar(36) DEFAULT NULL COMMENT 'group_id',
  `eva_id` varchar(36) DEFAULT NULL COMMENT 'eva_id',
  `srv_type` char(2) DEFAULT NULL COMMENT '服务类别',
  `srv_detail` varchar(500) DEFAULT NULL COMMENT '服务明细',
  `srv_count` int(11) DEFAULT NULL COMMENT '服务数量',
  `srv_memo` varchar(1000) DEFAULT NULL COMMENT '服务说明',
  `fzid` varchar(36) DEFAULT NULL COMMENT '负责人id',
  `pre_cost` decimal(16,4) DEFAULT NULL COMMENT '预估成本',
  `fact_srv_count` int(11) DEFAULT NULL COMMENT '实际服务数',
  `infact_status` char(2) DEFAULT NULL COMMENT '完成状况',
  `infact_cost` decimal(12,4) DEFAULT NULL COMMENT '实际发生成本',
  `pre_cardnum` int(11) DEFAULT NULL COMMENT '预估卖卡张数',
  `pre_cardamount` decimal(16,4) DEFAULT NULL COMMENT '预估卖卡金额',
  `fact_cardnum` int(11) DEFAULT NULL COMMENT '实际卖卡张数',
  `fact_cardamount` decimal(16,4) DEFAULT NULL COMMENT '实际卖卡金额',
  `pr_number` varchar(50) DEFAULT NULL COMMENT 'PR单号',
  `pr_detail` varchar(1000) DEFAULT NULL COMMENT 'PR明细',
  `pr_amount` decimal(16,4) DEFAULT NULL COMMENT 'PR金额',
  `pr_desc` varchar(1000) DEFAULT NULL COMMENT 'PR说明',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目资源申请记录表';

-- --------------------------------------------------------

--
-- 表的结构 `t_prform_by_eva`
--

CREATE TABLE IF NOT EXISTS `t_prform_by_eva` (
  `pr_id` varchar(36) NOT NULL COMMENT 'pr_id',
  `group_id` varchar(36) DEFAULT NULL COMMENT 'group_id',
  `eva_id` varchar(36) DEFAULT NULL COMMENT 'eva_id',
  `pr_number` varchar(50) DEFAULT NULL COMMENT 'PR单号',
  `prstatus` varchar(10) DEFAULT NULL COMMENT '状态',
  `pramount` decimal(13,4) DEFAULT NULL COMMENT '金额',
  `pryue` decimal(13,4) DEFAULT NULL COMMENT '余额',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='PR单关联管理';

-- --------------------------------------------------------

--
-- 表的结构 `t_prjexeitems`
--

CREATE TABLE IF NOT EXISTS `t_prjexeitems` (
  `es_id` varchar(36) NOT NULL COMMENT 'es_id',
  `ra_id` varchar(36) DEFAULT NULL COMMENT 'ra_id',
  `exename` varchar(50) DEFAULT NULL COMMENT '执行名称',
  `bdate` date DEFAULT NULL COMMENT '开始时间',
  `edate` date DEFAULT NULL COMMENT '结束时间',
  `pre_amount` decimal(13,4) DEFAULT NULL COMMENT '预计成交总额',
  `infact_cost` decimal(12,4) DEFAULT NULL COMMENT '实际发生成本',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目执行记录';

-- --------------------------------------------------------

--
-- 表的结构 `t_prjstatusitems`
--

CREATE TABLE IF NOT EXISTS `t_prjstatusitems` (
  `group_id` varchar(36) NOT NULL COMMENT 'group_id',
  `eva_id` varchar(36) NOT NULL COMMENT 'eva_id',
  `pst_id` varchar(36) NOT NULL COMMENT 'pst_id',
  `content` varchar(2000) NOT NULL COMMENT '审批意见',
  `pstatus` varchar(36) DEFAULT NULL COMMENT '项目状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='电商项目状态记录表';

-- --------------------------------------------------------

--
-- 表的结构 `t_prj_adjust_detail`
--

CREATE TABLE IF NOT EXISTS `t_prj_adjust_detail` (
  `ad_id` varchar(36) NOT NULL COMMENT 'ad_id',
  `pad_id` varchar(36) NOT NULL COMMENT 'pad_id',
  `pdid` varchar(36) DEFAULT NULL COMMENT '评估单优惠明细编码',
  `sell_house_num` int(11) DEFAULT NULL COMMENT '可售房源数量',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评估调整项目明细';

-- --------------------------------------------------------

--
-- 表的结构 `t_prj_adjust_items`
--

CREATE TABLE IF NOT EXISTS `t_prj_adjust_items` (
  `eva_id` varchar(36) NOT NULL COMMENT 'eva_id',
  `ad_id` varchar(36) NOT NULL COMMENT 'ad_id',
  `v_id` varchar(36) DEFAULT NULL COMMENT 'v_id',
  `adjust_memo` varchar(500) DEFAULT NULL COMMENT '调整备注',
  `ad_discount` decimal(3,2) DEFAULT NULL COMMENT '广告折扣',
  `ad_distribution_ratio` int(11) DEFAULT NULL COMMENT '广告配送比',
  `ad_amount_infact` decimal(16,4) DEFAULT NULL COMMENT '实际申请的广告刊例金额',
  `ad_markting_ratio` int(11) DEFAULT NULL COMMENT '营销费用比例',
  `pre_deal_amount` decimal(16,4) DEFAULT NULL COMMENT '预计成交总额',
  `pre_ad_amount` decimal(16,4) DEFAULT NULL COMMENT '保底广告费金额',
  `pre_ad_deal_bind` char(2) DEFAULT NULL COMMENT '保底广告费是否和成交绑定',
  `pre_tax_ratio` int(11) DEFAULT NULL COMMENT '税金比例',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目调整单列表';

-- --------------------------------------------------------

--
-- 表的结构 `t_prj_evaluationforms`
--

CREATE TABLE IF NOT EXISTS `t_prj_evaluationforms` (
  `group_id` varchar(36) NOT NULL COMMENT 'group_id',
  `eva_id` varchar(36) NOT NULL COMMENT 'eva_id',
  `eva_no` varchar(50) DEFAULT NULL COMMENT '评估单编号',
  `city_id` varchar(36) DEFAULT NULL COMMENT '开盘城市',
  `ec_incharge_id` varchar(36) DEFAULT NULL COMMENT '电商负责人id',
  `cooperetion_mode` varchar(36) DEFAULT NULL COMMENT '合作方式',
  `sales_id` varchar(36) DEFAULT NULL COMMENT '销售id',
  `customer_type` varchar(36) DEFAULT NULL COMMENT '甲方客户类型',
  `customer_level` varchar(36) DEFAULT NULL COMMENT '客户级别',
  `pre_opendatetime` datetime DEFAULT NULL COMMENT '预计开盘日期',
  `area_id` varchar(36) DEFAULT NULL COMMENT '开盘地区',
  `prj_condition` varchar(2000) DEFAULT NULL COMMENT '项目情况说明',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `status` varchar(36) NOT NULL COMMENT '项目状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期',
  `attribute1` varchar(100) DEFAULT NULL COMMENT '预留字段1',
  `attribute2` varchar(100) DEFAULT NULL COMMENT '预留字段2',
  `attribute3` varchar(100) DEFAULT NULL COMMENT '预留字段3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目评估单';

--
-- 转存表中的数据 `t_prj_evaluationforms`
--

INSERT INTO `t_prj_evaluationforms` (`group_id`, `eva_id`, `eva_no`, `city_id`, `ec_incharge_id`, `cooperetion_mode`, `sales_id`, `customer_type`, `customer_level`, `pre_opendatetime`, `area_id`, `prj_condition`, `isactive`, `status`, `createby`, `createdate`, `updateby`, `updatedate`, `attribute1`, `attribute2`, `attribute3`) VALUES
('528584156496915', '545456695804928', NULL, '528584156529666', '528584156513283', '528584156496896', '528584156513280', '528584156496899', '528584156496901', '1899-12-31 00:00:00', '528584156513290', '1', '0', '528584156529680', '528584156513292', '2015-06-02 16:53:00', NULL, NULL, NULL, NULL, NULL),
('528584156496915', '545463221715968', NULL, '528584156529666', '528584156513283', '528584156496897', '528584156513285', '528584156496899', '528584156496902', '2015-05-08 11:30:00', '528584156513291', 'wwww', '0', '528584156529680', '528584156513292', '2015-06-02 17:00:00', NULL, NULL, NULL, NULL, NULL),
('528584156496918', '545465740231680', NULL, '528584156529666', '528584156513286', '528584156496896', '528584156513285', '528584156496900', '528584156496901', '2015-06-04 15:10:00', '528584156513291', 'wqwqwq', '0', '528584156529684', '528584156513292', '2015-06-02 17:03:00', NULL, NULL, NULL, NULL, NULL),
('528584156496915', '546827924505600', NULL, '528584156529666', '528584156513283', '528584156496896', '528584156513283', '528584156496900', '528584156496902', '2015-06-04 15:10:00', '528584156513290', '2222', '0', '528584156529680', '528584156513289', '2015-06-03 16:08:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '546834981667840', NULL, '528584156529666', '528584156513283', '528584156496896', '528584156513282', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513290', 'ss', '0', '528584156529680', '528584156513289', '2015-06-03 16:16:00', NULL, NULL, NULL, NULL, NULL),
('528584156496915', '552735061984256', NULL, '528584156529666', '528584156513283', '528584156496897', '528584156513284', '528584156496899', '528584156496902', '2015-06-04 15:10:00', '528584156513291', '11', '0', '528584156529680', '528584156513292', '2015-06-07 20:17:00', NULL, NULL, NULL, NULL, NULL),
('528584156496917', '552736404833280', NULL, '528584156529666', '528584156513282', '528584156496897', '528584156513284', '528584156496899', '528584156496902', '2015-05-20 10:50:00', '528584156513290', 'ddd', '1', '528584156529680', '528584156513292', '2015-06-07 20:19:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '552761341510656', NULL, '528584156529666', '528584156513282', '528584156496896', '528584156513284', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513291', '55', '1', '528584156529682', '528584156513292', '2015-06-07 20:44:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553026711143424', NULL, '528584156529666', '528584156513283', '528584156496897', '528584156513282', '528584156496899', '528584156496902', '2015-06-04 15:10:00', '528584156513290', 'wwww', '0', '528584156529680', '528584156513292', '2015-06-08 01:14:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553028439196672', NULL, '528584156529666', '528584156513283', '528584156496897', '528584156513282', '528584156496899', '528584156496902', '2015-06-04 15:10:00', '528584156513290', 'wwww', '0', '528584156529680', '528584156513292', '2015-06-08 01:16:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553039052882944', NULL, '528584156529666', '528584156513282', '528584156496896', '528584156513280', '528584156496899', '528584156496902', '2015-06-04 15:10:00', '528584156513291', 'jj', '0', '528584156529680', '528584156513292', '2015-06-08 01:27:00', NULL, NULL, NULL, NULL, NULL),
('528584156496917', '553046656730112', NULL, '528584156529666', '528584156513285', '528584156496896', '528584156513280', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513290', 'wwww', '0', '528584156529680', '528584156513292', '2015-06-08 01:34:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553069599540224', NULL, '528584156529666', '528584156513280', '528584156496897', '528584156513283', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513290', 'ww', '0', '528584156529680', '528584156513292', '2015-06-08 01:58:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553070413661184', NULL, '528584156529666', '528584156513280', '528584156496897', '528584156513283', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513290', 'ww', '0', '528584156529680', '528584156513292', '2015-06-08 01:59:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553071101543424', NULL, '528584156529666', '528584156513280', '528584156496897', '528584156513283', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513290', 'ww', '0', '528584156529680', '528584156513292', '2015-06-08 01:59:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553071513568256', NULL, '528584156529666', '528584156513280', '528584156496897', '528584156513283', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513290', 'ww', '0', '528584156529680', '528584156513292', '2015-06-08 02:00:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553071866905600', NULL, '528584156529666', '528584156513280', '528584156496897', '528584156513283', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513290', 'ww', '0', '528584156529680', '528584156513292', '2015-06-08 02:00:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553072309994496', NULL, '528584156529666', '528584156513280', '528584156496897', '528584156513283', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513290', 'ww', '0', '528584156529680', '528584156513292', '2015-06-08 02:00:00', NULL, NULL, NULL, NULL, NULL),
('528584156496916', '553072676848640', NULL, '528584156529666', '528584156513280', '528584156496897', '528584156513283', '528584156496899', '528584156496901', '2015-06-04 15:10:00', '528584156513290', 'ww', '0', '528584156529680', '528584156513292', '2015-06-08 02:01:00', NULL, NULL, NULL, NULL, NULL),
('528584156496918', '553126343967744', NULL, '528584156529666', '528584156513283', '528584156496897', '528584156513284', '528584156496899', '528584156496902', '2015-05-08 11:30:00', '528584156513290', '44', '0', '528584156529680', '528584156513292', '2015-06-08 02:55:00', NULL, NULL, NULL, NULL, NULL),
('528584156496915', '555843951936512', NULL, '528584156529666', '528584156513282', '528584156496896', '528584156513280', '528584156496899', '528584156496902', '2015-07-08 00:00:00', '528584156513291', '11', '0', '528584156529680', '528584156513292', '2015-06-10 01:00:00', NULL, NULL, NULL, NULL, NULL),
('528584156496915', '555867013792768', NULL, '528584156529666', '528584156496924', '528584156496897', '528584156513283', '528584156496900', '528584156496902', '2015-07-09 00:00:00', '528584156513291', 'www', '0', '528584156529680', '528584156513292', '2015-06-10 01:23:00', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_prj_partner_splitdetail`
--

CREATE TABLE IF NOT EXISTS `t_prj_partner_splitdetail` (
  `pd_id` varchar(36) NOT NULL COMMENT 'pd_id',
  `sp_id` varchar(36) NOT NULL COMMENT 'sp_id',
  `partner_type` varchar(36) DEFAULT NULL COMMENT '开发商/合作媒体类别',
  `partner_name` varchar(50) DEFAULT NULL COMMENT '开发商/合作媒体名称',
  `divide` int(11) DEFAULT NULL COMMENT '分成比例',
  `divide_amount` decimal(12,4) DEFAULT NULL COMMENT '分成金额',
  `partner_memo` varchar(2000) DEFAULT NULL COMMENT '备注',
  `isactive` char(1) DEFAULT NULL COMMENT '删除状态',
  `createby` varchar(36) DEFAULT NULL COMMENT '创建人',
  `createdate` datetime DEFAULT NULL COMMENT '创建日期',
  `updateby` varchar(36) DEFAULT NULL COMMENT '更新人',
  `updatedate` datetime DEFAULT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='开发商合作媒体分成明细';

--
-- 转存表中的数据 `t_prj_partner_splitdetail`
--

INSERT INTO `t_prj_partner_splitdetail` (`pd_id`, `sp_id`, `partner_type`, `partner_name`, `divide`, `divide_amount`, `partner_memo`, `isactive`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES
('546826171859968', '546826172089344', '528584156513310', '222', 11, 111.0000, '11', '1', '528584156513289', '2015-06-03 16:07:00', NULL, NULL),
('546833484366848', '546833484530688', '528584156513310', '123', 21, 12.0000, '312', '1', '528584156513289', '2015-06-03 16:14:00', NULL, NULL),
('546833484366848', '546833484563456', '528584156529664', '3', 23, 31212.0000, '312', '1', '528584156513289', '2015-06-03 16:14:00', NULL, NULL),
('547866872284160', '547866872742912', '528584156513310', '111', 11, 222.0000, '22', '1', '528584156513292', '2015-06-04 09:45:00', '528584156513292', '2015-06-04 09:46:00'),
('547866872284160', '547866872808448', '528584156529664', '222', 22, 1121.0000, '111', '1', '528584156513292', '2015-06-04 09:45:00', '528584156513292', '2015-06-04 09:46:00'),
('547899342210048', '547899342226432', '528584156513310', '111', 15, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:18:00', NULL, NULL),
('547899342210048', '547899342291968', '528584156513310', '222', 15, 25.0000, '222', '1', '528584156513292', '2015-06-04 10:18:00', NULL, NULL),
('547899342210048', '547899342324736', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:18:00', NULL, NULL),
('547899342210048', '547899342357504', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:18:00', NULL, NULL),
('547900212462592', '547900212511744', '528584156513310', '111', 15, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:19:00', NULL, NULL),
('547900212462592', '547900212560896', '528584156513310', '222', 15, 25.0000, '222', '1', '528584156513292', '2015-06-04 10:19:00', NULL, NULL),
('547900212462592', '547900212593664', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:19:00', NULL, NULL),
('547900212462592', '547900212626432', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:19:00', NULL, NULL),
('547900749661184', '547900749693952', '528584156513310', '111', 15, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:20:00', NULL, NULL),
('547900749661184', '547900749743104', '528584156513310', '222', 15, 25.0000, '222', '1', '528584156513292', '2015-06-04 10:20:00', NULL, NULL),
('547900749661184', '547900749775872', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:20:00', NULL, NULL),
('547900749661184', '547900749808640', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:20:00', NULL, NULL),
('547902487200768', '547902487233536', '528584156513310', '111', 15, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:21:00', NULL, NULL),
('547902487200768', '547902487282688', '528584156513310', '222', 15, 25.0000, '222', '1', '528584156513292', '2015-06-04 10:21:00', NULL, NULL),
('547902487200768', '547902487315456', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:21:00', NULL, NULL),
('547902487200768', '547902487348224', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:21:00', NULL, NULL),
('547902820385792', '547902820418560', '528584156513310', '111', 15, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:22:00', NULL, NULL),
('547902820385792', '547902820484096', '528584156513310', '222', 15, 25.0000, '222', '1', '528584156513292', '2015-06-04 10:22:00', NULL, NULL),
('547902820385792', '547902820516864', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:22:00', NULL, NULL),
('547902820385792', '547902820549632', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:22:00', NULL, NULL),
('547903247582208', '547903247598592', '528584156513310', '111', 151, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:22:00', NULL, NULL),
('547903247582208', '547903247664128', '528584156513310', '222', 15, 25.0000, '222', '1', '528584156513292', '2015-06-04 10:22:00', NULL, NULL),
('547903247582208', '547903247696896', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:22:00', NULL, NULL),
('547903247582208', '547903247713280', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:22:00', NULL, NULL),
('547903636358144', '547903636390912', '528584156513310', '111', 151, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903636358144', '547903636456448', '528584156513310', '222', 15, 25.0000, '222', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903636358144', '547903636489216', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903636358144', '547903636521984', '528584156529664', 'ss', 201, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903769707520', '547903769723904', '528584156513310', '111', 151, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903769707520', '547903769773056', '528584156513310', '222', 15, 25.0000, '222', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903769707520', '547903769805824', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903769707520', '547903769838592', '528584156529664', 'ss', 201, 351.0000, '444', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903999411200', '547903999427584', '528584156513310', '111', 151, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903999411200', '547903999525888', '528584156513310', '222', 15, 251.0000, '222', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903999411200', '547903999558656', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547903999411200', '547903999575040', '528584156529664', 'ss', 201, 351.0000, '444', '1', '528584156513292', '2015-06-04 10:23:00', NULL, NULL),
('547906433238016', '547906433270784', '528584156513310', '111', 22, 25.0000, '111', '1', '528584156513292', '2015-06-04 10:25:00', '528584156513292', '2015-06-04 10:26:00'),
('547906433238016', '547906433319936', '528584156513310', '222', 15, 251.0000, '222', '1', '528584156513292', '2015-06-04 10:25:00', '528584156513292', '2015-06-04 10:26:00'),
('547906433238016', '547906433352704', '528584156529664', 'ss', 20, 35.0000, '444', '1', '528584156513292', '2015-06-04 10:25:00', '528584156513292', '2015-06-04 10:26:00'),
('547906433238016', '547906433369088', '528584156529664', 'ss', 2, 351.0000, '444', '1', '528584156513292', '2015-06-04 10:25:00', '528584156513292', '2015-06-04 10:26:00'),
('547932633695232', '547932633711616', '528584156513310', '1', 2, 3.0000, '4', '1', '528584156513292', '2015-06-04 10:52:00', '528584156513292', '2015-06-04 11:17:00'),
('547932633695232', '547932633760768', '528584156529664', '5', 6, 7.0000, '8', '1', '528584156513292', '2015-06-04 10:52:00', '528584156513292', '2015-06-04 11:17:00'),
('547954332091392', '547954332107776', '528584156513310', '11', 11, 11.0000, '121122', '1', '528584156513292', '2015-06-04 11:14:00', NULL, NULL),
('547954332091392', '547954332189696', '528584156529664', '22', 22, 22.0000, '222', '1', '528584156513292', '2015-06-04 11:14:00', NULL, NULL),
('547955327206400', '547955327222784', '528584156513310', '1', 2, 3.0000, '121122', '1', '528584156513292', '2015-06-04 11:15:00', '528584156513292', '2015-06-04 11:17:00'),
('547955327206400', '547955327304704', '528584156529664', '4', 5, 6.0000, '222', '1', '528584156513292', '2015-06-04 11:15:00', '528584156513292', '2015-06-04 11:17:00'),
('547932633695232', '547957070578688', '528584156513310', '1q', 18, 13.0000, '3', '1', '528584156513292', '2015-06-04 11:17:00', NULL, NULL),
('547955327206400', '547957530215424', '528584156529664', '11', 11, 11.0000, '11', '1', '528584156513292', '2015-06-04 11:17:00', NULL, NULL),
('547959659267072', '547959659283456', '528584156513310', '1', 2, 3.0000, '4', '1', '528584156513292', '2015-06-04 11:20:00', '528584156513292', '2015-06-04 11:25:00'),
('548054081258496', '548054081291264', '528584156513310', 'wqw', 1, 21.0000, '21', '1', '528584156513292', '2015-06-04 12:56:00', NULL, NULL),
('548054081258496', '548054081586176', '528584156529664', 'eqw', 2, 2121.0000, '21', '1', '528584156513292', '2015-06-04 12:56:00', NULL, NULL),
('548067144434688', '548067144467456', '528584156513310', '11', 1, 11.0000, '11', '1', '528584156513292', '2015-06-04 13:09:00', NULL, NULL),
('548067144434688', '548067144664064', '528584156529664', '22', 22, 22.0000, '22', '1', '528584156513292', '2015-06-04 13:09:00', NULL, NULL),
('548095202182144', '548095202231296', '528584156513310', '111', 11, 11.0000, '11', '1', '528584156513292', '2015-06-04 13:37:00', NULL, NULL),
('548095202182144', '548095202608128', '528584156529664', '22', 22, 22.0000, '22', '1', '528584156513292', '2015-06-04 13:37:00', NULL, NULL),
('548096440779776', '548096440812544', '528584156513310', '222', 1, 1.0000, '1', '1', '528584156513292', '2015-06-04 13:39:00', NULL, NULL),
('548096440779776', '548096440861696', '528584156529664', '111', 2, 2.0000, '2', '1', '528584156513292', '2015-06-04 13:39:00', NULL, NULL),
('548097751335936', '548097751368704', '528584156513310', '222', 22, 22.0000, '22', '1', '528584156513292', '2015-06-04 13:40:00', NULL, NULL),
('548097751335936', '548097751450624', '528584156529664', '11', 1, 11.0000, '11', '1', '528584156513292', '2015-06-04 13:40:00', NULL, NULL),
('548098904933376', '548098904982528', '528584156513310', '111', 2, 1.0000, '2', '1', '528584156513292', '2015-06-04 13:41:00', NULL, NULL),
('548098904933376', '548098905064448', '528584156529664', '1', 2, 1.0000, '2', '1', '528584156513292', '2015-06-04 13:41:00', NULL, NULL),
('548132342268928', '548132342318080', '528584156513310', '11', 22, 111.0000, '11', '1', '528584156513292', '2015-06-04 14:15:00', NULL, NULL),
('548132342268928', '548132342580224', '528584156529664', '11', 11, 22.0000, '22', '1', '528584156513292', '2015-06-04 14:15:00', NULL, NULL),
('549596597240832', '549596597421056', '528584156513310', '11', 1, 11.0000, '11', '1', '528584156513292', '2015-06-05 15:05:00', '528584156513292', '2015-06-05 15:17:00'),
('549596597240832', '549596598010880', '528584156529664', '22', 2, 22.0000, '22', '1', '528584156513292', '2015-06-05 15:05:00', '528584156513292', '2015-06-05 15:17:00'),
('549609815458816', '549609815491584', '528584156513310', '22', 11, 2.0000, '1', '1', '528584156513292', '2015-06-05 15:18:00', '528584156513292', '2015-06-05 15:19:00'),
('549609815458816', '549609815606272', '528584156529664', '1', 2, 1.0000, '2', '1', '528584156513292', '2015-06-05 15:18:00', '528584156513292', '2015-06-05 15:19:00'),
('549776921494528', '549776921871360', '528584156513310', '11', 13, 11.0000, '11', '1', '528584156513292', '2015-06-05 18:08:00', NULL, NULL),
('549776921494528', '549776921904128', '528584156529664', '22', 2, 22.0000, '22', '1', '528584156513292', '2015-06-05 18:08:00', NULL, NULL),
('552761284101120', '552761284150272', '528584156513310', '33', 33, 33.0000, '33', '1', '528584156513292', '2015-06-07 20:44:00', NULL, NULL),
('553038436746240', '553038436779008', '528584156529664', '33', 3, 32.0000, '222', '1', '528584156513292', '2015-06-08 01:26:00', NULL, NULL),
('553038436746240', '553038436860928', '528584156513310', '3', 2, 3.0000, '3', '1', '528584156513292', '2015-06-08 01:26:00', NULL, NULL),
('553045288977408', '553045289010176', '528584156513310', '11', 2, 1.0000, '2', '1', '528584156513292', '2015-06-08 01:33:00', NULL, NULL),
('553045288977408', '553045289075712', '528584156529664', '1', 2, 1.0000, '2', '1', '528584156513292', '2015-06-08 01:33:00', NULL, NULL),
('553045738587136', '553045738619904', '528584156513310', '2', 2, 2.0000, '2', '1', '528584156513292', '2015-06-08 01:33:00', NULL, NULL),
('553045738587136', '553045738685440', '528584156529664', '1', 1, 1.0000, '1', '1', '528584156513292', '2015-06-08 01:33:00', NULL, NULL),
('555826835129344', '555826835194880', '528584156513310', '11', 2, 1.0000, '2', '1', '528584156513292', '2015-06-10 00:43:00', NULL, NULL),
('555826835129344', '555826835276800', '528584156529664', '1', 2, 1.0000, '2', '1', '528584156513292', '2015-06-10 00:43:00', NULL, NULL),
('555866763609088', '555866763641856', '528584156513310', '12', 1, 12.0000, '12', '1', '528584156513292', '2015-06-10 01:23:00', NULL, NULL),
('555866763609088', '555866763740160', '528584156529664', '333', 2, 33.0000, '31', '1', '528584156513292', '2015-06-10 01:23:00', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_transaction`
--

CREATE TABLE IF NOT EXISTS `t_transaction` (
  `transaction_id` varchar(36) NOT NULL COMMENT '审批id',
  `node_id` varchar(36) DEFAULT NULL COMMENT 'id',
  `bill_type` varchar(200) DEFAULT NULL COMMENT '单据类型',
  `bill_id` varchar(36) DEFAULT NULL COMMENT '单据id',
  `approver_id` varchar(36) DEFAULT NULL COMMENT '目标审批人id',
  `approval_date` date DEFAULT NULL COMMENT '审批日期',
  `content` varchar(2000) DEFAULT NULL COMMENT '审批说明',
  `estate` varchar(10) DEFAULT NULL COMMENT '审批状态',
  `isactive` char(1) DEFAULT NULL COMMENT '是否失效',
  `approval_type` varchar(50) DEFAULT NULL COMMENT '审批类型（同意、驳回）',
  `currently` int(11) NOT NULL COMMENT '状态（1-最后节点 0-过去节点）',
  `file_id` varchar(36) NOT NULL COMMENT '附件id',
  `createby` varchar(36) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `updateby` varchar(36) DEFAULT NULL,
  `updatedate` date DEFAULT NULL,
  `attribute2` varchar(200) DEFAULT NULL,
  `attribute3` varchar(200) DEFAULT NULL,
  `attribute4` varchar(200) DEFAULT NULL,
  `attribute5` varchar(200) DEFAULT NULL,
  `attribute1` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `t_workflow_all`
--

CREATE TABLE IF NOT EXISTS `t_workflow_all` (
  `workflow_id` varchar(36) NOT NULL COMMENT '工作流id',
  `workflow_name` varchar(200) DEFAULT NULL COMMENT '工作流名称',
  `workflow_code` varchar(200) DEFAULT NULL COMMENT '工作流编号',
  `description` varchar(400) DEFAULT NULL,
  `disabled` char(1) DEFAULT NULL COMMENT '是否失效',
  `disable_date` date DEFAULT NULL COMMENT '失效日期',
  `enable_date` date DEFAULT NULL COMMENT '启用日期',
  `createby` varchar(36) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `updateby` varchar(36) DEFAULT NULL,
  `updatedate` date DEFAULT NULL,
  `attribute1` varchar(200) DEFAULT NULL,
  `attribute2` varchar(200) DEFAULT NULL,
  `attribute3` varchar(200) DEFAULT NULL,
  `attribute4` varchar(200) DEFAULT NULL,
  `attribute5` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_workflow_all`
--

INSERT INTO `t_workflow_all` (`workflow_id`, `workflow_name`, `workflow_code`, `description`, `disabled`, `disable_date`, `enable_date`, `createby`, `createdate`, `updateby`, `updatedate`, `attribute1`, `attribute2`, `attribute3`, `attribute4`, `attribute5`) VALUES
('528584156529685', '评估单审批流程', 'evaluationSheet', '无', '0', '2099-10-12', '2001-10-06', '528584156513292', '2015-06-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `t_workflow_node`
--

CREATE TABLE IF NOT EXISTS `t_workflow_node` (
  `workflow_code` varchar(36) DEFAULT NULL COMMENT '工作流code',
  `node_id` varchar(36) NOT NULL COMMENT '节点id',
  `node_name` varchar(200) DEFAULT NULL COMMENT '节点名称',
  `node_code` varchar(200) DEFAULT NULL COMMENT '节点编号',
  `node_type` enum('start','end','approve','normal') DEFAULT NULL COMMENT '节点类型(开始节点，结束节点，审批节点，标准节点)',
  `previous_node_id` varchar(36) DEFAULT NULL COMMENT '上一个节点',
  `next_node_id` varchar(36) DEFAULT NULL COMMENT '下一个节点',
  `rejected_node_id` varchar(36) DEFAULT NULL COMMENT '驳回节点',
  `purview_type` varchar(50) DEFAULT NULL COMMENT '权限范围类型(角色、人员、自定义、大部门、中部门、小部门)',
  `description` varchar(2000) DEFAULT NULL COMMENT '说明',
  `attribute1` varchar(200) DEFAULT NULL,
  `attribute2` varchar(200) DEFAULT NULL,
  `attribute3` varchar(200) DEFAULT NULL,
  `attribute4` varchar(200) DEFAULT NULL,
  `attribute5` varchar(200) DEFAULT NULL,
  `disabled` char(1) DEFAULT NULL COMMENT '是否失效',
  `enable_date` date DEFAULT NULL COMMENT '启用日期',
  `disable_date` date DEFAULT NULL COMMENT '失效日期',
  `createby` varchar(36) DEFAULT NULL,
  `createdate` date DEFAULT NULL,
  `updateby` varchar(36) DEFAULT NULL,
  `updatedate` date DEFAULT NULL,
  `approval_type` enum('zx','cx','bx','hq') DEFAULT NULL COMMENT '知晓，并行，会签，串行',
  `overrule` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `t_workflow_node`
--

INSERT INTO `t_workflow_node` (`workflow_code`, `node_id`, `node_name`, `node_code`, `node_type`, `previous_node_id`, `next_node_id`, `rejected_node_id`, `purview_type`, `description`, `attribute1`, `attribute2`, `attribute3`, `attribute4`, `attribute5`, `disabled`, `enable_date`, `disable_date`, `createby`, `createdate`, `updateby`, `updatedate`, `approval_type`, `overrule`) VALUES
('evaluationSheet', '528584156529688', '新建', 'create', 'start', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2000-06-01', '2099-06-11', '528584156513292', '2015-06-09', NULL, NULL, NULL, NULL),
('evaluationSheet', '528584156529689', '提交', 'commit', 'normal', '528584156529688', NULL, '528584156529686', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2000-06-01', '2099-06-11', '528584156513292', '2015-06-09', NULL, NULL, NULL, NULL),
('evaluationSheet', '528584156529691', '电商审批', 'commerce', 'approve', '528584156529689', NULL, '528584156529686', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2000-06-01', '2099-06-11', '528584156513292', '2015-06-09', NULL, NULL, NULL, NULL),
('evaluationSheet', '528584156529692', '首代审批', 'delegate', 'approve', '528584156529691', NULL, '528584156529686', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2000-06-01', '2099-06-11', '528584156513292', '2015-06-09', NULL, NULL, NULL, NULL),
('evaluationSheet', '528584156529693', '财务审批', 'finance', 'approve', '528584156529692', NULL, '528584156529686', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2000-06-01', '2099-06-11', '528584156513292', '2015-06-09', NULL, NULL, NULL, NULL),
('evaluationSheet', '528584156529695', '审批通过', 'approval', 'end', '528584156529693', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2000-06-01', '2099-06-11', '528584156513292', '2015-06-09', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` varchar(36) NOT NULL COMMENT 'u_id',
  `password` varchar(38) NOT NULL,
  `name` varchar(36) NOT NULL,
  `employee_number` varchar(36) NOT NULL COMMENT '员工编号',
  `email` varchar(65) NOT NULL COMMENT '邮箱',
  `roles` varchar(255) NOT NULL COMMENT '用户角色',
  `isactive` char(1) NOT NULL COMMENT '是否删除',
  `createby` varchar(36) NOT NULL COMMENT '创建人',
  `createdate` datetime NOT NULL COMMENT '创建日期',
  `updateby` varchar(36) NOT NULL COMMENT '更新人',
  `updatedate` datetime NOT NULL COMMENT '更新日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`u_id`, `password`, `name`, `employee_number`, `email`, `roles`, `isactive`, `createby`, `createdate`, `updateby`, `updatedate`) VALUES
('528584156496924', '202cb962ac59075b964b07152d234b70', '李建超', '528584156496924', 'aaaaaaaaaaaas@aa.asda', '|528584156496924|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513280', '202cb962ac59075b964b07152d234b70', '李', '528584156513280', 'adsdads@aa.asda', '|528584156496924|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513282', '202cb962ac59075b964b07152d234b70', '李超建', '528584156513282', 'dddddddddddddddds@aa.asda', '|528584156496924|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513283', '202cb962ac59075b964b07152d234b70', '李超', '528584156513283', 'asdasdasddds@aa.asda', '|528584156496924|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513284', '202cb962ac59075b964b07152d234b70', '李霁川', '528584156513284', 'qqq@aa.asda', '|528584156496925|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513285', '202cb962ac59075b964b07152d234b70', '李川', '528584156513285', 'qqq@aa.asda', '|528584156496925|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513286', '202cb962ac59075b964b07152d234b70', '霁', '528584156513286', 'qqeeeeq@aa.asda', '|528584156496925|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513287', '202cb962ac59075b964b07152d234b70', '川李', '528584156513287', 'qqqwwww@aa.asda', '|528584156496925|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513288', '202cb962ac59075b964b07152d234b70', '霁川', '528584156513288', 'qffffq@aa.asda', '|528584156496925|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513289', '202cb962ac59075b964b07152d234b70', 'admin2', '528584156513289', 'a', '|528584156496925|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00'),
('528584156513292', '202cb962ac59075b964b07152d234b70', 'admin', '528584156513292', 'test@sohu.com', '|528584156496925|', '0', '528584156513292', '2015-05-20 00:00:00', '528584156513292', '2015-05-12 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `dict_chengshi`
--
ALTER TABLE `dict_chengshi`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `sys_approval_all`
--
ALTER TABLE `sys_approval_all`
  ADD PRIMARY KEY (`approval_id`);

--
-- Indexes for table `sys_dict`
--
ALTER TABLE `sys_dict`
  ADD PRIMARY KEY (`dict_id`);

--
-- Indexes for table `sys_transaction`
--
ALTER TABLE `sys_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `t_evaform_payment`
--
ALTER TABLE `t_evaform_payment`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `t_file`
--
ALTER TABLE `t_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_file_group`
--
ALTER TABLE `t_file_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_houses_prj`
--
ALTER TABLE `t_houses_prj`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `t_outlineoutdetail`
--
ALTER TABLE `t_outlineoutdetail`
  ADD PRIMARY KEY (`outl_id`);

--
-- Indexes for table `t_pdetail`
--
ALTER TABLE `t_pdetail`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `t_permission_access`
--
ALTER TABLE `t_permission_access`
  ADD PRIMARY KEY (`prmid`);

--
-- Indexes for table `t_permission_access_log`
--
ALTER TABLE `t_permission_access_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_presappl`
--
ALTER TABLE `t_presappl`
  ADD PRIMARY KEY (`ra_id`);

--
-- Indexes for table `t_prform_by_eva`
--
ALTER TABLE `t_prform_by_eva`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `t_prjexeitems`
--
ALTER TABLE `t_prjexeitems`
  ADD PRIMARY KEY (`es_id`);

--
-- Indexes for table `t_prjstatusitems`
--
ALTER TABLE `t_prjstatusitems`
  ADD PRIMARY KEY (`pst_id`);

--
-- Indexes for table `t_prj_adjust_detail`
--
ALTER TABLE `t_prj_adjust_detail`
  ADD PRIMARY KEY (`pad_id`);

--
-- Indexes for table `t_prj_adjust_items`
--
ALTER TABLE `t_prj_adjust_items`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `t_prj_evaluationforms`
--
ALTER TABLE `t_prj_evaluationforms`
  ADD PRIMARY KEY (`eva_id`);

--
-- Indexes for table `t_prj_partner_splitdetail`
--
ALTER TABLE `t_prj_partner_splitdetail`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `t_transaction`
--
ALTER TABLE `t_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `t_workflow_all`
--
ALTER TABLE `t_workflow_all`
  ADD PRIMARY KEY (`workflow_id`);

--
-- Indexes for table `t_workflow_node`
--
ALTER TABLE `t_workflow_node`
  ADD PRIMARY KEY (`node_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_file`
--
ALTER TABLE `t_file`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '上传文件ID';
--
-- AUTO_INCREMENT for table `t_file_group`
--
ALTER TABLE `t_file_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '上传文件组ID',AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
