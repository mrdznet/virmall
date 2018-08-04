<?php
namespace application\common\model;
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
 * 充值项业务处理
 */
class ChargeItems extends Base{
	/**
	 * 分页
	 */
	public function queryList(){
		$where = [];
		$where['dataFlag'] = 1;
		return $this->where($where)->field(true)->order('itemSort asc,id asc')->select();
	}
	
	public function getItemMoney($itmeId){
		$where = [];
		$where['dataFlag'] = 1;
		$where['id'] = $itmeId;
		return $this->where($where)->field("chargeMoney,giveMoney")->find();
	}
}
