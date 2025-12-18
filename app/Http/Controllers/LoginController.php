<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;   // ← WAJIB untuk Str::random()
use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;


class LoginController extends Controller
{
    /* ============================
       SHOW LOGIN PAGE
    ============================ */
    public function login()
    {
        // if (Auth::check()) {
        //     return redirect('beranda');
        // }
        return view('login');
    }

    public function daftar()
    {
        return view('register');
    }
    /* ============================
       REGISTER USER
    ============================ */
public function register(Request $request)
{
    try {

        $request->validate([
            'username' => 'required|min:3|max:50|unique:users,username',
            'email' => 'required|email|max:120|unique:users,email',
            'password' => 'required|min:8',
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        dd('VALIDASI GAGAL', $e->errors());
    }

    User::create([
        'email'    => $request->email,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'ava'      => 'Default.png'  // isi nama file avatar default
    ]);

    return redirect('/')->with('success', 'Akun berhasil dibuat! Silakan login.');
}



    /* ============================
       LOGIN ACTION
    ============================ */
    public function loginaksi(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($request->username === 'admin' && $request->password === 'admin') {

            // Simpan sesi admin
            session(['is_admin' => true]);

            $product = Product::all();
            return redirect('/dashboard_admin');
        }

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            Session::flash('error', 'Username tidak ditemukan');
            return redirect('/');
        }

        // ADMIN LOGIN CHECK
        if ($user->username === 'admin') {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                $product = Product::all();
                return redirect('/dashboard_admin');
            } else {
                Session::flash('error', 'Password admin salah');
                return redirect('/');
            }
        }

        // NORMAL USER LOGIN
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('beranda');
        }

        Session::flash('error', 'Password salah');
        return redirect('/');
    }


    /* ============================
       MANUAL FORGOT PASSWORD
    ============================ */
    public function forgot_password()
    {
        return view('forgot_password');
    }

public function aksi_forgot(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required|min:8',
        'cpassword' => 'required|same:password'
    ], [
        'username.required' => 'Username wajib diisi.',
        'password.required' => 'Password baru wajib diisi.',
        'password.min' => 'Password baru harus minimal 8 karakter.',
        'cpassword.required' => 'Konfirmasi password wajib diisi.',
        'cpassword.same' => 'Konfirmasi password tidak cocok.',
    ]);

    $user = User::where('username', $request->username)->first();

    if (!$user) {
        return back()->with("error", "Username tidak ditemukan!");
    }

    $user->update([
        'password' => Hash::make($request->password)
    ]);

    return redirect('/')->with("success", "Password berhasil diperbarui! Silakan login.");
}




    /* ============================
       LOGOUT
    ============================ */
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }


    /* =====================================================
       PASSWORD RESET VIA EMAIL (default Laravel structure)
    ====================================================== */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'      => $request->email,
            'token'      => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'Link reset password telah dikirim!');
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email'                 => 'required|email|exists:users,email',
            'password'              => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $reset = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        if (!$reset) {
            return back()->with('error', 'Token tidak valid!');
        }

        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/')->with('message', 'Password berhasil direset!');
    }
}
