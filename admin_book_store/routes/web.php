<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
// use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BookWriterController;
use App\Http\Controllers\AuthController as WebAuthController;


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

Route::middleware('admin_auth')->group(function () {
    // login - register
   // Route::redirect('/', 'loginPage' );
   Route::get('',[WebAuthController::class,'loginPage'])->name('auth#loginPage');
    Route::get('loginPage',[WebAuthController::class,'loginPage'])->name('auth#loginPage');
    Route::get('registerPage',[WebAuthController::class,'registerPage'])->name('auth#registerPage');
});



//admin
Route::middleware(['admin_auth'])->group(function () {

    Route::prefix('admin')->group(function(){
        //information
        Route::get('/infoPage',[AdminController::class,'adminInfo'])->name('admin#info');
        Route::post('/info/update',[AdminController::class,'adminInfoUpdate'])->name('admin#updateInfo');
        //password
        Route::get('/passswordChangePage',[AdminController::class,'passwordChangePage'])->name('admin#changePWpage');
        Route::post('/passwordChange',[AdminController::class,'changePassword'])->name('admin#changePassword');
        //admin all list page
        Route::get('/list',[AdminController::class,'adminList'])->name('admin#listPage');
        //admin list delete
        Route::get('/delete/{id}',[AdminController::class,'adminDelete'])->name('admin#delete');
        //admin list detail
        Route::get('/detail/{id}',[AdminController::class,'adminDetail'])->name('admin#detail');
        //admin role chage
        Route::get('/changeRole/{id}',[AdminController::class,'adminChangeRole'])->name('admin#changeRole');
        //admin search
        Route::post('/adminSearchName',[AdminController::class,'adminSearchName'])->name('admin#searchName');

    });

    //category
    Route::prefix('category')->group(function(){
        //direct category page
        Route::get('/listPage',[CategoryController::class,'categoryListPage'])->name('category#list');
        Route::post('/create',[CategoryController::class,'createCategory'])->name('category#create');
        Route::get('/delete/category/{id}',[CategoryController::class,'deleteCategory'])->name('category#delete');
        Route::get('/editPage/{id}',[CategoryController::class,'editPage'])->name('category#editPage');
        Route::post('/update',[CategoryController::class,'updateCategory'])->name('category#update');
        Route::post('/search',[CategoryController::class,'searchCategory'])->name('category#search');
    });

    //wirter
    Route::prefix('writer')->group(function(){
        //direct wirter page
        Route::get('/listPage',[BookWriterController::class,'WriterListPage'])->name('writer#list');
        Route::post('/create',[BookWriterController::class,'createWriter'])->name('writer#create');
        Route::get('/delete/wirter/{id}',[BookWriterController::class,'deleteWriter'])->name('writer#delete');
        Route::get('/editPage/{id}',[BookWriterController::class,'editPage'])->name('writer#editPage');
        Route::post('/update',[BookWriterController::class,'updateWriter'])->name('writer#update');
        Route::post('/search',[BookWriterController::class,'searchWriter'])->name('writer#search');
    });

    //delivery
    Route::prefix('delivery')->group(function(){
        //direct delivery page
        Route::get('/listPage',[DeliveryController::class,'deliveryPage'])->name('delivery#list');
        Route::post('/create',[DeliveryController::class,'createDelivery'])->name('delivery#create');
        Route::get('/delete/delivery/{id}',[DeliveryController::class,'deleteDelivery'])->name('delivery#delete');
        Route::get('/editPage/{id}',[DeliveryController::class,'editPage'])->name('delivery#editPage');
        Route::post('/update',[DeliveryController::class,'updateDelivery'])->name('delivery#update');
        Route::post('/search',[DeliveryController::class,'searchDelivery'])->name('delivery#search');
    });

    //book
    Route::prefix('book')->group(function(){
        //direct book list page
        Route::get('/listPage',[BookController::class,'bookPage'])->name('book#list');
        Route::get('/createBookPage',[BookController::class,'createBookPage'])->name('book#createPage');
        Route::post('/create',[BookController::class,'bookCreate'])->name('book#createData');
        Route::get('/delete/{id}',[BookController::class,'bookDelete'])->name('book#delete');
        Route::get('/editPage/{id}',[BookController::class,'editPage'])->name('book#editPage');
        Route::post('/updatePage',[BookController::class,'update'])->name('book#update');
        Route::post('/search',[BookController::class,'searchAdminBook'])->name('book#search');
    });

    //User
    Route::prefix('user')->group(function(){
        //direct user list page
        Route::get('/listPage',[UserController::class,'listPage'])->name('user#list');
        //user list delete
        Route::get('/delete/{id}',[UserController::class,'userDelete'])->name('user#delete');
        //user list detail
        Route::get('/detail/{id}',[UserController::class,'userDetail'])->name('user#detail');
        //user role chage
        Route::get('/changeRole/{id}',[UserController::class,'userChangeRole'])->name('user#changeRole');
         //user search
         Route::post('/userSearch',[UserController::class,'userNameSearch'])->name('user#searchName');

    });

    //user order
    Route::prefix('userOrder')->group(function(){
        //order list page
        Route::get('/listPage',[AdminOrderController::class,'userOrderList'])->name('userOrder#list');
        //order detail page
        Route::get('/detailPage/{code}',[AdminOrderController::class,'orderDetailPage'])->name('userOrder#details');
         //order delete page
         Route::get('/delete/{code}',[AdminOrderController::class,'orderDelete'])->name('userOrder#delete');
    });

    //user message
    Route::prefix('contact')->group(function(){
        //user message list
        Route::get('/listPage',[ContactController::class,'contactListPage'])->name('contact#list');
        //user message delete by admin
        Route::get('/deleteMessage/{id}',[ContactController::class,'deleteMessage'])->name('contact#deleteMessage');
    });

});



// Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('admin.admin_info.profile');
//     })->name('dashboard');
// });
