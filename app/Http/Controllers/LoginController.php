<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller;
use Session;



class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect('beranda');
        }else{
            return view('login');
        }
        return view('login');
    }
    public function register(Request $request) {
        $username = $request['username'];
        $email = $request['email'];
        $password = Hash::make($request->password);

        $user = new User();
        $user->email = $email;
        $user->username = $username;
        $user->password = $password;

        $user->save();

        return view('login');        
    }
    public function loginaksi(Request $request){
        // $data = [
        //     'name' => $request->input('username'),
        //     'password' => Hash::make($request->input('password'))
        // ];
        // dd($data);
        // if (Auth::attempt($data)){
        //     return redirect('beranda');
        // }else{
        //     Session::flash('error', ' Username atau Password Salah');
        //     return redirect('/');
        // }
        $user = User::where('username', $request->username)->first();
        if($request->username == 'admin'){
            $product = Product::all();
            return view('admin.product', compact('product'));
        }else if (!$user) {
            Session::flash('error', ' Username Salah');
            return redirect('/');
        } else {
            // dump($request->password);
            // dump($user->password);
            //if ($request->password = $user->password) {
            // if ($request->password = $user->password) {
            //     Auth::login($user, true);
            //     return redirect('beranda');
            // } else {
            //     Session::flash('error', ' Password Salah');
            //     return redirect('/');
            // }
            if (Hash::check($request->password,  $user->password)) {
                Auth::login($user, true);
                return redirect('beranda');
            } else {
                Session::flash('error', ' Password Salah');
                return redirect('/');
            }  
        }
        
    }
    public function forgot_password(){
        return view('forgot_password');
    }
    public function aksi_forgot(Request $request){
        if($request->username != auth()->user()->username){
            return back()->with("error", "Email Doesn't match!");
        }

        #Update the new Password
        User::where(auth()->user()->username)->update([
            'password' => Hash::make($request->cpassword)
        ]);

        return view('login',"status", "Password changed successfully!");
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect('/login')->with('message', 'Your password has been changed!');
      }
}
