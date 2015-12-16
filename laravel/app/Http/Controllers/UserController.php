<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller {

	public function alluser(){
		$allUser = DB::select('select * from user');
        return $allUser;
 	}

}