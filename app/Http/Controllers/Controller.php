<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function checkMails()
    {
        $user = Auth::user();
        $unread = Message::where('receiver_id', $user->id)->where('is_read', 0)->count();
        if($unread == 0){
            return 0;
        }
        elseif($unread > 0 && $unread <= 9)
        {
            return $unread;
        }
        elseif($unread > 9)
        {
            return '9+';
        }
    }
}
