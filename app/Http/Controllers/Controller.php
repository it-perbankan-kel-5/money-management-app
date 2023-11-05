<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

define('API_URL', 'http://127.0.0.1:8000/api');

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
