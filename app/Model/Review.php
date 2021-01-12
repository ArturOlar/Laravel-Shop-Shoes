<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $primaryKey = 'id_review';
    protected $fillable = ['id_product', 'name', 'user_email', 'review', 'id_status'];

    // связь с таблицей продуктов
    public function product()
    {
        return $this->hasOne(Product::class, 'id_product', 'id_product');
    }

    // связь с таблицей статусов к отзывам
    public function status()
    {
        return $this->hasOne(ReviewStatus::class, 'id_status', 'id_status');
    }
}
