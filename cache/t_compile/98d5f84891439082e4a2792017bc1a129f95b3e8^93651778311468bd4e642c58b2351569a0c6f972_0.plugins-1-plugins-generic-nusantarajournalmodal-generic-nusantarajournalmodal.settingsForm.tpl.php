<?php
/* Smarty version 4.5.5, created on 2025-10-30 16:25:54
  from 'plugins-1-plugins-generic-nusantarajournalmodal-generic-nusantarajournalmodal:settingsForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_69032f225da2b2_82873702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93651778311468bd4e642c58b2351569a0c6f972' => 
    array (
      0 => 'plugins-1-plugins-generic-nusantarajournalmodal-generic-nusantarajournalmodal:settingsForm.tpl',
      1 => 1761766457,
      2 => 'plugins-1-plugins-generic-nusantarajournalmodal-generic-nusantarajournalmodal',
    ),
  ),
  'includes' => 
  array (
    'app:controllers/notification/inPlaceNotification.tpl' => 1,
  ),
),false)) {
function content_69032f225da2b2_82873702 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
	$(function() {
		$('#nusantaraJournalModalSettingsForm').pkpHandler('$.pkp.controllers.form.AjaxFormHandler');
	});
<?php echo '</script'; ?>
>

<form class="pkp_form" id="nusantaraJournalModalSettingsForm" method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_COMPONENT,'op'=>"manage",'category'=>"generic",'plugin'=>$_smarty_tpl->tpl_vars['pluginName']->value,'verb'=>"settings",'save'=>true),$_smarty_tpl ) );?>
">
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf'][0], array( array(),$_smarty_tpl ) );?>

	<?php $_smarty_tpl->_subTemplateRender("app:controllers/notification/inPlaceNotification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('notificationId'=>"nusantaraJournalModalSettingsFormNotification"), 0, false);
?>

<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormArea'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormArea'][0] : null;
if (!is_callable($_block_plugin1)) {
throw new SmartyException('block tag \'fbvFormArea\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormArea', array('id'=>"journalModalSettings"));
$_block_repeat=true;
echo $_block_plugin1(array('id'=>"journalModalSettings"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
	<?php $_block_plugin2 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0] : null;
if (!is_callable($_block_plugin2)) {
throw new SmartyException('block tag \'fbvFormSection\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormSection', array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.journal"));
$_block_repeat=true;
echo $_block_plugin2(array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.journal"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"text",'id'=>"eyebrowLabel",'name'=>"eyebrowLabel",'value'=>$_smarty_tpl->tpl_vars['eyebrowLabel']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.eyebrowLabel",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"text",'id'=>"editorInChief",'name'=>"editorInChief",'value'=>$_smarty_tpl->tpl_vars['editorInChief']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.editor",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"textarea",'id'=>"issn",'name'=>"issn",'value'=>$_smarty_tpl->tpl_vars['issn']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.issn",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"textarea",'id'=>"frequency",'name'=>"frequency",'value'=>$_smarty_tpl->tpl_vars['frequency']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.frequency",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

	<?php $_block_repeat=false;
echo $_block_plugin2(array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.journal"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

	<?php $_block_plugin3 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0] : null;
if (!is_callable($_block_plugin3)) {
throw new SmartyException('block tag \'fbvFormSection\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormSection', array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.indexing"));
$_block_repeat=true;
echo $_block_plugin3(array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.indexing"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"textarea",'id'=>"indexing",'name'=>"indexing",'value'=>$_smarty_tpl->tpl_vars['indexing']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.indexing",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM'],'description'=>"plugins.generic.nusantarajournalmodal.settings.indexing.description"),$_smarty_tpl ) );?>

	<?php $_block_repeat=false;
echo $_block_plugin3(array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.indexing"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

	<?php $_block_plugin4 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0] : null;
if (!is_callable($_block_plugin4)) {
throw new SmartyException('block tag \'fbvFormSection\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormSection', array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.links"));
$_block_repeat=true;
echo $_block_plugin4(array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.links"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"text",'id'=>"primaryLabel",'name'=>"primaryLabel",'value'=>$_smarty_tpl->tpl_vars['primaryLabel']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.primaryLabel",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"text",'id'=>"primaryUrl",'name'=>"primaryUrl",'value'=>$_smarty_tpl->tpl_vars['primaryUrl']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.primaryUrl",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"text",'id'=>"secondaryLabel",'name'=>"secondaryLabel",'value'=>$_smarty_tpl->tpl_vars['secondaryLabel']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.secondaryLabel",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"text",'id'=>"secondaryUrl",'name'=>"secondaryUrl",'value'=>$_smarty_tpl->tpl_vars['secondaryUrl']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.secondaryUrl",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

	<?php $_block_repeat=false;
echo $_block_plugin4(array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.links"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

	<?php $_block_plugin5 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0] : null;
if (!is_callable($_block_plugin5)) {
throw new SmartyException('block tag \'fbvFormSection\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormSection', array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.additional"));
$_block_repeat=true;
echo $_block_plugin5(array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.additional"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"text",'id'=>"doi",'name'=>"doi",'value'=>$_smarty_tpl->tpl_vars['doi']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.doi",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"textarea",'id'=>"license",'name'=>"license",'value'=>$_smarty_tpl->tpl_vars['license']->value,'label'=>"plugins.generic.nusantarajournalmodal.settings.license",'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

	<?php $_block_repeat=false;
echo $_block_plugin5(array('title'=>"plugins.generic.nusantarajournalmodal.settings.header.additional"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);
$_block_repeat=false;
echo $_block_plugin1(array('id'=>"journalModalSettings"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvFormButtons'][0], array( array('submitText'=>"common.save"),$_smarty_tpl ) );?>


	<p><span class="formRequired"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.requiredField"),$_smarty_tpl ) );?>
</span></p>
</form>
<?php }
}
