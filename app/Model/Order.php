<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Order extends Model
{
    protected $primaryKey = 'id_order';
    protected $fillable = ['user_name', 'user_surname', 'user_phone', 'email', 'delivery', 'id_status'];

    // создать товар в таблице "orders"
    public function createOrder(Request $request)
    {
        $order = [
            'user_name' => $request->name,
            'user_surname' => $request->surname,
            'user_phone' => $request->phone,
            'email' => $request->email,
            'delivery' => $request->delivery,
            'id_status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        $order = Order::create($order);
        return $order->id_order;
    }

    // связь с таблицей статусов
    public function status()
    {
        return $this->hasOne(OrderStatus::class, 'id_status', 'id_status');
    }
}
