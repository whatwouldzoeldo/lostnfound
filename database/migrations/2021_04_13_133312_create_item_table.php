<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('kategori_id')->nullable();
            // $table->foreignId('tipe_id')->nullable();
            // $table->foreignId('user_id')->nullable();
            $table->string('judul', 20);
            $table->string('foto', 100);
            $table->text('keterangan');
            $table->string('lokasi', 50);
            $table->string('kontak', 50);
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
        Schema::dropIfExists('items');
    }
}
