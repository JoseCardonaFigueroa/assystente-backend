<?php

use Illuminate\Database\Seeder;
use App\Appointment;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = \Faker\Factory::create();

      for ($i=0; $i < 50; $i++) {
        Appointment::create([
            'person_id' => rand(1, 50),
            'disease_id' => rand(1, 50),
            'address_id' => rand(1, 50),
            'observations' => $faker->realText(200,2),
            'appointment-date' => $faker->dateTimeThisMOnth(),
            'phone' => $faker->phoneNumber(),
        ]);
      }

    }
}
