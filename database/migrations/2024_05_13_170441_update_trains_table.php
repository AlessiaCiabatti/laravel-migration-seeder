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
        Schema::table('trains', function (Blueprint $table) {
            $table->tinyInteger('km_to_travel')->unsigned()->after('arrival_station');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // nella migration di update è necessario scrivere cosa bisogna eliminare del metodo down, devo droppare la colonna qui
        Schema::table('trains', function (Blueprint $table) {
            $table->dropColumn('km_to_travel');
        });
    }
};
