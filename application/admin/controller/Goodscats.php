<?php
namespace application\admin\controller;
use application\admin\model\GoodsCats as M;
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
class GoodsCats extends Base{
	
    public function index(){
    	return $this->fetch("list");
    }
    
    /**
     * 获取分页
     */
    public function pageQuery(){
    	$m = new M();
    	return $m->pageQuery();
    }
    /**
     * 获取列表
     */
    public function listQuery(){
    	$m = new M();
    	$rs = $m->listQuery(input('parentId/d',0));
    	return WSTReturn("", 1,$rs);
    }
    /**
     * 获取商品分类
     */
    public function get(){
    	$m = new M();
    	return $m->get((int)Input("post.id"));
    }
    
    /**
     * 设置是否推荐/不推荐
     */
    public function editiIsFloor(){
    	$m = new M();
    	return $m->editiIsFloor();
    }
       
    /**
     * 设置是否显示/隐藏
     */
    public function editiIsShow(){
    	$m = new M();
    	return $m->editiIsShow();
    }
    
    /**
     * 新增
     */
    public function add(){
    	$m = new M();
    	return $m->add();
    }
    
    /**
     * 编辑
     */
    public function edit(){
    	$m = new M();
    	return $m->edit();
    }
    /**
     * 编辑分类名
     */
    public function editName(){
    	$m = new M();
    	return $m->editName();
    }
    /**
     * 编辑分类名缩写
     */
    public function editsimpleName(){
    	$m = new M();
    	return $m->editsimpleName();
    }
    /**
     * 编辑分类排序
     */
    public function editOrder(){
        $m = new M();
        return $m->editOrder();
    }
    
    /**
     * 删除
     */
    public function del(){
    	$m = new M();
    	return $m->del();
    }
}
