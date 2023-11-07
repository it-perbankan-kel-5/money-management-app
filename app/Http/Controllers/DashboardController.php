<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $token = session()->get('user_token');

        $data = Http::pool(function (Pool $pool) use ($token) {
            $pool->as('rekening_utama')
                ->withToken($token)
                ->get(API_URL . '/user/rekening/type/1');

            $pool->as('budget_analytic')
                ->withToken($token)
                ->get(API_URL . '/user/budget-analytic/');

            $pool->as('saving_plan')
                ->withToken($token)
                ->get(API_URL . '/user/saving-plan');

            $pool->as('income')
                ->withToken($token)
                ->get(API_URL . '/user/income/total/monthly');

            $pool->as('expense')
                ->withToken($token)
                ->get(API_URL . '/user/expense/total/monthly');

            $pool->as('analytic_income')
                ->withToken($token)
                ->get(API_URL . '/user/analytic/income/monthly');

            $pool->as('analytic_expense')
                ->withToken($token)
                ->get(API_URL . '/user/analytic/expense/monthly');

//            $pool->as('history')
//                ->withToken($token)
//                ->get('');
        });

        return view('dashboard')
            ->with('rekening', $data['rekening_utama']->json('data'))
            ->with('budget_analytic', $data['budget_analytic']->json(['data']))
            ->with('saving_plan', $data['saving_plan']->json('data'))
            ->with('income', $data['income']->json()[0]['total'])
            ->with('expense', $data['expense']->json()[0]['total'])
            ->with('analytic_income', $data['analytic_income']->json('data'))
            ->with('analytic_expense', $data['analytic_expense']->json('data'));

    }
}
