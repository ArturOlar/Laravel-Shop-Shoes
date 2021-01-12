<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // получить все товары
    public function getAllProducts(Request $request)
    {
        $objProduct = new Product();
        $query = $objProduct->filtersProduct($request);
        $products = $query->paginate(12)->withPath("?".$request->getQueryString());

        return view('user.product.all-product', [
            'route' => 'products',
            'products' => $products,
        ]);
    }

    // получить один товар
    public function getOneProduct($id)
    {
        $product = Product::find($id);

        return view('user.product.one-product', [
            'product' => $product,
            'reviews' => Review::where('id_product', $id)->get(),
        ]);
    }
}
