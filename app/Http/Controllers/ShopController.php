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
use App\Models\Webinar;
use App\Models\ForumAnswers;
use App\Models\ForumQuestions;
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
    public function materi($id){
        // Ambil detail kelas
        $kelas = Kelas::findOrFail($id);
        // Ambil semua materi yang id_kelas = id kelas tersebut
        $materi = Materi::where('id_kelas', $id)->get();

        return view('materi', compact('kelas', 'materi'));
    }
    public function webinar(Request $request){
        $webinar = Webinar::all();
        return view('webinar',['webinar' => $webinar]);
    }
    public function webinar_next($id){
        // $webinar = Webinar::findOrFail($id);
        // return view('webinar_next', compact('webinar'));
        $webinar = Webinar::findOrFail($id);
        // Ambil semua materi yang id_kelas = id kelas tersebut
        $webinar2 = Webinar::where('id', $id)->get();
        return view('webinar_next', compact('webinar', 'webinar2'));
    }
    public function diskusi(Request $request){
        $search = $request->search; // ambil keyword pencarian
        $questions = ForumQuestions::with(['user', 'kelas', 'answers'])
            ->when($search, function($query) use ($search) {
                $query->where('questions_detail', 'LIKE', "%$search%");
            })
            ->latest()
            ->get();

        return view('diskusi', compact('questions'));
    }

    // public function likeQuestion($id){
    //     $q = ForumQuestions::findOrFail($id);
    //     $q->likes += 1;
    //     $q->save();

    //     return response()->json([
    //         'likes' => $q->likes
    //     ]);
    // }

    public function likeAnswer($id){
        $a = ForumAnswers::findOrFail($id);
        $a->likes += 1;
        $a->save();

        return response()->json([
            'likes' => $a->likes
        ]);
    }


    public function jawab(Request $request, $id){
        $request->validate([
            'answer_detail' => 'required',
        ]);

        $answer = ForumAnswers::create([
            'question_id' => $id,
            'user_id' => auth()->id(),
            'answer_detail' => $request->answer_detail
        ]);

        // return JSON agar bisa ditampilkan tanpa reload
        return response()->json([
            'username' => $answer->user->username,
            'avatar'   => asset('/img/team/'.$answer->user->ava),
            'answer'   => $answer->answer_detail,
            'time'     => $answer->created_at->diffForHumans()
        ]);
    }

    public function askForm(){
        $kelas = Kelas::all(); // supaya user bisa memilih kelas
        return view('ask', compact('kelas'));
    }

    public function storeQuestion(Request $request){
        $request->validate([
            'kelas_id' => 'required',
            'questions_detail' => 'required|min:5',
        ]);

        ForumQuestions::create([
            'user_id' => auth()->id(),
            'kelas_id' => $request->kelas_id,
            'questions_detail' => $request->questions_detail,
            'likes' => 0
        ]);

        return redirect('/diskusi')->with('success', 'Pertanyaan berhasil ditambahkan!');
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