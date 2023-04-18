<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });

        \App\State::create([
            'name' => 'Aşgabat',
            'slug' => \Illuminate\Support\Str::slug('Aşgabat')
        ]);
        \App\State::create([
            'name' => 'Ahal',
            'slug' => \Illuminate\Support\Str::slug('Ahal')
        ]);
        \App\State::create([
            'name' => 'Balkan',
            'slug' => \Illuminate\Support\Str::slug('Balkan')
        ]);
        \App\State::create([
            'name' => 'Daşoguz',
            'slug' => \Illuminate\Support\Str::slug('Daşoguz')
        ]);
        \App\State::create([
            'name' => 'Lebap',
            'slug' => \Illuminate\Support\Str::slug('Lebap')
        ]);
        \App\State::create([
            'name' => 'Mary',
            'slug' => \Illuminate\Support\Str::slug('Mary')
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
}
