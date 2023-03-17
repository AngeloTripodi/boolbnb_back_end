<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsorships = [
            [
                'price' => 2.99,
                'name' => 'basic',
                'duration' => 24
            ],
            [
                'price' => 5.99,
                'name' => 'premium',
                'duration' => 72
            ],
            [
                'price' => 9.99,
                'name' => 'elite',
                'duration' => 144
            ],
        ];

        foreach ($sponsorships as $sponsorship) {
            $newSponsorship = new Sponsorship();
            $newSponsorship->price = $sponsorship['price'];
            $newSponsorship->name = $sponsorship['name'];
            $newSponsorship->duration = $sponsorship['duration'];
            $newSponsorship->save();
        }
    }
}
