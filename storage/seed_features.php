<?php

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\ProjectFeature;

$projectId = 1;

if (ProjectFeature::where('project_id', $projectId)->count() === 0) {
    $standardFeatures = [
        ['name' => 'Master User & Role Permission', 'blueprint_code' => 'BP-SD-01', 'brd_code' => 'BRD-01', 'fsd_code' => 'FSD-01'],
        ['name' => 'Data Barang & Satuan', 'blueprint_code' => 'BP-SD-02', 'brd_code' => 'BRD-02', 'fsd_code' => 'FSD-02'],
        ['name' => 'Pricing Structure Pembelian', 'blueprint_code' => 'BP-SD-03', 'brd_code' => 'BRD-03', 'fsd_code' => 'FSD-03'],
        ['name' => 'Sales Pricing Structure', 'blueprint_code' => 'BP-SD-04', 'brd_code' => 'BRD-04', 'fsd_code' => 'FSD-04'],
        ['name' => 'Customer Master Data', 'blueprint_code' => 'BP-SD-05', 'brd_code' => 'BRD-05', 'fsd_code' => 'FSD-05'],
        ['name' => 'Vendor Master Data', 'blueprint_code' => 'BP-SD-06', 'brd_code' => 'BRD-06', 'fsd_code' => 'FSD-06'],
        ['name' => 'Master Company', 'blueprint_code' => 'BP-SD-07', 'brd_code' => 'BRD-07', 'fsd_code' => 'FSD-07'],
        ['name' => 'Chart of Accounts (COA)', 'blueprint_code' => 'BP-SD-08', 'brd_code' => 'BRD-08', 'fsd_code' => 'FSD-08'],
        ['name' => 'Accounting Period Management', 'blueprint_code' => 'BP-SD-09', 'brd_code' => 'BRD-09', 'fsd_code' => 'FSD-09'],
        ['name' => 'Auto Journal Mapping', 'blueprint_code' => 'BP-SD-10', 'brd_code' => 'BRD-10', 'fsd_code' => 'FSD-10'],
        ['name' => 'Sales Order (SO)', 'blueprint_code' => 'BP-SD-11', 'brd_code' => 'BRD-11', 'fsd_code' => 'FSD-11'],
        ['name' => 'Account Determination', 'blueprint_code' => 'BP-SD-12', 'brd_code' => 'BRD-12', 'fsd_code' => 'FSD-12'],
        ['name' => 'Shipment Plan', 'blueprint_code' => 'BP-SD-13', 'brd_code' => 'BRD-13', 'fsd_code' => 'FSD-13'],
        ['name' => 'AR Invoice', 'blueprint_code' => 'BP-SD-14', 'brd_code' => 'BRD-14', 'fsd_code' => 'FSD-14'],
        ['name' => 'Shipment Cost & Cross-Domain Validation', 'blueprint_code' => 'BP-SD-15', 'brd_code' => 'BRD-15', 'fsd_code' => 'FSD-15'],
        ['name' => 'Cost Center Management', 'blueprint_code' => 'BP-SD-16', 'brd_code' => 'BRD-16', 'fsd_code' => 'FSD-16'],
        ['name' => 'Customer Return', 'blueprint_code' => 'BP-SD-17', 'brd_code' => 'BRD-17', 'fsd_code' => 'FSD-17'],
        ['name' => 'Document Numbering Engine', 'blueprint_code' => 'BP-SD-18', 'brd_code' => 'BRD-18', 'fsd_code' => 'FSD-18'],
        ['name' => 'Master Branch', 'blueprint_code' => 'BP-SD-19', 'brd_code' => 'BRD-19', 'fsd_code' => 'FSD-19'],
        ['name' => 'Purchase Order (PO)', 'blueprint_code' => 'BP-SD-20', 'brd_code' => 'BRD-20', 'fsd_code' => 'FSD-20'],
        ['name' => 'Purchase Requisition (PR)', 'blueprint_code' => 'BP-SD-21', 'brd_code' => 'BRD-21', 'fsd_code' => 'FSD-21'],
        ['name' => 'Goods Receipt (GR)', 'blueprint_code' => 'BP-SD-22', 'brd_code' => 'BRD-22', 'fsd_code' => 'FSD-22'],
        ['name' => 'Supplier Return', 'blueprint_code' => 'BP-SD-23', 'brd_code' => 'BRD-23', 'fsd_code' => 'FSD-23'],
        ['name' => 'Stock Adjustment', 'blueprint_code' => 'BP-SD-24', 'brd_code' => 'BRD-24', 'fsd_code' => 'FSD-24'],
        ['name' => 'Stock Transfer', 'blueprint_code' => 'BP-SD-25', 'brd_code' => 'BRD-25', 'fsd_code' => 'FSD-25'],
        ['name' => 'AP Invoice', 'blueprint_code' => 'BP-SD-26', 'brd_code' => 'BRD-26', 'fsd_code' => 'FSD-26'],
        ['name' => 'Petty Cash', 'blueprint_code' => 'BP-SD-27', 'brd_code' => 'BRD-27', 'fsd_code' => 'FSD-27'],
        ['name' => 'General Ledger', 'blueprint_code' => 'BP-SD-28', 'brd_code' => 'BRD-28', 'fsd_code' => 'FSD-28'],
        ['name' => 'Customer Payment', 'blueprint_code' => 'BP-SD-29', 'brd_code' => 'BRD-29', 'fsd_code' => 'FSD-29'],
        ['name' => 'Quotation Comparison Form (QCF)', 'blueprint_code' => 'BP-SD-30', 'brd_code' => 'BRD-30', 'fsd_code' => 'FSD-30'],
        ['name' => 'Request for Quotation (RFQ)', 'blueprint_code' => 'BP-SD-31', 'brd_code' => 'BRD-31', 'fsd_code' => 'FSD-31'],
        ['name' => 'Vendor Payment', 'blueprint_code' => 'BP-SD-32', 'brd_code' => 'BRD-32', 'fsd_code' => 'FSD-32'],
        ['name' => 'Payment Proposal', 'blueprint_code' => 'BP-SD-33', 'brd_code' => 'BRD-33', 'fsd_code' => 'FSD-33'],
        ['name' => 'Vendor Down Payment', 'blueprint_code' => 'BP-SD-34', 'brd_code' => 'BRD-34', 'fsd_code' => 'FSD-34'],
        ['name' => 'Month-End Closing Programs', 'blueprint_code' => 'BP-SD-35', 'brd_code' => 'BRD-35', 'fsd_code' => 'FSD-35'],
        ['name' => 'Customer Quotation', 'blueprint_code' => 'BP-SD-36', 'brd_code' => 'BRD-36', 'fsd_code' => 'FSD-36'],
        ['name' => 'Manual Bank Statement', 'blueprint_code' => 'BP-SD-37', 'brd_code' => 'BRD-37', 'fsd_code' => 'FSD-37'],
        ['name' => 'Laporan Sales by Sales Order', 'blueprint_code' => 'BP-SD-38', 'brd_code' => 'BRD-38', 'fsd_code' => 'FSD-38'],
        ['name' => 'Laporan Sales by Customer Invoice', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-SO02', 'fsd_code' => 'FSD-SO02'],
        ['name' => 'Foreign Exchange Revaluation', 'blueprint_code' => 'BP-SD-39', 'brd_code' => 'BRD-39', 'fsd_code' => 'FSD-39'],
        ['name' => 'Setup Master Harga Beli', 'blueprint_code' => 'BP-SD-40', 'brd_code' => 'BRD-40', 'fsd_code' => 'FSD-40'],
        ['name' => 'Setup Master Harga Jual', 'blueprint_code' => 'BP-SD-41', 'brd_code' => 'BRD-41', 'fsd_code' => 'FSD-41'],
        ['name' => 'Outbound Delivery & Goods Issue (DO/GI)', 'blueprint_code' => 'BP-SD-13', 'brd_code' => 'BRD-60', 'fsd_code' => 'FSD-42'],
        ['name' => 'Bill of Material & Work Order', 'blueprint_code' => 'BP-MM-BOM', 'brd_code' => 'BRD-61', 'fsd_code' => 'FSD-43'],
        ['name' => 'Laporan AR Customer List', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-AR01', 'fsd_code' => 'FSD-AR01'],
        ['name' => 'Laporan AR Aging', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-AR02', 'fsd_code' => 'FSD-AR02'],
        ['name' => 'Laporan AP Aging', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-AP01', 'fsd_code' => 'FSD-AP01'],
        ['name' => 'Laporan Purchase Order (PO Report)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-PO01', 'fsd_code' => 'FSD-PO01'],
        ['name' => 'Laporan Penerimaan Barang (GR Log)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-GR01', 'fsd_code' => 'FSD-GR01'],
        ['name' => 'Laporan Unbilled Goods (Goods Receipt Not Invoiced)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-GR02', 'fsd_code' => 'FSD-GR02'],
        ['name' => 'Kartu Stok (Stock Card)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-IM01', 'fsd_code' => 'FSD-IM01'],
        ['name' => 'Laporan Mutasi Stok (Stock Movement)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-IM02', 'fsd_code' => 'FSD-IM02'],
        ['name' => 'Laporan Stock Aging', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-IM03', 'fsd_code' => 'FSD-IM03'],
        ['name' => 'Laporan Master Data Barang (Item Master List)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-MD01', 'fsd_code' => 'FSD-MD01'],
        ['name' => 'Laporan Master Data Pelanggan (Customer Directory)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-MD02', 'fsd_code' => 'FSD-MD02'],
        ['name' => 'Laporan Master Data Supplier (Supplier Directory)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-MD03', 'fsd_code' => 'FSD-MD03'],
        ['name' => 'Laporan Master Data COA (Chart of Accounts List)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-MD04', 'fsd_code' => 'FSD-MD04'],
        ['name' => 'Laporan Valuasi Persediaan (Inventory Valuation)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-FI01', 'fsd_code' => 'FSD-FI01'],
        ['name' => 'Trial Balance', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-FI02', 'fsd_code' => 'FSD-FI02'],
        ['name' => 'Laba Rugi (Profit & Loss)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-FI03', 'fsd_code' => 'FSD-FI03'],
        ['name' => 'Neraca (Balance Sheet)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-FI04', 'fsd_code' => 'FSD-FI04'],
        ['name' => 'Laporan Arus Kas (Cash Flow)', 'blueprint_code' => 'BP-SD-Report', 'brd_code' => 'BRD-FI05', 'fsd_code' => 'FSD-FI05'],
    ];

    foreach ($standardFeatures as $sf) {
        ProjectFeature::create(array_merge($sf, [
            'project_id' => $projectId,
            'is_selected' => true,
            'is_gap' => false,
            'description' => 'Fitur produk standar DMS.',
        ]));
    }
    echo "Seeded " . count($standardFeatures) . " standard features to Project ID $projectId.\n";
} else {
    echo "Features already exist for Project ID $projectId.\n";
}
