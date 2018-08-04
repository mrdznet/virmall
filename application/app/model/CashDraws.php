<?php
namespace application\app\model;
use think\Db;
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
 * 提现流水业务处理器
 */
use application\common\model\CashDraws as M;
class CashDraws extends Base{
     protected $pk = 'cashId';
     /**
      * 获取列表
      */
      public function pageQuery($targetType,$targetId){
      	  $type = (int)input('post.type',-1);
          $where = [];
          $where['targetType'] = (int)$targetType;
          $where['targetId'] = (int)$targetId;
          if(in_array($type,[0,1]))$where['moneyType'] = $type;
          return $this->field(['createTime'],true)
                      ->where($where)
                      ->order('cashId desc')
                      ->paginate()
                      ->toArray();
      }

      /**
       * 申请提现
       */
      public function drawMoney(){
          $userId = $this->getUserId();
          $m = new M();
          return $m->drawMoney($userId);
      }
}
