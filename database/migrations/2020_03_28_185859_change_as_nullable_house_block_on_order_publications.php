<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAsNullableHouseBlockOnOrderPublications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_publications', function (Blueprint $table) {
            $table->string('block')->nullable()->change();
            $table->string('house')->nullable()->change();
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
