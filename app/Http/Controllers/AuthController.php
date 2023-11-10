<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\error;

class AuthController extends Controller
{
    public function signin_index()
    {
        return view('auth.login');
    }

    public function signup_index()
    {
        return view('auth.register');
    }

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

                return redirect('login')->withErrors($doLogin->json('status'))->withInput();
            }
            // redirect to view
            return redirect('login')->withErrors($doLogin->json())->withInput();
        }
    }

    public function logout()
    {
        $doLogout = Http::withToken(session()->get('user_token'))
        ->post(API_URL . '/logout');

        if ($doLogout->successful()) {
            session()->flush();
            return redirect('login')->with('success', $doLogout->json('status'));
        } else {
            //            dd($doLogout->body());
            return redirect('dashboard')->withErrors('Logout gagal');
        }
    }

    public function register(Request $request)
    {
        $doPost = Http::contentType('application/json')
        ->post(API_URL . '/register', [
            "first_name" => $request->fname,
            "last_name" => $request->lname,
            "email" => $request->email,
            "address" => $request->address,
            "phone_number" => $request->phone_number,
            "password" => $request->password,
        ]);

        if ($doPost->successful()) {
            return redirect('login')->with('success', $doPost->json('status'));
        } else {
            if (array_key_exists('message', $doPost->json())) {
                //                dd($doPost->json('message'));
                error($doPost->json('message')); // get message

                return redirect('register')->withErrors($doPost->json('status'))->withInput();
            }
            //            dd($doPost->body());
            return redirect('register')->withErrors($doPost->json())->withInput();
        }
    }
}
