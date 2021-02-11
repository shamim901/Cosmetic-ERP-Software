<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ExistingTrainingColumnToImamRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imam_registraions', function (Blueprint $table) {

            $table->integer('training_id')->nullable();
            $table->integer('batch_id')->nullable();
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
              $table->dropColumn('training_id');
              $table->dropColumn('batch_id');
        });
    }
}
