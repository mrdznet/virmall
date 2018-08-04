<?php
namespace application\weapp\controller;
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
 * 资金流水控制器
 */
class Logmoneys extends Base{
	// 前置方法执行列表
    protected $beforeActionList = [
        'checkAuth'
    ];
	/**
     * 查看用户资金流水
     */
	public function usermoneys(){
		$userId = model('weapp/users')->getUserId();
		$rs = model('Users')->getFieldsById($userId,['lockMoney','userMoney','payPwd']);
		$rs['isSetPayPwd'] = ($rs['payPwd']=='')?0:1;
        unset($rs['payPwd']);
		$rs['num'] = count(model('cashConfigs')->listQuery(0,$userId));
		return jsonReturn("success", 1,$rs);
	}
	/**
	* 验证支付密码
	*/
	public function checkPayPwd(){
		$rs = model('weapp/users')->checkPayPwd();
		return $rs;
	}
	/**
	 * 资金流水
	 */
	public function record(){
		$userId = model('weapp/index')->getUserId();
		$rs = model('Users')->getFieldsById($userId,['lockMoney','userMoney']);
		return jsonReturn("success", 1,$rs);
	}
	/**
	 * 列表
	 */
	public function pageQuery(){
		$userId = model('weapp/index')->getUserId();
		$data = model('LogMoneys')->pageQuery("",$userId);
		if(!empty($data['data'])){
			foreach($data['data'] as $k=>$v){
				// 删除无用字段
				unset($data['data'][$k]['dataFlag']);
				unset($data['data'][$k]['targetType']);
				unset($data['data'][$k]['targetId']);
				unset($data['data'][$k]['dataId']);
				unset($data['data'][$k]['dataSrc']);
				unset($data['data'][$k]['id']);
				unset($data['data'][$k]['payType']);
				unset($data['data'][$k]['tradeNo']);
			}
		}
		return jsonReturn("success", 1,$data);
	}
	/**
	 * 充值[用户]
	 */
	public function toRecharge(){
		$userId =  model('weapp/users')->getUserId();
    	$rs = model('Users')->getFieldsById($userId,'userMoney');
    	$data['userMoney'] = $rs;
		$payments = model('common/payments')->recharePayments('3');
		$data['payments'] = $payments;
		$chargeItems = model('common/ChargeItems')->queryList();
		$data['chargeItems'] = $chargeItems;
		return jsonReturn("success", 1,$data);
	}
}
