<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Validator;
use DataTables;
use Yajra\DataTables\EloquentDataTable;

use Illuminate\Http\Request;

class SubjectController extends Controller
{
	protected $_subjectObj;
    public function __construct() {
        $this->_subjectObj =  new Subject;
    }

    public function createSubject(Request $request){

    	/*$validate = Validator::make($request->all(), [
            'txtSubject'			    => 'required',
            'txtDescription'		    => 'required',      
        ]);
        if($validate->fails()){
            // echo "<script>alert('Invalid Input')</script>";
        	// return redirect("<script>alert('Invalid Input')</script>")->back();
        	return redirect()->back()->withErrors(['msg' => 'invalid input']);
        }*/

        $this->_subjectObj->subject 	 = $request->txtSubject;
        $this->_subjectObj->description = $request->txtDescription;
        $this->_subjectObj->save();
        return redirect()->back();
    }

    public function subjectList(Request $request){
    	return DataTables::collection($this->_subjectObj::get())->make(true);
	}
}
