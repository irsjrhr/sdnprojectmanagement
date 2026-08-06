<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ErdsTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {


    \DB::table('erds')->delete();

    \DB::table('erds')->insert(array(
      0 =>
        array(
          'id' => 19,
          'code' => 'ERD 00',
          'title' => 'DMS Application (Overview)',
          'description' => 'High-Level Architecture for the Distribution Management System.',
          'content' => '<h1>ERD - Distribution Management System</h1>
<p>Dokumen ini merangkum rancangan struktur database untuk ekosistem Distribution Management System (DMS), yang diadaptasi penuh dari Blueprint Sales &amp; Distribution (SD) perusahaan tingkat <em>Enterprise</em>.</p>
<p>Desain ini menggunakan standar penamaan (naming convention) Arxino yang bersih, berfokus pada fitur inti operasional, dan dirancang khusus agar terarah, tanpa membebani sistem dengan kolom-kolom teknis yang terlalu kompleks atau tidak relevan.</p>
<h2>Proposed Changes</h2>
<p>Berikut adalah definisi tabel dan relasi yang akan dibangun:</p>
<h3>1. Enterprise Structure (Struktur Organisasi Penjualan)</h3>
<p>Struktur ini digunakan untuk mengelompokkan wilayah operasional dan saluran distribusi secara terstruktur.</p>
<h4>[NEW] Table: <code>companies</code></h4>
<p>Menyimpan data entitas hukum (holding / parent).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>npwp</code> (VARCHAR) - Nomor Pokok Wajib Pajak Perusahaan</li>
<li><code>pkp_name</code> (VARCHAR) - Nama Pengusaha Kena Pajak (Bisa berbeda dengan nama komersil)</li>
<li><code>address</code> (TEXT) - Alamat terdaftar pajak/perusahaan</li>
<li><code>local_currency_id</code> (BIGINT, FK) - Mata Uang Perusahaan (Company Code Currency, misal: IDR)</li>
</ul>

<h4>[NEW] Table: <code>sales_organizations</code></h4>
<p>Entitas operasional penjualan di bawah perusahaan.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>company_id</code> (BIGINT, FK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>distribution_channels</code></h4>
<p>Jalur penjualan, contoh: B2B/Project, B2C/Retail.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>brands</code></h4>
<p>Kategori lini bisnis atau brand produk.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>branches</code> (Evolusi dari branches)</h4>
<p>Pusat gravitasi operasional cabang. Berfungsi ganda sebagai Sales Office (SD), Plant (MM), dan Profit Center (FI).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>business_area_id</code> (BIGINT, FK) - Relasi area bisnis (Konsolidasi laporan)</li>
<li><code>company_id</code> (BIGINT, FK)</li>
<li><code>default_branch_id</code> (BIGINT, FK, Nullable) - Gudang operasional default</li>
<li><code>default_currency_id</code> (BIGINT, FK) - Transaksi tunai cabang</li>
<li><code>profit_center</code> (VARCHAR, Nullable) - Kode profit center FI</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>address</code> (TEXT)</li>
<li><code>timezone</code> (VARCHAR) - Misal: Asia/Jakarta</li>
<li><code>manager_id</code> (BIGINT, FK, Nullable → users)</li>
<li><code>status</code> (VARCHAR) - ACTIVE, ARCHIVED</li>
</ul>

<h4>[NEW] Table: <code>warehouses</code></h4>
<p>Master Gudang fisik, bernaung mutlak di bawah Branch.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK → branches) - Menggantikan branch_id</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>type</code> (VARCHAR) - UTAMA, TRANSIT, RETURN, QC</li>
<li><code>address</code> (TEXT)</li>
</ul>
<h4>[NEW] Table: <code>storage_locations</code></h4>
<p>Lokasi penyimpanan spesifik di dalam gudang (Setara SLOC di SAP).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK)</li>
<li><code>code</code> (VARCHAR) - Misal: SL01 (Good Stock), SL02 (Bad Stock)</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>bins</code></h4>
<p>Lokasi rak spesifik (Bin) di dalam Storage Location.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>storage_location_id</code> (BIGINT, FK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR) - Misal: Rak A1, Rak B2</li>
</ul>
<h4>[NEW] Table: <code>sales_employees</code></h4>
<p>Master data untuk tenaga penjual (Salesman / Sales Representative).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK)</li>
<li><code>code</code> (VARCHAR) - NIK / Sales Code</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>visit_routes</code></h4>
<p>Master data rute kunjungan (Journey Plan / Beat Plan) untuk Salesman.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>sales_employee_id</code> (BIGINT, FK) - Salesman penanggung jawab rute ini</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR) - Misal: Rute Senin - Pasar Pagi</li>
<li><code>day_of_week</code> (INT, Nullable) - Hari kunjungan (1=Senin, 7=Minggu)</li>
</ul>
<hr />
<h3>2. Customer &amp; Master Data (Manajemen Pelanggan)</h3>
<p>Data pelanggan yang tersentralisasi dan dapat diakses oleh seluruh Sales Office.</p>
<h4>[NEW] Table: <code>customer_groups</code></h4>
<p>Master data untuk level klasifikasi pelanggan. Level 0 (Kategori Umum Independen), Level 1 (Industry), Level 2 (Sub-Industry), Level 3 (Region/Class), Level 4 (Pricing Group).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>level</code> (INT) - 0, 1, 2, 3, 4</li>
</ul>
<h4>[NEW] Table: <code>customer_hierarchies</code></h4>
<p>Master data konfigurasi hierarki untuk validasi saat user membuat pelanggan baru.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>customer_group_1_id</code> (BIGINT, FK)</li>
<li><code>customer_group_2_id</code> (BIGINT, FK)</li>
<li><code>customer_group_3_id</code> (BIGINT, FK)</li>
<li><code>customer_group_4_id</code> (BIGINT, FK)</li>
</ul>
<h4>[NEW] Table: <code>transportation_zones</code></h4>
<p>Master data zona wilayah untuk membantu penentuan ongkos kirim dan rute logistik.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>customers</code> (General Data)</h4>
<p>Master data dasar pelanggan lintas organisasi (General Data View).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>customer_code</code> (VARCHAR) - Running Number internal (Ditentukan oleh Account Group)</li>
<li><code>old_customer_code</code> (VARCHAR, Nullable) - Mapping legacy</li>
<li><code>account_group</code> (VARCHAR) - DOMESTIC, EXPORT, CPD, EMPLOYEE (Pengunci Number Range)</li>
<li><code>status</code> (VARCHAR) - ACTIVE, INACTIVE, PROSPECT, ARCHIVED</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>customer_group_0_id</code> (BIGINT, FK) - Kategori Umum (Independen)</li>
<li><code>customer_group_1_id</code> (BIGINT, FK)</li>
<li><code>customer_group_2_id</code> (BIGINT, FK)</li>
<li><code>customer_group_3_id</code> (BIGINT, FK)</li>
<li><code>customer_group_4_id</code> (BIGINT, FK) - Pricing Group</li>
<li><code>transportation_zone_id</code> (BIGINT, FK)</li>
<li><code>risk_category</code> (VARCHAR) - High, Medium, Low</li>
<li><code>search_term_1</code> (VARCHAR, Nullable) - Kata kunci pencarian utama</li>
<li><code>search_term_2</code> (VARCHAR, Nullable) - Kata kunci pencarian sekunder</li>
<li><code>address</code> (TEXT) - Nama Jalan / Nomor Rumah</li>
<li><code>district</code> (VARCHAR, Nullable) - Kecamatan</li>
<li><code>city</code> (VARCHAR, Nullable) - Kota / Kabupaten</li>
<li><code>postal_code</code> (VARCHAR, Nullable) - Kode Pos</li>
<li><code>region</code> (VARCHAR, Nullable) - Provinsi (Region)</li>
<li><code>country</code> (VARCHAR, Nullable) - Negara</li>
<li><code>latitude</code> (DECIMAL(10,8), Nullable) - Titik kordinat GPS</li>
<li><code>longitude</code> (DECIMAL(11,8), Nullable) - Titik kordinat GPS</li>
<li><code>phone</code> (VARCHAR, Nullable) - Nomor Telepon</li>
<li><code>email</code> (VARCHAR, Nullable) - Email Utama</li>
<li><code>npwp</code> (VARCHAR, Nullable) - Nomor Pokok Wajib Pajak</li>
<li><code>pkp_name</code> (VARCHAR, Nullable) - Nama NPWP/PKP</li>
<li><code>tax_classification</code> (INT, Nullable) - Klasifikasi Pajak (Misal: 0=Bebas Pajak, 1=Kena Pajak PPN)</li>
<li><code>nik_ktp</code> (VARCHAR, Nullable) - NIK / Nomor KTP</li>
<li><code>incoterm</code> (VARCHAR, Nullable) - Default metode pengiriman (Misal: DELIVERED / PICKUP)</li>
<li><code>delivery_priority</code> (INT, Nullable) - Prioritas pengiriman (Misal: 1=High, 2=Normal)</li>
<li><code>visit_route_id</code> (BIGINT, FK, Nullable) - Terikat ke rute kunjungan (Jadwal visit Salesman)</li>
</ul>

<h4>[NEW] Table: <code>customer_companies</code> (Company Code Data)</h4>
<p>Pengaturan valuasi dan parameter akuntansi spesifik per Perusahaan (Company Code). Di sinilah limit kredit bersarang.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>customer_id</code> (BIGINT, FK)</li>
<li><code>company_id</code> (BIGINT, FK)</li>
<li><code>recon_account_id</code> (BIGINT, FK) - Akun Piutang (Reconciliation Account / Terhubung ke tabel coas)</li>
<li><code>payment_term_days</code> (INT) - Termin pembayaran default untuk tagihan di perusahaan ini</li>
<li><code>credit_limit</code> (DECIMAL) - Fasilitas batas maksimal hutang + exposure</li>
<li><code>posting_block</code> (BOOLEAN) - Membekukan kemampuan input Jurnal/Invoice ke entitas ini</li>
</ul>

<h4>[NEW] Table: <code>customer_sales_areas</code> (Sales Area Data)</h4>
<p>Pemetaan pelanggan ke area operasional penjualan spesifik. Mendukung blokir granular.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>customer_id</code> (BIGINT, FK)</li>
<li><code>sales_area_id</code> (BIGINT, FK) - Relasi tunggal ke Sales Area (Org+Dist Channel+Brand)</li>
<li><code>branch_id</code> (BIGINT, FK) - Default cabang yang menangani</li>
<li><code>pricing_group_id</code> (BIGINT, FK, Nullable) - Referensi penarik diskon harga</li>
<li><code>order_block</code> (BOOLEAN) - Cegah pembuatan SO baru</li>
<li><code>delivery_block</code> (BOOLEAN) - Cegah pencetakan Surat Jalan/DO</li>
<li><code>billing_block</code> (BOOLEAN) - Cegah pembuatan Faktur Tagihan</li>
</ul>
<h4>[NEW] Table: <code>customer_partner_functions</code></h4>
<p>Fungsi mitra bisnis untuk pelanggan (Sold-to, Ship-to, Bill-to, Payer).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>customer_id</code> (BIGINT, FK) - Pelanggan utama (Sold-To)</li>
<li><code>sales_area_id</code> (BIGINT, FK)</li>
<li><code>partner_function</code> (VARCHAR) - SH (Ship-To), BP (Bill-To), PY (Payer)</li>
<li><code>partner_customer_id</code> (BIGINT, FK) - Pelanggan tujuan/relasi</li>
</ul>
<h4>[NEW] Table: <code>customer_banks</code></h4>
<p>Data rekening bank pelanggan untuk pencocokan transfer masuk.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>customer_id</code> (BIGINT, FK)</li>
<li><code>bank_name</code> (VARCHAR)</li>
<li><code>account_number</code> (VARCHAR)</li>
<li><code>account_name</code> (VARCHAR)</li>
<li><code>is_primary</code> (BOOLEAN)</li>
</ul>
<hr />
<h3>3. Product &amp; Inventory Master (Manajemen Barang)</h3>
<p>Arsitektur terpusat dan terdistribusi untuk manajemen barang (Material Master) berbasis <em>Organizational Views</em> dan <em>Assignments</em>.</p>

<h4>[NEW] Table: <code>material_groups</code></h4>
<p>Kategori/kelompok barang (Material Group). Mendukung hingga 4 level spesifikasi untuk hierarki, serta level 0 untuk kategori independen.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>level</code> (INT) - Kedalaman Level (0, 1, 2, 3, atau 4)</li>
    <li><code>code</code> (VARCHAR)</li>
    <li><code>name</code> (VARCHAR)</li>
</ul>

<h4>[NEW] Table: <code>material_hierarchies</code></h4>
<p>Master data konfigurasi hierarki untuk validasi saat pembuatan Master Barang.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_group_1_id</code> (BIGINT, FK)</li>
    <li><code>material_group_2_id</code> (BIGINT, FK)</li>
    <li><code>material_group_3_id</code> (BIGINT, FK)</li>
    <li><code>material_group_4_id</code> (BIGINT, FK)</li>
</ul>

<h4>[NEW] Table: <code>materials</code> (General Data View)</h4>
<p>Data dasar barang yang bersifat global/terpusat.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_group_0_id</code> (BIGINT, FK, Nullable) - Kategori Umum</li>
    <li><code>material_group_1_id</code> (BIGINT, FK, Nullable)</li>
    <li><code>material_group_2_id</code> (BIGINT, FK, Nullable)</li>
    <li><code>material_group_3_id</code> (BIGINT, FK, Nullable)</li>
    <li><code>material_group_4_id</code> (BIGINT, FK, Nullable)</li>
    <li><code>brand_id</code> (BIGINT, FK, Nullable)</li>
    <li><code>material_code</code> (VARCHAR) - Material Number / Kode Global</li>
    <li><code>barcode</code> (VARCHAR, Nullable) - EAN/UPC</li>
    <li><code>hscode</code> (VARCHAR, Nullable) - Harmonized System Code</li>
    <li><code>description</code> (VARCHAR) - Nama Barang</li>
    <li><code>base_uom_id</code> (BIGINT, FK) - Relasi ke master <code>uoms</code></li>
    <li><code>weight</code> (DECIMAL, Nullable) - Berat kotor berdasarkan Base UoM</li>
    <li><code>volume</code> (DECIMAL, Nullable) - Volume berdasarkan Base UoM</li>
    <li><code>material_type_id</code> (BIGINT, FK) - (TRAD, NTRD, SERV)</li>
    <li><code>status</code> (VARCHAR) - ACTIVE, INACTIVE, OBSOLETE</li>
</ul>

<h4>[NEW] Table: <code>base_uoms</code></h4>
<p>Master data daftar satuan pengkuran (Misal: PCS, PAK, KAR untuk Karton).</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>code</code> (VARCHAR)</li>
    <li><code>name</code> (VARCHAR)</li>
</ul>

<h4>[NEW] Table: <code>material_uom_conversions</code></h4>
<p>Daftar konversi satuan per material.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_id</code> (BIGINT, FK)</li>
    <li><code>alt_uom_id</code> (BIGINT, FK) - Satuan Alternatif</li>
    <li><code>alt_qty</code> (DECIMAL) - Kuantitas Alternatif UoM</li>
    <li><code>base_uom_id</code> (BIGINT, FK) - Satuan Dasar</li>
    <li><code>base_qty</code> (DECIMAL) - Kuantitas Base UoM</li>
</ul>

<h4>[NEW] Table: <code>material_branches</code> (Inventory &amp; MRP View)</h4>
<p>Pengaturan material spesifik per Plant/Gudang.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_id</code> (BIGINT, FK)</li>
    <li><code>plant_id</code> (BIGINT, FK)</li>
    <li><code>mrp_type</code> (VARCHAR) - (Misal: PD = MRP, ND = No Planning)</li>
    <li><code>safety_stock</code> (DECIMAL) - Stok aman minimal di plant ini</li>
    <li><code>reorder_point</code> (DECIMAL) - Titik pemesanan ulang otomatis</li>
    <li><code>default_branch_id</code> (BIGINT, FK, Nullable)</li>
    <li><code>is_batch_managed</code> (BOOLEAN)</li>
    <li><code>is_serial_managed</code> (BOOLEAN)</li>
    <li><code>shelf_life_days</code> (INT, Nullable)</li>
</ul>

<h4>[NEW] Table: <code>material_companies</code> (Accounting View)</h4>
<p>Pengaturan valuasi dan akuntansi per Perusahaan (Company Code).</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_id</code> (BIGINT, FK)</li>
    <li><code>company_id</code> (BIGINT, FK)</li>
    <li><code>valuation_class</code> (VARCHAR) - Klasifikasi integrasi GL Account</li>
    <li><code>costing_method</code> (VARCHAR) - STANDARD, MOVING_AVERAGE</li>
    <li><code>standard_cost</code> (DECIMAL) - HPP Standar / MAP Saat ini</li>
    <li><code>inventory_account_id</code> (BIGINT, FK, Nullable)</li>
    <li><code>cogs_account_id</code> (BIGINT, FK, Nullable)</li>
</ul>

<h4>[NEW] Table: <code>material_sales_orgs</code> (Sales View)</h4>
<p>Pengaturan penjualan per Sales Organization.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_id</code> (BIGINT, FK)</li>
    <li><code>sales_organization_id</code> (BIGINT, FK)</li>
    <li><code>sales_uom_id</code> (BIGINT, FK, Nullable) - Default satuan jual</li>
    <li><code>tax_group_id</code> (BIGINT, FK, Nullable) - Kelompok pajak (PPN)</li>
    <li><code>pricing_group_id</code> (BIGINT, FK, Nullable) - Grup pricing/diskon</li>
    <li><code>is_blocked_sell</code> (BOOLEAN)</li>
</ul>

<h4>[NEW] Table: <code>material_purchasing_orgs</code> (Purchasing View)</h4>
<p>Pengaturan pembelian per Purchasing Organization.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_id</code> (BIGINT, FK)</li>
    <li><code>purchasing_organization_id</code> (BIGINT, FK)</li>
    <li><code>purchase_uom_id</code> (BIGINT, FK, Nullable) - Default satuan beli</li>
    <li><code>preferred_vendor_id</code> (BIGINT, FK, Nullable)</li>
    <li><code>lead_time_days</code> (INT, Nullable)</li>
    <li><code>moq</code> (DECIMAL, Nullable)</li>
    <li><code>is_blocked_buy</code> (BOOLEAN)</li>
</ul>

<h4>[NEW] Table: <code>batches</code></h4>
<p>Master data Batch/Lot Number.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_id</code> (BIGINT, FK)</li>
    <li><code>batch_number</code> (VARCHAR) - Nomor Lot/Batch</li>
    <li><code>production_date</code> (DATE, Nullable) - Tanggal Produksi</li>
    <li><code>expiration_date</code> (DATE, Nullable) - Tanggal Kedaluwarsa (Expired Date)</li>
    <li><code>is_restricted</code> (BOOLEAN) - Status block (Misal: Karantina)</li>
</ul>

<h4>[NEW] Table: <code>serial_numbers</code></h4>
<p>Master data identitas tunggal untuk pelacakan fisik barang per unit.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_id</code> (BIGINT, FK)</li>
    <li><code>batch_id</code> (BIGINT, FK, Nullable) - Jika material menggunakan *batch* dan *serial* bersamaan.</li>
    <li><code>branch_id</code> (BIGINT, FK) - Posisi fisik serial saat ini.</li>
    <li><code>serial_number</code> (VARCHAR) - Identitas unik (Misal: IMEI, VIN).</li>
    <li><code>status</code> (VARCHAR) - AVAILABLE, ISSUED, IN_TRANSIT.</li>
    <li><code>is_restricted</code> (BOOLEAN) - Status blokir individual.</li>
    <li><code>last_movement_id</code> (BIGINT, Nullable) - Referensi transaksi terakhir.</li>
</ul>

<h4>[NEW] Table: <code>price_change_documents</code></h4>
<p>Header Dokumen Perubahan Harga Material (Setara MR21 di SAP).</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>document_number</code> (VARCHAR)</li>
    <li><code>posting_date</code> (DATE)</li>
    <li><code>reason</code> (TEXT, Nullable)</li>
    <li><code>status</code> (VARCHAR) - DRAFT, POSTED, CANCELED</li>
</ul>

<h4>[NEW] Table: <code>price_change_lines</code></h4>
<p>Detail perubahan harga per material (Saat POST, selisih harga dikali kuantitas stok memicu Jurnal Revaluasi Stok).</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>price_change_document_id</code> (BIGINT, FK)</li>
    <li><code>material_id</code> (BIGINT, FK)</li>
    <li><code>company_id</code> (BIGINT, FK) - Karena harga melekat di Company</li>
    <li><code>old_price</code> (DECIMAL)</li>
    <li><code>new_price</code> (DECIMAL)</li>
    <li><code>qty_on_hand</code> (DECIMAL)</li>
    <li><code>revaluation_amount</code> (DECIMAL)</li>
</ul>

<h4>[NEW] Table: <code>material_price_ledgers</code></h4>
<p>Kartu Analisis Harga Material per Periode (Setara Material Ledger / CKM3N).</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>material_id</code> (BIGINT, FK)</li>
    <li><code>company_id</code> (BIGINT, FK)</li>
    <li><code>period</code> (VARCHAR) - Format YYYY-MM (Misal: 2026-07)</li>
    <li><code>opening_qty</code> (DECIMAL)</li>
    <li><code>opening_value</code> (DECIMAL)</li>
    <li><code>receipt_qty</code> (DECIMAL)</li>
    <li><code>receipt_value</code> (DECIMAL)</li>
    <li><code>issue_qty</code> (DECIMAL)</li>
    <li><code>issue_value</code> (DECIMAL)</li>
    <li><code>closing_qty</code> (DECIMAL)</li>
    <li><code>closing_value</code> (DECIMAL)</li>
    <li><code>periodic_unit_price</code> (DECIMAL) - HPP Aktual (Actual Cost)</li>
</ul>
<hr />
<h3>3.5. Pricing Engine (Teknik Kondisi Harga)</h3>
<p>Arsitektur penentuan harga yang fleksibel (Condition Technique) untuk menghitung Base Price, Diskon Berjenjang, Ongkos Kirim, dan Pajak.</p>
<h4>[NEW] Table: <code>pricing_procedures</code></h4>
<p>Skema kalkulasi harga.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>type</code> (VARCHAR) - V untuk Sales, M untuk Purchasing</li>
<li><code>code</code> (VARCHAR) - Misal: ZSTD01 (Standard Pricing)</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>vendor_schema_groups</code></h4>
<p>Master grup skema untuk vendor (Menentukan prosedur harga mana yang dipakai untuk vendor ini).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR) - Misal: 01 (Standard), 02 (Import)</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>purchasing_schema_groups</code></h4>
<p>Master grup skema untuk organisasi pengadaan.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>purchase_pricing_determinations</code></h4>
<p>Matriks penentuan otomatis prosedur harga pembelian.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>purchasing_schema_group_id</code> (BIGINT, FK)</li>
<li><code>vendor_schema_group_id</code> (BIGINT, FK, Nullable)</li>
<li><code>pricing_procedure_id</code> (BIGINT, FK) - Prosedur harga yang akan dieksekusi (Type M)</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>
<h4>[NEW] Table: <code>pricing_procedure_steps</code></h4>
<p>Urutan perhitungan dalam skema harga.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>pricing_procedure_id</code> (BIGINT, FK)</li>
<li><code>step_number</code> (INT) - Urutan perhitungan (Misal: 10, 20, 30)</li>
<li><code>condition_type_id</code> (BIGINT, FK, Nullable) - Jika step ini menarik kondisi (Misal: PR00)</li>
<li><code>calculation_type</code> (VARCHAR) - BASE_PRICE, DISCOUNT, SUBTOTAL, TAX, FREIGHT</li>
<li><code>from_step</code> (INT, Nullable) - Basis awal persentase dihitung dari step mana</li>
<li><code>to_step</code> (INT, Nullable) - Basis akhir persentase (Mendukung Subtotal Cascading Range)</li>
<li><code>is_statistical</code> (BOOLEAN) - Penanda kondisi hanya bersifat informatif (Misal: VPRS Cost Margin)</li>
<li><code>account_key</code> (VARCHAR, Nullable) - Routing jurnal akuntansi (Misal: ERL, ERS, MWS)</li>
</ul>
<h4>[NEW] Table: <code>access_sequences</code></h4>
<p>Induk strategi pencarian harga.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR) - Misal: PR02</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>
<h4>[NEW] Table: <code>access_sequence_steps</code></h4>
<p>Langkah pencarian dalam sebuah strategi Access Sequence.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>access_sequence_id</code> (BIGINT, FK)</li>
<li><code>step_number</code> (INT) - Urutan pencarian (Misal: 10, 20)</li>
<li><code>condition_table_id</code> (BIGINT, FK)</li>
</ul>
<h4>[NEW] Table: <code>condition_tables</code></h4>
<p>Tabel metadata kombinasi pencarian kondisi.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR) - Misal: T001</li>
<li><code>name</code> (VARCHAR) - Deskripsi tabel, misal SalesOrg/Customer</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>
<h4>[NEW] Table: <code>condition_table_fields</code></h4>
<p>Metadata field yang wajib diisi pada saat record harga disimpan.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>condition_table_id</code> (BIGINT, FK)</li>
<li><code>field_name</code> (VARCHAR) - Nama kolom di condition_records (Misal: customer_id)</li>
</ul>
<h4>[NEW] Table: <code>condition_types</code></h4>
<p>Jenis kondisi harga.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR) - Kode kondisi</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>category</code> (VARCHAR) - PRICE, DISCOUNT, SURCHARGE, TAX, FREIGHT, ROUNDING_DIFF</li>
<li><code>value_type</code> (VARCHAR) - PERCENTAGE, FIXED_AMOUNT</li>
<li><code>plus_minus</code> (VARCHAR) - POSITIVE, NEGATIVE, BOTH (Misal untuk ROUNDING_DIFF)</li>
<li><code>is_manual</code> (BOOLEAN) - Flag izin modifikasi nilai secara manual oleh User (Override)</li>
<li><code>manual_min_limit</code> (DECIMAL, Nullable) - Batas minimum (Misal untuk ROUNDING_DIFF -5000)</li>
<li><code>manual_max_limit</code> (DECIMAL, Nullable) - Batas maksimum (Misal untuk ROUNDING_DIFF 5000)</li>
<li><code>is_mandatory</code> (BOOLEAN) - Syarat wajib kondisi harus ada (Misal: Base Price PR00)</li>
<li><code>is_group_condition</code> (BOOLEAN) - Kalkulasi kondisi secara agregat (Total Dokumen)</li>
<li><code>scale_basis</code> (VARCHAR, Nullable) - Penentu pencarian skala harga (Quantity / Value / Weight)</li>
<li><code>exclusion_group</code> (VARCHAR, Nullable) - Penanda Condition Exclusion Group untuk menyingkirkan overlap diskon</li>
<li><code>access_sequence_id</code> (BIGINT, FK, Nullable) - Strategi pencarian otomatis (Jika null, harga manual)</li>
</ul>
<h4>[NEW] Table: <code>condition_records</code></h4>
<p>Master data nilai harga dan diskon.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>condition_type_id</code> (BIGINT, FK) - Relasi ke tabel master jenis kondisi</li>
<li><code>condition_table_id</code> (BIGINT, FK, Nullable) - Dibuat berdasarkan aturan tabel kondisi mana</li>
<li><code>sales_organization_id</code> (BIGINT, FK, Nullable)</li>
<li><code>distribution_channel_id</code> (BIGINT, FK, Nullable)</li>
<li><code>customer_id</code> (BIGINT, FK, Nullable)</li>
<li><code>customer_group_4_id</code> (BIGINT, FK, Nullable) - Pricing Group</li>
<li><code>material_id</code> (BIGINT, FK, Nullable)</li>
<li><code>amount_or_percent</code> (DECIMAL) - Nominal Harga atau % Diskon</li>
<li><code>valid_from</code> (DATE) - Tanggal mulai berlaku</li>
<li><code>valid_to</code> (DATE) - Tanggal akhir berlaku</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>
<hr />
<h3>4. Order Management (Pesanan Penjualan)</h3>
<h4>[NEW] Table: <code>sales_orders</code></h4>
<p>Header dari transaksi penjualan.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK)</li>
<li><code>customer_id</code> (BIGINT, FK)</li>
<li><code>document_type_id</code> (BIGINT, FK) - Menggantikan order_type hardcoded, terhubung ke master tipe dokumen</li>
<li><code>so_number</code> (VARCHAR) - Dihasilkan (generate) dari Number Range tipe dokumen</li>
<li><code>reference_invoice_id</code> (BIGINT, FK, Nullable) - Jika ini adalah Retur, merujuk ke faktur mana</li>
<li><code>incoterm</code> (VARCHAR) - Metode pengiriman untuk pesanan ini (Misal: DELIVERED / PICKUP)</li>
<li><code>delivery_route_id</code> (BIGINT, FK, Nullable) - Rute pengiriman logistik (Ditentukan saat SO dibuat)</li>
<li><code>term_of_payment</code> (INT) - Termin pembayaran dalam hari (TOP) untuk pesanan ini</li>
<li><code>delivery_priority</code> (INT) - Prioritas pemenuhan stok pesanan ini (Turunan dari master pelanggan)</li>
<li><code>notes</code> (TEXT, Nullable) - Catatan khusus pesanan (Header Text)</li>
<li><code>order_date</code> (DATE)</li>
<li><code>total_amount</code> (DECIMAL)</li>
<li><code>tax_amount</code> (DECIMAL) - Total nilai pajak (Misal: PPN) untuk pesanan ini</li>
<li><code>status</code> (VARCHAR) - DRAFT, APPROVED, REJECTED, CLOSED, CANCELED</li>
<li><code>cancel_reason</code> (VARCHAR, Nullable) - Alasan jika dokumen dibatalkan</li>
<li><code>rejection_reason</code> (VARCHAR, Nullable) - Alasan penolakan pesanan (Header Level)</li>
<li><code>delivery_status</code> (VARCHAR) - NOT_DELIVERED, PARTIALLY_DELIVERED, FULLY_DELIVERED</li>
<li><code>billing_status</code> (VARCHAR) - NOT_INVOICED, PARTIALLY_INVOICED, FULLY_INVOICED</li>

