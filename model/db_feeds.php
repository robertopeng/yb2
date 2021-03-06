<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: db_feeds.php 730 2012-06-06 13:29:57Z anythink $ 


class db_feeds extends ybModel  
{  
	var $pk = "id"; // 主键  
	var $table = "feeds"; // 数据表的名称 
	
	var $linker = array(  
        array(  
             'type' => 'hasone',   // 关联类型，这里是一对一关联  
            'map' => 'user',    // 关联的标识  
             'mapkey' => 'uid', // 本表与对应表关联的字段名  
             'fclass' => 'db_member', // 对应表的类名  
            'fkey' => 'uid',    // 对应表中关联的字段名
			'field'=>'uid,username,domain ',//你要限制的字段     
            'enabled' => true     // 启用关联  
        ), 
		  
    );  
	


	/*添加或删除喜欢动态*/
	function changeFeedsLike($rows,$uid)
	{
		$result = $this->find(array('bid'=>$rows['bid'],'type'=>'likes','uid'=>$uid));
		if(is_array($result))
		{
			$this->delete(array('bid'=>$rows['bid'],'uid'=>$uid,'type'=>'likes'));
			spClass('db_blog')->decrField(array('bid'=>$rows['bid']),'feedcount'); //减少动态统计
		}else{
			$this->create(array('bid'=>$rows['bid'],'title'=>'喜欢本内容','uid'=>$uid,'type'=>'likes','time'=>time()));
			spClass('db_blog')->incrField(array('bid'=>$rows['bid']),'feedcount'); //增加动态统计
		}
	}
	
	/*添加转载动态*/
	function addRep($rows,$uid)
	{
		$this->create(array('bid'=>$rows['bid'],'title'=>'转载本内容','uid'=>$uid,'type'=>'foword','time'=>time()));
			spClass('db_blog')->incrField(array('bid'=>$rows['bid']),'feedcount'); //增加动态统计
	
	}
	
	
	/*添加转载动态*/
	function recommend($rows,$uid)
	{
		$this->create(array('bid'=>$rows['bid'],'title'=>'推荐本内容','uid'=>$uid,'type'=>'recomm','time'=>time()));
		spClass('db_blog')->incrField(array('bid'=>$rows['bid']),'feedcount'); //增加动态统计
	}
	

	
	
	/*对回复内容进行feed parentkey 是用来删除该动态的*/
	function replayFeeds($rows,$info,$uid,$parentkey)
	{
			$this->create(array('bid'=>$rows['bid'],'type'=>'reply','parentkey'=>$parentkey,'title'=>'回复本内容','info'=>$info,'uid'=>$uid,'time'=>time()));
			spClass('db_blog')->incrField(array('bid'=>$rows['bid']),'feedcount'); //增加动态统计
	}
	
	/*对回复内容进行feed 删除*/
	function delReplayFeed($id,$bid){
		$this->delete(array('parentkey'=>$id));
		spClass('db_blog')->decrField(array('bid'=>$bid),'replaycount');
		spClass('db_blog')->decrField(array('bid'=>$bid),'feedcount');
	}

	
}
?>