<?php

/**
 * @file plugins/generic/nusantarajournalmodal/classes/form/JournalModalSettingsForm.php
 *
 * @ingroup plugins_generic_nusantarajournalmodal
 *
 * @brief Form pengaturan modal jurnal untuk plugin Nusantara Journal Modal.
 */

namespace APP\plugins\generic\nusantarajournalmodal\classes\form;

use APP\template\TemplateManager;
use PKP\form\Form;
use PKP\form\validation\FormValidator;
use PKP\form\validation\FormValidatorCSRF;
use PKP\form\validation\FormValidatorPost;
use PKP\form\validation\FormValidatorUrl;

class JournalModalSettingsForm extends Form
{
    /** @var \APP\plugins\generic\nusantarajournalmodal\NusantaraJournalModalPlugin */
    protected $plugin;

    /** @var int */
    protected int $contextId;

    /** @var array<int,array<string,string|null>> */
    protected array $indexingRows = [];

    public function __construct($plugin, int $contextId)
    {
        parent::__construct($plugin->getTemplateResource('settingsForm.tpl'));
        $this->plugin = $plugin;
        $this->contextId = $contextId;

        $this->addCheck(new FormValidator($this, 'editorInChief', 'optional', 'plugins.generic.nusantarajournalmodal.validation.editor'));
        $this->addCheck(new FormValidator($this, 'issn', 'optional', 'plugins.generic.nusantarajournalmodal.validation.issn'));
        $this->addCheck(new FormValidatorUrl($this, 'primaryUrl', 'optional', 'plugins.generic.nusantarajournalmodal.validation.primaryUrl'));
        $this->addCheck(new FormValidatorUrl($this, 'secondaryUrl', 'optional', 'plugins.generic.nusantarajournalmodal.validation.secondaryUrl'));
        $this->addCheck(new FormValidatorCSRF($this));
        $this->addCheck(new FormValidatorPost($this));
    }

    public function initData(): void
    {
        $this->setData('eyebrowLabel', $this->plugin->getSetting($this->contextId, 'eyebrowLabel'));
        $this->setData('editorInChief', $this->plugin->getSetting($this->contextId, 'editorInChief'));
        $this->setData('issn', $this->plugin->getSetting($this->contextId, 'issn'));
        $this->setData('frequency', $this->plugin->getSetting($this->contextId, 'frequency'));
        $this->indexingRows = $this->normalizeIndexingRows($this->plugin->getSetting($this->contextId, 'indexing'), false);
        $this->setData('indexing', $this->indexingRows);
        $this->setData('doi', $this->plugin->getSetting($this->contextId, 'doi'));
        $this->setData('license', $this->plugin->getSetting($this->contextId, 'license'));
        $this->setData('primaryLabel', $this->plugin->getSetting($this->contextId, 'primaryLabel'));
        $this->setData('primaryUrl', $this->plugin->getSetting($this->contextId, 'primaryUrl'));
        $this->setData('secondaryLabel', $this->plugin->getSetting($this->contextId, 'secondaryLabel'));
        $this->setData('secondaryUrl', $this->plugin->getSetting($this->contextId, 'secondaryUrl'));
        parent::initData();
    }

    public function readInputData(): void
    {
        $this->readUserVars([
            'editorInChief',
            'eyebrowLabel',
            'issn',
            'frequency',
            'indexing',
            'doi',
            'license',
            'primaryLabel',
            'primaryUrl',
            'secondaryLabel',
            'secondaryUrl',
        ]);

        $this->indexingRows = $this->normalizeIndexingRows($this->getData('indexing'), true);
        $this->setData('indexing', $this->indexingRows);
    }

    public function execute(...$functionArgs): void
    {
        $fields = [
            'editorInChief',
            'eyebrowLabel',
            'issn',
            'frequency',
            'doi',
            'license',
            'primaryLabel',
            'primaryUrl',
            'secondaryLabel',
            'secondaryUrl',
        ];

        foreach ($fields as $field) {
            $value = $this->getData($field);
            if (is_string($value)) {
                $value = trim($value);
            }
            if ($value === '') {
                $value = null;
            }
            $this->plugin->updateSetting($this->contextId, $field, $value);
        }

        $indexingSetting = $this->prepareIndexingSettingForStorage($this->indexingRows);
        $this->plugin->updateSetting($this->contextId, 'indexing', $indexingSetting, 'object');

        parent::execute(...$functionArgs);
    }

