<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRemarkToRouteParcelsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('route_parcels', function (Blueprint $table) {
            $table->string('remark')->after('route_ordbycustid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('route_parcels', function (Blueprint $table) {
            $table->dropColumn('remark');
        });
    }
}
