<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatExcursionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excursions', function (Blueprint $table) {
            $table->increments('id');
            $table->json('titre');
            $table->json('description');
            $table->json('information');
            $table->string('ville');
            $table->float('prix1_4', 8, 2);
            $table->float('prix5_7', 8, 2);
            $table->float('prix0', 8, 2);
            $table->boolean('top')->nullable();
            $table->boolean('active')->default(1);
            $table->datetime('deleted_at')->nullable();
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
        Schema::dropIfExists('excursions');
    }
}
