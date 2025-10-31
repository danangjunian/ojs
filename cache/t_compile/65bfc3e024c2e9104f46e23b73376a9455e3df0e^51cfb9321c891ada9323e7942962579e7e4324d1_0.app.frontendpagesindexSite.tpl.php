<?php
/* Smarty version 4.5.5, created on 2025-10-31 12:11:27
  from 'app:frontendpagesindexSite.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_690444ff372c06_22926235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51cfb9321c891ada9323e7942962579e7e4324d1' => 
    array (
      0 => 'app:frontendpagesindexSite.tpl',
      1 => 1761887445,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:frontend/components/header.tpl' => 1,
    'app:frontend/objects/announcements_list.tpl' => 1,
    'app:frontend/components/footer.tpl' => 1,
  ),
),false)) {
function content_690444ff372c06_22926235 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("app:frontend/components/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_assignInScope('heroTitle', $_smarty_tpl->tpl_vars['activeTheme']->value->getOption('siteHeroTitle'));
$_smarty_tpl->_assignInScope('heroSubtitle', $_smarty_tpl->tpl_vars['activeTheme']->value->getOption('siteHeroSubtitle'));
$_smarty_tpl->_assignInScope('heroCtaLabel', $_smarty_tpl->tpl_vars['activeTheme']->value->getOption('siteHeroCtaLabel'));
$_smarty_tpl->_assignInScope('heroCtaUrl', $_smarty_tpl->tpl_vars['activeTheme']->value->getOption('siteHeroCtaUrl'));
if (!$_smarty_tpl->tpl_vars['heroTitle']->value) {?>
	<?php $_smarty_tpl->_assignInScope('heroTitle', $_smarty_tpl->tpl_vars['siteTitle']->value);
}
if (!$_smarty_tpl->tpl_vars['heroSubtitle']->value && (isset($_smarty_tpl->tpl_vars['about']->value))) {?>
	<?php $_smarty_tpl->_assignInScope('heroSubtitle', preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['about']->value));
}
if (!$_smarty_tpl->tpl_vars['heroCtaUrl']->value) {?>
	<?php $_smarty_tpl->_assignInScope('heroCtaUrl', "#nusantaraCatalog");
}?>

<div class="nusantara-page nusantara-page--site">

	<section class="nusantara-hero">
		<div class="nusantara-hero__content">
			<p class="nusantara-hero__eyebrow"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.hero.siteLabel"),$_smarty_tpl ) );?>
</p>
			<h1 class="nusantara-hero__title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['heroTitle']->value ));?>
</h1>
			<?php if ($_smarty_tpl->tpl_vars['heroSubtitle']->value) {?>
				<p class="nusantara-hero__subtitle"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['heroSubtitle']->value) ));?>
</p>
			<?php }?>
			<div class="nusantara-hero__actions">
				<a class="nusantara-button nusantara-button--filled" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['heroCtaUrl']->value ));?>
">
					<?php ob_start();
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"context.contexts"),$_smarty_tpl ) );
$_prefixVariable1 = ob_get_clean();
echo (($tmp = $_smarty_tpl->tpl_vars['heroCtaLabel']->value ?? null)===null||$tmp==='' ? $_prefixVariable1 ?? null : $tmp);?>

				</a>
			</div>
		</div>
		<div class="nusantara-hero__aside">
			<form class="nusantara-hero__search" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"search"),$_smarty_tpl ) );?>
" method="get" role="search">
				<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.search"),$_smarty_tpl ) );?>
 </h2>
				<label class="nusantara-hero__searchLabel" for="siteHeroSearch"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.searchPlaceholder"),$_smarty_tpl ) );?>
</label>
				<div class="nusantara-hero__searchControl">
					<input id="siteHeroSearch" type="text" name="query" placeholder="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.searchPlaceholder"),$_smarty_tpl ) );?>
" />
					<button type="submit" class="nusantara-button nusantara-button--icon" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.search"),$_smarty_tpl ) );?>
">
						<svg viewBox="0 0 20 20" aria-hidden="true">
							<path d="M12.905 11.49l4.602 4.602-1.415 1.415-4.602-4.602a6 6 0 1 1 1.415-1.415zM9 13a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
						</svg>
					</button>
				</div>
			</form>
		</div>
	</section>


<?php $_smarty_tpl->_assignInScope('journalTotal', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['journals']->value )));
$_smarty_tpl->_assignInScope('announcementTotal', 0);
if ((isset($_smarty_tpl->tpl_vars['announcements']->value))) {?>
	<?php $_smarty_tpl->_assignInScope('announcementTotal', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['announcements']->value )));
}?>

	<?php if ($_smarty_tpl->tpl_vars['activeTheme']->value && $_smarty_tpl->tpl_vars['activeTheme']->value->getOption('siteShowMetrics') == 'cards') {?>
		<section class="nusantara-section nusantara-metrics">
			<ul class="nusantara-metrics__list">
				<li>
					<span class="nusantara-metrics__label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"context.contexts"),$_smarty_tpl ) );?>
</span>
					<strong class="nusantara-metrics__value"><?php echo $_smarty_tpl->tpl_vars['journalTotal']->value;?>
</strong>
				</li>
				<li>
					<span class="nusantara-metrics__label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"announcement.announcements"),$_smarty_tpl ) );?>
</span>
					<strong class="nusantara-metrics__value"><?php echo $_smarty_tpl->tpl_vars['announcementTotal']->value;?>
</strong>
				</li>
				<li>
					<span class="nusantara-metrics__label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.metrics.readers"),$_smarty_tpl ) );?>
</span>
					<strong class="nusantara-metrics__value">&infin;</strong>
				</li>
			</ul>
		</section>
	<?php }?>

	<?php if ((isset($_smarty_tpl->tpl_vars['about']->value)) && $_smarty_tpl->tpl_vars['about']->value) {?>
		<section class="nusantara-section nusantara-about">
			<div class="nusantara-section__header">
				<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.site.aboutTitle"),$_smarty_tpl ) );?>
</h2>
			</div>
			<div class="nusantara-section__body">
				<?php echo $_smarty_tpl->tpl_vars['about']->value;?>

			</div>
		</section>
	<?php }?>

	<?php $_smarty_tpl->_subTemplateRender("app:frontend/objects/announcements_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('numAnnouncements'=>$_smarty_tpl->tpl_vars['numAnnouncementsHomepage']->value), 0, false);
?>

	<section class="nusantara-section nusantara-journals" id="nusantaraCatalog">
		<div class="nusantara-section__header">
			<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.site.journalShowcase"),$_smarty_tpl ) );?>
</h2>
			<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.site.journalShowcaseDescription"),$_smarty_tpl ) );?>
</p>
		</div>

		<?php if (!call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['journals']->value ))) {?>
			<p class="nusantara-empty"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"site.noJournals"),$_smarty_tpl ) );?>
</p>
		<?php } else { ?>
			<div class="nusantara-journalGrid">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['journals']->value, 'journal');
$_smarty_tpl->tpl_vars['journal']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['journal']->value) {
$_smarty_tpl->tpl_vars['journal']->do_else = false;
?>
					<?php $_smarty_tpl->_assignInScope('journalId', $_smarty_tpl->tpl_vars['journal']->value->getId());?>
					<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "url", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('journal'=>$_smarty_tpl->tpl_vars['journal']->value->getPath()),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
					<?php $_smarty_tpl->_assignInScope('thumb', $_smarty_tpl->tpl_vars['journal']->value->getLocalizedData('journalThumbnail'));?>
					<?php $_smarty_tpl->_assignInScope('description', $_smarty_tpl->tpl_vars['journal']->value->getLocalizedDescription());?>
					<?php $_smarty_tpl->_assignInScope('modalId', ("nusantaraJournalModal").($_smarty_tpl->tpl_vars['journalId']->value));?>
					<?php $_smarty_tpl->_assignInScope('modalData', (($tmp = $_smarty_tpl->tpl_vars['nusantaraJournalModalData']->value[$_smarty_tpl->tpl_vars['journalId']->value] ?? null)===null||$tmp==='' ? null ?? null : $tmp));?>

					<?php $_smarty_tpl->_assignInScope('publisher', $_smarty_tpl->tpl_vars['journal']->value->getData('publisherInstitution'));?>
					<?php if (!$_smarty_tpl->tpl_vars['publisher']->value) {?>
						<?php $_smarty_tpl->_assignInScope('publisher', $_smarty_tpl->tpl_vars['journal']->value->getLocalizedData('publisherInstitution'));?>
					<?php }?>
					<article class="nusantara-journalPoster<?php if ($_smarty_tpl->tpl_vars['thumb']->value) {?> has-thumb<?php }?>">
						<a class="nusantara-journalPoster__link"
							href="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"
							rel="bookmark"
							<?php if ($_smarty_tpl->tpl_vars['modalData']->value) {?>
								data-journal-modal-trigger="<?php echo $_smarty_tpl->tpl_vars['modalId']->value;?>
"
								role="button"
								aria-haspopup="dialog"
								aria-controls="<?php echo $_smarty_tpl->tpl_vars['modalId']->value;?>
"
							<?php }?>
						>
							<div class="nusantara-journalPoster__media">
								<?php if ($_smarty_tpl->tpl_vars['thumb']->value) {?>
									<img src="<?php echo $_smarty_tpl->tpl_vars['journalFilesPath']->value;
echo $_smarty_tpl->tpl_vars['journal']->value->getId();?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['thumb']->value['uploadName'],"url" ));?>
" loading="lazy" <?php if ($_smarty_tpl->tpl_vars['thumb']->value['altText']) {?>alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['thumb']->value['altText'] ));?>
"<?php }?>/>
								<?php } else { ?>
									<div class="nusantara-journalPoster__placeholder">
										<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (($tmp = call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['journal']->value->getLocalizedAcronym() )) ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['journal']->value->getLocalizedName() ?? null : $tmp) ));?>

									</div>
								<?php }?>
							</div>
							<div class="nusantara-journalPoster__overlay">
								<h3 class="nusantara-journalPoster__title"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['journal']->value->getLocalizedName() ));?>
</h3>
								<?php if ($_smarty_tpl->tpl_vars['publisher']->value) {?>
									<p class="nusantara-journalPoster__meta"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['publisher']->value ));?>
</p>
								<?php }?>
							</div>
						</a>
					</article>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
			<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['nusantaraJournalModalData']->value ))) {?>
				<div class="nusantara-journalModals">
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['journals']->value, 'journal');
$_smarty_tpl->tpl_vars['journal']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['journal']->value) {
$_smarty_tpl->tpl_vars['journal']->do_else = false;
?>
						<?php $_smarty_tpl->_assignInScope('journalId', $_smarty_tpl->tpl_vars['journal']->value->getId());?>
						<?php $_smarty_tpl->_assignInScope('modalData', (($tmp = $_smarty_tpl->tpl_vars['nusantaraJournalModalData']->value[$_smarty_tpl->tpl_vars['journalId']->value] ?? null)===null||$tmp==='' ? null ?? null : $tmp));?>
						<?php if (!$_smarty_tpl->tpl_vars['modalData']->value) {
continue 1;
}?>
						<?php $_smarty_tpl->_assignInScope('thumb', $_smarty_tpl->tpl_vars['journal']->value->getLocalizedData('journalThumbnail'));?>
						<?php $_smarty_tpl->_assignInScope('modalId', ("nusantaraJournalModal").($_smarty_tpl->tpl_vars['journalId']->value));?>
						<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "journalUrl", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('journal'=>$_smarty_tpl->tpl_vars['journal']->value->getPath()),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
						<section class="nusantara-journalModal" id="<?php echo $_smarty_tpl->tpl_vars['modalId']->value;?>
" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="<?php echo $_smarty_tpl->tpl_vars['modalId']->value;?>
-title">
							<div class="nusantara-journalModal__backdrop" data-modal-close></div>
							<div class="nusantara-journalModal__dialog" role="document">
								<button type="button" class="nusantara-journalModal__close" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.close"),$_smarty_tpl ) );?>
" data-modal-close data-modal-autofocus>
									<svg viewBox="0 0 20 20" aria-hidden="true">
										<path d="M15.3 5.3l-1.6-1.6L10 7.4 6.3 3.7 4.7 5.3 8.4 9l-3.7 3.7 1.6 1.6L10 10.6l3.7 3.7 1.6-1.6L11.6 9z" />
									</svg>
								</button>
								<div class="nusantara-journalModal__content">
									<div class="nusantara-journalModal__media">
										<?php if ($_smarty_tpl->tpl_vars['thumb']->value) {?>
											<img src="<?php echo $_smarty_tpl->tpl_vars['journalFilesPath']->value;
echo $_smarty_tpl->tpl_vars['journal']->value->getId();?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['thumb']->value['uploadName'],"url" ));?>
" loading="lazy" <?php if ($_smarty_tpl->tpl_vars['thumb']->value['altText']) {?>alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['thumb']->value['altText'] ));?>
"<?php }?>/>
										<?php } else { ?>
											<div class="nusantara-journalModal__placeholder">
												<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (($tmp = $_smarty_tpl->tpl_vars['modalData']->value['acronym'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['modalData']->value['name'] ?? null : $tmp) ));?>

											</div>
										<?php }?>
									</div>
									<div class="nusantara-journalModal__body">
										<header class="nusantara-journalModal__header">
											<h3 class="nusantara-journalModal__title" id="<?php echo $_smarty_tpl->tpl_vars['modalId']->value;?>
-title">
												<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['name'] ));?>

											</h3>
											</header>

										<ul class="nusantara-journalModal__meta">
											<?php if ($_smarty_tpl->tpl_vars['modalData']->value['editorInChief']) {?>
												<li>
													<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.generic.nusantarajournalmodal.settings.editor"),$_smarty_tpl ) );?>
</span>
													<strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['editorInChief'] ));?>
</strong>
												</li>
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['modalData']->value['issn']) {?>
												<li>
													<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.generic.nusantarajournalmodal.settings.issn"),$_smarty_tpl ) );?>
</span>
													<strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['issn'] ));?>
</strong>
												</li>
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['modalData']->value['frequency']) {?>
												<li>
													<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.generic.nusantarajournalmodal.settings.frequency"),$_smarty_tpl ) );?>
</span>
													<strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['frequency'] ));?>
</strong>
												</li>
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['modalData']->value['license']) {?>
												<li>
													<span><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.generic.nusantarajournalmodal.settings.license"),$_smarty_tpl ) );?>
</span>
													<strong><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['license'] ));?>
</strong>
												</li>
											<?php }?>
										</ul>

										<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['indexing'] ))) {?>
											<div class="nusantara-journalModal__badges">
												<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['modalData']->value['indexing'], 'badge');
$_smarty_tpl->tpl_vars['badge']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['badge']->value) {
$_smarty_tpl->tpl_vars['badge']->do_else = false;
?>
													<?php ob_start();
echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value['class'] ));
$_prefixVariable2=ob_get_clean();
$_smarty_tpl->_assignInScope('chipClass', "nusantara-chip ".$_prefixVariable2);?>
													<?php if ($_smarty_tpl->tpl_vars['badge']->value['icon']) {?>
														<?php $_smarty_tpl->_assignInScope('chipClass', ((string)$_smarty_tpl->tpl_vars['chipClass']->value)." nusantara-chip--iconOnly");?>
													<?php }?>

													<?php if ($_smarty_tpl->tpl_vars['badge']->value['url']) {?>
														<a class="<?php echo $_smarty_tpl->tpl_vars['chipClass']->value;?>
 nusantara-chip--link" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value['url'] ));?>
" target="_blank" rel="noopener">
															<?php if ($_smarty_tpl->tpl_vars['badge']->value['icon']) {?>
																<img class="nusantara-chip__icon" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value['icon'] ));?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value['label'] ));?>
" loading="lazy" />
															<?php } else { ?>
																<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value['label'] ));?>

															<?php }?>
														</a>
													<?php } else { ?>
														<span class="<?php echo $_smarty_tpl->tpl_vars['chipClass']->value;?>
">
															<?php if ($_smarty_tpl->tpl_vars['badge']->value['icon']) {?>
																<img class="nusantara-chip__icon" src="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value['icon'] ));?>
" alt="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value['label'] ));?>
" loading="lazy" />
															<?php } else { ?>
																<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['badge']->value['label'] ));?>

															<?php }?>
														</span>
													<?php }?>
												<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
											</div>
										<?php }?>

										<div class="nusantara-journalModal__actions">
											<?php if ($_smarty_tpl->tpl_vars['modalData']->value['primaryLabel'] && $_smarty_tpl->tpl_vars['modalData']->value['primaryUrl']) {?>
												<a class="nusantara-button nusantara-button--filled" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['primaryUrl'] ));?>
" target="_blank" rel="noopener">
													<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['primaryLabel'] ));?>

												</a>
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['modalData']->value['secondaryLabel'] && $_smarty_tpl->tpl_vars['modalData']->value['secondaryUrl']) {?>
												<a class="nusantara-button nusantara-button--ghost" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['secondaryUrl'] ));?>
" target="_blank" rel="noopener">
													<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['modalData']->value['secondaryLabel'] ));?>

												</a>
											<?php }?>
											<a class="nusantara-button nusantara-button--text" href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['journalUrl']->value ));?>
">
												<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.nusantara.site.visitJournal"),$_smarty_tpl ) );?>

											</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</div>
			<?php }?>
		<?php }?>
	</section>

</div>

<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>












<?php }
}
