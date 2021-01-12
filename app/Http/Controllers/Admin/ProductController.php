<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Brand;
use App\Model\Category;
use App\Model\GenderCategory;
use App\Model\ImageProduct;
use App\Model\Product;
use App\Model\ProductSize;
use App\Model\Size;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $objProduct = new Product();
        $query = $objProduct->filtersProduct($request);
        $products = $query->paginate(30)->withPath("?" . $request->getQueryString());

        return view('admin.product.all-product', [
            'route' => 'product.index',
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create-product', [
            'genders' => GenderCategory::all(),
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'sizes' => Size::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $idProduct = Product::createProduct($request);
        if ($request->images != null) {
            ImageProduct::createImageByProduct($request, $idProduct);
        }
        ProductSize::createSizeByProduct($request, $idProduct);

        session()->flash('success', 'Новый товар создан');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.edit-product', [
            'product' => Product::find($id),
            'genders' => GenderCategory::all(),
            'categories' => Category::all(),
            'brands' => Brand::all(),
            'sizes' => Size::all(),
            'images' => ImageProduct::where('id_product', $id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, $id)
    {
        $idProduct = Product::updateProduct($request, $id);
        if ($request->images != null) {
            ImageProduct::createImageByProduct($request, $idProduct);
        }
        ProductSize::updateSizeByProduct($request, $idProduct);

        session()->flash('success', 'Товар успешно обновлен');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        ProductSize::where('id_product', $id)->delete();
        ImageProduct::where('id_product', $id)->delete();

        session()->flash('success', 'Товар успешно удален');
        return redirect()->back();
    }

    // удалить изображение товара (используется при редактировании товара)
    public function deleteImage(Request $request)
    {
        ImageProduct::destroy($request->id_image);
        echo json_encode("запись удалена");
    }
}
