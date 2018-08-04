<?php
namespace application\admin\behavior;
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
 * 记录用户的访问日志
 */
class ListenOperate 
{
    public function run($params){
        $urls = WSTConf('listenUrl');
        $request = request();
        $visit = strtolower($request->module()."/".$request->controller()."/".$request->action());
        if(array_key_exists($visit,$urls)&& $visit!='admin/logoperates/pagequery'){
            $privilege = current($urls[$visit]);
            $data = [];
            $data['menuId'] = $privilege['menuId'];
            $data['operateUrl'] = $_SERVER['REQUEST_URI'];
            $data['operateDesc'] = $privilege['name'];
            $data['content'] = !empty($_REQUEST)?json_encode($_REQUEST):'';
            $data['operateIP'] = $request->ip();
            model('admin/LogOperates')->add($data);
        }
    }
}