<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BudgetingMail;

class BudgetingMailController extends Controller
{
    public function sendMail(){
        Mail::to('mulyanancr2@gmail.com')->send(new BudgetingMail());
        return view('emails.orders.saving_mail');
    }
}
