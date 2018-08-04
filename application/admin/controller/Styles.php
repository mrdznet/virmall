<?php
namespace application\admin\controller;
use application\admin\model\Styles as M;
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
 * 风格配置控制器
 */
class Styles extends Base{
	
    public function index(){
        $m = new M();
        $rs = $m->getCats();
        $m->initStyles();
        $this->assign('cats',$rs);
    	return $this->fetch();
    }
    /**
     * 获取风格列表
     */
    public function listQueryBySys(){
        $m = new M();
        $rs = $m->listQuery();
        return WSTReturn('',1,$rs);
    }
    
    /**
     * 保存
     */
    public function changeStyle(){
    	$m = new M();
    	return $m->changeStyle();
    }
}