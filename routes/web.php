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

Route::get('/', function () {


    \Illuminate\Support\Facades\Http::post('https://api.tlgr.org/bot5058359738:AAFkfQgu-_y84RzU0lR5v0IgP4qNTwsYCKY/sendMessage',[
        'chat_id'=>487032241,
        'text'=>'<pre>basked</pre>',
        'parse_mode'=>'html'
    ])
});






