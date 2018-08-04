<?php
namespace application\weapp\controller;
use application\weapp\model\CashConfigs as M;
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
 * 提现账号控制器
 */
class Cashconfigs extends Base{
    // 前置方法执行列表
    protected $beforeActionList = [
        'checkAuth',
    ];
    /**
     * 查看提现账号
     */
    public function index(){
    	$data['areas'] =  model('areas')->listQuery(0);
    	$data['banks'] =  model('banks')->listQuery(0);
    	echo jsonReturn('success',1,$data);die;
    }
    /**
     * 获取用户数据
     */
    public function pageQuery(){
        $userId = model('weapp/users')->getUserId();
        $m = new M();
        $data['list'] = $m->pageQuery(0,$userId);
        $rs = model('Users')->getFieldsById($userId,['userMoney','rechargeMoney']);
        // 获取后台限制的最低提现金额
        $data['drawCashLimit'] = WSTConf('CONF.drawCashUserLimit');
        $data['putMoney'] = WSTBCMoney($rs['userMoney'],-$rs['rechargeMoney']);
        echo jsonReturn('success',1,$data);die;
    }
    /**
    * 获取记录
    */
    public function getById(){
       $id = (int)input('id');
       $m = new M();
       $data = $m->getById($id);
       echo jsonReturn('success',1,$data);die;
    }
    /**
     * 新增
     */
    public function add(){
        $m = new M();
        $rs = $m->add();
        return jsonReturn('',1,$rs);
    }
    /**
     * 编辑
     */
    public function edit(){
        $m = new M();
        $rs = $m->edit();
        return jsonReturn('',1,$rs);
    }
    /**
     * 删除
     */
    public function del(){
        $m = new M();
        $rs = $m->del();
        return jsonReturn('',1,$rs);
    }
}
