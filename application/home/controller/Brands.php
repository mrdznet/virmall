<?php
namespace application\home\controller;
use application\common\model\Brands as M;
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
	 * 品牌街
	 */
	public function index(){
		$m = new M();
		$pagesize = 66;
		$selectedId = (int)input("id");
		$g = model('goodsCats');
		$goodsCats = $g->listQuery(0);
    	$this->assign('goodscats',$goodsCats);
         if(empty($goodsCats))$goodsCats =[['catId'=>0]];
    	$selectedId = ($selectedId>0)?$selectedId:$goodsCats[0]['catId'];
		$brandsList = $m->pageQuery($pagesize,$selectedId);
		$this->assign('list',$brandsList);

		
        
        
    	
    	$this->assign('selectedId',$selectedId);
		return $this->fetch('brands_list');
	}
	/**
	 * 获取品牌列表
	 */
    public function listQuery(){
        $m = new M();
        return ['status'=>1,'list'=>$m->listQuery(input('post.catId/d'))];
    }
}
