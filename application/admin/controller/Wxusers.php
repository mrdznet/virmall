<?php
namespace application\admin\controller;
use application\admin\model\Wxusers as M;
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
 * 微信用户控制器
 */
class Wxusers extends Base{
    public function recodeUnionId(){
        $m = new M();
        return json_encode($m->recodeUnionId());
    }

    public function index(){
    	return $this->fetch("list");
    }
    
    /**
     * 获取分页
     */
    public function pageQuery(){
    	$m = new M();
        
    	return WSTGrid($m->pageQuery());
    }
    
    /**
     * 与微信用户管理同步
     */
    public function synchroWx(){
    	$m = new M();
    	return $m->synchroWx();
    }
    public function wxLoad(){
    	$m = new M();
    	return $m->wxLoad();
    }
    
    /**
     * 获取指定对象
     */
    public function getById(){
    	$m = new M();
    	return $m->getById((int)input('id'));
    }
    
    /**
     * 编辑
     */
    public function edit(){
    	$m = new M();
    	return $m->edit();
    } 
}
