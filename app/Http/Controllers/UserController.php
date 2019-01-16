<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $user;
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['index', 'create']]);
    }


    public function update(Request $request, $id)
    {
        $token = $request->bearerToken();
        JWTAuth::setToken($token);

        // TODO: Errors 
        // Tymon \ JWTAuth \ Exceptions \ TokenInvalidException
        // Tymon \ JWTAuth \ Exceptions \ TokenExpiredException
        // 
        $user = JWTAuth::toUser();
        if ($user->username != null) {
            // TODO:  Validation of form data
            // $this->validate($request, [
            //     'name' => 'required',
            //     'description' => 'nullable',
            //     'is_all_year' => 'boolean',
            //     'year_offered' => 'numeric|between:1,7',
            //     'semester_offered' => 'numeric|between:1,4',
            //     'program' => 'numeric|between:1,3'
            //     ]);
            // error_log(gettype($requestJ));
            // TODO: Check if user exists
            

            return response($user->jsonSerialize(), Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Need to login before creating']);
        }
    }

    
    public function destroy(Request $request, $id)
    {
        $token = $request->bearerToken();
        JWTAuth::setToken($token);

        // TODO: Errors 
        // Tymon \ JWTAuth \ Exceptions \ TokenInvalidException
        // Tymon \ JWTAuth \ Exceptions \ TokenExpiredException
        // 
        $user = JWTAuth::toUser();
        if ($user->username != null) {
            // TODO: Check if exists
            $user = User::find($id);
            $user->delete();

            return response(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Need to login before creating']);
        }
    }

    public function guard(){
        return \Auth::Guard('api');
    }
}
