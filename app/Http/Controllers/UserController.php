<?php

namespace App\Http\Controllers;
use App\Models\UserCourse;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Traits\ApiResponser;

Class UserController extends Controller {
    use ApiResponser;

    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }

    public function getUsers(){
        $users = User::all();
        return response()->json($users, 200);
    }
    public function index(){
        $users = User::all();
        return $this->successResponse($users);
    }
    
    public function add(Request $request ){
        
        $rules = [
            'Student_ID' => 'max:20',
            'Student_Name' => 'required|max:20',
            'CourseID' => 'required|numeric|min:1|not_in:0',
        ];
        
        $this->validate($request,$rules);
        $userjob = UserCourse::findOrFail($request->CourseID);
        $user = User::create($request->all());

        return $this->successResponse($user,Response::HTTP_CREATED);
    }

    public function show($Student_ID){

        $user = User::findOrFail($Student_ID);
        return $this->successResponse($user);
    }

    public function update(Request $request,$Student_ID){

        $rules = [
            'Student_ID' => 'max:20',
            'Student_Name' => 'max:20',
            'CourseID' => 'required|numeric|min:1|not_in:0',
        ];
    
        $this->validate($request, $rules);
        $userjob = UserCourse::findOrFail($request->CourseID);
        $user = User::findOrFail($Student_ID);
        $user->fill($request->all());
        
        if ($user->isClean()) {
            return $this->errorResponse('At least one value must
            change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        $user->save();
        return $this->successResponse($user);
    }

    public function delete($Student_ID){
        
        $user = User::findOrFail($Student_ID);
        $user->delete();
        
        return $this->successResponse($user);
    }
}