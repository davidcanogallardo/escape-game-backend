<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Level;

class GameController extends Controller
{
    public function getRandomMap($difficulty) {
       $maps = Level::inRandomOrder()->where("difficulty",$difficulty)->first();
       return $maps;
    }
}
