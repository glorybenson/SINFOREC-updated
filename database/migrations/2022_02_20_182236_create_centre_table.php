<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centre', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('arrondissements');
            $table->foreign( 'arrondissements')->references( 'id')->on( 'arrondissement')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('departments');
            $table->foreign( 'departments')->references( 'id')->on( 'department')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('regions');
            $table->foreign( 'regions')->references( 'id')->on( 'regions')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('communes');
            $table->foreign( 'communes')->references( 'id')->on( 'communes')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger( 'created_by');
            $table->unique( [ 'description', 'created_by']);
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
        Schema::dropIfExists('centre');
    }
}
