<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    //
    public function inboxIndex() {
        $user = Auth::user();
        $messages = Message::where('receiver_id', $user->id)->get();
        return view('inbox.inbox', compact('user', 'messages'));
    }

    public function newIndex(){
        $user = Auth::user();
        return view('inbox.write', compact('user'));
    }

    public function createMessage(Request $request){
        $user = Auth::id();
        $request->validate([
            'email' => 'required',
            'title' => 'required',
            'content' => 'required'
        ]);

        $send_to = User::where('email', $request->email)->first();
        Message::create([
            'sender_id' => $user,
            'receiver_id' => $send_to->id,
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('inbox');
    }
}
