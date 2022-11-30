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
        Schema::create('fasilitas_umum', function (Blueprint $table) {
            $table->id();
            $table->string('master_data_id');
            $table->string('kategori_fasilitas');
            $table->string('nama_fasilitas');
            $table->string('alamat');
            $table->string('lat');
            $table->string('long');
            $table->string('kategori_kerusakan');
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
        Schema::dropIfExists('fasilitas_umum');
    }
};
