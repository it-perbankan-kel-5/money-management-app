<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil token dari session
        $token = session('user_token');

        if (!$token) {
            return redirect('login')->withErrors('Token not found.');
        }

        // Kemudian, tampilkan tampilan dashboard
        return view('dashboard', ['token' => $token]);

        @dd($token);


    }
}
