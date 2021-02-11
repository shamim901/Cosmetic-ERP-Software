<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMuaRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mua_registration', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('reg_code', 191)->unique();
            $table->string('father_name', 191);
            $table->string('mother_name', 191);
            $table->string('dob');
            $table->string('img');
            $table->integer('division');
            $table->integer('district');
            $table->integer('upazila');
            $table->integer('union')->nullable();
            $table->integer('village')->nullable();

            $table->string('exam_name', 191);
            $table->string('board_uni', 191);
            $table->string('institue_name', 191);
            $table->string('subject', 191);
            $table->string('year', 191);

            $table->boolean('status')->default(1);
            $table->string('remember_token', 100)->nullable();
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mua_registration');
    }
}
