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
        $messages = Message::with('sender')->where('receiver_id',$user->id)->where('is_deleted', 0)->get();
        Message::where('receiver_id', $user->id)->where('is_read', 0)->update([
            'is_read' => 1,
            'updated_at' => now(),
        ]);
        $unread = $this->checkMails();
        return view('inbox.inbox', compact('user', 'messages', 'unread'));
    }

    public function newIndex(){
        $user = Auth::user();
        $unread = $this->checkMails();
        return view('inbox.write', compact('user', 'unread'));
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

    public function detailMessage($id){
        $user = Auth::user();
        $message = Message::with('sender')->where('id', $id)->first();
        $unread = $this->checkMails();
        return view('inbox.detail', compact('user', 'message', 'unread'));
    }

    public function deleteMessage($id){
        Message::where('id', $id)->update([
            'is_deleted' => 1,
            'updated_at' => now(),
        ]);
        return redirect()->route('inbox');
    }

    public function deletedIndex(){
        $user = Auth::user();
        $messages = Message::with('sender')->where('receiver_id', $user->id)->where('is_deleted', 1)->get();
        $unread = $this->checkMails();
        return view('inbox.deleted', compact('user', 'messages', 'unread'));
    }

    public function restoreMessage($id){
        Message::where('id', $id)->update([
            'is_deleted' => 0,
            'updated_at' => now(),
        ]);
        return redirect()->route('deleted.messages');
    }

    public function binClear(){
        $user = Auth::user();
        Message::where('receiver_id', $user->id)->where('is_deleted', 1)->delete();
        return redirect()->route('deleted.messages');
    }
}
