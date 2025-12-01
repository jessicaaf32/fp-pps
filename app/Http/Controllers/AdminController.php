<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Shop;
use App\Models\Questions;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\User;


class AdminController extends Controller
{
    public function product()
    {
        $product = Product::all();
        return view('admin.product', compact('product'));
    }
    public function product_edit(Product $product)
    {
        return view('admin.product_edit', ['product'=>$product]);
    }
    public function action_product(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'product' => 'required',
            'ket1' => 'required',
            'height' => 'required',
            'ket3' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'category' => 'required',
            'gambar' => '',

        ]);

        Product::where('id',$product->id)->update($validateData);
        return redirect('product');
        // return view('admin.product_edit', ['product'=>$product]);
    }
    public function question()
    {
        $Questions = Questions::all();
        return view('admin.question', compact('Questions'));
    }
    public function question_edit(Questions $question)
    {
        return view('admin.question_edit', ['question'=>$question]);
    }
    public function question_action(Request $request, Questions $question)
    {
        $validateData = $request->validate([
            'questions' => 'required',
            'answer' => 'required',
            'categoryt' => 'required',

        ]);

        dd(Questions::where('id',$question->id)->update($validateData));
        //return redirect('question');
    }
    public function question_tambah()
    {
        return view('admin.question_tambah');
    }
    public function order()
    {
        $Invoice = Invoice::all();
        return view('admin.order', compact('Invoice'));
    }
    public function user()
    {
        $User = User::all();
        return view('admin.user', compact('User'));
    }
    public function product_tambah()
    {
        return view('admin.product_tambah');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('product')->with('success','$product->nama deleted successfully');
    }
    public function destroy_question(Question $question)
    {
        $question->delete();
        return redirect('question')->with('success','$question->nama deleted successfully');
    }
    public function destroy_user(User $User)
    {
        $User->delete();
        return redirect('User')->with('success','$User->nama deleted successfully');
    }
    public function destroy_order(Invoice $invoice)
    {
        $invoice->delete();
        return redirect('invoice')->with('success','$invoice->nama deleted successfully');
    }
    
    public function aksi_product(Request $request) {
        $name = $request['product'];
        $ket1 = $request['ket1'];
        $height = $request['height'];
        $ket3 = $request['ket3'];
        $gambar = $request['gambar'];
        $price = $request['price'];
        $category = $request['category'];
        $stock = $request['stock'];

        $product = new Product();
        $product->product = $name;
        $product->ket1 = $ket1;
        $product->height = $height;
        $product->ket3 = $ket3;
        $product->gambar = $gambar;
        $product->price = $price;
        $product->category = $category;
        $product->stock = $stock;

        $product->save();

        return redirect('product');        
    }


    public function aksi_user(Request $request) {
        $username = $request['username'];
        $email = $request['email'];
        $password = Hash::make($request->password);

        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        return view('admin.user');        
    }
    public function aksi_question(Request $request) {
        $question = $request['question'];
        $answer = $request['answer'];
        $categoryt = $request['categoryt'];

        $questions = new Questions();
        $questions->questions = $question;
        $questions->answer = $answer;
        $questions->categoryt = $categoryt;

        $questions->save();

        return redirect('question');      
    }

}
