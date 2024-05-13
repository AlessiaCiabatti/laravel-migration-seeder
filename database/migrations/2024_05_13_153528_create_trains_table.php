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
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            // string di default crear un VARCHAR
            // se come secondo parametro non metto nulla di default è 255
            // ad esempio nome reference: villa fiorita
            $table->string('reference', 100);
            // lo slug c'è sempre, stessa lunghezza, è la nostra reference ad esempio 'villa-fiorita', si prende il nome della reference quindi del prodotto e la rende compatibile con la url, è importante per seo
            $table->string('slug', 100)->unique();
            $table->string('departure_station', 80);
            $table->string('arrival_station', 80);
            $table->time('departure_time');
            $table->string('train_code', 50);
            $table->tinyInteger('number_carriages')->unsigned();
            $table->time('in_time');
            $table->string('cancelled');
            $table->text('description')->nullable();
            $table->boolean('aviable_train')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // rollback se esiste la tabella trains cancellala
    public function down()
    {
        Schema::dropIfExists('trains');
    }
};
