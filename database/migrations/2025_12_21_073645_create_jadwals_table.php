<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('court_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['tersedia', 'terboking'])->default('tersedia');
            $table->timestamps();

            $table->foreign('court_id')
                  ->references('id')
                  ->on('lapangans')
                  ->onDelete('cascade');
            
            $table->index(['court_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
