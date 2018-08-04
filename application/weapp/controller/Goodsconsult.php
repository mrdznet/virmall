<?php
namespace application\weapp\controller;
use application\common\model\GoodsConsult as M;
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
    * 获取商品咨询类别
    */
    public function getConsultType(){
        $arr = WSTDatas('COUSULT_TYPE');
        return jsonReturn('success',1,$arr);
    }
	/**
	* 根据商品id获取商品咨询
	*/
    public function listQuery(){
        $m = new M();
        $rs = $m->listQuery();
        return jsonReturn('',1,$rs);
    }
    /**
    * 新增
    */
    public function add(){
    	
    	$m = new M();
    	$rs = $m->add();
        return jsonReturn('',1,$rs);
    }
}
