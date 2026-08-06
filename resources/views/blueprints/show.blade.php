@extends('layouts.app')
@section('title', 'Blueprint Details')
@section('page_title', 'Blueprint Details')

@section('content')
    @include('_partials.flash')
    @php
        $record = $task ?? $epic ?? $sprint ?? $feature ?? $blueprint ?? $brd ?? $erd ?? $fsd ?? ${str_replace('-', '_', 'blueprints')} ?? null;
        if (!$record) {
            $varname = \Illuminate\Support\Str::camel(\Illuminate\Support\Str::singular('blueprints'));
            $record = $$varname ?? null;
        }
    @endphp

    <div class="breadcrumb" style="margin-bottom: 24px;">
        <a href="{{ route('blueprints.index') }}" style="color:#0891b2;text-decoration:none;">Blueprints</a> <span
            style="color:#94a3b8">/</span> <span style="color:#94a3b8">View</span>
    </div>

    <div class="toolbar" style="display:flex; justify-content:space-between; margin-bottom: 24px; align-items:center;">
        <h2 style="font-size:1.5rem;font-weight:700;color:#1e293b;margin:0;">View Blueprint</h2>
        <a href="{{ route('blueprints.edit', $record) }}"
            style="display:inline-flex;align-items:center;gap:8px;padding:9px 18px;background:#f8fafc;color:#334155;border:1px solid #e2e8f0;border-radius:10px;font-size:.9rem;font-weight:600;text-decoration:none;transition:all .2s">✏️
            Edit Blueprint</a>
    </div>

    <div
        class="flex flex-col items-center gap-12 w-full bg-gray-100 py-10 px-4 sm:px-12 rounded-xl border border-gray-200 shadow-inner">
        <style>
            .flex {
                display: flex;
            }

            .flex-col {
                flex-direction: column;
            }

            .items-center {
                align-items: center;
            }

            .gap-12 {
                gap: 3rem;
            }

            .gap-8 {
                gap: 2rem;
            }

            .w-full {
                width: 100%;
            }

            .bg-gray-100 {
                background-color: #f3f4f6;
            }

            .bg-gray-50 {
                background-color: #f9fafb;
            }

            .py-10 {
                padding-top: 2.5rem;
                padding-bottom: 2.5rem;
            }

            .px-4 {
                padding-left: 1rem;
                padding-right: 1rem;
            }

            .p-8 {
                padding: 2rem;
            }

            .p-4 {
                padding: 1rem;
            }

            .rounded-xl {
                border-radius: 0.75rem;
            }

            .rounded-lg {
                border-radius: 0.5rem;
            }

            .rounded-md {
                border-radius: 0.375rem;
            }

            .rounded {
                border-radius: 0.25rem;
            }

            .border {
                border-width: 1px;
                border-style: solid;
            }

            .border-gray-200 {
                border-color: #e5e7eb;
            }

            .border-gray-300 {
                border-color: #d1d5db;
            }

            .shadow-inner {
                box-shadow: inset 0 2px 4px 0 rgba(0, 0, 0, 0.06);
            }

            .shadow-sm {
                box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            }

            .text-gray-500 {
                color: #6b7280;
            }

            .text-gray-800 {
                color: #1f2937;
            }

            .text-gray-900 {
                color: #111827;
            }

            .text-gray-700 {
                color: #374151;
            }

            .font-medium {
                font-weight: 500;
            }

            .font-bold {
                font-weight: 700;
            }

            .uppercase {
                text-transform: uppercase;
            }

            .text-center {
                text-align: center;
            }

            .text-justify {
                text-align: justify;
            }

            .mt-8 {
                margin-top: 2rem;
            }

            .mt-16 {
                margin-top: 4rem;
            }

            .mb-2 {
                margin-bottom: 0.5rem;
            }

            .mb-8 {
                margin-bottom: 2rem;
            }

            .mb-12 {
                margin-bottom: 3rem;
            }

            .leading-loose {
                line-height: 2;
            }

            .align-middle {
                vertical-align: middle;
            }

            .mx-auto {
                margin-left: auto;
                margin-right: auto;
            }

            .h-10 {
                height: 2.5rem;
            }

            .object-contain {
                object-fit: contain;
            }

            .max-w-none {
                max-width: none;
            }

            .prose {
                font-size: 1rem;
                line-height: 1.75;
            }

            .prose-sm {
                font-size: 0.875rem;
                line-height: 1.7142857;
            }

            .italic {
                font-style: italic;
            }

            .text-xs {
                font-size: 0.75rem;
                line-height: 1rem;
            }

            .justify-center {
                justify-content: center;
            }

            .grid { display: grid; }
            .grid-cols-1 { grid-template-columns: repeat(1, minmax(0, 1fr)); }
            @media (min-width: 768px) { .md\:grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); } }
            .gap-4 { gap: 1rem; }
            .p-3 { padding: 0.75rem; }
            .bg-white { background-color: #ffffff; }
            .border-l-4 { border-left-width: 4px; border-left-style: solid; }
            .border-l-amber-500 { border-left-color: #f59e0b; }
            .text-amber-700 { color: #b45309; }
            .border-l-sky-400 { border-left-color: #38bdf8; }
            .text-sky-600 { color: #0284c7; }
            .border-l-sky-600 { border-left-color: #0284c7; }
            .text-sky-800 { color: #075985; }
            .border-l-blue-600 { border-left-color: #2563eb; }
            .text-blue-800 { color: #1e40af; }
            .border-l-emerald-500 { border-left-color: #10b981; }
            .text-emerald-700 { color: #047857; }
            .border-l-fuchsia-500 { border-left-color: #d946ef; }
            .text-fuchsia-700 { color: #a21caf; }

            .space-y-4 > :not([hidden]) ~ :not([hidden]) { --tw-space-y-reverse: 0; margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(1rem * var(--tw-space-y-reverse)); }
            .text-sm { font-size: 0.875rem; line-height: 1.25rem; }
            .items-start { align-items: flex-start; }
            .gap-3 { gap: 0.75rem; }
            .mt-0\.5 { margin-top: 0.125rem; }
            .px-2 { padding-left: 0.5rem; padding-right: 0.5rem; }
            .h-6 { height: 1.5rem; }
            .bg-blue-100 { background-color: #dbeafe; }
            .text-blue-600 { color: #2563eb; }
            .bg-emerald-100 { background-color: #d1fae5; }
            .text-emerald-600 { color: #059669; }
            .text-gray-600 { color: #4b5563; }
            .mt-1 { margin-top: 0.25rem; }
            .text-md { font-size: 1rem; line-height: 1.5rem; }

            .brd-page {
                width: 100%;
                max-width: 1200px;
                min-height: 297mm;
                padding: 8%;
                background: white;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
                border-radius: 4px;
                color: #1f2937;
                font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
                flex-shrink: 0;
                position: relative;
                overflow: hidden;
            }

            .prose ul {
                padding-left: 24px;
                list-style-type: disc;
                margin-bottom: 16px;
            }

            .prose ol {
                padding-left: 24px;
                list-style-type: decimal;
                margin-bottom: 16px;
            }

            .prose li {
                margin-bottom: 6px;
            }

            .prose p {
                margin-bottom: 16px;
            }

            .prose table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 24px;
                font-size: 0.85rem;
            }

            .prose th,
            .prose td {
                border: 1px solid #d1d5db;
                padding: 8px 12px;
                text-align: left;
                vertical-align: top;
            }

            .prose th {
                background: #f9fafb;
                font-weight: bold;
                color: #111827;
            }

            .brd-page::before {
                content: "CONFIDENTIAL";
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) rotate(-45deg);
                font-size: 8rem;
                font-weight: 900;
                color: rgba(220, 38, 38, 0.07);
                z-index: 50;
                pointer-events: none;
                white-space: nowrap;
                user-select: none;
            }

            .brd-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 2rem;
                font-size: 0.875rem;
            }

            .brd-table th {
                background-color: #f3f4f6;
                color: #111827;
                font-weight: bold;
                text-align: left;
                padding: 10px 16px;
                border: 1px solid #d1d5db;
            }

            .brd-table td {
                padding: 10px 16px;
                border: 1px solid #d1d5db;
                vertical-align: top;
            }

            .brd-header {
                text-align: center;
                border-bottom: 2px solid #1f2937;
                padding-bottom: 1.5rem;
                margin-bottom: 3rem;
            }

            .brd-h1 {
                font-size: 2.25rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                margin-bottom: 1rem;
            }

            .brd-h2 {
                font-size: 1.5rem;
                font-weight: bold;
                margin-bottom: 1.5rem;
                border-bottom: 2px solid #e5e7eb;
                padding-bottom: 0.5rem;
                text-transform: uppercase;
            }

            .brd-h3 {
                font-size: 1.25rem;
                font-weight: bold;
                margin-bottom: 1rem;
                color: #374151;
                display: inline-block;
                background: #e5e7eb;
                padding: 4px 12px;
                border-radius: 4px;
            }

            .brd-toc-item {
                display: flex;
                align-items: flex-end;
                width: 100%;
                margin-bottom: 0.75rem;
                text-decoration: none;
                color: #1f2937;
            }

            .brd-toc-item:hover {
                color: #2563eb;
            }

            .brd-toc-dots {
                flex-grow: 1;
                margin: 0 1rem;
                position: relative;
                top: -6px;
                border-bottom: 2px dotted #9ca3af;
            }

            /* Legacy Flowchart HTML support */
            .flow-container {
                display: flex;
                flex-direction: column;
                align-items: center;
                font-family: sans-serif;
                text-align: center;
                width: 100%;
                line-height: normal !important;
            }

            .flow-container p {
                display: none !important;
                /* Hide empty p tags that break the lines */
            }

            .flow-container>br,
            .flow-col>br,
            .flow-branch>br {
                display: none !important;
                /* Hide br only if they are direct children of layout containers */
            }

            .flow-node {
                border: 2px solid #3b82f6 !important;
                border-radius: 8px !important;
                background: #eff6ff !important;
                color: #1e3a8a !important;
                font-weight: 600 !important;
                margin: 0 auto !important;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1) !important;
                z-index: 10 !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                padding: 10px !important;
                line-height: 1.3 !important;
            }

            .flow-node.primary {
                background: #3b82f6 !important;
                color: white !important;
                border-color: #2563eb !important;
            }

            .flow-node.decision {
                border-radius: 50px !important;
                /* Oval for decision to fit text nicely */
                border-color: #f59e0b !important;
                background: #fef3c7 !important;
                color: #b45309 !important;
            }

            .flow-node.danger {
                border-color: #ef4444 !important;
                background: #fef2f2 !important;
                color: #b91c1c !important;
            }

            .flow-node.warning {
                border-color: #f59e0b !important;
                background: #fffbeb !important;
                color: #b45309 !important;
            }

            .flow-node.success {
                border-color: #10b981 !important;
                background: #ecfdf5 !important;
                color: #047857 !important;
            }

            .flow-line-vertical {
                width: 2px !important;
                background: #9ca3af !important;
                margin: 0 auto !important;
                position: relative !important;
                display: block !important;
                min-height: 25px !important;
                z-index: 1 !important;
            }

            .flow-line-vertical.arrow::after,
            .drop-arrow::after {
                content: '' !important;
                position: absolute !important;
                bottom: 0 !important;
                /* Fixed: 0 instead of -6px so it doesn't pierce into the node */
                left: -5px !important;
                border-width: 6px 6px 0 !important;
                border-style: solid !important;
                border-color: #9ca3af transparent transparent !important;
                z-index: 20 !important;
                /* Ensure it paints over just in case */
            }

            .flow-branch {
                display: flex !important;
                justify-content: space-around !important;
                width: 100% !important;
                position: relative !important;
                border-top: none !important;
                margin-top: 0 !important;
                margin-bottom: 0 !important;
            }

            .flow-col {
                display: flex !important;
                flex-direction: column !important;
                align-items: center !important;
                flex: 1 !important;
                position: relative !important;
                margin: 0 !important;
                padding: 0 10px !important;
            }

            /* Draw horizontal connecting lines on columns */
            .flow-col::before {
                content: '' !important;
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 2px !important;
                background: #9ca3af !important;
                z-index: 1 !important;
            }

            /* First column only draws right half */
            .flow-col:first-child::before {
                width: 50% !important;
                left: auto !important;
                right: 0 !important;
            }

            /* Last column only draws left half */
            .flow-col:last-child::before {
                width: 50% !important;
                left: 0 !important;
            }

            /* If a column is both first and last, no branch line needed */
            .flow-col:first-child:last-child::before {
                display: none !important;
            }

            .flow-col.short {
                flex: 0.5 !important;
            }

            .flow-label {
                background: white !important;
                padding: 0 8px !important;
                font-size: 0.8rem !important;
                font-weight: bold !important;
                color: #6b7280 !important;
                margin-top: -10px !important;
                margin-bottom: 0 !important;
                z-index: 5 !important;
                line-height: 1 !important;
            }

            .drop-arrow {
                width: 2px !important;
                height: 20px !important;
                background: #9ca3af !important;
                margin: 0 auto !important;
                position: relative !important;
                display: block !important;
            }

            .drop-arrow::after {
                content: '' !important;
                position: absolute !important;
                bottom: -4px !important;
                left: -4px !important;
                border-width: 5px 5px 0 !important;
                border-style: solid !important;
                border-color: #9ca3af transparent transparent !important;
            }

            /* Prevent images from overflowing the page */
            .brd-page img {
                max-width: 100% !important;
                height: auto !important;
                object-fit: contain;
            }

            /* Prevent Printing */
            @media print {

                .brd-page,
                .toolbar,
                .breadcrumb,
                header,
                footer,
                nav,
                aside {
                    display: none !important;
                }

                body {
                    background-color: white !important;
                }

                body::before {
                    content: "Pencetakan dokumen ini (Blueprint / BRD) dilarang keras demi alasan kerahasiaan dan keamanan (CONFIDENTIAL).";
                    display: flex !important;
                    align-items: center !important;
                    justify-content: center !important;
                    min-height: 100vh !important;
                    width: 100% !important;
                    font-family: Arial, sans-serif !important;
                    font-size: 20pt !important;
                    font-weight: bold !important;
                    text-align: center !important;
                    color: #b91c1c !important;
                    padding: 40px !important;
                    box-sizing: border-box !important;
                    position: fixed !important;
                    top: 0 !important;
                    left: 0 !important;
                    z-index: 999999 !important;
                    background: white !important;
                }
            }
        </style>

        <!-- PAGE 0: COVER PAGE -->
        <div class="brd-page"
            style="display: flex; flex-direction: column; justify-content: center; align-items: center; background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); color: white; text-align: center; position: relative; overflow: hidden; box-shadow: inset 0 0 100px rgba(0,0,0,0.5);">
            <!-- SAP-style Swoosh Graphics (using circles) -->
            <div
                style="position: absolute; bottom: -20%; right: -10%; width: 600px; height: 600px; border-radius: 50%; border: 40px solid rgba(255,255,255,0.05); z-index: 1;">
            </div>
            <div
                style="position: absolute; bottom: -15%; right: -5%; width: 450px; height: 450px; border-radius: 50%; border: 40px solid rgba(255,255,255,0.08); z-index: 1;">
            </div>
            <div
                style="position: absolute; bottom: -10%; right: 0%; width: 300px; height: 300px; border-radius: 50%; border: 40px solid rgba(255,255,255,0.1); z-index: 1;">
            </div>

            <div
                style="z-index: 10; width: 100%; max-width: 800px; margin: 0 auto; display: flex; flex-direction: column; align-items: center;">
                @php
                    // Extract module name from title, e.g. "01. Blueprint - Modul SD (Sales & Distribution)"
                    $fullTitle = $record->title ?? 'Untitled Blueprint';
                    $moduleName = $fullTitle;
                    if (preg_match('/\((.*?)\)/', $fullTitle, $matches)) {
                        $moduleName = $matches[1]; // e.g. "Sales & Distribution"
                    }
                @endphp

                <h1
                    style="font-size: 3.5rem; font-weight: 800; line-height: 1.2; margin-bottom: 2rem; text-shadow: 2px 4px 10px rgba(0,0,0,0.3);">
                    {{ $moduleName }}<br>
                    Blueprint Confirmation
                </h1>

                <h2
                    style="font-size: 2.2rem; font-weight: bold; margin-bottom: 4rem; text-transform: uppercase; letter-spacing: 2px; text-shadow: 1px 2px 5px rgba(0,0,0,0.3);">
                    {{ $record->project?->name ?? '-' }}
                </h2>

                <div style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid rgba(255,255,255,0.3); width: 70%;">
                    <p style="font-size: 1.2rem; margin-bottom: 0.5rem; opacity: 0.9; font-weight: 300;">Disusun oleh:</p>
                    <h3 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 1rem; letter-spacing: 1px;">
                        {{ $record->author?->name ?? 'Teguh Priyadi' }}</h3>
                    <p style="font-size: 1.2rem; font-weight: 600; opacity: 0.9;">
                        {{ $record->created_at ? $record->created_at->format('d M Y') : '' }}</p>
                </div>
            </div>

            <!-- Footer Core Values -->
            <div
                style="position: absolute; bottom: 30px; left: 0; width: 100%; text-align: center; font-size: 1rem; font-weight: bold; z-index: 10; letter-spacing: 2px; word-spacing: 5px;">
                <span style="color: white;">Integrity &nbsp;|&nbsp; Reliability</span>
            </div>
        </div>

        <!-- PAGE 1: Title, Meta, Document History, Distribution, TOC -->
        <div class="brd-page">
            <div class="brd-header">
                <h1 class="brd-h1">{{ $record->title }}</h1>
                <p class="text-gray-500 font-medium">
                    Project: {{ $record->project?->name ?? '-' }} &nbsp;|&nbsp;
                    Status: <span class="uppercase">{{ $record->status ?? 'DRAFT' }}</span> &nbsp;|&nbsp;
                    Date: {{ $record->created_at ? $record->created_at->format('d M Y') : '' }}
                </p>
            </div>

            @if(is_array($record->history) && count($record->history) > 0)
                <div class="mb-8">
                    <h2 class="brd-h2"
                        style="font-size: 1.25rem; background: #374151; color: white; padding: 4px 12px; display: inline-block;">
                        Document History</h2>
                    <table class="brd-table">
                        <thead>
                            <tr>
                                <th style="width: 15%;">Version</th>
                                <th style="width: 20%;">Date</th>
                                <th style="width: 25%;">Author</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($record->history as $hist)
                                <tr>
                                    <td>{{ $hist['version'] ?? '' }}</td>
                                    <td>{{ isset($hist['date']) ? \Carbon\Carbon::parse($hist['date'])->format('d M Y') : '' }}</td>
                                    <td>{{ $hist['author'] ?? '' }}</td>
                                    <td>{{ $hist['description'] ?? '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            @if(isset($record->document_distribution) && is_array($record->document_distribution) && count($record->document_distribution) > 0)
                <div class="mb-12">
                    <h2 class="brd-h2"
                        style="font-size: 1.25rem; background: #374151; color: white; padding: 4px 12px; display: inline-block;">
                        Document Distribution</h2>
                    <table class="brd-table">
                        <thead>
                            <tr>
                                <th style="width: 15%;"># of Copy</th>
                                <th>Description</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($record->document_distribution as $dist)
                                    <tr>
                                        <td>{{ $dist['copy_count'] ?? '' }} set</td>
                                        <td>{{ $dist['description'] ?? '' }}</td>
                                        <td>{{ $dist['location'] ?? '' }}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                    </table>
                </div>
            @endif

            <div class="mt-16 p-8 bg-gray-50 border border-gray-200 rounded-lg shadow-sm" id="daftar-isi">
                <h2 class="brd-h2 text-center" style="border-bottom: none; font-size: 1.5rem;">DAFTAR ISI</h2>
                <div class="mt-8">
                    @php
                        $isSD = str_contains($record->title, 'Modul SD');
                        $isMM = str_contains($record->title, 'Modul MM');
                        $isFI = str_contains($record->title, 'Modul FI');
                        $isPP = str_contains($record->title, 'Modul PP');

                        $sdToc = [
                            'Sales Organization Structure',
                            'Customer Master Data',
                            'Credit Limit Management',
                            'Sales Pricing and Promotion',
                            'Standard Take Order',
                            'POD Settlement',
                            'Sales Return',
                            'Outbound Shipment',
                            'Shipment Cost',
                            'Credit Note',
                        ];

                        $mmToc = [
                            1 => 'Organization Structure',
                            2 => 'Master Data',
                            3 => 'Procure to Pay',
                            4 => 'Inventory Management',
                            5 => 'Maintain Harga Beli',
                            6 => 'Procurement of Consumable',
                            7 => 'Procurement of Asset',
                            8 => 'Procurement of Service',
                            10 => 'Procurement of Trading Goods (Import+Freight Cost)',
                            11 => 'Goods Received from Purchase Order',
                            12 => 'Return Delivery PO',
                            13 => 'Stock Transfer between Storage Location',
                        ];

                        $fiToc = [
                            'Organization Structure',
                            'Master Data',
                            'Asset',
                            'Account Payable',
                            'Bank Accounting',
                            'Account Receivable',
                            'General Ledger',
                            'FI Closing Process',
                        ];

                        $ppToc = [
                            'BACKGROUND',
                            'SCOPE',
                            'ORGANIZATION STRUCTURE',
                            'MASTER DATA',
                            'WORK ORDER',
                            'PRODUCTION EXECUTION',
                            'INTEGRATION & IMPACT'
                        ];
                    @endphp

                    @if($isSD)
                        @foreach($sdToc as $index => $item)
                            <a href="#section-{{ $index }}" class="brd-toc-item">
                                <strong>{{ $index + 1 }}. {{ $item }}</strong>
                                <div class="brd-toc-dots"></div>
                            </a>
                        @endforeach
                    @elseif($isMM)
                        @foreach($mmToc as $num => $item)
                            <a href="#section-{{ $num }}" class="brd-toc-item">
                                <strong>{{ $num }}. {{ $item }}</strong>
                                <div class="brd-toc-dots"></div>
                            </a>
                        @endforeach
                    @elseif($isFI)
                        @foreach($fiToc as $index => $item)
                            <a href="#section-{{ $index + 1 }}" class="brd-toc-item">
                                <strong>{{ $index + 1 }}. {{ $item }}</strong>
                                <div class="brd-toc-dots"></div>
                            </a>
                        @endforeach
                    @elseif($isPP)
                        @foreach($ppToc as $index => $item)
                            <a href="#section-{{ $index + 1 }}" class="brd-toc-item">
                                <strong>{{ $index + 1 }}. {{ $item }}</strong>
                                <div class="brd-toc-dots"></div>
                            </a>
                        @endforeach
                    @else
                        <a href="#background" class="brd-toc-item">
                            <strong>1. Background</strong>
                            <div class="brd-toc-dots"></div>
                        </a>
                        <a href="#scope" class="brd-toc-item">
                            <strong>2. Scope</strong>
                            <div class="brd-toc-dots"></div>
                        </a>
                        <a href="#out-of-scope" class="brd-toc-item">
                            <strong>3. Out of Scope</strong>
                            <div class="brd-toc-dots"></div>
                        </a>
                        @if(is_array($record->flowcharts) && count($record->flowcharts) > 0)
                            <a href="#flowcharts" class="brd-toc-item">
                                <strong>4. Flowcharts</strong>
                                <div class="brd-toc-dots"></div>
                            </a>
                        @endif
                        @if(method_exists($record, 'requirements') && $record->requirements()->count() > 0)
                            <a href="#requirements" class="brd-toc-item">
                                <strong>{{ is_array($record->flowcharts) && count($record->flowcharts) > 0 ? '5.' : '4.' }} Business
                                    Requirements & Impact Analysis</strong>
                                <div class="brd-toc-dots"></div>
                            </a>
                        @endif
                        @if(method_exists($record, 'signoffs') && $record->signoffs()->count() > 0)
                            <a href="#signoff" class="brd-toc-item">
                                <strong>Approval Sign-off</strong>
                                <div class="brd-toc-dots"></div>
                            </a>
                        @endif
                    @endif
                </div>
            </div>
        </div>

        <!-- PAGE 2: Narrative -->
        @if($isSD || $isMM || $isFI || $isPP)
            @php
                $scopeHtml = $record->scope ?? '';
                $sections = explode('<div id="section-', $scopeHtml);
                $firstPart = array_shift($sections);
            @endphp

            @if(trim($firstPart) !== '')
                <div style="display:none;">
                    {!! $firstPart !!}
                </div>
            @endif

            @foreach($sections as $section)
                <div class="brd-page">
                    <div style="text-align: right; margin-bottom: 1rem;">
                        <a href="#daftar-isi" style="font-size:12px; font-weight:normal; color:#2563eb; background:#eff6ff; padding:4px 12px; border-radius:50px; border:1px solid #bfdbfe; text-decoration:none; text-transform:none; letter-spacing:normal; cursor:pointer;" onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#eff6ff'">↑ Kembali ke Daftar Isi</a>
                    </div>
                    <div class="mb-12 prose max-w-none prose-sm text-justify text-gray-800 leading-loose">
                        {!! '<div id="section-' . $section !!}
                    </div>
                </div>
            @endforeach
        @else
            <div class="brd-page">
                <div style="text-align: right; margin-bottom: 1rem;">
                    <a href="#daftar-isi" style="font-size:12px; font-weight:normal; color:#2563eb; background:#eff6ff; padding:4px 12px; border-radius:50px; border:1px solid #bfdbfe; text-decoration:none; text-transform:none; letter-spacing:normal; cursor:pointer;" onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#eff6ff'">↑ Kembali ke Daftar Isi</a>
                </div>
                <div class="mb-12" id="background">
                    <h2 class="brd-h2">1. Background</h2>
                    <div class="prose max-w-none prose-sm text-justify text-gray-800 leading-loose">
                        {!! $record->background ?: '<em>No background information provided.</em>' !!}
                    </div>
                </div>

                <div class="mb-12" id="scope">
                    <h2 class="brd-h2">2. Scope</h2>
                    <div class="prose max-w-none prose-sm text-justify text-gray-800 leading-loose">
                        {!! $record->scope ?: '<em>No scope information provided.</em>' !!}
                    </div>
                </div>

                <div class="mb-12" id="out-of-scope">
                    <h2 class="brd-h2">3. Out of Scope</h2>
                    <div class="prose max-w-none prose-sm text-justify text-gray-800 leading-loose">
                        {!! $record->out_of_scope ?: '<em>No out of scope information provided.</em>' !!}
                    </div>
                </div>
            </div>
        @endif

        @if(!$isSD && !$isMM && !$isFI && !$isPP && is_array($record->flowcharts) && count($record->flowcharts) > 0)
            <!-- PAGE: Flowcharts -->
            <div class="brd-page" id="flowcharts">
                <h2 class="brd-h2">Flowcharts</h2>
                <div class="flex flex-col gap-8 items-center mt-8">
                    @foreach($record->flowcharts as $img)
                        <div class="w-full border border-gray-300 p-4 rounded bg-gray-50 flex justify-center">
                            <img src="{{ Storage::url($img) }}" alt="Flowchart" class="max-w-full h-auto object-contain">
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- PAGE: Requirements & Impact Analysis -->
        @if(!$isSD && !$isMM && !$isFI && !$isPP && method_exists($record, 'requirements') && $record->requirements()->count() > 0)
            <div class="brd-page" id="requirements">
                <h2 class="brd-h2 mb-8">Business Requirement dan Impact Analisis</h2>

                @foreach($record->requirements as $req)
                    <div class="mb-12 border border-gray-300 rounded-md overflow-hidden">
                        <h3 class="brd-h3 m-4">{{ $req->sub_ref_id ?? $req->req_code }}. {{ $req->module_name }} Process</h3>

                        <table class="brd-table !mb-0 border-0" style="border:none;">
                            <thead style="background-color: #64748b; color: white;">
                                <tr>
                                    <th style="width: 10%; border-color: #475569;">Ref. ID</th>
                                    <th style="width: 15%; border-color: #475569;">Sub Ref. ID</th>
                                    <th style="width: 45%; border-color: #475569;">Business Requirement</th>
                                    <th style="width: 30%; border-color: #475569;">Impact Analysis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border-top: none;">{{ $req->req_code }}</td>
                                    <td style="border-top: none;">{{ $req->sub_ref_id }}<br><br><em>{{ $req->module_name }}</em>
                                    </td>
                                    <td style="border-top: none; text-align: justify; padding-right: 20px;">
                                        <div class="prose prose-sm max-w-none text-gray-800">
                                            {!! nl2br(e($req->description)) !!}
                                        </div>
                                    </td>
                                    <td style="border-top: none; background-color: #f8fafc; font-size: 0.75rem;">
                                        <div class="space-y-3">
                                            <div>
                                                <strong class="text-gray-900 block">Process Owner:</strong>
                                                <span class="text-gray-700">{{ $req->impact_process_owner ?: 'N/A' }}</span>
                                            </div>
                                            <div>
                                                <strong class="text-gray-900 block">Data Owner:</strong>
                                                <span class="text-gray-700">{{ $req->impact_data_owner ?: 'N/A' }}</span>
                                            </div>
                                            <div>
                                                <strong class="text-gray-900 block">System Integration:</strong>
                                                <span class="text-gray-700">{{ $req->impact_system_integration ?: 'N/A' }}</span>
                                            </div>
                                            <div>
                                                <strong class="text-gray-900 block">Process Custom:</strong>
                                                <span class="text-gray-700">{{ $req->impact_process_custom ?: 'N/A' }}</span>
                                            </div>
                                            <div>
                                                <strong class="text-gray-900 block">Policy:</strong>
                                                <div class="text-gray-700 text-justify mt-1">
                                                    {!! nl2br(e($req->impact_policy ?: 'N/A')) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        @endif

        @php
            $signoffsByParty = method_exists($record, 'signoffs') ? $record->signoffs->groupBy('party_name') : collect();
        @endphp

        @if($signoffsByParty->isNotEmpty())
            <!-- PAGE: Approval -->
            <div class="brd-page" id="approval">
                @foreach($signoffsByParty as $party => $signoffs)
                    <div class="mb-12">
                        <h3 class="font-bold text-gray-800 italic mb-2"
                            style="background: #d1d5db; display: inline-block; padding: 2px 8px;">
                            Tandatangan untuk {{ $party }}
                        </h3>
                        <table class="brd-table">
                            <thead style="background-color: #64748b; color: white;">
                                <tr>
                                    <th style="width: 30%; border-color: #475569;">Name</th>
                                    <th style="width: 30%; border-color: #475569;">Project Role</th>
                                    <th style="width: 20%; border-color: #475569;">Date</th>
                                    <th style="width: 20%; border-color: #475569;">Signed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($signoffs as $sign)
                                    <tr>
                                        <td class="font-bold text-gray-800">{{ $sign->name }}</td>
                                        <td>{{ $sign->project_role }}</td>
                                        <td class="text-center">{{ $sign->signed_at ? $sign->signed_at->format('d M Y') : '' }}</td>
                                        <td class="text-center align-middle" style="height: 60px;">
                                            @if($sign->signature_image)
                                                <img src="{{ \Illuminate\Support\Facades\Storage::url($sign->signature_image) }}"
                                                    alt="Signature" class="h-10 mx-auto">
                                            @else
                                                <span class="text-gray-400 text-xs italic">pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        @endif

    </div>

    <script>
        // Prevent Ctrl+P or Cmd+P (Print), Ctrl+S (Save), Ctrl+U (View Source), F12 (DevTools)
        window.addEventListener('keydown', function (e) {
            // Print (Ctrl+P)
            if ((e.ctrlKey || e.metaKey) && (e.key === 'p' || e.key === 'P')) {
                e.preventDefault();
                e.stopPropagation();
                alert('Pencetakan (Print) dinonaktifkan untuk dokumen ini karena bersifat rahasia (Confidential).');
                return false;
            }
            
            // Save (Ctrl+S)
            if ((e.ctrlKey || e.metaKey) && (e.key === 's' || e.key === 'S')) {
                e.preventDefault();
                e.stopPropagation();
                alert('Penyimpanan halaman (Save) dinonaktifkan untuk dokumen ini karena bersifat rahasia (Confidential).');
                return false;
            }
            
            // View Source (Ctrl+U)
            if ((e.ctrlKey || e.metaKey) && (e.key === 'u' || e.key === 'U')) {
                e.preventDefault();
                return false;
            }
            
            // DevTools (F12 or Ctrl+Shift+I)
            if (e.key === 'F12' || ((e.ctrlKey || e.metaKey) && e.shiftKey && (e.key === 'i' || e.key === 'I'))) {
                e.preventDefault();
                return false;
            }
        }, true);
        
        // Prevent Right Click (Context Menu)
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
        });

        // Anti-Save Protection: If the document is saved and opened locally (file://) or hosted elsewhere, wipe it
        var allowedHost = "{{ request()->getHost() }}";
        if (window.location.hostname !== allowedHost) {
            document.body.innerHTML = '<div style="display:flex; justify-content:center; align-items:center; height:100vh; background:#f8fafc; color:#ef4444; font-family:sans-serif; font-size:24px; font-weight:bold;">UNAUTHORIZED ACCESS: Document is protected.</div>';
            document.title = "Confidential";
        }

        // Additional defense: clear body content just before print dialog opens (if initiated from browser menu)
        window.addEventListener('beforeprint', function (e) {
            document.body.style.display = 'none';
        });
        window.addEventListener('afterprint', function (e) {
            document.body.style.display = '';
        });

        // Auto-scale custom HTML flowcharts to fit the page
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.brd-page .overflow-x-auto > div').forEach(function (flowchart) {
                // Check if it's a fixed-width flowchart
                if (flowchart.style.position === 'relative' && flowchart.style.width) {
                    var flowWidth = parseInt(flowchart.style.width);
                    var containerWidth = flowchart.parentElement.clientWidth;

                    if (flowWidth && flowWidth > containerWidth) {
                        var scale = containerWidth / flowWidth;
                        flowchart.style.transformOrigin = 'top left';
                        flowchart.style.transform = 'scale(' + scale + ')';

                        // Adjust parent height so it doesn't leave huge empty space
                        if (flowchart.style.height) {
                            var flowHeight = parseInt(flowchart.style.height);
                            flowchart.parentElement.style.height = (flowHeight * scale + 40) + 'px';
                        }
                        flowchart.parentElement.style.overflow = 'hidden';
                    }
                }
            });
        });
    </script>
@endsection