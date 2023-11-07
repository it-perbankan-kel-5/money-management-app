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
        return view('saving-plan.create_savingplan');
    }

    // Add  User saving_plan
    public function store_saving_plan(Request $request)
    {
        $doPost = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->post(API_URL . '/user/saving-plan', [
                "saving_name"           => $request->saving_name,
                "saving_description"    => $request->saving_description,
                "saving_target_amount"  => $request->saving_target_amount,
                "saving_target_date"    => $request->saving_target_date,
            ]);

        if ($doPost->successful()) {
            return redirect('saving-plan')->with('success', 'Tambah Saving Plan berhasil');
        } else {
            if (array_key_exists('message', $doPost->json())) {
                //                dd($doPost->json('message'));
                error($doPost->json('message')); // get message

                return redirect('saving-plan')->withErrors($doPost->json('status'));
            }

            //            dd($doPost->body());
            return redirect('saving-plan')->withErrors($doPost->json());
        }
    }

    // Edit User saving_plan
    public function edit_saving_plan($id)
    {
        $doRetrive = Http::accept('application/json')
            ->withToken(session()->get('user_token'))
            ->get(API_URL . '/user/saving-plan/' . $id);

        if ($doRetrive->successful()) {
            $data = $doRetrive->json('data');

            // dd($doRetrive->json('data'));
            // dd($doRetrive->body());
            // dd($data);

            return view('edit_savingplan', compact('data'));

            dd($data);
        } else {
            if (array_key_exists('message', $doRetrive->json())) {
                //                dd($doDelete->json('message'));
                error($doRetrive->json('message')); // get message

                // return error with status
                return redirect('saving_plan')->withErrors($doRetrive->json('status'));
            }

            return redirect('saving_plan')->withErrors($doRetrive->json());
        }
    }

    // Update User saving_plan
    public function update_saving_plan(Request $request, $id)
    {
        $doPatch = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->patch(API_URL . '/user/saving_plan/' . $id, [
                "saving_plan_description" => $request->saving_plan_description,
                "saving_plan_alias" => $request->saving_plan_alias,
            ]);

        if ($doPatch->successful()) {
            return redirect('saving_plan')->with('success', 'Edit saving_plan berhasil');
        } else {
            if (array_key_exists('message', $doPatch->json())) {
                //                dd($doPatch->json('message'));
                error($doPatch->json('message')); // get message

                return redirect('saving_plan')->withErrors($doPatch->json('status'));
            }

            //            dd($doPatch->body());
            return redirect('saving_plan')->withErrors($doPatch->json());
        }
    }

    // Delete User saving_plan
    public function delete_saving_planByid($id)
    {
        $doDelete = Http::contentType('application/json')
            ->withToken(session()->get('user_token'))
            ->delete(API_URL . '/user/saving_plan/' . $id);

        if ($doDelete->successful()) {
            return redirect('saving_plan')->with('success', 'Delete saving_plan berhasil');
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
