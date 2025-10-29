<?php

/**
 * @file plugins/themes/nusantara/NusantaraThemePlugin.php
 *
 * Plugin tema kustom yang mendesain ulang tampilan frontend OJS.
 */

namespace APP\plugins\themes\nusantara;

use APP\core\Application;
use APP\template\TemplateManager;
use PKP\plugins\ThemePlugin;

class NusantaraThemePlugin extends ThemePlugin
{
    /**
     * Atur nama plugin yang tampil di UI.
     */
    public function getDisplayName(): string
    {
        return 'Nusantara Theme';
    }

    /**
     * Deskripsi singkat plugin.
     */
    public function getDescription(): string
    {
        return 'Tema kustom bergaya editorial modern untuk menggantikan tampilan standar OJS.';
    }

    /**
     * Batasi registrasi tema hanya pada konteks portal (site).
     */
    public function register($category, $path, $mainContextId = null)
    {
        $request = Application::get()->getRequest();
        $requestContext = $request?->getContext();

        if (
            ($mainContextId !== Application::SITE_CONTEXT_ID && $mainContextId !== Application::SITE_CONTEXT_ID_ALL)
            || $requestContext
        ) {
            return false;
        }

        return parent::register($category, $path, $mainContextId);
    }

    /**
     * Tema ini hanya tersedia di tingkat portal (site).
     */
    public function isSitePlugin(): bool
    {
        return true;
    }

    /**
     * Inisialisasi aset dan opsi tema.
     */
    public function init(): void
    {
        $this->addLocaleData();

        $this->addOption('accentColor', 'FieldColor', [
            'label' => 'Warna aksen utama',
            'description' => 'Digunakan untuk tombol, tautan penting, dan elemen sorotan.',
            'default' => '#0B7285',
        ]);

        $this->addOption('siteHeroTitle', 'FieldText', [
            'label' => 'Judul hero portal',
            'default' => 'Nusantara',
        ]);

        $this->addOption('siteHeroSubtitle', 'FieldTextarea', [
            'label' => 'Subjudul hero portal',
            'description' => 'Teks ringkas yang tampil di bagian hero halaman portal.',
            'default' => 'Temukan, baca, dan publikasikan riset terbaik melalui antarmuka baru yang lebih bersih dan responsif.',
        ]);

        $this->addOption('siteHeroCtaLabel', 'FieldText', [
            'label' => 'Teks tombol hero portal',
            'default' => 'Lihat Jurnal',
        ]);

        $this->addOption('siteHeroCtaUrl', 'FieldText', [
            'label' => 'URL tombol hero portal',
            'default' => '',
        ]);

        $this->addOption('journalHeroTitle', 'FieldText', [
            'label' => 'Judul hero beranda jurnal',
            'default' => 'Bangun komunitas riset yang kolaboratif',
        ]);

        $this->addOption('journalHeroSubtitle', 'FieldTextarea', [
            'label' => 'Subjudul hero beranda jurnal',
            'description' => 'Teks ringkas yang tampil pada hero beranda jurnal.',
            'default' => 'Tingkatkan visibilitas naskah dan percepat proses editorial dengan tampilan baru yang fokus pada pengalaman pembaca.',
        ]);

        $this->addOption('journalHeroCtaLabel', 'FieldText', [
            'label' => 'Judul ajakan beranda jurnal',
            'default' => 'Terbitkan naskah Anda bersama kami',
        ]);

        $this->addOption('siteShowMetrics', 'FieldOptions', [
            'type' => 'radio',
            'label' => 'Tampilkan ringkasan statistik portal',
            'options' => [
                ['value' => 'none', 'label' => 'Sembunyikan'],
                ['value' => 'cards', 'label' => 'Tampilkan kartu ringkas'],
            ],
            'default' => 'cards',
        ]);

        $this->addOption('footerMapEmbed', 'FieldTextarea', [
            'label' => __('plugins.themes.nusantara.option.footerMapEmbed.label'),
            'description' => __('plugins.themes.nusantara.option.footerMapEmbed.description'),
        ]);

        $this->addMenuArea(['primary', 'user']);

        // Memuat stylesheet utama tema.
        $this->addStyle('nusantara-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Merriweather:wght@400;700&display=swap', [
            'baseUrl' => '',
        ]);
        $this->addStyle('nusantara-base', 'styles/base.css');
        $this->addStyle('nusantara-site', 'styles/site.css', [
            'priority' => TemplateManager::STYLE_SEQUENCE_LATE,
        ]);
        $this->addStyle('nusantara-journal', 'styles/journal.css', [
            'priority' => TemplateManager::STYLE_SEQUENCE_LATE,
        ]);

        $accentColor = $this->getOption('accentColor') ?: '#0B7285';
        $this->addStyle('nusantara-accent', ':root { --nusantara-accent: ' . $accentColor . '; }', [
            'inline' => true,
        ]);

        // Skrip interaksi ringan (navigasi, hero, dsb).
        $this->addScript('nusantara-core', 'js/core.js', [
            'priority' => TemplateManager::STYLE_SEQUENCE_LAST,
        ]);
        $this->addScript('nusantara-site-page', 'js/site.js', [
            'priority' => TemplateManager::STYLE_SEQUENCE_LAST,
        ]);
        $this->addScript('nusantara-journal-page', 'js/journal.js', [
            'priority' => TemplateManager::STYLE_SEQUENCE_LAST,
        ]);
    }
}


