<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainImam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_imams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('imam_id');
            $table->integer('masjid_id');
            $table->integer('division');
            $table->integer('district');
            $table->integer('upazila');
            $table->integer('union')->nullable();
            $table->integer('village')->nullable();
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
        Schema::dropIfExists('train_imams');
    }
}
