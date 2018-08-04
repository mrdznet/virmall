<?php
namespace application\app\controller;
use application\app\model\UserScores as M;
use application\common\model\UserScores as CM;
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
 * 积分控制器
 */
class Userscores extends Base{
    // 前置方法执行列表
   	protected $beforeActionList = ['checkAuth'];
	/**
    * 查看
    */
	public function index(){
		$userId = model('app/users')->getUserId();
		$data = model('Users')->getFieldsById($userId,['userScore','userTotalScore']);
		return json_encode(WSTReturn('success',1,$data));
	}
    /**
    * 获取数据
    */
    public function pageQuery(){
        $userId = model('app/users')->getUserId();
        $m = new M();
        $data['list'] = $m->pageQuery($userId);
        return json_encode(WSTReturn('success',1,$data));
    }
    /**
    * 用户签到
    */
    public function sign(){
        $m = new CM();
        $userId = model('app/users')->getUserId();
        $rs = $m->signScore($userId);
        return json_encode($rs);
    }
}
