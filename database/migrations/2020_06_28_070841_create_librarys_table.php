<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrarysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librarys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('mosque_name', 100);
            $table->bigInteger('mosque_id');
            $table->bigInteger('division_id');
            $table->bigInteger('district_id');
            $table->bigInteger('upazilla_id');
            $table->bigInteger('union_id');
            $table->bigInteger('village_id');
            $table->integer('establish_year');
            $table->integer('total_books_by_ifa');
            $table->integer('total_books_by_other');
            $table->integer('total_books');
            $table->integer('total_almari');
            $table->date('almari_receive_date');
            $table->date('last_visit_date');
            $table->char('visitor_name', 100);
            $table->char('visitor_designation', 100);
            $table->char('visitor_address', 255);
            $table->char('visitor_comment', 255);
            $table->integer('have_signboard');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('librarys');
    }
}
