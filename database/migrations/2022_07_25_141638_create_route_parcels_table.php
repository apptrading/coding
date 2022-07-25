<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_parcels', function (Blueprint $table) {
            $table->id();
            $table->string('route_barcode');
            $table->integer('route_userid');
            $table->integer('route_branchid');
            $table->integer('route_titleid');
            $table->integer('route_international');
            $table->integer('route_status');
            $table->integer('route_ordbycustid');
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
        Schema::dropIfExists('route_parcels');
    }
}
