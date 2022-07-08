<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Grade;
use Auth;
use Illuminate\Http\Request;
use DataTables;

class TeacherController extends Controller
{
    protected $_userObj;
    protected $_subjectObj;
    protected $_gradeObj;

    public function __construct() {
        $this->_userObj = new User;
        $this->_subjectObj = new Subject;
        $this->_gradeObj = new Grade;

    }

    public function index(Request $request){
    	$users 		= $this->_userObj::where("role","=","3")->get();
    	$subjects 	= $this->_subjectObj::get();

    	return view("teacher.dashboard")->with([
    		"users" 	=> $users,
    		"subjects"	=> $subjects,
    	]);
    }

    public function upsertGrade(Request $request){
    	$grade = $this->_gradeObj::updateOrCreate(
		    ['student_id' => $request->cmbStudentid, 'subject_id' => $request->cmbSubjectid],
		    ['grade' => $request->txtGrade, 'teacher_id' => Auth::user()->id]
		);
        return redirect()->back();
    }

    public function gradeList(Request $request){
    	return DataTables::of($this->_gradeObj::get())
    	->addColumn('studentname', function($row){
    		$studentName = $this->_userObj::where("id", $row->student_id)->first();
            return strtoupper($studentName->name);
        })
        ->addColumn('subjectname', function($row){
    		$subjectName = $this->_subjectObj::where("subject_id", $row->subject_id)->first();
            return strtoupper($subjectName->subject);
        })
        ->addColumn('teachername', function($row){
    		$teacherName = $this->_userObj::where("id", $row->teacher_id)->first();
            return strtoupper($teacherName->name);
        })
    	->make(true);
	}
}
