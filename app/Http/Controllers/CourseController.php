<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JWTAuth;
class CourseController extends Controller
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


    public function index(Request $request)
    {

        $token = $request->bearerToken();
        JWTAuth::setToken($token);
        // TODO: Errors 
        // Tymon \ JWTAuth \ Exceptions \ TokenInvalidException
        // Tymon \ JWTAuth \ Exceptions \ TokenExpiredException
        // 
        $user = JWTAuth::toUser();
        return response(Course::all()->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $token = $request->bearerToken();
        JWTAuth::setToken($token);
        // error_log("Authentication: bearer");    

        // TODO: Errors 
        // Tymon \ JWTAuth \ Exceptions \ TokenInvalidException
        // Tymon \ JWTAuth \ Exceptions \ TokenExpiredException
        // 
        $user = JWTAuth::toUser();
        if ($user->username != null) {
            // $this->validate($request, [
            //     'name' => 'required',
            //     'description' => 'nullable',
            //     'is_all_year' => 'boolean',
            //     'year_offered' => 'numeric|between:1,7',
            //     'semester_offered' => 'numeric|between:1,4',
            //     'program' => 'numeric|between:1,3'
            //     ]);
            // error_log(gettype($requestJ));
            $course = new Course();
            $course->name = $request->name;
            $course->description = $request->description;
            $course->is_all_year = $request->is_all_year;
            $course->year_offered = $request->year_offered;
            $course->semester_offered = $request->semester_offered;
            $course->program = $request->program;
            $course->created_by = $user->id;
            $course->save();

            return response($course->jsonSerialize(), Response::HTTP_CREATED);
        } else {
            return response()->json(['message' => 'Need to login before creating']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $token = $request->bearerToken();
        JWTAuth::setToken($token);
        // error_log("Authentication: bearer");    
        $user = JWTAuth::toUser();
        // TODO: Handle not found error
        return response(Course::find($id)->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
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
            // TODO: Check if course exists
            $course = Course::find($id);
            $course->name = $request->name;
            $course->description = $request->description;
            $course->is_all_year = $request->is_all_year;
            $course->year_offered = $request->year_offered;
            $course->semester_offered = $request->semester_offered;
            $course->program = $request->program;
            $course->created_by = $user->id;
            $course->save();

            return response($course->jsonSerialize(), Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Need to login before creating']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
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
            $course = Course::find($id);
            $course->delete();

            return response(['message' => 'Deleted successfully'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Need to login before creating']);
        }
    }

    public function guard(){
        return \Auth::Guard('api');
    }
}
