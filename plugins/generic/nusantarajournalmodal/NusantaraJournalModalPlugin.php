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
use APP\plugins\generic\nusantarajournalmodal\classes\form\JournalModalSettingsForm;
use PKP\core\JSONMessage;
use PKP\db\DAORegistry;
use PKP\linkAction\LinkAction;
use PKP\linkAction\request\AjaxModal;
use PKP\plugins\GenericPlugin;
use PKP\plugins\PluginRegistry;
use PKP\notification\Notification;

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
     * Plugin hanya dapat diaktifkan pada konteks jurnal.
     */
    public function getCanEnable(): bool
    {
        $request = Application::get()->getRequest();
        $context = $request?->getContext();
        if ($context) {
            return true;
        }

        $contextId = (int) ($request?->getUserVar('contextId') ?? 0);
        return $contextId > 0;
    }

    /**
     * Plugin tidak tersedia di level portal.
     */
    public function isSitePlugin(): bool
    {
        return false;
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
                $form = new JournalModalSettingsForm($this, (int) $context->getId());

                if ($request->getUserVar('save')) {
                    $form->readInputData();
                    if ($form->validate()) {
                        $form->execute();
                        $this->getNotificationManager()->createTrivialNotification(
                            $request->getUser()->getId(),
                            Notification::NOTIFICATION_TYPE_SUCCESS,
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
     * Daftar opsi indeksasi yang tersedia dalam bentuk [id => ['label' => ..., 'class' => ...]].
     *
     * @return array<string,array<string,string>>
     */
    public function getIndexingOptions(): array
    {
        $options = [
            'googleScholar' => [
                'label' => 'Google Scholar',
                'class' => $this->resolveBadgeClass('Google Scholar'),
                'icon' => null,
            ],
            'garuda' => [
                'label' => 'GARUDA',
                'class' => $this->resolveBadgeClass('GARUDA'),
                'icon' => null,
            ],
            'sinta1' => [
                'label' => 'SINTA 1',
                'class' => $this->resolveBadgeClass('SINTA 1'),
                'icon' => null,
            ],
            'sinta2' => [
                'label' => 'SINTA 2',
                'class' => $this->resolveBadgeClass('SINTA 2'),
                'icon' => 'static/indexing/sinta-2.png',
            ],
            'sinta3' => [
                'label' => 'SINTA 3',
                'class' => $this->resolveBadgeClass('SINTA 3'),
                'icon' => null,
            ],
            'sinta4' => [
                'label' => 'SINTA 4',
                'class' => $this->resolveBadgeClass('SINTA 4'),
                'icon' => null,
            ],
            'sinta5' => [
                'label' => 'SINTA 5',
                'class' => $this->resolveBadgeClass('SINTA 5'),
                'icon' => null,
            ],
            'sinta6' => [
                'label' => 'SINTA 6',
                'class' => $this->resolveBadgeClass('SINTA 6'),
                'icon' => null,
            ],
            'moraref' => [
                'label' => 'Moraref',
                'class' => $this->resolveBadgeClass('Moraref'),
                'icon' => null,
            ],
            'indonesiaOneSearch' => [
                'label' => 'Indonesia OneSearch',
                'class' => $this->resolveBadgeClass('Indonesia OneSearch'),
                'icon' => null,
            ],
            'neliti' => [
                'label' => 'Neliti',
                'class' => $this->resolveBadgeClass('Neliti'),
                'icon' => null,
            ],
            'pkpIndex' => [
                'label' => 'PKP Index',
                'class' => $this->resolveBadgeClass('PKP Index'),
                'icon' => null,
            ],
            'doaj' => [
                'label' => 'DOAJ',
                'class' => $this->resolveBadgeClass('DOAJ'),
                'icon' => null,
            ],
            'base' => [
                'label' => 'BASE',
                'class' => $this->resolveBadgeClass('BASE'),
                'icon' => null,
            ],
            'openaire' => [
                'label' => 'OpenAIRE',
                'class' => $this->resolveBadgeClass('OpenAIRE'),
                'icon' => null,
            ],
            'worldcat' => [
                'label' => 'WorldCat',
                'class' => $this->resolveBadgeClass('WorldCat'),
                'icon' => null,
            ],
            'dimensions' => [
                'label' => 'Dimensions',
                'class' => $this->resolveBadgeClass('Dimensions'),
                'icon' => null,
            ],
            'theLens' => [
                'label' => 'The Lens',
                'class' => $this->resolveBadgeClass('The Lens'),
                'icon' => null,
            ],
            'scopus' => [
                'label' => 'Scopus',
                'class' => $this->resolveBadgeClass('Scopus'),
                'icon' => null,
            ],
        ];

        return $options;
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
            'eyebrowLabel' => $settingsDao->getSetting($contextId, $this->getName(), 'eyebrowLabel'),
            'editorInChief' => $settingsDao->getSetting($contextId, $this->getName(), 'editorInChief'),
            'issn' => $settingsDao->getSetting($contextId, $this->getName(), 'issn'),
            'frequency' => $settingsDao->getSetting($contextId, $this->getName(), 'frequency'),
            'indexing' => $this->buildIndexingBadges($settingsDao->getSetting($contextId, $this->getName(), 'indexing')),
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
     * @param mixed $raw
     * @return array<int,array<string,string|null>>
     */
    protected function buildIndexingBadges($raw): array
    {
        $badges = [];
        $options = $this->getIndexingOptions();

        if (is_array($raw)) {
            foreach ($raw as $entry) {
                if (!is_array($entry)) {
                    continue;
                }
                $id = isset($entry['id']) ? trim((string) $entry['id']) : '';
                $storedLabel = isset($entry['label']) ? trim((string) $entry['label']) : null;

                if ($id !== '' && isset($options[$id])) {
                    $label = $options[$id]['label'];
                    $class = $options[$id]['class'];
                    $icon = $options[$id]['icon'] ?? null;
                } else {
                    $label = $storedLabel ?? ($id !== '' ? $id : '');
                    if ($label === '') {
                        continue;
                    }
                    $class = $this->resolveBadgeClass($label);
                    $icon = null;
                }

                $url = $entry['url'] ?? null;
                if (is_string($url)) {
                    $url = trim($url);
                    if ($url === '') {
                        $url = null;
                    }
                } else {
                    $url = null;
                }

                $badges[] = [
                    'label' => $label,
                    'class' => $class,
                    'url' => $url,
                    'icon' => $icon,
                ];
            }
            return $badges;
        }

        if (!$raw) {
            return [];
        }

        $lines = preg_split("/\r\n|\r|\n/", (string) $raw);
        if (!$lines) {
            return [];
        }

        foreach ($lines as $line) {
            $label = trim($line);
            if ($label === '') {
                continue;
            }
            $badges[] = [
                'label' => $label,
                'class' => $this->resolveBadgeClass($label),
                'url' => null,
                'icon' => null,
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
            str_contains($key, 'moraref') => 'nusantara-chip--green',
            str_contains($key, 'pkp') => 'nusantara-chip--slate',
            str_contains($key, 'neliti') => 'nusantara-chip--indigo',
            str_contains($key, 'one search') || str_contains($key, 'onesearch') => 'nusantara-chip--slate',
            str_contains($key, 'openaire') => 'nusantara-chip--violet',
            str_contains($key, 'worldcat') => 'nusantara-chip--blue',
            str_contains($key, 'dimensions') => 'nusantara-chip--amber',
            str_contains($key, 'lens') => 'nusantara-chip--indigo',
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
