<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\error;

class UserController extends Controller
{

    public function index()
    {
        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user');

        if ($doRetrive->successful()) {
            // dd($doRetrive->json('data'));
            $data = $doRetrive->json('data');

            return view('profile', compact('data'));
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

    public function edit_user_profile(Request $request)
    {
        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user');

        if ($doRetrive->successful()) {
            // dd($doRetrive->json('data'));
            $data = $doRetrive->json('data');

            return view('edit_profile', compact('data'));
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

    public function update_user_profile(Request $request)
    {
        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user');

        if ($doRetrive->successful()) {
            $currentUserData = $doRetrive->json('data');

            $dataToUpdate = [
                "first_name" => $request->fname !== $currentUserData['first_name'] ? $request->fname : null,
                "last_name" => $request->lname !== $currentUserData['last_name'] ? $request->lname : null,
                'email' => $request->email !== $currentUserData['email'] ? $request->email : null,
                "address" => $request->address !== $currentUserData['address'] ? $request->address : null,
                "phone_number" => $request->phone_number !== $currentUserData['phone_number'] ? $request->phone_number : null,
            ];

            $dataToUpdate = array_filter($dataToUpdate, function ($value) {
                return $value !== null;
            });

            if (!empty($dataToUpdate)) {
                $doPatch = Http::contentType('application/json')
                    ->withToken(session()->get('user_token'))
                    ->patch(API_URL . '/user/edit-profile', $dataToUpdate);

                if ($doPatch->successful()) {
                    // Proses berhasil
                    return redirect('profile')->with('success', 'Berhasil Merubah Profile');
                } else {
                    if (array_key_exists('message', $doPatch->json())) {
                        // Tangani pesan kesalahan dari permintaan PATCH
                        error($doPatch->json('message')); // Dapatkan pesan
                        return redirect('profile')->withErrors($doPatch->json('status'));
                    }

                    return redirect('profile')->withErrors($doPatch->json());
                }
            } else {
                return redirect('profile')->with('success', 'Berhasil Merubah Profile');
            }
        } else {
            return redirect('profile')->withErrors('Gagal mengambil data pengguna');
        }
    }

    public function change_user_password(Request $request)
    {
        $doPatch = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->patch(API_URL . '/user/change-password', [
                "current_password" => $request->current_password,
                "new_password" => $request->new_password,
                "new_password_confirm" => $request->new_password_confirm,
            ]);

        if ($doPatch->successful()) {
            return redirect('profile')->with('success', 'Edit Password berhasil');
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
