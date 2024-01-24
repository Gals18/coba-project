<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login.index');
    }
    function login(Request $request)
    {
        $request->validate(
            [
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'username.required' => 'Username wajib diisi',
                'password.required' => 'Password wajib diisi',
            ]
        );

        $infologin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'operator') {
                return redirect('admin/operator');
            } elseif (Auth::user()->role == 'pegawai') {
                return redirect('admin/pegawai');
            }
        } else {
            return redirect('')->withErrors('Login failed!')->withInput();
        }
    }

    function logout() {
        Auth::logout();
        return redirect('');
    }
}
