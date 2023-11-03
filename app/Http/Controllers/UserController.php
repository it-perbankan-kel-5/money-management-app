<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\error;

define('API_URL', 'http://127.0.0.1:8000/api');

class UserController extends Controller
{
    public function index()
    {
       return view('profile');
    }

    // public function index()
    // {
    //     $doRetrive = Http::accept('application/json')
    //     ->withToken(session()->get('user_token'))
    //         ->get(API_URL . '/user');

    //     if ($doRetrive->successful()) {
    //         dd($doRetrive->json());

    //         return view('profile')->with('data', $doRetrive->json());
    //     } else {
    //         if (array_key_exists('message', $doRetrive->json())) {
    //             //                dd($doDelete->json('message'));
    //             error($doRetrive->json('message')); // get message

    //             // return error with status
    //             return redirect('dashboard')->withErrors($doRetrive->json('status'));
    //         }

    //         return redirect('dashboard')->withErrors($doRetrive->json());
    //     }
    // }

    public function edit_user_profile(Request $request)
    {
        $doPatch = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->patch(API_URL . '/user/edit-profile', [
            "first_name" => $request->fname,
            "last_name" => $request->lname,
            'email' => $request->email,
            "address" => $request->address,
            "phone_number" => $request->phone_number,
        ]);


        if ($doPatch->successful()) {
            return view('profile')->with('success', 'Edit Rekening berhasil');
        } else {
            if (array_key_exists('message', $doPatch->json())) {
                //                dd($doPatch->json('message'));
                error($doPatch->json('message')); // get message

                return redirect('profile')->withErrors($doPatch->json('status'));
            }

            //            dd($doPatch->body());
            return redirect('profile')->withErrors($doPatch->json());
        }
    }
    
    public function change_user_password(Request $request)
    {
        $doPatch = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->patch(API_URL . '/user/change-password', [
            "current_password" => $request->password,
            "new_password" => $request->new_password,
            'new_password_confirm' => $request->new_password_confirm,
        ]);


        if ($doPatch->successful()) {
            return view('profile')->with('success', 'Edit Rekening berhasil');
        } else {
            if (array_key_exists('message', $doPatch->json())) {
                //                dd($doPatch->json('message'));
                error($doPatch->json('message')); // get message

                return redirect('profile')->withErrors($doPatch->json('status'));
            }

            return redirect('profile')->withErrors($doPatch->json());
        }
    }

    
}
