<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMosqueTreasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosque_treasures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mosques_id')->nullable();
            $table->double('mosques_property_measurements', 8, 2)->nullable();
            $table->double('mosques_floor_number', 8, 2)->nullable();
            $table->double('mosques_property_price', 8, 2)->nullable();
            $table->double('mosques_annual_income', 8, 2)->nullable();
            $table->double('mosques_annual_expense', 8, 2)->nullable();
            $table->integer('mosques_property_type')->nullable();
            $table->integer('mosques_management')->nullable();
            $table->integer('mosques_khatib')->nullable();
            $table->integer('mosques_imam')->nullable();
            $table->integer('mosques_muazzin')->nullable();
            $table->integer('mosques_khadem')->nullable();
            $table->char('mosques_imam_training',255)->nullable();
            $table->char('motalli_name',120)->nullable();
            $table->char('motalli_mobile',50)->nullable();
            $table->char('imam_name',120)->nullable();
            $table->char('imam_mobile',50)->nullable();
            $table->char('imam_nid',50)->nullable();
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
        Schema::dropIfExists('mosque_treasures');
    }
}
