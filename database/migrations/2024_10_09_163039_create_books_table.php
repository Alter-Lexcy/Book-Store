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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('judul');
            $table->string('penulis');
            $table->unsignedBigInteger('penerbit_id');
            $table->foreign('penerbit_id')->references('id')->on('publishers');
            $table->date('tanggal_rilis');
            $table->string('stok');
            $table->bigInteger('harga');
            $table->text('deskripsi_buku')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
