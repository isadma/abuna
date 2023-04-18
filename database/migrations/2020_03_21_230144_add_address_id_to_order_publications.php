<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressIdToOrderPublications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_publications', function (Blueprint $table) {
            $table->unsignedBigInteger("address_id")->after("publication_id");
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_publications', function (Blueprint $table) {
            //
        });
    }
}
