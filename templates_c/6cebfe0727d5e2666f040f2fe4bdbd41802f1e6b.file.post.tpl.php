<?php /* Smarty version Smarty-3.1.13, created on 2013-07-30 16:34:22
         compiled from "tpl\post.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2550651f772fca037a7-88817902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6cebfe0727d5e2666f040f2fe4bdbd41802f1e6b' => 
    array (
      0 => 'tpl\\post.tpl',
      1 => 1375173260,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2550651f772fca037a7-88817902',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51f772fca037a6_62374382',
  'variables' => 
  array (
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f772fca037a6_62374382')) {function content_51f772fca037a6_62374382($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\My Documents\\GitHub\\weibo-tools\\lib\\smarty\\plugins\\modifier.date_format.php';
?><li class="media">
  <a class="pull-left" href="/u.php?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['user']['id'];?>
">
    <img class="media-object" src="<?php echo $_smarty_tpl->tpl_vars['post']->value['user']['profile_image_url'];?>
">
  </a>
  <h5 class="media-heading"><a href="/u.php?id=<?php echo $_smarty_tpl->tpl_vars['post']->value['user']['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['user']['name'];?>
</a></h5>
  <div class="media-body">
    <div class="media">
      <?php echo $_smarty_tpl->tpl_vars['post']->value['text'];?>

   </div>
   <label><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['post']->value['created_at'],"%y-%m-%d  %T");?>
</label>
  </div>
</li><?php }} ?>