<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publication_id');
            $table->integer('year');
            $table->integer('month');
            $table->double('price', 12, 3);
            $table->integer('sale_from');
            $table->integer('sale_to');
            $table->timestamps();

            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periods');
    }
}
