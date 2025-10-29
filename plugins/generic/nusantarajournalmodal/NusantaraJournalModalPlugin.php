<?php

/**
 * @file plugins/generic/nusantarajournalmodal/NusantaraJournalModalPlugin.php
 *
 * @ingroup plugins_generic_nusantarajournalmodal
 *
 * @brief Generic plugin yang menyediakan modal detail jurnal untuk tema Nusantara.
 */

namespace APP\plugins\generic\nusantarajournalmodal;

use APP\core\Application;
use APP\notification\NotificationManager;
use PKP\core\JSONMessage;
use PKP\db\DAORegistry;
use PKP\linkAction\LinkAction;
use PKP\linkAction\request\AjaxModal;
use PKP\plugins\GenericPlugin;
use PKP\plugins\PluginRegistry;

class NusantaraJournalModalPlugin extends GenericPlugin
{
    /**
     * @var ?NotificationManager
     */
    protected ?NotificationManager $notificationManager = null;

    /**
     * {@inheritDoc}
     */
    public function register($category, $path, $mainContextId = null)
    {
        $success = parent::register($category, $path, $mainContextId);
        if (!$success) {
            return false;
        }

        $this->addLocaleData();

        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function getDisplayName(): string
    {
        return __('plugins.generic.nusantarajournalmodal.displayName');
    }

    /**
     * {@inheritDoc}
     */
    public function getDescription(): string
    {
        return __('plugins.generic.nusantarajournalmodal.description');
    }

    /**
     * {@inheritDoc}
     */
    public function getName(): string
    {
        return 'NusantaraJournalModalPlugin';
    }

    /**
     * {@inheritDoc}
     *
     * Tambahkan aksi pengaturan sehingga manajer jurnal dapat mengisi data modal.
     */
    public function getActions($request, $actionArgs): array
    {
        $actions = parent::getActions($request, $actionArgs);
        $context = $request->getContext();

        if (!$context || !$this->getEnabled($context->getId())) {
            return $actions;
        }

        $dispatcher = $request->getDispatcher();

        $actions[] = new LinkAction(
            'settings',
            new AjaxModal(
                $dispatcher->url($request, Application::ROUTE_COMPONENT, null, 'grid.settings.plugins.SettingsPluginGridHandler', 'manage', null, [
                    'plugin' => $this->getName(),
                    'category' => $this->getCategory(),
                    'verb' => 'settings',
                ]),
                $this->getDisplayName(),
                'modal_manage'
            ),
            __('manager.plugins.settings')
        );

        return $actions;
    }

    /**
     * {@inheritDoc}
     */
    public function manage($args, $request)
    {
        $context = $request->getContext();
        if (!$context) {
            return parent::manage($args, $request);
        }

        $verb = $request->getUserVar('verb');
        switch ($verb) {
            case 'settings':
                $this->import('classes.form.JournalModalSettingsForm');
                $form = new form\JournalModalSettingsForm($this, (int) $context->getId());

                if ($request->getUserVar('save')) {
                    $form->readInputData();
                    if ($form->validate()) {
                        $form->execute();
                        $this->getNotificationManager()->createTrivialNotification(
                            $request->getUser()->getId(),
                            NotificationManager::NOTIFICATION_TYPE_SUCCESS,
                            ['contents' => __('common.saved')]
                        );
                        return new JSONMessage(true);
                    } else {
                        return new JSONMessage(true, $form->fetch($request));
                    }
                }

                $form->initData();
                return new JSONMessage(true, $form->fetch($request));
        }

        return parent::manage($args, $request);
    }

    /**
     * Ambil data modal untuk satu konteks jurnal.
     *
     * @return array<string,mixed>
     */
    public function getModalData(int $contextId): array
    {
        $settingsDao = DAORegistry::getDAO('PluginSettingsDAO'); /** @var \PKP\plugins\PluginSettingsDAO $settingsDao */

        $data = [
            'editorInChief' => $settingsDao->getSetting($contextId, $this->getName(), 'editorInChief'),
            'issn' => $settingsDao->getSetting($contextId, $this->getName(), 'issn'),
            'frequency' => $settingsDao->getSetting($contextId, $this->getName(), 'frequency'),
            'indexing' => $this->buildIndexingBadges((string) $settingsDao->getSetting($contextId, $this->getName(), 'indexing')),
            'doi' => $settingsDao->getSetting($contextId, $this->getName(), 'doi'),
            'license' => $settingsDao->getSetting($contextId, $this->getName(), 'license'),
            'primaryLabel' => $settingsDao->getSetting($contextId, $this->getName(), 'primaryLabel'),
            'primaryUrl' => $settingsDao->getSetting($contextId, $this->getName(), 'primaryUrl'),
            'secondaryLabel' => $settingsDao->getSetting($contextId, $this->getName(), 'secondaryLabel'),
            'secondaryUrl' => $settingsDao->getSetting($contextId, $this->getName(), 'secondaryUrl'),
        ];

        return array_map(
            static function ($value) {
                if (is_string($value)) {
                    $trimmed = trim($value);
                    return $trimmed === '' ? null : $trimmed;
                }
                return $value;
            },
            $data
        );
    }

    /**
     * Ubah daftar indeksasi (newline separated) menjadi array badge.
     *
     * @param string|null $raw
     * @return array<int,array<string,string>>
     */
    protected function buildIndexingBadges(?string $raw): array
    {
        if (!$raw) {
            return [];
        }

        $lines = preg_split("/\r\n|\r|\n/", $raw);
        if (!$lines) {
            return [];
        }

        $badges = [];
        foreach ($lines as $line) {
            $label = trim($line);
            if ($label === '') {
                continue;
            }
            $badges[] = [
                'label' => $label,
                'class' => $this->resolveBadgeClass($label),
            ];
        }

        return $badges;
    }

    /**
     * Tentukan kelas warna untuk badge berdasarkan label.
     */
    protected function resolveBadgeClass(string $label): string
    {
        $key = strtolower($label);
        return match (true) {
            str_contains($key, 'sinta') => 'nusantara-chip--blue',
            str_contains($key, 'doaj') => 'nusantara-chip--orange',
            str_contains($key, 'scopus') => 'nusantara-chip--slate',
            str_contains($key, 'google') => 'nusantara-chip--indigo',
            str_contains($key, 'crossref') => 'nusantara-chip--amber',
            str_contains($key, 'garuda') => 'nusantara-chip--red',
            str_contains($key, 'scilit') => 'nusantara-chip--violet',
            str_contains($key, 'base') => 'nusantara-chip--green',
            default => 'nusantara-chip--slate',
        };
    }

    protected function getNotificationManager(): NotificationManager
    {
        if (!$this->notificationManager) {
            $this->notificationManager = new NotificationManager();
        }
        return $this->notificationManager;
    }
}
