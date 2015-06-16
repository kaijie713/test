ALTER TABLE `t_evaform_payment` CHANGE `ad_discount` `ad_discount` DECIMAL(16,2) NULL DEFAULT NULL COMMENT '广告折扣';
ALTER TABLE `t_evaform_payment` CHANGE `ad_distribution_ratio` `ad_distribution_ratio` DECIMAL(16,2) NULL DEFAULT NULL COMMENT '广告配送比';
ALTER TABLE `t_evaform_payment` CHANGE `ad_markting_ratio` `ad_markting_ratio` DECIMAL(16,2) NULL DEFAULT NULL COMMENT '营销费用比例';
ALTER TABLE `t_permission_access` ADD `content` VARCHAR(2000) NOT NULL COMMENT '备注' AFTER `u_id`;
delete  approval




























