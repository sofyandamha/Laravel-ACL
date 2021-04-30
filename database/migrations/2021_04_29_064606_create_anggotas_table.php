<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('komdas_id')->unsigned();
            $table->string('nama');
			$table->string('jabatan');
            $table->string('alamat');
            $table->timestamps();
			
			$table->foreign('komdas_id')
            ->references('id')
            ->on('komdas')
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
        Schema::dropIfExists('anggotas');
    }
}
