<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProductSize extends Model
{
    protected $table = 'product_sizes';
    protected $fillable = ['id_product', 'id_size', 'balance_product'];
    protected $primaryKey = 'id_product';

    // создать размеры обуви
    public static function createSizeByProduct(Request $request, $idProduct)
    {
        foreach ($request->id_size as $key => $size) {
            $objSize = new ProductSize();
            $objSize->id_product = $idProduct;
            $objSize->id_size = $size;
            $objSize->balance_product = 0;
            $objSize->save();
        }
        return;
    }

    // редактировать товар
    public static function updateSizeByProduct(Request $request, $idProduct)
    {
        for ($i = 0; $i < count($request->id_size); $i++) {
            $obj = DB::table('product_sizes')->where([
                ['id_product', $idProduct],
                ['id_size', $request->id_size[$i]],
            ])->first();
            if ($obj == null) {
                $objSize = new ProductSize();
                $objSize->id_product = $idProduct;
                $objSize->id_size = $request->id_size[$i];
                $objSize->balance_product = 0;
                $objSize->save();
            }
        }
        return;
    }

    // связь с таблицей продуктов
    public function products()
    {
        return $this->belongsToMany(Product::class, 'id_product', 'id_product');
    }

    // связь с таблицей размеров
    public function size()
    {
        return $this->belongsTo(Size::class, 'id_size', 'id_size');
    }
}
