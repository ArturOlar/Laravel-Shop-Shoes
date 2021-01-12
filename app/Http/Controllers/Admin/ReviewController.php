<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // все отзывы
    public function allReviews()
    {
        return view('admin.review.review', [
            'title' => 'Все отзывы',
            'reviews' => Review::paginate(20),
        ]);
    }

    // новые отзывы
    public function newReviews()
    {
        return view('admin.review.review', [
            'title' => 'Новые отзывы',
            'reviews' => Review::where('id_status', 1)->paginate(20),
        ]);
    }

    // отмененные отзывы
    public function canceledReviews()
    {
        return view('admin.review.review', [
            'title' => 'Отмененные отзывы',
            'reviews' => Review::where('id_status', 3)->paginate(20),
        ]);
    }

    // опубликованные отзывы
    public function publishReviews()
    {
        return view('admin.review.review', [
            'title' => 'Опубликованные отзывы',
            'reviews' => Review::where('id_status', 2)->paginate(20),
        ]);
    }

    // перенсти отзыв в статус "отменен"
    public function transferReviewCanceled($id)
    {
        $review = Review::find($id);
        $review->id_status = 3;
        $review->save();

        session()->flash('success', 'Отзыв перенесен в статус "отменен"');
        return redirect()->back();
    }

    // перенсти отзыв в статус "отменен"
    public function transferReviewPublish($id)
    {
        $review = Review::find($id);
        $review->id_status = 2;
        $review->save();

        session()->flash('success', 'Отзыв опубликован');
        return redirect()->back();
    }
}
