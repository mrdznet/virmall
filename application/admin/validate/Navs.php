<?php
namespace application\admin\validate;
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
 * 导航验证器
 */
class Navs extends Validate{
	protected $rule = [
		'navTitle' => 'require|max:30',
		'navUrl' => 'require',
		'navSort' => 'integer',
	];

	protected $message = [
        'navTitle.require' => '请输入导航名称',
        'navTitle.max' => '导航名称不能超过10个字符',
        'navUrl.require' => '请输入导航链接',
        'navSort.integer' => '排序号只能为整数',
	];
	
	protected $scene = [
		'add'=>['navTitle','navUrl','navSort'],
		'edit'=>['navTitle','navUrl','navSort'],
	];
	
}