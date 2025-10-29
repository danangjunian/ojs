<?php
/* Smarty version 4.5.5, created on 2025-10-30 02:36:45
  from 'app:admincontextSettings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_69026ccd0dbb85_87277227',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3ee43e7a62305892b9bec9b1e42ee960100b530' => 
    array (
      0 => 'app:admincontextSettings.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_69026ccd0dbb85_87277227 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6984318569026ccd0aff80_86307850', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_6984318569026ccd0aff80_86307850 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_6984318569026ccd0aff80_86307850',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<h1 class="app__pageHeading">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.settings.wizard"),$_smarty_tpl ) );?>

	</h1>

	<tabs :track-history="true">
		<tab id="setup" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup"),$_smarty_tpl ) );?>
">
			<tabs :is-side-tabs="true" :track-history="true">
				<tab id="context" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"context.context"),$_smarty_tpl ) );?>
">
					<pkp-form
						v-bind="components.<?php echo PKP\components\forms\context\PKPContextForm::FORM_CONTEXT;?>
"
						@set="set"
					/>
				</tab>
				<tab id="appearance" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.website.appearance"),$_smarty_tpl ) );?>
">
					<theme-form
						v-bind="components.<?php echo PKP\components\forms\context\PKPThemeForm::FORM_THEME;?>
"
						@set="set"
					/>
				</tab>
				<tab id="languages" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.languages"),$_smarty_tpl ) );?>
">
					<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'languagesUrl', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_COMPONENT,'context'=>$_smarty_tpl->tpl_vars['editContext']->value->getPath(),'component'=>"grid.settings.languages.ManageLanguageGridHandler",'op'=>"fetchGrid",'escape'=>false),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_url_in_div'][0], array( array('id'=>"languageGridContainer",'url'=>$_smarty_tpl->tpl_vars['languagesUrl']->value),$_smarty_tpl ) );?>

					<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'submissionLanguagesUrl', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_COMPONENT,'context'=>$_smarty_tpl->tpl_vars['editContext']->value->getPath(),'component'=>"grid.settings.languages.SubmissionLanguageGridHandler",'op'=>"fetchGrid",'escape'=>false),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_url_in_div'][0], array( array('id'=>"submissionLanguageGridContainer",'url'=>$_smarty_tpl->tpl_vars['submissionLanguagesUrl']->value),$_smarty_tpl ) );?>

				</tab>
				<tab id="indexing" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup.searchEngineIndexing"),$_smarty_tpl ) );?>
">
					<pkp-form
						v-bind="components.<?php echo PKP\components\forms\context\PKPSearchIndexingForm::FORM_SEARCH_INDEXING;?>
"
						@set="set"
					/>
				</tab>
				<tab id="restrictBulkEmails" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"admin.settings.restrictBulkEmails"),$_smarty_tpl ) );?>
">
					<?php if ($_smarty_tpl->tpl_vars['bulkEmailsEnabled']->value) {?>
						<pkp-form
							v-bind="components.<?php echo PKP\components\forms\context\PKPRestrictBulkEmailsForm::FORM_RESTRICT_BULK_EMAILS;?>
"
							@set="set"
						/>
					<?php } else { ?>
						<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "siteSettingsUrl", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_PAGE,'page'=>"admin",'op'=>"settings",'anchor'=>"setup/bulkEmails"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
						<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"admin.settings.disableBulkEmailRoles.contextDisabled",'siteSettingsUrl'=>$_smarty_tpl->tpl_vars['siteSettingsUrl']->value),$_smarty_tpl ) );?>
</p>
					<?php }?>
				</tab>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Template::Settings::admin::contextSettings::setup"),$_smarty_tpl ) );?>

			</tabs>
		</tab>
		<tab id="plugins" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.plugins"),$_smarty_tpl ) );?>
">
			<tabs :track-history="true">
				<tab id="installed" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.plugins.installed"),$_smarty_tpl ) );?>
">
					<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'pluginGridUrl', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_COMPONENT,'context'=>$_smarty_tpl->tpl_vars['editContext']->value->getPath(),'component'=>"grid.settings.plugins.SettingsPluginGridHandler",'op'=>"fetchGrid",'escape'=>false),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_url_in_div'][0], array( array('id'=>"pluginGridContainer",'url'=>$_smarty_tpl->tpl_vars['pluginGridUrl']->value),$_smarty_tpl ) );?>

				</tab>
				<tab id="gallery" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.plugins.pluginGallery"),$_smarty_tpl ) );?>
">
					<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'pluginGalleryGridUrl', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_COMPONENT,'context'=>$_smarty_tpl->tpl_vars['editContext']->value->getPath(),'component'=>"grid.plugins.PluginGalleryGridHandler",'op'=>"fetchGrid",'escape'=>false),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_url_in_div'][0], array( array('id'=>"pluginGalleryGridContainer",'url'=>$_smarty_tpl->tpl_vars['pluginGalleryGridUrl']->value),$_smarty_tpl ) );?>

				</tab>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Template::Settings::admin::contextSettings::plugins"),$_smarty_tpl ) );?>

			</tabs>
		</tab>
		<tab id="users" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.users"),$_smarty_tpl ) );?>
">
			<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'usersUrl', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_COMPONENT,'context'=>$_smarty_tpl->tpl_vars['editContext']->value->getPath(),'component'=>"grid.settings.user.UserGridHandler",'op'=>"fetchGrid",'escape'=>false),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_url_in_div'][0], array( array('id'=>"userGridContainer",'url'=>$_smarty_tpl->tpl_vars['usersUrl']->value),$_smarty_tpl ) );?>

		</tab>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Template::Settings::admin::contextSettings"),$_smarty_tpl ) );?>

	</tabs>
<?php
}
}
/* {/block "page"} */
}
