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

//admin
Route::group([
    'middleware'=>'auth',
    'prefix'=>'admin',
], function(){
    Route::get('/home', [App\Http\Controllers\Admin\AdminController::class, 'adminHome'])->name('adminHome');
    Route::get('/orders', [App\Http\Controllers\Admin\OrdersController::class, 'index'])->name('adminOrders');
    Route::get('/orders/completed', [App\Http\Controllers\Admin\OrdersController::class, 'completedOrders'])->name('completedOrders');
    Route::get('/orders/show/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'showOrder'])->name('adminShowOrder');
    Route::post('/orders/delete/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'deleteOrder'])->name('adminDeleteOrder');
    Route::get('/orders/complete/{id}', [App\Http\Controllers\Admin\OrdersController::class, 'completeOrder'])->name('adminCompleteOrder');

    Route::resource('categories',App\Http\Controllers\Admin\CategoriesController::class);
    Route::resource('products',App\Http\Controllers\Admin\ProductsController::class);
    Route::resource('manufacturers',App\Http\Controllers\Admin\ManufacturerController::class);
});

//localization
Route::get('/locale/{locale}', [App\Http\Controllers\MainController::class, 'changeLocale'])->name('locale');
Route::middleware(['set_locale'])->group(function (){

//search
    Route::get('/search', [App\Http\Controllers\MainController::class, 'search'])->name('search');

//auth
    Route::get('/register', [App\Http\Controllers\AuthController::class, 'getRegister'])->middleware('guest')->name('register');
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'postRegister'])->middleware('guest');
    Route::get('/login', [App\Http\Controllers\AuthController::class, 'getLogin'])->middleware('guest')->name('login');
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'postLogin'])->middleware('guest');
    Route::get('/logout', [App\Http\Controllers\AuthController::class, 'getLogout'])->name('logout');

//basket
    Route::get('/basket', [App\Http\Controllers\BasketController::class, 'basket'])->name('basket');
    Route::get('/basket/place', [App\Http\Controllers\BasketController::class, 'basketPlace'])->name('basketPlace');
    Route::post('/basket/confirm', [App\Http\Controllers\BasketController::class, 'basketConfirm'])->name('basketConfirm');
    Route::post('/basket/add/{id}', [App\Http\Controllers\BasketController::class, 'basketAdd'])->name('basketAdd');
    Route::post('/basket/remove/{id}', [App\Http\Controllers\BasketController::class, 'basketRemove'])->name('basketRemove');

//categories
    Route::get('/categories', [App\Http\Controllers\MainController::class, 'categories'])->name('categories');
    Route::get('/{category}', [App\Http\Controllers\MainController::class, 'category'])->name('category');
    Route::get('/{category}/{name?}', [App\Http\Controllers\MainController::class, 'product'])->name('product');
    Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('home');
});



