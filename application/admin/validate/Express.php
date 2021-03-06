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
 * 快递验证器
 */
class express extends Validate{
	protected $rule = [
        'expressName' => 'require|max:30',
    ];
    
    protected $message = [
        'expressName.require' => '请输入快递名称',
        'expressName.max' => '快递名称不能超过10个字符',
    ];
    
    protected $scene = [
        'add'   =>  ['expressName'],
        'edit'  =>  ['expressName'],
    ]; 
}