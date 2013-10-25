<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: invite_comment.php 738 2012-06-07 16:45:29Z anythink $ 


//私信处理
class invite_comment extends top
{   
    private $user_data = '';
    
    function __construct()
    {  
        parent::__construct(); 
        if(!islogin()){prient_jump(spUrl('main'));}   
        $this->favatag = spClass('db_mytag')->myFavaTag($_SESSION['uid'],5); //显示收藏标签
        $this->memberinfo();
    }  
    
    /*显示我的设置界面*/
    function index()
    {
        if ($this->spArgs('bid'))
        {
            $rs = spClass('db_theme')->getByBid(intval($this->spArgs('bid')));
        }
        else if ($this->spArgs('uid') != '')
        {
            $rs = spClass('db_theme')->getByUid($this->spArgs('uid'));
        }
        else if ($this->spArgs('domain') != 'home' && $this->spArgs('domain') != '')
        {
            $rs = spClass('db_theme')->getByDomain($this->spArgs('domain'));
        }
        if (!is_array($rs)) 
        {
            err404('您访问的用户不存在,用户可能已经更改了个性域名');
        }
        
        $skin = spClass('db_theme')->find(array('uid'=>$rs['uid']));
        if ($skin['setup']) 
        {
            $skin['setup'] = unserialize($skin['setup']);
        }    
        $rs['blogtag'] = explode(',',$rs['blogtag']); //切割成数组
        $this->user_data = $rs;
        // $this->user_skin = $skin; 
        // dump($rs);
        $this->username = $this->user_data['username'];
        $this->usertag = $this->user_data['blogtag'];
        $this->domain = ($this->user_data['domain'] == '') ? 'home' : $this->user_data['domain'];  //如果没定义domain 就是home  
        $this->touid = $this->user_data['uid'];

        $this->display('invite_comment_index.html');    
    }
    
    function detail(){

        if(!$this->spArgs('uid')){
            header('Location:'.spUrl('pm','index'));
        }
        $this->touid = $this->spArgs('uid');
        $this->display('invite_comment_detail.html');
    }
    
}