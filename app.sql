DROP TABLE IF EXISTS `wst_apis`;
DROP TABLE IF EXISTS `wst_apis`;
CREATE TABLE `wst_apis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apiName` varchar(50) DEFAULT NULL,
  `apiType` tinyint(4) DEFAULT NULL,
  `apiDesc` varchar(255) DEFAULT NULL,
  `apiParam` text,
  `apiReturn` text,
  `apiSort` int(11) DEFAULT '0',
  `dataFlag` tinyint(4) DEFAULT '1',
  `apiColor` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('100', '81', 'API 管理', '1',1);
INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag) VALUES ('101', '100', 'API列表', '0', '1');
INSERT INTO `wst_privileges`(menuId,privilegeCode,privilegeName,isMenuPrivilege,privilegeUrl,otherPrivilegeUrl) VALUES ('100', 'API_APIGL_00', '查看API管理', '1', '', '');
INSERT INTO `wst_privileges`(menuId,privilegeCode,privilegeName,isMenuPrivilege,privilegeUrl,otherPrivilegeUrl) VALUES ('101', 'API_APILB_00', '查看API列表', '1', 'admin/apis/index', 'admin/apis/pageQuery');
INSERT INTO `wst_privileges`(menuId,privilegeCode,privilegeName,isMenuPrivilege,privilegeUrl,otherPrivilegeUrl) VALUES ('101', 'API_APILB_01', '新增API', '0', 'admin/apis/add', 'admin/apis/toEdit');
INSERT INTO `wst_privileges`(menuId,privilegeCode,privilegeName,isMenuPrivilege,privilegeUrl,otherPrivilegeUrl) VALUES ('101', 'API_APILB_02', '编辑API', '0', 'admin/apis/edit', 'admin/apis/toEdit');
INSERT INTO `wst_privileges`(menuId,privilegeCode,privilegeName,isMenuPrivilege,privilegeUrl,otherPrivilegeUrl) VALUES ('101', 'API_APILB_03', '删除API', '0', 'admin/apis/del', '');

insert into wst_datas(catId,dataName,dataVal) values(5,'APP版',4);

insert into wst_ad_positions(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) 
values ('4','APP版首页轮播广告','375','188','1','app-ads-index','3000'),
('4','APP版首页中间大广告','171','96','1','app-index-large','3001'),
('4','APP版首页中间小广告','87','110','1','app-index-small','3002'),
('4','APP版首页分层1F顶部广告','375','60','1','app-ads-0','3010'),
('4','APP版首页分层2F顶部广告','375','60','1','app-ads-1','3011'),
('4','APP版首页分层3F顶部广告','375','60','1','app-ads-2','3012'),
('4','APP版首页分层4F顶部广告','375','60','1','app-ads-3','3013'),
('4','APP版首页分层5F顶部广告','375','60','1','app-ads-4','3014'),
('4','APP版首页分层6F顶部广告','375','60','1','app-ads-5','3015'),
('4','APP版首页分层7F顶部广告','375','60','1','app-ads-6','3016'),
('4','APP版首页分层8F顶部广告','375','60','1','app-ads-7','3017'),
('4','APP版首页分层9F顶部广告','375','60','1','app-ads-8','3018'),
('4','APP版首页分层10F顶部广告','375','60','1','app-ads-9','3019'),
('4','APP版店铺街广告','87','110','1','app-ads-street','3020');

create table wst_app_session(
id int unsigned primary key auto_increment,
userId int unsigned not null,
tokenId varchar(32),
startTime datetime,
deviceId varchar(50)
)engine=InnoDb charset=utf8;

insert into wst_payments(payCode,payName,payDesc,payOrder,payConfig,enabled,isOnline,payFor) values('app_alipays', '支付宝', 'APP支付宝', '0', null, '0', '1', '4');
insert into wst_payments(payCode,payName,payDesc,payOrder,payConfig,enabled,isOnline,payFor) values('app_weixinpays', '微信支付', 'APP微信支付', '0', null, '0', '1', '4');
update wst_payments set payFor='4' where payCode='app_alipays';
update wst_payments set payFor='4' where payCode='app_weixinpays';

/**2018-04-12**/
INSERT INTO `wst_ad_positions`(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) VALUES 
('4', 'APP版分类1广告', '471', '200', '1', 'app-category-1', '0'),
('4', 'APP版分类2广告', '471', '200', '1', 'app-category-2', '0'),
('4', 'APP版分类3广告', '471', '200', '1', 'app-category-3', '0'),
('4', 'APP版分类4广告', '471', '200', '1', 'app-category-4', '0'),
('4', 'APP版分类5广告', '471', '200', '1', 'app-category-5', '0'),
('4', 'APP版分类6广告', '471', '200', '1', 'app-category-6', '0'),
('4', 'APP版分类7广告', '471', '200', '1', 'app-category-7', '0'),
('4', 'APP版分类8广告', '471', '200', '1', 'app-category-8', '0'),
('4', 'APP版分类9广告', '471', '200', '1', 'app-category-9', '0'),
('4', 'APP版分类10广告', '471', '200', '1', 'app-category-10', '0'),
('4', 'APP版分类11广告', '471', '200', '1', 'app-category-11', '0'),
('4', 'APP版分类12广告', '471', '200', '1', 'app-category-12', '0');

