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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'frontend_home']);

// Course Menu bars all route of frontend starts
Route::get('/program/one-on-one', [App\Http\Controllers\FrontendController::class, 'one_on_one'])->name('program.one-on-one');
Route::get('/program/online-fitness-coaching-for-general', [App\Http\Controllers\FrontendController::class, 'online_fitness_coaching_for_general'])->name('program.online-fitness-coaching-for-general');
Route::get('/program/PCOS', [App\Http\Controllers\FrontendController::class, 'PCOS'])->name('program.PCOS');
Route::get('/program/HDDA', [App\Http\Controllers\FrontendController::class, 'HDDA'])->name('program.HDDA');
Route::get('/program/Exersise-and-diet', [App\Http\Controllers\FrontendController::class, 'Exersise_and_diet'])->name('program.Exersise-and-diet');
Route::get('/program/customize-diet-plan', [App\Http\Controllers\FrontendController::class, 'customize_diet_plan'])->name('program.customize-diet-plan');
Route::get('/program/customize-workout-diet', [App\Http\Controllers\FrontendController::class, 'customize_workout_diet'])->name('program.customize-workout-diet');
Route::get('/program/three_days_in_a_week', [App\Http\Controllers\FrontendController::class, 'three_days_in_a_week'])->name('program.three_days_in_a_week');
Route::put('/course/buy', [App\Http\Controllers\FrontendController::class, 'courseBuy'])->name('course.buy');
// Course Menu bars all route of frontend starts

// Shop Menu bars all route of frontend starts
Route::get('/shop/shop-all', [App\Http\Controllers\FrontendController::class, 'shop_all'])->name('shop.shop_all');
Route::get('/shop/apparel', [App\Http\Controllers\FrontendController::class, 'apparel'])->name('shop.apparel');
Route::get('/shop/accessories', [App\Http\Controllers\FrontendController::class, 'accessories'])->name('shop.accessories');
Route::put('/product/buy', [App\Http\Controllers\FrontendController::class, 'productBuy'])->name('product.buy');
// Shop Menu bars all route of frontend End


// Other Menu bars all route of frontend starts
Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');
Route::post('/contact/post', [App\Http\Controllers\FrontendController::class, 'contactPost'])->name('contact.post');
Route::get('/review', function () {
    return view('frontend.review');
})->name('review');
Route::post('/review/post', [App\Http\Controllers\FrontendController::class, 'reviewPost'])->name('review.post');
Route::get('/blog', [App\Http\Controllers\FrontendController::class, 'showBlogs'])->name('blog');
// Other Menu bars all route of frontend End


// Backend Route started
Auth::routes();
Route::group(['middleware' => ['auth']], function() {

    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
    Route::get('/admin/about', [App\Http\Controllers\HomeController::class, 'about'])->name('admin.about');
    // Route::get('/admin/address', [App\Http\Controllers\HomeController::class, 'address'])->name('admin.address');
    Route::get('/admin/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('admin.menu');
    // Route::get('/admin/post', [App\Http\Controllers\HomeController::class, 'post'])->name('admin.post');
    Route::post('/admin/about/update', [App\Http\Controllers\AboutController::class, 'update'])->name('admin.about.update');

    Route::get('/admin/banner', [App\Http\Controllers\BannerController::class, 'index'])->name('banner.index');
    Route::get('/admin/banner/create', [App\Http\Controllers\BannerController::class, 'create'])->name('banner.create');
    Route::post('/admin/banner/store', [App\Http\Controllers\BannerController::class, 'store'])->name('banner.store');
    Route::get('/admin/banner/show/{id}', [App\Http\Controllers\BannerController::class, 'show'])->name('banner.show');
    Route::get('/admin/banner/edit/{id}', [App\Http\Controllers\BannerController::class, 'edit'])->name('banner.edit');
    Route::post('/admin/banner/update/{id}', [App\Http\Controllers\BannerController::class, 'update'])->name('banner.update');
    Route::delete('/admin/banner/destroy/{id}', [App\Http\Controllers\BannerController::class, 'destroy'])->name('banner.destroy');

    Route::resource('/admin/post', App\Http\Controllers\PostController::class);
    Route::resource('/admin/blog', App\Http\Controllers\BlogController::class);
    Route::get('/admin/review/list', [App\Http\Controllers\ReviewController::class, 'list'])->name('review.list');
    Route::delete('/admin/review/destroy/{id}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('review.destroy');
    Route::get('/admin/contact/list', [App\Http\Controllers\ContactController::class, 'list'])->name('contact.list');
    Route::delete('/admin/contact/destroy/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.destroy');
    Route::resource('/admin/product', App\Http\Controllers\ProductController::class);
    Route::resource('/admin/course', App\Http\Controllers\CourseController::class);


    Route::get('/admin/product/order/list', [App\Http\Controllers\ProductOrderController::class, 'index'])->name('product.order.list');
    Route::post('/product/order', [App\Http\Controllers\ProductOrderController::class, 'store'])->name('product.order');
    Route::get('/product/order/show/{id}', [App\Http\Controllers\ProductOrderController::class, 'show'])->name('product.order.show');
    Route::delete('/admin/product/order/destroy/{id}', [App\Http\Controllers\ProductOrderController::class, 'destroy'])->name('product.order.destroy');

    Route::get('/admin/course/request/list', [App\Http\Controllers\CourseRequestController::class, 'index'])->name('course.request.list');
    Route::post('/course/request', [App\Http\Controllers\CourseRequestController::class, 'store'])->name('course.request');
    Route::delete('/admin/course/request/destroy/{id}', [App\Http\Controllers\CourseRequestController::class, 'destroy'])->name('course.request.destroy');
    Route::get('/course/request/show/{id}', [App\Http\Controllers\CourseRequestController::class, 'show'])->name('course.request.show');

});
// Backend Route Ends
