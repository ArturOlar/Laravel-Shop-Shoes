<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';

    // создать товар
    public static function createProduct(Request $request)
    {
        $objProduct = new Product();
        $objProduct->name = $request->name;
        $objProduct->desc = $request->desc;
        $objProduct->price = $request->price;
        $objProduct->discount = $request->discount;
        $objProduct->id_gender = $request->id_gender;
        $objProduct->id_category = $request->id_category;
        $objProduct->id_brand = $request->id_brand;
        $objProduct->save();

        return $objProduct->id_product;
    }

    // редактировать товар
    public static function updateProduct(Request $request, $id)
    {
        $objProduct = Product::find($id);
        $objProduct->name = $request->name;
        $objProduct->desc = $request->desc;
        $objProduct->price = $request->price;
        $objProduct->discount = $request->discount;
        $objProduct->id_gender = $request->id_gender;
        $objProduct->id_category = $request->id_category;
        $objProduct->id_brand = $request->id_brand;
        $objProduct->save();

        return $objProduct->id_product;
    }

    // фильтра для товаров
    public function filtersProduct(Request $request)
    {
        $query = Product::query();

        if ($request->filled('price_from')) {
            $query->where('price', '>=', $request->price_from);
        }

        if ($request->filled('price_to')) {
            $query->where('price', '<=', $request->price_to);
        }

        if ($request->id_gender !== null) {
            $query->whereIn('id_gender', $request->id_gender);
        }

        if ($request->id_category !== null) {
            $query->whereIn('id_category', $request->id_category);
        }

        if ($request->id_brand !== null) {
            $query->whereIn('id_brand', $request->id_brand);
        }

        if ($request->id_size !== null) {
            $query->join('product_sizes', 'product_sizes.id_product', '=', 'products.id_product')
                ->whereIn('id_size', [$request->id_size]);
        }

        return $query;
    }

    // связь с таблицей гендеоров
    public function gender()
    {
        return $this->hasOne(GenderCategory::class, 'id_gender', 'id_gender');
    }

    // связь с таблицей категорий
    public function category()
    {
        return $this->hasOne(Category::class, 'id_category', 'id_category');
    }

    // связь с таблицей брендов
    public function brand()
    {
        return $this->hasOne(Brand::class, 'id_brand', 'id_brand');
    }

    // связь с таблицей размеров обуви
    public function sizes()
    {
        return $this->hasMany(ProductSize::class, 'id_product', 'id_product');
    }

    // связь с таблицей отзывов
    public function reviews()
    {
        return $this->hasMany(Review::class, 'id_product', 'id_product');
    }

    // связь с таблицей изображений
    public function images()
    {
        return $this->hasMany(ImageProduct::class, 'id_product', 'id_product');
    }
}
