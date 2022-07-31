<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->integer('parcel_inuserid');
            $table->integer('parcel_outuserid');
            $table->integer('parcel_customerid');
            $table->float('parcel_width', 5, 2);
            $table->float('parcel_length', 5, 2);
            $table->float('parcel_height', 5, 2);
            $table->float('parcel_kg', 5, 2);
            $table->float('parcel_total', 15, 2);
            $table->string('parcel_barcode');
            $table->string('parcel_signature');
            $table->string('pacel_picture');
            $table->string('parcel_picturepayment');
            $table->float('parcel_countpayment', 15, 2);
            $table->date('parcel_receivedate');
            $table->date('parcel_outdate');
            $table->integer('parcel_shelfid');
            $table->integer('parcel_status');
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
        Schema::dropIfExists('parcels');
    }
}
