<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\error;

class BudgetingController extends Controller
{
    public function index()
    {
        return view('budgeting');
    }

    public function add_budget(Request $request)
    {

        $doPost = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->post(API_URL . '/user/budget-limit', [
            "budget_limit_type_id"  => $request->budget_limit_type_id,
            "budget_name"         => $request->budget_name,
            "budget_description"  => $request->budget_description,
            "budget_limit_target" => $request->budget_limit_target,
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
            return redirect('budgeting')->withErrors($doPost->json());
        }
    }

    // Edit budgeting
    public function edit_budgeting(Request $request)
    {
        $doPatch = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->patch(API_URL . '/user/budget-limit/{budget_limit_id}', [
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
    public function delete_budgeting()
    {
        $doDelete = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->delete(API_URL . '/user/budget-limit/{budget_limit_id}');

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
