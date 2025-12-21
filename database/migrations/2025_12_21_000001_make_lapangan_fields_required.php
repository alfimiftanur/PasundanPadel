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
        
        \DB::table('lapangans')
            ->whereNull('deskripsi')
            ->orWhere('deskripsi', '')
            ->update(['deskripsi' => '-']);

        \DB::table('lapangans')
            ->whereNull('lokasi')
            ->orWhere('lokasi', '')
            ->update(['lokasi' => '-']);

        Schema::table('lapangans', function (Blueprint $table) {
            $table->text('deskripsi')->nullable(false)->change();
            $table->text('lokasi')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lapangans', function (Blueprint $table) {
            $table->text('deskripsi')->nullable()->change();
            $table->text('lokasi')->nullable()->change();
        });
    }
};
