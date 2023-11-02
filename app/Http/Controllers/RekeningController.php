<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use function Laravel\Prompts\error;

define('API_URL', 'http://127.0.0.1:8000/api');

class RekeningController extends Controller
{
    // public function index()
    // {
    //     $doRetrive = Http::accept('application/json')
    //     ->withToken(session()->get('user_token'))
    //     ->get(API_URL . '/user/rekening');

    //     if ($doRetrive->successful()) {
    //         // dd($doRetrive->json());

    //         return view('rekening1')->with('data', $doRetrive->json());

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

    public function index()
    {
        return view('rekening');
    }

    public function add_rekening(Request $request)
    {
        
        $doPost = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->post(API_URL . '/user/rekening', [
            "rekening_number"       => $request->rekening_number,
            "rekening_description"  => $request->rekening_description,
            "rekening_alias"        => $request->rekening_alias,
            "rekening_type"         => $request->rekening_type,
        ]);

        if ($doPost->successful()) {
            return redirect('rekening')->with('success', 'Tambah Rekening berhasil');
        } else {
            if (array_key_exists('message', $doPost->json())) {
                //                dd($doPost->json('message'));
                error($doPost->json('message')); // get message

                return redirect('rekening')->withErrors($doPost->json('status'));
            }

            //            dd($doPost->body());
            return redirect('rekening')->withErrors($doPost->json());
        }
    }

    // public function edit_rekening_id(Request $request)
    // {
    //     $doPatch = Http::contentType('application/json')
    //     ->withToken(session()->get('user_token'))
    //     ->patch(API_URL . '/user/rekening/{rekening_id}', [
    //         "rekening_description" => $request->rekening_description,
    //         "rekening_alias" => $request->rekening_alias,
    //     ]);


    //     if ($doPatch->successful()) {
    //         return view('rekening')->with('success', 'Edit Rekening berhasil');
    //     } else {
    //         if (array_key_exists('message', $doPatch->json())) {
    //             //                dd($doPatch->json('message'));
    //             error($doPatch->json('message')); // get message

    //             return redirect('rekening')->withErrors($doPatch->json('status'));
    //         }

    //         //            dd($doPatch->body());
    //         return redirect('rekening')->withErrors($doPatch->json());
    //     }

        
    // }

    // public function retrieve_rekening_all()
    // {
    //     $doRetrive = Http::accept('application/json')
    //     ->withToken(session()->get('user_token'))
    //     ->get(API_URL . '/user/rekening');

    //     if ($doRetrive->successful()) {
    //         dd($doRetrive->json());

    //         return view('rekening')->with('data', $doRetrive->json());
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
}