</ul>
<h4>[NEW] Table: <code>sales_order_lines</code></h4>
<p>Detail barang dalam suatu pesanan.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>sales_order_id</code> (BIGINT, FK)</li>
<li><code>material_id</code> (BIGINT, FK)</li>
<li><code>reference_invoice_line_id</code> (BIGINT, FK, Nullable) - Baris faktur asli yang diretur</li>
<li><code>is_rejected</code> (BOOLEAN) - Flag penolakan spesifik untuk baris ini</li>
<li><code>rejection_reason</code> (VARCHAR, Nullable) - Alasan penolakan (Item Level)</li>
<li><code>delivery_status</code> (VARCHAR) - NOT_DELIVERED, PARTIALLY_DELIVERED, FULLY_DELIVERED</li>
<li><code>billing_status</code> (VARCHAR) - NOT_INVOICED, PARTIALLY_INVOICED, FULLY_INVOICED</li>

<li><code>qty</code> (DECIMAL) - Kuantitas yang dipesan (Order Qty)</li>
<li><code>confirmed_qty</code> (DECIMAL) - Kuantitas yang berhasil dialokasikan/disetujui (Confirmed Qty)</li>
<li><code>unit_price</code> (DECIMAL)</li>
<li><code>discount_amount</code> (DECIMAL)</li>
<li><code>subtotal</code> (DECIMAL)</li>
</ul>
<h4>[NEW] Table: <code>sales_order_conditions</code></h4>
<p>Detail perhitungan kondisi harga (Base Price, Diskon, Pajak) per baris pesanan (Snapshot dari Pricing Engine).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>sales_order_line_id</code> (BIGINT, FK)</li>
<li><code>pricing_procedure_step_id</code> (BIGINT, FK) - Referensi ke langkah skema harga</li>
<li><code>condition_type_id</code> (BIGINT, FK) - Referensi ke jenis kondisi</li>
<li><code>calculation_type</code> (VARCHAR) - PRICE, DISCOUNT, SURCHARGE, TAX</li>
<li><code>amount</code> (DECIMAL) - Nilai kondisi untuk baris ini</li>
</ul>
<h3>5. Delivery &amp; Logistics (Pengiriman)</h3>
<h4>[NEW] Table: <code>shipping_points</code></h4>
<p>Titik/lokasi keberangkatan pengiriman barang.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>delivery_routes</code></h4>
<p>Master data rute pengiriman ekspedisi logistik truk.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR) - Misal: Rute Pengiriman Logistik Utara</li>
</ul>
<h4>[NEW] Table: <code>vehicles</code></h4>
<p>Master armada/kendaraan operasional pengiriman.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK)</li>
<li><code>license_plate</code> (VARCHAR) - Nomor Polisi</li>
<li><code>vehicle_type</code> (VARCHAR) - Misal: Engkel, Box, Blind Van</li>
<li><code>capacity_weight</code> (DECIMAL)</li>
<li><code>capacity_volume</code> (DECIMAL)</li>
</ul>
<h4>[NEW] Table: <code>drivers</code></h4>
<p>Master data supir ekspedisi internal.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK)</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>phone</code> (VARCHAR)</li>
<li><code>license_number</code> (VARCHAR) - SIM</li>
</ul>
<h4>[NEW] Table: <code>delivery_orders</code></h4>
<p>Header Surat Jalan / Outbound Delivery. Menyimpan informasi pengiriman barang penjualan (O2C).</p>
<ul>
<li><code>id</code> (BIGINT, PK) - Auto-increment primary key</li>
<li><code>delivery_number</code> (VARCHAR, UNIQUE) - Nomor dokumen pengiriman unik</li>
<li><code>sales_order_id</code> (BIGINT, FK &rarr; sales_orders) - Referensi sales order induk</li>
<li><code>branch_id</code> (BIGINT, FK &rarr; branches) - Kode cabang pengirim</li>
<li><code>customer_id</code> (BIGINT, FK &rarr; customers) - Pelanggan penerima</li>
<li><code>delivery_date</code> (DATE) - Rencana tanggal pengiriman fisik</li>
<li><code>document_date</code> (DATE) - Tanggal dokumen dibuat</li>
<li><code>status</code> (VARCHAR) - DRAFT, READY_TO_SHIP, GOODS_ISSUED, DELIVERED, CANCELLED</li>
<li><code>shipping_address</code> (TEXT) - Alamat lengkap pengiriman barang</li>
<li><code>transporter_id</code> (BIGINT, FK, Nullable) - Ekspedisi pihak ketiga</li>
<li><code>vehicle_id</code> (BIGINT, FK, Nullable &rarr; vehicles) - Armada pengantar</li>
<li><code>driver_id</code> (BIGINT, FK, Nullable &rarr; drivers) - Supir pengantar</li>
<li><code>created_by</code> (BIGINT, FK &rarr; users) - Pembuat dokumen</li>
<li><code>approved_by</code> (BIGINT, FK, Nullable &rarr; users) - Kepala gudang penyetujui</li>
<li><code>created_at</code> / <code>updated_at</code> (TIMESTAMP) - Audit trail timestamps</li>
</ul>
<h4>[NEW] Table: <code>delivery_order_lines</code></h4>
<p>Detail barang yang dikirim dalam satu Outbound Delivery.</p>
<ul>
<li><code>id</code> (BIGINT, PK) - Auto-increment primary key</li>
<li><code>delivery_order_id</code> (BIGINT, FK &rarr; delivery_orders) - Relasi induk Surat Jalan</li>
<li><code>sales_order_line_id</code> (BIGINT, FK &rarr; sales_order_lines) - Relasi baris SO induk</li>
<li><code>item_id</code> (BIGINT, FK &rarr; items) - SKU barang dagangan</li>
<li><code>qty_delivered</code> (DECIMAL) - Kuantitas keluar gudang dikirim</li>
<li><code>qty_confirmed</code> (DECIMAL, Nullable) - Kuantitas terkonfirmasi diterima pelanggan (POD)</li>
<li><code>base_uom_id</code> (BIGINT, FK &rarr; base_uoms) - UOM dasar barang</li>
<li><code>batch_id</code> (BIGINT, FK, Nullable &rarr; batches) - Alokasi batch persediaan fisik</li>
<li><code>storage_location_id</code> (BIGINT, FK &rarr; storage_locations) - Lokasi rak gudang asal</li>
<li><code>unit_cogs</code> (DECIMAL) - Nilai HPP barang terbeku saat Goods Issue</li>
</ul>ial_id memiliki is_batch_managed = true</li>
<li><code>qty_delivered</code> (DECIMAL)</li>
</ul>
<h3>6. Billing &amp; Invoicing (Faktur &amp; Tagihan)</h3>
<h4>[NEW] Table: <code>sales_invoices</code></h4>
<p>Header Faktur Penjualan / Tagihan.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK) - Cabang pemilik pendapatan/faktur ini</li>
<li><code>sales_order_id</code> (BIGINT, FK, Nullable)</li>
<li><code>delivery_order_id</code> (BIGINT, FK, Nullable)</li>
<li><code>customer_id</code> (BIGINT, FK) - Bill-to / Payer</li>
<li><code>document_type_id</code> (BIGINT, FK) - Terhubung ke master tipe dokumen tagihan (Invoice, Credit Memo, dll)</li>
<li><code>invoice_number</code> (VARCHAR) - Dihasilkan (generate) dari Number Range</li>
<li><code>reference_invoice_id</code> (BIGINT, FK, Nullable) - Referensi faktur asal jika ini adalah Credit Memo atau dokumen pembatalan</li>
<li><code>faktur_pajak_number</code> (VARCHAR, Nullable) - Nomor Seri Faktur Pajak (Diperoleh dari respons API Core Tax DJP)</li>
<li><code>is_tax_generated</code> (BOOLEAN) - Flag apakah tagihan ini sudah di-submit dan disahkan oleh Core Tax</li>
<li><code>faktur_pajak_date</code> (DATE, Nullable) - Tanggal pengesahan e-Faktur</li>
<li><code>term_of_payment</code> (INT) - Termin pembayaran dalam hari (TOP) yang mengikat tagihan ini</li>
<li><code>invoice_date</code> (DATE)</li>
<li><code>due_date</code> (DATE) - Tanggal jatuh tempo (Hasil kalkulasi invoice_date + term_of_payment)</li>
<li><code>notes</code> (TEXT, Nullable) - Catatan/Pesan di tagihan (Header Text)</li>
<li><code>total_amount</code> (DECIMAL)</li>
<li><code>tax_amount</code> (DECIMAL)</li>
<li><code>status</code> (VARCHAR) - UNPAID, PARTIAL, PAID, CANCELED</li>
<li><code>cancel_reason</code> (VARCHAR, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>sales_invoice_lines</code></h4>
<p>Detail barang yang ditagihkan.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>sales_invoice_id</code> (BIGINT, FK)</li>
<li><code>delivery_order_line_id</code> (BIGINT, FK)</li>
<li><code>material_id</code> (BIGINT, FK)</li>
<li><code>batch_id</code> (BIGINT, FK, Nullable) - Dicetak di tagihan fisik jika ada</li>
<li><code>qty_invoiced</code> (DECIMAL)</li>
<li><code>unit_price</code> (DECIMAL)</li>
<li><code>line_total</code> (DECIMAL)</li>
</ul>
<h4>[NEW] Table: <code>sales_invoice_conditions</code></h4>
<p>Detail perhitungan kondisi harga (Base Price, Diskon, Pajak) per baris tagihan (Snapshot dari Pricing Engine saat penagihan).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>sales_invoice_line_id</code> (BIGINT, FK)</li>
<li><code>pricing_procedure_step_id</code> (BIGINT, FK) - Referensi ke langkah skema harga</li>
<li><code>condition_type_id</code> (BIGINT, FK) - Referensi ke jenis kondisi</li>
<li><code>calculation_type</code> (VARCHAR) - PRICE, DISCOUNT, SURCHARGE, TAX</li>
<li><code>amount</code> (DECIMAL) - Nilai kondisi untuk baris ini</li>
</ul>
<h4>[NEW] Table: <code>customer_receipts</code></h4>
<p>Pembayaran Piutang dari Pelanggan (Incoming Payment / AR Receipt). (Setara F-28 di SAP, namun dibuatkan tabel <em>header</em> terpisah agar UI lebih rapi alih-alih murni Jurnal).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>customer_id</code> (BIGINT, FK)</li>
<li><code>house_bank_id</code> (BIGINT, FK) - Uang masuk ke rekening bank perusahaan yang mana</li>
<li><code>document_type_id</code> (BIGINT, FK)</li>
<li><code>receipt_number</code> (VARCHAR)</li>
<li><code>receipt_date</code> (DATE)</li>
<li><code>amount</code> (DECIMAL)</li>
<li><code>payment_method</code> (VARCHAR) - CASH, TRANSFER, GIRO, CHEQUE</li>
<li><code>reference_number</code> (VARCHAR, Nullable) - Nomor Bukti Transfer / Giro Pelanggan</li>
</ul>
<h4>[NEW] Table: <code>customer_receipt_lines</code></h4>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>customer_receipt_id</code> (BIGINT, FK)</li>
<li><code>sales_invoice_id</code> (BIGINT, FK) - Faktur yang dilunasi (Clearing)</li>
<li><code>amount_applied</code> (DECIMAL) - Nilai yang dialokasikan untuk melunasi faktur tersebut</li>
</ul>
<hr />
<h3>7. Procure to Pay (MM - Pembelian)</h3>
<p>Siklus pengadaan barang ke Pemasok (Vendor/Supplier).</p>
<h4>[NEW] Table: <code>suppliers</code></h4>
<p>Master data Pemasok.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR)</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>npwp</code> (VARCHAR, Nullable)</li>
<li><code>term_of_payment</code> (INT) - Default TOP (Hari)</li>
</ul>
<h4>[NEW] Table: <code>supplier_banks</code></h4>
<p>Data rekening bank Pemasok untuk tujuan transfer pembayaran.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>supplier_id</code> (BIGINT, FK)</li>
<li><code>bank_name</code> (VARCHAR)</li>
<li><code>account_number</code> (VARCHAR)</li>
<li><code>account_name</code> (VARCHAR)</li>
<li><code>is_primary</code> (BOOLEAN)</li>
</ul>
<h4>[NEW] Table: <code>purchase_requisitions</code></h4>
<p>Permintaan Pembelian (PR) dari departemen internal sebelum menjadi PO. Berbasis arsitektur Enterprise (Header level).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>document_type_id</code> (BIGINT, FK) - Tipe Dokumen PR (Misal: CapEx, Reguler)</li>
<li><code>branch_id</code> (BIGINT, FK) - Cabang/Lokasi fisik peminta</li>
<li><code>pr_number</code> (VARCHAR)</li>
<li><code>request_date</code> (DATE)</li>
<li><code>notes</code> (TEXT, Nullable) - Keterangan/Justifikasi Umum Header</li>
<li><code>status</code> (VARCHAR) - DRAFT, SUBMITTED, IN_APPROVAL, APPROVED, PARTIALLY_ORDERED, COMPLETED, CANCELED</li>
<li><code>created_by</code> (BIGINT, FK) - User pembuat dokumen</li>
<li><code>requester_name</code> (VARCHAR, Nullable) - Nama peminta aktual jika berbeda dengan user pembuat</li>
<li><code>approved_by</code> (BIGINT, FK, Nullable) - User yang menyetujui</li>
<li><code>approved_at</code> (TIMESTAMP, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>purchase_requisition_lines</code></h4>
<p>Detail baris PR yang sangat dinamis untuk mendukung skenario Material, Service, Expense, dan Asset (Multi-Account Assignment).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>purchase_requisition_id</code> (BIGINT, FK)</li>
<li><code>line_number</code> (INT) - Nomor urut baris (10, 20, 30...)</li>
<li><code>item_category</code> (VARCHAR) - Kategori pengadaan: MATERIAL, SERVICE, EXPENSE, ASSET</li>
<li><code>material_id</code> (BIGINT, FK, Nullable) - Null jika pengadaan free-text</li>
<li><code>material_group_id</code> (BIGINT, FK, Nullable) - Wajib untuk analitik jika material_id Null</li>
<li><code>short_text</code> (VARCHAR) - Deskripsi barang/jasa (Manual atau Otomatis)</li>
<li><code>qty_requested</code> (DECIMAL)</li>
<li><code>uom_id</code> (BIGINT, FK) - Satuan barang/jasa</li>
<li><code>required_date</code> (DATE) - Delivery Date yang diinginkan</li>
<li><code>estimated_price</code> (DECIMAL, Nullable) - Penilaian / Estimasi Harga per satuan</li>
<li><code>currency_id</code> (BIGINT, FK, Nullable) - Mata uang penilaian</li>
<li><code>recommended_vendor_id</code> (BIGINT, FK, Nullable) - Usulan vendor dari peminta</li>
<li><code>purchasing_group_id</code> (BIGINT, FK, Nullable) - Tim buyer yang akan memproses</li>
<li><code>cost_center_id</code> (BIGINT, FK, Nullable) - Alokasi pembebanan ke unit bisnis</li>
<li><code>fixed_asset_id</code> (BIGINT, FK, Nullable) - Alokasi pembebanan ke aset tetap (jika CapEx)</li>
<li><code>qty_ordered</code> (DECIMAL) - Kuantitas yang sudah terpesan (Tracking Fulfillment)</li>
<li><code>line_status</code> (VARCHAR) - Status individual baris (OPEN, CLOSED, CANCELED)</li>
<li><code>notes</code> (TEXT, Nullable) - Catatan spesifikasi teknis</li>
</ul>
<h4>[NEW] Table: <code>request_for_quotations</code></h4>
<p>Dokumen Header pengiriman undangan penawaran harga kepada satu atau lebih Pemasok.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>document_type_id</code> (BIGINT, FK) - Klasifikasi tipe RFQ</li>
<li><code>branch_id</code> (BIGINT, FK) - Cabang pembuat RFQ</li>
<li><code>rfq_number</code> (VARCHAR)</li>
<li><code>request_date</code> (DATE) - Tanggal rilis RFQ</li>
<li><code>deadline_date</code> (DATE) - Batas akhir penyerahan penawaran</li>
<li><code>notes</code> (TEXT, Nullable) - Catatan tambahan untuk semua vendor</li>
<li><code>purchasing_group_id</code> (BIGINT, FK) - Tim pengadaan penanggung jawab RFQ</li>
<li><code>status</code> (VARCHAR) - DRAFT, SUBMITTED, APPROVED, SENT, COMPLETED, CANCELED</li>
<li><code>created_by</code> (BIGINT, FK)</li>
<li><code>approved_by</code> (BIGINT, FK, Nullable)</li>
<li><code>approved_at</code> (TIMESTAMP, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>request_for_quotation_lines</code></h4>
<p>Daftar rincian kebutuhan barang/jasa yang ditenderkan dalam dokumen RFQ (sering merujuk pada baris PR).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>request_for_quotation_id</code> (BIGINT, FK)</li>
<li><code>line_number</code> (INT) - 10, 20, 30</li>
<li><code>purchase_requisition_line_id</code> (BIGINT, FK, Nullable) - Relasi asal PR (jika bukan manual)</li>
<li><code>item_category</code> (VARCHAR)</li>
<li><code>material_id</code> (BIGINT, FK, Nullable)</li>
<li><code>material_group_id</code> (BIGINT, FK, Nullable)</li>
<li><code>short_text</code> (VARCHAR)</li>
<li><code>qty_requested</code> (DECIMAL)</li>
<li><code>uom_id</code> (BIGINT, FK)</li>
<li><code>required_date</code> (DATE) - Target kedatangan yang diminta</li>
<li><code>estimated_price</code> (DECIMAL, Nullable) - Harga referensi internal HPS</li>
<li><code>currency_id</code> (BIGINT, FK, Nullable)</li>
<li><code>line_status</code> (VARCHAR) - OPEN, QUOTED, REJECTED, CANCELED</li>
</ul>
<h4>[NEW] Table: <code>request_for_quotation_vendors</code></h4>
<p>Daftar Vendor yang diundang berpartisipasi pada dokumen RFQ terkait, beserta status responsnya.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>request_for_quotation_id</code> (BIGINT, FK)</li>
<li><code>vendor_id</code> (BIGINT, FK)</li>
<li><code>is_responded</code> (BOOLEAN) - Status penyerahan penawaran</li>
<li><code>quotation_reference</code> (VARCHAR, Nullable) - Nomor dokumen referensi penawaran vendor</li>
<li><code>responded_at</code> (TIMESTAMP, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>request_for_quotation_vendor_lines</code></h4>
<p>Nilai masukan respons penawaran (Quotation Response) dari setiap Vendor per baris rincian RFQ.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>request_for_quotation_vendor_id</code> (BIGINT, FK) - Merujuk ke entitas peserta vendor</li>
<li><code>request_for_quotation_line_id</code> (BIGINT, FK) - Merujuk ke baris kebutuhan yang dijawab</li>
<li><code>qty_offered</code> (DECIMAL) - Kuantitas yang disanggupi vendor</li>
<li><code>unit_price</code> (DECIMAL, Nullable) - Nilai satuan harga yang diajukan</li>
<li><code>currency_id</code> (BIGINT, FK, Nullable)</li>
<li><code>lead_time_days</code> (INT, Nullable) - Estimasi pengiriman setelah PO</li>
<li><code>payment_term_id</code> (BIGINT, FK, Nullable) - Permintaan klausul pembayaran dari vendor</li>
<li><code>tax_code_id</code> (BIGINT, FK, Nullable) - Pajak yang diberlakukan (contoh: PPN 11%)</li>
</ul>
<h4>[NEW] Table: <code>quotation_comparison_forms</code></h4>
<p>Dokumen formal (Awarding) yang merekam keputusan persetujuan pemenang dari daftar penawaran vendor yang masuk pada RFQ.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK) - Cabang eksekusi.</li>
<li><code>request_for_quotation_id</code> (BIGINT, FK) - Relasi absolut ke dokumen tender (RFQ).</li>
<li><code>qcf_number</code> (VARCHAR) - Penomoran otomatis QCF.</li>
<li><code>comparison_date</code> (DATE) - Tanggal keputusan.</li>
<li><code>status</code> (VARCHAR) - DRAFT, IN_APPROVAL, APPROVED, REJECTED.</li>
<li><code>notes</code> (TEXT, Nullable) - Justifikasi umum pemilihan vendor.</li>
<li><code>created_by</code>, <code>approved_by</code>, <code>approved_at</code></li>
</ul>
<h4>[NEW] Table: <code>quotation_comparison_lines</code></h4>
<p>Daftar persetujuan kuantitas yang dimenangkan untuk setiap rujukan penawaran spesifik vendor.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>quotation_comparison_form_id</code> (BIGINT, FK)</li>
<li><code>request_for_quotation_line_id</code> (BIGINT, FK) - Merujuk kebutuhan barang.</li>
<li><code>request_for_quotation_vendor_line_id</code> (BIGINT, FK) - Merujuk penawaran spesifik yang dipilih.</li>
<li><code>awarded_qty</code> (DECIMAL) - Kuantitas yang disetujui untuk dibeli dari vendor ini (mendukung Split-Award).</li>
<li><code>notes</code> (TEXT, Nullable) - Justifikasi parsial baris.</li>
</ul>
<h4>[NEW] Table: <code>purchase_contracts</code></h4>
<p>Dokumen perjanjian payung (Outline Agreement) untuk pembelian material/jasa dengan kuantitas atau nilai tertentu (Quantity/Value Contract).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK)</li>
<li><code>vendor_id</code> (BIGINT, FK)</li>
<li><code>document_type_id</code> (BIGINT, FK) - Mendefinisikan Quantity Contract atau Value Contract</li>
<li><code>contract_number</code> (VARCHAR) - Nomor kesepakatan unik</li>
<li><code>agreement_date</code> (DATE) - Tanggal kesepakatan</li>
<li><code>valid_from</code> (DATE)</li>
<li><code>valid_to</code> (DATE)</li>
<li><code>target_value</code> (DECIMAL, Nullable) - Berlaku untuk Value Contract</li>
<li><code>purchasing_organization_id</code> (BIGINT, FK)</li>
<li><code>purchasing_group_id</code> (BIGINT, FK)</li>
<li><code>status</code> (VARCHAR) - DRAFT, APPROVED, COMPLETED, EXPIRED, CANCELED</li>
</ul>
<h4>[NEW] Table: <code>purchase_contract_lines</code></h4>
<p>Rincian baris dari perjanjian payung, beserta catatan target dan rilis kuantitas/nilai.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>purchase_contract_id</code> (BIGINT, FK)</li>
<li><code>line_number</code> (INT)</li>
<li><code>item_category</code> (VARCHAR) - MATERIAL, SERVICE, EXPENSE</li>
<li><code>material_id</code> (BIGINT, FK, Nullable)</li>
<li><code>material_group_id</code> (BIGINT, FK, Nullable)</li>
<li><code>short_text</code> (VARCHAR)</li>
<li><code>target_qty</code> (DECIMAL, Nullable) - Berlaku untuk Quantity Contract</li>
<li><code>uom_id</code> (BIGINT, FK)</li>
<li><code>net_price</code> (DECIMAL)</li>
<li><code>currency_id</code> (BIGINT, FK)</li>
<li><code>tax_code_id</code> (BIGINT, FK, Nullable)</li>
<li><code>released_qty</code> (DECIMAL) - Terisi jika sudah ada PO terbit dari kontrak ini</li>
<li><code>released_value</code> (DECIMAL) - Terisi jika sudah ada PO terbit dari kontrak ini</li>
</ul>
<h4>[NEW] Table: <code>purchase_orders</code></h4>
<p>Header Pesanan Pembelian ke Pemasok (Setara EKKO).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK) - Cabang/Entitas Legal pemegang dokumen</li>
<li><code>document_type_id</code> (BIGINT, FK) - Tipe dokumen (Lokal, Impor, Jasa)</li>
<li><code>po_number</code> (VARCHAR)</li>
<li><code>vendor_id</code> (BIGINT, FK) - Vendor utama (menggantikan supplier_id lama)</li>
<li><code>invoicing_party_id</code> (BIGINT, FK, Nullable) - Pihak penagih faktur (jika berbeda dari vendor utama)</li>
<li><code>purchasing_organization_id</code> (BIGINT, FK) - Unit struktural pembuat kontrak pengadaan</li>
<li><code>purchasing_group_id</code> (BIGINT, FK) - Grup/Individu pelaksana (Buyer)</li>
<li><code>order_date</code> (DATE)</li>
<li><code>term_of_payment_id</code> (BIGINT, FK) - Relasi master syarat pembayaran</li>
<li><code>currency_id</code> (BIGINT, FK)</li>
<li><code>exchange_rate</code> (DECIMAL, Nullable) - Nilai tukar mata uang asing</li>
<li><code>purchase_pricing_procedure_id</code> (BIGINT, FK, Nullable) - Skema formasi harga multi-vendor</li>
<li><code>total_amount</code> (DECIMAL) - Total nilai sebelum pajak</li>
<li><code>tax_amount</code> (DECIMAL) - Total nilai pajak</li>
<li><code>discount_amount</code> (DECIMAL, Nullable) - Total nilai potongan</li>
<li><code>status</code> (VARCHAR) - DRAFT, IN_APPROVAL, APPROVED, PARTIAL_RECEIVED, FULLY_RECEIVED, BILLED, CANCELED</li>
<li><code>approved_by</code> (BIGINT, FK ke users, Nullable)</li>
<li><code>approved_at</code> (TIMESTAMP, Nullable)</li>
<li><code>created_by</code>, <code>updated_by</code>, <code>deleted_by</code> (BIGINT, FK ke users)</li>
<li><code>created_at</code>, <code>updated_at</code>, <code>deleted_at</code> (TIMESTAMP)</li>
</ul>
<h4>[NEW] Table: <code>purchase_order_lines</code></h4>
<p>Detail barang/jasa yang dibeli (Setara EKPO).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>purchase_order_id</code> (BIGINT, FK)</li>
<li><code>line_number</code> (INT) - 10, 20, 30...</li>
<li><code>item_category</code> (VARCHAR) - MATERIAL, SERVICE, EXPENSE, ASSET</li>
<li><code>account_assignment_category</code> (VARCHAR, Nullable) - Pusat Pembebanan</li>
<li><code>material_id</code> (BIGINT, FK, Nullable)</li>
<li><code>short_text</code> (VARCHAR) - Deskripsi spesifik barang/jasa</li>
<li><code>qty</code> (DECIMAL) - Kuantitas pesan</li>
<li><code>uom_id</code> (BIGINT, FK) - Satuan ukuran</li>
<li><code>net_price</code> (DECIMAL) - Harga satuan dasar</li>
<li><code>tax_code_id</code> (BIGINT, FK)</li>
<li><code>storage_location_id</code> (BIGINT, FK, Nullable) - Gudang tujuan barang dikirim</li>
<li><code>delivery_date</code> (DATE) - Ekspektasi tanggal kedatangan per item</li>
<li><code>overdelivery_tolerance</code> (DECIMAL, Default 0) - Batas % penerimaan berlebih</li>
<li><code>underdelivery_tolerance</code> (DECIMAL, Default 0) - Batas % toleransi selesai meski kurang</li>
<li><code>is_free_of_charge</code> (BOOLEAN, Default false) - Barang bonus/gratis</li>
<li><code>is_returns_item</code> (BOOLEAN, Default false) - Baris untuk retur ke vendor</li>
<li><code>cost_center_id</code> (BIGINT, FK, Nullable) - Untuk expense</li>
<li><code>fixed_asset_id</code> (BIGINT, FK, Nullable) - Untuk aset</li>
<li><code>purchase_requisition_line_id</code> (BIGINT, FK, Nullable) - Referensi PR asal</li>
<li><code>quotation_comparison_line_id</code> (BIGINT, FK, Nullable) - Referensi tender QCF</li>
<li><code>purchase_contract_line_id</code> (BIGINT, FK, Nullable) - Referensi *Call-off* Kontrak</li>
<li><code>created_by</code>, <code>updated_by</code>, <code>deleted_by</code> (BIGINT, FK ke users, Nullable)</li>
<li><code>created_at</code>, <code>updated_at</code>, <code>deleted_at</code> (TIMESTAMP, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>purchase_order_histories</code></h4>
<p>Rekam jejak seluruh dokumen lanjutan (Follow-on documents) seperti Goods Receipt atau Invoice Receipt per baris PO.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>purchase_order_line_id</code> (BIGINT, FK)</li>
<li><code>transaction_type</code> (VARCHAR) - GOODS_RECEIPT, INVOICE_RECEIPT, DOWN_PAYMENT, REVERSAL</li>
<li><code>reference_document_id</code> (BIGINT) - Menunjuk ke ID dokumen aktual terkait</li>
<li><code>qty</code> (DECIMAL) - Kuantitas pergerakan (+ masuk, - retur)</li>
<li><code>amount_local_currency</code> (DECIMAL) - Nilai moneter dalam mata uang dasar</li>
<li><code>created_by</code>, <code>updated_by</code>, <code>deleted_by</code> (BIGINT, FK ke users, Nullable)</li>
<li><code>created_at</code>, <code>updated_at</code>, <code>deleted_at</code> (TIMESTAMP, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>purchase_order_delivery_schedules</code></h4>
<p>Jadwal pengiriman bertahap (parsial) untuk satu baris item PO.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>purchase_order_line_id</code> (BIGINT, FK)</li>
<li><code>schedule_line_number</code> (INT) - 10, 20, 30</li>
<li><code>delivery_date</code> (DATE)</li>
<li><code>scheduled_qty</code> (DECIMAL)</li>
<li><code>received_qty</code> (DECIMAL, Default 0)</li>
<li><code>created_by</code>, <code>updated_by</code>, <code>deleted_by</code> (BIGINT, FK ke users, Nullable)</li>
<li><code>created_at</code>, <code>updated_at</code>, <code>deleted_at</code> (TIMESTAMP, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>purchase_order_account_assignments</code></h4>
<p>Distribusi silang pusat pembebanan (Multiple Account Assignment) per baris item.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>purchase_order_line_id</code> (BIGINT, FK)</li>
<li><code>sequence_no</code> (INT)</li>
<li><code>cost_center_id</code> (BIGINT, FK, Nullable)</li>
<li><code>fixed_asset_id</code> (BIGINT, FK, Nullable)</li>
<li><code>distribution_percentage</code> (DECIMAL)</li>
<li><code>distributed_amount</code> (DECIMAL)</li>
<li><code>created_by</code>, <code>updated_by</code>, <code>deleted_by</code> (BIGINT, FK ke users, Nullable)</li>
<li><code>created_at</code>, <code>updated_at</code>, <code>deleted_at</code> (TIMESTAMP, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>purchase_order_release_strategies</code></h4>
<p>Matriks persetujuan berjenjang pada PO berdasarkan limit nilai.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>purchase_order_id</code> (BIGINT, FK)</li>
<li><code>release_code_id</code> (BIGINT, FK) - Jabatan penyetuju (Misal: MGR, DIR)</li>
<li><code>is_approved</code> (BOOLEAN, Default false)</li>
<li><code>approved_by</code> (BIGINT, FK, Nullable)</li>
<li><code>approved_at</code> (TIMESTAMP, Nullable)</li>
<li><code>created_by</code>, <code>updated_by</code>, <code>deleted_by</code> (BIGINT, FK ke users, Nullable)</li>
<li><code>created_at</code>, <code>updated_at</code>, <code>deleted_at</code> (TIMESTAMP, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>purchase_order_texts</code></h4>
<p>Penyimpanan catatan dokumen dinamis (Header &amp; Item Text) yang panjangnya tak terbatas.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>purchase_order_id</code> (BIGINT, FK)</li>
<li><code>purchase_order_line_id</code> (BIGINT, FK, Nullable) - Jika null berarti Header Text</li>
<li><code>text_type_id</code> (BIGINT, FK) - Instruksi Vendor, Catatan Internal, dsb</li>
<li><code>content</code> (LONGTEXT)</li>
<li><code>created_by</code>, <code>updated_by</code>, <code>deleted_by</code> (BIGINT, FK ke users, Nullable)</li>
<li><code>created_at</code>, <code>updated_at</code>, <code>deleted_at</code> (TIMESTAMP, Nullable)</li>
</ul>
<hr />
<h3>8. Inventory Management (MM - Persediaan)</h3>
<p>Pusat kendali pergerakan stok (Goods Movement) tersentralisasi (Mengadopsi MKPF/MSEG SAP).</p>
<h4>[NEW] Table: <code>material_documents</code></h4>
<p>Header Dokumen Material (Setara MIGO/MKPF). Menggantikan fungsi tabel spesifik seperti GR, TR, maupun Adjustment.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>document_type_id</code> (BIGINT, FK) - (Misal: DOC_MIGO)</li>
<li><code>document_number</code> (VARCHAR)</li>
<li><code>posting_date</code> (DATE)</li>
<li><code>document_date</code> (DATE)</li>
<li><code>header_text</code> (TEXT, Nullable)</li>
<li><code>reference_document</code> (VARCHAR, Nullable) - Referensi fisik Surat Jalan atau Delivery Note</li>
<li><code>status</code> (VARCHAR) - DRAFT, POSTED, CANCELED</li>
</ul>
<h4>[NEW] Table: <code>material_document_lines</code></h4>
<p>Detail pergerakan barang / Kartu Stok (Setara MSEG).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>material_document_id</code> (BIGINT, FK) - Relasi ke header</li>
<li><code>material_id</code> (BIGINT, FK)</li>
<li><code>branch_id</code> (BIGINT, FK)</li>
<li><code>storage_location_id</code> (BIGINT, FK, Nullable)</li>
<li><code>batch_id</code> (BIGINT, FK, Nullable)</li>
<li><code>movement_type_id</code> (BIGINT, FK) - Relasi ke master Movement Type (Misal: 101, 311, 561)</li>
<li><code>qty</code> (DECIMAL)</li>
<li><code>balance</code> (DECIMAL) - Sisa saldo setelah mutasi (Snapshot)</li>
<li><code>customer_id</code> (BIGINT, FK, Nullable) - Referensi mitra pelanggan (Jika GI untuk Penjualan/Retur)</li>
<li><code>supplier_id</code> (BIGINT, FK, Nullable) - Referensi mitra pemasok (Jika GR dari Vendor/Retur)</li>
<li><code>cost_center_id</code> (BIGINT, FK, Nullable) - Untuk beban pemakaian internal / scrapping (Integrasi CO)</li>
<li><code>reference_po_line_id</code> (BIGINT, FK, Nullable) - Referensi PO (jika MIGO penerimaan/retur PO)</li>
<li><code>reference_do_line_id</code> (BIGINT, FK, Nullable) - Referensi DO (jika MIGO pengiriman SO)</li>
<li><code>partner_branch_id</code> (BIGINT, FK, Nullable) - Gudang tujuan/asal (jika Mutasi)</li>
</ul>
<hr />
<h3>8.5. Bill of Material &amp; Work Order (PP - Produksi &amp; Perakitan)</h3>
<h4>[NEW] Table: bill_of_materials</h4>
<p>Menyimpan data header formula perakitan atau Bill of Material barang jadi.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>item_id</code> (BIGINT, FK &rarr; items)</li>
    <li><code>name</code> (VARCHAR)</li>
    <li><code>code</code> (VARCHAR, Unique)</li>
    <li><code>version</code> (VARCHAR)</li>
    <li><code>is_active</code> (BOOLEAN)</li>
    <li><code>branch_id</code> (BIGINT, FK &rarr; branches)</li>
</ul>

<h4>[NEW] Table: bill_of_material_items</h4>
<p>Menyimpan detail komponen bahan baku penyusun finished goods beserta persentase toleransi waste.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>bill_of_material_id</code> (BIGINT, FK &rarr; bill_of_materials)</li>
    <li><code>item_id</code> (BIGINT, FK &rarr; items)</li>
    <li><code>quantity</code> (DECIMAL(18,4))</li>
    <li><code>uom_id</code> (BIGINT, FK &rarr; base_uoms)</li>
    <li><code>waste_percentage</code> (DECIMAL(5,2))</li>
</ul>

<h4>[NEW] Table: work_orders</h4>
<p>Menyimpan perintah kerja perakitan produk beserta target kuantitas, gudang eksekusi, status, dan range tanggal produksi.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>code</code> (VARCHAR, Unique)</li>
    <li><code>bill_of_material_id</code> (BIGINT, FK &rarr; bill_of_materials)</li>
    <li><code>target_item_id</code> (BIGINT, FK &rarr; items)</li>
    <li><code>target_quantity</code> (DECIMAL(18,4))</li>
    <li><code>warehouse_id</code> (BIGINT, FK &rarr; warehouses)</li>
    <li><code>status</code> (VARCHAR)</li>
    <li><code>branch_id</code> (BIGINT, FK &rarr; branches)</li>
    <li><code>document_date</code> (DATE)</li>
    <li><code>start_date</code> (DATE)</li>
    <li><code>end_date</code> (DATE)</li>
</ul>

<h4>[NEW] Table: work_order_items</h4>
<p>Menyimpan alokasi dan konsumsi bahan baku aktual beserta pelacakan nomor batch komponen.</p>
<ul>
    <li><code>id</code> (BIGINT, PK)</li>
    <li><code>work_order_id</code> (BIGINT, FK &rarr; work_orders)</li>
    <li><code>item_id</code> (BIGINT, FK &rarr; items)</li>
    <li><code>required_quantity</code> (DECIMAL(18,4))</li>
    <li><code>consumed_quantity</code> (DECIMAL(18,4))</li>
    <li><code>uom_id</code> (BIGINT, FK &rarr; base_uoms)</li>
    <li><code>batch_number</code> (VARCHAR)</li>
</ul>

<h3>9. Accounts Payable (FI - Hutang)</h3>
<p>Siklus penagihan dan pembayaran ke Pemasok.</p>
<h4>[NEW] Table: <code>ap_invoices</code></h4>
<p>Tagihan Pemasok (A/P Invoice).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>supplier_id</code> (BIGINT, FK)</li>
<li><code>material_document_id</code> (BIGINT, FK, Nullable) - Referensi ke dokumen MIGO (Penerimaan)</li>
<li><code>document_type_id</code> (BIGINT, FK)</li>
<li><code>invoice_number</code> (VARCHAR)</li>
<li><code>vendor_invoice_number</code> (VARCHAR) - Nomor faktur fisik dari Pemasok</li>
<li><code>invoice_date</code> (DATE)</li>
<li><code>due_date</code> (DATE)</li>
<li><code>total_amount</code> (DECIMAL)</li>
<li><code>status</code> (VARCHAR) - UNPAID, PARTIAL, PAID, CANCELED</li>
</ul>
<h4>[NEW] Table: <code>ap_invoice_lines</code></h4>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>ap_invoice_id</code> (BIGINT, FK)</li>
<li><code>material_id</code> (BIGINT, FK, Nullable)</li>
<li><code>qty</code> (DECIMAL)</li>
<li><code>line_total</code> (DECIMAL)</li>
</ul>
<h4>[NEW] Table: <code>vendor_payments</code></h4>
<p>Pembayaran Hutang ke Pemasok (Outgoing Payment / Setara F-53 di SAP).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>supplier_id</code> (BIGINT, FK)</li>
<li><code>house_bank_id</code> (BIGINT, FK) - Uang keluar dari rekening bank perusahaan yang mana</li>
<li><code>document_type_id</code> (BIGINT, FK)</li>
<li><code>payment_number</code> (VARCHAR)</li>
<li><code>payment_date</code> (DATE)</li>
<li><code>amount</code> (DECIMAL)</li>
<li><code>payment_method</code> (VARCHAR) - CASH, TRANSFER, GIRO, CHEQUE</li>
<li><code>reference_number</code> (VARCHAR, Nullable) - Nomor Bukti Transfer / Giro</li>
<li><code>status</code> (VARCHAR) - DRAFT, POSTED, CANCELED</li>
</ul>
<h4>[NEW] Table: <code>vendor_payment_lines</code></h4>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>vendor_payment_id</code> (BIGINT, FK)</li>
<li><code>ap_invoice_id</code> (BIGINT, FK) - Tagihan pemasok yang dilunasi (Clearing)</li>
<li><code>amount_applied</code> (DECIMAL) - Nilai yang dialokasikan untuk melunasi tagihan tersebut</li>
</ul>
<hr />
<h3>10. Financial Accounting (FI/CO - Jurnal Utama)</h3>
<p>Buku Besar (General Ledger) untuk akuntansi. Menggunakan arsitektur <em>Universal Journal</em> (Satu tabel tunggal sebagai <em>Single Source of Truth</em> layaknya SAP ACDOCA/BSEG) untuk menampung seluruh jurnal dari berbagai modul (AR, AP, MM) tanpa memisahkannya ke tabel fisik yang berbeda. Pemisahan hanya dilakukan secara logis menggunakan <code>document_type_id</code> dan <code>reference_type</code>.</p>
<h4>[NEW] Table: <code>coas</code></h4>
<p>Master Chart of Accounts (Bagan Akun).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR) - Nomor Akun (Misal: 1110.01)</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>account_type</code> (VARCHAR) - ASSET, LIABILITY, EQUITY, REVENUE, EXPENSE</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>
<h4>[NEW] Table: <code>cost_centers</code></h4>
<p>Pusat Biaya (Cost Center / Modul CO) untuk melacak pengeluaran per departemen atau fungsi operasional.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>business_area_id</code> (BIGINT, FK, Nullable) - Area Bisnis yang menaungi</li>
<li><code>code</code> (VARCHAR) - Misal: CC-MKT, CC-LOG</li>
<li><code>name</code> (VARCHAR) - Misal: Biaya Marketing, Biaya Gudang</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>
<h4>[NEW] Table: <code>house_banks</code></h4>
<p>Master Rekening Bank Perusahaan (House Banks). Menyederhanakan relasi House Bank &amp; Account ID SAP.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>company_id</code> (BIGINT, FK) - Bank ini milik entitas perusahaan mana</li>
<li><code>coa_id</code> (BIGINT, FK) - Relasi langsung ke GL Account (Buku Besar Bank)</li>
<li><code>currency_id</code> (BIGINT, FK) - Mata uang rekening (Misal: IDR / USD)</li>
<li><code>bank_code</code> (VARCHAR) - Misal: BCA, MANDIRI</li>
<li><code>bank_name</code> (VARCHAR) - Misal: PT. BANK CENTRAL ASIA Tbk</li>
<li><code>account_number</code> (VARCHAR)</li>
<li><code>account_name</code> (VARCHAR)</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>
<h4>[NEW] Table: <code>journals</code></h4>
<p>Header Memorial Journal (Jurnal Umum).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>document_type_id</code> (BIGINT, FK) - (Misal: JE_STD)</li>
<li><code>journal_number</code> (VARCHAR)</li>
<li><code>reference_type</code> (VARCHAR, Nullable) - (Misal: SALES_INVOICE, VENDOR_PAYMENT)</li>
<li><code>reference_id</code> (BIGINT, Nullable)</li>
<li><code>journal_date</code> (DATE)</li>
<li><code>description</code> (TEXT)</li>
<li><code>total_amount</code> (DECIMAL) - (Balance Debit/Credit)</li>
<li><code>status</code> (VARCHAR) - DRAFT, POSTED, REVERSED</li>
</ul>
<h4>[NEW] Table: <code>journal_lines</code></h4>
<p>Detail debit dan kredit.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>journal_id</code> (BIGINT, FK)</li>
<li><code>coa_id</code> (BIGINT, FK)</li>
<li><code>cost_center_id</code> (BIGINT, FK, Nullable) - Alokasi pengeluaran ke Pusat Biaya tertentu (Untuk jurnal Expense/Biaya)</li>
<li><code>debit</code> (DECIMAL)</li>
<li><code>credit</code> (DECIMAL)</li>
<li><code>description</code> (VARCHAR, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>cash_journals</code></h4>
<p>Buku Kas / Kas Kecil (Petty Cash) harian per cabang (Setara FBCJ di SAP).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>branch_id</code> (BIGINT, FK) - Cabang pemilik kas</li>
<li><code>coa_id</code> (BIGINT, FK) - Akun Kas (GL Kas Kecil)</li>
<li><code>document_type_id</code> (BIGINT, FK)</li>
<li><code>cj_number</code> (VARCHAR)</li>
<li><code>transaction_date</code> (DATE)</li>
<li><code>opening_balance</code> (DECIMAL)</li>
<li><code>closing_balance</code> (DECIMAL)</li>
<li><code>status</code> (VARCHAR) - DRAFT, POSTED</li>
</ul>
<h4>[NEW] Table: <code>cash_journal_lines</code></h4>
<p>Detail transaksi penerimaan atau pengeluaran kas.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>cash_journal_id</code> (BIGINT, FK)</li>
<li><code>transaction_type</code> (VARCHAR) - RECEIPT (Penerimaan), PAYMENT (Pengeluaran)</li>
<li><code>offsetting_coa_id</code> (BIGINT, FK) - Lawan akun transaksi (Misal: Biaya Tol, Biaya Parkir)</li>
<li><code>amount</code> (DECIMAL)</li>
<li><code>reference_number</code> (VARCHAR, Nullable) - Nomor nota fisik (Receipt No)</li>
<li><code>description</code> (TEXT, Nullable)</li>
</ul>
<h4>[NEW] Table: <code>bank_statements</code></h4>
<p>Mutasi Rekening Koran Bank (Manual Bank Statement / Setara FF67 di SAP) untuk proses Rekonsiliasi Bank.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>house_bank_id</code> (BIGINT, FK) - Rekening bank internal perusahaan</li>
<li><code>document_type_id</code> (BIGINT, FK)</li>
<li><code>statement_number</code> (VARCHAR)</li>
<li><code>statement_date</code> (DATE)</li>
<li><code>opening_balance</code> (DECIMAL)</li>
<li><code>closing_balance</code> (DECIMAL)</li>
<li><code>status</code> (VARCHAR) - DRAFT, POSTED, RECONCILED</li>
</ul>
<h4>[NEW] Table: <code>bank_statement_lines</code></h4>
<p>Rincian pergerakan masuk/keluar dari Mutasi Rekening Koran.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>bank_statement_id</code> (BIGINT, FK)</li>
<li><code>transaction_type</code> (VARCHAR) - IN (Uang Masuk/Debit Bank), OUT (Uang Keluar/Kredit Bank)</li>
<li><code>amount</code> (DECIMAL)</li>
<li><code>reference_number</code> (VARCHAR, Nullable) - Nomor Referensi Bank / Giro</li>
<li><code>description</code> (TEXT, Nullable)</li>
<li><code>is_reconciled</code> (BOOLEAN) - Flag apakah baris ini sudah di-clearing dengan faktur AR/AP</li>
<li><code>offsetting_coa_id</code> (BIGINT, FK, Nullable) - Akun lawan (Tujuan clearing)</li>
</ul>
<hr />
<h3>11. Configuration Engine (Pengaturan Sistem)</h3>
<p>Mesin sentral yang menaungi pengaturan penomoran otomatis dan tipe dokumen layaknya sistem ERP kelas atas, memastikan seluruh format kode dapat diatur (Configuration &gt; Custom Code).</p>
<h4>[NEW] Table: <code>local_currencies</code></h4>
<p>Master Data Mata Uang.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR) - Misal: IDR, USD, EUR</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>symbol</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>exchange_rates</code></h4>
<p>Master Data Kurs / Nilai Tukar Harian.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>from_currency_id</code> (BIGINT, FK)</li>
<li><code>to_currency_id</code> (BIGINT, FK)</li>
<li><code>valid_from</code> (DATE)</li>
<li><code>rate</code> (DECIMAL) - Nilai tukar (Exchange Rate)</li>
</ul>
<h4>[NEW] Table: <code>payment_terms</code></h4>
<p>Master Termin Pembayaran. (Tabel ini akan menggantikan tipe INT pada term_of_payment di transaksi).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR) - Misal: Z030, CBD</li>
<li><code>name</code> (VARCHAR) - Misal: Net 30 Days, Cash Before Delivery</li>
<li><code>days</code> (INT) - Jumlah hari jatuh tempo</li>
</ul>
<h4>[NEW] Table: <code>document_number_ranges</code></h4>
<p>Mengatur logika <em>auto-increment</em> penomoran dokumen (Nomor SO, DO, Invoice, Master Data).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR) - Misal: SO_STD, INV_RET</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>prefix</code> (VARCHAR, Nullable) - Awalan nomor (Misal: <code>SO-</code>)</li>
<li><code>suffix</code> (VARCHAR, Nullable) - Akhiran nomor (Misal: <code>/2026</code>)</li>
<li><code>length</code> (INT) - Panjang digit (Misal: <code>6</code> untuk <code>000001</code>)</li>
<li><code>current_number</code> (BIGINT) - Counter yang terus berjalan secara berurutan</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>
<h4>[NEW] Table: <code>document_types</code></h4>
<p>Master Data Tipe Dokumen untuk mengatur perilaku transaksi tanpa harus <em>hardcode</em> tipe di dalam sistem (Meniru logika VBAK-AUART).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>category</code> (VARCHAR) - Modul transaksi: SALES_ORDER, DELIVERY, INVOICE</li>
<li><code>code</code> (VARCHAR) - Misal: SO_STD, DO_STD, INV_STD</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>number_range_id</code> (BIGINT, FK) - Relasi ke konfigurasi nomor urutnya</li>
</ul>
<h4>[NEW] Table: <code>document_type_mappings</code></h4>
<p>Pemetaan alur dokumen (Copy Control) untuk mengunci relasi SO Type -&gt; DO Type -&gt; Bill Type.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>sales_order_type_id</code> (BIGINT, FK) - Referensi ke tipe SO (Misal: SO_STD)</li>
<li><code>delivery_type_id</code> (BIGINT, FK, Nullable) - Referensi ke tipe DO (Misal: DO_STD)</li>
<li><code>invoice_type_id</code> (BIGINT, FK, Nullable) - Referensi ke tipe Billing (Misal: INV_STD)</li>
</ul>
<h4>[NEW] Table: <code>movement_types</code></h4>
<p>Master Data Movement Type (Kode Pergerakan Barang / SAP MM).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>code</code> (VARCHAR) - Misal: 101 (GR), 122 (Return to Vendor), 601 (GI Delivery)</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>direction</code> (VARCHAR) - IN (Masuk), OUT (Keluar)</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>
<h4>[NEW] Table: <code>goods_movement_mappings</code></h4>
<p>Pemetaan cerdas untuk transaksi MIGO (Menentukan default movement type berdasarkan Action dan Reference Document).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>action_code</code> (VARCHAR) - Kode aksi UI (Misal: A01 = Goods Receipt, A08 = Transfer Posting)</li>
<li><code>reference_code</code> (VARCHAR) - Kode referensi (Misal: R01 = Purchase Order, R10 = Other)</li>
<li><code>movement_type_id</code> (BIGINT, FK) - Movement Type yang relevan untuk kombinasi ini</li>
<li><code>is_default</code> (BOOLEAN) - Flag apakah ini pilihan default saat user membuka halaman MIGO</li>
</ul>
<hr />
<h3>12. User &amp; Access Management (Basis / Otorisasi)</h3>
<p>Mengelola keamanan sistem (Authentication &amp; Authorization). Memanfaatkan arsitektur standar (misal: <em>Spatie Laravel Permission</em>) yang diperkuat dengan <em>Row-Level Security</em> untuk otorisasi akses Cabang &amp; Gudang.</p>
<h4>[NEW] Table: <code>users</code></h4>
<p>Data autentikasi pengguna aplikasi.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>name</code> (VARCHAR)</li>
<li><code>email</code> (VARCHAR, Unique)</li>
<li><code>password</code> (VARCHAR)</li>
<li><code>default_branch_id</code> (BIGINT, FK, Nullable) - Cabang (Branch) default saat login perdana</li>
<li><code>current_branch_id</code> (BIGINT, FK, Nullable) - Konteks Cabang yang sedang aktif (Context Switcher)</li>
<li><code>last_login_at</code> (TIMESTAMP, Nullable)</li>
<li><code>deleted_at</code> (TIMESTAMP, Nullable) - Soft Delete / Deactivation pengguna (BRD 01)</li>
</ul>
<h4>[MODIFIED] Table: <code>roles</code></h4>
<p>Master profil otorisasi (Misal: SUPER_ADMIN, SALES_MANAGER, WAREHOUSE_ADMIN). Mendukung isolasi role per Perusahaan (Multi-Company).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>company_id</code> (BIGINT, FK, Nullable) — NULL berarti berlaku Global/Super Admin lintas perusahaan</li>
<li><code>name</code> (VARCHAR, Unique per company)</li>
<li><code>guard_name</code> (VARCHAR)</li>
<li><code>description</code> (VARCHAR, Nullable)</li>
</ul>
<h4>[MODIFIED] Table: <code>permissions</code></h4>
<p>Daftar hak akses granular berstruktur dua dimensi (Resource + Action) untuk kemudahan audit dan konfigurasi massal. Format: <code>resource.action</code> (Misal: <code>sales_orders.approve</code>).</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>resource</code> (VARCHAR) — Entitas yang dilindungi. Misal: sales_orders, purchase_orders, journals, users</li>
<li><code>action</code> (VARCHAR) — Misal: create, read, update, delete, approve, post, reverse, print, export</li>
<li><code>name</code> (VARCHAR, Unique) — Format auto-generated: resource.action (Kompatibel dengan Spatie)</li>
<li><code>guard_name</code> (VARCHAR)</li>
</ul>
<h4>[NEW] Table: <code>role_has_permissions</code></h4>
<ul>
<li><code>permission_id</code> (BIGINT, FK)</li>
<li><code>role_id</code> (BIGINT, FK)</li>
</ul>
<h4>[MODIFIED] Table: <code>model_has_roles</code></h4>
<p>Pemetaan Role ke User. Mendukung Time-Based Authorization (BR-05 BRD-01).</p>
<ul>
<li><code>role_id</code> (BIGINT, FK)</li>
<li><code>model_type</code> (VARCHAR)</li>
<li><code>model_id</code> (BIGINT, FK - User ID)</li>
<li><code>valid_from</code> (DATE, Nullable) — Tanggal Role mulai berlaku untuk user ini</li>
<li><code>valid_to</code> (DATE, Nullable) — Tanggal Role berakhir (NULL = permanen)</li>
</ul>


<h4>[NEW] Table: <code>role_movement_types</code></h4>
<p><em>Authorization-Level Security</em>: Membatasi hak akses eksekusi pergerakan barang. (Misal: Role &quot;Warehouse Staff&quot; hanya bisa eksekusi Movement 101 dan 601, sedangkan Role &quot;Warehouse Manager&quot; bisa mengeksekusi Movement 561 dan 701).</p>
<ul>
<li><code>role_id</code> (BIGINT, FK)</li>
<li><code>movement_type_id</code> (BIGINT, FK)</li>
</ul>

<h4>[NEW] Table: <code>approval_authorities</code></h4>
<p>Batas nilai otorisasi per Role per Modul. Fondasi Approval Engine yang skalabel — memungkinkan sistem menolak dokumen yang melebihi kapasitas persetujuan pengguna secara otomatis.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>role_id</code> (BIGINT, FK)</li>
<li><code>module</code> (VARCHAR) — Misal: PURCHASE_ORDER, SALES_ORDER, JOURNAL, PAYMENT</li>
<li><code>max_amount</code> (DECIMAL, Nullable) — NULL berarti tanpa batas nilai (Unlimited)</li>
<li><code>currency_id</code> (BIGINT, FK, Nullable)</li>
<li><code>is_active</code> (BOOLEAN)</li>
</ul>

<h4>[NEW] Table: <code>activity_logs</code></h4>
<p>Jejak Aktivitas Sistem (Audit Trail) sebagai <em>Single Source of Truth</em> untuk seluruh aksi pengguna (BR-08 BRD-01). Wajib diisi oleh seluruh modul untuk setiap transaksi sensitif.</p>
<ul>
<li><code>id</code> (BIGINT, PK)</li>
<li><code>user_id</code> (BIGINT, FK, Nullable) — Siapa yang melakukan aksi (NULL jika sistem)</li>
<li><code>subject_type</code> (VARCHAR) — Nama kelas model. Misal: App\\Models\\SalesOrder</li>
<li><code>subject_id</code> (BIGINT, Nullable) — ID dokumen yang diaksi</li>
<li><code>event</code> (VARCHAR) — created, updated, deleted, approved, posted, reversed, login, logout</li>
<li><code>properties</code> (JSON, Nullable) — Snapshot nilai sebelum dan sesudah perubahan</li>
<li><code>ip_address</code> (VARCHAR, Nullable)</li>
<li><code>user_agent</code> (VARCHAR, Nullable)</li>
<li><code>created_at</code> (TIMESTAMP)</li>
</ul>
<h2>Open Questions</h2>
<ul>
<li>Apakah format tabel dan field di atas sudah sesuai dengan cakupan DMS yang Anda harapkan sebelum kita melakukan update pada sistem (misal: Blueprint / Migrations)?</li>
<li>Apakah ada entitas penting lainnya dari modul SD (seperti Delivery atau Billing) yang perlu ditambahkan pada fase awal ini?</li>
</ul>
<h2>User Review Required</h2>
<p>Mohon tinjau rancangan struktur tabel dan relasi di atas. Jika sudah sesuai persis dengan standar Arxino dan kebutuhan, silakan berikan persetujuan untuk kami lanjutkan implementasinya.</p>

<hr>
<h2>3.5. Purchase Pricing Engine — BRD 03 Update</h2>
<p>Perluasan dari Pricing Engine untuk sisi Pembelian. Mendukung Multi-Vendor PO (Condition Vendor: Forwarder, Asuransi), Purchase Pricing Procedure dengan spare steps, dan pencatatan selisih harga (Price Variance) saat Invoice.</p>

<h3>[NEW] Table: purchase_pricing_procedures</h3>
<p>Skema kalkulasi harga beli. Dapat dikonfigurasi per jenis pembelian (Lokal, Impor).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR) - Contoh: PSTD01 (Lokal), PIMP01 (Impor)</li>
    <li>name (VARCHAR)</li>
    <li>description (TEXT, Nullable)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[NEW] Table: purchase_pricing_procedure_steps</h3>
<p>Urutan langkah kalkulasi dalam Purchase Pricing Procedure. Spare steps (misal: 30-99) disediakan untuk kondisi tambahan masa depan.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>purchase_pricing_procedure_id (BIGINT, FK → purchase_pricing_procedures)</li>
    <li>step_number (INT) - Urutan: 10, 20, 100, 110, 200 … Spare: 30-99</li>
    <li>purchase_condition_type_id (BIGINT, FK, Nullable → purchase_condition_types)</li>
    <li>description (VARCHAR)</li>
    <li>calculation_type (VARCHAR) - BASE_PRICE, DISCOUNT, SUBTOTAL, FREIGHT, ACCRUAL, TAX, EXPENSE</li>
    <li>account_key (VARCHAR, Nullable) - Kunci G/L: INV-ACC, FRT-ACC, INS-ACC, CUS-ACC, TAX-ACC, EXP-VAR</li>
    <li>is_cogs (BOOLEAN) - Apakah menambah nilai COGS / Inventory Valuation?</li>
    <li>calculate_from_step (INT, Nullable) - Basis % dihitung dari step mana</li>
    <li>is_statistical (BOOLEAN) - Jika true, nilai tidak mempengaruhi total tagihan</li>
    <li>sort_order (INT)</li>
</ul>

<h3>[NEW] Table: purchase_condition_types</h3>
<p>Jenis kondisi harga beli. Menggunakan kode produk sendiri.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR) - PRC-BASE, DISC-VND, FRT-OCN, FRT-INS, FRT-CLR, FRT-DOC, FRT-STR, FRT-OTH, PEN-DMG, TAX-INP</li>
    <li>name (VARCHAR)</li>
    <li>category (VARCHAR) - PRICE, DISCOUNT, FREIGHT, CUSTOMS, PENALTY, TAX</li>
    <li>value_type (VARCHAR) - PERCENTAGE, FIXED_AMOUNT, QUANTITY_BASED</li>
    <li>is_taxable (BOOLEAN) - Masuk DPP PPN Pihak Ketiga?</li>
    <li>is_vendor_assignable (BOOLEAN) - Bisa di-assign ke Condition Vendor berbeda?</li>
    <li>entry_mode (VARCHAR) - AUTO, MANUAL</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[NEW] Table: purchase_condition_records</h3>
