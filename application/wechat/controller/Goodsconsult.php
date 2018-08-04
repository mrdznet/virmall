<?php
namespace application\wechat\controller;
use application\common\model\GoodsConsult as CG;
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
 * 商品咨询控制器
 */
class GoodsConsult extends Base{
    /**
    * 商品咨询页
    */
    public function index(){
        $this->assign('goodsId',(int)input('goodsId'));
        return $this->fetch('goodsconsult/list');
    }
    /**
    * 根据商品id获取商品咨询
    */
    public function listQuery(){
        $m = new CG();
        return $m->listQuery();
    }
    /**
    * 发布商品咨询页
    */
    public function consult(){
        $this->assign('goodsId',(int)input('goodsId'));
        return $this->fetch('goodsconsult/consult');
    }
    public function add(){
        $m = new CG();
        return $m->add();
    }

}
