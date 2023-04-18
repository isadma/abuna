<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('types', function (Blueprint $table) {
            $table->boolean('status')->after('slug')->default(true);
        });

        Schema::table('publications', function (Blueprint $table) {
            $table->boolean('status')->after('state')->default(true);
        });

        Schema::table('periods', function (Blueprint $table) {
            $table->boolean('status')->after('sale_to')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('types', function (Blueprint $table) {
            //
        });
    }
}
