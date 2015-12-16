<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class FloorController extends Controller {

	public function allfloor()
	{
		$allfloor = DB::select('select * from floor');
		//return $allfloor;

		$floorArray = array();
   		foreach ($allfloor as $num) {
    	$isFloorAvailable = $num->isAvailable == "1"?true:false;
	    $test = [
			'id' => $num -> id,
			'name' => $num->name ,
			'isAvailable' => $isFloorAvailable
		];
		array_push($floorArray, $test);
	
		}
		return response()->json($floorArray);

 	}

 	public function allRoomInFloor(Request $request, $floor_id){
 		if($request->has('option')){
 			if($request->option == 'getRoomStat'){

 				// Query for room type = 1 'NOISE'
 				$noiseCount = DB::table('room')
	 				->join('floor','room.floor_id','=','floor.id')
	 				->where('floor.id',$floor_id)
	 				->where('roomType_id',1)
	 				->count();

 				// Query for room type = 2 'NOISELESS'

				$noiselessCount = DB::table('room')
	 				->join('floor','room.floor_id','=','floor.id')
	 				->where('floor.id',$floor_id)
	 				->where('roomType_id',2)
	 				->count(); 	

	 			$roomStat = array(
				'noise' => sprintf("%s",$noiseCount),
				'noiseless' => sprintf("%s",$noiselessCount));		

				return response()->json($roomStat);
	 		}
 		}

 		$allroom = DB::select('select * from room where floor_id = ?',[$floor_id]);
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

	// public function floorid($id)
	// {
	// 	$byid = DB::select('select * from floor where id =? ',[$id]);

 //        return $byid;
 //    }


    public function countDeskInFloor(Request $request, $floor_id){
		if($request->has('option') && $request->option == 'getFloorStat'){

			$numAvailable = DB::table('desk')
				->join('room', 'desk.room_id', '=', 'room.id')
				->join('floor', 'room.floor_id', '=', 'floor.id')
				->where('floor.id', $floor_id)
				->where('desk.isAvailable', 1)
				->count();
			$numUnavailable = DB::table('desk')
				->join('room', 'desk.room_id', '=', 'room.id')
				->join('floor', 'room.floor_id', '=', 'floor.id')
				->where('floor.id', $floor_id)
				->where('desk.isAvailable', 0)
				->count();


// 				SELECT COUNT(desk.*)
// FROM desk 
// INNER JOIN room 
// INNER JOIN floor
// WHERE floor.id = 1 AND room.floor_id = floor.id AND desk.room_id = room.id AND desk.isAvailable = 0;

			$floorName = DB::select('select * from floor where id =?', [$floor_id]);

			$floorAvailability = array(
				'available' => sprintf("%s",$numAvailable),
				'unavailable' => sprintf("%s",$numUnavailable));

			$isFloorAvailable = $floorName[0]->isAvailable == "1"?true:false;

			$floorArray = [
				'id' => $floor_id,
				'name' => $floorName[0]->name ,
				'isAvailable' => $isFloorAvailable,
				'deskAvailability' => $floorAvailability
			];
			return response()->json($floorArray);
		}

		else{
			$byid = DB::select('select * from floor where id =? ',[$floor_id]);
        	$isFloorAvailable = $byid[0]->isAvailable == "1"?true:false;
  			//$isDeskAvailableString = sprintf("%s",$isDeskAvailable);

			$floorArray = [
				'id' => $floor_id,
				'name' => $byid[0]->name ,
				'isAvailable' => $isFloorAvailable
			];
			return response()->json($floorArray);
		}
		
	

	}

}