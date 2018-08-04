<?php
namespace application\admin\controller;
use application\admin\model\Informs as M;
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
 * 订单投诉控制器
 */
class Informs extends Base{
	
    public function index(){
    	return $this->fetch("list");
    }
    /**
    * 查看举报信息
    */
    public function view(){
        $m = model('informs');
        if((int)Input('cid')>0){
            $data = $m->getDetail();
            $this->assign('data',$data);
        }
        return $this->fetch('view');
    }
    /**
     * 跳去处理页面
     */
    public function toHandle(){
        $m = model('informs');
        if(Input('cid')>0){
            $data = $m->getDetail();
            $this->assign('data',$data);
        }
        return $this->fetch("handle");
    }
    
    /**
     * 获取分页
     */
    public function pageQuery(){
        $m = new M();
        return WSTGrid($m->pageQuery());
    } 
     /**
     * 举报记录
     */
    public function finalHandle(){
        return model('Informs')->finalHandle();
    }

  
}