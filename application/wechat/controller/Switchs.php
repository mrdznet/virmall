<?php
namespace application\wechat\controller;
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
 * 关闭提示处理控制器
 */
use think\Controller;
class Switchs extends Controller{
	public function __construct(){
		parent::__construct();
		WSTConf('CONF',WSTConfig());
		$this->assign("v",WSTConf('CONF.wstVersion')."_".WSTConf('CONF.wstPcStyleId'));
		if(WSTConf('CONF.wxenabled')==1){
			if(!(request()->module()=="wechat" && request()->controller()=="Weixinpays" && request()->action()=="notify")){
				WSTIsWeixin();//检测是否在微信浏览器上使用
			}
		}
	}
	protected function fetch($template = '', $vars = [], $replace = [], $config = []){
		$style = WSTConf('CONF.wstwechatStyle')?WSTConf('CONF.wstwechatStyle'):'default';
		$replace['__WECHAT__'] = str_replace('/index.php','',\think\facade\Request::instance()->root()).'/application/wechat/view/'.$style;
		return $this->view->fetch($style."/".$template, $vars, $replace, $config);
	
	}
    public function index(){
        return $this->fetch('error_switch');
    }
}
