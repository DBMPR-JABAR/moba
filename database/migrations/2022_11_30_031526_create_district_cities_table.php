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
        Schema::create('district_cities', function (Blueprint $table) {
            $table->id();
            $table->string('kemendagri_kabupaten_kode')->nullable();
            $table->string('kemendagri_provinsi_nama')->nullable();
            $table->string('kemendagri_provinsi_kode')->nullable();
            $table->string('dinkes_kota_kode')->nullable();
            $table->string('kemendagri_kabupaten_nama')->nullable();
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
        Schema::dropIfExists('district_cities');
    }
};
