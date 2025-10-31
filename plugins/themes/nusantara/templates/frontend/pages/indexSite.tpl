{**
 * Nusantara Theme - Beranda Portal
 * Mengganti tata letak default halaman portal/site.
 *}
{include file="frontend/components/header.tpl"}

{assign var="heroTitle" value=$activeTheme->getOption('siteHeroTitle')}
{assign var="heroSubtitle" value=$activeTheme->getOption('siteHeroSubtitle')}
{assign var="heroCtaLabel" value=$activeTheme->getOption('siteHeroCtaLabel')}
{assign var="heroCtaUrl" value=$activeTheme->getOption('siteHeroCtaUrl')}
{if !$heroTitle}
	{assign var="heroTitle" value=$siteTitle}
{/if}
{if !$heroSubtitle && isset($about)}
	{assign var="heroSubtitle" value=$about|strip_tags}
{/if}
{if !$heroCtaUrl}
	{assign var="heroCtaUrl" value="#nusantaraCatalog"}
{/if}

<div class="nusantara-page nusantara-page--site">

	<section class="nusantara-hero">
		<div class="nusantara-hero__content">
			<p class="nusantara-hero__eyebrow">{translate key="plugins.themes.nusantara.hero.siteLabel"}</p>
			<h1 class="nusantara-hero__title">{$heroTitle|escape}</h1>
			{if $heroSubtitle}
				<p class="nusantara-hero__subtitle">{$heroSubtitle|strip_tags|escape}</p>
			{/if}
			<div class="nusantara-hero__actions">
				<a class="nusantara-button nusantara-button--filled" href="{$heroCtaUrl|escape}">
					{$heroCtaLabel|default:{translate key="context.contexts"}}
				</a>
			</div>
		</div>
		<div class="nusantara-hero__aside">
			<form class="nusantara-hero__search" action="{url page="search"}" method="get" role="search">
				<h2>{translate key="common.search"} </h2>
				<label class="nusantara-hero__searchLabel" for="siteHeroSearch">{translate key="plugins.themes.nusantara.searchPlaceholder"}</label>
				<div class="nusantara-hero__searchControl">
					<input id="siteHeroSearch" type="text" name="query" placeholder="{translate key="plugins.themes.nusantara.searchPlaceholder"}" />
					<button type="submit" class="nusantara-button nusantara-button--icon" aria-label="{translate key="common.search"}">
						<svg viewBox="0 0 20 20" aria-hidden="true">
							<path d="M12.905 11.49l4.602 4.602-1.415 1.415-4.602-4.602a6 6 0 1 1 1.415-1.415zM9 13a4 4 0 1 0 0-8 4 4 0 0 0 0 8z" />
						</svg>
					</button>
				</div>
			</form>
		</div>
	</section>


