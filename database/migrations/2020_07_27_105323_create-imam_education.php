<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImamEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imam_educations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('exam_name', 191);
            $table->string('board_uni', 191);
            $table->string('institue_name', 191);
            $table->string('depart', 191);
            $table->string('result', 191);
            $table->string('year', 191);
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
        Schema::dropIfExists('imam_educations');
    }
}
