<?php

use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = date('Y');
        foreach(\App\Publication::all() as $publication){
//            $price = $v = mt_rand( 10, 1000 ) / 10;
            for ($month=2; $month<6; $month++){
                \App\Period::create([
                    "publication_id" => $publication->id,
                    "year" => $year,
                    "month" => $month,
                    "price" => 1,
                    "sale_from" => strtotime($year.'-01-01'),
                    "sale_to" => strtotime($year.'-'.($month-1).'-25'),
                ]);
            }
        }
    }
}
