<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            [
                'name' => 'Ginetto',
                'email'=> 'ginetto@ginetta.com',
                'message' => 'Ciao Ginetto, ci manchi!',
                'phone_number' => '+393490005000'
            ],
            [
                'name' => 'Ginetta',
                'email'=> 'ginetta@ginetto.com',
                'message' => 'Ciao Ginetta, ci manchi!',
                'phone_number' => null
            ],

        ];

        foreach ($messages as $message) {
            $newMessage = new Message();
            $newMessage->apartment_id = Apartment::inRandomOrder()->first()->id;
            $newMessage->name = $message['name'];
            $newMessage->email = $message['email'];
            $newMessage->message = $message['message'];
            $newMessage->phone_number = $message['phone_number'];
            $newMessage->save();
        }
    }
}
