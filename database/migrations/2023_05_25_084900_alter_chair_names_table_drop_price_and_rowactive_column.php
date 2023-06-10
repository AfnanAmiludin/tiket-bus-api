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
        Schema::table('chair_names', function (Blueprint $table) {
            $table->dropColumn('row_active');
            $table->dropColumn('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chair_names', function (Blueprint $table) {
            $table->string('price')->nullable();
            $table->boolean('row_active')->default(false);
        });
    }
};
