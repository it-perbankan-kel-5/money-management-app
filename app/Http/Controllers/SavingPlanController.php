<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use function Laravel\Prompts\error;

class SavingPlanController extends Controller
{
    // Retrieve ALl User saving_plan
    // public function index()
    // {
    //     return view('savingplan');
    // }
    public function index()
    {
        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user/saving-plan');

        // dd($doRetrive);

        if ($doRetrive->successful()) {
            $data = $doRetrive->json('data');

            return view(
                'saving-plan.savingplan',
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

    // Create User saving_plan
    public function create_saving_plan()
    {
        // $doRetrive = Http::accept('application/json')
        //     ->withToken(session()->get('user_token'))
        //     ->get(API_URL . '/user/rekening/type/2');

        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user/rekening');

        if ($doRetrive->successful()) {
            $data = $doRetrive->json('data');

            return view(
                'saving-plan.create_savingplan',
                compact('data')
            );
        } else {
            if (array_key_exists('message', $doRetrive->json())) {
                //                dd($doDelete->json('message'));
                error($doRetrive->json('message')); // get message

                // return error with status
                return redirect('saving-plan')->withErrors($doRetrive->json('status'));
            }

            return redirect('saving-plan')->withErrors($doRetrive->json());
        }
    }

    // Add  User saving_plan
    public function store_saving_plan(Request $request)
    {
        $doPost = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->post(API_URL . '/user/saving-plan', [
                "rekening_id"           => $request->rekening_id,
                "saving_name"           => $request->saving_name,
                "saving_description"    => $request->saving_description,
                "saving_target_amount"  => $request->saving_target_amount,
                "saving_target_date"    => $request->saving_target_date,
                "reminder_date"         => $request->reminder_date,
            ]);
        // dd($doPost);
        if ($doPost->successful()) {
            return redirect('saving-plan')->with('success', 'Tambah Saving Plan berhasil');
        } else {
            if (array_key_exists('message', $doPost->json())) {
                //                dd($doPost->json('message'));
                error($doPost->json('message')); // get message

                return redirect('saving-plan/create')->withErrors($doPost->json('status'))->withInput();
            }

            //            dd($doPost->body());
            return redirect('saving-plan/create')->withErrors($doPost->json())->withInput();
        }
    }

    // Edit User saving_plan
    public function edit_saving_plan($id)
    {
        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user/saving-plan/' . $id);

        // dd($doRetrive);

        if ($doRetrive->successful()) {
            $data = $doRetrive->json('data');

            return view(
                'saving-plan.edit_savingplan',
                compact('data')
            );
        } else {
            if (array_key_exists('message', $doRetrive->json())) {
                //                dd($doDelete->json('message'));
                error($doRetrive->json('message')); // get message

                // return error with status
                return redirect('saving-plan')->withErrors($doRetrive->json('status'));
            }

            return redirect('saving-plan')->withErrors($doRetrive->json());
        }
    }

    // Update User saving_plan
    public function update_saving_plan(Request $request, $id)
    {
        $doPatch = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->patch(API_URL . '/user/saving-plan/' . $id, [
                "saving_name" => $request->saving_plan_description,
                "saving_description" => $request->saving_description,
                "saving_target_amount" => $request->saving_target_amount,
                "saving_target_date" => $request->saving_target_date,
            ]);

        if ($doPatch->successful()) {
            return redirect('saving-plan')->with('success', 'Edit saving_plan berhasil');
        } else {
            if (array_key_exists('message', $doPatch->json())) {
                //                dd($doPatch->json('message'));
                error($doPatch->json('message')); // get message

                return redirect('saving-plan/edit/{id}')->withErrors($doPatch->json('status'));
            }

            //            dd($doPatch->body());
            return redirect('saving-plan/edit/{id}')->withErrors($doPatch->json());
        }
    }

    public function add_amount_saving_plan(Request $request, $id)
    {
        $doPatch = Http::contentType('application/json')
        ->withToken(session()->get('user_token'))
        ->patch(API_URL . '/user/saving-plan/' . $id . '/add-money/', [
            "amount" => $request->input('amount'),
        ]);

        if ($doPatch->successful()) {
            return redirect('saving-plan')->with('success', 'Add Amount Success');
        } else {
            if (array_key_exists('message', $doPatch->json())) {
                //                dd($doPatch->json('message'));
                error($doPatch->json('message')); // get message

                return redirect('saving-plan')->withErrors($doPatch->json('status'));
            }

            //            dd($doPatch->body());
            return redirect('saving-plan')->withErrors($doPatch->json());
        }
    }

    // Delete User saving_plan
    public function delete_saving_plan($id)
    {
        $doDelete = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->delete(API_URL . '/user/saving-plan/' . $id);

        if ($doDelete->successful()) {
            return redirect('saving-plan')->with('success', $doDelete->json('status'));
        } else {
            if (array_key_exists('message', $doDelete->json())) {
                //                dd($doDelete->json('message'));
                error($doDelete->json('message')); // get message

                // return error with status
                return redirect('saving_plan')->withErrors($doDelete->json('status'));
            }

            return redirect('request-error')->withErrors($doDelete->json());
        }
    }
}
