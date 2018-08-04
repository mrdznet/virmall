<?php
namespace application\admin\controller;
use application\admin\model\TemplateMsgs as M;
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
 * 消息模板控制器
 */
class Templatemsgs extends Base{
	
    public function index(){
        $this->assign('src',(int)input('src'));
    	return $this->fetch("list");
    }
    /**
     * 获取分页
     */
    public function pageMsgQuery(){
        $m = new M();
        return WSTGrid($m->pageQuery(0,'TEMPLATE_SYS'));
    }
     /**
     * 设置是否显示/隐藏
     */
    public function editiIsShow(){
    	$m = new M();
    	$rs = $m->editiIsShow();
    	return $rs;
    }
    /**
     * 跳转去新增页面
     */ 
    public function toEditMsg(){
        $id = (int)input('id');
        $m = new M();
        if($id>0){
            $data = $m->getById($id);
        }else{
            $data = $m->getEModel('template_msgs');
        }
        $this->assign('object',$data);
        return $this->fetch("edit_msg");
    }
    /**
     * 跳转去新增页面
     */ 
    public function toEditEmail(){
        $id = (int)input('id');
        $m = new M();
        if($id>0){
            $data = $m->getById($id);
        }else{
            $data = $m->getEModel('template_email');
        }
        $this->assign('object',$data);
        return $this->fetch("edit_email");
    }
    /**
     * 跳转去新增页面
     */ 
    public function toEditSMS(){
        $id = (int)input('id');
        $m = new M();
        if($id>0){
            $data = $m->getById($id);
        }else{
            $data = $m->getEModel('template_sms');
        }
        $this->assign('object',$data);
        return $this->fetch("edit_sms");
    }

    /**
    * 发送消息
    */
    public function edit(){
        $m = new M();
        return $m->edit();
    }

    /**
     * 获取分页
     */
    public function pageEmailQuery(){
        $m = new M();
        return WSTGrid($m->pageEmailQuery());
    }
    /**
     * 获取分页
     */
    public function pageSMSQuery(){
        $m = new M();
        return WSTGrid($m->pageQuery(2,'TEMPLATE_SMS'));
    }

}
