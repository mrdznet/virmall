<?php
namespace application\app\controller;
use application\app\model\Apis as M;
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
 * API控制器
 */
class Apis extends Base{
	
    public function index(){
        $m = new M();
        $rs = $m->listQuery();
        $this->assign('list',$rs);
        $this->assign('apiType',(input('apiType/d',0)==1));
    	return $this->fetch("list");
    } 
}
