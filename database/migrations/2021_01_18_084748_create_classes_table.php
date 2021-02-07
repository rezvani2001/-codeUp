<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('password');
            $table->bigInteger('creatorID');
            $table->string('creatorName');
            $table->string('classKey')->unique();
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
        //
        Schema::dropIfExists('Classes');
    }
}
