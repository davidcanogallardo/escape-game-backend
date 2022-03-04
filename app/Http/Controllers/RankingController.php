<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\RankingAll;
use App\Models\RankingWeekly;
use App\Models\RankingDaily;

class RankingController extends Controller
{
    public function getRanking() {
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
        return $ranking;
    }

    public function getLevelData($difficulty) {
        $rankings = [];
        
        foreach (["ranking_alls", "ranking_weeklies", "ranking_dailies"] as $table) {
            // $rank = DB::table("SELECT user, avgScore AS score FROM `$table` AS owo WHERE difficulty = '$difficulty' ORDER BY avgScore DESC LIMIT 10; ");
            $rank = DB::table($table)
                ->join('users', 'users.id', $table.'.user')
                ->select($table.'.avgScore', 'users.name',$table.".user", $table.".nGames")->where($table.".difficulty", $difficulty)
                ->orderBy("avgScore", "DESC")
                ->take(5)
                ->get();
            // $rank = RankingAll::where("difficulty", "easy")->select("avgScore AS score","user")->take(5)->with(['users:id,name'])->orderBy("avgScore", "DESC")->get()->makeHidden("user");
            $rankings[$table] = $rank;
        }
        return $rankings;
    }

}
