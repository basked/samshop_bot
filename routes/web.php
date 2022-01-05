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
//    $resp= $telegram->sendMessage(env('TELEGRAM_ID'),'fgghgfhj' );
//    dd($resp->body());
  $resp=  $telegram->sendDocument(env('TELEGRAM_ID'), '404.jpg',70 );
     dd( $resp->body());
});






