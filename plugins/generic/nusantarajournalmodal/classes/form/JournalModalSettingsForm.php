<?php

/**
 * @file plugins/generic/nusantarajournalmodal/classes/form/JournalModalSettingsForm.php
 *
 * @ingroup plugins_generic_nusantarajournalmodal
 *
 * @brief Form pengaturan modal jurnal untuk plugin Nusantara Journal Modal.
 */

namespace APP\plugins\generic\nusantarajournalmodal\classes\form;

use PKP\form\Form;
use PKP\form\validation\FormValidator;
use PKP\form\validation\FormValidatorPost;
use PKP\form\validation\FormValidatorUrl;
use PKP\form\validation\FormValidatorCSRF;
use APP\template\TemplateManager;

class JournalModalSettingsForm extends Form
{
    /** @var \APP\plugins\generic\nusantarajournalmodal\NusantaraJournalModalPlugin */
    protected $plugin;

    /** @var int */
    protected int $contextId;

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
        $this->setData('indexing', $this->plugin->getSetting($this->contextId, 'indexing'));
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
    }

    public function execute(...$functionArgs): void
    {
        $fields = [
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

        parent::execute(...$functionArgs);
    }

    public function fetch($request, $template = null, $display = false): string
    {
        $templateMgr = TemplateManager::getManager($request);
        $templateMgr->assign([
            'pluginName' => $this->plugin->getName(),
        ]);

        return parent::fetch($request, $template, $display);
    }
}
