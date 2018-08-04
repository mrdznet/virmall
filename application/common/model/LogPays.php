<?php
namespace application\common\model;
use think;
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
 * 支付日志类
 */
class LogPays extends Base{
	
	/**
	 * 添加支付日志
	 */
	public function addPayLog($obj){
		$obj['createTime'] = date('Y-m-d H:i:s');
		$this->insert($obj);
	}
	
	/**
	 * 获取支付日志
	 */
	public function getPayLog($obj){
		return $this->where($obj)->find();
	}
	
	/**
	 * 删除支付日志
	 */
	public function delPayLog($obj){
		return $this->where($obj)->delete();
	}
	
}
