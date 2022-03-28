<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\FriendResquests;
use App\Models\FriendList;
use App\Models\Game;
use App\Models\ranking_alltime;
use App\Models\RankingAll;
use App\Models\RankingWeekly;
use App\Models\RankingDaily;
use Illuminate\Support\Facades\Validator;


class UserController extends BaseController
{

    public function getNotificationList() {
        $id = Auth::id();
        $query = DB::select("SELECT id, name, profile_photo FROM `users` WHERE id in (SELECT requester_id FROM `friend_resquests` WHERE addressee_id = $id); ");
        foreach ($query as &$row) {
            $row->profile_photo = json_decode($row->profile_photo);
        }
        $success['requests'] = $query;
        return $this->handleResponse($success, 'lista de peticiones amistad');
    }

    public function getFriendList() {
        $auth = Auth::id(); 

        $query = DB::select("SELECT id,name,profile_photo FROM `users` WHERE id in (SELECT friend2_id FROM `friend_lists` WHERE friend1_id = $auth union all SELECT friend1_id FROM `friend_lists` where friend2_id = $auth)");
        foreach ($query as &$row) {
            $row->profile_photo = json_decode($row->profile_photo);
        }
        $success['query'] =  $query;
        return $this->handleResponse($success, 'amigos');
    }

    public function sendFriendRequest(Request $request) {
        if (isset($request->all()["addressee_name"])) {
            $addressee_name = $request->all()['addressee_name'];
            $addressee_id = DB::select("SELECT id FROM `users` WHERE `name` = '$addressee_name';");

            if (isset($addressee_id[0]->id)) {
                $requester_id = Auth::id();
                $addressee_id = $addressee_id[0]->id;

                $fr = FriendResquests::create([
                    "requester_id" => $requester_id, 
                    "addressee_id" => $addressee_id
                ]);
                return $this->handleResponse([], 'Solicitud enviada');
                // dd("existe");
            } else {
                // dd("no existe");
                return $this->handleError('No existe el usuario', ['error'=>'Id incorrecto']);
            }


            // $requester = Auth::id();
            
            // if (!is_null(User::find($request->all()["addressee_name"]))) {
            //     $addressee = $request->all()["addressee_name"];
            //     $fr = FriendResquests::create([
            //         "requester_id" => $requester, 
            //         "addressee_id" => $addressee
            //     ]);
            //     dd("3");
            // } else {
            //     return $this->handleError('No existe el usuario', ['error'=>'Id incorrecto']);
            // }
        } else {
            return $this->handleError('No se ha enviado el id del amigo', ['error'=>'Id no enviado']);
        }
    }

    public function handleFriendRequest($friend, $response) {
        $id = Auth::id();
        $friendId = DB::select("SELECT id FROM `users` WHERE `name` = '$friend';");
        $friendId = $friendId[0]->id;
        
        if ($response == "true") {
            DB::insert("INSERT INTO `friend_lists` (friend1_id, friend2_id) VALUES ($id, $friendId); ");
        }
        DB::delete("DELETE FROM `friend_resquests` WHERE requester_id = $friendId and addressee_id = $id; ");
        return $this->handleResponse([], 'Solicitud aceptada/rechazada');
    }

    public function updatePhoto(Request $request) {
        $user = Auth::user();
        $user->profile_photo = $request->all()['photo'];
        $user->save();
        return $this->handleResponse([], 'Foto actualizada');
    }

    public function addGame($level, $time) {
        $id = Auth::id();
        $difficulty = DB::table('levels')->where('id',$level)->value('difficulty');
        $nChallenges = DB::table('levels')->where('id',$level)->value('nChallenge');

        //Compruebo si el usuario no tiene una puntuación en esa dificultad en la table de ranking all
        if (empty(DB::select("SELECT * FROM ranking_alls WHERE user = $id AND difficulty = '$difficulty'"))) {
            $score = calcPoints($time,$nChallenges);
            $game = [
                'user' => $id,
                'difficulty' => $difficulty,
                'nGames' => 1,
                'avgScore' => $score
            ];

            // Creo una entrada en todas las tablas de ranking
            RankingAll::create($game);
            RankingDaily::create($game);
            RankingWeekly::create($game);
            return 1;

            $success['score'] =  $score;
            return $this->handleResponse($success, 'puntuación guardada');
        } else {
            // Calculo la puntuación de la partida que acaba de jugar el usuario
            $score = calcPoints($time,$nChallenges);

            $all = new RankingAll();
            $week = new RankingWeekly();
            $daily = new RankingDaily();

            //Itero por cada tabla/modelo para actualizar la puntuación (esta es la unica manera que he encontrado para hacerlo)
            foreach ([$all, $week, $daily] as $model) {
                //Busco la fila en la tabla/model de ese usuario con la dificultad de la partida que ha jugado
                $row = $model->where('user', $id)->where('difficulty', $difficulty)->get();
                $row = $row->all()[0];

                // Actualizo la media de puntuación
                $avgScore = round((($row->avgScore*$row->nGames)+$score)/($row->nGames+1),0);
                $row->avgScore = $avgScore;
                $row->nGames += 1;
    
                $row->save();
            }
            $success['avgScore'] =  $avgScore;
            $success['score'] =  $score;
            return $this->handleResponse($success, 'puntuación guardada');
        }
    }

    //Funcion para obtener la informacion de un usuario.
    public function getUserInfo($id){
        $user = DB::select("SELECT id,name, profile_photo FROM `users` WHERE `id` = '$id';");
        $success['requests'] = $user;
        return $this->handleResponse($success, 'Información del usuario');
    }

    public function getUserHistory($name){
        $history = DB::select("SELECT id, user, level, time FROM `games` where `user` = '$name';");
        $success['requests'] = $history;
        return $this->handleResponse($success, 'Historial del usuario');
    }

    function calcPoints($time, $nChallenges){
        return round(($time/4)*($nChallenges*16),0);
    }
}
