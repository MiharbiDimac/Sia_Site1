<?php
namespace App\Http\Controllers;
//use App\User;
use App\Models\UserCourse; // <-- your model is located inside Models Folder
use Illuminate\Http\Response; // Response Components
use App\Traits\ApiResponser; // <-- use to standardized our code for api response
use Illuminate\Http\Request; // <-- handling http request in lumen
use DB; // <-- if your not using lumen eloquent you can use DB component in lumen

Class UserCourseController extends Controller {
    
    // use to add your Traits ApiResponser
    use ApiResponser;
    private $request;
    public function __construct(Request $request){
        $this->request = $request;
    }
    
    /**
    * Return the list of usersjob
    * @return Illuminate\Http\Response
    */
    public function index(){
        $usercourse = UserCourse::all();
    return $this->successResponse($usercourse);
    }
    /**
    * Obtains and show one userjob
    * @return Illuminate\Http\Response
    */
    public function show($id){
        $usercourse = UserCourse::findOrFail($CourseID);
        
        return $this->successResponse($usercourse);
    }
}