<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePlandays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plandays', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_circuit')->references('id')->on('circuits')->onUpdate('cascade')->onDelete('set null');
            $table->json('jour');
            $table->json('titre');
            $table->json('description');
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
        Schema::dropIfExists('plandays');
    }
}
