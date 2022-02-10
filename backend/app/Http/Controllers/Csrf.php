<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Csrf extends Controller
{
    public function getCsrf() {
        return response(csrf_token());
    }
}
