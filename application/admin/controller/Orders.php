<?php
namespace application\admin\controller;
use application\admin\model\Orders as M;
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
 * 订单控制器
 */
class Orders extends Base{
	/**
	 * 订单列表
	 */
    public function index(){
    	$areaList = model('areas')->listQuery(0); 
    	$this->assign("areaList",$areaList);
    	$this->assign("userId",(int)input('userId'));
    	return $this->fetch("list");
    }
    /**
     * 获取分页
     */
    public function pageQuery(){
        $m = new M();
        return WSTGrid($m->pageQuery((int)input('orderStatus',10000)));
    }
   /**
    * 获取订单详情
    */
    public function view(){
        $m = new M();
        $rs = $m->getByView(Input("id/d",0));
        $this->assign("object",$rs);
        $this->assign("from",input("from/d",0));
        return $this->fetch("view");
    }
    /**
     * 导出订单
     */
    public function toExport(){
    	$m = new M();
    	$rs = $m->toExport();
    	$this->assign('rs',$rs);
    }
}
