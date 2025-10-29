{**
 * Nusantara Theme - Footer
 * Versi kustom dari footer frontend OJS.
 *}

			</div><!-- pkp_structure_main -->

			{if empty($isFullWidth)}
				{capture assign="sidebarCode"}{call_hook name="Templates::Common::Sidebar"}{/capture}
				{if $sidebarCode}
					<div class="pkp_structure_sidebar left nusantara-sidebar" role="complementary">
						{$sidebarCode}
					</div>
				{/if}
			{/if}
		</div><!-- pkp_structure_content -->

		<footer class="nusantara-footer" role="contentinfo">
			<a id="pkp_content_footer"></a>

			<div class="nusantara-footer__inner">
				<div class="nusantara-footer__brand">
					{if $currentContext}
						<h2 class="nusantara-footer__title">{$currentContext->getLocalizedName()|escape}</h2>
					{else}
						<h2 class="nusantara-footer__title">{$siteTitle|escape}</h2>
					{/if}
				</div>

				<div class="nusantara-footer__widgets">
					{assign var="footerMapEmbed" value=null}
					{if isset($activeTheme)}
						{assign var="footerMapEmbed" value=$activeTheme->getOption('footerMapEmbed')}
					{/if}
					<div class="nusantara-footer__column nusantara-footer__column--map">
						<h3>{translate key="plugins.themes.nusantara.footer.location"}</h3>
						{if $footerMapEmbed}
							<div class="nusantara-footer__mapEmbed">
								{$footerMapEmbed nofilter}
							</div>
						{else}
							<div class="nusantara-footer__mapPlaceholder">
								<p>{translate key="plugins.themes.nusantara.footer.locationPlaceholder"}</p>
								<p><small>{translate key="plugins.themes.nusantara.footer.locationInstructions"}</small></p>
							</div>
						{/if}
					</div>
					<div class="nusantara-footer__column nusantara-footer__column--cta">
						<h3>{translate key="plugins.themes.nusantara.footer.contact"}</h3>
						{if $pageFooter}
							<div class="nusantara-footer__custom">
								{$pageFooter}
							</div>
						{/if}
					</div>
				</div>

				<div class="nusantara-footer__meta">
					<div class="nusantara-footer__brandmark">
						<a href="{url page="about" op="aboutThisPublishingSystem"}">
							<img alt="{translate key="about.aboutThisPublishingSystem"}" src="{$baseUrl}/{$brandImage}">
						</a>
					</div>
					<p class="nusantara-footer__copyright">
						&copy; {$smarty.now|date_format:"%Y"} {$siteTitle|escape}. {translate key="plugins.themes.nusantara.footer.rights"}.
					</p>
				</div>
			</div>
		</footer>

	</div><!-- pkp_structure_page -->

	{load_script context="frontend"}

	{call_hook name="Templates::Common::Footer::PageFooter"}
</body>
</html>
