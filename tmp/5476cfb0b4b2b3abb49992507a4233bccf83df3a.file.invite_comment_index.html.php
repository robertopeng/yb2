<?php /* Smarty version Smarty-3.0.6, created on 2013-09-17 02:55:47
         compiled from "tplv2/invite_comment_index.html" */ ?>
<?php /*%%SmartyHeaderCode:4086941765237a893350782-52676397%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5476cfb0b4b2b3abb49992507a4233bccf83df3a' => 
    array (
      0 => 'tplv2/invite_comment_index.html',
      1 => 1379317169,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4086941765237a893350782-52676397',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("require_header.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('loadedit','yes'); echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
<script>

$(document).ready(function(){ 
    pmlist();
    $('#send_submit').click(function(){
        var name = $('#niname').val();
        var title = $('#title').val();
        var url  = $('#url').val();
        if(name == '' || title == ''){
            waring('发信人或内容不能为空');
            return false;
        }
        $('#pm_loading,#send_submit').toggle();
        $.ybAPI('invite_comment','send_ic',{username:name,title:title,url:url},function(data){
            $('#pm_loading,#send_submit').toggle();
            if(data.status == 0){
                waring(data.msg);
            }else{
                tips('您的信件已经成功发送');
                $('#niname,,#title,#url').val('');
            }
        });
    })
    // $('#pm_send').click(function(){
    //     alert('run!');
    //     yb_load_feeds('blog','feeds',{ uid:3 ,pagelimit:10 }); 
    // });
})

</script>
<div id="index">
    <div id="article">
        
        <div id="pm_title">
            <div class="post_bg">
                <a href="javascript:;" onclick="pmlist()"><span class="current" id="pm_list">我的邀请评论</span></a>
                <a href="javascript:;" onclick="openPmpost()"><span id="pm_post">发送邀请</span></a>
            </div>
            <div class="clear"></div>
        </div>
        
        <div id="pm_index">
            <div id="feed_loading" style="margin-left:275px;"></div>
            <div class="pm_list"></div>
            
            <div class="pm_post" id="pm_send" style="display:none">
                <div class="pp_con">
                    <div class="pp_title"><input type="text" id="niname" class="iptname"><span>收信人昵称</span></div>
                    <div class="pp_content">
                        <textarea name="textarea" id="title"></textarea>
                    </div>
                    <div class="pp_content">
                        <textarea name="textarea" id="url"></textarea>
                    </div>
                    
                    <div class="pp_btn">
                        <a href="javascript:;" id="send_submit"><span>发送</span></a>
                        <div class="sub_loading" id="pm_loading" style="display:none;padding-left:20px"></div>
                    </div>
                </div>
            <div id="feedArea">
                <!-- <script type="text/javascript">
                     $(document).ready(function(){  yb_load_feeds('blog','feeds',{ uid:3 ,pagelimit:10 }); })
                </script> -->
                <div id="feed_loading"></div>
                <div id="feed_box"></div>
            </div>
 

        </div>
            
        </div>
        
        <div class="pm_none follow_font" id="follow_font" style="display:none;">
             <h2>您还没有私信</h2>
        </div>
            
        <div id="paging"></div>

    </div>
    <div id="aside">
        <?php $_template = new Smarty_Internal_Template("require_sider.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>
    </div>
</div>
<?php $_template = new Smarty_Internal_Template("require_footer.html", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php $_template->updateParentVariables(0);?><?php unset($_template);?>