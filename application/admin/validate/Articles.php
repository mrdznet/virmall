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
 * 文章验证器
 */
class Articles extends Validate{
	protected $rule = [
	    'articleTitle' => 'require|max:150',
		'articleKey' => 'require|max:300',
	    'articleContent' => 'require',
    ];
     
    protected $message = [
        'articleTitle.require' => '请输入文章标题',
        'articleTitle.max' => '文章标题不能超过50个字符',
        'articleKey.require' => '请输入关键字',
        'articleKey.max' => '关键字不能超过100个字符',
        'articleContent.require' => '请输入文章内容',

    ];
    protected $scene = [
        'add'   =>  ['articleTitle','articleKey','articleContent'],
        'edit'  =>  ['articleTitle','articleKey','articleContent']
    ]; 
}