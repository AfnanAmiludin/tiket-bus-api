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
        Schema::create('bus_chairs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buses_id');
            $table->foreign('buses_id')->references('id')->on('buses')->cascadeOnDelete();
            $table->unsignedBigInteger('chair_name_id');
            $table->foreign('chair_name_id')->references('id')->on('chair_names')->cascadeOnDelete();
            $table->boolean('row_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bus_chairs');
    }
};
