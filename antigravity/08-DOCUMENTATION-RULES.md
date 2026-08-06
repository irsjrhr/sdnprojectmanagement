# Antigravity Documentation Standard Rules
**Reference (*Gold Standard*)**: BRD-001 & FSD-001 (Master Company)

Dokumen ini mendefinisikan aturan mutlak (*Hard Rules*) yang **wajib dipatuhi** oleh AI Assistant saat menyusun spesifikasi sistem (BRD dan FSD).

## 1. Aturan Format Presentasi Baku (HTML Matrix)
Semua poin (tanpa terkecuali) di dalam dokumen WAJIB disajikan menggunakan **tabel HTML standar (*Matrix Format*)**. 
Dilarang keras menggunakan `<p>` atau `<ul>` polos untuk menjabarkan fungsi, kecuali diletakkan secara terstruktur di dalam kolom tabel (*cell* `<td>`).

Setiap *cell* (baris) tidak boleh diisi dengan poin bertumpuk. Setiap informasi harus dipecah ke dalam baris (*row* `<tr>`) terpisah.

Struktur *class* HTML wajib: `<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">` (dengan `thead bg-gray-100`).

---

## 2. Struktur Kolom Mutlak BRD (Business Requirement Document)
Setiap dokumen BRD harus memuat 14 bagian (*section*) berikut secara berurutan. Format tabel dan kolomnya telah dikunci:

1. **Document Information**: (Tabel 2 kolom Vertikal)
   - `th`: Key (`Document ID`, `Document Name`, `Module`, `Version`, `Status`)
   - `td`: Nilai dari key tersebut.
2. **Scope**: (Tabel 3 kolom)
   - Kolom: `Modul / Fitur` | `In-Scope` | `Out-of-Scope`.
   - Wajib dipecah 1 baris untuk 1 fitur.
3. **Domain Core Specification**: (Tabel 3 kolom)
   - Kolom: `Konsep Utama` | `Penjelasan` | `Business Rules`.
4. **Tax & Compliance**: (Tabel 2 kolom)
   - Kolom: `Komponen Regulasi` | `Implikasi ke Sistem`.
5. **Data Structure & Relationships**: (Tabel 3 kolom)
   - Kolom: `Entitas Anak / Modul` | `Tipe Relasi & Kardinalitas` (contoh: One-to-Many (1:N)) | `Penjelasan Fungsional`.
   - Tabel ini hanya menjabarkan **relasi kardinalitas** entitas bisnis, **bukan** skema database (skema ditaruh di FSD).
6. **Functional Specifics**: (Tabel 2 kolom)
   - Kolom: `Fitur Utama` | `Alur Proses (User Journey)`.
7. **Controls & Authorization**: (Tabel 3 kolom)
   - Kolom: `Aktor / Role` | `Hak Akses` | `Batasan & Logika Kontrol`.
8. **Status & Blocking**: (Tabel 2 kolom)
   - Kolom: `Status Life-cycle` (contoh: Active/Inactive) | `Perlakuan Sistem`.
9. **Business Rules (BR)**: (Tabel 3 kolom)
   - Kolom: `BR Code` (BR-01, BR-02) | `Nama Aturan` | `Deskripsi & Eksekusi Validasi`.
10. **Default Values**: (Tabel 2 kolom)
    - Kolom: `Field / Atribut` | `Nilai Default`.
11. **Validation Rules**: (Tabel 2 kolom)
    - Kolom: `Skenario / Form Input` | `Aturan Limitasi & Peringatan`.
12. **Audit Requirements**: (Tabel 2 kolom)
    - Kolom: `Tingkat Sensitivitas` | `Komponen Rekaman Wajib`.
13. **Acceptance Criteria (AC)**: (Tabel 2 kolom)
    - Kolom: `AC Code` (AC-01, AC-02) | `Kriteria Uji Kelulusan`.
14. **Dependencies**: (Tabel 2 kolom)
    - Kolom: `Ketergantungan Pada` (Modul/Dokumen lain) | `Alasan Keterikatan`.

---

## 3. Struktur Kolom Mutlak FSD (Functional Specification Document)
Setiap dokumen FSD harus memuat 6 bagian (*section*) berikut secara berurutan. Format tabel dan kolomnya telah dikunci:

1. **Document Information**: (Tabel 2 kolom Vertikal)
   - `th`: Key (`FSD Code`, `Title`, `Reference BRD`, `Module`, `Version`)
   - `td`: Nilai dari key tersebut.
2. **Database Schema Design**: (Tabel 4 kolom - **DIJABARKAN BARIS-PER-BARIS**)
   - Kolom: `Table Name` (gunakan atribut `rowspan` HTML) | `Field Name` (1 baris untuk 1 field/kolom) | `Data Type & Modifier` (misal: `VARCHAR(10) UNIQUE`) | `Keterangan / Referensi`.
   - **Kewajiban Audit Trail**: Setiap pembuatan skema *wajib* menyertakan baris terpisah untuk `created_at`, `updated_at`, `deleted_at`, `created_by`, `updated_by`, `deleted_by`.
3. **UI/UX Specifications (Blade MVC)**: (Tabel 2 kolom)
   - Kolom: `Komponen UI` | `Metode Implementasi (Non-Filament)`.
4. **API Endpoints**: (Tabel 3 kolom)
   - Kolom: `Method` (GET/POST) | `Endpoint` | `Fungsi Internal`.
5. **Technical Validation Rules**: (Tabel 2 kolom)
   - Kolom: `Controller Validation` | `Logika FormRequest` (contoh sintaks Laravel Validation).
6. **System Triggers & Observers**: (Tabel 2 kolom)
   - Kolom: `Event / Trigger` (misal: saving, deleted) | `Aksi Otomatis Backend`.

---

## 5. Sinkronisasi (Domino Effect)
Apabila ada penambahan modul / penyisipan tahapan baru di dalam *Implementation Plan*, seluruh nomor dokumen di belakangnya wajib diurutkan ulang (*Domino Effect +1*). Hubungan referensi antara BRD dan FSD bersifat **1:1**.

