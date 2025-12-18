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
// Route::get('/',[LoginController::class, 'login'])->name('login')->middleware('guest');
// Route::get('/',[LoginController::class, 'login']);
// // Route::get('/',[ShopController::class, 'beranda'])->name('beranda');

// Route::post('/loginaksi',[LoginController::class, 'loginaksi']);




// Route::get('/masuk',[ShopController::class, 'masuk']);
// Route::get('/daftar',[LoginController::class, 'daftar']);
// Route::post('/register',[LoginController::class, 'register']);
// Route::get('/forgot_password',[LoginController::class, 'forgot_password']);
// Route::post('/aksi_forgot',[LoginController::class, 'aksi_forgot']);

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


//ADMIN
Route::get('/dashboard_admin', [AdminController::class, 'dashboard']);
Route::get('/users_admin', [AdminController::class, 'user']);
Route::delete('/user/{id}', [AdminController::class,'destroy_user'])->name('user.destroy');
Route::post('/add_users', [AdminController::class, 'store'])->name('user.store');
Route::put('/update_user/{id}', [AdminController::class, 'update'])->name('user.update');

//KELAS
Route::get('/kelas_admin', [AdminController::class, 'kelas']);
Route::get('/materi_admin', [AdminController::class, 'materi'])->name('materi.view');

//WEBINAR
Route::get('/webinar_admin', [AdminController::class, 'webinar']);

//DISKUSI
Route::get('/diskusi_admin', [AdminController::class, 'diskusi']);

//MARKETPLACE
Route::get('/marketplace_admin', [AdminController::class, 'marketplace']);
// Route::prefix('admin')->middleware('auth')->group(function () {

//     Route::get('/admin', function () {
//         return 'ADMIN DASHBOARD OK';
//     })->name('admin.dashboard');

//     // USERS
//     Route::get('/users', [AdminController::class,'user'])->name('admin.users');
//     Route::post('/users', [AdminController::class,'aksi_user']);
//     Route::delete('/users/{id}', [AdminController::class,'destroy_user']);

//     // PRODUCTS
//     Route::get('/products', [AdminController::class,'product'])->name('admin.products');
//     Route::post('/products', [AdminController::class,'aksi_product']);
//     Route::get('/products/{product}/edit', [AdminController::class,'product_edit']);
//     Route::patch('/products/{id}', [AdminController::class,'action_product']);
//     Route::delete('/products/{id}', [AdminController::class,'destroy']);

//     // QUESTIONS
//     Route::get('/questions', [AdminController::class,'question'])->name('admin.questions');
//     Route::post('/questions', [AdminController::class,'aksi_question']);
//     Route::delete('/questions/{id}', [AdminController::class,'destroy_question']);

//     // ORDERS
//     Route::get('/orders', [AdminController::class,'order'])->name('admin.orders');
//     Route::delete('/orders/{id}', [AdminController::class,'destroy_order']);

// });
