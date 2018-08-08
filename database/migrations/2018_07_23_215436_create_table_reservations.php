<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReservations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_excursion')->nullable();
            $table->integer('id_circuit')->nullable();
            $table->string('name');
            $table->string('prenom');
            $table->string('tele');
            $table->string('email');
            $table->string('pays');
            $table->string('civilite');
            $table->datetime('date_start');
            $table->string('hotel');
            $table->string('hotel_adress');
            $table->integer('adulte');
            $table->integer('enfant');
            $table->integer('enfant_3');
             $table->float('prixuniq', 8, 2);
            $table->float('prixtotale', 8, 2);
            $table->timestamps();
             $table->foreign('id_excursion')->references('id')->on('excursions')->onDelete('cascade');
              $table->foreign('id_circuit')->references('id')->on('circuits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
