<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserBookController;
use App\Http\Controllers\Api\UserMessageController;
use App\Http\Controllers\Api\AuthController as UserAuthController;
use App\Http\Controllers\Api\CartController as UserCartController;
use App\Http\Controllers\Api\OrderController as UserOrderController;
use App\Http\Controllers\Api\WriterController as UserWriterController;
use App\Http\Controllers\Api\CategoryController as UserCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//user login
Route::post('user/login',[UserAuthController::class,'loginUser'])->name('user#login');
Route::post('user/register',[UserAuthController::class,'registerUser'])->name('user#register');
Route::post('user/info',[UserAuthController::class,'getUserInfo'])->name('user#userInfo');

//user book data
Route::get('books',[UserBookController::class,'booksData'])->name('books#data');
Route::post('bookDetail',[UserBookController::class,'bookDetail'])->name('book#detail');
Route::post('addToCart',[UserBookController::class,'addToCart'])->name('book#addToCart');
Route::post('userBook',[UserBookController::class,'userBook'])->name('bookEuserSearchBook');


//category
Route::get('getCategoryData',[UserCategoryController::class,'getCategoryData'])->name('category#data');

//author
Route::get('getAuthorData',[UserWriterController::class,'getAuthorData'])->name('author#data');
Route::post('searchAuthor',[UserWriterController::class,'searchByAuthor'])->name('author#searchByAuthor');

//user cart data
Route::post('cartData',[UserCartController::class,'getCartData'])->name('cart#getCartData');
Route::post('deleteOrderCart',[UserCartController::class,'deleteCartOrder'])->name('cart#delete');

//admin order data
Route::post('/userOrder',[UserOrderController::class,'orderToAdmin'])->name('cart#orderToAdmin');
Route::post('/getUserOrder',[UserOrderController::class,'getUserOrder'])->name('order#getOrderList');

//delivery
Route::get('delivery',[UserCartController::class,'getDelivery'])->name('cart#delivery');

//user contact to admin
Route::post('/contactToAdmin',[UserMessageController::class,'contactSend'])->name('contact#toAdmin');
