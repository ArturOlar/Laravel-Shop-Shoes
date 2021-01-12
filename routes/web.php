<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'User\MainController@home')->name('main');

Route::get('/products', 'User\ProductController@getAllProducts')->name('products');
Route::get('/product/{id}', 'User\ProductController@getOneProduct')->name('one-product');

Route::get('/basket', 'User\BasketController@showBasket')->name('show-basket');
Route::post('/add-to-basket', 'User\BasketController@addToBasket')->name('add-to-basket');
Route::get('/plus-product-by-basket/{id}/{size}', 'User\BasketController@plusProductInBasket')->name('plus-product-by-basket');
Route::get('/minus-product-by-basket/{id}/{size}', 'User\BasketController@minusProductInBasket')->name('minus-product-by-basket');
Route::get('/delete-product-by-basket/{id}/{size}', 'User\BasketController@deleteProductInBasket')->name('delete-product-by-basket');

Route::post('/add-review', 'User\ReviewController@addReview')->name('add-review');

Route::post('/send-order', 'User\OrderController@addOrder')->name('add-order');

Route::get('/about', function () {
    return view('user.about');
})->name('about');

Route::get('/return-product', function () {
    return view('user.return-product-info');
})->name('return-product');

Route::get('/search', 'User\MainController@searchProduct')->name('search-product');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/update-info-user', 'User\UserController@updateInfoUser')->name('update-info-user');



Route::prefix('/admin')->namespace('Admin')->middleware(['auth', 'admin'])->group(function () {

    // управление заказами
    Route::get('/', 'OrderController@allOrders')->name('admin-all-orders');
    Route::get('/new-orders', 'OrderController@newOrders')->name('admin-new-orders');
    Route::get('/in-work-orders', 'OrderController@inWorkOrders')->name('admin-in-work-orders');
    Route::get('/canceled-orders', 'OrderController@canceledOrders')->name('admin-canceled-orders');
    Route::get('/completed-orders', 'OrderController@completedOrders')->name('admin-completed-orders');
    Route::get('/show-order/{id}', 'OrderController@oneOrder')->name('one-order');

    Route::get('/transfer-order-in-work/{id}', 'OrderController@transferOrderInWork')->name('transfer-order-in-work');
    Route::get('/transfer-order-canceled/{id}', 'OrderController@transferOrderCanceled')->name('transfer-order-canceled');
    Route::get('/transfer-order-completed/{id}', 'OrderController@transferOrderСompleted')->name('transfer-order-completed');

    // управление отзывами
    Route::get('/all-reviews', 'ReviewController@allReviews')->name('all-review');
    Route::get('/new-reviews', 'ReviewController@newReviews')->name('new-review');
    Route::get('/canceled-reviews', 'ReviewController@canceledReviews')->name('canceled-review');
    Route::get('/publish-reviews', 'ReviewController@publishReviews')->name('publish-review');

    Route::get('/transfer-review-canceled/{id}', 'ReviewController@transferReviewCanceled')->name('transfer-review-canceled');
    Route::get('/transfer-review-publish/{id}', 'ReviewController@transferReviewPublish')->name('transfer-review-publish');

    // управление товарами
    Route::resource('/product', 'ProductController');
    Route::post('delete-image', 'ProductController@deleteImage')->name('delete-image');

    // управление гендерами (для кого)
    Route::resource('/gender', 'GenderController');

    // управление категориями
    Route::resource('/category', 'CategoryController');

    // управление брендами
    Route::resource('/brand', 'BrandController');

    // управление пользователяи
    Route::prefix('/user')->group(function () {
        Route::get('/all', 'UserController@allUsers')->name('all-users');
        Route::post('/changeStatus/{id}', 'UserController@changeStatus')->name('change-status');
    });

    // баланс (наличие) товара
    Route::post('/change-balance-product', 'ProductSizeController@changeBalanceProduct')->name('change-balance-product');
    Route::get('product-balance/{id}', 'ProductSizeController@showBalanceProduct')->name('show-balance-product');
});
