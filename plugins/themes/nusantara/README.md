# Nusantara Theme

Tema kustom untuk Open Journal Systems (OJS) yang merombak tampilan portal dan jurnal dengan pendekatan editorial modern.

## Fitur Utama
- Header dan navigasi baru dengan panel pencarian pop-up dan dukungan menu mobile.
- Desain hero untuk portal dan halaman jurnal dengan fokus pada konten unggulan.
- Kartu jurnal dan pengumuman bergaya kartu dengan tipografi modern.
- Footer informatif dengan area call-to-action dan metadata penerbitan.
- Pemisahan aset CSS/JS untuk portal (`styles/site.css`, `js/site.js`) dan beranda jurnal (`styles/journal.css`, `js/journal.js`) sehingga kustomisasi tidak saling bertabrakan.
- Opsi pengaturan berbeda untuk portal dan beranda jurnal (judul/subjudul hero, CTA, metrik portal).

## Instalasi
1. Pastikan direktori plugins/themes/nusantara tersalin ke instalasi OJS Anda.
2. Jalankan php tools/installPluginVersion.php plugins/themes/nusantara/version.xml dari direktori root OJS untuk mendaftarkan tema.
3. Masuk sebagai Administrator lalu buka *Settings > Website > Appearance*.
4. Aktifkan "Nusantara Theme" dan simpan.

## Pengaturan Tema
- **Warna aksen utama**: mengubah warna utama tombol dan elemen sorotan.
- **Portal (Site) hero**: pilih teks statis atau carousel highlight pada bagian hero, sekaligus teks & URL tombol aksi.
- **Beranda jurnal (Journal Home) hero**: judul, subjudul, dan teks highlight yang tampil di panel samping hero jurnal.
- **Ringkasan metrik portal**: pilih untuk menampilkan atau menyembunyikan kartu statistik pada halaman portal.

Biarkan kolom hero kosong bila ingin memakai fallback otomatis (judul portal/jurnal atau ringkasan setup).

## Struktur Aset
- `styles/base.css` : gaya umum yang dipakai di seluruh halaman.
- `styles/site.css` : gaya khusus portal/site home.
- `styles/journal.css` : gaya khusus beranda jurnal.
- `js/core.js` : interaksi global (navigasi, panel pencarian).
- `js/site.js` dan `js/journal.js` : skrip stub untuk logika tambahan per halaman (aman dibiarkan kosong bila tidak perlu).

## Catatan Tambahan
- Tema memuat font dari Google Fonts (Plus Jakarta Sans dan Merriweather). Pastikan server memiliki akses internet atau siapkan mirror lokal jika diperlukan.
- Setelah mengubah template atau gaya, kosongkan cache templat melalui menu *Admin > Site Settings > Clear Data Caches* agar perubahan langsung muncul.

