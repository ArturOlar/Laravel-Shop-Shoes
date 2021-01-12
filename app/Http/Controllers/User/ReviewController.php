<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Model\Review;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewStoreRequest;

class ReviewController extends Controller
{
    // добавить отзыв
    public function addReview(ReviewStoreRequest $request)
    {
        Review::create($request->all());
        session()->flash('success', 'Спасибо за отзыв! Отзыв будет опубликован после одобрения администратором');
        return redirect()->back();
    }
}
