insert into wst_sys_configs(fieldName,fieldCode,fieldValue,fieldType) values('小程序AppId','weAppId','',2);
insert into wst_sys_configs(fieldName,fieldCode,fieldValue,fieldType) values('小程序AppKey','weAppKey','',2);

alter table wst_users add column weOpenId char(100);

create table wst_weapp_session(
id int unsigned primary key auto_increment,
userId int unsigned not null,
tokenId varchar(32),
startTime datetime,
deviceId varchar(50)
)engine=InnoDb charset=utf8;

INSERT INTO `wst_datas`(catId,dataName,dataVal,dataSort) VALUES ('5', '微信小程序', '5', '0');

INSERT INTO `wst_ad_positions`(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) VALUES 
('5', '微信小程序首页轮播广告', '375', '188', '1', 'weapp-ads-index', '2000'),
('5', '微信小程序首页中间大广告', '171', '96', '1', 'weapp-index-large', '2001'),
('5', '微信小程序首页中间小广告', '87', '110', '1', 'weapp-index-small', '2002'),
('5', '微信小程序首页分层1F顶部广告', '375', '60', '1', 'weapp-ads-0', '2010'),
('5', '微信小程序首页分层2F顶部广告', '375', '60', '1', 'weapp-ads-1', '2011'),
('5', '微信小程序首页分层3F顶部广告', '375', '60', '1', 'weapp-ads-2', '2012'),
('5', '微信小程序首页分层4F顶部广告', '375', '60', '1', 'weapp-ads-3', '2013'),
('5', '微信小程序首页分层5F顶部广告', '375', '60', '1', 'weapp-ads-4', '2014'),
('5', '微信小程序首页分层6F顶部广告', '375', '60', '1', 'weapp-ads-5', '2015'),
('5', '微信小程序首页分层7F顶部广告', '375', '60', '1', 'weapp-ads-6', '2016'),
('5', '微信小程序首页分层8F顶部广告', '375', '60', '1', 'weapp-ads-7', '2017'),
('5', '微信小程序首页分层9F顶部广告', '375', '60', '1', 'weapp-ads-8', '2018'),
('5', '微信小程序首页分层10F顶部广告', '375', '60', '1', 'weapp-ads-9', '2019'),
('5', '微信小程序店铺街广告', '87', '110', '1', 'weapp-ads-street', '1020');

INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag,menuMark,isShow,menuIcon) VALUES ('192', '66', '小程序', '0', '1','','1','');
INSERT INTO `wst_menus`(menuId,parentId,menuName,menuSort,dataFlag,menuMark,isShow,menuIcon) VALUES ('193', '192', '小程序设置', '0', '1','','1','');
INSERT INTO `wst_privileges`(menuId,privilegeCode,privilegeName,isMenuPrivilege,privilegeUrl,otherPrivilegeUrl,dataFlag,isEnable) VALUES ('192', 'WX_XCX_00', '查看小程序', '0', '', '', '1','1');
INSERT INTO `wst_privileges`(menuId,privilegeCode,privilegeName,isMenuPrivilege,privilegeUrl,otherPrivilegeUrl,dataFlag,isEnable) VALUES ('193', 'WX_XCXSZ_00', '查看小程序设置', '1', 'admin/weappconfigs/index', '', '1','1');
INSERT INTO `wst_privileges`(menuId,privilegeCode,privilegeName,isMenuPrivilege,privilegeUrl,otherPrivilegeUrl,dataFlag,isEnable) VALUES ('193', 'WX_XCXSZ_04', '编辑小程序', '0', 'admin/weappconfigs/edit', '', '1','1');


/**2018-04-12**/
insert into `wst_mobile_btns`(btnName,btnSrc,btnUrl,btnImg,addonsName,btnSort) values('自营超市',2,'/pages/shop-self/shop-self','wstmart/weapp/view/weapp/image/button/self.png','',1);
insert into `wst_mobile_btns`(btnName,btnSrc,btnUrl,btnImg,addonsName,btnSort) values('品牌街',2,'/pages/brands/brands','wstmart/weapp/view/weapp/image/button/brand.png','',2);
insert into `wst_mobile_btns`(btnName,btnSrc,btnUrl,btnImg,addonsName,btnSort) values('店铺街',2,'/pages/shop-street/shop-street','wstmart/weapp/view/weapp/image/button/shopstreet.png','',3);
insert into `wst_mobile_btns`(btnName,btnSrc,btnUrl,btnImg,addonsName,btnSort) values('我的订单',2,'/pages/users/orders/orders','wstmart/weapp/view/weapp/image/button/order.png','',4);

INSERT INTO `wst_ad_positions`(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) VALUES 
('5', '微信小程序分类1广告', '471', '200', '1', 'weapp-category-0', '0'),
('5', '微信小程序分类2广告', '471', '200', '1', 'weapp-category-1', '0'),
('5', '微信小程序分类3广告', '471', '200', '1', 'weapp-category-2', '0'),
('5', '微信小程序分类4广告', '471', '200', '1', 'weapp-category-3', '0'),
('5', '微信小程序分类5广告', '471', '200', '1', 'weapp-category-4', '0'),
('5', '微信小程序分类6广告', '471', '200', '1', 'weapp-category-5', '0'),
('5', '微信小程序分类7广告', '471', '200', '1', 'weapp-category-6', '0'),
('5', '微信小程序分类8广告', '471', '200', '1', 'weapp-category-7', '0'),
('5', '微信小程序分类9广告', '471', '200', '1', 'weapp-category-8', '0'),
('5', '微信小程序分类10广告', '471', '200', '1', 'weapp-category-9', '0'),
('5', '微信小程序分类11广告', '471', '200', '1', 'weapp-category-10', '0'),
('5', '微信小程序分类12广告', '471', '200', '1', 'weapp-category-11', '0');

/**2018-05-20**/
INSERT INTO `wst_ad_positions`(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) VALUES 
('5', '微信小程序首页中间小广告左', '158', '185', '1', 'weapp-index-1', '2000'),
('5', '微信小程序首页中间小广告右上', '220', '90', '1', 'weapp-index-2', '2001'),
('5', '微信小程序首页中间小广告右下', '220', '90', '1', 'weapp-index-3', '1020');