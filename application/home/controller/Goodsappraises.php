<?php
namespace application\home\controller;
use application\common\model\GoodsAppraises as M;
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
 * 评价控制器
 */
class GoodsAppraises extends Base{
	protected $beforeActionList = [
          'checkAuth' =>  ['except'=>'userappraise,getbyid'],
          'checkShopAuth'=>['only'=>'index,querybypage,shopreply']
    ];
	/**
	* 获取评价列表 商家
	*/
	public function index(){
		return $this->fetch('shops/goodsappraises/list');
	}
	/**
	* 获取评价列表 用户
	*/
	public function myAppraise(){
		return $this->fetch('users/orders/appraise_manage');
	}
	// 获取评价列表 商家
	public function queryByPage(){
		$m = new M();
		return $m->queryByPage();
	}
	// 获取评价列表 用户
	public function userAppraise(){
		$m = new M();
		return $m->userAppraise();
	}
	/**
	* 添加评价
	*/
	public function add(){
		$m = new M();
		$rs = $m->add();
		return $rs;

	}
	/**
	* 根据商品id取评论
	*/
	public function getById(){
		$m = new M();
		$rs = $m->getById();
		return $rs;
	}

	/**
	* 商家回复评价
	*/
	public function shopReply(){
		$m = new M();
		return $m->shopReply();
	}
}
