<?php

namespace App\Http\Controllers;

use App\Helpers\Telegram;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use function PHPUnit\Framework\stringContains;

class OrderController extends Controller
{
    public function create(Request $request)
    {
        $orders = Order::active()->orderBy('name')->paginate(5);
        return view('orders.create', compact('orders'));
    }

    public function store(StoreOrderRequest $request, Order $order, Telegram $telegram)
    {

        $key=base64_encode(md5(uniqid()));
        $buttons = [
            'inline_keyboard' => [
                [
                    [
                        'text' => 'Принять',
                        'callback_data' => '1|'.$key
                    ],
                    [
                        'text' => 'Отменить',
                        'callback_data' => '0|'.$key
                    ],
                ]
            ]
        ];

        $ord= $order::create($request->validated() +['secret_key' =>$key]);

        $data = [
            'id' => $ord->id,
            'email' => $ord->email,
            'name' =>$ord->name,
            'product' => $ord->product,
        ];
//        dd($data);
        $telegram->sendButtons(env('TELEGRAM_ID'), (string)view('telegram.new', $data), $buttons);
        return redirect()->route('orders.create');

    }

    public function show(Request $request, Order $order)
    {
        return view('telegram.new', $order->toArray());
    }

}
