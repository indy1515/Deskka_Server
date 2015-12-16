<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class PagesController extends Controller {

	//

	public function about(){

		return 'my name is term';
	}

	public function getTest(){
		$tests = DB::select('select username from test');

		return view('pages.about', ['tests' => $tests]);

	}

	public function getDesks(){
		$desks = DB::select('select id from desks');

		return view('pages.desks_show', ['desks' => $desks]);

	}

	public function pushTest(){

		DB::insert('insert into test (username) values (?)', ['heartnetkung']);

		return 'insert into test complete';

	}

	public function pushDesks(){

		DB::insert('insert into desks (id, deskNum, room_id, user_id, status_id) values (?, ?, ?, ?, ?)', [2, 67, 3, 1101700, 1]);

		return 'insert into desks complete';
	}

	public function updateTable(){

		DB::table('test')
            ->where('username', 'termthanachote')
            ->update(['username' => 'paparazzo']);

        return 'update tests complete';
	}

	public function updateDemo(){

		DB::table('test')
            ->where('username', 'termthanachote')
            ->update(['username' => 'paparazzo']);

        return 'update tests complete';
	}



	public function updateDesk(){

		DB::table('desks')
            ->where('id', 1)
            ->update(['user_id' => 'termthanachote']);

        return 'update desks complete';
	}

	public function postmanIndyZa(Request $request){
		//$name = Input::get('name', 'USERNAME NOT FOUND FUCK');
		//return $name;
		$id = $request->input('id');
		$tests = DB::select('select username from test where id=?', [$id]);
		return $tests;
	}

	public function postmanPut(Request $request){
		//$name = Input::get('name', 'USERNAME NOT FOUND FUCK');
		//return $name;
		$username = $request->input('username');
		DB::insert('insert into test (username) values (?)', [$username]);
		$tests = DB::select('select username from test');

		return view('pages.about', ['tests' => $tests]);
	}

	/*
	|-------------------------------------------------------------------------|
	| DESK ORIENTED  ---------------------------------------------------------|
	|-------------------------------------------------------------------------V
	*/

	public function deleteDesk($id){
		//delete desk from desk_id
		DB::table('desk')
			->where('id', $id)
			->delete();
		return "Delete Complete";
	}

	public function postDesk(Request $request, $id){
		//insert desk from desk_id
		if ($request->has('name')) {
			$name = $request->input('name');
    		DB::table('desk')
            ->update(['name' => $name]);

        	return 'update tests complete';
		}
		else if ($request->has('user_id')) {
    		$user_id = $request->input('user_id');
    		DB::table('desk')
            ->update(['user_id' => $user_id]);

        	return 'update tests complete';
		}
		else if ($request->has('isAvailable')) {
    		$isAvailable = $request->input('isAvailable');
    		DB::table('desk')
            ->update(['isAvailable' => $isAvailable]);

        	return 'update tests complete';
		}
		else{
			return "Fields are empty. Do nothing.";
		}
	}

	// public function countDeskInFloor($floor_id){
	// 	return DB::table('desk')
	// 	->join('room')
	// 	->join('floor')
	// 	->where('room.floor_id', $floor_id)
	// 	->where('desk.room_id', 'room_id')
	// 	->count();
	// }

	// public function countDeskInFloorAvailable($floor_id){
	// 	return DB::table('desk')
	// 	->join('room')
	// 	->join('floor')
	// 	->where('room.floor_id', $floor_id)
	// 	->where('desk.room_id', 'room_id')
	// 	->where('isAvailable' , 1)
	// 	->count();
	// }

	// public function countPercentageInFloor($floor_id){
	// 	$all = DB::table('desk')
	// 	->join('room', 'desk')
	// 	->join('floor', 'desk')
	// 	->where('room.floor_id', $floor_id)
	// 	->where('desk.room_id', 'room_id')
	// 	->count();
	// 	$free = DB::table('desk')
	// 	->join('room', 'desk')
	// 	->join('floor', 'desk')
	// 	->where('room.floor_id', $floor_id)
	// 	->where('desk.room_id', 'room_id')
	// 	->where('isAvailable' , 1)
	// 	->count();
	// 	return response()->json(['all' => $all, 'free' => $free]);
	// }

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

	}
		

	// public function countDesk(){
	// 	$num = DB::table('desk')
	// 		->count();
	// 	return $num;
	// }



}
