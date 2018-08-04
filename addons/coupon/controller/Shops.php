<?php
namespace addons\coupon\controller;

use think\addons\Controller;
use addons\coupon\model\Coupons as M;
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
 * 优惠券插件
 */
class Shops extends Controller{
	protected $beforeActionList = ['checkShopAuth' ];
	public function __construct(){
		parent::__construct();
		$this->assign("v",WSTConf('CONF.wstVersion')."_".WSTConf('CONF.wstPCStyleId'));
	}
	/**
	 * 优惠券列表
	 */
	public function index(){
    	return $this->fetch("/home/shops/list");
	}
	/**
	 * 加载优惠券数据
	 */
	public function pageQuery(){
		$m = new M();
		return $m->pageQueryByShop();
	}

	/**
	 * 跳去编辑页面
	 */
	public function edit(){
		$id = (int)input('id');
		$object = [];
		$m = new M();
		if($id>0){
            $object = $m->getById($id);
		}else{
			$object = $m->getEModel('coupons');
			$object['goods'] = [];
		}
		$this->assign("object",$object);
		return $this->fetch("/home/shops/edit");
	}

	/**
	 * 保存优惠券信息
	 */
	public function toEdit(){
		$id = (int)input('post.couponId');
		$m = new M();
		if($id==0){
            return $m->add();
		}else{
            return $m->edit();
		}
	}

	/**
	 * 删除优惠券
	 */
	public function del(){
		$m = new M();
		return $m->del();
	}

	/**
	 * 查询商品
	 */
	public function searchGoods(){
		$m = new M();
		return $m->searchGoods();
	}
}