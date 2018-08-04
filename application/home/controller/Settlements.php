<?php
namespace application\home\controller;
use application\home\model\Settlements as M;
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
 * 结算控制器
 */
class Settlements extends Base{
	  protected $beforeActionList = ['checkShopAuth'];
    public function index(){
    	  return $this->fetch('shops/settlements/list');
    }

    /**
     * 获取结算单
     */
    public function pageQuery(){
        $m = new M();
        $rs = $m->pageQuery();
        return WSTReturn('',1,$rs);
    }
    /**
     * 获取待结算订单
     */
    public function pageUnSettledQuery(){
        $m = new M();
        $rs = $m->pageUnSettledQuery();
        return WSTReturn('',1,$rs);
    }
    /**
     * 结算订单
     */
    public function settlement(){
        $m = new M();
        return $m->settlement();
   } 
   /**
    * 获取已结算订单
    */
   public function pageSettledQuery(){
       $m = new M();
       $rs = $m->pageSettledQuery();
       return WSTReturn('',1,$rs);
   }
   /**
    * 查看结算详情
    */
   public function view(){
       $m = new M();
       $rs = $m->getById();
       $this->assign('object',$rs);
       return $this->fetch('shops/settlements/view');
   }
}
