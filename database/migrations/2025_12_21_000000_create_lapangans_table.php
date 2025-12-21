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
        Schema::create('lapangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lapangan');
            $table->string('tipe_lapangan'); 
            $table->text('deskripsi')->nullable();
            $table->integer('kapasitas')->default(2); 
            $table->decimal('harga_per_jam', 10, 2);
            $table->string('status')->default('tersedia'); 
            $table->string('foto')->nullable();
            $table->text('lokasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lapangans');
    }
};
