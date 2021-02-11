<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMosqueInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mosque_institutions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('mosques_id')->nullable();
            $table->boolean('mosques_library')->nullable();
            $table->boolean('iibrarian')->nullable();
            $table->integer('total_books')->nullable();
            $table->integer('total_almary')->nullable();
            $table->char('mosques_institute_type',255)->nullable();
            $table->char('mosques_institute_name',255)->nullable();
            $table->char('madrasa_type',255)->nullable();
            $table->integer('aliya_madrasa_stage')->nullable();
            $table->enum('kawmia_madrasa_stage', ['test'])->nullable();
            $table->integer('mass_education')->nullable();
            $table->char('center_teacher_training',255)->nullable();
            
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
        Schema::dropIfExists('mosque_institutions');
    }
}
