<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use function Laravel\Prompts\error;

define('API_URL', 'http://127.0.0.1:8000/api');

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

    // public function loginOLD(Request $request)
    // {
    //     $APIurl = 'http://127.0.0.1:8000/api/login'; // URL API login

    //     try {
    //         $response = Http::asForm()->post($APIurl, [
    //             'email' => $request->email,
    //             'password' => $request->password,
    //         ]);

    //         $statusCode = $response->status();
    //         $responseData = $response->json();

    //         if ($statusCode === 200) {
    //             $token = $responseData['access_token'];

    //             // Simpan token ke dalam sesi
    //             session(['access_token' => $token]);

    //             return redirect('dashboard');
    //         } else {
    //             // Jika login gagal, alihkan kembali ke halaman login dengan pesan kesalahan
    //             return redirect('login')->withErrors(['error' => 'Invalid email or password']);
    //         }
    //     } catch (\Exception $e) {
    //         // Handle kesalahan jika terjadi saat mengirim permintaan ke API
    //         return redirect('login')->with('error', 'Error: ' . $e->getMessage());
    //     }
    // }

    public function login(Request $request)
    {
        $doLogin = Http::contentType('application/json')
        ->post(API_URL . '/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($doLogin->successful()) {
            $request->session()->put('user_token', $doLogin->json('access_token'));

            return redirect('dashboard')->with('success', 'login berhasil');
        } else {
            if (array_key_exists('message', $doLogin->json())) {

                error($doLogin->json('message')); // get message

                return redirect('login')->withErrors($doLogin->json('status'));
            }
            // redirect to view
            return redirect('login')->withErrors($doLogin->json());
        }
    }


    // public function logout(Request $request)
    // {
    //     $token = session('access_token');

    //     if ($token) {
    //         $apiUrl = 'http://127.0.0.1:8000/api/logout';

    //         try {
    //             // Jika menggunakan HTTP Client Laravel
    //             $response = Http::withHeaders([
    //                 'Content-Type' => 'application/json',
    //                 'Authorization' => 'Bearer ' . $token,
    //             ])->post($apiUrl);

    //             $statusCode = $response->status();

    //             // @dd($response->json());

    //             if ($statusCode === 200) {
    //                 Auth::logout();
    //                 session()->forget('access_token');

    //                 return redirect('login');
    //             } else {
    //                 return back()->with('error', 'Failed to logout');
    //             }
    //         } catch (\Exception $e) {
    //             return back()->with('error', 'Error: ' . $e->getMessage());
    //         }
    //     }

    //     return redirect('login');
    // }

    public function logout()
    {
        $doLogout = Http::withToken(session()->get('user_token'))
        ->post(API_URL . '/logout');

        if ($doLogout->successful()) {
            session()->flush();
            return redirect('login')->with('success', 'Logout berhasil');
        } else {
            //            dd($doLogout->body());
            return redirect('dashboard')->withErrors('Logout gagal');
        }
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