<p>Master data nilai harga dan diskon pembelian dengan validitas tanggal.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>purchase_condition_type_id (BIGINT, FK → purchase_condition_types)</li>
    <li>vendor_id (BIGINT, FK, Nullable → vendors)</li>
    <li>material_id (BIGINT, FK, Nullable → items)</li>
    <li>amount_or_percent (DECIMAL(18,4))</li>
    <li>currency_id (BIGINT, FK, Nullable → local_currencies)</li>
    <li>valid_from (DATE)</li>
    <li>valid_to (DATE)</li>
    <li>is_active (BOOLEAN)</li>
    <li>created_by (BIGINT, FK → users)</li>
    <li>approved_by (BIGINT, FK, Nullable → users)</li>
    <li>approved_at (TIMESTAMP, Nullable)</li>
</ul>

<h3>[NEW] Table: purchase_condition_scales</h3>
<p>Detail skala kuantitas minimum pembelian untuk diskon skala berjenjang.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>purchase_condition_record_id (BIGINT, FK → purchase_condition_records)</li>
    <li>minimum_quantity (DECIMAL) - Kuantitas minimum transaksi untuk mencapai skala ini</li>
    <li>rate (DECIMAL(18,4)) - Nilai diskon (rupiah/persen) atau harga beli khusus untuk skala ini</li>
