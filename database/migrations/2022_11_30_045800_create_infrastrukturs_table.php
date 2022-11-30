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
        Schema::create('infrastrukturs', function (Blueprint $table) {
            $table->id();
            $table->string('master_data_id');
            $table->string('kategori_infrastruktur');
            $table->string('nama_infrastruktur');
            $table->string('alamat');
            $table->string('lat');
            $table->string('long');
            $table->string('kategori_kerusakan');
            $table->string('lebar_jalan')->nullable();
            $table->string('akses')->nullable();
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
        Schema::dropIfExists('infrastrukturs');
    }
};
