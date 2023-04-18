<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeSlugsToTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Type::findOrFail(1)->update(['slug'=>'newspaper']);
        \App\Type::findOrFail(2)->update(['slug'=>'magazine']);
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