</ul>

<h3>[NEW] Table: purchase_condition_tiers</h3>
<p>Detail urutan diskon bertingkat / kelipatan pada transaksi pembelian.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>purchase_condition_record_id (BIGINT, FK → purchase_condition_records)</li>
    <li>tier_index (INT) - Urutan perhitungan diskon bertingkat (misal: 1, 2, 3)</li>
    <li>rate (DECIMAL(18,4)) - Besaran persentase atau nominal diskon untuk tier ini</li>
</ul>


<h3>[NEW] Table: purchase_order_conditions</h3>
<p>Detail kondisi harga per dokumen PO. Mendukung assignment ke Condition Vendor berbeda dari Main Vendor.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>purchase_order_id (BIGINT, FK → purchase_orders)</li>
    <li>purchase_pricing_procedure_step_id (BIGINT, FK → purchase_pricing_procedure_steps)</li>
    <li>purchase_condition_type_id (BIGINT, FK → purchase_condition_types)</li>
    <li>condition_vendor_id (BIGINT, FK, Nullable → vendors) - NULL = tagihan ke Main Vendor. Jika diisi = Forwarder / Asuradur</li>
    <li>amount_or_percent (DECIMAL(18,4))</li>
    <li>calculated_amount (DECIMAL(18,2))</li>
    <li>currency_id (BIGINT, FK, Nullable → local_currencies)</li>
    <li>is_cogs (BOOLEAN)</li>
    <li>is_printed_on_po (BOOLEAN) - Tampil di cetak PO ke Main Vendor?</li>
    <li>notes (TEXT, Nullable)</li>
</ul>

<h3>[NEW] Table: purchase_invoice_conditions</h3>
<p>Realisasi kondisi harga saat Invoice Vendor. Mencatat Price Variance dan Exchange Rate Variance.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>purchase_invoice_id (BIGINT, FK → ap_invoices)</li>
    <li>purchase_order_condition_id (BIGINT, FK, Nullable → purchase_order_conditions)</li>
    <li>purchase_condition_type_id (BIGINT, FK → purchase_condition_types)</li>
    <li>vendor_id (BIGINT, FK → vendors) - Vendor yang menagihkan kondisi ini</li>
    <li>planned_amount (DECIMAL(18,2)) - Nilai estimasi dari PO</li>
    <li>actual_amount (DECIMAL(18,2)) - Nilai tagihan aktual</li>
    <li>variance_amount (DECIMAL(18,2)) - actual - planned</li>
    <li>variance_disposition (VARCHAR) - COGS_ADJUSTMENT, EXPENSE</li>
    <li>exchange_rate_actual (DECIMAL(18,6), Nullable)</li>
    <li>exchange_rate_variance (DECIMAL(18,2), Nullable)</li>
</ul>

<hr>
<h2>3.6. Sales Pricing Engine — BRD 04 Update</h2>
<p>Perluasan dari Pricing Engine yang sudah ada (pricing_procedures, condition_types, condition_records) untuk mendukung Sales Pricing secara penuh. Menambahkan kolom dan tabel baru.</p>

<h3>[MODIFY] Table: pricing_procedures</h3>
<p>Tambahan kolom untuk membedakan Sales vs Purchase Pricing Procedure.</p>
<ul>
    <li>module (VARCHAR) - SALES, PURCHASE</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[MODIFY] Table: pricing_procedure_steps</h3>
<p>Tambahan kolom sesuai kebutuhan Sales Pricing (Account Key, Revenue flag, Printed on Invoice).</p>
<ul>
    <li>account_key (VARCHAR, Nullable) - REV-ACC, DISC-ACC, FRT-ACC, TAX-ACC</li>
    <li>is_revenue (BOOLEAN) - Apakah mempengaruhi Net Revenue?</li>
    <li>is_statistical (BOOLEAN) - Nilai tidak tampil di Invoice pelanggan</li>
    <li>is_printed_on_invoice (BOOLEAN) - Tampil di cetak Invoice?</li>
    <li>spare_step_note (VARCHAR, Nullable) - Keterangan jika step ini adalah spare/placeholder</li>
</ul>

<h3>[NEW] Table: customer_schema_groups</h3>
<p>Master pengelompokan skema harga untuk customer (Pricing Schema Group).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR, UNIQUE) - Misal: 01, 02</li>
    <li>name (VARCHAR) - Misal: Retail, Wholesale, B2B</li>
</ul>

<h3>[NEW] Table: sales_schema_groups</h3>
<p>Master pengelompokan skema harga untuk sales area (Sales Schema Group).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR, UNIQUE) - Misal: JKT, SBY</li>
    <li>name (VARCHAR) - Misal: Domestic, Export</li>
</ul>

<h3>[NEW] Table: sales_pricing_determinations</h3>
<p>Matriks penentu pricing procedure penjualan berdasarkan kombinasi Sales Schema Group dan Customer Schema Group.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>sales_schema_group_id (BIGINT, FK → sales_schema_groups)</li>
    <li>customer_schema_group_id (BIGINT, FK, Nullable → customer_schema_groups)</li>
    <li>pricing_procedure_id (BIGINT, FK → pricing_procedures)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[MODIFY] Table: condition_types</h3>
<p>Tambahan kolom untuk Sales Pricing. Kode kondisi menggunakan terminologi produk sendiri.</p>
<ul>
    <li>code (VARCHAR) - PRC-LIST (Harga Jual), DISC-CST (Diskon Customer), DISC-GRP (Diskon Group), FRT-OUT (Freight Out), TAX-OUT (PPN Keluaran)</li>
    <li>entry_mode (VARCHAR) - AUTO, MANUAL</li>
    <li>is_taxable (BOOLEAN) - Masuk DPP PPN Keluaran?</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[MODIFY] Table: condition_records</h3>
<p>Mendukung hirarki harga: Customer-specific > Customer Group (Pricing Group) > Material.</p>
<ul>
    <li>currency_id (BIGINT, FK, Nullable → local_currencies)</li>
    <li>approved_by (BIGINT, FK, Nullable → users)</li>
    <li>approved_at (TIMESTAMP, Nullable)</li>
</ul>

<h3>[NEW] Table: sales_condition_records</h3>
<p>Master data nilai harga jual, diskon, dan promo penjualan dengan validitas tanggal.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>condition_type_id (BIGINT, FK → condition_types)</li>
    <li>customer_id (BIGINT, FK, Nullable → customers) - Mengisi Priority 1</li>
    <li>customer_group_id (BIGINT, FK, Nullable → customer_groups) - Mengisi Priority 2</li>
    <li>material_id (BIGINT, FK → items)</li>
    <li>amount_or_percent (DECIMAL(18,4))</li>
    <li>currency_id (BIGINT, FK, Nullable → local_currencies)</li>
    <li>valid_from (DATE)</li>
    <li>valid_to (DATE)</li>
    <li>is_active (BOOLEAN)</li>
    <li>created_by (BIGINT, FK → users)</li>
    <li>approved_by (BIGINT, FK, Nullable → users)</li>
    <li>approved_at (TIMESTAMP, Nullable)</li>
</ul>

<h3>[NEW] Table: sales_condition_scales</h3>
<p>Detail skala kuantitas minimum penjualan untuk diskon skala berjenjang (non-kumulatif).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>sales_condition_record_id (BIGINT, FK → sales_condition_records)</li>
    <li>minimum_quantity (DECIMAL) - Kuantitas minimum transaksi untuk mencapai skala ini</li>
    <li>rate (DECIMAL(18,4)) - Nilai diskon (rupiah/persen) atau harga khusus skala ini</li>
</ul>

<h3>[NEW] Table: sales_condition_tiers</h3>
<p>Detail urutan diskon bertingkat / kelipatan pada transaksi penjualan.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>sales_condition_record_id (BIGINT, FK → sales_condition_records)</li>
    <li>tier_index (INT) - Urutan perhitungan diskon bertingkat (misal: 1, 2, 3)</li>
    <li>rate (DECIMAL(18,4)) - Besaran persentase atau nominal diskon untuk tier ini</li>
</ul>

<h3>[NEW] Table: sales_free_goods_records</h3>
<p>Master data bonus barang gratis (inclusive/exclusive) dengan pendefinisian beban.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>sales_condition_record_id (BIGINT, FK → sales_condition_records)</li>
    <li>free_item_id (BIGINT, FK → items) - Item barang gratis yang diberikan</li>
    <li>free_quantity (DECIMAL) - Jumlah barang gratis</li>
    <li>free_uom_id (BIGINT, FK → base_uoms) - UOM barang gratis</li>
    <li>absorbed_by (VARCHAR) - INTERNAL (FROI) atau EXTERNAL (FROE)</li>
</ul>

<h3>[MODIFY] Table: sales_order_conditions</h3>
<p>Mendukung manual override dengan approval. Sudah ada di ERD 00, tambahan kolom:</p>
<ul>
    <li>is_manual_override (BOOLEAN) - Apakah nilai di-override manual?</li>
    <li>override_reason (TEXT, Nullable) - Wajib jika manual</li>
    <li>approved_by (BIGINT, FK, Nullable → users) - Approval jika override melampaui toleransi</li>
</ul>

<hr>
<h2>2.1. Customer Master — BRD 05 Update</h2>
<p>Perluasan dari tabel customers dan customer_groups yang sudah ada di ERD 00. Menambahkan kolom dan tabel baru sesuai BRD 05 dan Blueprint SD.</p>

<h3>[MODIFY] Table: customer_groups</h3>
<p>Tambahan kolom untuk mendukung 4-level Pricing Group dan link ke Pricing Procedure.</p>
<ul>
    <li>parent_id (BIGINT, FK, Nullable → customer_groups) - Self-referential untuk hierarki 4 level</li>
    <li>pricing_procedure_id (BIGINT, FK, Nullable → pricing_procedures) - Hanya untuk Level 4 (Pricing Group)</li>
    <li>distribution_channel_id (BIGINT, FK, Nullable → distribution_channels)</li>
</ul>

<h3>[MODIFY] Table: customers</h3>
<p>Tambahan kolom sesuai BRD 05 dan Blueprint SD. Semua query wajib difilter berdasarkan branch_id (branch_id).</p>
<ul>
    <li>customer_type (VARCHAR) - SOLD_TO, ONE_TIME</li>
    <li>number_range_group (VARCHAR) - 10SO, 10SH, 10SP, 10OT</li>
    <li>old_customer_code (VARCHAR, Nullable) - Mapping kode lama untuk migrasi data</li>
    <li>customer_group_4_id (BIGINT, FK → customer_groups) - PRICING GROUP. Wajib. Kunci ke Pricing Procedure</li>
    <li>schema_group_id (BIGINT, FK, Nullable → customer_schema_groups) - Untuk Sales Pricing Determination Matrix</li>
    <li>risk_category (VARCHAR) - HIGH, MEDIUM, LOW</li>
    <li>credit_limit (DECIMAL(18,2))</li>
    <li>credit_limit_seasonal (DECIMAL(18,2), Nullable) - Limit sementara saat Peak Season</li>
    <li>credit_limit_seasonal_until (DATE, Nullable)</li>
    <li>bank_guarantee_number (VARCHAR, Nullable)</li>
    <li>bank_guarantee_expired_at (DATE, Nullable)</li>
    <li>term_of_payment_id (BIGINT, FK → payment_terms)</li>
    <li>currency_id (BIGINT, FK → local_currencies)</li>
    <li>tax_classification (VARCHAR) - PKP, NON_PKP</li>
    <li>status (VARCHAR) - ACTIVE, BLOCKED, INACTIVE</li>
    <li>blocked_reason (TEXT, Nullable)</li>
    <li>approved_by (BIGINT, FK, Nullable → users)</li>
    <li>approved_at (TIMESTAMP, Nullable)</li>
    <li>recon_account_id (BIGINT, FK → gl_accounts) - WAJIB. AR-TRADE / AR-INTERCO / AR-STAFF / AR-OTHER</li>
</ul>

<h3>[NEW] Table: customer_ship_to_addresses</h3>
<p>Multi-alamat pengiriman per pelanggan (Ship-to Party). Setiap Ship-to punya Transportation Zone tersendiri.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>customer_id (BIGINT, FK → customers)</li>
    <li>ship_to_code (VARCHAR, UNIQUE) - Auto-generate range 10SH</li>
    <li>name (VARCHAR) - Nama lokasi / proyek</li>
    <li>address (TEXT)</li>
    <li>district (VARCHAR, Nullable)</li>
    <li>city (VARCHAR, Nullable)</li>
    <li>postal_code (VARCHAR, Nullable)</li>
    <li>region (VARCHAR, Nullable)</li>
    <li>transportation_zone_id (BIGINT, FK, Nullable → transportation_zones)</li>
    <li>contact_person (VARCHAR, Nullable)</li>
    <li>phone (VARCHAR, Nullable)</li>
    <li>latitude (DECIMAL(10,8), Nullable)</li>
    <li>longitude (DECIMAL(11,8), Nullable)</li>
    <li>is_default (BOOLEAN)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[NEW] Table: customer_credit_limit_logs</h3>
<p>Audit trail setiap perubahan Credit Limit pelanggan. Wajib melalui workflow approval.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>customer_id (BIGINT, FK → customers)</li>
    <li>old_credit_limit (DECIMAL(18,2))</li>
    <li>new_credit_limit (DECIMAL(18,2))</li>
    <li>change_reason (TEXT)</li>
    <li>requested_by (BIGINT, FK → users)</li>
    <li>approved_by (BIGINT, FK, Nullable → users)</li>
    <li>approved_at (TIMESTAMP, Nullable)</li>
    <li>status (VARCHAR) - PENDING, APPROVED, REJECTED</li>
    <li>effective_date (DATE)</li>
</ul>

<h3>[NEW] Table: customer_recon_account_logs</h3>
<p>Audit trail perubahan Reconciliation Account (AR Account) pelanggan. Perubahan pada pelanggan yang sudah bertransaksi wajib melalui approval Finance Controller.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>customer_id (BIGINT, FK → customers)</li>
    <li>old_recon_account_id (BIGINT, FK → gl_accounts)</li>
    <li>new_recon_account_id (BIGINT, FK → gl_accounts)</li>
    <li>change_reason (TEXT)</li>
    <li>requested_by (BIGINT, FK → users)</li>
    <li>approved_by (BIGINT, FK, Nullable → users)</li>
    <li>approved_at (TIMESTAMP, Nullable)</li>
    <li>status (VARCHAR) - PENDING, APPROVED, REJECTED</li>
    <li>effective_date (DATE)</li>
</ul>

<h3>[NEW] Table: customer_blocked_orders</h3>
<p>Log SO yang diblokir akibat Credit Check. Digunakan untuk proses release approval oleh pejabat berwenang.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>customer_id (BIGINT, FK → customers)</li>
    <li>sales_order_id (BIGINT, FK → sales_orders)</li>
    <li>block_reason (VARCHAR) - CREDIT_LIMIT_EXCEEDED, AR_OVERDUE, BANK_GUARANTEE_EXPIRED</li>
    <li>outstanding_ar (DECIMAL(18,2))</li>
    <li>so_value (DECIMAL(18,2))</li>
    <li>credit_limit (DECIMAL(18,2))</li>
    <li>released_by (BIGINT, FK, Nullable → users)</li>
    <li>released_at (TIMESTAMP, Nullable)</li>
    <li>release_note (TEXT, Nullable)</li>
    <li>status (VARCHAR) - BLOCKED, RELEASED, CANCELLED</li>
</ul>

<h3>[NEW] Table: customer_hierarchy_groups</h3>
<p>Master Holding Group untuk konsolidasi pelaporan penjualan per grup perusahaan (Astra, Indofood, Wings, dll).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR)</li>
    <li>name (VARCHAR)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[MODIFY] Table: customer_hierarchies → customer_hierarchy_members</h3>
<p>Pemetaan anggota (anak perusahaan) ke dalam Hierarchy Group.</p>
<ul>
    <li>customer_hierarchy_group_id (BIGINT, FK → customer_hierarchy_groups)</li>
    <li>customer_id (BIGINT, FK → customers)</li>
    <li>hierarchy_level (INT) - 1=Holding, 2=Subsidiary</li>
</ul>

<hr>
<h2>7.1. Vendor Master — BRD 06 Update</h2>
<p>Perluasan dari tabel suppliers dan supplier_banks yang sudah ada di ERD 00. Tabel suppliers di-rename menjadi vendors dengan field yang jauh lebih lengkap. Menambahkan Purchasing Organization, Purchasing Info Record, Reconciliation Account, dan Condition Vendor support.</p>

<h3>[NEW] Table: gl_accounts</h3>
<p>Master akun G/L sebagai referensi untuk Reconciliation Account vendor dan Account Key mapping di Pricing Engine. Bagian dari modul FI.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR, UNIQUE) - AP-TRADE, AP-FREIGHT, AP-INSUR, AP-SERVICE, INV-ACC, FRT-ACC, TAX-ACC, REV-ACC</li>
    <li>name (VARCHAR)</li>
    <li>account_type (VARCHAR) - ASSET, LIABILITY, EQUITY, REVENUE, EXPENSE</li>
    <li>account_class (VARCHAR) - RECONCILIATION (untuk AP/AR sub-ledger), NORMAL (G/L biasa)</li>
    <li>normal_balance (VARCHAR) - DEBIT, CREDIT</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[NEW] Table: purchasing_organizations</h3>
<p>Master organisasi pengadaan terpusat. Sesuai Blueprint MM: DCHO (Centralized Purchasing Organization).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>company_id (BIGINT, FK → companies)</li>
    <li>schema_group_id (BIGINT, FK, Nullable → purchasing_schema_groups) - Untuk Pricing Determination Matrix</li>
    <li>code (VARCHAR, UNIQUE) - DCHO</li>
    <li>name (VARCHAR)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[NEW] Table: purchasing_groups</h3>
<p>Pengelompokan buyer/tim pengadaan. Sesuai Blueprint MM: D01 (Trade), D02 (Non-Trade).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>purchasing_organization_id (BIGINT, FK → purchasing_organizations)</li>
    <li>code (VARCHAR) - D01, D02</li>
    <li>name (VARCHAR)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[MODIFY] Table: vendors (General Data)</h3>
<p>Tabel utama master data vendor. Pusat gravitasi metadata identitas lintas organisasi.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>vendor_code (VARCHAR, UNIQUE) - Auto-generate sesuai number range group</li>
    <li>number_range_group (VARCHAR) - 20TR, 20FF, 20IN, 20NT, 20OT</li>
    <li>vendor_type (VARCHAR) - TRADE, FORWARDER, INSURANCE, NON_TRADE, ONE_TIME</li>
    <li>schema_group_id (BIGINT, FK, Nullable → vendor_schema_groups) - Untuk Pricing Determination Matrix</li>
    <li>name (VARCHAR)</li>
    <li>industry (VARCHAR, Nullable) - Klasifikasi industri</li>
    <li>vendor_group (VARCHAR, Nullable) - Klasifikasi pelaporan</li>
    <li>country_origin (VARCHAR) - ID (Lokal), US/CN/dll (Overseas/Impor)</li>
    <li>address (TEXT, Nullable)</li>
    <li>district (VARCHAR, Nullable)</li>
    <li>city (VARCHAR, Nullable)</li>
    <li>postal_code (VARCHAR, Nullable)</li>
    <li>region (VARCHAR, Nullable)</li>
    <li>phone (VARCHAR, Nullable)</li>
    <li>email (VARCHAR, Nullable)</li>
    <li>contact_person (VARCHAR, Nullable)</li>
    <li>npwp (VARCHAR, Nullable, UNIQUE) - Wajib jika PKP lokal</li>
    <li>pkp_name (VARCHAR, Nullable)</li>
    <li>pkp_address (TEXT, Nullable)</li>
    <li>tax_status (VARCHAR) - PKP, NON_PKP</li>
    <li>status (VARCHAR) - ACTIVE, INACTIVE, ARCHIVED</li>
    <li>blocked_reason (TEXT, Nullable)</li>
    <li>created_by (BIGINT, FK → users)</li>
    <li>approved_by (BIGINT, FK, Nullable → users)</li>
    <li>approved_at (TIMESTAMP, Nullable)</li>
</ul>

