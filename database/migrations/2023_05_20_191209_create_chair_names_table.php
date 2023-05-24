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
        Schema::create('chair_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chair_type_id');
            $table->foreign('chair_type_id')->references('id')->on('chair_types')->cascadeOnDelete();
            $table->string('name');
            $table->boolean('row_active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chair_names');
    }
};
