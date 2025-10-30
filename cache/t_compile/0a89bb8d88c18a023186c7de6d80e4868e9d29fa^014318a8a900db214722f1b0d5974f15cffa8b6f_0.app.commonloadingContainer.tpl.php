<?php
/* Smarty version 4.5.5, created on 2025-10-30 17:37:32
  from 'app:commonloadingContainer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_69033fecc011c8_50383068',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '014318a8a900db214722f1b0d5974f15cffa8b6f' => 
    array (
      0 => 'app:commonloadingContainer.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69033fecc011c8_50383068 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="pkp_loading">
	<span class="pkp_spinner"></span>
	<span class="message"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.loading"),$_smarty_tpl ) );?>
</span>
</div>
<?php }
}
