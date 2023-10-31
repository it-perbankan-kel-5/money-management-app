<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil token dari session
        $token = session('access_token');

        $APIurl = 'http://127.0.0.1:8000/api/get_profile';

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->get($APIurl);

            $statusCode = $response->status();

            if ($statusCode === 200) {
                $responseData = $response->json();

                return view('profile', ['profile' => $responseData['data']]);
            } else {
                return redirect('dashboard')->withErrors('Failed to retrieve profile.');
            }
        } catch (\Exception $e) {
            return redirect('dashboard')->with('error', 'Error: ' . $e->getMessage());
        }
        
        return view('profile');
    }
}
