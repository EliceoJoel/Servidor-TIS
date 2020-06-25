<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
//use JWTAuth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;


class UserController extends Controller
{
    public function getStudentsScores(){
        $students = DB::select('
        select "postulantEnable".id, "postulantEnable".name, "postulantEnable".auxiliary, "postulantEnable".announcement,
        "postulantEnable".enable, "postulant_scores".score, "postulant_scores".score_oral
        from public."postulantEnable" , public."postulant_scores"
        where "postulantEnable".id = "postulant_scores".id_postulant and enable = true
        ');
        return $students;
    }

    public function updateScore($id){
        $results = DB::update('
        update "postulant_scores" 
        set score=? , score_oral=? 
        where id_postulant = ?', 
        [22,45,2]);
        return $id;
    }

    public function register(Request $request)
    {
        $user = User::create([
            'fullname' => $request->json()->get('fullname'),
            'user' => $request->json()->get('user'),
            'password' => Hash::make($request->json()->get('password')),
            'idRol'=> $request->json()->get('idRol'),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }
    
    public function login(Request $request)
    {
        $credentials = $request->only('user', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json( compact('token') );
    }

    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(compact('user'));
    }

    public function getUsers()
    {
        $User = User::all();
        return $User;
    }

}
