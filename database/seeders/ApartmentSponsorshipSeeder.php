<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ApartmentSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();

        $sponsorships = Sponsorship::all()->pluck('id');

        foreach ($apartments as $apartment) {
            $apartment->sponsorships()->attach($faker->randomElement($sponsorships), [
                'starting_date' => $faker->dateTime(),
                'ending_date' => $faker->dateTime(),
            ]);
        }


        // !errore perchè andiamo ad inserire i records starting/endind_date nella tabella apartment, il metodo attach() si occupa di creare le righe nella tabella pivot
        /* foreach ($apartments as $apartment) {
            $apartment->sponsorships()->attach($faker->randomElements($sponsorships, 1));
            $apartment = new Apartment();
            $apartment->starting_date = $faker->dateTime();
            $apartment->ending_date = $faker->dateTime();
            $apartment->save(); 
            }
        */
    }
}
