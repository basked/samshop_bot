<?php

use Illuminate\Support\Facades\Route;

Route::get('/orders/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('orders.create');
Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show');
Route::post('/orders/store', [\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');
/*

Route::get('/', function (\App\Helpers\Telegram $telegram) {
    $buttons = [
        'inline_keyboard' => [
            [
                [
                    'text' => 'Telegram',
                    'callback_data' => 'telega'
                ],
                [
                    'text' => 'Maiil',
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
    $resp = $telegram->sendMessage(env('TELEGRAM_ID'), 'basked');
});
*/





