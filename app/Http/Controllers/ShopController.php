<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Carts;
use App\Models\Shop;
use App\Models\Questions;
use App\Models\Product;
use App\Models\Kelas;
use App\Models\Invoice;
use App\Models\Materi;
use Sessions;

class ShopController extends Controller
{
    public function beranda(){
        $product = Product::all();
        $questions = Questions::all();
        $cart = Cart::content();
        //dd($cart);
        return view('beranda',['product' => $product], ['questions' => $questions]);
    }
    
    public function masuk(){
        return view('login');
        
    }
    public function cart(Request $request){
        $carts = Cart::content();
        return view('cart',['carts' => $carts]);
    }
    public function kelas(Request $request){
        $kelas = Kelas::all();
        return view('kelas',['kelas' => $kelas]);
        //return view('kelas');
    }
    // public function materi(Request $request){
    //     $kelas = Kelas::all();
    //     $materi = materi::all();
    //     return view('materi',['materi' => $materi], ['kelas' => $kelas]);
    //     //return view('kelas');
    // }
    public function materi($id){
        // Ambil detail kelas
        $kelas = Kelas::findOrFail($id);
        // Ambil semua materi yang id_kelas = id kelas tersebut
        $materi = Materi::where('id_kelas', $id)->get();

        return view('materi', compact('kelas', 'materi'));
    }


    public function forgot_password(){
        return view('forgot_password');
    }
    public function register(){
        return view('register');
    }
    public function add_to_cart(Request $request){    
        $product = Product::findOrFail($request->input(key:'id'));
        Cart::add(
            $product->id,
            $product->product,
            $request->quantity,
            $product->price,  
        );

        return redirect()->action([ShopController::class, 'beranda']);
    }
    public function clear( ){
       Cart::destroy();
       $product = Product::all();
       $questions = Questions::all();
       return view('beranda',['product' => $product], ['questions' => $questions]);
    }
    public function simpaninvoice(Request $request){    
        $invoice = Invoice::create([
            'nama' => $request->name,
            'email' => $request->email,
            'telepon' => $request->Telepon,
            'pembayaran' => $request->pembayaran,
            'rekening' => $request->norek,
            'alamat' => $request->Alamat,
            'ket' => $request->ket,
        ]);
        $carts = Cart::content();
        $invoice = Invoice::all();
        return view('invoice',['carts' => $carts],['invoice' => $invoice]);
    }
    public function tampilinvoice(){    
        $carts = Cart::content();
        $invoice = Invoice::all();
        return view('invoice',['carts' => $carts],['invoice' => $invoice]);
    }
}