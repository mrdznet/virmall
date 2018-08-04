<?php
namespace application\app\controller;
use application\common\model\Invoices as M;
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
 * 发票信息控制器
 */
class Invoices extends Base{
     /**
     * 获取发票列表
     */
    public function pageQuery(){
        $m = new M();
        $userId = model('app/Users')->getUserId();
        $rs = $m->pageQuery(5,$userId);
        return json_encode(WSTReturn('success',1,$rs));
    }
    /**
     * 新增发票
     */
    public function add(){
        $m = new M();
        $userId = model('app/Users')->getUserId();
        $rs = $m->add($userId);
        return json_encode($rs);
    }
    /**
     * 新增发票
     */
    public function edit(){
        $m = new M();
        $userId = model('app/Users')->getUserId();
        $rs = $m->edit($userId);
        return json_encode($rs);
    }
}
