<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\level;

class GameController extends Controller
{
    public function getRandomMap($difficulty) {
        $id = DB::table("levels")
        ->where("levels.difficulty",$difficulty)
        ->get();
       $maps = $id;
       return $maps;
    }
}
