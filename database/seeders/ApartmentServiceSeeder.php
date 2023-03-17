<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();

        $services = Service::all()->pluck('id');
        //? altra soluzione: non utilizzare attach e utilizzare metodo di Angelo
        /**foreach ($apartments as $apartment) {
            $elements = $faker->randomElements($services, 2);
            $apartment->services()->sync($elements);
        }
        */
        foreach($apartments as $apartment){
            $apartment->services()->attach($faker->randomElements($services, 5));
        }
    }
}
