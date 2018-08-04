<?php
namespace application\admin\model;
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
 * 微信用户业务处理
 */
class WxUsers extends Base{
	protected $pk = 'userId';
	/**
	 * 分页
	 */
	public function pageQuery(){
		$key = input('key');
		$where = [];
		if($key!='')$where[] = ['userName','like','%'.$key.'%'];
		return $this->where($where)->order('subscribeTime desc,userId desc')->paginate(input('post.limit/d'))->toArray();
	}
	
	/**
	 * 获取指定对象
	 */
	public function getById($id){
		return $this->where(['userId'=>$id])->find();
	}
	
	/**
	 * 与微信用户管理同步
	 */
	public function synchroWx(){
		$wx = WXAdmin();
		$data = $wx->wxUserGet();
		if(isset($data['errcode'])){
			if($data['errcode']!=0)return WSTReturn('与微信同步失败,请清除缓存重试');
		}
		if(isset($data['data']) && count($data['data']['openid'])>0){
			$this->where('userId>0')->delete();
			$dataList = [];
			foreach($data['data']['openid'] as $key=>$v){
				$datas = [];
				$datas['openId'] = $v;
				$datas['userName'] = '';
				$datas['userAreas'] = '';
				$datas['subscribeTime'] = date('Y-m-d H:i:s');
				$datas['userFill'] = -1;
				$dataList[] = $datas;
			}
			$this->insertAll($dataList);
			return WSTReturn("共".$data['total']."个用户需同步", 1,$dataList);
		}
	}
	
	public function wxLoad(){
		$openId = input('post.id');
		$wx = WXAdmin();
		$userInfo = $wx->wxUserInfo($openId);
		if(isset($userInfo['errcode'])){
			if($userInfo['errcode']!=0)return WSTReturn('与微信同步失败,请清除缓存重试');
		}
		$data = [];
		$nickname = json_encode($userInfo['nickname']);
		$nickname = preg_replace("/\\\u[ed][0-9a-f]{3}\\\u[ed][0-9a-f]{3}/","*",$nickname);//替换成*
		$nickname = json_decode($nickname);
		$data['userName'] = $nickname;
		$data['userSex'] = $userInfo['sex'];
		$data['userAreas'] = $userInfo['country'].$userInfo['province'].$userInfo['city'];
		$data['userPhoto'] = $userInfo['headimgurl'];
		$data['userRemark'] = $userInfo['remark'];
		$data['subscribeTime'] = date('Y-m-d H:i:s',$userInfo['subscribe_time']);
		$data['groupId'] = $userInfo['groupid'];
		$data['openId'] = $userInfo['openid'];
		$data['userFill'] = 1;
		$result = $this->update($data,['openId'=>$openId,'userFill'=>-1]);
		if(false !== $result){
			return WSTReturn("", 1);
		}else{
			return WSTReturn($this->getError(),-1);
		}
	}
	
	/**
	 * 编辑
	 */
	public function edit(){
		$userId = input('post.id/d');
		$data = input('post.');
		WSTUnset($data,'userId,userName,userSex,userAreas,userPhoto,subscribeTime,groupId,openId');
		$result = $this->allowField(true)->save($data,['userId'=>$userId]);
		if(false !== $result){
			$info = $this->getById($userId);
			$wdata = [];
			$wdata["openid"] = $info["openId"];
			$wdata["remark"] = $info["userRemark"];
			$wdata = json_encode($wdata,JSON_UNESCAPED_UNICODE);
			$wx = WXAdmin();
			$data = $wx->wxUpdateremark($wdata);
			return WSTReturn("修改成功", 1);
		}else{
			return WSTReturn($this->getError(),-1);
		}
	}
	/**
	* 写入unionId
	*/
	public function recodeUnionId(){
		$m = new \application\common\model\Users;
		// 取出已关联微信的账号
		$rs = $m->field('userId,wxOpenId')->where(['wxOpenId','<>',''])->where("isNull(wxUnionId)")->select();
		if(empty($rs))return WSTReturn('无需写入unionId');
		// 写入UnionId
		$wx = WXAdmin();
		$update = [];
		foreach($rs as $k=>$v){
			$data = $wx->wxUserInfo($v['wxOpenId']);
			$item = ['userId'=>$v['userId'],'wxUnionId'=>$data['unionid']];
			array_push($update, $item);
		}
		$flag = $m->saveAll($update);
		if($flag!==false)return WSTReturn('unionId写入完成',1);
		return WSTReturn($this->getError(),-1);
	}
}
