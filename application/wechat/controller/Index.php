<?php
namespace application\wechat\controller;
use application\wechat\model\Index as M;
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
 * 默认控制器
 */
class Index extends Base{
	/**
     * 首页
     */
    public function index(){
    	$m = new M();
    	hook('wechatControllerIndexIndex',['getParams'=>input()]);
    	$news = $m->getSysMsg('msg');
    	$this->assign('news',$news);
    	$ads['count'] =  count(model("common/Tags")->listAds("wx-ads-index",99,86400));
    	$ads['width'] = 'width:'.$ads['count'].'00%';
    	$this->assign("ads", $ads);
    	//是否关注公众号
    	$signinfo = session('WST_WX_SIGNINFO');
    	if(!empty($signinfo['subscribe'])){
    		$signinfo['subscribe'] = ($signinfo['subscribe']==1)?0:1;
    	}else{
    		$signinfo['subscribe'] = 0;
    	}
    	$subscribe = cookie("WST_WX_SUBSCRIBE");
    	if($subscribe)$signinfo['subscribe'] = 0;
    	if(WSTConf('CONF.wxenabled')==1){
			$we = WSTWechat();
	        $datawx = $we->getJsSignature('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	        $this->assign("datawx", $datawx);
    	}
    	$this->assign("subscribe", $signinfo['subscribe']);
    	return $this->fetch('index');
    }
    /**
     * 楼层
     */
    public function pageQuery(){
    	$m = new M();
    	$rs = $m->pageQuery();
    	if(isset($rs['goods'])){
    		foreach ($rs['goods'] as $key =>$v){
    			$rs['goods'][$key]['goodsImg'] = WSTImg($v['goodsImg'],3,'goodsLogo');
    		}
    	}
        return $rs;
    }
    /**
     * 跳去登录之前的地址
     */
    public function sessionAddress(){
    	session('WST_WX_WlADDRESS',input('url'));
    	return WSTReturn("", 1);
    }
    /**
     * 关闭关注
     */
    public function closeFollow(){
    	cookie("WST_WX_SUBSCRIBE",1,25920000);
    	return WSTReturn("", 1);
    }
}
