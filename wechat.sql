INSERT INTO `wst_styles`(styleSys,styleName,styleAuthor,styleShopSite,styleShopId,stylePath,isUse)
 VALUES ('wechat', '默认模板', 'WSTMart', '', '1', 'default', '1');



INSERT INTO `wst_ad_positions`(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) VALUES 
('2', '微信版首页轮播广告', '375', '188', '1', 'wx-ads-index', '1000'),
('2', '微信版首页中间大广告', '171', '96', '1', 'wx-index-large', '1001'),
('2', '微信版首页中间小广告', '87', '110', '1', 'wx-index-small', '1002'),
('2', '微信版首页分层1F顶部广告', '375', '60', '1', 'wx-ads-0', '1010'),
('2', '微信版首页分层2F顶部广告', '375', '60', '1', 'wx-ads-1', '1011'),
('2', '微信版首页分层3F顶部广告', '375', '60', '1', 'wx-ads-2', '1012'),
('2', '微信版首页分层4F顶部广告', '375', '60', '1', 'wx-ads-3', '1013'),
('2', '微信版首页分层5F顶部广告', '375', '60', '1', 'wx-ads-4', '1014'),
('2', '微信版首页分层6F顶部广告', '375', '60', '1', 'wx-ads-5', '1015'),
('2', '微信版首页分层7F顶部广告', '375', '60', '1', 'wx-ads-6', '1016'),
('2', '微信版首页分层8F顶部广告', '375', '60', '1', 'wx-ads-7', '1017'),
('2', '微信版首页分层9F顶部广告', '375', '60', '1', 'wx-ads-8', '1018'),
('2', '微信版首页分层10F顶部广告', '375', '60', '1', 'wx-ads-9', '1019'),
('2', '微信版店铺街广告', '87', '110', '1', 'wx-ads-street', '1020');

INSERT INTO `wst_datas`(catId,dataName,dataVal,dataSort) VALUES ('5', '微信版', '2', '0');

alter table wst_users add column wxOpenId char(100);
alter table wst_users add column wxUnionId char(100);

insert into wst_sys_configs(fieldName,fieldCode,fieldValue,fieldType) values('微信验证代码','wxAppCode','',1);
INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('66', '0', '微信', '5', '1');
INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('67', '66', '基础设置', '0', '1');
INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('68', '67', '公众号设置', '0', '1');
INSERT INTO `wst_privileges` VALUES ('182', '66', 'WX_WXGL_00', '查看微信', '0', '', '', '1','1');
INSERT INTO `wst_privileges` VALUES ('183', '67', 'WX_JCSZ_00', '查看基础设置', '0', '', '', '1','1');
INSERT INTO `wst_privileges` VALUES ('184', '68', 'WX_GZHSZ_00', '查看公众号设置', '1', 'admin/wsysconfigs/index', '', '1','1');
INSERT INTO `wst_privileges` VALUES ('185', '68', 'WX_GZHSZ_04', '编辑公众号', '0', 'admin/wsysconfigs/edit', '', '1','1');


INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('69', '67', '自定义菜单', '1', '1');

DROP TABLE IF EXISTS `wst_wx_menus`;
CREATE TABLE `wst_wx_menus` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(50) NOT NULL,
  `menuKey` varchar(255) DEFAULT NULL,
  `menuUrl` varchar(255) DEFAULT NULL,
  `materialId` int(11) DEFAULT '0',
  `parentId` int(11) NOT NULL DEFAULT '0',
  `menuType` tinyint(4) DEFAULT '0',
  `menuSort` int(11) NOT NULL DEFAULT '0',
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1',
  `createTime` datetime NOT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wst_privileges` VALUES ('186', '69', 'WX_ZDYCD_00', '查看自定义菜单', '1', 'admin/wxmenus/index', 'admin/wxmenus/pageQuery,admin/wxmenus/synchroWx,admin/wxmenus/synchroAd', '1','1');
INSERT INTO `wst_privileges` VALUES ('187', '69', 'WX_ZDYCD_02', '编辑菜单', '0', 'admin/wxmenus/toEdit', 'admin/wxmenus/edit', '1','1');
INSERT INTO `wst_privileges` VALUES ('188', '69', 'WX_ZDYCD_03', '删除菜单', '0', 'admin/wxmenus/del', '', '1','1');
INSERT INTO `wst_privileges` VALUES ('189', '69', 'WX_ZDYCD_01', '新增菜单', '0', 'admin/wxmenus/toEdit', 'admin/wxmenus/add', '1','1');


DROP TABLE IF EXISTS `wst_wx_passive_replys`;
CREATE TABLE `wst_wx_passive_replys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL COMMENT '描述',
  `picUrl` varchar(150) DEFAULT NULL COMMENT '封面图片',
  `url` varchar(150) DEFAULT NULL COMMENT '图文链接',
  `msgType` varchar(20) DEFAULT NULL COMMENT '回复的类型 文本:text 图文:news',
  `content` text COMMENT '回复的内容',
  `createTime` datetime DEFAULT NULL,
  `dataFlag` int(11) DEFAULT '1',
  `keyword` varchar(30) DEFAULT NULL COMMENT '关键字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('70', '67', '主动回复文本消息', '3', '1');
INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('79', '67', '主动回复图文消息', '4', '1');

INSERT INTO `wst_privileges` VALUES ('198', '70', 'WX_WBXX_01', '新增文本消息', '0', 'admin/wxpassivereplys/textEdit', 'admin/wxpassivereplys/add', '1', '1');
INSERT INTO `wst_privileges` VALUES ('199', '70', 'WX_WBXX_00', '查看文本消息', '1', 'admin/wxpassivereplys/text', 'admin/wxpassivereplys/textPageQuery', '1', '1');
INSERT INTO `wst_privileges` VALUES ('200', '70', 'WX_WBXX_02', '编辑文本消息', '0', 'admin/wxpassivereplys/textEdit', 'admin/wxpassivereplys/edit', '1', '1');
INSERT INTO `wst_privileges` VALUES ('201', '70', 'WX_WBXX_03', '删除文本消息', '0', 'admin/wxpassivereplys/del', '', '1', '1');
INSERT INTO `wst_privileges` VALUES ('202', '79', 'WX_TWXX_00', '查看图文消息', '1', 'admin/wxpassivereplys/news', 'admin/wxpassivereplys/newsPageQuery', '1', '1');
INSERT INTO `wst_privileges` VALUES ('203', '79', 'WX_TWXX_01', '新增图文消息', '0', 'admin/wxpassivereplys/newsEdit', 'admin/wxpassivereplys/add', '1', '1');
INSERT INTO `wst_privileges` VALUES ('204', '79', 'WX_TWXX_02', '修改图文消息', '0', 'admin/wxpassivereplys/newsEdit', 'admin/wxpassivereplys/edit', '1', '1');
INSERT INTO `wst_privileges` VALUES ('205', '79', 'WX_TWXX_03', '删除图文消息', '0', 'admin/wxpassivereplys/del', '', '1', '1');


INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('80', '67', '用户管理', '2', '1');

