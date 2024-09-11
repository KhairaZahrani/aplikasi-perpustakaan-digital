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
        Schema::create('buku', function (Blueprint $table) {
            $table->id('id_buku');
            $table->unsignedBigInteger('id_kategori'); // pastikan ini unsignedBigInteger
            $table->string('judul', 255);
            $table->string('penulis', 255);
            $table->string('penerbit', 255);
            $table->integer('tahun_terbit');
            $table->text('deskripsi');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade'); 
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
        Schema::dropIfExists('buku');
    }
};
