<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {


            $data = [
                'description' => $e->getMessage(),
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ];

            \Illuminate\Support\Facades\Http::post('https://api.tlgr.org/bot5058359738:AAFkfQgu-_y84RzU0lR5v0IgP4qNTwsYCKY/sendMessage',
                [
                    'chat_id' => 487032241,
                    'text' =>  (string) view('telegram.errors',  $data),
//                    'text' => $data,
                    'parse_mode' => 'html'
                ]);
        });
    }
}