DROP TABLE IF EXISTS `wst_wx_users`;
CREATE TABLE `wst_wx_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) NOT NULL,
  `userSex` tinyint(4) DEFAULT '0',
  `userAreas` varchar(150) NOT NULL,
  `userPhoto` varchar(150) DEFAULT NULL,
  `subscribeTime` datetime NOT NULL,
  `userRemark` varchar(100) DEFAULT NULL,
  `groupId` int(11) DEFAULT '0',
  `openId` char(100) DEFAULT NULL,
  `userFill` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `wst_privileges` VALUES ('206', '80', 'WX_YHGL_00', '查看用户管理', '1', 'admin/wxusers/index', '', '1','1');
INSERT INTO `wst_privileges` VALUES ('207', '80', 'WX_YHGL_02', '编辑用户备注', '0', '', '', '1','1');
insert into wst_datas(catId,dataName,dataVal,dataSort) values(3,'微信自动回复','wechat',0);

update wst_sys_configs set fieldValue='_m' where fieldCode='wstMobileImgSuffix';

INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('87', '67', '微信消息模板', '6', '1');
INSERT INTO `wst_privileges` VALUES ('222', '87', 'WX_XXMB_00', '查看微信消息模板', '1', 'admin/wxtemplatemsgs/index', 'admin/wxtemplatemsgs/pageQuery', '1', '1');
INSERT INTO `wst_privileges` VALUES ('223', '87', 'WX_XXMB_02', '编辑微信消息模板', '0', 'admin/wxtemplatemsgs/edit', 'admin/wxtemplatemsgs/toEdit', '1', '1');

insert into wst_data_cats(catId,catName,catCode) values('9','微信消息模板','TEMPLATE_WX'); 
insert into wst_datas(catId,dataName,dataVal) values(9,'用户订单失效提醒信息','WX_ORDER_USER_PAY_TIMEOUT');
insert into wst_datas(catId,dataName,dataVal) values(9,'商家订单失效提醒信息','WX_ORDER_SHOP_PAY_TIMEOUT');
insert into wst_datas(catId,dataName,dataVal) values(9,'新订单提醒信息','WX_ORDER_SUBMIT'); 
insert into wst_datas(catId,dataName,dataVal) values(9,'新订单付款信息','WX_ORDER_PAY'); 
insert into wst_datas(catId,dataName,dataVal) values(9,'订单取消提醒信息','WX_ORDER_CANCEL');
insert into wst_datas(catId,dataName,dataVal) values(9,'订单已发货提醒信息','WX_ORDER_DELIVERY');
insert into wst_datas(catId,dataName,dataVal) values(9,'订单提醒发货信息','WX_ORDER_REMINDER');
insert into wst_datas(catId,dataName,dataVal) values(9,'订单拒收提醒信息','WX_ORDER_REJECT');
insert into wst_datas(catId,dataName,dataVal) values(9,'订单已收货提醒信息','WX_ORDER_RECEIVE');
insert into wst_datas(catId,dataName,dataVal) values(9,'申请退款提醒信息','WX_ORDER_REFUND_CONFER');
insert into wst_datas(catId,dataName,dataVal) values(9,'退款成功提醒信息','WX_ORDER_REFUND_SUCCESS');
insert into wst_datas(catId,dataName,dataVal) values(9,'退款失败提醒信息','WX_ORDER_REFUND_FAIL');
insert into wst_datas(catId,dataName,dataVal) values(9,'商家订单补偿提醒信息','WX_ORDER_SHOP_REFUND');
insert into wst_datas(catId,dataName,dataVal) values(9,'提现成功提醒信息','WX_CASH_DRAW_SUCCESS');
insert into wst_datas(catId,dataName,dataVal) values(9,'提现失败提醒信息','WX_CASH_DRAW_FAIL');
insert into wst_datas(catId,dataName,dataVal) values(9,'开店成功提醒','WX_SHOP_OPEN_SUCCESS');
insert into wst_datas(catId,dataName,dataVal) values(9,'开店失败提醒','WX_SHOP_OPEN_FAIL');
insert into wst_datas(catId,dataName,dataVal) values(9,'商品审核通过','WX_GOODS_ALLOW'); 
insert into wst_datas(catId,dataName,dataVal) values(9,'商品审核不通过','WX_GOODS_REJECT'); 

DROP TABLE IF EXISTS `wst_wx_template_params`;
CREATE TABLE `wst_wx_template_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) NOT NULL,
  `fieldCode` varchar(50) NOT NULL,
  `fieldVal` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `wst_template_msgs`(`tplType`,`tplCode`,`tplExternaId`,`tplContent`,`isEnbale`,`tplDesc`,`dataFlag`) 
