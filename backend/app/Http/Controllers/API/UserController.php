<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use App\Models\FriendResquests;
use App\Models\FriendList;
use Illuminate\Support\Facades\Validator;


class UserController extends BaseController
{
    public function list() {
        $success['usuarios'] =  2;
        return $this->handleResponse($success, 'lista de usuarios');
    }

    public function friendList() {
        $auth = Auth::id(); 

        $query = DB::select("SELECT id,name FROM `users` WHERE id in (SELECT friend2_id FROM `friend_lists` WHERE friend1_id = $auth union all SELECT friend1_id FROM `friend_lists` where friend2_id = $auth)");
        // $user = FriendList::find();
        // $uno = DB::table('friend_lists')->select('friend2_id as id')->where('friend1_id', 1);
        // $owo = DB::table('friend_lists')->select('friend1_id as id')->where('friend2_id', 1)->unionAll($uno)->get();
        // dd($owo);
        // $uwu = DB::raw("SELECT friend2_id FROM `friend_lists` WHERE friend1_id = 1 union all SELECT friend1_id FROM `friend_lists` where friend2_id = 1;");
        // $uwu = FriendList::where("friend1_id", '=', 1);
        // $uwu = FriendList::select('friend2_id')->whereRaw('friend1_id = 2')->get();
        $success['query'] =  $query;
        return $this->handleResponse($success, 'amigos');
    }

    public function sendRequest(Request $request) {
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
                // dd("existe");
            } else {
                dd("no existe");
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
}
