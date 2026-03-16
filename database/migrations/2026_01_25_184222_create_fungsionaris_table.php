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
        Schema::create('fungsionaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fungsionaris', 50);
            $table->string('photo_path', 255)->nullable();
            $table->foreignId('jabatan_id')->constrained('jabatans');
            $table->foreignId('kementerian_id')->nullable()->constrained('kementerians');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fungsionaris');
    }
};