VALUES ('3', 'WX_ORDER_USER_PAY_TIMEOUT', '', '{{first.DATA}}\n订单号：{{keyword1.DATA}}\n失效原因：{{keyword2.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_SHOP_PAY_TIMEOUT', '', '{{first.DATA}}\n订单号：{{keyword1.DATA}}\n失效原因：{{keyword2.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_SUBMIT', '', '{{first.DATA}}\n订单编号：{{keyword1.DATA}}\n订单商品：{{keyword2.DATA}}\n订单金额：{{keyword3.DATA}}\n交易方式：{{keyword4.DATA}}\n会员信息：{{keyword5.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${ORDER_TIME}：下单时间。${GOODS}：订单商品。${MONEY}：订单金额。${ADDRESS}：送货地址。${PAY_TYPE}：支付方式。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_PAY', '', '{{first.DATA}}\n订单号：{{keyword1.DATA}}\n支付时间：{{keyword2.DATA}}\n支付金额：{{keyword3.DATA}}\n支付方式：{{keyword4.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${PAY_TIME}：支付时间。${PAY_SRC}：支付方式。${MONEY}：支付金额。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_CANCEL', '', '{{first.DATA}}\n订单编号：{{keyword1.DATA}}\n商品详情：{{keyword2.DATA}}\n订单金额：{{keyword3.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${REASON} ：取消原因。${GOODS}：商品详情。${MONEY}：订单金额。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_DELIVERY', '', '{{first.DATA}}\n订单编号：{{keyword1.DATA}}\n物流公司：{{keyword2.DATA}}\n物流单号：{{keyword3.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${EXPRESS}：快递公司。${EXPRESS_NO}：快递号。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_REMINDER', null, '', '1', '1.变量说明：${ORDER_NO}：订单号。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_REJECT', '', '{{first.DATA}}\n订单金额：{{keyword1.DATA}}\n商品详情：{{keyword2.DATA}}\n收货信息：{{keyword3.DATA}}\n订单编号：{{keyword4.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${GOODS}：商品信息。${ADDRESS}：收货地址。${MONEY}：订单金额。${REASON}：拒收原因。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_RECEIVE', '', '{{first.DATA}}\n商品编号：{{keyword1.DATA}}\n收货时间：{{keyword2.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${ORDER_TIME}：收货时间。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_REFUND_CONFER', '', '{{first.DATA}}\n\n退款原因：{{reason.DATA}}\n退款金额：{{refund.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${REASON}：退款原因。${MONEY}：退款金额。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_REFUND_SUCCESS', '', '{{first.DATA}}\n\n退款原因：{{reason.DATA}}\n退款金额：{{refund.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${REASON}：退款备注。${MONEY}：退款金额。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_REFUND_FAIL', '', '{{first.DATA}}\n\n退款原因：{{reason.DATA}}\n退款金额：{{refund.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${REASON}：退款原因。${MONEY}：退款金额。${SHOP_REASON}：不同意原因。<br/>2.为空则不发送。', '1'),
('3', 'WX_ORDER_SHOP_REFUND', '', '{{first.DATA}}\n\n退款原因：{{reason.DATA}}\n退款金额：{{refund.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${REASON}：退款原因。${MONEY}：退款金额。${SHOP_MONEY}：补偿金额。<br/>2.为空则不发送。', '1'),
('3', 'WX_CASH_DRAW_SUCCESS', '', '{{first.DATA}}\n提现金额：{{keyword1.DATA}}\n提现方式：{{keyword2.DATA}}\n申请时间：{{keyword3.DATA}}\n审核结果：{{keyword4.DATA}}\n审核时间：{{keyword5.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${CASH_NO}：提现单号。${MONEY}：提现金额。${CASH_TYPE}：提现方式。${CASH_TIME}：申请时间。${CASH_RESULT}：提现结果。${EXAMINE_TIME}：审核时间。<br/>2.为空则不发送。', '1'),
('3', 'WX_CASH_DRAW_FAIL', '', '{{first.DATA}}\n提现金额：{{keyword1.DATA}}\n提现方式：{{keyword2.DATA}}\n申请时间：{{keyword3.DATA}}\n审核结果：{{keyword4.DATA}}\n审核时间：{{keyword5.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${CASH_NO}：提现单号。${MONEY}：提现金额。${CASH_TYPE}：提现方式。${CASH_TIME}：申请时间。${CASH_RESULT}：提现结果。${EXAMINE_TIME}：审核时间。<br/>2.为空则不发送。', '1'),
('3', 'WX_SHOP_OPEN_SUCCESS', '', '{{first.DATA}}\n店铺名称：{{keyword1.DATA}}\n审核结果：{{keyword2.DATA}}\n处理时间：{{keyword3.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${SHOP_NAME}：店铺名称。${APPLY_TIME}：申请时间。${NOW_TIME}：当前时间。<br/>2.为空则不发送。', '1'),
('3', 'WX_SHOP_OPEN_FAIL', '', '{{first.DATA}}\n店铺名称：{{keyword1.DATA}}\n审核结果：{{keyword2.DATA}}\n处理时间：{{keyword3.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${SHOP_NAME}：店铺名称。${APPLY_TIME}：申请时间。${NOW_TIME}：当前时间。${REASON} ：失败原因。<br/>2.为空则不发送。', '1');


