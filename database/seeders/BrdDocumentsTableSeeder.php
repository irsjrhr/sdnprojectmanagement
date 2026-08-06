<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BrdDocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brd_documents')->delete();
        
        \DB::table('brd_documents')->insert(array (
            0 => 
            array (
                'id' => 2,
                'brd_code' => 'BRD-004',
                'title' => 'Master User & Role Permission',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Keterangan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document Code</td><td class="border px-2 py-1">BRD-004</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Title</td><td class="border px-2 py-1">Master User & Role Permission</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">System Administration & Security</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Kategori</th><th class="border px-2 py-1">Cakupan (In-Scope)</th><th class="border px-2 py-1">Di Luar Cakupan (Out-of-Scope)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">Manajemen Pengguna</td><td class="border px-2 py-1">Registrasi user, pemetaan user ke Perusahaan (Company) dan Cabang (Branch), kebijakan kata sandi.</td><td class="border px-2 py-1">Integrasi SSO / Active Directory eksternal (Enhancement masa depan).</td></tr>
<tr><td class="border px-2 py-1">Hak Akses & Otorisasi</td><td class="border px-2 py-1">Pembuatan Role, penetapan Permission pada Role, *User-level Override* (penambahan/pengurangan izin spesifik untuk user tertentu).</td><td class="border px-2 py-1">Hak akses berbasis jam kerja spesifik (Time-based access di luar standar login policy).</td></tr>
<tr><td class="border px-2 py-1">Approval Matrix</td><td class="border px-2 py-1">Limit persetujuan nilai transaksi per Role dan *User Override* limit transaksi.</td><td class="border px-2 py-1">Workflow dinamis bersyarat yang kompleks.</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Inti</th><th class="border px-2 py-1">Definisi & Logika</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Role-Based Access Control (RBAC)</td><td class="border px-2 py-1">Hak akses tidak diberikan secara satu-persatu kepada entitas User, melainkan melalui entitas <strong>Role</strong> (misal: "Sales Manager"). User mewarisi otoritas dari Role tersebut.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Permission Scope (Row-level Security)</td><td class="border px-2 py-1">Izin memiliki level pembatasan data: <strong>OWN</strong> (Hanya data miliknya), <strong>BRANCH</strong> (Seluruh data di cabang yang diakses), <strong>COMPANY</strong> (Seluruh data lintas cabang dalam satu PT), <strong>ALL</strong> (Tidak terbatas).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Context Isolation</td><td class="border px-2 py-1">Setiap pengguna hanya dapat bekerja (login) pada satu Cabang aktif dalam satu waktu (<em>Active Session Context</em>). Transaksi akan terekam ke Cabang tersebut.</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aspek Kepatuhan</th><th class="border px-2 py-1">Deskripsi Kewajiban</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">Audit Keamanan Akses</td><td class="border px-2 py-1">Diwajibkan mencatat alamat IP, waktu akses, perangkat, dan upaya login yang gagal (ISO 27001 Access Control compliance).</td></tr>
<tr><td class="border px-2 py-1">Segregation of Duties (SoD)</td><td class="border px-2 py-1">Pemisahan tugas: User yang berwenang membuat Master Data tidak boleh memiliki hak untuk melakukan persetujuan (Approve) transaksi finansial (disesuaikan via Role).</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1">Entitas / Kolom Utama</th><th class="border px-2 py-1">Kardinalitas & Relasi</th><th class="border px-2 py-1">Penjelasan Fungsional & Atribut Lengkap</th></tr>
</thead>
<tbody>
<tr>
<td class="border px-2 py-1"><strong>Users</strong></td>
<td class="border px-2 py-1">Induk Sistem (Master)</td>
<td class="border px-2 py-1">
Menyimpan kredensial otentikasi dan preferensi dasar profil pengguna.<br/>
- <strong>id</strong>: PK (Auto Increment).<br/>
- <strong>name</strong>: String (Nama Lengkap).<br/>
- <strong>email</strong>: String (Unik untuk login).<br/>
- <strong>password</strong>: Hash (Kredensial).<br/>
- <strong>status</strong>: ENUM (Active, Locked, Inactive).<br/>
- <strong>default_branch_id</strong>: FK ke branches (Isolasi default).<br/>
- <strong>created_by, updated_by, deleted_by</strong>: FK ke users (Perekam audit trail - siapa yang membuat/mengedit entitas ini).<br/>
- <strong>created_at, updated_at, deleted_at</strong>: Timestamp (Jejak waktu sistem).
</td>
</tr>
<tr>
<td class="border px-2 py-1"><strong>User_Branches</strong></td>
<td class="border px-2 py-1">Many-to-Many (Users & Branches)</td>
<td class="border px-2 py-1">
Pemetaan otorisasi cabang (Pivot). Menentukan ke cabang mana saja seorang User boleh berpindah (Switch Branch).<br/>
- <strong>user_id</strong>: FK ke users.<br/>
- <strong>branch_id</strong>: FK ke branches.<br/>
- <strong>is_default</strong>: Boolean (Menandakan cabang utama).<br/>
- <strong>created_by, updated_by</strong>: Perekam riwayat *assignment*.<br/>
- <strong>created_at, updated_at</strong>: Waktu terjadinya pendelegasian cabang.
</td>
</tr>
<tr>
<td class="border px-2 py-1"><strong>Roles & Permissions</strong></td>
<td class="border px-2 py-1">Many-to-Many</td>
<td class="border px-2 py-1">
Entitas `roles` (Kumpulan otorisasi, misal: SALES_MGR) dan `permissions` (Hak akses atomik, misal: PO_CREATE). Direlasikan melalui `role_permissions`.<br/>
Setiap tabel ini diwajibkan memiliki <strong>created_at, created_by, updated_at, updated_by</strong> untuk pelacakan (audit) rekayasa arsitektur sekuriti.
</td>
</tr>
<tr>
<td class="border px-2 py-1"><strong>User_Permissions</strong></td>
<td class="border px-2 py-1">Many-to-Many</td>
<td class="border px-2 py-1">
Tabel pengecualian (*Override*):<br/>
- <strong>user_id, permission_id</strong>: FK.<br/>
- <strong>is_deny</strong>: Boolean (Mengizinkan [false] atau Mencabut [true] hak akses individu tanpa merusak struktur Role asli).<br/>
- <strong>created_by, created_at</strong>: Mencatat Administrator yang mendikte hak eksklusif ini.
</td>
</tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fungsi UI</th><th class="border px-2 py-1">Deskripsi Interaksi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">User Assignment</td><td class="border px-2 py-1">Interface yang mengizinkan Administrator untuk mencentang banyak Cabang dan Role sekaligus untuk satu entitas User menggunakan komponen Multi-Select/Checkbox matrix.</td></tr>
<tr><td class="border px-2 py-1">Switch Branch</td><td class="border px-2 py-1">Tombol pada Navbar global (di setiap layar) yang mengizinkan user berpindah konteks Cabang (hanya menampilkan cabang yang diizinkan di <code>user_branches</code>).</td></tr>
<tr><td class="border px-2 py-1">Approval Limit Matrix</td><td class="border px-2 py-1">Layar khusus untuk menetapkan batas nominal (Rp) yang boleh disetujui (Approve) oleh Role tertentu untuk setiap tipe dokumen (contoh: PR, PO, SO).</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Peran (Role)</th><th class="border px-2 py-1">Otoritas Dokumen Master User</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">Super Admin / IT Manager</td><td class="border px-2 py-1">Full Akses (View, Create, Edit, Blokir, Set Password, Modify Roles).</td></tr>
<tr><td class="border px-2 py-1">HR Manager</td><td class="border px-2 py-1">Hanya bisa Create User dan Assign Branch/Company, tetapi tidak bisa merubah struktur otoritas Role.</td></tr>
<tr><td class="border px-2 py-1">Semua User</td><td class="border px-2 py-1">Hanya dapat mengubah Sandi Pribadi dan memperbarui Profil Sendiri.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Pengguna</th><th class="border px-2 py-1">Dampak Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">Active</td><td class="border px-2 py-1">User dapat login dan bertransaksi sesuai izin Role-nya.</td></tr>
<tr><td class="border px-2 py-1">Locked</td><td class="border px-2 py-1">Sistem otomatis mengunci akun akibat kesalahan kata sandi berulang (>5 kali). User tidak dapat masuk hingga dibuka oleh Administrator.</td></tr>
<tr><td class="border px-2 py-1">Inactive (Disabled)</td><td class="border px-2 py-1">User telah mengundurkan diri (Resign) atau dinonaktifkan permanen. Sesi aktif langsung dimatikan (Force Logout).</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">ID</th><th class="border px-2 py-1">Aturan Bisnis</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">BR-01</td><td class="border px-2 py-1"><strong>Password Policy:</strong> Sandi minimal 8 karakter, mengandung minimal 1 huruf kapital, 1 angka, dan 1 karakter spesial. Mewajibkan ganti sandi di login pertama.</td></tr>
<tr><td class="border px-2 py-1">BR-02</td><td class="border px-2 py-1"><strong>Session Concurrency:</strong> Tidak mengizinkan akun yang sama login pada perangkat/browser yang berbeda di saat bersamaan. Login baru akan menendang login lama secara otomatis.</td></tr>
<tr><td class="border px-2 py-1">BR-03</td><td class="border px-2 py-1"><strong>Approval Override Priority:</strong> Jika terdapat limit persetujuan pada level <code>role_approvals</code> sebesar Rp50jt, namun pada level <code>user_approvals</code> di-set Rp100jt, maka yang digunakan adalah limit <code>user_approvals</code> (Level Individu mengalahkan Level Role).</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut / Parameter</th><th class="border px-2 py-1">Nilai Bawaan (Default)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">Status saat Dibuat</td><td class="border px-2 py-1"><code>Active</code> (Langsung dapat digunakan)</td></tr>
<tr><td class="border px-2 py-1">Force Password Change</td><td class="border px-2 py-1"><code>True</code> (Wajib bagi Admin yang mereset/mendaftarkan akun)</td></tr>
<tr><td class="border px-2 py-1">Max Failed Login Attempts</td><td class="border px-2 py-1"><code>5</code> (Lima kali percobaan salah sebelum terblokir)</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Kondisi / Field</th><th class="border px-2 py-1">Aturan Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">Email / Username</td><td class="border px-2 py-1">Format email wajib valid. Wajib unik di seluruh sistem (Global Unique Index).</td></tr>
<tr><td class="border px-2 py-1">Default Branch</td><td class="border px-2 py-1">Cabang *Default* yang dipilih <strong>WAJIB</strong> merupakan bagian dari relasi `user_branches` (Cabang yang ditugaskan kepada user tersebut).</td></tr>
<tr><td class="border px-2 py-1">Role Deletion</td><td class="border px-2 py-1">Role <strong>tidak dapat dihapus</strong> jika masih terikat pada minimal 1 User aktif. Penolakan aksi secara sistem (Restrict).</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktivitas Audit</th><th class="border px-2 py-1">Data yang Direkam (Audit Trail)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">Perubahan Hak Akses</td><td class="border px-2 py-1">Merekam siapa yang memberikan atau mencabut Permission dari seorang User, beserta tanggal dan jam perubahannya.</td></tr>
<tr><td class="border px-2 py-1">Autentikasi Sesi</td><td class="border px-2 py-1">Merekam log berhasil/gagal Login, Logout, alamat IP perangkat, User Agent, serta pergantian (Switch) Session Branch.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">ID</th><th class="border px-2 py-1">Kriteria Penerimaan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Jika User login dan merubah Default Branch-nya ke "Surabaya", maka *query* pada sistem wajib otomatis terisolasi hanya menampilkan data dokumen transaksi milik Surabaya.</td></tr>
<tr><td class="border px-2 py-1">AC-02</td><td class="border px-2 py-1">Jika User melakukan input password salah sebanyak 6 kali, sistem harus mengunci layar (Lockout) dan menampilkan pesan "Akun terkunci, hubungi Administrator".</td></tr>
<tr><td class="border px-2 py-1">AC-03</td><td class="border px-2 py-1">Jika hak akses Permission diubah oleh Admin, maka perubahan harus seketika (Real-time) dirasakan oleh User bersangkutan (Clear Cache/Permission Reload) tanpa perlu re-login.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul Relasi</th><th class="border px-2 py-1">Deskripsi Ketergantungan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1">BRD-001 (Master Company)</td><td class="border px-2 py-1">User direlasikan kepada Company (Konteks Induk).</td></tr>
<tr><td class="border px-2 py-1">BRD-002 (Master Branch)</td><td class="border px-2 py-1">Penugasan lokasi cabang ke User untuk pemisahan yurisdiksi transaksi (Branch Isolation).</td></tr>
</tbody>
</table>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-17 18:16:49',
            ),
            1 => 
            array (
                'id' => 3,
                'brd_code' => 'BRD-040',
            'title' => 'Data Barang & Satuan (Mencakup Material & Jasa)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-040</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Data Barang &amp; Satuan (Material Master)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Materials Management (MM)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Material Master</td><td class="border px-2 py-1">Pendaftaran master data barang dengan multi-level grup, brand, klasifikasi tipe barang (TRAD, NTRD, SERV), dan relasi multi-dimensi ke entitas organisasi (Company, Branch, Sales Org, Purchasing Org).</td><td class="border px-2 py-1">Manajemen Bill of Material (BOM) perakitan kompleks (dikelola di modul PP/Manufacturing).</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Organizational Views</td><td class="border px-2 py-1">Data barang dipecah menjadi <em>Views</em> spesifik per entitas: <em>General</em> (Global), <em>Inventory</em> (per Branch), <em>Financial</em> (per Company), <em>Sales</em> (per Sales Org), dan <em>Purchasing</em> (per Purchasing Org).</td><td class="border px-2 py-1">Pengubahan data pada <em>Sales View</em> Cabang A tidak boleh mengubah aturan <em>Sales View</em> Cabang B meskipun barangnya sama.</td></tr>
        <tr><td class="border px-2 py-1">Multiple Unit of Measure (UoM)</td><td class="border px-2 py-1">Setiap barang memiliki 1 Satuan Dasar (<em>Base UoM</em>) dan mendukung konversi ke berbagai Satuan Alternatif.</td><td class="border px-2 py-1">Kalkulasi stok dan valuasi akuntansi wajib dikonversi secara mutlak ke dalam nilai <em>Base UoM</em>.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Pengelompokan Pajak (Tax Group)</td><td class="border px-2 py-1">Setiap master barang wajib terikat pada <code>tax_group_id</code> pada level <em>Sales Organization</em> untuk penentuan PPN otomatis pada faktur pajak.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">material_branches</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Mengikat barang secara fisik ke <em>Branch</em> untuk pengaturan stok aman, reorder point, dan manajemen lot/serial.</td></tr>
        <tr><td class="border px-2 py-1">material_companies</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Menentukan metode valuasi finansial (Standard vs MAP) dan jembatan pemetaan jurnal GL secara spesifik per PT.</td></tr>
        <tr><td class="border px-2 py-1">material_sales_orgs</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Menetapkan satuan jual khusus, kode grup pajak, dan blokir penjualan per <em>Sales Organization</em>.</td></tr>
        <tr><td class="border px-2 py-1">material_purchasing_orgs</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Menetapkan satuan beli, MOQ, dan waktu tunggu (lead time) per <em>Purchasing Organization</em>.</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Konversi Multi-UoM</td><td class="border px-2 py-1">Saat membuat dokumen <em>Sales Order</em> dalam satuan BOX, sistem secara otomatis merujuk <code>material_uom_conversions</code> untuk mendebit stok fisik dalam <em>Base UoM</em> (misal: PCS).</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Master Data Admin</td><td class="border px-2 py-1">Create, Update (All Views)</td><td class="border px-2 py-1">Hanya departemen MDM yang berhak membuat profil <em>General Data</em>.</td></tr>
        <tr><td class="border px-2 py-1">Plant/Branch Manager</td><td class="border px-2 py-1">Update (Branch View)</td><td class="border px-2 py-1">Hanya berhak memperbarui parameter logistik spesifik pada cabang miliknya.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">is_blocked_sell</td><td class="border px-2 py-1">Jika TRUE pada <code>material_sales_orgs</code>, maka Sales Order untuk <em>Sales Org</em> tersebut otomatis menolak <em>item</em> ini.</td></tr>
        <tr><td class="border px-2 py-1">is_blocked_buy</td><td class="border px-2 py-1">Jika TRUE pada <code>material_purchasing_orgs</code>, maka Purchase Order untuk <em>Purchasing Org</em> tersebut akan dibatalkan.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-40-01</td><td class="border px-2 py-1">Material ID Uniqueness</td><td class="border px-2 py-1">Kolom <code>material_code</code> harus unik secara global dalam seluruh sistem (Unique Index).</td></tr>
        <tr><td class="border px-2 py-1">BR-40-02</td><td class="border px-2 py-1">Base UoM Rigidity</td><td class="border px-2 py-1"><code>base_uom_id</code> HANYA boleh diubah jika belum ada satupun pergerakan stok (Zero Transaction History).</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">status</td><td class="border px-2 py-1">ACTIVE (saat pertama kali didaftarkan).</td></tr>
        <tr><td class="border px-2 py-1">is_batch_managed</td><td class="border px-2 py-1">FALSE (Kecuali disetel spesifik oleh user di Branch View).</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">UoM Conversion Integrity</td><td class="border px-2 py-1">Rasio <code>alt_qty</code> terhadap <code>base_qty</code> tidak boleh menghasilkan angka pembagian desimal tak terbatas (Infinite decimal) demi menghindari <em>floating-point errors</em>.</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tinggi (Financial View)</td><td class="border px-2 py-1">Perubahan <code>valuation_class</code> pada tabel <code>material_companies</code> wajib tercatat pada log <em>Audit Trail</em> beserta ID pengguna dan waktu perubahan karena langsung memengaruhi titik akhir jurnal GL.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Sistem berhasil membuat entitas pada <code>materials</code>, <code>material_branches</code>, <code>material_companies</code> secara simultan dalam satu transaksi <em>database</em>.</td></tr>
        <tr><td class="border px-2 py-1">AC-02</td><td class="border px-2 py-1">Gagal menyimpan konversi rasio 1 BOX = 0 PCS (Validator menangkap angka 0 sebagai tidak sah pada field kuantitas rasio pembagi/pengali).</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BRD-022 (Material Type)</td><td class="border px-2 py-1">Sifat perilaku master barang (<em>Quantity Update</em> vs <em>Value Update</em>) diturunkan sepenuhnya dari master <em>Material Type</em>.</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-17 18:24:04',
            ),
            2 => 
            array (
                'id' => 4,
                'brd_code' => 'BRD-038',
                'title' => 'Pricing Structure Pembelian & Determination Matrix',
                'project_id' => NULL,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-038</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Pricing Structure Pembelian &amp; Determination Matrix</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Procurement (MM) &amp; Pricing Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Purchase Pricing Engine</strong></td>
            <td class="border px-2 py-1">Mekanisme kalkulasi harga pembelian yang terstruktur demi membentuk nilai persediaan akhir (Landed Cost). Termasuk pencarian skema prosedur harga berdasarkan matriks klasifikasi grup vendor dan purchasing organization.</td>
            <td class="border px-2 py-1">Program rabat akhir tahun dari pemasok (Vendor Rebate) dan kalkulasi Free Item.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Landed Cost Allocation</strong></td>
            <td class="border px-2 py-1">Distribusi proporsional biaya logistik, bea cukai, atau asuransi ke masing-masing baris item barang untuk meningkatkan HPP.</td>
            <td class="border px-2 py-1">Pembayaran otomatis (AP Invoice) untuk tagihan pihak ketiga.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pricing Procedure</strong></td>
            <td class="border px-2 py-1">Skema kalkulasi harga berjenjang (Step 10, 20, dst). Menghitung Gross Price -> Diskon -> Net Price -> Freight -> Pajak.</td>
            <td class="border px-2 py-1">Urutan (Steps) menentukan referensi perhitungan (From/To) bagi tipe persentase.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Determination Matrix</strong></td>
            <td class="border px-2 py-1">Sistem mencari <code>pricing_procedure_id</code> otomatis tanpa campur tangan *user* ketika membuat PO. Matriks yang digunakan adalah gabungan antara `Vendor Schema Group` + `Purchasing Org Schema Group`.</td>
            <td class="border px-2 py-1">Jika sistem tidak menemukan pasangan grup tersebut di tabel determinasi, maka error harus dilempar, menghentikan pembuatan dokumen.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Statistical Condition</strong></td>
            <td class="border px-2 py-1">Kondisi sekadar informasi yang tidak ditambahkan ke Net Tagihan Vendor.</td>
            <td class="border px-2 py-1">Bermanfaat untuk merekam biaya taksir standar tanpa menciptakan jurnal utang.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax &amp; Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pajak (Tax Base) Terpisah</strong></td>
            <td class="border px-2 py-1">PPN (VST) tidak boleh dikalkulasi dari Landed Cost. DPP (Tax Base) dihitung terpisah setelah diskon. PPN harus dipisahkan masuk ke akun pajak masukan yang dapat dikreditkan dan tidak menambah nilai buku *inventory*.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure &amp; Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi &amp; Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Determination Tables</strong></td>
            <td class="border px-2 py-1">Many-to-Many via Matrix</td>
            <td class="border px-2 py-1">Tabel `vendor_schema_groups` dan `purchasing_schema_groups` dipertemukan di `purchase_pricing_determinations` untuk meng-output `pricing_procedure_id`.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>PO Pricing Calculation</strong></td>
            <td class="border px-2 py-1">User memilih Vendor A dan Purc. Org JKT01. Backend mendeteksi grup skema mereka. Skema prosedur ZSTD ditarik. Engine me-loop setiap step di prosedur ZSTD dan mencari master diskon serta harga dasar, merangkai total tagihan sementara di layar.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Accrual Account Key</strong></td>
            <td class="border px-2 py-1">Freight (Ongkos kirim) dipetakan ke Account Key "FR1". Saat GR barang, sistem mendebit Inventory dan mengkredit Utang Freight/Accrual terpisah dari AP Induk.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls &amp; Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pricing Configurator (IT)</strong></td>
            <td class="border px-2 py-1">Full Setup</td>
            <td class="border px-2 py-1">Berhak menyusun urutan step prosedur harga dan menetapkan *Account Key* di backend.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status &amp; Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Release Block</strong></td>
            <td class="border px-2 py-1">PO yang telah dirilis (Approval) mengunci kalkulasi pricing. Modifikasi kuantitas terlarang hingga *Release* dibatalkan.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-PPR-01</strong></td>
            <td class="border px-2 py-1">Accrual Constraint</td>
            <td class="border px-2 py-1">Biaya dengan Account Key bertipe Accrual (Misal Freight) otomatis dialokasikan untuk menambah persediaan masuk, tetapi tagihannya tidak ditujukan kepada Vendor Utama (Main Vendor).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-PPR-02</strong></td>
            <td class="border px-2 py-1">Missing Matrix Block</td>
            <td class="border px-2 py-1">Jika penentuan harga gagal (karena belum dipetakan), transaksi pembuatan PO tidak boleh dilanjutkan.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Vendor Schema Group</strong></td>
            <td class="border px-2 py-1">NULL. Wajib dikonfigurasi secara manual pada Master Vendor agar PO dapat diterbitkan.</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Calculation Sequence Check</strong></td>
            <td class="border px-2 py-1">Struktur *Pricing Steps*: <code>From Step &lt;= To Step</code> wajib bernilai benar (*True*). Jika diset terbalik, konfigurasi ditolak.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Kritis</strong></td>
            <td class="border px-2 py-1">Setiap modifikasi pada <code>pricing_procedure_steps</code> direkam dengan detil untuk mencegah manipulasi HPP secara sistemik.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-PPR-01</strong></td>
            <td class="border px-2 py-1">Saat simulasi kalkulasi di mana Base Price = Rp100.000, Diskon 1 = -10%, Diskon 2 = -Rp5.000, Landed Cost = Rp3.000, Hasil akhirnya harus: DPP (Rp85.000), Inventory Value (Rp88.000). PPN 11% (Rp9.350).</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-037</strong></td>
            <td class="border px-2 py-1">Master Condition Type (Prosedur tidak dapat beroperasi tanpa master kondisinya).</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 10:30:08',
                'updated_at' => '2026-07-20 10:30:08',
            ),
            3 => 
            array (
                'id' => 5,
                'brd_code' => 'BRD-039',
                'title' => 'Sales Pricing Structure & Determination Matrix',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-039</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Sales Pricing Structure &amp; Determination Matrix</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Sales &amp; Distribution (SD) &amp; Pricing Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Sales Pricing Engine</strong></td>
            <td class="border px-2 py-1">Mekanisme kalkulasi harga jual yang terstruktur demi membentuk nilai tagihan piutang dan pendapatan. Termasuk pencarian skema prosedur harga berdasarkan matriks klasifikasi grup customer dan sales area.</td>
            <td class="border px-2 py-1">Program rabat akhir tahun dari penjualan (Customer Rebate) dan kalkulasi Free Item eksternal.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Cost &amp; Profit Margin</strong></td>
            <td class="border px-2 py-1">Menarik nilai HPP (VPRS/Cost) secara otomatis sebagai Statistical Condition untuk melihat profit margin real-time saat pembuatan Sales Order.</td>
            <td class="border px-2 py-1">Pembayaran komisi sales (Sales Commission) yang tidak berdampak pada tagihan piutang pelanggan.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pricing Procedure</strong></td>
            <td class="border px-2 py-1">Skema kalkulasi harga berjenjang (Step 10, 20, dst). Menghitung Gross Price -> Diskon -> Net Price -> Pajak Keluaran (PPN).</td>
            <td class="border px-2 py-1">Urutan (Steps) menentukan referensi perhitungan (From/To) bagi tipe persentase (Diskon bertingkat).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Determination Matrix</strong></td>
            <td class="border px-2 py-1">Sistem mencari <code>pricing_procedure_id</code> otomatis tanpa campur tangan *user* ketika membuat SO. Matriks yang digunakan adalah gabungan antara `Customer Schema Group` + `Sales Area Schema Group`.</td>
            <td class="border px-2 py-1">Jika sistem tidak menemukan pasangan grup tersebut di tabel determinasi, maka error harus dilempar, menghentikan pembuatan dokumen SO.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Statistical Condition</strong></td>
            <td class="border px-2 py-1">Kondisi sekadar informasi yang tidak ditambahkan ke Net Tagihan Customer (Misal: Cost Margin).</td>
            <td class="border px-2 py-1">Hanya berdampak pada CO-PA (Profitability Analysis), tidak menciptakan jurnal piutang.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax &amp; Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pajak Keluaran (PPN) Terpisah</strong></td>
            <td class="border px-2 py-1">PPN Keluaran (MWS) wajib dikalkulasi dari DPP (Tax Base) yang merupakan nilai Net Price setelah semua diskon dikurangkan. PPN harus dipisahkan masuk ke akun pajak keluaran (Hutang Pajak) yang akan disetor ke negara.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure &amp; Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi &amp; Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Determination Tables</strong></td>
            <td class="border px-2 py-1">Many-to-Many via Matrix</td>
            <td class="border px-2 py-1">Tabel `customer_schema_groups` dan `sales_schema_groups` dipertemukan di `sales_pricing_determinations` untuk meng-output `pricing_procedure_id`.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>SO Pricing Calculation</strong></td>
            <td class="border px-2 py-1">User memilih Customer B dan Sales Area JKT-RTL. Backend mendeteksi grup skema mereka. Skema prosedur RVAA01 ditarik. Engine me-loop setiap step di prosedur RVAA01 dan mencari master diskon serta harga jual dasar (PR00), merangkai total tagihan sementara di layar (Net Value).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Revenue Account Key</strong></td>
            <td class="border px-2 py-1">Harga jual (Base Price) dipetakan ke Account Key "ERL" (Pendapatan). Diskon dipetakan ke Account Key "ERS" (Potongan Penjualan). Saat Billing/Invoice diterbitkan, sistem mengkredit akun Revenue dan mendebit akun Potongan serta Piutang (AR).</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls &amp; Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pricing Configurator (IT)</strong></td>
            <td class="border px-2 py-1">Full Setup</td>
            <td class="border px-2 py-1">Berhak menyusun urutan step prosedur harga jual dan menetapkan *Account Key* di backend.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status &amp; Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Invoicing Block</strong></td>
            <td class="border px-2 py-1">Faktur (Billing Document) yang sudah diterbitkan akan mengunci hasil *Pricing*. Perubahan nilai harga pada SO tidak lagi memengaruhi *Billing* kecuali dilakukan retur (Credit Memo).</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-SPR-01</strong></td>
            <td class="border px-2 py-1">Sales Margin Validation</td>
            <td class="border px-2 py-1">Jika nilai *Net Price* setelah dikurangi diskon berada di bawah *Cost* (HPP / VPRS), sistem memunculkan peringatan "Margin Negatif", dan SO akan tertahan pada status *Credit/Margin Hold* untuk otorisasi *Sales Manager*.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-SPR-02</strong></td>
            <td class="border px-2 py-1">Missing Matrix Block</td>
            <td class="border px-2 py-1">Jika penentuan harga jual gagal (karena belum dipetakan matriksnya), transaksi pembuatan SO ditolak.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Customer Schema Group</strong></td>
            <td class="border px-2 py-1">NULL. Wajib dikonfigurasi secara manual pada Master Customer agar SO dapat diterbitkan.</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Calculation Sequence Check</strong></td>
            <td class="border px-2 py-1">Sama seperti pembelian: Struktur *Pricing Steps* untuk `From Step <= To Step` wajib bernilai *True*.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Kritis</strong></td>
            <td class="border px-2 py-1">Pemberian diskon manual (Manual Override) pada saat input SO wajib mencatat User ID dan alasan pemberian diskon.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-SPR-01</strong></td>
            <td class="border px-2 py-1">Saat simulasi kalkulasi: Harga Jual = Rp150.000, Diskon Distributor = 10%, Diskon Tunai = 2%, Cost HPP = Rp100.000. Sistem wajib menghitung: DPP = Rp132.300 (berasal dari 150rb - 15rb - 2.7rb), PPN 11% = Rp14.553. Total Piutang = Rp146.853. Laba kotor (Profit Margin) direkam sebesar Rp32.300.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-037</strong></td>
            <td class="border px-2 py-1">Master Condition Type (Dasar pembentuk langkah skema harga).</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-20 13:52:59',
            ),
            4 => 
            array (
                'id' => 6,
                'brd_code' => 'BRD-042',
            'title' => 'Customer Master Data (Enterprise Refinement)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Document ID</td><td class="border px-2 py-1">BRD-042</td></tr>
        <tr><td class="border px-2 py-1">Document Name</td><td class="border px-2 py-1">Customer Master Data (Enterprise Refinement)</td></tr>
        <tr><td class="border px-2 py-1">Module</td><td class="border px-2 py-1">Sales &amp; Distribution (SD)</td></tr>
        <tr><td class="border px-2 py-1">Version</td><td class="border px-2 py-1">2.0 (Refined)</td></tr>
        <tr><td class="border px-2 py-1">Status</td><td class="border px-2 py-1">Approved</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Customer Profile &amp; Dimensions</td><td class="border px-2 py-1">Perekaman data pelanggan yang terpisah ke dalam 3 dimensi mutlak: General Data, Company Code Data, dan Sales Area Data. Mencakup <em>Account Group</em> dan hierarki pelanggan.</td><td class="border px-2 py-1">Pembuatan dokumen transaksional seperti Sales Order atau Invoice (diatur di BRD terpisah).</td></tr>
        <tr><td class="border px-2 py-1">Partner Functions &amp; Credit</td><td class="border px-2 py-1">Pemetaan relasi peran (Sold-To, Ship-To, Bill-To, Payer) pada level Sales Area. Penerapan proteksi nilai plafon kredit (Credit Limit) dan pembekuan (Blocking) akun.</td><td class="border px-2 py-1">Penyaluran dan perhitungan *Aging* tagihan aktual (diatur di modul Finance/AR).</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Account Group</td><td class="border px-2 py-1">Kategori utama yang mendikte rentang nomor unik pelanggan (DOMESTIC, EXPORT, CPD/One-Time, EMPLOYEE).</td><td class="border px-2 py-1">Dilarang mengubah Account Group jika pelanggan telah digunakan dalam satu dokumen logistik apapun.</td></tr>
        <tr><td class="border px-2 py-1">Partner Functions</td><td class="border px-2 py-1">Fungsi peran mitra bisnis. Sold-To Party (Pemesan), Ship-To Party (Penerima Fisik), Bill-To Party (Tujuan Faktur), Payer (Pembayar Sah).</td><td class="border px-2 py-1">Setiap Sales Area dari pelanggan minimal harus menugaskan keempat fungsi ini secara eksplisit (boleh menunjuk ke ID dirinya sendiri).</td></tr>
        <tr><td class="border px-2 py-1">Credit Exposure</td><td class="border px-2 py-1">Total nilai risiko kredit berjalan. Formula = (Open Sales Order + Open Delivery Order + Open Invoice + Outstanding AR).</td><td class="border px-2 py-1">Dihitung pada level <em>Company Code</em>. Jika akumulasi Exposure melebihi <em>Credit Limit</em>, pembuatan SO baru akan terkena <em>Credit Block</em>.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Validitas Identitas Wajib Pajak</td><td class="border px-2 py-1">Sistem wajib menangkap NPWP (atau NIK KTP) serta menyertakan atribut penentuan beban pungutan (<em>Tax Classification</em>) untuk menerbitkan Faktur Pajak.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">General to Company Code Data</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Satu pelanggan bisa ditagih dan diikat relasi rekonsiliasi GL AR oleh lebih dari satu Perusahaan (Company) di grup yang sama.</td></tr>
        <tr><td class="border px-2 py-1">General to Sales Area Data</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Satu pelanggan dapat berbelanja di berbagai Sales Area, memiliki kebijakan <em>Pricing Group</em> dan pengiriman yang independen per Area.</td></tr>
        <tr><td class="border px-2 py-1">General to Partner Functions</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Dalam satu Sales Area, sebuah akun Sold-To (Pelanggan Utama) dapat menugaskan puluhan ID pelanggan lain sebagai lokasi cabang pengiriman (*Ship-To*).</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Customer Registration Wizard</td><td class="border px-2 py-1">User MDM menginput alamat dan pajak (General). Kemudian, tim Finance menyambungkan ke Company Code dan menetapkan <em>Recon Account</em> serta <em>Credit Limit</em>. Terakhir, tim Sales mengekspansi akun tersebut ke dalam Sales Area (menentukan diskon grup dan blokir area).</td></tr>
        <tr><td class="border px-2 py-1">Partner Delegation</td><td class="border px-2 py-1">Saat membuat dokumen Order, tim Sales mengetik ID Sold-To. Sistem menyodorkan daftar Ship-To yang secara resmi telah diregistrasikan di <em>tab Partner Functions</em> pelanggan tersebut.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Master Data Admin (MDM)</td><td class="border px-2 py-1">Create / Edit General Data</td><td class="border px-2 py-1">Tidak dapat mengisi <em>Reconciliation Account</em> (Buku Besar) atau plafon batas kredit keuangan.</td></tr>
        <tr><td class="border px-2 py-1">Finance / AR Controller</td><td class="border px-2 py-1">Edit Company Code Data</td><td class="border px-2 py-1">Hanya dapat mengubah termin tagihan dan blokir <em>Posting</em> jurnal keuangan.</td></tr>
        <tr><td class="border px-2 py-1">Sales Area Manager</td><td class="border px-2 py-1">Edit Sales Area Data</td><td class="border px-2 py-1">Hanya berhak menugaskan grup diskon (Pricing Group) dan menetapkan lokasi/partner pengiriman untuk wilayah yurisdiksinya.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Order Block (Sales Area)</td><td class="border px-2 py-1">Mencegah pembuatan *Sales Order* (Pesanan Penjualan) baru, namun *Invoice* untuk sisa order lama tetap bisa diterbitkan.</td></tr>
        <tr><td class="border px-2 py-1">Delivery Block (Sales Area)</td><td class="border px-2 py-1">Pesanan (SO) diizinkan, tetapi gudang dicegah mencetak *Delivery Order* (Surat Jalan) fisik.</td></tr>
        <tr><td class="border px-2 py-1">Billing Block (Sales Area)</td><td class="border px-2 py-1">Pengiriman barang diizinkan, namun sistem mencegah pembuatan tagihan (*Invoice*) ke sistem AR.</td></tr>
        <tr><td class="border px-2 py-1">Posting Block (Company Code)</td><td class="border px-2 py-1">Menutup mutlak seluruh penjurnalan akuntansi ke entitas pelanggan ini.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-CUS-01</td><td class="border px-2 py-1">Mandatory Recon Account</td><td class="border px-2 py-1">Pelanggan tidak dapat bertransaksi sebelum data Company Code (menyimpan <em>Reconciliation Account</em> G/L) dikonfigurasi.</td></tr>
        <tr><td class="border px-2 py-1">BR-CUS-02</td><td class="border px-2 py-1">Default Partner Autofill</td><td class="border px-2 py-1">Bila user tidak mendefinisikan secara spesifik saat mengekspansi Sales Area, sistem otomatis meng-<em>copy</em> ID Sold-To sebagai ID untuk Ship-To, Bill-To, dan Payer.</td></tr>
        <tr><td class="border px-2 py-1">BR-CUS-03</td><td class="border px-2 py-1">One-Time Customer Constraint</td><td class="border px-2 py-1">Pelanggan dengan <em>Account Group = CPD (One Time)</em> secara sepihak dilarang/dikunci dari pemberian <em>Credit Limit</em> (limit otomatis Rp 0 dan *Payment Term* dipaksa *Cash*).</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Status (General)</td><td class="border px-2 py-1">ACTIVE (Saat profil pertama kali disimpan).</td></tr>
        <tr><td class="border px-2 py-1">Order/Delivery/Billing Block</td><td class="border px-2 py-1">FALSE (Tidak terkunci secara *default*).</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Customer Creation (Domestic)</td><td class="border px-2 py-1">Jika *Account Group* bernilai DOMESTIC, *form input* NPWP wajib diisi sejumlah 16 digit. (Abaikan jika EXPORT).</td></tr>
        <tr><td class="border px-2 py-1">Partner Mapping Creation</td><td class="border px-2 py-1">Saat memetakan Payer/Ship-To di <em>Tab Partner Functions</em>, nomor pelanggan target harus berstatus ACTIVE di database.</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Kritis (Financial &amp; Legal)</td><td class="border px-2 py-1">Perubahan pada <em>Credit Limit</em>, <em>Payment Terms</em>, dan <em>Reconciliation Account</em> harus direkam secara historis dan menyimpan <code>updated_by</code> secara permanen.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Sistem berhasil memblokir penyimpanan dokumen <em>Sales Order</em> jika pelanggan (Payer) tersebut sedang dikenakan status <em>Billing Block</em> (TRUE).</td></tr>
        <tr><td class="border px-2 py-1">AC-02</td><td class="border px-2 py-1">Sebuah entitas General Data (ID: 1000) bisa diikatkan pada dua <em>Company Code</em> berbeda dengan dua batas plafon <em>Credit Limit</em> yang independen.</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BRD-001 (Company Master)</td><td class="border px-2 py-1">Ekstensi Company Code mereferensikan master <code>companies</code>.</td></tr>
        <tr><td class="border px-2 py-1">BRD-014 (Chart of Accounts)</td><td class="border px-2 py-1">Penugasan buku besar (<code>coas</code>) untuk <em>Reconciliation Account</em>.</td></tr>
        <tr><td class="border px-2 py-1">BRD-033 (Sales Organization)</td><td class="border px-2 py-1">Menentukan <code>sales_areas</code> pengikat operasional pelanggan (Sales Org + Dist Channel + Division).</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-17 18:48:03',
            ),
            5 => 
            array (
                'id' => 7,
                'brd_code' => 'BRD-043',
            'title' => 'Vendor Master Data (Enterprise Alignment)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Document ID</td><td class="border px-2 py-1">BRD-043</td></tr>
        <tr><td class="border px-2 py-1">Document Name</td><td class="border px-2 py-1">Vendor Master Data (Enterprise Alignment)</td></tr>
        <tr><td class="border px-2 py-1">Module</td><td class="border px-2 py-1">Materials Management (MM) / Master Data</td></tr>
        <tr><td class="border px-2 py-1">Version</td><td class="border px-2 py-1">2.0 (Aligned)</td></tr>
        <tr><td class="border px-2 py-1">Status</td><td class="border px-2 py-1">Approved</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Vendor Profile &amp; Dimensions</td><td class="border px-2 py-1">Perekaman data vendor terpusat dengan 3 pilar: General Data, Company Code Data, dan Purchasing Organization Data. Meliputi Trade Vendor, Forwarder, Insurance, Non-Trade, dan One Time.</td><td class="border px-2 py-1">Pembuatan dokumen Purchase Order atau faktur hutang/Invoice (diatur di modul terpisah).</td></tr>
        <tr><td class="border px-2 py-1">Partner Functions &amp; Banking</td><td class="border px-2 py-1">Pemetaan relasi peran pemasok (Ordering Address, Goods Supplier, Invoice Party, Payee). Serta pendaftaran Multi-Bank Account untuk kebutuhan transfer dana.</td><td class="border px-2 py-1">Eksekusi pencairan pembayaran fisik / EFT (Modul Treasury).</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Account Group / Vendor Type</td><td class="border px-2 py-1">Kategori dasar yang mendikte perilaku vendor. (20TR: Trade, 20FF: Forwarder, 20IN: Insurance, 20NT: Non-Trade, 20OT: One-Time).</td><td class="border px-2 py-1">Mengontrol otomatisasi rentang nomor vendor (Number Range). 20OT tidak direkam histori mutasinya.</td></tr>
        <tr><td class="border px-2 py-1">Reconciliation Account</td><td class="border px-2 py-1">Buku besar penampung (G/L) yang merangkum posisi hutang (Accounts Payable) spesifik per Company Code.</td><td class="border px-2 py-1">Mutlak wajib diisi untuk <em>Company Code Extension</em> agar sistem dapat menjurnal tagihan Invoice.</td></tr>
        <tr><td class="border px-2 py-1">Partner Functions</td><td class="border px-2 py-1">Pendelegasian peran logistik dan finansial (Siapa yang dikirimi PO, siapa yang mengirim barang, siapa yang menagih, siapa yang menerima uang).</td><td class="border px-2 py-1">Vendor Utama harus memetakan perannya secara spesifik. Jika kosong, fungsi dikembalikan (*fallback*) ke dirinya sendiri.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Validitas NPWP &amp; PKP</td><td class="border px-2 py-1">Setiap vendor berstatus badan lokal wajib mendaftarkan 16 digit NPWP untuk verifikasi kepatuhan. NPWP tidak boleh ganda antar vendor aktif. Data nama/alamat PKP dapat dipisah jika berbeda.</td></tr>
        <tr><td class="border px-2 py-1">Withholding Tax (PPh)</td><td class="border px-2 py-1">Untuk vendor tipe Jasa/Sewa, konfigurasi kode potongan pajak wajib didefinisikan pada data Company Code untuk otomasi potong tagihan.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">General to Company Code Data</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Satu entitas vendor dapat menagih (bertransaksi) dengan banyak anak perusahaan (Company Code) yang berbeda dalam satu grup.</td></tr>
        <tr><td class="border px-2 py-1">General to Purchasing Org Data</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Vendor dapat melayani berbagai Purchasing Organization, dengan parameter toleransi pengiriman (Over/Under) yang independen.</td></tr>
        <tr><td class="border px-2 py-1">General to Partner Functions</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Vendor dapat mendelegasikan entitas vendor pihak ketiga lainnya untuk bertindak sebagai penerima pembayaran (Payee) atau pengirim fisik barang (Goods Supplier).</td></tr>
        <tr><td class="border px-2 py-1">General to Bank Accounts</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Satu vendor dapat meregistrasikan banyak rekening bank tujuan transfer.</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Vendor Registration &amp; Extension</td><td class="border px-2 py-1">Master Data Staff mendaftarkan profil umum (Nama, Alamat, NPWP). Tim Finance kemudian membuka otorisasi Company Code (Recon Account, Terms). Terakhir, Procurement membuka akses Purchasing Org (Toleransi DO, Purch Group).</td></tr>
        <tr><td class="border px-2 py-1">Multi-Vendor PO Handling</td><td class="border px-2 py-1">Sistem memungkinkan tagihan PO dipecah. Vendor Barang menagih barang pokok, sedangkan vendor ber-Account Group 20FF (Forwarder) ditugaskan spesifik pada <em>Condition Vendor</em> (Biaya Angkut) pada dokumen PO yang sama.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Master Data Admin (MDM)</td><td class="border px-2 py-1">Create / Edit General Data</td><td class="border px-2 py-1">Membuat data awal. Tidak berhak mengubah <em>Reconciliation Account</em> atau status blokir keuangan.</td></tr>
        <tr><td class="border px-2 py-1">Finance / AP Controller</td><td class="border px-2 py-1">Edit Company Code Data</td><td class="border px-2 py-1">Otoritas absolut pada pemetaan rekonsiliasi GL, bank vendor, term pembayaran, dan pencetusan blokir penagihan (Posting Block).</td></tr>
        <tr><td class="border px-2 py-1">Purchasing Manager</td><td class="border px-2 py-1">Edit Purch. Org Data</td><td class="border px-2 py-1">Otoritas pada penentuan mata uang order (Order Currency), skema harga (Schema Group), dan pemblokiran pembuatan PO (Purchasing Block).</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Purchasing Block</td><td class="border px-2 py-1">Gudang / Procurement dilarang keras menerbitkan dokumen Purchase Order (PO) baru. Namun tagihan PO lama masih boleh diselesaikan/dibayar.</td></tr>
        <tr><td class="border px-2 py-1">Posting Block</td><td class="border px-2 py-1">Departemen Finance (AP) dilarang mencatat faktur hutang baru (Vendor Invoice) dari vendor terkait.</td></tr>
        <tr><td class="border px-2 py-1">Payment Block</td><td class="border px-2 py-1">Faktur utang sudah diakui dan tercatat, namun sistem menahan pencairan dana / transfer keluar hingga status dicabut.</td></tr>
        <tr><td class="border px-2 py-1">Archived / Delete Flag</td><td class="border px-2 py-1">Vendor ditandai <em>soft-delete</em>. Disembunyikan dari semua form pencarian operasional.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-VEND-01</td><td class="border px-2 py-1">Irreversible Creation</td><td class="border px-2 py-1">Setelah nomor vendor terbuat (Generate), <em>Vendor Code</em> dan <em>Account Group</em> bersifat statis (tidak dapat diedit) untuk selamanya demi integritas historis.</td></tr>
        <tr><td class="border px-2 py-1">BR-VEND-02</td><td class="border px-2 py-1">No Physical Deletion</td><td class="border px-2 py-1">Penghapusan data master mutlak dilarang jika vendor bersangkutan telah memiliki 1 saja riwayat dokumen operasional (PO/GR/Invoice).</td></tr>
        <tr><td class="border px-2 py-1">BR-VEND-03</td><td class="border px-2 py-1">Forwarder Condition</td><td class="border px-2 py-1">Vendor berstatus tipe FORWARDER (20FF) atau INSURANCE (20IN) tidak dapat diisikan sebagai Vendor Utama pemasok barang di PO, namun wajib digunakan sebagai sub-vendor biaya transport di <em>Pricing Conditions</em>.</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Status Profil Utama</td><td class="border px-2 py-1">ACTIVE (Saat penyimpanan awal).</td></tr>
        <tr><td class="border px-2 py-1">Block Flags (Purchasing, Posting, Payment)</td><td class="border px-2 py-1">FALSE (Tidak dikunci).</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">NPWP Duplication Check</td><td class="border px-2 py-1">Mencegat penyimpanan jika nomor pajak 16 digit sudah digunakan oleh Vendor aktif lain (Kecuali untuk tipe 20OT One-Time).</td></tr>
        <tr><td class="border px-2 py-1">Partner Validity Check</td><td class="border px-2 py-1">Sistem mencegah input kode vendor tidak valid (atau berstatus terblokir) saat pemetaan <em>Partner Functions</em> (Payee, Goods Supplier).</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tinggi (Financial Fraud Risk)</td><td class="border px-2 py-1">Seluruh pergantian nomor rekening bank (Multiple Banks) dan pengalihan alamat pembayaran (*Payee Partner Function*) wajib direkam ke dalam tabel <em>Audit Trail</em> secara terperinci (Old Value -> New Value) lengkap dengan data pelakunya (Updated By).</td></tr>
        <tr><td class="border px-2 py-1">Tinggi (General Ledger)</td><td class="border px-2 py-1">Perubahan pada <em>Reconciliation Account</em> direkam pada log audit khusus karena mempengaruhi validitas konsolidasi hutang perusahaan.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-VEND-01</td><td class="border px-2 py-1">Sistem memblokir proses penyimpanan Purchase Invoice jika vendor berstatus <em>Posting Block</em>.</td></tr>
        <tr><td class="border px-2 py-1">AC-VEND-02</td><td class="border px-2 py-1">Jika sebuah vendor (Vendor A) menugaskan Vendor B sebagai fungsi Payer/Invoicer (Partner Function), sistem otomatis mentransfer kewajiban pelunasan hutang (AP) kepada nama Vendor B meskipun barang dikirim dari Vendor A.</td></tr>
        <tr><td class="border px-2 py-1">AC-VEND-03</td><td class="border px-2 py-1">Pendaftaran nomor rekening internasional dapat menangkap konfigurasi nilai <em>Currency</em> asing dan <em>SWIFT Code</em>.</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BRD-001 (Company Master)</td><td class="border px-2 py-1">Untuk Company Code Extension.</td></tr>
        <tr><td class="border px-2 py-1">BRD-031 (Purchasing Org)</td><td class="border px-2 py-1">Untuk definisi batas hak negosiasi pengadaan dan Purchase Extension.</td></tr>
        <tr><td class="border px-2 py-1">BRD-014 (Chart of Accounts)</td><td class="border px-2 py-1">Basis data penentuan <em>Reconciliation Account</em>.</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-17 18:12:25',
            ),
            6 => 
            array (
                'id' => 8,
                'brd_code' => 'BRD-001',
                'title' => 'Master Company',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '## 1. Document Information

<table style="width: 100%; border-collapse: collapse; margin-bottom: 24px; font-size: 0.85rem;">
  <tbody>
    <tr>
      <th style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; background: #f9fafb; font-weight: 600; color: #374151; width: 25%;">Document ID</th>
      <td style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; color: #4b5563;">BRD-001</td>
    </tr>
    <tr>
      <th style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; background: #f9fafb; font-weight: 600; color: #374151;">Document Name</th>
      <td style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; color: #4b5563;">Business Requirement Document - Master Company</td>
    </tr>
    <tr>
      <th style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; background: #f9fafb; font-weight: 600; color: #374151;">Module</th>
      <td style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; color: #4b5563;">Core Organizational Structure</td>
    </tr>
    <tr>
      <th style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; background: #f9fafb; font-weight: 600; color: #374151;">Version</th>
      <td style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; color: #4b5563;">1.0</td>
    </tr>
    <tr>
      <th style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; background: #f9fafb; font-weight: 600; color: #374151;">Effective Date</th>
      <td style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; color: #4b5563;">12 Jul 2026</td>
    </tr>
    <tr>
      <th style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; background: #f9fafb; font-weight: 600; color: #374151;">Status</th>
      <td style="border: 1px solid #e5e7eb; padding: 8px 12px; text-align: left; color: #4b5563;">Under Review</td>
    </tr>
  </tbody>
</table>

## 2. Scope

Modul ini mengatur pengelolaan data master Entitas Hukum Induk (Company / Perusahaan) dalam sistem terintegrasi multi-company demi memfasilitasi konsolidasi keuangan dan operasional.

**In Scope (Ruang Lingkup):**

| Area | Penjelasan Singkat |
| :--- | :--- |
| **Organisasi & Legalitas** | Pendaftaran kode entitas, nama perusahaan, alamat lengkap, hingga informasi kontak resmi. |
| **Kepatuhan Pajak (Tax)** | Pencatatan NPWP, status PKP, izin usaha, hingga alamat pajak terdaftar. |
| **Konfigurasi Keuangan** | Penentuan mata uang dasar (Base Currency), varian siklus fiskal, dan pengikatan Chart of Accounts (COA). |
| **Lokalisasi** | Pengaturan zona waktu standar (Time Zone) dan bahasa dokumen (Default Language). |
| **Lifecycle Data** | Mekanisme perpindahan status *Draft, Active, Inactive*, hingga *Archived*. |

**Out of Scope (Di Luar Ruang Lingkup):**
* Struktur organisasi tingkat cabang (Branch) diatur terpisah di BRD-002.

## 3. Domain Core Specification

Berikut adalah rincian seluruh atribut (*fields*) yang wajib ada pada tabel entitas Company:

| Field Name | Penjelasan (Description) | Business Rules / Aturan Data |
| :--- | :--- | :--- |
| **Company Code** | Kode identifikasi unik perusahaan. | Maks 10 karakter (Alphanumeric Uppercase). *Immutable*. |
| **Company Name** | Nama komersial perusahaan. | Wajib diisi (Required). *Editable*. |
| **Legal Name** | Nama badan hukum resmi (misal: PT. Arxino). | Wajib untuk cetak dokumen legal & Faktur Pajak. |
| **Address** | Alamat jalan lengkap dari kantor pusat. | Wajib diisi. |
| **Country** | Negara domisili entitas hukum. | Mengambil data dari Master Country. |
| **Province** | Provinsi domisili. | Relasi *cascade* berdasarkan Country. |
| **City** | Kota / Kabupaten domisili. | Relasi *cascade* berdasarkan Province. |
| **Postal Code** | Kode pos wilayah domisili entitas. | Format numerik. |
| **Phone** | Nomor telepon resmi (*Hunting*). | Validasi format nomor telepon. |
| **Email** | Alamat email resmi (*Corporate*). | Wajib mengikuti format @domain yang valid. |
| **Website** | Alamat situs web perusahaan. | Opsional. |
| **NPWP** | Nomor Pokok Wajib Pajak entitas. | Validasi 15/16 digit numerik. Wajib jika PKP = Yes. |
| **PKP Status** | Penanda status Pengusaha Kena Pajak. | *Checkbox* (Yes / No). |
| **KPP** | Kantor Pelayanan Pajak terdaftar. | Opsional, wajib jika PKP = Yes. |
| **Base Currency** | Mata uang operasional/pelaporan. | *Immutable* pasca transaksi jurnal pertama. |
| **Fiscal Year Variant** | Periode siklus akuntansi (misal: K1/Jan-Des). | *Editable* (dengan wewenang khusus). |
| **Time Zone** | Zona waktu untuk *timestamp* sistem. | *Editable*, *Dropdown* standar ERP. |
| **Default Language** | Bahasa utama dokumen operasional. | *Editable*, *Dropdown* standar ERP. |
| **Chart of Accounts** | Bagan akun (COA) yang mengikat entitas. | *Immutable* pasca transaksi jurnal pertama. |
| **Status** | Status operasional terkini. | Draft / Active / Inactive / Archived. |

## 4. Tax & Compliance

Sebagai entitas bisnis berskala *Enterprise*, kepatuhan pajak sangat kritikal:
| Dokumen / Atribut | Penjelasan & Aturan |
| :--- | :--- |
| **NPWP** | Nomor Pokok Wajib Pajak entitas. Wajib diisi jika status PKP aktif. |
| **PKP** | Status Pengusaha Kena Pajak. Menentukan apakah entitas wajib menerbitkan Faktur Pajak. |
| **KPP** | Kantor Pelayanan Pajak tempat entitas terdaftar. |
| **NIB** | Nomor Induk Berusaha sebagai identitas legal pelaku usaha. |
| **Business License** | Nomor Surat Izin Usaha Perdagangan (SIUP) atau dokumen setara. |
| **Tax Address** | Alamat spesifik untuk korespondensi pajak (jika berbeda dari alamat operasional utama). |
| **Tax Country** | Negara yurisdiksi pelaporan pajak utama perusahaan. |
| **Default Tax Code** | Kode pajak *default* yang akan terikat otomatis dalam transaksi (misal: PPN 11%). |

## 5. Data Structure & Relationships

Penyimpanan Master Company dikelola pada tabel `companies` di **ERD 00**. Master Company adalah entitas level teratas. Peta kardinalitas hierarkinya:

| Entitas Anak / Modul | Tipe Relasi & Kardinalitas | Penjelasan Fungsional |
| :--- | :--- | :--- |
| **Branch** | One-to-Many (1:N) | Satu perusahaan dapat membawahi banyak cabang. |
| **Cost Center** | One-to-Many (1:N) | Pusat biaya spesifik di bawah entitas perusahaan. |
| **User Assignment** | One-to-Many (1:N) | Pemetaan *user* yang memiliki akses terotorisasi ke perusahaan ini. |
| **COA Mapping** | One-to-One (1:1) | Konfigurasi mutlak bagan akun (*Chart of Accounts*) utama. |
| **Fiscal Periods** | One-to-Many (1:N) | Kalender siklus fiskal yang digunakan oleh perusahaan. |
| **Journal Entries** | One-to-Many (1:N) | Seluruh entri jurnal mutasi transaksi akuntansi perusahaan. |

## 6. Functional Specifics

Spesifikasi interaksi *user* pada antarmuka:
| Fungsi UI | Deskripsi Interaksi |
| :--- | :--- |
| **Create Company** | Menambahkan entitas baru dengan validasi *field mandatory* dan pengecekan keunikan *Company Code*. |
| **Edit Company** | Mengubah atribut perusahaan (terbatas secara dinamis pada field yang masih bersifat *editable*). |
| **View Detail** | Menampilkan rekapitulasi seluruh informasi komprehensif dari entitas perusahaan. |
| **Ubah Status** | Tombol aksi untuk mengubah *lifecycle state* (Activate / Deactivate / Archive). |
| **Assign Data** | Menghubungkan Master Company dengan konfigurasi *Chart of Accounts* dan *Fiscal Year*. |
| **Search & Export** | Fitur pencarian lanjutan, filter berdasarkan status/lokasi, dan ekspor data *grid* ke format Excel/PDF. |

## 7. Controls & Authorization

Pembatasan *Role Permissions*:
| Role Level | Hak Akses (Permissions) |
| :--- | :--- |
| **Super Administrator** | Memiliki kewenangan absolut (Create, Edit, Delete, View, Assign). |
| **Finance Controller** | Dapat melakukan Update atribut dan memvalidasi/merubah Status perusahaan. |
| **Auditor / Manager** | Akses terbatas hanya untuk membaca dan menarik laporan (*View Only*). |
| **Implementer / SysAdmin**| Wewenang teknis khusus untuk melakukan *Assign Configuration* (COA/Fiscal Year). |

## 8. Status & Blocking

Siklus hidup dokumen (*Lifecycle*) dari Master Company memiliki aturan sistem (*behaviour*) yang ketat:

| Status | Behaviour (Aturan Sistem) |
| :--- | :--- |
| **Draft** | Tidak dapat digunakan atau direferensikan oleh modul lain (tersembunyi dari pemilihan). |
| **Active** | Dapat digunakan sepenuhnya untuk seluruh operasional dan transaksi sistem. |
| **Inactive** | Tidak menerima transaksi baru, namun histori dan data *reporting* tetap tersedia. |
| **Archived** | *Read Only*. Tidak muncul pada transaksi maupun *master selection* modul lain (Legacy). |

## 9. Business Rules (BR)

* **BR-01**: *Company Code* adalah unik dan bersifat *Immutable* (tidak dapat diubah pasca-simpan). Namun *Company Name* dan *Legal Name* bersifat *Editable*.
* **BR-02**: Konfigurasi *Base Currency* dan *Chart of Accounts (COA)* menjadi *Immutable* (terkunci permanen) jika Company telah memiliki Jurnal Transaksi ter-posting.
* **BR-03**: Konfigurasi *Fiscal Year Variant*, *Default Language*, dan *Time Zone* bersifat *Editable* kapanpun oleh otoritas terkait.
* **BR-04**: Company tidak dapat dihapus (Delete) apabila telah direferensikan oleh modul lain (misal: Branch, Journal, Cost Center, User Assignment). *Foreign Key Constraint*.
* **BR-05**: Jika status *PKP* = Yes, maka pengisian atribut *KPP* dan *NPWP* otomatis menjadi Wajib (*Mandatory*).
* **BR-06**: Jika *Tax Address* dibiarkan kosong, sistem akan secara otomatis menyalin (*fallback*) nilai dari *Address* utama (*Head Office*).
* **BR-07**: Company yang berstatus *Draft*, *Inactive*, atau *Archived* tidak dapat dipilih sebagai referensi pada pembuatan dokumen transaksi baru.

## 10. Default Values

| Atribut | Nilai Default |
| :--- | :--- |
| **Status** | Draft (secara otomatis menjadi Active setelah lolos proses *Approval*). |
| **Language** | Indonesian (ID). |
| **Currency** | IDR (Rupiah). |
| **Time Zone** | Asia/Jakarta (WIB). |

## 11. Validation Rules

| Atribut / Kondisi | Aturan Validasi |
| :--- | :--- |
| **Mandatory Fields** | Field bertanda (*) wajib diisi (*Required*). Sistem memblokir proses simpan jika ada yang kosong. |
| **Company Code** | Maksimal 10 karakter. Hanya mendukung Alfanumerik Kapital (tanpa spasi dan tanpa simbol). |
| **Duplikasi Data** | Input ganda (*Duplicate entry*) untuk *Company Code* atau *NPWP* akan ditolak keras oleh sistem dengan pesan *error* spesifik. |

## 12. Audit Requirements

| Komponen | Spesifikasi Pencatatan |
| :--- | :--- |
| **Trigger Aksi** | Setiap operasi krusial (Create, Update, Status Change, Delete) wajib memicu penambahan *Audit Log*. |
| **Data yang Direkam** | Sistem wajib melacak *payload*: `User_ID`, `Action_Type`, `Old_Value`, `New_Value`, `IP_Address`, dan `Timestamp`. |

## 13. Acceptance Criteria (AC)

Setiap *Business Rule* wajib lulus uji coba komprehensif berikut:
* **AC-01 (Ref BR-01)**: Input Duplicate Company Code ditolak. Perubahan pada Company Code yang telah tersimpan di-blokir oleh UI. Perubahan pada Company Name sukses disimpan.
* **AC-02 (Ref BR-02)**: Field Base Currency dan COA otomatis *disabled* (abu-abu) di antarmuka Edit jika sistem mendeteksi Jurnal Transaksi > 0.
* **AC-03 (Ref BR-03)**: Admin berhasil menyimpan perubahan pada *Fiscal Year Variant* tanpa *error* meskipun transaksi sudah ada di dalam Company.
* **AC-04 (Ref BR-04)**: Proses Delete dibatalkan dan memunculkan *Error Constraint Constraint Violation* apabila Company sudah dipakai di tabel Branch/User/Cost Center.
* **AC-05 (Ref BR-05)**: UI memblokir penyimpanan (*Validation Error*) jika *PKP* di-centang `True` namun input `KPP` atau `NPWP` kosong.
* **AC-06 (Ref BR-06)**: Menyimpan Company tanpa mengisi *Tax Address* akan berhasil, dan nilai *Tax Address* otomatis terisi persis seperti *Address* utama di *database*.
* **AC-07 (Ref BR-07)**: Company berstatus Draft, Inactive, atau Archived tidak muncul pada *dropdown selection* pembuatan Sales Order, Purchase Order, atau Jurnal.
* **AC-08 (General Audit)**: Aksi mutasi *Base Currency* (jika dilakukan sebelum ada jurnal) terekam sukses di Audit Log dengan data *Old Currency* dan *New Currency*.

## 14. Dependencies

* **Prerequisites**: Master Country & Master Currency (Konfigurasi Global).
* **Dependents**: Modul Branch, COA, Cost Center, dan User Assignment mengonsumsi Company sebagai akar referensi.
',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-21 02:10:55',
            ),
            7 => 
            array (
                'id' => 9,
                'brd_code' => 'BRD-014',
            'title' => 'Chart of Accounts (COA) / Bagan Akun',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-014</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Chart of Accounts (COA) / Bagan Akun</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Financial & Accounting Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">2.0 (Restructured)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Chart of Accounts Master</strong></td>
            <td class="border px-2 py-1">Pembentukan Master Data Akun (Buku Besar), penentuan struktur Hierarki (*Header* dan *Child*), serta pengaturan Saldo Normal (Debit/Kredit).</td>
            <td class="border px-2 py-1">Operasi kalkulasi matematis (Laba/Rugi, Mutasi Saldo). Ini adalah spesifikasi struktur wadah, bukan hitungan matematisnya.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Control Account Logic</strong></td>
            <td class="border px-2 py-1">Pengaturan kuncian khusus bagi tipe akun "Rekonsiliasi" (Misal: Akun Piutang, Hutang, Pajak) agar tidak bisa diintervensi oleh modul Jurnal Umum.</td>
            <td class="border px-2 py-1">Pembentukan transaksi (*Sub-Ledger*). Modul ini hanya menyalakan "Lampu Merah" larangannya.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Tree Hierarchy (Silsilah Induk-Anak)</strong></td>
            <td class="border px-2 py-1">Sebuah akun harus secara tegas mendeklarasikan karakternya: Apakah dia <em>HEADER</em> (Induk pengumpul, misal: "1000 - Total Kas") atau <em>POSTING</em> (Anak penerima transaksi, misal: "1101 - Kas Kecil").</td>
            <td class="border px-2 py-1">Akun <em>HEADER</em> bertindak sebagai folder semata. Ia TIDAK BOLEH sekalipun dimasukkan sebagai baris penerima angka rupiah di transaksi apapun. Sistem harus mem-blokirnya.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Reconciliation Object (Control Account)</strong></td>
            <td class="border px-2 py-1">Konsep isolasi <em>Sub-Ledger</em>. Sebuah akun yang diikat tipe "CUSTOMER" adalah milik mutlak modul Penjualan. Ia bertindak sebagai pengontrol utuh Piutang.</td>
            <td class="border px-2 py-1">Akun yang memiliki nilai pada kolom <em>Control Account Type</em> DILARANG KERAS disentuh oleh form "Entri Jurnal Manual". Saldo akun ini hanya bisa bergeser otomatis dari tarikan dokumen hulu (seperti Faktur atau Kuitansi).</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Standardisasi Saldo Normal (Normal Balance)</strong></td>
            <td class="border px-2 py-1">Pelaporan Neraca Pajak mewajibkan klasifikasi saldo secara saklek (Harta di Debit, Kewajiban di Kredit). Kesalahan setel *Normal Balance* di tingkat COA akan menyebabkan neraca disajikan terbalik (Mis-statement) dan menyalahi PSAK. Sistem harus memvalidasi keselarasan *Normal Balance* dengan Grup Akun.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>GL Account Group (BRD-012)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Satu COA harus tunduk pada rentang *Number Range* dan jenis kelas yang ada pada induk Grup Akun-nya.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Field Status Group (BRD-012)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Satu COA dapat memanggil profil aturan antarmuka form (Misal: Aturan kewajiban isi *Cost Center*) dari master konfigurasinya.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Account Creation (Draft)</strong></td>
            <td class="border px-2 py-1">Staf *Accounting* membuat akun baru, memasukkan kode "2100", menunjuk induk ke grup "Hutang Usaha". Menyimpan. Akun tersimpan dengan status *DRAFT* (Belum bisa digunakan bertransaksi).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Approval & Activation</strong></td>
            <td class="border px-2 py-1">Manajer Keuangan meninjau usulan akun "2100". Manajer setuju bahwa ini akun Piutang terikat, lalu menyetel *Control Account* ke "VENDOR". Lalu mengubah status ke *ACTIVE*. Mulai saat ini akun siap di-<em>consume</em> oleh sistem.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Accounting Staff</strong></td>
            <td class="border px-2 py-1">Create (Draft) & View</td>
            <td class="border px-2 py-1">Boleh mendata usulan Bagan Akun baru namun tidak bisa mengaktifkannya (Mencegah penciptaan akun hantu).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Finance Manager</strong></td>
            <td class="border px-2 py-1">Full Control & Approval</td>
            <td class="border px-2 py-1">Berwenang menyetujui, menolak, mem-blokir, atau mengubah karakteristik kritikal (seperti <em>Control Account</em>).</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>DRAFT</strong></td>
            <td class="border px-2 py-1">Akun sedang dalam peninjauan. Sistem Transaksi belum mengenali (menyembunyikan) akun ini di *dropdown* jurnal.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>ACTIVE</strong></td>
            <td class="border px-2 py-1">Akun sehat dan tersedia penuh untuk transaksi.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BLOCKED / INACTIVE</strong></td>
            <td class="border px-2 py-1">Akun dibekukan. Transaksi baru DITOLAK MENTAH-MENTAH, namun seluruh riwayat saldo historis sebelumnya tetap utuh dan valid di Buku Besar.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Self-Referential Parent Block</td>
            <td class="border px-2 py-1">Sebuah akun dilarang keras menunjuk dirinya sendiri sebagai <code>parent_account_id</code>, karena ini akan menyebabkan <em>Infinite Loop</em> mematikan (Tornado Kalkulasi) pada saat sistem menghitung saldo <em>Tree Hierarchy</em>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Parent Hierarchy Constraints</td>
            <td class="border px-2 py-1">Sebuah akun hanya bisa merujuk <em>parent</em> ke akun lain yang secara tegas memiliki parameter <code>posting_nature = \'HEADER\'</code>. Menunjuk induk ke akun tipe POSTING sangat tidak sah.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>is_active</strong></td>
            <td class="border px-2 py-1"><code>FALSE</code> (Akun baru lahir dalam kondisi dibekukan/DRAFT sebelum disetujui).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>posting_nature</strong></td>
            <td class="border px-2 py-1"><code>POSTING</code> (Akun operasional biasa).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Nomor Akun</strong></td>
            <td class="border px-2 py-1">Wajib memvalidasi bahwa kolom `code` yang di-input nilainya jatuh di antara <code>number_from</code> dan <code>number_to</code> milik relasi induk <em>GL Account Group</em>. Jika keluar batas, berikan pesan error *"Kode Akun di luar yurisdiksi grupnya"*.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Menengah (Medium)</strong></td>
            <td class="border px-2 py-1">Jika *Manager* mematikan status `is_active` menjadi FALSE pada akun yang tengah hidup, waktu dan ID *Manager* wajib tercatat di `updated_by`.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Jika kita menunjuk *Parent Account* dengan memilih akun yang *posting_nature* nya POSTING (bukan HEADER), maka UI menampilkan tulisan *"Parent harus bertipe HEADER"* dan proses <em>Save</em> diblokir.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Sistem Jurnal Manual sama sekali tidak akan memunculkan COA dengan `control_account_type = VENDOR` di <em>dropdown list</em>-nya.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Modul Transaksi Seluruh Sistem</strong></td>
            <td class="border px-2 py-1">Seluruh modul ERP (Sales, Purchase, GL) membutuhkan pasokan data dari master COA ini sebagai wadah rupiah utama. Jika COA kosong, sistem secara teknis lumpuh.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 10:23:09',
                'updated_at' => '2026-07-22 12:54:32',
            ),
            8 => 
            array (
                'id' => 10,
                'brd_code' => 'BRD-010',
            'title' => 'Accounting Period & Variant (Open/Close Period)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-010</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Accounting Period & Variant (Open/Close Period)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Financial & Accounting Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">2.0 (Restructured)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Posting Period Engine</strong></td>
            <td class="border px-2 py-1">Pembukaan dan penutupan siklus buku besar per varian periode. Pembentukan otomatis 16 periode per tahun. Evaluasi *time-bomb reopen*.</td>
            <td class="border px-2 py-1">Eksekusi matematis pembentukan jurnal akhir tahun (Retained Earnings). Hal ini diatur terpisah pada dokumen BRD-013.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Posting Period Variant</strong></td>
            <td class="border px-2 py-1">Pengelompokan konfigurasi periode kalender pembukuan agar beberapa Perusahaan/Cabang dengan kalender fiskal yang sama dapat berbagi satu master konfigurasi, memaksimalkan efisiensi pemeliharaan data.</td>
            <td class="border px-2 py-1">Minimal satu varian (Misal: Varian Kalender Standar Jan-Des) harus tersedia di dalam sistem sebagai basis referensi perusahaan.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>12 + 4 Fiscal Periods</strong></td>
            <td class="border px-2 py-1">Standar absolut pembukuan korporasi besar: 12 periode normal merepresentasikan bulan Masehi, sementara 4 periode ekstra disediakan murni untuk jurnal penyesuaian akhir tahun (Audit, Koreksi Pajak, Revaluasi) tanpa mengganggu saldo Desember.</td>
            <td class="border px-2 py-1">Periode ekstra (13-16) wajib menimpa tanggal hari terakhir periode ke-12 (31 Desember) dengan batasan akses input yang dibatasi secara spesifik.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Time-Bomb Reopen</strong></td>
            <td class="border px-2 py-1">Mekanisme pembukaan sementara (reopen) periode yang sudah tertutup untuk keperluan audit, dengan menanamkan timer (*timestamp*). Ketika waktu habis, periode otomatis terkunci kembali tanpa perlu intervensi manual.</td>
            <td class="border px-2 py-1">Masa aktif *time-bomb* dilarang melampaui 72 jam dari titik aktivasi untuk mencegah kebocoran kelalaian *user*.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Kekakuan Bukti Potong & PPN</strong></td>
            <td class="border px-2 py-1">Pelaporan masa pajak mensyaratkan bahwa data yang telah dilapor tidak boleh berubah. Sistem mengawal hal ini lewat penguncian absolut periode akuntansi (CLOSED/LOCKED status).</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Perusahaan (Company/Branch)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Banyak cabang/perusahaan dapat menumpang pada satu Varian Periode (Posting Period Variant) yang sama untuk standarisasi korporasi grup.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Posting Periods (Detail)</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N)</td>
            <td class="border px-2 py-1">Satu Varian Periode menaungi puluhan baris Periode Detail berdasarkan urutan tahun dan bulannya (Melahirkan riwayat periode tanpa batas waktu).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Semua Modul Transaksional</strong></td>
            <td class="border px-2 py-1">Dependency Murni</td>
            <td class="border px-2 py-1">Modul AP, AR, GL, dan Inventory selalu melakukan pengecekan tanggal dokumennya ke tabel Periode ini setiap kali user menekan tombol "Save".</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Generate Fiscal Year</strong></td>
            <td class="border px-2 py-1">Admin masuk ke UI *Period Variant*. Memilih tombol "Generate New Year". Sistem otomatis membuat 16 baris periode untuk tahun yang dipilih dengan kalender standar.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Reopen Period</strong></td>
            <td class="border px-2 py-1">Auditor meminta perbaikan jurnal bulan Maret (yang sudah tertutup). Manager Keuangan mengubah status Maret menjadi OPEN, memasukkan alasan, lalu mengisi form *Time-Bomb* "Tutup Otomatis Pada: Besok Jam 17:00".</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Super Admin</strong></td>
            <td class="border px-2 py-1">Unlock Bypass</td>
            <td class="border px-2 py-1">Memiliki hak veto tunggal untuk membuka paksa periode yang berstatus LOCKED (Terkunci permanen).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Finance Controller (Manager)</strong></td>
            <td class="border px-2 py-1">Reopen Access</td>
            <td class="border px-2 py-1">Dapat melakukan penutupan normal (CLOSED) dan pembukaan sementara (OPEN via Time-bomb) namun tidak dapat membuka status LOCKED.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Staff Operasional</strong></td>
            <td class="border px-2 py-1">View Only</td>
            <td class="border px-2 py-1">Hanya menerima akibat (penolakan akses input jika *closed*).</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>OPEN</strong></td>
            <td class="border px-2 py-1">Bebas. Semua transaksi harian dapat dicatat pada rentang tanggal tersebut.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>CLOSING</strong></td>
            <td class="border px-2 py-1">Masa transisi (Cut-off). Hanya transaksi jurnal balik (*reversal*) atau jurnal rekonsiliasi yang diizinkan masuk.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>CLOSED</strong></td>
            <td class="border px-2 py-1">Terblokir utuh. Tidak ada aktivitas pencatatan yang valid. Masih bisa dibuka ulang (*reopen*) oleh Manager jika diperlukan.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>LOCKED</strong></td>
            <td class="border px-2 py-1">Terkunci permanen (Sudah diaudit / Tutup Tahun Mutlak). Mustahil dibuka kecuali intervensi tingkat dewa (Super Admin Bypass).</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Auto Status Revert (Time-Bomb)</td>
            <td class="border px-2 py-1">Jika sistem waktu *server* mendeteksi bahwa waktu saat ini lebih besar (>) dari <code>opened_until</code>, maka sistem akan bertindak seolah-olah periode tersebut berstatus CLOSED, dan menolak semua transaksi.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Date Range Overlap Prevention</td>
            <td class="border px-2 py-1">Rentang tanggal (<code>start_date</code> sampai <code>end_date</code>) pada satu periode tidak boleh tumpang tindih (*overlap*) dengan rentang periode normal lainnya di tahun yang sama.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>status</strong> (Periode 1-12)</td>
            <td class="border px-2 py-1"><code>OPEN</code> (Saat tombol *Generate* ditekan).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>status</strong> (Periode 13-16)</td>
            <td class="border px-2 py-1"><code>CLOSED</code> (Otomatis ditutup pada awal tahun agar user awam tidak salah *input*).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Mengganti Status Periode</strong></td>
            <td class="border px-2 py-1">Mewajibkan input <em>Reason</em> (Alasan) jika transisi status berubah dari CLOSED ke OPEN. Sistem akan memvalidasi *form requirement* tersebut.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Tinggi (Critical)</strong></td>
            <td class="border px-2 py-1">Setiap kali kolom <code>status</code> berubah, entri rekam jejak yang solid wajib disuntikkan. Auditor butuh mengetahui siapa yang iseng membuka periode tutup buku di tengah malam.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Transaksi Jurnal ditolak dengan pesan *error* "Accounting Period is CLOSED" saat tanggal dokumen (<em>Posting Date</em>) mengarah ke periode yang ditutup.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Saat *Time-bomb* <code>opened_until</code> sudah lewat walau satu menit dari waktu server, transaksi yang di-<em>submit</em> ditolak.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Transaksi Modul Apapun</strong></td>
            <td class="border px-2 py-1">Memaksa semua *StoreMethod* di *Controller* lain untuk memanggil *Middleware / Service Interceptor* yang mengecek tabel periode ini secara terpusat sebelum mengeksekusi `DB::beginTransaction()`.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 09:35:02',
                'updated_at' => '2026-07-22 09:37:39',
            ),
            9 => 
            array (
                'id' => 11,
                'brd_code' => 'BRD-019',
            'title' => 'Auto Journal Mapping (Posting Matrix)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-019</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Auto Journal Mapping (Posting Matrix)</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Finance / General Ledger</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Automatic Posting Engine</td><td class="border px-2 py-1">Penyediaan tabel matriks (mapping) yang menghubungkan modul transaksional (Material, Sales) ke Chart of Accounts (COA) secara otomatis di belakang layar.</td><td class="border px-2 py-1">Otomatisasi pengakuan hutang (AP/AR clearing) tidak tercakup dalam modul mutasi teknis ini.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Rules Determination</td><td class="border px-2 py-1">Konfigurasi alur penentuan (Determination Logic) berjenjang berdasar Transaction Key, Item Category, dan Customer Group.</td><td class="border px-2 py-1">Validasi posting manual oleh General Ledger.</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Transaction Key</td><td class="border px-2 py-1">Kode mutlak (hardcoded di level backend) yang mempresentasikan jenis pergerakan. Contoh: `INV_RECEIPT` (Masuk Gudang), `COGS` (Harga Pokok Penjualan).</td><td class="border px-2 py-1">Kunci utama untuk penentuan COA yang tidak boleh dikosongkan.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Item Category Modifier</td><td class="border px-2 py-1">Pemecahan jurnal yang sama tergantung materialnya. Contoh: `INV_RECEIPT` dipisah untuk Barang Jadi (Finished Good) dan Bahan Baku (Raw Material).</td><td class="border px-2 py-1">Bersifat kondisional (opsional / *fallback*).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Customer Group Modifier</td><td class="border px-2 py-1">Pemecahan akun pendapatan berdasarkan profil/grup customer yang membeli.</td><td class="border px-2 py-1">Bersifat kondisional (opsional / *fallback*).</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Segregation of Duties</td><td class="border px-2 py-1">Staf logistik/gudang mutlak dilarang mengetahui atau memilih akun akuntansi. Pemetaan ini menjamin independensi pencatatan finansial sebagai wewenang murni *Chief Accountant*.</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">auto_journal_mappings</td><td class="border px-2 py-1">Tabel Pusat Resolusi (Master)</td><td class="border px-2 py-1">Menyimpan titik potong kombinasi kriteria untuk mencari 1 GL Account (COA).</td></tr>
<tr><td class="border px-2 py-1 font-bold">coas (Chart of Accounts)</td><td class="border px-2 py-1">Many-to-One (N:1) dengan auto_journal_mappings</td><td class="border px-2 py-1">Akun GL Final yang akan di-tembak saat sistem meresolusi kondisi.</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Hierarchy Resolution Engine</td><td class="border px-2 py-1">Saat backend mutasi menembak API pemetaan, *engine* akan mencari kecocokan terdalam/paling spesifik (Company + TransKey + ItemCategory + CustomerGroup). Jika luput, pencarian *fallback* ke kombinasi generik (Modifier IS NULL) hingga GL ditemukan.</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Chief Accountant / Controller</td><td class="border px-2 py-1">Create, Read, Update, Delete</td><td class="border px-2 py-1">Hanya pemegang otoritas finansial tertinggi yang berhak mengubah matriks GL. User operasional diblokir penuh.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Missing Mapping (Block)</td><td class="border px-2 py-1">Jika operasional memicu jurnal tapi pemetaannya tidak terdaftar, maka transaksi operasional digagalkan menyeluruh (*Rollback Database*), dengan error: "Account Determination Not Found".</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-19-01</td><td class="border px-2 py-1">Unique Mapping Validation</td><td class="border px-2 py-1">Kombinasi `company_id` + `transaction_key` + `item_category_id` + `customer_group_id` mutlak bersifat *Unique* di Database (via Unique Index & FormRequest).</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-19-02</td><td class="border px-2 py-1">Active GL Link</td><td class="border px-2 py-1">Akun yang dipasangkan ke dalam `coa_id` wajib berstatus aktif dan merupakan tipe akun \'Posting\' (Bukan akun \'Header\').</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Kriteria Tambahan (Modifiers)</td><td class="border px-2 py-1">Setiap modifier seperti `item_category_id` bernilai `NULL` (Kosong) secara standar, berlakon sebagai "*Wildcard*".</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Chart of Account ID</td><td class="border px-2 py-1">Menolak `coa_id` dengan tipe \'HEADING\' (Judul), menampilkan form error jika terpilih.</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">High (Financial)</td><td class="border px-2 py-1">Modifikasi matriks menuntut *Activity Logging* penuh yang merekam identitas (`updated_by`) dan nilai `coa_id` (GL Account) sebelum dan sesudah diganti.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-19-01</td><td class="border px-2 py-1">Jika kriteria *fallback* digunakan, *API Resolver* sukses mengembalikan GL Account yang paling umum bila kombinasi spesifik gagal dicari.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-19-02</td><td class="border px-2 py-1">Sistem menampilkan alert penolakan (*Validation Error*) apabila user mencoba membuat dua *mapping* dengan parameter (Company + Key + Modifiers) identik.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BRD-014 (Chart of Accounts)</td><td class="border px-2 py-1">Seluruh akun yang ditunjuk bertumpu penuh pada master data COA.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BRD-018 (Accounting Documents)</td><td class="border px-2 py-1">Merupakan pemasok *COA ID* otomatis bagi mesin *General Ledger* saat menyusun *Line Item* jurnal.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-22 15:58:35',
                'updated_at' => '2026-07-24 13:16:56',
            ),
            10 => 
            array (
                'id' => 12,
                'brd_code' => 'BRD-059',
            'title' => 'Sales Order (SO) & Advanced Enterprise Engine',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
    <tbody>
        <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-11</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Sales Order & Advanced Enterprise Engine</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Sales & Distribution (SD)</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">17-07-2026</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Reference Blueprint</th><td class="border px-2 py-1">BP-SD-11</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<p class="mb-4 text-sm font-semibold">Modul Sales Order berfungsi sebagai titik awal proses Order-to-Cash yang mencatat permintaan pelanggan, melakukan validasi bisnis (pricing, credit control, ATP), menghasilkan komitmen pengiriman, dan menjadi dasar pembuatan Delivery Order serta Billing.</p>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
    <thead class="bg-gray-100"><tr><th class="border px-2 py-1 w-1/2">In Scope</th><th class="border px-2 py-1 w-1/2">Out of Scope</th></tr></thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1 align-top">
                <ul class="list-disc pl-5">
                    <li>Pembuatan dokumen Sales Order (SO) multiline.</li>
                    <li>Sistem Credit Control (Batas Limit Kredit Plafon & Overdue Block).</li>
                    <li>ATP Soft Allocation (Persediaan dikurangi alokasi SO terbuka).</li>
                    <li>Snapshotting data master historis ke dokumen transaksi.</li>
                    <li>Price Lock: Elemen harga bersifat permanen setelah disubmit.</li>
                </ul>
            </td>
            <td class="border px-2 py-1 align-top">
                <ul class="list-disc pl-5">
                    <li>Rute armada pengiriman fisik (FSD Delivery).</li>
                    <li>Pembuatan Invoice Penjualan (FSD Billing).</li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<h3>A. Sales Area</h3>
<p class="mb-2 text-sm">Setiap transaksi diikat oleh struktur Sales Area demi pengelompokan operasional:</p>
<ul class="list-disc pl-5 mb-4 text-sm font-mono">
    <li><strong>Branch:</strong> Cabang utama pemegang keuangan.</li>
    <li><strong>Sales Office:</strong> Kantor perwakilan operasional penjualan.</li>
    <li><strong>Sales Group:</strong> Tim sales spesifik yang menangani akun.</li>
</ul>

<h3>B. Document Types</h3>
<ul class="list-disc pl-5 mb-4 text-sm font-mono">
    <li><strong>SO_STD (Standard Order):</strong> Penjualan kredit reguler (Term of Payment aktif).</li>
    <li><strong>SO_CSH (Cash Order):</strong> Penjualan tunai (Jatuh tempo hari ini).</li>
    <li><strong>SO_FOC (Free of Charge):</strong> Pengiriman sampel/bonus (Diskon 100%).</li>
    <li><strong>SO_RET (Return Order):</strong> Retur penjualan. Mewajibkan input <em>Reference Invoice / Reference DO</em>, alasan retur (*Return Reason*), serta status pemeriksaan fisik (*Quality Inspection Required*).</li>
</ul>

<h2>4. Data Structure & Organization</h2>
<p class="mb-2 text-sm">Hierarki dokumen pesanan dipecah menjadi:</p>
<ul class="list-disc pl-5 mb-4 text-sm font-mono">
    <li><strong>Header:</strong> Rujukan pelanggan (*Customer*), alamat tagih/kirim, *salesperson*, tanggal order, *Incoterms*, valuta (*Currency*), dan kurs statis (`exchange_rate_value`).</li>
    <li><strong>Line Item:</strong> Detail barang. Setiap baris diikat ke `branch_id` dan `storage_location_id` penyuplai fisik, serta mencatat UoM konversi (Base UoM, Sales UoM, factor).</li>
    <li><strong>Schedule Line:</strong> Komitmen pengiriman (Requested Delivery Date & Confirmed Delivery Date).</li>
</ul>

<h2>5. Functional Specifics</h2>
<ul class="list-disc pl-5 mb-4 text-sm font-mono">
    <li><strong>Availability to Promise (ATP):</strong> Soft Allocation (Stok Fisik - SO Terbuka).</li>
    <li><strong>Price Lock Guarantee:</strong> Elemen kalkulasi harga membeku secara permanen setelah dokumen disimpan untuk mencegah fluktuasi historis.</li>
    <li><strong>Master Data Snapshotting:</strong> Sistem menyalin data historis (Nama Customer, Alamat, Tipe Pajak, Kurs, Harga, Term of Payment) secara langsung ke tabel transaksi.</li>
    <li><strong>Auto-Rejection (Background Job):</strong> Artisan Command <code>sales:auto-reject-orders</code> membatalkan otomatis pesanan menggantung yang kedaluwarsa secara berkala.</li>
</ul>

<h2>6. Controls & Classification</h2>
<h3>A. Credit Control & Exposure</h3>
<p class="mb-2 text-sm">Sistem memblokir otomatis dokumen jika melewati batas otorisasi. Perhitungan exposure kredit menggunakan rumus:</p>
<pre class="bg-slate-50 p-2 font-mono text-xs mb-2">Exposure = Total Piutang Berjalan (Outstanding Invoice) + Nilai SO Terbuka (Belum Terkirim)</pre>
<p class="mb-4 text-sm">Pola kontrol dipengaruhi oleh **Risk Category** (High, Medium, Low) milik pelanggan.</p>

<h3>B. Approval Matrix</h3>
<p class="mb-4 text-sm">Dokumen yang mengalami *Credit Block* atau melanggar *Gross Margin Tolerances* memerlukan pelepasan blokir (*Release*) secara bertingkat berdasarkan konfigurasi matriks: Supervisor, Manager, atau GM.</p>

<h2>7. Tax & Compliance</h2>
<p class="mb-4 text-sm">Sistem memicu penentuan PPN otomatis berdasarkan Klasifikasi Pajak pada Master Pelanggan dan wilayah pajak asal-tujuan.</p>

<h2>8. Status & Blocking</h2>
<h3>A. Document Lifecycle Statuses</h3>
<p class="mb-4 text-sm">Draft &rarr; Pending Approval &rarr; Approved &rarr; Credit Block &rarr; Released &rarr; Partially Delivered &rarr; Delivered &rarr; Partially Billed &rarr; Completed &rarr; Cancelled</p>

<h3>B. Cancellation Rules</h3>
<ul class="list-disc pl-5 mb-4 text-sm font-mono">
    <li>Pembatalan Header (*Cancel*) membutuhkan input *Cancellation Reason* dan dilarang keras jika sudah ada Delivery Order yang terbit.</li>
    <li>Penolakan Item (*Rejection*) membutuhkan input *Reason for Rejection* pada baris barang bersangkutan.</li>
</ul>

<h2>9. Business Rules</h2>
<ul class="list-disc pl-5 mb-4 text-sm font-mono">
    <li><strong>BR-01:</strong> Nilai Net Sales tidak boleh bernilai negatif atau nol.</li>
    <li><strong>BR-02:</strong> Elemen harga (Net Price) bersifat immutable setelah SO disubmit.</li>
</ul>

<h2>10. Acceptance Criteria</h2>
<ul class="list-disc pl-5 mb-4 text-sm font-mono">
    <li><strong>AC-01:</strong> Dokumen SO berstatus CREDIT_BLOCKED wajib diblokir secara otomatis dari menu penarikan Surat Jalan (DO).</li>
</ul>

<h2>11. Dependencies</h2>
<ul class="list-disc pl-5 mb-4 text-sm font-mono">
    <li>BRD-02 (Data Barang & Satuan)</li>
    <li>BRD-04 (Sales Pricing Engine)</li>
    <li>BRD-05 (Customer Master Data)</li>
    <li>BRD-07 (Branch & Multi-Currency)</li>
    <li>BRD-08 (COA)</li>
    <li>BRD-09 (Accounting Period)</li>
    <li>BRD-10 (Posting Matrix)</li>
    <li>BRD-12 (Delivery Order)</li>
</ul>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-17 19:29:25',
            ),
            11 => 
            array (
                'id' => 13,
                'brd_code' => 'BRD-027',
            'title' => 'BRD - Account Determination (Auto Posting Mapping)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-027</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Account Determination (Auto Posting Mapping)</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Finance / Inventory</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Pemetaan Akun Otomatis</td><td class="border px-2 py-1">Menentukan GL Account mana yang akan didebit/dikredit saat terjadi pergerakan barang berdasarkan Transaction Key, Valuation Class, dll.</td><td class="border px-2 py-1">Pembuatan dokumen jurnal manual di General Ledger.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Hierarki Pencarian</td><td class="border px-2 py-1">Desain pencarian matriks spesifik ke generik untuk menemukan akun yang tepat.</td><td class="border px-2 py-1">Rekonsiliasi akhir bulan atas selisih stok.</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Account Determination</td><td class="border px-2 py-1">Sebuah mesin keputusan (Decision Engine) yang mempertemukan aktivitas material (Logistik) dengan pembukuan (Finance).</td><td class="border px-2 py-1">Menggunakan metode *Matrix Matching* untuk mencari GL Account definitif.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Transaction Key</td><td class="border px-2 py-1">Kunci dasar aktivitas mutasi. Misal `BSX` untuk mutasi persediaan murni, `WRX` untuk GR/IR Clearing (Hutang Belum Difaktur).</td><td class="border px-2 py-1">Kunci ini dikirim otomatis oleh modul mutasi persediaan saat *posting*.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Account Modifier</td><td class="border px-2 py-1">Sub-kategori kunci transaksi. Berguna untuk membedakan peruntukan jurnal yang lebih detail.</td><td class="border px-2 py-1">Dikirim oleh fungsi modul lain, seperti saat `Adjustment` (Misal: Reason Code = Expired).</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Pemisahan Kewenangan (Segregation of Duties)</td><td class="border px-2 py-1">Orang gudang mutlak tidak boleh memilih GL Account. Mereka hanya berinteraksi dengan barang, sistemlah yang mencarikan GL Account berdasarkan konfigurasi ini. Konfigurasi ini hanya dapat diubah oleh tim Finance (FI/CO).</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">account_determinations</td><td class="border px-2 py-1">Tabel Pusat Resolusi Jurnal (Master)</td><td class="border px-2 py-1">Menyimpan kombinasi kriteria (Valuation Class, Item Category, Tax Code) yang bermuara pada satu GL Account (COA).</td></tr>
<tr><td class="border px-2 py-1 font-bold">coas (Chart of Accounts)</td><td class="border px-2 py-1">Many-to-One (N:1) dengan account_determinations</td><td class="border px-2 py-1">Setiap matriks harus bermuara pada satu GL Account final (Debet / Kredit tergantung arah).</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Pengaturan Matriks Auto-Posting</td><td class="border px-2 py-1">User (Finance) membuka layar *Account Determination*. Memilih `Transaction Key` (Misal: BSX). Kemudian, menambahkan baris kombinasi: Jika `Valuation Class` = 3000 (Finished Goods), maka arahkan ke GL = 130001 (Persediaan Barang Jadi).</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Finance Admin / Controller</td><td class="border px-2 py-1">Create, Read, Update, Delete</td><td class="border px-2 py-1">Hanya pengguna dari divisi finansial yang dapat menyetel parameter auto-posting. Logistik diblokir dari layar ini.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Missing Configuration</td><td class="border px-2 py-1">Jika sebuah transaksi mutasi tidak menemukan kombinasi di tabel ini, maka posting akan diblokir dengan *error*: "Account Determination not found for Transaction Key [Key]".</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-AD-01</td><td class="border px-2 py-1">Hierarki Pencarian Mundur</td><td class="border px-2 py-1">Sistem mencari pencocokan paling lengkap/spesifik terlebih dahulu. Jika gagal, ia akan mundur (*fallback*) mencari kombinasi generik (dengan *null* di beberapa kolom kriteria).</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-AD-02</td><td class="border px-2 py-1">Unik Kombinasi</td><td class="border px-2 py-1">Tidak boleh ada dua baris konfigurasi yang memiliki persis kombinasi parameter pencarian yang sama, karena akan menyebabkan kebingungan *engine* dalam menentukan GL.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Kriteria Nullable</td><td class="border px-2 py-1">Setiap kriteria (seperti `item_category_id` atau `tax_code_id`) bernilai `NULL` (Kosong) secara default, yang berarti "Berlaku untuk Semua" (Wildcard).</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Duplikasi Matriks</td><td class="border px-2 py-1">Validasi mutlak (Unique Index Form) terhadap kombinasi `transaction_key` + `account_modifier` + kriteria lainnya untuk satu entitas `company_id`.</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Very High (Finansial)</td><td class="border px-2 py-1">Perubahan GL pada matriks berdampak langsung pada laporan keuangan masa depan. Atribut `updated_by` dan `updated_at` mutlak tercatat, serta riwayat (Activity Log).</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-01</td><td class="border px-2 py-1">API Resolver sukses me-return ID COA yang tepat berdasarkan parameter payload dari modul Logistik, dengan menerapkan logika "*fallback*" (Pencarian dari Spesifik -> Generik).</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-02</td><td class="border px-2 py-1">Sistem mengeluarkan Form Error Validation saat User Finance secara tidak sengaja menginput kombinasi `Transaction Key` dan parameter kriteria yang sama persis dengan baris lain.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Chart of Accounts (Master COA)</td><td class="border px-2 py-1">Semua *output* dari modul ini adalah COA, sehingga tabel ini tidak dapat berfungsi tanpa master COA.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Valuation Classes (BRD-024)</td><td class="border px-2 py-1">Sebagai salah satu filter kriteria utama dari barang.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-24 09:59:14',
            ),
            12 => 
            array (
                'id' => 14,
                'brd_code' => 'BRD-070',
                'title' => 'AR Invoice',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-13</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - AR Invoice (Faktur Penjualan)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Sales &amp; Distribution / Accounts Receivable</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur ketentuan bisnis pembuatan faktur tagihan penjualan kepada pelanggan (AR Invoice / Faktur Penjualan) berdasarkan realisasi pengiriman barang fisik (Goods Issue / Delivery Order) atau secara manual untuk penagihan jasa, termasuk aturan salin harga kontrak (Pricing Copy Control).</p>
    <ul>
        <li><strong>In Scope:</strong> Pembuatan AR Invoice otomatis rujukan Delivery Order (DO), penarikan harga dari Sales Order (Pricing Copy Control), kalkulasi PPN Keluaran, pembukuan piutang dagang, dan pelacakan 3 tanggal wajib (document_date, posting_date, entry_date).</li>
        <li><strong>Out of Scope:</strong> Pencatatan penerimaan pembayaran tunai/bank dari pelanggan (diatur secara terpisah pada BRD-51).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Billing Verification & Pricing Integrity** — menjamin penagihan pelanggan dilakukan secara presisi sesuai dengan kuantitas barang yang dikeluarkan (GI) serta harga kesepakatan order (SO), serta pengakuan pendapatan dan kewajiban pajak PPN Keluaran secara tepat waktu.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>customer_invoices</code></strong> — Header tagihan pelanggan mencatat nomor faktur, tanggal jatuh tempo, mata uang, nilai kurs, total gross, tax, net, dan status piutang.</li>
        <li><strong>Tabel: <code>customer_invoice_lines</code></strong> — Rincian item barang/jasa yang ditagih, kuantitas tagihan, harga satuan, diskon, kode pajak masukan/keluaran, dan nominal pajak masukan/keluaran.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Pricing Copy Control:</strong> Harga dan diskon pada baris detail wajib ditarik otomatis dari baris detail Sales Order (SO) asal guna mencegah manipulasi harga penagihan.</li>
        <li><strong>Pemicu Jurnal Akuntansi:</strong> Posting AR Invoice otomatis mendebet Piutang Dagang (AR) vs mengkredit Pendapatan Penjualan (Sales Revenue) + PPN Keluaran.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Kuantitas tagihan AR Invoice dilarang melebihi sisa kuantitas pengiriman barang fisik (Delivery Order).</li>
        <li>Pemberian hak otorisasi cetak ulang faktur pajak/invoice komersial untuk mencegah duplikasi nomor tagihan.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Kalkulasi otomatis PPN Keluaran (misal PPN 11%) dan pembentukan nomor seri Faktur Pajak Keluaran standar pemerintah.</p>

    <h2>8. Status & Blocking</h2>
    <p>AR Invoice berstatus <code>POSTED</code> langsung terkunci permanen. Koreksi nilai tagihan hanya diperbolehkan melalui mekanisme Debit/Credit Memo Penjualan.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Pricing Integrity):</strong> Harga satuan penagihan AR Invoice wajib identik dengan harga kontrak SO rujukan. Perubahan harga manual di tingkat invoice dilarang kecuali ada memo otorisasi direktur penjualan.</li>
        <li><strong>BR-02 (DO Limit):</strong> Kuantitas invoice tidak boleh melampaui sisa kuantitas DO open.</li>
        <li><strong>BR-03 (Chronological Check):</strong> Tanggal posting tagihan tidak boleh lebih kecil dari tanggal posting pengeluaran barang (PGI) rujukan.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Jurnal piutang dagang terposting otomatis ke Buku Besar sesaat setelah status diubah menjadi <code>POSTED</code>.</li>
        <li>AC-02: Kuantitas open DO terupdate secara instan setelah AR Invoice sukses tersimpan.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul Delivery Order &amp; Goods Issue (BRD-46 / FSD-13).</li>
        <li>Modul Master Pelanggan &amp; COA (BRD-05 / BRD-08).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 11:14:15',
            ),
            13 => 
            array (
                'id' => 15,
                'brd_code' => 'BRD-061',
            'title' => 'Customer Return (Retur Penjualan)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-14</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Customer Return (Retur Penjualan)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Sales & Distribution / WMS Inbound</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Modul Customer Return memproses penerimaan kembali barang dagangan dari pelanggan (Inbound Return / GIR), validasi kuantitas retur terhadap dokumen Billing Penjualan asal (jika ada), serta penerbitan Nota Retur (Credit Note).</p>
    <ul>
        <li><strong>In Scope:</strong> Registrasi permintaan retur bertipe dengan referensi Billing Penjualan (With Ref) maupun tanpa referensi (Without Ref), pemrosesan Gate In Return di WMS, alur persetujuan logistik, dan credit note.</li>
        <li><strong>Out of Scope:</strong> Skenario retur untuk barang yang bukan merupakan objek penjualan resmi perusahaan.</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Tipe pengembalian barang diatur sebagai berikut:</p>
    <ul>
        <li><strong>With Reference (Dengan Referensi Billing Penjualan):</strong> Referensi mutlak diambil dari dokumen AR Invoice (Billing Penjualan) aktif.
            <ul>
                <li><strong>Full Return:</strong> Mengembalikan seluruh kuantitas barang yang tertera pada faktur penagihan (billing).</li>
                <li><strong>Partial Return:</strong> Mengembalikan sebagian kuantitas barang yang tertera pada billing.</li>
            </ul>
        </li>
        <li><strong>Without Reference (Tanpa Referensi):</strong> Pengembalian barang tanpa mengikat dokumen billing penjualan tertentu.</li>
    </ul>

    <h2>4. Data Structure & Organization</h2>
    <p>Skema penyimpanan dokumen retur penjualan:</p>
    <ul>
        <li>Tabel utama retur: <code>customer_returns</code> (menyimpan kolom <code>reference_type</code>: WITH_REF / WITHOUT_REF dan <code>ar_invoice_id</code>) dan <code>customer_return_lines</code>.</li>
        <li>Tabel keuangan: <code>credit_notes</code> dan <code>credit_note_lines</code>.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li>Form penarikan Billing Penjualan (AR Invoice) untuk tipe With Reference guna membatasi pengisian kuantitas item.</li>
        <li>Validasi bebas input SKU aktif untuk tipe Without Reference disertai keharusan pengisian alasan justifikasi.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <p>Pembatasan kuantitas retur agar tidak melebihi kuantitas billing penjualan asli (untuk tipe With Ref), filter SKU master terblokir retur, dan otorisasi persetujuan.</p>

    <h2>7. Tax & Compliance</h2>
    <p>Penerbitan Nota Pembatalan Faktur Pajak otomatis demi kepatuhan regulasi PPN lokal.</p>

    <h2>8. Status & Blocking</h2>
    <ul>
        <li>Status retur: DRAFT, PENDING_APPROVAL, IN_TRANSIT, RECEIVED, APPROVED, BILLED, REJECTED.</li>
        <li>Item terblokir retur jika flag <code>block_customer_return = true</code>.</li>
    </ul>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01:</strong> Retur bertipe With Reference wajib merujuk secara valid ke dokumen Billing Penjualan (AR Invoice) berstatus Posted.</li>
        <li><strong>BR-02:</strong> Untuk tipe With Reference, total kuantitas retur (baik Partial maupun Full) dilarang melebihi kuantitas barang pada Billing Penjualan asal dikurangi retur historis.</li>
        <li><strong>BR-03:</strong> Retur bertipe Without Reference wajib melalui approval berjenjang BLC dan RLM serta menyertakan justifikasi tertulis sebelum fisik barang dapat diterima.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li><strong>AC-01:</strong> Sistem menolak penyimpanan draf With Reference jika kuantitas baris melebihi batas kuantitas kirim pada Billing Penjualan rujukan.</li>
        <li><strong>AC-02:</strong> Perekaman retur Without Reference mewajibkan pengisian harga satuan secara manual berdasarkan acuan daftar harga resmi terbaru.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>BRD-02 (Data Barang & Satuan)</li>
        <li>BRD-11 (Sales Order)</li>
        <li>BRD-13 (AR Invoice / Billing Penjualan)</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 02:27:42',
            ),
            14 => 
            array (
                'id' => 16,
                'brd_code' => 'BRD-050',
            'title' => 'Purchase Order (PO)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-050</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Purchase Order (PO)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Materials Management (MM) - Purchasing</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Penerbitan Surat Pesanan</td><td class="border px-2 py-1">Pembuatan dokumen komitmen hukum eksternal ke Vendor. Mencakup Kalkulasi Harga Berlapis (Pricing Conditions), Jadwal Pengiriman Bertahap (Schedules), dan Riwayat Dokumen (PO History).</td><td class="border px-2 py-1">Penerimaan Barang Fisik (Goods Receipt), yang dikelola oleh Manajemen Inventori (BRD terpisah).</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Pricing Procedure (Kondisi Harga)</td><td class="border px-2 py-1">Harga akhir (Gross) tidak sekadar Qty x Price, melainkan dipengaruhi Diskon, Biaya Angkut (Freight), Asuransi, dsb. Kondisi ini bisa dibayarkan ke Vendor Berbeda (Forwarder).</td><td class="border px-2 py-1">Total Amount PO dihitung secara dinamis dari akumulasi Subtotal skema Pricing Procedure.</td></tr>
        <tr><td class="border px-2 py-1">Delivery Schedules</td><td class="border px-2 py-1">Satu baris PO sejumlah 1.000 ton bisa dikirim bertahap: 500 ton di tanggal 10, 500 ton di tanggal 20.</td><td class="border px-2 py-1">Total kuantitas di seluruh jadwal pengiriman wajib sama dengan kuantitas pada Line Item.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tax Auditability</td><td class="border px-2 py-1">Besaran pajak keluaran (VAT) wajib divalidasi dengan `tax_code_id` aktif di Master Data Pajak sebelum PO dicetak.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">purchase_order_conditions</td><td class="border px-2 py-1">One-to-Many (1:N) dari Header</td><td class="border px-2 py-1">Struktur pembentuk harga (Diskon, Freight) per dokumen.</td></tr>
        <tr><td class="border px-2 py-1">purchase_order_histories</td><td class="border px-2 py-1">One-to-Many (1:N) dari Lines</td><td class="border px-2 py-1">Rekam jejak transaksi turunan (Goods Receipt, Invoice Receipt) untuk memantau status serapan baris PO (Open / Closed).</td></tr>
        <tr><td class="border px-2 py-1">purchase_order_schedules</td><td class="border px-2 py-1">One-to-Many (1:N) dari Lines</td><td class="border px-2 py-1">Pecahan tanggal pengiriman bertahap (Partial Deliveries).</td></tr>
        <tr><td class="border px-2 py-1">purchase_order_approvals</td><td class="border px-2 py-1">One-to-Many (1:N) dari Header</td><td class="border px-2 py-1">Riwayat persetujuan berjenjang (Approval Matrix) sebelum PO bisa di-print.</td></tr>
        <tr><td class="border px-2 py-1">purchase_order_account_assignments</td><td class="border px-2 py-1">Many-to-One (N:1) ke Lines</td><td class="border px-2 py-1">Tabel distribusi pembebanan anggaran multi Cost-Center atau relasi langsung ke Fixed Asset Master.</td></tr>
        <tr><td class="border px-2 py-1">purchase_order_texts</td><td class="border px-2 py-1">One-to-Many (1:N) dari Header &amp; Lines</td><td class="border px-2 py-1">Menyimpan instruksi cetak, *Term &amp; Conditions*, atau catatan khusus per PO.</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tolerance Check</td><td class="border px-2 py-1">PO merekam `overdelivery_tolerance` dan `underdelivery_tolerance`. Sistem *Goods Receipt* (GR) akan memblokir penerimaan fisik jika selisihnya melampaui batas toleransi ini.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Purchasing Manager & Director</td><td class="border px-2 py-1">Approve PO</td><td class="border px-2 py-1">Matriks Persetujuan (*Approval Matrix*) bergantung pada: Kategori Material, Total Nilai, dan Pusat Biaya.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">APPROVED</td><td class="border px-2 py-1">Hanya PO berstatus APPROVED yang PDF-nya bisa digenerate dan dikirim via Email ke Vendor.</td></tr>
        <tr><td class="border px-2 py-1">PARTIAL_RECEIVED</td><td class="border px-2 py-1">Vendor baru mengirim sebagian barang (tercatat di tabel `purchase_order_histories`).</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-50-01</td><td class="border px-2 py-1">Budget Encumbrance (Actual)</td><td class="border px-2 py-1">Saat PO disetujui, alokasi anggaran (Commitment) yang ditahan oleh PR sebelumnya harus dilepas (Reversed), dan digantikan oleh komitmen aktual berdasarkan harga bersih PO.</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">is_free_of_charge</td><td class="border px-2 py-1">FALSE. Jika dicentang TRUE, maka `net_price` diwajibkan bernilai 0.</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Currency Consistency</td><td class="border px-2 py-1">Jika mata uang PO (Header) berbeda dengan mata uang Master Vendor, *Exchange Rate* wajib diisi (tidak boleh *null*).</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Sangat Tinggi</td><td class="border px-2 py-1">PO adalah dokumen pengikat hukum (Legal Binding). Perubahan (`UPDATE`) atas harga atau kuantitas setelah PO berstatus `APPROVED` akan memicu pembatalan persetujuan (Reset Approval Matrix), mengubah status kembali ke `IN_APPROVAL`.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Sistem berhasil membuat 1 PO dengan `Total Amount = 120.000`, dari Harga Dasar `100.000` (ditarik dari Info Record), ditambah Kondisi Biaya Angkut `20.000` yang dibayarkan ke Forwarder (Vendor ID yang berbeda di tabel Kondisi).</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Pricing Engine (Configuration)</td><td class="border px-2 py-1">Seluruh skema diskon dan pajak bergantung mutlak pada Master Data Pricing Procedures & Conditions.</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 03:22:59',
            ),
            15 => 
            array (
                'id' => 17,
                'brd_code' => 'BRD-051',
            'title' => 'Goods Receipt (GR)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-16</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Goods Receipt (GR)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Inventory Management / Purchasing</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur proses bisnis penerimaan fisik barang dari supplier/vendor berdasarkan dokumen Purchase Order (PO) yang sah, pencatatan mutasi stok gudang, serta pengakuan hutang akrual (GR/IR Clearing).</p>
    <ul>
        <li><strong>In Scope:</strong> Verifikasi kuantitas terima terhadap sisa kuantitas PO, pencatatan lokasi penyimpanan (Storage Location), update stok persediaan, pembuatan aset tetap otomatis untuk PO Asset, pencatatan log audit, dan integrasi penjurnalan otomatis.</li>
        <li><strong>Out of Scope:</strong> Pemeriksaan kualitas laboratorium mendalam (Quality Inspection) di luar verifikasi fisik visual dasar.</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Proses penerimaan barang merupakan jembatan antara alur pengadaan (Procurement) dan pergudangan (Inventory). Sistem harus menjamin bahwa kuantitas yang diterima tidak melebihi pesanan (over-receipt control), mencatat mutasi masuk persediaan ke kartu stok, dan memicu jurnal penyeimbang GR/IR Clearing.</p>

    <h2>4. Data Structure & Organization</h2>
    <p>Struktur data terbagi atas dua tabel transaksi utama:</p>
    <ul>
        <li><strong>Tabel: <code>goods_receipts</code></strong> — Menyimpan header transaksi penerimaan seperti vendor, tanggal terima, nomor PO rujukan, cabang pembuat, dan nomor dokumen unik.</li>
        <li><strong>Tabel: <code>goods_receipt_lines</code></strong> — Menyimpan detail baris barang yang diterima, jumlah kuantitas, UOM, nomor baris PO terkait, cabang penampung, dan lokasi penyimpanan (Storage Location).</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li>Penerimaan barang parsial atau penuh dengan mengacu pada Purchase Order (PO).</li>
        <li>Kontrol kuantitas ketat: <code>Kuantitas GR &le; Sisa Kuantitas PO</code> (Open Qty).</li>
        <li>Pemberian nomor urut dokumen penerimaan barang otomatis (auto-generate 10-digit).</li>
        <li>Pembuatan otomatis nomor induk aktiva tetap (Asset Master Record) dalam rentang <code>90000000 - 90999999</code> jika tipe PO adalah PO Asset (<code>PO_AST</code>).</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Isolasi transaksi dan hak akses berbasis <code>branch_id</code> (Setiap cabang hanya dapat melihat dan menerima GR miliknya sendiri).</li>
        <li>Pemisahan otorisasi peran antara pembuat Purchase Order dan petugas penerima barang (Goods Receipt Clerk).</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Pencatatan Surat Jalan Supplier wajib diinput sebagai bukti lampiran fisik demi kepatuhan audit dan perpajakan bea masuk.</p>

    <h2>8. Status & Blocking</h2>
    <p>Dokumen Goods Receipt yang telah diubah statusnya menjadi <code>POSTED</code> dikunci secara permanen. Tidak diperbolehkan melakukan edit atau hapus data fisik. Pembatalan wajib menggunakan mekanisme dokumen pembalik (Goods Receipt Reversal / Cancel).</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Strict Limit):</strong> Penerimaan barang tidak boleh melampaui sisa kuantitas terbuka PO terkait: <code>gr_lines.quantity &le; po_lines.open_qty</code>.</li>
        <li><strong>BR-02 (Soft Delete):</strong> Transaksi Goods Receipt tidak boleh dihapus secara fisik. Jika terjadi pembatalan, dibuat dokumen pembalik yang meniadakan jurnal asli secara akuntansi.</li>
        <li><strong>BR-03 (Asset Gen):</strong> Penerimaan barang untuk PO bertipe <code>PO_AST</code> wajib memicu pembuatan nomor aset tetap di sub-ledger aktiva tetap secara real-time.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Sistem memblokir proses simpan jika kuantitas input melebihi sisa PO open quantity.</li>
        <li>AC-02: Kartu stok barang terupdate bertambah seketika setelah dokumen berstatus <code>POSTED</code>.</li>
        <li>AC-03: Jurnal akuntansi terposting otomatis: Persediaan (Debit) vs GR/IR Clearing (Kredit) untuk PO Trade.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Dokumen Purchase Order (BRD-15 / FSD-20).</li>
        <li>Master Data Barang &amp; Satuan (BRD-02 / FSD-02).</li>
        <li>Modul Bagan Akun &amp; Aturan Posting (BRD-08 / BRD-10 / FSD-12).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 06:35:02',
            ),
            16 => 
            array (
                'id' => 18,
                'brd_code' => 'BRD-052',
            'title' => 'Supplier Return (Retur Pembelian)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-17</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Supplier Return (Retur Pembelian)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Inventory Management / Purchasing</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur proses bisnis pengembalian barang fisik kepada Supplier/Vendor akibat barang rusak (damaged), tidak sesuai spesifikasi, atau kendala pasokan lainnya. Seluruh retur pembelian wajib melewati siklus transaksi terstruktur: <strong>PO Return &rarr; GRR (Goods Return) &rarr; Debit Memo &rarr; Realisasi (Offset AP / Incoming Payment)</strong>.</p>
    <ul>
        <li><strong>In Scope:</strong> Pembuatan PO Return (dengan/tanpa referensi GR), pencatatan Goods Return (GRR) untuk pengeluaran fisik barang, penerbitan Debit Memo untuk penyesuaian keuangan, dan proses rekonsiliasi akhir (Offset AP Invoice / Penerimaan Kas).</li>
        <li><strong>Out of Scope:</strong> Penanganan klaim garansi jangka panjang setelah barang digunakan di area produksi.</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Proses retur pembelian tidak boleh dilakukan langsung secara manual bebas (direct posting). Sistem mewajibkan integritas data logistik dan finansial melalui siklus 4 tahap terintegrasi:</p>
    <ol>
        <li><strong>PO Return:</strong> Dokumen pesanan pembelian retur sebagai dasar kesepakatan nilai dan kuantitas dengan vendor.</li>
        <li><strong>GRR (Goods Return):</strong> Mutasi fisik pengeluaran persediaan dari gudang berdasarkan PO Return.</li>
        <li><strong>Debit Memo:</strong> Dokumen penagihan piutang retur / pengurang utang dagang.</li>
        <li><strong>Realisasi:</strong> Penyelesaian keuangan akhir (offset saldo AP Invoice atau penerimaan uang kas/bank).</li>
    </ol>

    <h2>4. Data Structure & Organization</h2>
    <p>Mengatur relasi data logistik antara PO Return (tabel <code>purchase_orders</code> dengan indikator return), Goods Return / GRR (tabel <code>goods_receipts</code> bertipe reversal), Debit Memo (tabel <code>supplier_invoices</code> bertipe credit/debit memo), dan tabel alokasi rekonsiliasi pembayaran.</p>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li>Siklus wajib: PO Return &rarr; GRR (Goods Return) &rarr; Debit Memo &rarr; Realisasi.</li>
        <li>Pada retur tanpa referensi GR: Kuantitas, item, harga, dan nomor batch diisi secara manual oleh petugas berdasarkan data kartu persediaan.</li>
        <li>Pemicu jurnal akuntansi otomatis saat posting GRR: Kredit Persediaan Barang (BSX) vs Debit GR/IR Clearing (WRX).</li>
        <li>Pemicu jurnal akuntansi otomatis saat posting Debit Memo: Kredit GR/IR Clearing (WRX) vs Debit AP Clearing.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <p>Isolasi regional transaksi per <code>branch_id</code> untuk mencegah kesalahan alokasi logistik antar cabang.</p>

    <h2>7. Tax & Compliance</h2>
    <p>Penerbitan Nota Retur formal untuk pembatalan faktur pajak masukan vendor guna memenuhi regulasi perpajakan yang berlaku.</p>

    <h2>8. Status & Blocking</h2>
    <p>Dokumen dalam alur retur yang telah berstatus <code>POSTED</code> tidak dapat diubah kembali datanya demi menjaga kepatuhan audit trail finansial.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Workflow Cycle):</strong> Transaksi retur harus berurutan melewati siklus PO Return &rarr; GRR &rarr; Debit Memo &rarr; Realisasi.</li>
        <li><strong>BR-02 (Stock Validation):</strong> GRR hanya dapat diposting jika kuantitas barang fisik tersedia di lokasi penyimpanan terkait.</li>
        <li><strong>BR-03 (Offset Lock):</strong> Realisasi offset hanya diizinkan dengan AP Invoice dari vendor yang sama yang masih aktif/terbuka.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Kartu stok barang terpotong secara real-time saat status GRR berubah menjadi POSTED.</li>
        <li>AC-02: Sistem otomatis menjurnal Kredit Persediaan (BSX) vs Debit GR/IR Clearing (WRX) pada saat GRR diposting.</li>
        <li>AC-03: Debit Memo berhasil terbuat otomatis dengan merujuk pada nomor GRR terkait.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul Pembelian &amp; PO (BRD-15 / FSD-20).</li>
        <li>Modul Penerimaan Barang &amp; Gudang (BRD-16 / FSD-22).</li>
        <li>Modul Bagan Akun &amp; Aturan Posting (BRD-08 / FSD-12).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 07:13:43',
            ),
            17 => 
            array (
                'id' => 19,
                'brd_code' => 'BRD-055',
            'title' => 'Stock Adjustment (Opname)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-18</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Stock Adjustment (Opname)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Inventory Management / Stock Control</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur proses bisnis penyesuaian jumlah stok persediaan barang fisik di gudang melalui aktivitas stock opname (stock take/physical count), penghitungan selisih selisih (variance), dan pencatatan posting akuntansi penyesuaian nilai persediaan.</p>
    <ul>
        <li><strong>In Scope:</strong> Pembuatan dokumen Stock Opname Sheet, pencatatan hasil hitung fisik (physical count), penghitungan otomatis selisih unit dan nilai (HPP), pembekuan stok sementara (stock freeze), otorisasi approval limit untuk deviasi nilai, dan integrasi posting finansial.</li>
        <li><strong>Out of Scope:</strong> Penyesuaian persediaan akibat transaksi logistik rutin (seperti barang rusak dalam perjalanan retur).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Sistem stock opname wajib menjamin integritas data saldo buku persediaan dengan kondisi fisik riil. Ketika transaksi diposting, sistem menghitung selisih unit (<code>Selisih = Fisik - Buku</code>) dan memperbarui kartu stok persediaan menggunakan HPP barang (Moving Average Cost) secara real-time.</p>

    <h2>4. Data Structure & Organization</h2>
    <p>Struktur data transaksi terbagi atas:</p>
    <ul>
        <li><strong>Tabel: <code>stock_adjustments</code></strong> — Header transaksi penyesuaian stok berisi nomor dokumen, tanggal opname, nama gudang/cabang, status dokumen, dan total deviasi finansial.</li>
        <li><strong>Tabel: <code>stock_adjustment_lines</code></strong> — Detail baris opname berisi referensi barang, UOM, kuantitas sistem (buku), kuantitas fisik riil, nilai unit cost, selisih, nomor batch, expired date, dan lokasi penyimpanan (Storage Location).</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li>Pembekuan stok sementara (Stock Freezing) selama proses stock take berlangsung guna menghindari deviasi transaksi gantung.</li>
        <li>Penghitungan otomatis selisih kuantitas dan nilai penyesuaian menggunakan Moving Average Cost persediaan.</li>
        <li>Posting Jurnal Otomatis:
            <ul>
                <li><strong>Selisih Positif (Fisik &gt; Buku):</strong> Debit Persediaan Barang (BSX) vs Kredit Selisih Opname (Gain/Loss Account).</li>
                <li><strong>Selisih Negatif (Fisik &lt; Buku):</strong> Kredit Persediaan Barang (BSX) vs Debit Selisih Opname (Gain/Loss Account).</li>
            </ul>
        </li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Isolasi data berbasis <code>branch_id</code> (Setiap cabang/gudang hanya berhak melakukan opname stok areanya sendiri).</li>
        <li>Pola persetujuan bertingkat (Approval Matrix) berdasarkan limit nominal deviasi finansial sebelum dokumen penyesuaian dapat diposting.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Penyediaan laporan mutasi penyesuaian stok yang teratur untuk pemenuhan kewajiban pelaporan audit persediaan eksternal.</p>

    <h2>8. Status & Blocking</h2>
    <p>Dokumen Stock Adjustment yang telah berstatus <code>POSTED</code> terkunci secara permanen dan tidak dapat diedit atau dihapus fisik untuk menjamin kepatuhan audit finansial.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Strict Isolation):</strong> Stock opname wajib menggunakan data stok buku pada detik inisiasi pembekuan stok (freeze stock).</li>
        <li><strong>BR-02 (Variance Approval):</strong> Selisih opname dengan nilai nominal di atas limit tertentu wajib memerlukan approval bertingkat dari Supervisor/Manajer sebelum posting.</li>
        <li><strong>BR-03 (Lot/Batch Tracking):</strong> Barang bertipe batch-tracked wajib mencantumkan batch number dan expired date pada detail baris input fisik opname.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Kartu stok barang terupdate bertambah/berkurang seketika setelah dokumen berstatus <code>POSTED</code>.</li>
        <li>AC-02: Jurnal akuntansi penyesuaian terposting otomatis di Buku Besar sesuai aturan OBYC/Posting Matrix.</li>
        <li>AC-03: Dokumen menuntut approval bertingkat jika nilai deviasi finansial melebihi batas kewenangan user.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Master Data Barang &amp; Satuan (BRD-02 / FSD-02).</li>
        <li>Modul Bagan Akun &amp; Aturan Posting (BRD-08 / FSD-12).</li>
        <li>Modul Otorisasi Approval Limit (BRD-01 / FSD-01).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 07:17:45',
            ),
            18 => 
            array (
                'id' => 20,
                'brd_code' => 'BRD-053',
            'title' => 'Stock Transfer (Mutasi Antar Gudang)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-19</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Stock Transfer (Mutasi Antar Gudang)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Inventory Management / Stock Movement</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur ketentuan bisnis pemindahan persediaan barang fisik (Stock Transfer) baik intra-cabang (antar lokasi penyimpanan dalam satu cabang) maupun inter-cabang (antar cabang/gudang yang berbeda) dalam badan hukum perusahaan yang sama.</p>
    <ul>
        <li><strong>In Scope:</strong> Transfer Intra-Cabang (satu tahap langsung), Transfer Inter-Cabang (dua tahap: Goods Issue dan Goods Receipt dengan penampung Stock in Transit / SIT), pelacakan nomor batch/expired date, dan integrasi akuntansi jurnal persediaan dalam perjalanan.</li>
        <li><strong>Out of Scope:</strong> Transfer persediaan antar badan hukum perusahaan yang berbeda (diatur melalui skema penjualan-pembelian antar perusahaan / Intercompany Sales).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Karena arsitektur korporasi menetapkan <strong>Branch = Warehouse</strong>, mutasi antar gudang terbagi atas:</p>
    <ul>
        <li><strong>Intra-Branch (Intra-Cabang):</strong> Perpindahan fisik antar <code>storage_location_id</code> pada cabang yang sama. Berjalan 1 tahap tanpa jurnal keuangan.</li>
        <li><strong>Inter-Branch (Inter-Cabang):</strong> Perpindahan dari <code>from_branch_id</code> ke <code>to_branch_id</code>. Berjalan 2 tahap menggunakan status <code>Stock in Transit (SIT)</code> untuk mencegah hilangnya saldo stok selama perjalanan armada.</li>
    </ul>

    <h2>4. Data Structure & Organization</h2>
    <p>Struktur data mutasi terbagi atas:</p>
    <ul>
        <li><strong>Tabel: <code>stock_transfers</code></strong> — Header transaksi mencatat tipe mutasi (intra/inter), cabang asal, cabang tujuan, tanggal mutasi, dan status dokumen.</li>
        <li><strong>Tabel: <code>stock_transfer_lines</code></strong> — Detail baris mutasi mencatat barang, kuantitas mutasi, lokasi penyimpanan asal, lokasi penyimpanan tujuan, nomor batch produksi, tanggal expired, dan kuantitas sisa perjalanan (transit quantity).</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Alur Dua Tahap (Two-Step Transfer) Inter-Cabang:</strong>
            <ol>
                <li><strong>Tahap 1: Goods Issue (PGI)</strong> &rarr; Stok cabang asal berkurang, masuk ke penampung Stock in Transit (SIT). Jurnal: Debit Stock in Transit vs Kredit Persediaan Barang (BSX).</li>
                <li><strong>Tahap 2: Goods Receipt (PGR)</strong> &rarr; Saldo Stock in Transit berkurang, stok fisik cabang tujuan bertambah. Jurnal: Debit Persediaan Barang (BSX) vs Kredit Stock in Transit.</li>
            </ol>
        </li>
        <li><strong>Alur Satu Tahap (Single-Step) Intra-Cabang:</strong> Stok langsung berpindah lokasi penyimpanan tanpa memicu jurnal akuntansi.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Validasi kecocokan nomor batch produksi selama pemindahan barang bertipe lot-tracked.</li>
        <li>Isolasi hak akses posting transit receipt di cabang tujuan untuk menghindari manipulasi penerimaan barang oleh cabang pengirim.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Pencetakan Surat Jalan Mutasi resmi sebagai dokumen legalitas pengangkutan logistik armada di jalan raya guna mematuhi peraturan kepatuhan dinas perhubungan.</p>

    <h2>8. Status & Blocking</h2>
    <p>Dokumen mutasi yang telah berstatus akhir <code>RECEIVED</code> terkunci secara permanen. Tidak diperbolehkan melakukan penghapusan data transaksi.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Strict Isolation):</strong> Pengirim inter-cabang dilarang memposting tanda terima (PGR) di cabang penerima. Penerimaan wajib dilakukan oleh otorisasi cabang tujuan.</li>
        <li><strong>BR-02 (Batch Consistency):</strong> Nomor batch barang yang dikirim dari cabang asal wajib identik dengan nomor batch yang diterima di cabang tujuan.</li>
        <li><strong>BR-03 (Transit Limit):</strong> PGR inter-cabang tidak boleh melebihi kuantitas yang dikeluarkan saat PGI.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Kartu stok cabang asal berkurang seketika setelah Goods Issue (PGI) diposting.</li>
        <li>AC-02: Sistem otomatis menjurnal pemindahan persediaan ke akun penampung Stock in Transit (SIT) saat PGI dilakukan.</li>
        <li>AC-03: Kartu stok cabang tujuan bertambah setelah Goods Receipt (PGR) sukses diposting oleh petugas cabang tujuan.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Master Data Barang &amp; Satuan (BRD-02 / FSD-02).</li>
        <li>Master Cabang &amp; Lokasi Penyimpanan (BRD-49 / FSD-19 / FSD-12).</li>
        <li>Modul Bagan Akun &amp; Aturan Posting (BRD-08 / FSD-12).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 07:25:16',
            ),
            19 => 
            array (
                'id' => 21,
                'brd_code' => 'BRD-065',
                'title' => 'AP Invoice',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-20</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - AP Invoice (Faktur Pembelian)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Materials Management / Accounts Payable</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur kebijakan bisnis pencatatan tagihan masuk dari supplier/vendor (AP Invoice / Faktur Pembelian) atas realisasi penerimaan barang (Goods Receipt) maupun jasa, termasuk pemotongan pajak WHT (PPH Pasal 23/21) tingkat header dan PPN Keluaran/Masukan tingkat baris detail.</p>
    <ul>
        <li><strong>In Scope:</strong> Verifikasi pencocokan tagihan (3-way matching: PO Qty/Price vs GR Qty vs Invoice Qty), pencatatan PPN Masukan per detail item, pencatatan WHT tingkat header, dan pelacakan 3 tanggal wajib (document_date, posting_date, entry_date).</li>
        <li><strong>Out of Scope:</strong> Proses pembayaran uang ke supplier (diatur secara terpisah pada BRD-54).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Liability Recognition & Invoice Matching** — mengakui kewajiban hutang dagang kepada supplier secara sah, memvalidasi kesesuaian harga dan kuantitas barang yang diterima, serta memotong kewajiban pajak WHT (Withholding Tax).</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>supplier_invoices</code></strong> — Header tagihan mencatat nomor faktur, tanggal jatuh tempo, mata uang, nilai kurs, term of payment, total gross, tax, WHT, net, dan status hutang.</li>
        <li><strong>Tabel: <code>supplier_invoice_lines</code></strong> — Rincian item barang/jasa yang ditagih, kuantitas tagihan, harga satuan, dan kode PPN masukan.</li>
        <li><strong>Tabel: <code>supplier_invoice_gl_lines</code></strong> — Rincian penyesuaian biaya Buku Besar non-item langsung.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>3-Way Matching:</strong> Kuantitas penagihan AP Invoice dilarang melebihi kuantitas Goods Receipt (GR).</li>
        <li><strong>Jurnal Akuntansi:</strong> Debit Persediaan/Biaya (atau GR/IR Clearing) vs Kredit Hutang Dagang (AP) + WHT Payable.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Validasi kurs asing: Penggunaan kurs harian BI yang dapat di-override secara manual.</li>
        <li>Verifikasi status pemblokiran pembayaran otomatis jika terdapat selisih (variance) nominal harga.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Kepatuhan pemotongan PPh Pasal 23 (WHT) di header dan verifikasi Faktur Pajak Masukan standar PPN.</p>

    <h2>8. Status & Blocking</h2>
    <p>AP Invoice berstatus <code>POSTED</code> langsung membeku. Koreksi nilai hutang hanya diperbolehkan melalui AP Credit/Debit Memo.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (GR Matching Limit):</strong> Kuantitas invoice tidak boleh melampaui sisa kuantitas GR open.</li>
        <li><strong>BR-02 (WHT Deduction):</strong> Nilai pemotongan WHT wajib mengurangi nominal hutang dagang bersih yang harus dibayar ke supplier.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Jurnal hutang terposting otomatis ke Buku Besar sesaat setelah status diubah menjadi <code>POSTED</code>.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul Purchase Order &amp; Goods Receipt (BRD-15 / BRD-16).</li>
        <li>Modul Bagan Akun &amp; Master Vendor (BRD-08 / BRD-06).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 12:10:45',
            ),
            20 => 
            array (
                'id' => 22,
                'brd_code' => 'BRD-072',
                'title' => 'Petty Cash',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-21</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Petty Cash (Kas Kecil)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Cash &amp; Bank / Finance</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur proses bisnis pencatatan pengeluaran dana kas kecil (Petty Cash Disbursement) untuk operasional bernominal kecil, serta pengisian kembali dana kas kecil (Petty Cash Replenishment) dengan mengadopsi metode Imprest System (Dana Tetap) atau Fluctuating System (Dana Berubah).</p>
    <ul>
        <li><strong>In Scope:</strong> Pencatatan voucher pengeluaran kas kecil, pembebanan langsung ke akun beban Buku Besar (G/L), pengisian saldo (replenishment) dari kas/bank besar, alokasi pusat biaya (Cost Center), penanganan PPN Masukan tambahan, pencatatan log audit trail, dan pelaporan saldo harian kas kecil.</li>
        <li><strong>Out of Scope:</strong> Pencatatan pengeluaran kas bernominal besar yang wajib melalui modul AP Invoice (Faktur Supplier) dan sistem kliring cek bank.</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi inti modul adalah <strong>Daily Cash Disbursement &amp; Reconciliation</strong> — memfasilitasi transaksi harian tunai di level kantor cabang, menetapkan batas saldo maksimal kas kecil per cabang, serta menjamin mutasi saldo kas kecil sinkron secara real-time terhadap sub-ledger persediaan kas kasir.</p>

    <h2>4. Data Structure & Organization</h2>
    <p>Struktur data transaksi terbagi atas:</p>
    <ul>
        <li><strong>Tabel: <code>petty_cash_transactions</code></strong> — Header voucher transaksi mencatat tipe transaksi (disbursement/replenishment), tanggal, total nominal, dan akun kas kecil penampung.</li>
        <li><strong>Tabel: <code>petty_cash_transaction_lines</code></strong> — Detail baris pembebanan mencatat akun Buku Besar tujuan (beban operasional/administrasi), alokasi cabang, Cost Center, kode pajak, dan keterangan detail.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Voucher Pengeluaran (Disbursement):</strong> Pembebanan biaya tunai langsung. Jurnal: Debit Akun Beban (G/L Expense) vs Kredit Kas Kecil (Petty Cash Asset).</li>
        <li><strong>Voucher Pengisian Kembali (Replenishment):</strong> Refill saldo kas kecil dari rekening bank utama. Jurnal: Debit Kas Kecil (Petty Cash Asset) vs Kredit Kas / Bank Utama.</li>
        <li>Integrasi validasi saldo: Sistem memblokir pengeluaran jika nilai transaksi melebihi sisa saldo kas kecil di gudang/cabang.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Pembatasan nilai maksimal transaksi per voucher pengeluaran (misal: maksimal Rp 2.000.000 per transaksi).</li>
        <li>Isolasi kas kecil per entitas regional cabang <code>branch_id</code>.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Pencatatan PPN Masukan opsional pada baris detail jika pengeluaran tunai disertai bukti faktur pajak sederhana/kwitansi resmi.</p>

    <h2>8. Status & Blocking</h2>
    <p>Voucher Petty Cash yang telah berstatus <code>POSTED</code> dikunci secara permanen untuk menjaga keselarasan buku kas cabang dengan Buku Besar.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Balance Ceiling):</strong> Total saldo kas kecil di cabang tidak boleh melebihi plafon batas maksimal yang telah dikonfigurasi di sistem untuk masing-masing cabang.</li>
        <li><strong>BR-02 (Zero Negative Balance):</strong> Saldo kas kecil dilarang bernilai negatif. Sistem otomatis menolak transaksi jika saldo tidak mencukupi.</li>
        <li><strong>BR-03 (Replenishment Audit):</strong> Proses pengisian kembali kas kecil wajib melampirkan seluruh bukti voucher pengeluaran fisik yang telah diposting.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Jurnal pengeluaran/pengisian kas terbentuk otomatis di Buku Besar seketika saat status voucher berubah menjadi <code>POSTED</code>.</li>
        <li>AC-02: Sistem memblokir pengeluaran tunai jika nilai input melampaui limit per voucher atau sisa saldo kas kecil cabang.</li>
        <li>AC-03: Riwayat mutasi tercatat lengkap pada Buku Kas Harian Cabang.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Master Bagan Akun (BRD-08 / FSD-08 COA).</li>
        <li>Master Pusat Biaya (BRD-48 / FSD-18 Cost Center).</li>
        <li>Modul Struktur Cabang (BRD-49 / FSD-19 / FSD-12).</li>
    </ul>
    <h2>12. Appendix: Daftar Akun G/L yang Diperbolehkan untuk Kas Kecil (Petty Cash G/L Allowed List)</h2>
<p>Berdasarkan kebijakan akuntansi perusahaan, pengeluaran kas kecil (Petty Cash Disbursement) hanya diperbolehkan didebit ke akun-akun operasional berikut:</p>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
    <thead>
        <tr class="bg-gray-100">
            <th class="border px-2 py-1 w-1/3">Kode Akun G/L</th>
            <th class="border px-2 py-1">Nama Akun / Deskripsi</th>
        </tr>
    </thead>
    <tbody>
            <tr>
                <td class="border px-2 py-1 font-mono">10999999</td>
                <td class="border px-2 py-1">BANK IN TRANSIT</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">16001100</td>
                <td class="border px-2 py-1">UM PERJALANAN DINAS</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70101230</td>
                <td class="border px-2 py-1">SPAREPART KEND & A.BERAT</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70103100</td>
                <td class="border px-2 py-1">AIR</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70104100</td>
                <td class="border px-2 py-1">ASURANSI - PIHAK KE-3</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70104200</td>
                <td class="border px-2 py-1">ASURANSI - AFILIASI</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70105210</td>
                <td class="border px-2 py-1">PAJAK KENDARAAN BERMOTOR</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">71100700</td>
                <td class="border px-2 py-1">DENDA PAJAK</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70105300</td>
                <td class="border px-2 py-1">PERIZINAN PEMERINTAH</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70106100</td>
                <td class="border px-2 py-1">TRANSPORTASI LOKAL</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70106200</td>
                <td class="border px-2 py-1">PERJALANAN DALAM NEGERI</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70106300</td>
                <td class="border px-2 py-1">PERJALANAN LUAR NEGERI</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70106400</td>
                <td class="border px-2 py-1">BAHAN BAKAR</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70107200</td>
                <td class="border px-2 py-1">JAMUAN / REPRESENTASI</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70107500</td>
                <td class="border px-2 py-1">SUMBANGAN SOSIAL</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70107600</td>
                <td class="border px-2 py-1">MAKANAN DAN MINUMAN</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70108100</td>
                <td class="border px-2 py-1">PERALATAN KANTOR</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70109100</td>
                <td class="border px-2 py-1">KOMUNIKASI - 3RD</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70110200</td>
                <td class="border px-2 py-1">PELATIHAN EXTERNAL-PIHAK3</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70110210</td>
                <td class="border px-2 py-1">PELATIHAN INTERNAL-KANTOR</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70110400</td>
                <td class="border px-2 py-1">LANGG. BUKU/JURNAL/KORAN</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70110500</td>
                <td class="border px-2 py-1">BIAYA KONFERENSI</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70111110</td>
                <td class="border px-2 py-1">JASA NOTARIS / HUKUM</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70111120</td>
                <td class="border px-2 py-1">JASA AUDIT</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70111130</td>
                <td class="border px-2 py-1">JASA KONSULTAN</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70119100</td>
                <td class="border px-2 py-1">ADMINISTRASI BANK</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70119300</td>
                <td class="border px-2 py-1">UMUM & ADMIN LAIN</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">49099999</td>
                <td class="border px-2 py-1">TAKE OVER BALANCE</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono"></td>
                <td class="border px-2 py-1">BAYAR UNTUK VENDOR</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70109200</td>
                <td class="border px-2 py-1">KOMUNIKASI - AFILIASI</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70103200</td>
                <td class="border px-2 py-1">LISTRIK</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70004119</td>
                <td class="border px-2 py-1">A&P PRAMUNIAGA</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70004120</td>
                <td class="border px-2 py-1">A&P DEMO/SPONSOR</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70004121</td>
                <td class="border px-2 py-1">A&P CETAK/POS</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70007100</td>
                <td class="border px-2 py-1">CONTOH PRODUK</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70119500</td>
                <td class="border px-2 py-1">TRANSPORT BARANG UMUM</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70119300</td>
                <td class="border px-2 py-1">PERANGKO / MATERAI</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70102500</td>
                <td class="border px-2 py-1">SERAGAM & PERLENGKAPAN</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70105140</td>
                <td class="border px-2 py-1">KIRIM DOKUMEN/SURAT</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono"></td>
                <td class="border px-2 py-1">BAYAR UNTUK CUSTOMER</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono"></td>
                <td class="border px-2 py-1">POT.PINJAMAN KARYAWAN</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70110201</td>
                <td class="border px-2 py-1">BIAYA KURSUS UMUM</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70101101</td>
                <td class="border px-2 py-1">PEMEL.BNGAN&PSARANA JASA</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70101102</td>
                <td class="border px-2 py-1">PEMEL.BNGAN&PSARANA MATRL</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70101201</td>
                <td class="border px-2 py-1">PEMEL.KEND&A.BERAT JASA</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70101202</td>
                <td class="border px-2 py-1">PEMEL.KEND&A.BERAT MATRL</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70101113</td>
                <td class="border px-2 py-1">PBAIKN&PRAWATN PRABT JASA</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70101114</td>
                <td class="border px-2 py-1">PBAIKN&PRAWATN PRABT MATR</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono"></td>
                <td class="border px-2 py-1">UANG MUKA DRIVER</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">13009996</td>
                <td class="border px-2 py-1">UANG MUKA BIAYA</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70107400</td>
                <td class="border px-2 py-1">REKREASI</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">13009998</td>
                <td class="border px-2 py-1">UANG MUKA INTRA-COMPANY</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70003600</td>
                <td class="border px-2 py-1">TRANSPORT PRD LOKAL 3RD</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70108110</td>
                <td class="border px-2 py-1">FOTOCOPY</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70102104</td>
                <td class="border px-2 py-1">PENGOBATAN-NON STAFF</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70102105</td>
                <td class="border px-2 py-1">TRANSPORT&MAKAN-NONSTAFF</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70102107</td>
                <td class="border px-2 py-1">LEMBUR-NON STAFF</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70102203</td>
                <td class="border px-2 py-1">PENGOBATAN-STAFF</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70102205</td>
                <td class="border px-2 py-1">TRANSPORT&MAKAN-STAFF</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70102400</td>
                <td class="border px-2 py-1">HONORER/SECURITY</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70105120</td>
                <td class="border px-2 py-1">SEWA PERALATAN-PIHAK KE-3</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70105140</td>
                <td class="border px-2 py-1">JASA KURIR/FORWARDER</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70105200</td>
                <td class="border px-2 py-1">PAJAK BUMI DAN BANGUNAN</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70109300</td>
                <td class="border px-2 py-1">TELEPON</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70110502</td>
                <td class="border px-2 py-1">KONFERENSI INTERNAL</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70111150</td>
                <td class="border px-2 py-1">JASA PERANTARA</td>
            </tr>
            <tr>
                <td class="border px-2 py-1 font-mono">70107300</td>
                <td class="border px-2 py-1">OLAHRAGA DAN PERMAINAN</td>
            </tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 09:00:23',
            ),
            21 => 
            array (
                'id' => 23,
                'brd_code' => 'BRD-073',
            'title' => 'General Ledger (Memorial Journal)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-22</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - General Ledger (Memorial Journal)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">General Ledger / Finance</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur ketentuan bisnis pencatatan entri jurnal manual (Memorial Journal / Journal Voucher) oleh staf akuntansi untuk keperluan jurnal penyesuaian (adjusting entries), jurnal akrual (accruals), jurnal penyusutan (depreciation), pembagian alokasi beban, serta koreksi entri akuntansi antar rekening Buku Besar (General Ledger).</p>
    <ul>
        <li><strong>In Scope:</strong> Entri debet/kredit manual Buku Besar, validasi keseimbangan saldo (double-entry balancing), alokasi multi-cabang (branch_id) dan Pusat Biaya (Cost Center) tingkat baris detail, pelacakan 3 tanggal wajib (document_date, posting_date, entry_date), dan pembatasan posting pada akun kontrol (reconciliation accounts).</li>
        <li><strong>Out of Scope:</strong> Jurnal otomatis dari transaksi modul logistik (seperti PGI, PGR, AP/AR Invoicing) yang dikelola oleh mesin posting otomatis (Auto Posting Engine).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi inti modul adalah <strong>Manual Double-Entry Ledger Posting</strong> — memastikan keabsahan entri jurnal penyesuaian keuangan, keharusan kesamaan nominal Debit dan Kredit secara absolut, serta kepatuhan periode akuntansi yang sedang terbuka.</p>

    <h2>4. Data Structure & Organization</h2>
    <p>Struktur data Memorial Journal terbagi atas:</p>
    <ul>
        <li><strong>Tabel: <code>journal_entries</code></strong> — Header transaksi mencatat nomor jurnal memorial, total nominal debet, 3 pelacakan tanggal wajib, catatan penjelasan umum, dan status posting dokumen.</li>
        <li><strong>Tabel: <code>journal_entry_lines</code></strong> — Detail baris jurnal mencatat akun Buku Besar terpilih (gl_account_id), jenis posting (DEBIT/CREDIT), nominal moneter, cabang alokasi, Cost Center pembebanan, dan keterangan penjelasan baris.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Keseimbangan Debit/Kredit:</strong> Jurnal hanya dapat diposting jika total nilai Debit tepat sama dengan total nilai Kredit.</li>
        <li><strong>Sistem Tiga Tanggal (3-Date System):</strong>
            <ul>
                <li><code>document_date</code>: Tanggal fisik bukti dokumen dibuat (dapat tanggal mundur).</li>
                <li><code>posting_date</code>: Tanggal pencatatan akuntansi ke Buku Besar (tidak boleh melebihi tanggal berjalan).</li>
                <li><code>entry_date</code>: Tanggal aktual penyimpanan sistem (terisi otomatis).</li>
            </ul>
        </li>
        <li>Pemblokiran akun kontrol/rekonsiliasi (seperti Piutang Dagang Utama, Hutang Dagang Utama) dari posting manual entry jurnal memorial.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Validasi periode akuntansi: Posting diblokir jika <code>posting_date</code> jatuh pada periode Buku Besar yang telah ditutup (Closed Period).</li>
        <li>Pemisahan otorisasi pembuat voucher (maker) dengan otorisasi pemosting jurnal (checker/approver).</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Penyediaan opsi manual pencatatan PPN Masukan/Keluaran non-standar atau penyesuaian pajak lainnya secara manual.</p>

    <h2>8. Status & Blocking</h2>
    <p>Dokumen Memorial Journal yang telah diubah statusnya menjadi <code>POSTED</code> langsung membeku. Tidak diperbolehkan melakukan ubah/hapus data fisik jurnal.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Zero Deviation Balance):</strong> Total Debit dikurangi Total Kredit wajib bernilai nol secara absolut sebelum posting diizinkan.</li>
        <li><strong>BR-02 (Reconciliation Block):</strong> Akun yang didefinisikan sebagai akun kontrol/rekonsiliasi di COA dilarang keras dimasukkan pada baris detail jurnal memorial manual.</li>
        <li><strong>BR-03 (Closed Period Block):</strong> Transaksi hanya dapat diposting pada periode akuntansi Buku Besar berstatus OPEN.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Jurnal memorial sukses memutasi saldo akun Buku Besar seketika setelah status berubah menjadi <code>POSTED</code>.</li>
        <li>AC-02: Sistem menampilkan pesan kesalahan dan menolak posting jika total nilai Debit dan Kredit menyimpang meskipun hanya selisih Rp 1.</li>
        <li>AC-03: Pencatatan jurnal memorial memorial manual pada akun kontrol diblokir secara mutlak oleh sistem.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Master Bagan Akun (BRD-08 / FSD-08 COA).</li>
        <li>Master Periode Akuntansi (BRD-09 / FSD-09).</li>
        <li>Master Cabang &amp; Pusat Biaya (BRD-48 / BRD-49).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-18 12:08:09',
            ),
            22 => 
            array (
                'id' => 24,
                'brd_code' => 'BRD-076',
                'title' => 'Month-End Closing Programs',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-23</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Month-End Closing Programs (Tutup Buku Akhir Bulan)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Financial Accounting / Period Control</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur alur kebijakan bisnis dan verifikasi program penutupan periode akuntansi bulanan (Month-End Closing Programs / Tutup Buku Akhir Bulan) untuk memastikan seluruh transaksi dalam bulan berjalan telah dibukukan secara lengkap, saldo seimbang, dan periode dikunci guna mencegah perubahan data keuangan historis.</p>
    <ul>
        <li><strong>In Scope:</strong> Pemeriksaan saldo neraca saldo seimbang (Balance Check); rekonsiliasi Buku Besar pembantu (Sub-ledger AR, AP, Inventory) dengan Buku Besar Kontrol (Control Accounts); pengecekan dokumen transaksi berstatus draft/pending; mekanisme penguncian status periode akuntansi dari OPEN menjadi CLOSED; dan pembukaan otomatis periode baru.</li>
        <li><strong>Out of Scope:</strong> Proses audit eksternal tahunan dan perhitungan penyusutan aset tetap di luar sistem (diatur pada modul aset terpisah).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Period Locking & Financial Integrity Control** — menjamin keabsahan dan keandalan laporan keuangan bulanan dengan menutup periode akuntansi secara ketat, mencegah adanya manipulasi entri jurnal mundur (backdated) setelah laporan diserahkan ke manajemen.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>accounting_periods</code></strong> — Menyimpan daftar periode akuntansi, tahun, rentang tanggal mulai/selesai, status (OPEN, CLOSED), serta audit trail penutupan.</li>
        <li><strong>Tabel: <code>closing_checklists</code></strong> — Daftar verifikasi tugas wajib penutupan bulan berjalan (status selesai, penanggung jawab).</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Automated Pre-Closing Checks:</strong> Sebelum tutup buku disetujui, sistem wajib melakukan scanning otomatis terhadap transaksi gantung (Draft SO, Draft PO, Draft Journal Memorial, Unbilled GR).</li>
        <li><strong>Reconciliation Validation:</strong> Selisih saldo antara subledger piutang/hutang dengan akun kontrol utama di Buku Besar wajib bernilai 0 (nol).</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Penutupan periode akuntansi memerlukan otorisasi mutlak tingkat Direktur Keuangan / Finance Controller.</li>
        <li>Begitu status periode diubah menjadi <code>CLOSED</code>, semua transaksi baru dengan posting_date dalam periode tersebut wajib diblokir total oleh database.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Penutupan bulan menjadi dasar penarikan pelaporan masa pajak PPN dan PPh (SPT Masa). Penguncian periode menjamin kepatuhan data SPT Pajak yang dilaporkan ke DJP tidak akan berubah.</p>

    <h2>8. Status & Blocking</h2>
    <p>Blokir posting backdated ke periode yang berstatus CLOSED. Transaksi yang terlambat wajib diposting menggunakan tanggal berjalan di periode OPEN berikutnya.</p>

    <h2>9. Business Rules</h2>
<h3>9.4 Aturan Penguncian Bertahap (Staged Period Locking)</h3>
<ul>
    <li><strong>LOCKED_OPERATIONAL:</strong> Membekukan semua aktivitas operasional logistik (Sales Order, Outbound Delivery/Surat Jalan, Goods Receipt, AP/AR Invoice reguler) yang memicu posting jurnal keuangan otomatis. Pengguna biasa dilarang memposting transaksi backdate ke periode ini.</li>
    <li><strong>User Pengecualian (Posting Override):</strong> Anggota tim Finance dan Accounting (peran: Finance Controller, Chief Accountant, Finance Staff) dikecualikan dari pemblokiran posting pada status LOCKED_OPERATIONAL untuk kebutuhan penyesuaian akhir bulan (depresiasi, revaluasi forex, jurnal koreksi memorial).</li>
    <li><strong>CLOSED:</strong> Penguncian mutlak dan menyeluruh. Tidak ada pengguna (termasuk Finance/Accounting) yang dapat memposting jurnal baru ke periode ini.</li>
</ul>
    <ul>
        <li><strong>BR-01 (Strict Balances):</strong> Penutupan periode diblokir jika total debit tidak sama dengan total kredit pada neraca saldo per akhir bulan bersangkutan.</li>
        <li><strong>BR-02 (Pending Document Block):</strong> Dilarang melakukan tutup buku jika masih terdapat draf Jurnal Memorial (FSD-28) yang belum terposting.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Seluruh fungsi create/edit/delete dokumen transaksi yang memiliki posting_date di bulan yang ditutup menghasilkan error pemblokiran setelah penutupan buku disahkan.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul Periode Akuntansi &amp; Bagan Akun (BRD-09 / BRD-08).</li>
        <li>Modul General Ledger / Memorial Journal (BRD-22 / FSD-28).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-19 06:54:25',
            ),
            23 => 
            array (
                'id' => 25,
                'brd_code' => 'BRD-093',
            'title' => 'Laporan Penjualan (Sales Report by Sales Order)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-24</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Laporan Penjualan berdasarkan Sales Order (Report Sales by SO)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Sales &amp; Distribution (SD) / Reporting</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur kebutuhan bisnis penyediaan laporan performa penjualan terperinci berdasarkan data Sales Order (Report Sales by Sales Order) guna memantau nilai kotor penjualan, diskon, PPN, nilai bersih, serta status realisasi pemenuhan barang (gudang) dan penagihan (invoice).</p>
    <ul>
        <li><strong>In Scope:</strong> Filter pencarian laporan multi-kriteria; visualisasi data penjualan per nomor SO, per item barang, dan per pelanggan; pelacakan kuantitas order vs kuantitas kirim vs kuantitas tagih (order fulfillment status); dan ekspor laporan ke format Excel/PDF.</li>
        <li><strong>Out of Scope:</strong> Laporan komisi salesman eksternal dan analisis perilaku tren pembelian (customer behavior AI forecasting).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Commercial Sales Visibility & Fulfillment Analysis** — menyediakan transparansi performa pendapatan kotor dan bersih penjualan per periode, serta mengidentifikasi order penjualan gantung yang belum dikirim atau ditagih oleh tim operasional.</p>

    <h2>4. Data Structure & Organization</h2>
    <p>Laporan ini bersifat Read-Only dan menyajikan data hasil konsolidasi (Query View) dari tabel-tabel utama berikut:</p>
    <ul>
        <li><code>sales_orders</code> (Header SO) &amp; <code>sales_order_lines</code> (Detail SO)</li>
        <li><code>customers</code> (Master Pelanggan) &amp; <code>items</code> (Master Barang)</li>
        <li><code>shipment_items</code> (Realisasi Pengiriman / Post Goods Issue)</li>
        <li><code>customer_invoice_lines</code> (Realisasi Penagihan / AR Invoice)</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Fulfillment Tracking:</strong> Laporan wajib menampilkan kolom kuantitas dipesan (ordered_qty), kuantitas dikirim (shipped_qty), dan kuantitas ditagih (invoiced_qty) secara berdampingan.</li>
        <li><strong>Multi-currency Conversion:</strong> Seluruh nilai transaksi valas wajib dikonversi otomatis ke IDR menggunakan kurs transaksi masing-masing dokumen untuk keperluan total agregasi.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Hak akses laporan dibatasi hanya untuk peran manajemen penjualan, tim keuangan, dan jajaran direksi.</li>
        <li>Semua data yang ditampilkan wajib difilter otomatis berdasarkan hak akses cabang (branch_id) pengguna yang login.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Pemisahan kolom nilai DPP (Dasar Pengenaan Pajak) kotor dan kolom nilai PPN Keluaran secara terperinci guna mempermudah rekonsiliasi dengan laporan SPT Masa PPN Keluaran.</p>

    <h2>8. Status & Blocking</h2>
    <p>Laporan mengabaikan Sales Order yang berstatus DRAFT atau CANCELLED dari perhitungan total akumulasi nilai penjualan bersih.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Fulfillment Discrepancy Alert):</strong> Sistem menandai baris SO dengan warna merah jika status SO telah APPROVED tetapi realisasi pengiriman (shipped_qty) masih bernilai 0 setelah melewati tanggal janji kirim.</li>
        <li><strong>BR-02 (Branch Filtering):</strong> User dilarang melihat data penjualan dari cabang lain yang tidak ditugaskan kepadanya.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Ekspor Excel menghasilkan berkas spreadsheet yang memiliki formula agregasi total nominal bersih sejalan dengan nilai yang tampil di layar UI.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul Sales Order (BRD-11 / FSD-11).</li>
        <li>Modul Master Barang &amp; Pelanggan (BRD-02 / BRD-05).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-19 00:49:35',
            ),
            24 => 
            array (
                'id' => 26,
                'brd_code' => 'BRD-095',
            'title' => 'Laporan Piutang (Report AR)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-20 14:52:43',
            ),
            25 => 
            array (
                'id' => 27,
                'brd_code' => 'BRD-097',
                'title' => 'Laporan AR Aging',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            26 => 
            array (
                'id' => 28,
                'brd_code' => 'BRD-098',
                'title' => 'Laporan AP Aging',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            27 => 
            array (
                'id' => 29,
                'brd_code' => 'BRD-085',
            'title' => 'Laporan Purchase Order (PO Report)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            28 => 
            array (
                'id' => 30,
                'brd_code' => 'BRD-086',
            'title' => 'Laporan Penerimaan Barang (GR Log)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            29 => 
            array (
                'id' => 31,
                'brd_code' => 'BRD-087',
            'title' => 'Laporan Unbilled Goods (Goods Receipt Not Invoiced)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            30 => 
            array (
                'id' => 32,
                'brd_code' => 'BRD-088',
            'title' => 'Kartu Stok (Stock Card)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            31 => 
            array (
                'id' => 33,
                'brd_code' => 'BRD-089',
            'title' => 'Laporan Mutasi Stok (Stock Movement)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            32 => 
            array (
                'id' => 34,
                'brd_code' => 'BRD-090',
                'title' => 'Laporan Stock Aging',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            33 => 
            array (
                'id' => 35,
                'brd_code' => 'BRD-081',
            'title' => 'Laporan Master Data Barang (Item Master List)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:39',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            34 => 
            array (
                'id' => 36,
                'brd_code' => 'BRD-082',
            'title' => 'Laporan Master Data Pelanggan (Customer Directory)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            35 => 
            array (
                'id' => 37,
                'brd_code' => 'BRD-083',
            'title' => 'Laporan Master Data Supplier (Supplier Directory)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            36 => 
            array (
                'id' => 38,
                'brd_code' => 'BRD-084',
            'title' => 'Laporan Master Data COA (Chart of Accounts List)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            37 => 
            array (
                'id' => 39,
                'brd_code' => 'BRD-045',
            'title' => 'Setup Master Harga Beli (Purchase Price List)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-045</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Setup Master Harga Beli (Purchase Price List)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Materials Management (MM) - Purchasing</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Purchasing Info Record</td><td class="border px-2 py-1">Menjembatani persilangan antara Vendor dan Material. Menyimpan harga beli neto, batas waktu berlaku harga (Valid From/To), waktu tunggu (Lead time), dan Minimum Order Quantity (MOQ).</td><td class="border px-2 py-1">Manajemen Kontrak Payung (Outline Agreement / Value Contract) yang dibahas pada BRD-049.</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Info Record Matrix</td><td class="border px-2 py-1">Harga tidak disimpan mentah di Material Master, melainkan di <code>purchasing_info_records</code> yang spesifik untuk kombinasi (Vendor, Material, Purch Org, Branch).</td><td class="border px-2 py-1">Jika `branch_id` NULL, maka harga berlaku untuk seluruh cabang dalam *Purchasing Org* tersebut.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Net Price Declaration</td><td class="border px-2 py-1">Harga yang tertera di Master Harga Beli **selalu Neto (sebelum PPN)** demi menjaga konsistensi beban HPP. PPN dihitung saat pembuatan PO.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">purchasing_info_records</td><td class="border px-2 py-1">Many-to-One (N:1) ke Vendor &amp; Material</td><td class="border px-2 py-1">Satu Vendor dapat memiliki banyak penawaran harga untuk berbagai material, dan sebaliknya.</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Auto Price Fetching</td><td class="border px-2 py-1">Saat buyer membuat PO dan memasukkan Vendor + Material, sistem otomatis memindai `purchasing_info_records` yang aktif di tanggal PO, lalu menarik `net_price`.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Procurement Manager</td><td class="border px-2 py-1">Approve Info Record</td><td class="border px-2 py-1">Pengaturan harga beli harus melalui persetujuan (*Approval*) sebelum menjadi `is_active = TRUE`.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">is_active</td><td class="border px-2 py-1">Hanya *record* dengan flag aktif dan berada dalam rentang `valid_from` & `valid_to` yang sah digunakan di PO.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-45-01</td><td class="border px-2 py-1">Overlap Date Guard</td><td class="border px-2 py-1">Sistem mencegah input rentang tanggal (`valid_from` s/d `valid_to`) yang saling bertabrakan untuk kombinasi (Vendor + Material + Purch Org) yang sama.</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">is_active</td><td class="border px-2 py-1">FALSE (Menunggu *Approval*).</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Date Validation</td><td class="border px-2 py-1">`valid_to` harus lebih besar dari `valid_from`.</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tinggi</td><td class="border px-2 py-1">Jejak siapa yang menyetujui harga (`approved_by`, `approved_at`) wajib melekat di kolom tabel.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Sistem menolak (Error 422) saat *user* mencoba memasukkan Info Record untuk Material X dan Vendor Y pada rentang tanggal yang bersinggungan dengan record eksisting.</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Vendor &amp; Material Master</td><td class="border px-2 py-1">Integritas data Vendor dan Material wajib divalidasi tidak diblokir (*Not Blocked*).</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-19 01:09:34',
            ),
            38 => 
            array (
                'id' => 40,
                'brd_code' => 'BRD-057',
            'title' => 'Setup Master Harga Jual (Sales Price List)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-39</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Setup Master Harga Jual (Sales Price List)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Sales &amp; Distribution (SD)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">19-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Draft</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur kebijakan bisnis pengelolaan master harga jual produk (Sales Price List / Sales Condition Records) untuk disajikan secara otomatis pada seluruh dokumen penawaran harga pelanggan (Quotation), pesanan penjualan (Sales Order), dan Faktur Penjualan (AR Invoice).</p>
    <ul>
        <li><strong>In Scope:</strong> Konfigurasi harga jual dasar produk (Base Price PR00); penetapan harga khusus per pelanggan (Customer Specific Price PR01) atau grup pelanggan; diskon promosi berkala; dan pembatasan masa berlaku harga.</li>
        <li><strong>Out of Scope:</strong> Skema komisi salesman eksternal dan analisis persaingan harga kompetitor.</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Sales Price list Master Management** — menetapkan standarisasi harga jual komersial berdasarkan klasifikasi pelanggan untuk menjaga konsistensi margin kotor perusahaan.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>sales_condition_records</code></strong> — Menyimpan nilai harga dasar (PR00), harga pelanggan (PR01), atau diskon grup (RA00) dengan kombinasi Customer, Customer Group 4, Item, UoM, dan rentang tanggal validitas.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Access Sequence Engine:</strong> Evaluasi prioritas pencarian harga otomatis: Spesifik Pelanggan-Item (PR01) &rarr; Spesifik Customer Group 4 (Pricing Group)-Item &rarr; Harga Dasar Item (PR00).</li>
        <li><strong>Pricing Date Validation:</strong> Sistem memvalidasi kesesuaian tanggal posting dokumen transaksi dengan masa berlaku harga jual aktif di master.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Penyimpanan master harga jual baru atau perubahan nilai harga wajib melalui otorisasi berjenjang oleh Sales Manager.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Master harga jual wajib mendefinisikan secara jelas apakah nilai harga tersebut belum termasuk pajak (DPP) atau sudah termasuk PPN (Include Pajak).</p>

    <h2>8. Status & Blocking</h2>
    <p>Master harga yang telah berstatus EXPIRED atau INACTIVE secara otomatis diblokir dari sistem pengisian harga transaksi baru.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Priority Rule):</strong> Jika harga khusus pelanggan (PR01) terdefinisi aktif, maka sistem wajib mengabaikan harga dasar umum (PR00).</li>
        <li><strong>BR-02 (Masa Berlaku):</strong> Rentang tanggal validitas harga tidak boleh saling tumpang tindih untuk satu kunci kombinasi unik yang sama.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Saat pembuatan Sales Order untuk pelanggan premium, sistem otomatis menarik harga khusus premium dari master records yang terdaftar.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul Data Barang &amp; Satuan (BRD-02).</li>
        <li>Modul Customer Master Data (BRD-05).</li>
        <li>Modul Struktur Harga Jual (BRD-04).</li>
    </ul>
</div>',
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-19 10:46:38',
            ),
            39 => 
            array (
                'id' => 41,
                'brd_code' => 'BRD-091',
            'title' => 'Laporan Valuasi Persediaan (Inventory Valuation)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            40 => 
            array (
                'id' => 42,
                'brd_code' => 'BRD-077',
                'title' => 'Trial Balance',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            41 => 
            array (
                'id' => 43,
                'brd_code' => 'BRD-078',
            'title' => 'Laba Rugi (Profit & Loss)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            42 => 
            array (
                'id' => 44,
                'brd_code' => 'BRD-079',
            'title' => 'Neraca (Balance Sheet)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            43 => 
            array (
                'id' => 45,
                'brd_code' => 'BRD-080',
            'title' => 'Laporan Arus Kas (Cash Flow)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-12 10:51:40',
                'updated_at' => '2026-07-16 02:06:54',
            ),
            44 => 
            array (
                'id' => 46,
                'brd_code' => 'BRD-062',
            'title' => 'Shipment Management (Logistics Ekspedisi)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-45</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Shipment Management (Logistics Ekspedisi)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Logistics / Shipment Planning</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Modul Shipment Management menyediakan fungsi konsolidasi multi-dokumen pengiriman barang (dari Sales Order) ke dalam satu rencana pengiriman armada ekspedisi (Shipment Plan) guna mengoptimalkan muatan, rute pengiriman, dan pemicu proses realisasi biaya ongkos angkut.</p>
    <ul>
        <li><strong>In Scope:</strong> Pembuatan Shipment Plan, pemilihan armada kendaraan, validasi kapasitas muatan berat/volume, penentuan urutan rute multi-drop, pembaruan status perjalanan, dan pemicu otomatis modul Shipment Cost.</li>
        <li><strong>Out of Scope:</strong> Perhitungan dan pembayaran tagihan biaya ongkos angkut ke transporter (diatur pada BRD-46 Shipment Cost).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi inti sistem adalah <strong>Shipment Planning & Route Optimization</strong> — memastikan total berat/volume muatan aktual tidak melampaui kapasitas kendaraan yang dipilih, serta mengelola siklus hidup status perjalanan armada dari <code>DRAFT</code> hingga <code>COMPLETED</code>.</p>

    <h2>4. Data Structure & Organization</h2>
    <p>Struktur data terbagi atas tiga tabel utama:</p>
    <ul>
        <li><strong>Tabel: <code>shipment_headers</code></strong> — Header armada ekspedisi berisi data kendaraan, transporter, rute, status jalan, dan field <code>cost_status</code> untuk integrasi dengan modul Shipment Cost.</li>
        <li><strong>Tabel: <code>shipment_lines</code></strong> — Detail muatan per baris SO yang dikonsolidasikan. Field <code>stop_sequence</code> mendefinisikan urutan titik bongkar pada rute multi-drop.</li>
        <li><strong>Tabel: <code>vehicles</code></strong> — Master data kendaraan armada berisi kapasitas berat (<code>max_weight</code>) dan volume (<code>max_volume</code>) sebagai batas validasi rencana muatan.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li>Konsolidasi multi-SO ke dalam satu armada kendaraan tunggal dalam satu dokumen Shipment Plan.</li>
        <li>Validasi berat kotor total muatan barang &le; berat muatan maksimal armada kendaraan.</li>
        <li>Penentuan urutan rute titik bongkar (Sequence Drop-off) untuk mendukung pengiriman multi-titik.</li>
        <li>Pembaruan otomatis status armada kendaraan menjadi <code>IN_USE</code> saat Shipment dirilis ke status <code>PLANNED</code>.</li>
        <li>Pemicu otomatis ke modul Shipment Cost saat status berubah menjadi <code>COMPLETED</code>.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Data Shipment diisolasi per <code>branch_id</code> — lintas cabang dilarang mengakses data satu sama lain.</li>
        <li>Hanya SO dari cabang yang sama yang boleh dimasukkan ke dalam satu Shipment Plan.</li>
        <li>Kendaraan hanya dapat dipilih jika berstatus <code>AVAILABLE</code> pada tanggal rencana pengiriman.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Penyediaan data berat dan klasifikasi jenis muatan wajib tersedia untuk memenuhi regulasi keselamatan jalan raya dan ketentuan perhubungan darat yang berlaku.</p>

    <h2>8. Status & Blocking</h2>
    <table class="min-w-full bg-white text-left border-collapse text-xs mb-4 border">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-2 py-1">Status</th>
                <th class="border px-2 py-1">Keterangan</th>
                <th class="border px-2 py-1">Blokir Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr><td class="border px-2 py-1"><code>DRAFT</code></td><td class="border px-2 py-1">Dokumen baru, dapat diubah bebas.</td><td class="border px-2 py-1">-</td></tr>
            <tr><td class="border px-2 py-1"><code>PLANNED</code></td><td class="border px-2 py-1">Rencana jalan dikunci, armada dialokasikan.</td><td class="border px-2 py-1">Edit header & lines diblokir.</td></tr>
            <tr><td class="border px-2 py-1"><code>IN_TRANSIT</code></td><td class="border px-2 py-1">Armada dalam perjalanan.</td><td class="border px-2 py-1">Seluruh perubahan diblokir.</td></tr>
            <tr><td class="border px-2 py-1"><code>DELIVERED</code></td><td class="border px-2 py-1">Semua titik bongkar selesai.</td><td class="border px-2 py-1">Hanya verifikasi logistik diizinkan.</td></tr>
            <tr><td class="border px-2 py-1"><code>COMPLETED</code></td><td class="border px-2 py-1">Transaksi selesai, memicu Shipment Cost.</td><td class="border px-2 py-1">Dokumen dikunci permanen.</td></tr>
        </tbody>
    </table>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Capacity Limit):</strong> Total berat muatan aktual tidak boleh melebihi kapasitas maksimal kendaraan: <code>SUM(shipment_lines.weight) &le; vehicles.max_weight</code>.</li>
        <li><strong>BR-02 (Branch Match):</strong> Hanya baris SO dari cabang yang sama (<code>branch_id</code> identik) dengan header Shipment yang boleh dikonsolidasikan dalam satu dokumen.</li>
        <li><strong>BR-03 (Status Lock):</strong> Dokumen Shipment berstatus <code>PLANNED</code> atau lebih tinggi tidak dapat diubah kecuali melalui proses koreksi dengan otorisasi supervisor.</li>
        <li><strong>BR-04 (Vehicle Availability):</strong> Kendaraan hanya dapat dipilih jika statusnya <code>AVAILABLE</code>. Sistem otomatis mengubah status kendaraan menjadi <code>IN_USE</code> saat Shipment dirilis ke status <code>PLANNED</code>.</li>
        <li><strong>BR-05 (Cost Trigger):</strong> Perubahan status menjadi <code>COMPLETED</code> secara otomatis memicu modul Shipment Cost untuk membuat dokumen biaya ongkos angkut terkait.</li>
        <li><strong>BR-06 (No Hard Delete):</strong> Data Shipment tidak boleh dihapus secara fisik dari database. Penghapusan logis menggunakan mekanisme soft delete (<code>deleted_at</code>).</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Sistem menolak penambahan baris muatan jika total berat melebihi kapasitas kendaraan yang dipilih.</li>
        <li>AC-02: Nomor Shipment terbentuk berurutan numerik 10-digit dalam rentang <code>8120000000 - 8129999999</code>.</li>
        <li>AC-03: Status kendaraan berubah menjadi <code>IN_USE</code> secara otomatis saat Shipment dirilis ke <code>PLANNED</code>.</li>
        <li>AC-04: Dokumen Shipment Cost terbentuk otomatis saat status Shipment berubah menjadi <code>COMPLETED</code>.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Master Data Vendor/Transporter (BRD-07 - Vendor Master Data).</li>
        <li>Master Data Kendaraan Armada (Tabel: <code>vehicles</code>).</li>
        <li>Master Rute Logistik (Tabel: <code>routes</code>).</li>
        <li>Dokumen Sales Order (BRD-12 / FSD-11).</li>
        <li>Modul Shipment Cost (BRD-46 / FSD-15).</li>
    </ul>
</div>',
                'created_at' => '2026-07-15 09:18:03',
                'updated_at' => '2026-07-18 05:53:35',
            ),
            45 => 
            array (
                'id' => 47,
                'brd_code' => 'BRD-063',
                'title' => 'Shipment Cost Management',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-46</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Shipment Cost Management</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Logistics / Shipment Costing</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur ketentuan bisnis untuk penentuan tarif angkut, kalkulasi otomatis biaya pengiriman barang, dan proses realisasi (realization) ongkos ekspedisi kepada transporter luar maupun dalam.</p>
    <ul>
        <li><strong>In Scope:</strong> Verifikasi tarif otomatis dari rate sheet kontrak vendor, pembagian proporsional biaya angkut per item barang, akrual jurnal akuntansi, dan pembuatan dokumen Purchase Order (PO) Freight Cost otomatis.</li>
        <li><strong>Out of Scope:</strong> Rencana perjalanan armada dan pengelompokan nota kirim (diatur pada BRD-45 Shipment Plan).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi inti adalah <strong>Freight Cost Calculation & Accrual Engine</strong> — menghitung total biaya kirim berdasarkan rute dan jenis kendaraan, membagi biaya tersebut secara proporsional berdasarkan berat/volume barang ke masing-masing DO, serta menjurnal akrual biaya angkut.</p>

    <h2>4. Data Structure & Organization</h2>
    <p>Struktur data terbagi atas dua tabel utama:</p>
    <ul>
        <li><strong>Tabel: <code>shipment_costs</code></strong> — Menyimpan informasi biaya total pengiriman, transporter terkait, dan status akrual keuangan.</li>
        <li><strong>Tabel: <code>shipment_cost_lines</code></strong> — Menyimpan alokasi proporsional ongkos angkut yang dibebankan ke setiap baris Outbound Delivery/SO.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li>Pencocokan otomatis biaya angkut berdasarkan rute logistik dan jenis kendaraan dari Freight Rate Sheet kontrak vendor.</li>
        <li>Pecah biaya (pro-rate) ke masing-masing nota kirim berdasarkan proporsi berat/volume barang.</li>
        <li>Pembuatan otomatis PO Freight Cost berseri numerik 10-digit <code>7800000000 - 7899999999</code> saat dokumen disetujui/direalisasikan.</li>
        <li>Pembukuan jurnal akrual otomatis: Beban Ongkos Angkut (Debit) vs GR/IR Ongkos Angkut (Kredit).</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Batas deviasi penginputan biaya tambahan manual dibatasi maksimal &plusmn; 5% dari tarif kontrak standar.</li>
        <li>Isolasi data keuangan biaya pengiriman per <code>branch_id</code>.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Mendukung pengenaan PPN Masukan Jasa Ekspedisi (Jasa Kena Pajak) sesuai undang-undang perpajakan yang berlaku.</p>

    <h2>8. Status & Blocking</h2>
    <p>Dokumen Shipment Cost yang sudah berstatus <code>REALIZED</code> dikunci secara permanen dan tidak dapat diubah atau dihapus guna menjamin konsistensi data PO Freight Cost dan jurnal akrual akuntansi yang sudah terbentuk.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01:</strong> Tarif wajib diambil dari rate sheet kontrak vendor transporter yang sah pada tanggal keberangkatan armada.</li>
        <li><strong>BR-02:</strong> Jurnal akrual keuangan wajib dibuat secara real-time sesaat setelah status diubah menjadi <code>REALIZED</code>.</li>
        <li><strong>BR-03:</strong> Alokasi biaya per baris detail wajib dihitung secara proporsional berdasarkan persentase berat barang terhadap total muatan aktual.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Sistem berhasil menghitung nilai alokasi biaya per item secara proporsional.</li>
        <li>AC-02: Jurnal akrual terbentuk otomatis di Buku Besar tanpa intervensi manual saat realisasi dilakukan.</li>
        <li>AC-03: PO Freight Cost terbuat otomatis di modul Pembelian saat Shipment Cost berstatus <code>REALIZED</code>.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Rencana Ekspedisi Logistik (BRD-45 / FSD-13 Shipment Plan).</li>
        <li>Modul Pembelian (BRD-15 / FSD-20 Purchase Order).</li>
        <li>Modul Bagan Akun (BRD-08 / FSD-08 Chart of Accounts).</li>
        <li>Modul Pemetaan Akun Jurnal (BRD-10 / FSD-12 Account Determination).</li>
    </ul>
</div>',
                'created_at' => '2026-07-15 23:49:44',
                'updated_at' => '2026-07-18 06:06:04',
            ),
            46 => 
            array (
                'id' => 101,
                'brd_code' => 'BRD-017',
            'title' => 'Cost Center Management (Pusat Biaya)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-017</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Cost Center Management (Pusat Biaya)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Controlling & Management Accounting (CO)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0 (Standardized)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Cost Center Master Setup</strong></td>
            <td class="border px-2 py-1">Pembuatan entitas pusat biaya tingkat terendah (seperti Departemen HR, Divisi Mesin 1, Tim Pemasaran Jakarta) beserta masa berlakunya.</td>
            <td class="border px-2 py-1">Mekanisme perhitungan alokasi biaya antar departemen secara otomatis (<em>Assessment & Distribution Cycles</em>). Itu berada di luar cakupan pembuatan master ini.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Hierarchy Integration (Daun Pohon)</strong></td>
            <td class="border px-2 py-1">Dalam desain <em>Management Accounting</em>, <em>Cost Center</em> diibaratkan sebagai daun yang harus tumbuh menempel pada dahan pohon. Dahan pohonnya adalah <em>Standard Hierarchy</em> (BRD-016).</td>
            <td class="border px-2 py-1">Pusat Biaya sama sekali <strong>DILARANG</strong> dibentuk jika tidak menunjuk pada satu grup (dahan) di <em>Standard Hierarchy</em>. Tidak boleh ada daun yang melayang di udara (*Orphan Block*).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Time-Dependent Validity (Masa Berlaku)</strong></td>
            <td class="border px-2 py-1">Entitas departemen atau tim proyek bisa saja dibubarkan di masa depan. Oleh karena itu, <em>Cost Center</em> memiliki tanggal lahir (<code>valid_from</code>) dan tanggal kedaluwarsa (<code>valid_to</code>).</td>
            <td class="border px-2 py-1">Penjurnalan keuangan tidak bisa dilakukan menembus masa lalu sebelum tanggal lahirnya, maupun di masa depan setelah masa berlakunya habis.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pemisahan Beban (Deductible vs Non-Deductible)</strong></td>
            <td class="border px-2 py-1">Meski murni untuk manajemen, klasifikasi kategori pusat biaya (Misal: <em>Corporate Social Responsibility (CSR) Cost Center</em>) sangat membantu divisi perpajakan saat akhir tahun untuk mem-filter beban mana yang tidak diakui secara fiskal (<em>Non-Deductible Expenses</em>) dalam proses Koreksi Fiskal.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Controlling Areas (BRD-016)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Banyak <em>Cost Center</em> bernaung di bawah satu Area pengendali.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Cost Center Groups (BRD-016)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Banyak <em>Cost Center</em> melekat (di-assign) ke satu dahan *Standard Hierarchy* yang sama.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Users (BRD-001)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1) Nullable</td>
            <td class="border px-2 py-1">Satu <em>User</em> dapat ditunjuk sebagai manajer/penanggung jawab atas beberapa <em>Cost Center</em>.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Create Cost Center</strong></td>
            <td class="border px-2 py-1">Controlling Admin menekan "New", mengisi kode "CC-MKT-01", memilih dahan "Grup Penjualan" di <em>Standard Hierarchy</em>, menentukan kategori "MKT", lalu menyimpan dengan <em>Validity Date</em> mulai dari 1 Januari tahun ini hingga 31 Desember 9999.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Controlling Admin / Management Accountant</strong></td>
            <td class="border px-2 py-1">Create, Edit, Set Inactive</td>
            <td class="border px-2 py-1">Diberikan hak penuh memindahkan (<em>Re-assign</em>) <em>Cost Center</em> antar dahan hierarki asalkan belum ada tutup buku akhir tahun. Penghapusan fisik (<em>Hard Delete</em>) diharamkan mutlak.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status (is_active)</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>TRUE (Active)</strong></td>
            <td class="border px-2 py-1">Kode <em>Cost Center</em> ini terbit dan bisa dipilih dari layar AP Invoice, Jurnal Umum (GL), dan Pembayaran Kas.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>FALSE (Inactive)</strong></td>
            <td class="border px-2 py-1">Departemen/pusat biaya telah dibekukan (Mungkin unit bisnis ditutup). Sistem langsung memblokir pemilihan kode ini di formulir transaksi apa pun secara <em>real-time</em>.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Hierarchy Binding Mandatory</td>
            <td class="border px-2 py-1">Di level *database*, kolom <code>cost_center_group_id</code> dirancang berstatus <code>NOT NULL</code>. Sistem tidak akan mengizinkan pembuatan jika elemen kelompok di-*bypass*.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Time Validity Shield</td>
            <td class="border px-2 py-1">Modul Mesin Jurnal (BRD selanjutnya) WAJIB menginspeksi tanggal posting transaksi (<code>posting_date</code>) dan memastikannya berada dalam rentang [<code>valid_from</code> - <code>valid_to</code>] <em>Cost Center</em> yang dituju. Di luar itu, blokir seketika.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-03</strong></td>
            <td class="border px-2 py-1">Deletion Protection</td>
            <td class="border px-2 py-1">Sekali <em>Cost Center</em> tersimpan, penghapusan baris tidak direkomendasikan. Gunakan penutupan masa berlaku <code>valid_to</code> (Dimundurkan tanggalnya) sebagai cara yang elegan untuk "membunuh" *Cost Center*.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>valid_from</strong></td>
            <td class="border px-2 py-1">Tanggal sistem saat ini (<em>Current Date</em>)</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>valid_to</strong></td>
            <td class="border px-2 py-1"><code>9999-12-31</code> (Melambangkan keabadian, standar SAP).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Date Sequence Check</strong></td>
            <td class="border px-2 py-1">Tanggal <code>valid_to</code> harus lebih besar atau sama dengan (>=) tanggal <code>valid_from</code>. (Mesin waktu yang mundur ke belakang akan ditolak).</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Menengah (Medium)</strong></td>
            <td class="border px-2 py-1">Memindahkan <em>Cost Center</em> dari dahan "Divisi IT" ke dahan "Divisi Keuangan" secara drastis mengubah struktur laporan biaya. Perpindahan relasi (<em>Re-assignment Hierarchy</em>) ini wajib dicatat log perubahannya.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Ketika pengguna sengaja mengosongkan pilihan Grup/Dahan Hierarki, lalu menekan tombol Save, sistem akan merespons warna merah: "<em>Cost Center harus di-assign ke dalam sebuah grup hierarki.</em>" dan penyimpanan dibatalkan.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Seorang admin membuat *Cost Center* dengan <code>valid_to</code> di 31 Desember 2025. Di masa depan, staf operasional memasukkan tagihan listrik tertanggal 15 Januari 2026 yang menunjuk pada *Cost Center* tersebut. Jurnal AP harus dibatalkan seketika oleh sistem karena <em>Expired Cost Center</em>.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-016 (Standard Hierarchy)</strong></td>
            <td class="border px-2 py-1">Keberadaan dahan struktur mutlak diperlukan sebagai pondasi sebelum sehelai daun <em>Cost Center</em> dapat ditumbuhkan.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 13:26:59',
                'updated_at' => '2026-07-22 13:29:37',
            ),
            47 => 
            array (
                'id' => 102,
                'brd_code' => 'BRD-011',
                'title' => 'Document Numbering Engine',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-011</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Document Numbering Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">System Configuration Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">2.0 (Restructured)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Number Generator</strong></td>
            <td class="border px-2 py-1">Pembentukan urutan nomor dokumen secara otomatis (Sequential) saat transaksi disimpan. Mendukung <em>Prefix</em>, <em>Suffix</em>, dan <em>Dynamic Variables</em> (seperti {YYYY} dan {MM}).</td>
            <td class="border px-2 py-1">Pembuatan nomor tiket/voucher secara acak (Random/UUID format) bukan menjadi tanggung jawab <em>engine</em> ini.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Reset Strategy</strong></td>
            <td class="border px-2 py-1">Konfigurasi pengaturan *Continuous* (Nomor terus naik) atau *Reset Yearly* (Kembali ke angka awal setiap ganti tahun kalender).</td>
            <td class="border px-2 py-1">Reset bulanan (*Monthly Reset*). Sangat jarang digunakan di level ERP tingkat tinggi dan menambah overhead komputasi.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Number Range Rules</strong></td>
            <td class="border px-2 py-1">Objek referensi abstrak (misal: "NUM_SO") yang menyimpan memori status angka terakhir (<em>current_number</em>) yang sudah diterbitkan.</td>
            <td class="border px-2 py-1">Rentang nomor dibatasi oleh angka Minimum (*start_number*) dan Maksimum (*end_number*). Jika batas atas tercapai, sistem menolak pembuatan dokumen baru.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Dynamic Parsing</strong></td>
            <td class="border px-2 py-1">Kemampuan <em>engine</em> untuk mendeteksi *placeholder* seperti `{YY}` dan mengisinya dengan tanggal riil server secara *on-the-fly*.</td>
            <td class="border px-2 py-1">Parsing variabel dinamis hanya bekerja pada kolom `prefix` dan `suffix`, tidak pada tubuh angka urut (*digit_length*).</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Kewajaran Sekuensial Finansial (No-Gaps)</strong></td>
            <td class="border px-2 py-1">Otoritas Pajak mensyaratkan nomor dokumen faktur/jurnal harus urut tanpa lubang (*Gaps*) untuk mencegah penyembunyian omset. Oleh karenanya, *engine* ini harus menjamin keamanan *Concurrency / Race Condition* agar nomor tidak terlangkau.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Document Types (BRD-006)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Banyak tipe dokumen (Misal: SO_STD, SO_RET) dapat me-refer (*numpang*) pada satu aturan rentang nomor yang sama (Misal: Menggunakan *Number Range* \'NUM_SO\').</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Transactions (GL, AR, AP)</strong></td>
            <td class="border px-2 py-1">Polymorphic Dependencies</td>
            <td class="border px-2 py-1">Setiap dokumen yang diselamatkan (*saved*) akan me-<em>request</em> angka berikutnya dari *engine* ini, dan menyimpannya secara permanen di kolom <code>document_number</code> tabel masing-masing.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Define Range Pattern</strong></td>
            <td class="border px-2 py-1">Super Admin mendefinisikan aturan "INV-YEAR": Prefix <code>INV-{YYYY}{MM}-</code>, Digit <code>4</code>, Start <code>1</code>. Opsi *Reset Yearly* dicentang.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Consume Number Request</strong></td>
            <td class="border px-2 py-1">Kasir menyimpan Transaksi. Sistem merespons dengan mengeluarkan nomor <code>INV-202607-0001</code>. Ketika Kasir B menyimpan dokumen satu milidetik kemudian, sistem mengeluarkan <code>INV-202607-0002</code> tanpa bentrok.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Super Admin</strong></td>
            <td class="border px-2 py-1">Full Setup</td>
            <td class="border px-2 py-1">Akses eksklusif untuk mendefinisikan master *Number Range* (Role lain dilarang masuk agar pola nomor dokumen tidak kacau).</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Active & Available</strong></td>
            <td class="border px-2 py-1">Angka <code>current_number</code> masih lebih kecil (<) dari <code>end_number</code>. Transaksi berjalan mulus.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Exhausted (Habis)</strong></td>
            <td class="border px-2 py-1">Angka <code>current_number</code> telah mencapai <code>end_number</code>. Sistem otomatis menolak fungsi "Simpan" pada UI transaksi dengan memunculkan pesan "Number Range Exhausted".</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Atomic Consumption (No-Gap Guarantee)</td>
            <td class="border px-2 py-1">Penarikan nomor (*Consumption*) HARUS dilakukan di dalam satu blok <em>Database Transaction</em> yang sama saat dokumen utama di-<em>insert</em>. Jika dokumen gagal disimpan (*rollback*), *Number Range* harus ikut ter-*rollback*.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Auto Yearly Reset</td>
            <td class="border px-2 py-1">Jika flag <code>reset_yearly</code> aktif, saat sebuah *request* nomor masuk di tahun kalender baru (Misal: Request masuk di Jan 2027, sementara `current_year` tersimpan di 2026), <em>engine</em> wajib me-reset `current_number` kembali ke `start_number` sebelum mengembalikannya.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>digit_length</strong></td>
            <td class="border px-2 py-1"><code>6</code> (Cukup untuk 999.999 dokumen per rentang).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>start_number</strong></td>
            <td class="border px-2 py-1"><code>1</code></td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>end_number</strong></td>
            <td class="border px-2 py-1"><code>999999999</code> (Batas aman BIGINT).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Boundary Limit Validation</strong></td>
            <td class="border px-2 py-1">Sistem mencegah input jika <code>end_number</code> di-set lebih kecil (<) dari <code>start_number</code>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Modifikasi Pattern</strong></td>
            <td class="border px-2 py-1">Sistem MENGUNCI (Disable Edit) kolom `prefix`, `digit_length`, dan `suffix` jika `current_number` sudah lebih besar dari `start_number` (Menandakan aturan sudah pernah terpakai. Mengubah pola di tengah jalan merusak konsistensi data).</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Tinggi (Critical)</strong></td>
            <td class="border px-2 py-1">Log audit wajib merekam siapa (<code>updated_by</code>) yang melonggarkan batas atas (<code>end_number</code>) ketika limit sudah penuh.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Jika dua pengguna mengeklik tombol "Simpan Transaksi" pada fraksi detik yang sama secara presisi, nomor yang dihasilkan <strong>tidak boleh kembar</strong>, dan urutannya (*increment*) wajib dijamin keakuratannya lewat <em>pessimistic lock</em>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Variabel dinamis `{YYYY}` dan `{MM}` pada prefix sukses merender tahun berjalan "2026" dan bulan "07" di dalam nomor dokumen final.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Seluruh Modul Form</strong></td>
            <td class="border px-2 py-1"><em>Engine</em> ini bertindak sebagai servis terpusat (*Singleton Service*). Modul Penjualan, Pembelian, hingga Keuangan 100% lumpuh jika <em>Engine</em> ini gagal memberikan nomor (Mencegah timbulnya dokumen anonim).</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 09:52:04',
                'updated_at' => '2026-07-22 10:01:32',
            ),
            48 => 
            array (
                'id' => 103,
                'brd_code' => 'BRD-002',
                'title' => 'Master Branch',
                'project_id' => NULL,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
 <h2>1. Document Information</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <tbody>
 <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-002</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Master Branch</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Core Organizational Structure</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">21-07-2026</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
 </tbody>
 </table>

 <h2>2. Scope</h2>
 <p>Modul Master Branch memproses pengelolaan data unit operasional cabang (Branch) sebagai entitas bawahan langsung dari perusahaan induk (Company). Modul ini sangat kritikal demi mendukung pelacakan multidimensi, pemisahan pembukuan dasar, dan pembatasan wilayah otorisasi data transaksi pada tingkat operasional cabang.</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Cakupan</th><th class="border px-2 py-1">Detail Cakupan (Scope)</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>In Scope</strong></td><td class="border px-2 py-1">Registrasi cabang (branch), pemetaan relasi hierarki cabang terhadap entitas perusahaan induk (company), penentuan atribut wilayah, alamat operasional spesifik cabang, dan fondasi logika untuk filter isolasi <i>query</i> data operasional.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Out of Scope</strong></td><td class="border px-2 py-1">Pemetaan struktur organisasi internal SDM tingkat departemen atau divisi per cabang, konfigurasi spesifik gudang (akan diatur pada Master Warehouse), dan aturan <i>routing</i> logistik antar cabang.</td></tr>
 </tbody>
 </table>

 <h2>3. Domain Core Specification</h2>
 <p>Atribut fundamental yang mendefinisikan sebuah Master Branch meliputi:</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Spesifikasi Domain</th><th class="border px-2 py-1">Deskripsi & Peran</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Company Parent</strong></td><td class="border px-2 py-1">Entitas hukum penginduk (Parent Company). Sebuah cabang tidak bisa berdiri sendiri secara hukum dalam sistem ini.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Branch Code</strong></td><td class="border px-2 py-1">Identifikasi unik cabang yang akan selalu diwariskan sebagai <i>prefix</i> atau <i>suffix</i> dalam penomoran dokumen transaksi otomatis (Document Numbering Engine).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Contact & Domicile</strong></td><td class="border px-2 py-1">Alamat spesifik operasional cabang, yang mungkin berbeda dengan domisili legal perusahaan induk, untuk keperluan cetak surat jalan (Delivery Order) dan tagihan operasional lokal.</td></tr>
 </tbody>
 </table>

 <h2>4. Tax & Compliance</h2>
 <p>Meskipun kewajiban pajak utama berada pada entitas Company, cabang dapat memiliki aspek pelaporan lokal:</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/3">Dokumen / Atribut</th><th class="border px-2 py-1">Penjelasan & Aturan</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Tax Registration Number (NPWP Cabang)</strong></td><td class="border px-2 py-1">Dalam beberapa yurisdiksi, cabang memiliki Nomor Pokok Wajib Pajak Cabang (NPWP Cabang). Opsional.</td></tr>
 <tr><td class="border px-2 py-1"><strong>KPP Lokal</strong></td><td class="border px-2 py-1">Kantor Pelayanan Pajak Pratama tempat cabang terdaftar secara operasional.</td></tr>
 </tbody>
 </table>

 <h2>5. Data Structure & Relationships</h2>
 <p>Penyimpanan konfigurasi cabang dikelola secara terpusat pada tabel <code>branches</code> di <strong>ERD 00</strong>.</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Atribut / Kolom</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Company ID</strong></td><td class="border px-2 py-1">Many-to-One (<code>companies</code>)</td><td class="border px-2 py-1">Satu Company dapat memiliki banyak Branch, namun satu Branch hanya milik satu Company.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Branch Code</strong></td><td class="border px-2 py-1">Unique Index</td><td class="border px-2 py-1">Kode alfanumerik pengenal cabang.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Branch Name</strong></td><td class="border px-2 py-1">String</td><td class="border px-2 py-1">Nama komersial cabang (Misal: Cabang Sudirman, Cabang Surabaya).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Address Details</strong></td><td class="border px-2 py-1">Text / Relasi (City/Prov)</td><td class="border px-2 py-1">Jalan, Kota, Provinsi, Kode Pos.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Contact Details</strong></td><td class="border px-2 py-1">String</td><td class="border px-2 py-1">Nomor Telepon, PIC, dan Email.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Status</strong></td><td class="border px-2 py-1">Enum</td><td class="border px-2 py-1">Active, Inactive, Archived.</td></tr>
 </tbody>
 </table>

 <h2>6. Functional Specifics</h2>
 <p>Spesifikasi interaksi antarmuka pengguna (UI):</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Fungsi Antarmuka</th><th class="border px-2 py-1">Deskripsi Interaksi & Spesifikasi</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Create Branch</strong></td><td class="border px-2 py-1">Formulir hierarkis di mana admin diwajibkan terlebih dahulu memilih <i>Company</i> dari <i>dropdown</i> sebelum dapat melanjutkan pengisian profil cabang.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Edit Branch</strong></td><td class="border px-2 py-1">Fitur pembaruan profil cabang. Atribut <i>Company Parent</i> dan <i>Branch Code</i> tidak dapat diubah setelah data tersimpan (<i>Immutable</i>).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Data Isolation (Global Scope)</strong></td><td class="border px-2 py-1">Sistem akan secara implisit menerapkan <i>Global Scope</i> pada level ORM (Eloquent) sehingga staf yang login hanya dapat melihat cabang yang di-<i>assign</i> kepadanya, beserta dokumen turunannya.</td></tr>
 </tbody>
 </table>

 <h2>7. Controls & Authorization</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Role Level</th><th class="border px-2 py-1">Hak Akses (Permissions)</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Super Admin</strong></td><td class="border px-2 py-1">Akses penuh absolut tanpa batasan cabang (Create, Edit, Delete, View All).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Branch Manager</strong></td><td class="border px-2 py-1">Hanya dapat <i>View</i> dan mengedit data kontak pada cabang miliknya sendiri.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Staff Operasional</strong></td><td class="border px-2 py-1">Tidak memiliki akses ke modul Master Branch. Hanya menerima efek isolasi data secara transparan.</td></tr>
 </tbody>
 </table>

 <h2>8. Status & Blocking</h2>
 <p>Siklus hidup cabang menentukan perilaku seluruh dokumen di bawahnya:</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Status Siklus Hidup</th><th class="border px-2 py-1">Efek & Blokir Sistem</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Active</strong></td><td class="border px-2 py-1">Cabang beroperasi normal. Menerima pembuatan Sales Order, Purchase Order, dan Goods Movement.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Inactive</strong></td><td class="border px-2 py-1">Cabang dibekukan sementara. Menolak segala jenis pembuatan dokumen transaksi baru, namun dokumen lama (histori) tetap dapat dilihat dan dilanjutkan <i>workflow</i>-nya jika belum selesai.</td></tr>
 </tbody>
 </table>

 <h2>9. Business Rules (BR)</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">ID Business Rule</th><th class="border px-2 py-1">Deskripsi Aturan Logika Bisnis</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>BR-01 (Mandatory Parent)</strong></td><td class="border px-2 py-1">Setiap cabang wajib berada di bawah satu entitas perusahaan induk (Company) yang berstatus <i>Active</i>.</td></tr>
 <tr><td class="border px-2 py-1"><strong>BR-02 (Immutability)</strong></td><td class="border px-2 py-1">Setelah disimpan, relasi antara Cabang dan Perusahaan Induk tidak dapat dipindah tangankan ke Perusahaan Induk lain untuk menghindari <i>corrupt</i> pembukuan jurnal akuntansi.</td></tr>
 <tr><td class="border px-2 py-1"><strong>BR-03 (Transaction Injection)</strong></td><td class="border px-2 py-1">Seluruh dokumen transaksi operasional (SO, PO, GI, GR, Invoice) yang dibuat oleh <i>user</i> secara otomatis di-<i>inject</i> ID Cabangnya tanpa perlu input manual, berdasarkan profil <i>user</i> tersebut.</td></tr>
 <tr><td class="border px-2 py-1"><strong>BR-04 (Deletion Protection)</strong></td><td class="border px-2 py-1">Cabang dilindungi dari penghapusan fisik (<i>Hard Delete</i>) apabila sudah direferensikan oleh tabel <code>users</code> (User Assignment) atau memiliki transaksi.</td></tr>
 </tbody>
 </table>

 <h2>10. Default Values</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Atribut Nilai Dasar</th><th class="border px-2 py-1">Logika Sistem Default</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Status</strong></td><td class="border px-2 py-1">Sistem akan mengeset nilai <i>default</i> <code>Active</code> secara otomatis pada saat pembuatan cabang baru kecuali diubah manual.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Country/Region</strong></td><td class="border px-2 py-1">Mengambil <i>default</i> dari <i>Country</i> yang digunakan oleh Perusahaan Induk.</td></tr>
 </tbody>
 </table>

 <h2>11. Validation Rules</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Aturan Validasi Sistem</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Branch Code</strong></td><td class="border px-2 py-1">Required, Unique (di seluruh tabel), Alfanumerik, Max 10 Karakter, Kapital.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Company ID</strong></td><td class="border px-2 py-1">Required, Exist in <code>companies.id</code>.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Email</strong></td><td class="border px-2 py-1">Format RFC Email yang valid, opsional.</td></tr>
 </tbody>
 </table>

 <h2>12. Audit Requirements</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Kebutuhan Audit</th><th class="border px-2 py-1">Detail Pelacakan & Log</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Monitoring Aktif</strong></td><td class="border px-2 py-1">Sistem memonitor secara ketat melalui <code>AuditLogService</code>. Data yang di-<i>capture</i> meliputi: IP Address, User ID pembuat, Timestamp, dan rekaman Snapshot JSON profil cabang (Before & After) untuk investigasi forensik jika ada perubahan alamat atau status.</td></tr>
 </tbody>
 </table>

 <h2>13. Acceptance Criteria (AC)</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Kriteria Penerimaan (AC)</th><th class="border px-2 py-1">Skenario Pengujian Validasi</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>AC-01</strong></td><td class="border px-2 py-1">Apabila user menginput Branch Code "JKT-01" yang sudah ada, sistem menampilkan <i>Error Validation: Kode Cabang sudah digunakan</i>.</td></tr>
 <tr><td class="border px-2 py-1"><strong>AC-02</strong></td><td class="border px-2 py-1">Di mode Edit, <i>dropdown</i> Company Code dan isian Branch Code otomatis berwarna abu-abu (<i>disabled</i>) dan menolak <i>payload spoofing</i> dari POST Request.</td></tr>
 <tr><td class="border px-2 py-1"><strong>AC-03</strong></td><td class="border px-2 py-1">Mencoba menghapus (<i>Delete</i>) cabang yang sudah memiliki transaksi akan memunculkan <i>Error Constraint</i> dan menggagalkan aksi.</td></tr>
 </tbody>
 </table>

 <h2>14. Dependencies</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Ketergantungan (Relasi)</th><th class="border px-2 py-1">Dampak Terhadap Sistem Eksternal</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>BRD-001 (Master Company)</strong></td><td class="border px-2 py-1">Prasyarat mutlak. Cabang tidak bisa dibuat tanpa Company.</td></tr>
 <tr><td class="border px-2 py-1"><strong>BRD-048 (Document Numbering Engine)</strong></td><td class="border px-2 py-1">Membutuhkan variabel Branch Code untuk meracik nomor urut dokumen (Contoh: `INV/JKT-01/2026/001`).</td></tr>
 <tr><td class="border px-2 py-1"><strong>BRD-010 (Master User/Role)</strong></td><td class="border px-2 py-1">User Assignment engine sangat bergantung pada ID cabang.</td></tr>
 </tbody>
 </table>
</div>',
                'created_at' => '2026-07-18 02:35:27',
                'updated_at' => '2026-07-18 02:38:19',
            ),
            49 => 
            array (
                'id' => 104,
                'brd_code' => 'BRD-046',
            'title' => 'Purchase Requisition (PR)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-046</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Purchase Requisition (PR)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Materials Management (MM) - Purchasing</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Pengajuan Pembelian &amp; Persetujuan</td><td class="border px-2 py-1">Pembuatan PR baik untuk barang berwujud (Inventory), Jasa, Biaya Langsung (Expense), maupun Kapitalisasi Aset dengan alokasi Cost Center parsial, beserta **Alur Persetujuan Bertingkat (Approval Matrix)**.</td><td class="border px-2 py-1">Konversi otomatis PR ke PO tanpa melalui fase Approval.</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Account Assignment Category</td><td class="border px-2 py-1">Kategori yang mendikte ke mana biaya PR akan dibebankan (MATERIAL, SERVICE, EXPENSE, ASSET).</td><td class="border px-2 py-1">Kategori EXPENSE wajib mencantumkan `cost_center_id` yang valid.</td></tr>
        <tr><td class="border px-2 py-1">Partial Allocation</td><td class="border px-2 py-1">Satu baris PR (misal: 10 PC Komputer) dapat dialokasikan biayanya ke 2 Cost Center berbeda (misal: 5 PC ke IT, 5 PC ke HRD).</td><td class="border px-2 py-1">Total persentase alokasi parsial wajib mencapai 100%.</td></tr>
        <tr><td class="border px-2 py-1">Approval Matrix (Approvals)</td><td class="border px-2 py-1">Mekanisme bertingkat di mana PR dengan nilai tertentu harus disetujui oleh atasan berjenjang (Level 1, Level 2, dst).</td><td class="border px-2 py-1">Status PR hanya bisa menjadi APPROVED jika seluruh Level Approval telah berstatus APPROVED.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Budget Control / Commitment</td><td class="border px-2 py-1">Nilai estimasi di PR akan langsung memakan plafon anggaran sementara (*Commitment Budget*) Cost Center setelah disetujui secara keseluruhan.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">purchase_requisitions</td><td class="border px-2 py-1">One-to-Many (1:N) ke Lines</td><td class="border px-2 py-1">Header dokumen (Cabang Peminta, Tanggal).</td></tr>
        <tr><td class="border px-2 py-1">purchase_requisition_lines</td><td class="border px-2 py-1">One-to-Many (1:N) ke Assignments</td><td class="border px-2 py-1">Rincian barang, kuantitas, harga estimasi, dan batas tanggal *delivery*.</td></tr>
        <tr><td class="border px-2 py-1">purchase_requisition_account_assignments</td><td class="border px-2 py-1">Many-to-One (N:1) ke Lines</td><td class="border px-2 py-1">Tabel distribusi pembebanan anggaran multi Cost-Center.</td></tr>
        <tr><td class="border px-2 py-1">purchase_requisition_approvals</td><td class="border px-2 py-1">One-to-Many (1:N) dari Header</td><td class="border px-2 py-1">Menyimpan riwayat dan jenjang persetujuan per dokumen PR (Tingkat 1, Tingkat 2).</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Free-Text Item</td><td class="border px-2 py-1">Untuk kategori EXPENSE, user diperbolehkan mengisi `short_text` manual tanpa `material_id`, tetapi wajib memilih `material_group_id` demi analitik.</td></tr>
        <tr><td class="border px-2 py-1">Approval Generation</td><td class="border px-2 py-1">Saat PR disubmit, sistem akan mengkalkulasi matriks dari *Approval Engine* dan menyuntikkan baris ke `purchase_requisition_approvals`.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Semua Karyawan / Requester</td><td class="border px-2 py-1">Create PR</td><td class="border px-2 py-1">Bisa membuat PR, tetapi hanya dapat membebankan anggaran pada *Cost Center* di divisinya (Row-level Security).</td></tr>
        <tr><td class="border px-2 py-1">Cost Center Manager</td><td class="border px-2 py-1">Approve PR</td><td class="border px-2 py-1">Wajib menyetujui jika pembebanan melebihi batas batas auto-approval. Hanya approver di level saat ini (PENDING) yang bisa menyetujui.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">COMPLETED</td><td class="border px-2 py-1">Seluruh `qty_requested` telah terpenuhi dan diubah menjadi PO (artinya `qty_ordered` >= `qty_requested`).</td></tr>
        <tr><td class="border px-2 py-1">REJECTED (Approval)</td><td class="border px-2 py-1">Jika ada satu approver menolak, seluruh dokumen PR menjadi berstatus REJECTED.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-46-01</td><td class="border px-2 py-1">Asset Mandatory Assignment</td><td class="border px-2 py-1">Jika baris menggunakan *Item Category* ASSET, wajib mengisi `fixed_asset_id` di tab Assignment.</td></tr>
        <tr><td class="border px-2 py-1">BR-46-02</td><td class="border px-2 py-1">Sequential Approval</td><td class="border px-2 py-1">Approver Level 2 tidak dapat melihat atau memproses PR jika Level 1 belum menyetujuinya.</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">status</td><td class="border px-2 py-1">DRAFT saat di-save, berubah IN_APPROVAL saat ditekan tombol Submit.</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Required Date Validation</td><td class="border px-2 py-1">`required_date` (Kapan barang dibutuhkan) harus >= Tanggal Sekarang. Tidak boleh mundur (Backdated).</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Medium</td><td class="border px-2 py-1">User yang menolak (REJECTED) PR wajib memasukkan justifikasi.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Sistem berhasil membuat 2 jenjang approver ketika nilai PR melebihi Rp 10 Juta (tercatat di `purchase_requisition_approvals`).</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Approval Engine</td><td class="border px-2 py-1">PR harus melalui multi-tier approval berdasarkan nilai total *estimated price*.</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-18 03:48:28',
                'updated_at' => '2026-07-18 03:54:25',
            ),
            50 => 
            array (
                'id' => 105,
                'brd_code' => 'BRD-071',
                'title' => 'Customer Payment',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-51</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Customer Payment (Penerimaan Pembayaran)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Sales &amp; Distribution / Accounts Receivable</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur penerimaan pembayaran dari pelanggan (Customer Payment / AR Receipt) untuk melunasi tagihan AR Invoice baik secara penuh (full payment), sebagian (partial payment), maupun pemanfaatan uang muka penjualan.</p>
    <ul>
        <li><strong>In Scope:</strong> Rekonsiliasi penerimaan kas/bank, alokasi pembayaran multi-invoice untuk satu customer, pencatatan giro/cek dalam perjalanan, dan pelacakan 3 tanggal wajib (document_date, posting_date, entry_date).</li>
        <li><strong>Out of Scope:</strong> Penerimaan kas kecil operasional internal cabang (diatur pada Petty Cash BRD-21).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Receivable Clearing & Cash Reconciliation** — memastikan pelunasan piutang dicatat secara akurat berdasarkan nominal uang masuk di rekening bank perusahaan, mengurangi sisa outstanding piutang customer secara real-time, dan menjurnal penerimaan dana kas.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>customer_payments</code></strong> — Menyimpan header penerimaan pembayaran dari pelanggan (informasi bank asal, total bayar, tanggal bayar, mata uang, nilai kurs, biaya administrasi bank, nomor referensi, status kliring bank).</li>
        <li><strong>Tabel: <code>customer_payment_allocations</code></strong> — Menyimpan detail alokasi pelunasan piutang ke satu atau beberapa dokumen AR Invoice outstanding, nominal alokasi pelunasan, nominal penghapusan selisih kecil (write-off), dan penugasan audit trail.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Alokasi Multi-Invoice:</strong> Pembayaran satu nominal transfer bank dapat dialokasikan untuk melunasi beberapa dokumen AR Invoice secara parsial atau penuh.</li>
        <li><strong>Jurnal Akuntansi:</strong> Debit Akun Kas/Bank (atau piutang giro) vs Kredit Piutang Dagang (AR).</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Pemberlakuan validasi nominal bayar tidak boleh melebihi sisa outstanding piutang faktur terkait.</li>
        <li>Isolasi mutasi rekening kas bank per entitas regional cabang (branch_id).</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <h3>7.1 Pengakuan PPN Uang Muka (Down Payment Tax Compliance)</h3>
    <p>Setiap penerimaan pembayaran yang diidentifikasi sebagai Uang Muka Penjualan (Customer Down Payment) wajib dikenakan PPN Keluaran (PPN 11%) pada saat uang diterima. Sistem harus menerbitkan Faktur Pajak Uang Muka secara otomatis guna memenuhi regulasi perpajakan yang berlaku.</p>
    
    <h3>7.2 Regulasi Kepatuhan Perbankan &amp; AML (Anti-Money Laundering)</h3>
    <p>Setiap pencatatan penerimaan dana wajib dilengkapi dengan nomor referensi transfer bank (reference_number) dan lampiran bukti transfer sebagai audit trail. Pembayaran tunai di atas Rp 100.000.000,- wajib ditandai untuk pelaporan transaksi keuangan mencurigakan sesuai regulasi PPATK.</p>

    <h2>8. Status & Blocking</h2>
    <p>Pembayaran yang sudah berstatus <code>POSTED</code> terkunci secara permanen. Pembatalan pelunasan hanya bisa dilakukan melalui pembatalan dokumen (Reversal) dengan approval manajer.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Outstanding Limit):</strong> Nominal alokasi pembayaran dilarang melebihi nilai sisa outstanding piutang pada AR Invoice terkait.</li>
        <li><strong>BR-02 (Chronological Check):</strong> Tanggal posting pembayaran (posting_date) dilarang lebih kecil dari tanggal posting AR Invoice yang dilunasi.</li>
        <li><strong>BR-03 (Bank Validation):</strong> Mutasi kas masuk wajib merujuk ke akun rekening bank yang berstatus aktif di COA.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Saldo outstanding piutang pelanggan berkurang secara presisi seketika saat status pembayaran berubah menjadi <code>POSTED</code>.</li>
        <li>AC-02: Akun Kas/Bank Buku Besar didebit secara akurat berdasarkan nominal dana masuk.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul AR Invoice (BRD-13 / FSD-14).</li>
        <li>Modul Bagan Akun &amp; Rekening Bank (BRD-08 / FSD-08).</li>
    </ul>
</div>',
                'created_at' => '2026-07-18 11:15:23',
                'updated_at' => '2026-07-18 11:39:57',
            ),
            51 => 
            array (
                'id' => 106,
                'brd_code' => 'BRD-048',
            'title' => 'Quotation Comparison Form (QCF)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-048</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Quotation Comparison Form (QCF)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Materials Management (MM) - Purchasing</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Evaluasi Pemenang Tender</td><td class="border px-2 py-1">Pembuatan form perbandingan otomatis dari RFQ, justifikasi *Awarding* (termasuk parsial/split award), dan *Approval* penunjukan vendor.</td><td class="border px-2 py-1">Proses negosiasi berulang (Re-bidding), dilakukan secara luring dan *update* harga di menu RFQ.</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Split Awarding</td><td class="border px-2 py-1">Satu baris permintaan (misal: 100 Sak Semen) bisa dimenangkan oleh 2 vendor sekaligus (misal: Vendor A = 60, Vendor B = 40).</td><td class="border px-2 py-1">Total kuantitas yang dimenangkan (`awarded_qty`) tidak boleh melebihi kuantitas yang diminta di RFQ Line.</td></tr>
        <tr><td class="border px-2 py-1">Justification Enforcement</td><td class="border px-2 py-1">Jika *Buyer* tidak memenangkan vendor dengan Harga Termurah, mereka wajib mengisi kolom `notes` (Justifikasi).</td><td class="border px-2 py-1">QCF tidak dapat disubmit (Error 422) jika harga terendah ditolak tanpa penjelasan tertulis.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Good Corporate Governance (GCG)</td><td class="border px-2 py-1">Alasan penolakan vendor termurah harus diaudit dan tidak boleh dihapus setelah dokumen QCF disetujui.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">quotation_comparison_forms</td><td class="border px-2 py-1">One-to-One (1:1) ke RFQ Header</td><td class="border px-2 py-1">Induk dokumen keputusan tender yang terikat langsung ke 1 dokumen RFQ.</td></tr>
        <tr><td class="border px-2 py-1">quotation_comparison_lines</td><td class="border px-2 py-1">One-to-Many (1:N) ke RFQ Vendor Lines</td><td class="border px-2 py-1">Hanya menyimpan baris penawaran vendor yang mendapatkan porsi kemenangan (`awarded_qty` > 0).</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Visual Rank Highlighting</td><td class="border px-2 py-1">UI (Frontend) bertugas melakukan *sorting* dan mewarnai kolom harga termurah dengan warna Hijau (Rank 1). Jika baris ini tidak diberikan *Awarded Qty*, muncul *prompt* justifikasi.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Purchasing Manager</td><td class="border px-2 py-1">Approve QCF</td><td class="border px-2 py-1">Wajib melakukan persetujuan ganda jika *Buyer* memilih *Split Award* (Kemenangan terbagi).</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">APPROVED</td><td class="border px-2 py-1">Setelah QCF berstatus APPROVED, sistem akan meng-update baris PR menjadi berstatus `PARTIALLY_ORDERED` atau langsung memfasilitasi konversi otomatis ke *Purchase Order* (PO).</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-48-01</td><td class="border px-2 py-1">Single Form Constraint</td><td class="border px-2 py-1">Satu dokumen RFQ hanya boleh memiliki 1 (Satu) form QCF yang aktif. (*Unique Index on request_for_quotation_id*).</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">comparison_date</td><td class="border px-2 py-1">Otomatis `CURDATE()` saat *user* menekan tombol *Create QCF*.</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Zero Award Validation</td><td class="border px-2 py-1">Setidaknya harus ada 1 vendor yang memenangkan 1 item agar QCF bisa diajukan (Status In Approval).</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tinggi</td><td class="border px-2 py-1">Penolakan dari Manager (`REJECTED`) wajib mencantumkan alasan penolakan pada tabel `notes` tingkat *Header*.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Pengguna memilih Vendor B (Rp 12.000) alih-alih Vendor A (Rp 10.000). Saat disubmit, API melempar *Error 422* karena kolom *Justification/Notes* pada baris tersebut kosong.</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">RFQ Responses</td><td class="border px-2 py-1">QCF tidak dapat dibuka jika dokumen RFQ belum mencapai tenggat waktu (`quotation_deadline`) kecuali semua vendor telah merespons (`has_responded` = TRUE).</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-18 11:52:24',
                'updated_at' => '2026-07-18 12:03:56',
            ),
            52 => 
            array (
                'id' => 107,
                'brd_code' => 'BRD-047',
            'title' => 'Request for Quotation (RFQ)',
                'project_id' => NULL,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-047</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Request for Quotation (RFQ)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Materials Management (MM) - Purchasing</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tender / Permintaan Penawaran</td><td class="border px-2 py-1">Dokumentasi undangan tender (RFQ) yang merujuk pada PR, daftar vendor yang diundang, dan input respons harga/kondisi dari tiap vendor.</td><td class="border px-2 py-1">Analisa perbandingan dan keputusan pemenang (di-handle oleh Quotation Comparison / QCF pada BRD-048).</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Matrix RFQ</td><td class="border px-2 py-1">Satu dokumen RFQ bisa mengundang banyak Vendor untuk banyak Material sekaligus.</td><td class="border px-2 py-1">Setiap vendor wajib memasukkan harganya sendiri-sendiri tanpa tumpang tindih.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Fair Play Bidding</td><td class="border px-2 py-1">Identitas dan harga dari vendor kompetitor dirahasiakan satu sama lain.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">request_for_quotations</td><td class="border px-2 py-1">1:N ke Lines &amp; Vendors</td><td class="border px-2 py-1">Header RFQ dengan tenggat waktu penawaran (`quotation_deadline`).</td></tr>
        <tr><td class="border px-2 py-1">request_for_quotation_lines</td><td class="border px-2 py-1">N:1 ke PR Lines</td><td class="border px-2 py-1">Daftar barang/jasa yang ditenderkan.</td></tr>
        <tr><td class="border px-2 py-1">request_for_quotation_vendors</td><td class="border px-2 py-1">1:N ke Vendor Lines</td><td class="border px-2 py-1">Daftar peserta vendor yang diundang.</td></tr>
        <tr><td class="border px-2 py-1">request_for_quotation_vendor_lines</td><td class="border px-2 py-1">Persilangan Vendor &amp; Item</td><td class="border px-2 py-1">Tempat user memasukkan harga (`net_price`) yang ditawarkan oleh vendor untuk baris barang tersebut.</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Maintain Quotation</td><td class="border px-2 py-1">Setelah vendor mengirim *quote* (fisik/email), *Buyer* masuk ke menu Maintain Quotation dan menginput nilai `net_price` ke `request_for_quotation_vendor_lines`.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Purchasing Group / Buyer</td><td class="border px-2 py-1">Create/Update RFQ</td><td class="border px-2 py-1">Hanya bisa menenderkan item PR yang di-*assign* ke *Purchasing Group* miliknya.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">PUBLISHED</td><td class="border px-2 py-1">Dokumen RFQ telah dianggap rilis ke eksternal, list vendor tidak dapat dihapus lagi.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-47-01</td><td class="border px-2 py-1">Deadline Enforcement</td><td class="border px-2 py-1">Sistem mencegah input *Maintain Quotation* (respons harga) jika tanggal hari ini telah melewati `quotation_deadline`.</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">has_responded</td><td class="border px-2 py-1">FALSE pada tabel vendor, berubah TRUE otomatis saat ada harga diinput ke *lines*.</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Minimum Vendor Check</td><td class="border px-2 py-1">Sistem memberi peringatan (*Warning*, bukan Error) jika RFQ disimpan dengan jumlah vendor < 3 (sesuai regulasi wajar *Bidding*).</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Medium</td><td class="border px-2 py-1">Semua input *net_price* dicatat beserta timestamp (waktu input tender).</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">*User* mampu membuat RFQ yang isinya berasal dari 2 PR yang berbeda namun memiliki material yang sama (Konsolidasi).</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Purchase Requisition (PR)</td><td class="border px-2 py-1">RFQ mewajibkan status PR sudah APPROVED. PR yang masih DRAFT tidak bisa ditenderkan.</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-18 11:58:04',
                'updated_at' => '2026-07-18 12:03:36',
            ),
            53 => 
            array (
                'id' => 108,
                'brd_code' => 'BRD-068',
            'title' => 'Vendor Payment (Payment Voucher)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-54</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Vendor Payment (Pembayaran Supplier)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Materials Management / Accounts Payable</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur ketentuan bisnis pengeluaran dana kas/bank perusahaan untuk melunasi tagihan hutang supplier (Vendor Payment / Payment Voucher) secara penuh, sebagian, maupun pengakuan pembayaran uang muka pembelian.</p>
    <ul>
        <li><strong>In Scope:</strong> Rekonsiliasi pengeluaran kas/bank, alokasi nominal pembayaran multi-invoice untuk satu supplier, pencatatan giro/cek keluar, biaya transfer bank, dan pelacakan 3 tanggal wajib (document_date, posting_date, entry_date).</li>
        <li><strong>Out of Scope:</strong> Pengeluaran kas kecil operasional internal cabang (diatur pada Petty Cash BRD-21).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Liability Clearing & Cash Outflow Control** — mengesahkan pembayaran hutang dagang, memotong outstanding saldo hutang supplier, serta mencatat pengeluaran uang kas/bank secara akurat di Buku Besar.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>supplier_payments</code></strong> — Menyimpan header bukti pengeluaran dana kas/bank untuk pelunasan hutang vendor.</li>
        <li><strong>Tabel: <code>supplier_payment_allocations</code></strong> — Menyimpan rincian alokasi nominal dana untuk melunasi masing-masing AP Invoice terkait, termasuk penyesuaian selisih kecil (write-off).</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Alokasi Multi-Invoice:</strong> Satu nominal transaksi pengeluaran bank dapat dialokasikan untuk melunasi beberapa dokumen AP Invoice outstanding.</li>
        <li><strong>Jurnal Akuntansi:</strong> Debit Hutang Dagang (AP) vs Kredit Akun Kas/Bank.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Pemberlakuan matriks otorisasi tanda tangan/approval berjenjang berdasarkan total nominal pembayaran voucher.</li>
        <li>Batas deviasi nominal alokasi pelunasan tidak boleh melebihi sisa outstanding hutang faktur terkait.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <h3>7.1 Kepatuhan Bukti Potong Pajak (WHT Compliance)</h3>
    <p>Pembayaran wajib memvalidasi apakah tagihan rujukan memiliki potongan pajak WHT. Jika iya, pembayaran hanya dilakukan sebesar nilai bersih setelah dikurangi WHT.</p>
    
    <h3>7.2 Regulasi Kepatuhan Perbankan</h3>
    <p>Setiap voucher pembayaran wajib mencantumkan informasi detail bank penerima (nama bank, nomor rekening, nama pemilik rekening) untuk pemenuhan regulasi transfer dana aman.</p>

    <h2>8. Status & Blocking</h2>
    <p>Dokumen Payment Voucher berstatus <code>POSTED</code> terkunci secara permanen. Koreksi pelunasan hanya dapat dilakukan via mekanisme Reversal/Cancellation dengan approval manajer finance.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Outstanding Limit):</strong> Nominal alokasi pelunasan (allocated_amount) dilarang melebihi sisa outstanding hutang AP Invoice rujukan.</li>
        <li><strong>BR-02 (Chronological Check):</strong> Tanggal posting pembayaran (posting_date) dilarang lebih kecil dari tanggal posting AP Invoice yang dilunasi.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Saldo outstanding AP Invoice berkurang secara real-time seketika setelah status pembayaran berubah menjadi <code>POSTED</code>.</li>
        <li>AC-02: Akun Kas/Bank Buku Besar berkurang secara akurat di neraca saldo.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul AP Invoice (BRD-20 / FSD-26).</li>
        <li>Modul Master Vendor &amp; Bagan Akun (BRD-06 / BRD-08).</li>
    </ul>
</div>',
                'created_at' => '2026-07-18 12:10:45',
                'updated_at' => '2026-07-18 12:34:52',
            ),
            54 => 
            array (
                'id' => 109,
                'brd_code' => 'BRD-067',
            'title' => 'Payment Proposal (Proposal Pembayaran)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-55</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Payment Proposal (Proposal Pembayaran)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Materials Management / Accounts Payable</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur ketentuan bisnis pembuatan draf rencana pembayaran tagihan supplier (Payment Proposal / Proposal Pembayaran) berdasarkan jatuh tempo invoice, ketersediaan kas bank, dan prioritas vendor, guna mendapatkan otorisasi persetujuan sebelum dana kas benar-benar dikeluarkan.</p>
    <ul>
        <li><strong>In Scope:</strong> Seleksi otomatis tagihan outstanding yang mendekati jatuh tempo (due invoices run), pengelompokan pembayaran per vendor, estimasi kebutuhan arus kas keluar, alur persetujuan bertingkat (approval workflow), dan penguncian invoice yang diajukan agar tidak dibayar ganda.</li>
        <li><strong>Out of Scope:</strong> Eksekusi pemindahan dana bank fisik dan pencetakan cek (diatur pada Payment Voucher BRD-54).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Cash Outflow Planning & Treasury Control** — menyediakan alat bantu bagi tim perbendaharaan (treasury) untuk menyeleksi dan merencanakan pengeluaran dana mingguan/bulanan, serta mencegah pengeluaran dana tanpa persetujuan manajemen keuangan senior.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>payment_proposals</code></strong> — Header proposal mencatat nomor rencana pembayaran, total nominal yang diusulkan, tanggal rencana bayar, dan status persetujuan.</li>
        <li><strong>Tabel: <code>payment_proposal_lines</code></strong> — Rincian faktur supplier (AP Invoice) yang diusulkan untuk dilunasi beserta usulan nilai nominal pelunasannya.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Proposal Run Parameters:</strong> Pengguna dapat melakukan pencarian otomatis invoice berdasarkan kriteria tanggal jatuh tempo, grup vendor, atau entitas cabang.</li>
        <li><strong>Invoice Blocking:</strong> Selama invoice masuk dalam draf proposal berstatus aktif (UNDER_REVIEW/APPROVED), invoice tersebut diblokir dari pencatatan pembayaran langsung lainnya.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Proposal yang ditolak (REJECTED) akan membebaskan kembali status invoice menjadi outstanding terbuka (UNPAID).</li>
        <li>Sistem membatasi nominal usulan bayar (proposed_amount) maksimal sebesar sisa saldo outstanding invoice rujukan.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Verifikasi kepatuhan potongan pajak WHT (PPh) pada masing-masing invoice yang diajukan dalam proposal untuk memastikan ketepatan nominal dana bersih transfer.</p>

    <h2>8. Status & Blocking</h2>
    <p>Proposal dengan status <code>PROCESSED</code> (telah ditarik menjadi Payment Voucher) akan terkunci secara permanen dan tidak dapat diubah kembali.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Approval Hard Limit):</strong> Rencana pengeluaran kas di atas Rp 200.000.000,- wajib mendapat persetujuan minimal dari Direktur Keuangan.</li>
        <li><strong>BR-02 (Due Date Filter):</strong> Sistem secara default hanya merekomendasikan invoice yang memiliki tanggal jatuh tempo &le; 7 hari dari tanggal rencana bayar.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Invoice yang masuk dalam proposal berstatus disetujui dapat ditarik secara massal menjadi draf dokumen Payment Voucher (Vendor Payment).</li>
        <li>AC-02: Sistem menampilkan pesan error jika ada invoice yang sama dimasukkan ke dalam dua dokumen proposal pembayaran aktif.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul AP Invoice (BRD-20 / FSD-26).</li>
        <li>Modul Vendor Payment / Payment Voucher (BRD-54 / FSD-32).</li>
    </ul>
</div>',
                'created_at' => '2026-07-18 12:14:00',
                'updated_at' => '2026-07-18 12:35:11',
            ),
            55 => 
            array (
                'id' => 110,
                'brd_code' => 'BRD-066',
            'title' => 'Vendor Down Payment (Uang Muka Vendor)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-56</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Vendor Down Payment (Uang Muka Vendor)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Materials Management / Accounts Payable</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur ketentuan bisnis pembayaran uang muka pembelian kepada supplier (Vendor Down Payment / Uang Muka Vendor) atas dasar Purchase Order (PO) yang disepakati, termasuk penanganan pengakuan aset uang muka, pemotongan PPN Masukan atas uang muka, dan mekanisme rekonsiliasi pemotongan (offsetting) pada saat tagihan final (AP Invoice) masuk.</p>
    <ul>
        <li><strong>In Scope:</strong> Pencatatan uang muka pembelian berdasar rujukan PO; pengakuan piutang uang muka kerja di neraca (Kepala 1); perhitungan PPN Masukan atas uang muka; pembentukan jurnal kas keluar uang muka; pelacakan sisa saldo uang muka yang belum diapply (outstanding down payment); dan pelacakan 3 tanggal wajib (document_date, posting_date, entry_date).</li>
        <li><strong>Out of Scope:</strong> Uang muka kerja perjalanan dinas karyawan (diurus di Petty Cash/HR).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Prepayment Asset Management & Tax Compliance** — mengamankan pencatatan dana uang muka sebagai aset lancar perusahaan sebelum barang/jasa diserahterimakan, serta memastikan Faktur Pajak Masukan atas uang muka dicatat sesuai aturan perpajakan.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>vendor_down_payments</code></strong> — Header mencatat nomor bukti uang muka, tautan Purchase Order, nominal bayar, PPN uang muka, sisa saldo uang muka terbuka (outstanding_balance), dan status posting.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Down Payment Request:</strong> Dapat merujuk pada persentase uang muka di PO (misal: 30% Down Payment).</li>
        <li><strong>Jurnal Akuntansi saat Bayar DP:</strong> Debit Piutang Uang Muka Supplier (Aset) + PPN Masukan vs Kredit Kas/Bank.</li>
        <li><strong>AP Offsetting (Reconciliation):</strong> Saat AP Invoice final diposting, uang muka yang terbayar dapat ditarik untuk mengurangi total kewajiban hutang akhir (Debit Hutang Dagang vs Kredit Piutang Uang Muka Supplier).</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Uang muka wajib berstatus <code>POSTED</code> agar dapat diapply pada AP Invoice atau dikompensasikan (offsetting) di Vendor Payment.</li>
        <li>Total kompensasi uang muka dilarang melebihi sisa saldo uang muka terbuka (outstanding_balance).</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Setiap pembayaran uang muka berhak atas penerimaan Faktur Pajak Masukan (PPN 11%) dari supplier pada saat uang muka ditransfer.</p>

    <h2>8. Status & Blocking</h2>
    <p>Pembatalan uang muka yang sudah diposting hanya dapat dilakukan jika uang muka belum pernah dikompensasikan (outstanding_balance = amount).</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (PO Balance Control):</strong> Nominal uang muka dilarang melebihi nilai total kotor pada PO rujukan.</li>
        <li><strong>BR-02 (Offsetting Order):</strong> Saldo kompensasi uang muka berkurang secara FIFO saat diaplikasikan ke satu atau beberapa AP Invoice.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Jurnal piutang uang muka terposting ke neraca saldo dengan benar.</li>
        <li>AC-02: Sistem menampilkan sisa saldo uang muka yang belum digunakan pada modul kartu hutang vendor.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul Purchase Order (BRD-15 / FSD-20).</li>
        <li>Modul AP Invoice &amp; Vendor Payment (BRD-20 / BRD-54 / FSD-26 / FSD-32).</li>
    </ul>
</div>',
                'created_at' => '2026-07-18 12:38:31',
                'updated_at' => '2026-07-18 12:39:51',
            ),
            56 => 
            array (
                'id' => 111,
                'brd_code' => 'BRD-058',
            'title' => 'Customer Quotation (Penawaran Penjualan)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-57</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Customer Quotation (Penawaran Penjualan)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Sales &amp; Distribution (SD)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur ketentuan bisnis pembuatan dan pengajuan penawaran harga kepada calon pelanggan (Customer Quotation / Surat Penawaran Penjualan) sebelum penerbitan Sales Order (SO), guna memberikan estimasi harga, kuantitas barang, termin pembayaran, serta masa berlaku penawaran secara tertulis.</p>
    <ul>
        <li><strong>In Scope:</strong> Pembuatan draf surat penawaran harga penjualan; perhitungan harga jual mengacu pada modul Sales Pricing Engine (BRD-04); penentuan batas masa berlaku penawaran (valid_until_date); pelacakan status penawaran; dan konversi otomatis menjadi draf Sales Order (SO) setelah disetujui pelanggan.</li>
        <li><strong>Out of Scope:</strong> Aktivitas pemasaran, negosiasi harga di luar sistem, dan tanda tangan kontrak payung (Sales Contract).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Pre-Sales Sourcing & Pricing Control** — memastikan harga jual yang ditawarkan kepada pelanggan disetujui secara internal berdasarkan margin yang sehat dan memiliki validitas hukum batas waktu tertentu sebelum mengikat menjadi pesanan resmi.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>customer_quotations</code></strong> — Header penawaran mencatat nomor dokumen penawaran, identitas pelanggan, masa berlaku, total nilai penawaran, mata uang, dan status persetujuan.</li>
        <li><strong>Tabel: <code>customer_quotation_lines</code></strong> — Rincian item barang/jasa yang ditawarkan, kuantitas, diskon, tarif pajak PPN, dan nilai bersih per baris detail.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Sales Pricing Engine Integration:</strong> Penawaran harga default disalin otomatis dari Sales Price List (BRD-04), dengan toleransi diskon manual tingkat baris berdasarkan hak akses user.</li>
        <li><strong>Validity Control:</strong> Sistem memblokir konversi quotation menjadi Sales Order jika tanggal konversi melebihi batas tanggal masa berlaku (valid_until_date).</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Setiap penawaran dengan pemberian diskon di atas limit wewenang Sales Representative memerlukan persetujuan Sales Manager.</li>
        <li>Satu dokumen Customer Quotation yang telah disetujui (ACCEPTED) dapat ditransisikan menjadi satu atau beberapa dokumen Sales Order (SO).</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Perhitungan estimasi PPN Keluaran (11%) wajib dicantumkan pada draf penawaran agar pelanggan menerima informasi total nilai tagihan bersih secara transparan.</p>

    <h2>8. Status & Blocking</h2>
    <p>Quotation yang berstatus <code>EXPIRED</code> diblokir dari proses konversi ke Sales Order secara sistem, kecuali masa berlakunya diperpanjang terlebih dahulu melalui amandemen baru.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Validity Range):</strong> Masa berlaku penawaran (valid_until_date) minimal 3 hari dan maksimal 90 hari sejak tanggal pembuatan dokumen (document_date).</li>
        <li><strong>BR-02 (Margin Control):</strong> Sistem memblokir pengajuan penawaran jika harga jual yang ditawarkan berada di bawah Harga Pokok Penjualan (HPP) barang terkait, kecuali memiliki otorisasi otentikasi level Direktur.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Sales Order (SO) dapat di-generate otomatis dari Customer Quotation berstatus ACCEPTED dengan menyalin seluruh baris item, harga, dan diskon secara akurat.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul Data Barang &amp; Satuan (BRD-02 / FSD-02).</li>
        <li>Modul Sales Pricing Engine (BRD-04).</li>
        <li>Modul Customer Master Data (BRD-05 / FSD-05).</li>
        <li>Modul Sales Order (BRD-11 / FSD-11).</li>
    </ul>
</div>',
                'created_at' => '2026-07-18 13:20:31',
                'updated_at' => '2026-07-18 13:22:02',
            ),
            57 => 
            array (
                'id' => 112,
                'brd_code' => 'BRD-074',
            'title' => 'Manual Bank Statement (Rekening Koran Manual)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-58</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Manual Bank Statement (Rekening Koran Manual)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Financial Accounting / Cash &amp; Bank</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">18-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur ketentuan bisnis pencatatan mutasi transaksi rekening koran bank secara manual (Manual Bank Statement) guna mendukung proses rekonsiliasi kas/bank antara saldo catatan akuntansi Buku Besar internal dengan saldo fisik aktual di rekening koran perbankan.</p>
    <ul>
        <li><strong>In Scope:</strong> Pencatatan transaksi mutasi masuk (credit) dan mutasi keluar (debit) bank; pelacakan saldo awal (starting_balance) dan saldo akhir (ending_balance) bank statement; proses pencocokan (clearing/matching) mutasi dengan transaksi pembukuan internal (seperti Customer Payment atau Vendor Payment); dan update status clearing secara real-time.</li>
        <li><strong>Out of Scope:</strong> Proses integrasi otomatis API e-Banking (akan dikelola sebagai future enhancement).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Bank Reconciliation & Cash Verification** — mengontrol keakuratan catatan keuangan kas/bank internal perusahaan, mengidentifikasi transaksi gantung (outstanding cheques/transfers), dan mendeteksi selisih transaksi bank sedini mungkin.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>bank_statements</code></strong> — Header rekening koran mencatat nomor rekening bank penampung, tanggal statement, saldo awal, saldo akhir, dan status rekonsiliasi.</li>
        <li><strong>Tabel: <code>bank_statement_lines</code></strong> — Rincian mutasi transaksi debit/kredit, tanggal value, nomor referensi mutasi bank, deskripsi transaksi, status kliring, serta rujukan dokumen internal yang dicocokkan (cleared).</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Dual-Date Validation:</strong> Pencatatan memisahkan tanggal pembukuan mutasi (booking_date) dengan tanggal efektif dana mengendap (value_date).</li>
        <li><strong>Clearing Engine:</strong> Pengguna dapat mencocokkan satu baris mutasi bank dengan satu atau beberapa dokumen internal (1-to-N matching).</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Penyimpanan statement berstatus <code>POSTED</code> akan mengunci pengubahan data mutasi.</li>
        <li>Sistem wajib memvalidasi rumus: <code>saldo_awal + total_mutasi_masuk - total_mutasi_keluar = saldo_akhir</code>. Jika tidak sesuai, posting diblokir.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Rekonsiliasi bank merupakan instrumen wajib audit kepatuhan perpajakan (tax audit trail) untuk membuktikan keselarasan arus uang dengan omzet penjualan yang dilaporkan.</p>

    <h2>8. Status & Blocking</h2>
    <p>Baris mutasi yang sudah berstatus <code>CLEARED</code> tidak dapat di-match ulang ke dokumen lain kecuali status clearing-nya dibatalkan (unmatched) terlebih dahulu.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Balance Integrity):</strong> Perbedaan antara ending_balance pada rekening koran dengan saldo akhir hitungan mutasi internal sistem wajib ditampilkan sebagai selisih rekonsiliasi.</li>
        <li><strong>BR-02 (Sequence Control):</strong> Saldo awal (starting_balance) statement bulan ini wajib sama dengan saldo akhir (ending_balance) statement periode sebelumnya yang berstatus POSTED.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Laporan Rekonsiliasi Bank menampilkan daftar lengkap transaksi gantung (outstanding items) yang belum berstatus CLEARED secara akurat.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul Bagan Akun &amp; Rekening Bank (BRD-08).</li>
        <li>Modul AR Payment &amp; AP Payment (BRD-51 / BRD-54).</li>
    </ul>
</div>',
                'created_at' => '2026-07-18 13:32:07',
                'updated_at' => '2026-07-18 13:33:49',
            ),
            58 => 
            array (
                'id' => 113,
                'brd_code' => 'BRD-075',
            'title' => 'Foreign Exchange Revaluation (Revaluasi Kurs Bulanan)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-59</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Foreign Exchange Revaluation (Revaluasi Selisih Kurs Bulanan)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Financial Accounting / GL &amp; Valuta Asing</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">19-07-2026</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Under Review</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur alur bisnis penilaian kembali saldo akun neraca berdenominasi valuta asing (valas) gantung pada akhir periode akuntansi bulanan ke mata uang lokal (IDR) berdasarkan kurs referensi penutupan akhir bulan (Kurs BI / Closing Rate), serta memposting penyesuaian laba/rugi selisih kurs yang belum terealisasi (unrealized gain/loss).</p>
    <ul>
        <li><strong>In Scope:</strong> Revaluasi saldo Piutang Dagang (AR) valas belum lunas; revaluasi saldo Hutang Dagang (AP) valas belum lunas; revaluasi saldo Rekening Bank valas; perhitungan Unrealized Gain/Loss; pembentukan jurnal penyesuaian akhir bulan; dan penjurnalan balik otomatis (Auto-Reversal) pada hari pertama bulan berikutnya.</li>
        <li><strong>Out of Scope:</strong> Perhitungan Realized Gain/Loss saat pelunasan kas berjalan (dikelola langsung oleh modul pembayaran).</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <p>Fungsi utama adalah **Forex Adjustments & Compliance Balance Control** — menyajikan nilai wajar aset dan liabilitas valas pada laporan posisi keuangan bulanan sesuai dengan standar akuntansi (PSAK 10) tanpa mendistorsi pencatatan realisasi kas perusahaan.</p>

    <h2>4. Data Structure & Organization</h2>
    <ul>
        <li><strong>Tabel: <code>forex_revaluations</code></strong> — Header dokumen mencatat nomor revaluasi, periode akuntansi yang diajukan, tanggal revaluasi, kurs penutupan yang digunakan, dan rujukan jurnal penyesuaian yang terbentuk.</li>
        <li><strong>Tabel: <code>forex_revaluation_details</code></strong> — Baris rincian dokumen valas gantung (AR Invoice, AP Invoice, Kas/Bank) yang memuat saldo nominal valas, kurs asal, kurs penutupan baru, dan nilai nominal rupiah penyesuaian laba/rugi selisih kurs.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ul>
        <li><strong>Auto-Reversal Journal:</strong> Jurnal penyesuaian revaluasi akhir bulan wajib diset sebagai *reversing journal* yang secara otomatis diposting terbalik (debit/kredit bertukar) pada tanggal 1 periode bulan berikutnya untuk mencegah double-counting saat pembayaran riil terjadi.</li>
        <li><strong>Exchange Rate Source:</strong> Penggunaan Kurs Tengah BI (closing rate) terverifikasi wajib terikat pada tanggal penutupan periode.</li>
    </ul>

    <h2>6. Controls & Classification</h2>
    <ul>
        <li>Hanya dokumen valas terbuka (outstanding balance &gt; 0) per akhir bulan yang berhak ditarik dalam perhitungan revaluasi.</li>
        <li>Semua jurnal penyesuaian dilarang dirilis sebelum lolos verifikasi diagnostik balance check.</li>
    </ul>

    <h2>7. Tax & Compliance</h2>
    <p>Perhitungan laba/rugi selisih kurs yang belum terealisasi diatur sebagai koreksi fiskal penyeimbang pada pelaporan SPT Tahunan PPh Badan.</p>

    <h2>8. Status & Blocking</h2>
    <p>Setelah status revaluasi bernilai <code>POSTED</code>, seluruh dokumen sumber yang direvaluasi dikunci dari pembatalan transaksi mundur ke periode tersebut.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>BR-01 (Reversal Mandate):</strong> Jurnal akrual laba/rugi belum terealisasi wajib dibalik (reverse) secara sistematis pada periode berikutnya.</li>
        <li><strong>BR-02 (Rate Completeness):</strong> Revaluasi diblokir jika master kurs penutupan valas untuk tanggal akhir bulan penutupan belum diinput ke database.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>AC-01: Jurnal jurnal pembalik terbentuk pada tanggal 1 bulan berikutnya dengan status POSTED otomatis sesaat setelah revaluasi akhir bulan diposting.</li>
    </ul>

    <h2>11. Dependencies</h2>
    <ul>
        <li>Modul AR &amp; AP Invoices (BRD-20 / BRD-51).</li>
        <li>Modul Master Kurs Valuta Asing (BRD-09).</li>
        <li>Modul Jurnal Memorial / General Ledger (BRD-22 / FSD-28).</li>
    </ul>
</div>',
                'created_at' => '2026-07-19 00:58:59',
                'updated_at' => '2026-07-19 01:01:54',
            ),
            59 => 
            array (
                'id' => 114,
                'brd_code' => 'BRD-060',
            'title' => 'Outbound Delivery & Goods Issue (Pengiriman Barang Penjualan)',
                'project_id' => NULL,
                'status' => 'Under Review',
            'content' => '<h1>BRD-60: Outbound Delivery &amp; Goods Issue (Pengiriman Barang Penjualan)</h1>

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
    <tbody>
        <tr><td class="border px-2 py-1 font-bold w-1/4">Document ID</td><td class="border px-2 py-1">BRD-60</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Business Requirement Document - Outbound Delivery &amp; Goods Issue (Pengiriman Barang Penjualan)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Sales &amp; Distribution (SD)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Effective Date</td><td class="border px-2 py-1">19-07-2026</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Reference Blueprint</td><td class="border px-2 py-1">BP-SD-13</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<p>Dokumen ini mengatur siklus pengeluaran barang dagangan dari gudang untuk dikirim ke pelanggan. Cakupannya meliputi penciptaan dokumen pengiriman (Delivery Order/DO), pencatatan Goods Issue (GI) untuk memotong stok fisik dan membukukan jurnal biaya (HPP), serta pelacakan status pengiriman hingga serah terima di pelanggan.</p>

<h2>3. Domain Core Specification</h2>
<p>Proses O2C (Order-to-Cash) mewajibkan pemisahan tegas antara pengakuan komitmen penjualan (Sales Order), pengeluaran fisik barang (Goods Issue), dan penagihan piutang (AR Invoice).</p>

<h2>4. Data Structure &amp; Organization</h2>
<p>Dokumen ini didukung oleh struktur tabel:</p>
<ul>
    <li><code>delivery_orders</code> (Header): Menyimpan tanggal dokumen, customer, alamat kirim, cabang, status dokumen, dan nomor sales order acuan.</li>
    <li><code>delivery_order_lines</code> (Detail): Menyimpan SKU, kuantitas dikirim, kuantitas dikonfirmasi (POD), UOM, batch, dan COGS per unit.</li>
</ul>

<h2>5. Functional Specifics</h2>
<p>Alur kerja utama:</p>
<ol>
    <li>Penciptaan Outbound Delivery (DO) berdasarkan data Sales Order yang telah disetujui.</li>
    <li>Pengecekan stok fisik gudang dan pengikatan nomor Batch barang.</li>
    <li>Pemberitahuan ke bagian gudang untuk persiapan muat (*loading*).</li>
    <li>Posting Goods Issue (GI) saat barang keluar pintu gudang untuk memicu jurnal HPP otomatis.</li>
</ol>

<h2>6. Controls &amp; Classification</h2>
<p>Setiap dokumen transaksi wajib difilter berdasarkan kode cabang (<code>branch_id</code>) pengguna aktif untuk mematuhi aturan multi-branch. Otorisasi cetak DO (Surat Jalan) hanya diberikan setelah status DO berstatus <code>GOODS_ISSUED</code> (telah dilakukan Goods Issue).</p>

<h2>7. Tax &amp; Compliance</h2>
<p>Meskipun DO bukan faktur pajak, isian kuantitas DO akan menjadi basis penghitungan PPN pada AR Invoice. Selisih kirim wajib didokumentasikan untuk audit pajak.</p>

<h2>8. Status &amp; Blocking</h2>
<p>Status dokumen DO/GI:</p>
<ul>
    <li><code>DRAFT</code>: Pengisian data awal.</li>
    <li><code>READY_TO_SHIP</code>: Stok dan batch telah dialokasikan.</li>
    <li><code>GOODS_ISSUED</code>: Barang telah diposting keluar dari sistem (stok terpotong).</li>
    <li><code>DELIVERED</code>: Barang diterima pelanggan (POD terkonfirmasi).</li>
    <li><code>CANCELLED</code>: Batal kirim.</li>
</ul>

<h2>9. Business Rules</h2>
<ul>
    <li><strong>R-01:</strong> Kuantitas DO tidak boleh melebihi kuantitas open pada Sales Order acuan.</li>
    <li><strong>R-02:</strong> Posting Goods Issue (GI) wajib menjurnal otomatis: Debit HPP Penjualan (COGS), Kredit Persediaan Barang Dagang.</li>
    <li><strong>R-03:</strong> Tanggal posting GI tidak boleh mendahului document date Sales Order terkait.</li>
</ul>

<h2>10. Acceptance Criteria</h2>
<ul>
    <li>Sistem berhasil memotong saldo stok fisik gudang secara realtime saat posting GI sukses dideklarasikan.</li>
    <li>Jurnal COGS terbentuk otomatis dengan nilai perolehan HPP yang akurat sesuai metode valuasi (FIFO/Moving Average).</li>
</ul>

<h2>11. Dependencies</h2>
<p>Bergantung pada modul Master Barang (BRD-02), Master Cabang (BRD-49), Sales Order (BRD-11), dan Auto Journal Mapping (BRD-10).</p>',
                'created_at' => '2026-07-19 03:45:18',
                'updated_at' => '2026-07-19 09:45:42',
            ),
            60 => 
            array (
                'id' => 115,
                'brd_code' => 'BRD-064',
                'title' => 'Bill of Material & Work Order',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
        <tbody>
            <tr><td class="border px-2 py-1 font-bold w-1/4">Document ID</td><td class="border px-2 py-1">BRD-61</td></tr>
            <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Business Requirement Document - Bill of Material &amp; Work Order</td></tr>
            <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Materials Management / Production Planning</td></tr>
            <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
            <tr><td class="border px-2 py-1 font-bold">Effective Date</td><td class="border px-2 py-1">19-07-2026</td></tr>
            <tr><td class="border px-2 py-1 font-bold">Reference Blueprint</td><td class="border px-2 py-1">BP-MM-BOM</td></tr>
            <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
            <tr><td class="border px-2 py-1 font-bold">Author</td><td class="border px-2 py-1">Teguh Priyadi</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Dokumen ini mengatur siklus penciptaan formula perakitan produk (Bill of Material) dan eksekusi perintah kerja perakitan (Work Order). Modul ini digunakan untuk mendukung kegiatan perakitan paket bundling, pengemasan ulang (repacking), atau pemrosesan bernilai tambah ringan di dalam gudang.</p>
    <ul>
        <li><strong>In Scope:</strong> Pemeliharaan master formula BOM multi-level, siklus hidup Work Order (Draft, Released, In Progress, Completed, Cancelled), pemotongan stok otomatis bahan baku (Backflushing), penambahan stok produk jadi, dan pencatatan variasi penyusutan (waste/scrap).</li>
        <li><strong>Out of Scope:</strong> Penjadwalan kapasitas mesin pabrik berat (Capacity Planning) dan perutean stasiun kerja (Work Center Routing) yang kompleks.</li>
    </ul>

    <h2>3. Domain Core Specification</h2>
    <ul>
        <li><strong>Bill of Material (BOM):</strong> Daftar terstruktur komponen bahan baku dengan kuantitas tertentu untuk menghasilkan satu unit finished goods.</li>
        <li><strong>Work Order (WO):</strong> Dokumen perintah kerja resmi untuk memproduksi kuantitas produk tertentu dalam batas waktu yang ditentukan.</li>
        <li><strong>Backflushing:</strong> Metode pemotongan stok bahan baku secara otomatis di sistem segera setelah posting penyelesaian (completion) Work Order dilakukan.</li>
    </ul>

    <h2>4. Data Structure &amp; Organization</h2>
    <p>Modul didukung oleh tabel-tabel berikut:</p>
    <ul>
        <li><code>bill_of_materials</code>: Menyimpan nama formula BOM, SKU finished goods sasaran, versi, status aktif, dan sales office rujukan.</li>
        <li><code>bill_of_material_items</code>: Detail bahan baku penyusun finished goods, kuantitas kebutuhan, satuan (UOM), dan batas persentase waste toleransi.</li>
        <li><code>work_orders</code>: Perintah kerja produksi mencakup kode WO, rujukan BOM, target finished goods, target qty, gudang eksekusi, status, dan tanggal mulai/selesai.</li>
        <li><code>work_order_items</code>: Kebutuhan bahan baku aktual dan kuantitas terpakai (consumed) per transaksi WO serta nomor batch yang dialokasikan.</li>
    </ul>

    <h2>5. Functional Specifics</h2>
    <ol>
        <li>Pembuatan BOM wajib menentukan finished goods sasaran yang berstatus aktif di master barang.</li>
        <li>Pembuatan Work Order menarik data secara otomatis dari BOM acuan untuk memproyeksikan kebutuhan bahan baku (Required Qty = Target Qty FG x Qty BOM).</li>
        <li>Perilisan WO memicu alokasi stok bahan baku (Stock Reservation) di sistem.</li>
        <li>Posting Completion WO secara otomatis memotong stok bahan baku berdasarkan kuantitas konsumsi aktual (atau standar backflushing) dan menambahkan stok finished goods di gudang sasaran.</li>
    </ol>

    <h2>6. Controls &amp; Classification</h2>
    <p>Setiap dokumen transaksi BOM &amp; WO wajib difilter berdasarkan kode cabang (<code>branch_id</code>) pengguna aktif untuk mematuhi isolasi data multi-branch. Otoritas untuk merilis dan menyelesaikan Work Order hanya diberikan kepada peran Production Coordinator atau Warehouse Manager.</p>

    <h2>7. Tax &amp; Compliance</h2>
    <p>Selisih bahan baku (waste/scrap) wajib dicatat dalam batas persentase toleransi yang ditetapkan di BOM. Penyusutan di luar batas normal akan diidentifikasi sebagai kerugian operasional dan wajib dilaporkan untuk penyesuaian nilai PPN masukan yang melekat pada bahan baku tersebut demi kepatuhan audit pajak.</p>

    <h2>8. Status &amp; Blocking</h2>
    <p>Status Work Order dikelola secara sekuensial:</p>
    <ul>
        <li><code>DRAFT</code>: Formulasi awal dokumen.</li>
        <li><code>RELEASED</code>: Komponen diblokir untuk alokasi produksi.</li>
        <li><code>IN_PROGRESS</code>: Produksi sedang berjalan.</li>
        <li><code>COMPLETED</code>: Produk selesai dihasilkan, stok ter-update.</li>
        <li><code>CANCELLED</code>: Pembatalan perintah kerja.</li>
    </ul>
    <p>Sistem memblokir penciptaan atau penyelesaian WO apabila tanggal dokumen berada pada periode akuntansi yang berstatus <code>LOCKED_OPERATIONAL</code> atau <code>CLOSED</code>.</p>

    <h2>9. Business Rules</h2>
    <ul>
        <li><strong>R-01:</strong> Finished goods sasaran pada BOM tidak boleh terdaftar sebagai bahan baku di dalam detail BOM-nya sendiri (mencegah rekursif tak terbatas).</li>
        <li><strong>R-02:</strong> Kuantitas konsumsi aktual bahan baku pada saat penyelesaian WO tidak boleh bernilai negatif.</li>
        <li><strong>R-03:</strong> Alokasi bahan baku bertipe *batch-controlled* wajib menentukan nomor batch yang aktif sebelum status WO diubah menjadi IN_PROGRESS.</li>
    </ul>

    <h2>10. Acceptance Criteria</h2>
    <ul>
        <li>Sistem berhasil memotong stok bahan baku secara akurat dan meningkatkan stok produk jadi (finished goods) pada saat posting status COMPLETED dieksekusi.</li>
        <li>Jurnal akuntansi penyesuaian persediaan perakitan terbentuk otomatis: Debit Persediaan Barang Jadi, Kredit Persediaan Bahan Baku (dan selisih waste jika ada).</li>
    </ul>

    <h2>11. Dependencies</h2>
    <p>Bergantung pada Master Barang (BRD-02), Master Cabang (BRD-49), Gudang &amp; Penyimpanan, serta Accounting Period (BRD-09).</p>
</div>',
                'created_at' => '2026-07-19 11:13:05',
                'updated_at' => '2026-07-19 12:02:00',
            ),
            61 => 
            array (
                'id' => 116,
                'brd_code' => 'BRD-003',
                'title' => 'Master Storage Location',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
 <h2>1. Document Information</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <tbody>
 <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-003</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Master Storage Location</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Inventory & Logistics</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Effective Date</th><td class="border px-2 py-1">21-07-2026</td></tr>
 <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Draft</td></tr>
 </tbody>
 </table>

 <h2>2. Scope</h2>
 <p>Modul Master Storage Location (Gudang/Lokasi Penyimpanan) bertugas mengelola data fisik maupun logis dari tempat penyimpanan persediaan (inventory). Modul ini sangat vital karena kuantitas dan nilai persediaan barang akan selalu dicatat spesifik pada level Storage Location.</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Cakupan</th><th class="border px-2 py-1">Detail Cakupan (Scope)</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>In Scope</strong></td><td class="border px-2 py-1">Pendefinisian lokasi gudang, penentuan jenis gudang (Raw Material, Finished Goods, Transit, dll), penugasan hierarki ke entitas Branch (Cabang), dan perlindungan integritas data terhadap stok operasional maupun stok karantina.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Out of Scope</strong></td><td class="border px-2 py-1">Manajemen tata letak tingkat mikro seperti <i>Bin Location</i>, <i>Rack</i>, atau <i>Zone</i> di dalam satu gedung fisik (ini masuk ke ranah WMS Lanjutan).</td></tr>
 </tbody>
 </table>

 <h2>3. Domain Core Specification</h2>
 <p>Karakteristik fundamental dari entitas Storage Location meliputi:</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Spesifikasi Domain</th><th class="border px-2 py-1">Deskripsi & Peran</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Branch Assignment</strong></td><td class="border px-2 py-1">Setiap Storage Location mutlak harus menginduk pada satu Cabang (Branch). Sebuah gudang tidak bisa berdiri mengambang tanpa tanggung jawab operasional wilayah cabang.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Storage Type</strong></td><td class="border px-2 py-1">Klasifikasi fungsional gudang untuk memisahkan peruntukan barang, misalnya gudang utama, gudang karantina (rusak/retur), dan gudang transit untuk pengiriman antar cabang.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Capacity & Dimension</strong></td><td class="border px-2 py-1">Metadata logis yang sewaktu-waktu dapat diaktifkan untuk mencatat luasan area fisik dalam meter persegi.</td></tr>
 </tbody>
 </table>

 <h2>4. Tax & Compliance</h2>
 <p>Dalam beberapa kasus perpajakan dan audit manufaktur/distribusi:</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/3">Aspek Kepatuhan</th><th class="border px-2 py-1">Penjelasan & Aturan</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Valuasi Persediaan (Inventory Valuation)</strong></td><td class="border px-2 py-1">Secara akuntansi, perpindahan barang antar gudang dalam satu entitas hukum tidak mengubah nilai pajak final, namun harus tercatat detil pergerakannya di Audit Log Logistik.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Barang Karantina/Rusak</strong></td><td class="border px-2 py-1">Barang yang akan dimusnahkan untuk klaim pengurangan pajak (Write-off) wajib dipindahkan terlebih dahulu ke Storage Location bertipe <i>Scrap/Quarantine</i> sebelum dokumen BA Pemusnahan dibuat.</td></tr>
 </tbody>
 </table>

 <h2>5. Data Structure & Relationships</h2>
 <p>Data gudang akan bermuara pada tabel <code>storage_locations</code> di <strong>ERD 00</strong>.</p>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Atribut / Kolom</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Branch ID</strong></td><td class="border px-2 py-1">Many-to-One (<code>branches</code>)</td><td class="border px-2 py-1">Satu Cabang bisa memiliki banyak Gudang. (Induk Mutlak)</td></tr>
 <tr><td class="border px-2 py-1"><strong>Storage Code</strong></td><td class="border px-2 py-1">Composite Unique (with Branch)</td><td class="border px-2 py-1">Kode identitas gudang (Misal: TR01, NT01). Tidak perlu unik secara global, melainkan unik per Cabang (Composite Key: Branch ID + Storage Code).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Storage Name</strong></td><td class="border px-2 py-1">String</td><td class="border px-2 py-1">Nama representatif gudang (Misal: Gudang Bahan Baku Selatan).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Storage Type</strong></td><td class="border px-2 py-1">Enum</td><td class="border px-2 py-1">Utama, Karantina, Transit, Scrap. Membedakan fungsi penerimaan.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Address</strong></td><td class="border px-2 py-1">Text</td><td class="border px-2 py-1">Alamat spesifik fisik bangunan gudang (bila beda dengan alamat cabang).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Status</strong></td><td class="border px-2 py-1">Enum</td><td class="border px-2 py-1">Active, Inactive. Mengunci transaksi.</td></tr>
 </tbody>
 </table>

 <h2>6. Functional Specifics</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Fungsi UI</th><th class="border px-2 py-1">Deskripsi Interaksi</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Create Storage</strong></td><td class="border px-2 py-1">Form yang mewajibkan <i>user</i> memilih Cabang (Branch) terlebih dahulu. Jika *user* adalah Staf Cabang, pilihan <i>dropdown</i> Branch akan terkunci ke cabang miliknya saja.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Edit Storage</strong></td><td class="border px-2 py-1">Modifikasi nama atau alamat gudang. Atribut <code>Branch ID</code> bersifat *Immutable* (dikunci UI) setelah data dibuat untuk mencegah korupsi data mutasi stok (Goods Movement).</td></tr>
 </tbody>
 </table>

 <h2>7. Controls & Authorization</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Role Level</th><th class="border px-2 py-1">Hak Akses (Permissions)</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Super Admin</strong></td><td class="border px-2 py-1">Akses mutlak untuk seluruh cabang (Create, Edit, Delete, View All).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Branch Manager</strong></td><td class="border px-2 py-1">Dapat membuat dan mengedit Gudang *hanya* yang berada di bawah Cabang miliknya (Filter <code>branch_id</code>).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Warehouse Staff</strong></td><td class="border px-2 py-1">Hanya <i>View Data</i> untuk keperluan pencetakan dokumen mutasi dan label rak.</td></tr>
 </tbody>
 </table>

 <h2>8. Status & Blocking</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Status</th><th class="border px-2 py-1">Efek Sistem</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Active</strong></td><td class="border px-2 py-1">Gudang terbuka untuk menerima (Goods Receipt) maupun mengeluarkan barang (Goods Issue) tanpa limitasi.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Inactive</strong></td><td class="border px-2 py-1">Gudang terkunci rapat. Tidak bisa menerima transaksi mutasi masuk maupun keluar apapun, meskipun stok di dalamnya masih ada. (Digunakan saat gudang sedang di-audit / Stock Opname berat).</td></tr>
 </tbody>
 </table>

 <h2>9. Business Rules (BR)</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">ID Business Rule</th><th class="border px-2 py-1">Deskripsi Logika</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>BR-01 (Mandatory Branch)</strong></td><td class="border px-2 py-1">Gudang tidak boleh yatim piatu. Harus ada <code>branch_id</code> yang berstatus <i>Active</i> saat gudang dibuat.</td></tr>
 <tr><td class="border px-2 py-1"><strong>BR-02 (Immutability)</strong></td><td class="border px-2 py-1">Setelah disimpan, Storage Location <strong>haram</strong> dipindahtangankan ke Cabang lain. Hal ini karena saldo stok (*Inventory Ledger*) sudah terikat pada kombinasi Sloc + Branch. Memindahkan induk akan menyebabkan neraca cabang selisih (<i>out of balance</i>).</td></tr>
 <tr><td class="border px-2 py-1"><strong>BR-03 (Stock Protection)</strong></td><td class="border px-2 py-1">Gudang yang masih memiliki *On-Hand Stock* (kuantitas fisik > 0) tidak dapat dihapus (<i>Hard Delete</i>) dari sistem untuk mencegah barang "hilang" dari neraca.</td></tr>
 </tbody>
 </table>

 <h2>10. Default Values</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Status</strong></td><td class="border px-2 py-1">Sistem menetapkan nilai <code>Active</code> secara <i>default</i> pada antarmuka Create.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Storage Type</strong></td><td class="border px-2 py-1"><code>Main / Utama</code> sebagai pilihan dasar terpilih di form.</td></tr>
 </tbody>
 </table>

 <h2>11. Validation Rules</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Aturan Validasi Sistem</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Storage Code</strong></td><td class="border px-2 py-1">Required, Unique Composite (Kombinasi Storage Code + Branch ID tidak boleh ganda), Alfanumerik Kapital (Max 15 Karakter). Boleh mengandung strip (-).</td></tr>
 <tr><td class="border px-2 py-1"><strong>Branch ID</strong></td><td class="border px-2 py-1">Required, Exist in <code>branches.id</code>.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Storage Type</strong></td><td class="border px-2 py-1">Required, Exist in predefined Enums (Main, Quarantine, Transit, Scrap).</td></tr>
 </tbody>
 </table>

 <h2>12. Audit Requirements</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Kebutuhan Audit</th><th class="border px-2 py-1">Pencatatan Log</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>Log Aktivitas</strong></td><td class="border px-2 py-1">Log audit diwajibkan untuk mencatat momen pembuatan dan ketika status diubah menjadi <i>Inactive</i>, termasuk mencatat <code>User ID</code> pelakunya beserta IP Address via <code>AuditLogService</code>.</td></tr>
 </tbody>
 </table>

 <h2>13. Acceptance Criteria (AC)</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Kriteria Penerimaan (AC)</th><th class="border px-2 py-1">Skenario Uji</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>AC-01</strong></td><td class="border px-2 py-1">Admin mencoba menghapus Gudang yang masih ada stok 5 Pcs. Sistem merespons dengan <i>Error: Cannot delete storage location because it contains active inventory balance</i>.</td></tr>
 <tr><td class="border px-2 py-1"><strong>AC-02</strong></td><td class="border px-2 py-1">Di UI Edit, <i>dropdown</i> "Branch" dikunci mati menjadi teks statis (<i>Read-only / Disabled</i>) demi memenuhi BR-02 (Immutability). Memaksa ubah via REST API juga akan digagalkan oleh <i>Form Request Validation</i>.</td></tr>
 <tr><td class="border px-2 py-1"><strong>AC-03</strong></td><td class="border px-2 py-1">Staf Cabang Surabaya saat membuka form Create Storage Location, kolom <i>dropdown</i> Branch sudah otomatis terisi "Cabang Surabaya" dan tidak bisa diubah ke cabang lain (Isolasi Data Global Scope).</td></tr>
 </tbody>
 </table>

 <h2>14. Dependencies</h2>
 <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
 <thead class="bg-gray-100">
 <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Modul</th><th class="border px-2 py-1">Dampak Logika</th></tr>
 </thead>
 <tbody>
 <tr><td class="border px-2 py-1"><strong>BRD-002 (Master Branch)</strong></td><td class="border px-2 py-1">Mutlak, karena Sloc harus menempel pada Branch yang sah dan aktif.</td></tr>
 <tr><td class="border px-2 py-1"><strong>Modul Inventory Ledger</strong></td><td class="border px-2 py-1">Modul mutasi stok sangat bergantung pada aktif/tidaknya gudang ini (Status Blokir).</td></tr>
 </tbody>
 </table>
</div>',
                'created_at' => '2026-07-20 10:28:20',
                'updated_at' => '2026-07-21 23:44:26',
            ),
            62 => 
            array (
                'id' => 117,
                'brd_code' => 'BRD-037',
            'title' => 'Master Condition Type (Pricing Configuration)',
                'project_id' => NULL,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-037</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Master Condition Type (Pricing Configuration)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Cross-Module (Sales &amp; Purchasing)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Master Condition Type</strong></td>
            <td class="border px-2 py-1">Pendefinisian komponen tunggal penyusun harga (Base Price, Discount, Surcharge, Tax, Freight, Rounding Diff). Mengontrol cara sebuah nilai dikalkulasi (+/-) dan diperlakukan oleh mesin pencarian harga.</td>
            <td class="border px-2 py-1">Pricing Procedure Hierarchy (Itu akan menjadi bagian dari skema prosedur).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Condition Validations</strong></td>
            <td class="border px-2 py-1">Kontrol akses (is_manual) untuk mencegah manipulasi harga, penentuan apakah wajib ada (is_mandatory), serta kontrol min/max untuk manual override (seperti selisih pembulatan).</td>
            <td class="border px-2 py-1">Implementasi integrasi approval workflow spesifik tiap diskon.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Condition Classes (Kategori)</strong></td>
            <td class="border px-2 py-1">Mengelompokkan peran kondisi: Harga Dasar (PRICE), Potongan (DISCOUNT), Biaya Tambahan (SURCHARGE), Pajak (TAX), Ongkir (FREIGHT), dan Pembulatan (ROUNDING_DIFF).</td>
            <td class="border px-2 py-1">Kategori menentukan logika akuntansi saat kondisi ini diposting ke GL melalui `account_key`.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Value Types</strong></td>
            <td class="border px-2 py-1">Nilai yang ditangkap bisa berupa nilai pasti (FIXED_AMOUNT) misal Rp 10.000, atau berbasis persentase (PERCENTAGE) misal 5% dari basis kalkulasi sebelumnya.</td>
            <td class="border px-2 py-1">PERCENTAGE membutuhkan referensi step sebelumnya di Pricing Procedure.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Rounding Difference</strong></td>
            <td class="border px-2 py-1">Kondisi khusus yang diinput manual untuk mengatasi selisih pembulatan rupiah. Memiliki kapabilitas Plus (+) atau Minus (-) secara dinamis.</td>
            <td class="border px-2 py-1">Kondisi Rounding Diff dibatasi oleh nilai minimum dan maksimum harian.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax &amp; Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Audit Jejak Diskon</strong></td>
            <td class="border px-2 py-1">Setiap kondisi <code>is_manual = TRUE</code> akan direkam dalam log transaksi siapa yang mengubah diskon atau harga dasar dan berapa variansinya.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure &amp; Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi &amp; Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Access Sequence</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1) dengan Sequence</td>
            <td class="border px-2 py-1">Satu `condition_type` bisa dihubungkan ke satu strategi pencarian (Access Sequence), atau NULL jika itu 100% Manual.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Condition Records</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N) dengan Records</td>
            <td class="border px-2 py-1">Master harga per SKU ditaruh di record dengan induk condition_type ini.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Override Harga Manual</strong></td>
            <td class="border px-2 py-1">Sales Person melihat Base Price otomatis Rp 50.000. Jika `is_manual = TRUE` untuk tipe kondisi tersebut, tombol edit akan aktif, dan user bisa mengganti menjadi Rp 45.000. Jika `FALSE`, field akan *readonly*.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Group Condition</strong></td>
            <td class="border px-2 py-1">Sistem menjumlahkan total nominal/kuantitas seluruh barang di dokumen yang memiliki Condition Type yang sama, lalu mencari skala diskon berdasarkan total tersebut, bukan kuantitas masing-masing baris.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls &amp; Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pricing Configurator (IT)</strong></td>
            <td class="border px-2 py-1">Full Setup</td>
            <td class="border px-2 py-1">Berhak membuat atau mengubah parameter `condition_types` termasuk kategori dan validasinya.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>End User (Sales/Purchasing)</strong></td>
            <td class="border px-2 py-1">Transactional Only</td>
            <td class="border px-2 py-1">Hanya bisa memodifikasi *value* pada dokumen jika kondisi diizinkan manual (`is_manual`), dan tidak dapat mengubah struktur master.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status &amp; Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Active / Inactive Status</strong></td>
            <td class="border px-2 py-1">Jika `condition_type` di-set Inactive, maka semua *record* turunan tidak akan di-evaluasi lagi oleh Pricing Engine pada transaksi baru (tidak berefek pada transaksi *historical*).</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-CTY-01</strong></td>
            <td class="border px-2 py-1">Plus / Minus Constraint</td>
            <td class="border px-2 py-1">Setiap kondisi harus dideklarasikan arah nilainya (`plus_minus` = POSITIVE, NEGATIVE, atau BOTH). ROUNDING_DIFF bisa diset BOTH. DISCOUNT harus diset NEGATIVE, PRICE harus POSITIVE.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-CTY-02</strong></td>
            <td class="border px-2 py-1">Manual Upper/Lower Limit</td>
            <td class="border px-2 py-1">Untuk kondisi manual seperti ROUNDING_DIFF, nilai input harus dibatasi oleh `manual_min_limit` dan `manual_max_limit` (Misal max Rp 5.000).</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>is_manual</strong></td>
            <td class="border px-2 py-1">FALSE. Semua penetapan harga pada dasarnya terkunci unless dinyatakan lain.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>is_group_condition</strong></td>
            <td class="border px-2 py-1">FALSE. Perhitungan skala dilakukan per item baris.</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Condition Code (Misal: PR00)</strong></td>
            <td class="border px-2 py-1">Maksimal 4 karakter alfanumerik. Wajib Unik dan tidak boleh diubah (Immutable) jika sudah ada transaksi yang terhubung.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Sedang</strong></td>
            <td class="border px-2 py-1">Perubahan bendera `is_manual` akan dicatat karena berpotensi melonggarkan kontrol harga di cabang operasional.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-CTY-01</strong></td>
            <td class="border px-2 py-1">Ketika admin mencoba menginput kondisi ROUNDING_DIFF senilai -Rp 10.000 (melebihi limit manual_min_limit -Rp 5.000), sistem mengeluarkan error "Nilai pembulatan melebih batas yang diizinkan".</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Access Sequence</strong></td>
            <td class="border px-2 py-1">Sebuah Condition Type yang dikhususkan untuk harga otomasi wajib dikaitkan dengan satu Access Sequence untuk metode pencariannya.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 10:30:08',
                'updated_at' => '2026-07-20 10:30:08',
            ),
            63 => 
            array (
                'id' => 118,
                'brd_code' => 'BRD-029',
            'title' => 'Approval Level Matrix (ALM) / Approval Matrix',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <tbody>
        <tr>
            <th>Document ID</th>
            <td>BRD-029</td>
        </tr>
        <tr>
            <th>Document Name</th>
            <td>Approval Level Matrix (ALM) / Approval Matrix</td>
        </tr>
        <tr>
            <th>Module</th>
            <td>Cross-Module (Shared Engine)</td>
        </tr>
        <tr>
            <th>Version</th>
            <td>1.0</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>Final</td>
        </tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Modul / Fitur</th>
            <th>In-Scope</th>
            <th>Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Approval Engine</td>
            <td>Pembuatan konfigurasi rute persetujuan (Strategy, Conditions, Route) secara dinamis lintas modul.</td>
            <td>Persetujuan HR (Cuti, Lembur) yang memiliki hirarki spesifik pegawai-atasan di luar Role bisnis.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Konsep Utama</th>
            <th>Penjelasan</th>
            <th>Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Strategy Base</td>
            <td>Strategi utama penentu apakah suatu dokumen memerlukan persetujuan.</td>
            <td>Berlaku spesifik per modul (misal PO, PR, SO). Dievaluasi berurutan berdasarkan prioritas.</td>
        </tr>
        <tr>
            <td>Strategy Conditions</td>
            <td>Syarat yang harus dipenuhi agar strategi berjalan.</td>
            <td>Dapat mengevaluasi nilai nominal (total) atau kriteria lain secara fleksibel.</td>
        </tr>
        <tr>
            <td>Route Levels</td>
            <td>Jenjang pemberi persetujuan.</td>
            <td>Dijalankan berurutan (Sequential). Level 2 tidak akan diaktifkan jika Level 1 belum menyetujui.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Komponen Regulasi</th>
            <th>Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Segregation of Duties</td>
            <td>Setiap aksi persetujuan hanya dapat dilakukan oleh otorisator berwenang. Log audit dipertahankan permanen.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Entitas Anak / Modul</th>
            <th>Tipe Relasi & Kardinalitas</th>
            <th>Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Conditions</td>
            <td>One-to-Many (1:N)</td>
            <td>Satu Strategi dapat memiliki banyak kondisi (AND Logic).</td>
        </tr>
        <tr>
            <td>Levels</td>
            <td>One-to-Many (1:N)</td>
            <td>Satu Strategi memiliki rute berjenjang dari 1 hingga N.</td>
        </tr>
        <tr>
            <td>Approval Authorities</td>
            <td>Many-to-One (N:1)</td>
            <td>Validasi plafon (batas otorisasi maksimal) per Role dan Modul.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Fitur Utama</th>
            <th>Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Route Determination</td>
            <td>Sistem memindai dokumen baru, membandingkan atribut dokumen dengan `conditions`, dan menetapkan `strategy` yang cocok.</td>
        </tr>
        <tr>
            <td>Sequential Approval</td>
            <td>Approver menekan tombol Approve. Sistem memverifikasi limit. Jika disetujui, lanjut ke Approver berikutnya.</td>
        </tr>
        <tr>
            <td>Inquiry / Revision</td>
            <td>Approver menekan tombol \'Inquiry\' dengan melampirkan catatan revisi. Status dokumen berubah menjadi \'Inquiry\'. Setelah revisi dilakukan, riwayat penyesuaian data (Before-After) wajib ditampilkan pada sesi persetujuan ulangan.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Aktor / Role</th>
            <th>Hak Akses</th>
            <th>Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>System Admin</td>
            <td>Create, Edit, Delete Konfigurasi Strategi.</td>
            <td>Tidak dapat melakukan Approval pada dokumen bisnis.</td>
        </tr>
        <tr>
            <td>Authorized Role (Approver)</td>
            <td>Membaca dokumen, Mengeksekusi Approval/Reject.</td>
            <td>Dibatasi oleh `approval_authorities`. Jika nominal melebihi hak, akses Approve ditolak.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Status Life-cycle</th>
            <th>Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Under Review</td>
            <td>Dokumen terkunci. Edit dokumen tidak diizinkan. Approval dapat dilakukan.</td>
        </tr>
        <tr>
            <td>Rejected</td>
            <td>Proses terhenti. Dokumen dikunci secara permanen sebagai arsip penolakan (tidak dapat disunting). User harus membuat dokumen baru atau menyalin (copy) dari dokumen ini jika ingin mengajukan ulang.</td>
        </tr>
        <tr>
            <td>Inquiry</td>
            <td>Dokumen dikembalikan ke pembuat dengan status \'Inquiry\'. User dapat merevisi dokumen, dan saat diajukan kembali ke rute persetujuan awal, sistem wajib mencatat histori revisi (perbandingan perubahan nilai) untuk transparansi Approver.</td>
        </tr>
        <tr>
            <td>Approved (Final)</td>
            <td>Dokumen siap dilanjutkan ke proses hilir (misal: pengiriman barang atau pencetakan).</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>BR Code</th>
            <th>Nama Aturan</th>
            <th>Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>BR-ALM-01</td>
            <td>Strategy Priority</td>
            <td>Strategi dipindai berdasarkan nomor urut (Prioritas) terkecil hingga menemukan kondisi yang Match.</td>
        </tr>
        <tr>
            <td>BR-ALM-02</td>
            <td>Authority Rejection</td>
            <td>Jika User yang berada di rute Level terkait memiliki plafon persetujuan (Max Amount) yang lebih kecil dari nominal dokumen, tombol Approve di-disable.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Field / Atribut</th>
            <th>Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Is Mandatory (Levels)</td>
            <td>True (Wajib disetujui, tidak bisa dilewati).</td>
        </tr>
        <tr>
            <td>Priority (Strategy)</td>
            <td>999 (Urutan terakhir).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Skenario / Form Input</th>
            <th>Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tambah Strategy Level</td>
            <td>Level Sequence tidak boleh duplikat dalam satu Strategi yang sama.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Tingkat Sensitivitas</th>
            <th>Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tinggi (Eksekusi ALM)</td>
            <td>User_id, Timestamp, Aksi (Approve/Reject/Return), Catatan (Reject/Revision Note), IP Address dicatat di `activity_logs`.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>AC Code</th>
            <th>Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>AC-ALM-01</td>
            <td>Sistem berhasil memilih strategi L1 & L2 berurutan untuk dokumen Purchase Order dengan total nilai 50 Juta.</td>
        </tr>
        <tr>
            <td>AC-ALM-02</td>
            <td>Manager (L1) tidak bisa melakukan Approve apabila nominal melebihi otoritasnya yang diatur di `approval_authorities`.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Ketergantungan Pada</th>
            <th>Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Modul User & Roles</td>
            <td>Rute persetujuan (Levels) menautkan (FK) kepada Master Role.</td>
        </tr>
        <tr>
            <td>Tabel approval_authorities</td>
            <td>Untuk mengecek plafon (batasan limit nilai) masing-masing jabatan.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 10:31:43',
                'updated_at' => '2026-07-24 18:34:00',
            ),
            64 => 
            array (
                'id' => 119,
                'brd_code' => 'BRD-020',
            'title' => 'Tax Configuration (Setup Pajak & Tax Code)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-020</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Tax Configuration (Setup Pajak & Tax Code)</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Finance / Tax</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Tax Code Master</td><td class="border px-2 py-1">Mendefinisikan tarif (*Rate*), Tipe (Masukan/Keluaran), dan pemetaan Akun Jurnal (COA) untuk setiap kode pajak.</td><td class="border px-2 py-1">Generasi e-Faktur atau pelaporan pajak online otomatis ke DJP.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Tax Calculation Base</td><td class="border px-2 py-1">Aturan pengenaan tarif linear terhadap *Base Amount* (DPP) pada dokumen transaksional (PO, SO, Invoice).</td><td class="border px-2 py-1">Pemotongan pajak progresif karyawan (PPh 21).</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Immutable Rate Concept</td><td class="border px-2 py-1">Filosofi stabilitas. Jika tarif negara berubah (Misal PPN naik 11% ke 12%), kode lama (V11) dimatikan, dan membuat kode baru (V12). Jangan ubah tarif V11.</td><td class="border px-2 py-1">Update tarif dan COA pada tax code eksisting diblokir mutlak oleh sistem.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Tax Base Amount</td><td class="border px-2 py-1">Kalkulasi pajak selalu ditarik dari *Base Amount* (Dasar Pengenaan Pajak / DPP) per baris item secara linier.</td><td class="border px-2 py-1">Pajak dihitung berdasar nilai bersih setelah diskon (jika ada).</td></tr>
<tr><td class="border px-2 py-1 font-bold">GL Auto Determination</td><td class="border px-2 py-1">Setiap *Tax Code* menunjuk ke `chart_of_account_id`. Engine GL akan membaca ID ini untuk melempar saldo hutang/piutang pajaknya.</td><td class="border px-2 py-1">Hanya COA berstatus Posting yang valid.</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Auditability & Historis Pajak</td><td class="border px-2 py-1">Manipulasi historis tarif pajak bisa menghancurkan audit neraca. Immutable Rate mutlak diperlukan agar *reversal* dokumen lama tetap menggunakan tarif lamanya.</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">tax_codes</td><td class="border px-2 py-1">Tabel Master Pajak</td><td class="border px-2 py-1">Berisi profil lengkap kode, tarif, dan referensi akun.</td></tr>
<tr><td class="border px-2 py-1 font-bold">coas</td><td class="border px-2 py-1">Many-to-One dengan tax_codes</td><td class="border px-2 py-1">Setiap *Tax Code* menunjuk ke satu akun GL untuk menampung saldonya.</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Input vs Output Protection</td><td class="border px-2 py-1">Di modul penjualan/piutang, filter pencarian hanya memunculkan kode pajak bertipe `OUTPUT`. Di modul pembelian/hutang, hanya memunculkan tipe `INPUT`.</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Tax Manager / Controller</td><td class="border px-2 py-1">Create, Update (Limited)</td><td class="border px-2 py-1">Hanya berhak memperbarui kolom `is_active` dan `description`. Tarif dan GL terkunci permanen.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Inactive Code</td><td class="border px-2 py-1">Saat `is_active` = False, kode pajak ditarik dari peredaran form transaksi harian (SO, PO, Inv), namun secara sistem tetap ada untuk keperluan *Reversal* transaksi lampau.</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-20-01</td><td class="border px-2 py-1">Immutable Core Values</td><td class="border px-2 py-1">Logika backend (*Controller/FormRequest*) mutlak menolak payload UPDATE yang berupaya merubah `tax_rate` atau `chart_of_account_id`.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-20-02</td><td class="border px-2 py-1">Unique Tax Code</td><td class="border px-2 py-1">Kombinasi `company_id` + `tax_code` dijamin tunggal di sistem.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Is Active</td><td class="border px-2 py-1">Nilai standar adalah `True` (*Checked*) saat baru dicreate.</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Tax Rate Input</td><td class="border px-2 py-1">Harus angka numerik positif (Minimal 0.00). Kode pajak bernilai 0% (Bebas Pajak) diperbolehkan. Maksimal 100.00.</td></tr>
<tr><td class="border px-2 py-1 font-bold">GL Account Verification</td><td class="border px-2 py-1">Akun yang dipetakan harus dipastikan aktif dan BUKAN tipe `HEADING`.</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Medium</td><td class="border px-2 py-1">Aktivitas *Deactivation* (*uncheck active*) wajib merekam waktu dan ID `updated_by`.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-20-01</td><td class="border px-2 py-1">Saat *Update* di-submit, perubahan parameter kunci (`rate`, `COA`) tidak tersimpan, namun jika deskripsi yang diubah akan sukses ter-save.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-20-02</td><td class="border px-2 py-1">Form pembuatan Invoice (Sales) API hanya sanggup mencari dan merender daftar *Tax Code* bertipe `OUTPUT` yang berstatus aktif.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BRD-014 (Chart of Accounts)</td><td class="border px-2 py-1">Sumber referensi *Account ID*.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Mesin Modul Logistik/Sales</td><td class="border px-2 py-1">Master data ini di-consume luas oleh dokumen-dokumen *procurement*, *sales*, dan jurnal.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-22 16:09:00',
                'updated_at' => '2026-07-24 13:17:57',
            ),
            65 => 
            array (
                'id' => 120,
                'brd_code' => 'BRD-032',
            'title' => 'Term of Payment (TOP) Setup',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <tbody class="bg-white">
        <tr>
            <th class="bg-gray-100 w-1/4">Document ID</th>
            <td>BRD-032</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Document Name</th>
            <td>Term of Payment (TOP) Setup</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Module</th>
            <td>Finance, Purchasing, Sales (Cross-Module)</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Version</th>
            <td>1.0</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Status</th>
            <td>Final</td>
        </tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Modul / Fitur</th>
            <th>In-Scope</th>
            <th>Out-of-Scope</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Term of Payment (TOP)</td>
            <td>Manajemen periode waktu jatuh tempo absolut (Net Due Date) dan kebijakan insentif potongan tunai berjenjang (Tiered Cash Discount) berdasarkan tanggal *Posting Date* secara mutlak.</td>
            <td>Manajemen pembayaran cicilan (Installment Payments). Di luar batasan dokumen ini; tagihan berlaku untuk nilai faktur utuh.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Konsep Utama</th>
            <th>Penjelasan</th>
            <th>Business Rules</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Baseline Date</td>
            <td>Tanggal acuan dari mana argo (counter) jatuh tempo dimulai.</td>
            <td>Diseragamkan mutlak secara global mengikuti <strong>Posting Date</strong> dari faktur tagihan / utang usaha.</td>
        </tr>
        <tr>
            <td>Cash Discount Term</td>
            <td>Potongan diskon awal (Early Payment Discount).</td>
            <td>Diukur dengan persentase (%) dan dibatasi rentang hari dari Baseline Date (Contoh: Diskon 2% jika dibayar dalam 10 hari). Sistem mendukung hingga 2 lapis/tier diskon.</td>
        </tr>
        <tr>
            <td>Net Due Date</td>
            <td>Tanggal absolut di mana seluruh hutang atau piutang harus dibayar secara penuh tanpa potongan.</td>
            <td>Ditetapkan dalam hitungan hari. Apabila terlewat, denda *(Penalty)* dapat diberlakukan di kemudian hari jika diatur.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Komponen Regulasi</th>
            <th>Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Dasar Pengenaan Pajak (DPP)</td>
            <td>Perhitungan PPN di Indonesia umumnya tidak mengurangi DPP pada saat faktur diterbitkan meskipun ada skema Cash Discount, kecuali jika tertuang tertulis. Diskon tunai dicatat terpisah sebagai biaya *(expense)* / pendapatan lain-lain pada saat pelunasan.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Entitas Anak / Modul</th>
            <th>Tipe Relasi & Kardinalitas</th>
            <th>Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Vendor / Customer Master</td>
            <td>One-to-Many (1:N)</td>
            <td>Satu termin pembayaran dapat ditautkan *(assign)* secara *default* ke banyak vendor atau pelanggan.</td>
        </tr>
        <tr>
            <td>Document (PO/SO/Inv)</td>
            <td>One-to-Many (1:N)</td>
            <td>Master `payment_terms` akan disalin *(copied over)* kodenya saat dokumen transaksi diterbitkan.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Fitur Utama</th>
            <th>Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Automatic Due Date Calculation</td>
            <td>Saat User *Finance* memposting AP Invoice, sistem mendeteksi *Posting Date*. Sistem membaca `net_due_days` dari *Term of Payment*, lalu menjumlahkannya menjadi kolom `due_date` yang tertanam mati secara otomatis tanpa intervensi manual.</td>
        </tr>
        <tr>
            <td>Payment Clearance</td>
            <td>Saat User membayar (Outgoing Payment) pada hari ke-5, sistem memvalidasi `discount_days_1`. Karena hari ke-5 < batas hari, sistem otomatis menyarankan jurnal pemotongan sebesar `discount_percentage_1`.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Aktor / Role</th>
            <th>Hak Akses</th>
            <th>Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Finance Manager</td>
            <td>Create, Edit, Delete</td>
            <td>Akses eksklusif untuk mendesain kebijakan waktu pembayaran (TOP).</td>
        </tr>
        <tr>
            <td>Sales / Procurement</td>
            <td>Read-Only (Assign)</td>
            <td>Hanya dapat memilih *(Select)* TOP yang tersedia saat negosiasi pembuatan pesanan, tidak bisa mengubah hari jatuh temponya secara master.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Status Life-cycle</th>
            <th>Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Active</td>
            <td>Opsi termin pembayaran muncul dalam *Dropdown/Select* UI saat pembuatan entitas atau dokumen baru.</td>
        </tr>
        <tr>
            <td>Inactive</td>
            <td>Disembunyikan dari opsi UI baru, namun dokumen historis yang sudah memanggil TOP ini tidak terpengaruh dan tetap sah secara referensi.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>BR Code</th>
            <th>Nama Aturan</th>
            <th>Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>BR-TOP-01</td>
            <td>Strict Posting Date</td>
            <td>Semua *baseline date* untuk kalkulasi TOP diwajibkan menggunakan *Posting Date* secara mutlak (tidak perlu konfigurasi *Baseline Date Type*).</td>
        </tr>
        <tr>
            <td>BR-TOP-02</td>
            <td>Chronological Discount</td>
            <td>Jika *Tier 2 Discount* diisi, maka `discount_days_2` harus secara logis lebih besar dari `discount_days_1` (misal: Diskon tier 1 s/d hari 10, tier 2 s/d hari 20).</td>
        </tr>
        <tr>
            <td>BR-TOP-03</td>
            <td>Net Days Supremacy</td>
            <td>`net_due_days` harus selalu lebih besar atau sama dengan hari batas diskon tertinggi.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Field / Atribut</th>
            <th>Nilai Default</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Discount Percentages</td>
            <td>0.00 (Tidak ada diskon sama sekali, bayar penuh *Net*).</td>
        </tr>
        <tr>
            <td>Status Aktif</td>
            <td>True (Otomatis Aktif).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Skenario / Form Input</th>
            <th>Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Pembuatan Baru</td>
            <td>`code` *(Term of Payment Code)* wajib unik *(unique constraint)* di seluruh perusahaan.</td>
        </tr>
        <tr>
            <td>Input Hari</td>
            <td>`discount_days_1`, `discount_days_2`, dan `net_due_days` hanya menerima bilangan bulat (*Integer*) bernilai positif atau nol.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Tingkat Sensitivitas</th>
            <th>Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Menengah</td>
            <td>Setiap pembuatan atau modifikasi harus terekam *Timestamps* dan siapa yang memodifikasinya di tabel master (`payment_terms`).</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>AC Code</th>
            <th>Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>AC-TOP-01</td>
            <td>Pengguna tidak dapat menyimpan master TOP apabila `discount_days_2` diisi nilai 5 sementara `discount_days_1` bernilai 10. Sistem mengeluarkan validasi (Chronological Check).</td>
        </tr>
        <tr>
            <td>AC-TOP-02</td>
            <td>Saat *Posting Date* adalah 1 Januari, sistem akan secara instan menghitung *Due Date* = 31 Januari apabila TOP mensyaratkan N30 (`net_due_days` = 30).</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Ketergantungan Pada</th>
            <th>Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Vendor / Customer Engine</td>
            <td>Kode termin wajib dapat ditarik (*Lookup*) oleh *form* registrasi mitra bisnis.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 10:31:43',
                'updated_at' => '2026-07-24 19:27:40',
            ),
            66 => 
            array (
                'id' => 121,
                'brd_code' => 'BRD-009',
            'title' => 'Currency & Exchange Rate (Mata Uang & Kurs)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-009</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Currency & Exchange Rate (Mata Uang & Kurs)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">System Configuration Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Master Currencies</strong></td>
            <td class="border px-2 py-1">Pembuatan profil mata uang (Kode ISO, Simbol, Presisi Desimal) beserta penentuan Base Currency perusahaan.</td>
            <td class="border px-2 py-1">Pengaturan format penulisan angka spesifik wilayah (koma vs titik) (Diatur di level User Profile/Browser).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Exchange Rates</strong></td>
            <td class="border px-2 py-1">Perekaman manual tabel histori kurs harian/periodik untuk berbagai tipe kurs.</td>
            <td class="border px-2 py-1">Integrasi sinkronisasi kurs otomatis dari API eksternal (Misal: API Bank Indonesia). Ini adalah fase pengembangan terpisah.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Base Currency</strong></td>
            <td class="border px-2 py-1">Mata uang patokan/standar untuk pencatatan Jurnal Akuntansi (Umumnya IDR untuk di Indonesia).</td>
            <td class="border px-2 py-1">Setiap instalasi perusahaan hanya boleh memiliki satu buah Base Currency yang aktif.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Rate Types</strong></td>
            <td class="border px-2 py-1">Klasifikasi kategori nilai tukar untuk tujuan bisnis yang berbeda (Contoh: CORPORATE untuk pembukuan internal, TAX untuk faktur pajak, BI_TENGAH untuk pelaporan regulator).</td>
            <td class="border px-2 py-1">Kurs untuk dokumen komersial selalu menggunakan rate CORPORATE kecuali di-override eksplisit oleh user.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Kurs Pajak Kementerian Keuangan</strong></td>
            <td class="border px-2 py-1">Dokumen faktur pajak keluaran yang bertransaksi menggunakan valas wajib dikonversi menggunakan kurs resmi perpajakan, bukan kurs korporasi internal. Sistem mengakomodasi ini via pembedaan parameter <code>rate_type</code>.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Perusahaan (Company/Branch)</strong></td>
            <td class="border px-2 py-1">One-to-One (1:1)</td>
            <td class="border px-2 py-1">Seluruh cabang wajib tunduk pada satu Base Currency korporat yang telah ditetapkan di tabel mata uang ini.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Exchange Rates (History)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Tabel riwayat nilai tukar akan merujuk berulang kali kepada entitas Master Mata Uang setiap periodenya.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Operational Documents (SO, PO, Invoice)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Setiap <em>header</em> transaksi komersial wajib menyimpan referensi ID mata uang apa yang sedang digunakan oleh dokumen tersebut.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Maintenance Master Currency</strong></td>
            <td class="border px-2 py-1">Admin Finance menambahkan mata uang JPY (Yen). Mengunci presisi desimal ke 0 (karena yen tidak memiliki sen). Transaksi JPY di UI akan menolak input pecahan.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Input Daily Exchange Rate</strong></td>
            <td class="border px-2 py-1">Setiap pagi, staf Finance masuk ke menu Exchange Rates. Memilih USD to IDR, memasukkan kurs tengah hari itu, dan mensubmit datanya (berlaku mulai tanggal hari ini).</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Finance Manager</strong></td>
            <td class="border px-2 py-1">Full Access</td>
            <td class="border px-2 py-1">Memiliki hak untuk menambah mata uang baru dan meng-<em>update</em> tabel kurs hari ini atau tanggal mundur yang periode akuntansinya masih terbuka.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Sales & Purchasing Staff</strong></td>
            <td class="border px-2 py-1">Read Only (Via Backend)</td>
            <td class="border px-2 py-1">Hanya menggunakan (<em>fetch</em>) data kurs saat membuat pesanan valas, tidak dapat mengedit master data.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Active Currency</strong></td>
            <td class="border px-2 py-1">Kode mata uang dapat dipilih saat pembuatan transaksi atau master pelanggan/pemasok baru.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Inactive Currency</strong></td>
            <td class="border px-2 py-1">Kode disembunyikan dari dropdown pilihan. Dokumen lama yang sudah telanjur menggunakan mata uang ini tetap sah (karena ID tersimpan di database).</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Single Base Currency</td>
            <td class="border px-2 py-1">Sistem hanya mengeksekusi operasi (set <code>is_base_currency = 1</code>) setelah secara transaksional me-reset (set <code>is_base_currency = 0</code>) pada seluruh rekaman lain di tabel mata uang.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Rate Reversion Prevention</td>
            <td class="border px-2 py-1">Dilarang memasukkan atau mengedit data histori kurs pada tanggal (<code>valid_from</code>) yang jatuh pada Periode Akuntansi yang statusnya sudah ditutup (<em>Closed Period</em>).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-03</strong></td>
            <td class="border px-2 py-1">Fallback to Latest Rate</td>
            <td class="border px-2 py-1">Jika sebuah transaksi terjadi di hari Sabtu (dimana tidak ada input kurs hari Sabtu), sistem secara cerdas akan mengambil kurs terbaru dengan tanggal <code>valid_from</code> terbesar yang kurang dari tanggal transaksi (misal: mengambil kurs hari Jumat).</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>decimal_places</strong></td>
            <td class="border px-2 py-1"><code>2</code> (Secara umum untuk valas mayoritas).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>is_active</strong></td>
            <td class="border px-2 py-1"><code>True</code> (1)</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>is_base_currency</strong></td>
            <td class="border px-2 py-1"><code>False</code> (0)</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>rate_type</strong> (Kurs)</td>
            <td class="border px-2 py-1"><code>\'CORPORATE\'</code> (Literal)</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Create Currency Code</strong></td>
            <td class="border px-2 py-1">Wajib persis 3 Karakter, Kapital Semua, dan Alphabet murni (Regex: <code>^[A-Z]{3}$</code>).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Rate Input</strong></td>
            <td class="border px-2 py-1">Nilai kurs (<code>rate</code>) wajib lebih besar dari 0 (<code>min:0.000001</code>). Tidak boleh negatif.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Tinggi (Critical)</strong></td>
            <td class="border px-2 py-1">Modifikasi histori kurs yang sudah tersimpan sangat dihindari. Jika terjadi, tabel audit (serta kolom <code>updated_by</code>) wajib merekam data eksekutif yang melakukan perubahan, dikarenakan modifikasi ini akan berisiko mengubah valuasi finansial masa lalu.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Saat mengaktifkan <code>is_base_currency</code> pada mata uang IDR, sistem secara otomatis mengubah atribut mata uang USD, EUR, dsb menjadi <code>is_base_currency = 0</code> tanpa intervensi manual.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Sistem mengeluarkan fungsi pembulatan desimal sesuai atribut <code>decimal_places</code>. (IDR 100.25 dibulatkan menjadi 100, sementara USD 100.25 dibiarkan).</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-010 (Accounting Period)</strong></td>
            <td class="border px-2 py-1">Input histori kurs harus divalidasi ke status siklus buku besar pada modul BRD-010 (Mencegah input kurs di bulan yang sudah tutup buku).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Seluruh Modul Transaksional</strong></td>
            <td class="border px-2 py-1">Modul Pembelian, Penjualan, Jurnal GL, dan Persediaan mengandalkan master data ini untuk melakukan kalkulasi Valuasi (Base Value vs Foreign Value).</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 09:22:16',
                'updated_at' => '2026-07-22 09:26:02',
            ),
            67 => 
            array (
                'id' => 122,
                'brd_code' => 'BRD-033',
            'title' => 'Sales Organization Structure (Sales Org, Dist Channel)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <tbody class="bg-white">
        <tr>
            <th class="bg-gray-100 w-1/4">Document ID</th>
            <td>BRD-033</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Document Name</th>
            <td>Sales Organization Structure (Sales Org, Dist Channel)</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Module</th>
            <td>Sales & Distribution</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Version</th>
            <td>1.0</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Status</th>
            <td>Final</td>
        </tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Modul / Fitur</th>
            <th>In-Scope</th>
            <th>Out-of-Scope</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Sales Organizational Pillars</td>
            <td>Mendefinisikan hierarki bisnis perusahaan dalam menangani proses penjualan agar *scalable* (memfasilitasi bisnis Kontraktor/Jasa hingga Distribusi/Retail). Terdiri dari 3 pilar: *Sales Organization*, *Distribution Channel*, dan *Brand*.</td>
            <td>Hierarki internal staf penjualan (Sales Representative, Sales Manager) bukan bagian dari konfigurasi struktur enterprise ini, melainkan berada di ranah modul *Employee Master* (BRD-028).</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Konsep Utama</th>
            <th>Penjelasan</th>
            <th>Business Rules</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Sales Organization</td>
            <td>Unit tertinggi dalam struktur penjualan yang bertanggung jawab penuh secara yuridis dan perpajakan terhadap produk yang dijual dan perlindungan pelanggan.</td>
            <td>Wajib terikat secara eksklusif (1:1) pada satu *Company Code* pusat. Mustahil satu transaksi penjualan dilakukan tanpa merujuk ke entitas ini.</td>
        </tr>
        <tr>
            <td>Distribution Channel</td>
            <td>Kanal atau metode bagaimana material/layanan fisik mencapai tangan pelanggan (contoh: Proyek, Retail, Grosir, E-Commerce).</td>
            <td>Membantu manajemen membedakan strategi penetapan harga (*Pricing*) atau batas minimal volume pembelian antar jalur.</td>
        </tr>
        <tr>
            <td>Brand (Lini Bisnis)</td>
            <td>Pengelompokan logis material atau jasa menjadi lini bisnis atau grup merek tertentu (contoh: Lini Jasa Konstruksi vs Lini Material Bangunan).</td>
            <td>Material master akan terikat pada brand ini.</td>
        </tr>
        <tr>
            <td>Sales Area</td>
            <td>Entitas operasional mutlak yang merupakan gabungan unik dari ketiganya: (Sales Org + Dist Channel + Brand).</td>
            <td>Setiap dokumen *Sales Order* dan struktur master *Pricing* wajib direferensikan tepat pada satu *Sales Area*.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Komponen Regulasi</th>
            <th>Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Entitas Legal Faktur Pajak</td>
            <td>Karena *Sales Organization* mewakili entitas penagih yang terikat mutlak 1:1 pada *Company*, maka identitas PKP (Pengusaha Kena Pajak) akan selalu ditarik dari *Company* induk dari *Sales Organization* tempat transaksi terjadi.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Entitas Anak / Modul</th>
            <th>Tipe Relasi & Kardinalitas</th>
            <th>Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Company Master</td>
            <td>One-to-One (1:1) dengan Sales Org</td>
            <td>Setiap *Sales Organization* didedikasikan hanya untuk satu *Company*. Namun satu *Company* boleh memiliki lebih dari satu *Sales Organization* (One-to-Many dari sisi Company).</td>
        </tr>
        <tr>
            <td>Material / Customer Pricing</td>
            <td>Many-to-One (N:1) dengan Sales Area</td>
            <td>Diskon harga (*Pricing Group*) pelanggan dapat bervariasi bergantung pada di *Sales Area* mana (*Wholesale* atau *Retail*) transaksi dibentuk.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Fitur Utama</th>
            <th>Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Sales Area Mapping</td>
            <td>Sistem Admin menyatukan ID *Sales Org*, ID *Dist Channel*, dan ID *Brand* ke dalam tabel rujukan (junction) bernama *Sales Area*.</td>
        </tr>
        <tr>
            <td>Sales Order Initiation</td>
            <td>Saat User *Sales* memulai transaksi pemesanan baru, *Field* pertama yang wajib ia tentukan adalah *Sales Area*. Keputusan ini akan menyaring pelanggan, material, dan harga yang relevan di *dropdown* selanjutnya.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Aktor / Role</th>
            <th>Hak Akses</th>
            <th>Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>System Architect / Admin</td>
            <td>Create, Edit, Delete</td>
            <td>Penambahan elemen organisasi berdampak masif, hanya boleh dilakukan secara sentral oleh tim IT Master Data.</td>
        </tr>
        <tr>
            <td>Sales Team</td>
            <td>Read-Only</td>
            <td>Hanya dapat menelusuri (*Lookup*) referensi *Sales Area* yang *Active* saat membuat pesanan.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Status Life-cycle</th>
            <th>Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Active</td>
            <td>Unit organisasi siap menampung transaksi *Sales Order*.</td>
        </tr>
        <tr>
            <td>Inactive</td>
            <td>Unit dihentikan operasionalnya. Sistem menolak pembentukan pesanan baru pada unit yang sudah tidak aktif (meskipun sejarah laporannya tetap ada).</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>BR Code</th>
            <th>Nama Aturan</th>
            <th>Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>BR-ORG-01</td>
            <td>Strict Triangle Area</td>
            <td>Sebuah *Sales Area* harus selalu terdiri dari *Sales Org*, *Dist Channel*, DAN *Brand* secara berbarengan. Tidak diizinkan ada kombinasi 2 pilar saja yang lolos dari *Form Validation*.</td>
        </tr>
        <tr>
            <td>BR-ORG-02</td>
            <td>Unique Assignment</td>
            <td>Sistem akan memblokir (Duplicate Error) apabila User mencoba mendaftarkan kombinasi 3 elemen *Sales Area* yang sudah pernah didaftarkan.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Field / Atribut</th>
            <th>Nilai Default</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Is Active</td>
            <td>True (Setiap entitas cabang organisasi baru akan langsung aktif secara default).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Skenario / Form Input</th>
            <th>Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Sales Area Creation</td>
            <td>Form Request: `unique:sales_areas,sales_org_id,NULL,id,dist_channel_id,XX,division_id,YY` - harus mutlak memvalidasi keunikan komposit 3 FK sekaligus.</td>
        </tr>
        <tr>
            <td>Sales Org Creation</td>
            <td>`company_id` => `required|exists:companies,id`. Tidak boleh bernilai NULL, mewajibkan tautan ke master perusahaan.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Tingkat Sensitivitas</th>
            <th>Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Kritis</td>
            <td>Log aktivitas mutlak (Timestamps dan `created_by`, `updated_by`) pada keempat tabel master tersebut untuk mencegah restrukturisasi entitas secara diam-diam.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>AC Code</th>
            <th>Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>AC-ORG-01</td>
            <td>Sistem memicu galat "Kombinasi Sales Area sudah terdaftar" jika User mencoba menginput *Sales Org* = SO01, *Dist Channel* = RT01, *Division* = DV01 untuk kedua kalinya.</td>
        </tr>
        <tr>
            <td>AC-ORG-02</td>
            <td>Ketika entitas *Sales Org* (SO01) dinonaktifkan (`is_active = false`), maka otomatis semua daftar *Sales Area* yang melibatkan SO01 akan hilang dari opsi pembuatan Dokumen Pesanan Penjualan.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Ketergantungan Pada</th>
            <th>Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Company Master</td>
            <td>Pijakan awal struktur `sales_organizations`.</td>
        </tr>
        <tr>
            <td>Sales Order Module</td>
            <td>Modul hilir SO tidak akan dapat dibangun sebelum arsitektur referensi 4 tabel ini berdiri.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 10:31:43',
                'updated_at' => '2026-07-24 19:48:48',
            ),
            68 => 
            array (
                'id' => 123,
                'brd_code' => 'BRD-034',
            'title' => 'Purchasing Organization Structure (Purch Org, Purch Group)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <tbody class="bg-white">
        <tr>
            <th class="bg-gray-100 w-1/4">Document ID</th>
            <td>BRD-034</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Document Name</th>
            <td>Purchasing Organization Structure (Purch Org, Purch Group)</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Module</th>
            <td>Material Management (Procurement)</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Version</th>
            <td>1.0</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Status</th>
            <td>Final</td>
        </tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Modul / Fitur</th>
            <th>In-Scope</th>
            <th>Out-of-Scope</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Purchasing Org Structure</td>
            <td>Merumuskan hierarki dasar pembelian material dan jasa melalui pembagian **Purchasing Organization** secara yuridis dan **Purchasing Group** secara eksekusi operasional (*Buyer*).</td>
            <td>Manajemen daftar level persetujuan (Persetujuan PO/PR), di mana itu akan berpegang pada modul Approval Engine sentral (BRD-029).</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Konsep Utama</th>
            <th>Penjelasan</th>
            <th>Business Rules</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Purchasing Organization</td>
            <td>Unit teratas dalam hierarki pengadaan yang berwenang melakukan negosiasi harga pokok (kontrak) dan prasyarat legal dengan pihak Pemasok (*Vendor*).</td>
            <td>Diikat mutlak secara 1:1 ke entitas `Company` (Sentralisasi tingkat Perusahaan). Segala klaim liability pembelian akan membebani entitas Company ini.</td>
        </tr>
        <tr>
            <td>Purchasing Group</td>
            <td>Satuan kerja (*Desk*) atau individu *Buyer* yang bertanggung jawab penuh terhadap penerbitan *Purchase Order* (PO) dari hari ke hari.</td>
            <td>Diikat mutlak secara 1:N di bawah naungan `Purchasing Organization`. *Buyer* tidak bisa melakukan pemesanan tanpa mewakili salah satu Organisasi Pembelian.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Komponen Regulasi</th>
            <th>Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Purchase Liability (Kewajiban)</td>
            <td>Kewajiban pelunasan hutang (*Accounts Payable*) dibebankan secara pajak kepada `Company` yang menaungi `Purchasing Organization` yang mencetak kontrak pemesanan. Identitas penagihan ke Vendor harus seragam dengan alamat NPWP Company terkait.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Entitas Anak / Modul</th>
            <th>Tipe Relasi & Kardinalitas</th>
            <th>Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Company Master</td>
            <td>One-to-One (1:1) dengan Purch. Org</td>
            <td>Relasi vertikal yang absolut, memastikan agar perputaran anggaran terpusat.</td>
        </tr>
        <tr>
            <td>Vendor Master</td>
            <td>Many-to-One (N:1) dengan Purch. Org</td>
            <td>Vendor harus "di-extend" atau diaktifkan data keuangannya spesifik pada suatu *Purchasing Organization* sebelum bisa diterbitkan *Purchase Order*.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Fitur Utama</th>
            <th>Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Pembuatan Purchase Order</td>
            <td>Ketika *Buyer* membuat *Purchase Order*, sistem memaksa (*Hard validation*) pengisian kolom *Purchasing Organization* dan *Purchasing Group* pada *Header* dokumen.</td>
        </tr>
        <tr>
            <td>Segregation of Reporting</td>
            <td>Laporan Pembelian Harian, Analisis *Spend*, dan *Vendor Performance* dapat di-*filter* berdasarkan kinerja masing-masing *Purchasing Group*.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Aktor / Role</th>
            <th>Hak Akses</th>
            <th>Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Procurement Manager / IT Master Data</td>
            <td>Create, Edit, Delete</td>
            <td>Akses mengelola master hierarki ini dibatasi hanya pada level Manajerial teratas atau Tim IT agar struktur pengadaan tidak kacau.</td>
        </tr>
        <tr>
            <td>Buyer / Purchasing Staff</td>
            <td>Read-Only</td>
            <td>*Buyer* hanya bertindak sebagai pengguna referensi data (*Lookup*) saat melakukan transaksi sehari-hari.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Status Life-cycle</th>
            <th>Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Active</td>
            <td>Grup *Buyer* dan Unit Organisasi Pembelian dapat dipilih di *dropdown* menu pembuatan *Purchase Order*.</td>
        </tr>
        <tr>
            <td>Inactive</td>
            <td>Sistem menyembunyikan referensi tersebut dari transaksi baru. Modifikasi ini tidak merusak (*cascade delete*) PO lama yang secara riwayat sudah mencatat kode unit yang kini inaktif.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>BR Code</th>
            <th>Nama Aturan</th>
            <th>Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>BR-PUR-01</td>
            <td>Mandatory Hierarchical Bound</td>
            <td>Setiap *Purchasing Group* yang dibuat harus mutlak terasosiasi (terikat secara *Foreign Key*) kepada satu *Purchasing Organization*.</td>
        </tr>
        <tr>
            <td>BR-PUR-02</td>
            <td>One Company Rule</td>
            <td>Satu *Company* hanya diizinkan memiliki maksimum 1 (satu) entitas *Purchasing Organization*. Sistem akan menolak pembuatan duplikat pada tingkat *Company* (1:1).</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Field / Atribut</th>
            <th>Nilai Default</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Is Active</td>
            <td>True (Aktif secara default).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Skenario / Form Input</th>
            <th>Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Purch. Org Master</td>
            <td>`company_id` harus unik di seluruh tabel `purchasing_organizations` (`unique:purchasing_organizations,company_id`).</td>
        </tr>
        <tr>
            <td>Purch. Group Master</td>
            <td>Kombinasi `code` dan `purchasing_org_id` harus dijaga unik. (Boleh ada kode Grup \'PG1\' di berbagai Org, tapi tidak boleh ada dua \'PG1\' di Org yang sama).</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Tingkat Sensitivitas</th>
            <th>Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Tinggi</td>
            <td>Setiap aksi *Create*, *Update*, dan *Soft Delete* wajib menyematkan relasi ke `users` (`created_by`, `updated_by`, `deleted_by`) dan Timestamp.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>AC Code</th>
            <th>Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>AC-PUR-01</td>
            <td>User A akan mendapatkan validasi _Error Message_ "Company ini telah memiliki Organisasi Pembelian" jika mencoba membuat *Purch Org* baru pada Company 1000 yang sudah dipetakan.</td>
        </tr>
        <tr>
            <td>AC-PUR-02</td>
            <td>Master *Purchasing Group* tidak dapat disimpan ke *Database* apabila field `purchasing_org_id` dibiarkan kosong (NULL).</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Ketergantungan Pada</th>
            <th>Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Company Master</td>
            <td>Sumber parameter hierarki tingkat tinggi.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 10:31:43',
                'updated_at' => '2026-07-25 02:39:59',
            ),
            69 => 
            array (
                'id' => 125,
                'brd_code' => 'BRD-008',
            'title' => 'Document Type Mapping (Cross-Module Integration)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-008</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Document Type Mapping (Cross-Module Integration)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">System Configuration Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Cross-Module Lineage</strong></td>
            <td class="border px-2 py-1">Pemetaan relasi dari satu tipe dokumen (Source) ke tipe dokumen lanjutan (Target) di modul yang sama maupun berbeda.</td>
            <td class="border px-2 py-1">Pemetaan item/material level. (Hanya memetakan Header Document Type).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Default Route Assignment</strong></td>
            <td class="border px-2 py-1">Penyetelan flag <code>is_default</code> jika satu sumber bisa melahirkan lebih dari satu target, agar UI memilih rute utama secara otomatis.</td>
            <td class="border px-2 py-1">Otomasi <em>batch job</em> pembuatan dokumen secara otomatis dari <em>schedule</em>.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Document Mapping</strong></td>
            <td class="border px-2 py-1">Integrasi yang mengikat dokumen operasional (misal: SO ke DO). Mencegah perpindahan tipe dokumen yang tidak sinkron.</td>
            <td class="border px-2 py-1">Tanpa adanya konfigurasi mapping, fitur "Copy To" atau "Generate From" pada dokumen operasional akan dinonaktifkan (disable).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Target Module Restriction</strong></td>
            <td class="border px-2 py-1">Filter klasifikasi modul (misal: INVOICE, DELIVERY) agar sistem tahu tujuan spesifik mapping tersebut di UI mana.</td>
            <td class="border px-2 py-1">Tipe dokumen tujuan harus berasal dari modul yang dideskripsikan di <code>target_module</code>.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>End-to-end Traceability</strong></td>
            <td class="border px-2 py-1">Mapping yang terkontrol ketat memastikan bahwa jalur audit komersial (Quotation -> SO -> DO -> Invoice -> Payment) tidak akan terputus karena intervensi user yang memilih tipe dokumen sembarangan.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Source Document Type</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Setiap baris mapping merujuk pada satu tipe dokumen induk/asal (contoh: SO_STD).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Target Document Type</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Setiap baris mapping menunjuk pada tipe dokumen yang boleh menjadi keturunan/kelanjutannya (contoh: DO_STD).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Operational Interface (UI)</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N)</td>
            <td class="border px-2 py-1">Layar transaksi "Copy/Draw" hanya akan memunculkan menu dropdown tipe dokumen berdasarkan hasil relasi ini.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Mapping Configuration</strong></td>
            <td class="border px-2 py-1">Admin masuk ke menu Document Type Mapping. Mengisi: Tipe Dokumen Asal -> Menuliskan Modul Tujuan -> Memilih Tipe Dokumen Tujuan.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Copy-to Execution</strong></td>
            <td class="border px-2 py-1">User Operasional di modul Sales menekan tombol "Copy to Delivery". Sistem mengecek mapping ini. Jika ada 2 opsi, sistem memunculkan pop-up pilihan, default disorot pada <code>is_default = true</code>.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Super Admin</strong></td>
            <td class="border px-2 py-1">Full Access</td>
            <td class="border px-2 py-1">Bebas melakukan mapping lintas modul asalkan logic-nya rasional (Misal: tidak membuat relasi sirkular).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Staff Operasional</strong></td>
            <td class="border px-2 py-1">Read Only (Via Backend)</td>
            <td class="border px-2 py-1">Hanya menikmati efek logika filter dari mapping saat melakukan proses dokumen.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Active</strong></td>
            <td class="border px-2 py-1">Pemetaan tersedia dan dokumen tujuan dapat di-generate dari dokumen asal tersebut.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Inactive</strong></td>
            <td class="border px-2 py-1">Opsi rute tersebut hilang dari form transaksi.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Unique Origin-Target</td>
            <td class="border px-2 py-1">Kombinasi (Source ID + Target Module + Target ID) harus unik mutlak. Tidak boleh ada baris duplikat yang mendefinisikan rute yang sama.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Single Default</td>
            <td class="border px-2 py-1">Untuk setiap (Source ID + Target Module) yang sama, sistem hanya mengizinkan maksimal SATU record yang memiliki <code>is_default = true</code>.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>is_default</strong></td>
            <td class="border px-2 py-1"><code>False</code> (0)</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>is_active</strong></td>
            <td class="border px-2 py-1"><code>True</code> (1)</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pemilihan Source/Target</strong></td>
            <td class="border px-2 py-1">Sistem memblokir jika pengguna mencoba memetakan Source dan Target pada Document Type yang persis sama (Self-mapping ditolak).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Input Target Module</strong></td>
            <td class="border px-2 py-1">Teks harus Upper Case, tanpa spasi (Max 50 Char).</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Tinggi (Critical)</strong></td>
            <td class="border px-2 py-1">Segala perubahan <em>route</em> bisnis wajib terekam pada kolom <code>created_by</code>, <code>updated_by</code> beserta waktu spesifik kejadian.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Sistem menampilkan error saat di-submit apabila <code>source_document_type_id</code> sama persis nilainya dengan <code>target_document_type_id</code>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Sistem melakukan <em>auto-uncheck</em> (atau melempar validasi error) jika User mencoba mencentang dua <code>is_default</code> pada Source + Target Module yang identik.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-006 (Document Type)</strong></td>
            <td class="border px-2 py-1">Merupakan Master Data absolut dari tipe dokumen yang akan dipetakan.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 09:15:06',
                'updated_at' => '2026-07-22 09:18:33',
            ),
            70 => 
            array (
                'id' => 126,
                'brd_code' => 'BRD-018',
            'title' => 'Accounting Document Architecture (General Ledger)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-018</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Accounting Document Architecture (General Ledger)</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Finance / General Ledger</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">General Ledger & Journal</td><td class="border px-2 py-1">Desain penyimpanan Jurnal Umum, struktur Header dan Line Item, manajemen saldo Debet/Kredit, dan pembatalan (*Reversal*).</td><td class="border px-2 py-1">Akuntansi Biaya (Cost Accounting) tingkat lanjut seperti alokasi overhead (Assessment/Distribution).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Clearing Open Items</td><td class="border px-2 py-1">Pelacakan pembayaran invoice melalui sistem clearing di level Line Item.</td><td class="border px-2 py-1">Rekonsiliasi Bank otomatis dengan MT940.</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Accounting Principle (Double Entry)</td><td class="border px-2 py-1">Setiap dokumen jurnal harus menyeimbangkan (Balance) total sisi Debet dan sisi Kredit.</td><td class="border px-2 py-1">Sistem akan memblokir proses POSTING jika saldo jurnal tidak sama persis antara Debit dan Kredit.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Header vs Line Item</td><td class="border px-2 py-1">Satu Dokumen Jurnal memiliki satu Header (menyimpan nomor seri, tanggal referensi, header text) dan minimal dua Line Item (menyimpan akun GL, nominal).</td><td class="border px-2 py-1">Dokumen jurnal tidak bisa diterbitkan jika line item kurang dari 2.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Immutability (Immutable Ledgers)</td><td class="border px-2 py-1">Buku besar yang diakui dan diposting bersifat mutlak. Jika ada kesalahan, jurnal tidak dihapus melainkan dilakukan Reversal.</td><td class="border px-2 py-1">Fungsi hapus permanen (Hard Delete) dimatikan di tabel ini.</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Standar Akuntansi Keuangan (SAK)</td><td class="border px-2 py-1">Nomor dokumen (Voucher Number) berurutan mutlak tanpa loncatan (gap-less) dalam bulan berjalan/tahun kalender, mengikuti aturan audit baku.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Tax Audit Trail</td><td class="border px-2 py-1">Dilengkapi dengan kolom Tax Code di level baris untuk memudahkan penarikan laporan dasar pengenaan pajak (DPP) secara langsung dari Buku Besar.</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">accounting_documents</td><td class="border px-2 py-1">Tabel Induk (Header)</td><td class="border px-2 py-1">Menyimpan metadata jurnal seperti Document Number, Posting Date, Document Date.</td></tr>
<tr><td class="border px-2 py-1 font-bold">accounting_document_items</td><td class="border px-2 py-1">Many-to-One (N:1) dengan accounting_documents</td><td class="border px-2 py-1">Menyimpan rincian per baris (GL Account, Debet/Kredit, Nominal, Cost Center).</td></tr>
<tr><td class="border px-2 py-1 font-bold">coas</td><td class="border px-2 py-1">Many-to-One (N:1) dengan items</td><td class="border px-2 py-1">Akun tujuan tempat nilai ditampung.</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Open Item Tracking</td><td class="border px-2 py-1">Status item berstatus "Open" jika field `clearing_document_id` masih NULL. Berubah "Cleared" jika terisi ID pembayaran (seperti AR/AP module).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Line Item Analytics</td><td class="border px-2 py-1">Setiap baris dapat menampung dimensi analisa profitabilitas tambahan (seperti Cost Center, Dimensi) untuk *reporting*.</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Branch Accountant</td><td class="border px-2 py-1">Create, Read</td><td class="border px-2 py-1">Hanya dapat melihat dan menjurnal manual untuk cabang (`branch_id`) yang diotorisasikan.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Corporate Controller</td><td class="border px-2 py-1">Read All, Reverse</td><td class="border px-2 py-1">Dapat melihat jurnal seluruh cabang (Consolidated) dan membalik/reverse jurnal yang salah.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Posted</td><td class="border px-2 py-1">Jurnal tervalidasi dan diakui di neraca. Tidak dapat diubah/edit nominal atau GL-nya.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Reversed</td><td class="border px-2 py-1">Jurnal yang dibatalkan dengan menunjuk `reversal_document_id`. Kehilangan efek saldonya karena ternetralisir jurnal pembaliknya.</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-18-01</td><td class="border px-2 py-1">Zero Balance Validation</td><td class="border px-2 py-1">Total Local Amount sisi Debit (D) harus sama mutlak dengan total Kredit (C). Diaplikasikan secara ketat via *Observer / Validator*.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-18-02</td><td class="border px-2 py-1">Period Open Security</td><td class="border px-2 py-1">Posting Date harus jatuh di kalender *Accounting Period* (FI Period) yang terbuka (*Open*). Diotorisasi oleh Controller.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-18-03</td><td class="border px-2 py-1">Line Item Limit</td><td class="border px-2 py-1">Maksimal jumlah baris `items` dalam satu dokumen jurnal adalah 999 baris demi menjaga optimalitas *memory*.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document Date</td><td class="border px-2 py-1">Jika tidak disuplai secara eksplisit, disamakan dengan hari pembuatan (*Current Date*).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Exchange Rate</td><td class="border px-2 py-1">1.0 (Untuk mata uang lokal). Jika valas, dicari dari tabel Exchange Rate.</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">D/C Indicator</td><td class="border px-2 py-1">Validasi mutlak ENUM/String untuk `\'D\'` (Debet) dan `\'C\'` (Kredit) per baris item.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Clearing Date</td><td class="border px-2 py-1">Jika `clearing_document_id` disuntikkan, field `clearing_date` wajib terisi dan tanggalnya `>=` dari Posting Date jurnal asli.</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">High (Financial Immutability)</td><td class="border px-2 py-1">Sistem tidak memfasilitasi perintah Delete (`delete()`). Setiap aksi batal disalurkan via Reversal, merekam `updated_by` dan menanam *link* dokumen.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-18-01</td><td class="border px-2 py-1">Jika pengguna mem-POST jurnal dengan selisih Debet/Kredit 1 perak pun, API wajib *throw exception* dan database harus merespon dengan Rollback.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-18-02</td><td class="border px-2 py-1">Eksekusi pembatalan (*Reversal*) menghasilkan jurnal pembalik dengan nilai posisi (D/C) ditukar namun nominal dipertahankan.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-18-03</td><td class="border px-2 py-1">Pengguna bisa melihat Ledger (General Ledger Display) yang membedakan dokumen status "Open" (`clearing_document_id` IS NULL) dengan "Cleared".</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BRD-014 (Chart of Accounts)</td><td class="border px-2 py-1">Keabsahan dan tipe akun mutlak merujuk ke tabel COA.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BRD-011 (Number Range)</td><td class="border px-2 py-1">Penomoran jurnal tidak otomatis dari ID, melainkan ditarik dari Document Number Engine.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-22 13:43:55',
                'updated_at' => '2026-07-24 13:15:53',
            ),
            71 => 
            array (
                'id' => 128,
                'brd_code' => 'BRD-031',
                'title' => 'Credit Limit & Risk Management Rules',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <tbody class="bg-white">
        <tr>
            <th class="bg-gray-100 w-1/4">Document ID</th>
            <td>BRD-031</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Document Name</th>
            <td>Credit Limit & Risk Management Rules</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Module</th>
            <td>Finance & Sales (Cross-Module)</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Version</th>
            <td>1.0</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Status</th>
            <td>Final</td>
        </tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Modul / Fitur</th>
            <th>In-Scope</th>
            <th>Out-of-Scope</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Credit Limit Management</td>
            <td>Penetapan batas kredit pelanggan (Credit Limit) pada tingkatan organisasi Credit Control Area. Perhitungan Credit Exposure dari Order dan Faktur yang belum dibayar.</td>
            <td>Peringatan tagihan otomatis (Dunning / Collection Management) yang merupakan fitur terpisah.</td>
        </tr>
        <tr>
            <td>Risk Management</td>
            <td>Pengelompokan pelanggan ke dalam Kategori Risiko (Risk Category) untuk menentukan seberapa ketat sistem bereaksi saat batas limit tersentuh.</td>
            <td>Integrasi dengan sistem biro kredit eksternal secara API otomatis.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Konsep Utama</th>
            <th>Penjelasan</th>
            <th>Business Rules</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Credit Control Area</td>
            <td>Tingkatan organisasi (Organizational Unit) yang mengendalikan dan memantau pemberian kredit. Berfungsi sebagai entitas sentral di mana satu atau beberapa Company Code mematuhi kebijakan limit yang sama.</td>
            <td>Nilai mata uang (Currency) untuk manajemen kredit didefinisikan secara independen di level ini, terlepas dari mata uang transaksi lokal masing-masing Company.</td>
        </tr>
        <tr>
            <td>Credit Exposure</td>
            <td>Total nilai finansial berjalan atas risiko pelanggan. Merupakan penjumlahan nilai dari: Open Sales Orders, Open Deliveries, dan Open Receivables (Piutang Terbuka).</td>
            <td>Secara dinamis dikalkulasi setiap kali terjadi pembaruan status faktur (pelunasan pembayaran mengurangi exposure, pembuatan SO menambah exposure).</td>
        </tr>
        <tr>
            <td>Credit Block</td>
            <td>Status penahanan (Blocking) yang dijatuhkan pada dokumen Sales Order atau Delivery ketika Credit Exposure telah melampaui plafon yang ditetapkan di Credit Limit.</td>
            <td>Hanya dapat dilepas (Released) melalui panel otoritas khusus oleh Credit Controller.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Komponen Regulasi</th>
            <th>Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Audit Finansial</td>
            <td>Setiap tindakan `Release Credit Block` yang mengabaikan plafon batas kredit harus di-log secara permanen dengan mewajibkan pencatatan alasan (*Reason Note*) oleh pengguna terkait.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Entitas Anak / Modul</th>
            <th>Tipe Relasi & Kardinalitas</th>
            <th>Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Company Master</td>
            <td>Many-to-One (N:1)</td>
            <td>Beberapa Company dapat berada di bawah payung satu Credit Control Area (Sentralisasi Kredit).</td>
        </tr>
        <tr>
            <td>Customer Master</td>
            <td>One-to-Many (1:N)</td>
            <td>Satu pelanggan dapat memiliki limit yang berbeda-beda jika ia berbisnis lintas Credit Control Area (meskipun jarang, sistem tetap mendukung relasi ini secara spesifik).</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Fitur Utama</th>
            <th>Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Credit Limit Checking</td>
            <td>1. Saat Sales Order disubmit, sistem menjumlahkan Net Value pesanan dengan Credit Exposure saat ini.<br>2. Sistem membandingkannya dengan Plafon (Credit Limit) pelanggan.<br>3. Jika melebihi batas, sistem mengubah status pesanan menjadi \'Credit Blocked\' (Tidak dapat dilanjutkan ke Delivery).</td>
        </tr>
        <tr>
            <td>Credit Block Review (Inquiry)</td>
            <td>Credit Controller membuka Dashboard Blocked Documents. Mereka dapat meninjau, mengubah nilai limit secara permanen, atau memberikan *Bypass Release* per-dokumen (*one-time release*).</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Aktor / Role</th>
            <th>Hak Akses</th>
            <th>Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Sales Team</td>
            <td>Read-Only (Melihat status limit)</td>
            <td>Tidak dapat merilis (Bypass) pesanan yang terblokir maupun mengubah Plafon Kredit.</td>
        </tr>
        <tr>
            <td>Credit Controller (Finance)</td>
            <td>Create, Edit Plafon & Release Blokir</td>
            <td>Membutuhkan akses penuh terhadap modul *Credit Management Panel*.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Status Life-cycle</th>
            <th>Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Approved (Normal)</td>
            <td>Pesanan Penjualan (SO) dapat dilanjutkan ke tahap Pengiriman Barang (Delivery).</td>
        </tr>
        <tr>
            <td>Credit Blocked</td>
            <td>Tahap pengiriman atau pembuatan Invoice terkunci secara fungsi sampai otorisator membebaskannya.</td>
        </tr>
        <tr>
            <td>Released (Bypassed)</td>
            <td>Dokumen yang terblokir telah diizinkan lanjut secara khusus (satu kali) walau eksposurnya tinggi.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>BR Code</th>
            <th>Nama Aturan</th>
            <th>Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>BR-CRD-01</td>
            <td>Limit Exceed Prevention</td>
            <td>Total Exposure + Nilai Transaksi Baru = Total Terkalkulasi. Jika Total Terkalkulasi > Nilai Limit, sistem wajib memblokir laju dokumen tersebut secara presisi.</td>
        </tr>
        <tr>
            <td>BR-CRD-02</td>
            <td>Risk Category Tightening</td>
            <td>Pelanggan dalam Risk Category = \'HIGH RISK\' (Risiko Tinggi) dapat diterapkan pengecekan tambahan, misal tidak mengizinkan bypass tanpa Down Payment.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Field / Atribut</th>
            <th>Nilai Default</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Credit Limit Amount</td>
            <td>0 (Jika nol, artinya pelanggan wajib membayar di muka/COD, tidak ada limit piutang).</td>
        </tr>
        <tr>
            <td>Credit Status Blocked</td>
            <td>False (Pelanggan tidak sedang dalam sanksi hold kredit global).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Skenario / Form Input</th>
            <th>Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Konfigurasi Master Limit</td>
            <td>Kombinasi `customer_id` dan `credit_control_area_id` wajib Unik (Unique Constraint) untuk mencegah duplikasi plafon limit pada area yang sama.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Tingkat Sensitivitas</th>
            <th>Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Sangat Tinggi</td>
            <td>Semua perubahan Nilai Limit wajib menyertakan log *Before/After* yang mengikat `updated_by`.</td>
        </tr>
        <tr>
            <td>Tinggi</td>
            <td>Tindakan rilis SO terblokir (Credit Bypass) wajib direkam ke dalam `activity_logs`.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>AC Code</th>
            <th>Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>AC-CRD-01</td>
            <td>Sistem memunculkan status "Credit Blocked" ketika SO senilai 10 Juta disubmit oleh pelanggan yang memiliki Limit tersisa 5 Juta.</td>
        </tr>
        <tr>
            <td>AC-CRD-02</td>
            <td>Credit Exposure pelanggan akan menurun (Capacity bertambah) secara instan sesaat setelah transaksi Incoming Payment (AR Receipt) dibukukan untuk pelanggan tersebut.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Ketergantungan Pada</th>
            <th>Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Master Currency</td>
            <td>Credit Control Area mengikat master `currencies` sebagai basis mata uang pelaporan limit kredit.</td>
        </tr>
        <tr>
            <td>AR & SO Engine</td>
            <td>Bergantung mutlak pada trigger dari modul Accounts Receivable (Finance) dan Sales Order (Sales) untuk *update* kalkulasi nilai exposure secara real-time.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 12:57:25',
                'updated_at' => '2026-07-24 19:14:43',
            ),
            72 => 
            array (
                'id' => 129,
                'brd_code' => 'BRD-025',
                'title' => 'Reason Code Configuration',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-025</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Reason Code Configuration</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Inventory / Finance / Sales</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Master Reason Code</td><td class="border px-2 py-1">Mendefinisikan arsitektur tata kelola untuk "Kode Alasan" baku yang digunakan pada transaksi tanpa referensi dokumen absolut (Misal: *Adjustment* stok, pengeluaran barang rusak).</td><td class="border px-2 py-1">Pemetaan jurnal (Account Determination). *Reason Code* hanya bertindak sebagai referensi tambahan (*Account Modifier*), bukan mesin pemroses jurnalnya.</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Standardized Justification</td><td class="border px-2 py-1">Mengunci *input* pengguna dari *free-text* menjadi daftar baku agar memudahkan agregasi laporan kerugian.</td><td class="border px-2 py-1">Setiap transaksi di luar kewajaran (tanpa dokumen dasar) wajib menyertakan kode alasan yang terdaftar dan berstatus Aktif.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Attachment Enforcement</td><td class="border px-2 py-1">Menambahkan parameter khusus di tingkat *master data* untuk mengendalikan apakah *user* gudang/sales wajib mengunggah Berita Acara (BAP).</td><td class="border px-2 py-1">Jika kode alasan memiliki parameter bukti = `True`, maka proses penyimpanan di level transaksional harus dicegah jika file fisik tidak ada.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Account Modifier Linkage</td><td class="border px-2 py-1">Menyediakan kolom *Account Modifier* yang akan disuntikkan ke proses *Auto Journal*.</td><td class="border px-2 py-1">Contoh: Alasan "Expired" -> Modifier `EXP`. Alasan "Dicuri" -> Modifier `STL`. Jurnalnya akan dialokasikan ke akun beban yang berbeda oleh modul *Account Determination*.</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Audit & BAP Mutlak</td><td class="border px-2 py-1">Kehilangan persediaan merupakan isu audit berat. Keberadaan parameter kewajiban bukti (*Requires Attachment*) mutlak diperlukan untuk kepatuhan finansial.</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">reason_codes</td><td class="border px-2 py-1">Tabel Induk (Master)</td><td class="border px-2 py-1">Berdiri sendiri, mensuplai data pilihan alasan untuk transaksi di seluruh cabang perusahaan.</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Pembuatan Master Reason</td><td class="border px-2 py-1">Admin Finance/Logistics membuka form pembuatan -> Input kode (maks 10 karakter) -> Isi nama alasan (misal: "Barang Kedaluwarsa") -> Tentukan apakah butuh upload BAP -> Isi Account Modifier (opsional) -> Simpan.</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Super Admin / Finance</td><td class="border px-2 py-1">Full Access</td><td class="border px-2 py-1">Dapat mengelola daftar alasan dan menentukan Account Modifier.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Logistics User</td><td class="border px-2 py-1">Read-Only (Dropdown)</td><td class="border px-2 py-1">Hanya bisa menggunakan daftar yang sudah ada pada saat melakukan *Adjustment* atau *Scrap*.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Inactive</td><td class="border px-2 py-1">Alasan yang sudah di-*set* *Inactive* tidak akan muncul lagi di *dropdown* operasional harian.</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-RC-01</td><td class="border px-2 py-1">Modifikasi Kunci Alasan</td><td class="border px-2 py-1">Parameter `account_modifier` yang kosong (null) akan disikapi oleh sistem jurnal (Otomasi) sebagai posting umum ke GL *Expense* *default*, bukan *error*.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Is Active</td><td class="border px-2 py-1">`true`.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Requires Attachment</td><td class="border px-2 py-1">`false`.</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Kode Unik per Entitas</td><td class="border px-2 py-1">Kombinasi `company_id` + `code` mutlak divalidasi (*Unique Constraint*).</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Medium</td><td class="border px-2 py-1">Perubahan `account_modifier` harus terekam oleh `updated_by` dan waktu di `updated_at`.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-01</td><td class="border px-2 py-1">Pengguna tidak dapat membuat kode alasan yang sama untuk perusahaan (Company) yang sama.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-02</td><td class="border px-2 py-1">API `reason_codes` mereturn data JSON lengkap dengan flag `requires_attachment` untuk di-render kondisional oleh Frontend di modul *Adjustment*.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Master Company</td><td class="border px-2 py-1">Pemetaan kode alasan bersifat hierarki ke masing-masing profil perusahaan, bukan *shared* antar PT/Company.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-22 17:28:12',
                'updated_at' => '2026-07-24 10:02:26',
            ),
            73 => 
            array (
                'id' => 130,
                'brd_code' => 'BRD-026',
                'title' => 'Movement Type Configuration',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-026</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Movement Type Configuration</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Inventory Management (MM)</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Konfigurasi Inti</td><td class="border px-2 py-1">Pengaturan dasar jenis pergerakan barang (Movement Type) seperti arah stok, pembaruan kuantitas, dan nilai.</td><td class="border px-2 py-1">Pengaturan modul eksternal yang di-trigger oleh mutasi barang.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Otomasi Sistem</td><td class="border px-2 py-1">Pemetaan pergerakan otomatis untuk jurnal akun dan referensi dokumen asalnya.</td><td class="border px-2 py-1">Pembuatan dokumen MIGO manual yang tidak standar.</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Movement Type</td><td class="border px-2 py-1">Kunci kontrol tiga digit (misal: 101, 311) yang mendikte bagaimana sistem merespon sebuah transaksi inventoris. Menentukan apakah stok naik, turun, atau hanya pindah status.</td><td class="border px-2 py-1">Mengontrol secara absolut semua mutasi persediaan di dalam sistem.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Control Flags</td><td class="border px-2 py-1">Parameter kaku ("Hard Rules") pada Movement Type yang menetapkan: Perbarui Stok (Ya/Tidak), Perbarui Nilai (Ya/Tidak), Wajib ada referensi dokumen pendahulu (Ya/Tidak).</td><td class="border px-2 py-1">Mencegah manipulasi stok manual yang tidak wajar dengan mem-bypass aturan referensi.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Goods Movement Mapping</td><td class="border px-2 py-1">Penerjemahan aktivitas UI menjadi penentuan otomatis Movement Type. (Misal: User klik "Goods Receipt" + Referensi "Purchase Order" otomatis dialokasikan ke Movement Type 101).</td><td class="border px-2 py-1">User tidak perlu/tidak boleh memilih kode 3 digit secara manual di layar aplikasi.</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Audit Trail Inventori</td><td class="border px-2 py-1">Setiap *Material Document* yang di-*posting* terikat abadi dengan *Movement Type*-nya. Perubahan pada konfigurasi *Movement Type* tidak berlaku mundur.</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">movement_types</td><td class="border px-2 py-1">Tabel Induk (Master)</td><td class="border px-2 py-1">Tabel utama yang menyimpan definisi dan control flags setiap tipe mutasi (seperti requires_reference, direction).</td></tr>
<tr><td class="border px-2 py-1 font-bold">goods_movement_mappings</td><td class="border px-2 py-1">Many-to-One (N:1) dengan movement_types</td><td class="border px-2 py-1">Tabel pemetaan yang menghubungkan aksi UI (misal: Penerimaan Barang) dan Dokumen Referensi (misal: PO) dengan sebuah Movement Type secara otomatis.</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Konfigurasi Control Flags</td><td class="border px-2 py-1">Administrator masuk ke layar Master Movement Type -> Menambah/edit Movement Type -> Mencentang aturan kaku (Hard Rules) seperti "Update Value" atau "Requires Reference" -> Simpan.</td></tr>
<tr><td class="border px-2 py-1 font-bold">UI-to-Engine Mapping</td><td class="border px-2 py-1">Administrator menetapkan Aksi UI dan Kode Referensi di layar "Goods Movement Mapping" dan menghubungkannya dengan Movement Type yang tepat. Saat operasional berjalan, User Gudang hanya perlu berinteraksi dengan "Aksi" tanpa melihat kode Movement Type.</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Administrator / Super Admin</td><td class="border px-2 py-1">Create, Read, Update, Delete</td><td class="border px-2 py-1">Dapat melakukan segala perubahan konfigurasi, namun dibatasi oleh status data yang sudah pernah di-*posting* agar integritas masa lalu tidak hancur.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Warehouse / Inventory User</td><td class="border px-2 py-1">Read-Only (Implicit via Transaksi)</td><td class="border px-2 py-1">User operasional tidak memiliki akses ke layar Master Data ini sama sekali. Akses mereka sebatas menikmati pemetaan (Mapping) di latar belakang.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Active</td><td class="border px-2 py-1">Movement Type dapat dipanggil atau diturunkan melalui mapping UI.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Inactive (Blocked)</td><td class="border px-2 py-1">Terkunci dari segala jenis transaksi baru. Transaksi lama tetap terbaca di histori.</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-01</td><td class="border px-2 py-1">Wajib Referensi</td><td class="border px-2 py-1">Jika atribut `requires_reference = TRUE`, sistem memblokir *posting* persediaan jika dokumen referensi (PO/SO) kosong. Validasi dieksekusi di Controller layer transaksi.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-02</td><td class="border px-2 py-1">Arah Saldo Stok (Direction)</td><td class="border px-2 py-1">Arah (`Direction`) = `IN` wajib menambah saldo stok, `OUT` wajib mengurangi. Dieksekusi otomatis oleh *Engine* Inventori saat kalkulasi posting.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-03</td><td class="border px-2 py-1">Validasi Transfer</td><td class="border px-2 py-1">Tipe `TRANSFER` wajib mencantumkan Gudang Asal dan Gudang Tujuan yang valid pada payload API. Dieksekusi via *FormRequest*.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Update Quantity</td><td class="border px-2 py-1"><code>True</code> (Otomatis mencentang kewajiban meng-update stok kuantitas).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Update Value</td><td class="border px-2 py-1"><code>True</code> (Otomatis mencentang kewajiban meng-update nilai finansial FI/CO).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Requires Reference</td><td class="border px-2 py-1"><code>False</code>.</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Input Kode Movement Type</td><td class="border px-2 py-1">Format kode mutlak bersifat unik (`unique:movement_types`). Maksimal 10 karakter.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Set Reversal Movement</td><td class="border px-2 py-1">Nilai *Reversal Movement* tidak boleh menunjuk pada *ID* tabel itu sendiri. (Misal: 101 mereverse 101 akan dilempar peringatan *Circular Reversal*).</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">High</td><td class="border px-2 py-1">Semua *creation* atau *update* (terutama pengubahan kontrol flag) harus menyertakan `created_by` dan `updated_by` yang terikat pada *ID User* yang melakukannya.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-01</td><td class="border px-2 py-1">Sistem berhasil menyimpan master Movement Type dengan kombinasi `direction` dan konfigurasi *flags* tanpa *error*.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-02</td><td class="border px-2 py-1">Pada layar pemetaan (*Mapping*), saat user memilih Aksi "Goods Receipt" + Dokumen Referensi "PO", sistem akan mengekstrak kode mutasi dengan akurat dan menjadikannya nilai bawaan.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Auto Journal Mapping</td><td class="border px-2 py-1">Atribut <code>transaction_key</code> pada Movement Type menjadi referensi utama yang dilempar ke *Accounting Engine* untuk menentukan GL Account yang di-debit/kredit.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Type</td><td class="border px-2 py-1">Atribut <code>document_type_id</code> digunakan untuk menentukan nomor seri (*Number Range*) dokumen jurnal atau mutasi yang bersangkutan.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-20 13:00:45',
                'updated_at' => '2026-07-24 09:58:04',
            ),
            74 => 
            array (
                'id' => 131,
                'brd_code' => 'BRD-022',
            'title' => 'Material Type Configuration (Tipe Material)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-022</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Material Type Configuration (Tipe Material)</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Inventory / Master Data</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Material Type Master</td><td class="border px-2 py-1">Pengelompokan tingkat tertinggi (induk) dari karakteristik material. Menentukan properti sentral seperti pelacakan kuantitas, nilai, dan hak jual/beli.</td><td class="border px-2 py-1">Penentuan pajak penjualan (karena pajak diatur secara terpisah melalui material group/tax code).</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Quantity Updating Rule</td><td class="border px-2 py-1">Menentukan apakah material mencatat mutasi fisik (`is_qty_updated`). Barang fisik (Bahan Baku) nilainya `True`. Jasa (Cleaning Service) nilainya `False`.</td><td class="border px-2 py-1">Jasa tidak dapat disimpan di gudang (*No Stock Tracking*).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Value Updating Rule</td><td class="border px-2 py-1">Menentukan apakah barang memiliki akun inventaris aset yang bergerak (`is_value_updated`). Jika `False`, maka pembelian barang akan langsung melempar jurnal ke Beban/Biaya (Expense) bukan ke Aset.</td><td class="border px-2 py-1">Jika `True`, material wajib dikenakan konfigurasi Valuation Class.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module Cross-Check Flags</td><td class="border px-2 py-1">`is_sales_allowed` mengizinkan jual. `is_purchase_allowed` mengizinkan beli. (Bahan baku tidak boleh dijual, Barang jadi mutlak dilarang dibeli dari vendor eksternal).</td><td class="border px-2 py-1">Sistem langsung membatalkan baris dokumen (SO/PO) yang mencoba melanggar flag ini.</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Financial Segregation</td><td class="border px-2 py-1">Pemisahan mutlak antara barang fisik (Inventaris Aset) dengan Jasa (Beban langsung) untuk menjaga kewajaran Neraca dan Laba Rugi sesuai prinsip GAAP.</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">material_types</td><td class="border px-2 py-1">Tabel Master</td><td class="border px-2 py-1">Definisi tipe-tipe spesifik (Misal: ROH, HALB, FERT, DIEN).</td></tr>
<tr><td class="border px-2 py-1 font-bold">document_numbering_engines</td><td class="border px-2 py-1">Many-to-One dengan material_types</td><td class="border px-2 py-1">Tipe material dapat merujuk format penomoran (SKU) otomatis.</td></tr>
<tr><td class="border px-2 py-1 font-bold">materials</td><td class="border px-2 py-1">One-to-Many dengan material_types</td><td class="border px-2 py-1">Setiap barang wajib diklasifikasikan ke dalam tipe material ini secara permanen.</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">SKU Generation</td><td class="border px-2 py-1">Jika sebuah tipe material merujuk pada *Document Numbering*, field `material_code` (SKU) menjadi *Read-Only* di antarmuka web, dan backend akan meng-generate ID-nya saat di-save.</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Super Admin / Implementer</td><td class="border px-2 py-1">Read, Update (Hardcoded Init)</td><td class="border px-2 py-1">Perubahan *flag* berdampak sistemik. Tabel ini idealnya didefinisikan sekali saat awal instalasi ERP dan diblokir perubahannya.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Transaction Block</td><td class="border px-2 py-1">Memasukkan material dengan `is_sales_allowed = false` ke Sales Order akan langsung men-trigger exception pembatalan (*Rollback*).</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-22-01</td><td class="border px-2 py-1">Immutable Association</td><td class="border px-2 py-1">Tipe material TIDAK BOLEH diubah pada sebuah barang (`materials` table) jika barang tersebut telah memiliki histori transaksi atau stok awal.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-22-02</td><td class="border px-2 py-1">SKU Unique Logic</td><td class="border px-2 py-1">Meskipun di-*generate* mesin, kombinasi `company_id` + `type_code` harus absolut unik.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Sales / Purchase Flags</td><td class="border px-2 py-1">Default di-*set* `False` pada saat inisialisasi agar hak jual/beli diberikan secara eksplisit.</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Type Code Format</td><td class="border px-2 py-1">Regex `^[A-Z0-9]+$`. Maksimal 10 karakter. Tanpa spasi (Contoh: `ROH`, `HALB`, `SERV`).</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">High (Architectural)</td><td class="border px-2 py-1">Perubahan pada 4 *flags* utama wajib mencatat `updated_by` dan waktu perubahan secara akurat. Dilarang menghapus rekaman (*Hard Delete*).</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-22-01</td><td class="border px-2 py-1">API menolak penambahan material tipe "Bahan Baku" (yang mana `is_sales_allowed = false`) ke dalam baris Sales Order dengan mengembalikan Exception HTTP 422.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-22-02</td><td class="border px-2 py-1">Menciptakan Material baru dengan tipe yang terhubung ke `document_numbering_engine_id` secara otomatis mengembalikan SKU berformat (Misal: FIN-0004) tanpa harus mengetik manual.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BRD-011 (Number Engine)</td><td class="border px-2 py-1">Menentukan konfigurasi *auto-numbering* SKU.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-22 16:40:47',
                'updated_at' => '2026-07-24 13:20:04',
            ),
            75 => 
            array (
                'id' => 132,
                'brd_code' => 'BRD-024',
            'title' => 'Valuation Class (Kelas Valuasi Akuntansi)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-024</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Valuation Class</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Master Data (Finance / Inventory)</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Pengelompokan Valuasi</td><td class="border px-2 py-1">Mendefinisikan pengelompokan akuntansi (seperti Barang Jadi, Bahan Baku, Jasa) yang akan disematkan pada setiap Master Barang.</td><td class="border px-2 py-1">Konfigurasi mapping per material secara manual di GL.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Batasan Tipe Material</td><td class="border px-2 py-1">Valuation Class harus dipetakan terhadap Material Type mana saja yang boleh menggunakannya.</td><td class="border px-2 py-1">Kalkulasi harga pokok produksi / inventory costing.</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Accounting Bridge</td><td class="border px-2 py-1">Valuation Class adalah jembatan penyekat antara ranah Logistik dan Finance. Orang logistik tidak akan pernah disuruh mengisi GL Account, mereka hanya memilih "Valuation Class" saat membuat barang.</td><td class="border px-2 py-1">Mutlak melarang input GL langsung dari UI Master Barang.</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Prinsip Akuntansi Berterima Umum</td><td class="border px-2 py-1">Pengelompokan ini memastikan persediaan bahan baku dan barang dagangan terpisah secara sistematis di neraca.</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">valuation_classes</td><td class="border px-2 py-1">Tabel Master</td><td class="border px-2 py-1">Tabel yang menyimpan data referensi Valuation Class.</td></tr>
<tr><td class="border px-2 py-1 font-bold">material_type_valuation_class</td><td class="border px-2 py-1">Many-to-Many (N:M) Pivot</td><td class="border px-2 py-1">Tabel pivot pengaman agar Valuation "Bahan Baku" tidak bisa dipilih untuk Material Type "Jasa".</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Konfigurasi Mapping Pivot</td><td class="border px-2 py-1">Admin masuk ke modul Valuation Class -> Menambahkan "Bahan Baku (3000)" -> Mengaitkan ke Material Type "ROH" (Raw Material) dan "HALB" (Semi-Finished).</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Financial Controller</td><td class="border px-2 py-1">Full Access</td><td class="border px-2 py-1">Hanya Finance yang menentukan klasifikasi akuntansi barang.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Inactive</td><td class="border px-2 py-1">Jika sebuah Valuation Class di nonaktifkan, ia tidak akan muncul di form *Create Material* baru. Material lama tidak terpengaruh.</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-VC-01</td><td class="border px-2 py-1">Restriksi Material Type</td><td class="border px-2 py-1">Sistem akan memblokir (*form validation error*) jika user logistik memilih Valuation Class yang tidak terafiliasi dengan Material Type yang dipilihnya pada master barang.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Is Active</td><td class="border px-2 py-1">`true`.</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Kode Unik</td><td class="border px-2 py-1">Kode kelas valuasi (Misal 3000) bersifat unik di dalam satu perusahaan.</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">High</td><td class="border px-2 py-1">Perekaman siapa yang mengubah *mapping* `material_type_valuation_class` sangat krusial.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-01</td><td class="border px-2 py-1">Pembuatan barang *Raw Material* (ROH) hanya menampilkan opsi Valuation Class yang berelasi dengan ROH pada tabel pivot.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Material Types</td><td class="border px-2 py-1">Pembatasan berdasarkan tipe bahan baku.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-22 16:58:11',
                'updated_at' => '2026-07-24 10:01:23',
            ),
            76 => 
            array (
                'id' => 133,
                'brd_code' => 'BRD-028',
                'title' => 'BRD - Employee & Job Position Master',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-028</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Employee & Job Position Master</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Master Data (HR / Cross Module)</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Arsitektur HR Sentral</td><td class="border px-2 py-1">Membangun master Tabel Jabatan (Job Positions) dan Tabel Pegawai (Employees) yang mencakup fungsi lintas departemen.</td><td class="border px-2 py-1">Tidak mencakup modul Payroll (Penggajian) dan Penilaian Kinerja (Performance Appraisal).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Flagging Multiperan</td><td class="border px-2 py-1">Dukungan flag seperti `is_sales_rep` untuk mengontrol peran fungsional pegawai di modul logistik/sales.</td><td class="border px-2 py-1">Sistem approval presensi (Time & Attendance).</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Centralized Master Data</td><td class="border px-2 py-1">Sistem memusatkan seluruh entitas karyawan ke tabel `employees`. Keunikan peran dikontrol menggunakan kolom penanda (flags).</td><td class="border px-2 py-1">Mencegah duplikasi profil untuk karyawan yang sama yang melakukan multi-peran.</td></tr>
<tr><td class="border px-2 py-1 font-bold">User Identity Linking</td><td class="border px-2 py-1">Menautkan `employees.user_id` secara opsional untuk menjembatani identitas profil HR dengan identitas akses login sistem.</td><td class="border px-2 py-1">Seorang pegawai hanya boleh dikaitkan ke satu User Login.</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Data Privacy</td><td class="border px-2 py-1">Informasi sensitif pegawai (nomor telepon, alamat, dll) hanya boleh diakses oleh HR atau manajemen tingkat atas.</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">job_positions</td><td class="border px-2 py-1">Tabel Master</td><td class="border px-2 py-1">Tabel master jabatan spesifik per entitas perusahaan (Misal: SPV, MGR, Salesman).</td></tr>
<tr><td class="border px-2 py-1 font-bold">employees</td><td class="border px-2 py-1">Many-to-One (N:1) dengan job_positions</td><td class="border px-2 py-1">Tabel master pegawai pusat. Pengganti absolut entitas sektoral lama.</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Registrasi Multiguna</td><td class="border px-2 py-1">HR Admin membuat profil pegawai, mengisi data NIK, dan mencentang checkbox (misal: "Pegawai ini berfungsi juga sebagai Sales Representative"). Maka pegawai tersebut akan masuk ke direktori umum dan daftar sales.</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">HR Manager</td><td class="border px-2 py-1">Create, Read, Update, Delete (Soft)</td><td class="border px-2 py-1">Otoritas penuh untuk membuat atau menonaktifkan akun pegawai.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Modul Eksternal (SD/MM)</td><td class="border px-2 py-1">Read-Only</td><td class="border px-2 py-1">Hanya dapat melihat/memilih daftar pegawai aktif sesuai filter modulnya (misal: filter is_sales_rep).</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Terminated / Inactive</td><td class="border px-2 py-1">Pegawai dengan status ini (atau yang di-soft-delete) tidak bisa lagi dipilih di form transaksi dokumen operasional baru, namun jejak namanya tetap di dokumen historis.</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-EMP-01</td><td class="border px-2 py-1">Keunikan NIK Karyawan</td><td class="border px-2 py-1">Kombinasi `company_id` + `employee_code` wajib unik di seluruh sistem. Dieksekusi via Unique Validation FormRequest.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-EMP-02</td><td class="border px-2 py-1">Pegawai as Sales Representative</td><td class="border px-2 py-1">Modul SD hanya memanggil pegawai di mana `is_sales_rep = true` dan `status = Active`.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Job Position Is Active</td><td class="border px-2 py-1">`true`.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Is Sales Rep</td><td class="border px-2 py-1">`false`.</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Input First Name & Jabatan</td><td class="border px-2 py-1">`first_name` dan `job_position_id` tidak boleh kosong (Required).</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Medium to High</td><td class="border px-2 py-1">Perubahan status terminasi krusial bagi audit HR. Atribut `updated_by` merekam siapa yang mengubah status terakhir kali.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-01</td><td class="border px-2 py-1">User HR dapat membuat jabatan baru (misal: "Kepala Gudang") dan sukses masuk ke tabel `job_positions`.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-02</td><td class="border px-2 py-1">User membuat profil Pegawai dengan mencentang `is_sales_rep`, menyimpannya, lalu pegawai tersebut ter-load dengan benar di API resolver untuk Rute Kunjungan Modul Sales.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Users Table</td><td class="border px-2 py-1">Terkait langsung ke kredensial sistem via field `user_id`.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Visit Routes</td><td class="border px-2 py-1">Operasional rute kunjungan bertumpu 100% pada pemanggilan parameter pegawai ini.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-20 13:16:57',
                'updated_at' => '2026-07-24 17:42:16',
            ),
            77 => 
            array (
                'id' => 134,
                'brd_code' => 'BRD-035',
                'title' => 'Enterprise Structure Assignment & Hierarchy Mapping',
                'project_id' => NULL,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <tbody class="bg-white">
        <tr>
            <th class="bg-gray-100 w-1/4">Document ID</th>
            <td>BRD-035</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Document Name</th>
            <td>Enterprise Structure Assignment & Hierarchy Mapping</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Module</th>
            <td>Master Data / Organization</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Version</th>
            <td>1.0</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Status</th>
            <td>Final</td>
        </tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Modul / Fitur</th>
            <th>In-Scope</th>
            <th>Out-of-Scope</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Enterprise Matrix</td>
            <td>Menetapkan penugasan silang (*Assignment*) untuk fasilitas/pabrik (*Branch*), wilayah hukum kredit (*Credit Control Area*), wilayah operasional penjualan (*Sales Area*), dan wilayah pembelian (*Purchasing Organization*).</td>
            <td>Pembuatan struktur master induknya (Telah direalisasikan di BRD 031, 033, dan 034).</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Konsep Utama</th>
            <th>Penjelasan</th>
            <th>Business Rules</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Credit to Company Assignment</td>
            <td>Menautkan satu Perusahaan (*Company*) untuk bernaung di bawah satu yurisdiksi batas piutang (*Credit Control Area*).</td>
            <td>Relasi absolut 1:1 antara Company dengan Credit Control Area. Satu perusahaan tidak dapat memiliki kebijakan kredit yang bercabang di level entitas hukum.</td>
        </tr>
        <tr>
            <td>Plant to Sales Matrix</td>
            <td>Menentukan Gudang/Pabrik mana saja yang diizinkan menerbitkan barang untuk *Sales Area* tertentu.</td>
            <td>Relasi N:N. Satu *Branch* bisa mensuplai banyak *Sales Area*, dan satu *Sales Area* bisa mengambil stok dari banyak *Branch* yang disetujui.</td>
        </tr>
        <tr>
            <td>Plant to Purchasing Matrix</td>
            <td>Menentukan hak wewenang Organisasi Pembelian mana saja yang boleh memasok material ke Gudang/Pabrik tertentu.</td>
            <td>Relasi N:N. Digunakan untuk model sentralisasi (*Central Purchasing*) maupun pengadaan tingkat lokal (*Plant-Specific*).</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Komponen Regulasi</th>
            <th>Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Laporan Perpajakan</td>
            <td>Penugasan matriks *Plant to Sales Area* menjamin konsolidasi PPN (Pajak Pertambahan Nilai) tetap terpusat pada *Company* induk tanpa pencampuran aset antar perusahaan afiliasi.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Entitas Anak / Modul</th>
            <th>Tipe Relasi & Kardinalitas</th>
            <th>Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Company & Credit</td>
            <td>Company (Many/One) to (One) Credit Area</td>
            <td>Pemetaan atribut *foreign key* `credit_control_area_id` secara langsung di tabel profil `companies`.</td>
        </tr>
        <tr>
            <td>Branch & Sales Area</td>
            <td>Many-to-Many (N:N)</td>
            <td>Dikelola menggunakan tabel *Junction* / *Pivot* untuk mencatat pasangan `branch_id` dan `sales_area_id`.</td>
        </tr>
        <tr>
            <td>Branch & Purch Org</td>
            <td>Many-to-Many (N:N)</td>
            <td>Dikelola menggunakan tabel *Junction* / *Pivot* untuk pasangan `branch_id` dan `purchasing_organization_id`.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Fitur Utama</th>
            <th>Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Validasi Transaksi Sales</td>
            <td>Saat menerbitkan *Sales Order*, jika *User* memilih Gudang (Plant) yang belum di-*assign* ke *Sales Area* tersebut, sistem wajib memblokirnya secara otomatis.</td>
        </tr>
        <tr>
            <td>Validasi Transaksi Pengadaan</td>
            <td>Saat menerbitkan *Purchase Order*, sistem memverifikasi korelasi *Branch* penerima barang dengan *Purchasing Organization* yang membuat dokumen kontrak/PO.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Aktor / Role</th>
            <th>Hak Akses</th>
            <th>Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>IT System Administrator</td>
            <td>Full Access</td>
            <td>Satu-satunya entitas yang berhak mengubah hierarki matriks persimpangan. Akses harus dilindungi dari eksekutif/operasional tingkat menengah.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Status Life-cycle</th>
            <th>Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Active Matrix</td>
            <td>Kombinasi Plant + Area dapat difungsikan pada transaksi riil.</td>
        </tr>
        <tr>
            <td>Revoked/Inactive</td>
            <td>Penghapusan penugasan memutus kelayakan pemrosesan transaksi baru antar entitas tersebut. Transaksi lampau yang sudah berstatus *Posted* tidak akan terpengaruh.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>BR Code</th>
            <th>Nama Aturan</th>
            <th>Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>BR-ASG-01</td>
            <td>Cross-Company Interlock</td>
            <td>Sebuah Gudang (*Branch*) TIDAK BOLEH ditugaskan (*assigned*) kepada *Sales Area* yang bernaung di bawah *Company* yang berbeda, untuk menghindari rekayasa laporan aset dan pajak.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Field / Atribut</th>
            <th>Nilai Default</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Status (is_active)</td>
            <td>True (Semua *Assignment* bernilai aktif saat pertama kali disimpan).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Skenario / Form Input</th>
            <th>Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Pivot Entry</td>
            <td>Kombinasi pasangan (*branch_id* + *sales_area_id*) harus bersifat unik agar tabel matriks tidak mengandung data cermin.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Tingkat Sensitivitas</th>
            <th>Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Tinggi</td>
            <td>Bahkan di tabel pivot (*Junction*), *stamps* audit rekam jejak `created_by`, `updated_by`, dan `deleted_by` (fitur *Soft Deletes*) wajib ditanam secara penuh (bukan relasi M:N pasif).</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>AC Code</th>
            <th>Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>AC-ASG-01</td>
            <td>Aplikasi memblokir dan membuang (*reject*) percobaan mengasosiasikan Gudang milik *Company A* kepada *Sales Area* milik *Company B*.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Ketergantungan Pada</th>
            <th>Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <tr>
            <td>Sales Area & Purch Org</td>
            <td>Sebagai penyedia *master data* yang akan ditautkan pada prosedur relasional matriks ini.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 13:16:57',
                'updated_at' => '2026-07-25 03:23:29',
            ),
            78 => 
            array (
                'id' => 135,
                'brd_code' => 'BRD-036',
                'title' => 'Pricing Access Sequence & Condition Table Engine',
                'project_id' => NULL,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-036</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Pricing Access Sequence &amp; Condition Table Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Cross-Module (Sales &amp; Purchasing)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Access Sequence</strong></td>
            <td class="border px-2 py-1">Mendefinisikan strategi hierarkis sistem dalam mencari harga yang valid, mulai dari kombinasi pelanggan spesifik hingga harga umum material.</td>
            <td class="border px-2 py-1">Pricing Procedure &amp; Skema Perhitungan Matematik (Itu bagian dari BRD tersendiri).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Condition Tables</strong></td>
            <td class="border px-2 py-1">Pendefinisian kombinasi metadata parameter (Condition Keys) yang menjadi penentu harga (Misal: Sales Org + Customer + Material).</td>
            <td class="border px-2 py-1">Manajemen fisik relasi EAV yang kompleks. Tabel direpresentasikan secara logikal via kolom indeks yang sudah di-flatten.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Access Sequence Logic</strong></td>
            <td class="border px-2 py-1">Urutan pencarian kondisi harga (Condition Technique). Sistem akan mengevaluasi dari step terkecil hingga terbesar. Jika harga ditemukan pada step 10 (spesifik), maka step 20 (umum) akan diabaikan.</td>
            <td class="border px-2 py-1">Pencarian menggunakan prinsip <em>Exclusive Search</em>. Harga spesifik pelanggan menimpa (override) harga katalog umum.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Condition Tables Matrix</strong></td>
            <td class="border px-2 py-1">Representasi struktural kombinasi field mana saja yang wajib diisi saat pengguna membuat data induk harga (Condition Records).</td>
            <td class="border px-2 py-1">Kombinasi <em>Key</em> harus selalu merujuk pada atribut entitas Enterprise (Sales Area, Customer, Material, dll).</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax &amp; Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Fair Pricing Law</strong></td>
            <td class="border px-2 py-1">Arsitektur ini memungkinkan pembuatan harga khusus per grup pelanggan (Pricing Group) sehingga subsidi silang atau kontrak B2B dapat dicatat dan dipertanggungjawabkan secara transparan.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure &amp; Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi &amp; Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Condition Types (BRD Pricing)</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1) dengan Access Sequence</td>
            <td class="border px-2 py-1">Banyak Tipe Kondisi (Misal: PR00, K004) dapat menggunakan satu Strategi Pencarian Harga yang sama.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Access Sequence Steps</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N) dengan Access Sequence</td>
            <td class="border px-2 py-1">Mendefinisikan langkah-langkah pencarian (Step 10, 20, 30, dst).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Condition Tables</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N) dengan Steps</td>
            <td class="border px-2 py-1">Tabel Kondisi (T001, T002) disematkan ke dalam Step Pencarian.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Evaluasi Harga Otomatis (Auto Pricing)</strong></td>
            <td class="border px-2 py-1">Saat tenaga penjual memasukkan SKU di Sales Order, sistem membaca Condition Type -> melihat Access Sequence -> memindai Step 10 (Customer Spesifik). Jika nihil, memindai Step 20 (Harga Katalog). Jika ditemukan, harga ditarik ke layar order.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Pembuatan Master Harga</strong></td>
            <td class="border px-2 py-1">Pricing Admin memilih Condition Type, lalu sistem akan menampilkan daftar "Condition Table" yang terikat pada Access Sequence-nya, misal Admin memilih tabel "Customer/Material", maka form akan mewajibkan input Customer ID dan Material ID.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls &amp; Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pricing Administrator</strong></td>
            <td class="border px-2 py-1">Create, Edit, Deactivate Condition Records</td>
            <td class="border px-2 py-1">Boleh mengubah nilai harga dan diskon, namun DILARANG MENGUBAH Access Sequence atau Condition Tables karena itu adalah ranah IT Configurator.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>IT / System Configurator</strong></td>
            <td class="border px-2 py-1">Full Access to Sequences</td>
            <td class="border px-2 py-1">Berhak mengatur metadata dan hierarki langkah pencarian (Step 10, 20, 30).</td>
        </tr>
    </tbody>
</table>

<h2>8. Status &amp; Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Active / Inactive Records</strong></td>
            <td class="border px-2 py-1">Access Sequence yang <code>is_active = FALSE</code> akan di-skip oleh mesin pencari, dan langsung meloncat ke kondisi/step berikutnya (atau berakibat Missing Price).</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-PRC-01</strong></td>
            <td class="border px-2 py-1">Exclusive Search Principle</td>
            <td class="border px-2 py-1">Jika harga sudah ditemukan pada step/langkah dengan prioritas lebih tinggi (angka step lebih kecil), maka pencarian Access Sequence HARUS BERHENTI dan tidak mencari ke step yang lebih umum.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-PRC-02</strong></td>
            <td class="border px-2 py-1">Mandatory Condition Table Fields</td>
            <td class="border px-2 py-1">Saat membuat Condition Record menggunakan Tabel tertentu (Misal: T001 yang berisi SalesOrg/DistChannel/Customer), maka sistem <strong>wajib</strong> menolak *Save* jika field Customer dikosongkan.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Step Number (access_sequence_steps)</strong></td>
            <td class="border px-2 py-1">Diisi kelipatan 10 (10, 20, 30) untuk memberi ruang penyisipan jika di masa depan ada strategi harga perantara.</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Condition Records Insert</strong></td>
            <td class="border px-2 py-1">API wajib mengekstrak metadata dari <code>condition_table_fields</code>, dan memastikan semua properti yang terdaftar tidak bernilai <code>NULL</code> pada *payload* <code>condition_records</code>.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Tinggi (Master Pricing)</strong></td>
            <td class="border px-2 py-1">Perubahan hierarki Access Sequence memengaruhi selisih margin harga miliaran rupiah. Relasi <code>updated_by</code> dan <code>created_by</code> wajib ditanam di seluruh tabel master Pricing Engine.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-PRC-01</strong></td>
            <td class="border px-2 py-1">Ketika fungsi <em>Resolver</em> harga dipanggil dengan parameter Sales Org 1000, Customer C1, dan Material M1, sistem mengembalikan harga Rp 10.000 (dari Step 10: Spesifik Customer) alih-alih Rp 12.000 (dari Step 20: Harga Umum).</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Master Material &amp; Customer</strong></td>
            <td class="border px-2 py-1">Semua kombinasi kunci pencarian (Condition Keys) akan bermuara pada ID yang diterbitkan oleh entitas logistik dan penjualan inti.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 13:16:57',
                'updated_at' => '2026-07-20 13:16:57',
            ),
            79 => 
            array (
                'id' => 136,
                'brd_code' => 'BRD-021',
            'title' => 'Global Unit of Measure (UOM) & Dimension',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-021</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Global Unit of Measure (UOM) & Dimension</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Inventory / Master Data</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">UOM Master Configuration</td><td class="border px-2 py-1">Pendaftaran kode satuan universal (seperti KG, PCS, BOX), dan batasan tipe data masukannya (desimal).</td><td class="border px-2 py-1">Manajemen pengemasan fisik (Handling Unit) atau perhitungan volume kubikasi logistik otomatis.</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Global Standardization</td><td class="border px-2 py-1">UOM berlaku lintas entitas (Tanpa referensi `company_id`). Hal ini mempermudah konsolidasi pelaporan stok grup perusahaan.</td><td class="border px-2 py-1">Meniadakan *tenant check* (*Company Scope*) pada master ini.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Decimal Precision Constraint</td><td class="border px-2 py-1">Sistem harus mengatur ketelitian kuantitas (desimal) sesuai satuan. Satuan \'Utuh\' (PCS, UNIT) tidak boleh menerima 0.5. Satuan \'Massa\' (KG, LTR) bisa menerima 2-4 digit desimal.</td><td class="border px-2 py-1">API Backend mengkonversi/memvalidasi jumlah desimal input berdasarkan settingan presisi.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Dimension Category</td><td class="border px-2 py-1">Pengelompokan Fisik. Contoh: `COUNT` (Jumlah), `WEIGHT` (Berat), `VOLUME` (Isi).</td><td class="border px-2 py-1">Membantu *reporting* grup.</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Inventory Valuation Audit</td><td class="border px-2 py-1">Menghindari kebocoran nilai HPP (Harga Pokok Penjualan) akibat *human error* menginput pecahan barang yang secara fisik tidak bisa dipecah.</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">uoms</td><td class="border px-2 py-1">Tabel Master Global</td><td class="border px-2 py-1">Pangkalan referensi seluruh satuan.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Material Master</td><td class="border px-2 py-1">One-to-Many dengan uoms</td><td class="border px-2 py-1">Digunakan sebagai *Base Unit of Measure* dan *Alternative Unit*.</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">UI Input Validation</td><td class="border px-2 py-1">Layar *Frontend* secara otomatis akan membaca nilai properti `decimal_places` dari UOM yang dipilih di modul hulu, lalu menyesuaikan *Step* `<input>` form.</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">System Administrator</td><td class="border px-2 py-1">Full Access (Except Delete)</td><td class="border px-2 py-1">Dilarang keras melakukan DELETE fisik (`DELETE FROM uoms`) untuk menjaga integritas transaksi lampau.</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Inactive Code</td><td class="border px-2 py-1">Jika `is_active` = False, satuan tidak bisa lagi dipilih di formulir transaksional maupun form Material, namun laporan terdahulu tetap bisa diakses.</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-21-01</td><td class="border px-2 py-1">Unique UOM Code</td><td class="border px-2 py-1">Kolom `uom_code` harus unik secara global. Maksimal 10 karakter (*Uppercase*).</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-21-02</td><td class="border px-2 py-1">Precision Lockdown</td><td class="border px-2 py-1">Saat *user* mengirim API berisi parameter `Quantity`, form validator akan mencocokkan jumlah desimal vs tabel limit.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Decimal Places</td><td class="border px-2 py-1">Di-*set* ke `0` (Nol desimal) bila pengguna mendaftarkan satuan baru namun form tersebut dibiarkan kosong.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Is Active</td><td class="border px-2 py-1">Otomatis bernilai `True`.</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">UOM Code</td><td class="border px-2 py-1">Regex Validator: `^[A-Z0-9]+$`. Spasi dan karakter non-alfanumerik mutlak dilarang.</td></tr>
<tr><td class="border px-2 py-1 font-bold">Decimal Places</td><td class="border px-2 py-1">Harus angka *Integer*, range 0 sampai maksimal 4.</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Low (Non-Financial)</td><td class="border px-2 py-1">Pelacakan standar menggunakan relasi `created_by` dan `updated_by` sudah lebih dari cukup.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-21-01</td><td class="border px-2 py-1">Validasi kuantitas pecahan gagal: Menginput 1.5 ke satuan PCS (dimana setelan desimal PCS=0) men-trigger Exception dari API.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-21-02</td><td class="border px-2 py-1">Validasi kuantitas pecahan berhasil: Menginput 10.25 ke satuan KG (dimana setelan desimal KG=2) sukses tersimpan.</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Material Master</td><td class="border px-2 py-1">Ini adalah *Pre-Requisite* (*blocking*) sebelum Material Master (BRD-024) bisa dibangun dengan benar.</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-22 16:34:27',
                'updated_at' => '2026-07-24 13:19:03',
            ),
            80 => 
            array (
                'id' => 137,
                'brd_code' => 'BRD-015',
                'title' => 'House Bank & Bank Account Master Setup',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-015</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">House Bank & Bank Account Master Setup</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Treasury & Cash Management Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0 (Standardized)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>House Bank Master</strong></td>
            <td class="border px-2 py-1">Pembentukan entitas institusi perbankan (Contoh: BCA, Bank Mandiri, Citibank) tempat perusahaan menaruh dananya.</td>
            <td class="border px-2 py-1">Integrasi Host-to-Host / API langsung ke Server Bank (Itu masuk modul <em>Payment Gateway</em>).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Bank Account Mapping</strong></td>
            <td class="border px-2 py-1">Pendaftaran nomor rekening riil (Misal: 1234567890 IDR) dan pengikatannya secara eksklusif (1:1) ke dalam satu Buku Besar (COA).</td>
            <td class="border px-2 py-1">Transaksi penerimaan (*Cash In*) atau pembayaran (*Cash Out*). Modul ini hanya sekadar mendaftarkan "Keranjang"-nya.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Two-Tier Bank Architecture</strong></td>
            <td class="border px-2 py-1">Sistem menganut skema dua lapis. Lapis pertama adalah identitas rumah bank-nya (*House Bank*). Lapis kedua adalah daftar rekening-rekening yang bernaung di rumah bank tersebut.</td>
            <td class="border px-2 py-1">Struktur ini diwajibkan untuk mengakomodir pencetakan cek, surat transfer giro, dan instruksi kliring yang berporos pada identitas <em>House Bank</em>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>1:1 GL Account Interlocking</strong></td>
            <td class="border px-2 py-1">Jembatan mutlak yang menghubungkan kas nyata di bank dengan laporan Neraca Perusahaan.</td>
            <td class="border px-2 py-1">Satu nomor rekening HANYA BOLEH menuangkan airnya ke dalam satu ember Akun Buku Besar (COA). Pencampuran saldo 2 rekening ke dalam 1 akun GL diharamkan untuk menjaga kewarasan proses <em>Bank Reconciliation</em>.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Rekening Atas Nama Entitas (Corporate Account Identity)</strong></td>
            <td class="border px-2 py-1">Aturan perpajakan mengharuskan penerimaan pembayaran PPN dan penarikan devisa masuk ke rekening atas nama Badan Hukum perusahaan (Bukan rekening pribadi direktur). Nama rekening yang didaftarkan (<code>account_name</code>) wajib dicetak di semua <em>Sales Invoice</em> komersial.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Companies (BRD-002)</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N)</td>
            <td class="border px-2 py-1">Setiap entitas Perusahaan dapat memiliki beberapa <em>House Bank</em>. (PT. Alfa memiliki akun di BCA dan Mandiri).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Chart of Accounts (BRD-014)</strong></td>
            <td class="border px-2 py-1">One-to-One (1:1)</td>
            <td class="border px-2 py-1">Satu rekening fisik secara eksklusif memonopoli satu Akun GL (Tidak boleh ada <em>sharing</em> akun).</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Setup House Bank</strong></td>
            <td class="border px-2 py-1">Treasury Staff masuk ke menu "House Banks", menekan tombol tambah, memasukkan kode "BCA" dan nama institusi "PT Bank Central Asia Tbk", beserta <em>SWIFT Code</em>. Disimpan.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Account Registration & Mapping</strong></td>
            <td class="border px-2 py-1">Di dalam layar BCA, staf menambahkan "Bank Account". Ia mengetikkan nomor "12345678", bermata uang "IDR", lalu memilih akun GL "1101-01 - BCA IDR" dari <em>dropdown</em>. Sistem memvalidasi ketersediaan akun GL tersebut.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Treasury Manager</strong></td>
            <td class="border px-2 py-1">Create, Edit, Deactivate</td>
            <td class="border px-2 py-1">Hanya manajer perbendaharaan yang boleh mendata rekening bank baru. Ini adalah kontrol krusial mencegah penggelapan dana lewat rekening siluman.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status (is_active)</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>TRUE (Active)</strong></td>
            <td class="border px-2 py-1">Rekening muncul di seluruh form Pemasukan dan Pengeluaran Kas (Bisa digunakan transaksi).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>FALSE (Inactive / Closed)</strong></td>
            <td class="border px-2 py-1">Rekening disembunyikan dari transaksi penerimaan uang. Rekening fisik ini mungkin sudah ditutup di kantor cabang bank.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Monopolistic GL Mapping (1:1)</td>
            <td class="border px-2 py-1">Jika sebuah Akun GL (misal: 1101-01) sudah terikat pada Rekening BCA, maka saat *user* membuat Rekening Mandiri, Akun 1101-01 TERSEBUT HARUS HILANG dari opsi <em>dropdown</em> pemilihan GL. Jika sistem berhasil ditembus, <em>Database Unique Constraint</em> akan menolaknya.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">GL Account Class Restrictor</td>
            <td class="border px-2 py-1">Saat mem-<em>mapping</em> bank ke GL, sistem HANYA mengizinkan akun GL yang memiliki kelas <em>ASSET</em> (Harta). Menautkan rekening bank ke akun <em>EXPENSE</em> (Beban) adalah kesalahan fatal yang harus dicegat secara sistematis.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>is_active</strong></td>
            <td class="border px-2 py-1"><code>TRUE</code> (Asumsi bahwa saat rekening didaftarkan ke ERP, rekening tersebut sudah hidup secara fisik di Bank).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Currency Check</strong></td>
            <td class="border px-2 py-1">Sistem wajib memvalidasi kode <code>currency_code</code> yang dimasukkan harus eksis di master <em>Currencies</em>.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Tinggi (High)</strong></td>
            <td class="border px-2 py-1">Setiap kali ada pembaruan pada kolom <code>chart_of_account_id</code> (menggeser jembatan buku besar), ini memicu peringatan audit. Sangat tidak disarankan memindahkan <em>mapping</em> GL jika rekening sudah memiliki saldo riil.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Ketika <em>Treasury Staff</em> mencoba menautkan Bank BCA Operasional ke Akun GL "1101-01", sistem berhasil menyimpan. Ketika staf mencoba menautkan Bank Mandiri Payroll ke Akun GL yang sama ("1101-01"), sistem melempar pesan error berwarna merah *"Akun GL ini telah digunakan oleh Rekening Bank Lain"*.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Dalam form penarikan laporan Daftar Rekening Bank, tampilan mengelompokkan <em>Bank Accounts</em> di bawah payung <em>House Banks</em> (BCA menaungi 2 rekening, Mandiri menaungi 1 rekening).</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-014 (Chart of Accounts)</strong></td>
            <td class="border px-2 py-1">Tanpa struktur COA, nomor rekening fisik sama sekali tidak bermakna di sistem akuntansi karena ia tidak memiliki wadah untuk bermuara.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 12:30:31',
                'updated_at' => '2026-07-22 12:54:55',
            ),
            81 => 
            array (
                'id' => 138,
                'brd_code' => 'BRD-030',
            'title' => 'Tolerance Limit Rules (GR, Invoice & Stock)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <tbody class="bg-white">
        <tr>
            <th class="bg-gray-100">Document ID</th>
            <td>BRD-030</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Document Name</th>
            <td>Tolerance Limit Rules (GR, Invoice & Stock)</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Module</th>
            <td>Cross-Module (Inventory, Purchasing, Finance)</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Version</th>
            <td>1.0</td>
        </tr>
        <tr>
            <th class="bg-gray-100">Status</th>
            <td>Final</td>
        </tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Modul / Fitur</th>
            <th>In-Scope</th>
            <th>Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tolerance Rules</td>
            <td>Penetapan batas deviasi (Tolerance Limit) secara global per perusahaan untuk variasi kuantitas dan harga pada proses Goods Receipt, Invoicing, dan Stock Adjustment.</td>
            <td>Penerapan grup toleransi spesifik per Vendor atau per Material (sementara seluruh aturan berlaku seragam per Company).</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Konsep Utama</th>
            <th>Penjelasan</th>
            <th>Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tolerance Key</td>
            <td>Kode fungsi yang menentukan jenis deviasi yang dievaluasi (contoh: GR_QTY, INV_PRICE).</td>
            <td>Sistem memindai nilai Tolerance Key yang cocok dengan jenis transaksi yang sedang berjalan.</td>
        </tr>
        <tr>
            <td>Upper & Lower Limits</td>
            <td>Batas deviasi ke atas (penerimaan lebih) dan ke bawah (penerimaan kurang).</td>
            <td>Dapat dikonfigurasi dalam nilai absolut (Nominal Amount) atau Persentase.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Komponen Regulasi</th>
            <th>Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Pajak & Penagihan</td>
            <td>Selisih nilai faktur yang melebihi batas toleransi akan diblokir, guna menghindari kesalahan pencatatan Hutang Usaha (Accounts Payable) dan klaim PPN Masukan.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Entitas Anak / Modul</th>
            <th>Tipe Relasi & Kardinalitas</th>
            <th>Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Company Master</td>
            <td>Many-to-One (N:1)</td>
            <td>Aturan limit toleransi melekat secara mutlak pada satu Company (Company Code).</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Fitur Utama</th>
            <th>Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Goods Receipt Validation</td>
            <td>Saat User memasukkan jumlah penerimaan (GR) yang berbeda dengan Pesanan (PO), sistem memverifikasi variasi tersebut dengan Tolerance Key `GR_QTY`. Jika melebihi batas, transaksi digagalkan (Hard Block) atau memicu pesan Error.</td>
        </tr>
        <tr>
            <td>Invoice Price Variance</td>
            <td>Saat User Finance memasukkan nilai tagihan (Invoice) yang berbeda dengan nilai PO / GR, sistem memverifikasi dengan Tolerance Key `INV_PRICE`.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Aktor / Role</th>
            <th>Hak Akses</th>
            <th>Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>System Admin / Finance Controller</td>
            <td>Create, Edit, Delete Tolerance Rules.</td>
            <td>Dibatasi secara ketat karena berdampak langsung pada terhentinya operasional gudang dan pembayaran.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Status Life-cycle</th>
            <th>Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Active</td>
            <td>Sistem memvalidasi setiap deviasi sesuai batas toleransi.</td>
        </tr>
        <tr>
            <td>Inactive</td>
            <td>Rule diabaikan, sistem mengizinkan deviasi tak terbatas (atau merujuk ke hard-coded default 0%).</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>BR Code</th>
            <th>Nama Aturan</th>
            <th>Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>BR-TOL-01</td>
            <td>Dual Constraint Validation</td>
            <td>Sistem mengevaluasi Limit Amount dan Limit Percentage. Manapun dari keduanya yang dicapai lebih dulu (Lower of the two) akan menjadi batasan mutlak.</td>
        </tr>
        <tr>
            <td>BR-TOL-02</td>
            <td>Hard Error on Exceed</td>
            <td>Jika tidak ada rute Approval yang menaungi deviasi tersebut, transaksi yang melebihi batas toleransi akan langsung ditolak (Hard Block Error).</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Field / Atribut</th>
            <th>Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Limit Value</td>
            <td>0 (Tidak ada toleransi yang diizinkan secara default jika rule aktif namun nilainya kosong).</td>
        </tr>
        <tr>
            <td>Status Aktif</td>
            <td>True (Aktif).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Skenario / Form Input</th>
            <th>Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tolerance Setup</td>
            <td>Kombinasi `company_id` dan `tolerance_key` harus Unik (Unique Constraint).</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Tingkat Sensitivitas</th>
            <th>Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Tinggi</td>
            <td>Perubahan batas toleransi wajib dicatat di tabel audit (created_by, updated_by, deleted_by).</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>AC Code</th>
            <th>Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>AC-TOL-01</td>
            <td>User tidak dapat mem-posting GR dengan selisih kuantitas 10% jika batas `GR_QTY` diatur pada maksimal 5%.</td>
        </tr>
        <tr>
            <td>AC-TOL-02</td>
            <td>Invoice dapat di-posting walau harga berbeda Rp 500, jika batas `INV_PRICE` Absolute diatur pada Rp 1.000.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th>Ketergantungan Pada</th>
            <th>Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Master Company</td>
            <td>Parameter toleransi diikat ke level Company.</td>
        </tr>
        <tr>
            <td>Approval Engine (BRD-029)</td>
            <td>Opsional: Jika ada deviasi, sistem bisa saja meneruskan dokumen ke ALM untuk otorisasi khusus.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 13:20:36',
                'updated_at' => '2026-07-24 19:06:11',
            ),
            82 => 
            array (
                'id' => 139,
                'brd_code' => 'BRD-006',
                'title' => 'Master Document Type Definition',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <tbody>
        <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-006</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Master Document Type Definition</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">System Configuration Engine</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1 w-1/3">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Document Type</strong></td>
            <td class="border px-2 py-1">Pendefinisian tipe dokumen per modul (Sales, Purchasing, Inventory, Finance).</td>
            <td class="border px-2 py-1">Definisi General Ledger Mapping (Diatur secara khusus di modul Finance/Accounting).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Number Range</strong></td>
            <td class="border px-2 py-1">Pengaturan nomor urut otomatis, prefix (awalan), dan limitasi urutan penomoran per dokumen transaksi.</td>
            <td class="border px-2 py-1">-</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Approval Integration</strong></td>
            <td class="border px-2 py-1">Konfigurasi prasyarat (flagging) untuk menentukan tipe dokumen mana yang membutuhkan *Approval*.</td>
            <td class="border px-2 py-1">Eksekusi riil, logika *Approval Flow*, dan hierarki bertingkat (Diatur secara terpisah di modul Workflow/Approval).</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1 w-1/3">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Document Type</td><td class="border px-2 py-1">Pengklasifikasian transaksi berdasarkan sifat transaksinya (Misal: PO Standard vs PO Import).</td><td class="border px-2 py-1">Setiap transaksi di dalam sistem wajib memiliki satu relasi ke `Document Type`.</td></tr>
        <tr><td class="border px-2 py-1">Number Range</td><td class="border px-2 py-1">Interval penomoran otomatis yang digunakan saat dokumen baru diterbitkan.</td><td class="border px-2 py-1">Sistem tidak boleh menghasilkan nomor ganda (Duplicate Number) untuk entitas yang sama.</td></tr>
        <tr><td class="border px-2 py-1">Prefix & Suffix</td><td class="border px-2 py-1">Awalan dan akhiran untuk membentuk nomor transaksi (Misal: `INV/2026/08/0001`).</td><td class="border px-2 py-1">Prefix harus mendukung format dinamis (seperti {YYYY}, {MM}).</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Continuous Numbering (Audit)</td><td class="border px-2 py-1">Untuk keperluan audit (contoh: Faktur Pajak, Invoice), nomor dokumen tidak boleh memiliki loncatan (*gap*) yang tidak bisa dijelaskan. Penghapusan dokumen akan meninggalkan *tombstone* (Soft Delete) untuk justifikasi nomor yang hilang.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<p class="text-sm mb-4">Penyimpanan Master Document Type dikelola pada tabel <code>document_types</code>. Peta kardinalitas hierarkinya:</p>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Branch</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Document Type dapat dikonfigurasikan secara spesifik per cabang, atau dibuat global (branch_id = null).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Operational Documents</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N)</td>
            <td class="border px-2 py-1">Semua dokumen operasional (Sales Order, PO, dll) wajib merujuk ke satu Document Type untuk penomorannya.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Manajemen Tipe Dokumen</td><td class="border px-2 py-1">Administrator membuat tipe dokumen baru, menentukan awalan (*prefix*), menentukan limitasi penomoran, dan mengatur apakah tipe dokumen ini butuh *approval* atau bisa langsung *Auto-Post*.</td></tr>
        <tr><td class="border px-2 py-1">Auto Numbering Generation</td><td class="border px-2 py-1">Saat sebuah transaksi disimpan (*submit*), backend akan memanggil *Engine* ini untuk melakukan injeksi nomor otomatis berdasarkan `current_number` + 1.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1 w-1/4">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Super Admin</td><td class="border px-2 py-1">Full Access (Create, Read, Update, Delete)</td><td class="border px-2 py-1">Mengendalikan semua pengaturan tipe dokumen lintas cabang/perusahaan.</td></tr>
        <tr><td class="border px-2 py-1">Branch Manager</td><td class="border px-2 py-1">Read Only</td><td class="border px-2 py-1">Hanya dapat melihat referensi tipe dokumen yang aktif di cabangnya.</td></tr>
        <tr><td class="border px-2 py-1">Staff / Operasional</td><td class="border px-2 py-1">No Access</td><td class="border px-2 py-1">Hanya sebagai pengguna (consumer) nomor urut. Tidak punya akses ke UI Master.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Active</td><td class="border px-2 py-1">Dapat dipilih pada form pembuatan dokumen transaksi di modul terkait.</td></tr>
        <tr><td class="border px-2 py-1">Inactive</td><td class="border px-2 py-1">Tipe dokumen disembunyikan dari form transaksi baru, namun dokumen lama tetap sah.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1 w-1/4">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">BR-01</td><td class="border px-2 py-1">Prevent Range Overlap</td><td class="border px-2 py-1">Nomor urut tidak boleh melampaui `number_range_end`. Jika tercapai, sistem akan menolak transaksi.</td></tr>
        <tr><td class="border px-2 py-1">BR-02</td><td class="border px-2 py-1">Concurrency Safe</td><td class="border px-2 py-1">Pengambilan `current_number` pada database harus di-*lock* (Pessimistic Locking) selama transaksi berlangsung agar tidak terjadi nomor ganda saat ada banyak user submit bersamaan.</td></tr>
        <tr><td class="border px-2 py-1">BR-03</td><td class="border px-2 py-1">Delete Prevention</td><td class="border px-2 py-1">Document Type tidak boleh dihapus apabila `current_number` sudah bergeser dari `number_range_start` (artinya sudah pernah dipakai).</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">requires_approval</td><td class="border px-2 py-1">`false`</td></tr>
        <tr><td class="border px-2 py-1">is_active</td><td class="border px-2 py-1">`true`</td></tr>
        <tr><td class="border px-2 py-1">current_number</td><td class="border px-2 py-1">Mengikuti nilai dari `number_range_start`.</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Create Document Type</td><td class="border px-2 py-1">`code` harus unik per `company_id`. Regex: Huruf kapital dan underscore saja (`^[A-Z_]+$`).</td></tr>
        <tr><td class="border px-2 py-1">Range Validation</td><td class="border px-2 py-1">`number_range_end` harus lebih besar dari `number_range_start`.</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">High</td><td class="border px-2 py-1">Wajib merekam setiap perubahan pada `number_range` dan format `prefix` untuk mencegah penyalahgunaan formasi dokumen resmi (Fraud Prevention).</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Sistem berhasil men-*generate* nomor berikutnya dengan akurat tanpa nomor ganda ketika dites dengan *stress-test* (konkurensi).</td></tr>
        <tr><td class="border px-2 py-1">AC-02</td><td class="border px-2 py-1">Sistem mencegah penghapusan Document Type jika sudah ada relasi transaksi.</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">BRD-001 (Master Company)</td><td class="border px-2 py-1">Document type di-*scope* per Company.</td></tr>
        <tr><td class="border px-2 py-1">BRD-003 (Master Branch)</td><td class="border px-2 py-1">Bisa di-*override* untuk spesifik Cabang.</td></tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 06:29:02',
                'updated_at' => '2026-07-22 09:01:45',
            ),
            83 => 
            array (
                'id' => 140,
                'brd_code' => 'BRD-007',
                'title' => 'Transaction Type Definition',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-007</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Transaction Type Definition</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">System Configuration Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Transaction Nature</strong></td>
            <td class="border px-2 py-1">Klasifikasi perilaku dokumen (contoh: Penjualan Standar, Retur, Konsinyasi, Transfer).</td>
            <td class="border px-2 py-1">Definisi harga dan diskon transaksi (Diatur di Pricing Engine).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Stock Impact</strong></td>
            <td class="border px-2 py-1">Konfigurasi apakah transaksi akan menambah, mengurangi, memindahkan, atau tidak memengaruhi stok.</td>
            <td class="border px-2 py-1">Eksekusi pergerakan fisik gudang (Diatur di modul MM/Warehouse).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Financial Impact</strong></td>
            <td class="border px-2 py-1">Penentuan apakah jenis transaksi ini harus dievaluasi untuk membentuk jurnal akuntansi.</td>
            <td class="border px-2 py-1">Pendefinisian akun debit dan kredit secara eksplisit (Diatur di Account Determination).</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Transaction Type</strong></td>
            <td class="border px-2 py-1">Atribut inti yang menentukan sifat logis dari suatu aktivitas bisnis. Berfungsi sebagai "DNA" dari setiap dokumen operasional.</td>
            <td class="border px-2 py-1">Tidak boleh ada transaksi yang dibuat di sistem tanpa merujuk ke Transaction Type yang spesifik.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Stock Impact Parameter</strong></td>
            <td class="border px-2 py-1">Bendera (flag) yang memberitahu <em>Inventory Engine</em> apa yang harus dilakukan (INCREASE, DECREASE, TRANSFER, NONE).</td>
            <td class="border px-2 py-1">Transaksi finansial murni (seperti Debit Note) harus ber-impact \'NONE\' pada stok.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Financial Impact Parameter</strong></td>
            <td class="border px-2 py-1">Bendera (flag) yang memberitahu <em>Accounting Engine</em> bahwa transaksi ini memiliki nilai (valuated) dan wajib dibukukan.</td>
            <td class="border px-2 py-1">Mutasi stok non-valuated (seperti Pindah Gudang Sementara) tidak boleh mencentang flag ini.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Audit Lintas Modul</strong></td>
            <td class="border px-2 py-1">Pemisahan <em>Financial Impact</em> dan <em>Stock Impact</em> memastikan kepatuhan dalam pemisahan antara pencatatan fisik (Gudang) dan pencatatan valuasi (Finance), mencegah manipulasi.</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<p class="text-sm mb-4">Penyimpanan Transaction Type dikelola pada tabel <code>transaction_types</code>. Peta kardinalitas hierarkinya:</p>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Document Type</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N)</td>
            <td class="border px-2 py-1">Satu Transaction Type (Sifat Logis) dapat menaungi banyak Document Type (Tipe Dokumen Fisik).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Account Determination</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N)</td>
            <td class="border px-2 py-1">Tipe transaksi bertindak sebagai parameter kunci untuk menentukan konfigurasi posting jurnal otomatis (Auto GL).</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Master Definition</strong></td>
            <td class="border px-2 py-1">Super Admin mendefinisikan seluruh Transaction Type yang dibutuhkan perusahaan saat fase instalasi awal, menentukan dampak stok dan finansial.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Transaction Assignment</strong></td>
            <td class="border px-2 py-1">Saat Staff membuat dokumen Sales/PO, sistem otomatis membaca tipe transaksi dokumen tersebut untuk meneruskan parameter (stock/financial impact) ke Engine.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Super Admin</strong></td>
            <td class="border px-2 py-1">Full Access</td>
            <td class="border px-2 py-1">Mampu Create, Read, Update konfigurasi sifat transaksi lintas modul.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Operasional (Staff)</strong></td>
            <td class="border px-2 py-1">No Access (Hidden)</td>
            <td class="border px-2 py-1">Hanya menikmati efek logika secara pasif (Sistem Backend yang mengeksekusi sifat transaksi).</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Active</strong></td>
            <td class="border px-2 py-1">Logika transaksi dapat dirujuk dan dieksekusi oleh <em>Document Engine</em>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Inactive</strong></td>
            <td class="border px-2 py-1">Transaksi baru dengan tipe ini akan ditolak (diblokir) oleh sistem saat proses simpan.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Soft Deleted</strong></td>
            <td class="border px-2 py-1">Disembunyikan dari UI, tetapi dipertahankan secara fisik di database untuk menjaga integritas transaksi lama.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Unique Code</td>
            <td class="border px-2 py-1">Kode transaksi (<code>code</code>) wajib bersifat unik dan kapital tanpa spasi (Max 20 Karakter). Tidak boleh ada duplikasi konfigurasi.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Immutable Usage</td>
            <td class="border px-2 py-1">Jika sebuah <code>transaction_type</code> sudah digunakan oleh satu dokumen transaksi final, kolom <code>stock_impact</code> dan <code>financial_impact</code> terkunci permanen (tidak boleh di-edit) untuk mencegah inkonsistensi histori.</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>is_active</strong></td>
            <td class="border px-2 py-1"><code>True</code> (1)</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>financial_impact</strong></td>
            <td class="border px-2 py-1"><code>True</code> (1)</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>stock_impact</strong></td>
            <td class="border px-2 py-1"><code>NONE</code></td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Create / Edit Format Code</strong></td>
            <td class="border px-2 py-1">Kolom kode hanya menerima regex <code>^[A-Z0-9_]+$</code>. Sistem akan menolak karakter khusus dan spasi.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Pilihan Stock Impact</strong></td>
            <td class="border px-2 py-1">Diwajibkan (Required), dengan validasi <code>in:INCREASE,DECREASE,TRANSFER,NONE</code>.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Tinggi (Critical)</strong></td>
            <td class="border px-2 py-1">Perubahan sifat <em>Financial</em> dan <em>Stock</em> sangat krusial. Wajib mencatat payload data lama dan data baru secara detail (User ID, Waktu, Nilai Sebelumnya).</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Sistem berhasil memblokir input kode duplikat (mengembalikan error validasi form).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Sistem melakukan penguncian elemen UI (disable input) untuk properti <em>Impact</em> jika transaksi sudah dirujuk oleh dokumen operasional.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-006 (Document Type)</strong></td>
            <td class="border px-2 py-1">Setiap Document Type operasional nantinya akan memetakan dirinya (relasi) ke satu Transaction Type untuk menderivasi sifat logisnya.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-027 (Account Determination)</strong></td>
            <td class="border px-2 py-1">Transaction Type berfungsi sebagai salah satu kunci (key modifier) dalam menentukan jurnal otomatis apa yang akan di-posting.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 08:59:28',
                'updated_at' => '2026-07-22 09:11:34',
            ),
            84 => 
            array (
                'id' => 141,
                'brd_code' => 'BRD-012',
                'title' => 'GL Account Group & Field Status Configuration',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-012</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">GL Account Group & Field Status Configuration</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Financial & Accounting Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">2.0 (Restructured)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>GL Account Group</strong></td>
            <td class="border px-2 py-1">Pengelompokan induk (kategori) atas Bagan Akun yang mengatur kelas akun (*Asset, Liability, Equity*) serta batasan rentang nomor (Batas Bawah dan Batas Atas).</td>
            <td class="border px-2 py-1">Pembuatan Bagan Akun (Chart of Accounts / COA) spesifik secara individual (Diakomodasi pada BRD-013).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Field Status Configuration</strong></td>
            <td class="border px-2 py-1">Pengaturan kelakuan antarmuka (*UI Behavior*) pada form penjurnalan (Misal: mewajibkan atau menyembunyikan kolom *Cost Center*, *Profit Center*, atau *Project* berdasarkan kelompok akun tertentu).</td>
            <td class="border px-2 py-1">Validasi matematis saldo jurnal (Keseimbangan Debit Kredit).</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Account Class Grouping</strong></td>
            <td class="border px-2 py-1">Sistem hirarki pra-syarat yang mengharuskan setiap satu akun (COA) tunduk pada satu klasifikasi Grup.</td>
            <td class="border px-2 py-1">Pembuatan akun baru tidak akan diizinkan jika *Account Group* ini belum didefinisikan. Nomor akun baru harus mutlak berada di dalam jangkauan *Group*-nya.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Field Control (Status Group)</strong></td>
            <td class="border px-2 py-1">Manajemen kualitas input data. Konfigurasi ini menjamin bahwa elemen yang tidak relevan dengan suatu tipe transaksi (Misal: *Cost Center* pada akun Kasir) tidak akan membebani layar pengguna.</td>
            <td class="border px-2 py-1">Setiap *Group* Field Status wajib mendefinisikan kelakuan dari 3 tingkat status: <code>HIDDEN</code> (Sembunyi), <code>OPTIONAL</code> (Bebas), <code>REQUIRED</code> (Wajib Isi).</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Kelengkapan Dimensi Pajak</strong></td>
            <td class="border px-2 py-1">Untuk akun beban (*Expense*), aturan pajak mewajibkan identifikasi pusat biaya yang jelas. <em>Field Status</em> mengawal kepatuhan ini dengan memblokir transaksi jika <em>Cost Center</em> kosong (berstatus <em>REQUIRED</em>).</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Field Status Details</strong></td>
            <td class="border px-2 py-1">Many-to-One (N:1)</td>
            <td class="border px-2 py-1">Banyak aturan elemen form (Misal: <em>Text</em> = REQUIRED, <em>Cost Center</em> = HIDDEN) tergabung dalam satu rujukan induk (Grup Field Status).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Chart of Accounts (BRD-013)</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N)</td>
            <td class="border px-2 py-1">Satu buah definisi Grup (baik <em>Account Group</em> maupun <em>Field Status Group</em>) dapat dipakai massal oleh ribuan akun individual (COA).</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Maintenance Account Group</strong></td>
            <td class="border px-2 py-1">Admin mendefinisikan Grup "Harta Tetap" (Asset), menentukan rentang penomoran akun 13000 hingga 13999.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Configuring Form Behavior</strong></td>
            <td class="border px-2 py-1">Admin merancang Grup Status "FS_CASH". Di dalam konfigurasinya, Admin menyetel bahwa untuk FS_CASH, isian "Cost Center" di *Form Jurnal* harus *HIDDEN*, sementara "Reference Text" harus *REQUIRED*.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Finance Manager</strong></td>
            <td class="border px-2 py-1">Full System Setup</td>
            <td class="border px-2 py-1">Memegang kendali atas struktur utama arsitektur akuntansi.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Data Entry Clerk</strong></td>
            <td class="border px-2 py-1">Read Only (System Logic)</td>
            <td class="border px-2 py-1">Hanya menikmati (berhadapan) dengan hasil aturan *Field Status* (Tiba-tiba kolom menghilang atau muncul merah *Required* saat mengisi jurnal).</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Active Component</strong></td>
            <td class="border px-2 py-1">Grup dan Aturan *Field Status* dapat digunakan saat pembentukan *Chart of Accounts* baru.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Number Range Integrity</td>
            <td class="border px-2 py-1">Sistem dilarang keras menyimpan <em>Chart of Account</em> jika nomor akun tersebut (Misal: 14000) berada di luar batas bawah (10000) dan batas atas (13999) dari *GL Account Group* yang dipilih.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Mandatory Override Check</td>
            <td class="border px-2 py-1">Jika sebuah transaksi modul depan (Misal: *Delivery Order*) mencoba menembak jurnal otomatis, namun *Field Status* akun target mensyaratkan kolom <em>REQUIRED</em> yang tidak bisa diisi oleh *Delivery*, maka konfigurasi Field Status harus menang atau dikendurkan (*System Intercept Block*).</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Field Status Setting</strong></td>
            <td class="border px-2 py-1"><code>OPTIONAL</code> (Jika tidak ada spesifikasi status yang dimasukkan untuk satu field, secara *default* field dibiarkan terbuka opsional).</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Penomoran Akun</strong></td>
            <td class="border px-2 py-1">Input Batas Bawah dan Batas Atas hanya boleh mengandung angka *Numeric String* murni. Batas Atas harus lebih besar/lebar dari Batas Bawah.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Overlapping Accounts</strong></td>
            <td class="border px-2 py-1">Peringatan halus (<em>Warning</em>) akan muncul jika rentang angka antar *Group* saling bertubrukan (*overlap*).</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Tinggi (Critical)</strong></td>
            <td class="border px-2 py-1">Mengubah aturan *Field Status* dari *REQUIRED* (Wajib) menjadi *HIDDEN* secara tiba-tiba di pertengahan tahun akan berdampak luas, sehingga <code>updated_by</code> mutlak dicatat dalam audit trail.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Membuat akun baru bernama "Kas" dengan memilih Grup (1000-1999) dan memaksakan input nomor "2000" harus mutlak DITOLAK oleh validasi <em>backend</em>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Di Form *Journal Entry*, seketika <em>user</em> memilih Akun Biaya, UI berubah secara AJAX: kolom *Cost Center* yang awalnya tertutup tiba-tiba muncul dan ditandai tanda bintang merah (<em>Required</em>).</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Pondasi Utama BRD-013</strong></td>
            <td class="border px-2 py-1">Master Data <em>Chart of Accounts</em> (BRD-013) secara absolut mengandalkan <em>Group</em> dan aturan <em>Field Status</em> yang diciptakan oleh modul ini.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 10:05:30',
                'updated_at' => '2026-07-22 10:09:14',
            ),
            85 => 
            array (
                'id' => 142,
                'brd_code' => 'BRD-013',
                'title' => 'Retained Earnings & Year-End Closing Rules',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-013</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Retained Earnings & Year-End Closing Rules</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Financial & Accounting Engine</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">2.0 (Restructured)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Retained Earning Configurations</strong></td>
            <td class="border px-2 py-1">Pengaturan (*mapping*) satu akun Ekuitas/Modal secara spesifik di tiap <em>Company</em> sebagai muara (wadah) penampung sisa hasil usaha di akhir tahun.</td>
            <td class="border px-2 py-1">Pencairan/Pembagian dividen secara manual (Hal tersebut adalah transaksi jurnal biasa, bukan konfigurasi sistem).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Year-End Closing (Tutup Buku)</strong></td>
            <td class="border px-2 py-1">Proses otomatis (*System Batch*) yang menyapu bersih (menolkan) seluruh saldo akun bertipe <em>Revenue</em> dan <em>Expense</em>, lalu menerbitkan Jurnal Penutup yang selisihnya dimasukkan ke akun <em>Retained Earning</em>.</td>
            <td class="border px-2 py-1">Tutup Buku Bulanan (*Monthly Closing*). Sistem ini menganut filosofi <em>Continuous Month</em> (Saldo mengalir) di mana tutup buku sejati (Penyapuan Laba Rugi) hanya terjadi di akhir Tahun Fiskal.</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>The Closing Journal (Jurnal Penutup)</strong></td>
            <td class="border px-2 py-1">Sebuah entri jurnal akbar (bisa memuat ratusan baris) yang me-<em>reverse</em> seluruh saldo normal akun Laba/Rugi. (Pendapatan di-Debit, Beban di-Kredit).</td>
            <td class="border px-2 py-1">Jurnal Penutup ini harus ditandai secara khusus dengan tipe dokumen "Jurnal Closing", dan di-<em>post</em> mutlak pada detik terakhir di Periode Akuntansi Penyesuaian (Period 16).</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Integritas Neraca vs Laba-Rugi</strong></td>
            <td class="border px-2 py-1">Otoritas Pajak / Auditor akan menguji silang nilai penambahan "Modal" di Neraca dengan baris paling bawah (*Net Profit*) di Laba Rugi. Sistem tidak boleh meleset 1 sen pun saat melakukan pemindahan (*sweeping*).</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Companies (BRD-002)</strong></td>
            <td class="border px-2 py-1">One-to-One (1:1)</td>
            <td class="border px-2 py-1">Setiap entitas Perusahaan yang memiliki NPWP mandiri berhak dan wajib mendefinisikan satu akun <em>Retained Earning</em> miliknya sendiri.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Chart of Accounts (BRD-014)</strong></td>
            <td class="border px-2 py-1">One-to-One (1:1)</td>
            <td class="border px-2 py-1">Hanya boleh ada 1 akun (berkelas Ekuitas) per perusahaan yang ditunjuk dan dikunci sebagai wadah <em>Retained Earning</em>.</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Configuration Setup</strong></td>
            <td class="border px-2 py-1">Saat implementasi (<em>Go-Live</em>), konsultan menyetel akun "31000 - Laba Ditahan" sebagai akun <em>Retained Earning</em> untuk PT. Alfa. Pengaturan ini dikunci seumur hidup aplikasi berjalan.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Year-End Execution Wizard</strong></td>
            <td class="border px-2 py-1">Finance Manager masuk ke menu <em>Closing</em>, memilih tahun 2026. Sistem melakukan pra-kalkulasi (*dry run*), menampilkan potensi Laba Bersih Rp 5 Miliar. Setelah disetujui, sistem membekukan tahun 2026 dan mem-<em>posting</em> Jurnal Penutup.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Finance Manager</strong></td>
            <td class="border px-2 py-1">Execute Closing</td>
            <td class="border px-2 py-1">Eksekusi tutup buku tahunan (*Hard Close*) adalah tombol paling sakral di ERP dan hanya boleh diakses oleh pimpinan level atas.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Eksekusi (Logs)</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>SUCCESS</strong></td>
            <td class="border px-2 py-1">Jurnal penutup berhasil terbit, seluruh Periode Akuntansi (1-16) pada tahun tersebut secara otomatis dipaksa masuk ke status <code>CLOSED/LOCKED</code>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>FAILED</strong></td>
            <td class="border px-2 py-1">Proses penarikan saldo gagal (misal: akibat putus jaringan). <em>Database Transaction</em> melakukan <em>rollback</em> utuh. Jurnal batal dibuat.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">No Pending Transactions Allowed</td>
            <td class="border px-2 py-1">Eksekusi "Tutup Buku Akhir Tahun" HARUS DIMATIKAN (*Disabled*) jika sistem mendeteksi masih ada 1 saja dokumen (*Invoice, Receipt, Jurnal*) berstatus <em>DRAFT / PENDING / UNAPPROVED</em> di tahun yang bersangkutan. Semua harus berstatus <em>POSTED</em>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Irreversible Process</td>
            <td class="border px-2 py-1">Jika proses Tutup Buku berhasil (<em>SUCCESS</em>), sistem melarang adanya pembatalan (<em>Undo</em>) melalui UI layar kasir/admin. Pembatalan hanya bisa dilakukan lewat intervensi Database IT secara tertulis jika terjadi malapetaka fatal (*Disaster Recovery*).</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>-</strong></td>
            <td class="border px-2 py-1">Tidak ada *default value*. Modul ini bersifat kustom per Perusahaan.</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Setup Akun</strong></td>
            <td class="border px-2 py-1">Sistem hanya mengizinkan *user* memilih Akun (COA) yang berada di kelompok <em>Account Class = EQUITY</em>. Memilih akun <em>Asset</em> atau <em>Expense</em> sebagai penampung laba ditahan akan ditolak mentah-mentah.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Ekstrem (Highest)</strong></td>
            <td class="border px-2 py-1">Sistem WAJIB merekam ID Jurnal Penutup yang dihasilkan ke dalam tabel Log eksekusi, beserta nama *Finance Manager* yang mengeksekusinya (<code>executed_by</code>).</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Saat tombol Tutup Buku ditekan, jika masih ada 1 <em>Sales Invoice</em> di bulan Februari yang masih berstatus <em>Draft</em>, sistem langsung memberikan peringatan warna merah dan menghentikan proses.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Pasca proses Tutup Buku yang sukses, jika kita menarik laporan Neraca Saldo (*Trial Balance*) per tanggal 1 Januari tahun berikutnya, maka seluruh saldo akun Laba/Rugi (Kelas 4 s/d 9) bernilai persis <strong>NOL (0.00)</strong>.</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-010 (Accounting Period)</strong></td>
            <td class="border px-2 py-1">Modul ini sangat bergantung pada struktur 16 Periode Akuntansi, di mana Jurnal Penutup diletakkan secara teknis di kantong "Periode 16" agar tidak merusak laporan bulan Desember.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 10:14:04',
                'updated_at' => '2026-07-22 10:15:36',
            ),
            86 => 
            array (
                'id' => 143,
                'brd_code' => 'BRD-016',
                'title' => 'Controlling Area & Standard Hierarchy Configuration',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/3">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-016</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Controlling Area & Standard Hierarchy Configuration</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Controlling & Management Accounting (CO)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0 (Standardized)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Draft</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Modul / Fitur</th>
            <th class="border px-2 py-1">In-Scope</th>
            <th class="border px-2 py-1">Out-of-Scope</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Controlling Area Setup</strong></td>
            <td class="border px-2 py-1">Pembuatan entitas induk struktur Akuntansi Manajemen yang digunakan untuk menghitung, melacak, dan mengalokasikan biaya-biaya internal.</td>
            <td class="border px-2 py-1">Integrasi Buku Besar (FI). Modul ini sepenuhnya terisolasi dan melayani kebutuhan pelaporan manajerial internal, bukan untuk pihak eksternal.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Standard Hierarchy Tree</strong></td>
            <td class="border px-2 py-1">Pembentukan pohon silsilah (folder-folder) yang nantinya wajib digunakan untuk menampung seluruh <em>Cost Center</em>.</td>
            <td class="border px-2 py-1">Pembuatan spesifik <em>Cost Center</em> itu sendiri (Akan dibahas di BRD-017).</td>
        </tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Konsep Utama</th>
            <th class="border px-2 py-1 w-1/3">Penjelasan</th>
            <th class="border px-2 py-1">Business Rules</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Cross-Company Cost Accounting</strong></td>
            <td class="border px-2 py-1">Sebuah <em>Controlling Area</em> adalah payung raksasa yang bisa menaungi lebih dari 1 <em>Company</em>. Hal ini diciptakan agar manajemen dapat melihat laporan per-departemen secara *group/global*, tanpa disekat oleh batas hukum perusahaannya.</td>
            <td class="border px-2 py-1">Perusahaan-perusahaan yang disatukan di bawah satu atap <em>Controlling Area</em> WAJIB memiliki jumlah periode fiskal yang seragam.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>The Standard Hierarchy</strong></td>
            <td class="border px-2 py-1">Struktur kerangka konseptual tak berbatas (<em>infinite depth tree</em>). Misal: Node Induk (Area Asia) -> Node Anak (Indonesia) -> Node Cucu (Divisi Manufaktur).</td>
            <td class="border px-2 py-1">Struktur ini mutlak harus ada. Sebuah <em>Controlling Area</em> yang tidak memiliki satu pun node <em>Standard Hierarchy</em> akan lumpuh total.</td>
        </tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Komponen Regulasi</th>
            <th class="border px-2 py-1">Implikasi ke Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Internal vs External Reporting Independence</strong></td>
            <td class="border px-2 py-1">Akuntansi Manajemen (CO) tidak tunduk pada aturan ketat perpajakan negara mana pun. Modul ini adalah milik eksekutif direksi. Oleh karena itu, <em>Controlling Area</em> diizinkan memiliki mata uang (<em>currency_code</em>) pelaporan yang sama sekali berbeda dengan mata uang lokal perusahaannya. (Misal: Perusahaan di Indonesia menggunakan Rupiah, namun <em>Controlling Area</em> melaporkannya dalam USD).</td>
        </tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th>
            <th class="border px-2 py-1 w-1/4">Tipe Relasi & Kardinalitas</th>
            <th class="border px-2 py-1">Penjelasan Fungsional</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Companies (BRD-002)</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N) via Pivot</td>
            <td class="border px-2 py-1">Satu <em>Controlling Area</em> (Misal: Global Group) dapat memetakan (<em>mapping</em>) N Perusahaan (PT Alfa, PT Beta).</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Cost Center Groups (Hierarchy)</strong></td>
            <td class="border px-2 py-1">One-to-Many (1:N)</td>
            <td class="border px-2 py-1">Satu <em>Controlling Area</em> memiliki banyak <em>Cost Center Groups</em> yang dirajut satu sama lain membentuk Pohon (<em>Tree</em>).</td>
        </tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Fitur Utama</th>
            <th class="border px-2 py-1">Alur Proses (User Journey)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Initialize Controlling Area</strong></td>
            <td class="border px-2 py-1">Administrator sistem membuat area baru dengan kode "C001" (Asia Pacific Group), menentukan pelaporan dalam mata uang USD. Disimpan.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>Company Assignment</strong></td>
            <td class="border px-2 py-1">Administrator masuk ke tab <em>Assignment</em> di bawah area C001, kemudian memilih PT Alfa dan PT Beta dari <em>dropdown</em>. Sistem mengunci bahwa kedua perusahaan tersebut kini tunduk pada area biaya C001.</td>
        </tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Aktor / Role</th>
            <th class="border px-2 py-1 w-1/4">Hak Akses</th>
            <th class="border px-2 py-1">Batasan & Logika Kontrol</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Chief Financial Controller / System Admin</strong></td>
            <td class="border px-2 py-1">Full Configuration</td>
            <td class="border px-2 py-1">Pembentukan <em>Controlling Area</em> adalah tindakan <em>One-Time Setup</em> yang sangat langka. Hanya orang dengan otoritas sistem absolut yang berhak masuk ke menu ini.</td>
        </tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Status Life-cycle</th>
            <th class="border px-2 py-1">Perlakuan Sistem</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>-</strong></td>
            <td class="border px-2 py-1">Tidak ada <em>lifecycle status</em> khusus yang merumitkan modul ini. Selama area terdaftar, ia sah digunakan.</td>
        </tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">BR Code</th>
            <th class="border px-2 py-1 w-1/4">Nama Aturan</th>
            <th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BR-01</strong></td>
            <td class="border px-2 py-1">Monopolistic Company Mapping</td>
            <td class="border px-2 py-1"><strong>Aturan Mutlak:</strong> Sebuah <em>Company</em> hanya boleh direkrut oleh SATU <em>Controlling Area</em>. Jika PT Alfa sudah di-*assign* ke area C001, maka ia akan raib dari daftar pencarian jika admin mencoba meng-*assign* nya ke area C002.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>BR-02</strong></td>
            <td class="border px-2 py-1">Hierarchy Tree Integrity</td>
            <td class="border px-2 py-1">Node (Dahan) manapun dalam struktur grup <em>Cost Center</em> dilarang menunjuk dirinya sendiri sebagai <code>parent_id</code>. Pemblokiran terhadap siklus kalkulasi tiada henti (<em>Infinite Loop Tornado</em>).</td>
        </tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Field / Atribut</th>
            <th class="border px-2 py-1">Nilai Default</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>-</strong></td>
            <td class="border px-2 py-1">Modul arsitektural. Tidak ada form pengisian massa.</td>
        </tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Skenario / Form Input</th>
            <th class="border px-2 py-1">Aturan Limitasi & Peringatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Currency Verification</strong></td>
            <td class="border px-2 py-1">Sistem akan memvalidasi agar mata uang (<em>currency_code</em>) yang disetel eksis secara sah di master sistem.</td>
        </tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th>
            <th class="border px-2 py-1">Komponen Rekaman Wajib</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>Sangat Tinggi (Critical)</strong></td>
            <td class="border px-2 py-1">Memutus relasi (<em>Unassign</em>) sebuah perusahaan dari <em>Controlling Area</em> adalah tindakan yang bisa berujung fatal jika sistem sedang berjalan di tengah tahun. Peristiwa pelepasan ikatan (<em>Detach</em>) ini wajib terekam mutlak.</td>
        </tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/6">AC Code</th>
            <th class="border px-2 py-1">Kriteria Uji Kelulusan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>AC-01</strong></td>
            <td class="border px-2 py-1">Ketika admin mencoba mengikat PT Alfa ke <em>Controlling Area</em> "Asia" padahal PT Alfa sudah terikat ke "Global", maka <em>database</em> akan menolak dengan error <em>Duplicate Entry (Unique Constraint Violation)</em>.</td>
        </tr>
        <tr>
            <td class="border px-2 py-1"><strong>AC-02</strong></td>
            <td class="border px-2 py-1">Di halaman <em>Standard Hierarchy</em>, admin berhasil menyusun 3 tingkat kedalaman (Kedalaman 1: Asia. Kedalaman 2: Manufaktur Indonesia. Kedalaman 3: Mesin Bubut ID).</td>
        </tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr>
            <th class="border px-2 py-1 w-1/3">Ketergantungan Pada</th>
            <th class="border px-2 py-1">Alasan Keterikatan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border px-2 py-1"><strong>BRD-002 (Company Master)</strong></td>
            <td class="border px-2 py-1">Keberadaan <em>Controlling Area</em> menjadi tak bermakna jika tidak ada satupun institusi (<em>Company</em>) yang berinduk kepadanya.</td>
        </tr>
    </tbody>
</table>',
                'created_at' => '2026-07-22 13:15:22',
                'updated_at' => '2026-07-22 13:19:50',
            ),
            87 => 
            array (
                'id' => 144,
                'brd_code' => 'BRD-044',
            'title' => 'Fixed Asset Master Data (Aktiva Tetap)',
                'project_id' => NULL,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-044</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Fixed Asset Master Data</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Financial Accounting (FI) - Asset Accounting</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Asset Master Data</td><td class="border px-2 py-1">Pendaftaran kelas aset, master aset individu, manajemen multi-area penyusutan (Buku vs Pajak), dan penugasan historis ke Cost Center.</td><td class="border px-2 py-1">Kalkulasi dan eksekusi run penyusutan bulanan (tercakup di BRD-050).</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Asset Class</td><td class="border px-2 py-1">Kategori utama yang mendikte Account Determination (pemetaan GL) dan aturan penyusutan default.</td><td class="border px-2 py-1">Setiap aset wajib terikat pada satu Asset Class.</td></tr>
        <tr><td class="border px-2 py-1">Depreciation Areas</td><td class="border px-2 py-1">Memisahkan penilaian aset berdasarkan tujuan pelaporan: Komersial (Book) dan Fiskal (Tax).</td><td class="border px-2 py-1">Nilai sisa (Scrap Value) dan umur ekonomis bisa berbeda antar Area.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tax Depreciation Area</td><td class="border px-2 py-1">Memastikan perhitungan penyusutan fiskal sesuai aturan DJP tanpa mengintervensi laba rugi komersial harian.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">asset_classes</td><td class="border px-2 py-1">One-to-Many (1:N) ke fixed_assets</td><td class="border px-2 py-1">Master template untuk kelas aset (Gedung, Mesin, Kendaraan).</td></tr>
        <tr><td class="border px-2 py-1">fixed_asset_depreciation_areas</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Menyimpan parameter penyusutan ganda per aset.</td></tr>
        <tr><td class="border px-2 py-1">fixed_asset_assignments</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Melacak perpindahan lokasi atau Cost Center dari waktu ke waktu secara historis.</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Time-Dependent Assignment</td><td class="border px-2 py-1">User memindahkan aset dari Cabang A ke B. Sistem membuat record baru di `fixed_asset_assignments` dan membatasi `valid_to` record sebelumnya.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Fixed Asset Accountant</td><td class="border px-2 py-1">Full Access</td><td class="border px-2 py-1">Hanya departemen Akuntansi Aset yang berhak membuat master ini.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Status: RETIRED</td><td class="border px-2 py-1">Aset tidak lagi disusutkan dan diblokir dari transaksi akuisisi tambahan.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-44-01</td><td class="border px-2 py-1">Sub-Numbering</td><td class="border px-2 py-1">Aset utama bernomor `0`. Penambahan komponen diakumulasikan dalam Sub-number `1, 2, ...`</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">status</td><td class="border px-2 py-1">DRAFT saat awal registrasi sebelum dikapitalisasi.</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Depreciation Start Date</td><td class="border px-2 py-1">Tidak boleh kosong jika aset telah dikapitalisasi (Capitalization Date terisi).</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Medium</td><td class="border px-2 py-1">Perubahan `useful_life_years` wajib direkam di Audit Trails.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Sistem berhasil menyimpan aset dengan 2 depreciation areas (Book & Tax).</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Cost Center Master</td><td class="border px-2 py-1">Pembebanan biaya penyusutan wajib diikat ke Cost Center.</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-20 13:58:32',
                'updated_at' => '2026-07-20 13:58:32',
            ),
            88 => 
            array (
                'id' => 145,
                'brd_code' => 'BRD-041',
                'title' => 'Serial Number & Batch/Expiry Master',
                'project_id' => NULL,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Document ID</td><td class="border px-2 py-1">BRD-041</td></tr>
        <tr><td class="border px-2 py-1">Document Name</td><td class="border px-2 py-1">Serial Number &amp; Batch/Expiry Master</td></tr>
        <tr><td class="border px-2 py-1">Module</td><td class="border px-2 py-1">Materials Management (MM) / Inventory</td></tr>
        <tr><td class="border px-2 py-1">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1">Status</td><td class="border px-2 py-1">Approved</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Batch Management</td><td class="border px-2 py-1">Pelacakan nomor lot/batch produksi, pencatatan tanggal produksi dan tanggal kedaluwarsa (expiry date).</td><td class="border px-2 py-1">Pelacakan komposisi bahan baku (BOM) pembuat batch (dikelola di modul Produksi).</td></tr>
        <tr><td class="border px-2 py-1">Serial Number Management</td><td class="border px-2 py-1">Pemberian nomor identitas unik (serial) pada item fisik tunggal untuk tujuan garansi dan pelacakan historis pergerakan.</td><td class="border px-2 py-1">Maintenance suku cadang per serial (dikelola di modul Plant Maintenance/Asset).</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Lot / Batch</td><td class="border px-2 py-1">Sekumpulan barang yang diproduksi secara bersamaan dalam kondisi yang sama. Diidentifikasi dengan nomor yang sama.</td><td class="border px-2 py-1">Nomor batch berlaku global per material. Tanggal kedaluwarsa adalah atribut mutlak sebuah batch.</td></tr>
        <tr><td class="border px-2 py-1">Serial Number</td><td class="border px-2 py-1">Identitas unik yang melekat pada SATU unit fisik barang. (Misal: IMEI pada handphone atau VIN pada kendaraan).</td><td class="border px-2 py-1">Kombinasi Material Code dan Serial Number harus unik di seluruh sistem. Serial Number merujuk ke lokasi fisik (Branch).</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Regulasi BPOM / FDA (Traceability)</td><td class="border px-2 py-1">Sistem wajib mampu mencegah penjualan atau pendistribusian barang yang telah melewati batas <em>Expiration Date</em> pada level sistem.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Material to Batch</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Satu Material Master (jika <em>is_batch_managed = true</em>) dapat memiliki banyak Batch historis.</td></tr>
        <tr><td class="border px-2 py-1">Material to Serial Number</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Satu Material Master (jika <em>is_serial_managed = true</em>) akan melahirkan banyak data identitas tunggal Serial Number.</td></tr>
        <tr><td class="border px-2 py-1">Batch to Serial Number</td><td class="border px-2 py-1">One-to-Many (1:N)</td><td class="border px-2 py-1">Satu Batch produksi bisa mencakup 100 item, di mana ke-100 item tersebut memiliki Serial Number tersendiri yang menginduk ke Batch yang sama.</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Penerimaan Barang (Goods Receipt)</td><td class="border px-2 py-1">Gudang menerima barang dari Supplier. Jika barang bersyarat Serial, sistem meminta user memindai (scan) barcode tiap serial masuk sebelum SO/PO dapat di-*post*. Data Serial Number baru pun ter-*create*.</td></tr>
        <tr><td class="border px-2 py-1">Pengiriman Barang (Delivery)</td><td class="border px-2 py-1">Saat menyiapkan <em>Delivery Order</em>, staf memindai serial fisik yang akan dikirim, sistem mengubah status serial dari AVAILABLE menjadi ISSUED.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Warehouse Admin</td><td class="border px-2 py-1">Create / Scan Serial &amp; Batch</td><td class="border px-2 py-1">Hanya berhak mendaftarkan dan memutasi status (Issued/Returned) berdasarkan dokumen logistik.</td></tr>
        <tr><td class="border px-2 py-1">QA / QC Inspector</td><td class="border px-2 py-1">Update Status (Block/Restrict)</td><td class="border px-2 py-1">Berhak membekukan (*Block/Restrict*) suatu Batch jika ditemukan cacat produksi.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Batch: RESTRICTED</td><td class="border px-2 py-1">Semua serial dan stok yang bernaung di bawah Batch ini otomatis tidak dapat dialokasikan untuk Sales Order (dibekukan).</td></tr>
        <tr><td class="border px-2 py-1">Serial: ISSUED</td><td class="border px-2 py-1">Barang sudah berpindah tangan ke pelanggan. Sistem menolak transaksi pindah gudang atau penjualan ulang untuk serial ini.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-SRL-01</td><td class="border px-2 py-1">Serial Number Uniqueness</td><td class="border px-2 py-1">Data <em>Serial Number</em> harus bersifat UNIK dalam konteks satu <em>Material ID</em>. Dilarang ada dua material ID yang sama dengan nomor seri yang sama.</td></tr>
        <tr><td class="border px-2 py-1">BR-BTC-01</td><td class="border px-2 py-1">Mandatory Expiry</td><td class="border px-2 py-1">Jika master data material memiliki kategori barang makanan/obat (FMCG), maka pembuatan master Batch diwajibkan menyertakan atribut tanggal kedaluwarsa.</td></tr>
        <tr><td class="border px-2 py-1">BR-SRL-02</td><td class="border px-2 py-1">Location Tracking</td><td class="border px-2 py-1">Sebuah Serial Number fisik (dengan status AVAILABLE) hanya boleh berada di 1 (satu) Branch pada satu titik waktu tertentu.</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Serial Status</td><td class="border px-2 py-1">AVAILABLE (saat pertama kali di-generate via penerimaan barang).</td></tr>
        <tr><td class="border px-2 py-1">Batch Restriction</td><td class="border px-2 py-1">FALSE (Unrestricted Use).</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Delivery Order Issuance</td><td class="border px-2 py-1">Sistem menampilkan Error: <em>"Serial Number [XYZ] is not AVAILABLE at Branch [123]"</em> jika user men-scan serial yang statusnya sudah ISSUED atau barangnya berada di cabang lain.</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tinggi (Klaim Garansi &amp; Forensik)</td><td class="border px-2 py-1">Seluruh siklus hidup Serial Number wajib mencatat pemicunya (Document Reference) beserta audit standar <code>created_by</code>, <code>updated_by</code>.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Sistem berhasil membuat 1 entitas master Batch dan 10 entitas Serial Number turunan secara otomatis saat proses Goods Receipt kuantitas 10 PCS diposting.</td></tr>
        <tr><td class="border px-2 py-1">AC-02</td><td class="border px-2 py-1">Sistem berhasil memblokir proses Delivery jika nomor seri yang diseken sudah pernah terjual (status ISSUED).</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BRD-040 (Material Master)</td><td class="border px-2 py-1">Berdasarkan setting <em>is_batch_managed</em> dan <em>is_serial_managed</em> dari Material Master.</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-20 13:58:32',
                'updated_at' => '2026-07-20 13:58:32',
            ),
            89 => 
            array (
                'id' => 148,
                'brd_code' => 'BRD-023',
                'title' => 'Material Group & Hierarchy',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">

<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Informasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-023</td></tr>
<tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Material Group & Hierarchy</td></tr>
<tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Inventory / Master Data</td></tr>
<tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
<tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
</tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Material Group Hierarchy</td><td class="border px-2 py-1">Struktur pohon (*Tree Structure*) untuk mengelompokkan kategori produk tanpa batas kedalaman (Level 1, Level 2, Level N).</td><td class="border px-2 py-1">Tidak mengatur limitasi pembatasan otorisasi akses produk per *user* berdasarkan grup.</td></tr>
</tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Dynamic Tree Hierarchy</td><td class="border px-2 py-1">Sistem klasifikasi tidak dikunci kaku hanya 2 level (Kategori dan Sub). Mengadopsi relasi *Parent-Child* agar perusahaan bisa punya kedalaman tak terbatas.</td><td class="border px-2 py-1">Grup Anak dilarang di-set sebagai *Parent* bagi Induknya (Mencegah *Circular Loop*).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Analytics & Pricing Dimension</td><td class="border px-2 py-1">Grup ini berperan sebagai dimensi penentu harga grosir atau diskon promosi penjualan secara massal.</td><td class="border px-2 py-1">Digunakan sebagai agregator dimensi laporan Profitabilitas (CO-PA).</td></tr>
</tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Management Reporting</td><td class="border px-2 py-1">Memenuhi pilar pelaporan manajemen untuk membedah segmen bisnis/produk yang paling dominan di pasar, dan menjadi dasar penentuan kelas Pajak Barang Mewah (PPnBM).</td></tr>
</tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi & Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">material_groups</td><td class="border px-2 py-1">One-to-Many dengan dirinya sendiri (Self-Referencing)</td><td class="border px-2 py-1">`parent_id` merujuk ke tabel yang sama untuk membangun cabang.</td></tr>
<tr><td class="border px-2 py-1 font-bold">materials</td><td class="border px-2 py-1">One-to-Many dengan material_groups</td><td class="border px-2 py-1">Setiap barang dikelompokkan mutlak ke salah satu grup.</td></tr>
</tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Hierarchy Resolution</td><td class="border px-2 py-1">Saat menarik laporan pendapatan per-Grup Induk, sistem basis data wajib menghimpun seluruh nilai faktur secara rekursif dari node Anaknya hingga level terbawah.</td></tr>
</tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan & Logika Kontrol</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Master Data Admin</td><td class="border px-2 py-1">Create, Read, Update, Delete</td><td class="border px-2 py-1">Penghapusan fisik (DELETE) HANYA dizinkan jika grup *orphan* (tidak punya anak dan tidak disematkan pada satupun Material).</td></tr>
</tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Inactive Node</td><td class="border px-2 py-1">Jika sebuah grup Induk berstatus nonaktif (`is_active` = false), seluruh cabang anaknya otomatis akan terkunci/tidak valid untuk direlasikan pada master barang baru.</td></tr>
</tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi & Eksekusi Validasi</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">BR-23-01</td><td class="border px-2 py-1">Circular Reference Prevention</td><td class="border px-2 py-1">Sistem di-backend wajib memeriksa (Loop checking) agar Node Anak tidak dipindah menjadi Induk bagi Induk kandungnya.</td></tr>
<tr><td class="border px-2 py-1 font-bold">BR-23-02</td><td class="border px-2 py-1">Unique Group Code</td><td class="border px-2 py-1">Kombinasi `company_id` + `group_code` adalah absolut Unik.</td></tr>
</tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Parent ID</td><td class="border px-2 py-1">Kosong (`NULL`) yang berarti bertindak sebagai kategori tingkat paling atas (*Root*).</td></tr>
<tr><td class="border px-2 py-1 font-bold">Level Indicator</td><td class="border px-2 py-1">Jika `parent_id` = NULL, maka `level` = 1. Jika bertaut pada parent, maka nilai `level` = `level_induk + 1`.</td></tr>
</tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi & Peringatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Group Code Format</td><td class="border px-2 py-1">Maksimal 20 karakter. Regex `^[A-Z0-9\\-]+$`. Mendukung karakter stip/dash.</td></tr>
</tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Medium</td><td class="border px-2 py-1">Pemindahan cabang (*Tree Restructuring*) merubah `parent_id` wajib mendokumentasikan log rekam jejak pada `updated_by` untuk menelisik perpindahan aset secara logikal.</td></tr>
</tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/12">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">AC-23-01</td><td class="border px-2 py-1">Validator DELETE API akan melemparkan *Error Exception* jika user mencoba membunuh Node Induk yang masih memiliki Anak/Ranting di bawahnya.</td></tr>
<tr><td class="border px-2 py-1 font-bold">AC-23-02</td><td class="border px-2 py-1">Sistem menggagalkan operasi UPDATE dengan kode 422 jika "Baju Pria" diatur bernaung di bawah "Kemeja Formal" apabila sebelumnya "Kemeja Formal" adalah anak dari "Baju Pria" (*Circular Trap*).</td></tr>
</tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-xs mb-6 border">
<thead class="bg-gray-100">
<tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
</thead>
<tbody>
<tr><td class="border px-2 py-1 font-bold">Material Master</td><td class="border px-2 py-1">Dokumen ini merupakan prasyarat pengelompokan pada form Master Barang (*Item Management*).</td></tr>
</tbody>
</table>

</div>',
                'created_at' => '2026-07-22 16:50:39',
                'updated_at' => '2026-07-24 13:21:06',
            ),
            90 => 
            array (
                'id' => 149,
                'brd_code' => 'BRD-049',
            'title' => 'Purchase Contract (Outline Agreement)',
                'project_id' => NULL,
                'status' => 'Approved',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Key</th><th class="border px-2 py-1">Value</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1 font-bold">Document ID</td><td class="border px-2 py-1">BRD-049</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Document Name</td><td class="border px-2 py-1">Purchase Contract (Outline Agreement)</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Module</td><td class="border px-2 py-1">Materials Management (MM) - Purchasing</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Version</td><td class="border px-2 py-1">1.0</td></tr>
        <tr><td class="border px-2 py-1 font-bold">Status</td><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Modul / Fitur</th><th class="border px-2 py-1">In-Scope</th><th class="border px-2 py-1">Out-of-Scope</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Manajemen Kontrak Jangka Panjang</td><td class="border px-2 py-1">Pembuatan Kontrak Kuantitas (Quantity Contract) dan Kontrak Nilai (Value Contract) dengan Vendor, beserta fitur *Call-Off* / *Release Order* ke PO.</td><td class="border px-2 py-1">Penjadwalan pengiriman otomatis tanpa PO (Scheduling Agreement).</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan</th><th class="border px-2 py-1">Business Rules</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Value vs Quantity Contract</td><td class="border px-2 py-1">Tipe dokumen mendikte jenis batas atas (Plafon). Value = Plafon berupa uang (misal 1 Miliar). Quantity = Plafon berupa unit (misal 10.000 ton).</td><td class="border px-2 py-1">Release Order (PO) tidak boleh diterbitkan jika nilai kumulatifnya akan melampaui sisa plafon kontrak.</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Regulasi</th><th class="border px-2 py-1">Implikasi ke Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Legal Binding Integrity</td><td class="border px-2 py-1">Kontrak tidak bisa diubah (Amendmen) secara diam-diam. Perubahan harga/plafon harus melalui siklus *Approval* ulang.</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Entitas Anak / Modul</th><th class="border px-2 py-1">Tipe Relasi &amp; Kardinalitas</th><th class="border px-2 py-1">Penjelasan Fungsional</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">purchase_contracts</td><td class="border px-2 py-1">One-to-Many (1:N) ke Lines</td><td class="border px-2 py-1">Menyimpan Header Kontrak (Vendor, Periode Berlaku, Plafon Value).</td></tr>
        <tr><td class="border px-2 py-1">purchase_contract_lines</td><td class="border px-2 py-1">Many-to-One (N:1) ke Master Material</td><td class="border px-2 py-1">Menyimpan rincian material, harga ikat (net_price), dan Plafon Quantity.</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fitur Utama</th><th class="border px-2 py-1">Alur Proses (User Journey)</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Call-Off Consumption</td><td class="border px-2 py-1">Saat *user* membuat PO berbekal referensi Kontrak, sistem meng-update `released_qty` dan `released_value` pada baris kontrak secara *real-time*.</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Aktor / Role</th><th class="border px-2 py-1">Hak Akses</th><th class="border px-2 py-1">Batasan &amp; Logika Kontrol</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Purchasing Manager</td><td class="border px-2 py-1">Approve Contract</td><td class="border px-2 py-1">Kontrak senilai miliaran Rupiah harus diotorisasi oleh Direktur (berjenjang).</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Status Life-cycle</th><th class="border px-2 py-1">Perlakuan Sistem</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">EXPIRED</td><td class="border px-2 py-1">Status otomatis diubah oleh *Scheduler* harian jika `valid_to` < Tanggal Hari Ini. Tidak bisa di-*Call-Off* lagi.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">BR Code</th><th class="border px-2 py-1">Nama Aturan</th><th class="border px-2 py-1">Deskripsi &amp; Eksekusi Validasi</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">BR-49-01</td><td class="border px-2 py-1">Header vs Line Constraints</td><td class="border px-2 py-1">Jika tipe dokumen adalah Value Contract, maka `target_value` wajib ada di Header. Jika tipe dokumen adalah Quantity Contract, maka `target_qty` wajib ada di level Line.</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Field / Atribut</th><th class="border px-2 py-1">Nilai Default</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">released_qty / value</td><td class="border px-2 py-1">Default 0.00 saat kontrak pertama kali disetujui.</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario / Form Input</th><th class="border px-2 py-1">Aturan Limitasi &amp; Peringatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Valid Date Range</td><td class="border px-2 py-1">Rentang berlakunya Kontrak (`valid_from` & `valid_to`) umumnya minimal 1 bulan ke depan. Sistem menampilkan peringatan jika < 1 bulan.</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Sensitivitas</th><th class="border px-2 py-1">Komponen Rekaman Wajib</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Tinggi</td><td class="border px-2 py-1">Riwayat penarikan kuota (Consumption History) wajib ditelusuri lewat `purchase_order_lines.purchase_contract_line_id`.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">AC Code</th><th class="border px-2 py-1">Kriteria Uji Kelulusan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">AC-01</td><td class="border px-2 py-1">Sistem berhasil memblokir penerbitan PO (Error 422) yang mencoba memesan 500 pcs padahal `target_qty` di kontrak tersisa 400 pcs.</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Ketergantungan Pada</th><th class="border px-2 py-1">Alasan Keterikatan</th></tr>
    </thead>
    <tbody class="bg-white">
        <tr><td class="border px-2 py-1">Document Number Engine</td><td class="border px-2 py-1">Penomoran kontrak harus membedakan secara visual *Prefix* antara *Value Contract* (misal: WK...) dan *Quantity Contract* (misal: MK...).</td></tr>
    </tbody>
</table>
</div>',
                'created_at' => '2026-07-20 14:20:08',
                'updated_at' => '2026-07-20 14:20:08',
            ),
            91 => 
            array (
                'id' => 150,
                'brd_code' => 'BRD-054',
            'title' => 'Internal Goods Issue (Penggunaan Internal & Scrap)',
                'project_id' => NULL,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-20 14:20:37',
                'updated_at' => '2026-07-20 14:20:37',
            ),
            92 => 
            array (
                'id' => 151,
                'brd_code' => 'BRD-005',
            'title' => 'Business Partner Grouping & Role (Customer/Vendor Type)',
                'project_id' => 1,
                'status' => 'Approved',
                'content' => '<h2>1. Document Information</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <tbody>
        <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-005</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Business Partner Grouping & Role</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Master Data Management</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
        <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Final</td></tr>
    </tbody>
</table>

<h2>2. Scope</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Parameter</th><th class="border px-2 py-1">Deskripsi Ruang Lingkup</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">In-Scope</td><td class="border px-2 py-1">Pengaturan pengelompokan (Grouping) entitas bisnis (Customer, Supplier, Employee), aturan penomoran, serta klasifikasi peran (Role) dalam transaksi.</td></tr>
        <tr><td class="border px-2 py-1">Out-of-Scope</td><td class="border px-2 py-1">Pembuatan Master Data Business Partner (Individu/Organisasi) itu sendiri, yang akan diatur pada dokumen terpisah (BRD-006).</td></tr>
    </tbody>
</table>

<h2>3. Domain Core Specification</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Konsep Utama</th><th class="border px-2 py-1">Penjelasan (Description)</th><th class="border px-2 py-1">Business Rules / Aturan Data</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-semibold">Business Partner (BP)</td><td class="border px-2 py-1">Entitas sentral yang bertransaksi dengan perusahaan (bisa berupa Organisasi maupun Individu).</td><td class="border px-2 py-1">Sistem mencegah entitas fisik yang sama memiliki ID yang berbeda. 1 Entitas = 1 ID BP.</td></tr>
        <tr><td class="border px-2 py-1 font-semibold">BP Grouping</td><td class="border px-2 py-1">Pengklasifikasian untuk menentukan sifat dasar dan pola penomoran (Number Range) otomatis.</td><td class="border px-2 py-1">Setiap BP wajib di-assign ke tepat 1 (satu) Group utama secara eksklusif.</td></tr>
        <tr><td class="border px-2 py-1 font-semibold">BP Role</td><td class="border px-2 py-1">Peran bisnis yang menentukan hak keterlibatan transaksi (misal: Role Sales, Role Purchasing).</td><td class="border px-2 py-1">Satu BP dapat memiliki banyak (multiple) Role secara bersamaan (Customer sekaligus Vendor).</td></tr>
    </tbody>
</table>

<h2>4. Tax & Compliance</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Regulasi / Kepatuhan</th><th class="border px-2 py-1">Penerapan pada Sistem</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Transfer Pricing & Afiliasi</td><td class="border px-2 py-1">Sistem menyediakan flag <code>is_internal</code> pada level Grouping untuk mengidentifikasi transaksi dengan pihak berelasi istimewa (Related Parties).</td></tr>
    </tbody>
</table>

<h2>5. Data Structure & Relationships</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1">Table Name</th><th class="border px-2 py-1">Field Name</th><th class="border px-2 py-1">Data Type</th><th class="border px-2 py-1">Description / Constraint</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1" rowspan="8"><code>bp_groups</code></td><td class="border px-2 py-1">id</td><td class="border px-2 py-1">BIGINT (PK)</td><td class="border px-2 py-1">Primary Key</td></tr>
        <tr><td class="border px-2 py-1">code</td><td class="border px-2 py-1">VARCHAR(10)</td><td class="border px-2 py-1">Kode Unik Group (Misal: CUST, VEND, EMPL)</td></tr>
        <tr><td class="border px-2 py-1">name</td><td class="border px-2 py-1">VARCHAR(100)</td><td class="border px-2 py-1">Nama Group</td></tr>
        <tr><td class="border px-2 py-1">type</td><td class="border px-2 py-1">VARCHAR(50)</td><td class="border px-2 py-1">Kategori: Customer, Supplier, Employee, Affiliate</td></tr>
        <tr><td class="border px-2 py-1">is_internal</td><td class="border px-2 py-1">BOOLEAN</td><td class="border px-2 py-1">Flag penanda entitas internal / berafiliasi</td></tr>
        <tr><td class="border px-2 py-1">number_prefix</td><td class="border px-2 py-1">VARCHAR(10)</td><td class="border px-2 py-1">Prefix penomoran otomatis</td></tr>
        <tr><td class="border px-2 py-1">status</td><td class="border px-2 py-1">VARCHAR(20)</td><td class="border px-2 py-1">Active / Inactive</td></tr>
        <tr><td class="border px-2 py-1">created_at, dll</td><td class="border px-2 py-1">TIMESTAMP</td><td class="border px-2 py-1">Kolom jejak audit (Audit Trail) standar</td></tr>
        
        <tr><td class="border px-2 py-1" rowspan="7"><code>bp_roles</code></td><td class="border px-2 py-1">id</td><td class="border px-2 py-1">BIGINT (PK)</td><td class="border px-2 py-1">Primary Key</td></tr>
        <tr><td class="border px-2 py-1">code</td><td class="border px-2 py-1">VARCHAR(20)</td><td class="border px-2 py-1">Kode Unik Role (Misal: SOLD_TO, BILL_TO)</td></tr>
        <tr><td class="border px-2 py-1">name</td><td class="border px-2 py-1">VARCHAR(100)</td><td class="border px-2 py-1">Nama Role Bisnis</td></tr>
        <tr><td class="border px-2 py-1">category</td><td class="border px-2 py-1">VARCHAR(50)</td><td class="border px-2 py-1">Klasifikasi: Sales, Purchasing, Finance, General</td></tr>
        <tr><td class="border px-2 py-1">description</td><td class="border px-2 py-1">TEXT</td><td class="border px-2 py-1">Keterangan fungsi Role</td></tr>
        <tr><td class="border px-2 py-1">is_active</td><td class="border px-2 py-1">BOOLEAN</td><td class="border px-2 py-1">Status aktivasi Role</td></tr>
        <tr><td class="border px-2 py-1">created_at, dll</td><td class="border px-2 py-1">TIMESTAMP</td><td class="border px-2 py-1">Kolom jejak audit (Audit Trail) standar</td></tr>
    </tbody>
</table>

<h2>6. Functional Specifics</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Fungsi</th><th class="border px-2 py-1">Spesifikasi Proses</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Dependency Flow</td><td class="border px-2 py-1">Konfigurasi Master Data Grouping dan Role ini wajib dibuat sebelum pengguna dapat menginput Master Business Partner di sistem.</td></tr>
        <tr><td class="border px-2 py-1">Data Fetching</td><td class="border px-2 py-1">Modul transaksi operasional akan memfilter validitas BP berdasarkan Role yang dimilikinya (Contoh: Modul Purchase Order hanya menarik BP yang memiliki Role ber-kategori <code>Purchasing</code>).</td></tr>
    </tbody>
</table>

<h2>7. Controls & Authorization</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Tingkat Akses</th><th class="border px-2 py-1">Pengaturan Wewenang</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Create, Update, Delete</td><td class="border px-2 py-1">Otorisasi eksklusif hanya untuk level Super Admin atau departemen Master Data Management (MDM).</td></tr>
        <tr><td class="border px-2 py-1">View / Read-Only</td><td class="border px-2 py-1">Tersedia untuk semua departemen operasional (Sales, Finance, Purchasing) sebagai data referensi.</td></tr>
    </tbody>
</table>

<h2>8. Status & Blocking</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Skenario</th><th class="border px-2 py-1">Perilaku Sistem</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Penghapusan Data Aktif</td><td class="border px-2 py-1">Sistem akan melakukan pemblokiran (Hard Delete ditolak) jika Group atau Role tersebut sudah terasosiasi dengan minimal satu dokumen Master BP.</td></tr>
        <tr><td class="border px-2 py-1">Deaktivasi (Inactivation)</td><td class="border px-2 py-1">Diizinkan via pengubahan status menjadi <code>Inactive</code>. Mencegah referensi pemakaian untuk BP yang baru, tanpa merusak transaksi lama.</td></tr>
    </tbody>
</table>

<h2>9. Business Rules (BR)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">Kode BR</th><th class="border px-2 py-1">Definisi Aturan</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">BR-01</td><td class="border px-2 py-1">Satu Business Partner wajib memiliki 1 (satu) Group utama untuk menentukan pola ID Number-nya.</td></tr>
        <tr><td class="border px-2 py-1 font-bold">BR-02</td><td class="border px-2 py-1">Satu Business Partner dapat diberikan banyak Role (Multiple Roles). Contoh: BP "PT ABC" bisa sebagai Vendor sekaligus Customer.</td></tr>
    </tbody>
</table>

<h2>10. Default Values</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Parameter</th><th class="border px-2 py-1">Nilai Bawaan (Default)</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1"><code>is_internal</code></td><td class="border px-2 py-1">Secara bawaan diatur ke <code>false</code> kecuali diset sebaliknya.</td></tr>
        <tr><td class="border px-2 py-1"><code>status</code> / <code>is_active</code></td><td class="border px-2 py-1">Secara otomatis diset ke <code>Active</code> / <code>true</code> saat record baru dibuat.</td></tr>
    </tbody>
</table>

<h2>11. Validation Rules</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Atribut</th><th class="border px-2 py-1">Aturan Validasi</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">Group Code</td><td class="border px-2 py-1">Maksimal 10 karakter, harus kombinasi huruf kapital dan angka tanpa spasi (Alphanumeric). Unik di seluruh sistem.</td></tr>
        <tr><td class="border px-2 py-1">Role Code</td><td class="border px-2 py-1">Maksimal 20 karakter, tanpa spasi, menggunakan format UPPER_SNAKE_CASE (Misal: SOLD_TO). Unik.</td></tr>
    </tbody>
</table>

<h2>12. Audit Requirements</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/4">Komponen Audit</th><th class="border px-2 py-1">Keterangan</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1">User Traceability</td><td class="border px-2 py-1">Perekaman mutlak User ID pada kolom <code>created_by</code> dan <code>updated_by</code> untuk setiap transaksi penyisipan atau perubahan master.</td></tr>
    </tbody>
</table>

<h2>13. Acceptance Criteria (AC)</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">Kode AC</th><th class="border px-2 py-1">Kriteria Penerimaan</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">AC-01</td><td class="border px-2 py-1">Sistem mampu menyimpan Master BP Group dan BP Role tanpa terjadi duplikasi kode (Duplicate Entry Blocked).</td></tr>
        <tr><td class="border px-2 py-1 font-bold">AC-02</td><td class="border px-2 py-1">Terdapat API endpoints yang menyediakan *list* aktif Group dan Role untuk kebutuhan *Dropdown* antarmuka UI.</td></tr>
    </tbody>
</table>

<h2>14. Dependencies</h2>
<table class="min-w-full bg-white text-left border-collapse text-sm mb-4 border">
    <thead class="bg-gray-100">
        <tr><th class="border px-2 py-1 w-1/6">Kode BRD</th><th class="border px-2 py-1">Keterkaitan Modul</th></tr>
    </thead>
    <tbody>
        <tr><td class="border px-2 py-1 font-bold">BRD-006</td><td class="border px-2 py-1">Master Business Partner (Merupakan entitas yang langsung mengonsumsi konfigurasi Group dan Role ini).</td></tr>
    </tbody>
</table>',
                'created_at' => '2026-07-20 14:22:23',
                'updated_at' => '2026-07-22 05:12:28',
            ),
            93 => 
            array (
                'id' => 152,
                'brd_code' => 'BRD-069',
            'title' => 'Customer Down Payment (Uang Muka Pelanggan)',
                'project_id' => NULL,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-20 14:42:49',
                'updated_at' => '2026-07-20 14:42:49',
            ),
            94 => 
            array (
                'id' => 153,
                'brd_code' => 'BRD-094',
            'title' => 'Laporan Penjualan (Sales Report by AR Invoice)',
                'project_id' => NULL,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-20 14:50:44',
                'updated_at' => '2026-07-20 14:50:44',
            ),
            95 => 
            array (
                'id' => 154,
                'brd_code' => 'BRD-100',
            'title' => 'Laporan Neraca (Balance Sheet)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<h2>1. Deskripsi Laporan</h2><p>Laporan yang menyajikan Neraca keuangan perusahaan.</p>',
                'created_at' => '2026-07-20 14:54:35',
                'updated_at' => '2026-07-24 17:35:03',
            ),
            96 => 
            array (
                'id' => 155,
                'brd_code' => 'BRD-099',
            'title' => 'Laporan Rincian Hutang (Vendor Line Item)',
                'project_id' => NULL,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-20 14:54:35',
                'updated_at' => '2026-07-20 14:55:38',
            ),
            97 => 
            array (
                'id' => 156,
                'brd_code' => 'BRD-096',
            'title' => 'Laporan Rincian Piutang (Customer Line Item)',
                'project_id' => NULL,
                'status' => 'Under Review',
                'content' => NULL,
                'created_at' => '2026-07-20 14:54:35',
                'updated_at' => '2026-07-20 14:55:38',
            ),
            98 => 
            array (
                'id' => 158,
                'brd_code' => 'BRD-056',
            'title' => 'Material Price Change / Revaluation (MR21)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-056</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Material Price Change (Revaluation)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Inventory & Warehouse Management</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Draft</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur fungsionalitas penyesuaian harga material secara manual (baik <em>Standard Price</em> maupun <em>Moving Average Price</em>) yang berdampak langsung pada nilai persediaan (Inventory Value) dan menghasilkan Jurnal Akuntansi Revaluasi (Price Difference).</p>

    <h2>3. Domain Core Specification</h2>
    <p>Perubahan harga persediaan (Price Change) adalah transaksi finansial yang mengubah nilai persediaan tanpa mengubah kuantitas fisik. Selisih antara harga lama dan harga baru dikalikan dengan total kuantitas stok saat ini akan menghasilkan nilai Revaluasi yang dibukukan ke akun selisih harga (Price Difference / UMB).</p>

    <h2>4. Tax & Compliance</h2>
    <p>Selisih revaluasi persediaan dapat diakui sebagai kerugian atau keuntungan yang dapat mempengaruhi PPh Badan. Oleh karena itu, otorisasi transaksi ini harus dikontrol dengan sangat ketat.</p>

    <h2>5. Data Structure & Relationships</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <thead>
            <tr class="bg-gray-100"><th class="border px-2 py-1">Table Name</th><th class="border px-2 py-1">Field Name</th><th class="border px-2 py-1">Data Type</th><th class="border px-2 py-1">Description / Constraint</th></tr>
        </thead>
        <tbody>
            <tr><td class="border px-2 py-1" rowspan="11"><code>material_price_changes</code> (Header)</td><td class="border px-2 py-1">id</td><td class="border px-2 py-1">BIGINT (PK)</td><td class="border px-2 py-1">Primary Key</td></tr>
            <tr><td class="border px-2 py-1">branch_id</td><td class="border px-2 py-1">BIGINT (FK)</td><td class="border px-2 py-1">Cabang tempat mutasi harga dilakukan</td></tr>
            <tr><td class="border px-2 py-1">document_number</td><td class="border px-2 py-1">VARCHAR(50)</td><td class="border px-2 py-1">Nomor dokumen ubah harga</td></tr>
            <tr><td class="border px-2 py-1">posting_date</td><td class="border px-2 py-1">DATE</td><td class="border px-2 py-1">Tanggal posting akuntansi</td></tr>
            <tr><td class="border px-2 py-1">status</td><td class="border px-2 py-1">VARCHAR(20)</td><td class="border px-2 py-1">DRAFT, POSTED, CANCELLED</td></tr>
            <tr><td class="border px-2 py-1">remarks</td><td class="border px-2 py-1">TEXT</td><td class="border px-2 py-1">Keterangan alasan perubahan harga</td></tr>
            <tr><td class="border px-2 py-1">created_at</td><td class="border px-2 py-1">TIMESTAMP</td><td class="border px-2 py-1">Waktu pembuatan (Audit Trail)</td></tr>
            <tr><td class="border px-2 py-1">created_by</td><td class="border px-2 py-1">BIGINT (FK)</td><td class="border px-2 py-1">User pembuat (Audit Trail)</td></tr>
            <tr><td class="border px-2 py-1">updated_at</td><td class="border px-2 py-1">TIMESTAMP</td><td class="border px-2 py-1">Waktu update (Audit Trail)</td></tr>
            <tr><td class="border px-2 py-1">updated_by</td><td class="border px-2 py-1">BIGINT (FK)</td><td class="border px-2 py-1">User updater (Audit Trail)</td></tr>
            <tr><td class="border px-2 py-1">deleted_at</td><td class="border px-2 py-1">TIMESTAMP</td><td class="border px-2 py-1">Soft delete timestamp</td></tr>
            <tr><td class="border px-2 py-1" rowspan="8"><code>material_price_change_lines</code> (Detail)</td><td class="border px-2 py-1">id</td><td class="border px-2 py-1">BIGINT (PK)</td><td class="border px-2 py-1">Primary Key</td></tr>
            <tr><td class="border px-2 py-1">header_id</td><td class="border px-2 py-1">BIGINT (FK)</td><td class="border px-2 py-1">Relasi ke material_price_changes</td></tr>
            <tr><td class="border px-2 py-1">material_id</td><td class="border px-2 py-1">BIGINT (FK)</td><td class="border px-2 py-1">Material yang harganya diubah</td></tr>
            <tr><td class="border px-2 py-1">current_qty</td><td class="border px-2 py-1">DECIMAL(18,4)</td><td class="border px-2 py-1">Total stok material saat dokumen dibuat</td></tr>
            <tr><td class="border px-2 py-1">old_price</td><td class="border px-2 py-1">DECIMAL(18,2)</td><td class="border px-2 py-1">Harga HPP lama sebelum dirubah</td></tr>
            <tr><td class="border px-2 py-1">new_price</td><td class="border px-2 py-1">DECIMAL(18,2)</td><td class="border px-2 py-1">Harga HPP baru</td></tr>
            <tr><td class="border px-2 py-1">revaluation_amount</td><td class="border px-2 py-1">DECIMAL(18,2)</td><td class="border px-2 py-1">(new_price - old_price) * current_qty</td></tr>
            <tr><td class="border px-2 py-1">created_at, dll</td><td class="border px-2 py-1">TIMESTAMP</td><td class="border px-2 py-1">Sama seperti struktur audit tabel relasi</td></tr>
        </tbody>
    </table>

    <h2>6. Functional Specifics</h2>
    <p>Sistem akan menampilkan saldo kuantitas berjalan (Current Quantity) dari tabel Inventory Ledger. Jika kuantitas = 0, perubahan harga tetap bisa dilakukan (untuk transaksi penerimaan barang di masa depan), namun Revaluation Amount akan bernilai 0 (nol) dan tidak ada jurnal yang terbentuk.</p>

    <h2>7. Controls & Authorization</h2>
    <p>Akses ke transaksi <em>Price Change</em> sangat dibatasi hanya untuk level Manajer Keuangan / Cost Controller. Tidak boleh diakses oleh staf gudang biasa.</p>

    <h2>8. Status & Blocking</h2>
    <p>Jika status dokumen sudah POSTED, dokumen tidak dapat direvisi secara fisik (Soft Delete tidak diizinkan untuk data POSTED). Pembatalan harus melalui pembuatan dokumen pembalik (Reversal).</p>

    <h2>9. Business Rules (BR)</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 bg-gray-100">BR-01</th><td class="border px-2 py-1">Sistem akan men-generate jurnal akuntansi secara real-time saat POSTED: Debit/Kredit Persediaan melawan Debit/Kredit Selisih Harga (UMB).</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">BR-02</th><td class="border px-2 py-1">Jika kuantitas material negatif (Negative Stock), perubahan harga tidak diperbolehkan (Block).</td></tr>
        </tbody>
    </table>

    <h2>10. Default Values</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody><tr><th class="border px-2 py-1 bg-gray-100">Posting Date</th><td class="border px-2 py-1">Sistem otomatis mengisi tanggal hari ini (Current Date).</td></tr></tbody>
    </table>

    <h2>11. Validation Rules</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody><tr><th class="border px-2 py-1 bg-gray-100">New Price</th><td class="border px-2 py-1">Tidak boleh bernilai negatif (Must be &ge; 0).</td></tr></tbody>
    </table>

    <h2>12. Audit Requirements</h2>
    <p>Setiap pembuatan atau pembatalan wajib mencatat <code>created_by</code> dan <code>created_at</code> sebagai jejak mutlak perubahan HPP di sistem.</p>

    <h2>13. Acceptance Criteria (AC)</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody><tr><th class="border px-2 py-1 bg-gray-100">AC-01</th><td class="border px-2 py-1">Dokumen berhasil merubah HPP material dan tercermin seketika di Laporan Master Barang dan Valuasi. Jurnal revaluasi terbentuk.</td></tr></tbody>
    </table>

    <h2>14. Dependencies</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 bg-gray-100">BRD-040</th><td class="border px-2 py-1">Data Barang (Material Master)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">BRD-024</th><td class="border px-2 py-1">Valuation Class</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">BRD-018 & 027</th><td class="border px-2 py-1">Auto Journal Mapping (PRD / UMB Account)</td></tr>
        </tbody>
    </table>
</div>',
                'created_at' => '2026-07-22 02:45:07',
                'updated_at' => '2026-07-22 02:45:07',
            ),
            99 => 
            array (
                'id' => 159,
                'brd_code' => 'BRD-092',
            'title' => 'Material Price Analysis (CKM3)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<div class="prose max-w-none prose-sm text-justify">
    <h2>1. Document Information</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 w-1/4 bg-gray-100">Document ID</th><td class="border px-2 py-1">BRD-092</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Document Name</th><td class="border px-2 py-1">Business Requirement Document - Material Price Analysis (CKM3)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Module</th><td class="border px-2 py-1">Enterprise Reporting & Analytics</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Version</th><td class="border px-2 py-1">1.0</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">Status</th><td class="border px-2 py-1">Draft</td></tr>
        </tbody>
    </table>

    <h2>2. Scope</h2>
    <p>Mengatur spesifikasi fungsional untuk layar pelaporan/analisis pergerakan nilai HPP (Harga Pokok Penjualan) atau Valuasi Material secara historis. Modul ini setara fungsionalitas CKM3 di SAP (Material Ledger Display).</p>

    <h2>3. Domain Core Specification</h2>
    <p>Layar analisis ini akan mengkonsolidasikan data dari tabel transaksi logistik (GR, Mutasi) dan finansial (AP Invoice Price Variance, MR21) untuk memberikan visibilitas penuh kepada <em>Cost Controller</em> mengenai alasan terbentuknya nilai <em>Moving Average Price</em> saat ini.</p>

    <h2>4. Tax & Compliance</h2>
    <p>Modul pelaporan ini mendukung pembuktian audit (Audit Trail Reporting) atas mutasi harga yang terjadi, memastikan kepatuhan pajak mengenai konsistensi perhitungan HPP.</p>

    <h2>5. Data Structure & Relationships</h2>
    <p>Modul ini tidak memiliki tabel tersendiri karena ia adalah sebuah <strong>View / Report</strong>. Namun ia akan melakukan query agregat secara kompleks dari:</p>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <thead>
            <tr class="bg-gray-100"><th class="border px-2 py-1">Source Table</th><th class="border px-2 py-1">Function in Analysis</th></tr>
        </thead>
        <tbody>
            <tr><td class="border px-2 py-1"><code>materials</code></td><td class="border px-2 py-1">Menarik master data dan status harga saat ini.</td></tr>
            <tr><td class="border px-2 py-1"><code>inventory_ledger</code></td><td class="border px-2 py-1">Menelusuri mutasi kuantitas (Goods Receipt, Goods Issue).</td></tr>
            <tr><td class="border px-2 py-1"><code>ap_invoice_lines</code></td><td class="border px-2 py-1">Mendeteksi <em>Purchase Price Variance (PPV)</em> dari selisih faktur.</td></tr>
            <tr><td class="border px-2 py-1"><code>material_price_change_lines</code></td><td class="border px-2 py-1">Mendeteksi revaluasi manual MR21.</td></tr>
        </tbody>
    </table>

    <h2>6. Functional Specifics</h2>
    <p>Pengguna memilih filter: Material ID, Branch, dan Periode (Bulan/Tahun). Sistem menampilkan struktur hierarki yang memperlihatkan: <em>Beginning Balance</em>, <em>Receipts (with PPV details)</em>, <em>Consumption</em>, dan <em>Ending Balance</em> lengkap dengan Kuantitas, Nilai Total, dan Harga Satuan (Price).</p>

    <h2>7. Controls & Authorization</h2>
    <p>Otorisasi terbatas pada Role Finance/Costing. Dibatasi secara level Cabang (hanya bisa melihat harga di cabang otoritasnya).</p>

    <h2>8. Status & Blocking</h2>
    <p>Tidak relevan (Modul Pelaporan Read-Only).</p>

    <h2>9. Business Rules (BR)</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 bg-gray-100">BR-01</th><td class="border px-2 py-1">Total kumulatif nilai (Value) dibagi total kuantitas (Qty) pada baris Akhir (Ending Balance) harus tepat sama dengan MAP di Master Material pada akhir periode tersebut.</td></tr>
        </tbody>
    </table>

    <h2>10. Default Values</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody><tr><th class="border px-2 py-1 bg-gray-100">Period Filter</th><td class="border px-2 py-1">Periode akuntansi aktif (Bulan berjalan).</td></tr></tbody>
    </table>

    <h2>11. Validation Rules</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody><tr><th class="border px-2 py-1 bg-gray-100">Mandatory Filter</th><td class="border px-2 py-1">Material ID wajib diisi untuk menjalankan laporan ini.</td></tr></tbody>
    </table>

    <h2>12. Audit Requirements</h2>
    <p>Rekam jejak akses (View Log) dapat ditambahkan di log aplikasi untuk melacak siapa yang melihat data rahasia HPP.</p>

    <h2>13. Acceptance Criteria (AC)</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody><tr><th class="border px-2 py-1 bg-gray-100">AC-01</th><td class="border px-2 py-1">Laporan berhasil menyajikan rincian pergerakan nilai secara akurat tanpa meleset walau 1 desimal.</td></tr></tbody>
    </table>

    <h2>14. Dependencies</h2>
    <table class="min-w-full bg-white text-left border-collapse text-sm mb-4">
        <tbody>
            <tr><th class="border px-2 py-1 bg-gray-100">BRD-056</th><td class="border px-2 py-1">Material Price Change (MR21)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">BRD-064</th><td class="border px-2 py-1">AP Invoice (PPV)</td></tr>
            <tr><th class="border px-2 py-1 bg-gray-100">BRD-051</th><td class="border px-2 py-1">Goods Receipt</td></tr>
        </tbody>
    </table>
</div>',
                'created_at' => '2026-07-22 02:45:07',
                'updated_at' => '2026-07-22 02:45:07',
            ),
            100 => 
            array (
                'id' => 163,
                'brd_code' => 'BRD-101',
            'title' => 'Laporan Laba Rugi (Profit & Loss)',
                'project_id' => 1,
                'status' => 'Under Review',
                'content' => '<h2>1. Deskripsi Laporan</h2><p>Laporan yang menyajikan Laba dan Rugi perusahaan pada periode tertentu.</p>',
                'created_at' => '2026-07-24 17:31:01',
                'updated_at' => '2026-07-24 18:33:58',
            ),
        ));
        
        
    }
}