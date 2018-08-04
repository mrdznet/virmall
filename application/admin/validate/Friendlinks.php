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
 * 友情链接验证器
 */
class Friendlinks extends Validate{
	protected $rule = [
	    'friendlinkName' => 'require|max:90',
        'friendlinkUrl' => 'require',
    ];
    
    protected $message = [
        'friendlinkName.require' => '请输入网站名称',
        'friendlinkName.max' => '网站名称不能超过30个字符',
        'friendlinkUrl.require' => '请输入网址',
    ];

    protected $scene = [
        'add'   =>  ['friendlinkName'],
        'edit'  =>  ['friendlinkName'],
    ]; 
}