    public function fetch($request, $template = null, $display = false): string
    {
        $rows = $this->indexingRows ?: $this->normalizeIndexingRows($this->plugin->getSetting($this->contextId, 'indexing'), false);
        $options = $this->plugin->getIndexingOptions();
        $selectOptions = [];
        foreach ($options as $value => $meta) {
            $selectOptions[$value] = $meta['label'];
        }
        foreach ($rows as $row) {
            $id = $row['id'] ?? '';
            $label = $row['label'] ?? null;
            if ($id && $label && !isset($selectOptions[$id])) {
                $selectOptions[$id] = $label;
            }
        }

        $rowCount = max(count($rows) + 2, 6);
        if ($rowCount > count($rows)) {
            for ($i = count($rows); $i < $rowCount; $i++) {
                $rows[$i] = [];
            }
        }

        $usedCounts = [];
        foreach ($rows as $row) {
            $id = $row['id'] ?? '';
            if ($id !== '' && isset($options[$id])) {
                $usedCounts[$id] = ($usedCounts[$id] ?? 0) + 1;
            }
        }

        $optionsPerRow = [];
        for ($index = 0; $index < $rowCount; $index++) {
            $currentId = $rows[$index]['id'] ?? '';
            $optionsForRow = [];
            foreach ($options as $value => $meta) {
                $count = $usedCounts[$value] ?? 0;
                if ($value === $currentId && $currentId !== '') {
                    $count--;
                }
                if ($count > 0) {
                    continue;
                }
                $optionsForRow[$value] = $meta['label'];
            }
            $optionsPerRow[$index] = $optionsForRow;
        }

        $templateMgr = TemplateManager::getManager($request);
        $templateMgr->assign([
            'pluginName' => $this->plugin->getName(),
            'indexingRows' => $rows,
            'indexingRowCount' => $rowCount,
            'indexingOptions' => $selectOptions,
            'indexingOptionsPerRow' => $optionsPerRow,
        ]);

        return parent::fetch($request, $template, $display);
    }

    /**
     * Normalisasi data indeksasi dari database maupun input form.
     *
     * @param mixed $source
     * @param bool $fromInput
     * @return array<int,array<string,string|null>>
     */
    protected function normalizeIndexingRows($source, bool $fromInput): array
    {
        $rows = [];
        $options = $this->plugin->getIndexingOptions();

        $seenIds = [];

        if ($fromInput) {
            if (!is_array($source)) {
                return [];
            }
            foreach ($source as $entry) {
                if (!is_array($entry)) {
                    continue;
                }
                $id = isset($entry['id']) ? trim((string) $entry['id']) : '';
                $url = isset($entry['url']) ? trim((string) $entry['url']) : '';
                $labelInput = isset($entry['label']) ? trim((string) $entry['label']) : null;

                if ($id === '' && $url === '') {
                    continue;
                }

                 if ($id !== '' && isset($seenIds[$id])) {
                    continue;
                }

                if ($id !== '' && isset($options[$id])) {
                    $label = $options[$id]['label'];
                } else {
                    $label = $labelInput ?: ($id ?: null);
                }

                if (!$label) {
                    continue;
                }

                if ($id !== '') {
                    $seenIds[$id] = true;
                }

                $rows[] = [
                    'id' => $id,
                    'label' => $label,
                    'url' => $url !== '' ? $url : null,
                ];
            }

            return $rows;
        }

        if (is_array($source)) {
            foreach ($source as $entry) {
                if (!is_array($entry)) {
                    continue;
                }
                $id = isset($entry['id']) ? trim((string) $entry['id']) : '';
                $label = isset($entry['label']) ? trim((string) $entry['label']) : null;
                $url = isset($entry['url']) ? trim((string) $entry['url']) : '';

                if ($id !== '' && isset($options[$id])) {
                    $label = $options[$id]['label'];
                } elseif (!$label) {
                    $label = $id ?: null;
                }

                if (!$label) {
                    continue;
                }

                if ($id !== '' && isset($seenIds[$id])) {
                    continue;
                }

                if ($id !== '') {
                    $seenIds[$id] = true;
                }

                $rows[] = [
                    'id' => $id,
                    'label' => $label,
                    'url' => $url !== '' ? $url : null,
                ];
            }

            return $rows;
        }

        if (is_string($source)) {
            $lines = preg_split("/\r\n|\r|\n/", $source);
            if (!$lines) {
                return [];
            }
            foreach ($lines as $line) {
                $label = trim($line);
                if ($label === '') {
                    continue;
                }
                $matchedId = '';
                foreach ($options as $value => $meta) {
                    if (strcasecmp($meta['label'], $label) === 0) {
                        $matchedId = $value;
                        break;
                    }
                }
                if ($matchedId !== '' && isset($seenIds[$matchedId])) {
                    continue;
                }
                if ($matchedId === '') {
                    $matchedId = 'legacy:' . sha1($label);
                }
                if ($matchedId !== '') {
                    $seenIds[$matchedId] = true;
                }
                $rows[] = [
                    'id' => $matchedId,
                    'label' => $label,
                    'url' => null,
                ];
            }
        }

        return $rows;
    }

    /**
     * Siapkan data indeksasi untuk disimpan ke database.
     *
     * @param array<int,array<string,string|null>> $rows
     * @return array<int,array<string,string>>|null
     */
    protected function prepareIndexingSettingForStorage(array $rows): ?array
    {
        $prepared = [];
        $seenIds = [];
        foreach ($rows as $row) {
            $id = isset($row['id']) ? trim((string) $row['id']) : '';
            $label = isset($row['label']) ? trim((string) $row['label']) : null;
            $url = isset($row['url']) ? trim((string) $row['url']) : '';

            if ($id !== '' && isset($seenIds[$id])) {
                continue;
            }

            if ($id === '' && !$label && $url === '') {
                continue;
            }

            $entry = [];
            if ($id !== '') {
                $entry['id'] = $id;
            }
            if ($label) {
                $entry['label'] = $label;
            }
            if ($url !== '') {
                $entry['url'] = $url;
            }

            if ($entry) {
                $prepared[] = $entry;
                if ($id !== '') {
                    $seenIds[$id] = true;
                }
            }
        }

        return $prepared ? $prepared : null;
    }
}
