<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanBarangGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_barang_gurus', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nama_peminjam');
            $table->string('nik')->nullable();
            $table->string('jabatan_id');
            $table->integer('barang_id');
            $table->string('tanggal_pinjam');
            $table->string('tanggal_kembali');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman_barang_gurus');
    }
}
