<?php

namespace App\Http\Controllers;
use App\Models\User;
use Validator;
use DataTables;
use Hash;

use Yajra\DataTables\EloquentDataTable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $_userObj;
    public function __construct() {
        $this->_userObj = new User;
    }

    public function createUser(Request $request){
    	/*$validate = Validator::make($request->all(), [
            'txtUsername'			=> 'required',
            'txtPassword'		    => 'required',    
            'txtName'			    => 'required',
            'cmbRole'		    	=> 'required',    

        ]);
        if($validate->fails()){
        	return redirect()->back()->withErrors(['msg' => 'invalid input']);
        }*/

        $this->_userObj->email 		= $request->txtUsername;
        $this->_userObj->password 	= Hash::make($request->txtPassword);
        $this->_userObj->name 	 	= $request->txtName;
		$this->_userObj->role 		= $request->cmbRole;
        $this->_userObj->save();
        return redirect()->back();
    }

    public function userList(Request $request){
    	return DataTables::collection($this->_userObj::where("role", ">", "1")->get())->make(true);
	}


}
