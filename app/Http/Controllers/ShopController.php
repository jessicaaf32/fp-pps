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
use App\Models\Order;
use App\Models\OrderItem;
use Sessions;

class ShopController extends Controller
{
    public function beranda(){
        $product = Product::all();
        $questions = Questions::all();
        $cart = Cart::content();
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
        $product = Product::findOrFail($request->id);

        Cart::add([
            'id'      => $product->id,
            'name'    => $product->product,
            'qty'     => $request->quantity,
            'price'   => $product->price,
            'weight'  =>0,
            'options' => [
                'gambar' => $product->gambar
            ]
        ]);

        return redirect()->action([ShopController::class, 'beranda']);
    }

    public function pesan(Request $request){
        // Ambil item yang dipilih
        $selected = $request->selected_items;

        if (!$selected) {
            return back()->with('error', 'Pilih minimal 1 item!');
        }

        // Ambil item dari cart sesuai rowId
        $items = [];
        $total = 0;

        foreach ($selected as $rowId) {
            $item = Cart::get($rowId);

            if ($item) {
                $items[] = $item;
                $total += $item->qty * $item->price;
            }
        }

        //Kirim ke halaman checkout
        return view('checkout', [
            'items' => $items,
            'total' => $total
        ]);
    }

    public function createOrder(Request $request){
        $request->validate([
            'receiver_name' => 'required',
            'receiver_phone' => 'required',
            'receiver_address' => 'required',
            'payment_method' => 'required',
        ]);

        $items = $request->items; // rowId + qty
        $total = 0;

            // Hitung total berdasarkan item yang dipilih
        foreach ($items as $item) {
            $cartItem = Cart::get($item['row_id']);
            $total += $cartItem->price * $cartItem->qty;
        }
            // GENERATE PAYMENT CHANNEL
        $vaNumber = null;
        $qrisImage = null;

        if ($request->payment_method === "transfer_bri") {
            $vaNumber = "002" . rand(1000000000, 9999999999);
        }

        if ($request->payment_method === "transfer_bni") {
            $vaNumber = "009" . rand(1000000000, 9999999999);
        }

        if ($request->payment_method === "qris") {
            $qrisImage = "qris-default.png"; // nanti dibuat di folder /public/qris
        }

            // ========================
            // SIMPAN ORDER
            // ========================
        $order = Order::create([
            'user_id' => auth()->id(),
            'receiver_name' => $request->receiver_name,
            'receiver_phone' => $request->receiver_phone,
            'receiver_address' => $request->receiver_address,
            'payment_method' => $request->payment_method,
            'va_number' => $vaNumber,
            'qris_image' => $qrisImage,
            'total' => $total,
            'status' => 'pending',
        ]);

            // SIMPAN ITEM
        foreach ($items as $item) {
            $cartItem = Cart::get($item['row_id']);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->id,
                'product_name' => $cartItem->name,
                'price' => $cartItem->price,
                'qty' => $cartItem->qty,
            ]);

            // Hapus item yang sudah masuk order
            Cart::remove($item['row_id']);
        }

        // Redirect ke halaman pembayaran
        return redirect('/payment/'.$order->id);
    }
    public function paymentPage($orderId){
        $order = Order::with('items')->findOrFail($orderId);

        return view('payment', [
            'order' => $order
        ]);
    }
    public function paymentSuccess($orderId){
        $order = Order::findOrFail($orderId);

        // ubah status
        $order->update(['status' => 'paid']);

        return view('payment_success', compact('order'));
    }
    public function listOrders(){
        $orders = Order::where('user_id', auth()->id())->latest()->get();

        return view('orders', compact('orders'));
    }
    public function clear( ){
       Cart::destroy();
       $product = Product::all();
       $questions = Questions::all();
       return view('beranda',['product' => $product], ['questions' => $questions]);
    }
    // public function simpaninvoice(Request $request){    
    //     $invoice = Invoice::create([
    //         'nama' => $request->name,
    //         'email' => $request->email,
    //         'telepon' => $request->Telepon,
    //         'pembayaran' => $request->pembayaran,
    //         'rekening' => $request->norek,
    //         'alamat' => $request->Alamat,
    //         'ket' => $request->ket,
    //     ]);
    //     $carts = Cart::content();
    //     $invoice = Invoice::all();
    //     return view('invoice',['carts' => $carts],['invoice' => $invoice]);
    // }
    // public function tampilinvoice(){    
    //     $carts = Cart::content();
    //     $invoice = Invoice::all();
    //     return view('invoice',['carts' => $carts],['invoice' => $invoice]);
    // }
}