<h3>[NEW] Table: vendor_companies (Company Code Data)</h3>
<p>Pengaturan parameter akuntansi (AP) spesifik per Perusahaan (Company Code).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>vendor_id (BIGINT, FK → vendors)</li>
    <li>company_id (BIGINT, FK → companies)</li>
    <li>recon_account_id (BIGINT, FK → gl_accounts) - WAJIB. Akun penampung hutang</li>
    <li>payment_terms_id (BIGINT, FK → payment_terms)</li>
    <li>payment_method (VARCHAR, Nullable) - CASH, TRANSFER, GIRO</li>
    <li>withholding_tax_code (VARCHAR, Nullable) - Kode PPh (PPH23, PPH21, dll)</li>
    <li>posting_block (BOOLEAN, DEFAULT: false) - Blokir pembuatan Invoice/Jurnal AP</li>
    <li>payment_block (BOOLEAN, DEFAULT: false) - Blokir pencairan pembayaran</li>
</ul>

<h3>[NEW] Table: vendor_purchasing_orgs (Purchasing Org Data)</h3>
<p>Pengaturan kendali toleransi dan blokir khusus transaksi Pengadaan (PO).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>vendor_id (BIGINT, FK → vendors)</li>
    <li>purchasing_organization_id (BIGINT, FK → purchasing_organizations)</li>
    <li>purchasing_group_id (BIGINT, FK → purchasing_groups)</li>
    <li>currency_id (BIGINT, FK → local_currencies) - Order Currency</li>
    <li>incoterm (VARCHAR, Nullable) - FOB, CIF, DDP, DAP</li>
    <li>delivery_tolerance_over (DECIMAL, DEFAULT: 0) - % Kelebihan GR</li>
    <li>delivery_tolerance_under (DECIMAL, DEFAULT: 0) - % Kekurangan GR</li>
    <li>gr_based_invoice (BOOLEAN, DEFAULT: false) - Cegah Invoice tanpa GR</li>
    <li>eval_receipt_settlement (BOOLEAN, DEFAULT: false) - ERS (Auto payment post-GR)</li>
    <li>purchasing_block (BOOLEAN, DEFAULT: false) - Blokir pembuatan PO baru</li>
</ul>

<h3>[NEW] Table: vendor_partner_functions</h3>
<p>Pemetaan peran tagihan & pengiriman ke vendor lain (Branch/Holding).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>vendor_id (BIGINT, FK → vendors) - Vendor Utama</li>
    <li>partner_role (VARCHAR) - ORDERING, GOODS_SUPPLIER, INVOICE, PAYEE</li>
    <li>assigned_vendor_id (BIGINT, FK → vendors) - Vendor penampung peran (Bisa diri sendiri)</li>
</ul>

<h3>[MODIFY] Table: vendor_banks (rename dari supplier_banks)</h3>
<p>Tambahan kolom untuk mendukung vendor asing: currency_id, swift_code, bank_branch.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>vendor_id (BIGINT, FK → vendors)</li>
    <li>bank_name (VARCHAR)</li>
    <li>bank_branch (VARCHAR, Nullable)</li>
    <li>account_number (VARCHAR)</li>
    <li>account_name (VARCHAR)</li>
    <li>currency_id (BIGINT, FK, Nullable → local_currencies)</li>
    <li>swift_code (VARCHAR, Nullable) - Untuk transfer internasional</li>
    <li>is_primary (BOOLEAN)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[NEW] Table: purchasing_info_records</h3>
<p>Master data harga beli per kombinasi Vendor + Material (Purchasing Info Record). Sesuai Blueprint MM proses "Maintain Harga Beli". Sumber harga otomatis saat pembuatan PO Trading Goods.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>vendor_id (BIGINT, FK → vendors) - Hanya vendor tipe TRADE (20TR)</li>
    <li>material_id (BIGINT, FK → items)</li>
    <li>purchasing_organization_id (BIGINT, FK → purchasing_organizations)</li>
    <li>branch_id (BIGINT, FK, Nullable → branches) - NULL = berlaku semua cabang</li>
    <li>net_price (DECIMAL(18,4))</li>
    <li>currency_id (BIGINT, FK → local_currencies)</li>
    <li>uom_id (BIGINT, FK → base_uoms)</li>
    <li>moq (DECIMAL, Nullable) - Minimum Order Quantity</li>
    <li>lead_time_days (INT, Nullable)</li>
    <li>valid_from (DATE)</li>
    <li>valid_to (DATE)</li>
    <li>is_active (BOOLEAN)</li>
    <li>created_by (BIGINT, FK → users)</li>
    <li>approved_by (BIGINT, FK, Nullable → users)</li>
    <li>approved_at (TIMESTAMP, Nullable)</li>
</ul>

<h3>[NEW] Table: vendor_recon_account_logs</h3>
<p>Audit trail perubahan Reconciliation Account. Perubahan pada vendor yang sudah bertransaksi wajib melalui approval Finance Controller.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>vendor_id (BIGINT, FK → vendors)</li>
    <li>old_recon_account_id (BIGINT, FK → gl_accounts)</li>
    <li>new_recon_account_id (BIGINT, FK → gl_accounts)</li>
    <li>change_reason (TEXT)</li>
    <li>requested_by (BIGINT, FK → users)</li>
    <li>approved_by (BIGINT, FK, Nullable → users)</li>
    <li>approved_at (TIMESTAMP, Nullable)</li>
    <li>status (VARCHAR) - PENDING, APPROVED, REJECTED</li>
    <li>effective_date (DATE)</li>
</ul>

<h3>[NEW] Table: vendor_block_logs</h3>
<p>Log pemblokiran/pengaktifan kembali vendor untuk audit trail.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>vendor_id (BIGINT, FK → vendors)</li>
    <li>action (VARCHAR) - BLOCKED, UNBLOCKED, DEACTIVATED</li>
    <li>reason (TEXT)</li>
    <li>actioned_by (BIGINT, FK → users)</li>
</ul>
<hr>
<h2>Logistics Execution (Shipment Plan)</h2>
<h3>[NEW] Table: shipment_headers (Logistics Plan)</h3><ul><li>id (BIGINT, PK)</li><li>transporter_id (BIGINT, FK)</li><li>vehicle_id (BIGINT, FK)</li><li>driver_id (BIGINT, FK)</li><li>route (VARCHAR)</li><li>max_weight (DECIMAL)</li><li>max_volume (DECIMAL)</li><li>status (VARCHAR) - Planned, Loading, In Transit, Completed</li></ul><h3>[NEW] Table: shipment_lines</h3><ul><li>id (BIGINT, PK)</li><li>shipment_header_id (BIGINT, FK)</li><li>delivery_header_id (BIGINT, FK)</li><li>aggregated_weight (DECIMAL)</li><li>aggregated_volume (DECIMAL)</li></ul>
<h3>[NEW] Table: shipment_costs</h3><ul><li><code>id</code> (BIGINT, PK)</li><li><code>shipment_header_id</code> (BIGINT, FK)</li><li><code>basic_freight</code> (DECIMAL)</li><li><code>toll_fee</code> (DECIMAL)</li><li><code>parking_fee</code> (DECIMAL)</li><li><code>other_fees</code> (DECIMAL)</li><li><code>total_actual_cost</code> (DECIMAL)</li><li><code>cost_status</code> (VARCHAR) - Pending, Realized</li><li><code>realized_at</code> (TIMESTAMP)</li><li><code>realized_by</code> (BIGINT, FK)</li></ul>
<hr>
<h3>[NEW] Table: sales_order_types</h3>
<p>Jenis dokumen sales order (O2C).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR)</li>
    <li>name (VARCHAR)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[NEW] Table: delivery_types</h3>
<p>Jenis dokumen pengiriman/delivery (O2C).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR)</li>
    <li>name (VARCHAR)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[NEW] Table: sales_invoice_types</h3>
<p>Jenis faktur/invoice penjualan (O2C).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR)</li>
    <li>name (VARCHAR)</li>
    <li>is_active (BOOLEAN)</li>
</ul>

<h3>[NEW] Table: models</h3>
<p>Pendaftaran model sistem untuk audit trail log.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>name (VARCHAR)</li>
    <li>class_name (VARCHAR)</li>
</ul>

<h3>[NEW] Table: alt_uoms</h3>
<p>Satuan alternatif barang.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR)</li>
    <li>name (VARCHAR)</li>
</ul>

<h3>[NEW] Table: account_determinations</h3>
<p>Mapping akun dinamis berdasarkan transaksi.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>company_id (BIGINT, FK → companies)</li>
    <li>business_function_key (VARCHAR) - Misal: SALES_REVENUE, GR_IR_CLEARING, SERVICE_ACCRUAL</li>
    <li>item_category_id (BIGINT, FK, Nullable) - Pembeda material vs jasa</li>
    <li>tax_code_id (BIGINT, FK, Nullable) - Pembeda PPN per kode pajak</li>
    <li>posting_group_id (BIGINT, FK, Nullable) - Pembeda segmentasi pelanggan/vendor</li>
    <li>coa_id (BIGINT, FK → coas) - Akun tujuan</li>
</ul>

<hr>
<h2>Asset Accounting (FI-AA) / Fixed Assets</h2>
<h3>[NEW] Table: asset_classes</h3>
<p>Kelas aset untuk klasifikasi aktiva dan penentuan parameter penyusutan default.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>code (VARCHAR, Unique)</li>
    <li>name (VARCHAR)</li>
    <li>account_determination_id (BIGINT, FK)</li>
    <li>number_range_group (VARCHAR)</li>
</ul>

<h3>[NEW] Table: fixed_assets</h3>
<p>Master Data utama untuk Aktiva Tetap.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>company_id (BIGINT, FK)</li>
    <li>asset_class_id (BIGINT, FK)</li>
    <li>asset_code (VARCHAR, Unique)</li>
    <li>sub_number (VARCHAR)</li>
    <li>name (VARCHAR)</li>
    <li>description (TEXT)</li>
    <li>serial_number (VARCHAR)</li>
    <li>inventory_number (VARCHAR)</li>
    <li>quantity (DECIMAL)</li>
    <li>uom_id (BIGINT, FK)</li>
    <li>capitalization_date (DATE)</li>
    <li>deactivation_date (DATE)</li>
    <li>status (VARCHAR)</li>
</ul>

<h3>[NEW] Table: fixed_asset_depreciation_areas</h3>
<p>Konfigurasi penyusutan (Buku, Pajak, dll) per aset.</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>fixed_asset_id (BIGINT, FK)</li>
    <li>depreciation_area (VARCHAR)</li>
    <li>depreciation_key_id (BIGINT)</li>
    <li>useful_life_years (INT)</li>
    <li>useful_life_periods (INT)</li>
    <li>depreciation_start_date (DATE)</li>
    <li>scrap_value (DECIMAL)</li>
</ul>

<h3>[NEW] Table: fixed_asset_assignments</h3>
<p>Relasi penempatan lokasi dan alokasi biaya aset secara historis (time-dependent).</p>
<ul>
    <li>id (BIGINT, PK)</li>
    <li>fixed_asset_id (BIGINT, FK)</li>
    <li>branch_id (BIGINT, FK)</li>
    <li>cost_center_id (BIGINT, FK)</li>
    <li>location_name (VARCHAR)</li>
    <li>valid_from (DATE)</li>
    <li>valid_to (DATE)</li>
</ul>

