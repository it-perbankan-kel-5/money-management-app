<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('api.signin');
    }

    public function login(Request $request)
    {
        $url = 'http://127.0.0.1:8000/api/login'; // URL API login

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        try {
            // Jika menggunakan HTTP Client Laravel
            // $response = Http::asForm()->post($url, $data);

            $response = Http::asForm()->post('http://127.0.0.1:8000/api/login', [
                'email' => $request->email,
                'password' => $request->password,
            ]);

            $statusCode = $response->status();
            // @dd($response);
            if ($statusCode === 200) {
                $responseData = $response->json();
                $token = $responseData['access_token'];

                // Simpan token ke dalam sesi atau database, sesuai dengan kebutuhan Anda
                // Anda juga dapat menyimpan token di dalam cookie atau lokal storage jika diperlukan
                // Contoh simpan token ke dalam sesi:
                session(['access_token' => $token]);

                // Alihkan ke halaman dashboard atau ke halaman yang sesuai
                return redirect('dashboard');
            } else {
                // Jika login gagal, alihkan kembali ke halaman login dengan pesan kesalahan
                return redirect('login')->with('error', 'Invalid email or password');
            }
        } catch (\Exception $e) {
            // Handle kesalahan jika terjadi saat mengirim permintaan ke API
            return redirect('login')->with('error', 'Error: ' . $e->getMessage());
        }

    }

    public function logout(Request $request)
    {
        $token = session('access_token'); // Ambil token akses dari sesi atau tempat penyimpanan lain (sesuai dengan cara Anda menyimpannya)

        if ($token) {
            $apiUrl = 'http://127.0.0.1:8000/api/logout'; // URL API logout

            try {
                // Jika menggunakan HTTP Client Laravel
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ])->post($apiUrl);

                $statusCode = $response->status();
                // @dd($response->json());
                if ($statusCode === 200) {
                    Auth::logout(); // Melakukan logout pengguna
                    session()->forget('access_token'); // Menghapus token akses dari sesi

                    return redirect('login'); // Alihkan ke halaman login setelah logout berhasil
                } else {
                    return back()->with('error', 'Failed to logout'); // Alihkan kembali ke halaman sebelumnya dengan pesan kesalahan jika logout gagal
                }
            } catch (\Exception $e) {
                return back()->with('error', 'Error: ' . $e->getMessage()); // Alihkan kembali ke halaman sebelumnya dengan pesan kesalahan jika terjadi kesalahan saat mengirim permintaan ke API logout
            }
        }

        return redirect()->route('login'); // Alihkan ke halaman login jika token tidak tersedia
    }
}
