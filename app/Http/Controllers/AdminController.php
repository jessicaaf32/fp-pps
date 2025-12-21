<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Questions;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\Webinar;
use App\Models\Kuis;
use App\Models\Diskusi;
use App\Models\ForumQuestions;
use App\Models\ForumAnswers;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard(){
        $users = User::all();
        //$materi = Materi::with('kelas')->latest()->limit(10)->get();
            return view('admin.dashboard', [
            'totalUser'   => User::count(),
            'totalKelas'  => Kelas::count(),
            'totalMateri' => Materi::count(),
            'totalProduct' => Product::count(),

            // untuk tabel user
            'users' => User::latest()->limit(5)->get(), // ambil 5 user terbaru
        ]);
        //return view('admin.dashboard', compact('users'));
    }
    
    public function user()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function destroy_user($id){
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success','User berhasil dihapus');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'nullable|min:6',
        ],
        [
            'email.unique' => 'Email yang anda gunakan sudah terdaftar! Tolong coba lagi!',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
            'password' => bcrypt($request->password ?? 'password123'),
        ]);

        return redirect()->back()->with('success','User berhasil ditambahkan');
    }
    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required',
            'email'    => 'required|email|unique:users,email,' . $id,
            'phone'    => 'nullable',
            'address'  => 'nullable',
            'password' => 'nullable|min:6',
        ]);

        $data = [
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'address'  => $request->address,
        ];

        // 👉 HANYA update password kalau diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->back()->with('success', 'User berhasil diupdate');
    }
    public function kelas(){
        $kelas = Kelas::all();
        return view('admin.kelas', compact('kelas'));
    }
    public function store_class(Request $request){
        $request->validate([
            'nama'       => 'required',
            'keterangan' => 'required',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarName = null;

        // 👉 CEK ADA FILE ATAU TIDAK
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambarName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/kelas'), $gambarName);
        }

        Kelas::create([
            'nama'       => $request->nama,
            'keterangan' => $request->keterangan,
            'gambar'     => $gambarName, // boleh null
        ]);

        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan');
    }

    public function destroy_class($id){
        Kelas::findOrFail($id)->delete();
        return redirect()->back()->with('success','Kelas berhasil dihapus');
    }
    public function update_class(Request $request, $id){
        // ambil data kelas
        $kelas = Kelas::findOrFail($id);

        // validasi
        $request->validate([
            'nama'       => 'required',
            'keterangan' => 'required',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // default: pakai gambar lama
        $gambarName = $kelas->gambar;

        // 👉 kalau upload gambar baru
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambarName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/kelas'), $gambarName);

            // 👉 hapus gambar lama (opsional tapi rapi)
            if ($kelas->gambar && file_exists(public_path('img/kelas/' . $kelas->gambar))) {
                unlink(public_path('img/kelas/' . $kelas->gambar));
            }
        }

        // update data
        $kelas->update([
            'nama'       => $request->nama,
            'keterangan' => $request->keterangan,
            'gambar'     => $gambarName, // tetap lama kalau tidak upload baru
        ]);

        return redirect()->back()->with('success', 'Kelas berhasil diupdate');
    }

    public function materi($id){
        $kelas = Kelas::findOrFail($id);

        // ambil materi yang hanya milik kelas ini
        $materi = Materi::where('id_kelas', $id)->get();

        return view('admin.materi', compact('kelas', 'materi'));
    }

    public function store_materi(Request $request){
        $request->validate([
            'id_kelas'      => 'required|exists:kelas,id',
            'judul_materi'  => 'required',
            'keterangan'    => 'required',
            'link'          => 'required',
        ]);

        Materi::create([
            'id_kelas'      => $request->id_kelas,
            'judul_materi'  => $request->judul_materi,
            'keterangan'    => $request->keterangan,
            'link'          => $request->link,
        ]);

        return redirect()->back()->with('success', 'Materi berhasil ditambahkan');
    }


    public function destroy_materi($id){
        Materi::findOrFail($id)->delete();
        return redirect()->back()->with('success','Materi berhasil dihapus');
    }
    public function update_materi(Request $request, $id){
        // ambil data Materi
        $materi = Materi::findOrFail($id);

        // validasi
        $request->validate([
            'id_kelas'      => 'required|exists:kelas,id',
            'judul_materi'  => 'required',
            'keterangan'    => 'required',
            'link'          => 'required',
        ]);

        // update data
        $materi->update([
            'id_kelas'      => $request->id_kelas,
            'judul_materi'  => $request->judul_materi,
            'keterangan'    => $request->keterangan,
            'link'          => $request->link,
        ]);

        return redirect()->back()->with('success', 'Materi berhasil diupdate');
    }

    public function webinar(){
        $webinar = Webinar::all();
        return view('admin.webinar', compact('webinar'));
    }
    public function store_webinar(Request $request){
        $request->validate([
            'title'             => 'required',
            'description'       => 'required',
            'date'              => 'required',
            'time_start'        => 'required',
            'time_end'          => 'required',
            'webinar_type'      => 'required',
            'link'              => 'required',
            'poster_url'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarName = null;

        // 👉 CEK ADA FILE ATAU TIDAK
        if ($request->hasFile('poster_url')) {
            $file = $request->file('poster_url');
            $gambarName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/webinar'), $gambarName);
        }

        Webinar::create([
            'title'         => $request->title,
            'subtitle'      => $request->subtitle,
            'description'   => $request->description,
            'date'          => $request->date,
            'time_start'    => $request->time_start,
            'time_end'      => $request->time_end,
            'webinar_type'  => $request->webinar_type,
            'poster_url'    => $gambarName,
            'link'          => $request->link, // boleh null
        ]);

        return redirect()->back()->with('success', 'Webinar berhasil ditambahkan');
    }

    public function destroy_webinar($id){
        Webinar::findOrFail($id)->delete();
        return redirect()->back()->with('success','Webinar berhasil dihapus');
    }
    public function update_webinar(Request $request, $id){
        // ambil data kelas
        $webinar = Webinar::findOrFail($id);

        // validasi
        $request->validate([
            'title'             => 'required',
            'description'       => 'required',
            'date'              => 'required',
            'time_start'        => 'required',
            'time_end'          => 'required',
            'webinar_type'      => 'required',
            'link'              => 'required',
            'poster_url'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // default: pakai gambar lama
        $gambarName = $webinar->gambar;

        // 👉 kalau upload gambar baru
        if ($request->hasFile('poster_url')) {
            $file = $request->file('poster_url');
            $gambarName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/webinar'), $gambarName);

            // 👉 hapus gambar lama (opsional tapi rapi)
            if ($webinar->gambar && file_exists(public_path('img/webinar/' . $webinar->gambar))) {
                unlink(public_path('img/webinar/' . $webinar->gambar));
            }
        }

        // update data
        $webinar->update([
            'title'        => $request->title,
            'subtitle'     => $request->subtitle,
            'description'  => $request->description,
            'date'         => $request->date,
            'time_start'   => $request->time_start,
            'time_end'     => $request->time_end,
            'webinar_type' => $request->webinar_type,
            'link'         => $request->link,
            'poster_url'   => $gambarName,
        ]);

        return redirect()->back()->with('success', 'Webinar berhasil diupdate');
    }

    public function diskusi(){
        $diskusi = ForumQuestions::all();
        $user = User::all();
        $kelas = Kelas::all();
        return view('admin.diskusi', compact('diskusi','user','kelas'));
    }
    public function destroy_diskusi($id){
        ForumQuestions::findOrFail($id)->delete();
        return redirect()->back()->with('success','Pertanyaan berhasil dihapus');
    }
    public function answer($id){
        $diskusi = ForumQuestions::findOrFail($id);
        // ambil answer yang hanya milik diskusi ini
        $answer = ForumAnswers::where('question_id', $id)->get();

        return view('admin.answer', compact('diskusi', 'answer'));
    }
    public function destroy_answer($id){
        ForumAnswers::findOrFail($id)->delete();
        return redirect()->back()->with('success','Jawaban berhasil dihapus');
    }
    public function kuis(){
        $kuis = Kuis::all();
        return view('admin.kuis', compact('kuis'));
    }
    public function destroy_kuis($id){
        Kuis::findOrFail($id)->delete();
        return redirect()->back()->with('success','Kuis berhasil dihapus');
    }
    public function marketplace(){
        $product = Product::all();
        return view('admin.marketplace', compact('product'));
    }
        public function store_product(Request $request){
        $request->validate([
            'product'    => 'required',
            'ket1'       => 'required',
            'price'      => 'required',
            'category'   => 'required',
            'stock'      => 'required',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarName = null;

        // 👉 CEK ADA FILE ATAU TIDAK
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambarName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/product'), $gambarName);
        }
        $price = str_replace('.', '', $request->price);
        Product::create([
            'product'       => $request->product,
            'ket1'          => $request->ket1,
            'price'         => $price,
            'category'      => $request->category,
            'stock'         => $request->stock,
            'gambar'        => $gambarName,
        ]);

        return redirect()->back()->with('success', 'Product berhasil ditambahkan');
    }

    public function destroy_product($id){
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success','Product berhasil dihapus');
    }
    public function update_product(Request $request, $id){
        // ambil data kelas
        $product = Product::findOrFail($id);

        // validasi
        $request->validate([
            'product'    => 'required',
            'ket1'       => 'required',
            'price'      => 'required',
            'category'   => 'required',
            'stock'      => 'required',
            'gambar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // default: pakai gambar lama
        $gambarName = $product->gambar;

        // 👉 kalau upload gambar baru
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambarName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/product'), $gambarName);

            // 👉 hapus gambar lama (opsional tapi rapi)
            if ($product->gambar && file_exists(public_path('img/product/' . $product->gambar))) {
                unlink(public_path('img/product/' . $product->gambar));
            }
        }

        $price = str_replace('.', '', $request->price);

        // update data
        $product->update([
            'product'       => $request->product,
            'ket1'          => $request->ket1,
            'price'         => $price,
            'category'      => $request->category,
            'stock'         => $request->stock,
            'gambar'        => $gambarName,
        ]);

        return redirect()->back()->with('success', 'Product berhasil diupdate');
    }
    public function order(){
        $order = Order::all();
        $user  = User::all();
        return view('admin.orders', compact('order','user'));
    }
    public function destroy_order($id){
        Order::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }
    public function update_order(Request $request, $id){
        // ambil data kelas
        $order = Order::findOrFail($id);

        // validasi
        $request->validate([
            'status'    => 'required',
        ]);

        // update data
        $order->update([
            'status'       => $request->status,
        ]);

        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }
    public function order_item($id){
        // ambil order (header)
        $order = Order::findOrFail($id);

        // ambil SEMUA item berdasarkan order_id
        $order_items = OrderItem::where('order_id', $id)->get();

        return view('admin.orders_item', compact('order', 'order_items'));
    }

    public function destroy_order_item($id){
        OrderItem::findOrFail($id)->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }

}
