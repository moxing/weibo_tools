<?php /* Smarty version Smarty-3.1.13, created on 2013-07-30 16:05:38
         compiled from "tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3040651f762ac8d24d5-42409985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db97a3f8af80d260372ece8474eb31d980e7a586' => 
    array (
      0 => 'tpl\\index.tpl',
      1 => 1375171478,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3040651f762ac8d24d5-42409985',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51f762ac94c5f8_41765772',
  'variables' => 
  array (
    'timelines' => 0,
    'post' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f762ac94c5f8_41765772')) {function content_51f762ac94c5f8_41765772($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("tpl/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="row-fluid">
    <div class="span8 well media-list">
        <?php  $_smarty_tpl->tpl_vars['post'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['post']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['timelines']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['post']->key => $_smarty_tpl->tpl_vars['post']->value){
$_smarty_tpl->tpl_vars['post']->_loop = true;
?>
            <?php echo $_smarty_tpl->getSubTemplate ("tpl/post.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('name'=>$_smarty_tpl->tpl_vars['post']->value), 0);?>

        <?php } ?>
    </div>
</div>


<?php echo $_smarty_tpl->getSubTemplate ("tpl/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>