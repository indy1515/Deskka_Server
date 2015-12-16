<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class DeskController extends Controller {



	public function alldesk(){

		$alldesk = DB::select('select * from desk');
        //return $alldesk;

    $deskArray = array();
    foreach ($alldesk as $num) {
      $isdeskAvailable = $num->isAvailable == "1"?true:false;
      $test = [
      'id' => $num->id ,
      'name' => $num->name ,
      'user_id' => $num->user_id,
      'isAvailable' => $isdeskAvailable
    ];
   array_push($deskArray, $test);
  
  }
     return response()->json($deskArray);

    }

  public function updateDesk(Request $request,$id){
      $i = 0;
      if($request->has('name')){
        DB::table('desk')
                ->where('id', $id)
                ->update(['name' => $request->name]);
        $i++;
      }

      if($request->has('user_id')) {
        DB::table('desk')
                ->where('id', $id)
                ->update(['user_id' => $request->user_id]);
        $i++;
      }

      if ($request->has('isAvailable')) {
        DB::table('desk')
                ->where('id', $id)
                ->update(['isAvailable' => $request->isAvailable]);
        $i++;
      }
      if($i > 0){
        return response()->json(array('status'=>'Update Success'));
      }
      return response()->json(array('error'=>'Update Fail! Check Key',
        'count'=>$i));
  }

 	public function deskid(Request $request,$id){
// $request->has('option')
 		

    if($request->isMethod('get')){
    	$byid = DB::select('select * from desk where id =? ',[$id]);
    	$isDeskAvailable = $byid[0]->isAvailable == "1"?true:false;
    	$isDeskAvailableString = sprintf("%s",$isDeskAvailable);

    	$deskArray = [
    		'id' => $id,
    		'name' => $byid[0]->name ,
    		'user_id' => $byid[0]->user_id,
    		'isAvailable' => $isDeskAvailable
    	];

		  return response()->json($deskArray);
    }

    if($request->isMethod('post')){
      $i = 0;
      if($request->has('name')){
        DB::table('desk')
                ->where('id', $id)
                ->update(['name' => $request->name]);
        $i++;
      }

      if($request->has('user_id')) {
        DB::table('desk')
                ->where('id', $id)
                ->update(['user_id' => $request->user_id]);
        $i++;
      }

      if ($request->has('isAvailable')) {
        DB::table('desk')
                ->where('id', $id)
                ->update(['isAvailable' => $request->isAvailable]);
        $i++;
      }
      if($i > 0){
        return response()->json(array('status'=>'Success'));
      }
      return response()->json(array('error'=>'Error: key not match',
        'count'=>$i));

    }
 }

}