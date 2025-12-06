<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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
Route::get('/',[LoginController::class, 'login'])->name('login')->middleware('guest');
// Route::get('/',[ShopController::class, 'beranda'])->name('beranda');

Route::post('/loginaksi',[LoginController::class, 'loginaksi']);
Route::get('/beranda',[ShopController::class, 'beranda'])->middleware('auth');
Route::get('/logout',[LoginController::class, 'logout']);
//Route::get('/logout',[LoginController::class, 'logout'])->middleware('auth');


Route::get('/masuk',[ShopController::class, 'masuk']);
Route::get('/register',[ShopController::class, 'register']);
Route::post('/register',[LoginController::class, 'register']);
Route::get('/forgot_password',[LoginController::class, 'forgot_password']);
Route::post('/aksi_forgot',[LoginController::class, 'aksi_forgot']);
Route::get('/cart',[ShopController::class, 'cart'])->middleware('auth');
Route::get('/kelas',[ShopController::class, 'kelas'])->middleware('auth');
Route::post('/add_to_cart',[ShopController::class, 'add_to_cart'])->middleware('auth');
Route::get('/clear',[ShopController::class, 'clear']);
Route::post('/invoice',[ShopController::class, 'simpaninvoice']);
Route::post('tampilinvoice',[ShopController::class, 'tampilinvoice']);
Route::get('/materi/{id}', [ShopController::class, 'materi']);
Route::get('/webinar',[ShopController::class, 'webinar'])->middleware('auth');
Route::get('/webinar_next/{id}', [ShopController::class, 'webinar_next']);
Route::get('/diskusi',[ShopController::class, 'diskusi'])->middleware('auth');
Route::get('/diskusi/ask', [ShopController::class, 'askForm'])->middleware('auth');
Route::post('/diskusi/ask', [ShopController::class, 'storeQuestion'])->middleware('auth');
//Route::post('/diskusi/like-question/{id}', [ShopController::class, 'likeQuestion']);
Route::post('/diskusi/like-answer/{id}', [ShopController::class, 'likeAnswer']);
Route::post('/checkout', [ShopController::class, 'pesan']);
Route::post('/order', [ShopController::class, 'createOrder']);
Route::get('/payment/{order}', [ShopController::class, 'paymentPage']);
Route::get('/payment-success/{order}', [ShopController::class, 'paymentSuccess']);
Route::get('/orders', [ShopController::class, 'listOrders']);









Route::delete('/product/{product}', [AdminController::class,'destroy'])->name('product.destroy');
Route::get('/edit/{product}', [AdminController::class,'product_edit'])->name('product.edit');
Route::get('/product_tambah', [AdminController::class,'product_tambah']);
Route::post('/aksi_product', [AdminController::class,'aksi_product']);
Route::patch('/action_product/{product}', [AdminController::class,'action_product'])->name('product.action');


Route::delete('/question/{question}', [AdminController::class,'destroy_question'])->name('question.destroy');
Route::get('/edit_question/{question}', [AdminController::class,'question_edit'])->name('question.edit');
Route::get('/question_tambah', [AdminController::class,'question_tambah']);
Route::post('/aksi_question', [AdminController::class,'aksi_question']);
Route::patch('/action_question/{question}', [AdminController::class,'question_action'])->name('question.action');


Route::delete('/user/{user}', [AdminController::class,'destroy_user'])->name('user.destroy');
Route::get('/edit/{user}', [AdminController::class,'destroy'])->name('user.edit');
Route::get('/user_tambah', [AdminController::class,'user_tambah']);
Route::post('/aksi_user', [AdminController::class,'aksi_user']);

Route::delete('/order/{order}', [AdminController::class,'destroy_order'])->name('order.destroy');
Route::get('/edit/{order}', [AdminController::class,'destroy'])->name('order.edit');
Route::get('/order_tambah', [AdminController::class,'order_tambah']);
Route::post('/aksi_order', [AdminController::class,'aksi_order']);

Route::get('/product',[AdminController::class, 'product']);
Route::get('/question',[AdminController::class, 'question']);
Route::get('/order',[AdminController::class, 'order']);
Route::get('/user',[AdminController::class, 'user']);
// Route::delete('/order/{id}', [AdminController::class,'destroy'])->name('order.destroy');
// Route::get('/order/{id}', [AdminController::class,'destroy'])->name('order.edit');
// Route::delete('/question/{id}', [AdminController::class,'destroy'])->name('question.destroy');
// Route::get('/question/{id}', [AdminController::class,'destroy'])->name('question.edit');