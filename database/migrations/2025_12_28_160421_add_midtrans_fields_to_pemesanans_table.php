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
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->string('order_id')->nullable()->after('id');
            
            $table->string('snap_token')->nullable()->after('order_id');
            
            $table->string('transaction_id')->nullable()->after('snap_token');
            
            $table->string('payment_method')->nullable()->after('payment_status');
            
            $table->timestamp('paid_at')->nullable()->after('payment_method');
        });
    }


    public function down(): void
    {
        Schema::table('pemesanans', function (Blueprint $table) {
            $table->dropColumn([
                'order_id',
                'snap_token',
                'transaction_id',
                'payment_method',
                'paid_at'
            ]);
        });
    }
};
