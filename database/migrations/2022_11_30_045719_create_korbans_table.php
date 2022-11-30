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
        Schema::create('korban', function (Blueprint $table) {
            $table->id();
            $table->integer('master_data_id');
            $table->string('meninggal');
            $table->string('hilang');
            $table->string('terluka_berat');
            $table->string('terluka_ringan');
            $table->string('rujuk_rs');
            $table->string('pulang_rs');
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
        Schema::dropIfExists('korban');
    }
};