{assign var="journalTotal" value=$journals|@count}
{assign var="announcementTotal" value=0}
{if isset($announcements)}
	{assign var="announcementTotal" value=$announcements|@count}
{/if}

	{if $activeTheme && $activeTheme->getOption('siteShowMetrics') == 'cards'}
		<section class="nusantara-section nusantara-metrics">
			<ul class="nusantara-metrics__list">
				<li>
					<span class="nusantara-metrics__label">{translate key="context.contexts"}</span>
					<strong class="nusantara-metrics__value">{$journalTotal}</strong>
				</li>
				<li>
					<span class="nusantara-metrics__label">{translate key="plugins.themes.nusantara.metrics.articlesPublished"}</span>
					<strong class="nusantara-metrics__value">{$nusantaraArticlesPublished|default:0}</strong>
				</li>
				<li>
					<span class="nusantara-metrics__label">{translate key="plugins.themes.nusantara.metrics.readers"}</span>
					<strong class="nusantara-metrics__value">&infin;</strong>
				</li>
			</ul>
		</section>
	{/if}

	{if isset($about) && $about}
		<section class="nusantara-section nusantara-about">
			<div class="nusantara-section__header">
				<h2>{translate key="plugins.themes.nusantara.site.aboutTitle"}</h2>
			</div>
			<div class="nusantara-section__body">
				{$about}
			</div>
		</section>
	{/if}

	{include file="frontend/objects/announcements_list.tpl" numAnnouncements=$numAnnouncementsHomepage}

	<section class="nusantara-section nusantara-journals" id="nusantaraCatalog">
		<div class="nusantara-section__header">
			<h2>{translate key="plugins.themes.nusantara.site.journalShowcase"}</h2>
			<p>{translate key="plugins.themes.nusantara.site.journalShowcaseDescription"}</p>
		</div>

		{if !$journals|@count}
			<p class="nusantara-empty">{translate key="site.noJournals"}</p>
		{else}
			<div class="nusantara-journalGrid">
				{foreach from=$journals item=journal}
					{assign var="journalId" value=$journal->getId()}
					{capture assign="url"}{url journal=$journal->getPath()}{/capture}
					{assign var="thumb" value=$journal->getLocalizedData('journalThumbnail')}
					{assign var="description" value=$journal->getLocalizedDescription()}
					{assign var="modalId" value="nusantaraJournalModal"|cat:$journalId}
					{assign var="modalData" value=$nusantaraJournalModalData[$journalId]|default:null}

					{assign var="publisher" value=$journal->getData('publisherInstitution')}
					{if !$publisher}
						{assign var="publisher" value=$journal->getLocalizedData('publisherInstitution')}
					{/if}
					<article class="nusantara-journalPoster{if $thumb} has-thumb{/if}">
						<a class="nusantara-journalPoster__link"
							href="{$url}"
							rel="bookmark"
							{if $modalData}
								data-journal-modal-trigger="{$modalId}"
								role="button"
								aria-haspopup="dialog"
								aria-controls="{$modalId}"
							{/if}
						>
							<div class="nusantara-journalPoster__media">
								{if $thumb}
									<img src="{$journalFilesPath}{$journal->getId()}/{$thumb.uploadName|escape:"url"}" loading="lazy" {if $thumb.altText}alt="{$thumb.altText|escape}"{/if}/>
								{else}
									<div class="nusantara-journalPoster__placeholder">
										{$journal->getLocalizedAcronym()|escape|default:$journal->getLocalizedName()|escape}
									</div>
								{/if}
							</div>
							<div class="nusantara-journalPoster__overlay">
								<h3 class="nusantara-journalPoster__title">{$journal->getLocalizedName()|escape}</h3>
								{if $publisher}
									<p class="nusantara-journalPoster__meta">{$publisher|escape}</p>
								{/if}
							</div>
						</a>
					</article>
				{/foreach}
			</div>
			{if $nusantaraJournalModalData|@count}
				<div class="nusantara-journalModals">
					{foreach from=$journals item=journal}
						{assign var="journalId" value=$journal->getId()}
						{assign var="modalData" value=$nusantaraJournalModalData[$journalId]|default:null}
						{if !$modalData}{continue}{/if}
						{assign var="thumb" value=$journal->getLocalizedData('journalThumbnail')}
						{assign var="modalId" value="nusantaraJournalModal"|cat:$journalId}
						{capture assign="journalUrl"}{url journal=$journal->getPath()}{/capture}
						<section class="nusantara-journalModal" id="{$modalId}" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="{$modalId}-title">
							<div class="nusantara-journalModal__backdrop" data-modal-close></div>
							<div class="nusantara-journalModal__dialog" role="document">
								<button type="button" class="nusantara-journalModal__close" aria-label="{translate key="common.close"}" data-modal-close data-modal-autofocus>
									<svg viewBox="0 0 20 20" aria-hidden="true">
										<path d="M15.3 5.3l-1.6-1.6L10 7.4 6.3 3.7 4.7 5.3 8.4 9l-3.7 3.7 1.6 1.6L10 10.6l3.7 3.7 1.6-1.6L11.6 9z" />
									</svg>
								</button>
								<div class="nusantara-journalModal__content">
									<div class="nusantara-journalModal__media">
										{if $thumb}
											<img src="{$journalFilesPath}{$journal->getId()}/{$thumb.uploadName|escape:"url"}" loading="lazy" {if $thumb.altText}alt="{$thumb.altText|escape}"{/if}/>
										{else}
											<div class="nusantara-journalModal__placeholder">
												{$modalData.acronym|default:$modalData.name|escape}
											</div>
										{/if}
									</div>
									<div class="nusantara-journalModal__body">
										<header class="nusantara-journalModal__header">
											<h3 class="nusantara-journalModal__title" id="{$modalId}-title">
												<i class="fa-solid fa-book-open nusantara-modalIcon" aria-hidden="true"></i>
												<span>{$modalData.name|escape}</span>
											</h3>
											</header>

										<ul class="nusantara-journalModal__meta">
											{if $modalData.editorInChief}
												<li>
													<div class="nusantara-journalModal__metaLabel">
														<i class="fa-solid fa-user-pen" aria-hidden="true"></i>
														<span>{translate key="plugins.generic.nusantarajournalmodal.settings.editor"}</span>
													</div>
													<strong>{$modalData.editorInChief|escape}</strong>
												</li>
											{/if}
											{if $modalData.issn}
												<li>
													<div class="nusantara-journalModal__metaLabel">
														<i class="fa-solid fa-barcode" aria-hidden="true"></i>
														<span>{translate key="plugins.generic.nusantarajournalmodal.settings.issn"}</span>
													</div>
													<strong>{$modalData.issn|escape}</strong>
												</li>
											{/if}
											{if $modalData.frequency}
												<li>
													<div class="nusantara-journalModal__metaLabel">
														<i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
														<span>{translate key="plugins.generic.nusantarajournalmodal.settings.frequency"}</span>
													</div>
													<strong>{$modalData.frequency|escape}</strong>
												</li>
											{/if}
											{if $modalData.license}
												<li>
													<div class="nusantara-journalModal__metaLabel">
														<i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
														<span>{translate key="plugins.generic.nusantarajournalmodal.settings.license"}</span>
													</div>
													<strong>{$modalData.license|escape}</strong>
												</li>
											{/if}
										</ul>

										{if $modalData.indexing|@count}
											<div class="nusantara-journalModal__badges">
												{foreach from=$modalData.indexing item=badge}
													{assign var="chipClass" value="nusantara-chip {$badge.class|escape}"}
													{if $badge.icon}
														{assign var="chipClass" value="{$chipClass} nusantara-chip--iconOnly"}
													{/if}

													{if $badge.url}
														<a class="{$chipClass} nusantara-chip--link" href="{$badge.url|escape}" target="_blank" rel="noopener">
															{if $badge.icon}
																<img class="nusantara-chip__icon" src="{$badge.icon|escape}" alt="{$badge.label|escape}" loading="lazy" />
															{else}
																{$badge.label|escape}
															{/if}
														</a>
													{else}
														<span class="{$chipClass}">
															{if $badge.icon}
																<img class="nusantara-chip__icon" src="{$badge.icon|escape}" alt="{$badge.label|escape}" loading="lazy" />
															{else}
																{$badge.label|escape}
															{/if}
														</span>
													{/if}
												{/foreach}
											</div>
										{/if}

										<div class="nusantara-journalModal__actions">
											{if $modalData.primaryLabel && $modalData.primaryUrl}
												<a class="nusantara-button nusantara-button--filled" href="{$modalData.primaryUrl|escape}" target="_blank" rel="noopener">
													<i class="fa-solid fa-circle-info" aria-hidden="true"></i>
													<span>{$modalData.primaryLabel|escape}</span>
												</a>
											{/if}
											{if $modalData.secondaryLabel && $modalData.secondaryUrl}
												<a class="nusantara-button nusantara-button--ghost" href="{$modalData.secondaryUrl|escape}" target="_blank" rel="noopener">
													<i class="fa-solid fa-pen-to-square" aria-hidden="true"></i>
													<span>{$modalData.secondaryLabel|escape}</span>
												</a>
											{/if}
											<a class="nusantara-button nusantara-button--text" href="{$journalUrl|escape}">
												<i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
												<span>{translate key="plugins.themes.nusantara.site.visitJournal"}</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</section>
					{/foreach}
				</div>
			{/if}
		{/if}
	</section>

</div>

{include file="frontend/components/footer.tpl"}












