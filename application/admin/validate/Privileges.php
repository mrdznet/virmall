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
 * 权限验证器
 */
class Privileges extends Validate{
	protected $rule = [
	    'privilegeName' => 'require|max:60',
        'privilegeCode' => 'require|max:30',
        'menuId' => 'number',
    ];
    
    protected $message = [
        'privilegeName.require' => '请输入权限名称',
        'privilegeName.max' => '权限名称不能超过20个字符',
        'privilegeCode.require' => '请输入权限代码',
        'privilegeCode.max' => '权限代码不能超过10个字符',
        'menuId.number' => '无效的权限菜单',
    ];
    
    protected $scene = [
        'add'   =>  ['privilegeName','privilegeCode','menuId'],
        'edit'  =>  ['privilegeName','privilegeCode'],
    ]; 
}