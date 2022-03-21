<?php
   
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

   
class AuthController extends BaseController
{

    public function login(Request $request)
    {
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if(Auth::attempt([$fieldType => $request->email, 'password' => $request->password])){ 
            $auth = Auth::user(); 
            $id = Auth::id(); 
            $friendList = DB::select("SELECT id,name FROM `users` WHERE id in (SELECT friend2_id FROM `friend_lists` WHERE friend1_id = $id union all SELECT friend1_id FROM `friend_lists` where friend2_id = $id)");
            $friendrequests = DB::select("SELECT id, name FROM `users` WHERE id in (SELECT requester_id FROM `friend_resquests` WHERE addressee_id = $id); ");

            $success['name'] =  $auth->name;
            $success['friendlist'] =  $friendList;
            $success['photo'] =  Auth::user()->profile_photo; 
            $success['requests'] =  $friendrequests;
            $success['all'] =  $auth;
            $success['token'] =  $auth->createToken('LaravelSanctumAuth')->plainTextToken; 
   
            return $this->handleResponse($success, 'User logged-in!');
        } 
        else{ 
            return $this->handleError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
   
        if($validator->fails()){
            return $this->handleError($validator->errors());       
        }
   
        $input = $request->all();
        // $input->profile_photo = "{'icon':'user','iconColor':'grey','iconBG':'white'}";

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('LaravelSanctumAuth')->plainTextToken;
        $success['name'] =  $user->name;
   
        return $this->handleResponse($success, 'User successfully registered!');
    }
   
}