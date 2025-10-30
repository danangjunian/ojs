<?php
/* Smarty version 4.5.5, created on 2025-10-30 17:38:51
  from 'app:frontendcomponentsfooter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6903403ba55b51_87192812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4dffb64063bb972c37e05619a2ccd9d0ea7473ac' => 
    array (
      0 => 'app:frontendcomponentsfooter.tpl',
      1 => 1761743678,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6903403ba55b51_87192812 (Smarty_Internal_Template $_smarty_tpl) {
?>
			</div><!-- pkp_structure_main -->

			<?php if (empty($_smarty_tpl->tpl_vars['isFullWidth']->value)) {?>
				<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "sidebarCode", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Templates::Common::Sidebar"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
				<?php if ($_smarty_tpl->tpl_vars['sidebarCode']->value) {?>
					<div class="pkp_structure_sidebar left nusantara-sidebar" role="complementary">
						<?php echo $_smarty_tpl->tpl_vars['sidebarCode']->value;?>

					</div>
				<?php }?>
			<?php }?>
		</div><!-- pkp_structure_content -->

		<footer class="nusantara-footer" role="contentinfo">
			<a id="pkp_content_footer"></a>

			<div class="nusantara-footer__inner">
				<div class="nusantara-footer__brand">
					<?php if ($_smarty_tpl->tpl_vars['currentContext']->value) {?>
						<h2 class="nusantara-footer__title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedName() ));?>
</h2>
					<?php } else { ?>
						<h2 class="nusantara-footer__title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['siteTitle']->value ));?>
</h2>
					<?php }?>
				</div>

				<div class="nusantara-footer__widgets">
					<?php $_smarty_tpl->_assignInScope('footerMapEmbed', null);?>
					<?php if ((isset($_smarty_tpl->tpl_vars['activeTheme']->value))) {?>
						<?php $_smarty_tpl->_assignInScope('footerMapEmbed', $_smarty_tpl->tpl_vars['activeTheme']->value->getOption('footerMapEmbed'));?>
					<?php }?>
					<div class="nusantara-footer__column nusantara-footer__column--map">
						<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.footer.location"),$_smarty_tpl ) );?>
</h3>
						<?php if ($_smarty_tpl->tpl_vars['footerMapEmbed']->value) {?>
							<div class="nusantara-footer__mapEmbed">
								<?php echo $_smarty_tpl->tpl_vars['footerMapEmbed']->value;?>

							</div>
						<?php } else { ?>
							<div class="nusantara-footer__mapPlaceholder">
								<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.footer.locationPlaceholder"),$_smarty_tpl ) );?>
</p>
								<p><small><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.footer.locationInstructions"),$_smarty_tpl ) );?>
</small></p>
							</div>
						<?php }?>
					</div>
					<div class="nusantara-footer__column nusantara-footer__column--cta">
						<h3><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.footer.contact"),$_smarty_tpl ) );?>
</h3>
						<?php if ($_smarty_tpl->tpl_vars['pageFooter']->value) {?>
							<div class="nusantara-footer__custom">
								<?php echo $_smarty_tpl->tpl_vars['pageFooter']->value;?>

							</div>
						<?php }?>
					</div>
				</div>

				<div class="nusantara-footer__meta">
					<div class="nusantara-footer__brandmark">
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"about",'op'=>"aboutThisPublishingSystem"),$_smarty_tpl ) );?>
">
							<img alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"about.aboutThisPublishingSystem"),$_smarty_tpl ) );?>
" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['brandImage']->value;?>
">
						</a>
					</div>
					<p class="nusantara-footer__copyright">
						&copy; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( time(),"%Y" ));?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['siteTitle']->value ));?>
. <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.footer.rights"),$_smarty_tpl ) );?>
.
					</p>
				</div>
			</div>
		</footer>

	</div><!-- pkp_structure_page -->

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_script'][0], array( array('context'=>"frontend"),$_smarty_tpl ) );?>


	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Templates::Common::Footer::PageFooter"),$_smarty_tpl ) );?>

</body>
</html>
<?php }
}
