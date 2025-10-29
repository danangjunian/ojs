{**
 * Nusantara Theme - Header
 * Versi kustom dari header frontend OJS.
 *}
{assign var="isSiteContext" value=(!$currentContext)}
{assign var="siteBrandTitle" value=$displayPageHeaderTitle}
{if !$siteBrandTitle && !$displayPageHeaderLogo && $isSiteContext}
	{assign var="siteBrandTitle" value="Nusantara"}
{/if}
{capture assign="nusantaraUserMenu"}{load_menu name="user" id="navigationUser" ulClass="nusantara-userNav" liClass="nusantara-userNav__item"}{/capture}
{assign var="hasUserMenu" value=$nusantaraUserMenu|trim}
{strip}
	{assign var="showingLogo" value=true}
	{if !$displayPageHeaderLogo}
		{assign var="showingLogo" value=false}
	{/if}
{/strip}
<!DOCTYPE html>
<html lang="{$currentLocale|replace:"_":"-"}" xml:lang="{$currentLocale|replace:"_":"-"}">
{if !$pageTitleTranslated}{capture assign="pageTitleTranslated"}{translate key=$pageTitle}{/capture}{/if}
{include file="frontend/components/headerHead.tpl"}
<body class="pkp_page_{$requestedPage|escape|default:"index"} pkp_op_{$requestedOp|escape|default:"index"}{if $showingLogo} has_site_logo{/if} nusantara-body" dir="{$currentLocaleLangDir|escape|default:"ltr"}">

	<div class="pkp_structure_page nusantara-shell">

		<header class="pkp_structure_head nusantara-header" id="headerNavigationContainer" role="banner">
			{include file="frontend/components/skipLinks.tpl"}

			<div class="nusantara-header__primary">
				<div class="nusantara-header__brand">
					<button class="nusantara-header__toggle" type="button" aria-expanded="false" aria-controls="nusantaraPrimaryNav">
						<span class="nusantara-header__toggleIcon" aria-hidden="true">
							<span></span>
							<span></span>
							<span></span>
						</span>
						<span class="nusantara-header__toggleLabel">{translate key="common.navigation"} </span>
					</button>

					{capture assign="homeUrl"}
						{url page="index" router=PKP\core\PKPApplication::ROUTE_PAGE}
					{/capture}

					<div class="nusantara-header__logo">
						{if $displayPageHeaderLogo}
							<a href="{$homeUrl}" class="is_img">
								<img src="{$publicFilesDir}/{$displayPageHeaderLogo.uploadName|escape:"url"}" width="{$displayPageHeaderLogo.width|escape}" height="{$displayPageHeaderLogo.height|escape}" {if $displayPageHeaderLogo.altText != ''}alt="{$displayPageHeaderLogo.altText|escape}"{/if} />
							</a>
						{elseif $siteBrandTitle}
							<a href="{$homeUrl}" class="is_text nusantara-header__title">
								{$siteBrandTitle|escape}
							</a>
						{else}
							<a href="{$homeUrl}" class="is_img nusantara-header__title">
								<img src="{$baseUrl}/templates/images/structure/logo.png" alt="{$applicationName|escape}" title="{$applicationName|escape}" width="180" height="90" />
							</a>
						{/if}
					</div>

					{if $currentContext && $currentContext->getLocalizedAcronym()}
						<div class="nusantara-header__context">
							{$currentContext->getLocalizedAcronym()|escape}
						</div>
					{/if}
				</div>

				<div class="nusantara-header__actions">
					{if $currentContext && $requestedPage !== 'search'}
						<button class="nusantara-header__searchToggle" type="button" aria-expanded="false" aria-controls="nusantaraSearchPanel">
							<span class="nusantara-icon nusantara-icon--search" aria-hidden="true">
								<svg viewBox="0 0 20 20" focusable="false" aria-hidden="true">
									<path d="M12.905 11.49l4.602 4.602-1.415 1.415-4.602-4.602a6 6 0 1 1 1.415-1.415zM9 13a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
								</svg>
							</span>
							<span class="nusantara-header__searchLabel">{translate key="common.search"}</span>
						</button>
					{/if}
				</div>
			</div>

			<nav class="nusantara-primaryNav" id="nusantaraPrimaryNav" aria-hidden="true" aria-label="{translate|escape key="common.navigation.site"}">
				{capture assign="primaryMenu"}
					{load_menu name="primary" id="navigationPrimary" ulClass="nusantara-nav" liClass="nusantara-nav__item"}
				{/capture}

				{$primaryMenu}

				{if $hasUserMenu}
					<div class="nusantara-accountMenu">
						<p class="nusantara-accountMenu__label">{translate key="plugins.themes.nusantara.accountMenu.title"}</p>
						{$nusantaraUserMenu|trim nofilter}
					</div>
				{/if}

				{if $currentContext && $requestedPage !== 'search'}
					<div class="nusantara-searchPanel" id="nusantaraSearchPanel">
						<form class="nusantara-searchPanel__form" action="{url page="search"}" method="get" role="search">
							<label class="nusantara-searchPanel__label" for="nusantaraHeaderSearch">{translate key="common.search"} </label>
							<input id="nusantaraHeaderSearch" class="nusantara-searchPanel__input" type="text" name="query" value="{$searchQuery|escape}" placeholder="{translate key="plugins.themes.nusantara.searchPlaceholder"}" />
							<button class="nusantara-searchPanel__submit" type="submit">
								<span class="nusantara-icon nusantara-icon--arrow" aria-hidden="true">
									<svg viewBox="0 0 20 20" focusable="false" aria-hidden="true">
										<path d="M11.293 4.293l4.707 4.707-4.707 4.707-1.414-1.414L12.586 10 9.879 7.293l1.414-1.414zM4 9h10v2H4z" />
									</svg>
								</span>
								<span class="pkp_screen_reader">{translate key="common.search"}</span>
							</button>
						</form>
					</div>
				{/if}
			</nav>
		</header>

		{if $isFullWidth}
			{assign var=hasSidebar value=0}
		{/if}
		<div class="pkp_structure_content nusantara-content{if $hasSidebar} has_sidebar{/if}">
			<div class="pkp_structure_main nusantara-main" role="main">
				<a id="pkp_content_main"></a>
