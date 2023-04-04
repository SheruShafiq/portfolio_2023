<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->bigInteger('own_contribution')->after('description');
            $table->bigInteger('external_contribution')->after('own_contribution');
            $table->bigInteger('crowdfunding_contribution')->after('external_contribution');
        });
    }

    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn('own_contribution');
            $table->dropColumn('external_contribution');
            $table->dropColumn('crowdfunding_contribution');
        });
    }
};
