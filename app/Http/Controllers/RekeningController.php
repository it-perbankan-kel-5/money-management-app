<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\error;

class RekeningController extends Controller
{
    // Retrieve ALl User Rekening
    public function index()
    {
        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user/rekening');

        if ($doRetrive->successful()) {
            $data = $doRetrive->json('data');

            return view(
                'rekening.rekening',
                compact('data')
            );
            
        } else {
            if (array_key_exists('message', $doRetrive->json())) {
                //                dd($doDelete->json('message'));
                error($doRetrive->json('message')); // get message

                // return error with status
                return redirect('dashboard')->withErrors($doRetrive->json('status'));
            }

            return redirect('dashboard')->withErrors($doRetrive->json());
        }
    }

    // Create User Rekening
    public function create_rekening()
    {
        return view('rekening.create_rekening');
    }

    // Add  User Rekening
    public function store_rekening(Request $request)
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
            return redirect('rekening')->withErrors($doPost->json())->withInput();
        }
    }

    // Edit User Rekening
    public function edit_rekening($id)
    {
        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user/rekening/' . $id);

        if ($doRetrive->successful()) {
            $data = $doRetrive->json('data');

            return view('rekening.edit_rekening',compact('data'));

        } else {
            
            if (array_key_exists('message', $doRetrive->json())) {
                //                dd($doDelete->json('message'));
                error($doRetrive->json('message')); // get message

                // return error with status
                return redirect('rekening')->withErrors($doRetrive->json('status'));
            }

            return redirect('rekening')->withErrors($doRetrive->json());
        }
    }

    // Update User Rekening
    public function update_rekening(Request $request, $id)
    {
        $doPatch = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->patch(API_URL . '/user/rekening/' . $id, [
                "rekening_description" => $request->rekening_description,
                "rekening_alias" => $request->rekening_alias,
            ]);

        if ($doPatch->successful()) {
            return redirect('rekening')->with('success', 'Edit Rekening berhasil');
        } else {
            if (array_key_exists('message', $doPatch->json())) {
                //                dd($doPatch->json('message'));
                error($doPatch->json('message')); // get message

                return redirect('rekening')->withErrors($doPatch->json('status'));
            }

            //            dd($doPatch->body());
            return redirect('rekening')->withErrors($doPatch->json());
        }
    }

    // Delete User Rekening
    public function delete_rekening($id)
    {
        $doDelete = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->delete(API_URL . '/user/rekening/' . $id);

        if ($doDelete->successful()) {
            return redirect('rekening')->with('success', 'Delete Rekening berhasil');
        } else {
            if (array_key_exists('message', $doDelete->json())) {
                //                dd($doDelete->json('message'));
                error($doDelete->json('message')); // get message

                // return error with status
                return redirect('rekening')->withErrors($doDelete->json('status'));
            }

            return redirect('rekening')->withErrors($doDelete->json());
        }
    }
}
