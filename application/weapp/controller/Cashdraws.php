<?php
namespace application\weapp\controller;
use application\weapp\model\CashDraws as M;
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
 * 提现记录控制器
 */
class Cashdraws extends Base{
    // 前置方法执行列表
    protected $beforeActionList = [
        'checkAuth',
    ];
	/**
     * 获取用户数据
     */
    public function pageQuery(){
        $userId = model('weapp/users')->getUserId();
        $m = new M();
        $data = $m->pageQuery(0,$userId);
        return jsonReturn('success',1,$data);
    }

    /**
     * 提现
     */ 
    public function drawMoney(){
    	$m = new M();
    	$rs = $m->drawMoney();
        return $rs;
    }
}
