<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    protected $primaryKey = 'id_category';

    // связь с таблицей продуктов
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id_category');
    }
}
