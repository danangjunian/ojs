{**
 * Nusantara Theme override - halaman pencarian portal.
 * Menyusun ulang form filter dan daftar hasil dengan gaya kartu modern.
 *}
{include file="frontend/components/header.tpl" pageTitle="common.search"}

<div class="nusantara-search">
	<div class="nusantara-search__container">
		<section class="nusantara-search__panel">
			<h1 class="nusantara-search__title">
				{translate key="common.search"}
			</h1>
			<p class="nusantara-search__subtitle">
				{translate key="plugins.themes.nusantara.search.subtitle"}
			</p>

			{capture name="searchFormUrl"}{url escape=false}{/capture}
			{assign var=formUrlParameters value=[]}
			{$smarty.capture.searchFormUrl|parse_url:$smarty.const.PHP_URL_QUERY|default:""|parse_str:$formUrlParameters}

			<form class="nusantara-search__form" method="get" action="{$smarty.capture.searchFormUrl|strtok:"?"|escape}" role="search">
				{foreach from=$formUrlParameters key=paramKey item=paramValue}
					<input type="hidden" name="{$paramKey|escape}" value="{$paramValue|escape}" />
				{/foreach}

				<label class="nusantara-search__field">
					<span class="nusantara-search__label">{translate key="search.searchFor"}</span>
					{block name=searchQuery}
						<input class="nusantara-search__input" type="text" id="query" name="query" value="{$query|escape}" placeholder="{translate|escape key="plugins.themes.nusantara.search.placeholder"}">
					{/block}
				</label>

				<details class="nusantara-search__advanced" {if $authors || $dateFrom || $dateTo || $searchJournal} open{/if}>
					<summary>{translate key="search.advancedFilters"}</summary>

					<div class="nusantara-search__group">
						<div class="nusantara-search__field">
							<span class="nusantara-search__label">{translate key="search.author"}</span>
							{block name=searchAuthors}
								<input class="nusantara-search__input" type="text" id="authors" name="authors" value="{$authors|escape}" placeholder="{translate key="plugins.themes.nusantara.search.authorsPlaceholder"}">
							{/block}
						</div>

						{if $searchableContexts}
							<label class="nusantara-search__field">
								<span class="nusantara-search__label">{translate key="search.journal"}</span>
								<select class="nusantara-search__select" name="searchJournal" id="searchJournal">
									<option value="">{translate key="plugins.themes.nusantara.search.chooseJournal"}</option>
									{foreach from=$searchableContexts item="searchableContext"}
										<option value="{$searchableContext->id}" {if $searchJournal == $searchableContext->id}selected{/if}>
											{$searchableContext->name|escape}
										</option>
									{/foreach}
								</select>
							</label>
						{/if}
					</div>

					<div class="nusantara-search__group nusantara-search__group--dates">
						{capture assign="dateFromLegend"}{translate key="search.dateFrom"}{/capture}
						<div class="nusantara-search__date">
							<span class="nusantara-search__label">{$dateFromLegend}</span>
							{html_select_date_a11y legend=$dateFromLegend prefix="dateFrom" time=$dateFrom start_year=$yearStart end_year=$yearEnd}
						</div>
						{capture assign="dateFromTo"}{translate key="search.dateTo"}{/capture}
						<div class="nusantara-search__date">
							<span class="nusantara-search__label">{$dateFromTo}</span>
							{html_select_date_a11y legend=$dateFromTo prefix="dateTo" time=$dateTo start_year=$yearStart end_year=$yearEnd}
						</div>
					</div>

					{call_hook name="Templates::Search::SearchResults::AdditionalFilters"}
				</details>

				<div class="nusantara-search__actions">
					<button class="nusantara-button nusantara-button--filled" type="submit">
						{translate key="common.search"}
					</button>
				</div>
			</form>
		</section>

		<section class="nusantara-search__results" id="results">
			{call_hook name="Templates::Search::SearchResults::PreResults"}

			<header class="nusantara-search__header">
				<h2>{translate key="search.searchResults"}</h2>
				{if !$results->wasEmpty()}
					<p class="nusantara-search__count" role="status">
						{if $results->count > 1}
							{translate key="search.searchResults.foundPlural" count=$results->count}
						{else}
							{translate key="search.searchResults.foundSingle"}
						{/if}
					</p>
				{/if}
			</header>

			{if $results->wasEmpty()}
				<div class="nusantara-search__empty" role="status">
					{if $error}
						{include file="frontend/components/notification.tpl" type="error" message=$error|escape}
					{else}
						{translate key="search.noResults"}
					{/if}
				</div>
			{else}
				<ul class="nusantara-search__list">
					{iterate from=results item=result}
						<li class="nusantara-search__item">
							{include file="frontend/objects/article_summary.tpl" article=$result.publishedSubmission journal=$result.journal showDatePublished=true hideGalleys=true heading="h3"}
						</li>
					{/iterate}
				</ul>

				<div class="nusantara-search__pagination cmp_pagination">
					{page_info iterator=$results}
					{page_links anchor="results" iterator=$results name="search" query=$query searchJournal=$searchJournal authors=$authors dateFromMonth=$dateFromMonth dateFromDay=$dateFromDay dateFromYear=$dateFromYear dateToMonth=$dateToMonth dateToDay=$dateToDay dateToYear=$dateToYear}
				</div>
			{/if}
		</section>
	</div>
</div>

{include file="frontend/components/footer.tpl"}
