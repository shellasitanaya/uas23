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
        Schema::create('detail_log_pengiriman', function (Blueprint $table) {
            $table->uuid("id")->primary();
            // $table->string("nomor_resi");
            // $table->timestamp("tanggal");
            $table->uuid("transaksi_resi_pengiriman_id");
            $table->string("kota");
            $table->string("keterangan");
            $table->timestamps();
            // ngambil id dari transaksi resi pengiriman , nyari id di resi id
            $table->foreign("transaksi_resi_pengiriman_id")->references("id")->on("transaksi_resi_pengiriman")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_log_pengiriman');
    }
};
