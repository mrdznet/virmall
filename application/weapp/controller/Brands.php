<?php
namespace application\weapp\controller;
use application\weapp\model\Brands as M;
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
 * 品牌控制器
 */
class Brands extends Base{
    /**
     * 列表
     */
    public function pageQuery(){
    	$m = new M();
    	$rs['cat'] = WSTGoodsCats();
    	$id = (int)input('id');
    	if(isset($rs['cat'][0]['catId']) && $id==0){
    		$id = $rs['cat'][0]['catId'];
    	}
    	$rs['list'] = $m->pageQuery($id);
    	$rs['catId'] = $id;
    	foreach ($rs['list'] as $key =>$v){
    		$rs['list'][$key]['brandImg'] = WSTImg($v['brandImg'],3);
    	}   	
    	return jsonReturn('success',1,$rs);
    }
}
