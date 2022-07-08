<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\User;

use Auth;
use DataTables;

class StudentController extends Controller
{
    protected $_userObj;
    protected $_subjectObj;
    protected $_gradeObj;

    public function __construct() {
        $this->_userObj = new User;
        $this->_subjectObj = new Subject;
        $this->_gradeObj = new Grade;

    }

    public function studentGradelist(){
    	return DataTables::of($this->_gradeObj::where("student_id", Auth::user()->id)->get())
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
