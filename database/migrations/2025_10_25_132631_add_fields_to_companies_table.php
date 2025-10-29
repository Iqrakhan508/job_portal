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
        Schema::table('companies', function (Blueprint $table) {
            $table->string('industry')->nullable()->after('name');
            $table->string('location')->nullable()->after('industry');
            $table->string('company_size')->nullable()->after('location');
            $table->integer('founded_year')->nullable()->after('company_size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['industry', 'location', 'company_size', 'founded_year']);
        });
    }
};
