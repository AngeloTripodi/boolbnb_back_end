<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Message;

class MessageController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'name' => 'string|required|min:2|max:40',
                'email' => 'email|required|min:3',
                'message' => 'required|string',
                'phone_number' => 'nullable',
                'apartment_id' => 'required'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'success' => false,

                // ? un metodo che restituisce un array letterale di errori in cui
                // § la chiave è l'elemento della validazione convalidato
                // # e il valore è l'errore relativo a quell'elemento
                'errors' => $validator->errors(),
            ]);
        }

        $message = new Message();
        $message->fill($data);
        $message->save();

        // Mail::to('rcpc.bool@gmail.com')->send(new NewContact($lead));

        return response()->json([
            'success' => true
        ]);

        // restituiamo una risposta json
        // restituire una risposta json errata se il dato non arriva bene
    }
}
