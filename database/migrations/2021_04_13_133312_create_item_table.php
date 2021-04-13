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
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->constrained('kategori');
            $table->foreignId('tipe_id')->constrained('tipe');
            $table->foreignId('user_id')->constrained('users');
            $table->string('judul', 20);
            $table->binary('foto');
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
        Schema::dropIfExists('item');
    }
}
