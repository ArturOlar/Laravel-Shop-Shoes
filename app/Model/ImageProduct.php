<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'image_products';
    protected $primaryKey = 'id_image';
    protected $fillable = ['image'];

    // сохранить изображения к товарам
    public static function createImageByProduct(Request $request, $idProduct)
    {
        foreach ($request->file('images') as $images) {
            $path = $images->store('public/images');
            $path = substr($path, 7);
            $objImage = new ImageProduct();
            $objImage->id_product = $idProduct;
            $objImage->image = $path;
            $objImage->save();
        }

        return;
    }
}
