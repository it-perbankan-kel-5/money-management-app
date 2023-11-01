<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function signin_index()
    {
        return view('api.signin');
    }

    public function register_index()
    {
        return view('api.signup');
    }

    public function login(Request $request)
    {
        $APIurl = 'http://127.0.0.1:8000/api/login'; // URL API login

        try {
            $response = Http::asForm()->post($APIurl, [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $statusCode = $response->status();
            $responseData = $response->json();

            if ($statusCode === 200) {
                $token = $responseData['access_token'];

                // Simpan token ke dalam sesi
                session(['access_token' => $token]);

                return redirect('dashboard');
            } else {
                // Jika login gagal, alihkan kembali ke halaman login dengan pesan kesalahan
                return redirect('login')->withErrors(['error' => 'Invalid email or password']);
            }
        } catch (\Exception $e) {
            // Handle kesalahan jika terjadi saat mengirim permintaan ke API
            return redirect('login')->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function logout(Request $request)
    {
        $token = session('access_token'); 

        if ($token) {
            $apiUrl = 'http://127.0.0.1:8000/api/logout'; 

            try {
                // Jika menggunakan HTTP Client Laravel
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ])->post($apiUrl);

                $statusCode = $response->status();
                
                // @dd($response->json());

                if ($statusCode === 200) {
                    Auth::logout(); 
                    session()->forget('access_token'); 

                    return redirect('login');
                } else {
                    return back()->with('error', 'Failed to logout');
                }
            } catch (\Exception $e) {
                return back()->with('error', 'Error: ' . $e->getMessage());
            }
        }

        return redirect('login');
    }

    public function signup(Request $request)
    {
        $APIurl = 'http://127.0.0.1:8000/api/register'; 

        try {
            $response = Http::post($APIurl, [
                "first_name" => $request->fname,
                "last_name" => $request->lname,
                'email' => $request->email,
                "address" => $request->address,
                "phone_number" => $request->phone_number,
                "password" => $request->password,
            ]);

            $statusCode = $response->status();
            $responseData = $response->json(); 

            // @dd($response->json());

            if ($statusCode === 200) {
                return redirect('login');
            } else {
                return redirect('register')->withErrors($responseData['status']);
            }
        } catch (\Exception $e) {
            return redirect('register')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    
}
