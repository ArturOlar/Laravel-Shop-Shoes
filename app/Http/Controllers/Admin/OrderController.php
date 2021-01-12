<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderProduct;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // все заказы
    public function allOrders()
    {
        return view('admin.order.orders', [
            'title' => 'Все заказы',
            'orders' => Order::paginate(20),
        ]);
    }

    // все новые заказы
    public function newOrders()
    {
        return view('admin.order.orders', [
            'title' => 'Новые заказы',
            'orders' => Order::where('id_status', 1)->paginate(20),
        ]);
    }

    // все заказы в работе
    public function inWorkOrders()
    {
        return view('admin.order.orders', [
            'title' => 'В работе',
            'orders' => Order::where('id_status', 2)->paginate(20),
        ]);
    }

    // все заказы в работе
    public function canceledOrders()
    {
        return view('admin.order.orders', [
            'title' => 'Отмененные заказы',
            'orders' => Order::where('id_status', 3)->paginate(20),
        ]);
    }

    // все заказы в работе
    public function completedOrders()
    {
        return view('admin.order.orders', [
            'title' => 'Выполненные заказы',
            'orders' => Order::where('id_status', 4)->paginate(20),
        ]);
    }

    // один заказ
    public function oneOrder($id)
    {
        return view('admin.order.one-order', [
            'order' => Order::find($id),
            'products' => OrderProduct::where('id_order', $id)->get(),
        ]);
    }

    // перенести заказ в статус "в работе"
    public function transferOrderInWork($id)
    {
        $order = Order::find($id);
        $order->id_status = 2;
        $order->save();

        session()->flash('success', 'Заказ перенесен в статус "в работе"');
        return redirect()->back();
    }

    // перенести заказ в статус "отменен"
    public function transferOrderCanceled($id)
    {
        $order = Order::find($id);
        $order->id_status = 3;
        $order->save();

        session()->flash('success', 'Заказ перенесен в статус "отменен"');
        return redirect()->back();
    }

    // перенести заказ в статус "выполнен"
    public function transferOrderСompleted($id)
    {
        $order = Order::find($id);
        $order->id_status = 4;
        $order->save();

        session()->flash('success', 'Заказ перенесен в статус "выполнен"');
        return redirect()->back();
    }
}
