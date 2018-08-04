<?php
namespace application\home\controller;
use application\common\model\CashDraws as M;
use application\common\model\Users as MUsers;
use application\common\model\Shops as MShops;
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
 * 提现记录控制器
 */
class Cashdraws extends Base{
    protected $beforeActionList = [
       'checkAuth'=>['only'=>'index,pagequery,toedit,drawmoney'],
       'checkShopAuth'=>['only'=>'shopindex,pagequerybyshop,toeditbyshop,drawmoneybyshop']
    ];
    /**
     * 查看用户资金流水
     */
	public function index(){
		return $this->fetch('users/cashdraws/list');
	}
    /**
     * 获取用户数据
     */
    public function pageQuery(){
        $userId = (int)session('WST_USER.userId');
        $data = model('CashDraws')->pageQuery(0,$userId);
        return WSTReturn("", 1,$data);
    }

    /**
     * 跳转提现页面
     */
    public function toEdit(){
        $userId = (int)session('WST_USER.userId');
        $this->assign('accs',model('CashConfigs')->listQuery(0,$userId));
        $m = new MUsers();
        $user = $m->getFieldsById($userId,["userMoney","rechargeMoney"]);
        $this->assign('user',$user);
        return $this->fetch('users/cashdraws/box_draw');
    }

    /**
     * 提现
     */ 
    public function drawMoney(){
        $m = new M();
        return $m->drawMoney();
    }


    /**
     * 查看用户资金流水
     */
    public function shopIndex(){
        return $this->fetch('shops/cashdraws/list');
    }
    /**
     * 获取用户数据
     */
    public function pageQueryByShop(){
        $shopId = (int)session('WST_USER.shopId');
        $data = model('CashDraws')->pageQuery(1,$shopId);
        return WSTReturn("", 1,$data);
    }
    /**
     * 申请提现
     */
    public function toEditByShop(){
        $this->assign('object',model('shops')->getShopAccount());
        $m = new MShops();
        $shopId = (int)session('WST_USER.shopId');
        $shop = $m->getFieldsById($shopId,["shopMoney","rechargeMoney"]);
        $this->assign('shop',$shop);
        return $this->fetch('shops/cashdraws/box_draw');
    }
    /**
     * 提现
     */ 
    public function drawMoneyByShop(){
        $m = new M();
        return $m->drawMoneyByShop();
    }
}
