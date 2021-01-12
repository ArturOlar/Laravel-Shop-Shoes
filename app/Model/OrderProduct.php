<?php

namespace App\Model;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class OrderProduct extends Model
{
    protected $table = 'orders_product';
    protected $fillable = ['id_order', 'id_product', 'id_size', 'price', 'count'];

    // создать товар в таблице "order_product"
    public function createOrder(Request $request, $idOrder)
    {
        $orderProduct = [];
        for ($i = 0; $i < count($request->id_product); $i++) {
            $orderProduct = [
                'id_order' => $idOrder,
                'id_product' => $request->id_product[$i],
                'id_size' => $request->id_size[$i],
                'price' => $request->price[$i] - ($request->price[$i] * $request->discount[$i] / 100),
                'count' => $request->count[$i],
            ];
            OrderProduct::create($orderProduct);
        }
        return;
    }

    // связь с таблицей продуктов
    public function product()
    {
        return $this->hasOne(Product::class, 'id_product', 'id_product');
    }

    // связь с таблицей размеров обуви
    public function size()
    {
        return $this->hasOne(Size::class, 'id_size', 'id_size');
    }
}
