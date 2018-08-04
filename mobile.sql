INSERT INTO `wst_styles`(styleSys,styleName,styleAuthor,styleShopSite,styleShopId,stylePath,isUse)
 VALUES ('mobile', '默认模板', 'WSTMart', '', '1', 'default', '1');

insert into wst_datas(catId,dataName,dataVal) values(5,'手机版',3);



insert into wst_ad_positions(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) 
values ('3','手机版首页轮播广告','375','188','1','mo-ads-index','2000'),
('3','手机版首页中间大广告','171','96','1','mo-index-large','2001'),
('3','手机版首页中间小广告','87','110','1','mo-index-small','2002'),
('3','手机版首页分层1F顶部广告','375','60','1','mo-ads-0','2010'),
('3','手机版首页分层2F顶部广告','375','60','1','mo-ads-1','2011'),
('3','手机版首页分层3F顶部广告','375','60','1','mo-ads-2','2012'),
('3','手机版首页分层4F顶部广告','375','60','1','mo-ads-3','2013'),
('3','手机版首页分层5F顶部广告','375','60','1','mo-ads-4','2014'),
('3','手机版首页分层6F顶部广告','375','60','1','mo-ads-5','2015'),
('3','手机版首页分层7F顶部广告','375','60','1','mo-ads-6','2016'),
('3','手机版首页分层8F顶部广告','375','60','1','mo-ads-7','2017'),
('3','手机版首页分层9F顶部广告','375','60','1','mo-ads-8','2018'),
('3','手机版首页分层10F顶部广告','375','60','1','mo-ads-9','2019'),
('3','手机版店铺街广告','87','110','1','mo-ads-street','2020');

update wst_sys_configs set fieldValue='_m' where fieldCode='wstMobileImgSuffix';

INSERT INTO `wst_ad_positions`(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) VALUES 
('3', '手机版首页版咨询上方广告', '375', '115', '1', 'mo-index-long', '2001'),
('3', '手机版首页左边一个广告', '187', '201', '1', 'mo-index-left', '2002'),
('3', '	手机版首页右边两个广告', '187', '100', '1', 'mo-index-right', '2002');

update wst_ad_positions set positionWidth='125',positionHeight='105' where positionCode='mo-index-small';
delete a from wst_ads a left join wst_ad_positions ap on ap.positionId = a.adPositionId where ap.positionCode = 'mo-index-large';
delete  FROM `wst_ad_positions` where positionCode = 'mo-index-large';

/**2018-04-12**/
INSERT INTO `wst_ad_positions`(positionType,positionName,positionWidth,positionHeight,dataFlag,positionCode,apSort) VALUES 
('3', '移动版分类1广告', '471', '200', '1', 'mo-category-1', '0'),
('3', '移动版分类2广告', '471', '200', '1', 'mo-category-2', '0'),
('3', '移动版分类3广告', '471', '200', '1', 'mo-category-3', '0'),
('3', '移动版分类4广告', '471', '200', '1', 'mo-category-4', '0'),
('3', '移动版分类5广告', '471', '200', '1', 'mo-category-5', '0'),
('3', '移动版分类6广告', '471', '200', '1', 'mo-category-6', '0'),
('3', '移动版分类7广告', '471', '200', '1', 'mo-category-7', '0'),
('3', '移动版分类8广告', '471', '200', '1', 'mo-category-8', '0'),
('3', '移动版分类9广告', '471', '200', '1', 'mo-category-9', '0'),
('3', '移动版分类10广告', '471', '200', '1', 'mo-category-10', '0'),
('3', '移动版分类11广告', '471', '200', '1', 'mo-category-11', '0'),
('3', '移动版分类12广告', '471', '200', '1', 'mo-category-12', '0');