insert into wst_sys_configs(fieldName,fieldCode,fieldValue,fieldType) values('微信公众号二维码','wxAppLogo','',1);
insert into wst_datas(catId,dataName,dataVal) values(9,'订单评价提醒','WX_ORDER_APPRAISES');
INSERT INTO `wst_template_msgs`(`tplType`,`tplCode`,`tplExternaId`,`tplContent`,`isEnbale`,`tplDesc`,`dataFlag`) 
VALUES ('3', 'WX_ORDER_APPRAISES', '', '{{first.DATA}}\n\n{{Content1.DATA}}\n商品名称：{{Good.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${GOODS}：商品名称 ${ORDER_NO}：订单号。<br/>2.为空则不发送。', '1');


INSERT INTO `wst_datas`(catId,dataName,dataVal) VALUES ('9', '管理员-用户下单', 'WX_ADMIN_ORDER_SUBMIT');
INSERT INTO `wst_datas`(catId,dataName,dataVal) VALUES ('9', '管理员-支付订单', 'WX_ADMIN_ORDER_PAY');
INSERT INTO `wst_datas`(catId,dataName,dataVal) VALUES ('9', '管理员-取消订单', 'WX_ADMIN_ORDER_CANCEL');
INSERT INTO `wst_datas`(catId,dataName,dataVal) VALUES ('9', '管理员-拒收订单', 'WX_ADMIN_ORDER_REJECT');
INSERT INTO `wst_datas`(catId,dataName,dataVal) VALUES ('9', '管理员-申请退款', 'WX_ADMIN_ORDER_REFUND');
INSERT INTO `wst_datas`(catId,dataName,dataVal) VALUES ('9', '管理员-申请提现', 'WX_ADMIN_CASH_DRAW');
INSERT INTO `wst_datas`(catId,dataName,dataVal) VALUES ('9', '管理员-用户投诉', 'WX_ADMIN_ORDER_COMPLAINT');



INSERT INTO `wst_template_msgs`(`tplType`,`tplCode`,`tplExternaId`,`tplContent`,`isEnbale`,`tplDesc`,`dataFlag`) 
VALUES ('3', 'WX_ADMIN_ORDER_SUBMIT', '', '{{first.DATA}}\n订单编号：{{keyword1.DATA}}\n订单商品：{{keyword2.DATA}}\n订单金额：{{keyword3.DATA}}\n交易方式：{{keyword4.DATA}}\n会员信息：{{keyword5.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${ORDER_TIME}：下单时间。${GOODS}：订单商品。${MONEY}：订单金额。${ADDRESS}：送货地址。${PAY_TYPE}：支付方式。<br/>2.为空则不发送。', '1'),
('3', 'WX_ADMIN_ORDER_CANCEL', '', '{{first.DATA}}\n订单编号：{{keyword1.DATA}}\n商品详情：{{keyword2.DATA}}\n订单金额：{{keyword3.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${REASON} ：取消原因。${GOODS}：商品详情。${MONEY}：订单金额。<br/>2.为空则不发送。', '1'),
('3', 'WX_ADMIN_ORDER_PAY', '', '{{first.DATA}}\n订单号：{{keyword1.DATA}}\n支付时间：{{keyword2.DATA}}\n支付金额：{{keyword3.DATA}}\n支付方式：{{keyword4.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${PAY_TIME}：支付时间。${PAY_SRC}：支付方式。${MONEY}：支付金额。<br/>2.为空则不发送。', '1'),
('3', 'WX_ADMIN_ORDER_REJECT', '', '{{first.DATA}}\n订单金额：{{keyword1.DATA}}\n商品详情：{{keyword2.DATA}}\n收货信息：{{keyword3.DATA}}\n订单编号：{{keyword4.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${GOODS}：商品信息。${ADDRESS}：收货地址。${MONEY}：订单金额。${REASON}：拒收原因。<br/>2.为空则不发送。', '1'),
('3', 'WX_ADMIN_ORDER_REFUND', '', '{{first.DATA}}\n\n退款原因：{{reason.DATA}}\n退款金额：{{refund.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${ORDER_NO}：订单号。${REASON}：退款原因。${MONEY}：退款金额。<br/>2.为空则不发送。', '1'),
('3', 'WX_ADMIN_CASH_DRAW', '', '{{first.DATA}}\n昵称：{{keyword1.DATA}}\n申请金额：{{keyword2.DATA}}\n申请时间：{{keyword3.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${LOGIN_NAME}：用户登陆账号。${CASH_NO}：提现单号。${MONEY}：提现金额。${CASH_TIME}：申请时间。<br/>2.为空则不发送。', '1'),
('3', 'WX_ADMIN_ORDER_COMPLAINT', '', '{{first.DATA}}\n用户名称：{{keyword1.DATA}}\n投诉内容：{{keyword2.DATA}}\n{{remark.DATA}}', '1', '1.变量说明：${LOGIN_NAME}：用户名称。${REMARK}：投诉内容。${ORDER_NO}：订单号。<br/>2.为空则不发送。', '1');

insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_GOODS_REJECT');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_GOODS_ALLOW');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_AUCTION_GOODS_REJECT');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_AUCTION_GOODS_ALLOW');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(2,4,'WX_AUCTION_SHOP_RESULT');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_BARGAIN_GOODS_REJECT');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_BARGAIN_GOODS_ALLOW');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_GROUPON_GOODS_REJECT');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_GROUPON_GOODS_ALLOW');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_PINTUAN_GOODS_REJECT');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(1,4,'WX_PINTUAN_GOODS_ALLOW');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(5,4,'WX_ORDER_REJECT');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(4,4,'WX_ORDER_SHOP_PAY_TIMEOUT');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(2,4,'WX_ORDER_SUBMIT');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(2,4,'WX_ORDER_PAY');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(5,4,'WX_ORDER_SHOP_REFUND');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(5,4,'WX_ORDER_REFUND_CONFER');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(5,4,'WX_ORDER_CANCEL');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(7,4,'WX_ORDER_APPRAISES');
insert into wst_shop_message_cats(msgDataId,msgType,msgCode) values(8,4,'WX_ORDER_RECEIVE');

INSERT INTO `wst_ad_positions`(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) VALUES 
('2', '微信版首页版咨询上方广告', '375', '115', '1', 'wx-index-long', '1001'),
('2', '微信版首页左边一个广告', '187', '201', '1', 'wx-index-left', '1002'),
('2', '	微信版首页右边两个广告', '187', '100', '1', 'wx-index-right', '1002');

update wst_ad_positions set positionWidth='125',positionHeight='105' where positionCode='wx-index-small';
delete a from wst_ads a left join wst_ad_positions ap on ap.positionId = a.adPositionId where ap.positionCode = 'wx-index-large';
delete  FROM `wst_ad_positions` where positionCode = 'wx-index-large';

/**2018-04-12**/
INSERT INTO `wst_ad_positions`(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) VALUES 
('2', '微信版分类1广告', '471', '200', '1', 'wx-category-1', '0'),
('2', '微信版分类2广告', '471', '200', '1', 'wx-category-2', '0'),
('2', '微信版分类3广告', '471', '200', '1', 'wx-category-3', '0'),
('2', '微信版分类4广告', '471', '200', '1', 'wx-category-4', '0'),
('2', '微信版分类5广告', '471', '200', '1', 'wx-category-5', '0'),
('2', '微信版分类6广告', '471', '200', '1', 'wx-category-6', '0'),
('2', '微信版分类7广告', '471', '200', '1', 'wx-category-7', '0'),
('2', '微信版分类8广告', '471', '200', '1', 'wx-category-8', '0'),
('2', '微信版分类9广告', '471', '200', '1', 'wx-category-9', '0'),
('2', '微信版分类10广告', '471', '200', '1', 'wx-category-10', '0'),
('2', '微信版分类11广告', '471', '200', '1', 'wx-category-11', '0'),
('2', '微信版分类12广告', '471', '200', '1', 'wx-category-12', '0');
