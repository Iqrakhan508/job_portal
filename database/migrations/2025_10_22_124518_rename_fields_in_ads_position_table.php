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
        Schema::table('ads_position', function (Blueprint $table) {
            $table->dropColumn(['adsposition', 'adscompany', 'adscode']);
        });
        
        Schema::table('ads_position', function (Blueprint $table) {
            $table->string('ads_position')->after('id');
            $table->string('ads_company')->after('ads_position');
            $table->text('ads_code')->after('ads_company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ads_position', function (Blueprint $table) {
            $table->dropColumn(['ads_position', 'ads_company', 'ads_code']);
        });
        
        Schema::table('ads_position', function (Blueprint $table) {
            $table->string('adsposition')->after('id');
            $table->string('adscompany')->after('adsposition');
            $table->text('adscode')->after('adscompany');
        });
    }
};
