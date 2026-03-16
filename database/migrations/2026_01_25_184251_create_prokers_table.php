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
        Schema::create('prokers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kementerian_id')->constrained('kementerians')->onDelete('cascade');
            $table->string('nama_proker', 255);
            $table->string('slug', 255)->unique();
            $table->string('nama_ketuplak', 100);
            $table->text('deskripsi_proker');
            $table->string('pamflet', 255)->nullable(); // mapping to 'flyer' from CSV
            $table->date('tanggal_pelaksanaan');
            $table->text('dokumentasi')->nullable(); // multiple images comma separated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prokers');
    }
};
