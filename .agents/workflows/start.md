---
description: Inisialisasi sesi dengan memuat Knowledge Base Antigravity, mengecek status Git, dan rangkuman progres terakhir.
---

Load knowledge base dari folder `/antigravity/`.
1. Berikan konfirmasi [📚 KNOWLEDGE BASE LOADED].
2. Sebutkan Achievement Terakhir dari `05-CONTEXT.md`.
3. Mintalah instruksi tugas berikutnya.
4. REMINDER HAKI: Jangan pernah menggunakan kata "SAP" atau nama teknis spesifik SAP (seperti BSEG, OBYC, KUNNR) di dalam penyusunan dokumen BRD.
5. SOP Desain & Dokumentasi: 
   - Sebelum mendesain BRD, WAJIB cek referensi awal pada modul **Blueprints** (UI: `admin/blueprints` / Database: `blueprint_documents` table / `\App\Models\BlueprintDocument` model).
   - Jika ada penambahan/perubahan tabel database, WAJIB update **ERD 00** (Lokasi: Database `erds` table / `\App\Models\Erd` model dengan code `ERD 00`). Tegaskan bahwa **hanya ada satu ERD (ERD 00)** untuk seluruh sistem, dilarang membuat dokumen ERD baru. Pastikan format **DBML**-nya (Copy to DBML) diperbarui.
   - Pastikan perubahan logika di BRD dan ERD diselaraskan secara penuh ke dalam dokumen **FSD** (`admin/fsds`).
   - **HARDBLOCK RULE:** Project `arxinoprojectmanagement` **HARAM MENGGUNAKAN FILAMENT**. Seluruh pengembangan UI dan interaktivitas wajib menggunakan metode standar Laravel (Blade, Controller murni) atau stack kustom yang ada. Ini adalah keputusan arsitektur absolut dari klien.
6. bertindak proffesional, no kata-kata basa basi (pujian / permintaan maaf)
7. jangan inisiatif halu, tanyakan kalau prompt belum jelas
8. STRUKTUR WAJIB DOKUMEN & FORMAT PRESENTASI:
   - AI Agent **WAJIB MUTLAK** membaca dan mengacu pada aturan struktur kolom dan format *Matrix HTML* yang ada di dalam file `antigravity/08-DOCUMENTATION-RULES.md` (*Gold Standard*) setiap kali mendesain dokumen BRD dan FSD.
   - Dilarang keras menggunakan imajinasi struktur sendiri. Baca file tersebut untuk melihat daftar wajib 14 section (BRD) dan 6 section (FSD) beserta aturan pembentukan kolom tabelnya.
9. PENCARIAN DATA DOKUMEN (KNOWLEDGE MAPPING):
   - Seluruh konten lengkap dari BRD dan FSD tersimpan di *database* pada tabel `brd_documents` (Model: `BrdDocument`) dan `fsds` (Model: `Fsd`).
   - Serta ter-*backup* secara statis pada file seeder `BrdDocumentsTableSeeder.php` dan `FsdsTableSeeder.php`.
   - **PENTING**: Nama dokumen publik seperti "BRD-02" atau "FSD-02" **tidak selalu sama** dengan kode `brd_code` atau `code` di *database*. Contoh nyatanya: BRD-02 disimpan dengan kode **BRD-49**, dan FSD-02 disimpan dengan kode **FSD-040**.
   - **HARDBLOCK PENCARIAN**: **DILARANG KERAS** melakukan pencarian menggunakan `LIKE '%02%'` atau `LIKE '%05%'` (dua digit) karena akan menghasilkan data yang melenceng (Misal: 05 akan membaca 059). Anda WAJIB melakukan pencarian dengan string utuh yang akurat seperti `LIKE '%FSD-005%'` atau menelusuri berdasarkan penggalan judul lengkap dokumennya, lalu memvalidasinya dengan benar sebelum mengubah skema apapun.
10. KELENGKAPAN INFORMASI STRUKTUR DATA (SKILL ANALYST):
   - Pendefinisian "Data Structure" di BRD maupun "Database Schema Design" di FSD **wajib sangat lengkap dan detail**.
   - Dilarang keras hanya mencantumkan sebagian kecil field/kolom inti. Anda WAJIB menjabarkan setiap atribut tabel secara utuh.
   - Wajib mencantumkan field audit dasar secara eksplisit di tabel relasi, seperti: `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by` beserta referensi Foreign Key dan peran fungsionalnya dalam melacak aktivitas.
   - Tidak ada toleransi untuk perumusan struktur data yang setengah-setengah atau sekadar contoh. Analisis data harus komprehensif.