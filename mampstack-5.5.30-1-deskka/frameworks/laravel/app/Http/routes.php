<?php

//Our Job
//floors
Route::get('/floors', 'FloorController@allfloor');
//Route::get('/floors/{id}', 'FloorController@floorid');
Route::get('/floors/{floor_id}', 'FloorController@countDeskInFloor');
Route::get('/floors/{floor_id}/rooms','FloorController@allRoomInFloor');
//post
//put
//delete 

//rooms
Route::get('/rooms', 'RoomController@allroom');
Route::get('/rooms/{id}', 'RoomController@roomid');
//post
//put
//delete 

//desk
Route::get('/desks', 'DeskController@alldesk');
Route::get('/desks/{id}', 'DeskController@deskid');
Route::post('/desks/{id}', 'DeskController@deskid');
Route::put('/desks/{id}', 'DeskController@updateDesk');
//Route::get('/update_desks', 'PagesController@updateDesk');
//post
//put
//delete

//user
Route::get('/users', 'UserController@alluser');

// /*
// |-------------------------------------------------------------------------|
// | GET ACTION  ------------------------------------------------------------|
// |-------------------------------------------------------------------------V
// */
// Route::get('/get_test', 'PagesController@getTest');
// Route::get('/get_desks', 'PagesController@getDesks');
// Route::get('/get_all', 'PagesController@getAll');

// Route::get('/', 'WelcomeController@index');
// Route::get('/about', 'PagesController@getTest');

// /*
// |-------------------------------------------------------------------------|
// | INSERT ACTION  ---------------------------------------------------------|
// |-------------------------------------------------------------------------V
// */
// Route::get('/insert_test', 'PagesController@pushTest');
// Route::get('/insert_desks', 'PagesController@pushDesks');


// /*
// |-------------------------------------------------------------------------|
// | UPDATE ACTION  ---------------------------------------------------------|
// |-------------------------------------------------------------------------V
// */
// Route::get('/update_test', 'PagesController@updateTable');



// |-------------------------------------------------------------------------|
// | DELETE ACTION  ---------------------------------------------------------|
// |-------------------------------------------------------------------------V

// Route::delete('/object/desks/{id}', 'PagesController@deleteDesk'); //edit me!

// /*
// |-------------------------------------------------------------------------|
// | POST ACTION  -----------------------------------------------------------|
// |-------------------------------------------------------------------------V
// */
// Route::post('/postman_indyza', 'PagesController@postmanIndyZa');
// Route::post('/postman_put', 'PagesController@postmanPut');


// /*
// |-------------------------------------------------------------------------|
// | ULTIMATE FUNCTION  -----------------------------------------------------|
// |-------------------------------------------------------------------------V
// */
// Route::get('/ultimate_function/{floor_id}', 'PagesController@countPercentageInFloor');
// Route::get('/count_desk_by_floor/{floor_id}', 'PagesController@countDeskInFloor');
// Route::get('/count_desk', 'PagesController@countDesk');
// //Route::get('/object/floor/{floor_id}', 'PagesController@countDeskInFloor');



// Route::get('/contact', 'WelcomeController@contact');
// Route::get('home', 'HomeController@index');
// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
