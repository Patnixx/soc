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

    function cleanString($text) {
        $text = mb_strtolower($text, 'UTF-8');
        $utf8 = array(
            '/[áàâãªäÁÀÂÃÄ]/u'   => 'a',
            '/[čČ]/u'             => 'c',
            '/[ďĎ]/u'             => 'd',
            '/[éèêëÉÈÊË]/u'       => 'e',
            '/[íìîïÍÌÎÏ]/u'       => 'i',
            '/[ĺľĹĽ]/u'           => 'l',
            '/[ňñŇÑ]/u'           => 'n',
            '/[óòôõºöÓÒÔÕÖ]/u'    => 'o',
            '/[řŘ]/u'             => 'r',
            '/[šŠ]/u'             => 's',
            '/[ťŤ]/u'             => 't',
            '/[úùûüÚÙÛÜ]/u'       => 'u',
            '/[ýÿÝŸ]/u'           => 'y',
            '/[žŽ]/u'             => 'z',
            '/[–—]/u'             => '-', // dlhé pomlčky
            '/[’‘‹›‚]/u'          => "'", // jednoduché úvodzovky
            '/[“”«»„]/u'          => '"', // dvojité úvodzovky
            '/\s+/u'              => ' ', // nahradenie viacerých medzier jednou

            '/[(){}[]]/u'          => ' ', // zátvorky
        );
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }

    public function titleToImageName($text)
    {
        $text = $this->cleanString($text);
        $text = str_replace(' ', '_', $text);
        $text = str_replace('(', '', $text);
        $text = str_replace(')', '', $text);
        return $text;
    }
}
