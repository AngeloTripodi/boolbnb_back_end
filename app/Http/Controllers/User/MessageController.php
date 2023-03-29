<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userId = Auth::id();
        $messages = Message::whereHas('apartment', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        //dd($messages);
        return view('user.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //dd($message);
        return view('user.messages.show', compact('message'));
    }
}
