<?php

use Illuminate\Database\Seeder;
use App\Disease;

class DiseaseTableSeeder extends Seeder
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

        for ($i = 0; $i < 50; $i++) {
           Disease::create([
               'disease-name' => 'cancer' . $i,
           ]);
       }
    }
}
