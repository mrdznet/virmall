<?php
namespace application\home\controller;
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
 * 错误处理控制器
 */
class Error extends Base{
    public function index(){
    	header("HTTP/1.0 404 Not Found");
        return $this->fetch('error_sys');
    }
    public function goods(){
    	$this->assign('message','很抱歉，您要找的商品已经找不到了~');
        return $this->fetch('error_msg');
    }
    public function shop(){
    	$this->assign('message','很抱歉，您要找的店铺已经找不到了~');
        return $this->fetch('error_msg');
    }
    public function message(){
        $code = input('code');
        if(!empty($code) && session($code)!=''){
            $this->assign('message',session($code));
        }else{
            $this->assign('message','操作错误，请联系商城管理员');
        }
        return $this->fetch('error_msg');
    }
}
