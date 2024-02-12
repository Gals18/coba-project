<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login.index');
    }
    // function login(Request $request)
    // {
    //     $request->validate(
    //         [
    //             'username' => 'required',
    //             'password' => 'required'
    //         ],
    //         [
    //             'username.required' => 'Username wajib diisi',
    //             'password.required' => 'Password wajib diisi',
    //         ]
    //     );

    //     $infologin = [
    //         'username' => $request->username,
    //         'password' => $request->password,
    //     ];

    //     // dd($infologin);
    //     if (Auth::attempt($infologin)) {
    //         if (Auth::pengguna()->role == 'operator') {
    //             return redirect('admin/operator');
    //         } elseif (Auth::pengguna()->role == 'pegawai') {
    //             return redirect('admin/pegawai');
    //         }
    //     } else {
    //         return redirect('')->withErrors('Login failed!')->withInput();
    //     }
    // }

    public function aksilogin(Request $request)
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

        // dd($infologin);
        $login = Auth::attempt($infologin);
        if ($login) {
            $selectUser = Pengguna::firstWhere('username', $request->username);
            //masukan data ke session :id, name,
            $data = [
                'id' => $selectUser->id,
                'username' => $selectUser->username,
            ];
            //pindah ke halaman home
            session($data);
            return redirect('/home')->withSuccess('Anda Berhasil Login');
        } else {
            return redirect()->back()->withErrors('Login failed!');
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
