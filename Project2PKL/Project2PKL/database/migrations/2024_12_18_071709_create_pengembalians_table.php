<?php

// database/migrations/2024_12_20_000000_create_pengembalians_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengembaliansTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')->references('id_buku')->on('buku')->onDelete('cascade');
            $table->string('keterangan')->nullable(); // Keterangan keterlambatan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pengembalians');
    }
}
