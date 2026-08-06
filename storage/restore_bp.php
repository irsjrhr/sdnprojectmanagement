<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

try {
    Config::set('database.connections.sqlite_temp', [
        'driver' => 'sqlite',
        'database' => 'c:/laragon/www/ITManagementSystem/database/database.sqlite',
        'prefix' => '',
    ]);
    
    $orig = DB::connection('sqlite_temp')->select('select * from blueprint_documents where id=1');
    if ($orig) {
        $scope = str_replace('Detail Keputusan Sistem "Test"', 'Detail Keputusan Sistem', $orig[0]->scope);
        
        DB::table('blueprint_documents')->where('id', 1)->update([
            'background' => $orig[0]->background,
            'scope' => $scope,
            'out_of_scope' => $orig[0]->out_of_scope
        ]);
        echo "Restored successfully\n";
    } else {
        echo "Not found in source DB\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
