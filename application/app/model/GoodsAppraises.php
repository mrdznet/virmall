<?php
namespace application\app\model;
use application\common\model\GoodsAppraises as CGoodsAppraises;
use think\Db;
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
 * 评价类
 */
class GoodsAppraises extends CGoodsAppraises{
	/**
	 *  获取评论
	 */
	public function getAppr($uId=0){
		$oId = (int)input('oId');

		$userId = ((int)$uId==0)?(int)session('WST_USER.userId'):$uId;

		$gId = (int)input('gId');
		
		$specId = (int)input('sId');

		$rs = $this->where(['orderId'=>$oId,'userId'=>$userId,'goodsId'=>$gId,'goodsSpecId'=>$specId])->find();
		if($rs!==false){
			$rs = !empty($rs)?$rs:['goodsScore'=>'','timeScore'=>'','serviceScore'=>'','content'=>''];
			return WSTReturn('',1,$rs);
		}
		return WSTReturn('获取出错',-1);
	}
	
}
