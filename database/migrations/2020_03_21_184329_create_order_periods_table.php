<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_periods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_publication_id');
            $table->unsignedBigInteger('period_id');
            $table->timestamps();

            $table->foreign('order_publication_id')->references('id')->on('order_publications')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_periods');
    }
}
