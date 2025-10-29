{**
 * Nusantara Theme - Beranda Jurnal
 * Tata letak baru untuk halaman depan jurnal.
 *}
{include file="frontend/components/header.tpl" pageTitleTranslated=$currentJournal->getLocalizedName()}

{call_hook name="Templates::Index::journal"}

{assign var="heroTitle" value=$activeTheme->getOption('journalHeroTitle')}
{assign var="heroSubtitle" value=$activeTheme->getOption('journalHeroSubtitle')}
{assign var="journalCtaHighlight" value=$activeTheme->getOption('journalHeroCtaLabel')}
{if !$heroTitle}
	{assign var="heroTitle" value=$currentJournal->getLocalizedName()}
{/if}
{if !$heroSubtitle}
	{assign var="heroSubtitle" value=$currentJournal->getLocalizedData('description')|strip_tags}
{/if}

{assign var="heroImage" value=''}
{if $activeTheme && !$activeTheme->getOption('useHomepageImageAsHeader') && $homepageImage}
	{assign var="heroImage" value="{$publicFilesDir}/{$homepageImage.uploadName|escape:"url"}"}
{/if}

<div class="nusantara-page nusantara-page--journal">

	<section class="nusantara-hero nusantara-hero--journal{if $heroImage} has-image{/if}"{if $heroImage} style="--hero-image: url('{$heroImage|escape:"quotes"}');"{/if}>
		<div class="nusantara-hero__content">
			<p class="nusantara-hero__eyebrow">{translate key="context.context"}</p>
			<h1 class="nusantara-hero__title">{$heroTitle|escape}</h1>
			{if $heroSubtitle}
				<p class="nusantara-hero__subtitle">{$heroSubtitle|strip_tags|truncate:260:"..."|escape}</p>
			{/if}
			<div class="nusantara-hero__actions">
				<a class="nusantara-button nusantara-button--filled" href="{url page="issue" op="current"}">
					{translate key="journal.currentIssue"}
				</a>
				<a class="nusantara-button nusantara-button--ghost" href="{url page="issue" op="archive"}">
					{translate key="journal.viewAllIssues"}
				</a>
			</div>
		</div>
		<div class="nusantara-hero__aside">
			<ul class="nusantara-hero__stats">
				<li>
					<span>{translate key="about.onlineSubmission"}</span>
					<strong>{translate key="plugins.themes.nusantara.hero.fastReview"}</strong>
				</li>
				<li>
					<span>{translate key="about.onlineSubmissions.register"}</span>
					<strong>
						{if $journalCtaHighlight}
							{$journalCtaHighlight|escape}
						{else}
							{translate key="plugins.themes.nusantara.hero.joinCommunity"}
						{/if}
					</strong>
				</li>
			</ul>
		</div>
	</section>

	{if $highlights->count()}
		<section class="nusantara-section nusantara-section--shaded nusantara-highlights">
			<div class="nusantara-section__header">
				<h2>{translate key="common.highlights"}</h2>
			</div>
			<div class="nusantara-highlights__content">
				{include file="frontend/components/highlights.tpl" highlights=$highlights}
			</div>
		</section>
	{/if}

	{assign var="journalAnnouncementsCount" value=0}
	{if isset($announcements)}
		{assign var="journalAnnouncementsCount" value=$announcements|@count}
	{/if}

	{if $journalAnnouncementsCount}
		<section class="nusantara-section nusantara-announcements">
			<div class="nusantara-section__header">
				<h2>{translate key="announcement.announcements"}</h2>
				<a class="nusantara-link" href="{url page="announcement"}">{translate key="plugins.themes.nusantara.announcements.viewAll"}</a>
			</div>
			<div class="nusantara-announcements__list">
				{foreach name=announcements from=$announcements item=announcement}
					{if $smarty.foreach.announcements.iteration > $numAnnouncementsHomepage}
						{break}
					{/if}
					<article class="nusantara-announcementCard">
						<h3>
							<a href="{url router=PKP\core\PKPApplication::ROUTE_PAGE page="announcement" op="view" path=$announcement->id}">
								{$announcement->getLocalizedData('title')|escape}
							</a>
						</h3>
						<time datetime="{$announcement->datePosted|date_format:"%Y-%m-%d"}">
							{$announcement->datePosted->format($dateFormatShort)}
						</time>
						<p>{$announcement->getLocalizedData('descriptionShort')|strip_tags|truncate:160:"..."|escape}</p>
					</article>
				{/foreach}
			</div>
		</section>
	{/if}

	{if $activeTheme && $activeTheme->getOption('showDescriptionInJournalIndex')}
		<section class="nusantara-section nusantara-about">
			<div class="nusantara-section__header">
				<h2>{translate key="about.aboutContext"}</h2>
			</div>
			<div class="nusantara-section__body">
				{$currentContext->getLocalizedData('description')}
			</div>
		</section>
	{/if}

	{if $issue}
		<section class="nusantara-section nusantara-currentIssue">
			<div class="nusantara-section__header">
				<h2>{translate key="journal.currentIssue"}</h2>
				<p>{$issue->getIssueIdentification()|escape}</p>
			</div>
			<div class="nusantara-currentIssue__grid">
				{include file="frontend/objects/issue_toc.tpl" heading="h3"}
			</div>
			<a class="nusantara-button nusantara-button--ghost" href="{url router=PKP\core\PKPApplication::ROUTE_PAGE page="issue" op="archive"}">
				{translate key="journal.viewAllIssues"}
			</a>
		</section>
	{/if}

	{if $additionalHomeContent}
		<section class="nusantara-section nusantara-extraContent">
			<div class="nusantara-section__body">
				{$additionalHomeContent}
			</div>
		</section>
	{/if}
</div>

{include file="frontend/components/footer.tpl"}
