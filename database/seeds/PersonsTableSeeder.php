<?php

use Illuminate\Database\Seeder;

use App\Person;

class PersonsTableSeeder extends Seeder
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
           Person::create([
               'name' => $faker->firstname('male'),
               'name2' => $faker->firstname('male'),
               'last-name' => $faker->lastname,
               'second-last-name' => $faker->lastname,
               'gender' => 'M',
               'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now') ,
               'title' => $faker->titleMale,
               'curp' => 'JCF930818CY8',
               'marital-status' => 'Soltero',
               'profession' => 'Ingeniero',
           ]);
       }
    }
}
