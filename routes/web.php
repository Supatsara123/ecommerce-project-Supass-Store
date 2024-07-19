<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Customer\PromotionDetailController;
use App\Http\Controllers\Customer\CheckoutController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\CartController;

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PromotionController;

use App\Http\Controllers\SuperAdmin\PermissionController;
use App\Http\Controllers\SuperAdmin\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('customer')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('customer.index');

    Route::get('/category', [CustomerController::class, 'category'])->name('category');
    Route::get('/category/{slug}', [CustomerController::class, 'viewcategory'])->name('viewcategory');
    Route::get('/category/{cate_slug}/{prod_slug}', [CustomerController::class, 'productview'])->name('productview');

    Route::get('/info-for-sell', [ProductController::class, 'infoSell'])->name('infoSell');

    Route::post('/personal/add-to-cart', [CartController::class, 'addProduct']);
    Route::post('/personal/delete-cart-item', [CartController::class, 'deleteProduct']);
    Route::post('/personal/update-cart', [CartController::class, 'updateCart']);

    // howtoshopping วิธีการสั่งซื้อ
    // howtopayment วิธีการชำระเงิน
    // howtoshippingterms วิธีการจัดส่ง

    Route::middleware(['auth'])->group(function () {
        Route::get('/personal/cart', [CartController::class, 'cart'])->name('cart');
        Route::get('/personal/payment', [CheckoutController::class, 'index'])->name('payment.index');
        Route::post('/personal/place-order', [CheckoutController::class, 'placeorder'])->name('placeorder');

        // Route::get('/place-order', [OrderController::class, 'placeorder'])->name('order.index');

        Route::get('/personal', [CustomerController::class, 'profile'])->name('profile');
        Route::get('/personal/insert', [CustomerController::class, 'insert'])->name('addresses');

        Route::get('/personal/edit-profile', [CustomerController::class, 'edit'])->name('profile.edit');
        Route::put('/personal/update-profile', [CustomerController::class, 'update'])->name('profile.update');
        Route::put('/personal/update-img', [CustomerController::class, 'editImg'])->name('profile.editImg');

        Route::put('/personal/update-address/{id}', [CustomerController::class, 'editAddress'])->name('profile.editAddress');
        Route::put('/personal/update-profile-basic-info/{id}', [CustomerController::class, 'editBasicInfo'])->name('profile.editBasicInfo');
    });

    Route::get('/promotion', [PromotionDetailController::class, 'index'])->name('promotion.index');
    Route::get('/promotion/{slug}', [PromotionDetailController::class, 'viewpromotion'])->name('viewpromotion');
});

Route::prefix('admin')->group(function () {
    Route::get('/product-list', [ProductController::class, 'list'])->name('product.list');
    Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
    Route::post('/insert-product', [ProductController::class, 'insert'])->name('product.insert');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/update-product/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/category-list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/insert-category', [CategoryController::class, 'insert'])->name('category.insert');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    Route::get('/promotion-list', [PromotionController::class, 'index'])->name('index');
    Route::get('/create-promotion', [PromotionController::class, 'create'])->name('promotion.create');
    Route::post('/insert-promotion', [PromotionController::class, 'insert'])->name('promotion.insert');
    Route::get('/edit-promotion/{id}', [PromotionController::class, 'edit'])->name('promotion.edit');
    Route::put('/update-promotion/{id}', [PromotionController::class, 'update'])->name('promotion.update');
    Route::delete('/delete-promotion/{id}', [PromotionController::class, 'delete'])->name('promotion.delete');
});

// Route::group(['middleware' => ['role:super-admin|admin']], function() {
Route::prefix('super-admin')->middleware('auth')->group(function () {
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{id}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{id}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{id}/give-permission', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{id}/give-permission', [RoleController::class, 'givePermissionToRole']);

    Route::resource('users', UserController::class);
    Route::get('users/{id}/delete', [UserController::class, 'destroy']);
});
