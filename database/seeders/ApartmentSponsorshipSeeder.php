<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsorship;
use Carbon\Carbon;
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
        $apartments = Apartment::where('address', 'LIKE', '%' . 'Milano')->get();

        $sponsorships = Sponsorship::all()->pluck('id');

        foreach ($faker->randomElements($apartments, 3) as $apartment) {
            $apartment->sponsorships()->attach($faker->randomElement($sponsorships), [
                'starting_date' => $faker->dateTime(),
                'ending_date' => Carbon::now()->addDays(7)
            ]);
        }

        $otherApartments = Apartment::where('address', 'LIKE', '%' . 'Roma')->orWhere('address', 'LIKE', '%' . 'Caltanissetta' . '%')->get();

        foreach ($otherApartments as $apartment) {
            $apartment->sponsorships()->attach($faker->randomElement($sponsorships), [
                'starting_date' => $faker->dateTime(),
                'ending_date' => Carbon::now()->addDays(7)
            ]);
        }
    }
}
