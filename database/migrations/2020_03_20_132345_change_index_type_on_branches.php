<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeIndexTypeOnBranches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropUnique(['index']);
            $table->string('slug')->unique()->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branch', function (Blueprint $table) {
            //
        });
    }
}
