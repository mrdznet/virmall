<?php
namespace application\wechat\controller;
use application\common\model\GoodsCats;
use application\common\model\GoodsConsult as CG;
use application\common\model\Attributes as AT;
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
 * 商品控制器
 */
class Goods extends Base{
	/**
	 * 商品主页
	 */
	public function detail(){
        $root = WSTDomain();
		$m = model('goods');
		$goods = $m->getBySale(input('goodsId/d'));
		
		hook('wechatControllerGoodsIndex',['getParams'=>input()]);
		
        // 找不到商品记录
        if(empty($goods))return $this->fetch('error_lost');
		if(!empty($goods)){
        $goods['goodsDesc']=htmlspecialchars_decode($goods['goodsDesc']);
        $rule = '/<img src="\/(upload.*?)"/';
        preg_match_all($rule, $goods['goodsDesc'], $images);

        foreach($images[0] as $k=>$v){
            $goods['goodsDesc'] = str_replace('/'.$images[1][$k], $root.'/'.WSTConf("CONF.goodsLogo") . "\"  data-echo=\"".$root."/".WSTImg($images[1][$k],3), $goods['goodsDesc']);
        }
            $history = cookie("wx_history_goods");
            $history = is_array($history)?$history:[];
            array_unshift($history, (string)$goods['goodsId']);
            $history = array_values(array_unique($history));
            if(!empty($history)){
                cookie("wx_history_goods",$history,25920000);
            }
        }
        if(WSTConf('CONF.wxenabled')==1){
	        $we = WSTWechat();
	        $datawx = $we->getJsSignature('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	        $this->assign("datawx", $datawx);
        }
        $goods['consult'] = model('GoodsConsult')->firstQuery($goods['goodsId']);
        $goods['appraises'] = model('GoodsAppraises')->getGoodsEachApprNum($goods['goodsId']);
		$this->assign("info", $goods);
		return $this->fetch('goods_detail');
	}
	/**
     * 商品列表
     */
    public function lists(){
    	$this->assign("keyword", input('keyword'));
    	$this->assign("catId", input('catId/d'));
    	$this->assign("brandId", input('brandId/d'));
    	return $this->fetch('goods_list');
    }
    /**
     * 获取列表
     */
    public function pageQuery(){
    	$m = model('goods');
        $gc = new GoodsCats();
        $catId = (int)input('catId');
        $data = []; 
        if($catId>0){
            $goodsCatIds = $gc->getParentIs($catId);
        }else{
            $goodsCatIds = [];
        }

        //处理已选属性
        $vs = input('vs');
        $vs = ($vs!='')?explode(',',$vs):[];
        $data['arvs'] = $vs;
        $data['vs'][] = implode(',',$vs);
         
        $at = new AT();
        $goodsFilter = $at->listQueryByFilter((int)input('catId/d'));
        $ngoodsFilter = [];
        if(!empty($vs)){
            // 存在筛选条件,取出符合该条件的商品id,根据商品id获取可选属性进行拼凑
            $goodsId = model('goods')->filterByAttributes();

            $attrs = model('Attributes')->getAttribute($goodsId);
            // 去除已选择属性
            foreach ($attrs as $key =>$v){
                if(!in_array($v['attrId'],$vs)){$ngoodsFilter[] = $v;}
            }
        }else{
            // 当前无筛选条件,取出分类下所有属性
            foreach ($goodsFilter as $key =>$v){
                if(!in_array($v['attrId'],$vs))$ngoodsFilter[] = $v;
            }
        }
        $data['goodsPage'] = $m->pageQuery($goodsCatIds);
        foreach ($ngoodsFilter as $k => $val) {
           $result = array_values(array_unique($ngoodsFilter[$k]['attrVal']));

           $ngoodsFilter[$k]['attrVal'] = $result;
        }
        $data['goodsFilter'] = $ngoodsFilter;

        foreach ($data['goodsPage']['data'] as $key =>$v){
            $data['goodsPage']['data'][$key]['goodsImg'] = WSTImg($v['goodsImg'],3,'goodsLogo');
            $data['goodsPage']['data'][$key]['praiseRate'] = ($v['totalScore']>0)?(sprintf("%.2f",$v['totalScore']/($v['totalUsers']*15))*100).'%':'100%';
        }
        // `券`标签
        hook('afterQueryGoods',['page'=>&$data['goodsPage']]);
        return $data;
    }

    /**
    * 浏览历史页面
    */
    public function history(){
       return $this->fetch('users/history/list');
    }
    /**
    * 获取浏览历史
    */
    public function historyQuery(){
        $rs = model('goods')->historyQuery();
        if(!empty($rs)){
	        foreach($rs['data'] as $k=>$v){
	            $rs['data'][$k]['goodsImg'] = WSTImg($v['goodsImg'],3,'goodsLogo');
	        }
        }
        return $rs;
    }
}
