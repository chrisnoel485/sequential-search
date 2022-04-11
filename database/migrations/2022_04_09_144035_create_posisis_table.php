<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosisisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posisis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('aset_id')->unsigned();;
            $table->integer('letak_id')->unsigned();;
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->foreign('aset_id')->references('id')->on('asets')
                ->onDelete('cascade');
            $table->foreign('letak_id')->references('id')->on('letaks')
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
        Schema::dropIfExists('posisis');
    }
}
