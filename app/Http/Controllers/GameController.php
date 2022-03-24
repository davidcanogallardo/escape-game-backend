<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\level;

class GameController extends Controller
{
    public function getMaps($diff) {
        $id = DB::table("levels")
        ->select('id')
        ->where("levels.difficulty",$diff)
        ->get();
       $ids = $id;
       return $ids;
    }
}
