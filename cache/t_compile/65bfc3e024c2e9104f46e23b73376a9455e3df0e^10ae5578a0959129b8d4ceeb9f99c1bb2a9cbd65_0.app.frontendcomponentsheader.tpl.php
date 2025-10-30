<?php
/* Smarty version 4.5.5, created on 2025-10-30 16:51:59
  from 'app:frontendcomponentsheader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6903353fdef1b8_86186663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10ae5578a0959129b8d4ceeb9f99c1bb2a9cbd65' => 
    array (
      0 => 'app:frontendcomponentsheader.tpl',
      1 => 1761731826,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:frontend/components/headerHead.tpl' => 1,
    'app:frontend/components/skipLinks.tpl' => 1,
  ),
),false)) {
function content_6903353fdef1b8_86186663 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ojs\\lib\\pkp\\lib\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
$_smarty_tpl->_assignInScope('isSiteContext', (!$_smarty_tpl->tpl_vars['currentContext']->value));
$_smarty_tpl->_assignInScope('siteBrandTitle', $_smarty_tpl->tpl_vars['displayPageHeaderTitle']->value);
if (!$_smarty_tpl->tpl_vars['siteBrandTitle']->value && !$_smarty_tpl->tpl_vars['displayPageHeaderLogo']->value && $_smarty_tpl->tpl_vars['isSiteContext']->value) {?>
	<?php $_smarty_tpl->_assignInScope('siteBrandTitle', "Nusantara");
}
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "nusantaraUserMenu", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_menu'][0], array( array('name'=>"user",'id'=>"navigationUser",'ulClass'=>"nusantara-userNav",'liClass'=>"nusantara-userNav__item"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
$_smarty_tpl->_assignInScope('hasUserMenu', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'trim' ][ 0 ], array( $_smarty_tpl->tpl_vars['nusantaraUserMenu']->value )));
$_smarty_tpl->_assignInScope('showingLogo', true);
if (!$_smarty_tpl->tpl_vars['displayPageHeaderLogo']->value) {
$_smarty_tpl->_assignInScope('showingLogo', false);
}?>
<!DOCTYPE html>
<html lang="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['currentLocale']->value,"_","-");?>
" xml:lang="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['currentLocale']->value,"_","-");?>
">
<?php if (!$_smarty_tpl->tpl_vars['pageTitleTranslated']->value) {
$_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "pageTitleTranslated", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['pageTitle']->value),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}
$_smarty_tpl->_subTemplateRender("app:frontend/components/headerHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<body class="pkp_page_<?php echo (($tmp = call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['requestedPage']->value )) ?? null)===null||$tmp==='' ? "index" ?? null : $tmp);?>
 pkp_op_<?php echo (($tmp = call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['requestedOp']->value )) ?? null)===null||$tmp==='' ? "index" ?? null : $tmp);
if ($_smarty_tpl->tpl_vars['showingLogo']->value) {?> has_site_logo<?php }?> nusantara-body" dir="<?php echo (($tmp = call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentLocaleLangDir']->value )) ?? null)===null||$tmp==='' ? "ltr" ?? null : $tmp);?>
">

	<div class="pkp_structure_page nusantara-shell">

		<header class="pkp_structure_head nusantara-header" id="headerNavigationContainer" role="banner">
			<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/skipLinks.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

			<div class="nusantara-header__primary">
				<div class="nusantara-header__brand">
					<button class="nusantara-header__toggle" type="button" aria-expanded="false" aria-controls="nusantaraPrimaryNav">
						<span class="nusantara-header__toggleIcon" aria-hidden="true">
							<span></span>
							<span></span>
							<span></span>
						</span>
						<span class="nusantara-header__toggleLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.navigation"),$_smarty_tpl ) );?>
 </span>
					</button>

					<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "homeUrl", null);?>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"index",'router'=>PKP\core\PKPApplication::ROUTE_PAGE),$_smarty_tpl ) );?>

					<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

					<div class="nusantara-header__logo">
						<?php if ($_smarty_tpl->tpl_vars['displayPageHeaderLogo']->value) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['homeUrl']->value;?>
" class="is_img">
								<img src="<?php echo $_smarty_tpl->tpl_vars['publicFilesDir']->value;?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['displayPageHeaderLogo']->value['uploadName'],"url" ));?>
" width="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['displayPageHeaderLogo']->value['width'] ));?>
" height="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['displayPageHeaderLogo']->value['height'] ));?>
" <?php if ($_smarty_tpl->tpl_vars['displayPageHeaderLogo']->value['altText'] != '') {?>alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['displayPageHeaderLogo']->value['altText'] ));?>
"<?php }?> />
							</a>
						<?php } elseif ($_smarty_tpl->tpl_vars['siteBrandTitle']->value) {?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['homeUrl']->value;?>
" class="is_text nusantara-header__title">
								<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['siteBrandTitle']->value ));?>

							</a>
						<?php } else { ?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['homeUrl']->value;?>
" class="is_img nusantara-header__title">
								<img src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/templates/images/structure/logo.png" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['applicationName']->value ));?>
" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['applicationName']->value ));?>
" width="180" height="90" />
							</a>
						<?php }?>
					</div>

					<?php if ($_smarty_tpl->tpl_vars['currentContext']->value && $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedAcronym()) {?>
						<div class="nusantara-header__context">
							<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedAcronym() ));?>

						</div>
					<?php }?>
				</div>

				<div class="nusantara-header__actions">
					<?php if ($_smarty_tpl->tpl_vars['currentContext']->value && $_smarty_tpl->tpl_vars['requestedPage']->value !== 'search') {?>
						<button class="nusantara-header__searchToggle" type="button" aria-expanded="false" aria-controls="nusantaraSearchPanel">
							<span class="nusantara-icon nusantara-icon--search" aria-hidden="true">
								<svg viewBox="0 0 20 20" focusable="false" aria-hidden="true">
									<path d="M12.905 11.49l4.602 4.602-1.415 1.415-4.602-4.602a6 6 0 1 1 1.415-1.415zM9 13a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
								</svg>
							</span>
							<span class="nusantara-header__searchLabel"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.search"),$_smarty_tpl ) );?>
</span>
						</button>
					<?php }?>
				</div>
			</div>

			<nav class="nusantara-primaryNav" id="nusantaraPrimaryNav" aria-hidden="true" aria-label="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.navigation.site"),$_smarty_tpl ) ) ));?>
">
				<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "primaryMenu", null);?>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_menu'][0], array( array('name'=>"primary",'id'=>"navigationPrimary",'ulClass'=>"nusantara-nav",'liClass'=>"nusantara-nav__item"),$_smarty_tpl ) );?>

				<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

				<?php echo $_smarty_tpl->tpl_vars['primaryMenu']->value;?>


				<?php if ($_smarty_tpl->tpl_vars['hasUserMenu']->value) {?>
					<div class="nusantara-accountMenu">
						<p class="nusantara-accountMenu__label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.accountMenu.title"),$_smarty_tpl ) );?>
</p>
						<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'trim' ][ 0 ], array( $_smarty_tpl->tpl_vars['nusantaraUserMenu']->value ));?>

					</div>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['currentContext']->value && $_smarty_tpl->tpl_vars['requestedPage']->value !== 'search') {?>
					<div class="nusantara-searchPanel" id="nusantaraSearchPanel">
						<form class="nusantara-searchPanel__form" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"search"),$_smarty_tpl ) );?>
" method="get" role="search">
							<label class="nusantara-searchPanel__label" for="nusantaraHeaderSearch"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.search"),$_smarty_tpl ) );?>
 </label>
							<input id="nusantaraHeaderSearch" class="nusantara-searchPanel__input" type="text" name="query" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['searchQuery']->value ));?>
" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.searchPlaceholder"),$_smarty_tpl ) );?>
" />
							<button class="nusantara-searchPanel__submit" type="submit">
								<span class="nusantara-icon nusantara-icon--arrow" aria-hidden="true">
									<svg viewBox="0 0 20 20" focusable="false" aria-hidden="true">
										<path d="M11.293 4.293l4.707 4.707-4.707 4.707-1.414-1.414L12.586 10 9.879 7.293l1.414-1.414zM4 9h10v2H4z" />
									</svg>
								</span>
								<span class="pkp_screen_reader"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.search"),$_smarty_tpl ) );?>
</span>
							</button>
						</form>
					</div>
				<?php }?>
			</nav>
		</header>

		<?php if ($_smarty_tpl->tpl_vars['isFullWidth']->value) {?>
			<?php $_smarty_tpl->_assignInScope('hasSidebar', 0);?>
		<?php }?>
		<div class="pkp_structure_content nusantara-content<?php if ($_smarty_tpl->tpl_vars['hasSidebar']->value) {?> has_sidebar<?php }?>">
			<div class="pkp_structure_main nusantara-main" role="main">
				<a id="pkp_content_main"></a>
<?php }
}
