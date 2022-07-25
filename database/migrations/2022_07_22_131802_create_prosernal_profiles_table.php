<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsernalProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prosernal_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('userid');
            $table->string('fullname');
            $table->string('tell');
            $table->integer('ages');
            $table->integer('gender');
            $table->date('bightday');
            $table->string('picture');
            $table->string('documents');
            $table->string('status');
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
        Schema::dropIfExists('prosernal_profiles');
    }
}
