<?php
namespace application\weapp\model;
use think\Model;
use think\Db;
/**
 * ============================================================================
* VIRMALL 多用户商城
* 版权所有 2016 杭州百米贩网络科技有限公司，并保留所有权利。
* 官网地址:http://www.baimifan.net
* 联系QQ:1303123835
* ----------------------------------------------------------------------------
* 这不是一个自由软件！未经本公司授权您只能在不用于商业目的的前提下对程序代码进行修改和使用；
* 不允许对程序代码以任何形式任何目的的再发布。
* ============================================================================
 * 基础模型器
 */
class Base extends Model{
	/**
	 * 获取登录用户的id
	 */
	public function getUserId(){
		$tokenId = input('tokenId');
		if($tokenId=='')return 0;
		return (int)Db::name('weapp_session')->where("tokenId='{$tokenId}'")->value('userId');
	}
	/**
	 * 获取用户对应的shopId
	 */
	public function getShopId($userId){
		return (int)Db::name('shop_users')->where(['userId'=>$userId])->value('shopId');
	}
}