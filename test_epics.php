<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
$epics = App\Models\Epic::orderBy('name')->pluck('name');
foreach ($epics as $epic) {
    echo $epic . PHP_EOL;
}
