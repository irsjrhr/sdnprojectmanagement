<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blueprint_requirements', function (Blueprint $table) {
            $table->string('sub_ref_id')->nullable();
            $table->string('impact_process_owner')->nullable();
            $table->string('impact_data_owner')->nullable();
            $table->string('impact_system_integration')->nullable();
            $table->string('impact_process_custom')->nullable();
            $table->text('impact_policy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blueprint_requirements', function (Blueprint $table) {
            $table->dropColumn([
                'sub_ref_id', 
                'impact_process_owner', 
                'impact_data_owner', 
                'impact_system_integration', 
                'impact_process_custom', 
                'impact_policy'
            ]);
        });
    }
};
