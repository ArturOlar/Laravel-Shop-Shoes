<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ProductSize;
use Illuminate\Http\Request;
use App\Http\Requests\BalanceProductRequest;
use Illuminate\Support\Facades\DB;

class ProductSizeController extends Controller
{
    // изменить остаток товаров
    public function changeBalanceProduct(BalanceProductRequest $request)
    {
        for ($i = 0; $i < count($request->id_product); $i++) {
            DB::table('product_sizes')->where([
                    ['id_product', $request->id_product[$i]],
                    ['id_size', $request->id_size[$i]],
                ])->update(['balance_product' => $request->count[$i]]);
        }

        session()->flash('success', 'Баланс изменен');
        return redirect()->back();
    }

    // показать кол-во запасов по товарах
    public function showBalanceProduct($id)
    {
        return view('admin.product.balance-product', [
            'product' => Product::find($id),
        ]);
    }
}
