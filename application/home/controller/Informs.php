<?php
namespace application\home\controller;
use application\common\model\Informs as M;
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
 * 订单投诉控制器
 */
class Informs extends Base{
    protected $beforeActionList = [
       'checkAuth'=>['only'=>'index,queryusercomplainbypage,complain,savecomplain,getusercomplaindetail'],
       'checkShopAuth'=>['only'=>'shopcomplain,queryshopcomplainbypage,getshopcomplaindetail,respond,saverespond']
    ];
    /******************************** 用户 ******************************************/
    /**
    * 查看举报列表
    */
	public function index(){
		return $this->fetch('users/informs/list_inform');
	}
    /**
    * 获取用户举报列表
    */    
    public function queryUserInformPage(){
        $m = model('Informs');
        return $m->queryUserInformByPage();
        
    }
    /**
     * 商品举报页面
     */
    public function inform(){
    	$m = new M();
        $data = $m->inform();
        if($data['status'] == 1){
        $this->assign("data",$data);
        return $this->fetch("users/informs/informs");
        }else{
        $this->assign("message",$data['msg']);
        return $this->fetch("error_msg");
        }
    }
    /**
     * 保存举报信息
     */
    public function saveInform(){
        return model('Informs')->saveInform();
    }
    /**
     * 用户查举报详情
     */
    public function getUserInformDetail(){
        $data = model('Informs')->getUserInformDetail(0);
        $this->assign("data",$data);
        return $this->fetch("users/informs/inform_detail");
    }


   
    


}
