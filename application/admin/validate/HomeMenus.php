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
 * 菜单验证器
 */
class HomeMenus extends Validate{
	protected $rule = [
        'menuName' => 'require|max:30',
		'parentId' => 'number',
		'menuType' => 'require',
		'menuUrl' => 'require',
		'isShow' => 'require',
    ];
    
    protected $message = [
        'menuName.require' => '请输入菜单名称',
        'menuName.max' => '菜单名称不能超过10个字符',
        'parentId.number' => '无效的父级菜单',
        'menuType.require' => '请输入菜单类型',
        'menuUrl.require' => '请输入菜单Url',
        'isShow.require' => '请选择是否显示',
    ];
    
    protected $scene = [
        'add'   =>  ['menuName','parentId','menuType','menuUrl','isShow'],
        'edit'  =>  ['menuName','menuType','menuUrl','isShow']
    ]; 
}