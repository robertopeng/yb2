<?php
/////////////////////////////////////////////////////////////////
//云边开源轻博, Copyright (C)   2010 - 2011  qing.thinksaas.cn 
//EMAIL:nxfte@qq.com QQ:234027573                              
//$Id: invite_comment.php 738 2012-06-07 16:45:29Z anythink $ 


//私信处理
class invite_comment extends top
{ 

    function __construct(){  
         parent::__construct(); 
          if(!islogin()){prient_jump(spUrl('main'));}   
          $this->favatag = spClass('db_mytag')->myFavaTag($_SESSION['uid'],5); //显示收藏标签
          $this->memberinfo();
     }  
    
    /*显示我的设置界面*/
    function index(){
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