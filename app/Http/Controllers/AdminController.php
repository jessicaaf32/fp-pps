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
use App\Models\Diskusi;
use App\Models\ForumQuestions;
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
        //return view('admin.dashboard', compact('users'));
    
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
    public function materi(){
        $materi = Materi::all();
        return view('admin.materi', compact('materi'));
    }
    public function webinar(){
        $webinar = Webinar::all();
        return view('admin.webinar', compact('webinar'));
    }
    public function diskusi(){
        $diskusi = ForumQuestions::all();
        return view('admin.diskusi', compact('diskusi'));
    }
    public function marketplace(){
        $product = Product::all();
        return view('admin.marketplace', compact('product'));
    }


    // public function product()
    // {
    //     $product = Product::all();
    //     return view('admin.products', compact('product'));
    // }

    // public function product_edit($id)
    // {
    //     $product = Product::findOrFail($id);
    //     return view('admin.product_edit', compact('product'));
    // }

    // public function action_product(Request $request, $id)
    // {
    //     $validateData = $request->validate([
    //         'product' => 'required',
    //         'ket1' => 'required',
    //         'height' => 'required',
    //         'ket3' => 'required',
    //         'price' => 'required|numeric',
    //         'stock' => 'required|numeric',
    //         'category' => 'required',
    //         'gambar' => 'nullable'
    //     ]);

    //     Product::where('id', $id)->update($validateData);

    //     return redirect('/product')->with('success', 'Product updated successfully!');
    // }

    // public function aksi_product(Request $request)
    // {
    //     $request->validate([
    //         'product' => 'required',
    //         'ket1' => 'required',
    //         'height' => 'required',
    //         'ket3' => 'required',
    //         'price' => 'required|numeric',
    //         'stock' => 'required|numeric',
    //         'category' => 'required',
    //         'gambar' => 'nullable'
    //     ]);

    //     Product::create($request->all());

    //     return redirect('/product')->with('success', 'Product added successfully!');
    // }

    // public function destroy($id)
    // {
    //     Product::findOrFail($id)->delete();
    //     return redirect('/product')->with('success', 'Product deleted successfully!');
    // }


    // /* ===========================
    //    QUESTIONS
    // ============================ */

    // public function question()
    // {
    //     $Questions = Questions::all();
    //     return view('admin.question', compact('Questions'));
    // }

    // public function question_edit($id)
    // {
    //     $question = Questions::findOrFail($id);
    //     return view('admin.question_edit', compact('question'));
    // }

    // public function question_action(Request $request, $id)
    // {
    //     $validateData = $request->validate([
    //         'questions' => 'required',
    //         'answer' => 'required',
    //         'categoryt' => 'required',
    //     ]);

    //     Questions::where('id', $id)->update($validateData);

    //     return redirect('/question')->with('success', 'Question updated successfully!');
    // }

    // public function aksi_question(Request $request)
    // {
    //     $request->validate([
    //         'questions' => 'required',
    //         'answer' => 'required',
    //         'categoryt' => 'required',
    //     ]);

    //     Questions::create($request->all());

    //     return redirect('/question')->with('success', 'Question added successfully!');
    // }

    // public function destroy_question($id)
    // {
    //     Questions::findOrFail($id)->delete();
    //     return redirect('/question')->with('success', 'Question deleted successfully!');
    // }



    // /* ===========================
    //    USERS
    // ============================ */



    // public function aksi_user(Request $request)
    // {
    //     $request->validate([
    //         'username' => 'required|min:3|max:50',
    //         'email' => 'required|email|max:120',
    //         'password' => 'required|min:8'
    //     ]);

    //     User::create([
    //         'username' => $request->username,
    //         'email'    => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);

    //     return redirect('/user')->with('success', 'User added successfully!');
    // }

    // public function destroy_user($id)
    // {
    //     User::findOrFail($id)->delete();
    //     return redirect('/user')->with('success', 'User deleted successfully!');
    // }



    // /* ===========================
    //    ORDERS
    // ============================ */

    // public function order()
    // {
    //     $Invoice = Invoice::all();
    //     return view('admin.order', compact('Invoice'));
    // }

    // public function destroy_order($id)
    // {
    //     Invoice::findOrFail($id)->delete();
    //     return redirect('/order')->with('success', 'Order deleted successfully!');
    // }
}
