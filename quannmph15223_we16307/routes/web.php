<?php

use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\AttributeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\client\OrderController;
use App\Http\Controllers\client\OrderDetailController;
use App\Http\Controllers\Client\ProductClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

use App\Models\OrderDetail;
use Illuminate\Support\Facades\Cookie;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('/')->name('client.')->group(function(){
    // Route::prefix('/admin')->name('admin.')->group(function(){

    // });
    Route::get('/', function () {
        return view('client.page');
    })->name('home');
    Route::get('/shop', [ProductClientController::class, 'index'])->name('shop');
    Route::get('/product', [ProductClientController::class, 'search_product'])->name('find-product');
    Route::get('/sing-product/{product}', [ProductClientController::class, 'sing_product'])->name('single-product');
    // Route::get('/cart', function () {
    //     return view('client.cart.cart');
    // })->name('cart');
    Route::get('/account', function () {
        return view('account.my-account');
    })->middleware('auth')->name('account');

    Route::prefix('/cart')->name('cart.')->group(function(){
        Route::get('/', [CartController::class, 'show_cart'])->middleware('auth')->name('show-cart');
        Route::post('/addcart/{product}', [CartController::class, 'save_cart'])->name('save-cart');
        Route::get('/all-cart', [CartController::class, 'all_cart'])->middleware('auth')->name('all-cart');
        Route::delete('/delete/{pro_id}', [CartController::class, 'delete'])->middleware('auth')->name('delete-cart');
        Route::post('order',[OrderController::class, 'payment_order'])->middleware('auth')->name('order');
        Route::post('add-quantity/{product}',[CartController::class, 'cart_quantity'])->middleware('auth')->name('add-quantity');
        // Route::get('remove-cart',function(){
        //     Cookie::queue(Cookie::forget('shopping_carts'));
        // return response()->json(['status'=>'Your Cart is Cleared']);
        // })->middleware('auth')->name('add-quantity');
    });

    Route::post('/addcart/{product}', [OrderDetailController::class, 'add_cart'])->middleware('auth')->name('addcart');
    Route::get('/cart', [OrderDetailController::class, 'show_cart'])->middleware('auth')->name('show-cart');
    Route::delete('/delete-cart/{cart}',[OrderDetailController::class, 'delete_cart'])->middleware('auth')->name('delete-cart');

    Route::post('order',[OrderController::class, 'buy_order'])->middleware('auth')->name('order');

    
});
Route::middleware('guest')->prefix('/login')->name('login.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/postlogin', [UserController::class, 'saveLogin'])->name('save_login');
    Route::post('/signup', [UserController::class, 'saveSignup'])->name('save_signup');
});
    

Route::get('/logout', [UserController::class, 'logout'])->name('logout');


Route::prefix('/admin')->name('admin.')->group(function(){
    Route::get('/', function () {
        return view('main');
    })->name('main');
    Route::get('/category', [CategoryController::class, 'index'])->name('list-category');
    Route::get('/add-category', [CategoryController::class, 'add_category'])->name('add-category');
    Route::post('/add-category', [CategoryController::class, 'save_category'])->name('save-category');
    Route::get('/edit-category/{category}', [CategoryController::class, 'edit_category'])->name('edit-category');
    Route::put('/save-edit/{category}', [CategoryController::class, 'save_edit'])->name('save-edit');
    Route::delete('/delete/{category}', [CategoryController::class, 'delete'])->name('delete-category');

    // Attributes
    Route::prefix('/attribute')->name('attribute.')->group(function(){
        Route::get('/', [AttributeController::class, 'index'])->name('list-attribute');
        Route::get('/add', [AttributeController::class, 'add_attribute'])->name('add-attribute');
        Route::post('/save-add', [AttributeController::class, 'save_add'])->name('save-add');
        Route::get('/edit-attribute/{attribute}', [AttributeController::class, 'edit_attribute'])->name('edit-attribute');
        Route::put('/save-edit/{attribute}', [AttributeController::class, 'save_edit'])->name('save-edit');
        Route::delete('/delete/{attribute}', [AttributeController::class, 'delete'])->name('delete-attribute');

        Route::get('/attr-element/{id}', [AttributeController::class, 'list_element'])->name('list-element');
        Route::get('/add-element/{id}', [AttributeController::class, 'add_attr_element'])->name('add-attr-element');
        Route::post('/add-element/{id}', [AttributeController::class, 'save_attr_element'])->name('save-add-element');
        Route::put('/save-edit-element/{id}', [AttributeController::class, 'save_edit_element'])->name('save-edit-element');
        Route::delete('/delete-element/{id}', [AttributeController::class, 'delete_element'])->name('delete-element');
    });

    //product
    Route::prefix('/product')->name('product.')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('list-product');
        Route::get('/add', [ProductController::class, 'add_product'])->name('add-product');
        Route::post('/add', [ProductController::class, 'save_product'])->name('save-add');
        Route::get('/search', [ProductController::class, 'search'])->name('search-product');
        Route::get('/edit/{product}', [ProductController::class, 'edit_product'])->name('edit-product');
        Route::put('/edit/{product}', [ProductController::class, 'save_edit'])->name('save-edit');
        Route::delete('/delete/{product}', [CategoryController::class, 'delete'])->name('delete-product');

    });

    Route::prefix('/order')->name('order.')->group(function(){
        Route::get('/', [OrderAdminController::class, 'index'])->name('list-order');
        Route::get('/order-detail/{order}', [OrderAdminController::class, 'order_detail'])->name('order-detail');
        Route::delete('/delete/{order}', [OrderAdminController::class, 'delete_order'])->name('delete_order');
        
    });
    

});

Route::get('test-api', function(){
        return response()->json([
            'status' => 200,
            'data' => [
                'username' => 'quancay',
                'password' => '12345678'
            ]
        ]);
    });