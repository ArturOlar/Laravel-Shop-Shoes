<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GenderCategory extends Model
{
    protected $table = "gender_categories";
    protected $primaryKey = 'id_gender';
    protected $fillable = ['name'];

    // связь с таблицей продуктов
    public function products()
    {
        return $this->belongsTo(Product::class, 'id_gender', 'id_gender');
    }
}
