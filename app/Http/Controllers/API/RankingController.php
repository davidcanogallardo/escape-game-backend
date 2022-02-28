<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function getRanking() {
        $levels = DB::select("SELECT difficulty FROM `levels` GROUP BY difficulty; ");
        $ranking = [];
        foreach ($levels as $difficulty) {
            array_push($ranking, $this->getLevelData($difficulty));
        }
    }

    public function getLevelData($difficulty) {
        $rank = DB::select("SELECT (SELECT `name` FROM `users` WHERE `id` = owo.user) AS user, AVG(SELECT nChallenge FROM levels WHERE id = owo.level) AS avgTime FROM `games` AS owo WHERE `level` IN (SELECT `id` FROM `levels` WHERE `difficulty` = 'easy' ) GROUP BY user ORDER BY avgTime ASC LIMIT 10; ");
        DB::select("SELECT (SELECT `name` FROM `users` WHERE `id` = owo.user) AS user FROM `games` AS owo WHERE `level` IN (SELECT `id` FROM `levels` WHERE `difficulty` = 'easy' ) GROUP BY user LIMIT 10; ")
        // puntuacion final -> la media de todas las puntuaciones de un jugador en ese nivel
        // formula puntuacion -> (tiempo/4)*($numChallenge*16) redondeado xd
        // SELECT user, AVG(time) FROM `games` GROUP BY user ORDER BY AVG(time) ASC; 
        // $games = DB::select("SELECT * FROM `games` WHERE id = $id; ");
        // foreach ($games as $game) {
        //     array_push($ranking, $this->getLevelData($level->id, $level->challenges));
        // }

        /*
SELECT 
    (SELECT `name` FROM `users` WHERE `id` = owo.user) AS usuario, 
    ROUND((AVG(time)/4 * ((SELECT nChallenge FROM levels WHERE id = owo.level)*16)),0) AS avgTime
FROM `games` AS owo 
WHERE `level` IN 
    (SELECT `id` 
    FROM `levels` 
    WHERE `difficulty` = "easy"
    ) 
GROUP BY user
ORDER BY avgTime ASC
LIMIT 10;

        */
        //  generate data https://generatedata.com/generator
        return "aaa";
    }

}
