<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class RoomController extends Controller {

 public function allroom()
 {
    $allroom = DB::select('select * from room');
     //   return $allroom;


    $roomArray = array();
    foreach ($allroom as $num) {
    	$isRoomAvailable = $num->isAvailable == "1"?true:false;
	    $test = [
			'id' => $num->id ,
			'name' => $num->name ,
			'isAvailable' => $isRoomAvailable,
			'floor_id' => $num->floor_id ,
			'roomType_id' => $num->roomType_id
		];
	array_push($roomArray, $test);
	
	}
	return response()->json($roomArray);

 }

 	public function roomid($id)
 	{
 		$byid = DB::select('select * from room where id =? ',[$id]);
  		$isRoomAvailable = $byid[0]->isAvailable == "1"?true:false;
  		//$isDeskAvailableString = sprintf("%s",$isDeskAvailable);

		$roomArray = [
			'id' => $id,
			'name' => $byid[0]->name ,
			'isAvailable' => $isRoomAvailable,
			'floor_id' => $byid[0]->floor_id ,
			'roomType_id' => $byid[0]->roomType_id
		];
		return response()->json($roomArray);
 	}

}