<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'wi-fi',
            'parking',
            'pool',
            'reception',
            'self check in',
            'free cancellation',
            'hair dryer',
            'shower gel',
            'essentials',
            'iron',
            'air conditioning',
            'refrigerator',
            'cooking basics',
            'lockbox'
        ];

        foreach ($services as $service) {
            $newService = new Service();
            $newService->name = $service;
            $newService->slug = Str::slug($newService->name);
            $newService->save();
        }
    }
}
