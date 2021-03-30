<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeterminerPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('determiner_places', function (Blueprint $table) {
        $table->id();
        $table->integer('place');
        $table->string('heure');
        $table->unsignedBigInteger('jour_id');
        $table->foreign('jour_id')->references('id')->on('jours');
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
        Schema::dropIfExists('determiner_places');
    }
}
