<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlueprintDocumentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('blueprint_documents')->delete();
        
        \DB::table('blueprint_documents')->insert(array (
            0 => 
            array (
                'id' => 1,
                'project_id' => 1,
            'title' => '01. Blue Print - Modul SD (Sales & Distribution)',
            'background' => '<p>Modul <strong>Sales &amp; Distribution (SD)</strong> adalah urat nadi utama dalam operasional pendapatan perusahaan. Modul ini bertanggung jawab untuk mengelola seluruh siklus penjualan, mulai dari pencatatan master data pelanggan, penentuan harga (pricing), penciptaan pesanan (Sales Order), pengiriman barang (Delivery), hingga penagihan (Billing).</p><p>Karena kompleksitas kebijakan penjualan dan tingginya volume transaksi, modul ini juga diintegrasikan dengan fondasi sistem (System Foundation) serta fungsi persetujuan bertingkat (Approval Level Matrix / ALM) untuk transaksi khusus seperti pemberian diskon manual, pelampauan batas kredit (Credit Limit), maupun proses retur (Return/Reversal). Test</p>',
                'scope' => '<style>
            .pattern-diagonal-lines-sm {
                background-image: repeating-linear-gradient(45deg, #e5e7eb 0, #e5e7eb 1px, transparent 1px, transparent 4px);
            }
        </style>
        <div id="section-0" class="mb-10">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>1. Sales Organization Structure</span></h2>
    <div class="prose max-w-none prose-sm text-justify text-gray-800 leading-loose">
        <p>Struktur Organisasi Penjualan mendefinisikan hierarki bisnis perusahaan dalam menangani proses penjualan. Struktur ini dirancang secara dinamis (<em>scalable</em>) agar dapat mengakomodasi berbagai model bisnis, mulai dari Kontraktor (Proyek/Jasa) hingga Distribusi (Barang/Retail). Ini mencakup <em>Sales Organization</em> (entitas hukum), <em>Distribution Channel</em> (jalur penjualan seperti Proyek atau Retail), dan <em>Brand/Division</em> (kategori lini bisnis seperti Jasa atau Material).</p>
    </div>
    
    <h3 class="font-bold mt-6 mb-2">Hierarchy Diagram: Sales Enterprise Structure</h3>
    <div class="flow-container" style="margin: 20px auto; max-width: 600px; text-align: center;">
        <div class="flow-node primary mx-auto" style="padding: 10px; font-size: 0.9rem; max-width: 250px;">Company Code</div>
        <div class="flow-line-vertical arrow" style="height: 25px;"></div>
        
        <div class="flow-node warning mx-auto" style="padding: 10px; font-size: 0.9rem; max-width: 250px;">Sales Organization</div>
        <div class="flow-line-vertical" style="height: 25px;"></div>
        
        <!-- BRANCH -->
        <div class="flow-branch" style="width: 100%; position: relative;">
            <div class="flow-col">
                <div class="drop-arrow"></div>
                <div class="flow-node success mx-auto" style="font-size: 0.8rem; padding: 10px; z-index: 2;">Dist. Channel: B2B / Project</div>
                <div style="width: 2px; height: 20px; background: #9ca3af; margin: 0 auto;"></div>
            </div>
            <div class="flow-col">
                <div class="drop-arrow"></div>
                <div class="flow-node success mx-auto" style="font-size: 0.8rem; padding: 10px; z-index: 2;">Dist. Channel: B2C / Retail</div>
                <div style="width: 2px; height: 20px; background: #9ca3af; margin: 0 auto;"></div>
            </div>
        </div>
        
        <!-- BULLETPROOF BRIDGE -->
        <div style="position: relative; width: 100%; height: 0; z-index: 1;">
            <div style="position: absolute; bottom: 0; left: 25%; width: 50%; height: 2px; background: #9ca3af;"></div>
            <div style="position: absolute; top: 0; left: 50%; width: 2px; height: 20px; background: #9ca3af; margin-left: -1px;"></div>
            <div style="position: absolute; top: 20px; left: 50%; margin-left: -5px; width: 0; height: 0; border-left: 5px solid transparent; border-right: 5px solid transparent; border-top: 5px solid #9ca3af;"></div>
        </div>
        
        <div style="height: 25px; width: 100%;"></div>
        
        <div class="flow-node danger mx-auto" style="font-size: 0.8rem; padding: 15px; width: 80%; max-width: 400px; position: relative; z-index: 3;">
            Brand / Division: Services & Materials
        </div>
        

        
        <div class="flow-line-vertical arrow" style="height: 25px;"></div>
        
        <div class="flow-node warning mx-auto" style="font-size: 0.8rem; padding: 10px; width: 60%; max-width: 300px;">
            Branch
        </div>
        

    </div>

    <!-- Distribution Channel Table -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">Distribution Channel - Detail</h3>
    <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200 mb-8">
        <table class="min-w-full bg-white text-left border-collapse">
            <thead class="bg-blue-50 text-blue-900 border-b border-gray-200">
                <tr>
                    <th class="py-3 px-4 font-semibold text-sm w-16">Code</th>
                    <th class="py-3 px-4 font-semibold text-sm w-48">Description</th>
                    <th class="py-3 px-4 font-semibold text-sm">Definition</th>
                    <th class="py-3 px-4 font-semibold text-sm w-32">PIC</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">PR</td>
                    <td class="py-3 px-4">B2B / Project</td>
                    <td class="py-3 px-4 leading-relaxed text-justify">Saluran distribusi untuk penjualan berbasis proyek, tender, atau kontrak Business-to-Business (B2B). Sangat relevan untuk layanan kontraktor.</td>
                    <td class="py-3 px-4">Manager Project</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">RT</td>
                    <td class="py-3 px-4">B2C / Retail</td>
                    <td class="py-3 px-4 leading-relaxed text-justify">Saluran distribusi untuk penjualan barang material secara langsung ke konsumen akhir atau pengecer.</td>
                    <td class="py-3 px-4">Manager Retail</td>
                </tr>
                            <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
        </table>
    </div>
    
    <!-- Brand / Division Table -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">Brand / Division - Detail</h3>
    <p class="text-sm text-gray-600 mb-4 italic">Setiap kategori/jenis produk akan direpresentasikan oleh satu Division di dalam Sistem untuk mempermudah analisis dan pelacakan tren penjualan barang yang paling laris.</p>
    <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200 mb-6">
        <table class="min-w-full bg-white text-left border-collapse">
            <thead class="bg-blue-50 text-blue-900 border-b border-gray-200">
                <tr>
                    <th class="py-3 px-4 font-semibold text-sm w-16">Code</th>
                    <th class="py-3 px-4 font-semibold text-sm w-64">Description</th>
                    <th class="py-3 px-4 font-semibold text-sm">Definition / Scope</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">E01</td>
                    <td class="py-3 px-4">Epoxy Coating 300-500µ</td>
                    <td class="py-3 px-4 leading-relaxed">Pelapis lantai epoxy tipis dengan ketebalan 300 s/d 500 micron.</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">E02</td>
                    <td class="py-3 px-4">Epoxy Floor 1000-3000µ</td>
                    <td class="py-3 px-4 leading-relaxed">Pelapis lantai epoxy heavy-duty dengan ketebalan 1000 s/d 3000 micron.</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">E03</td>
                    <td class="py-3 px-4">Epoxy Mortar 3-5mm</td>
                    <td class="py-3 px-4 leading-relaxed">Sistem perbaikan lantai kekuatan tinggi ketebalan 3 s/d 5 mm.</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">E04</td>
                    <td class="py-3 px-4">Epoxy Injection</td>
                    <td class="py-3 px-4 leading-relaxed">Produk injeksi epoxy untuk perbaikan retak pada beton struktur.</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">P01</td>
                    <td class="py-3 px-4">Polyurethane Coating</td>
                    <td class="py-3 px-4 leading-relaxed">Pelapis lantai Polyurethane (PU) untuk area outdoor atau spesifik.</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">P02</td>
                    <td class="py-3 px-4">PU Crete 3000-9000µ</td>
                    <td class="py-3 px-4 leading-relaxed">Polyurethane beton (PU Crete) tahan bahan kimia ekstrim 3000 s/d 9000 micron.</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">P03</td>
                    <td class="py-3 px-4">PU Waterproofing & Fiber</td>
                    <td class="py-3 px-4 leading-relaxed">Sistem pelapis anti bocor Polyurethane lengkap dengan penguat Fiber Mesh.</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-gray-900">U01</td>
                    <td class="py-3 px-4">UV Floor Coating</td>
                    <td class="py-3 px-4 leading-relaxed">Pelapis lantai mutakhir dengan teknologi pengeringan instan sinar UV.</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 font-medium text-blue-900 bg-blue-50/50">SVC</td>
                    <td class="py-3 px-4 font-medium bg-blue-50/50">Services / Jasa Instalasi</td>
                    <td class="py-3 px-4 leading-relaxed bg-blue-50/50">Lini bisnis yang berfokus pada tagihan biaya jasa pengerjaan dan aplikator.</td>
                </tr>
                            <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
        </table>
    </div>
    <!-- Branch Table -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">Branch - Detail</h3>
    <p class="text-sm text-gray-600 mb-6 italic">Setiap cabang (Branch) perusahaan akan direpresentasikan sebagai satu Branch di dalam Sistem. Penamaan kode Branch diatur menggunakan standar kombinasi fungsi dan kode wilayah geografis (BPS).</p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <!-- Naming Convention Table -->
        <div>
            <h4 class="font-bold text-sm text-blue-900 mb-3 bg-blue-50 py-1 px-3 rounded inline-block">Branch – Naming Convention</h4>
            <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200">
                <table class="min-w-full bg-white text-left border-collapse text-sm">
                    <tbody class="text-gray-700 divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 font-bold border-r w-16">S</td>
                            <td class="py-2 px-4">Sales / Branch Office</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 font-bold border-r">31</td>
                            <td class="py-2 px-4">Kode Provinsi (BPS Code)</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 font-bold border-r">1</td>
                            <td class="py-2 px-4">Nomor Urut Cabang (Sequence)</td>
                        </tr>
                                    <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
                </table>
            </div>
            
            <h4 class="font-bold text-sm text-blue-900 mb-3 mt-6 bg-blue-50 py-1 px-3 rounded inline-block">Contoh Branch</h4>
            <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200 p-4 text-sm text-gray-700 bg-white">
                <ul class="grid grid-cols-2 gap-2 list-disc pl-4">
                    <li>S121 (Medan)</li>
                    <li>S311 (HO - Jakarta)</li>
                    <li>S312 (Jakarta 2)</li>
                    <li>S321 (Bekasi)</li>
                    <li>S331 (Semarang)</li>
                    <li>S351 (Surabaya)</li>
                    <li>S511 (Bali)</li>
                    <li>S731 (Makassar)</li>
                </ul>
            </div>
        </div>
        
        <!-- BPS Code Table -->
        <div>
            <h4 class="font-bold text-sm text-blue-900 mb-3 bg-blue-50 py-1 px-3 rounded inline-block">Standar Kode BPS (Provinsi)</h4>
            <div class="overflow-hidden rounded-lg shadow-sm border border-gray-200">
                <table class="min-w-full bg-white text-left border-collapse text-xs">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="py-2 px-2 font-semibold border-b border-r">Provinsi</th>
                            <th class="py-2 px-2 font-semibold border-b border-r text-center w-12">Kode</th>
                            <th class="py-2 px-2 font-semibold border-b border-r">Provinsi</th>
                            <th class="py-2 px-2 font-semibold border-b text-center w-12">Kode</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Aceh</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">11</td>
                            <td class="py-1 px-2 border-r">Bali</td><td class="py-1 px-2 text-center font-medium bg-gray-50">51</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Sumatra Utara</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">12</td>
                            <td class="py-1 px-2 border-r">NTB</td><td class="py-1 px-2 text-center font-medium bg-gray-50">52</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Sumatra Barat</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">13</td>
                            <td class="py-1 px-2 border-r">NTT</td><td class="py-1 px-2 text-center font-medium bg-gray-50">53</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Riau</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">14</td>
                            <td class="py-1 px-2 border-r">Kalimantan Barat</td><td class="py-1 px-2 text-center font-medium bg-gray-50">61</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Jambi</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">15</td>
                            <td class="py-1 px-2 border-r">Kalimantan Tengah</td><td class="py-1 px-2 text-center font-medium bg-gray-50">62</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Sumatra Selatan</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">16</td>
                            <td class="py-1 px-2 border-r">Kalimantan Selatan</td><td class="py-1 px-2 text-center font-medium bg-gray-50">63</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Bengkulu</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">17</td>
                            <td class="py-1 px-2 border-r">Kalimantan Timur</td><td class="py-1 px-2 text-center font-medium bg-gray-50">64</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Lampung</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">18</td>
                            <td class="py-1 px-2 border-r">Sulawesi Utara</td><td class="py-1 px-2 text-center font-medium bg-gray-50">71</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Kep. Bangka Belitung</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">19</td>
                            <td class="py-1 px-2 border-r">Sulawesi Tengah</td><td class="py-1 px-2 text-center font-medium bg-gray-50">72</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Kep. Riau</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">21</td>
                            <td class="py-1 px-2 border-r">Sulawesi Selatan</td><td class="py-1 px-2 text-center font-medium bg-gray-50">73</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Jakarta</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">31</td>
                            <td class="py-1 px-2 border-r">Gorontalo</td><td class="py-1 px-2 text-center font-medium bg-gray-50">75</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Jawa Barat</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">32</td>
                            <td class="py-1 px-2 border-r">Papua</td><td class="py-1 px-2 text-center font-medium bg-gray-50">94</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Jawa Tengah</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">33</td>
                            <td class="py-1 px-2 border-r"></td><td class="py-1 px-2 text-center font-medium bg-gray-50"></td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Yogyakarta</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">34</td>
                            <td class="py-1 px-2 border-r"></td><td class="py-1 px-2 text-center font-medium bg-gray-50"></td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Jawa Timur</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">35</td>
                            <td class="py-1 px-2 border-r"></td><td class="py-1 px-2 text-center font-medium bg-gray-50"></td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-1 px-2 border-r">Banten</td><td class="py-1 px-2 border-r text-center font-medium bg-gray-50">36</td>
                            <td class="py-1 px-2 border-r"></td><td class="py-1 px-2 text-center font-medium bg-gray-50"></td>
                        </tr>
                                    <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div id="section-1"    class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>2. Customer Master Data</span></h2>
    
    <div class="mb-6 prose max-w-none prose-sm text-justify text-gray-800">
        <h3 class="font-bold text-lg mb-2">Customer Code (Kode Pelanggan)</h3>
        <ul class="list-disc pl-5 space-y-2">
            <li>Seluruh pelanggan lama (<em>existing customers</em>) akan diunggah (<em>upload</em>) ke dalam Sistem dengan kodifikasi yang baru.</li>
            <li><strong>As-Is Customer Code (Sistem Lama):</strong>
                <ul class="list-circle pl-5 mt-1 space-y-1 text-gray-600">
                    <li>Kombinasi 10 digit Alphanumeric yang didefinisikan secara bebas.</li>
                    <li>Contoh 1: <code>LR01000028</code> (Maju Jaya Abadi, PT)</li>
                    <li>Contoh 2: <code>INDO0038</code> (Indo Sentosa Bekasi)</li>
                </ul>
            </li>
            <li><strong>To-Be Customer Code (Sistem Baru):</strong>
                <p class="mt-1">Struktur penomoran master data pelanggan di dalam Sistem akan diatur secara otomatis (<em>internal number</em>) berdasarkan grup pelanggan, untuk mencegah duplikasi dan mempermudah pengelompokan.</p>
            </li>
        </ul>
    </div>
    
    <!-- Customer Master Data Table -->
    <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200 mb-8">
        <table class="min-w-full bg-white text-left border-collapse text-sm">
            <thead class="bg-blue-50 text-blue-900 border-b border-gray-200">
                <tr>
                    <th class="py-3 px-3 font-semibold text-xs border-r w-24">Customer Type</th>
                    <th class="py-3 px-3 font-semibold text-xs border-r w-20">Customer Group</th>
                    <th class="py-3 px-3 font-semibold text-xs border-r w-32">Description</th>
                    <th class="py-3 px-3 font-semibold text-xs border-r w-28">Internal / External No.</th>
                    <th class="py-3 px-3 font-semibold text-xs border-r text-center">Number Range From</th>
                    <th class="py-3 px-3 font-semibold text-xs border-r text-center">Number Range To</th>
                    <th class="py-3 px-3 font-semibold text-xs border-r w-32">Example</th>
                    <th class="py-3 px-3 font-semibold text-xs w-48">Remark</th>
                </tr>
            </thead>
            <tbody class="text-xs text-gray-700 divide-y divide-gray-100">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-3 border-r font-medium">Sold To, Bill To, Payer</td>
                    <td class="py-2 px-3 border-r text-center font-bold">10SO</td>
                    <td class="py-2 px-3 border-r">Customer Sold To</td>
                    <td class="py-2 px-3 border-r italic text-gray-600">Internal running number by Sistem</td>
                    <td class="py-2 px-3 border-r text-center font-mono text-blue-800 bg-blue-50/30">1010000000</td>
                    <td class="py-2 px-3 border-r text-center font-mono text-blue-800 bg-blue-50/30">1019999999</td>
                    <td class="py-2 px-3 border-r">
                        1010000001 - PT. Maju Jaya<br>
                        1010000002 - Indo Sentosa
                    </td>
                    <td class="py-2 px-3 leading-relaxed text-gray-600" rowspan="4">
                        <ul class="list-disc pl-4 space-y-1">
                            <li>Seluruh Cabang (<em>Branch</em>) akan berbagi rentang nomor pelanggan yang sama, tidak ada alokasi khusus per cabang maupun saluran distribusi.</li>
                            <li>Kode Pelanggan Lama (<em>Old Code</em>) akan disimpan di dalam Master Data baru, sehingga sistem memiliki pemetaan (<em>mapping</em>) antara data lama dan data baru.</li>
                        </ul>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-3 border-r font-medium">Ship To</td>
                    <td class="py-2 px-3 border-r text-center font-bold">10SH</td>
                    <td class="py-2 px-3 border-r">Customer Ship To</td>
                    <td class="py-2 px-3 border-r italic text-gray-600">Internal running number by Sistem</td>
                    <td class="py-2 px-3 border-r text-center font-mono">1020000000</td>
                    <td class="py-2 px-3 border-r text-center font-mono">1029999999</td>
                    <td class="py-2 px-3 border-r"></td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-3 border-r font-medium">Salesperson</td>
                    <td class="py-2 px-3 border-r text-center font-bold">10SP</td>
                    <td class="py-2 px-3 border-r">Sales Person / Aplikator</td>
                    <td class="py-2 px-3 border-r italic text-gray-600">Internal running number by Sistem</td>
                    <td class="py-2 px-3 border-r text-center font-mono">1030000000</td>
                    <td class="py-2 px-3 border-r text-center font-mono">1039999999</td>
                    <td class="py-2 px-3 border-r"></td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-3 border-r font-medium">One Time Customer</td>
                    <td class="py-2 px-3 border-r text-center font-bold">10OT</td>
                    <td class="py-2 px-3 border-r">One Time Customer</td>
                    <td class="py-2 px-3 border-r italic text-gray-600">External Number</td>
                    <td class="py-2 px-3 border-r text-center font-mono italic">External NR</td>
                    <td class="py-2 px-3 border-r text-center font-mono italic"></td>
                    <td class="py-2 px-3 border-r"></td>
                </tr>
                            <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
        </table>
    </div>
    <!-- Customer Registration Flowchart -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">New Customer Registration Process</h3>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        Proses registrasi dan pemeliharaan (<em>maintenance</em>) data pelanggan telah disederhanakan dari proses manual yang panjang menjadi proses digital yang terintegrasi penuh di dalam Sistem. Tidak perlu lagi pengiriman dokumen fisik antar departemen atau eksekusi manual oleh Helpdesk.
    </p>
    
    <div class="flow-container bg-white p-6 rounded-lg shadow-sm border border-gray-200" style="margin: 20px auto; max-width: 600px; text-align: center;">
        <div class="flow-node decision mx-auto" style="padding: 10px 30px; font-size: 0.9rem;">START</div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node warning mx-auto" style="padding: 15px; font-size: 0.9rem; max-width: 350px;">
            <strong class="text-amber-700">1. Sales / Admin</strong><br>
            <span class="text-gray-700 text-sm mt-2 block leading-snug">Mengisi Form Pelanggan Baru (Data Utama, Pajak, Alamat, dll) secara langsung di dalam Sistem.</span>
        </div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node danger mx-auto" style="padding: 15px; font-size: 0.9rem; max-width: 350px;">
            <strong class="text-red-700">2. Manager / Controller</strong><br>
            <span class="text-gray-700 text-sm mt-2 block leading-snug">Melakukan Verifikasi kelengkapan dokumen dan memberikan <em>Approval</em> langsung di dalam Sistem.</span>
        </div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node primary mx-auto" style="padding: 15px; font-size: 0.9rem; max-width: 350px;">
            <strong class="text-white">3. Sistem (Otomatis)</strong><br>
            <span class="text-blue-100 text-sm mt-2 block leading-snug">Sistem men-<em>generate</em> Kode Pelanggan (misal: 1010000001) dan mengaktifkan Master Data untuk siap bertransaksi.</span>
        </div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node decision mx-auto" style="padding: 10px 30px; font-size: 0.9rem; border-color: #10b981 !important; background: #ecfdf5 !important; color: #047857 !important;">END / READY</div>
    </div>
        <!-- Customer Group Table -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">Customer Group Classification (Up to 4 Levels)</h3>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        <strong>Customer Group</strong> dikonfigurasi hingga 4 level kedalaman untuk mengakomodasi struktur hierarki yang lebih kompleks. <strong>Customer Group 4</strong> secara spesifik difungsikan sebagai <strong>Pricing Group</strong> untuk menentukan secara otomatis skema harga/diskon pelanggan saat membuat Sales Order.
    </p>
    
    <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200 mb-8" style="max-height: 500px; overflow-y: auto;">
        <table class="min-w-full bg-white text-left border-collapse text-[10px]" style="white-space: nowrap;">
            <thead class="bg-blue-50 text-blue-900 border-b border-gray-200 sticky top-0 z-10 shadow-sm">
                <tr>
                    <th class="py-2 px-2 font-semibold border-r sticky left-0 bg-blue-50 z-20">Dist. Channel</th>
                    <th class="py-2 px-2 font-semibold border-r">CG<br>Code</th>
                    <th class="py-2 px-2 font-semibold border-r">Customer Group<br>Name</th>
                    <th class="py-2 px-2 font-semibold border-r bg-blue-50/50">CG1<br>Code</th>
                    <th class="py-2 px-2 font-semibold border-r bg-blue-50/50">CG1 Name<br>(Industry)</th>
                    <th class="py-2 px-2 font-semibold border-r bg-green-50/50">CG2<br>Code</th>
                    <th class="py-2 px-2 font-semibold border-r bg-green-50/50">CG2 Name<br>(Sub-Industry)</th>
                    <th class="py-2 px-2 font-semibold border-r bg-gray-50/50">CG3<br>Code</th>
                    <th class="py-2 px-2 font-semibold border-r bg-gray-50/50">CG3 Name<br>(Class/Region)</th>
                    <th class="py-2 px-2 font-semibold border-r bg-amber-50/50">CG4<br>Code</th>
                    <th class="py-2 px-2 font-semibold bg-amber-50/50">Cust. Group 4<br>(Pricing Group)</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <!-- Row 1 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-1 px-2 border-r font-medium align-top sticky left-0 bg-white" rowspan="6">B2B / Project</td>
                    <td class="py-1 px-2 border-r align-top text-center font-bold bg-orange-100/30" rowspan="6">A02</td>
                    <td class="py-1 px-2 border-r align-top bg-orange-100/30" rowspan="6">Private Corporate<br>(Pabrik/Manufaktur)</td>
                    
                    <td class="py-1 px-2 border-r align-top text-center bg-blue-50/30" rowspan="3">B22</td>
                    <td class="py-1 px-2 border-r align-top bg-blue-50/30" rowspan="3">Food & Beverage</td>
                    
                    <td class="py-1 px-2 border-r align-top text-center bg-green-50/30" rowspan="2">C01</td>
                    <td class="py-1 px-2 border-r align-top bg-green-50/30" rowspan="2">Processing Plant</td>
                    
                    <td class="py-1 px-2 border-r text-center">D01</td>
                    <td class="py-1 px-2 border-r">Multinational</td>
                    <td class="py-1 px-2 border-r text-center font-bold">PG03</td>
                    <td class="py-1 px-2">Corporate Special</td>
                </tr>
                <!-- Row 2 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-1 px-2 border-r text-center">D02</td>
                    <td class="py-1 px-2 border-r">Local Tier 1</td>
                    <td class="py-1 px-2 border-r text-center font-bold">PG01</td>
                    <td class="py-1 px-2">Standard Price</td>
                </tr>
                <!-- Row 3 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-1 px-2 border-r text-center bg-green-50/30">C02</td>
                    <td class="py-1 px-2 border-r bg-green-50/30">Storage / Cold Room</td>
                    <td class="py-1 px-2 border-r text-center">D03</td>
                    <td class="py-1 px-2 border-r">General</td>
                    <td class="py-1 px-2 border-r text-center font-bold">PG01</td>
                    <td class="py-1 px-2">Standard Price</td>
                </tr>
                <!-- Row 4 -->
                <tr class="hover:bg-gray-50 transition-colors border-t border-gray-200">
                    <td class="py-1 px-2 border-r align-top text-center bg-blue-50/30" rowspan="3">B23</td>
                    <td class="py-1 px-2 border-r align-top bg-blue-50/30" rowspan="3">Automotive</td>
                    
                    <td class="py-1 px-2 border-r align-top text-center bg-green-50/30" rowspan="2">C03</td>
                    <td class="py-1 px-2 border-r align-top bg-green-50/30" rowspan="2">Assembly Plant</td>
                    
                    <td class="py-1 px-2 border-r text-center">D04</td>
                    <td class="py-1 px-2 border-r">Heavy Vehicle</td>
                    <td class="py-1 px-2 border-r text-center font-bold">PG02</td>
                    <td class="py-1 px-2">Premium Heavy Duty</td>
                </tr>
                <!-- Row 5 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-1 px-2 border-r text-center">D05</td>
                    <td class="py-1 px-2 border-r">Light Vehicle</td>
                    <td class="py-1 px-2 border-r text-center font-bold">PG01</td>
                    <td class="py-1 px-2">Standard Price</td>
                </tr>
                <!-- Row 6 -->
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-1 px-2 border-r text-center bg-green-50/30">C04</td>
                    <td class="py-1 px-2 border-r bg-green-50/30">Spareparts / Component</td>
                    <td class="py-1 px-2 border-r text-center text-gray-400 bg-gray-100 pattern-diagonal-lines-sm" colspan="2"></td>
                    <td class="py-1 px-2 border-r text-center text-gray-400 bg-gray-100 pattern-diagonal-lines-sm" colspan="2"></td>
                </tr>
                
                <!-- B2C / Retail -->
                <tr class="hover:bg-gray-50 transition-colors border-t-2 border-gray-400">
                    <td class="py-1 px-2 border-r font-medium align-top sticky left-0 bg-white" rowspan="4">B2C / Retail</td>
                    <td class="py-1 px-2 border-r align-top text-center font-bold bg-orange-100/30" rowspan="4">B02</td>
                    <td class="py-1 px-2 border-r align-top bg-orange-100/30" rowspan="4">Toko Bangunan<br>(Building Material)</td>
                    
                    <td class="py-1 px-2 border-r align-top text-center bg-blue-50/30" rowspan="2">B24</td>
                    <td class="py-1 px-2 border-r align-top bg-blue-50/30" rowspan="2">Modern Outlet</td>
                    
                    <td class="py-1 px-2 border-r text-center bg-green-50/30">C05</td>
                    <td class="py-1 px-2 border-r bg-green-50/30">Grosir / Distributor</td>
                    <td class="py-1 px-2 border-r text-center">D06</td>
                    <td class="py-1 px-2 border-r">National Chain</td>
                    <td class="py-1 px-2 border-r text-center font-bold">PG04</td>
                    <td class="py-1 px-2">Wholesale Tier 1</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-1 px-2 border-r text-center bg-green-50/30">C06</td>
                    <td class="py-1 px-2 border-r bg-green-50/30">Eceran / Retail</td>
                    <td class="py-1 px-2 border-r text-center text-gray-400 bg-gray-100 pattern-diagonal-lines-sm" colspan="2"></td>
                    <td class="py-1 px-2 border-r text-center text-gray-400 bg-gray-100 pattern-diagonal-lines-sm" colspan="2"></td>
                </tr>
                
                <tr class="hover:bg-gray-50 transition-colors border-t border-gray-200">
                    <td class="py-1 px-2 border-r align-top text-center bg-blue-50/30" rowspan="2">B25</td>
                    <td class="py-1 px-2 border-r align-top bg-blue-50/30" rowspan="2">Traditional Store</td>
                    
                    <td class="py-1 px-2 border-r text-center bg-green-50/30">C07</td>
                    <td class="py-1 px-2 border-r bg-green-50/30">Toko Besi & Cat</td>
                    <td class="py-1 px-2 border-r text-center text-gray-400 bg-gray-100 pattern-diagonal-lines-sm" colspan="2"></td>
                    <td class="py-1 px-2 border-r text-center font-bold">PG05</td>
                    <td class="py-1 px-2">Retail Standard</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-1 px-2 border-r text-center bg-green-50/30">C08</td>
                    <td class="py-1 px-2 border-r bg-green-50/30">Koperasi Proyek</td>
                    <td class="py-1 px-2 border-r text-center text-gray-400 bg-gray-100 pattern-diagonal-lines-sm" colspan="2"></td>
                    <td class="py-1 px-2 border-r text-center font-bold">PG06</td>
                    <td class="py-1 px-2">Koperasi Price</td>
                </tr>
                            <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
        </table>
    </div>
</div>
    <!-- Customer Hierarchy -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">Customer Hierarchy</h3>
    <div class="mb-6 prose max-w-none prose-sm text-justify text-gray-800">
        <p class="mb-2">
            <strong>Customer Hierarchy Group</strong> digunakan untuk mengklasifikasikan pelanggan berdasarkan struktur kepemilikan (<em>ownership</em>), grup perusahaan (<em>Holding Company</em>), atau sistem pengadaan terpusat (<em>Central Procurement</em>).
        </p>
        <ul class="list-disc pl-5 space-y-1 mb-4">
            <li>Setiap pelanggan (anak perusahaan/cabang) harus terdaftar sebagai anggota dari tepat satu grup hierarki induk.</li>
            <li>Pelanggan tunggal yang independen dan tidak memiliki afiliasi grup kepemilikan akan diklasifikasikan ke dalam grup <strong>"Others"</strong>.</li>
        </ul>
        <p class="font-semibold text-blue-800 bg-blue-50 py-1 px-3 rounded inline-block border border-blue-100">
            <span class="mr-2">💡</span> Data di bawah ini hanya sebagai ilustrasi pengelompokan (Grouping).
        </p>
    </div>

    <div class="overflow-hidden rounded-lg shadow-sm border border-gray-200 mb-8">
        <table class="min-w-full bg-white text-left border-collapse text-sm">
            <thead class="bg-blue-100 text-blue-900 border-b-2 border-blue-200">
                <tr>
                    <th class="py-3 px-4 font-bold border-r w-1/3">Level 1 (Holding / Group)</th>
                    <th class="py-3 px-4 font-bold w-2/3">Level 2 (Subsidiary / Operating Company)</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-4 border-r font-bold text-gray-900 bg-gray-50/80 align-top" rowspan="3">ALPHA GROUP</td>
                    <td class="py-2 px-4">PT Alpha Motor Utama</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-4">PT Alpha Auto Manufacturing</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-4">PT Alpha Kencana Motor</td>
                </tr>
                
                <tr class="hover:bg-gray-50 transition-colors border-t border-gray-300">
                    <td class="py-2 px-4 border-r font-bold text-gray-900 bg-gray-50/80 align-top" rowspan="3">BETA GROUP</td>
                    <td class="py-2 px-4">PT Beta Consumer Products Tbk</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-4">PT Beta Flour Mills</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-4">PT Beta Dairy</td>
                </tr>

                <tr class="hover:bg-gray-50 transition-colors border-t border-gray-300">
                    <td class="py-2 px-4 border-r font-bold text-gray-900 bg-gray-50/80 align-top" rowspan="2">GAMMA GROUP</td>
                    <td class="py-2 px-4">PT Gamma Mas Utama</td>
                </tr>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-2 px-4">PT Gamma Alam Segar</td>
                </tr>

                <tr class="hover:bg-gray-50 transition-colors border-t-2 border-gray-400">
                    <td class="py-2 px-4 border-r font-bold text-gray-500 bg-gray-100">Others</td>
                    <td class="py-2 px-4 bg-gray-100 italic text-gray-600">Others (Independent Companies)</td>
                </tr>
                            <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
        </table>
    </div>
    <!-- Transportation Zone -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">Transportation Zone</h3>
    <div class="mb-6 prose max-w-none prose-sm text-justify text-gray-800">
        <p class="mb-2">
            <strong>Transportation Zone</strong> digunakan untuk menentukan variabel Biaya Pengiriman (<em>Shipment Cost</em>) secara otomatis di dalam Sistem, serta membantu <em>Traffic Planner</em> dalam menentukan Rute (<em>Route</em>) pengiriman bahan material secara efisien ke lokasi proyek.
        </p>
        <ul class="list-disc pl-5 space-y-1 mb-4">
            <li>Setiap pelanggan (terutama data alamat proyek / <em>Ship-To</em>) wajib di-<em>assign</em> ke dalam satu area Transportation Zone yang spesifik.</li>
        </ul>
        <p class="font-semibold text-teal-800 bg-teal-50 py-1 px-3 rounded inline-block border border-teal-100">
            <span class="mr-2">📍</span> Data di bawah ini hanya ilustrasi pemetaan zona untuk wilayah Jabodetabek (Head Office).
        </p>
    </div>

    <div class="overflow-hidden rounded-lg shadow-sm border border-gray-200 mb-8 max-w-2xl">
        <table class="min-w-full bg-white text-left border-collapse text-sm">
            <thead class="bg-teal-50 text-teal-900 border-b-2 border-teal-200">
                <tr>
                    <th class="py-3 px-4 font-bold border-r w-1/3">Code</th>
                    <th class="py-3 px-4 font-bold w-2/3">Zone Description</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-01</td><td class="py-2 px-4">Jakarta Timur</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-02</td><td class="py-2 px-4">Jakarta Selatan</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-03</td><td class="py-2 px-4">Jakarta Pusat</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-04</td><td class="py-2 px-4">Jakarta Barat</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-05</td><td class="py-2 px-4">Jakarta Utara</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-06</td><td class="py-2 px-4">Kota Bekasi</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-07</td><td class="py-2 px-4">Kab. Bekasi</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-08</td><td class="py-2 px-4">Kota Depok</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-09</td><td class="py-2 px-4">Kota/Kab. Bogor</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-10</td><td class="py-2 px-4">Kota Tangerang</td></tr>
                <tr class="hover:bg-gray-50 transition-colors"><td class="py-2 px-4 border-r font-medium text-gray-900">JKT01-11</td><td class="py-2 px-4">Kab. Tangerang</td></tr>
                            <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
        </table>
    </div>



<div id="section-2" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>3. Credit Limit Management</span></h2>
    
    <div class="mb-6 prose max-w-none prose-sm text-justify text-gray-800">
        <p class="mb-6">
            Di dalam Sistem, setiap pelanggan (<em>Customer</em>) hanya diizinkan memiliki <strong>1 (satu) nilai plafon kredit (Credit Limit Amount)</strong> yang bersifat terpusat. Nilai kredit ini akan dibagikan (<em>shared</em>) penggunaannya di seluruh cabang dan lintas divisi produk/jasa.
        </p>
        
        <h3 class="font-bold text-lg mb-3 text-red-800 border-b border-red-200 pb-2">Kriteria Pemblokiran Otomatis (Automatic Credit Control)</h3>
        <p class="mb-3">Pada saat dokumen <em>Sales Order</em> dibuat, Sistem akan langsung mengevaluasi status kelayakan kredit pelanggan. Sistem akan memblokir pesanan secara otomatis (<em>Blocked</em>) apabila pelanggan memenuhi salah satu dari 3 (tiga) kondisi berikut:</p>
        
        <div class="bg-red-50 border-l-4 border-red-600 p-5 mb-8 rounded-r-lg shadow-sm">
            <ul class="list-decimal pl-5 space-y-4 text-red-900 font-medium">
                <li>
                    Plafon Kredit (Credit Limit) Habis
                    <div class="text-gray-700 text-sm font-normal mt-1 leading-snug">
                        <em>Sales Order</em> akan ditahan jika akumulasi nilai order yang baru ditambah saldo piutang berjalan melampaui batas plafon kredit yang telah disetujui.
                    </div>
                </li>
                <li>
                    Tunggakan Jatuh Tempo (A/R Overdue)
                    <div class="text-gray-700 text-sm font-normal mt-1 leading-snug">
                        <em>Sales Order</em> akan ditahan apabila pelanggan masih memiliki tagihan (<em>Invoice</em>) masa lalu yang belum dibayar melewati batas waktu jatuh tempo.
                    </div>
                </li>
                <li>
                    Masa Berlaku Jaminan Habis (Bank Guarantee Expired)
                    <div class="text-gray-700 text-sm font-normal mt-1 leading-snug">
                        Khusus untuk proyek B2B berskala besar, <em>Sales Order</em> akan ditahan apabila masa berlaku Surat Jaminan Bank (<em>Bank Guarantee</em>) dari pelanggan telah habis.
                    </div>
                </li>
            </ul>
        </div>
        
        <h3 class="font-bold text-lg mb-3 border-b border-gray-200 pb-2">Prosedur Rilis & Penyesuaian Limit</h3>
        <ul class="list-disc pl-5 space-y-3">
            <li>
                <strong>Pelepasan Blokir (Release Blocked Order):</strong><br>
                <em>Sales Order</em> yang berstatus terblokir secara absolut tidak dapat diproses ke tahapan pengiriman barang/material (<em>Shipment</em>). Pemblokiran ini hanya bisa dibuka secara manual (<em>release</em>) oleh Pejabat yang Berwenang (Saat ini otoritas dipegang oleh <strong>General Manager</strong>).
            </li>
            <li>
                <strong>Penyesuaian Limit Musiman (Seasonal Limit Adjustment):</strong><br>
                Limit kredit dapat dinaikkan sementara (berdasarkan batasan persentase) khusus untuk menghadapi lonjakan permintaan proyek pada musim tertentu (<em>Peak Season</em>). Kenaikan ini bergantung pada Kategori Risiko Pelanggan (<em>High Risk, Medium Risk, Low Risk</em>). Sistem akan secara otomatis mengembalikan plafon kredit ke nilai semula saat periode <em>Peak Season</em> berakhir.
            </li>
        </ul>
    </div>

    <!-- Credit Limit Process Flowchart -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">Credit Limit Process</h3>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        Proses pemeliharaan (<em>maintenance</em>) limit kredit pelanggan telah disederhanakan dan sepenuhnya diotomatisasi. Tidak ada lagi pengiriman formulir persetujuan secara manual via <em>email</em> atau eksekusi ganda oleh tim <em>Helpdesk</em>. Seluruh tahapan, baik untuk pengajuan limit kredit baru maupun perubahan limit, dieksekusi secara terpusat di dalam Sistem.
    </p>
    
    <div class="flow-container bg-white p-6 rounded-lg shadow-sm border border-gray-200" style="margin: 20px auto; max-width: 600px; text-align: center;">
        <div class="flow-node decision mx-auto" style="padding: 10px 30px; font-size: 0.9rem;">START</div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node warning mx-auto" style="padding: 15px; font-size: 0.9rem; max-width: 350px;">
            <strong class="text-amber-700">1. Marketing / Commercial</strong><br>
            <span class="text-gray-700 text-sm mt-2 block leading-snug">Melakukan permohonan penginputan (<em>New</em>) atau perubahan (<em>Change</em>) limit kredit pelanggan beserta lampiran dokumen pendukung secara digital.</span>
        </div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node danger mx-auto" style="padding: 15px; font-size: 0.9rem; max-width: 350px;">
            <strong class="text-red-700">2. Controller</strong><br>
            <span class="text-gray-700 text-sm mt-2 block leading-snug">Menerima notifikasi <em>workflow</em>, mengevaluasi kelayakan finansial, dan memberikan persetujuan (<em>Approve</em>) agar sistem langsung memperbarui limit kredit pelanggan.</span>
        </div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node decision mx-auto" style="padding: 10px 30px; font-size: 0.9rem; border-color: #10b981 !important; background: #ecfdf5 !important; color: #047857 !important;">END / READY</div>
    </div>
    <!-- Credit Risk Categories Table -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">Credit Check Process (Risk Categories)</h3>
    <div class="mb-6 prose max-w-none prose-sm text-justify text-gray-800">
        <p class="mb-2">
            Sistem menentukan perlakuan peringatan (<em>system behavior</em>) yang berbeda-beda pada saat proses verifikasi pesanan, bergantung pada tingkat risiko finansial dari pelanggan. Setiap pelanggan wajib diklasifikasikan secara tegas ke dalam salah satu dari tiga Kategori Risiko (<em>Risk Category</em>) berikut:
        </p>
    </div>

    <div class="overflow-hidden rounded-lg shadow-sm border border-gray-200 mb-8">
        <table class="min-w-full bg-white text-left border-collapse text-sm">
            <thead class="bg-gray-100 text-gray-800 border-b-2 border-gray-300">
                <tr>
                    <th class="py-3 px-4 font-bold border-r w-1/4">Risk Category</th>
                    <th class="py-3 px-4 font-bold border-r w-1/4 text-center">Credit Limit Check</th>
                    <th class="py-3 px-4 font-bold border-r w-1/4 text-center">A/R Overdue Check</th>
                    <th class="py-3 px-4 font-bold w-1/4 text-center">Bank Guarantee Expired</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <tr class="hover:bg-red-50 transition-colors">
                    <td class="py-3 px-4 border-r align-top">
                        <div class="font-bold text-red-700 text-base mb-1">1. High Risk</div>
                        <div class="text-xs text-gray-600 italic leading-relaxed"><strong>Proposed Target:</strong><br>Pelanggan retail (Toko Bangunan), Aplikator Lepas, & Koperasi.</div>
                    </td>
                    <td class="py-3 px-4 border-r align-top text-center text-red-700 font-bold bg-red-50/40">BLOCKED</td>
                    <td class="py-3 px-4 border-r align-top text-center text-red-700 font-bold bg-red-50/40">BLOCKED</td>
                    <td class="py-3 px-4 align-top text-sm leading-relaxed bg-red-50/40">
                        <ul class="list-disc pl-4 space-y-1">
                            <li><strong class="text-red-700">Blocked</strong> jika masa berlaku < 30 hari.</li>
                            <li><strong class="text-amber-600">Warning</strong> jika masa berlaku < 60 hari.</li>
                        </ul>
                    </td>
                </tr>
                <tr class="hover:bg-amber-50 transition-colors">
                    <td class="py-3 px-4 border-r align-top">
                        <div class="font-bold text-amber-600 text-base mb-1">2. Medium Risk</div>
                        <div class="text-xs text-gray-600 italic leading-relaxed"><strong>Proposed Target:</strong><br>Perusahaan swasta (Private Corporate), Manufaktur, & Developer Properti.</div>
                    </td>
                    <td class="py-3 px-4 border-r align-top text-center text-red-700 font-bold bg-amber-50/40">BLOCKED</td>
                    <td class="py-3 px-4 border-r align-top text-center text-amber-600 font-bold bg-amber-50/40">WARNING<br><span class="text-xs font-normal text-gray-500">(Not Blocked)</span></td>
                    <td class="py-3 px-4 align-top text-sm leading-relaxed bg-amber-50/40">
                        <ul class="list-disc pl-4 space-y-1">
                            <li><strong class="text-red-700">Blocked</strong> jika masa berlaku < 30 hari.</li>
                            <li><strong class="text-amber-600">Warning</strong> jika masa berlaku < 60 hari.</li>
                        </ul>
                    </td>
                </tr>
                <tr class="hover:bg-green-50 transition-colors">
                    <td class="py-3 px-4 border-r align-top">
                        <div class="font-bold text-green-700 text-base mb-1">3. Low Risk</div>
                        <div class="text-xs text-gray-600 italic leading-relaxed"><strong>Proposed Target:</strong><br>Perusahaan Afiliasi (Sister Company), BUMN, & Kontraktor Nasional Utama.</div>
                    </td>
                    <td class="py-3 px-4 border-r align-top text-center text-amber-600 font-bold bg-green-50/40">WARNING<br><span class="text-xs font-normal text-gray-500">(Not Blocked)</span></td>
                    <td class="py-3 px-4 border-r align-top text-center text-amber-600 font-bold bg-green-50/40">WARNING<br><span class="text-xs font-normal text-gray-500">(Not Blocked)</span></td>
                    <td class="py-3 px-4 align-top text-sm leading-relaxed bg-green-50/40">
                        <ul class="list-disc pl-4 space-y-1">
                            <li><strong class="text-red-700">Blocked</strong> jika masa berlaku < 30 hari.</li>
                            <li><strong class="text-amber-600">Warning</strong> jika masa berlaku < 60 hari.</li>
                        </ul>
                    </td>
                </tr>
                            <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
        </table>
    </div>
</div>
<div id="section-3" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>4. Sales Pricing and Promotion</span></h2>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        Seluruh mekanisme penentuan harga jual material (<em>Epoxy, Waterproofing</em>), standar biaya jasa aplikator, hingga skema potongan harga proyek (<em>Project Discount / Sales Deal</em>) kini dikelola secara terpusat. Proses pengajuan harga baru atau aktivitas promosi berjalan secara berjenjang dan <em>paperless</em> (tanpa dokumen fisik) di dalam Sistem.
    </p>

    <!-- Pricing Process Flowchart -->
    <h3 class="font-bold mt-8 mb-4 text-lg text-gray-800 border-b pb-2">Sales Pricing Creation & Approval Flow</h3>
    <div class="flow-container bg-white p-6 rounded-lg shadow-sm border border-gray-200" style="margin: 20px auto; max-width: 650px; text-align: center;">
        <div class="flow-node decision mx-auto" style="padding: 10px 30px; font-size: 0.9rem;">START</div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node warning mx-auto" style="padding: 15px; font-size: 0.9rem; max-width: 400px;">
            <strong class="text-amber-700 text-base">1. Marketing / Commercial</strong><br>
            <span class="text-gray-700 text-sm mt-2 block leading-snug">Mengajukan pembaruan Daftar Harga Dasar (<em>New Price List</em>) atau Skema Diskon Proyek Spesial (<em>Promotional Activity</em>) secara digital melalui portal Sistem.</span>
        </div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node danger mx-auto" style="padding: 15px; font-size: 0.9rem; max-width: 400px;">
            <strong class="text-red-700 text-base">2. Controller</strong><br>
            <span class="text-gray-700 text-sm mt-2 block leading-snug">Melakukan evaluasi margin profitabilitas (HPP vs Harga Jual) dan menyetujui (<em>Approve</em>) pengajuan tersebut agar aktif dan valid di dalam Sistem.</span>
        </div>
        
        <div class="flow-line-vertical arrow" style="height: 30px;"></div>
        
        <div class="flow-node decision mx-auto" style="padding: 10px 30px; font-size: 0.9rem; border-color: #10b981 !important; background: #ecfdf5 !important; color: #047857 !important;">END / READY</div>
    </div>

        <!-- Pricing Structure Table -->
    <h3 class="font-bold mt-12 mb-4 text-lg text-gray-800 border-b pb-2">Pricing Structure & Calculation Logic</h3>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        Struktur Kalkulasi Harga (<em>Pricing Procedure</em>) dirancang untuk memetakan secara presisi bagaimana Sistem menghitung <strong>Net Sales</strong>, <strong>Total COGS</strong> (HPP), hingga <strong>Net Profit</strong> pada setiap transaksi <em>Sales Order</em>. Di setiap level subtotal, sistem mengakomodasi pembebanan diskon secara berpasangan: satu porsi dapat ditagihkan kembali (<em>chargeback</em>) ke pihak Supplier/Pabrikan, dan porsi lainnya diserap sebagai beban Internal Perusahaan.
    </p>

    <div class="overflow-x-auto rounded-lg shadow-sm border border-gray-200 mb-8 ">
        <table class="min-w-full bg-white text-left border-collapse text-[11px] whitespace-nowrap mb-6">
            <thead class="bg-blue-900 text-white sticky top-0 z-10 shadow-sm">
                <tr>
                    <th class="py-2 px-3 font-semibold border-r border-blue-800">Code</th>
                    <th class="py-2 px-3 font-semibold border-r border-blue-800">Description</th>
                    <th class="py-2 px-3 font-semibold border-r border-blue-800">Calc. Type</th>
                    <th class="py-2 px-3 font-semibold border-r border-blue-800">Notes / Behavior</th>
                    <th class="py-2 px-3 font-semibold border-r border-blue-800 text-center">Input Mode</th>
                    <th class="py-2 px-3 font-semibold border-r border-blue-800 text-center">%</th>
                    <th class="py-2 px-3 font-semibold text-right">Amount (Rp)</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-200">
                <!-- Base Price -->
                <tr class="hover:bg-gray-50">
                    <td class="py-1 px-3 border-r font-medium text-gray-900">ZS01</td>
                    <td class="py-1 px-3 border-r">Selling Price (Base)</td>
                    <td class="py-1 px-3 border-r">Quantity</td>
                    <td class="py-1 px-3 border-r text-gray-500">Harga dasar material / jasa per UoM</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">1,000,000</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS02</td>
                    <td class="py-1 px-3 border-r">Regular Disc Internal (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r">Mutlak beban internal Perusahaan</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center">2%</td>
                    <td class="py-1 px-3 font-mono text-right">(20,000)</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS03</td>
                    <td class="py-1 px-3 border-r">BP Level 1 Supplier (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r italic text-amber-700">Will be chargeback to Supplier</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS04</td>
                    <td class="py-1 px-3 border-r">BP Level 1 Internal (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r">Beban internal Perusahaan</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="bg-gray-100 font-bold border-y-2 border-gray-300">
                    <td class="py-1 px-3 border-r text-gray-800" colspan="6">Sub Total 1</td>
                    <td class="py-1 px-3 font-mono text-right text-gray-800">980,000</td>
                </tr>

                <!-- Level 2 -->
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS05</td>
                    <td class="py-1 px-3 border-r">BP Level 2 Supplier (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r italic text-amber-700">Will be chargeback to Supplier</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center">5%</td>
                    <td class="py-1 px-3 font-mono text-right">(49,000)</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS06</td>
                    <td class="py-1 px-3 border-r">BP Level 2 Internal (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r">Beban internal Perusahaan</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="bg-gray-100 font-bold border-y-2 border-gray-300">
                    <td class="py-1 px-3 border-r text-gray-800" colspan="6">Sub Total 2</td>
                    <td class="py-1 px-3 font-mono text-right text-gray-800">931,000</td>
                </tr>
                
                <!-- Level 3 -->
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS07</td>
                    <td class="py-1 px-3 border-r">BP Level 3 Supplier (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r italic text-amber-700">Will be chargeback to Supplier</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS08</td>
                    <td class="py-1 px-3 border-r">BP Level 3 Internal (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r">Beban internal Perusahaan</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center">2%</td>
                    <td class="py-1 px-3 font-mono text-right">(18,620)</td>
                </tr>
                <tr class="bg-gray-100 font-bold border-y-2 border-gray-300">
                    <td class="py-1 px-3 border-r text-gray-800" colspan="6">Sub Total 3</td>
                    <td class="py-1 px-3 font-mono text-right text-gray-800">912,380</td>
                </tr>

                <!-- Level 4 -->
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS09</td>
                    <td class="py-1 px-3 border-r">BP Level 4 Supplier (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r italic text-amber-700">Will be chargeback to Supplier</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS10</td>
                    <td class="py-1 px-3 border-r">BP Level 4 Internal (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r">Beban internal Perusahaan</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center">1%</td>
                    <td class="py-1 px-3 font-mono text-right">(9,124)</td>
                </tr>
                <tr class="bg-gray-100 font-bold border-y-2 border-gray-300">
                    <td class="py-1 px-3 border-r text-gray-800" colspan="6">Sub Total 4</td>
                    <td class="py-1 px-3 font-mono text-right text-gray-800">903,256</td>
                </tr>

                <!-- Level 5 -->
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS11</td>
                    <td class="py-1 px-3 border-r">BP Level 5 Supplier (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r italic text-amber-700">Will be chargeback to Supplier</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS12</td>
                    <td class="py-1 px-3 border-r">BP Level 5 Internal (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r">Beban internal Perusahaan</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="bg-gray-100 font-bold border-y-2 border-gray-300">
                    <td class="py-1 px-3 border-r text-gray-800" colspan="6">Sub Total 5</td>
                    <td class="py-1 px-3 font-mono text-right text-gray-800">903,256</td>
                </tr>

                <!-- Qty Disc -->
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS13</td>
                    <td class="py-1 px-3 border-r">Prop. Qty Disc Supplier (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r italic text-amber-700">Will be chargeback to Supplier</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center">5%</td>
                    <td class="py-1 px-3 font-mono text-right">(45,163)</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS14</td>
                    <td class="py-1 px-3 border-r">Prop. Qty Disc Supplier (Rp)</td>
                    <td class="py-1 px-3 border-r">Fixed Amount</td>
                    <td class="py-1 px-3 border-r italic text-amber-700">Will be chargeback to Supplier</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS15</td>
                    <td class="py-1 px-3 border-r">Prop. Qty Disc Internal (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r">Beban internal Perusahaan</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">ZS16</td>
                    <td class="py-1 px-3 border-r">Prop. Qty Disc Internal (Rp)</td>
                    <td class="py-1 px-3 border-r">Fixed Amount</td>
                    <td class="py-1 px-3 border-r">Beban internal Perusahaan</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="bg-gray-100 font-bold border-y-2 border-gray-300">
                    <td class="py-1 px-3 border-r text-gray-800" colspan="6">Sub Total 6</td>
                    <td class="py-1 px-3 font-mono text-right text-gray-800">858,093</td>
                </tr>

                <!-- Taxes and Subsidies -->
                <tr class="hover:bg-gray-50">
                    <td class="py-1 px-3 border-r font-medium">ZS21</td>
                    <td class="py-1 px-3 border-r">Subsidi Transport (Rp)</td>
                    <td class="py-1 px-3 border-r">Quantity</td>
                    <td class="py-1 px-3 border-r text-gray-500">Biasa nya Rp. 3000 per carton</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">(30,000)</td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="py-1 px-3 border-r font-medium">ZS22</td>
                    <td class="py-1 px-3 border-r">Subsidi Transport (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r text-gray-500"></td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">FROE</td>
                    <td class="py-1 px-3 border-r">Free Goods External (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r italic text-amber-700">Piutang Klaim Subsidi Supplier (Free Goods)</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
                <tr class="hover:bg-gray-50 text-red-700">
                    <td class="py-1 px-3 border-r font-medium">FROI</td>
                    <td class="py-1 px-3 border-r">Free Goods Internal (%)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r text-gray-500">Beban Promosi Perusahaan (Free Goods)</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>
<tr class="bg-gray-100 font-bold border-y-2 border-gray-300">
                    <td class="py-1 px-3 border-r text-gray-800" colspan="6">Sub Total 7 (Dasar Pengenaan Pajak)</td>
                    <td class="py-1 px-3 font-mono text-right text-gray-800">828,093</td>
                </tr>
                
                <tr class="hover:bg-gray-50 text-gray-500">
                    <td class="py-1 px-3 border-r font-medium">ZS23</td>
                    <td class="py-1 px-3 border-r">Rounding Difference</td>
                    <td class="py-1 px-3 border-r">Fixed Amount</td>
                    <td class="py-1 px-3 border-r"></td>
                    <td class="py-1 px-3 border-r text-center">Manual</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right">-</td>
                </tr>

                <tr class="hover:bg-gray-50 text-blue-700 bg-blue-50/20">
                    <td class="py-1 px-3 border-r font-medium">MWST</td>
                    <td class="py-1 px-3 border-r">Output Tax (PPN)</td>
                    <td class="py-1 px-3 border-r">Percentage</td>
                    <td class="py-1 px-3 border-r text-gray-500">Dasar Pengenaan Pajak + Tax</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center">10%</td>
                    <td class="py-1 px-3 font-mono text-right">82,809</td>
                </tr>

                <!-- NET SALES -->
                <tr class="bg-blue-900 text-white font-bold border-y-2 border-blue-950">
                    <td class="py-2 px-3 border-r border-blue-800" colspan="6">NET SALES (DPP + PPN) -> Masuk ke Credit Value</td>
                    <td class="py-2 px-3 font-mono text-right text-yellow-300">910,902</td>
                </tr>

                <!-- COGS Calculation -->
                <tr class="hover:bg-gray-50 bg-gray-50/50 mt-2">
                    <td class="py-1 px-3 border-r font-medium">ZSCT</td>
                    <td class="py-1 px-3 border-r">COGS Std</td>
                    <td class="py-1 px-3 border-r">Fixed Amount</td>
                    <td class="py-1 px-3 border-r text-gray-500">Standard Cost (Material Master Data)</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right text-red-700">(700,000)</td>
                </tr>
                <tr class="hover:bg-gray-50 bg-gray-50/50">
                    <td class="py-1 px-3 border-r font-medium">ZSCM</td>
                    <td class="py-1 px-3 border-r">COST MAP</td>
                    <td class="py-1 px-3 border-r">Fixed Amount</td>
                    <td class="py-1 px-3 border-r text-gray-500">MAP - COGS Std</td>
                    <td class="py-1 px-3 border-r text-center">Auto</td>
                    <td class="py-1 px-3 border-r text-center"></td>
                    <td class="py-1 px-3 font-mono text-right text-red-700">(1,000)</td>
                </tr>
                <tr class="bg-gray-200 font-bold border-y border-gray-300">
                    <td class="py-1 px-3 border-r text-gray-800" colspan="6">TOTAL COGS (= COGS Std + COGS Variance)</td>
                    <td class="py-1 px-3 font-mono text-right text-red-700">(701,000)</td>
                </tr>

                <!-- NET PROFIT -->
                <tr class="font-bold border-t-4" style="background-color: #059669; color: #ffffff; border-color: #065f46;">
                    <td class="py-2.5 px-3 border-r" style="border-color: #10b981;" colspan="6">NET PROFIT (= Net Price - TOTAL COGS)</td>
                    <td class="py-2.5 px-3 font-mono text-right" style="color: #fef08a;">127,093</td>
                </tr>
                            <!-- Padding Row for Scrollbar -->
                <tr><td colspan="7" class="py-4"></td></tr>
            </tbody>
        </table>
    </div>
</div>
<div id="section-4" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>5. Standard Take Order (Order to Cash)</span></h2>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        Proses <em>Standard Take Order</em> merupakan urat nadi siklus penjualan reguler (skenario positif <em>Order to Cash</em>). Alur ini mengintegrasikan seluruh departemen secara sekuensial, mulai dari penerimaan pesanan oleh Sales, perencanaan logistik armada dan biaya, pengiriman fisik oleh Gudang, hingga bermuara pada penagihan (Invoice) dan pelunasan piutang (Collection) oleh Finance.
    </p>

    <h3 class="font-bold mt-8 mb-4 text-lg text-gray-800 border-b pb-2">End-to-End Regular Order Process Flow</h3>
    
    <style>
    .sf-container { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px 20px; margin-bottom: 2rem; overflow-x: auto; display: flex; justify-content: center; }
    .sf-canvas { position: relative; width: 800px; height: 380px; }
    .sf-path-h { position: absolute; height: 2px; background-color: #94a3b8; z-index: 0; }
    .sf-path-v { position: absolute; width: 2px; background-color: #94a3b8; z-index: 0; }
    .sf-arr-r { position: absolute; border-width: 6px 0 6px 8px; border-style: solid; border-color: transparent transparent transparent #94a3b8; z-index: 1; }
    .sf-arr-l { position: absolute; border-width: 6px 8px 6px 0; border-style: solid; border-color: transparent #94a3b8 transparent transparent; z-index: 1; }
    .sf-arr-d { position: absolute; border-width: 8px 6px 0 6px; border-style: solid; border-color: #94a3b8 transparent transparent transparent; z-index: 1; }
    .sf-box { position: absolute; width: 160px; border: 2px solid #cbd5e1; background: #ffffff; padding: 12px 8px; border-radius: 8px; text-align: center; z-index: 10; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-size: 11px; font-weight: 600; line-height: 1.3; transform: translateY(-50%); display:flex; flex-direction:column; justify-content:center; align-items:center;}
    .sf-title { font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: block; }
    
    @media (max-width: 1023px) {
        .sf-container { display: none; }
        .sf-mobile { display: flex; flex-direction: column; align-items: center; width: 100%; gap: 0; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 30px 20px; }
        .sf-m-box { width: 100%; max-width: 250px; border: 2px solid #cbd5e1; background: #ffffff; padding: 12px; border-radius: 8px; text-align: center; font-size: 12px; font-weight: 600; margin: 0 auto; }
        .sf-m-line { width: 2px; height: 25px; background-color: #94a3b8; position: relative; margin: 0 auto; }
        .sf-m-line::after { content: \'\'; position: absolute; bottom: 0; left: -5px; border-width: 8px 6px 0 6px; border-style: solid; border-color: #94a3b8 transparent transparent transparent; }
    }
    @media (min-width: 1024px) { .sf-mobile { display: none; } }
</style>

    <!-- DESKTOP ABSOLUTE CANVAS -->
    <div class="sf-container">
        <div class="sf-canvas">
            <!-- PATHS -->
            <div class="sf-path-h" style="top: 50px; left: 100px; width: 600px;"></div>
            <div class="sf-path-v" style="top: 50px; left: 700px; height: 140px;"></div>
            <div class="sf-path-h" style="top: 190px; left: 100px; width: 600px;"></div>
            <div class="sf-path-v" style="top: 190px; left: 100px; height: 140px;"></div>
            <div class="sf-path-h" style="top: 330px; left: 100px; width: 200px;"></div>

            <!-- ARROW HEADS -->
            <div class="sf-arr-r" style="top: 44px; left: 195px;"></div>
            <div class="sf-arr-r" style="top: 44px; left: 395px;"></div>
            <div class="sf-arr-r" style="top: 44px; left: 595px;"></div>
            <div class="sf-arr-d" style="top: 120px; left: 694px;"></div>
            
            <div class="sf-arr-l" style="top: 184px; left: 605px;"></div>
            <div class="sf-arr-l" style="top: 184px; left: 405px;"></div>
            <div class="sf-arr-l" style="top: 184px; left: 205px;"></div>
            <div class="sf-arr-d" style="top: 260px; left: 94px;"></div>
            
            <div class="sf-arr-r" style="top: 324px; left: 195px;"></div>

            <!-- BOXES -->
            <!-- ROW 1 -->
            <div class="sf-box" style="top: 50px; left: 20px; border-color: #f59e0b; color: #b45309;">
                <span class="sf-title" style="color: #d97706;">START</span>
                <span style="color:#92400e; font-size:12px;">1. Sales Order</span>
            </div>
            <div class="sf-box" style="top: 50px; left: 220px; border-color: #2563eb; color: #1e40af;">
                <span style="color:#1e3a8a; font-size:12px;">2. Create DO</span>
            </div>
            <div class="sf-box" style="top: 50px; left: 420px; border-color: #38bdf8; color: #0284c7;">
                <span style="color:#0369a1; font-size:12px;">3. Shipment Plan</span>
            </div>
            <div class="sf-box" style="top: 50px; left: 620px; border-color: #0ea5e9; color: #0369a1;">
                <span style="color:#075985; font-size:12px;">4. Shipment Cost</span>
            </div>

            <!-- ROW 2 (R to L) -->
            <div class="sf-box" style="top: 190px; left: 620px; border-color: #a855f7; color: #7e22ce;">
                <span style="color:#6b21a8; font-size:12px;">5. Delivery</span>
            </div>
            <div class="sf-box" style="top: 190px; left: 420px; border-color: #22c55e; color: #15803d;">
                <span style="color:#166534; font-size:12px;">6. POD Settlement</span>
            </div>
            <div class="sf-box" style="top: 190px; left: 220px; border-color: #f97316; color: #c2410c;">
                <span style="color:#9a3412; font-size:12px;">7. Generate Invoice</span>
            </div>
            <div class="sf-box" style="top: 190px; left: 20px; border-color: #64748b; color: #334155;">
                <span style="color:#1e293b; font-size:12px;">8. Faktur Pajak</span>
            </div>

            <!-- ROW 3 (L to R) -->
            <div class="sf-box" style="top: 330px; left: 20px; border-color: #059669; color: #047857;">
                <span style="color:#065f46; font-size:12px;">9. Collection</span>
            </div>
            <div class="sf-box" style="top: 330px; left: 220px; border-color: #064e3b; background: #d1fae5; color: #065f46;">
                <span class="sf-title" style="color: #059669;">END</span>
                <span style="color:#064e3b; font-size:12px;">Payment Received</span>
            </div>
        </div>
    </div>
    
    <!-- MOBILE FALLBACK -->
    <div class="sf-mobile">
        <div class="sf-m-box" style="border-color:#f59e0b; color:#92400e;">1. Sales Order</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#2563eb; color:#1e3a8a;">2. Create DO</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#38bdf8; color:#0369a1;">3. Shipment Plan</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#0ea5e9; color:#075985;">4. Shipment Cost</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#a855f7; color:#6b21a8;">5. Delivery</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#22c55e; color:#166534;">6. POD Settlement</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#f97316; color:#9a3412;">7. Generate Invoice</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#64748b; color:#1e293b;">8. Faktur Pajak</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#059669; color:#065f46;">9. Collection</div>
    </div>

    <!-- EXPLANATORY LEGEND -->
    <h3 class="font-bold mt-8 mb-4 text-md text-gray-800">Detail Aktivitas & Tanggung Jawab</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-gray-700 mb-8">
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-amber-500"><strong class="text-amber-700">1. Sales Order:</strong> Pembuatan SO berdasarkan PO pelanggan & verifikasi harga.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-sky-400"><strong class="text-sky-600">3. Shipment Plan:</strong> Perencanaan rute armada & pemotongan stok virtual.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-sky-600"><strong class="text-sky-800">4. Shipment Cost:</strong> Perhitungan estimasi biaya pengiriman.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-blue-600"><strong class="text-blue-800">4. Delivery Order:</strong> Eksekusi pemotongan stok & cetak Surat Jalan.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-purple-500"><strong class="text-purple-700">5. Delivery:</strong> Pengiriman fisik material ke lokasi proyek.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-green-500"><strong class="text-green-700">6. POD Settlement:</strong> Konfirmasi Proof of Delivery di sistem.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-orange-500"><strong class="text-orange-700">7. Generate Invoice:</strong> Pencetakan tagihan resmi berdasarkan kuantitas POD.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-slate-500"><strong class="text-slate-700">8. Create Faktur Pajak:</strong> Penerbitan e-Faktur pajak.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-emerald-600 md:col-span-2"><strong class="text-emerald-700">9. Collection:</strong> Pembukuan penerimaan dana pembayaran pelanggan.</div>
    </div>
</div>
<div id="section-5" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>6. POD Settlement</span></h2>
    
    <div class="prose max-w-none prose-sm text-justify text-gray-800 mb-8">
        <p>Proses <strong>Proof of Delivery (POD) Settlement</strong> adalah tahap validasi akhir pengiriman barang. Sistem akan membandingkan jumlah barang yang dikirim (Delivery) dengan jumlah aktual yang diterima oleh pelanggan. Jika terdapat selisih (discrepancy) seperti barang hilang atau rusak, sistem akan mengarahkan alur ke proses klaim, penerimaan retur, hingga pemusnahan barang (scrap) atau pengembalian ke stok bagus.</p>
    </div>

    <!-- ABSOLUTE CANVAS CONTAINER -->
    <div style="position: relative; width: 100%; max-width: 1000px; height: 950px; margin: 0 auto; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; font-family: sans-serif;">
        
        <!-- GRID LINES (Optional, for visual aid, can be removed) -->
        <!-- <div style="position:absolute; left:250px; top:0; bottom:0; width:1px; background:#e2e8f0;"></div>
        <div style="position:absolute; left:500px; top:0; bottom:0; width:1px; background:#e2e8f0;"></div>
        <div style="position:absolute; left:750px; top:0; bottom:0; width:1px; background:#e2e8f0;"></div> -->
        
        <!-- Y=20: START -->
        <div style="position: absolute; top: 20px; left: 500px; width: 80px; margin-left: -40px; background: #1e293b; color: white; text-align: center; padding: 8px 0; border-radius: 50px; font-size: 11px; font-weight: bold; z-index: 10;">
            START
        </div>
        
        <!-- Line: Start to Standard Take Order -->
        <div style="position: absolute; top: 50px; left: 500px; width: 2px; height: 40px; background: #94a3b8; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #94a3b8 transparent transparent transparent;"></div>
        </div>
        
        <!-- Y=90: Standard Take Order -->
        <div style="position: absolute; top: 90px; left: 500px; width: 180px; margin-left: -90px; background: white; border: 2px solid #3b82f6; border-radius: 6px; text-align: center; padding: 12px; font-size: 12px; font-weight: bold; color: #1e3a8a; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index: 10;">
            Standard Take Order (O2C)
        </div>
        
        <!-- Line: to Discrepancy -->
        <div style="position: absolute; top: 135px; left: 500px; width: 2px; height: 45px; background: #94a3b8; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #94a3b8 transparent transparent transparent;"></div>
        </div>
        
        <!-- Y=180: Discrepancy Exist? -->
        <div style="position: absolute; top: 180px; left: 500px; width: 200px; margin-left: -100px; background: #fef3c7; border: 2px solid #f59e0b; border-radius: 50px; text-align: center; padding: 10px; font-size: 11px; font-weight: bold; color: #b45309; z-index: 10;">
            Discrepancy Exist?
        </div>
        
        <!-- Branch 1: Main Split -->
        <div style="position: absolute; top: 215px; left: 500px; width: 2px; height: 25px; background: #94a3b8; margin-left: -1px;"></div>
        <div style="position: absolute; top: 240px; left: 250px; width: 500px; height: 2px; background: #94a3b8;"></div>
        
        <!-- Drop Left (Y) -->
        <div style="position: absolute; top: 240px; left: 250px; width: 2px; height: 20px; background: #10b981; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #10b981 transparent transparent transparent;"></div>
        </div>
        <div style="position: absolute; top: 265px; left: 250px; margin-left: -25px; background: #10b981; color: white; padding: 2px 8px; border-radius: 4px; font-size: 9px; font-weight: bold; width: 50px; text-align: center;">YES (Y)</div>
        
        <!-- Drop Right (N) -->
        <div style="position: absolute; top: 240px; left: 750px; width: 2px; height: 20px; background: #ef4444; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #ef4444 transparent transparent transparent;"></div>
        </div>
        <div style="position: absolute; top: 265px; left: 750px; margin-left: -25px; background: #ef4444; color: white; padding: 2px 8px; border-radius: 4px; font-size: 9px; font-weight: bold; width: 50px; text-align: center;">NO (N)</div>
        
        <!-- TRACK N (Right) -->
        <div style="position: absolute; top: 290px; left: 750px; width: 180px; margin-left: -90px; background: #fef2f2; border: 2px solid #ef4444; border-radius: 6px; text-align: center; padding: 12px; font-size: 11px; font-weight: bold; color: #b91c1c; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index: 10;">
            Admin Branch:<br>Create POD Full (Tanpa Selisih)
        </div>
        <div style="position: absolute; top: 340px; left: 750px; width: 2px; height: 480px; background: #94a3b8; margin-left: -1px;"></div>
        
        <!-- TRACK Y (Left) -->
        <div style="position: absolute; top: 290px; left: 250px; width: 180px; margin-left: -90px; background: #ecfdf5; border: 2px solid #10b981; border-radius: 6px; text-align: center; padding: 12px; font-size: 11px; font-weight: bold; color: #047857; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index: 10;">
            Admin Branch:<br>Create POD Partial (Sesuai Fisik)
        </div>
        <div style="position: absolute; top: 345px; left: 250px; width: 2px; height: 35px; background: #10b981; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #10b981 transparent transparent transparent;"></div>
        </div>
        
        <div style="position: absolute; top: 380px; left: 250px; width: 180px; margin-left: -90px; background: #ecfdf5; border: 2px solid #10b981; border-radius: 6px; text-align: center; padding: 12px; font-size: 11px; font-weight: bold; color: #047857; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index: 10;">
            Warehouse Admin:<br>GR Retur to Blocked Stock
        </div>
        <div style="position: absolute; top: 430px; left: 250px; width: 2px; height: 40px; background: #10b981; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #10b981 transparent transparent transparent;"></div>
        </div>
        
        <!-- Y=470: Rejected Goods Exist? -->
        <div style="position: absolute; top: 470px; left: 250px; width: 200px; margin-left: -100px; background: #fef3c7; border: 2px solid #f59e0b; border-radius: 50px; text-align: center; padding: 10px; font-size: 11px; font-weight: bold; color: #b45309; z-index: 10;">
            Rejected Goods Exist?
        </div>
        
        <!-- Branch 2 -->
        <div style="position: absolute; top: 505px; left: 250px; width: 2px; height: 25px; background: #94a3b8; margin-left: -1px;"></div>
        <div style="position: absolute; top: 530px; left: 100px; width: 300px; height: 2px; background: #94a3b8;"></div>
        
        <!-- Drop Left (N) from Branch 2 -->
        <div style="position: absolute; top: 530px; left: 100px; width: 2px; height: 20px; background: #ef4444; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #ef4444 transparent transparent transparent;"></div>
        </div>
        <div style="position: absolute; top: 555px; left: 100px; margin-left: -25px; background: #ef4444; color: white; padding: 2px 8px; border-radius: 4px; font-size: 9px; font-weight: bold; width: 50px; text-align: center;">NO (N)</div>
        
        <!-- Drop Right (Y) from Branch 2 -->
        <div style="position: absolute; top: 530px; left: 400px; width: 2px; height: 20px; background: #10b981; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #10b981 transparent transparent transparent;"></div>
        </div>
        <div style="position: absolute; top: 555px; left: 400px; margin-left: -25px; background: #10b981; color: white; padding: 2px 8px; border-radius: 4px; font-size: 9px; font-weight: bold; width: 50px; text-align: center;">YES (Y)</div>
        
        <!-- TRACK Y->N (Left) -->
        <div style="position: absolute; top: 580px; left: 100px; width: 140px; margin-left: -70px; background: #fef2f2; border: 2px solid #ef4444; border-radius: 6px; text-align: center; padding: 12px; font-size: 11px; font-weight: bold; color: #b91c1c; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index: 10;">
            Claim Processing /<br>Customer Complaint
        </div>
        <div style="position: absolute; top: 630px; left: 100px; width: 2px; height: 190px; background: #94a3b8; margin-left: -1px;"></div>
        
        <!-- TRACK Y->Y (Right) -->
        <div style="position: absolute; top: 580px; left: 400px; width: 200px; margin-left: -100px; background: #fef3c7; border: 2px solid #f59e0b; border-radius: 50px; text-align: center; padding: 10px; font-size: 11px; font-weight: bold; color: #b45309; z-index: 10;">
            Rejected Goods Damaged?
        </div>
        
        <!-- Branch 3 -->
        <div style="position: absolute; top: 615px; left: 400px; width: 2px; height: 25px; background: #94a3b8; margin-left: -1px;"></div>
        <div style="position: absolute; top: 640px; left: 250px; width: 300px; height: 2px; background: #94a3b8;"></div>
        
        <!-- Drop Left (Y) from Branch 3 -->
        <div style="position: absolute; top: 640px; left: 250px; width: 2px; height: 20px; background: #10b981; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #10b981 transparent transparent transparent;"></div>
        </div>
        <div style="position: absolute; top: 665px; left: 250px; margin-left: -25px; background: #10b981; color: white; padding: 2px 8px; border-radius: 4px; font-size: 9px; font-weight: bold; width: 50px; text-align: center;">YES (Y)</div>
        
        <!-- Drop Right (N) from Branch 3 -->
        <div style="position: absolute; top: 640px; left: 550px; width: 2px; height: 20px; background: #ef4444; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #ef4444 transparent transparent transparent;"></div>
        </div>
        <div style="position: absolute; top: 665px; left: 550px; margin-left: -25px; background: #ef4444; color: white; padding: 2px 8px; border-radius: 4px; font-size: 9px; font-weight: bold; width: 50px; text-align: center;">NO (N)</div>
        
        <!-- TRACK Y->Y->Y (Left) -->
        <div style="position: absolute; top: 690px; left: 250px; width: 140px; margin-left: -70px; background: #ecfdf5; border: 2px solid #10b981; border-radius: 6px; text-align: center; padding: 12px; font-size: 11px; font-weight: bold; color: #047857; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index: 10;">
            Goods Issue for Scrap (Pemusnahan)
        </div>
        <div style="position: absolute; top: 740px; left: 250px; width: 2px; height: 80px; background: #94a3b8; margin-left: -1px;"></div>
        
        <!-- TRACK Y->Y->N (Right) -->
        <div style="position: absolute; top: 690px; left: 550px; width: 140px; margin-left: -70px; background: #fef2f2; border: 2px solid #ef4444; border-radius: 6px; text-align: center; padding: 12px; font-size: 11px; font-weight: bold; color: #b91c1c; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index: 10;">
            Transfer Posting to Good Stock
        </div>
        <div style="position: absolute; top: 740px; left: 550px; width: 2px; height: 80px; background: #94a3b8; margin-left: -1px;"></div>
        
        <!-- MERGE TO END -->
        <div style="position: absolute; top: 820px; left: 100px; width: 650px; height: 2px; background: #94a3b8;"></div>
        <div style="position: absolute; top: 820px; left: 500px; width: 2px; height: 30px; background: #94a3b8; margin-left: -1px;">
            <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #94a3b8 transparent transparent transparent;"></div>
        </div>
        
        <!-- Y=850: END -->
        <div style="position: absolute; top: 850px; left: 500px; width: 80px; margin-left: -40px; background: #1e293b; color: white; text-align: center; padding: 8px 0; border-radius: 50px; font-size: 11px; font-weight: bold; z-index: 10;">
            END
        </div>
        
    </div>

    <!-- DETAIL KEPUTUSAN -->
    <div class="mt-12">
        <h3 class="font-bold text-gray-800 text-lg mb-4">Penjelasan Matriks Keputusan</h3>
        
        <div class="space-y-4">
            <div class="border border-gray-200 rounded p-4 bg-white flex gap-4">
                <div class="font-bold text-gray-700 w-8">Y</div>
                <div>
                    <h4 class="font-bold text-gray-800 mb-1">Discrepancy Exist -> YES</h4>
                    <p class="text-sm text-gray-600">Pelanggan menolak sebagian atau seluruh barang yang dikirim karena alasan tertentu (rusak, salah kirim). Sistem mencatat penerimaan parsial (POD Partial) dan barang fisik yang ditolak akan di-Goods Receipt (GR) ke lokasi <em>Blocked Stock</em> di gudang untuk diinvestigasi.</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded p-4 bg-white flex gap-4">
                <div class="font-bold text-gray-700 w-8">N</div>
                <div>
                    <h4 class="font-bold text-gray-800 mb-1">Discrepancy Exist -> NO</h4>
                    <p class="text-sm text-gray-600">Pelanggan menerima barang secara penuh sesuai dengan Surat Jalan (Delivery Order). Sistem mencatat POD Full tanpa selisih, dan proses pengiriman dinyatakan selesai (END) dan berlanjut ke tahap Penagihan (Billing).</p>
                </div>
            </div>
            
            <div class="border border-gray-200 rounded p-4 bg-white flex gap-4">
                <div class="font-bold text-gray-700 w-8">A</div>
                <div>
                    <h4 class="font-bold text-gray-800 mb-1">Rejected Goods Damaged?</h4>
                    <p class="text-sm text-gray-600">Investigasi terhadap barang retur di <em>Blocked Stock</em>. Jika terbukti rusak (YES), barang akan dikeluarkan dari persediaan untuk dimusnahkan (Goods Issue for Scrap). Jika ternyata tidak rusak atau salah kirim saja (NO), barang akan dipindahkan kembali ke stok bagus (Transfer to Good Stock) agar bisa dijual kembali.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="section-6" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>7. Customer Complaint & Sales Return</span></h2>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        Proses <em>Sales Return</em> mengelola pengembalian barang dari pelanggan akibat komplain (barang rusak, tidak sesuai pesanan, dll). Alur ini dikontrol secara ketat melalui dokumen <em>Customer Complaint Form</em> (CCF) yang membutuhkan persetujuan manajerial, penarikan fisik barang oleh tim logistik, inspeksi kualitas oleh gudang, hingga bermuara pada kompensasi finansial berupa <em>Credit Note</em> dan penyesuaian piutang (A/R) oleh Finance.
    </p>

    <h3 class="font-bold mt-8 mb-4 text-lg text-gray-800 border-b pb-2">End-to-End Sales Return Process Flow</h3>
    
    <style>
    .sf-container { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px 20px; margin-bottom: 2rem; overflow-x: auto; display: flex; justify-content: center; }
    .sf-canvas { position: relative; width: 800px; height: 380px; }
    .sf-path-h { position: absolute; height: 2px; background-color: #94a3b8; z-index: 0; }
    .sf-path-v { position: absolute; width: 2px; background-color: #94a3b8; z-index: 0; }
    .sf-arr-r { position: absolute; border-width: 6px 0 6px 8px; border-style: solid; border-color: transparent transparent transparent #94a3b8; z-index: 1; }
    .sf-arr-l { position: absolute; border-width: 6px 8px 6px 0; border-style: solid; border-color: transparent #94a3b8 transparent transparent; z-index: 1; }
    .sf-arr-d { position: absolute; border-width: 8px 6px 0 6px; border-style: solid; border-color: #94a3b8 transparent transparent transparent; z-index: 1; }
    .sf-box { position: absolute; width: 160px; border: 2px solid #cbd5e1; background: #ffffff; padding: 12px 8px; border-radius: 8px; text-align: center; z-index: 10; box-shadow: 0 4px 6px rgba(0,0,0,0.1); font-size: 11px; font-weight: 600; line-height: 1.3; transform: translateY(-50%); display:flex; flex-direction:column; justify-content:center; align-items:center;}
    .sf-title { font-size: 9px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: block; }
    
    @media (max-width: 1023px) {
        .sf-container { display: none; }
        .sf-mobile { display: flex; flex-direction: column; align-items: center; width: 100%; gap: 0; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 30px 20px; }
        .sf-m-box { width: 100%; max-width: 250px; border: 2px solid #cbd5e1; background: #ffffff; padding: 12px; border-radius: 8px; text-align: center; font-size: 12px; font-weight: 600; margin: 0 auto; }
        .sf-m-line { width: 2px; height: 25px; background-color: #94a3b8; position: relative; margin: 0 auto; }
        .sf-m-line::after { content: \'\'; position: absolute; bottom: 0; left: -5px; border-width: 8px 6px 0 6px; border-style: solid; border-color: #94a3b8 transparent transparent transparent; }
    }
    @media (min-width: 1024px) { .sf-mobile { display: none; } }
</style>

    <!-- DESKTOP ABSOLUTE CANVAS -->
    <div class="sf-container">
        <div class="sf-canvas">
            <!-- PATHS -->
            <div class="sf-path-h" style="top: 50px; left: 100px; width: 600px;"></div>
            <div class="sf-path-v" style="top: 50px; left: 700px; height: 140px;"></div>
            <div class="sf-path-h" style="top: 190px; left: 100px; width: 600px;"></div>
            <div class="sf-path-v" style="top: 190px; left: 100px; height: 140px;"></div>
            <div class="sf-path-h" style="top: 330px; left: 100px; width: 200px;"></div>

            <!-- ARROW HEADS -->
            <div class="sf-arr-r" style="top: 44px; left: 195px;"></div>
            <div class="sf-arr-r" style="top: 44px; left: 395px;"></div>
            <div class="sf-arr-r" style="top: 44px; left: 595px;"></div>
            <div class="sf-arr-d" style="top: 120px; left: 694px;"></div>
            
            <div class="sf-arr-l" style="top: 184px; left: 605px;"></div>
            <div class="sf-arr-l" style="top: 184px; left: 405px;"></div>
            <div class="sf-arr-l" style="top: 184px; left: 205px;"></div>
            <div class="sf-arr-d" style="top: 260px; left: 94px;"></div>
            
            <div class="sf-arr-r" style="top: 324px; left: 195px;"></div>

            <!-- BOXES -->
            <!-- ROW 1 -->
            <div class="sf-box" style="top: 50px; left: 20px; border-color: #f59e0b; color: #b45309;">
                <span class="sf-title" style="color: #d97706;">START</span>
                <span style="color:#92400e; font-size:12px;">1. Form CCF</span>
            </div>
            <div class="sf-box" style="top: 50px; left: 220px; border-color: #ef4444; color: #b91c1c;">
                <span style="color:#991b1b; font-size:12px;">2. Approve CCF</span>
            </div>
            <div class="sf-box" style="top: 50px; left: 420px; border-color: #38bdf8; color: #0284c7;">
                <span style="color:#0369a1; font-size:12px;">3. Input SO Return</span>
            </div>
            <div class="sf-box" style="top: 50px; left: 620px; border-color: #2563eb; color: #1e40af;">
                <span style="color:#1e3a8a; font-size:12px;">2. Create DO Return</span>
            </div>

            <!-- ROW 2 (R to L) -->
            <div class="sf-box" style="top: 190px; left: 620px; border-color: #a855f7; color: #7e22ce;">
                <span style="color:#6b21a8; font-size:12px;">5. Pickup Goods</span>
            </div>
            <div class="sf-box" style="top: 190px; left: 420px; border-color: #22c55e; color: #15803d;">
                <span style="color:#166534; font-size:12px;">6. Receive & Check</span>
            </div>
            <div class="sf-box" style="top: 190px; left: 220px; border-color: #64748b; color: #334155;">
                <span style="color:#1e293b; font-size:12px;">7. Post Goods Receipt</span>
            </div>
            <div class="sf-box" style="top: 190px; left: 20px; border-color: #f97316; color: #c2410c;">
                <span style="color:#9a3412; font-size:12px;">8. Credit Note</span>
            </div>

            <!-- ROW 3 (L to R) -->
            <div class="sf-box" style="top: 330px; left: 20px; border-color: #8b5cf6; color: #6d28d9;">
                <span style="color:#5b21b6; font-size:12px;">9. Nota Retur Pajak</span>
            </div>
            <div class="sf-box" style="top: 330px; left: 220px; border-color: #064e3b; background: #d1fae5; color: #065f46;">
                <span class="sf-title" style="color: #059669;">END</span>
                <span style="color:#064e3b; font-size:12px;">A/R Offset / Refund</span>
            </div>
        </div>
    </div>
    
    <!-- MOBILE FALLBACK -->
    <div class="sf-mobile">
        <div class="sf-m-box" style="border-color:#f59e0b; color:#92400e;">1. Form CCF</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#ef4444; color:#991b1b;">2. Approve CCF</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#38bdf8; color:#0369a1;">3. Input SO Return</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#2563eb; color:#1e3a8a;">2. Create DO Return</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#a855f7; color:#6b21a8;">5. Pickup Goods</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#22c55e; color:#166534;">6. Receive & Check</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#64748b; color:#1e293b;">7. Post Goods Receipt</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#f97316; color:#9a3412;">8. Credit Note</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#8b5cf6; color:#5b21b6;">9. Nota Retur Pajak</div>
        <div class="sf-m-line"></div>
        <div class="sf-m-box" style="border-color:#059669; color:#065f46;">10. A/R Offset</div>
    </div>

    <!-- EXPLANATORY LEGEND -->
    <h3 class="font-bold mt-8 mb-4 text-md text-gray-800">Detail Aktivitas & Tanggung Jawab</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs text-gray-700 mb-8">
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-amber-500"><strong class="text-amber-700">1. Fill CCF:</strong> Salesman mengisi form keluhan pelanggan.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-red-500"><strong class="text-red-700">2. Approve CCF:</strong> Tinjauan & persetujuan oleh Branch Manager.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-sky-400"><strong class="text-sky-700">3. Input SO Return:</strong> Input retur di ERP oleh Sales Admin.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-blue-600"><strong class="text-blue-800">2. Create DO Return:</strong> Menerbitkan Surat Jalan Tarikan.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-purple-500"><strong class="text-purple-700">5. Pickup Goods:</strong> Penarikan fisik barang retur oleh Driver.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-green-500"><strong class="text-green-700">6. Receive & Check:</strong> Inspeksi kesesuaian oleh staf Gudang.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-slate-500"><strong class="text-slate-700">7. Post Goods Receipt:</strong> Masuk stok atau dibuang (Scrap).</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-orange-500"><strong class="text-orange-700">8. Create Credit Note:</strong> Pembuatan nota kredit oleh Sales Admin.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-purple-400"><strong class="text-purple-600">9. Nota Retur Pajak:</strong> Input dokumen retur pajak PPN.</div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-l-4 border-l-emerald-600"><strong class="text-emerald-700">10. A/R Offset:</strong> Eksekusi kompensasi piutang oleh Finance.</div>
    </div>
</div>
<div id="section-7" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>8. Outbound Shipment</span></h2>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        Proses <em>Outbound Shipment</em> adalah mekanisme konsolidasi logistik di mana beberapa <em>Delivery Order</em> (DO) dari proses <em>Take Order</em> digabungkan ke dalam satu armada kendaraan (<em>Vehicle</em>) berdasarkan rute dan kapasitas (<em>Routing & Capacity Planning</em>) oleh bagian Administrasi Traffic/Logistik sebelum barang secara fisik diberangkatkan.
    </p>

    <h3 class="font-bold mt-8 mb-4 text-lg text-gray-800 border-b pb-2">Outbound Shipment Process Flow</h3>
    
    <style>
        .os-container {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 40px 20px;
            margin-bottom: 2rem;
            overflow-x: auto;
            display: flex;
            justify-content: center;
        }
        .os-canvas {
            position: relative;
            width: 700px;
            height: 240px; /* Space for two rows of boxes */
        }
        
        /* The solid unbreakable path */
        .os-path-h { position: absolute; height: 2px; background-color: #94a3b8; z-index: 0; }
        .os-path-v { position: absolute; width: 2px; background-color: #94a3b8; z-index: 0; }
        
        /* Arrow heads */
        .os-arr-r { position: absolute; border-width: 6px 0 6px 8px; border-style: solid; border-color: transparent transparent transparent #94a3b8; z-index: 1; }
        .os-arr-l { position: absolute; border-width: 6px 8px 6px 0; border-style: solid; border-color: transparent #94a3b8 transparent transparent; z-index: 1; }
        .os-arr-d { position: absolute; border-width: 8px 6px 0 6px; border-style: solid; border-color: #94a3b8 transparent transparent transparent; z-index: 1; }
        
        .os-box {
            position: absolute;
            width: 180px;
            border: 2px solid #cbd5e1;
            background: #ffffff;
            padding: 16px 12px;
            border-radius: 8px;
            text-align: center;
            z-index: 10;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            font-size: 12px;
            font-weight: 600;
            color: #334155;
            line-height: 1.4;
            transform: translateY(-50%); /* Center on the Y axis of the path */
        }
        .os-title { font-size: 10px; font-weight: bold; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; display: block; }
        
        @media (max-width: 1023px) {
            .os-container { display: none; }
            .os-mobile { display: flex; flex-direction: column; align-items: center; width: 100%; gap: 0; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 30px 20px; }
            .os-m-box { width: 100%; max-width: 280px; border: 2px solid #cbd5e1; background: #ffffff; padding: 16px; border-radius: 8px; text-align: center; font-size: 12px; font-weight: 600; }
            .os-m-line { width: 2px; height: 30px; background-color: #94a3b8; position: relative; margin: 0 auto; }
            .os-m-line::after { content: \'\'; position: absolute; bottom: 0; left: -5px; border-width: 8px 6px 0 6px; border-style: solid; border-color: #94a3b8 transparent transparent transparent; }
        }
        @media (min-width: 1024px) {
            .os-mobile { display: none; }
        }
    </style>

    <!-- DESKTOP ABSOLUTE S-CURVE FLOWCHART -->
    <div class="os-container">
        <div class="os-canvas">
            <!-- 
                Y coordinates:
                Row 1 path is at Y = 50px
                Row 2 path is at Y = 190px
                Vertical drop is from X = 590px
            -->
            
            <!-- SOLID PATHS -->
            <div class="os-path-h" style="top: 50px; left: 110px; width: 480px;"></div>
            <div class="os-path-v" style="top: 50px; left: 590px; height: 140px;"></div>
            <div class="os-path-h" style="top: 190px; left: 110px; width: 480px;"></div>
            
            <!-- ARROW HEADS -->
            <div class="os-arr-r" style="top: 44px; left: 235px;"></div>
            <div class="os-arr-r" style="top: 44px; left: 475px;"></div>
            <div class="os-arr-d" style="top: 120px; left: 584px;"></div>
            <div class="os-arr-l" style="top: 184px; left: 460px;"></div>
            <div class="os-arr-l" style="top: 184px; left: 220px;"></div>
            
            <!-- BOXES -->
            <!-- Box 1 (Input) -->
            <div class="os-box" style="top: 50px; left: 20px; border-color: #94a3b8; background-color: #f1f5f9;">
                <span class="os-title" style="color: #64748b;">INPUT</span>
                Take Order Process<br><span style="font-weight: normal; font-size: 10px; color: #64748b;">(Generated DOs)</span>
            </div>
            
            <!-- Box 2 (1. Create) -->
            <div class="os-box" style="top: 50px; left: 260px; border-color: #38bdf8; background-color: #e0f2fe; color: #0369a1;">
                1. Create Shipment<br><span style="font-weight: normal; font-size: 10px; color: #0284c7;">(Admin Traffic)</span>
            </div>
            
            <!-- Box 3 (2. Collect) -->
            <div class="os-box" style="top: 50px; left: 500px; border-color: #0ea5e9; background-color: #e0f2fe; color: #075985;">
                2. Collect DO into Shipment<br><span style="font-weight: normal; font-size: 10px; color: #0369a1;">(Admin Traffic)</span>
            </div>
            
            <!-- Box 4 (3. Print) -->
            <div class="os-box" style="top: 190px; left: 260px; border-color: #2563eb; background-color: #dbeafe; color: #1e3a8a;">
                3. Print Summary DO & Drop Point<br><span style="font-weight: normal; font-size: 10px; color: #1e40af;">(Admin Traffic)</span>
            </div>
            
            <!-- Box 5 (Next) -->
            <div class="os-box" style="top: 190px; left: 20px; border-color: #94a3b8; background-color: #f1f5f9;">
                <span class="os-title" style="color: #64748b;">NEXT</span>
                Shipment Cost Process<br><span style="font-weight: normal; font-size: 10px; color: #64748b;">(Freight Calculation)</span>
            </div>
        </div>
    </div>

    <!-- MOBILE LINEAR FLOWCHART -->
    <div class="os-mobile">
        <div class="os-m-box" style="border-color: #94a3b8; background-color: #f1f5f9; color: #64748b;">
            <span class="os-title">INPUT</span>
            Take Order Process
        </div>
        
        <div class="os-m-line"></div>
        
        <div class="os-m-box" style="border-color: #38bdf8; background-color: #e0f2fe; color: #0369a1;">
            1. Create Shipment
        </div>
        
        <div class="os-m-line"></div>
        
        <div class="os-m-box" style="border-color: #0ea5e9; background-color: #e0f2fe; color: #075985;">
            2. Collect DO into Shipment
        </div>
        
        <div class="os-m-line"></div>
        
        <div class="os-m-box" style="border-color: #2563eb; background-color: #dbeafe; color: #1e3a8a;">
            3. Print Summary DO & Drop Point
        </div>
        
        <div class="os-m-line"></div>
        
        <div class="os-m-box" style="border-color: #94a3b8; background-color: #f1f5f9; color: #64748b;">
            <span class="os-title">NEXT</span>
            Shipment Cost Process
        </div>
    </div>

    <!-- EXPLANATORY LEGEND -->
    <h3 class="font-bold mt-8 mb-4 text-md text-gray-800">Detail Aktivitas Outbound</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs text-gray-700 mb-8">
        <div class="p-3 border rounded-lg bg-white shadow-sm border-t-4 border-t-sky-400 hover:bg-gray-50 transition-colors">
            <strong style="color: #0284c7;">1. Create Shipment:</strong><br>Admin Traffic membuat dokumen <em>Shipment</em> baru di sistem sebagai wadah/kendaraan virtual yang akan membawa barang.
        </div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-t-4 border-t-sky-500 hover:bg-gray-50 transition-colors">
            <strong style="color: #0369a1;">2. Collect DO:</strong><br>Admin Traffic menarik (<em>collect</em>) beberapa DO yang memiliki rute searah dan memasukkannya ke dalam dokumen Shipment sesuai kapasitas maksimal armada.
        </div>
        <div class="p-3 border rounded-lg bg-white shadow-sm border-t-4 border-t-blue-600 hover:bg-gray-50 transition-colors">
            <strong style="color: #1e40af;">3. Print Summary:</strong><br>Mencetak dokumen rangkuman muatan (<em>Summary DO</em>) dan rute perhentian (<em>Drop Point</em>) sebagai panduan jalan (<em>Manifest</em>) bagi Driver/Transporter.
        </div>
    </div>
</div>
<div id="section-8" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>9. Shipment Cost</span></h2>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        Proses <em>Shipment Cost</em> mengatur perhitungan, validasi, hingga pembukuan biaya pengiriman barang ke sistem Akuntansi (Finance). Karena perusahaan menggunakan kombinasi Armada Sendiri (<em>Own Fleet</em>) dan Ekspedisi Pihak Ketiga (<em>Forwarder/3PL</em>), alur kerja pada tahap awal akan terbelah menjadi dua skenario berbeda sebelum akhirnya menyatu pada proses validasi akhir.
    </p>

    <h3 class="font-bold mt-8 mb-4 text-lg text-gray-800 border-b pb-2">Shipment Cost Process Flow</h3>
    
    <style>
        .sc-container {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 40px 20px;
            font-family: sans-serif;
            margin-bottom: 2rem;
            overflow-x: auto;
        }
        .sc-flow {
            min-width: 600px;
            max-width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sc-box {
            border: 2px solid #94a3b8;
            background: #ffffff;
            padding: 12px;
            border-radius: 8px;
            text-align: center;
            z-index: 10;
            position: relative;
            width: 250px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            font-size: 12px;
            color: #334155;
        }
        .sc-title { font-weight: bold; font-size: 14px; margin-bottom: 4px; display: block; }
        .sc-decision { border-radius: 50px; font-weight: bold; }
        
        .sc-line-v { width: 2px; background-color: #94a3b8; height: 30px; z-index: 0; }
        
        /* Split layout */
        .sc-split-wrapper { width: 100%; position: relative; }
        .sc-split-bridge {
            position: absolute;
            top: 0;
            left: 25%;
            right: 25%;
            height: 2px;
            background-color: #94a3b8;
            z-index: 0;
        }
        .sc-split-cols {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .sc-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 50%;
            position: relative;
            padding-top: 30px;
        }
        .sc-col::before {
            content: \'\';
            position: absolute;
            top: 0;
            left: 50%;
            margin-left: -1px;
            width: 2px;
            height: 30px;
            background-color: #94a3b8;
            z-index: 0;
        }

        /* Merge layout */
        .sc-merge-wrapper { width: 100%; position: relative; }
        .sc-merge-bridge {
            position: absolute;
            bottom: 0;
            left: 25%;
            right: 25%;
            height: 2px;
            background-color: #94a3b8;
            z-index: 0;
        }
        .sc-merge-cols {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .sc-col-merge {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 50%;
            position: relative;
            padding-bottom: 30px;
        }
        .sc-col-merge::after {
            content: \'\';
            position: absolute;
            bottom: 0;
            left: 50%;
            margin-left: -1px;
            width: 2px;
            height: 30px;
            background-color: #94a3b8;
            z-index: 0;
        }

        /* Colors */
        .sc-box.blue { border-color: #3b82f6; color: #1e3a8a; }
        .sc-box.blue .sc-title { color: #1d4ed8; }
        .sc-line-v.blue { background-color: #3b82f6; }
        
        .sc-box.orange { border-color: #f97316; color: #7c2d12; }
        .sc-box.orange .sc-title { color: #c2410c; }
        .sc-line-v.orange { background-color: #f97316; }

        .sc-box.green { border-color: #10b981; color: #064e3b; }
        .sc-box.green .sc-title { color: #047857; }
        
        .sc-box.red { border-color: #ef4444; color: #7f1d1d; }
        .sc-box.red .sc-title { color: #b91c1c; }
        
        /* Arrowheads */
        .arrow-down { position: relative; }
        .arrow-down::after {
            content: \'\';
            position: absolute;
            bottom: 0;
            left: 50%;
            margin-left: -4px;
            border-width: 5px 4px 0 4px;
            border-style: solid;
            border-color: inherit;
            border-left-color: transparent;
            border-right-color: transparent;
        }
    </style>

    <div class="sc-container">
        <div class="sc-flow">
            <!-- START -->
            <div class="sc-box">
                <span class="sc-title">INPUT</span>
                Outbound / Inter-Branch Shipment
            </div>
            <div class="sc-line-v arrow-down" style="border-top-color: #94a3b8;"></div>
            
            <div class="sc-box sc-decision">
                Own Fleet? (Armada Sendiri)
            </div>
            <div class="sc-line-v"></div>

            <!-- SPLIT -->
            <div class="sc-split-wrapper">
                <div class="sc-split-bridge"></div>
                <div class="sc-split-cols">
                    
                    <!-- LEFT TRACK (YES) -->
                    <div class="sc-col">
                        <div style="background:#3b82f6; color:#fff; padding:2px 10px; border-radius:4px; font-size:10px; font-weight:bold; margin-bottom:5px;">YES (Own Fleet)</div>
                        <div class="sc-box blue">
                            <span class="sc-title">1A. Create Shipment Cost</span>
                            Hitung Total Cash Advance (Kasbon).
                        </div>
                        <div class="sc-line-v blue arrow-down" style="border-top-color: #3b82f6;"></div>
                        <div class="sc-box blue">
                            <span class="sc-title">2A. Pay Cash Advance</span>
                            Kasir bayar kasbon ke Driver (Payment Slip).
                        </div>
                    </div>

                    <!-- RIGHT TRACK (NO) -->
                    <div class="sc-col">
                        <div style="background:#f97316; color:#fff; padding:2px 10px; border-radius:4px; font-size:10px; font-weight:bold; margin-bottom:5px;">NO (Forwarder)</div>
                        <div class="sc-box orange">
                            <span class="sc-title">1B. Create Shipment Cost</span>
                            Kalkulasi total tarif pengiriman vendor.
                        </div>
                        <div class="sc-line-v orange arrow-down" style="border-top-color: #f97316;"></div>
                        <div class="sc-box orange">
                            <span class="sc-title">2B. Vendor Invoice</span>
                            Forwarder kirim Tagihan & Copy Surat Jalan.
                        </div>
                    </div>
                </div>
            </div>

            <!-- MERGE -->
            <div class="sc-merge-wrapper">
                <div class="sc-merge-cols">
                    <div class="sc-col-merge"></div>
                    <div class="sc-col-merge"></div>
                </div>
                <div class="sc-merge-bridge"></div>
            </div>
            
            <div class="sc-line-v arrow-down" style="border-top-color: #94a3b8;"></div>

            <div class="sc-box green">
                <span class="sc-title">3. Validate Shipment Cost Realization</span>
                Cocokkan realisasi tagihan vs estimasi biaya awal.
            </div>
            
            <div class="sc-line-v"></div>

            <div class="sc-box sc-decision green">
                Discrepancy Exist? (Ada Selisih?)
            </div>
            <div class="sc-line-v"></div>

            <!-- DISCREPANCY SPLIT -->
            <div class="sc-split-wrapper">
                <div class="sc-split-bridge" style="background-color: #10b981;"></div>
                <div class="sc-split-cols">
                    
                    <!-- LEFT TRACK (YES) -->
                    <div class="sc-col" style="padding-top: 20px;">
                        <style>.sc-col-y::before { background-color: #10b981 !important; height: 20px !important; }</style>
                        <div class="sc-col-y" style="position:absolute; top:0; left:50%; width:2px; height:20px; background:#10b981; margin-left:-1px;"></div>
                        <div style="background:#ef4444; color:#fff; padding:2px 10px; border-radius:4px; font-size:10px; font-weight:bold; margin-bottom:5px; z-index:11; position:relative;">YES</div>
                        <div class="sc-box red">
                            Update Shipment Cost ke nilai aktual.
                        </div>
                    </div>

                    <!-- RIGHT TRACK (NO) -->
                    <div class="sc-col" style="padding-top: 20px;">
                        <div style="position:absolute; top:0; left:50%; width:2px; height:20px; background:#10b981; margin-left:-1px;"></div>
                        <div style="background:#10b981; color:#fff; padding:2px 10px; border-radius:4px; font-size:10px; font-weight:bold; margin-bottom:5px; z-index:11; position:relative;">NO</div>
                        <div class="sc-box green">
                            Lanjut ke pembukuan.
                        </div>
                    </div>
                </div>
            </div>

            <!-- DISCREPANCY MERGE -->
            <div class="sc-merge-wrapper">
                <div class="sc-merge-cols">
                    <div class="sc-col-merge" style="padding-bottom: 20px;">
                        <div style="position:absolute; bottom:0; left:50%; width:2px; height:20px; background:#10b981; margin-left:-1px;"></div>
                    </div>
                    <div class="sc-col-merge" style="padding-bottom: 20px;">
                        <div style="position:absolute; bottom:0; left:50%; width:2px; height:20px; background:#10b981; margin-left:-1px;"></div>
                    </div>
                </div>
                <div class="sc-merge-bridge" style="background-color: #10b981;"></div>
            </div>

            <div class="sc-line-v arrow-down" style="border-top-color: #10b981; background-color: #10b981;"></div>

            <div class="sc-box" style="background:#059669; color:#fff; border-color:#047857;">
                <span class="sc-title" style="color:#fff;">4. Transfer to Accounting & LIV</span>
                Pembukuan nilai biaya & Verifikasi Tagihan Vendor.
            </div>

            <div class="sc-line-v arrow-down" style="border-top-color: #059669; background-color: #059669;"></div>

            <div style="background:#1e293b; color:#fff; padding:8px 24px; border-radius:50px; font-weight:bold; font-size:12px;">
                END PROCESS
            </div>
        </div>
    </div>

    <!-- EXPLANATORY LEGEND -->
    <h3 class="font-bold mt-12 mb-4 text-md text-gray-800">Penjelasan Matriks Keputusan</h3>
    <div class="space-y-4 text-sm text-gray-700">
        <div class="flex items-start gap-3 p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="mt-0.5"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-blue-100 text-blue-600 font-bold text-xs">A</span></div>
            <div>
                <strong class="text-blue-800">Skenario Armada Sendiri (Own Fleet):</strong>
                <p class="mt-1 text-gray-600">Sistem akan menghitung estimasi <em>Cash Advance</em> (Uang Jalan/Kasbon) untuk supir berdasarkan jarak rute dan lokasi. Kasir kemudian akan mencairkan uang tunai tersebut sebelum supir berangkat.</p>
            </div>
        </div>
        <div class="flex items-start gap-3 p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="mt-0.5"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-orange-100 text-orange-600 font-bold text-xs">B</span></div>
            <div>
                <strong class="text-orange-800">Skenario Ekspedisi Pihak Ketiga (Forwarder):</strong>
                <p class="mt-1 text-gray-600">Sistem mengkalkulasi tarif kontrak vendor. Setelah barang sampai, Forwarder akan menagihkan biaya (<em>Vendor Invoice</em>) dengan melampirkan fotokopi Surat Jalan sebagai bukti.</p>
            </div>
        </div>
        <div class="flex items-start gap-3 p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="mt-0.5"><span class="flex items-center justify-center w-6 h-6 rounded-full bg-emerald-100 text-emerald-600 font-bold text-xs">V</span></div>
            <div>
                <strong class="text-emerald-800">Validasi & Transfer to Accounting:</strong>
                <p class="mt-1 text-gray-600">Branch Admin memvalidasi apakah ada selisih (<em>Discrepancy</em>) antara biaya estimasi awal dengan tagihan/realisasi aktual. Jika ada, sistem di-<em>update</em>. Jika sudah sesuai, seluruh biaya ditransfer secara otomatis ke Modul Akuntansi (<em>Finance</em>) untuk pencatatan buku besar dan verifikasi tagihan vendor (LIV).</p>
            </div>
        </div>
    </div>
</div>

<div id="section-9" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>10. Credit Note (Customer Complaint)</span></h2>
    <p class="text-sm text-gray-600 mb-6 italic text-justify">
        Proses <em>Credit Note</em> menangani kompensasi finansial kepada pelanggan akibat keluhan (<em>Customer Complaint</em>), selisih harga, atau pengembalian barang. Alur ini membutuhkan persetujuan berjenjang hingga tingkat Controller sebelum sistem menerbitkan faktur retur, dan secara otomatis menentukan apakah kompensasi tersebut akan memotong piutang berjalan (<em>Offset A/R</em>) atau dicairkan secara tunai (<em>Refund</em>).
    </p>

    <h3 class="font-bold mt-8 mb-4 text-lg text-gray-800 border-b pb-2">Credit Note Decision Flow</h3>
    
    <style>
        .cn-container { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px 20px; font-family: sans-serif; margin-bottom: 2rem; overflow-x: auto; }
        .cn-flow { min-width: 600px; max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; align-items: center; }
        .cn-box { border: 2px solid #94a3b8; background: #ffffff; padding: 12px; border-radius: 8px; text-align: center; z-index: 10; position: relative; width: 250px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); font-size: 12px; color: #334155; line-height: 1.4; margin: 0 auto; }
        .cn-title { font-weight: bold; font-size: 13px; margin-bottom: 4px; display: block; }
        .cn-decision { border-radius: 50px; font-weight: bold; }
        
        .cn-line-v { width: 2px; background-color: #94a3b8; height: 30px; margin: 0 auto; z-index: 0; }
        .cn-arrow-d { position: relative; }
        .cn-arrow-d::after { content: \'\'; position: absolute; bottom: 0; left: 50%; margin-left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: inherit; border-left-color: transparent; border-right-color: transparent; }
        
        /* Split layout */
        .cn-split-wrapper { width: 100%; position: relative; }
        .cn-split-bridge { position: absolute; top: 0; left: 25%; right: 25%; height: 2px; background-color: #3b82f6; z-index: 0; }
        .cn-split-cols { display: flex; justify-content: space-between; width: 100%; }
        .cn-col { display: flex; flex-direction: column; align-items: center; width: 50%; position: relative; padding-top: 30px; }
        
        /* Colors */
        .cn-box.blue { border-color: #3b82f6; color: #1e3a8a; }
        .cn-box.blue .cn-title { color: #1d4ed8; }
        .cn-box.red { border-color: #ef4444; color: #7f1d1d; }
        .cn-box.red .cn-title { color: #b91c1c; }
        .cn-box.green { border-color: #10b981; color: #064e3b; }
        .cn-box.green .cn-title { color: #047857; }
    </style>

    <div class="cn-container">
        <div class="cn-flow">
            
            <div style="background:#1e293b; color:#fff; padding:6px 20px; border-radius:50px; font-weight:bold; font-size:11px; margin-bottom: 5px;">
                START
            </div>
            <div class="cn-line-v cn-arrow-d" style="border-top-color: #94a3b8; height: 20px;"></div>

            <!-- 1. Form CCF -->
            <div class="cn-box" style="border-color:#f59e0b;">
                <span class="cn-title" style="color:#d97706;">1. Form CCF</span>
                Isi form komplain (Salesman)
            </div>
            <div class="cn-line-v cn-arrow-d" style="border-top-color: #94a3b8;"></div>
            
            <!-- 2. Approve CCF -->
            <div class="cn-box" style="border-color:#0ea5e9;">
                <span class="cn-title" style="color:#0284c7;">2. Review & Approve CCF</span>
                Persetujuan (Branch Manager)
            </div>
            <div class="cn-line-v cn-arrow-d" style="border-top-color: #94a3b8;"></div>
            
            <!-- 3. Input SO CN -->
            <div class="cn-box blue">
                <span class="cn-title">3. Input SO Credit Note</span>
                Ref: Normal Billing VA01 (Sales Admin)
            </div>
            <div class="cn-line-v cn-arrow-d" style="border-top-color: #3b82f6; background-color: #3b82f6;"></div>

            <!-- DECISION: Approve? -->
            <div class="cn-box cn-decision blue">
                Approve SO Credit Note?
            </div>
            <div class="cn-line-v" style="background-color: #3b82f6;"></div>

            <!-- SPLIT -->
            <div class="cn-split-wrapper">
                <div class="cn-split-bridge"></div>
                <div class="cn-split-cols">
                    
                    <!-- LEFT TRACK (YES) -->
                    <div class="cn-col">
                        <div style="position:absolute; top:0; left:50%; width:2px; height:30px; background:#10b981; margin-left:-1px;"></div>
                        <div style="background:#10b981; color:#fff; padding:2px 10px; border-radius:4px; font-size:10px; font-weight:bold; margin-bottom:5px; z-index:11; position:relative;">YES (Y)</div>
                        
                        <div class="cn-box green">
                            <span class="cn-title">4. Approve SO Credit Note</span>
                            Persetujuan final oleh Tim Controller
                        </div>
                        <div class="cn-line-v green cn-arrow-d" style="border-top-color: #10b981; background-color: #10b981;"></div>
                        
                        <div class="cn-box green">
                            <span class="cn-title">5. Create Return DO</span>
                            Tarik fisik barang retur (Logistik)
                        </div>
                        <div class="cn-line-v green cn-arrow-d" style="border-top-color: #10b981; background-color: #10b981;"></div>

                        <div class="cn-box green">
                            <span class="cn-title">6. Post Goods Receipt</span>
                            Terima barang di Gudang Retur (Admin Gudang)
                        </div>
                        <div class="cn-line-v green cn-arrow-d" style="border-top-color: #10b981; background-color: #10b981;"></div>

                        <div class="cn-box green">
                            <span class="cn-title">7. Create Invoice CN</span>
                            Cetak Credit Note (Sales Admin)
                        </div>
                        <div class="cn-line-v green cn-arrow-d" style="border-top-color: #10b981; background-color: #10b981;"></div>
                        
                        <div class="cn-box green">
                            <span class="cn-title">8. Input Nota Retur</span>
                            Nota Retur Pajak (Sales Admin)
                        </div>
                        <div class="cn-line-v green cn-arrow-d" style="border-top-color: #10b981; background-color: #10b981;"></div>

                        <!-- SUB-DECISION: Offset A/R -->
                        <div class="cn-box cn-decision green" style="width: 280px; margin: 0 auto;">
                            Offset with Outstanding A/R?
                        </div>
                        
                                                <!-- MINI SPLIT FOR OFFSET -->
                        <div class="cn-line-v" style="background-color: #10b981; height: 15px;"></div>
                        
                        <div class="cn-split-wrapper">
                            <div class="cn-split-bridge" style="background: linear-gradient(to right, #10b981 50%, #ef4444 50%); height: 2px;"></div>
                            <div class="cn-split-cols">
                                <!-- YES Track -->
                                <div class="cn-col" style="padding-top: 15px;">
                                    <div style="position:absolute; top:0; left:50%; width:2px; height:15px; background:#10b981; margin-left:-1px;">
                                        <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #10b981 transparent transparent transparent;"></div>
                                    </div>
                                    <div style="background:#10b981; color:#fff; padding:2px 8px; border-radius:4px; font-size:9px; font-weight:bold; margin-bottom:5px;">YES (Y)</div>
                                    <div class="cn-box green" style="width: 90%; padding: 8px;">1.5.3 Incoming Payment</div>
                                    <div class="cn-line-v" style="background-color: #10b981; height: 25px;"></div>
                                </div>
                                <!-- NO Track -->
                                <div class="cn-col" style="padding-top: 15px;">
                                    <div style="position:absolute; top:0; left:50%; width:2px; height:15px; background:#ef4444; margin-left:-1px;">
                                        <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #ef4444 transparent transparent transparent;"></div>
                                    </div>
                                    <div style="background:#ef4444; color:#fff; padding:2px 8px; border-radius:4px; font-size:9px; font-weight:bold; margin-bottom:5px;">NO (N)</div>
                                    <div class="cn-box red" style="width: 90%; padding: 8px;">1.4.5 Outgoing Payment</div>
                                    <div class="cn-line-v" style="background-color: #ef4444; height: 25px;"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Merge Bridge -->
                        <div style="position: relative; width: 100%; height: 20px;">
                            <div style="position: absolute; top: 0; left: 25%; right: 25%; height: 2px; background: linear-gradient(to right, #10b981 50%, #ef4444 50%);"></div>
                            <div style="position: absolute; top: 0; left: 50%; width: 2px; height: 15px; background: #94a3b8; margin-left: -1px;">
                                <div style="position: absolute; bottom: -5px; left: -4px; border-width: 5px 4px 0 4px; border-style: solid; border-color: #94a3b8 transparent transparent transparent;"></div>
                            </div>
                        </div>
                        
                        <div style="background:#1e293b; color:#fff; padding:6px 20px; border-radius:50px; font-weight:bold; font-size:11px; z-index: 10;">
                            END
                        </div>
                    </div>

                    <!-- RIGHT TRACK (NO) -->
                    <div class="cn-col">
                        <div style="position:absolute; top:0; left:50%; width:2px; height:30px; background:#ef4444; margin-left:-1px;"></div>
                        <div style="background:#ef4444; color:#fff; padding:2px 10px; border-radius:4px; font-size:10px; font-weight:bold; margin-bottom:5px; z-index:11; position:relative;">NO (N)</div>
                        
                        <div class="cn-box red">
                            <span class="cn-title">Reject SO Credit Note</span>
                            Pembatalan di sistem
                        </div>
                        <!-- Wait, if left track is long, right track needs a long line to align the END box?
                             Actually we can just let it end. -->
                        <div class="cn-line-v red cn-arrow-d" style="border-top-color: #ef4444; background-color: #ef4444; height: 120px;"></div>
                        
                        <div style="background:#1e293b; color:#fff; padding:6px 20px; border-radius:50px; font-weight:bold; font-size:11px; z-index: 10;">
                            END
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h3 class="font-bold mt-8 mb-4 text-md text-gray-800">Detail Keputusan Sistem</h3>
    <div class="space-y-4 text-sm text-gray-700 mb-8">
        <div class="flex items-start gap-3 p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="mt-0.5"><span class="flex items-center justify-center px-2 h-6 rounded-md bg-blue-100 text-blue-600 font-bold text-xs">CTRL</span></div>
            <div>
                <strong class="text-blue-800">Approval Tim Controller:</strong>
                <p class="mt-1 text-gray-600">Dokumen SO Credit Note wajib melalui persetujuan <strong>Tim Controller</strong> karena berdampak langsung pada koreksi pendapatan (<em>Revenue</em>). Tim Controller adalah pihak otoritas yang sama dengan yang mengelola <em>Approval Master Harga</em> dan <em>Promo</em>. Jika ditolak (N), dokumen dibatalkan sepenuhnya.</p>
            </div>
        </div>
        <div class="flex items-start gap-3 p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
            <div class="mt-0.5"><span class="flex items-center justify-center px-2 h-6 rounded-md bg-emerald-100 text-emerald-600 font-bold text-xs">A/R</span></div>
            <div>
                <strong class="text-emerald-800">Offset A/R vs Outgoing Payment:</strong>
                <p class="mt-1 text-gray-600">Pada tahap akhir, Finance menilai status piutang pelanggan (<em>Outstanding A/R</em>). Jika ada piutang, nilai Credit Note digunakan untuk memotong saldo piutang (<em>Incoming Payment Offset</em>). Jika pelanggan tidak memiliki hutang, perusahaan wajib mentransfer pengembalian dana tunai (<em>Outgoing Payment / Refund</em>).</p>
            </div>
        </div>
    </div>
</div>',
            'out_of_scope' => '<ul><li>Pengadaan barang (Procurement) dari supplier (Masuk ke Modul MM).</li><li>Penerimaan pembayaran piutang dari pelanggan (Masuk ke Modul FI - AR).</li></ul>',
                'status' => 'Draft',
                'author_id' => NULL,
                'approved_by' => NULL,
                'approved_at' => NULL,
                'created_at' => '2026-07-10 22:54:00',
                'updated_at' => '2026-07-21 04:54:57',
                'document_history' => NULL,
                'document_distribution' => NULL,
                'flowcharts' => NULL,
                'table_of_contents' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'project_id' => 1,
            'title' => '02. Blue Print - Modul MM (Materials Management)',
            'background' => '<p>Modul <strong>Materials Management (MM)</strong> memastikan ketersediaan pasokan barang dengan tingkat persediaan yang optimal. Modul ini merangkum keseluruhan proses rantai pasok (Supply Chain), mulai dari perencanaan kebutuhan material, pengadaan (Procurement), hingga manajemen pergudangan (Inventory & Warehouse Management).</p><p>Sistem ini juga dilengkapi ALM (Approval Level Matrix) untuk memastikan setiap proses pembelian ke vendor (PO) atau pergerakan barang yang tidak wajar (Adjustment/Write-off) telah mendapatkan otorisasi dari level manajemen yang sesuai.</p>',
                'scope' => '<div id="section-1" class="mb-12">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>1. ORGANIZATION STRUCTURE</span></h2>
        
        <div class="mb-8 mt-6">
            <h3 class="font-bold text-gray-800 text-lg mb-4">Branch (Plant) & Storage Location</h3>
            <p class="mb-4 text-sm text-gray-700">Dalam hierarki sistem, <strong>Branch (Plant)</strong> mewakili lokasi fisik atau logikal utama, sedangkan <strong>Storage Location</strong> adalah pemisahan ruang atau gudang di bawah Branch (Plant) tersebut. Berikut adalah struktur logistik berdasarkan pembagian kota operasional perusahaan.</p>
            
            
        <div class=\'bg-slate-50 border border-slate-200 rounded-lg p-6 mb-6 overflow-x-auto flex justify-center\'>
            <div style=\'position:relative; width:800px; height:560px; font-family:sans-serif; font-size:12px; margin:0 auto;\'><div style=\'position:absolute; left:350px; top:20px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-weight:bold;\'>Company Code</div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>10</div></div><div style=\'position:absolute; left:400px; top:70px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:100px; top:90px; width:600px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(0deg); z-index:1;\'></div><div style=\'position:absolute; left:50px; top:120px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-weight:bold;\'>HO</div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>D311</div></div><div style=\'position:absolute; left:100px; top:90px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:170px; top:120px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-weight:bold;\'>Jakarta 1</div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>D312</div></div><div style=\'position:absolute; left:220px; top:90px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:290px; top:120px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-weight:bold;\'>Jakarta 2</div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>D313</div></div><div style=\'position:absolute; left:340px; top:90px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:410px; top:120px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-weight:bold;\'>Tangerang</div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>D351</div></div><div style=\'position:absolute; left:460px; top:90px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:530px; top:120px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-weight:bold;\'>Bekasi</div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>D321</div></div><div style=\'position:absolute; left:580px; top:90px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:650px; top:120px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-weight:bold;\'>Semarang</div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>D331</div></div><div style=\'position:absolute; left:700px; top:90px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:220px; top:170px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:170px; top:200px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Trading 1</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR01</div></div><div style=\'position:absolute; left:220px; top:250px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:170px; top:270px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Trading 2</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR02</div></div><div style=\'position:absolute; left:220px; top:320px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:170px; top:340px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Non Trading</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>NT01</div></div><div style=\'position:absolute; left:220px; top:390px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:170px; top:410px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Transit</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR88</div></div><div style=\'position:absolute; left:220px; top:460px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:170px; top:480px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Virtual S.loc</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR99</div></div><div style=\'position:absolute; left:340px; top:170px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:290px; top:200px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Trading</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR01</div></div><div style=\'position:absolute; left:340px; top:250px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:290px; top:270px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Non Trading</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>NT01</div></div><div style=\'position:absolute; left:340px; top:320px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:290px; top:340px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Transit</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR88</div></div><div style=\'position:absolute; left:460px; top:170px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:410px; top:200px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Trading</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR01</div></div><div style=\'position:absolute; left:460px; top:250px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:410px; top:270px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Non Trading</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>NT01</div></div><div style=\'position:absolute; left:460px; top:320px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:410px; top:340px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Transit</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR88</div></div><div style=\'position:absolute; left:580px; top:170px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:530px; top:200px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Trading</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR01</div></div><div style=\'position:absolute; left:580px; top:250px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:530px; top:270px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Non Trading</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>NT01</div></div><div style=\'position:absolute; left:580px; top:320px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:530px; top:340px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Transit</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR88</div></div><div style=\'position:absolute; left:700px; top:170px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:650px; top:200px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Trading</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR01</div></div><div style=\'position:absolute; left:700px; top:250px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:650px; top:270px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Non Trading</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>NT01</div></div><div style=\'position:absolute; left:700px; top:320px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;\'></div><div style=\'position:absolute; left:650px; top:340px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;\'><div style=\'font-size:11px; color:#0c4a6e; margin-bottom:2px;\'>Sloc Transit</div><div style=\'font-weight:bold;\'></div><div style=\'font-weight:bold; font-size:12px; color:#0c4a6e; margin-top:2px;\'>TR88</div></div></div></div>

        
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                    <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Konvensi Penamaan</h4>
                    <p class="font-mono font-bold text-blue-700 mb-2">XXXX</p>
                    <ul class="list-disc pl-4 text-sm text-gray-600 mb-3 space-y-1">
                        <li><strong>D:</strong> Distribusi</li>
                        <li><strong>XX:</strong> Kode Provinsi (BPS)</li>
                        <li><strong>X:</strong> Nomor Urut</li>
                    <li class="mt-1"><a href="#section-11" class="text-blue-600 hover:text-blue-800 hover:underline">11. GOODS RECEIVED FROM PURCHASE ORDER</a></li><li class="mt-1"><a href="#section-12" class="text-blue-600 hover:text-blue-800 hover:underline">12. RETURN DELIVERY PO</a></li><li class="mt-1"><a href="#section-13" class="text-blue-600 hover:text-blue-800 hover:underline">13. STOCK TRANSFER BETWEEN STORAGE LOCATION</a></li></ul>
                    <p class="text-sm font-semibold text-gray-700 mb-1">Contoh:</p>
                    <ul class="list-none text-sm text-gray-600 space-y-1 font-mono">
                        <li>D311 : Cabang Pusat (HO)</li>
                        <li>D312 : Cabang Jakarta</li>
                        <li>D321 : Cabang Bekasi</li>
                        <li>D332 : Cabang Solo</li>
                    </ul>
                </div>
                
                <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                    <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Pertimbangan Desain</h4>
                    <ul class="list-disc pl-4 text-sm text-gray-600 space-y-2">
                        <li>Mewakili lokasi fisik untuk proses produksi, distribusi, dan perkantoran, sekaligus berfungsi sebagai titik penyamaan penilaian material (valuation) dan proses pengadaan.</li>
                        <li>Sebagai batas pertimbangan otorisasi hak akses pengguna di dalam sistem.</li>
                    </ul>
                </div>
                
                <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                    <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Ringkasan Implikasi Proses</h4>
                    <p class="text-sm text-gray-600 mb-2">Setiap cabang (Branch (Plant)) diizinkan mengelola prosesnya masing-masing secara mandiri (meliputi proses produksi, penilaian stok material, dan eksekusi pengadaan).</p>
                    <p class="text-sm text-gray-600 mb-2">Transaksi pemindahan stok antar Branch (Plant) yang berbeda sangat diperbolehkan.</p>
                    <p class="text-sm text-gray-600">Pemeliharaan (maintenance) data master material wajib dilakukan di tingkat Branch (Plant).</p>
                </div>
            </div>
        
            <div class="mt-8 mb-6">
                <h4 class="font-bold text-gray-800 text-md mb-3">Referensi Kode BPS Provinsi</h4>
                <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <table class="w-full text-sm border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 px-3 py-2 text-left text-gray-700">Provinsi</th>
                                    <th class="border border-gray-300 px-3 py-2 text-center text-gray-700">Kode BPS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Aceh</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">11</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Sumatra Utara</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">12</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Sumatra Barat</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">13</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Riau</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">14</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Jambi</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">15</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Sumatra Selatan</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">16</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Bengkulu</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">17</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Lampung</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">18</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Kepulauan Bangka Belitung</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">19</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Kepulauan Riau</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">21</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Jakarta</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">31</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Jawa Barat</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">32</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Jawa Tengah</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">33</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Yogyakarta</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">34</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Jawa Timur</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">35</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Banten</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">36</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Bali</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">51</td></tr>
                            </tbody>
                        </table>

                        <table class="w-full text-sm border-collapse border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border border-gray-300 px-3 py-2 text-left text-gray-700">Provinsi</th>
                                    <th class="border border-gray-300 px-3 py-2 text-center text-gray-700">Kode BPS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td class="border border-gray-300 px-3 py-1.5">NTB</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">52</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">NTT</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">53</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Kalimantan Barat</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">61</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Kalimantan Tengah</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">62</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Kalimantan Selatan</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">63</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Kalimantan Timur</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">64</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Sulawesi Utara</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">71</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Sulawesi Tengah</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">72</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Sulawesi Selatan</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">73</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Gorontalo</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">75</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Sulawesi Barat</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">76</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Maluku</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">81</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Maluku Utara</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">82</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Papua Barat</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700 bg-gray-50">91</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5">Papua</td><td class="border border-gray-300 px-3 py-1.5 text-center font-mono text-blue-700">94</td></tr>
                                <tr><td class="border border-gray-300 px-3 py-1.5 bg-gray-50">Kalimantan Utara</td><td class="border border-gray-300 px-3 py-1.5 text-center text-gray-500 bg-gray-50 italic">Tidak ada</td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 text-xs text-gray-500 font-medium">Source: http://id.wikipedia.org/wiki/Daftar_provinsi_di_Indonesia</div>
                </div>
            </div>
        </div>

        
            <div class="mb-8">
                <h3 class="font-bold text-gray-800 text-lg mb-4 mt-8 border-t pt-8">Konvensi Penamaan Storage Location</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                    <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Konvensi Penamaan</h4>
                        <p class="font-mono font-bold text-blue-700 mb-2">ABXX</p>
                        <p class="text-sm text-gray-700 mb-1"><strong>Digit ke-1 & 2</strong> = Inisial Storage Location:</p>
                        <ul class="list-none text-sm text-gray-600 mb-3 space-y-1 font-mono pl-4">
                            <li><span class="text-blue-600 font-bold">TR</span> : Trading</li>
                            <li><span class="text-blue-600 font-bold">NT</span> : Non Trading</li>
                            
                            <li><span class="text-blue-600 font-bold">RT</span> : Return</li>
                            
                        </ul>
                        <p class="text-sm text-gray-700"><strong>Digit ke-3 & 4</strong> = Nomor Urut</p>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Pertimbangan Desain</h4>
                        <ul class="list-disc pl-4 text-sm text-gray-600 space-y-2">
                            <li>Storage Location adalah unit organisasi yang memungkinkan pemisahan/pembedaan stok material secara logikal maupun fisik di dalam satu Cabang (Branch (Plant)) yang sama.</li>
                            <li>Manajemen Inventori yang berbasis kuantitas sepenuhnya dilakukan dan dikontrol pada tingkat Storage Location ini.</li>
                        </ul>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Ringkasan Implikasi Proses</h4>
                        <ul class="list-disc pl-4 text-sm text-gray-600 space-y-2">
                            <li>Setiap Storage Location secara hierarki selalu ditetapkan (di-assign) di bawah kendali spesifik sebuah Cabang (Branch (Plant)).</li>
                            <li>Kuantitas jumlah inventori dapat dilacak secara terperinci hingga ke tingkat Storage Location.</li>
                            <li>Pemisahan Storage Location ini sangat dapat diandalkan untuk berbagai tujuan pelaporan stok (Reporting).</li>
                        </ul>
                    </div>
                </div>
            </div>

        
            <div class="mt-8 mb-8">
                <h4 class="font-bold text-gray-800 text-md mb-3">Daftar Storage Location (Sloc) Aktif</h4>
                <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                    <table class="w-full text-sm border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2 text-left text-gray-700 w-1/4">Sloc</th>
                                <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td class="border border-gray-300 px-4 py-2 font-mono text-blue-700 font-bold">TR01</td><td class="border border-gray-300 px-4 py-2">Gudang Trading 1</td></tr>
                            <tr class="bg-gray-50"><td class="border border-gray-300 px-4 py-2 font-mono text-blue-700 font-bold">TR02</td><td class="border border-gray-300 px-4 py-2">Gudang Trading 2</td></tr>
                            <tr><td class="border border-gray-300 px-4 py-2 font-mono text-blue-700 font-bold">TR88</td><td class="border border-gray-300 px-4 py-2">Gudang Transit</td></tr>
                            <tr class="bg-gray-50"><td class="border border-gray-300 px-4 py-2 font-mono text-blue-700 font-bold">TR99</td><td class="border border-gray-300 px-4 py-2">Gudang Virtual</td></tr>
                            <tr><td class="border border-gray-300 px-4 py-2 font-mono text-blue-700 font-bold">NT01</td><td class="border border-gray-300 px-4 py-2">Gudang Non Trading</td></tr>
                            <tr class="bg-gray-50"><td class="border border-gray-300 px-4 py-2 font-mono text-blue-700 font-bold">RT01</td><td class="border border-gray-300 px-4 py-2">Gudang Return</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

                
                        <div class="mb-8 mt-8 border-t pt-8">
                <h3 class="font-bold text-gray-800 text-lg mb-4">Organization Structure : Purchasing</h3>
                <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 mb-6 overflow-hidden flex justify-center">
                    <div style="position:relative; width:500px; height:180px; font-family:sans-serif; font-size:12px;">
                        <div style="position:absolute; left:170px; top:10px; width:160px; height:50px; background:#eff6ff; border:2px solid #3b82f6; border-radius:6px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center;">
                            <div style="font-weight:bold; color:#1e3a8a;">Centralized Purc.Org.</div>
                            <div style="font-weight:bold; font-size:14px; color:#2563eb; margin-top:2px;">DCHO</div>
                        </div>
                        
                        <div style="position:absolute; left:249px; top:60px; width:2px; height:20px; background:#94a3b8; z-index:1;"></div>
                        <div style="position:absolute; left:140px; top:80px; width:220px; height:2px; background:#94a3b8; z-index:1;"></div>
                        
                        <div style="position:absolute; left:140px; top:80px; width:2px; height:20px; background:#94a3b8; z-index:1;"></div>
                        <div style="position:absolute; left:136px; top:100px; width:0; height:0; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #94a3b8; z-index:2;"></div>
                        
                        <div style="position:absolute; left:358px; top:80px; width:2px; height:20px; background:#94a3b8; z-index:1;"></div>
                        <div style="position:absolute; left:354px; top:100px; width:0; height:0; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #94a3b8; z-index:2;"></div>
                        
                        <div style="position:absolute; left:50px; top:106px; width:180px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center;">
                            <div style="font-weight:bold; color:#14532d;">Purch. Group</div>
                            <div style="font-weight:bold; font-size:14px; color:#16a34a; margin-top:2px;">D01 (Trade)</div>
                        </div>
                        
                        <div style="position:absolute; left:270px; top:106px; width:180px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center;">
                            <div style="font-weight:bold; color:#14532d;">Purch. Group</div>
                            <div style="font-weight:bold; font-size:14px; color:#16a34a; margin-top:2px;">D02 (Non Trade)</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-8 mt-8 border-t pt-8">
                <h3 class="font-bold text-gray-800 text-lg mb-4">Purchasing Organization</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 mb-8">
                    <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Konvensi Penamaan</h4>
                        <p class="font-mono font-bold text-blue-700 mb-2">A BBB</p>
                        <ul class="list-disc pl-4 text-sm text-gray-600 mb-3 space-y-1">
                            <li><strong>Digit ke-1</strong> = Mewakili jenis bisnis (Contoh: "D" untuk Distribusi)</li>
                            <li><strong>Digit ke-2 - 4</strong> = Inisial Perusahaan (CHO)</li>
                        </ul>
                        <p class="text-sm font-semibold text-gray-700 mb-1">Contoh:</p>
                        <p class="text-sm text-gray-600 font-mono pl-4"><strong>DCHO</strong> = Centralized Purch. Org (Distribusi)</p>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Pertimbangan Desain</h4>
                        <ul class="list-disc pl-4 text-sm text-gray-600 space-y-2">
                            <li>Purchasing Organization adalah tingkat organisasi yang menegosiasikan persyaratan dan kondisi pembelian dengan vendor untuk satu atau beberapa Cabang (Branch (Plant)).</li>
                            <li>Unit ini secara hukum (legally) bertanggung jawab penuh untuk menyelesaikan seluruh kontrak pembelian perusahaan.</li>
                        </ul>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Ringkasan Implikasi Proses</h4>
                        <ul class="list-disc pl-4 text-sm text-gray-600 space-y-2">
                            <li>Semua transaksi Pengadaan (Procurement) akan dieksekusi pada tingkat Purchasing Organization dan tingkat Cabang (Branch (Plant)).</li>
                            <li>Data Master Vendor dan Evaluasi Vendor wajib dikelola pada tingkat Purchasing Organization.</li>
                            <li>Data Harga Beli dapat dikelola dan dipelihara di tingkat organisasi ini maupun di tingkat Cabang (Branch (Plant)).</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="mb-8 mt-8 border-t pt-8">
                <h3 class="font-bold text-gray-800 text-lg mb-4">Purchasing Group</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 mb-8">
                    <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Konvensi Penamaan</h4>
                        <p class="font-mono font-bold text-blue-700 mb-2">DXX</p>
                        <ul class="list-disc pl-4 text-sm text-gray-600 mb-3 space-y-1">
                            <li><strong>Digit ke-1</strong> = Mewakili jenis bisnis (Contoh: "D" untuk Distribusi)</li>
                            <li><strong>Digit ke-2 - 3</strong> = Nomor Urut (Running Number Sequence)</li>
                        </ul>
                        <p class="text-sm font-semibold text-gray-700 mb-1">Contoh:</p>
                        <ul class="list-none text-sm text-gray-600 space-y-1 font-mono pl-4">
                            <li><strong>D01</strong> : Trading</li>
                            <li><strong>D02</strong> : Non Trading</li>
                        </ul>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Pertimbangan Desain</h4>
                        <ul class="list-disc pl-4 text-sm text-gray-600 space-y-2">
                            <li>Purchasing Group adalah pengelompokkan kunci untuk seorang pembeli (buyer) atau sekelompok pembeli yang bertanggung jawab atas kegiatan pembelian tertentu.</li>
                        </ul>
                    </div>
                    
                    <div class="bg-white border border-gray-200 rounded p-4 shadow-sm">
                        <h4 class="font-bold text-gray-800 text-md border-b pb-2 mb-3">Ringkasan Implikasi Proses</h4>
                        <ul class="list-disc pl-4 text-sm text-gray-600 space-y-2">
                            <li>Purchasing Group dapat digunakan untuk pengelompokan dalam pelaporan (reporting).</li>
                            <li>Selain itu, Purchasing Group juga dapat digunakan untuk tujuan otorisasi hak akses pengguna (authorization).</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

<div id="section-2" class="mb-12">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>2. MASTER DATA</span></h2>
        
        <div class="mt-6 mb-8">
            <h3 class="font-bold text-gray-800 text-lg mb-4">Material Master</h3>
            <table class="w-full text-sm border-collapse border border-gray-300 mb-8">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-left" rowspan="2">Material Type</th>
                        <th class="border border-gray-300 px-4 py-2 text-left" rowspan="2">Description</th>
                        <th class="border border-gray-300 px-4 py-2 text-center" rowspan="2">Stock</th>
                        <th class="border border-gray-300 px-4 py-2 text-center" rowspan="2">Value</th>
                        <th class="border border-gray-300 px-4 py-2 text-center" colspan="2">Number Range</th>
                        <th class="border border-gray-300 px-4 py-2 text-left" rowspan="2">Remarks</th>
                    </tr>
                    <tr>
                        <th class="border border-gray-300 px-4 py-1 text-center text-xs bg-gray-50">From</th>
                        <th class="border border-gray-300 px-4 py-1 text-center text-xs bg-gray-50">To</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 font-bold font-mono text-blue-700">TRAD</td>
                        <td class="border border-gray-300 px-4 py-2">Trade Goods (Epoxy, PU, UV Coating)</td>
                        <td class="border border-gray-300 px-4 py-2 text-center text-green-600 font-bold">&check;</td>
                        <td class="border border-gray-300 px-4 py-2 text-center text-green-600 font-bold">&check;</td>
                        <td class="border border-gray-300 px-4 py-2 text-center font-mono">850000</td>
                        <td class="border border-gray-300 px-4 py-2 text-center font-mono">859999</td>
                        <td class="border border-gray-300 px-4 py-2">Barang Dagangan (Dijual Kembali)</td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2 font-bold font-mono text-blue-700">NTRD</td>
                        <td class="border border-gray-300 px-4 py-2">Non Trade Goods (Packaging, Promo, Consumables)</td>
                        <td class="border border-gray-300 px-4 py-2 text-center text-green-600 font-bold">&check;</td>
                        <td class="border border-gray-300 px-4 py-2 text-center text-green-600 font-bold">&check;</td>
                        <td class="border border-gray-300 px-4 py-2 text-center font-mono">910000</td>
                        <td class="border border-gray-300 px-4 py-2 text-center font-mono">919999</td>
                        <td class="border border-gray-300 px-4 py-2">Pemakaian Internal / Purchasing Consumable</td>
                    </tr>
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 font-bold font-mono text-blue-700">SERV</td>
                        <td class="border border-gray-300 px-4 py-2">Services (Jasa Angkut, Service Kendaraan)</td>
                        <td class="border border-gray-300 px-4 py-2 text-center text-gray-400 font-bold">-</td>
                        <td class="border border-gray-300 px-4 py-2 text-center text-gray-400 font-bold">-</td>
                        <td class="border border-gray-300 px-4 py-2 text-center font-mono text-gray-800">750000</td>
                        <td class="border border-gray-300 px-4 py-2 text-center font-mono text-gray-800">759999</td>
                        <td class="border border-gray-300 px-4 py-2">Tanpa Manajemen Fisik Inventori</td>
                    </tr>
                </tbody>
            </table>

            <h3 class="font-bold text-gray-800 text-lg mb-4">Material Group</h3>
            <div class="bg-white border border-gray-200 rounded p-4 shadow-sm text-sm text-gray-700">
                <p class="mb-2">Material Group digunakan untuk mengelompokkan material yang memiliki karakteristik serupa. Berikut adalah pemetaan kodenya:</p>
                <ul class="list-disc pl-5 mt-2 space-y-1 columns-1 md:columns-2">
                    <li><strong class="font-mono text-blue-700">EP01</strong> - Epoxy Coating 300 s/d 500 micron</li>
                    <li><strong class="font-mono text-blue-700">EP02</strong> - Epoxy Floor Coating 1000 s/d 3000 micron</li>
                    <li><strong class="font-mono text-blue-700">EP03</strong> - Epoxy Mortar 3 s/d 5 mm</li>
                    <li><strong class="font-mono text-blue-700">EP04</strong> - Epoxy Injection</li>
                    <li><strong class="font-mono text-indigo-700">PU01</strong> - Polyurethane Coating</li>
                    <li><strong class="font-mono text-indigo-700">PU02</strong> - PU Crete 3000 s/d 9000 micron</li>
                    <li><strong class="font-mono text-indigo-700">PU03</strong> - PU Waterproofing dan Fiber Mesh</li>
                    <li><strong class="font-mono text-purple-700">UV01</strong> - UV Floor Coating</li>
                    <li><strong class="font-mono text-gray-600">NTRD</strong> - Consumables / ATK / Tools</li>
                    <li><strong class="font-mono text-gray-600">SERV</strong> - Jasa Service / Aplikasi Floor</li>
                </ul>
            </div>
        </div>
    </div>

<div id="section-3" class="mb-12">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>3. PROCURE TO PAY</span></h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 mt-6">
            <div class="bg-white border border-teal-200 rounded p-5 shadow-sm border-t-4 border-t-teal-500">
                <h4 class="font-bold text-teal-800 mb-3 text-lg border-b border-teal-100 pb-2">Procure to Pay Non Trade</h4>
                <ul class="list-disc pl-5 text-sm space-y-4 text-gray-700">
                    <li><strong class="text-teal-900">Procurement of Consumable:</strong><br><span class="text-gray-600 mt-1 block">Pengadaan barang-barang ATK atau barang habis pakai (<em>consumables</em>) untuk keperluan operasional perusahaan tanpa pencatatan inventori fisik yang mendetail.</span></li>
                    <li><strong class="text-teal-900">Procurement of Asset:</strong><br><span class="text-gray-600 mt-1 block">Pengadaan aset tetap (<em>fixed asset</em>) berupa barang modal perusahaan seperti laptop, kendaraan, atau mesin yang nilainya akan disusutkan.</span></li>
                    <li><strong class="text-teal-900">Procurement of Service:</strong><br><span class="text-gray-600 mt-1 block">Pengadaan jasa pihak ketiga, seperti jasa perawatan, perbaikan, instalasi, atau konsultan tanpa adanya pergerakan barang fisik.</span></li>
                </ul>
            </div>
            
            <div class="bg-white border border-blue-200 rounded p-5 shadow-sm border-t-4 border-t-blue-500">
                <h4 class="font-bold text-blue-800 mb-3 text-lg border-b border-blue-100 pb-2">Procure to Pay Trade</h4>
                <ul class="list-disc pl-5 text-sm space-y-4 text-gray-700">
                    <li><strong class="text-blue-900">Harga Beli:</strong><br><span class="text-gray-600 mt-1 block">Pemeliharaan (<em>maintenance</em>) harga beli barang dagangan berdasarkan kesepakatan atau kontrak dengan pemasok (<em>vendor</em>).</span></li>
                    <li><strong class="text-blue-900">Procurement of Trading Goods:</strong><br><span class="text-gray-600 mt-1 block">Pengadaan barang dagangan utama yang akan dijual kembali (<em>trading goods</em>) untuk memastikan ketersediaan stok di gudang.</span></li>
                    <li><strong class="text-blue-900">Goods Receipt from Purchase Order (PO):</strong><br><span class="text-gray-600 mt-1 block">Penerimaan fisik barang dagangan di lokasi gudang yang diakui dan dicocokkan dengan dokumen pemesanan (<em>Purchase Order</em>).</span></li>
                    <li><strong class="text-blue-900">Return Delivery PO:</strong><br><span class="text-gray-600 mt-1 block">Pengembalian barang dagangan ke pemasok (<em>vendor return</em>) yang biasanya terjadi akibat cacat kualitas, kerusakan, atau ketidaksesuaian dengan pesanan.</span></li>
                </ul>
            </div>
        </div>
        
            </div>

<div id="section-4" class="mb-12">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>4. INVENTORY MANAGEMENT</span></h2>
        
        <div class="mt-6 mb-8">
            <div class="bg-white border border-gray-200 rounded p-6 shadow-sm">
                <ul class="list-disc pl-5 text-sm space-y-4 text-gray-700">
                    <li><strong>Goods Receipt Others</strong>
                        <p class="text-gray-600 mt-1 mb-2">Penerimaan fisik barang di luar proses pengadaan standar:</p>
                        <ul class="list-circle pl-5 space-y-2 text-gray-600" style="list-style-type: circle;">
                            <li><span class="font-semibold text-gray-700">Goods Receipt Sample:</span> Penerimaan barang contoh atau sampel secara cuma-cuma untuk keperluan pengujian teknis, kontrol kualitas, maupun pemasaran.</li>
                        </ul>
                    </li>
                    <li><strong>Goods Issue Others</strong>
                        <p class="text-gray-600 mt-1 mb-2">Pengeluaran barang dari sistem inventori di luar proses penjualan normal:</p>
                        <ul class="list-circle pl-5 space-y-2 text-gray-600" style="list-style-type: circle;">
                            <li><span class="font-semibold text-gray-700">Goods issue for Scrap:</span> Pemusnahan dan pengeluaran barang yang sudah rusak atau kadaluwarsa. Nilai persediaan ini otomatis dihapus dari aset dan dicatat sebagai beban (<em>expense</em>).</li>
                        </ul>
                    </li>
                    <li><strong>Stock Transfer</strong>
                        <p class="text-gray-600 mt-1 mb-2">Pergerakan atau perpindahan lokasi fisik barang yang ada di dalam internal perusahaan:</p>
                        <ul class="list-circle pl-5 space-y-2 text-gray-600" style="list-style-type: circle;">
                            <li><span class="font-semibold text-gray-700">Stock Transfer between Storage Location:</span> Proses pemindahan fisik barang antar lokasi penyimpanan (gudang/Sloc) yang berbeda, namun masih berada di dalam area cabang (Branch (Plant)) yang sama.</li>
                        </ul>
                    </li>
                    <li><strong>Transfer Posting</strong>
                        <p class="text-gray-600 mt-1 mb-2">Perubahan secara logikal mengenai status pengelompokan barang di dalam sistem tanpa harus berpindah lokasi fisik:</p>
                        <ul class="list-circle pl-5 space-y-2 text-gray-600" style="list-style-type: circle;">
                            <li><span class="font-semibold text-gray-700">Transfer Posting for Status Changes (block) ke (good) atau sebaliknya:</span> Mengubah status ketersediaan barang. Contohnya adalah melepaskan barang dari status tertahan (<em>Blocked</em>) menjadi stok yang siap jual (<em>Good/Unrestricted</em>) setelah lolos inspeksi, atau sebaliknya dari stok bagus menjadi ditahan karena ditemukan kerusakan fisik.</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<div id="section-5" class="mb-12">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>5. MAINTAIN HARGA BELI</span></h2>
        
        <div class="mt-8 mb-4 border-t pt-8">
            <h3 class="font-bold text-gray-800 text-lg mb-4">Maintain Harga Beli</h3>
            <div class="bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto flex justify-center shadow-sm">
                <div style="position:relative; width:800px; height:400px; font-family:sans-serif; font-size:12px; margin:0 auto;">
                    
                    <div style="position:absolute; left:20px; top:50px; width:760px; height:320px; border:2px solid #cbd5e1; border-radius:8px; background:#f8fafc; z-index:0;"></div>
                    <div style="position:absolute; left:20px; top:50px; width:40px; height:320px; border-right:2px solid #cbd5e1; background:#f1f5f9; border-top-left-radius:6px; border-bottom-left-radius:6px; display:flex; justify-content:center; align-items:center; z-index:1;">
                        <span style="transform: rotate(-90deg); white-space:nowrap; font-weight:bold; color:#475569; letter-spacing:1px;">Business Process</span>
                    </div>
                    
                    <div style="position:absolute; left:90px; top:160px; width:80px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; font-size:12px; color:#475569;">
                        Start
                    </div>
                    
                    <div style="position:absolute; left:170px; top:180px; width:50px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:215px; top:175px; width:0; height:0; border-top:6px solid transparent; border-bottom:6px solid transparent; border-left:6px solid #64748b; z-index:2;"></div>
                    
                    <div style="position:absolute; left:220px; top:140px; width:130px; height:80px; background:#fff; border:2px solid #3b82f6; border-radius:6px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                        <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:10px; font-weight:bold; color:#1e3a8a; padding:4px; text-align:center;">Commercial</div>
                        <div style="flex:1; display:flex; justify-content:center; align-items:center; padding:8px; text-align:center; font-size:12px; font-weight:bold; color:#1e40af;">
                            Need to update purchase price
                        </div>
                    </div>
                    
                    <div style="position:absolute; left:350px; top:180px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:385px; top:175px; width:0; height:0; border-top:6px solid transparent; border-bottom:6px solid transparent; border-left:6px solid #64748b; z-index:2;"></div>
                    
                    <div style="position:absolute; left:390px; top:140px; width:100px; height:80px; z-index:10; display:flex; justify-content:center; align-items:center;">
                        <div style="position:absolute; width:70px; height:70px; background:#fff; border:2px solid #eab308; transform: rotate(45deg); box-shadow: 0 4px 6px rgba(0,0,0,0.05);"></div>
                        <div style="position:relative; z-index:11; font-size:11px; font-weight:bold; text-align:center; color:#854d0e; padding:4px; line-height:1.2;">Existing<br>master<br>data?</div>
                    </div>
                    
                    <div style="position:absolute; left:490px; top:180px; width:50px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:535px; top:175px; width:0; height:0; border-top:6px solid transparent; border-bottom:6px solid transparent; border-left:6px solid #64748b; z-index:2;"></div>
                    <div style="position:absolute; left:510px; top:162px; font-size:12px; font-weight:bold; color:#64748b;">Y</div>
                    
                    <div style="position:absolute; left:540px; top:140px; width:130px; height:80px; background:#fff; border:2px solid #3b82f6; border-radius:6px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                        <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:10px; font-weight:bold; color:#1e3a8a; padding:4px; text-align:center;">Commercial</div>
                        <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; padding:4px; text-align:center; font-size:11px; font-weight:bold; color:#1e40af; position:relative;">
                            <span>Change Harga Beli</span>
                            
                        </div>
                    </div>
                    
                    <div style="position:absolute; left:440px; top:220px; width:2px; height:50px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:435px; top:265px; width:0; height:0; border-left:6px solid transparent; border-right:6px solid transparent; border-top:6px solid #64748b; z-index:2;"></div>
                    <div style="position:absolute; left:448px; top:235px; font-size:12px; font-weight:bold; color:#64748b;">N</div>
                    
                    <div style="position:absolute; left:375px; top:270px; width:130px; height:80px; background:#fff; border:2px solid #3b82f6; border-radius:6px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                        <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:10px; font-weight:bold; color:#1e3a8a; padding:4px; text-align:center;">Commercial</div>
                        <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; padding:4px; text-align:center; font-size:11px; font-weight:bold; color:#1e40af; position:relative;">
                            <span>Create Harga Beli</span>
                            
                        </div>
                    </div>
                    
                    <div style="position:absolute; left:670px; top:180px; width:50px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:715px; top:175px; width:0; height:0; border-top:6px solid transparent; border-bottom:6px solid transparent; border-left:6px solid #64748b; z-index:2;"></div>
                    
                    <div style="position:absolute; left:720px; top:160px; width:60px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; font-size:12px; color:#475569;">
                        End
                    </div>
                    
                    <div style="position:absolute; left:505px; top:310px; width:185px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:690px; top:180px; width:2px; height:132px; background:#64748b; z-index:1;"></div>
                </div>
            </div>
        </div>
    </div>




<div id="section-6" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>6. PROCUREMENT OF CONSUMABLE</span></h2>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.3.1. Procurement of Consumable (Non Trade)</h3>
        <div class="bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto flex justify-center shadow-sm">
            <div style="position:relative; width:950px; height:650px; font-family:sans-serif; font-size:11px; margin:0 auto;">
                
                <div style="position:absolute; left:20px; top:20px; width:910px; height:610px; border:2px solid #cbd5e1; border-radius:8px; background:#f8fafc; z-index:0;"></div>
                <div style="position:absolute; left:20px; top:20px; width:30px; height:610px; border-right:2px solid #cbd5e1; background:#f1f5f9; border-top-left-radius:6px; border-bottom-left-radius:6px; display:flex; justify-content:center; align-items:center; z-index:1;">
                    <span style="transform: rotate(-90deg); white-space:nowrap; font-weight:bold; color:#475569; letter-spacing:1px; font-size:12px;">Business Process</span>
                </div>
                
                <!-- 1. Start -->
                <div style="position:absolute; left:60px; top:195px; width:50px; height:30px; background:#fff; border:2px solid #94a3b8; border-radius:15px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    Start
                </div>
                <!-- Line 1 to 2 -->
                <div style="position:absolute; left:110px; top:210px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:135px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 2. Create PR -->
                <div style="position:absolute; left:140px; top:180px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Requestor</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; padding:2px;">
                        <span>Create PR</span>
                    </div>
                </div>
                <!-- Line 2 to 3 -->
                <div style="position:absolute; left:230px; top:210px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:255px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 3. Approve PR -->
                <div style="position:absolute; left:260px; top:180px; width:110px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Approver</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; padding:2px;">
                        <span>Approve PR</span>
                    </div>
                </div>
                <!-- Line 3 to 4 -->
                <div style="position:absolute; left:370px; top:210px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:395px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 4. Approve? (Diamond) -->
                <div style="position:absolute; left:400px; top:185px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">Approve?</div>
                </div>
                
                <!-- Line 4 N to 5 -->
                <div style="position:absolute; left:425px; top:235px; width:2px; height:35px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:422px; top:265px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:430px; top:245px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 5. Change PR -->
                <div style="position:absolute; left:380px; top:270px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Requestor</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Change PR</span>
                    </div>
                </div>
                <!-- Line 5 back to 2 -->
                <div style="position:absolute; left:185px; top:240px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:185px; top:295px; width:195px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:182px; top:240px; border-left:4px solid transparent; border-right:4px solid transparent; border-bottom:5px solid #64748b; z-index:2;"></div>
                
                <!-- Line 4 Y to 6 -->
                <div style="position:absolute; left:450px; top:210px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:485px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:465px; top:195px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 6. Repeat Order? -->
                <div style="position:absolute; left:490px; top:180px; width:60px; height:60px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:42px; height:42px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e; text-align:center; line-height:1.1;">Repeat<br>Order?</div>
                </div>
                
                <!-- Line 6 N to 7 -->
                <div style="position:absolute; left:520px; top:80px; width:2px; height:100px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:520px; top:80px; width:70px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:585px; top:77px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:525px; top:130px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 7. Create RFQ -->
                <div style="position:absolute; left:590px; top:55px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Create RFQ</span>
                    </div>
                </div>
                
                <!-- 7 down to Vendor -->
                <div style="position:absolute; left:635px; top:105px; width:2px; height:75px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:632px; top:177px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:605px; top:135px; width:60px; height:30px; background:#fff; border:1px solid #94a3b8; z-index:5; font-size:8px; text-align:center; padding-top:8px;">RFQ Form</div>
                
                <!-- Vendor Box -->
                <div style="position:absolute; left:600px; top:180px; width:70px; height:30px; background:#f1f5f9; border:1px dashed #64748b; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    Vendor
                </div>
                
                <!-- Vendor up to 8 -->
                <div style="position:absolute; left:670px; top:185px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:690px; top:80px; width:2px; height:105px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:690px; top:80px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:707px; top:77px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 8. Maintain Quotation -->
                <div style="position:absolute; left:710px; top:55px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Maintain Quotation</span>
                    </div>
                </div>
                <!-- Line 8 to 9 -->
                <div style="position:absolute; left:800px; top:80px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:825px; top:77px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 9. Price Comparison -->
                <div style="position:absolute; left:830px; top:55px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Price Comparison</span>
                    </div>
                </div>
                <!-- Line 9 to 10 -->
                <div style="position:absolute; left:875px; top:115px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:872px; top:165px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                
                <!-- 10. Approve Quotation? -->
                <div style="position:absolute; left:850px; top:170px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">Approve?</div>
                </div>
                
                <!-- Line 10 N to 11 -->
                <div style="position:absolute; left:800px; top:195px; width:50px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:800px; top:192px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:820px; top:180px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 11. Quotation Reject -->
                <div style="position:absolute; left:710px; top:170px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Quotation Reject</span>
                    </div>
                </div>
                <!-- Quotation Reject to End -->
                <div style="position:absolute; left:755px; top:230px; width:2px; height:10px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:755px; top:240px; width:57px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:810px; top:240px; width:2px; height:325px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:95px; top:565px; width:715px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:95px; top:562px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- Line 10 Y to 12 -->
                <div style="position:absolute; left:875px; top:220px; width:2px; height:140px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:872px; top:355px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:880px; top:230px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- Line 6 Y to 12 (routed cleanly) -->
                <div style="position:absolute; left:550px; top:210px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:570px; top:210px; width:2px; height:40px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:570px; top:250px; width:305px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:560px; top:195px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 12. Create PO -->
                <div style="position:absolute; left:830px; top:360px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Create PO</span>
                    </div>
                </div>
                <!-- Line 12 to 13 -->
                <div style="position:absolute; left:790px; top:385px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:790px; top:382px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- 13. Approve PO -->
                <div style="position:absolute; left:680px; top:360px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement Manager</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Approve PO</span>
                    </div>
                </div>
                <!-- Line 13 to 14 -->
                <div style="position:absolute; left:640px; top:385px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:640px; top:382px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- 14. Approve PO? Diamond -->
                <div style="position:absolute; left:590px; top:360px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">Approve?</div>
                </div>
                
                <!-- Line 14 N to 15 -->
                <div style="position:absolute; left:615px; top:410px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:615px; top:465px; width:55px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:665px; top:462px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:625px; top:430px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 15. Reject PO -->
                <div style="position:absolute; left:670px; top:440px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Reject PO</span>
                    </div>
                </div>
                <!-- 15 back to 12 -->
                <div style="position:absolute; left:760px; top:465px; width:115px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:875px; top:415px; width:2px; height:50px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:872px; top:415px; border-left:4px solid transparent; border-right:4px solid transparent; border-bottom:5px solid #64748b; z-index:2;"></div>
                
                <!-- Line 14 Y to 16 -->
                <div style="position:absolute; left:550px; top:385px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:550px; top:382px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:565px; top:370px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 16. Print PO -->
                <div style="position:absolute; left:460px; top:360px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Print PO</span>
                    </div>
                </div>
                
                <!-- 16 to Vendor -->
                <div style="position:absolute; left:505px; top:410px; width:2px; height:50px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:430px; top:460px; width:75px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:430px; top:457px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <div style="position:absolute; left:475px; top:420px; width:60px; height:30px; background:#fff; border:1px solid #94a3b8; z-index:5; font-size:8px; text-align:center; padding-top:8px;">PO Form (2 ply)</div>
                
                <!-- Vendor Box -->
                <div style="position:absolute; left:360px; top:445px; width:70px; height:30px; background:#f1f5f9; border:1px dashed #64748b; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    Vendor
                </div>
                
                <!-- Vendor to DP? -->
                <div style="position:absolute; left:395px; top:390px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:320px; top:390px; width:75px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:320px; top:387px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- 17. DP? -->
                <div style="position:absolute; left:270px; top:365px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">DP?</div>
                </div>
                
                <!-- Line 17 Y to 18 -->
                <div style="position:absolute; left:295px; top:415px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:292px; top:465px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:305px; top:430px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 18. Vendor DP -->
                <div style="position:absolute; left:240px; top:470px; width:110px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px;">
                    1.4.3 Vendor Down Payment
                </div>
                
                
                
                <!-- 19. Invoice Verif -->
                <div style="position:absolute; left:90px; top:470px; width:110px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px;">
                    1.4.1 Logistics Invoice Verification
                </div>
                
                <!-- Line 17 N to 20 -->
                <div style="position:absolute; left:230px; top:390px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:230px; top:387px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:250px; top:375px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 20. Goods Receipt -->
                <div style="position:absolute; left:90px; top:370px; width:140px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px;">
                    1.2.1 Goods Receipt from Purchase Order
                </div>
                
                <!-- Goods Receipt to Invoice Verification -->
                <div style="position:absolute; left:145px; top:410px; width:2px; height:60px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:142px; top:465px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <!-- Invoice Verification to End -->
                <div style="position:absolute; left:145px; top:510px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                
                <!-- 21. End -->
                <div style="position:absolute; left:50px; top:550px; width:45px; height:30px; background:#fff; border:2px solid #94a3b8; border-radius:15px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    End
                </div>
            </div>
        </div>
    </div>
</div>


<div id="section-7" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>7. PROCUREMENT OF ASSET</span></h2>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.3.2. Procurement of Asset</h3>
        <div class="bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto flex justify-center shadow-sm">
            <div style="position:relative; width:950px; height:650px; font-family:sans-serif; font-size:11px; margin:0 auto;">
                
                <div style="position:absolute; left:20px; top:20px; width:910px; height:610px; border:2px solid #cbd5e1; border-radius:8px; background:#f8fafc; z-index:0;"></div>
                <div style="position:absolute; left:20px; top:20px; width:30px; height:610px; border-right:2px solid #cbd5e1; background:#f1f5f9; border-top-left-radius:6px; border-bottom-left-radius:6px; display:flex; justify-content:center; align-items:center; z-index:1;">
                    <span style="transform: rotate(-90deg); white-space:nowrap; font-weight:bold; color:#475569; letter-spacing:1px; font-size:12px;">Business Process</span>
                </div>
                
                <!-- 1. Start -->
                <div style="position:absolute; left:60px; top:195px; width:50px; height:30px; background:#fff; border:2px solid #94a3b8; border-radius:15px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    Start
                </div>
                <!-- Line 1 to 2 -->
                <div style="position:absolute; left:110px; top:210px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:135px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 2. Create PR -->
                <div style="position:absolute; left:140px; top:180px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Requestor</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; padding:2px;">
                        <span>Create PR</span>
                    </div>
                </div>
                <!-- Line 2 to 3 -->
                <div style="position:absolute; left:230px; top:210px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:255px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 3. Approve PR -->
                <div style="position:absolute; left:260px; top:180px; width:110px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Approver</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; padding:2px;">
                        <span>Approve PR</span>
                    </div>
                </div>
                <!-- Line 3 to 4 -->
                <div style="position:absolute; left:370px; top:210px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:395px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 4. Approve? (Diamond) -->
                <div style="position:absolute; left:400px; top:185px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">Approve?</div>
                </div>
                
                <!-- Line 4 N to 5 -->
                <div style="position:absolute; left:425px; top:235px; width:2px; height:35px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:422px; top:265px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:430px; top:245px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 5. Change PR -->
                <div style="position:absolute; left:380px; top:270px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Requestor</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Change PR</span>
                    </div>
                </div>
                <!-- Line 5 back to 2 -->
                <div style="position:absolute; left:185px; top:240px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:185px; top:295px; width:195px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:182px; top:240px; border-left:4px solid transparent; border-right:4px solid transparent; border-bottom:5px solid #64748b; z-index:2;"></div>
                
                <!-- Line 4 Y to 6 -->
                <div style="position:absolute; left:450px; top:210px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:485px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:465px; top:195px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 6. Repeat Order? -->
                <div style="position:absolute; left:490px; top:180px; width:60px; height:60px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:42px; height:42px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e; text-align:center; line-height:1.1;">Repeat<br>Order?</div>
                </div>
                
                <!-- Line 6 N to 7 -->
                <div style="position:absolute; left:520px; top:80px; width:2px; height:100px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:520px; top:80px; width:70px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:585px; top:77px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:525px; top:130px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 7. Create RFQ -->
                <div style="position:absolute; left:590px; top:55px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Create RFQ</span>
                    </div>
                </div>
                
                <!-- 7 down to Vendor -->
                <div style="position:absolute; left:635px; top:105px; width:2px; height:75px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:632px; top:177px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:605px; top:135px; width:60px; height:30px; background:#fff; border:1px solid #94a3b8; z-index:5; font-size:8px; text-align:center; padding-top:8px;">RFQ Form</div>
                
                <!-- Vendor Box -->
                <div style="position:absolute; left:600px; top:180px; width:70px; height:30px; background:#f1f5f9; border:1px dashed #64748b; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    Vendor
                </div>
                
                <!-- Vendor up to 8 -->
                <div style="position:absolute; left:670px; top:185px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:690px; top:80px; width:2px; height:105px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:690px; top:80px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:707px; top:77px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 8. Maintain Quotation -->
                <div style="position:absolute; left:710px; top:55px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Maintain Quotation</span>
                    </div>
                </div>
                <!-- Line 8 to 9 -->
                <div style="position:absolute; left:800px; top:80px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:825px; top:77px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 9. Price Comparison -->
                <div style="position:absolute; left:830px; top:55px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Price Comparison</span>
                    </div>
                </div>
                <!-- Line 9 to 10 -->
                <div style="position:absolute; left:875px; top:115px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:872px; top:165px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                
                <!-- 10. Approve Quotation? -->
                <div style="position:absolute; left:850px; top:170px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">Approve?</div>
                </div>
                
                <!-- Line 10 N to 11 -->
                <div style="position:absolute; left:800px; top:195px; width:50px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:800px; top:192px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:820px; top:180px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 11. Quotation Reject -->
                <div style="position:absolute; left:710px; top:170px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Quotation Reject</span>
                    </div>
                </div>
                <!-- Quotation Reject to End -->
                <div style="position:absolute; left:755px; top:230px; width:2px; height:10px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:755px; top:240px; width:57px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:810px; top:240px; width:2px; height:325px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:95px; top:565px; width:715px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:95px; top:562px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- Line 10 Y to 12 -->
                <div style="position:absolute; left:875px; top:220px; width:2px; height:140px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:872px; top:355px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:880px; top:230px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- Line 6 Y to 12 (routed cleanly) -->
                <div style="position:absolute; left:550px; top:210px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:570px; top:210px; width:2px; height:40px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:570px; top:250px; width:305px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:560px; top:195px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 12. Create PO -->
                <div style="position:absolute; left:830px; top:360px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Create PO</span>
                    </div>
                </div>
                <!-- Line 12 to 13 -->
                <div style="position:absolute; left:790px; top:385px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:790px; top:382px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- 13. Approve PO -->
                <div style="position:absolute; left:680px; top:360px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement Manager</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Approve PO</span>
                    </div>
                </div>
                <!-- Line 13 to 14 -->
                <div style="position:absolute; left:640px; top:385px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:640px; top:382px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- 14. Approve PO? Diamond -->
                <div style="position:absolute; left:590px; top:360px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">Approve?</div>
                </div>
                
                <!-- Line 14 N to 15 -->
                <div style="position:absolute; left:615px; top:410px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:615px; top:465px; width:55px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:665px; top:462px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:625px; top:430px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 15. Reject PO -->
                <div style="position:absolute; left:670px; top:440px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Reject PO</span>
                    </div>
                </div>
                <!-- 15 back to 12 -->
                <div style="position:absolute; left:760px; top:465px; width:115px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:875px; top:415px; width:2px; height:50px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:872px; top:415px; border-left:4px solid transparent; border-right:4px solid transparent; border-bottom:5px solid #64748b; z-index:2;"></div>
                
                <!-- Line 14 Y to 16 -->
                <div style="position:absolute; left:550px; top:385px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:550px; top:382px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:565px; top:370px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 16. Print PO -->
                <div style="position:absolute; left:460px; top:360px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Print PO</span>
                    </div>
                </div>
                
                <!-- 16 to Vendor -->
                <div style="position:absolute; left:505px; top:410px; width:2px; height:50px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:430px; top:460px; width:75px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:430px; top:457px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <div style="position:absolute; left:465px; top:415px; width:80px; height:40px; background:#fff; border:1px solid #94a3b8; z-index:5; font-size:7px; text-align:center; padding-top:4px; line-height:1.3;">PO Form (2 ply)<br/>- 1 Vendor<br/>- 1 Procurement</div>
                
                <!-- Vendor Box -->
                <div style="position:absolute; left:360px; top:445px; width:70px; height:30px; background:#f1f5f9; border:1px dashed #64748b; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    Vendor
                </div>
                
                <!-- Vendor to DP? -->
                <div style="position:absolute; left:395px; top:390px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:320px; top:390px; width:75px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:320px; top:387px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- 17. DP? -->
                <div style="position:absolute; left:270px; top:365px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">DP?</div>
                </div>
                
                <!-- Line 17 Y to 18 -->
                <div style="position:absolute; left:295px; top:415px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:292px; top:465px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:305px; top:430px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 18. Vendor DP -->
                <div style="position:absolute; left:240px; top:470px; width:110px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px;">
                    1.4.3 Vendor Down Payment
                </div>
                
                
                
                <!-- 19. Invoice Verif -->
                <div style="position:absolute; left:90px; top:470px; width:110px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px;">
                    1.4.1 Logistics Invoice Verification
                </div>
                
                <!-- Line 17 N to 20 -->
                <div style="position:absolute; left:230px; top:390px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:230px; top:387px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:250px; top:375px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 20. Goods Receipt -->
                <div style="position:absolute; left:90px; top:370px; width:140px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px;">
                    2.1.1 Goods Receipt from Purchase Order
                </div>
                
                <!-- Goods Receipt to Invoice Verification -->
                <div style="position:absolute; left:145px; top:410px; width:2px; height:60px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:142px; top:465px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <!-- Invoice Verification to End -->
                <div style="position:absolute; left:145px; top:510px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                
                <!-- 21. End -->
                <div style="position:absolute; left:50px; top:550px; width:45px; height:30px; background:#fff; border:2px solid #94a3b8; border-radius:15px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    End
                </div>
            </div>
        </div>
    </div>
</div>


<div id="section-8" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>8. PROCUREMENT OF SERVICE</span></h2>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.3.4. Procurement of Service</h3>
        <div class="bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto flex justify-center shadow-sm">
            <div style="position:relative; width:950px; height:650px; font-family:sans-serif; font-size:11px; margin:0 auto;">
                
                <div style="position:absolute; left:20px; top:20px; width:910px; height:610px; border:2px solid #cbd5e1; border-radius:8px; background:#f8fafc; z-index:0;"></div>
                <div style="position:absolute; left:20px; top:20px; width:30px; height:610px; border-right:2px solid #cbd5e1; background:#f1f5f9; border-top-left-radius:6px; border-bottom-left-radius:6px; display:flex; justify-content:center; align-items:center; z-index:1;">
                    <span style="transform: rotate(-90deg); white-space:nowrap; font-weight:bold; color:#475569; letter-spacing:1px; font-size:12px;">Business Process</span>
                </div>
                
                <!-- 1. Start -->
                <div style="position:absolute; left:60px; top:195px; width:50px; height:30px; background:#fff; border:2px solid #94a3b8; border-radius:15px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    Start
                </div>
                <!-- Line 1 to 2 -->
                <div style="position:absolute; left:110px; top:210px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:135px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 2. Create PR -->
                <div style="position:absolute; left:140px; top:180px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Requestor</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; padding:2px;">
                        <span>Create PR</span>
                    </div>
                </div>
                <!-- Line 2 to 3 -->
                <div style="position:absolute; left:230px; top:210px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:255px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 3. Approve PR -->
                <div style="position:absolute; left:260px; top:180px; width:110px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Approver</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; padding:2px;">
                        <span>Approve PR</span>
                    </div>
                </div>
                <!-- Line 3 to 4 -->
                <div style="position:absolute; left:370px; top:210px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:395px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 4. Approve? (Diamond) -->
                <div style="position:absolute; left:400px; top:185px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">Approve?</div>
                </div>
                
                <!-- Line 4 N to 5 -->
                <div style="position:absolute; left:425px; top:235px; width:2px; height:35px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:422px; top:265px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:430px; top:245px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 5. Change PR -->
                <div style="position:absolute; left:380px; top:270px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Requestor</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Change PR</span>
                    </div>
                </div>
                <!-- Line 5 back to 2 -->
                <div style="position:absolute; left:185px; top:240px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:185px; top:295px; width:195px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:182px; top:240px; border-left:4px solid transparent; border-right:4px solid transparent; border-bottom:5px solid #64748b; z-index:2;"></div>
                
                <!-- Line 4 Y to 6 -->
                <div style="position:absolute; left:450px; top:210px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:485px; top:207px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:465px; top:195px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 6. Repeat Order? -->
                <div style="position:absolute; left:490px; top:180px; width:60px; height:60px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:42px; height:42px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e; text-align:center; line-height:1.1;">Repeat<br>Order?</div>
                </div>
                
                <!-- Line 6 N to 7 -->
                <div style="position:absolute; left:520px; top:80px; width:2px; height:100px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:520px; top:80px; width:70px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:585px; top:77px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:525px; top:130px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 7. Create RFQ -->
                <div style="position:absolute; left:590px; top:55px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Create RFQ</span>
                    </div>
                </div>
                
                <!-- 7 down to Vendor -->
                <div style="position:absolute; left:635px; top:105px; width:2px; height:75px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:632px; top:177px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:605px; top:135px; width:60px; height:30px; background:#fff; border:1px solid #94a3b8; z-index:5; font-size:8px; text-align:center; padding-top:8px;">RFQ Form</div>
                
                <!-- Vendor Box -->
                <div style="position:absolute; left:600px; top:180px; width:70px; height:30px; background:#f1f5f9; border:1px dashed #64748b; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    Vendor
                </div>
                
                <!-- Vendor up to 8 -->
                <div style="position:absolute; left:670px; top:185px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:690px; top:80px; width:2px; height:105px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:690px; top:80px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:707px; top:77px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 8. Maintain Quotation -->
                <div style="position:absolute; left:710px; top:55px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Maintain Quotation</span>
                    </div>
                </div>
                <!-- Line 8 to 9 -->
                <div style="position:absolute; left:800px; top:80px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:825px; top:77px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- 9. Price Comparison -->
                <div style="position:absolute; left:830px; top:55px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Price Comparison</span>
                    </div>
                </div>
                <!-- Line 9 to 10 -->
                <div style="position:absolute; left:875px; top:115px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:872px; top:165px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                
                <!-- 10. Approve Quotation? -->
                <div style="position:absolute; left:850px; top:170px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">Approve?</div>
                </div>
                
                <!-- Line 10 N to 11 -->
                <div style="position:absolute; left:800px; top:195px; width:50px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:800px; top:192px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:820px; top:180px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 11. Quotation Reject -->
                <div style="position:absolute; left:710px; top:170px; width:90px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Quotation Reject</span>
                    </div>
                </div>
                <!-- Quotation Reject to End -->
                <div style="position:absolute; left:755px; top:230px; width:2px; height:10px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:755px; top:240px; width:57px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:810px; top:240px; width:2px; height:325px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:95px; top:565px; width:715px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:95px; top:562px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- Line 10 Y to 12 -->
                <div style="position:absolute; left:875px; top:220px; width:2px; height:140px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:872px; top:355px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:880px; top:230px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- Line 6 Y to 12 (routed cleanly) -->
                <div style="position:absolute; left:550px; top:210px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:570px; top:210px; width:2px; height:40px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:570px; top:250px; width:305px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:560px; top:195px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 12. Create PO -->
                <div style="position:absolute; left:830px; top:360px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Create PO</span>
                    </div>
                </div>
                <!-- Line 12 to 13 -->
                <div style="position:absolute; left:790px; top:385px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:790px; top:382px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- 13. Approve PO -->
                <div style="position:absolute; left:680px; top:360px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement Manager</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Approve PO</span>
                    </div>
                </div>
                <!-- Line 13 to 14 -->
                <div style="position:absolute; left:640px; top:385px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:640px; top:382px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- 14. Approve PO? Diamond -->
                <div style="position:absolute; left:590px; top:360px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">Approve?</div>
                </div>
                
                <!-- Line 14 N to 15 -->
                <div style="position:absolute; left:615px; top:410px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:615px; top:465px; width:55px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:665px; top:462px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:625px; top:430px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 15. Reject PO -->
                <div style="position:absolute; left:670px; top:440px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Reject PO</span>
                    </div>
                </div>
                <!-- 15 back to 12 -->
                <div style="position:absolute; left:760px; top:465px; width:115px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:875px; top:415px; width:2px; height:50px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:872px; top:415px; border-left:4px solid transparent; border-right:4px solid transparent; border-bottom:5px solid #64748b; z-index:2;"></div>
                
                <!-- Line 14 Y to 16 -->
                <div style="position:absolute; left:550px; top:385px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:550px; top:382px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:565px; top:370px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 16. Print PO -->
                <div style="position:absolute; left:460px; top:360px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; border-bottom:1px solid #bfdbfe; font-size:9px; font-weight:bold; color:#1e3a8a; padding:2px; text-align:center;">Procurement</div>
                    <div style="flex:1; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af;">
                        <span>Print PO</span>
                    </div>
                </div>
                
                <!-- 16 to Vendor -->
                <div style="position:absolute; left:505px; top:410px; width:2px; height:50px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:430px; top:460px; width:75px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:430px; top:457px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <div style="position:absolute; left:465px; top:415px; width:80px; height:40px; background:#fff; border:1px solid #94a3b8; z-index:5; font-size:7px; text-align:center; padding-top:4px; line-height:1.3;">PO Form (2 ply)<br/>- 1 Vendor<br/>- 1 Procurement</div>
                
                <!-- Vendor Box -->
                <div style="position:absolute; left:360px; top:445px; width:70px; height:30px; background:#f1f5f9; border:1px dashed #64748b; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    Vendor
                </div>
                
                <!-- Vendor to DP? -->
                <div style="position:absolute; left:395px; top:390px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:320px; top:390px; width:75px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:320px; top:387px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                
                <!-- 17. DP? -->
                <div style="position:absolute; left:270px; top:365px; width:50px; height:50px; z-index:10; display:flex; justify-content:center; align-items:center;">
                    <div style="position:absolute; width:36px; height:36px; background:#fff; border:2px solid #eab308; transform: rotate(45deg);"></div>
                    <div style="position:relative; z-index:11; font-size:9px; font-weight:bold; color:#854d0e;">DP?</div>
                </div>
                
                <!-- Line 17 Y to 18 -->
                <div style="position:absolute; left:295px; top:415px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:292px; top:465px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:305px; top:430px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
                
                <!-- 18. Vendor DP -->
                <div style="position:absolute; left:240px; top:470px; width:110px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px;">
                    1.4.3 Vendor Down Payment
                </div>
                
                
                
                <!-- 19. Invoice Verif -->
                <div style="position:absolute; left:90px; top:470px; width:110px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px;">
                    1.4.1 Logistics Invoice Verification
                </div>
                
                <!-- Line 17 N to 20 -->
                <div style="position:absolute; left:230px; top:390px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:230px; top:387px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:250px; top:375px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
                
                <!-- 20. Goods Receipt -->
                <div style="position:absolute; left:90px; top:370px; width:140px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px;">
                    2.1.1 Goods Receipt from Purchase Order
                </div>
                
                <!-- Goods Receipt to Invoice Verification -->
                <div style="position:absolute; left:145px; top:410px; width:2px; height:60px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:142px; top:465px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <!-- Invoice Verification to End -->
                <div style="position:absolute; left:145px; top:510px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
                
                <!-- 21. End -->
                <div style="position:absolute; left:50px; top:550px; width:45px; height:30px; background:#fff; border:2px solid #94a3b8; border-radius:15px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">
                    End
                </div>
            </div>
        </div>
    </div>
</div>




<div id="section-9" style="margin-bottom: 40px;">
    <h3 style="color: #1e293b; font-size: 16px; font-weight: bold; margin-bottom: 15px; border-bottom: 2px solid #e2e8f0; padding-bottom: 5px;">
        3.4.1. Procurement of Trading Goods
    </h3>
    <div style="border: 1px solid #cbd5e1; border-radius: 8px; background-color: #f8fafc; padding: 15px; overflow-x: auto;">
        
        <!-- Legend / Axis -->
        <div style="position: relative; width: 800px; height: 500px; background: #f8fafc; font-family: sans-serif;">
            
            <div style="position:absolute; left:20px; top:150px; transform: rotate(-90deg); transform-origin: left top; font-weight:bold; color:#64748b; font-size:12px; letter-spacing: 2px;">
                Business Process
            </div>

            <!-- ALL BOXES AND LINES -->
            <!-- Start -->
            <div style="position:absolute; left:60px; top:80px; width:50px; height:30px; background:#fff; border:2px solid #94a3b8; border-radius:15px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569; font-size:10px;">
                Start
            </div>

            <!-- Start to 3.2.2 -->
            <div style="position:absolute; left:110px; top:94px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:137px; top:91px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

            <!-- 3.2.2 Purchasing Info Record Maintenance -->
            <div style="position:absolute; left:140px; top:75px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">
                3.2.2 Purchasing Info Record Maintenance
            </div>

            <!-- 3.2.2 to Create PO -->
            <div style="position:absolute; left:220px; top:94px; width:200px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:417px; top:91px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

            <!-- Create PO -->
            <div style="position:absolute; left:420px; top:70px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Demand Supply</div>
                <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:2px;">Create PO</div>
            </div>

            <!-- Create PO to Approve PO -->
            <div style="position:absolute; left:500px; top:94px; width:15px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:514px; top:94px; width:2px; height:42px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:514px; top:134px; width:16px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:527px; top:131px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

            <!-- Approve PO -->
            <div style="position:absolute; left:530px; top:110px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Demand & Supply Mgr</div>
                <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:2px;">Approve PO</div>
            </div>

            <!-- Approve PO to Release PO? -->
            <div style="position:absolute; left:610px; top:134px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:637px; top:131px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

            <!-- Release PO? -->
            <div style="position:absolute; left:640px; top:110px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10;"></div>
            <div style="position:absolute; left:640px; top:110px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:8px;">
                Release<br/>PO?
            </div>

            <!-- Release PO? N -> Modify PO -->
            <div style="position:absolute; left:670px; top:90px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
            <div style="position:absolute; left:664px; top:80px; width:2px; height:30px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:661px; top:80px; border-left:4px solid transparent; border-right:4px solid transparent; border-bottom:5px solid #64748b; z-index:2;"></div>

            <!-- Modify PO -->
            <div style="position:absolute; left:630px; top:30px; width:70px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Demand Supply</div>
                <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:2px;">Modify PO</div>
            </div>

            <!-- Modify PO -> Approve PO -->
            <div style="position:absolute; left:570px; top:54px; width:60px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:570px; top:54px; width:2px; height:56px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:567px; top:107px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>

            <!-- Release PO? Y -> Print PO -->
            <div style="position:absolute; left:670px; top:175px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
            <div style="position:absolute; left:664px; top:160px; width:2px; height:40px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:661px; top:197px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>

            <!-- Print PO -->
            <div style="position:absolute; left:625px; top:200px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Demand Supply</div>
                <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:2px;">Print PO</div>
            </div>

            <!-- Print PO to PO Form -->
            <div style="position:absolute; left:664px; top:250px; width:2px; height:10px; background:#64748b; z-index:1;"></div>
            
            <!-- PO Form (2 ply) -->
            <div style="position:absolute; left:635px; top:260px; width:60px; height:40px; background:#fff; border:1px solid #94a3b8; border-radius:0 0 10px 0; z-index:5; font-size:7px; text-align:center; padding-top:4px; line-height:1.2;">PO Form (2 ply)<br/>- 1 to Principal<br/>- 1 to Demand Supply</div>

            <!-- Print PO to DP? (goes behind form) -->
            <div style="position:absolute; left:664px; top:300px; width:2px; height:30px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:661px; top:327px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>

            <!-- Dashed Line from Form to Vendor -->
            <div style="position:absolute; left:695px; top:280px; width:35px; height:0px; border-top:1px dashed #64748b; z-index:1;"></div>
            <div style="position:absolute; left:727px; top:277px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

            <!-- Vendor -->
            <div style="position:absolute; left:730px; top:265px; width:50px; height:30px; background:#f1f5f9; border:1px dashed #64748b; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569; font-size:9px;">
                Vendor
            </div>

            <!-- DP? -->
            <div style="position:absolute; left:640px; top:330px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10;"></div>
            <div style="position:absolute; left:640px; top:330px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:8px;">
                DP?
            </div>

            <!-- DP? Y -> Vendor DP -->
            <div style="position:absolute; left:670px; top:395px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>
            <div style="position:absolute; left:664px; top:380px; width:2px; height:40px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:661px; top:417px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>

            <!-- 1.4.3 Vendor Down Payment -->
            <div style="position:absolute; left:625px; top:420px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:2px;">
                1.4.3 Vendor Down Payment
            </div>

            <!-- DP? N -> Split to 3.7.1 -->
            <div style="position:absolute; left:610px; top:345px; font-weight:bold; color:#64748b; font-size:9px;">N</div>
            <!-- Main horizontal line from DP? to Lower 3.7.1 -->
            <div style="position:absolute; left:460px; top:354px; width:180px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:460px; top:351px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

            

            <!-- Branch UP to Upper 3.7.1 (branches at 500px) -->
            <div style="position:absolute; left:500px; top:270px; width:2px; height:84px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:460px; top:270px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:460px; top:267px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

            <!-- Upper 3.7.1 Goods Receipt -->
            <div style="position:absolute; left:380px; top:250px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">
                3.7.1 Goods Receipt from Purchase Order
            </div>
            
            <div style="position:absolute; left:390px; top:295px; width:60px; height:20px; background:#fff; border:1px solid #64748b; z-index:5; font-size:7px; text-align:center; padding-top:2px;">S Loc Receipt</div>
            
            <!-- Lower 3.7.1 Goods Receipt -->
            <div style="position:absolute; left:380px; top:335px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">
                3.7.1 Goods Receipt from Purchase Order
            </div>

            <div style="position:absolute; left:385px; top:380px; width:70px; height:20px; background:#fff; border:1px solid #64748b; z-index:5; font-size:7px; text-align:center; padding-top:2px;">S Loc Transit Jakarta Branch</div>

            <!-- Lower 3.7.1 -> Distribute stock... -->
            <div style="position:absolute; left:419px; top:375px; width:2px; height:55px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:416px; top:427px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>

            <!-- Distribute stock to another branch (plant) -->
            <div style="position:absolute; left:375px; top:430px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Demand Supply</div>
                <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Distribute stock to another branch (plant)</div>
            </div>

            <!-- Distribute stock -> 3.5 PO STO -->
            <div style="position:absolute; left:330px; top:454px; width:45px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:330px; top:451px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

            <!-- 3.5 PO STO -->
            <div style="position:absolute; left:250px; top:435px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:2px;">
                3.5 PO STO
            </div>

            <!-- Upper 3.7.1 and Lower 3.7.1 -> 1.4.1 -->
            <div style="position:absolute; left:355px; top:269px; width:25px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:355px; top:269px; width:2px; height:85px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:355px; top:354px; width:25px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:330px; top:354px; width:25px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:330px; top:351px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

            <!-- 1.4.1 Purchase Invoice Verification -->
            <div style="position:absolute; left:250px; top:335px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:2px;">
                1.4.1 Purchase Invoice Verification
            </div>

            <!-- 1.4.1 -> End -->
            <div style="position:absolute; left:100px; top:354px; width:150px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:100px; top:351px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

            <!-- 3.5 PO STO -> End -->
            <div style="position:absolute; left:40px; top:454px; width:210px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:40px; top:355px; width:2px; height:100px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:40px; top:354px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
            <div style="position:absolute; left:57px; top:351px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

            <!-- End -->
            <div style="position:absolute; left:60px; top:345px; width:40px; height:20px; background:#fff; border:2px solid #94a3b8; border-radius:10px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569; font-size:10px;">
                End
            </div>
            
        </div>
    </div>
</div>


<div id="section-10" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;">
        <span>10. PROCUREMENT OF TRADING GOODS (IMPORT+FREIGHT COST)</span>
       
    </h2>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.4.2 Procurement of Trading Goods (Import + Freight Cost)</h3>
        <p class="text-gray-600 text-sm mb-4">BPMN Process Flow with System Automation & Allocation</p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm">
            <div style="position:relative; width:1300px; height:800px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:1300px; height:130px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:100px; height:130px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Purchasing</div>

                <div style="position:absolute; left:0; top:130px; width:1300px; height:110px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:130px; width:100px; height:110px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Overseas<br/>Supplier</div>

                <div style="position:absolute; left:0; top:240px; width:1300px; height:130px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:100px; height:130px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Forwarder</div>

                <div style="position:absolute; left:0; top:370px; width:1300px; height:110px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:370px; width:100px; height:110px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Warehouse</div>

                <div style="position:absolute; left:0; top:480px; width:1300px; height:150px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:480px; width:100px; height:150px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance / AP</div>

                <div style="position:absolute; left:0; top:630px; width:1300px; height:170px; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:630px; width:100px; height:170px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:140px; top:45px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-po\' style=\'position:absolute; left:250px; top:40px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Create Import PO</div>
<div id=\'box-app\' style=\'position:absolute; left:390px; top:40px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Approve PO</div>
<div id=\'box-ship\' style=\'position:absolute; left:390px; top:160px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Ship Goods</div>
<div id=\'box-arrive\' style=\'position:absolute; left:390px; top:280px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Arrive at Port</div>
<div id=\'box-customs\' style=\'position:absolute; left:530px; top:280px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Customs & Clearance</div>
<div id=\'box-conf\' style=\'position:absolute; left:670px; top:280px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Confirm<br/>Import Cost</div>
<div id=\'dia-dia1\' style=\'position:absolute; left:835px; top:280px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:835px; top:280px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Cost<br/>Conf?</div>
<div id=\'box-assign\' style=\'position:absolute; left:810px; top:40px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Assign Forwarder<br/>& Cost</div>
<div id=\'box-alloc\' style=\'position:absolute; left:810px; top:690px; width:100px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Create Cost<br/>Allocation</div>
<div id=\'box-dist\' style=\'position:absolute; left:950px; top:690px; width:100px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Distribute Cost<br/>to Items</div>
<div id=\'box-gr\' style=\'position:absolute; left:940px; top:400px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>3.7.1 Goods Receipt<br/>from Purchase Order</div>
<div id=\'box-upd\' style=\'position:absolute; left:1090px; top:690px; width:100px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Update Inventory<br/>Value</div>
<div id=\'box-avail\' style=\'position:absolute; left:1090px; top:400px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Inventory<br/>Available</div>
<div id=\'box-freight_inv\' style=\'position:absolute; left:950px; top:280px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Submit Freight<br/>Invoice</div>
<div id=\'box-ver_freight\' style=\'position:absolute; left:940px; top:530px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Verify Freight Inv /<br/>1.4.1 Logistic Inv Ver</div>
<div id=\'dia-dia2\' style=\'position:absolute; left:835px; top:530px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:835px; top:530px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Match<br/>Cost?</div>
<div id=\'box-var\' style=\'position:absolute; left:810px; top:450px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Variance Review</div>
<div id=\'box-pay_rec\' style=\'position:absolute; left:670px; top:530px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Record Payable</div>
<div id=\'box-supp_inv\' style=\'position:absolute; left:1090px; top:160px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Submit Product<br/>Invoice</div>
<div id=\'box-ver_supp\' style=\'position:absolute; left:1080px; top:530px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>1.4.1 Logistic<br/>Invoice Verification</div>
<div id=\'box-proc_pay\' style=\'position:absolute; left:530px; top:530px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Process Payment</div>
<div id=\'box-end\' style=\'position:absolute; left:420px; top:535px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:180px; top:65px; width:70px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:244px; top:61px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:350px; top:65px; width:40px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:384px; top:61px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:440px; top:90px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:436px; top:154px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:440px; top:210px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:436px; top:274px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:490px; top:305px; width:40px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:524px; top:301px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:630px; top:305px; width:40px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:664px; top:301px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:770px; top:305px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:829px; top:301px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:860px; top:330px; width:2px; height:20px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:868px; top:332px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:720px; top:350px; width:140px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:720px; top:330px; width:2px; height:20px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:716px; top:330px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:860px; top:90px; width:2px; height:190px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:856px; top:90px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:864px; top:173px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:910px; top:65px; width:20px; height:2px; border-top:2px dashed #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:930px; top:65px; width:2px; height:615px; border-left:2px dashed #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:860px; top:680px; width:70px; height:2px; border-top:2px dashed #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:860px; top:680px; width:2px; height:10px; border-left:2px dashed #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:856px; top:684px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:910px; top:715px; width:40px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:944px; top:711px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:1000px; top:450px; width:2px; height:240px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:996px; top:450px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:1000px; top:450px; width:2px; height:265px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:1000px; top:715px; width:90px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:1084px; top:711px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:1140px; top:450px; width:2px; height:240px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:1136px; top:450px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:885px; top:305px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:944px; top:301px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:1000px; top:330px; width:2px; height:200px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:996px; top:524px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:885px; top:555px; width:55px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:885px; top:551px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-right:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:860px; top:500px; width:2px; height:30px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:856px; top:500px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:868px; top:528px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:720px; top:475px; width:90px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:720px; top:475px; width:2px; height:55px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:716px; top:524px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:770px; top:555px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:770px; top:551px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-right:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:806.5px; top:543px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:630px; top:555px; width:40px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:630px; top:551px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-right:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:460px; top:555px; width:70px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:460px; top:551px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-right:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:490px; top:185px; width:600px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:1084px; top:181px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:1140px; top:210px; width:2px; height:320px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:1136px; top:524px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:1140px; top:580px; width:2px; height:35px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:720px; top:615px; width:420px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:720px; top:580px; width:2px; height:35px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:716px; top:580px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>

<div style=\'position:absolute; left:695px; top:15px; width:110px; height:35px; background:#fff; border:1px solid #94a3b8; border-radius:4px; font-size:7px; padding:4px; color:#475569;\'>
    <b>*Mandatory Assignment:</b><br/>Forwarder Vendor & Cost Breakdown
</div>

<div style=\'position:absolute; left:950px; top:750px; width:130px; height:30px; background:#fff; border:1px solid #94a3b8; border-radius:4px; font-size:7px; padding:4px; color:#475569;\'>
    <b>*Allocation Method:</b><br/>By Item Value, Qty, Weight, Volume
</div>

<div style=\'position:absolute; left:1090px; top:750px; width:130px; height:30px; background:#fff; border:1px solid #94a3b8; border-radius:4px; font-size:7px; padding:4px; color:#475569;\'>
    <b>*Inventory Valuation:</b><br/>Purchase Cost + Freight Cost
</div>
            </div>
        </div>
    </div>
</div><div id="section-11" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>11. GOODS RECEIVED FROM PURCHASE ORDER</span></h2>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.7.1. Goods Receipt from PO</h3>
        <div class="bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto flex justify-center shadow-sm">
            <div style="position:relative; width:850px; height:450px; font-family:sans-serif; font-size:11px; margin:0 auto;">
                
                <div style="position:absolute; left:20px; top:20px; width:810px; height:410px; border:2px solid #cbd5e1; border-radius:8px; background:#f8fafc; z-index:0;"></div>
                <div style="position:absolute; left:20px; top:20px; width:30px; height:410px; border-right:2px solid #cbd5e1; background:#f1f5f9; border-top-left-radius:6px; border-bottom-left-radius:6px; display:flex; justify-content:center; align-items:center; z-index:1;">
                    <span style="transform: rotate(-90deg); white-space:nowrap; font-weight:bold; color:#475569; letter-spacing:1px; font-size:12px;">Business Process</span>
                </div>
                
                <!-- ALL BOXES AND LINES -->
                <!-- Start -->
                <div style="position:absolute; left:55px; top:125px; width:40px; height:20px; background:#fff; border:2px solid #94a3b8; border-radius:10px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569; font-size:9px;">
                    Start
                </div>

                <!-- Line Start to right -->
                <div style="position:absolute; left:90px; top:134px; width:10px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:97px; top:131px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                
                <!-- Vertical branch for Inputs -->
                <div style="position:absolute; left:70px; top:134px; width:2px; height:140px; background:#64748b; z-index:1;"></div>
                <!-- branch to 3.3.2 -->
                <div style="position:absolute; left:70px; top:204px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:97px; top:201px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <!-- branch to 3.3.1 -->
                <div style="position:absolute; left:70px; top:274px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:97px; top:271px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- Inputs -->
                <div style="position:absolute; left:100px; top:115px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">
                    3.4.1 Procurement of Trading Goods
                </div>
                <div style="position:absolute; left:100px; top:185px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">
                    3.3.2 Procurement of Asset
                </div>
                <div style="position:absolute; left:100px; top:255px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">
                    3.3.1 Procurement of Consumable
                </div>

                <!-- Join Inputs -->
                <div style="position:absolute; left:180px; top:134px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:180px; top:204px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:180px; top:274px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:200px; top:134px; width:2px; height:140px; background:#64748b; z-index:1;"></div>
                <!-- Main line to Receipt Goods -->
                <div style="position:absolute; left:200px; top:204px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:237px; top:201px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- Receipt Goods from Vendor -->
                <div style="position:absolute; left:240px; top:180px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Warehouse Admin</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Receipt Goods from Vendor</div>
                </div>
                <!-- Document SJN / PO Form -->
                <div style="position:absolute; left:255px; top:235px; width:60px; height:20px; background:#fff; border:1px solid #94a3b8; border-radius:0 0 10px 0; z-index:5; font-size:7px; text-align:center; padding-top:4px;">SJN / PO Form</div>

                <!-- Receipt Goods to GR qty=PO qty? -->
                <div style="position:absolute; left:330px; top:204px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:357px; top:201px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- GR qty=PO qty? -->
                <div style="position:absolute; left:360px; top:180px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10;"></div>
                <div style="position:absolute; left:360px; top:180px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:8px; line-height:1.2;">GR qty =<br/>PO qty?</div>

                <!-- GR qty N Path (goes right) -->
                <div style="position:absolute; left:410px; top:204px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:447px; top:201px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:425px; top:192px; font-weight:bold; color:#64748b; font-size:9px;">N</div>

                <!-- Request Additional PO -->
                <div style="position:absolute; left:450px; top:180px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Demand supply</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Request Additional PO</div>
                </div>

                <!-- line to 3.4.1 -->
                <div style="position:absolute; left:540px; top:204px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:567px; top:201px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- 3.4.1 Procurement of Trading Goods -->
                <div style="position:absolute; left:570px; top:185px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">3.4.1 Procurement of Trading Goods</div>

                <!-- GR qty Y Path (goes down) -->
                <div style="position:absolute; left:385px; top:230px; width:2px; height:40px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:382px; top:267px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:390px; top:245px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>

                <!-- Goods Receipt -->
                <div style="position:absolute; left:340px; top:270px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Warehouse Admin</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Goods Receipt</div>
                </div>
                <!-- Document GR Form -->
                <div style="position:absolute; left:345px; top:325px; width:80px; height:30px; background:#fff; border:1px solid #94a3b8; border-radius:0 0 10px 0; z-index:5; font-size:7px; text-align:center; padding-top:4px; line-height:1.2;">GR Form (2 ply)<br/>- 1 to Vendor<br/>- 1 to Warehouse Admin</div>

                <!-- Goods Receipt to Any Reject? -->
                <div style="position:absolute; left:430px; top:294px; width:60px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:487px; top:291px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- Any Reject? -->
                <div style="position:absolute; left:490px; top:270px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10;"></div>
                <div style="position:absolute; left:490px; top:270px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:8px;">Any Reject?</div>

                <!-- Any Reject Y Path (goes right) -->
                <div style="position:absolute; left:540px; top:294px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:567px; top:291px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:550px; top:282px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>

                <!-- 2.4.1 Return Delivery PO -->
                <div style="position:absolute; left:570px; top:275px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">2.4.1 Return Delivery PO</div>

                <!-- Any Reject N Path (goes down) -->
                <div style="position:absolute; left:515px; top:320px; width:2px; height:35px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:515px; top:355px; width:185px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:697px; top:352px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:525px; top:330px; font-weight:bold; color:#64748b; font-size:9px;">N</div>

                <!-- 1.4.1 Purchase Invoice Verification -->
                <div style="position:absolute; left:700px; top:335px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">1.4.1 Purchase Invoice Verification</div>

                <!-- End -->
                <div style="position:absolute; left:595px; top:242px; width:30px; height:16px; background:#fff; border:2px solid #94a3b8; border-radius:8px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569; font-size:8px;">End</div>

                <!-- From 3.4.1 down to End -->
                <div style="position:absolute; left:610px; top:225px; width:2px; height:17px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:607px; top:238px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>

                <!-- From 2.4.1 up to End -->
                <div style="position:absolute; left:610px; top:258px; width:2px; height:17px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:607px; top:258px; border-left:4px solid transparent; border-right:4px solid transparent; border-bottom:5px solid #64748b; z-index:2;"></div>
            </div>
        </div>
    </div>
</div>

<div id="section-12" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>12. RETURN DELIVERY PO</span></h2>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.6.1. Return Delivery PO</h3>
        <div class="bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto flex justify-center shadow-sm">
            <div style="position:relative; width:850px; height:450px; font-family:sans-serif; font-size:11px; margin:0 auto;">
                
                <div style="position:absolute; left:20px; top:20px; width:810px; height:410px; border:2px solid #cbd5e1; border-radius:8px; background:#f8fafc; z-index:0;"></div>
                <div style="position:absolute; left:20px; top:20px; width:30px; height:410px; border-right:2px solid #cbd5e1; background:#f1f5f9; border-top-left-radius:6px; border-bottom-left-radius:6px; display:flex; justify-content:center; align-items:center; z-index:1;">
                    <span style="transform: rotate(-90deg); white-space:nowrap; font-weight:bold; color:#475569; letter-spacing:1px; font-size:12px;">Business Process</span>
                </div>
                
                <!-- ALL BOXES AND LINES -->
                <!-- Start -->
                <div style="position:absolute; left:40px; top:185px; width:40px; height:20px; background:#fff; border:2px solid #94a3b8; border-radius:10px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569; font-size:9px;">
                    Start
                </div>

                <!-- Line Start to right -->
                <div style="position:absolute; left:80px; top:195px; width:10px; height:2px; background:#64748b; z-index:1;"></div>
                
                <!-- Vertical branch for Inputs -->
                <div style="position:absolute; left:90px; top:125px; width:2px; height:140px; background:#64748b; z-index:1;"></div>
                <!-- branch to 3.4.1 -->
                <div style="position:absolute; left:90px; top:125px; width:10px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:97px; top:122px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <!-- branch to 3.3.2 -->
                <div style="position:absolute; left:90px; top:195px; width:10px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:97px; top:192px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <!-- branch to 3.3.1 -->
                <div style="position:absolute; left:90px; top:265px; width:10px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:97px; top:262px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- Inputs -->
                <div style="position:absolute; left:100px; top:105px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">
                    3.4.1 Procurement of Trading Goods
                </div>
                <div style="position:absolute; left:100px; top:175px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">
                    3.3.2 Procurement of Asset
                </div>
                <div style="position:absolute; left:100px; top:245px; width:80px; height:40px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">
                    3.3.1 Procurement of Consumable
                </div>

                <!-- Join Inputs -->
                <div style="position:absolute; left:180px; top:125px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:180px; top:195px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:180px; top:265px; width:20px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:200px; top:125px; width:2px; height:140px; background:#64748b; z-index:1;"></div>
                <!-- Main line to Check condition -->
                <div style="position:absolute; left:200px; top:195px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:237px; top:192px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- Check material condition -->
                <div style="position:absolute; left:240px; top:170px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:6px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe; line-height:1.1;">Warehouse Admin /<br/>Procurement</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:7px; padding:2px;">Check material condition</div>
                </div>

                <!-- Check condition to Diamond -->
                <div style="position:absolute; left:330px; top:195px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:357px; top:192px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- Return to Original PO? -->
                <div style="position:absolute; left:360px; top:170px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10;"></div>
                <div style="position:absolute; left:360px; top:170px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:7px; line-height:1.2;">Return to<br/>Original PO</div>

                <!-- Y Path (goes right) -->
                <div style="position:absolute; left:410px; top:195px; width:50px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:457px; top:192px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:430px; top:183px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>

                <!-- Upper Return Delivery -->
                <div style="position:absolute; left:460px; top:170px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:6px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe; line-height:1.1;">Warehouse Admin /<br/>Procurement</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Return Delivery</div>
                </div>
                <!-- Document -->
                <div style="position:absolute; left:465px; top:225px; width:80px; height:45px; background:#fff; border:1px solid #94a3b8; border-radius:0 0 10px 0; z-index:5; font-size:6px; text-align:center; padding-top:4px; line-height:1.2;">Return Form (3 ply)<br/>- 1 to Vendor<br/>- 1 to Admin<br/>- 1 Demand Supply</div>

                <!-- N Path (goes down) -->
                <div style="position:absolute; left:385px; top:220px; width:2px; height:85px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:382px; top:302px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:390px; top:250px; font-weight:bold; color:#64748b; font-size:9px;">N</div>

                <!-- Create PO Return -->
                <div style="position:absolute; left:340px; top:305px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Procurement</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Create PO Return</div>
                </div>

                <!-- Create PO to Lower Return Delivery -->
                <div style="position:absolute; left:430px; top:330px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:457px; top:327px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- Lower Return Delivery -->
                <div style="position:absolute; left:460px; top:305px; width:90px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:6px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe; line-height:1.1;">Warehouse Admin /<br/>Procurement</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Return Delivery</div>
                </div>
                <!-- Document -->
                <div style="position:absolute; left:465px; top:360px; width:80px; height:45px; background:#fff; border:1px solid #94a3b8; border-radius:0 0 10px 0; z-index:5; font-size:6px; text-align:center; padding-top:4px; line-height:1.2;">Return Form (3 ply)<br/>- 1 to Vendor<br/>- 1 to Admin<br/>- 1 Demand Supply</div>

                <!-- Convergence to 1.4.2 -->
                <div style="position:absolute; left:550px; top:195px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:550px; top:330px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:580px; top:195px; width:2px; height:135px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:580px; top:262px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:607px; top:259px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- 1.4.2 PIV - Debit Memo -->
                <div style="position:absolute; left:610px; top:237px; width:80px; height:50px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px; line-height:1.2;">1.4.2 PIV -<br/>Debit Memo</div>

                <!-- Line to End -->
                <div style="position:absolute; left:690px; top:262px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:727px; top:259px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- End -->
                <div style="position:absolute; left:730px; top:252px; width:40px; height:20px; background:#fff; border:2px solid #94a3b8; border-radius:10px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569; font-size:9px;">End</div>

                <!-- Note -->
                <div style="position:absolute; left:555px; top:350px; width:250px; height:55px; background:#f8fafc; border:1px solid #94a3b8; border-radius:4px; z-index:10; padding:6px; font-size:7px; color:#334155; line-height:1.4;">
                    <strong>Note:</strong><br/>
                    • Return for procurement of trading goods the PIC is admin warehouse.<br/>
                    • Return for procurement of non trading goods the PIC is admin procurement.
                </div>
            </div>
        </div>
    </div>
</div>

<div id="section-13" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>13. STOCK TRANSFER BETWEEN STORAGE LOCATION</span></h2>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.11.1. Transfer Posting Storage Location to Storage Location (2 Steps)</h3>
        <div class="bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto flex justify-center shadow-sm">
            <div style="position:relative; width:850px; height:450px; font-family:sans-serif; font-size:11px; margin:0 auto;">
                
                <div style="position:absolute; left:20px; top:20px; width:810px; height:410px; border:2px solid #cbd5e1; border-radius:8px; background:#f8fafc; z-index:0;"></div>
                <div style="position:absolute; left:20px; top:20px; width:30px; height:410px; border-right:2px solid #cbd5e1; background:#f1f5f9; border-top-left-radius:6px; border-bottom-left-radius:6px; display:flex; justify-content:center; align-items:center; z-index:1;">
                    <span style="transform: rotate(-90deg); white-space:nowrap; font-weight:bold; color:#475569; letter-spacing:1px; font-size:12px;">Business Process</span>
                </div>
                
                <!-- ALL BOXES AND LINES -->
                <!-- Start -->
                <div style="position:absolute; left:80px; top:100px; width:40px; height:20px; background:#fff; border:2px solid #94a3b8; border-radius:10px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569; font-size:9px;">Start</div>

                <!-- Line Start to Preparation -->
                <div style="position:absolute; left:120px; top:109px; width:175px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:295px; top:106px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- Preparation request material -->
                <div style="position:absolute; left:300px; top:85px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Warehouse Admin</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Preparation request material</div>
                </div>

                <!-- Line Preparation to Check Stock -->
                <div style="position:absolute; left:420px; top:109px; width:175px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:595px; top:106px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                <!-- Check Stock -->
                <div style="position:absolute; left:600px; top:85px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Warehouse Admin</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Check Stock</div>
                </div>

                <!-- Line Check Stock to Diamond -->
                <div style="position:absolute; left:659px; top:135px; width:2px; height:80px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:656px; top:215px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>

                <!-- Stock Available? (Diamond) -->
                <div style="position:absolute; left:635px; top:220px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10;"></div>
                <div style="position:absolute; left:635px; top:220px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:8px; line-height:1.2;">Stock<br/>Available?</div>

                <!-- N path (down) -->
                <div style="position:absolute; left:659px; top:270px; width:2px; height:35px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:656px; top:305px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:665px; top:280px; font-weight:bold; color:#64748b; font-size:9px;">N</div>

                <!-- 3.4.1 Procurement of Trade -->
                <div style="position:absolute; left:615px; top:310px; width:90px; height:50px; background:#fff; border:2px solid #64748b; border-radius:4px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:8px; padding:2px;">3.4.1 Procurement of Trade</div>

                <!-- Y path (left) -->
                <div style="position:absolute; left:575px; top:244px; width:60px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:570px; top:241px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                <div style="position:absolute; left:600px; top:230px; font-weight:bold; color:#64748b; font-size:9px;">Y</div>

                <!-- Remove from storage -->
                <div style="position:absolute; left:440px; top:220px; width:130px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Warehouse Admin</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:7px; padding:2px; line-height:1.2;">Transfer Posting Sloc to Sloc -<br/>remove from storage</div>
                </div>
                <!-- Document -->
                <div style="position:absolute; left:450px; top:275px; width:110px; height:35px; background:#fff; border:1px solid #94a3b8; border-radius:0 0 10px 0; z-index:5; font-size:6px; text-align:center; padding-top:4px; line-height:1.2;">Transfer Form<br/>- 1 to transporter<br/>- 1 to admin</div>

                <!-- Line left to Stock in Transfer -->
                <div style="position:absolute; left:395px; top:244px; width:45px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:390px; top:241px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

                <!-- Stock in Transfer -->
                <div style="position:absolute; left:290px; top:220px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Transporter</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:8px; padding:2px;">Stock in Transfer</div>
                </div>
                <!-- Document -->
                <div style="position:absolute; left:300px; top:275px; width:80px; height:20px; background:#fff; border:1px solid #94a3b8; border-radius:0 0 10px 0; z-index:5; font-size:6px; text-align:center; padding-top:4px;">Transfer Form</div>

                <!-- Line left to Place in storage -->
                <div style="position:absolute; left:245px; top:244px; width:45px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:240px; top:241px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

                <!-- Place in storage -->
                <div style="position:absolute; left:110px; top:220px; width:130px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; overflow:hidden;">
                    <div style="background:#eff6ff; padding:2px 0; text-align:center; font-size:7px; font-weight:bold; color:#1e40af; border-bottom:1px solid #bfdbfe;">Warehouse Admin</div>
                    <div style="flex-grow:1; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:7px; padding:2px; line-height:1.2;">Transfer Posting Sloc to Sloc -<br/>place in storage</div>
                </div>
                <!-- Document -->
                <div style="position:absolute; left:120px; top:275px; width:110px; height:35px; background:#fff; border:1px solid #94a3b8; border-radius:0 0 10px 0; z-index:5; font-size:6px; text-align:center; padding-top:4px; line-height:1.2;">GR Form<br/>- 1 to transporter<br/>- 1 to warehouse</div>

                <!-- Line left to End -->
                <div style="position:absolute; left:105px; top:244px; width:5px; height:2px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:100px; top:241px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

                <!-- End -->
                <div style="position:absolute; left:60px; top:235px; width:40px; height:20px; background:#fff; border:2px solid #94a3b8; border-radius:10px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569; font-size:9px;">End</div>

            </div>
        </div>
    </div>
</div>
',
            'out_of_scope' => '<ul><li>Penjualan barang ke pelanggan akhir (Masuk ke Modul SD).</li><li>Pembayaran tagihan ke vendor (Masuk ke Modul FI - AP).</li></ul>',
                'status' => 'Draft',
                'author_id' => NULL,
                'approved_by' => NULL,
                'approved_at' => NULL,
                'created_at' => '2026-07-10 22:54:00',
                'updated_at' => '2026-07-16 11:54:38',
                'document_history' => '[]',
                'document_distribution' => '[]',
                'flowcharts' => '[]',
                'table_of_contents' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'project_id' => 1,
            'title' => '03. Blue Print - Modul FI (Financial Accounting)',
            'background' => '<p>Modul <strong>Financial Accounting (FI)</strong> adalah modul sentral tempat bermuaranya seluruh nilai finansial dari operasional SD dan MM. Tujuan utamanya adalah menghasilkan laporan keuangan yang akurat (Balance Sheet & Profit/Loss) secara <em>real-time</em> untuk kepentingan eksternal maupun internal.</p><p>FI mencakup proses Account Receivable (AR) yang terintegrasi dengan SD, Account Payable (AP) yang terintegrasi dengan MM, serta pencatatan General Ledger (GL) otomatis melalui Posting Rules. ALM sangat ditekankan di sini untuk mencegah kecurangan dalam pencairan dana (Payment Voucher) dan pembatalan jurnal.</p>',
                'scope' => '
<div id="section-1" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;">
        <span>1. ORGANIZATION STRUCTURE</span>
       
    </h2>
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">1.1 FI Organization Structure (SME & Distributor Optimized)</h3>
        <p class="text-gray-600 text-sm mb-4 text-justify">
            Struktur Organisasi Financial Accounting dirancang agar pragmatis, ringan (ringkas), namun terukur untuk skala Small-to-Medium Enterprise (SME) seperti distributor atau perusahaan manufaktur lokal. Sistem menggunakan arsitektur <em>Single Chart of Accounts</em> dengan penekanan pada pelacakan profitabilitas berdasar cabang (Branch).
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto shadow-sm my-6 flex flex-col items-center">
            
            <div style="position:relative; width:800px; height:450px; font-family:sans-serif; font-size:11px;">
                
                <!-- COA Background Group -->
                <div style="position:absolute; left:250px; top:20px; width:300px; height:60px; border:2px dashed #94a3b8; border-radius:8px; background:#f8fafc; z-index:1; display:flex; justify-content:center; align-items:flex-start; padding-top:6px; color:#64748b; font-weight:bold;">
                    Master Data Pokok
                </div>

                <!-- COA Box -->
                <div style="position:absolute; left:300px; top:45px; width:200px; height:45px; background:#eff6ff; border:2px solid #3b82f6; border-radius:6px; z-index:2; display:flex; flex-direction:column; justify-content:center; align-items:center; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                    <strong style="color:#1e40af; font-size:12px;">Chart of Accounts (COA)</strong>
                    <span style="color:#475569; font-size:9px;">Operasional COA Nasional</span>
                </div>

                <!-- Connecting Line COA to Company -->
                <div style="position:absolute; left:399px; top:90px; width:2px; height:40px; background:#64748b; z-index:1;"></div>
                
                <!-- Company Box -->
                <div style="position:absolute; left:300px; top:130px; width:200px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:2; display:flex; flex-direction:column; justify-content:center; align-items:center; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                    <strong style="color:#166534; font-size:12px;">Company / Legal Entity</strong>
                    <span style="color:#15803d; font-size:9px;">PT / CV Utama (Konsolidasi)</span>
                </div>

                <!-- Connecting Line Company to Branch -->
                <div style="position:absolute; left:399px; top:180px; width:2px; height:40px; background:#64748b; z-index:1;"></div>

                <!-- Branch Horizon Line -->
                <div style="position:absolute; left:200px; top:220px; width:400px; height:2px; background:#64748b; z-index:1;"></div>

                <!-- Drops to Branches -->
                <div style="position:absolute; left:200px; top:220px; width:2px; height:20px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:400px; top:220px; width:2px; height:20px; background:#64748b; z-index:1;"></div>
                <div style="position:absolute; left:600px; top:220px; width:2px; height:20px; background:#64748b; z-index:1;"></div>

                <!-- Branch 1 Box -->
                <div style="position:absolute; left:125px; top:240px; width:150px; height:45px; background:#fff7ed; border:2px solid #f97316; border-radius:6px; z-index:2; display:flex; flex-direction:column; justify-content:center; align-items:center; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                    <strong style="color:#9a3412; font-size:12px;">Branch 001</strong>
                    <span style="color:#c2410c; font-size:9px;">(Profit Center: Cab. Jakarta)</span>
                </div>

                <!-- Branch 2 Box -->
                <div style="position:absolute; left:325px; top:240px; width:150px; height:45px; background:#fff7ed; border:2px solid #f97316; border-radius:6px; z-index:2; display:flex; flex-direction:column; justify-content:center; align-items:center; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                    <strong style="color:#9a3412; font-size:12px;">Branch 002</strong>
                    <span style="color:#c2410c; font-size:9px;">(Profit Center: Cab. Bandung)</span>
                </div>

                <!-- Branch 3 Box -->
                <div style="position:absolute; left:525px; top:240px; width:150px; height:45px; background:#fff7ed; border:2px solid #f97316; border-radius:6px; z-index:2; display:flex; flex-direction:column; justify-content:center; align-items:center; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                    <strong style="color:#9a3412; font-size:12px;">Branch 00n</strong>
                    <span style="color:#c2410c; font-size:9px;">(Profit Center: Cab. Lainnya)</span>
                </div>

                <!-- Connecting Line Branch to Cost Centers (Just showing for middle branch as example) -->
                <div style="position:absolute; left:400px; top:285px; width:2px; height:30px; border-left:2px dotted #64748b; z-index:1;"></div>
                
                <!-- Cost Centers Box -->
                <div style="position:absolute; left:300px; top:315px; width:200px; height:60px; background:#faf5ff; border:2px solid #a855f7; border-radius:6px; z-index:2; display:flex; flex-direction:column; justify-content:center; align-items:center; box-shadow:0 2px 4px rgba(0,0,0,0.1);">
                    <strong style="color:#6b21a8; font-size:11px;">Cost Centers (Per Departemen)</strong>
                    <div style="color:#7e22ce; font-size:9px; margin-top:4px; text-align:center;">
                        - CC-Finance<br>
                        - CC-Sales<br>
                        - CC-Warehouse
                    </div>
                </div>

                <!-- Fiscal Year Float -->
                <div style="position:absolute; left:50px; top:135px; width:150px; height:40px; background:#f1f5f9; border:1px solid #94a3b8; border-radius:4px; display:flex; flex-direction:column; justify-content:center; align-items:center; z-index:2;">
                    <strong style="color:#334155; font-size:10px;">Fiscal Year Variant</strong>
                    <span style="color:#475569; font-size:8px;">Jan - Des (12 Periods)</span>
                </div>
                <!-- Connector to Company -->
                <div style="position:absolute; left:200px; top:155px; width:100px; height:2px; border-top:1px dashed #94a3b8; z-index:1;"></div>

            </div>
        </div>

        <h4 class="font-bold text-gray-800 text-md mt-6 mb-2">Penjelasan Komponen Struktur</h4>
        <table class="brd-table w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="w-1/4">Komponen</th>
                    <th class="w-3/4">Fungsi & Konteks Bisnis (Distributor/SME)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="font-bold text-gray-700">Company (Legal Entity)</td>
                    <td class="text-gray-600 text-justify">Mewakili entitas hukum (PT/CV) yang berhak menerbitkan Faktur Pajak dan melaporkan SPT. Di level inilah Laporan Keuangan Konsolidasi (Neraca dan Laba/Rugi) diterbitkan.</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700">Branch (Business Area / Profit Center)</td>
                    <td class="text-gray-600 text-justify">Dalam distributor, setiap Cabang beroperasi secara mandiri dengan pimpinan cabang. Sistem DMS akan melacak pendapatan (Sales) dan Harga Pokok Penjualan (HPP) per Cabang, menjadikannya sebagai <strong class="text-gray-800">Profit Center</strong> otomatis. Setiap entri jurnal penjualan dan persediaan wajib memiliki parameter <code>branch_id</code>.</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700">Chart of Accounts (COA)</td>
                    <td class="text-gray-600 text-justify">Struktur bagan akun berstandar nasional (Aktiva, Pasiva, Ekuitas, Pendapatan, HPP, Biaya). Berbeda dengan Sistem Enterprise, DMS ini cukup mensyaratkan 1 <em>Operating COA</em> tanpa perlu hierarki akun grup/internasional yang rumit.</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700">Cost Center</td>
                    <td class="text-gray-600 text-justify">Pusat pertanggungjawaban biaya operasional. Setiap pengeluaran uang (Petty Cash atau Payment Voucher) untuk biaya harus ditautkan ke Cost Center spesifik (contoh: Gudang, Sales, Finance) agar manajemen bisa mengevaluasi efisiensi budget departemen.</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700">Fiscal Year</td>
                    <td class="text-gray-600 text-justify">Periode akuntansi dari Januari hingga Desember. Dilengkapi dengan kontrol buka-tutup periode (<em>Period Lock</em>) untuk mencegah modifikasi jurnal pada bulan yang laporan keuangannya sudah dilaporkan (<em>Closed</em>).</td>
                </tr>
            </tbody>
        </table>
        
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mt-6">
            <p class="text-sm text-blue-700 font-semibold mb-1">Catatan Penyederhanaan (Simplifikasi)</p>
            <p class="text-xs text-blue-600 text-justify">
                Berbeda dengan sistem ERP konvensional yang membutuhkan <strong>bagan penyusutan</strong> dan <strong>area pengendalian biaya</strong> secara terpisah, aplikasi ini menyatukan analisis biaya langsung di level Jurnal (via tag Cost Center & Branch) dan menerapkan satu metode penyusutan (Komersial) di Master Aset. Hal ini membuat aplikasi lebih <em>plug-and-play</em> tanpa mengurangi akurasi akuntansi standar PSAK.
            </p>
        </div>

    
    <div class="mt-12 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">1.2 Business Area / Branch Coding (Sample)</h3>
        <p class="text-gray-600 text-sm mb-4 text-justify">
            Berikut adalah contoh kodifikasi 10 Business Area (Cabang) yang merepresentasikan Profit Center di berbagai wilayah. Kode Cabang <strong>D321 (Arxino Bekasi)</strong> ditetapkan sebagai area sampel (<em>pilot project</em>) pada implementasi kali ini berdasarkan pengkodean BPS.
        </p>
        
        <table class="brd-table w-full mb-8">
            <thead class="bg-gray-100">
                <tr>
                    <th class="w-1/4">Business Area Code</th>
                    <th class="w-3/4">Description (Branch Name)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="font-bold text-gray-700 text-center">D121</td>
                    <td class="text-gray-600">Arxino Medan</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700 text-center">D311</td>
                    <td class="text-gray-600">Arxino Jakarta (Head Office)</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700 text-center">D312</td>
                    <td class="text-gray-600">Arxino Jakarta 1</td>
                </tr>
                <tr class="bg-blue-50">
                    <td class="font-bold text-blue-700 text-center">D321</td>
                    <td class="text-blue-700 font-semibold">Arxino Bekasi (Pilot Project Sampling)</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700 text-center">D331</td>
                    <td class="text-gray-600">Arxino Semarang</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700 text-center">D332</td>
                    <td class="text-gray-600">Arxino Solo</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700 text-center">D351</td>
                    <td class="text-gray-600">Arxino Surabaya</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700 text-center">D352</td>
                    <td class="text-gray-600">Arxino Malang</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700 text-center">D361</td>
                    <td class="text-gray-600">Arxino Tangerang</td>
                </tr>
                <tr>
                    <td class="font-bold text-gray-700 text-center">D731</td>
                    <td class="text-gray-600">Arxino Makassar</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div><div id="section-2" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;">
        <span>2. MASTER DATA</span>
       
    </h2>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">2.1 General Ledger</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses bisnis pembuatan, perubahan, dan pemblokiran akun General Ledger (COA). Berbeda dengan sistem manual yang menggunakan email, DMS ini menggunakan <strong>Digital Approval Workflow</strong> di mana permintaan diajukan oleh staf dan disetujui langsung oleh Manager melalui sistem.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Accounting<br/>Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance<br/>Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:95px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-req\' style=\'position:absolute; left:190px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Submit GL<br/>Data Request</div>
<div id=\'box-rev\' style=\'position:absolute; left:315px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review GL<br/>Request</div>
<div id=\'dia-appr\' style=\'position:absolute; left:465px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:465px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:440px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject & Notify<br/>Staff</div>
<div id=\'dia-type\' style=\'position:absolute; left:590px; top:305px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:590px; top:305px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Request<br/>Type?</div>
<div id=\'box-save\' style=\'position:absolute; left:690px; top:265px; width:100px; height:40px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Create/Change<br/>GL Account</div>
<div id=\'box-block\' style=\'position:absolute; left:690px; top:355px; width:100px; height:40px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Block Inactive<br/>GL Account</div>
<div id=\'box-end\' style=\'position:absolute; left:820px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:135px; top:60px; width:55px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:184px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:290px; top:60px; width:75px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:365px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:361px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:415px; top:180px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:459px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:490px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:486px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:494px; top:108px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:540px; top:60px; width:300px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:840px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:836px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:515px; top:180px; width:100px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:569px; top:168px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:615px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:611px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:615px; top:285px; width:2px; height:20px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:619px; top:283px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Create</div>
<div style=\'position:absolute; left:615px; top:285px; width:75px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:684px; top:281px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:615px; top:355px; width:2px; height:20px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:619px; top:353px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Delete</div>
<div style=\'position:absolute; left:615px; top:375px; width:75px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:684px; top:371px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:790px; top:285px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:840px; top:285px; width:2px; height:25px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:836px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:790px; top:375px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:840px; top:350px; width:2px; height:25px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:836px; top:350px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">2.2 Bank</h3>
        <p class="text-gray-600 text-sm mb-4">
            Pengelolaan Master Data Bank perusahaan (House Bank) maupun bank relasi (Vendor/Customer Bank). Sama halnya dengan manajemen GL, pengajuan master data bank yang diinisiasi oleh Treasury/Finance Staff harus melalui tinjauan Finance Manager (Digital Approval) sebelum sistem secara otomatis mengeksekusi perubahannya ke dalam database.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Treasury<br/>Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance<br/>Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:95px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-req\' style=\'position:absolute; left:190px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Submit Bank<br/>Master Request</div>
<div id=\'box-rev\' style=\'position:absolute; left:315px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Bank<br/>Request</div>
<div id=\'dia-appr\' style=\'position:absolute; left:465px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:465px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:440px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject & Notify<br/>Staff</div>
<div id=\'dia-type\' style=\'position:absolute; left:590px; top:305px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:590px; top:305px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Request<br/>Type?</div>
<div id=\'box-save\' style=\'position:absolute; left:690px; top:265px; width:100px; height:40px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Create/Change<br/>Bank Master</div>
<div id=\'box-block\' style=\'position:absolute; left:690px; top:355px; width:100px; height:40px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Block Inactive<br/>Bank Master</div>
<div id=\'box-end\' style=\'position:absolute; left:820px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:135px; top:60px; width:55px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:184px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:290px; top:60px; width:75px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:365px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:361px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:415px; top:180px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:459px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:490px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:486px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:494px; top:108px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:540px; top:60px; width:300px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:840px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:836px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:515px; top:180px; width:100px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:569px; top:168px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:615px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:611px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:615px; top:285px; width:2px; height:20px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:619px; top:283px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Create/Edit</div>
<div style=\'position:absolute; left:615px; top:285px; width:75px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:684px; top:281px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:615px; top:355px; width:2px; height:20px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:619px; top:353px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Delete</div>
<div style=\'position:absolute; left:615px; top:375px; width:75px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:684px; top:371px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:790px; top:285px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:840px; top:285px; width:2px; height:25px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:836px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:790px; top:375px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:840px; top:350px; width:2px; height:25px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:836px; top:350px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>

    
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">2.3 Asset</h3>
        <p class="text-gray-600 text-sm mb-4">
            Pembuatan Master Data Aset Tetap (<em>Fixed Asset</em>). Karena aplikasi ini dirancang khusus untuk SME dan meniadakan penggunaan <strong>Internal Order (IO) / Capex Budgeting</strong> yang kompleks, alurnya disederhanakan. Setiap departemen yang membutuhkan aset dapat mengajukan formulir pengadaan. Setelah di-<em>approve</em> oleh Finance, sistem akan langsung membuat cangkang (<em>shell</em>) Master Data Aset dan men-<em>generate</em> ID Aset. ID ini nantinya akan digunakan oleh divisi Purchasing saat menerbitkan Purchase Order (PO).
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Department<br/>Requestor</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance<br/>Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:95px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-req\' style=\'position:absolute; left:190px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Submit Asset<br/>Master Request</div>
<div id=\'box-rev\' style=\'position:absolute; left:315px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Asset<br/>Request</div>
<div id=\'dia-appr\' style=\'position:absolute; left:465px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:465px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:440px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject & Notify<br/>Requestor</div>
<div id=\'box-save\' style=\'position:absolute; left:585px; top:305px; width:110px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Asset ID<br/>& Save Master</div>
<div id=\'box-end\' style=\'position:absolute; left:740px; top:310px; width:80px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Proceed to<br/>Procurement</div>
<div style=\'position:absolute; left:135px; top:60px; width:55px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:184px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:290px; top:60px; width:75px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:365px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:361px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:415px; top:180px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:459px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:490px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:486px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:494px; top:108px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div id=\'box-end_rej\' style=\'position:absolute; left:620px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:540px; top:60px; width:80px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:614px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:515px; top:180px; width:125px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:581.5px; top:168px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:640px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:636px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:695px; top:330px; width:45px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:734px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>

    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">2.4 Asset Retirement</h3>
        <p class="text-gray-600 text-sm mb-4">
            Prosedur penghentian/penghapusan aset (<em>Asset Retirement</em>). Sama dengan proses lainnya, DMS menerapkan Digital Approval. Departemen terkait mengajukan permohonan <em>disposal</em> (pembuangan/penjualan aset). Setelah disetujui, sistem akan otomatis menjurnal transaksi penghentian tersebut berdasarkan tipe: <strong>Scrap</strong> (hapus buku tanpa nilai jual) atau <strong>Sale / With Revenue</strong> (dijual dan menerbitkan Piutang/AR Invoicing).
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Department<br/>Requestor</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance<br/>Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-req\' style=\'position:absolute; left:180px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Submit Asset<br/>Disposal Request</div>
<div id=\'box-rev\' style=\'position:absolute; left:300px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Disposal<br/>Request</div>
<div id=\'dia-appr\' style=\'position:absolute; left:445px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:445px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:420px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject & Notify<br/>Requestor</div>
<div id=\'box-end_rej\' style=\'position:absolute; left:570px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div id=\'dia-revn\' style=\'position:absolute; left:565px; top:305px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:565px; top:305px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>With<br/>Revenue?</div>
<div id=\'box-sale\' style=\'position:absolute; left:665px; top:155px; width:100px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate AR &<br/>Retirement Journal</div>
<div id=\'box-inc_pay\' style=\'position:absolute; left:795px; top:160px; width:80px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Proceed to<br/>Incoming Payment</div>
<div id=\'box-scrap\' style=\'position:absolute; left:665px; top:305px; width:100px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Scrapping<br/>Journal (Write-off)</div>
<div id=\'box-end\' style=\'position:absolute; left:815px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:174px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:280px; top:60px; width:70px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:350px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:346px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:400px; top:180px; width:45px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:439px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:470px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:466px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:476px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:520px; top:60px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:564px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:495px; top:180px; width:95px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:538.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:590px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:586px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:590px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:596px; top:236.5px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y (Sale)</div>
<div style=\'position:absolute; left:590px; top:180px; width:75px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:659px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:615px; top:330px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:659px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:636px; top:316px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N (Scrap)</div>
<div style=\'position:absolute; left:765px; top:180px; width:30px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:789px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:765px; top:330px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:809px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>
</div>
<div id="section-3" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;">
        <span>3. ASSET</span>
       
    </h2>
    
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.1 Settlement Asset Under Construction</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses pemindahan (<em>Settlement</em>) nilai Aset Dalam Penyelesaian (<em>Asset Under Construction / AuC</em>) menjadi Aset Tetap (<em>Fixed Asset</em>). Dalam aplikasi DMS skala SME ini, alur penyelesaian disederhanakan secara terpusat melalui satu pintu persetujuan Berita Acara Serah Terima (BAST). Begitu Finance Manager menyetujui BAST tersebut, sistem akan secara otomatis mengeksekusi Jurnal Settlement (Kredit AuC, Debit Fixed Asset) dan merilis ID Aset Tetap final secara bersamaan.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Project<br/>Department</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance<br/>Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:80px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-req\' style=\'position:absolute; left:200px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Submit Handover<br/>(BAST) for AuC</div>
<div id=\'box-rev\' style=\'position:absolute; left:350px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review AuC<br/>Settlement</div>
<div id=\'dia-appr\' style=\'position:absolute; left:515px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:515px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:490px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject & Notify<br/>Project Dept</div>
<div id=\'box-save\' style=\'position:absolute; left:630px; top:305px; width:140px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Asset ID &<br/>Execute Settlement Journal</div>
<div id=\'box-end\' style=\'position:absolute; left:820px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:120px; top:60px; width:80px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:194px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:300px; top:60px; width:100px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:400px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:396px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:450px; top:180px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:509px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:540px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:536px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:546px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:590px; top:60px; width:250px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:840px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:836px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:565px; top:180px; width:135px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:628.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:700px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:696px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:770px; top:330px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:814px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>

    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.2 Purchase Invoice Verification</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses Verifikasi Faktur Pembelian (<em>Purchase Invoice</em>). AP Staff hanya perlu menginput data tagihan (Invoice) dari Vendor dan memastikan nilainya cocok dengan <em>Purchase Order</em> (PO) dan <em>Goods Receipt</em> (GR) (3-Way Matching). Setelah AP Manager melakukan verifikasi dan menyetujui, sistem akan langsung membuat Jurnal AP (Account Payable) dan mencatat <em>Open Item</em> tagihan vendor yang siap dibayar.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">AP Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">AP Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:190px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Input Vendor Invoice<br/>(3-Way Match)</div>
<div id=\'box-rev\' style=\'position:absolute; left:320px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Invoice<br/>& Tax (VAT)</div>
<div id=\'dia-appr\' style=\'position:absolute; left:475px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:475px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:460px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>AP Staff</div>
<div id=\'box-save\' style=\'position:absolute; left:580px; top:305px; width:120px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate AP Journal<br/>& Vendor Open Item</div>
<div id=\'box-pay\' style=\'position:absolute; left:725px; top:310px; width:90px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Proceed to<br/>Payment Process</div>
<div id=\'box-end\' style=\'position:absolute; left:820px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:60px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:184px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:290px; top:60px; width:80px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:370px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:366px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:420px; top:180px; width:55px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:469px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:500px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:496px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:506px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:540px; top:60px; width:300px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:840px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:836px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:525px; top:180px; width:115px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:578.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:640px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:636px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:700px; top:330px; width:25px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:719px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:815px; top:330px; width:5px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:814px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>

    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">3.3 PIV - Debit Memo</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses verifikasi untuk Nota Debit (<em>Debit Memo</em>) yang berfungsi mengurangi saldo hutang kepada vendor akibat adanya retur barang atau penyesuaian harga (<em>Price Correction</em>). AP Staff cukup menginput form retur (Debit Memo). Setelah Manager menyetujuinya, sistem langsung memotong saldo <em>Account Payable</em> secara otomatis tanpa perlu intervensi jurnal manual tambahan.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">AP Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">AP Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:195px; top:35px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Input Debit Memo<br/>(Retur / Koreksi)</div>
<div id=\'box-rev\' style=\'position:absolute; left:340px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Debit<br/>Memo</div>
<div id=\'dia-appr\' style=\'position:absolute; left:495px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:495px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:480px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>AP Staff</div>
<div id=\'box-save\' style=\'position:absolute; left:605px; top:305px; width:130px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Debit Memo<br/>& Reduce AP Balance</div>
<div id=\'box-end\' style=\'position:absolute; left:810px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:189px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:305px; top:60px; width:85px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:390px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:386px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:440px; top:180px; width:55px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:489px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:520px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:516px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:526px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:560px; top:60px; width:270px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:830px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:826px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:545px; top:180px; width:125px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:603.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:670px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:666px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:735px; top:330px; width:75px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:804px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>
</div>
<div id="section-4" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;">
        <span>4. ACCOUNT PAYABLE</span>
       
    </h2>
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">4.1 FI Vendor Invoice (Other Expenses)</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses pencatatan tagihan vendor yang <strong>tidak melalui proses pengadaan logistik (Non-PO)</strong>, seperti tagihan listrik, air, internet, biaya konsultan, maupun layanan ad-hoc lainnya. AP Staff memasukkan rincian tagihan beserta alokasi biayanya (Cost Center / GL Account). Setelah AP Manager memvalidasi keabsahan tagihan, sistem mencatat jurnal Biaya/Expense terhadap Hutang/AP, lalu tagihan tersebut siap ditarik ke dalam proses pembayaran rutin.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">AP Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">AP Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:190px; top:35px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Input Non-PO Invoice<br/>(GL Account / CC)</div>
<div id=\'box-rev\' style=\'position:absolute; left:320px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Invoice<br/>& Cost Allocation</div>
<div id=\'dia-appr\' style=\'position:absolute; left:475px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:475px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:460px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>AP Staff</div>
<div id=\'box-save\' style=\'position:absolute; left:580px; top:305px; width:120px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate AP Journal<br/>(Expense vs AP)</div>
<div id=\'box-pay\' style=\'position:absolute; left:725px; top:310px; width:90px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Proceed to<br/>Payment Process</div>
<div id=\'box-end\' style=\'position:absolute; left:820px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:60px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:184px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:290px; top:60px; width:80px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:370px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:366px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:420px; top:180px; width:55px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:469px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:500px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:496px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:506px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:540px; top:60px; width:300px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:840px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:836px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:525px; top:180px; width:115px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:578.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:640px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:636px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:700px; top:330px; width:25px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:719px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:815px; top:330px; width:5px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:814px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>

    
    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">4.2 Vendor Payment (Outgoing Payment)</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses pembayaran ke Vendor untuk melunasi Hutang (<em>Account Payable / Open Item</em>) yang telah jatuh tempo. Treasury Staff akan menyeleksi tagihan-tagihan mana saja yang siap dibayar lalu membuat <em>Payment Voucher (PV)</em>. Setelah Finance Manager menyetujuinya, sistem akan langsung mengeksekusi Jurnal Pembayaran Keluar (<em>Kredit Bank, Debit Hutang</em>) dan otomatis membersihkan saldo <em>Open Item</em> tagihan (<em>Clearing</em>). Setelahnya, staf dapat memproses transfer e-Banking.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Treasury Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:100px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:190px; top:35px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Create Payment Voucher<br/>(Select AP Invoices)</div>
<div id=\'box-rev\' style=\'position:absolute; left:330px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Payment<br/>Voucher & Balance</div>
<div id=\'dia-appr\' style=\'position:absolute; left:460px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:460px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:445px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>Treasury</div>
<div id=\'box-save\' style=\'position:absolute; left:540px; top:305px; width:120px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Outgoing<br/>Payment Journal (Clear AP)</div>
<div id=\'box-pay\' style=\'position:absolute; left:675px; top:310px; width:100px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Proceed to e-Banking<br/>Transfer / Cheque</div>
<div id=\'box-end\' style=\'position:absolute; left:805px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:140px; top:60px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:184px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:310px; top:60px; width:70px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:380px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:376px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:430px; top:180px; width:30px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:454px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:485px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:481px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:491px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:525px; top:60px; width:300px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:825px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:821px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:510px; top:180px; width:90px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:551px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:600px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:596px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:660px; top:330px; width:15px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:669px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:775px; top:330px; width:30px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:799px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
</div>
        </div>
    </div>

    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">4.3 Petty Cash Replenishment</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses pengisian kembali (<em>Replenishment</em>) dana kas kecil (<em>Petty Cash / Cash Journal</em>). Cashier selaku pemegang kas kecil akan mengajukan permohonan pengisian dana apabila saldo kas fisik sudah mencapai batas minimum. Setelah divalidasi dan disetujui oleh Finance Manager, sistem secara otomatis akan menerbitkan Jurnal Pengisian (Kredit Bank, Debit Petty Cash) dan proses berlanjut ke penarikan dana fisik dari Bank.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Cashier</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:100px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:190px; top:35px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Submit Replenishment<br/>Request</div>
<div id=\'box-rev\' style=\'position:absolute; left:330px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Request<br/>& Actual Balance</div>
<div id=\'dia-appr\' style=\'position:absolute; left:460px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:460px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:445px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>Cashier</div>
<div id=\'box-save\' style=\'position:absolute; left:540px; top:305px; width:120px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Journal<br/>(Dr. Petty Cash, Cr. Bank)</div>
<div id=\'box-pay\' style=\'position:absolute; left:675px; top:310px; width:100px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Proceed to Bank<br/>Withdrawal</div>
<div id=\'box-end\' style=\'position:absolute; left:805px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:140px; top:60px; width:50px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:184px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:310px; top:60px; width:70px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:380px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:376px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:430px; top:180px; width:30px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:454px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:485px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:481px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:491px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:525px; top:60px; width:300px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:825px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:821px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:510px; top:180px; width:90px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:551px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:600px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:596px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:660px; top:330px; width:15px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:669px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:775px; top:330px; width:30px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:799px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
</div>
        </div>
    </div>

    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">4.4 Petty Cash Outgoing Payment</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses pencatatan pengeluaran dana tunai (<em>Petty Cash Disbursement</em>) untuk operasional harian berskala kecil (misalnya pembayaran tol, bensin, atau perlengkapan kantor darurat). Staf/Cashier menginput transaksi beserta bukti/nota. Setelah disetujui, sistem membuat jurnal (Debit Beban Operasional, Kredit Petty Cash), dan uang fisik diserahkan kepada karyawan yang bersangkutan.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Cashier</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:150px; top:35px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Input Petty Cash<br/>Expense (w/ Receipt)</div>
<div id=\'box-rev\' style=\'position:absolute; left:285px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Expense<br/>& Cost Center</div>
<div id=\'dia-appr\' style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:395px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>Cashier</div>
<div id=\'box-save\' style=\'position:absolute; left:500px; top:305px; width:130px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Journal<br/>(Dr. Expense, Cr. Petty Cash)</div>
<div id=\'box-pay\' style=\'position:absolute; left:650px; top:310px; width:110px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Dispense Physical<br/>Cash to Staff</div>
<div id=\'box-end\' style=\'position:absolute; left:790px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:144px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:270px; top:60px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:335px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:331px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:385px; top:180px; width:25px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:404px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:435px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:431px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:441px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:475px; top:60px; width:335px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:810px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:806px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:460px; top:180px; width:105px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:508.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:565px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:561px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:630px; top:330px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:644px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:760px; top:330px; width:30px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:784px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>
</div>

    <div id="section-5" class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 border-b-2 border-indigo-500 pb-2 mb-6">5. Treasury & Bank Management</h2>
        
        <h3 class="font-bold text-gray-800 text-lg mb-4">5.1 Manual Bank Statement</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses penginputan atau pengunggahan Rekening Koran (<em>Bank Statement</em>). Treasury Staff menyalin mutasi dari Bank ke dalam sistem DMS. Setelah saldo divalidasi dan disetujui, sistem akan membentuk jurnal penerimaan/pengeluaran bank terhadap akun sementara (<em>Unallocated / Clearing Account</em>). Transaksi ini kemudian menunggu proses identifikasi lebih lanjut (rekonsiliasi) untuk dialokasikan ke pelunasan Piutang atau Hutang.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Treasury Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:150px; top:35px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Input / Upload<br/>Bank Statement</div>
<div id=\'box-rev\' style=\'position:absolute; left:280px; top:155px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Statement<br/>& Validate Balances</div>
<div id=\'dia-appr\' style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:395px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>Treasury</div>
<div id=\'box-save\' style=\'position:absolute; left:495px; top:305px; width:140px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Bank Journal<br/>(Bank vs Unallocated)</div>
<div id=\'box-pay\' style=\'position:absolute; left:655px; top:310px; width:100px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Proceed to<br/>Reconciliation</div>
<div id=\'box-end\' style=\'position:absolute; left:790px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:144px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:270px; top:60px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:335px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:331px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:390px; top:180px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:404px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:435px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:431px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:441px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:475px; top:60px; width:335px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:810px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:806px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:460px; top:180px; width:105px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:508.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:565px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:561px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:635px; top:330px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:649px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:755px; top:330px; width:35px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:784px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    
    </div>
<div id="section-6" class="mb-12">
    <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;">
        <span>6. ACCOUNT RECEIVABLE</span>
       
    </h2>
<div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">6.1 Customer Advance Payment</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses pencatatan penerimaan uang muka (<em>Down Payment</em>) dari pelanggan. AR Staff menginput data penerimaan uang muka. Setelah divalidasi oleh Finance Manager, sistem akan otomatis menjurnal Kas/Bank terhadap Akun Uang Muka Pelanggan. Nantinya, saat tagihan akhir (<em>Sales Invoice</em>) terbit, Uang Muka ini akan dipotong secara otomatis dalam proses pencocokan (<em>Clearing</em>) 
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">AR Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:150px; top:35px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Input Customer<br/>Advance Payment</div>
<div id=\'box-rev\' style=\'position:absolute; left:285px; top:155px; width:100px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Advance<br/>& Customer Acc.</div>
<div id=\'dia-appr\' style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:395px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>AR Staff</div>
<div id=\'box-save\' style=\'position:absolute; left:500px; top:305px; width:130px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Advance Journal<br/>(Bank vs Cust Advance)</div>
<div id=\'box-pay\' style=\'position:absolute; left:650px; top:310px; width:110px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Ready for Sales<br/>Invoice Clearing</div>
<div id=\'box-end\' style=\'position:absolute; left:790px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:144px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:270px; top:60px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:335px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:331px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:385px; top:180px; width:25px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:404px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:435px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:431px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:441px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:475px; top:60px; width:335px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:810px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:806px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:460px; top:180px; width:105px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:508.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:565px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:561px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:630px; top:330px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:644px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:760px; top:330px; width:30px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:784px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>


    
    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">6.2 Collection Process</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses penagihan piutang (<em>Account Receivable</em>) kepada pelanggan (<em>Customer</em>). AR Staff menyusun daftar penagihan (<em>Billing / Collection List</em>) berdasarkan tagihan yang sudah atau akan jatuh tempo. Setelah divalidasi oleh Finance Manager, sistem mengunci dokumen tagihan tersebut dan staf dapat mengirimkannya ke pelanggan. Status pembayaran dan jatuh tempo akan dipantau oleh sistem (<em>Aging Report</em>).
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">AR Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:150px; top:35px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Collection<br/>List / Billing</div>
<div id=\'box-rev\' style=\'position:absolute; left:280px; top:155px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Collection<br/>List & AR Balance</div>
<div id=\'dia-appr\' style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:395px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>AR Staff</div>
<div id=\'box-save\' style=\'position:absolute; left:495px; top:305px; width:140px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Finalize Billing<br/>& Dispatch to Customer</div>
<div id=\'box-pay\' style=\'position:absolute; left:655px; top:310px; width:100px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Monitor Due Dates<br/>& Follow Up</div>
<div id=\'box-end\' style=\'position:absolute; left:790px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:144px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:270px; top:60px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:335px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:331px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:390px; top:180px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:404px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:435px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:431px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:441px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:475px; top:60px; width:335px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:810px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:806px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:460px; top:180px; width:105px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:508.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:565px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:561px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:635px; top:330px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:649px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:755px; top:330px; width:35px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:784px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>

    <div class="mt-8 mb-4 border-t pt-8">
        <h3 class="font-bold text-gray-800 text-lg mb-4">6.3 Incoming Payment</h3>
        <p class="text-gray-600 text-sm mb-4">
            Proses penerimaan pembayaran dari pelanggan (<em>Incoming Payment</em>). AR Staff menerima konfirmasi transfer dan memasukkan data pembayaran, lalu mencocokkannya (<em>Clearing</em>) dengan faktur piutang yang bersangkutan. Setelah divalidasi manajer, sistem menjurnal penerimaan (Debit Kas/Bank, Kredit Piutang) dan membersihkan status <em>Open Item</em> pelanggan.
        </p>
        
        <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">AR Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:150px; top:35px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Input Incoming Payment<br/>(Select AR Invoices)</div>
<div id=\'box-rev\' style=\'position:absolute; left:280px; top:155px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Payment &<br/>Invoice Allocation</div>
<div id=\'dia-appr\' style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:395px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>AR Staff</div>
<div id=\'box-save\' style=\'position:absolute; left:495px; top:305px; width:140px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate Incoming Payment<br/>Journal (Clear AR)</div>
<div id=\'box-pay\' style=\'position:absolute; left:655px; top:310px; width:100px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Update Customer<br/>Balance</div>
<div id=\'box-end\' style=\'position:absolute; left:790px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:144px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:270px; top:60px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:335px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:331px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:390px; top:180px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:404px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:435px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:431px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:441px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:475px; top:60px; width:335px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:810px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:806px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:460px; top:180px; width:105px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:508.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:565px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:561px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:635px; top:330px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:649px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:755px; top:330px; width:35px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:784px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
        </div>
    </div>
</div>

    <div id="section-7" class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 border-b-2 border-indigo-500 pb-2 mb-6">7. General Ledger</h2>
        
        <div class="mt-8 mb-4 border-t pt-8">
            <h3 class="font-bold text-gray-800 text-lg mb-4">7.1 Memorial Journal</h3>
            <p class="text-gray-600 text-sm mb-4">
                Proses pencatatan Jurnal Umum (<em>Memorial Journal</em>) untuk transaksi non-kas, penyesuaian (<em>adjustment</em>), koreksi, maupun akrual. GL Staff menginput kombinasi debit dan kredit ke akun-akun buku besar yang bersangkutan. Setelah divalidasi oleh Finance Manager agar sesuai dengan standar akuntansi, jurnal akan diposting dan secara otomatis langsung memperbarui Laporan Keuangan.
            </p>
            
            <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">GL Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:150px; top:35px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Input Memorial Journal<br/>/ Adjustment</div>
<div id=\'box-rev\' style=\'position:absolute; left:280px; top:155px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Journal &<br/>GL Accounts</div>
<div id=\'dia-appr\' style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:395px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject to<br/>GL Staff</div>
<div id=\'box-save\' style=\'position:absolute; left:495px; top:305px; width:140px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Post Journal to<br/>General Ledger</div>
<div id=\'box-pay\' style=\'position:absolute; left:655px; top:310px; width:100px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Update Financial<br/>Reports</div>
<div id=\'box-end\' style=\'position:absolute; left:790px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:144px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:270px; top:60px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:335px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:331px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:390px; top:180px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:404px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:435px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:431px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:441px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:475px; top:60px; width:335px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:810px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:806px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:460px; top:180px; width:105px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:508.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:565px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:561px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:635px; top:330px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:649px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:755px; top:330px; width:35px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:784px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
            </div>
        </div>
    </div>


    <div id="section-8" class="mb-12">
        <h2 class="text-2xl font-bold text-gray-900 border-b-2 border-indigo-500 pb-2 mb-6">8. Financial Closing</h2>
        
        <div class="mt-8 mb-4 border-t pt-8">
            <h3 class="font-bold text-gray-800 text-lg mb-4">8.1 FI Closing Process</h3>
            <p class="text-gray-600 text-sm mb-4">
                Proses penutupan periode keuangan (<em>Month-End / Year-End Closing</em>). GL Staff menjalankan program-program akhir bulan (seperti perhitungan penyusutan aset, penyesuaian kurs otomatis). Setelah Finance Manager/Director memastikan seluruh Laporan Keuangan (Neraca, Laba/Rugi) valid, sistem akan mengunci periode pencatatan (<em>Close Posting Period</em>) sehingga tidak ada lagi transaksi yang bisa disisipkan pada bulan tersebut, dan laporan keuangan final siap didistribusikan.
            </p>
            
            <div class="bg-white border border-gray-200 rounded-lg p-4 overflow-x-auto shadow-sm my-6 flex justify-center">
<div style="position:relative; width:880px; height:420px; font-family:sans-serif; font-size:10px; background:#f8fafc; border:1px solid #cbd5e1; flex-shrink:0;">
                
                <!-- Swimlanes Backgrounds & Labels -->
                <div style="position:absolute; left:0; top:0; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:0; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">GL Staff</div>

                <div style="position:absolute; left:0; top:120px; width:880px; height:120px; border-bottom:1px solid #cbd5e1; background:#fff; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:120px; width:80px; height:120px; border-right:2px solid #cbd5e1; background:#f8fafc; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">Finance Manager</div>

                <div style="position:absolute; left:0; top:240px; width:880px; height:180px; background:#f1f5f9; box-sizing:border-box;"></div>
                <div style="position:absolute; left:0; top:240px; width:80px; height:180px; border-right:2px solid #cbd5e1; background:#e2e8f0; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#334155; text-align:center;">DMS System</div>
<div id=\'box-start\' style=\'position:absolute; left:90px; top:40px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Start</div>
<div id=\'box-input\' style=\'position:absolute; left:150px; top:35px; width:120px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Execute Month-End<br/>Closing Programs</div>
<div id=\'box-rev\' style=\'position:absolute; left:280px; top:155px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Review Final<br/>Financial Statements</div>
<div id=\'dia-appr\' style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; background:#fef08a; border:2px solid #eab308; transform: rotate(45deg); z-index:10; box-shadow: 0 1px 3px rgba(0,0,0,0.1);\'></div>
<div style=\'position:absolute; left:410px; top:155px; width:50px; height:50px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#ca8a04; font-size:9px; line-height:1.1;\'>Approve?</div>
<div id=\'box-rej\' style=\'position:absolute; left:395px; top:35px; width:80px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Reject /<br/>Adjustment</div>
<div id=\'box-save\' style=\'position:absolute; left:500px; top:305px; width:130px; height:50px; background:#f0fdf4; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#15803d; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Close Posting Period<br/>& Lock Transactions</div>
<div id=\'box-pay\' style=\'position:absolute; left:650px; top:310px; width:110px; height:40px; background:#f8fafc; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#334155; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>Generate & Distribute<br/>Final Reports</div>
<div id=\'box-end\' style=\'position:absolute; left:790px; top:310px; width:40px; height:40px; background:#fff; border:2px solid #94a3b8; border-radius:20px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#475569; font-size:9px; padding:4px; box-sizing:border-box; box-shadow: 0 1px 3px rgba(0,0,0,0.1); line-height:1.2;\'>End</div>
<div style=\'position:absolute; left:130px; top:60px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:144px; top:56px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:270px; top:60px; width:65px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:335px; top:60px; width:2px; height:95px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:331px; top:149px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:390px; top:180px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:404px; top:176px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:435px; top:85px; width:2px; height:70px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:431px; top:85px; border-left:5px solid transparent; border-right:5px solid transparent; border-bottom:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:441px; top:114px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>N</div>
<div style=\'position:absolute; left:475px; top:60px; width:335px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:810px; top:60px; width:2px; height:250px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:806px; top:304px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:460px; top:180px; width:105px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:508.5px; top:166px; font-weight:bold; color:#475569; font-size:9px; z-index:5;\'>Y</div>
<div style=\'position:absolute; left:565px; top:180px; width:2px; height:125px; border-left:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:561px; top:299px; border-left:5px solid transparent; border-right:5px solid transparent; border-top:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:630px; top:330px; width:20px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:644px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>
<div style=\'position:absolute; left:760px; top:330px; width:30px; height:2px; border-top:2px solid #64748b; z-index:1;\'></div>
<div style=\'position:absolute; left:784px; top:326px; border-top:5px solid transparent; border-bottom:5px solid transparent; border-left:6px solid #64748b; z-index:2;\'></div>

            </div>
            </div>
        </div>
    </div>',
            'out_of_scope' => '<ul><li>Pembuatan tagihan (Billing) awal (Ini dikelola otomatis oleh SD yang melempar nilainya ke FI).</li><li>Verifikasi kuantitas penerimaan barang di gudang (Dikelola oleh MM).</li></ul>',
                'status' => 'Draft',
                'author_id' => NULL,
                'approved_by' => NULL,
                'approved_at' => NULL,
                'created_at' => '2026-07-10 22:54:00',
                'updated_at' => '2026-07-12 05:07:36',
                'document_history' => NULL,
                'document_distribution' => NULL,
                'flowcharts' => NULL,
                'table_of_contents' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'project_id' => 1,
            'title' => '04. Blue Print - Modul PP (Production Planning)',
            'background' => '<p>Modul <strong>Production Planning (PP) / Manufacturing</strong> mengelola seluruh siklus produksi, mulai dari pendefinisian formula Bill of Material (BOM), perumusan Work Order, hingga eksekusi pemakaian material dan penerimaan barang jadi. Modul ini terintegrasi erat dengan modul MM dalam proses Inventory Movement (Goods Issue & Goods Receipt).</p><p>Sesuai dengan pendekatan Minimum Viable Product (Phase 1), cakupan modul ini berfokus pada pengendalian eksekusi Work Order dan validasi ketersediaan bahan baku untuk mencegah defisit persediaan saat produksi berlangsung.</p>',
                'scope' => '<div id="section-1" class="mb-12">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>1. BACKGROUND</span></h2>
        <div class="mb-8 mt-6">
            <p class="mb-4 text-sm text-gray-700">Modul <strong>Production Planning (PP) / Manufacturing</strong> mengelola seluruh siklus produksi, mulai dari pendefinisian formula Bill of Material (BOM), perumusan Work Order, hingga eksekusi pemakaian material dan penerimaan barang jadi. Sesuai dengan pendekatan Minimum Viable Product (Phase 1), cakupan modul ini berfokus pada eksekusi produksi dasar (repacking, blending, assembling sederhana).</p>
        </div>
    </div>
    <section id="section-2" class="mb-12 border-t pt-8">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>2. SCOPE</span></h2>
        <div class="mb-8 mt-6">
            <p class="mb-4 text-sm text-gray-700">Ruang lingkup Phase 1 dibatasi untuk pengendalian eksekusi Work Order, validasi ketersediaan bahan baku, serta pergerakan persediaan yang timbul akibat proses perakitan (Goods Receipt & Backflush).</p>
        </div>
    </section>

    <section id="section-3" class="mb-12 border-t pt-8">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>3. ORGANIZATION STRUCTURE</span></h2>
        <div class="mb-8 mt-6">
            <h3 class="font-bold text-gray-800 text-lg mb-4">Production Area / Work Center</h3>
            <p class="mb-4 text-sm text-gray-700">Dalam sistem ini, area produksi tidak dibuat sebagai Warehouse tersendiri, melainkan dikelola sebagai bagian dari <strong>Branch</strong> yang sama. Pemisahan dilakukan secara logis melalui penetapan <strong>Storage Location</strong> khusus produksi (misal: Sloc WIP atau Sloc Production) untuk menampung pergerakan material saat Work Order dieksekusi.</p>
            
            <div class="mt-6 bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto flex justify-center shadow-sm">
                <div style="position:relative; width:450px; height:280px; font-family:sans-serif; font-size:12px; margin:0 auto;">
                    
                    <!-- Company Code -->
                    <div style="position:absolute; left:175px; top:20px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;">
                        <div style="font-weight:bold; color:#0f172a;">Company Code</div>
                    </div>
                    
                    <!-- Vertical Line down from Company Code -->
                    <div style="position:absolute; left:224px; top:70px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;"></div>
                    
                    <!-- Branch -->
                    <div style="position:absolute; left:175px; top:100px; width:100px; height:50px; background:#e0f2fe; border:2px solid #0ea5e9; border-radius:6px; padding:6px; text-align:center; box-shadow: 0 4px 6px rgba(0,0,0,0.05); z-index:10; display:flex; flex-direction:column; justify-content:center;">
                        <div style="font-weight:bold; color:#0f172a;">Branch</div>
                    </div>

                    <!-- Vertical Line down from Branch -->
                    <div style="position:absolute; left:224px; top:150px; width:20px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;"></div>

                    <!-- Horizontal Line connecting the two slocs -->
                    <div style="position:absolute; left:110px; top:170px; width:230px; height:2px; background:#94a3b8; z-index:1;"></div>

                    <!-- Vertical Line down to Main Sloc -->
                    <div style="position:absolute; left:110px; top:170px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;"></div>

                    <!-- Vertical Line down to Production Sloc -->
                    <div style="position:absolute; left:338px; top:170px; width:30px; height:2px; background:#94a3b8; transform-origin:0 50%; transform: rotate(90deg); z-index:1;"></div>

                    <!-- Main Sloc -->
                    <div style="position:absolute; left:50px; top:200px; width:120px; height:60px; background:#fff; border:2px solid #3b82f6; border-radius:6px; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#1e40af; z-index:10; box-shadow:0 1px 3px rgba(0,0,0,0.1);">
                        Main Sloc<br/>(Raw Material)
                    </div>

                    <!-- Production Sloc -->
                    <div style="position:absolute; left:280px; top:200px; width:120px; height:60px; background:#fff; border:2px solid #a855f7; border-radius:6px; display:flex; justify-content:center; align-items:center; text-align:center; font-weight:bold; color:#7e22ce; z-index:10; box-shadow:0 1px 3px rgba(0,0,0,0.1);">
                        Production Sloc<br/>(WIP Area)
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div id="section-4" class="mb-12 border-t pt-8">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>4. MASTER DATA</span></h2>
        <div class="mt-8 mb-4 border-t pt-8">
            <table class="brd-table">
                <thead style="background-color: #64748b; color: white;">
                    <tr>
                        <th style="width: 30%; border-color: #475569;">Sub-Bab</th>
                        <th style="border-color: #475569;">Penjelasan Bisnis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-bold text-gray-800">4.1. Bill of Material (BOM)</td>
                        <td class="text-sm text-gray-700">BOM mendefinisikan formula standar untuk memproduksi barang jadi (Finished Good). Komponen dalam BOM dapat berupa Raw Material, Packaging, atau Semi-Finished Good. Pengelolaan Routing tidak disertakan pada fase ini.</td>
                    </tr>
                    <tr>
                        <td class="font-bold text-gray-800">4.2. BOM Snapshot</td>
                        <td class="text-sm text-gray-700">Work Order menyimpan salinan (<em>snapshot</em>) BOM pada saat dibuat. Perubahan formula master di masa depan tidak akan memengaruhi Work Order lama yang sedang berjalan (contoh: jika formula berubah dari 10 kg menjadi 8 kg, WO lama tetap menggunakan acuan 10 kg).</td>
                    </tr>
                    <tr>
                        <td class="font-bold text-gray-800">4.3. Production Sloc</td>
                        <td class="text-sm text-gray-700">Seluruh transaksi produksi dilakukan terhadap <em>Storage Location Produksi</em> (Area WIP). Apabila perusahaan tidak menggunakan WIP Storage Location, sistem dapat langsung mengonsumsi Raw Material dari Main Storage Location sesuai konfigurasi Branch.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div id="section-5" class="mb-12 border-t pt-8">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>5. WORK ORDER</span></h2>
        
        <div class="mt-8 mb-4 border-t pt-8">
            <h3 class="font-bold text-gray-800 text-lg mb-4">5.1. Work Order Attributes</h3>
            <table class="brd-table">
                <thead style="background-color: #64748b; color: white;">
                    <tr>
                        <th style="width: 30%; border-color: #475569;">Attribute</th>
                        <th style="border-color: #475569;">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="font-bold text-gray-800">WO Number</td><td class="text-sm text-gray-700">Nomor seri unik dokumen produksi.</td></tr>
                    <tr><td class="font-bold text-gray-800">WO Date</td><td class="text-sm text-gray-700">Tanggal pembuatan dokumen.</td></tr>
                    <tr><td class="font-bold text-gray-800">Branch</td><td class="text-sm text-gray-700">Cabang pelaksana produksi.</td></tr>
                    <tr><td class="font-bold text-gray-800">FG Item</td><td class="text-sm text-gray-700">Barang jadi yang akan diproduksi.</td></tr>
                    <tr><td class="font-bold text-gray-800">Planned Qty</td><td class="text-sm text-gray-700">Target kuantitas yang diproduksi.</td></tr>
                    <tr><td class="font-bold text-gray-800">Status</td><td class="text-sm text-gray-700">Status siklus dokumen.</td></tr>
                    <tr><td class="font-bold text-gray-800">BOM Version</td><td class="text-sm text-gray-700">Acuan formula <em>snapshot</em> yang digunakan.</td></tr>
                    <tr><td class="font-bold text-gray-800">Production Sloc</td><td class="text-sm text-gray-700">Lokasi gudang eksekusi produksi (opsional).</td></tr>
                </tbody>
            </table>

            <h3 class="font-bold text-gray-800 text-lg mb-4">5.2. Lifecycle & Workflow</h3>
            <div class="bg-white border border-gray-200 rounded-lg p-6 overflow-x-auto flex justify-center shadow-sm">
                <div style="position:relative; width:1080px; height:320px; font-family:sans-serif; font-size:11px; margin:0 auto;">
                    <div style="position:absolute; left:20px; top:20px; width:1040px; height:280px; border:2px solid #cbd5e1; border-radius:8px; background:#f8fafc; z-index:0;"></div>
                    <div style="position:absolute; left:20px; top:20px; width:30px; height:280px; border-right:2px solid #cbd5e1; background:#f1f5f9; border-top-left-radius:6px; border-bottom-left-radius:6px; display:flex; justify-content:center; align-items:center; z-index:1;">
                        <span style="transform: rotate(-90deg); white-space:nowrap; font-weight:bold; color:#475569; letter-spacing:1px; font-size:12px;">Work Order Process</span>
                    </div>

                    <!-- Start -->
                    <div style="position:absolute; left:70px; top:70px; width:50px; height:30px; background:#fff; border:2px solid #94a3b8; border-radius:15px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">Start</div>
                    <!-- Line 1 -->
                    <div style="position:absolute; left:120px; top:84px; width:30px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:145px; top:81px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                    <!-- Create WO -->
                    <div style="position:absolute; left:150px; top:60px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
                        <div style="font-weight:bold; color:#1e40af; font-size:11px;">Create WO</div>
                        <div style="font-size:9px; color:#64748b;">(Draft)</div>
                    </div>
                    
                    <!-- Line to Approval -->
                    <div style="position:absolute; left:260px; top:84px; width:50px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:305px; top:81px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                    <!-- Approval Check -->
                    <div style="position:absolute; left:310px; top:55px; width:60px; height:60px; background:#fff; border:2px solid #f97316; z-index:10; transform:rotate(45deg);"></div>
                    <div style="position:absolute; left:310px; top:55px; width:60px; height:60px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-size:10px; font-weight:bold; color:#c2410c;">Approved?</div>

                    <!-- Line Approval to Avail (Yes) -->
                    <div style="position:absolute; left:370px; top:84px; width:70px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:435px; top:81px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                    <div style="position:absolute; left:395px; top:70px; font-size:9px; font-weight:bold; color:#475569;">Y</div>

                    <!-- Line Approval to Reject (No) -->
                    <div style="position:absolute; left:339px; top:115px; width:2px; height:35px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:336px; top:145px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                    <div style="position:absolute; left:345px; top:125px; font-size:9px; font-weight:bold; color:#475569;">N</div>

                    <!-- Rejected Box -->
                    <div style="position:absolute; left:300px; top:150px; width:80px; height:40px; background:#fff; border:2px solid #ef4444; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center;">
                        <div style="font-weight:bold; color:#dc2626; font-size:10px;">Rejected</div>
                    </div>
                    
                    <!-- Line Reject to End -->
                    <div style="position:absolute; left:339px; top:190px; width:2px; height:29px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:336px; top:215px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>

                    <!-- Avail Check -->
                    <div style="position:absolute; left:440px; top:55px; width:60px; height:60px; background:#fff; border:2px solid #eab308; z-index:10; transform:rotate(45deg);"></div>
                    <div style="position:absolute; left:440px; top:55px; width:60px; height:60px; z-index:11; display:flex; justify-content:center; align-items:center; text-align:center; font-size:10px; font-weight:bold; color:#ca8a04;">Avail<br>Check?</div>
                    
                    <!-- Line 3 (Yes to Release) -->
                    <div style="position:absolute; left:500px; top:84px; width:60px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:555px; top:81px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>
                    <div style="position:absolute; left:520px; top:70px; font-size:9px; font-weight:bold; color:#475569;">Y</div>

                    <!-- Line 3b (No to Hold) -->
                    <div style="position:absolute; left:469px; top:115px; width:2px; height:35px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:466px; top:145px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>
                    <div style="position:absolute; left:475px; top:125px; font-size:9px; font-weight:bold; color:#475569;">N</div>

                    <!-- Hold Box -->
                    <div style="position:absolute; left:430px; top:150px; width:80px; height:40px; background:#fff; border:2px dashed #ef4444; border-radius:6px; z-index:10; display:flex; justify-content:center; align-items:center; text-align:center;">
                        <div style="font-weight:bold; color:#ef4444; font-size:10px;">Pending<br>(Hold)</div>
                    </div>

                    <!-- Release WO -->
                    <div style="position:absolute; left:560px; top:60px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
                        <div style="font-weight:bold; color:#1e40af; font-size:11px;">Release WO</div>
                    </div>
                    <!-- Line 4 -->
                    <div style="position:absolute; left:670px; top:84px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:705px; top:81px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                    <!-- Prod Execution -->
                    <div style="position:absolute; left:710px; top:60px; width:110px; height:50px; background:#fff; border:2px solid #a855f7; border-radius:6px; z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
                        <div style="font-weight:bold; color:#7e22ce; font-size:11px;">Prod. Execution</div>
                        <div style="font-size:9px; color:#64748b;">(In Progress)</div>
                    </div>
                    <!-- Line 5 -->
                    <div style="position:absolute; left:820px; top:84px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:855px; top:81px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-left:5px solid #64748b; z-index:2;"></div>

                    <!-- Goods Receipt -->
                    <div style="position:absolute; left:860px; top:60px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
                        <div style="font-weight:bold; color:#1e40af; font-size:11px;">Goods Receipt</div>
                        <div style="font-size:9px; color:#64748b;">(FG)</div>
                    </div>

                    <!-- Line 6 (Down to row 2) -->
                    <div style="position:absolute; left:914px; top:110px; width:2px; height:85px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:911px; top:190px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #64748b; z-index:2;"></div>

                    <!-- Goods Issue (Auto Backflush) -->
                    <div style="position:absolute; left:860px; top:195px; width:110px; height:50px; background:#fff; border:2px solid #3b82f6; border-radius:6px; z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
                        <div style="font-weight:bold; color:#1e40af; font-size:11px;">Goods Issue</div>
                        <div style="font-size:9px; color:#64748b;">(Auto Backflush RM)</div>
                    </div>

                    <!-- Line 7 (Left to Qty check) -->
                    <div style="position:absolute; left:795px; top:219px; width:65px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:795px; top:216px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

                    <!-- Qty Fulfilled? -->
                    <div style="position:absolute; left:735px; top:190px; width:60px; height:60px; background:#fff; border:2px solid #eab308; z-index:10; transform:rotate(45deg);"></div>
                    <div style="position:absolute; left:735px; top:190px; width:60px; height:60px; z-index:11; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center; font-size:10px; font-weight:bold; color:#ca8a04;">Qty<br>Full?</div>

                    <!-- Line 8 (No: Up to Prod Exec) -->
                    <div style="position:absolute; left:764px; top:115px; width:2px; height:75px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:761px; top:115px; border-left:4px solid transparent; border-right:4px solid transparent; border-bottom:5px solid #64748b; z-index:2;"></div>
                    <div style="position:absolute; left:770px; top:145px; font-size:9px; font-weight:bold; color:#475569;">N</div>

                    <!-- Line 9 (Yes: Left to Completed) -->
                    <div style="position:absolute; left:670px; top:219px; width:65px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:670px; top:216px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>
                    <div style="position:absolute; left:695px; top:205px; font-size:9px; font-weight:bold; color:#475569;">Y</div>

                    <!-- Completed -->
                    <div style="position:absolute; left:560px; top:195px; width:110px; height:50px; background:#fff; border:2px solid #22c55e; border-radius:6px; z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
                        <div style="font-weight:bold; color:#15803d; font-size:11px;">Completed</div>
                    </div>
                    
                    <!-- Line 10 (Left to Closed) -->
                    <div style="position:absolute; left:520px; top:219px; width:40px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:520px; top:216px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

                    <!-- Closed -->
                    <div style="position:absolute; left:410px; top:195px; width:110px; height:50px; background:#fff; border:2px solid #64748b; border-radius:6px; z-index:10; display:flex; flex-direction:column; justify-content:center; align-items:center; text-align:center;">
                        <div style="font-weight:bold; color:#334155; font-size:11px;">Closed</div>
                    </div>

                    <!-- Short Close Path (Orange) -->
                    <div style="position:absolute; left:720px; top:110px; width:2px; height:32px; background:#ea580c; z-index:1;"></div>
                    <div style="position:absolute; left:530px; top:140px; width:192px; height:2px; background:#ea580c; z-index:1;"></div>
                    <div style="position:absolute; left:530px; top:140px; width:2px; height:79px; background:#ea580c; z-index:1;"></div>
                    <div style="position:absolute; left:527px; top:215px; border-left:4px solid transparent; border-right:4px solid transparent; border-top:5px solid #ea580c; z-index:2;"></div>
                    <div style="position:absolute; left:580px; top:134px; font-size:9px; font-weight:bold; color:#ea580c; background:#f8fafc; padding:2px 4px; z-index:10; border-radius:4px; border:1px dashed #ea580c;">Force Close</div>
                    
                    <!-- Line 11 (Left to End) -->
                    <div style="position:absolute; left:135px; top:219px; width:275px; height:2px; background:#64748b; z-index:1;"></div>
                    <div style="position:absolute; left:135px; top:216px; border-top:4px solid transparent; border-bottom:4px solid transparent; border-right:5px solid #64748b; z-index:2;"></div>

                    <!-- End -->
                    <div style="position:absolute; left:85px; top:205px; width:50px; height:30px; background:#fff; border:2px solid #94a3b8; border-radius:15px; z-index:10; display:flex; justify-content:center; align-items:center; font-weight:bold; color:#475569;">End</div>
                </div>
            </div>
            
            <h3 class="font-bold text-gray-800 text-lg mb-4 mt-8">5.3. Status Triggers</h3>
            <table class="brd-table">
                <thead style="background-color: #64748b; color: white;">
                    <tr>
                        <th style="width: 30%; border-color: #475569;">Status</th>
                        <th style="border-color: #475569;">Trigger / Definisi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="font-bold text-slate-600">Draft</td><td class="text-sm text-gray-700">Work Order baru dibuat, bebas dimodifikasi.</td></tr>
                    <tr><td class="font-bold text-red-600">Rejected</td><td class="text-sm text-gray-700">Work Order ditolak oleh otorisator, siklus terhenti dan dibatalkan.</td></tr>
                    <tr><td class="font-bold text-red-600">Pending (Hold)</td><td class="text-sm text-gray-700">Work Order ditahan karena material belum memenuhi syarat Release (menunggu purchasing).</td></tr>
                    <tr><td class="font-bold text-yellow-600">Released</td><td class="text-sm text-gray-700">Dokumen diotorisasi, siap diproduksi oleh pelaksana.</td></tr>
                    <tr><td class="font-bold text-purple-700">In Progress</td><td class="text-sm text-gray-700">Produksi telah dimulai (ada penerimaan parsial pertama).</td></tr>
                    <tr><td class="font-bold text-green-700">Completed</td><td class="text-sm text-gray-700">Produksi selesai 100% (Produced Qty = Planned Qty).</td></tr>
                    <tr><td class="font-bold text-slate-800">Closed</td><td class="text-sm text-gray-700">Produksi selesai normal. Stock dan transaksi finansial (jurnal) sudah dikunci final.</td></tr>
                    <tr><td class="font-bold text-orange-600">Short Closed (Force Closed)</td><td class="text-sm text-gray-700">WO ditutup paksa secara sepihak sebelum <em>Planned Qty</em> tercapai. Sisa <em>Reservation</em> (Soft-Lock) bahan baku akan otomatis dibatalkan oleh sistem.</td></tr>
                </tbody>
            </table>

            <h3 class="font-bold text-gray-800 text-lg mb-4 mt-8">5.4. Production Quantity</h3>
            <table class="brd-table">
                <thead style="background-color: #64748b; color: white;">
                    <tr>
                        <th style="width: 30%; border-color: #475569;">Kuantitas</th>
                        <th style="border-color: #475569;">Penjelasan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="font-bold text-gray-800">Planned Qty</td><td class="text-sm text-gray-700">Target kuantitas yang direncanakan sejak awal pembuatan WO.</td></tr>
                    <tr><td class="font-bold text-gray-800">Produced Qty</td><td class="text-sm text-gray-700">Akumulasi kuantitas barang jadi yang telah diselesaikan (Goods Receipt) hingga saat ini.</td></tr>
                    <tr><td class="font-bold text-gray-800">Remaining Qty</td><td class="text-sm text-gray-700">Sisa kuantitas yang belum diproduksi (Planned Qty - Produced Qty).</td></tr>
                    <tr><td class="font-bold text-gray-800">Reject Qty</td><td class="text-sm text-gray-700">Kuantitas produk gagal/cacat yang dikarantina (opsional, disiapkan untuk Phase lanjut).</td></tr>
                </tbody>
            </table>

            <h3 class="font-bold text-gray-800 text-lg mb-4 mt-8">5.5. Business Rules</h3>
            <table class="brd-table">
                <thead style="background-color: #64748b; color: white;">
                    <tr>
                        <th style="width: 5%; border-color: #475569; text-align: center;">No</th>
                        <th style="border-color: #475569;">Aturan Bisnis (Business Rule)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td class="text-center text-gray-800 font-bold">1</td><td class="text-sm text-gray-700">WO berstatus <strong>Draft</strong> dapat diubah maupun dihapus.</td></tr>
                    <tr><td class="text-center text-gray-800 font-bold">2</td><td class="text-sm text-gray-700">WO berstatus <strong>Released</strong> tidak dapat mengubah komponen BOM (mengunci <em>Snapshot</em>).</td></tr>
                    <tr><td class="text-center text-gray-800 font-bold">3</td><td class="text-sm text-gray-700">WO berstatus <strong>Completed</strong> tidak dapat menerima input produksi baru maupun direvisi.</td></tr>
                    <tr><td class="text-center text-gray-800 font-bold">4</td><td class="text-sm text-gray-700">WO berstatus <strong>Closed</strong> bersifat final secara logistik dan akuntansi.</td></tr>
                    <tr><td class="text-center text-gray-800 font-bold">5</td><td class="text-sm text-gray-700">BOM yang digunakan selalu merujuk pada <strong>Snapshot</strong> saat WO dibuat, mengabaikan perubahan di master BOM.</td></tr>
                    <tr><td class="text-center text-gray-800 font-bold">6</td><td class="text-sm text-gray-700">Kuantitas produksi aktual tidak boleh melebihi <strong>Planned Qty</strong> (Batasan Phase 1).</td></tr>
                    <tr><td class="text-center text-gray-800 font-bold">7</td><td class="text-sm text-gray-700"><strong>Soft-Lock Reservation:</strong> Saat WO berstatus <em>Released</em>, sistem tidak melakukan perpindahan barang fisik, melainkan melakukan penguncian (<em>Reservation</em>) matematis pada tabel inventori untuk mengurangi ketersediaan <em>Available to Promise (ATP)</em>.</td></tr>
                    <tr><td class="text-center text-gray-800 font-bold">8</td><td class="text-sm text-gray-700"><strong>Short Close Rule:</strong> WO berstatus <em>In Progress</em> dapat ditutup paksa. Dalam kejadian ini, sistem tidak memicu <em>reverse movement</em>, melainkan cukup <strong>menghapus sisa Reservation</strong> sehingga ketersediaan bahan baku kembali normal. Sisa target barang jadi (<em>Remaining Qty</em>) otomatis gugur.</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div id="section-6" class="mb-12 border-t pt-8">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>6. PRODUCTION EXECUTION</span></h2>
        
        <div class="mt-8 mb-4 border-t pt-8">
            <table class="brd-table">
                <thead style="background-color: #64748b; color: white;">
                    <tr>
                        <th style="width: 30%; border-color: #475569;">Proses / Topik</th>
                        <th style="border-color: #475569;">Penjelasan Bisnis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-bold text-gray-800">6.1. Availability Check</td>
                        <td class="text-sm text-gray-700">Sistem melakukan pengecekan ketersediaan seluruh komponen BOM terhadap stok gudang. <em>Availability Check</em> dilakukan terhadap <strong>Available Stock</strong>, bukan <em>Physical Stock</em> (sistem memperhitungkan jumlah <em>Reservation</em> dari WO atau order lain). Apabila terdapat satu atau lebih material yang tidak mencukupi, Work Order akan tertahan pada status <strong>Pending (Hold)</strong>, kecuali memenuhi kondisi (1) Partial Production diizinkan, (2) Material segera dilakukan pengadaan, atau (3) Material disubstitusi pada phase lanjutan.</td>
                    </tr>
                    <tr>
                        <td class="font-bold text-gray-800">6.2. Goods Receipt</td>
                        <td class="text-sm text-gray-700">Setelah pelaksana produksi menyelesaikan sebagian atau seluruh barang jadi, tahapan wajibnya adalah penerimaan barang jadi tersebut ke lokasi penyimpanan (Gudang). Begitu sistem menerima <em>Finished Good</em> ke dalam <em>Storage Location</em> tujuan, sistem akan langsung memicu proses <strong>Backflush</strong> dalam satu tarikan eksekusi transaksi yang sama.</td>
                    </tr>
                    <tr>
                        <td class="font-bold text-gray-800">6.3. Backflush Mechanism</td>
                        <td class="text-sm text-gray-700">Backflush hanya mengonsumsi material berdasarkan kuantitas <em>Finished Good</em> yang benar-benar <strong>selesai diproduksi</strong> pada sesi <em>Goods Receipt</em> tersebut. Sistem akan memotong persediaan secara otomatis dan proporsional menurut rasio pada <em>BOM Snapshot</em> tanpa memerlukan input Jurnal Keluar Gudang secara manual.</td>
                    </tr>
                    <tr>
                        <td class="font-bold text-gray-800">6.4. Scrap & Reject Handling</td>
                        <td class="text-sm text-gray-700">
                            <p class="mb-2">Sesuai batasan kesederhanaan Phase 1, penanganan produk rusak/buangan ditetapkan sebagai berikut:</p>
                            <ul class="list-disc ml-6 space-y-1">
                                <li><strong>Raw Material Scrap:</strong> Jika terdapat bahan baku terbuang/tumpah (melebihi konsumsi standar BOM), selisih tersebut tidak ditangani di dalam Work Order. Sisa selisih dikeluarkan secara manual melalui modul Inventory (MM) menggunakan dokumen <em>Goods Issue for Scrap</em>.</li>
                                <li><strong>Finished Good Reject:</strong> Saat proses <em>Goods Receipt</em>, pengguna menginput <em>Good Qty</em> (Barang Bagus) dan <em>Reject Qty</em> (Barang Cacat). Konsumsi bahan baku (Auto Backflush) akan dihitung berdasarkan total keduanya untuk menjaga akurasi pemotongan persediaan.</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-bold text-gray-800">6.5. Partial Production & Short Close</td>
                        <td class="text-sm text-gray-700">
                            <p class="mb-2">Apabila pabrik hanya mampu menyelesaikan sebagian pesanan (misal: Selesai 40 pcs dari Planned 100 pcs hari ini), maka status WO akan bertahan di <strong>In Progress</strong>. Sistem akan melakukan Backflush proporsional sebesar 40% (contoh: target 100 botol butuh 10kg gula, maka selesai 40 botol memotong 4kg gula). Baru ketika sisa 60 pcs diselesaikan keesokan harinya, status WO berpindah menjadi <strong>Completed</strong>.</p>
                            <p><strong>Short Close Scenario:</strong> Jika sisa 60 pcs tersebut dibatalkan (tidak jadi diproduksi), maka otorisator dapat melakukan aksi <strong>Short Close (Force Close)</strong>. Sistem akan membatalkan sisa angka <em>Reservation</em> (Soft-Lock) untuk 60 pcs tersebut tanpa memicu perpindahan barang (*Movement*) apapaun, sehingga bahan baku kembali <em>Available</em> secara perhitungan.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div id="section-7" class="mb-12 border-t pt-8">
        <h2 class="brd-h2" style="display:flex; justify-content:space-between; align-items:center;"><span>7. INTEGRATION</span></h2>
        <div class="mt-8 mb-4 border-t pt-8">
            <p class="mb-4 text-sm text-gray-700">Integrasi antar modul berjalan secara otomatis di belakang layar (<em>background process</em>):</p>
            <table class="brd-table">
                <thead style="background-color: #64748b; color: white;">
                    <tr>
                        <th style="width: 30%; border-color: #475569;">Modul Integrasi</th>
                        <th style="border-color: #475569;">Keterangan / Impact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="font-bold text-gray-800">MM (Material Management)</td>
                        <td class="text-sm text-gray-700">Memicu <em>Inventory Movement</em> secara instan saat Goods Receipt dan Backflush terjadi.</td>
                    </tr>
                    <tr>
                        <td class="font-bold text-gray-800">FI (Finance)</td>
                        <td class="text-sm text-gray-700">Menghasilkan <em>Auto Journal</em> dari pergerakan inventori. Contohnya, saat Goods Receipt, sistem men-Debit FG Inventory dan me-Kredit WIP. Sedangkan saat Backflush (Goods Issue RM), sistem men-Kredit RM Inventory.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>',
            'out_of_scope' => '<ul><li>Quality Inspection (QC).</li><li>Routing detail.</li><li>Work Center Capacity.</li><li>Machine Scheduling.</li><li>Labor Cost.</li><li>Machine Cost.</li><li>Actual Costing.</li><li>Variance Calculation.</li><li>MRP (Material Requirements Planning).</li><li>Production Version.</li><li>Co-Product.</li><li>By-Product.</li><li>Rework.</li><li>Scrap Analysis.</li></ul>',
                'status' => 'Draft',
                'author_id' => NULL,
                'approved_by' => NULL,
                'approved_at' => NULL,
                'created_at' => '2026-07-24 20:55:00',
                'updated_at' => '2026-07-24 20:55:00',
                'document_history' => NULL,
                'document_distribution' => NULL,
                'flowcharts' => NULL,
                'table_of_contents' => NULL,
            ),
        ));
        
        
    }
}