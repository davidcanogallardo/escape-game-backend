<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function getMap() {
        // return 
 
        // return DB::raw("SELECT user, avgScore AS score FROM `ranking_alls` AS owo WHERE difficulty = 'easy' ORDER BY avgScore DESC LIMIT 10; ")->get();
        // return RankingAll::where("difficulty", "easy")->select("avgScore","user","nGames")->take(5)->with(['users:id,name'])->get()->makeHidden("user", "name");
        $levels = ["easy", "medium", "hard"];
        $ranking = [];
        foreach ($levels as $difficulty) {
            $ranking[$difficulty] = $this->getLevelData($difficulty);
        }
        $success['ranking'] =  $ranking;
        // return $this->handleResponse($success, 'devuelvo ranking');
        return $id;
    }
}
