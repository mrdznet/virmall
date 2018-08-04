<?php
namespace application\app\controller;
use application\app\model\GoodsCats as M;
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
 * 商品分类控制器
 */
class GoodsCats{
    /**
    * 获取所有一级分类
    */
    public function pageQuery(){
        $rs = model('goodsCats')->listQuery(0);
        return json_encode(WSTReturn('success',1,$rs));
    }
    /**
    * 获取一级商品分类
    */
    public function getGoodsCats(){
        $rs = WSTGoodsCats(0);
        return json_encode(WSTReturn('ok',1,$rs));
    }
	/**
     * 列表
     */
    public function index(){
    	$m = new M();
    	$goodsCatList = $m->getGoodsCats();
    	if(!empty($goodsCatList)){
            // 域名
            $goodsCatList['domain'] = url('/','','',true);
            return json_encode(WSTReturn('success',1,$goodsCatList));
        }
        return json_encode(WSTReturn('error',-1));
    }  
}
