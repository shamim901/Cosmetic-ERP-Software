<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibraryApplicationForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('mosque_name', 100);
            $table->bigInteger('mosque_id');
            $table->bigInteger('division_id');
            $table->bigInteger('district_id');
            $table->bigInteger('upazilla_id');
            // $table->bigInteger('union_id');
            $table->bigInteger('village_id');
            $table->integer('mosjid_establish_year');
            $table->integer('masjid_room_condition');

            $table->bigInteger('direction')->comment ="1= Komiti, 2= mutaoyalli";
            $table->integer('last_year_meeting');
            $table->integer('number_Namazi_Daily');
            $table->integer('number_Namazi_Weekly');
            $table->integer('total_yearly_income');
            $table->integer('wakf_property')->comment ="1= have, 2= have not";
            $table->integer('wakf_property_amount');
            // $table->integer('total_yearly_income');

            $table->integer('wood_almari');
            $table->integer('still_almari');
            $table->integer('wall_almari');
            $table->integer('total_almari');
            $table->integer('isHaveLibraryByIF')->comment ="1= have, 2= have not";
            $table->integer('book_register');            
            $table->integer('onudan_register');            
            $table->integer('issue_register');            
            $table->integer('karzo_biboroni_register');            
            $table->integer('stock_register');            
            $table->integer('cultural_register');            
            $table->integer('other_register');            
            $table->char('edu_instit_or_govt', 255);
            $table->char('library_within_range', 255);
            $table->integer('trained_imam');  
            $table->char('imam_komiti', 255); 
            $table->integer('last_year_waz');
            $table->integer('last_year_alocona');
            $table->integer('last_year_tafsir');
            $table->integer('mosjid_activity');
            $table->char('on_behalf_of_name', 100);
            $table->char('visitor_address', 255);
            
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
        Schema::dropIfExists('library_applications');
    }
}
