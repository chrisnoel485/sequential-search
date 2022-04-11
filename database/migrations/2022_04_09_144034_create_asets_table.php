<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('deskripsi')->nullable();
            $table->integer('merek_id')->unsigned();;
            $table->integer('kategori_id')->unsigned();;
            $table->integer('jenis_id')->unsigned();;
            $table->integer('letak_id')->unsigned();;
            $table->string('status');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('merek_id')->references('id')->on('mereks')
                ->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategoris')
                ->onDelete('cascade');
            $table->foreign('letak_id')->references('id')->on('letaks')
                ->onDelete('cascade');
                $table->foreign('jenis_id')->references('id')->on('jenis')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asets');
    }
}
