<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToimamRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imam_registraions', function (Blueprint $table) {
             $table->string('depart', 191);
             $table->renameColumn('subject', 'result');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imam_registraions', function (Blueprint $table) {
             $table->dropColumn('depart');
             $table->dropColumn('result');
        });
    }
}
