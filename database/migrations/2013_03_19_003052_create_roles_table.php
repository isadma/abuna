<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        DB::table('roles')->insert(
            array(
                'name' => 'user',
                'description' => 'user',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
        DB::table('roles')->insert(
            array(
                'name' => 'admin',
                'description' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
