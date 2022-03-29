<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deces', function (Blueprint $table) {
            $table->id();
            $table->integer('Pays');
            $table->integer('Regions');
            $table->integer('Departments');
            $table->integer('Arrondissments');
            $table->integer('Comunes');
            $table->integer('Centres');
            $table->dateTime('Date_du_Décès');
            $table->char('Numéro_de_déclaration');
            $table->dateTime('Date_de_déclaration');
            $table->time('time_of_death');
            $table->string('place_o_death');
            $table->string('health_training');
            $table->string('firstname_of_the_deceased');
            $table->string('lasttname_of_the_deceased');
            $table->dateTime('dob_of_deceased');
            $table->string('birthplace_of_deceased');
            $table->string('occupation_of_the_deceased');
            $table->string('sex_of_deceased');
            $table->string('address_of_deceased');
            $table->string('firstname_of_the_father_of_deceased');
            $table->string('father_family_name');
            $table->dateTime('dob_of_father');
            $table->string('occupation_of_the_father_of_deceased');
            $table->string('address_of_the_father_of_deceased');
            $table->string('firstname_of_the_mother_of_deceased');
            $table->string('mother_family_name');
            $table->dateTime('dob_of_mother');
            $table->string('occupation_of_the_mother_of_deceased');
            $table->string('address_of_the_mother_of_deceased');
            $table->string('declarant_firstname');
            $table->string('declarant_lasttname');
            $table->string('declarant_address');
            $table->string('declarant_profession');
            $table->integer('declarant_cin');
            $table->string('Parente');
            $table->string('judgement_judgement')->nullable();
            $table->dateTime('judgement_date')->nullable();
            $table->string('judgement_number')->nullable();
            $table->integer('judgement_region')->nullable();
            $table->string('mention_marginales')->nullable();
            $table->string('created_by');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deces');
    }
}
