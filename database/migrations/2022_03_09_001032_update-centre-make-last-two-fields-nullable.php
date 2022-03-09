<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCentreMakeLastTwoFieldsNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('centre', function (Blueprint $table) {
            $table->unsignedBigInteger('communes')->nullable()->change();
            $table->unsignedBigInteger('arrondissements')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centre', function (Blueprint $table) {
            $table->unsignedBigInteger('communes')->nullable(false)->change();
            $table->unsignedBigInteger('arrondissements')->nullable(false)->change();
        });
    }
}
