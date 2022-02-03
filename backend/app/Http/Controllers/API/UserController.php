<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends BaseController
{
    public function list() {
        $success['usuarios'] =  2;
        return $this->handleResponse($success, 'lista de usuarios');
    }
}
