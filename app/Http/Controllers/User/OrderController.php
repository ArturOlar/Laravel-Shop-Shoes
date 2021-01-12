<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\OrderStoreRequest;

class OrderController extends Controller
{
    // сохранить заказ в БД
    public function addOrder(OrderStoreRequest $request)
    {
        dd($request->all());
        $objOrder = new Order();
        $idOrder = $objOrder->createOrder($request);

        $objOrderProduct = new OrderProduct();
        $objOrderProduct->createOrder($request, $idOrder);

        Session::flush();
        return redirect()->back();
    }
}