<h3>Injected Tables (FSD-005 to FSD-025)</h3><pre><code class="language-dbml">
Table bp_groups {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  type VARCHAR
  is_internal BOOLEAN
  number_prefix VARCHAR
  status VARCHAR
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table bp_roles {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  category VARCHAR
  description TEXT
  is_active BOOLEAN
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table currencies {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  symbol VARCHAR
  decimal_places INT
  is_base_currency BOOLEAN
  is_active BOOLEAN
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table posting_period_variants {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  company_id BIGINT
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table posting_periods {
  id BIGINT [primary key]
  posting_period_variant_id BIGINT
  fiscal_year INT
  period_number INT
  status VARCHAR
  start_date DATE
  end_date DATE
  opened_until TIMESTAMP
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table number_ranges {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  prefix VARCHAR
  suffix VARCHAR
  digit_length INT
  start_number BIGINT
  end_number BIGINT
  current_number BIGINT
  reset_yearly BOOLEAN
  current_year INT
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table gl_account_groups {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  number_from VARCHAR
  number_to VARCHAR
  account_class VARCHAR
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table field_status_groups {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table field_status_details {
  id BIGINT [primary key]
  field_status_group_id BIGINT
  field_name VARCHAR
  status VARCHAR
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table retained_earning_configs {
  id BIGINT [primary key]
  company_id BIGINT
  chart_of_account_id BIGINT
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table year_end_close_logs {
  id BIGINT [primary key]
  company_id BIGINT
  fiscal_year VARCHAR
  status VARCHAR
  retained_earning_amount DECIMAL
  closing_journal_id BIGINT
  error_message TEXT
  executed_by BIGINT
  executed_at TIMESTAMP
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table bank_accounts {
  id BIGINT [primary key]
  house_bank_id BIGINT
  chart_of_account_id BIGINT
  account_number VARCHAR
  account_name VARCHAR
  currency_code VARCHAR
  is_active BOOLEAN
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table controlling_areas {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  currency_code VARCHAR
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table company_controlling_areas {
  id BIGINT [primary key]
  company_id BIGINT
  controlling_area_id BIGINT
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table cost_center_groups {
  id BIGINT [primary key]
  controlling_area_id BIGINT
  parent_id BIGINT
  code VARCHAR
  name VARCHAR
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table auto_journal_mappings {
  id BIGINT [primary key]
  company_id BIGINT
  module_source VARCHAR
  transaction_key VARCHAR
  item_category_id BIGINT
  customer_group_id BIGINT
  chart_of_account_id BIGINT
  dc_indicator VARCHAR
  description VARCHAR
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table tax_codes {
  id BIGINT [primary key]
  company_id BIGINT
  tax_code VARCHAR
  description VARCHAR
  tax_type VARCHAR
  tax_rate DECIMAL
  chart_of_account_id BIGINT
  is_active BOOLEAN
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table material_types {
  id BIGINT [primary key]
  type_code VARCHAR
  description VARCHAR
  is_quantity_updated BOOLEAN
  is_value_updated BOOLEAN
  is_sales_allowed BOOLEAN
  is_purchase_allowed BOOLEAN
  document_numbering_id BIGINT
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table valuation_classes {
  id BIGINT [primary key]
  class_code VARCHAR
  description VARCHAR
  material_type_id BIGINT
  is_active BOOLEAN
  created_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  updated_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  deleted_by BIGINT [null, note: &#039;Foreign Key ke users.id&#039;]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table asset_classes {
  id BIGINT [primary key]
  code VARCHAR(20) [unique]
  name VARCHAR(100)
  account_determination_id BIGINT
  number_range_group VARCHAR(10)
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
}

Table fixed_assets {
  id BIGINT [primary key]
  company_id BIGINT
  asset_class_id BIGINT
  asset_code VARCHAR(30) [unique]
  sub_number VARCHAR(10)
  name VARCHAR(255)
  description TEXT
  serial_number VARCHAR(100)
  inventory_number VARCHAR(100)
  quantity DECIMAL(15,2)
  uom_id BIGINT
  capitalization_date DATE
  deactivation_date DATE
  status VARCHAR(30)
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
}

Table fixed_asset_depreciation_areas {
  id BIGINT [primary key]
  fixed_asset_id BIGINT
  depreciation_area VARCHAR(20)
  depreciation_key_id BIGINT
  useful_life_years INT
  useful_life_periods INT
  depreciation_start_date DATE
  scrap_value DECIMAL(19,4)
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
}

Table fixed_asset_assignments {
  id BIGINT [primary key]
  fixed_asset_id BIGINT
  branch_id BIGINT
  cost_center_id BIGINT
  location_name VARCHAR(255)
  valid_from DATE
  valid_to DATE
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
}

Ref: fixed_assets.company_id > companies.id
Ref: fixed_assets.asset_class_id > asset_classes.id
Ref: fixed_assets.uom_id > base_uoms.id
Ref: fixed_asset_depreciation_areas.fixed_asset_id > fixed_assets.id
Ref: fixed_asset_assignments.fixed_asset_id > fixed_assets.id
Ref: fixed_asset_assignments.branch_id > branches.id
Ref: fixed_asset_assignments.cost_center_id > cost_centers.id

</code></pre>',
          'dbml' => 'Table companies {
  id BIGINT [primary key]
  company_code VARCHAR(10) [unique, note: \'Kode unik perusahaan (Ref: BR-01)\']
  company_name VARCHAR(100) [note: \'Nama komersial\']
  legal_name VARCHAR(150) [note: \'Nama hukum untuk Faktur/Tax\']
  address TEXT [note: \'Alamat fisik kantor pusat\']
  country_id BIGINT 
  province_id BIGINT 
  city_id BIGINT 
  postal_code VARCHAR(20)
  phone VARCHAR(30)
  email VARCHAR(100)
  npwp VARCHAR(20) [unique, note: \'Nomor Pokok Wajib Pajak\']
  pkp_status BOOLEAN [default: false, note: \'Status PKP\']
  kpp VARCHAR(100)
  nib VARCHAR(50)
  business_license VARCHAR(100)
  tax_address TEXT [note: \'Alamat pajak (Fallback ke address)\']
  tax_country_id BIGINT 
  default_tax_code_id BIGINT
  base_currency_id BIGINT [note: \'Mata uang pelaporan mutlak\']
  fiscal_year_variant_id BIGINT
  time_zone VARCHAR(50) [default: \'Asia/Jakarta\']
  default_language VARCHAR(10) [default: \'id\']
  coa_template_id BIGINT
  credit_control_area_id BIGINT

  status VARCHAR(20) [note: \'draft, active, inactive, archived\']
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table brands {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
}

Table branches {
  id BIGINT [primary key]
  company_id BIGINT [note: \'Mandatory Induk\']
  branch_code VARCHAR(20) [unique, note: \'Kode Alfanumerik (Ref: VAL-01)\']
  branch_name VARCHAR(150)
  address TEXT
  city_id BIGINT 
  postal_code VARCHAR(15)
  phone_number VARCHAR(30)
  email VARCHAR(100)
  npwp_cabang VARCHAR(25) [note: \'Opsional jika ikut NPWP Pusat\']
  kpp_lokal VARCHAR(100)
  default_currency_id BIGINT [note: \'Transaksi tunai kas cabang\']
  profit_center VARCHAR [note: \'Kode Profit Center CO\']
  timezone VARCHAR(50) [default: \'Asia/Jakarta\']
  manager_id BIGINT [note: \'Kepala Cabang\']
  status VARCHAR(20) [note: \'active, inactive\']
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table storage_locations {
  id BIGINT [primary key]
  branch_id BIGINT [note: \'Relasi mutlak (Ref: BR-01)\']
  storage_code VARCHAR(20) [note: \'Membentuk Composite Unique dengan branch_id\']
  storage_name VARCHAR(150)
  storage_type VARCHAR(50) [note: \'main, quarantine, transit, scrap\']
  address TEXT
  status VARCHAR(20) [note: \'active, inactive\']
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table bins {
  id BIGINT [primary key]
  storage_location_id BIGINT
  code VARCHAR
  name VARCHAR [note: \'Misal: Rak A1, Rak B2\']
}

Table sales_employees {
  id BIGINT [primary key]
  branch_id BIGINT
  code VARCHAR [note: \'NIK / Sales Code\']
  name VARCHAR
}

Table visit_routes {
  id BIGINT [primary key]
  sales_employee_id BIGINT [note: \'Salesman penanggung jawab rute ini\']
  code VARCHAR
  name VARCHAR [note: \'Misal: Rute Senin - Pasar Pagi\']
  day_of_week INT [null, note: \'Hari kunjungan (1=Senin, 7=Minggu)\']
}

Table customer_groups {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  level INT [note: \'0, 1, 2, 3, 4\']
  parent_id BIGINT [null, note: \'Self-referential untuk hierarki 4 level\']
  pricing_procedure_id BIGINT [null, note: \'Hanya untuk Level 4 (Pricing Group)\']
  distribution_channel_id BIGINT [null]
}

Table customer_hierarchies {
  id BIGINT [primary key]
  customer_group_1_id BIGINT
  customer_group_2_id BIGINT
  customer_group_3_id BIGINT
  customer_group_4_id BIGINT
  customer_hierarchy_group_id BIGINT
  customer_id BIGINT
  hierarchy_level INT [note: \'1=Holding, 2=Subsidiary\']
}

Table transportation_zones {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
}

Table customers {
  id BIGINT [primary key]
  customer_code VARCHAR [note: \'Running Number internal (Ditentukan oleh Account Group)\']
  old_customer_code VARCHAR [null, note: \'Mapping kode lama untuk migrasi data\']
  account_group VARCHAR [note: \'DOMESTIC, EXPORT, CPD, EMPLOYEE (Pengunci Number Range)\']
  status VARCHAR [note: \'ACTIVE, BLOCKED, INACTIVE\']
  schema_group_id BIGINT [null, ref: > customer_schema_groups.id]
  name VARCHAR
  customer_group_0_id BIGINT [note: \'Kategori Umum (Independen)\']
  customer_group_1_id BIGINT
  customer_group_2_id BIGINT
  customer_group_3_id BIGINT
  customer_group_4_id BIGINT [note: \'PRICING GROUP. Wajib. Kunci ke Pricing Procedure\']
  transportation_zone_id BIGINT
  risk_category VARCHAR [note: \'HIGH, MEDIUM, LOW\']
  search_term_1 VARCHAR [null, note: \'Kata kunci pencarian utama\']
  search_term_2 VARCHAR [null, note: \'Kata kunci pencarian sekunder\']
  address TEXT [note: \'Nama Jalan / Nomor Rumah\']
  district VARCHAR [null, note: \'Kecamatan\']
  city VARCHAR [null, note: \'Kota / Kabupaten\']
  postal_code VARCHAR [null, note: \'Kode Pos\']
  region VARCHAR [null, note: \'Provinsi (Region)\']
  country VARCHAR [null, note: \'Negara\']
  latitude DECIMAL [null, note: \'Titik kordinat GPS\']
  longitude DECIMAL [null, note: \'Titik kordinat GPS\']
  phone VARCHAR [null, note: \'Nomor Telepon\']
  email VARCHAR [null, note: \'Email Utama\']
  npwp VARCHAR [null, note: \'Nomor Pokok Wajib Pajak\']
  pkp_name VARCHAR [null, note: \'Nama NPWP/PKP\']
  tax_classification VARCHAR [note: \'PKP, NON_PKP\']
  nik_ktp VARCHAR [null, note: \'NIK / Nomor KTP\']
  incoterm VARCHAR [null, note: \'Default metode pengiriman (Misal: DELIVERED / PICKUP)\']
  delivery_priority INT [null, note: \'Prioritas pengiriman (Misal: 1=High, 2=Normal)\']
  visit_route_id BIGINT [null, note: \'Terikat ke rute kunjungan (Jadwal visit Salesman)\']
  customer_type VARCHAR [note: \'SOLD_TO, ONE_TIME\']
  number_range_group VARCHAR [note: \'10SO, 10SH, 10SP, 10OT\']
  credit_limit DECIMAL
  credit_limit_seasonal DECIMAL [null, note: \'Limit sementara saat Peak Season\']
  credit_limit_seasonal_until DATE [null]
  bank_guarantee_number VARCHAR [null]
  bank_guarantee_expired_at DATE [null]
  term_of_payment_id BIGINT
  currency_id BIGINT
  blocked_reason TEXT [null]
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
  recon_account_id BIGINT [note: \'WAJIB. AR-TRADE / AR-INTERCO / AR-STAFF / AR-OTHER\']
}

Table customer_companies {
  id BIGINT [primary key]
  customer_id BIGINT
  company_id BIGINT
  recon_account_id BIGINT [note: \'Akun Piutang (Reconciliation Account / Terhubung ke tabel coas)\']
  payment_term_days INT [note: \'Termin pembayaran default untuk tagihan di perusahaan ini\']
  credit_limit DECIMAL [note: \'Fasilitas batas maksimal hutang + exposure\']
  posting_block BOOLEAN [note: \'Membekukan kemampuan input Jurnal/Invoice ke entitas ini\']
}

Table customer_sales_areas {
  id BIGINT [primary key]
  customer_id BIGINT
  sales_area_id BIGINT [note: \'Relasi absolut ke entitas Sales Area\']
  branch_id BIGINT [note: \'Default cabang yang menangani\']
  pricing_group_id BIGINT [null, note: \'Referensi penarik diskon harga\']
  order_block BOOLEAN [note: \'Cegah pembuatan SO baru\']
  delivery_block BOOLEAN [note: \'Cegah pencetakan Surat Jalan/DO\']
  billing_block BOOLEAN [note: \'Cegah pembuatan Faktur Tagihan\']
}

Table customer_partner_functions {
  id BIGINT [primary key]
  customer_id BIGINT [note: \'Pelanggan utama (Sold-To)\']
  sales_area_id BIGINT
  partner_function VARCHAR [note: \'SH (Ship-To), BP (Bill-To), PY (Payer)\']
  partner_customer_id BIGINT [note: \'Pelanggan tujuan/relasi\']
}

Table customer_banks {
  id BIGINT [primary key]
  customer_id BIGINT
  bank_name VARCHAR
  account_number VARCHAR
  account_name VARCHAR
  is_primary BOOLEAN
}

Table material_groups {
  id BIGINT [primary key]
  level INT [note: \'Kedalaman Level (0, 1, 2, 3, atau 4)\']
  code VARCHAR
  name VARCHAR
}

Table material_hierarchies {
  id BIGINT [primary key]
  material_group_1_id BIGINT
  material_group_2_id BIGINT
  material_group_3_id BIGINT
  material_group_4_id BIGINT
}

Table materials {
  id BIGINT [primary key]
  material_group_0_id BIGINT [null, note: \'Kategori Umum\']
  material_group_1_id BIGINT [null]
  material_group_2_id BIGINT [null]
  material_group_3_id BIGINT [null]
  material_group_4_id BIGINT [null]
  brand_id BIGINT [null]
  material_code VARCHAR [note: \'Material Number / Kode Global\']
  barcode VARCHAR [null, note: \'EAN/UPC\']
  hscode VARCHAR [null, note: \'Harmonized System Code\']
  description VARCHAR [note: \'Nama Barang\']
  base_uom_id BIGINT [note: \'Relasi ke master uoms\']
  weight DECIMAL [null, note: \'Berat kotor berdasarkan Base UoM\']
  volume DECIMAL [null, note: \'Volume berdasarkan Base UoM\']
  material_type_id BIGINT [note: \'(TRAD, NTRD, SERV)\']
  status VARCHAR [note: \'ACTIVE, INACTIVE, OBSOLETE\']
}

Table base_uoms {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
}

Table material_uom_conversions {
  id BIGINT [primary key]
  material_id BIGINT
  alt_uom_id BIGINT [note: \'Satuan Alternatif\']
  alt_qty DECIMAL [note: \'Kuantitas Alternatif UoM\']
  base_uom_id BIGINT [note: \'Satuan Dasar\']
  base_qty DECIMAL [note: \'Kuantitas Base UoM\']
}

Table material_branches {
  id BIGINT [primary key]
  material_id BIGINT
  branch_id BIGINT
  mrp_type VARCHAR [note: \'(Misal: PD = MRP, ND = No Planning)\']
  safety_stock DECIMAL [note: \'Stok aman minimal di cabang ini\']
  reorder_point DECIMAL [note: \'Titik pemesanan ulang otomatis\']
  is_batch_managed BOOLEAN
  is_serial_managed BOOLEAN
  shelf_life_days INT [null]
}

Table material_companies {
  id BIGINT [primary key]
  material_id BIGINT
  company_id BIGINT
  valuation_class VARCHAR [note: \'Klasifikasi integrasi GL Account\']
  costing_method VARCHAR [note: \'STANDARD, MOVING_AVERAGE\']
  standard_cost DECIMAL [note: \'HPP Standar / MAP Saat ini\']
  inventory_account_id BIGINT [null]
  cogs_account_id BIGINT [null]
}

Table material_sales_orgs {
  id BIGINT [primary key]
  material_id BIGINT
  sales_organization_id BIGINT
  sales_uom_id BIGINT [null, note: \'Default satuan jual\']
  tax_group_id BIGINT [null, note: \'Kelompok pajak (PPN)\']
  pricing_group_id BIGINT [null, note: \'Grup pricing/diskon\']
  is_blocked_sell BOOLEAN
}

Table material_purchasing_orgs {
  id BIGINT [primary key]
  material_id BIGINT
  purchasing_organization_id BIGINT
  purchase_uom_id BIGINT [null, note: \'Default satuan beli\']
  preferred_vendor_id BIGINT [null]
  lead_time_days INT [null]
  moq DECIMAL [null]
  is_blocked_buy BOOLEAN
}

Table batches {
  id BIGINT [primary key]
  material_id BIGINT
  batch_number VARCHAR [note: \'Nomor Lot/Batch\']
  production_date DATE [null, note: \'Tanggal Produksi\']
  expiration_date DATE [null, note: \'Tanggal Kedaluwarsa (Expired Date)\']
  is_restricted BOOLEAN [note: \'Status block (Misal: Karantina)\']
}

Table serial_numbers {
  id BIGINT [primary key]
  material_id BIGINT
  batch_id BIGINT [null]
  branch_id BIGINT [note: \'Posisi fisik barang saat ini\']
  serial_number VARCHAR [note: \'IMEI / VIN\']
  status VARCHAR [note: \'AVAILABLE, ISSUED, SCRAPPED\']
  is_restricted BOOLEAN
  last_movement_id BIGINT [null]
}

Table price_change_documents {
  id BIGINT [primary key]
  document_number VARCHAR
  posting_date DATE
  reason TEXT [null]
  status VARCHAR [note: \'DRAFT, POSTED, CANCELED\']
}

Table price_change_lines {
  id BIGINT [primary key]
  price_change_document_id BIGINT
  material_id BIGINT
  company_id BIGINT [note: \'Karena harga melekat di Company\']
  old_price DECIMAL
  new_price DECIMAL
  qty_on_hand DECIMAL
  revaluation_amount DECIMAL
}

Table material_price_ledgers {
  id BIGINT [primary key]
  material_id BIGINT
  company_id BIGINT
  period VARCHAR [note: \'Format YYYY-MM (Misal: 2026-07)\']
  opening_qty DECIMAL
  opening_value DECIMAL
  receipt_qty DECIMAL
  receipt_value DECIMAL
  issue_qty DECIMAL
  issue_value DECIMAL
  closing_qty DECIMAL
  closing_value DECIMAL
  periodic_unit_price DECIMAL [note: \'HPP Aktual (Actual Cost)\']
}

Table customer_schema_groups {
  id BIGINT [pk]
  code VARCHAR(10)
  name VARCHAR(100)
}

Table sales_schema_groups {
  id BIGINT [pk]
  code VARCHAR(10)
  name VARCHAR(100)
}

Table sales_pricing_determinations {
  id BIGINT [pk]
  sales_schema_group_id BIGINT [ref: > sales_schema_groups.id]
  customer_schema_group_id BIGINT [null, ref: > customer_schema_groups.id]
  pricing_procedure_id BIGINT [ref: > pricing_procedures.id]
  is_active BOOLEAN
}

Table vendor_schema_groups {
  id BIGINT [pk]
  code VARCHAR(10)
  name VARCHAR(100)
}

Table purchasing_schema_groups {
  id BIGINT [pk]
  code VARCHAR(10)
  name VARCHAR(100)
}

Table purchase_pricing_determinations {
  id BIGINT [pk]
  purchasing_schema_group_id BIGINT [ref: > purchasing_schema_groups.id]
  vendor_schema_group_id BIGINT [null, ref: > vendor_schema_groups.id]
  pricing_procedure_id BIGINT [ref: > pricing_procedures.id]
  is_active BOOLEAN
}

Table pricing_procedures {
  id BIGINT [primary key]
  type VARCHAR [note: \'V untuk Sales, M untuk Purchasing\']
  code VARCHAR [note: \'Misal: ZSTD01 (Standard Pricing)\']
  name VARCHAR
  module VARCHAR [note: \'SALES, PURCHASE\']
  is_active BOOLEAN
}

Table pricing_procedure_steps {
  id BIGINT [primary key]
  pricing_procedure_id BIGINT
  step_number INT [note: \'Urutan perhitungan (Misal: 10, 20, 30)\']
  condition_type_id BIGINT [null, note: \'Jika step ini menarik kondisi (Misal: PR00)\']
  calculation_type VARCHAR [note: \'BASE_PRICE, DISCOUNT, SUBTOTAL, TAX, FREIGHT\']
  from_step INT [null, note: \'Basis awal persentase dihitung dari step mana\']
  to_step INT [null, note: \'Basis akhir persentase (Mendukung Subtotal Cascading Range)\']
  is_statistical BOOLEAN [note: \'Nilai tidak tampil di Invoice pelanggan\']
  account_key VARCHAR [null, note: \'REV-ACC, DISC-ACC, FRT-ACC, TAX-ACC\']
  is_revenue BOOLEAN [note: \'Apakah mempengaruhi Net Revenue?\']
  is_printed_on_invoice BOOLEAN [note: \'Tampil di cetak Invoice?\']
  spare_step_note VARCHAR [null, note: \'Keterangan jika step ini adalah spare/placeholder\']
}

Table condition_types {
  id BIGINT [primary key]
  code VARCHAR [note: \'PRC-LIST (Harga Jual), DISC-CST (Diskon Customer), DISC-GRP (Diskon Group), FRT-OUT (Freight Out), TAX-OUT (PPN Keluaran)\']
  name VARCHAR
  category VARCHAR [note: \'PRICE, DISCOUNT, SURCHARGE, TAX\']
  value_type VARCHAR [note: \'PERCENTAGE, FIXED_AMOUNT\']
  exclusion_group VARCHAR [null, note: \'Penanda Condition Exclusion Group untuk menyingkirkan overlap diskon\']
  scale_basis VARCHAR [null, note: \'Penentu pencarian skala harga (Quantity / Value / Weight)\']
  is_manual BOOLEAN [note: \'Flag izin modifikasi nilai secara manual oleh User (Override)\']
  is_mandatory BOOLEAN [note: \'Syarat wajib kondisi harus ada (Misal: Base Price PR00)\']
  entry_mode VARCHAR [note: \'AUTO, MANUAL\']
  is_taxable BOOLEAN [note: \'Masuk DPP PPN Keluaran?\']
  is_active BOOLEAN
}

Table condition_records {
  id BIGINT [primary key]
  condition_type_id BIGINT [note: \'Relasi ke tabel master jenis kondisi\']
  sales_organization_id BIGINT [null]
  distribution_channel_id BIGINT [null]
  customer_id BIGINT [null]
  customer_group_4_id BIGINT [null, note: \'Pricing Group\']
  material_id BIGINT [null]
  amount_or_percent DECIMAL [note: \'Nominal Harga atau % Diskon\']
  valid_from DATE [note: \'Tanggal mulai berlaku\']
  valid_to DATE [note: \'Tanggal akhir berlaku\']
  is_active BOOLEAN
  currency_id BIGINT [null]
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
}

Table sales_orders {
  id BIGINT [primary key]
  branch_id BIGINT
  customer_id BIGINT
  document_type_id BIGINT [note: \'Menggantikan order_type hardcoded, terhubung ke master tipe dokumen\']
  so_number VARCHAR [note: \'Dihasilkan (generate) dari Number Range tipe dokumen\']
  reference_invoice_id BIGINT [null, note: \'Jika ini adalah Retur, merujuk ke faktur mana\']
  incoterm VARCHAR [note: \'Metode pengiriman untuk pesanan ini (Misal: DELIVERED / PICKUP)\']
  delivery_route_id BIGINT [null, note: \'Rute pengiriman logistik (Ditentukan saat SO dibuat)\']
  term_of_payment INT [note: \'Termin pembayaran dalam hari (TOP) untuk pesanan ini\']
  delivery_priority INT [note: \'Prioritas pemenuhan stok pesanan ini (Turunan dari master pelanggan)\']
  notes TEXT [null, note: \'Catatan khusus pesanan (Header Text)\']
  order_date DATE
  total_amount DECIMAL
  tax_amount DECIMAL [note: \'Total nilai pajak (Misal: PPN) untuk pesanan ini\']
  status VARCHAR [note: \'DRAFT, APPROVED, REJECTED, CLOSED, CANCELED\']
  cancel_reason VARCHAR [null, note: \'Alasan jika dokumen dibatalkan\']
  rejection_reason VARCHAR [null, note: \'Alasan penolakan pesanan (Header Level)\']
  delivery_status VARCHAR [note: \'NOT_DELIVERED, PARTIALLY_DELIVERED, FULLY_DELIVERED\']
  billing_status VARCHAR [note: \'NOT_INVOICED, PARTIALLY_INVOICED, FULLY_INVOICED\']
}

Table sales_order_lines {
  id BIGINT [primary key]
  sales_order_id BIGINT
  material_id BIGINT
  reference_invoice_line_id BIGINT [null, note: \'Baris faktur asli yang diretur\']
  is_rejected BOOLEAN [note: \'Flag penolakan spesifik untuk baris ini\']
  rejection_reason VARCHAR [null, note: \'Alasan penolakan (Item Level)\']
  delivery_status VARCHAR [note: \'NOT_DELIVERED, PARTIALLY_DELIVERED, FULLY_DELIVERED\']
  billing_status VARCHAR [note: \'NOT_INVOICED, PARTIALLY_INVOICED, FULLY_INVOICED\']
  qty DECIMAL [note: \'Kuantitas yang dipesan (Order Qty)\']
  confirmed_qty DECIMAL [note: \'Kuantitas yang berhasil dialokasikan/disetujui (Confirmed Qty)\']
  unit_price DECIMAL
  discount_amount DECIMAL
  subtotal DECIMAL
}

Table sales_order_conditions {
  id BIGINT [primary key]
  sales_order_line_id BIGINT
  pricing_procedure_step_id BIGINT [note: \'Referensi ke langkah skema harga\']
  condition_type_id BIGINT [note: \'Referensi ke jenis kondisi\']
  calculation_type VARCHAR [note: \'PRICE, DISCOUNT, SURCHARGE, TAX\']
  amount DECIMAL [note: \'Nilai kondisi untuk baris ini\']
  is_manual_override BOOLEAN [note: \'Apakah nilai di-override manual?\']
  override_reason TEXT [null, note: \'Wajib jika manual\']
  approved_by BIGINT [null, note: \'Approval jika override melampaui toleransi\']
}

Table shipping_points {
  id BIGINT [primary key]
  branch_id BIGINT
  code VARCHAR
  name VARCHAR
}

Table delivery_routes {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR [note: \'Misal: Rute Pengiriman Logistik Utara\']
}

Table vehicles {
  id BIGINT [primary key]
  branch_id BIGINT
  license_plate VARCHAR [note: \'Nomor Polisi\']
  vehicle_type VARCHAR [note: \'Misal: Engkel, Box, Blind Van\']
  capacity_weight DECIMAL
  capacity_volume DECIMAL
}

Table drivers {
  id BIGINT [primary key]
  branch_id BIGINT
  name VARCHAR
  phone VARCHAR
  license_number VARCHAR [note: \'SIM\']
}

Table delivery_orders {
  id BIGINT [primary key, note: \'Auto-increment primary key\']
  delivery_number VARCHAR [note: \'Nomor dokumen pengiriman unik\']
  sales_order_id BIGINT [note: \'Referensi sales order induk\']
  branch_id BIGINT [note: \'Kode cabang pengirim\']
  customer_id BIGINT [note: \'Pelanggan penerima\']
  delivery_date DATE [note: \'Rencana tanggal pengiriman fisik\']
  document_date DATE [note: \'Tanggal dokumen dibuat\']
  status VARCHAR [note: \'DRAFT, READY_TO_SHIP, GOODS_ISSUED, DELIVERED, CANCELLED\']
  shipping_address TEXT [note: \'Alamat lengkap pengiriman barang\']
  transporter_id BIGINT [null, note: \'Ekspedisi pihak ketiga\']
  vehicle_id BIGINT [null, note: \'Armada pengantar\']
  driver_id BIGINT [null, note: \'Supir pengantar\']
  created_by BIGINT [note: \'Pembuat dokumen\']
  approved_by BIGINT [null, note: \'Kepala gudang penyetujui\']
}

Table delivery_order_lines {
  id BIGINT [primary key, note: \'Auto-increment primary key\']
  delivery_order_id BIGINT [note: \'Relasi induk Surat Jalan\']
  sales_order_line_id BIGINT [note: \'Relasi baris SO induk\']
  item_id BIGINT [note: \'SKU barang dagangan\']
  qty_delivered DECIMAL
  qty_confirmed DECIMAL [null, note: \'Kuantitas terkonfirmasi diterima pelanggan (POD)\']
  base_uom_id BIGINT [note: \'UOM dasar barang\']
  batch_id BIGINT [null, note: \'Alokasi batch persediaan fisik\']
  storage_location_id BIGINT [note: \'Lokasi rak gudang asal\']
  unit_cogs DECIMAL [note: \'Nilai HPP barang terbeku saat Goods Issue\']
}

Table sales_invoices {
  id BIGINT [primary key]
  branch_id BIGINT [note: \'Cabang pemilik pendapatan/faktur ini\']
  sales_order_id BIGINT [null]
  delivery_order_id BIGINT [null]
  customer_id BIGINT [note: \'Bill-to / Payer\']
  document_type_id BIGINT [note: \'Terhubung ke master tipe dokumen tagihan (Invoice, Credit Memo, dll)\']
  invoice_number VARCHAR [note: \'Dihasilkan (generate) dari Number Range\']
  reference_invoice_id BIGINT [null, note: \'Referensi faktur asal jika ini adalah Credit Memo atau dokumen pembatalan\']
  faktur_pajak_number VARCHAR [null, note: \'Nomor Seri Faktur Pajak (Diperoleh dari respons API Core Tax DJP)\']
  is_tax_generated BOOLEAN [note: \'Flag apakah tagihan ini sudah di-submit dan disahkan oleh Core Tax\']
  faktur_pajak_date DATE [null, note: \'Tanggal pengesahan e-Faktur\']
  term_of_payment INT [note: \'Termin pembayaran dalam hari (TOP) yang mengikat tagihan ini\']
  invoice_date DATE
  due_date DATE [note: \'Tanggal jatuh tempo (Hasil kalkulasi invoice_date + term_of_payment)\']
  notes TEXT [null, note: \'Catatan/Pesan di tagihan (Header Text)\']
  total_amount DECIMAL
  tax_amount DECIMAL
  status VARCHAR [note: \'UNPAID, PARTIAL, PAID, CANCELED\']
  cancel_reason VARCHAR [null]
}

Table sales_invoice_lines {
  id BIGINT [primary key]
  sales_invoice_id BIGINT
  delivery_order_line_id BIGINT
  material_id BIGINT
  batch_id BIGINT [null, note: \'Dicetak di tagihan fisik jika ada\']
  qty_invoiced DECIMAL
  unit_price DECIMAL
  line_total DECIMAL
}

Table sales_invoice_conditions {
  id BIGINT [primary key]
  sales_invoice_line_id BIGINT
  pricing_procedure_step_id BIGINT [note: \'Referensi ke langkah skema harga\']
  condition_type_id BIGINT [note: \'Referensi ke jenis kondisi\']
  calculation_type VARCHAR [note: \'PRICE, DISCOUNT, SURCHARGE, TAX\']
  amount DECIMAL [note: \'Nilai kondisi untuk baris ini\']
}

Table customer_receipts {
  id BIGINT [primary key]
  customer_id BIGINT
  house_bank_id BIGINT [note: \'Uang masuk ke rekening bank perusahaan yang mana\']
  document_type_id BIGINT
  receipt_number VARCHAR
  receipt_date DATE
  amount DECIMAL
  payment_method VARCHAR [note: \'CASH, TRANSFER, GIRO, CHEQUE\']
  reference_number VARCHAR [null, note: \'Nomor Bukti Transfer / Giro Pelanggan\']
}

Table customer_receipt_lines {
  id BIGINT [primary key]
  customer_receipt_id BIGINT
  sales_invoice_id BIGINT [note: \'Faktur yang dilunasi (Clearing)\']
  amount_applied DECIMAL [note: \'Nilai yang dialokasikan untuk melunasi faktur tersebut\']
}

Table suppliers {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  npwp VARCHAR [null]
  term_of_payment INT [note: \'Default TOP (Hari)\']
}

Table supplier_banks {
  id BIGINT [primary key]
  supplier_id BIGINT
  bank_name VARCHAR
  account_number VARCHAR
  account_name VARCHAR
  is_primary BOOLEAN
}

Table purchase_requisitions {
  id BIGINT [primary key]
  document_type_id BIGINT [note: \'Tipe Dokumen (Misal: PR CapEx, PR Reguler)\']
  branch_id BIGINT [note: \'Cabang / Lokasi Peminta\']
  pr_number VARCHAR
  request_date DATE [note: \'Tanggal PR Dibuat\']
  notes TEXT [null, note: \'Keterangan/Justifikasi Umum Header\']
  status VARCHAR [note: \'DRAFT, SUBMITTED, IN_APPROVAL, APPROVED, PARTIALLY_ORDERED, COMPLETED, CANCELED\']
  created_by BIGINT [note: \'User yang membuat di sistem\']
  requester_name VARCHAR [null, note: \'Nama peminta aktual jika berbeda dengan user pembuat\']
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
}

Table purchase_requisition_lines {
  id BIGINT [primary key]
  purchase_requisition_id BIGINT
  line_number INT [note: \'Nomor urut baris (10, 20, 30...)\']
  item_category VARCHAR [note: \'MATERIAL, SERVICE, EXPENSE, ASSET\']
  material_id BIGINT [null, note: \'Null jika free-text\']
  material_group_id BIGINT [null, note: \'Wajib diisi jika material_id Null (untuk analitik)\']
  short_text VARCHAR [note: \'Deskripsi barang/jasa\']
  qty_requested DECIMAL
  uom_id BIGINT [note: \'Satuan permintaan\']
  required_date DATE [note: \'Kapan barang/jasa ini dibutuhkan (Delivery Date)\']
  estimated_price DECIMAL [null, note: \'Harga estimasi per satuan\']
  currency_id BIGINT [null, note: \'Mata uang estimasi\']
  recommended_vendor_id BIGINT [null, note: \'Rekomendasi pemasok (opsional)\']
  purchasing_group_id BIGINT [null, note: \'Grup/Tim Buyer yang harus memproses baris ini\']
  cost_center_id BIGINT [null, note: \'Pusat biaya jika kategori EXPENSE/SERVICE\']
  fixed_asset_id BIGINT [null, note: \'Nomor aset jika kategori ASSET (CapEx)\']
  qty_ordered DECIMAL [note: \'Kuantitas yang sudah dikonversi menjadi PO\']
  line_status VARCHAR [note: \'OPEN, CLOSED, CANCELED\']
  notes TEXT [null, note: \'Spesifikasi/Keterangan teknis per baris\']
}

Table request_for_quotations {
  id BIGINT [primary key]
  document_type_id BIGINT [note: \'Tipe Dokumen (Misal: RFQ Lokal, RFQ Impor)\']
  branch_id BIGINT [note: \'Cabang / Lokasi Peminta\']
  rfq_number VARCHAR
  request_date DATE [note: \'Tanggal RFQ Dibuat\']
  deadline_date DATE [note: \'Batas akhir penyerahan penawaran oleh vendor\']
  notes TEXT [null, note: \'Keterangan tambahan untuk semua vendor\']
  purchasing_group_id BIGINT [note: \'Grup/Tim Buyer pembuat RFQ\']
  status VARCHAR [note: \'DRAFT, SUBMITTED, APPROVED, SENT, COMPLETED, CANCELED\']
  created_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
}

Table request_for_quotation_lines {
  id BIGINT [primary key]
  request_for_quotation_id BIGINT
  line_number INT [note: \'Nomor urut baris (10, 20, 30...)\']
  purchase_requisition_line_id BIGINT [null, note: \'Relasi ke PR (Bisa null jika RFQ Manual/tanpa PR)\']
  item_category VARCHAR [note: \'MATERIAL, SERVICE, EXPENSE, ASSET\']
  material_id BIGINT [null, note: \'Null jika free-text\']
  material_group_id BIGINT [null, note: \'Wajib diisi jika material_id Null (untuk analitik)\']
  short_text VARCHAR [note: \'Deskripsi barang/jasa yang diminta harganya\']
  qty_requested DECIMAL
  uom_id BIGINT [note: \'Satuan permintaan\']
  required_date DATE [note: \'Kapan barang/jasa ini dibutuhkan (Delivery Date)\']
  estimated_price DECIMAL [null, note: \'Harga referensi internal (HPS)\']
  currency_id BIGINT [null, note: \'Mata uang estimasi\']
  line_status VARCHAR [note: \'OPEN, QUOTED, REJECTED, CANCELED\']
}

Table request_for_quotation_vendors {
  id BIGINT [primary key]
  request_for_quotation_id BIGINT
  vendor_id BIGINT [note: \'Pemasok yang diundang\']
  is_responded BOOLEAN [default: false, note: \'Apakah vendor sudah merespon penawaran\']
  quotation_reference VARCHAR [null, note: \'Nomor surat penawaran dari vendor\']
  responded_at TIMESTAMP [null]
}

Table request_for_quotation_vendor_lines {
  id BIGINT [primary key]
  request_for_quotation_vendor_id BIGINT
  request_for_quotation_line_id BIGINT
  qty_offered DECIMAL [note: \'Kuantitas yang sanggup dipenuhi vendor\']
  unit_price DECIMAL [null, note: \'Harga satuan yang ditawarkan vendor\']
  currency_id BIGINT [null, note: \'Mata uang penawaran vendor\']
  lead_time_days INT [null, note: \'Estimasi waktu pengiriman (hari)\']
  payment_term_id BIGINT [null, note: \'Syarat pembayaran yang diajukan vendor\']
  tax_code_id BIGINT [null, note: \'Kode pajak penawaran\']
  is_selected BOOLEAN [default: false, note: \'Tandai jika penawaran ini dipilih sebagai pemenang\']
}

Table quotation_comparison_forms {
  id BIGINT [primary key]
  branch_id BIGINT [note: \'Cabang/Lokasi eksekusi QCF\']
  request_for_quotation_id BIGINT [note: \'Referensi mutlak ke dokumen RFQ\']
  qcf_number VARCHAR [note: \'Nomor dokumen QCF otomatis\']
  comparison_date DATE [note: \'Tanggal analisa/keputusan dibuat\']
  status VARCHAR [note: \'DRAFT, IN_APPROVAL, APPROVED, REJECTED\']
  notes TEXT [null, note: \'Justifikasi umum pemilihan vendor\']
  created_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
}

Table quotation_comparison_lines {
  id BIGINT [primary key]
  quotation_comparison_form_id BIGINT
  request_for_quotation_line_id BIGINT [note: \'Merujuk ke baris kebutuhan barang\']
  request_for_quotation_vendor_line_id BIGINT [note: \'Merujuk mutlak ke respons harga vendor spesifik\']
  awarded_qty DECIMAL [note: \'Kuantitas yang disetujui dibeli dari vendor ini (bisa parsial/split)\']
  notes TEXT [null, note: \'Justifikasi parsial per baris\']
}

Table purchase_contracts {
  id BIGINT [primary key]
  branch_id BIGINT [note: \'Cabang/Lokasi perjanjian\']
  vendor_id BIGINT [note: \'Rekanan pemasok\']
  document_type_id BIGINT [note: \'Tipe kontrak (Value / Quantity Contract)\']
  contract_number VARCHAR [note: \'Nomor perjanjian\']
  agreement_date DATE
  valid_from DATE
  valid_to DATE
  target_value DECIMAL [null, note: \'Target nilai keseluruhan (Value Contract)\']
  purchasing_organization_id BIGINT
  purchasing_group_id BIGINT
  status VARCHAR [note: \'DRAFT, APPROVED, COMPLETED, EXPIRED, CANCELED\']
  created_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
}

Table purchase_contract_lines {
  id BIGINT [primary key]
  purchase_contract_id BIGINT
  line_number INT
  item_category VARCHAR [note: \'MATERIAL, SERVICE, EXPENSE\']
  material_id BIGINT [null]
  material_group_id BIGINT [null]
  short_text VARCHAR
  target_qty DECIMAL [null, note: \'Target kuantitas (Quantity Contract)\']
  uom_id BIGINT
  net_price DECIMAL
  currency_id BIGINT
  tax_code_id BIGINT [null]
  released_qty DECIMAL [default: 0, note: \'Kuantitas yang telah diterbitkan (Call-off PO)\']
  released_value DECIMAL [default: 0, note: \'Nilai yang telah diterbitkan (Call-off PO)\']
}

Table purchase_orders {
  id BIGINT [primary key]
  branch_id BIGINT
  document_type_id BIGINT
  po_number VARCHAR
  vendor_id BIGINT
  invoicing_party_id BIGINT [null]
  purchasing_organization_id BIGINT
  purchasing_group_id BIGINT
  order_date DATE
  term_of_payment_id BIGINT
  currency_id BIGINT
  exchange_rate DECIMAL [null]
  purchase_pricing_procedure_id BIGINT [null]
  total_amount DECIMAL
  tax_amount DECIMAL
  discount_amount DECIMAL [null]
  status VARCHAR [note: \'DRAFT, IN_APPROVAL, APPROVED, PARTIAL_RECEIVED, FULLY_RECEIVED, BILLED, CANCELED\']
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT [null]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP [null]
}

Table purchase_order_lines {
  id BIGINT [primary key]
  purchase_order_id BIGINT
  line_number INT
  item_category VARCHAR [note: \'MATERIAL, SERVICE, EXPENSE, ASSET\']
  account_assignment_category VARCHAR [null, note: \'Pusat Pembebanan\']
  material_id BIGINT [null]
  short_text VARCHAR
  qty DECIMAL
  uom_id BIGINT
  net_price DECIMAL
  tax_code_id BIGINT
  storage_location_id BIGINT [null]
  delivery_date DATE
  overdelivery_tolerance DECIMAL
  underdelivery_tolerance DECIMAL
  is_free_of_charge BOOLEAN
  is_returns_item BOOLEAN
  cost_center_id BIGINT [null]
  fixed_asset_id BIGINT [null]
  purchase_requisition_line_id BIGINT [null]
  quotation_comparison_line_id BIGINT [null]
  purchase_contract_line_id BIGINT [null]
  created_by BIGINT [null]
  updated_by BIGINT [null]
  deleted_by BIGINT [null]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table material_documents {
  id BIGINT [primary key]
  document_type_id BIGINT [note: \'(Misal: DOC_MIGO)\']
  document_number VARCHAR
  posting_date DATE
  document_date DATE
  header_text TEXT [null]
  reference_document VARCHAR [null, note: \'Referensi fisik Surat Jalan atau Delivery Note\']
  status VARCHAR [note: \'DRAFT, POSTED, CANCELED\']
}

Table material_document_lines {
  id BIGINT [primary key]
  material_document_id BIGINT [note: \'Relasi ke header\']
  material_id BIGINT
  branch_id BIGINT
  storage_location_id BIGINT [null]
  batch_id BIGINT [null]
  movement_type_id BIGINT [note: \'Relasi ke master Movement Type (Misal: 101, 311, 561)\']
  qty DECIMAL
  balance DECIMAL [note: \'Sisa saldo setelah mutasi (Snapshot)\']
  customer_id BIGINT [null, note: \'Referensi mitra pelanggan (Jika GI untuk Penjualan/Retur)\']
  supplier_id BIGINT [null, note: \'Referensi mitra pemasok (Jika GR dari Vendor/Retur)\']
  cost_center_id BIGINT [null, note: \'Untuk beban pemakaian internal / scrapping (Integrasi CO)\']
  reference_po_line_id BIGINT [null, note: \'Referensi PO (jika MIGO penerimaan/retur PO)\']
  reference_do_line_id BIGINT [null, note: \'Referensi DO (jika MIGO pengiriman SO)\']
  partner_branch_id BIGINT [null, note: \'Gudang tujuan/asal (jika Mutasi)\']
}

Table bill_of_materials {
  id BIGINT [primary key]
  item_id BIGINT
  name VARCHAR
  code VARCHAR
  version VARCHAR
  is_active BOOLEAN
  branch_id BIGINT
}

Table bill_of_material_items {
  id BIGINT [primary key]
  bill_of_material_id BIGINT
  item_id BIGINT
  quantity DECIMAL
  uom_id BIGINT
  waste_percentage DECIMAL
}

Table work_orders {
  id BIGINT [primary key]
  code VARCHAR
  bill_of_material_id BIGINT
  target_item_id BIGINT
  target_quantity DECIMAL
  status VARCHAR
  branch_id BIGINT
  document_date DATE
  start_date DATE
  end_date DATE
}

Table work_order_items {
  id BIGINT [primary key]
  work_order_id BIGINT
  item_id BIGINT
  required_quantity DECIMAL
  consumed_quantity DECIMAL
  uom_id BIGINT
  batch_number VARCHAR
}

Table ap_invoices {
  id BIGINT [primary key]
  supplier_id BIGINT
  material_document_id BIGINT [null, note: \'Referensi ke dokumen MIGO (Penerimaan)\']
  document_type_id BIGINT
  invoice_number VARCHAR
  vendor_invoice_number VARCHAR [note: \'Nomor faktur fisik dari Pemasok\']
  invoice_date DATE
  due_date DATE
  total_amount DECIMAL
  status VARCHAR [note: \'UNPAID, PARTIAL, PAID, CANCELED\']
}

Table ap_invoice_lines {
  id BIGINT [primary key]
  ap_invoice_id BIGINT
  material_id BIGINT [null]
  qty DECIMAL
  line_total DECIMAL
}

Table vendor_payments {
  id BIGINT [primary key]
  supplier_id BIGINT
  house_bank_id BIGINT [note: \'Uang keluar dari rekening bank perusahaan yang mana\']
  document_type_id BIGINT
  payment_number VARCHAR
  payment_date DATE
  amount DECIMAL
  payment_method VARCHAR [note: \'CASH, TRANSFER, GIRO, CHEQUE\']
  reference_number VARCHAR [null, note: \'Nomor Bukti Transfer / Giro\']
  status VARCHAR [note: \'DRAFT, POSTED, CANCELED\']
}

Table vendor_payment_lines {
  id BIGINT [primary key]
  vendor_payment_id BIGINT
  ap_invoice_id BIGINT [note: \'Tagihan pemasok yang dilunasi (Clearing)\']
  amount_applied DECIMAL [note: \'Nilai yang dialokasikan untuk melunasi tagihan tersebut\']
}

Table coas {
  id BIGINT [primary key]
  code VARCHAR [note: \'Nomor Akun (Misal: 1110.01)\']
  name VARCHAR
  account_type VARCHAR [note: \'ASSET, LIABILITY, EQUITY, REVENUE, EXPENSE\']
  is_active BOOLEAN
}

Table cost_centers {
  id BIGINT [primary key]
    code VARCHAR [note: \'Misal: CC-MKT, CC-LOG\']
  name VARCHAR [note: \'Misal: Biaya Marketing, Biaya Gudang\']
  is_active BOOLEAN
}

Table house_banks {
  id BIGINT [primary key]
  company_id BIGINT [note: \'Bank ini milik entitas perusahaan mana\']
  coa_id BIGINT [note: \'Relasi langsung ke GL Account (Buku Besar Bank)\']
  currency_id BIGINT [note: \'Mata uang rekening (Misal: IDR / USD)\']
  bank_code VARCHAR [note: \'Misal: BCA, MANDIRI\']
  bank_name VARCHAR [note: \'Misal: PT. BANK CENTRAL ASIA Tbk\']
  account_number VARCHAR
  account_name VARCHAR
  is_active BOOLEAN
}

Table journals {
  id BIGINT [primary key]
  document_type_id BIGINT [note: \'(Misal: JE_STD)\']
  journal_number VARCHAR
  reference_type VARCHAR [null, note: \'(Misal: SALES_INVOICE, VENDOR_PAYMENT)\']
  reference_id BIGINT [null]
  journal_date DATE
  description TEXT
  total_amount DECIMAL [note: \'(Balance Debit/Credit)\']
  status VARCHAR [note: \'DRAFT, POSTED, REVERSED\']
}

Table journal_lines {
  id BIGINT [primary key]
  journal_id BIGINT
  coa_id BIGINT
  cost_center_id BIGINT [null, note: \'Alokasi pengeluaran ke Pusat Biaya tertentu (Untuk jurnal Expense/Biaya)\']
  debit DECIMAL
  credit DECIMAL
  description VARCHAR [null]
}

Table cash_journals {
  id BIGINT [primary key]
  branch_id BIGINT [note: \'Cabang pemilik kas\']
  coa_id BIGINT [note: \'Akun Kas (GL Kas Kecil)\']
  document_type_id BIGINT
  cj_number VARCHAR
  transaction_date DATE
  opening_balance DECIMAL
  closing_balance DECIMAL
  status VARCHAR [note: \'DRAFT, POSTED\']
}

Table cash_journal_lines {
  id BIGINT [primary key]
  cash_journal_id BIGINT
  transaction_type VARCHAR [note: \'RECEIPT (Penerimaan), PAYMENT (Pengeluaran)\']
  offsetting_coa_id BIGINT [note: \'Lawan akun transaksi (Misal: Biaya Tol, Biaya Parkir)\']
  amount DECIMAL
  reference_number VARCHAR [null, note: \'Nomor nota fisik (Receipt No)\']
  description TEXT [null]
}

Table bank_statements {
  id BIGINT [primary key]
  house_bank_id BIGINT [note: \'Rekening bank internal perusahaan\']
  document_type_id BIGINT
  statement_number VARCHAR
  statement_date DATE
  opening_balance DECIMAL
  closing_balance DECIMAL
  status VARCHAR [note: \'DRAFT, POSTED, RECONCILED\']
}

Table bank_statement_lines {
  id BIGINT [primary key]
  bank_statement_id BIGINT
  transaction_type VARCHAR [note: \'IN (Uang Masuk/Debit Bank), OUT (Uang Keluar/Kredit Bank)\']
  amount DECIMAL
  reference_number VARCHAR [null, note: \'Nomor Referensi Bank / Giro\']
  description TEXT [null]
  is_reconciled BOOLEAN [note: \'Flag apakah baris ini sudah di-clearing dengan faktur AR/AP\']
  offsetting_coa_id BIGINT [null, note: \'Akun lawan (Tujuan clearing)\']
}

Table local_currencies {
  id BIGINT [primary key]
  code VARCHAR [note: \'Misal: IDR, USD, EUR\']
  name VARCHAR
  symbol VARCHAR
}

Table exchange_rates {
  id BIGINT [primary key]
  from_currency_id BIGINT
  to_currency_id BIGINT
  valid_from DATE
  rate DECIMAL [note: \'Nilai tukar (Exchange Rate)\']
}

Table document_number_ranges {
  id BIGINT [primary key]
  code VARCHAR [note: \'Misal: SO_STD, INV_RET\']
  name VARCHAR
  prefix VARCHAR [null, note: \'Awalan nomor (Misal: SO-)\']
  suffix VARCHAR [null, note: \'Akhiran nomor (Misal: /2026)\']
  length INT [note: \'Panjang digit (Misal: 6 untuk 000001)\']
  current_number BIGINT [note: \'Counter yang terus berjalan secara berurutan\']
  is_active BOOLEAN
}

Table document_types {
  id BIGINT [primary key]
  category VARCHAR [note: \'Modul transaksi: SALES_ORDER, DELIVERY, INVOICE\']
  code VARCHAR [note: \'Misal: SO_STD, DO_STD, INV_STD\']
  name VARCHAR
  number_range_id BIGINT [note: \'Relasi ke konfigurasi nomor urutnya\']
}

Table document_type_mappings {
  id BIGINT [primary key]
  sales_order_type_id BIGINT [note: \'Referensi ke tipe SO (Misal: SO_STD)\']
  delivery_type_id BIGINT [null, note: \'Referensi ke tipe DO (Misal: DO_STD)\']
  invoice_type_id BIGINT [null, note: \'Referensi ke tipe Billing (Misal: INV_STD)\']
}

Table movement_types {
  id BIGINT [primary key]
  code VARCHAR(10) [unique, note: \'Kode Movement Type, misal 101, 201, 311\']
  name VARCHAR(150) [note: \'Nama spesifik, misal Goods Receipt for PO\']
  category VARCHAR(50) [note: \'RECEIPT, ISSUE, TRANSFER, ADJUSTMENT\']
  direction VARCHAR(10) [note: \'IN, OUT, TRANSFER\']
  is_qty_updated BOOLEAN [default: true, note: \'Apakah mempengaruhi stok kuantitas?\']
  is_value_updated BOOLEAN [default: true, note: \'Apakah mempengaruhi nilai FI/CO?\']
  requires_reference BOOLEAN [default: false, note: \'Harus merujuk ke dokumen preceding (PO/SO)?\']
  requires_reason_code BOOLEAN [default: false, note: \'Integrasi dengan BRD-025 (Reason Code)?\']
  transaction_key VARCHAR(50) [note: \'Pemetaan ke BRD-019 Auto Journal Matrix\']
  reversal_movement_type_id BIGINT [null, note: \'Self-referencing ke movement type pembalik (misal 101 ke 102)\']
  document_type_id BIGINT [null, note: \'Integrasi ke BRD-006 (Document Type) untuk Jurnal Akuntansi\']
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  created_by BIGINT 
  updated_at TIMESTAMP
  updated_by BIGINT 
  deleted_at TIMESTAMP
  deleted_by BIGINT 
}

Table goods_movement_mappings {
  id BIGINT [primary key]
  action_code VARCHAR(50) [note: \'Misal: A01 = Goods Receipt, A08 = Transfer Posting\']
  reference_code VARCHAR(50) [note: \'Misal: R01 = Purchase Order, R10 = Other\']
  movement_type_id BIGINT
  is_default BOOLEAN [default: false]
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  created_by BIGINT 
  updated_at TIMESTAMP
  updated_by BIGINT 
  deleted_at TIMESTAMP
  deleted_by BIGINT 
}

Table users {
  id BIGINT [primary key]
  name VARCHAR
  email VARCHAR [unique]
  email_verified_at TIMESTAMP [null]
  password VARCHAR
  status VARCHAR(50) [note: \'Active, Locked, Inactive\']
  default_branch_id BIGINT [null, note: \'Cabang (Branch) default saat login perdana\']
  current_branch_id BIGINT [null, note: \'Konteks Cabang yang sedang aktif (Context Switcher)\']
  remember_token VARCHAR(100) [null]
  last_login_at TIMESTAMP [null]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP [null, note: \'Soft Delete / Deactivation pengguna (BRD 01)\']
  created_by BIGINT [null]
  updated_by BIGINT [null]
  deleted_by BIGINT [null]
}

Table roles {
  id BIGINT [primary key]
  company_id BIGINT [null]
  name VARCHAR
  guard_name VARCHAR
  description VARCHAR [null]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  created_by BIGINT [null]
  updated_by BIGINT [null]
}

Table permissions {
  id BIGINT [primary key]
  resource VARCHAR
  action VARCHAR
  name VARCHAR
  guard_name VARCHAR
  created_at TIMESTAMP
  updated_at TIMESTAMP
  created_by BIGINT [null]
  updated_by BIGINT [null]
}

Table role_has_permissions {
  permission_id BIGINT
  role_id BIGINT
}

Table model_has_roles {
  role_id BIGINT
  model_type VARCHAR
  model_id BIGINT
  valid_from DATE [null]
  valid_to DATE [null]
}

Table role_movement_types {
  role_id BIGINT
  movement_type_id BIGINT
}

Table approval_authorities {
  id BIGINT [primary key]
  role_id BIGINT
  module VARCHAR
  max_amount DECIMAL [null]
  currency_id BIGINT [null]
  is_active BOOLEAN
}

Table activity_logs {
  id BIGINT [primary key]
  user_id BIGINT [null]
  subject_type VARCHAR
  subject_id BIGINT [null]
  event VARCHAR
  properties JSON [null]
  ip_address VARCHAR [null]
  user_agent VARCHAR [null]
  created_at TIMESTAMP
}

Table purchase_pricing_procedures {
  id BIGINT [primary key]
  code VARCHAR [note: \'Contoh: PSTD01 (Lokal), PIMP01 (Impor)\']
  name VARCHAR
  description TEXT [null]
  is_active BOOLEAN
}

Table purchase_pricing_procedure_steps {
  id BIGINT [primary key]
  purchase_pricing_procedure_id BIGINT
  step_number INT [note: \'Urutan: 10, 20, 100, 110, 200 … Spare: 30-99\']
  purchase_condition_type_id BIGINT [null]
  description VARCHAR
  calculation_type VARCHAR [note: \'BASE_PRICE, DISCOUNT, SUBTOTAL, FREIGHT, ACCRUAL, TAX, EXPENSE\']
  account_key VARCHAR [null, note: \'Kunci G/L: INV-ACC, FRT-ACC, INS-ACC, CUS-ACC, TAX-ACC, EXP-VAR\']
  is_cogs BOOLEAN [note: \'Apakah menambah nilai COGS / Inventory Valuation?\']
  calculate_from_step INT [null, note: \'Basis % dihitung dari step mana\']
  is_statistical BOOLEAN [note: \'Jika true, nilai tidak mempengaruhi total tagihan\']
  sort_order INT
}

Table purchase_condition_types {
  id BIGINT [primary key]
  code VARCHAR [note: \'PRC-BASE, DISC-VND, FRT-OCN, FRT-INS, FRT-CLR, FRT-DOC, FRT-STR, FRT-OTH, PEN-DMG, TAX-INP\']
  name VARCHAR
  category VARCHAR [note: \'PRICE, DISCOUNT, FREIGHT, CUSTOMS, PENALTY, TAX\']
  value_type VARCHAR [note: \'PERCENTAGE, FIXED_AMOUNT, QUANTITY_BASED\']
  is_taxable BOOLEAN [note: \'Masuk DPP PPN Pihak Ketiga?\']
  is_vendor_assignable BOOLEAN [note: \'Bisa di-assign ke Condition Vendor berbeda?\']
  entry_mode VARCHAR [note: \'AUTO, MANUAL\']
  is_active BOOLEAN
}

Table purchase_condition_records {
  id BIGINT [primary key]
  purchase_condition_type_id BIGINT
  vendor_id BIGINT [null]
  material_id BIGINT [null]
  amount_or_percent DECIMAL
  currency_id BIGINT [null]
  valid_from DATE
  valid_to DATE
  is_active BOOLEAN
  created_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
}

Table purchase_condition_scales {
  id BIGINT [primary key]
  purchase_condition_record_id BIGINT
  minimum_quantity DECIMAL [note: \'Kuantitas minimum transaksi untuk mencapai skala ini\']
  rate DECIMAL [note: \'Nilai diskon (rupiah/persen) atau harga beli khusus untuk skala ini\']
}

Table purchase_condition_tiers {
  id BIGINT [primary key]
  purchase_condition_record_id BIGINT
  tier_index INT [note: \'Urutan perhitungan diskon bertingkat (misal: 1, 2, 3)\']
  rate DECIMAL [note: \'Besaran persentase atau nominal diskon untuk tier ini\']
}

Table purchase_order_histories {
  id BIGINT [primary key]
  purchase_order_line_id BIGINT
  transaction_type VARCHAR
  reference_document_id BIGINT
  qty DECIMAL
  amount_local_currency DECIMAL
  created_by BIGINT [null]
  updated_by BIGINT [null]
  deleted_by BIGINT [null]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table purchase_order_delivery_schedules {
  id BIGINT [primary key]
  purchase_order_line_id BIGINT
  schedule_line_number INT
  delivery_date DATE
  scheduled_qty DECIMAL
  received_qty DECIMAL
  created_by BIGINT [null]
  updated_by BIGINT [null]
  deleted_by BIGINT [null]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table purchase_order_account_assignments {
  id BIGINT [primary key]
  purchase_order_line_id BIGINT
  sequence_no INT
  cost_center_id BIGINT [null]
  fixed_asset_id BIGINT [null]
  distribution_percentage DECIMAL
  distributed_amount DECIMAL
  created_by BIGINT [null]
  updated_by BIGINT [null]
  deleted_by BIGINT [null]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table purchase_order_release_strategies {
  id BIGINT [primary key]
  purchase_order_id BIGINT
  release_code_id BIGINT
  is_approved BOOLEAN
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
  created_by BIGINT [null]
  updated_by BIGINT [null]
  deleted_by BIGINT [null]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table purchase_order_texts {
  id BIGINT [primary key]
  purchase_order_id BIGINT
  purchase_order_line_id BIGINT [null]
  text_type_id BIGINT
  content LONGTEXT
  created_by BIGINT [null]
  updated_by BIGINT [null]
  deleted_by BIGINT [null]
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table purchase_order_conditions {
  id BIGINT [primary key]
  purchase_order_id BIGINT
  purchase_pricing_procedure_step_id BIGINT
  purchase_condition_type_id BIGINT
  condition_vendor_id BIGINT [null, note: \'NULL = tagihan ke Main Vendor. Jika diisi = Forwarder / Asuradur\']
  amount_or_percent DECIMAL
  calculated_amount DECIMAL
  currency_id BIGINT [null]
  is_cogs BOOLEAN
  is_printed_on_po BOOLEAN [note: \'Tampil di cetak PO ke Main Vendor?\']
  notes TEXT [null]
}

Table purchase_invoice_conditions {
  id BIGINT [primary key]
  purchase_invoice_id BIGINT
  purchase_order_condition_id BIGINT [null]
  purchase_condition_type_id BIGINT
  vendor_id BIGINT [note: \'Vendor yang menagihkan kondisi ini\']
  planned_amount DECIMAL [note: \'Nilai estimasi dari PO\']
  actual_amount DECIMAL [note: \'Nilai tagihan aktual\']
  variance_amount DECIMAL [note: \'actual - planned\']
  variance_disposition VARCHAR [note: \'COGS_ADJUSTMENT, EXPENSE\']
  exchange_rate_actual DECIMAL [null]
  exchange_rate_variance DECIMAL [null]
}

Table sales_condition_records {
  id BIGINT [primary key]
  condition_type_id BIGINT
  customer_id BIGINT [null, note: \'Mengisi Priority 1\']
  customer_group_id BIGINT [null, note: \'Mengisi Priority 2\']
  material_id BIGINT
  amount_or_percent DECIMAL
  currency_id BIGINT [null]
  valid_from DATE
  valid_to DATE
  is_active BOOLEAN
  created_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
}

Table sales_condition_scales {
  id BIGINT [primary key]
  sales_condition_record_id BIGINT
  minimum_quantity DECIMAL [note: \'Kuantitas minimum transaksi untuk mencapai skala ini\']
  rate DECIMAL [note: \'Nilai diskon (rupiah/persen) atau harga khusus skala ini\']
}

Table sales_condition_tiers {
  id BIGINT [primary key]
  sales_condition_record_id BIGINT
  tier_index INT [note: \'Urutan perhitungan diskon bertingkat (misal: 1, 2, 3)\']
  rate DECIMAL [note: \'Besaran persentase atau nominal diskon untuk tier ini\']
}

Table sales_free_goods_records {
  id BIGINT [primary key]
  sales_condition_record_id BIGINT
  free_item_id BIGINT [note: \'Item barang gratis yang diberikan\']
  free_quantity DECIMAL [note: \'Jumlah barang gratis\']
  free_uom_id BIGINT [note: \'UOM barang gratis\']
  absorbed_by VARCHAR [note: \'INTERNAL (FROI) atau EXTERNAL (FROE)\']
}

Table customer_ship_to_addresses {
  id BIGINT [primary key]
  customer_id BIGINT
  ship_to_code VARCHAR [note: \'Auto-generate range 10SH\']
  name VARCHAR [note: \'Nama lokasi / proyek\']
  address TEXT
  district VARCHAR [null]
  city VARCHAR [null]
  postal_code VARCHAR [null]
  region VARCHAR [null]
  transportation_zone_id BIGINT [null]
  contact_person VARCHAR [null]
  phone VARCHAR [null]
  latitude DECIMAL [null]
  longitude DECIMAL [null]
  is_default BOOLEAN
  is_active BOOLEAN
}

Table customer_credit_limit_logs {
  id BIGINT [primary key]
  customer_id BIGINT
  old_credit_limit DECIMAL
  new_credit_limit DECIMAL
  change_reason TEXT
  requested_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
  status VARCHAR [note: \'PENDING, APPROVED, REJECTED\']
  effective_date DATE
}

Table customer_recon_account_logs {
  id BIGINT [primary key]
  customer_id BIGINT
  old_recon_account_id BIGINT
  new_recon_account_id BIGINT
  change_reason TEXT
  requested_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
  status VARCHAR [note: \'PENDING, APPROVED, REJECTED\']
  effective_date DATE
}

Table customer_blocked_orders {
  id BIGINT [primary key]
  customer_id BIGINT
  sales_order_id BIGINT
  block_reason VARCHAR [note: \'CREDIT_LIMIT_EXCEEDED, AR_OVERDUE, BANK_GUARANTEE_EXPIRED\']
  outstanding_ar DECIMAL
  so_value DECIMAL
  credit_limit DECIMAL
  released_by BIGINT [null]
  released_at TIMESTAMP [null]
  release_note TEXT [null]
  status VARCHAR [note: \'BLOCKED, RELEASED, CANCELLED\']
}

Table customer_hierarchy_groups {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  is_active BOOLEAN
}

Table gl_accounts {
  id BIGINT [primary key]
  code VARCHAR [note: \'AP-TRADE, AP-FREIGHT, AP-INSUR, AP-SERVICE, INV-ACC, FRT-ACC, TAX-ACC, REV-ACC\']
  name VARCHAR
  account_type VARCHAR [note: \'ASSET, LIABILITY, EQUITY, REVENUE, EXPENSE\']
  account_class VARCHAR [note: \'RECONCILIATION (untuk AP/AR sub-ledger), NORMAL (G/L biasa)\']
  normal_balance VARCHAR [note: \'DEBIT, CREDIT\']
  is_active BOOLEAN
}

Table vendors {
  id BIGINT [primary key]
  vendor_code VARCHAR [note: \'Auto-generate sesuai number range group\']
  number_range_group VARCHAR [note: \'20TR, 20FF, 20IN, 20NT, 20OT\']
  vendor_type VARCHAR [note: \'TRADE, FORWARDER, INSURANCE, NON_TRADE, ONE_TIME\']
  schema_group_id BIGINT [null, ref: > vendor_schema_groups.id]
  name VARCHAR
  industry VARCHAR [null, note: \'Klasifikasi industri\']
  vendor_group VARCHAR [null, note: \'Klasifikasi pelaporan\']
  country_origin VARCHAR [note: \'ID (Lokal), US/CN/dll (Overseas/Impor)\']
  address TEXT [null]
  district VARCHAR [null]
  city VARCHAR [null]
  postal_code VARCHAR [null]
  region VARCHAR [null]
  phone VARCHAR [null]
  email VARCHAR [null]
  contact_person VARCHAR [null]
  npwp VARCHAR [null, note: \'Wajib jika PKP lokal\']
  pkp_name VARCHAR [null]
  pkp_address TEXT [null]
  tax_status VARCHAR [note: \'PKP, NON_PKP\']
  status VARCHAR [note: \'ACTIVE, INACTIVE, ARCHIVED\']
  blocked_reason TEXT [null]
  created_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
}

Table vendor_companies {
  id BIGINT [primary key]
  vendor_id BIGINT
  company_id BIGINT
  recon_account_id BIGINT [note: \'WAJIB. Akun penampung hutang\']
  payment_terms_id BIGINT
  payment_method VARCHAR [null, note: \'CASH, TRANSFER, GIRO\']
  withholding_tax_code VARCHAR [null, note: \'Kode PPh (PPH23, PPH21, dll)\']
  posting_block BOOLEAN [note: \'Blokir pembuatan Invoice/Jurnal AP\']
  payment_block BOOLEAN [note: \'Blokir pencairan pembayaran\']
}

Table vendor_purchasing_orgs {
  id BIGINT [primary key]
  vendor_id BIGINT
  purchasing_organization_id BIGINT
  purchasing_group_id BIGINT
  currency_id BIGINT [note: \'Order Currency\']
  incoterm VARCHAR [null, note: \'FOB, CIF, DDP, DAP\']
  delivery_tolerance_over DECIMAL [note: \'% Kelebihan GR\']
  delivery_tolerance_under DECIMAL [note: \'% Kekurangan GR\']
  gr_based_invoice BOOLEAN [note: \'Cegah Invoice tanpa GR\']
  eval_receipt_settlement BOOLEAN [note: \'ERS (Auto payment post-GR)\']
  purchasing_block BOOLEAN [note: \'Blokir pembuatan PO baru\']
}

Table vendor_partner_functions {
  id BIGINT [primary key]
  vendor_id BIGINT [note: \'Vendor Utama\']
  partner_role VARCHAR [note: \'ORDERING, GOODS_SUPPLIER, INVOICE, PAYEE\']
  assigned_vendor_id BIGINT [note: \'Vendor penampung peran (Bisa diri sendiri)\']
}

Table vendor_banks {
  id BIGINT [primary key]
  vendor_id BIGINT
  bank_name VARCHAR
  bank_branch VARCHAR [null]
  account_number VARCHAR
  account_name VARCHAR
  currency_id BIGINT [null]
  swift_code VARCHAR [null, note: \'Untuk transfer internasional\']
  is_primary BOOLEAN
  is_active BOOLEAN
}

Table purchasing_info_records {
  id BIGINT [primary key]
  vendor_id BIGINT [note: \'Hanya vendor tipe TRADE (20TR)\']
  material_id BIGINT
  purchasing_organization_id BIGINT
  branch_id BIGINT [null, note: \'NULL = berlaku semua cabang\']
  net_price DECIMAL
  currency_id BIGINT
  uom_id BIGINT
  moq DECIMAL [null, note: \'Minimum Order Quantity\']
  lead_time_days INT [null]
  valid_from DATE
  valid_to DATE
  is_active BOOLEAN
  created_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
}

Table vendor_recon_account_logs {
  id BIGINT [primary key]
  vendor_id BIGINT
  old_recon_account_id BIGINT
  new_recon_account_id BIGINT
  change_reason TEXT
  requested_by BIGINT
  approved_by BIGINT [null]
  approved_at TIMESTAMP [null]
  status VARCHAR [note: \'PENDING, APPROVED, REJECTED\']
  effective_date DATE
}

Table vendor_block_logs {
  id BIGINT [primary key]
  vendor_id BIGINT
  action VARCHAR [note: \'BLOCKED, UNBLOCKED, DEACTIVATED\']
  reason TEXT
  actioned_by BIGINT
}

Table shipment_headers {
  id BIGINT [primary key]
  transporter_id BIGINT
  vehicle_id BIGINT
  driver_id BIGINT
  route VARCHAR
  max_weight DECIMAL
  max_volume DECIMAL
  status VARCHAR [note: \'Planned, Loading, In Transit, Completed\']
}

Table shipment_lines {
  id BIGINT [primary key]
  shipment_header_id BIGINT
  delivery_header_id BIGINT
  aggregated_weight DECIMAL
  aggregated_volume DECIMAL
}

Table shipment_costs {
  id BIGINT [primary key]
  shipment_header_id BIGINT
  basic_freight DECIMAL
  toll_fee DECIMAL
  parking_fee DECIMAL
  other_fees DECIMAL
  total_actual_cost DECIMAL
  cost_status VARCHAR [note: \'Pending, Realized\']
  realized_at TIMESTAMP
  realized_by BIGINT
}

Table sales_order_types {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  is_active BOOLEAN
}

Table delivery_types {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  is_active BOOLEAN
}

Table sales_invoice_types {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  is_active BOOLEAN
}

Table models {
  id BIGINT [primary key]
  name VARCHAR
  class_name VARCHAR
}

Table alt_uoms {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
}

Table account_determinations {
  id BIGINT [primary key]
  company_id BIGINT
  business_function_key VARCHAR [note: \'Misal: SALES_REVENUE, GR_IR_CLEARING, SERVICE_ACCRUAL\']
  item_category_id BIGINT [null, note: \'Pembeda material vs jasa\']
  tax_code_id BIGINT [null, note: \'Pembeda PPN per kode pajak\']
  posting_group_id BIGINT [null, note: \'Pembeda segmentasi pelanggan/vendor\']
  coa_id BIGINT [note: \'Akun tujuan\']
}

// --- Master Regional Tables (Auto-injected for relations) ---
Table countries {
  id BIGINT [primary key]
  name VARCHAR
}

Table provinces {
  id BIGINT [primary key]
  name VARCHAR
}

Table cities {
  id BIGINT [primary key]
  name VARCHAR
}

Table user_branches {
  id BIGINT [primary key]
  user_id BIGINT 
  branch_id BIGINT 
  is_default BOOLEAN [note: \'Flag cabang utama\']
  created_at TIMESTAMP
  updated_at TIMESTAMP
  created_by BIGINT [null]
  updated_by BIGINT [null]
}

Table user_permissions {
  id BIGINT [primary key]
  user_id BIGINT 
  permission_id BIGINT 
  is_deny BOOLEAN [default: false, note: \'Jika true, mencabut hak khusus user (Override Blacklist)\']
  created_at TIMESTAMP
  updated_at TIMESTAMP
  created_by BIGINT [null]
  updated_by BIGINT [null]
}

Table role_approvals {
  id BIGINT [primary key]
  role_id BIGINT 
  document_type VARCHAR(50) [note: \'Misal: PO, PR\']
  max_amount DECIMAL [note: \'Maksimal nilai dokumen yang boleh di-approve\']
  created_at TIMESTAMP
  updated_at TIMESTAMP
  created_by BIGINT [null]
  updated_by BIGINT [null]
}

// INJECTED FROM FSD-005 to FSD-025 MASS SCREENING
Table bp_groups {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  type VARCHAR
  is_internal BOOLEAN
  number_prefix VARCHAR
  status VARCHAR
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table bp_roles {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  category VARCHAR
  description TEXT
  is_active BOOLEAN
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table currencies {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  symbol VARCHAR
  decimal_places INT
  is_base_currency BOOLEAN
  is_active BOOLEAN
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table posting_period_variants {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  company_id BIGINT
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table posting_periods {
  id BIGINT [primary key]
  posting_period_variant_id BIGINT
  fiscal_year INT
  period_number INT
  status VARCHAR
  start_date DATE
  end_date DATE
  opened_until TIMESTAMP
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table number_ranges {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  prefix VARCHAR
  suffix VARCHAR
  digit_length INT
  start_number BIGINT
  end_number BIGINT
  current_number BIGINT
  reset_yearly BOOLEAN
  current_year INT
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table gl_account_groups {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  number_from VARCHAR
  number_to VARCHAR
  account_class VARCHAR
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table field_status_groups {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table field_status_details {
  id BIGINT [primary key]
  field_status_group_id BIGINT
  field_name VARCHAR
  status VARCHAR
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table retained_earning_configs {
  id BIGINT [primary key]
  company_id BIGINT
  chart_of_account_id BIGINT
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table year_end_close_logs {
  id BIGINT [primary key]
  company_id BIGINT
  fiscal_year VARCHAR
  status VARCHAR
  retained_earning_amount DECIMAL
  closing_journal_id BIGINT
  error_message TEXT
  executed_by BIGINT
  executed_at TIMESTAMP
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table bank_accounts {
  id BIGINT [primary key]
  house_bank_id BIGINT
  chart_of_account_id BIGINT
  account_number VARCHAR
  account_name VARCHAR
  currency_code VARCHAR
  is_active BOOLEAN
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table controlling_areas {
  id BIGINT [primary key]
  code VARCHAR
  name VARCHAR
  currency_code VARCHAR
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table company_controlling_areas {
  id BIGINT [primary key]
  company_id BIGINT
  controlling_area_id BIGINT
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table cost_center_groups {
  id BIGINT [primary key]
  controlling_area_id BIGINT
  parent_id BIGINT
  code VARCHAR
  name VARCHAR
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table auto_journal_mappings {
  id BIGINT [primary key]
  company_id BIGINT
  module_source VARCHAR
  transaction_key VARCHAR
  item_category_id BIGINT
  customer_group_id BIGINT
  chart_of_account_id BIGINT
  dc_indicator VARCHAR
  description VARCHAR
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table tax_codes {
  id BIGINT [primary key]
  company_id BIGINT
  tax_code VARCHAR
  description VARCHAR
  tax_type VARCHAR
  tax_rate DECIMAL
  chart_of_account_id BIGINT
  is_active BOOLEAN
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table material_types {
  id BIGINT [primary key]
  type_code VARCHAR
  description VARCHAR
  is_quantity_updated BOOLEAN
  is_value_updated BOOLEAN
  is_sales_allowed BOOLEAN
  is_purchase_allowed BOOLEAN
  document_numbering_id BIGINT
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}

Table valuation_classes {
  id BIGINT [primary key]
  class_code VARCHAR
  description VARCHAR
  material_type_id BIGINT
  is_active BOOLEAN
  created_by BIGINT [null, note: \'Foreign Key ke users.id\']
  updated_by BIGINT [null, note: \'Foreign Key ke users.id\']
  deleted_by BIGINT [null, note: \'Foreign Key ke users.id\']
  created_at TIMESTAMP [null]
  updated_at TIMESTAMP [null]
  deleted_at TIMESTAMP [null]
}


Table tolerance_limits {
  id BIGINT [primary key]
  company_id BIGINT 
  tolerance_key VARCHAR(10) [note: \'Misal: GR_UPPER, INV_LOWER\']
  description VARCHAR(100)
  amount_limit DECIMAL [null]
  percent_limit DECIMAL [null]
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table credit_control_areas {
  id BIGINT [primary key]
  code VARCHAR(10) [unique]
  name VARCHAR(100)
  currency_id BIGINT
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table risk_categories {
  id BIGINT [primary key]
  code VARCHAR(10) [unique]
  name VARCHAR(100)
  description VARCHAR(255)
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table customer_credit_limits {
  id BIGINT [primary key]
  customer_id BIGINT 
  credit_control_area_id BIGINT 
  risk_category_id BIGINT 
  limit_amount DECIMAL
  current_exposure DECIMAL
  is_blocked BOOLEAN [default: false]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table payment_terms {
  id BIGINT [primary key]
  code VARCHAR(20) [unique]
  description VARCHAR(150)
  discount_percentage_1 DECIMAL(5,2) [default: 0]
  discount_days_1 INT [default: 0]
  discount_percentage_2 DECIMAL(5,2) [default: 0]
  discount_days_2 INT [default: 0]
  net_due_days INT [default: 0]
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table sales_organizations {
  id BIGINT [primary key]
  company_id BIGINT 
  code VARCHAR(10) [unique]
  name VARCHAR(100)
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table distribution_channels {
  id BIGINT [primary key]
  code VARCHAR(10) [unique]
  name VARCHAR(100)
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table brands {
  id BIGINT [primary key]
  code VARCHAR(10) [unique]
  name VARCHAR(100)
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table sales_areas {
  id BIGINT [primary key]
  sales_org_id BIGINT 
  dist_channel_id BIGINT 
  brand_id BIGINT 
  schema_group_id BIGINT [null, ref: > sales_schema_groups.id]
  description VARCHAR(150)
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table purchasing_organizations {
  id BIGINT [primary key]
  company_id BIGINT 
  schema_group_id BIGINT [null, ref: > purchasing_schema_groups.id]
  code VARCHAR(10) [unique]
  name VARCHAR(100)
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table purchasing_groups {
  id BIGINT [primary key]
  purchasing_organization_id BIGINT 
  code VARCHAR(10)
  name VARCHAR(100)
  phone VARCHAR(50)
  email VARCHAR(100)
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Ref: account_determinations.coa_id > coas.id
Ref: account_determinations.company_id > companies.id
Ref: activity_logs.user_id > users.id
Ref: ap_invoice_lines.ap_invoice_id > ap_invoices.id
Ref: ap_invoice_lines.material_id > materials.id
Ref: ap_invoices.document_type_id > document_types.id
Ref: ap_invoices.material_document_id > material_documents.id
Ref: ap_invoices.supplier_id > suppliers.id
Ref: approval_authorities.role_id > roles.id
Ref: bank_statement_lines.bank_statement_id > bank_statements.id
Ref: bank_statement_lines.offsetting_coa_id > coas.id
Ref: bank_statements.document_type_id > document_types.id
Ref: bank_statements.house_bank_id > house_banks.id
Ref: batches.material_id > materials.id
Ref: serial_numbers.material_id > materials.id
Ref: serial_numbers.batch_id > batches.id
Ref: serial_numbers.branch_id > branches.id
Ref: bill_of_material_items.bill_of_material_id > bill_of_materials.id
Ref: bill_of_materials.branch_id > branches.id
Ref: bins.storage_location_id > storage_locations.id
Ref: branches.city_id > cities.id
Ref: branches.company_id > companies.id
Ref: cash_journal_lines.cash_journal_id > cash_journals.id
Ref: cash_journal_lines.offsetting_coa_id > coas.id
Ref: cash_journals.branch_id > branches.id
Ref: cash_journals.coa_id > coas.id
Ref: cash_journals.document_type_id > document_types.id
Ref: companies.base_currency_id > local_currencies.id
Ref: companies.city_id > cities.id
Ref: companies.country_id > countries.id
Ref: companies.province_id > provinces.id
Ref: companies.tax_country_id > countries.id
Ref: condition_records.condition_type_id > condition_types.id
Ref: condition_records.customer_group_4_id > customer_groups.id
Ref: condition_records.customer_id > customers.id
Ref: condition_records.distribution_channel_id > distribution_channels.id
Ref: condition_records.material_id > materials.id
Ref: condition_records.sales_organization_id > sales_organizations.id
Ref: customer_banks.customer_id > customers.id
Ref: customer_blocked_orders.customer_id > customers.id
Ref: customer_blocked_orders.sales_order_id > sales_orders.id
Ref: customer_companies.company_id > companies.id
Ref: customer_companies.customer_id > customers.id
Ref: customer_credit_limit_logs.customer_id > customers.id
Ref: customer_credit_limits.credit_control_area_id > credit_control_areas.id
Ref: customer_credit_limits.customer_id > customers.id
Ref: customer_credit_limits.risk_category_id > risk_categories.id
Ref: customer_groups.distribution_channel_id > distribution_channels.id
Ref: customer_groups.parent_id > customer_groups.id
Ref: customer_groups.pricing_procedure_id > pricing_procedures.id
Ref: customer_hierarchies.customer_group_1_id > customer_groups.id
Ref: customer_hierarchies.customer_group_2_id > customer_groups.id
Ref: customer_hierarchies.customer_group_3_id > customer_groups.id
Ref: customer_hierarchies.customer_group_4_id > customer_groups.id
Ref: customer_hierarchies.customer_hierarchy_group_id > customer_hierarchy_groups.id
Ref: customer_hierarchies.customer_id > customers.id
Ref: customer_partner_functions.customer_id > customers.id
Ref: customer_partner_functions.partner_customer_id > customers.id
Ref: customer_receipt_lines.customer_receipt_id > customer_receipts.id
Ref: customer_receipt_lines.sales_invoice_id > sales_invoices.id
Ref: customer_receipts.customer_id > customers.id
Ref: customer_receipts.document_type_id > document_types.id
Ref: customer_receipts.house_bank_id > house_banks.id
Ref: customer_recon_account_logs.customer_id > customers.id
Ref: customer_sales_areas.branch_id > branches.id
Ref: customer_sales_areas.customer_id > customers.id
Ref: customer_sales_areas.sales_area_id > sales_areas.id
Ref: customer_ship_to_addresses.customer_id > customers.id
Ref: customer_ship_to_addresses.transportation_zone_id > transportation_zones.id
Ref: customers.customer_group_0_id > customer_groups.id
Ref: customers.customer_group_1_id > customer_groups.id
Ref: customers.customer_group_2_id > customer_groups.id
Ref: customers.customer_group_3_id > customer_groups.id
Ref: customers.customer_group_4_id > customer_groups.id
Ref: customers.transportation_zone_id > transportation_zones.id
Ref: customers.visit_route_id > visit_routes.id
Ref: delivery_order_lines.base_uom_id > base_uoms.id
Ref: delivery_order_lines.batch_id > batches.id
Ref: delivery_order_lines.delivery_order_id > delivery_orders.id
Ref: delivery_order_lines.sales_order_line_id > sales_order_lines.id
Ref: delivery_order_lines.storage_location_id > storage_locations.id
Ref: delivery_orders.branch_id > branches.id
Ref: delivery_orders.customer_id > customers.id
Ref: delivery_orders.driver_id > drivers.id
Ref: delivery_orders.sales_order_id > sales_orders.id
Ref: delivery_orders.vehicle_id > vehicles.id
Ref: document_type_mappings.delivery_type_id > delivery_types.id
Ref: document_type_mappings.sales_order_type_id > sales_order_types.id
Ref: drivers.branch_id > branches.id
Ref: goods_movement_mappings.created_by > users.id
Ref: goods_movement_mappings.deleted_by > users.id
Ref: goods_movement_mappings.movement_type_id > movement_types.id
Ref: goods_movement_mappings.updated_by > users.id
Ref: house_banks.coa_id > coas.id
Ref: house_banks.company_id > companies.id
Ref: journal_lines.coa_id > coas.id
Ref: journal_lines.cost_center_id > cost_centers.id
Ref: journal_lines.journal_id > journals.id
Ref: journals.document_type_id > document_types.id
Ref: material_branches.branch_id > branches.id
Ref: material_branches.material_id > materials.id
Ref: material_companies.company_id > companies.id
Ref: material_companies.material_id > materials.id
Ref: material_document_lines.batch_id > batches.id
Ref: material_document_lines.branch_id > branches.id
Ref: material_document_lines.cost_center_id > cost_centers.id
Ref: material_document_lines.customer_id > customers.id
Ref: material_document_lines.material_document_id > material_documents.id
Ref: material_document_lines.material_id > materials.id
Ref: material_document_lines.movement_type_id > movement_types.id
Ref: material_document_lines.partner_branch_id > branches.id
Ref: material_document_lines.storage_location_id > storage_locations.id
Ref: material_document_lines.supplier_id > suppliers.id
Ref: material_documents.document_type_id > document_types.id
Ref: material_hierarchies.material_group_1_id > material_groups.id
Ref: material_hierarchies.material_group_2_id > material_groups.id
Ref: material_hierarchies.material_group_3_id > material_groups.id
Ref: material_hierarchies.material_group_4_id > material_groups.id
Ref: material_price_ledgers.company_id > companies.id
Ref: material_price_ledgers.material_id > materials.id
Ref: material_purchasing_orgs.material_id > materials.id
Ref: material_purchasing_orgs.preferred_vendor_id > vendors.id
Ref: material_purchasing_orgs.purchasing_organization_id > purchasing_organizations.id
Ref: material_sales_orgs.material_id > materials.id
Ref: material_sales_orgs.sales_organization_id > sales_organizations.id
Ref: material_uom_conversions.alt_uom_id > alt_uoms.id
Ref: material_uom_conversions.base_uom_id > base_uoms.id
Ref: material_uom_conversions.material_id > materials.id
Ref: materials.base_uom_id > base_uoms.id
Ref: materials.brand_id > brands.id
Ref: materials.material_group_0_id > material_groups.id
Ref: materials.material_group_1_id > material_groups.id
Ref: materials.material_group_2_id > material_groups.id
Ref: materials.material_group_3_id > material_groups.id
Ref: materials.material_group_4_id > material_groups.id
Ref: model_has_roles.model_id > models.id
Ref: model_has_roles.role_id > roles.id
Ref: movement_types.created_by > users.id
Ref: movement_types.deleted_by > users.id
Ref: movement_types.updated_by > users.id
Ref: price_change_lines.company_id > companies.id
Ref: price_change_lines.material_id > materials.id
Ref: price_change_lines.price_change_document_id > price_change_documents.id
Ref: pricing_procedure_steps.condition_type_id > condition_types.id
Ref: pricing_procedure_steps.pricing_procedure_id > pricing_procedures.id
Ref: purchase_condition_records.material_id > materials.id
Ref: purchase_condition_records.purchase_condition_type_id > purchase_condition_types.id
Ref: purchase_condition_records.vendor_id > vendors.id
Ref: purchase_condition_scales.purchase_condition_record_id > purchase_condition_records.id
Ref: purchase_condition_tiers.purchase_condition_record_id > purchase_condition_records.id
Ref: purchase_invoice_conditions.purchase_condition_type_id > purchase_condition_types.id
Ref: purchase_invoice_conditions.purchase_order_condition_id > purchase_order_conditions.id
Ref: purchase_invoice_conditions.vendor_id > vendors.id
Ref: purchase_order_conditions.condition_vendor_id > vendors.id
Ref: purchase_order_conditions.purchase_condition_type_id > purchase_condition_types.id
Ref: purchase_contract_lines.currency_id > currencies.id
Ref: purchase_contract_lines.material_group_id > material_groups.id
Ref: purchase_contract_lines.material_id > materials.id
Ref: purchase_contract_lines.purchase_contract_id > purchase_contracts.id
Ref: purchase_contract_lines.tax_code_id > tax_codes.id
Ref: purchase_contract_lines.uom_id > uoms.id
Ref: purchase_contracts.branch_id > branches.id
Ref: purchase_contracts.document_type_id > document_types.id
Ref: purchase_contracts.purchasing_group_id > purchasing_groups.id
Ref: purchase_contracts.purchasing_organization_id > purchasing_organizations.id
Ref: purchase_contracts.vendor_id > vendors.id
Ref: purchase_order_conditions.purchase_order_id > purchase_orders.id
Ref: purchase_order_conditions.purchase_pricing_procedure_step_id > purchase_pricing_procedure_steps.id
Ref: purchase_order_lines.material_id > materials.id
Ref: purchase_order_lines.purchase_order_id > purchase_orders.id
Ref: purchase_orders.document_type_id > document_types.id
Ref: purchase_orders.main_vendor_id > vendors.id
Ref: purchase_orders.purchase_pricing_procedure_id > purchase_pricing_procedures.id
Ref: purchase_orders.supplier_id > suppliers.id
Ref: purchase_pricing_procedure_steps.purchase_condition_type_id > purchase_condition_types.id
Ref: purchase_pricing_procedure_steps.purchase_pricing_procedure_id > purchase_pricing_procedures.id
Ref: purchase_requisition_lines.material_id > materials.id
Ref: purchase_requisition_lines.purchase_requisition_id > purchase_requisitions.id
Ref: request_for_quotations.document_type_id > document_types.id
Ref: request_for_quotations.branch_id > branches.id
Ref: request_for_quotations.purchasing_group_id > purchasing_groups.id
Ref: request_for_quotation_lines.request_for_quotation_id > request_for_quotations.id
Ref: request_for_quotation_lines.purchase_requisition_line_id > purchase_requisition_lines.id
Ref: request_for_quotation_lines.material_id > materials.id
Ref: request_for_quotation_lines.material_group_id > material_groups.id
Ref: request_for_quotation_lines.uom_id > uoms.id
Ref: request_for_quotation_lines.currency_id > currencies.id
Ref: request_for_quotation_vendors.request_for_quotation_id > request_for_quotations.id
Ref: request_for_quotation_vendors.vendor_id > vendors.id
Ref: request_for_quotation_vendor_lines.request_for_quotation_vendor_id > request_for_quotation_vendors.id
Ref: request_for_quotation_vendor_lines.request_for_quotation_line_id > request_for_quotation_lines.id
Ref: request_for_quotation_vendor_lines.currency_id > currencies.id
Ref: request_for_quotation_vendor_lines.payment_term_id > payment_terms.id
Ref: request_for_quotation_vendor_lines.tax_code_id > tax_codes.id
Ref: quotation_comparison_forms.branch_id > branches.id
Ref: quotation_comparison_forms.request_for_quotation_id > request_for_quotations.id
Ref: quotation_comparison_lines.quotation_comparison_form_id > quotation_comparison_forms.id
Ref: quotation_comparison_lines.request_for_quotation_line_id > request_for_quotation_lines.id
Ref: quotation_comparison_lines.request_for_quotation_vendor_line_id > request_for_quotation_vendor_lines.id
Ref: purchase_requisitions.branch_id > branches.id
Ref: purchasing_groups.purchasing_organization_id > purchasing_organizations.id
Ref: purchasing_info_records.branch_id > branches.id
Ref: purchasing_info_records.material_id > materials.id
Ref: purchasing_info_records.purchasing_organization_id > purchasing_organizations.id
Ref: purchasing_info_records.vendor_id > vendors.id
Ref: purchasing_organizations.company_id > companies.id
Ref: role_approvals.role_id > roles.id
Ref: role_has_permissions.permission_id > permissions.id
Ref: role_has_permissions.role_id > roles.id
Ref: role_movement_types.movement_type_id > movement_types.id
Ref: role_movement_types.role_id > roles.id
Ref: roles.company_id > companies.id
Ref: sales_areas.dist_channel_id > distribution_channels.id
Ref: sales_areas.brand_id > brands.id
Ref: sales_areas.sales_org_id > sales_organizations.id
Ref: sales_condition_records.condition_type_id > condition_types.id
Ref: sales_condition_records.customer_group_id > customer_groups.id
Ref: sales_condition_records.customer_id > customers.id
Ref: sales_condition_records.material_id > materials.id
Ref: sales_condition_scales.sales_condition_record_id > sales_condition_records.id
Ref: sales_condition_tiers.sales_condition_record_id > sales_condition_records.id
Ref: sales_employees.branch_id > branches.id
Ref: sales_free_goods_records.sales_condition_record_id > sales_condition_records.id
Ref: sales_invoice_conditions.condition_type_id > condition_types.id
Ref: sales_invoice_conditions.pricing_procedure_step_id > pricing_procedure_steps.id
Ref: sales_invoice_conditions.sales_invoice_line_id > sales_invoice_lines.id
Ref: sales_invoice_lines.batch_id > batches.id
Ref: sales_invoice_lines.delivery_order_line_id > delivery_order_lines.id
Ref: sales_invoice_lines.material_id > materials.id
Ref: sales_invoice_lines.sales_invoice_id > sales_invoices.id
Ref: sales_invoices.branch_id > branches.id
Ref: sales_invoices.customer_id > customers.id
Ref: sales_invoices.delivery_order_id > delivery_orders.id
Ref: sales_invoices.document_type_id > document_types.id
Ref: sales_invoices.sales_order_id > sales_orders.id
Ref: sales_order_conditions.condition_type_id > condition_types.id
Ref: sales_order_conditions.pricing_procedure_step_id > pricing_procedure_steps.id
Ref: sales_order_conditions.sales_order_line_id > sales_order_lines.id
Ref: sales_order_lines.material_id > materials.id
Ref: sales_order_lines.sales_order_id > sales_orders.id
Ref: sales_orders.branch_id > branches.id
Ref: sales_orders.customer_id > customers.id
Ref: sales_orders.delivery_route_id > delivery_routes.id
Ref: sales_orders.document_type_id > document_types.id
Ref: sales_organizations.company_id > companies.id
Ref: shipment_costs.shipment_header_id > shipment_headers.id
Ref: shipment_headers.driver_id > drivers.id
Ref: shipment_headers.vehicle_id > vehicles.id
Ref: shipment_lines.shipment_header_id > shipment_headers.id
Ref: shipping_points.branch_id > branches.id
Ref: storage_locations.branch_id > branches.id
Ref: supplier_banks.supplier_id > suppliers.id
Ref: tolerance_limits.company_id > companies.id
Ref: user_branches.branch_id > branches.id
Ref: user_branches.user_id > users.id
Ref: user_permissions.permission_id > permissions.id
Ref: user_permissions.user_id > users.id
Ref: users.current_branch_id > branches.id
Ref: users.default_branch_id > branches.id
Ref: vehicles.branch_id > branches.id
Ref: vendor_banks.vendor_id > vendors.id
Ref: vendor_block_logs.vendor_id > vendors.id
Ref: vendor_companies.company_id > companies.id
Ref: vendor_companies.payment_terms_id > payment_terms.id
Ref: vendor_companies.vendor_id > vendors.id
Ref: vendor_partner_functions.assigned_vendor_id > vendors.id
Ref: vendor_partner_functions.vendor_id > vendors.id
Ref: vendor_payment_lines.ap_invoice_id > ap_invoices.id
Ref: vendor_payment_lines.vendor_payment_id > vendor_payments.id
Ref: vendor_payments.document_type_id > document_types.id
Ref: vendor_payments.house_bank_id > house_banks.id
Ref: vendor_payments.supplier_id > suppliers.id
Ref: vendor_purchasing_orgs.purchasing_group_id > purchasing_groups.id
Ref: vendor_purchasing_orgs.purchasing_organization_id > purchasing_organizations.id
Ref: vendor_purchasing_orgs.vendor_id > vendors.id
Ref: vendor_recon_account_logs.vendor_id > vendors.id
Ref: visit_routes.sales_employee_id > sales_employees.id
Ref: work_order_items.work_order_id > work_orders.id
Ref: work_orders.bill_of_material_id > bill_of_materials.id
Ref: work_orders.branch_id > branches.id


Table branch_sales_areas {
  id BIGINT [primary key]
  branch_id BIGINT
  sales_area_id BIGINT
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Table branch_purchasing_organizations {
  id BIGINT [primary key]
  branch_id BIGINT
  purchasing_organization_id BIGINT
  is_active BOOLEAN [default: true]
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
  deleted_by BIGINT
}

Ref: companies.credit_control_area_id > credit_control_areas.id
Ref: branch_sales_areas.branch_id > branches.id
Ref: branch_sales_areas.sales_area_id > sales_areas.id
Ref: branch_purchasing_organizations.branch_id > branches.id
Ref: branch_purchasing_organizations.purchasing_organization_id > purchasing_organizations.id

Table asset_classes {
  id BIGINT [primary key]
  code VARCHAR(20) [unique]
  name VARCHAR(100)
  account_determination_id BIGINT
  number_range_group VARCHAR(10)
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
}

Table fixed_assets {
  id BIGINT [primary key]
  company_id BIGINT
  asset_class_id BIGINT
  asset_code VARCHAR(30) [unique]
  sub_number VARCHAR(10)
  name VARCHAR(255)
  description TEXT
  serial_number VARCHAR(100)
  inventory_number VARCHAR(100)
  quantity DECIMAL(15,2)
  uom_id BIGINT
  capitalization_date DATE
  deactivation_date DATE
  status VARCHAR(30)
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
  created_by BIGINT
  updated_by BIGINT
}

Table fixed_asset_depreciation_areas {
  id BIGINT [primary key]
  fixed_asset_id BIGINT
  depreciation_area VARCHAR(20)
  depreciation_key_id BIGINT
  useful_life_years INT
  useful_life_periods INT
  depreciation_start_date DATE
  scrap_value DECIMAL(19,4)
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
}

Table fixed_asset_assignments {
  id BIGINT [primary key]
  fixed_asset_id BIGINT
  branch_id BIGINT
  cost_center_id BIGINT
  location_name VARCHAR(255)
  valid_from DATE
  valid_to DATE
  created_at TIMESTAMP
  updated_at TIMESTAMP
  deleted_at TIMESTAMP
}

Ref: fixed_assets.company_id > companies.id
Ref: fixed_assets.asset_class_id > asset_classes.id
Ref: fixed_assets.uom_id > base_uoms.id
Ref: fixed_asset_depreciation_areas.fixed_asset_id > fixed_assets.id
Ref: fixed_asset_assignments.fixed_asset_id > fixed_assets.id
Ref: fixed_asset_assignments.branch_id > branches.id
Ref: fixed_asset_assignments.cost_center_id > cost_centers.id
',
          'status' => 'Review',
          'created_at' => '2026-07-13 11:40:58',
          'updated_at' => '2026-07-25 03:24:13',
        ),
    ));


  }
}