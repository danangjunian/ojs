{**
 * @file plugins/generic/nusantarajournalmodal/templates/settingsForm.tpl
 *
 * @ingroup plugins_generic_nusantarajournalmodal
 *
 * @brief Form pengaturan modal jurnal.
 *}

<script>
	$(function() {ldelim}
		$('#nusantaraJournalModalSettingsForm').pkpHandler('$.pkp.controllers.form.AjaxFormHandler');
	{rdelim});
</script>

<style>
	.nusantara-indexingRows {
		display: flex;
		flex-direction: column;
		gap: 1rem;
	}

	.nusantara-indexingRow__note {
		margin: 0.25rem 0 0;
		font-size: 0.75rem;
		color: #6b7280;
	}
</style>

<form class="pkp_form" id="nusantaraJournalModalSettingsForm" method="post" action="{url router=PKP\core\PKPApplication::ROUTE_COMPONENT op="manage" category="generic" plugin=$pluginName verb="settings" save=true}">
	{csrf}
	{include file="controllers/notification/inPlaceNotification.tpl" notificationId="nusantaraJournalModalSettingsFormNotification"}

{fbvFormArea id="journalModalSettings"}
	{fbvFormSection title="plugins.generic.nusantarajournalmodal.settings.header.journal"}
		{fbvElement type="text" id="eyebrowLabel" name="eyebrowLabel" value=$eyebrowLabel label="plugins.generic.nusantarajournalmodal.settings.eyebrowLabel" size=$fbvStyles.size.MEDIUM}
		{fbvElement type="text" id="editorInChief" name="editorInChief" value=$editorInChief label="plugins.generic.nusantarajournalmodal.settings.editor" size=$fbvStyles.size.MEDIUM}
		{fbvElement type="textarea" id="issn" name="issn" value=$issn label="plugins.generic.nusantarajournalmodal.settings.issn" size=$fbvStyles.size.MEDIUM}
		{fbvElement type="textarea" id="frequency" name="frequency" value=$frequency label="plugins.generic.nusantarajournalmodal.settings.frequency" size=$fbvStyles.size.MEDIUM}
	{/fbvFormSection}

	{fbvFormSection title="plugins.generic.nusantarajournalmodal.settings.header.indexing" description="plugins.generic.nusantarajournalmodal.settings.indexing.description.dropdown"}
		<div class="nusantara-indexingRows">
			{section name=row loop=$indexingRowCount}
				{assign var="rowIndex" value=$smarty.section.row.index}
				{assign var="rowData" value=$indexingRows[$rowIndex]|default:[]}
				{assign var="rowId" value=$rowData.id|default:''}
				{assign var="rowUrl" value=$rowData.url|default:''}
				{assign var="rowLabel" value=$rowData.label|default:''}
				<div class="nusantara-indexingRow">
					{fbvElement
						type="select"
						id="indexing-`$rowIndex`-id"
						name="indexing[`$rowIndex`][id]"
						label="plugins.generic.nusantarajournalmodal.settings.indexing.option"
						from=$indexingOptions
						selected=$rowId
						translate=false
						defaultValue=""
						size=$fbvStyles.size.MEDIUM
					}
					{fbvElement
						type="text"
						id="indexing-`$rowIndex`-url"
						name="indexing[`$rowIndex`][url]"
						value=$rowUrl
						label="plugins.generic.nusantarajournalmodal.settings.indexing.url"
						size=$fbvStyles.size.MEDIUM
					}
					{fbvElement
						type="hidden"
						id="indexing-`$rowIndex`-label"
						name="indexing[`$rowIndex`][label]"
						value=$rowLabel
					}
					{if $rowLabel && !$indexingOptions[$rowId]}
						<p class="nusantara-indexingRow__note">{$rowLabel|escape}</p>
					{/if}
				</div>
			{/section}
		</div>
	{/fbvFormSection}

	{fbvFormSection title="plugins.generic.nusantarajournalmodal.settings.header.links"}
		{fbvElement type="text" id="primaryLabel" name="primaryLabel" value=$primaryLabel label="plugins.generic.nusantarajournalmodal.settings.primaryLabel" size=$fbvStyles.size.MEDIUM}
		{fbvElement type="text" id="primaryUrl" name="primaryUrl" value=$primaryUrl label="plugins.generic.nusantarajournalmodal.settings.primaryUrl" size=$fbvStyles.size.MEDIUM}
		{fbvElement type="text" id="secondaryLabel" name="secondaryLabel" value=$secondaryLabel label="plugins.generic.nusantarajournalmodal.settings.secondaryLabel" size=$fbvStyles.size.MEDIUM}
		{fbvElement type="text" id="secondaryUrl" name="secondaryUrl" value=$secondaryUrl label="plugins.generic.nusantarajournalmodal.settings.secondaryUrl" size=$fbvStyles.size.MEDIUM}
	{/fbvFormSection}

	{fbvFormSection title="plugins.generic.nusantarajournalmodal.settings.header.additional"}
		{fbvElement type="text" id="doi" name="doi" value=$doi label="plugins.generic.nusantarajournalmodal.settings.doi" size=$fbvStyles.size.MEDIUM}
		{fbvElement type="textarea" id="license" name="license" value=$license label="plugins.generic.nusantarajournalmodal.settings.license" size=$fbvStyles.size.MEDIUM}
	{/fbvFormSection}
{/fbvFormArea}

	{fbvFormButtons submitText="common.save"}

	<p><span class="formRequired">{translate key="common.requiredField"}</span></p>
</form>
