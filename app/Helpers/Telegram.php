<?php


namespace App\Helpers;


class Telegram
{

    public function sendMessage($cht_id, $message)
    {

        \Illuminate\Support\Facades\Http::post('https://api.tlgr.org/bot5058359738:AAFkfQgu-_y84RzU0lR5v0IgP4qNTwsYCKY/sendMessage',
            [
                'chat_id' => $cht_id,
                'text' =>$message,
                'parse_mode' => 'html'
            ]);
    }
}
