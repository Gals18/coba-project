<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class cekLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // echo "halaman ini diakses setelah panggil middelware"; 
        if (Auth::check()){
            //jika memang sudah login tampilkan halaman home
            //ketika sudah login, lanjut ke route berikutnya
           
            return $next($request);
            
        }
        return redirect('/')->withErrors('Anda Harus login');
    }
}
