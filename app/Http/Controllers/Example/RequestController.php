<?php

namespace App\Http\Controllers\Example;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\MessageProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\MessageBag;
use function Laravel\Prompts\error;

define('API_URL', 'http://127.0.0.1:8000/api');

class RequestController extends Controller
{
    public function login(Request $request) {
        $doLogin = Http::contentType('application/json')
            ->post(API_URL . '/login', [
                'email' => 'testuser@email.com',
                'password' => 'testuser'
            ]);

        if($doLogin->successful()) {
            $request->session()->put('user_token', $doLogin->json('access_token'));

            return redirect('request-success')->with('success', 'login berhasil');
        } else {
            if(array_key_exists('message', $doLogin->json())) {
//                dd($doPatch->json('message'));
                error($doLogin->json('message')); // get message

                return redirect('request-error')->withErrors($doLogin->json('status'));
            }
//            dd($doLogin->body());
            // redirect to view
            return redirect('request-error')->withErrors($doLogin->json());
        }
    }

    public function logout() {
        $doLogout = Http::withToken(session()->get('user_token'))
            ->post(API_URL . '/logout');

        if($doLogout->successful()) {
            session()->flush();
            return redirect('request-success')->with('success', 'Logout berhasil');
        } else {
//            dd($doLogout->body());
            return redirect('request-error')->withErrors('Logout gagal');
        }
    }

    public function postRequest() {
        $doPost = Http::contentType('application/json')
            ->withToken('19|7rVKFIdh06Yzo1rZ1i60SUBrghODw1rfy3AxSYJ2b2f0c915')
            ->post(API_URL . '/user/rekening', [
                "rekening_number" => "112312415100",
                "rekening_description" => "test",
                "rekening_alias" => "test",
                "rekening_type" => "2"
            ]);

        dd($doPost->body());

        if($doPost->successful()) {
            return redirect('request-success')->with('success', 'Tambah Rekening berhasil');
        } else {
            if(array_key_exists('message', $doPost->json())) {
//                dd($doPost->json('message'));
                error($doPost->json('message')); // get message

                return redirect('request-error')->withErrors($doPost->json('status'));
            }

//            dd($doPost->body());
            return redirect('request-field-error')->withErrors($doPost->json());
        }
    }

    public function patchRequest() {
        $doPatch = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->patch(API_URL . '/user/rekening/1', [
                'rekening_alias' => 'edited alias'
            ]);


        if($doPatch->successful()) {
            return redirect('request-success')->with('success', 'Edit Rekening berhasil');
        } else {
            if(array_key_exists('message', $doPatch->json())) {
//                dd($doPatch->json('message'));
                error($doPatch->json('message')); // get message

                return redirect('request-error')->withErrors($doPatch->json('status'));
            }

//            dd($doPatch->body());
            return redirect('request-error')->withErrors($doPatch->json());
        }
    }

    public function deleteRequest() {
        $doDelete = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->delete(API_URL . '/user/rekening/5');

        if($doDelete->successful()) {
            return redirect('request-success')->with('success', 'Delete Rekening berhasil');
        } else {
            if(array_key_exists('message', $doDelete->json())) {
//                dd($doDelete->json('message'));
                error($doDelete->json('message')); // get message

                // return error with status
                return redirect('request-error')->withErrors($doDelete->json('status'));
            }

            return redirect('request-error')->withErrors($doDelete->json());
        }
    }

    public function getRequest() {
        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user');

        if($doRetrive->successful()) {
//            dd($doRetrive);
            return redirect('request-success')->with('data', $doRetrive->json());
        } else {
            if(array_key_exists('message', $doRetrive->json())) {
//                dd($doDelete->json('message'));
                error($doRetrive->json('message')); // get message

                // return error with status
                return redirect('request-error')->withErrors($doRetrive->json('status'));
            }

            return redirect('request-error')->withErrors($doRetrive->body());
        }
    }
}
