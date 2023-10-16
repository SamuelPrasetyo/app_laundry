<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_outlet');
            $table->string('kode_invoice');
            $table->integer('id_member');
            $table->dateTime('tanggal');
            $table->dateTime('batas_waktu');
            $table->dateTime('tanggal_bayar');
            $table->integer('biaya_tambahan');
            $table->double('diskon');
            $table->integer('pajak');
            $table->enum('status', ['baru','proses','selesai','diambil']);
            $table->enum('dibayar', ['sudah','belum']);
            $table->integer('id_user');
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
        Schema::dropIfExists('transaksi');
    }
};
