<?php

namespace App\Http\Controllers;

use App\Enums\UserRolesEnum;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.form-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if ($user = Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (\auth()->user()->role->isAdmin()) {
                return redirect()->intended('/admin');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.form-register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
            'alamat' => ['required'],
            'no_telp' => ['required', 'numeric'],
            'ktp' => ['nullable'],
            'foto' => ['nullable'],
            'ijazah' => ['nullable'], // Ubah validasi ijazah menjadi nullable
        ]);

        $foto = null;
        $ktp = null;
        $ijazah = null;

        if ($request->hasFile('foto')) {
            $fileFoto = $request->file('foto');
            $foto = time() . "_" . $fileFoto->getClientOriginalName();
            $fileFoto->storeAs('public/foto', $foto);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'foto' => $foto,
            'role' => UserRolesEnum::MEMBER->value,
        ]);

        if ($request->hasFile('ktp')) {
            $fileKTP = $request->file('ktp');
            $ktp = time() . "_" . $fileKTP->getClientOriginalName();
            $fileKTP->storeAs('public/ktp', $ktp);
        }

        if ($request->hasFile('ijazah')) {
            $fileIjazah = $request->file('ijazah');
            $ijazah = time() . "_" . $fileIjazah->getClientOriginalName();
            $fileIjazah->storeAs('public/ijazah', $ijazah);
        }

        Member::create([
            'user_id' => $user->id,
            'ktp' => $ktp,
            'ijazah' => $ijazah,
        ]);

        Auth::loginUsingId($user->id);
        return redirect()->intended('/');
    }
}
