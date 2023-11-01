<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil token dari sesi
        $token = session('access_token');

        if (!$token) {
            return redirect('login')->withErrors('Token not found.');
        }

        $APIurl = 'http://127.0.0.1:8000/api/user';

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get($APIurl);

            $statusCode = $response->status();
            $responseData = $response->json();

            if ($statusCode === 200) {

                $profile = $responseData;

                // dd($response);
                
                return view('profile', compact('profile'));
            } else {
                return redirect('dashboard')->withErrors('Failed to retrieve profile.');
            }
        } catch (\Exception $e) {
            // Handle kesalahan jika terjadi saat mengirim permintaan ke API
            return redirect('dashboard')->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
