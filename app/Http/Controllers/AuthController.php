<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataLogin = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($dataLogin)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            return back();
        }
    }

    public function password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required',
            'password_confirm' => 'required'
        ]);

        // dd($request->all());

        $cekPassword = auth()->user()->password;

        $old_password = $request->old_password;

        if (Hash::check($old_password, $cekPassword)) {
            $user = Auth::user();
            $user->password = bcrypt($request->get('password'));
            $user->save();

            alert()->success('Berhasil','Password Berhasil Diperbaharui.');
            return back();
        } else {
            alert()->error('Gagal','Password Gagal Diperbaharui.');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
