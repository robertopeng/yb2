<?php /* Smarty version Smarty-3.0.6, created on 2013-09-13 05:06:02
         compiled from "tplv2/theme/default/userheader.html" */ ?>
<?php /*%%SmartyHeaderCode:1424790375232811a611a13-11401746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c22cf3d04153a08cf685df1096615f167c61731' => 
    array (
      0 => 'tplv2/theme/default/userheader.html',
      1 => 1378899150,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1424790375232811a611a13-11401746',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
    <div id="avatar"><a href="<?php echo goUserHome(array('domain'=>$_smarty_tpl->getVariable('domain')->value,'uid'=>$_smarty_tpl->getVariable('touid')->value),$_smarty_tpl);?>
" title="我的博客"><div class="head_bg"><img src="<?php echo avatar(array('uid'=>$_smarty_tpl->getVariable('touid')->value,'size'=>'middle'),$_smarty_tpl);?>
" alt="<?php echo $_smarty_tpl->getVariable('username')->value;?>
" class="face"/></div></a></div>
		
		<div id="usertitle" >
		    <div class="blogname" id="title"><a href="<?php echo goUserHome(array('domain'=>$_smarty_tpl->getVariable('domain')->value,'uid'=>$_smarty_tpl->getVariable('touid')->value),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->getVariable('username')->value;?>
</a></div>
			<?php if ($_smarty_tpl->getVariable('isfollow')->value==1){?>
				<div class="btn_follow_1" id="follow_unlink_<?php echo $_smarty_tpl->getVariable('touid')->value;?>
"><a href="javascript:;" id="followed"  onclick="fllow('unlink',<?php echo $_smarty_tpl->getVariable('touid')->value;?>
)">已关注</a></div>
				<div class="btn_follow_0" id="follow_link_<?php echo $_smarty_tpl->getVariable('touid')->value;?>
" style="display:none"><a href="javascript:;" id="followed"  onclick="fllow('link',<?php echo $_smarty_tpl->getVariable('touid')->value;?>
)">加为关注</a></div>
			<?php }elseif($_smarty_tpl->getVariable('isfollow')->value==0){?>
				<div class="btn_follow_0" id="follow_link_<?php echo $_smarty_tpl->getVariable('touid')->value;?>
"><a href="javascript:;" onclick="fllow('link',<?php echo $_smarty_tpl->getVariable('touid')->value;?>
)">加为关注</a></div>
				<div class="btn_follow_1" id="follow_unlink_<?php echo $_smarty_tpl->getVariable('touid')->value;?>
"  style="display:none"><a href="javascript:;" id="followed"  onclick="fllow('unlink',<?php echo $_smarty_tpl->getVariable('touid')->value;?>
)">已关注</a></div>
			<?php }?>
		</div>
		<?php if ($_smarty_tpl->getVariable('signhtml')->value){?>
		<div id="sign" class="userinfo">
		    <div class="quote">
		    <blockquote><?php echo $_smarty_tpl->getVariable('signhtml')->value;?>
</blockquote>
			</div>
		</div>
		<?php }?>