<?php 
namespace application\common\validate;
use think\Validate;
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
 * 订单投诉验证器
 */
class Informs extends Validate{
	protected $rule = [
		'informType'  => 'in:1,2,3,4',
		'informContent'   => 'require|length:3,600',
		'respondContent' => 'require|length:3,600'
	];
	
	protected $message  =   [
		'informType.in'   => '无效的投诉类型！',
		'informContent.require' => '投诉内容不能为空',
		'informContent.length' => '投诉内容应为3-200个字',
		'respondContent.require'   => '应诉内容不能为空',
		'respondContent.length' => '应诉内容应为3-200个字'
	];

    protected $scene = [
        'add'   =>  ['informType','informContent'],
        'edit'   =>  ['informType','informContent'],
        'respond' =>['respondContent']
    ]; 
}