<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (\App\Helpers\Telegram $telegram) {
    $buttons = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'Telegram',
                    'callback_data' => 'telega'
                ],
                [
                    'text' => 'Mail',
                    'callback_data' => 'mail'
                ],
                [
                    'text' => 'FB Messager',
                    'callback_data' => 'msg_fb'
                ],
            ],
            [
                [
                    'text' => 'Slack',
                    'callback_data' => 'slack'
                ],
                [
                    'text' => 'Viber',
                    'callback_data' => 'viber'
                ],

            ],
        ]
    ];
    $resp = $telegram->editButtons(env('TELEGRAM_ID'), 'Перейти к просмотру в мессаджерах', json_encode($buttons), 76);
//    dd($resp->body());
//    $telegram->editMessage(env('TELEGRAM_ID'), 'Перейти к просмотру в мессаджерах',  76);
});






