<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentInfoToOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('payment');
            $table->string('payment_id')->default(false)->after('user_id');
            $table->string('status')->nullable()->after('payment_id');
            $table->double('amount', 12,2)->nullable()->after('status');
            $table->text('info')->nullable()->after('amount');
            $table->integer('time')->nullable()->after('info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
