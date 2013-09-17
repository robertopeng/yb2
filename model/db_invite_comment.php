<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_invite_comment.php 100 2013-09-10 10:11:42Z rob $ 

class db_invite_comment extends spModel{  
	var $pk    = "id"; 
	var $table = "invite_comment";

	// 获取uid的邀请评论列表
	function list_ic($uid,$page=1){
		$data   = array();
		$column = 'i.id,i.uid,i.touid,m.username as to_user_name,m.domain as to_domain,sum(isnew) AS isnew,i.status,i.url,i.time';
		$sql    = "SELECT $column FROM `".DBPRE."invite_comment` AS i LEFT JOIN `".DBPRE."member` AS m ON i.uid = m.uid WHERE i.touid = '$uid' and status != '$uid'  GROUP BY i.uid ORDER BY i.isnew desc ,i.time desc ";
		$data['data'] = $this->spPager($page,10)->findSql($sql);
		$data['page'] = $this->spPager()->getPager();
		return $data;
	}
	
	// 发送一条邀请评论到指定的用户
	function send_ic($uid, $touid, $title, $url){
		$row = array(
			'uid'   => $uid,
			'touid' => $touid,
			'isnew' => 1,
			'title' => $title, 
			'url'   => $url, 
			'time'  => time()
		);
		$this->create($row);
		// $num = $this->findCount(array('uid'=>$uid,'touid'=>$touid));
		// $this->update(array('uid'=>$uid,'touid'=>$touid),array('num'=>$num));
		return true;
	}

	// 批量发送邀请评论
	// function send_all_ic($uid, $data){

	// }

	// 删除指定用户的某条邀请评论
	function del_ic($uid,$id){
		$rs = $this->findBy('id',$id);
		if($rs['uid'] == $uid || $rs['touid'] == $uid){
			if($rs['status'] == 0){  //如果没人删除我标记删除
				$this->updateField(array('id'=>$id),'status',$uid);
				return true;
			}else if($rs['status'] != $uid && $rs['status'] != 0){ //如果标记删除人不是我则表示对方标记删除我也删除
				$this->deleteByPk($id);
				return true;
			}else{
				return false;
			}
		}else{
			return true;
		}
	}

}
?>