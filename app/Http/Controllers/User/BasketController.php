<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\AddToBasketRequest;

class BasketController extends Controller
{
    // показать корзину
    public function showBasket()
    {
        $products = Session::get('basket');

        $data = [];
        $i = 0;
        if (!empty($products)) {
            foreach ($products as $item) {
                $product = Product::find($item['idProduct']);
                $data[$i]['idProduct'] = $item['idProduct'];
                $data[$i]['count'] = $item['count'];
                $data[$i]['idSize'] = $item['idSize'];
                $data[$i]['size'] = Size::find($item['idSize']);
                $data[$i]['price'] = $product->price;
                $data[$i]['discount'] = $product->discount;
                $data[$i]['name'] = $product->name;
                $data[$i]['category'] = $product->category->name;
                $data[$i]['brand'] = $product->brand->name;
                $data[$i]['image'] = $product->images[0]->image;
                $i++;
            }
        }

        return view('user.basket.show-basket', [
            'products' => $data,
        ]);
    }

    // увеличить количество товаров в корзине
    public function plusProductInBasket($id, $size)
    {
        $products = Session::pull('basket');

        foreach ($products as $key => $product) {
            if ($product['idProduct'] == $id && $product['idSize'] == $size) {
                $products[$key]['count']++;
            }
        }

        Session::put('basket', $products);
        return redirect()->back();
    }

    // уменьшить количество товаров в корзине
    public function minusProductInBasket($id, $size)
    {
        $products = Session::pull('basket');

        foreach ($products as $key => $product) {
            if ($product['idProduct'] == $id && $product['idSize'] == $size && $product['count'] > 1) {
                $products[$key]['count']--;
            }
        }

        Session::put('basket', $products);
        return redirect()->back();
    }

    // удалить товар из корзины
    public function deleteProductInBasket($id, $size)
    {
        $products = Session::pull('basket');

        foreach ($products as $key => $product) {
            if ($product['idProduct'] == $id && $product['idSize'] == $size) {
                unset($products[$key]);
            }
        }

        Session::put('basket', $products);
        return redirect()->back();
    }

    // добавить товар в корзину (из карточки товара)
    public function addToBasket(AddToBasketRequest $request)
    {
        $basket = Session::get('basket');

        $basket[] = [
            'idProduct' => $request->id_product,
            'idSize' => $request->id_size,
            'count' => $request->count,
        ];

        Session::put('basket', $basket);
        session()->flash('success', 'товар добавлен в корзину');
        return redirect()->back();
    }
}
