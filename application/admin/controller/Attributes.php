<?php
namespace application\admin\controller;
use application\admin\model\Attributes as M;
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
 * 属性控制器
 */
class Attributes extends Base{

    public function index(){
    	$this->assign('catId', input("catId/d"));
    	return $this->fetch("list");
    }

    /**
     * 获取分页
     */
    public function pageQuery(){
        $m = new M();
        $rs = $m->pageQuery();
        return WSTGrid($rs);
    }
  
    /**
     * 获取分页
     */
    public function listQuery(){
    	$m = new M();
    	$rs = $m->listQuery();
    	return $rs;
    }
    /**
     * 跳去编辑页面
     */
    public function toEdit(){
        //获取该记录信息
        $this->assign('data', $this->get());
        $m = new M();
        $this->assign('catId', input("catId/d",0));
        return $this->fetch("edit");
    }
    /**
     * 获取数据
     */
    public function get(){
        $m = new M();
        $rs = $m->getById(input("attrId/d"));
        return $rs;
    }
    /**
     * 显示隐藏
     */
    public function setToggle(){
        $m = new M();
        $rs = $m->setToggle();
        return $rs;
    }
    /**
     * 新增
     */
    public function add(){
        $m = new M();
        $rs = $m->add();
        return $rs;
    }
    /**
    * 修改
    */
    public function edit(){
        $m = new M();
        $rs = $m->edit();
        return $rs;
    }
    /**
     * 删除
     */
    public function del(){
        $m = new M();
        $rs = $m->del();
        return $rs;
    }
	
}
