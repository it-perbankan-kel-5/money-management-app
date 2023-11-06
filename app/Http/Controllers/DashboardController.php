<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\error;

class DashboardController extends Controller
{
    public function index()
    {
        // $token = session('user_token');

        // if (!$token) {
        //     return redirect('login')->withErrors('Token not found.');
        // }

        $doRetrive = Http::accept('application/json')
        ->withToken(session()->get('user_token'))
        ->get(API_URL . '/user');
        

        if ($doRetrive->successful()) {
            // dd($doRetrive->json('data'));
            $data = $doRetrive->json('data');

            return view('dashboard', compact('data'));
        } else {
            if (array_key_exists('message', $doRetrive->json())) {
                //                dd($doDelete->json('message'));
                error($doRetrive->json('message')); // get message

                // return error with status
                return redirect('login')->withErrors($doRetrive->json('status'));
            }

            return redirect('login')->withErrors($doRetrive->json());
        }
    }

    // public function index()
    // {
    //     // Mengambil token dari session
    //     $token = session('user_token');

    //     if (!$token) {
    //         return redirect('login')->withErrors('Token not found.');
    //     }

    //     // Kemudian, tampilkan tampilan dashboard
    //     return view('dashboard', ['token' => $token]);=
    // }
}
