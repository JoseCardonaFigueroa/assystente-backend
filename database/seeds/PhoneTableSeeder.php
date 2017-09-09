<?php

use Illuminate\Database\Seeder;
use App\Phone;

class PhoneTableSeeder extends Seeder
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
           PHone::create([
               'p-number' => $faker->phoneNumber('male'),
               'person_id' => rand(1, 49)
           ]);
       }
    }
}
