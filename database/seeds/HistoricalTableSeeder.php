<?php

use Illuminate\Database\Seeder;
use App\Historical;

class HistoricalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
           Historical::create([
               'description' => 'cancer' . $i,
               'person_id' => rand(1,50),
           ]);
       }
    }
}
