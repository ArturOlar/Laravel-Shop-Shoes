<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];
    protected $primaryKey = 'id_brand';

    // связь с таблицей продуктов
    public function brand()
    {
        return $this->belongsToMany(Brand::class, 'id_brand', 'id_brand');
    }
}
