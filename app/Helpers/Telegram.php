<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\This;

class Telegram
{
    protected $http;
    protected $bot;
    const url = 'https://api.tlgr.org/bot';

    public function __construct(Http $http, $bot)
    {
        $this->bot = $bot;
        $this->http = $http;
    }

    public function sendMessage($cht_id, $message)
    {
        return $this->http::post(self::url . $this->bot . '/sendMessage',
            [
                'chat_id' => $cht_id,
                'text' => $message,
                'parse_mode' => 'html'
            ]);
    }

    public function sendDocument($cht_id, $file, $relay_message_id=null)
    {
        return $this->http::attach('document', Storage::get('/public/' . $file), 'doc3333ument.jpg')->post(self::url . $this->bot . '/sendDocument',
            [
                'chat_id' => $cht_id,
                'reply_to_message_id'=>$relay_message_id,
            ]);
    }
}
