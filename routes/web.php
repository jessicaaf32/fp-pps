<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController; 
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QuizController;


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

// LOGIN
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/loginaksi', [LoginController::class, 'loginaksi'])->name('login.action');

// REGISTER
Route::get('/register', [LoginController::class, 'daftar'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('register.post');

// FORGOT PASSWORD
Route::get('/forgot_password', [LoginController::class, 'forgot_password'])->name('forgot');
Route::post('/forgot_password', [LoginController::class, 'aksi_forgot'])->name('forgot.action');

// LOGOUT
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//BERANDA ROLE USER
Route::get('/quiz', [QuizController::class, 'index'])->middleware('auth')->name('quiz');
Route::get('/quiz/{slug}/question/{index}', [QuizController::class, 'question'])->middleware('auth')->name('questions');
Route::post('/quiz/{slug}/question/{index}', [QuizController::class, 'answer'])->middleware('auth')->name('answers');
Route::get('/quiz/{slug}/score', [QuizController::class, 'score'])->middleware('auth')->name('quiz_score');
Route::get('/quiz/highscores/{slug}', [QuizController::class, 'highscores'])->middleware('auth')->name('quiz_highscores');

Route::get('/beranda',[ShopController::class, 'beranda'])->middleware('auth');
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
Route::post('/diskusi/jawab/{id}', [ShopController::class, 'jawab'])
    ->middleware('auth');
Route::post('/diskusi/like-answer/{id}', [ShopController::class, 'likeAnswer']);
Route::post('/checkout', [ShopController::class, 'pesan']);
Route::post('/order', [ShopController::class, 'createOrder']);
Route::get('/payment/{order}', [ShopController::class, 'paymentPage']);
Route::get('/payment-success/{order}', [ShopController::class, 'paymentSuccess']);
Route::get('/orders', [ShopController::class, 'listOrders']);
Route::get('/account', [ShopController::class, 'account'])->middleware('auth');
Route::get('/account/edit', [ShopController::class, 'edit'])->middleware('auth');
Route::post('/account/update', [ShopController::class, 'update'])->middleware('auth');
Route::get('/account/address', [ShopController::class, 'address'])->middleware('auth');
Route::post('/account/address', [ShopController::class, 'saveAddress'])->middleware('auth');
Route::get('/account/security', function () {
    return view('security');
})->middleware('auth');

//ROLE ADMIN
Route::get('/dashboard_admin', [AdminController::class, 'dashboard']);
Route::get('/users_admin', [AdminController::class, 'user']);
Route::delete('/user/{id}', [AdminController::class,'destroy_user'])->name('user.destroy');
Route::post('/add_users', [AdminController::class, 'store'])->name('user.store');
Route::put('/update_user/{id}', [AdminController::class, 'update'])->name('user.update');

//KELAS
Route::get('/kelas_admin', [AdminController::class, 'kelas']);
Route::post('/add_kelas', [AdminController::class, 'store_class'])->name('class.store');
Route::delete('/kelas/{id}', [AdminController::class,'destroy_class'])->name('kelas.destroy');
Route::put('/update_kelas/{id}', [AdminController::class, 'update_class'])->name('kelas.update');

Route::get('/materi_admin/{id}', [AdminController::class, 'materi'])->name('materi.view');
Route::post('/add_materi', [AdminController::class, 'store_materi'])->name('materi.store');
Route::delete('/materi/{id}', [AdminController::class,'destroy_materi'])->name('materi.destroy');
Route::put('/update_materi/{id}', [AdminController::class, 'update_materi'])->name('materi.update');

//KUIS
Route::get('/kuis_admin', [AdminController::class, 'kuis']);
Route::delete('/kuis/{id}', [AdminController::class,'destroy_kuis'])->name('kuis.destroy');

//WEBINAR
Route::get('/webinar_admin', [AdminController::class, 'webinar']);
Route::post('/add_webinar', [AdminController::class, 'store_webinar'])->name('webinar.store');
Route::delete('/webinar/{id}', [AdminController::class,'destroy_webinar'])->name('webinar.destroy');
Route::put('/update_webinar/{id}', [AdminController::class, 'update_webinar'])->name('webinar.update');

//DISKUSI
Route::get('/diskusi_admin', [AdminController::class, 'diskusi']);
Route::delete('/diskusi/{id}', [AdminController::class,'destroy_diskusi'])->name('diskusi.destroy');

Route::get('/answer_admin/{id}', [AdminController::class, 'answer'])->name('answer.view');
Route::delete('/answer/{id}', [AdminController::class,'destroy_answer'])->name('answer.destroy');

//MARKETPLACE
Route::get('/marketplace_admin', [AdminController::class, 'marketplace']);
Route::post('/add_product', [AdminController::class, 'store_product'])->name('product.store');
Route::delete('/product/{id}', [AdminController::class,'destroy_product'])->name('product.destroy');
Route::put('/update_product/{id}', [AdminController::class, 'update_product'])->name('product.update');

Route::get('/order_admin', [AdminController::class, 'order']);
Route::delete('/order/{id}', [AdminController::class,'destroy_order'])->name('order.destroy');
Route::put('/update_order/{id}', [AdminController::class, 'update_order'])->name('order.update');
Route::get('/order_item/{id}', [AdminController::class, 'order_item'])->name('order.view');
Route::delete('/order_item/{id}', [AdminController::class,'destroy_order_item'])->name('order_item.destroy');
