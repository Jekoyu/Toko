<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('harga');
            $table->integer('stok');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('distributor_id');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
