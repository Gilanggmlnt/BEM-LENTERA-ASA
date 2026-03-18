<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Add username to users table
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'username')) {
                $table->string('username')->nullable()->unique()->after('name');
            }
        });

        // Create beritas table
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category');
            $table->string('image')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('description');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
        });
        Schema::dropIfExists('beritas');
    }
};
