<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $brands = scandir('../storage/app/public/brands');
        unset($brands[0], $brands[1]);

        return view('user.main', [
            'products' => Product::take(20)->get(),
            'brands' => $brands,
        ]);
    }

    // поиск товаров
    public function searchProduct(Request $request)
    {
        if (empty($request->search)){
            return redirect('/');
        }

        $allProducts = Product::where('name', 'LIKE', "%{$request->search}%")->paginate(15);
        return view('user.product.all-product', [
            'products' => $allProducts,
            'request' => $request->search,
            'route' => 'products',
        ]);
    }
}
