<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;
use function Laravel\Prompts\error;


class BudgetingController extends Controller
{
    public function index()
    {
        $token = session()->get('user_token');

        $retrieveBudgeting = Http::pool(function (Pool $pool) use ($token) {
            $pool->as('budget_data')->withToken($token)
                ->get(API_URL . '/user/budget-limit/');
            $pool->as('budget_analytic')->withToken($token)
                ->get(API_URL . '/user/budget-analytic/');
        });

        return view('budgeting')
            ->with('data', $retrieveBudgeting['budget_data']->json('data'))
            ->with('analytic', $retrieveBudgeting['budget_analytic']->json(['data']));
    }


    public function get_user_budgeting()
    {
        $retrieveBudgeting = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->get(API_URL . '/user/budget-limit/');

        if ($retrieveBudgeting->successful()) {
            // dd($retrieveBudgeting->json('data'));

            /**
             * TODO - ubah view khusus untuk list user budgeting
             */
            return view('add_budgeting')->with('data', $retrieveBudgeting->json('data'));
        } else {
            if (array_key_exists('message', $retrieveBudgeting->json())) {
                //                dd($doDelete->json('message'));
                error($retrieveBudgeting->json('message')); // get message

                // return error with status
                return redirect('budgeting')->withErrors($retrieveBudgeting->json('status'));
            }
            return redirect('budgeting')->withErrors($retrieveBudgeting->json());
        }
    }

    public static function get_rekening_utama()
    {
        $token = session()->get('user_token');

        $retrieveBudgeting = Http::pool(function (Pool $pool) use ($token) {
            $pool->as('rekening_utama')->withToken($token)
                ->get(API_URL . '/user/rekening/type/1');
        });

        return $retrieveBudgeting['rekening_utama']->json('data');
    }

    public function add_budget(Request $request)
    {
        $doPost = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->post(API_URL . '/user/budget-limit', [
            "rekening_id" => $request->rekening_id,
            "budget_limit_type_id"  => $request->budget_limit_type_id,
            "budget_name"           => $request->budget_name,
            "budget_description"    => $request->budget_description,
            "budget_limit_target"   => $request->budget_limit_target,
        ]);

        if ($doPost->successful()) {
            return redirect('budgeting')->with('success', 'Tambah Rekening berhasil');
        } else {
            if (array_key_exists('message', $doPost->json())) {
                //                dd($doPost->json('message'));
                error($doPost->json('message')); // get message

                return redirect('budgeting')->withErrors($doPost->json('status'));
            }
            //            dd($doPost->body());
            return redirect('budgeting')->withErrors($doPost->json())->withInput();
        }
    }

    // Edit budgeting
    public function edit_budgeting(Request $request, $id)
    {
        $doPatch = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->patch(API_URL . '/user/budget-limit/' . $id, [
            "budget_name"         => $request->budget_name,
            "budget_description"  => $request->budget_description,
            "budget_limit_target" => $request->budget_limit_target,
        ]);

        if ($doPatch->successful()) {
            return view('budgeting')->with('success', 'Edit Rekening berhasil');
        } else {
            if (array_key_exists('message', $doPatch->json())) {
                //                dd($doPatch->json('message'));
                error($doPatch->json('message')); // get message

                return redirect('budgeting')->withErrors($doPatch->json('status'));
            }
            //            dd($doPatch->body());
            return redirect('budgeting')->withErrors($doPatch->json());
        }
    }

    // Delete budgeting
    public function delete_budgeting($id)
    {
        $doDelete = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->delete(API_URL . '/user/budget-limit/' . $id);

        if ($doDelete->successful()) {
            return redirect('budgeting')->with('success', 'Delete Rekening berhasil');
        } else {
            if (array_key_exists('message', $doDelete->json())) {
                //                dd($doDelete->json('message'));
                error($doDelete->json('message')); // get message

                // return error with status
                return redirect('budgeting')->withErrors($doDelete->json('status'));
            }
            return redirect('budgeting')->withErrors($doDelete->json());
        }
    }

    
}
