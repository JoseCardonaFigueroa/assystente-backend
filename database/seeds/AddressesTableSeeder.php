<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressesTableSeeder extends Seeder
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
           Address::create([
               'street-name' => $faker->firstname('male'),
               'neighborhood' => $faker->firstname('male'),
               'external-number' => '101',
               'internal-number' => 'A',
               'person_id' => rand(1, 50)
           ]);
       }
    }
}
