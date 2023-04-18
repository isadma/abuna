<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->integer('phone')->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('role_id')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('password');
            $table->boolean('status')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'username' => 'admin',
                'role_id' => 2,
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
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
        Schema::dropIfExists('users');
    }
}
