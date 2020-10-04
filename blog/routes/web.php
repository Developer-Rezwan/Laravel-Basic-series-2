<?php

use Illuminate\Support\Facades\Route;
use App\Models\post;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/***************** DB Crude System **********************************/

Route::get('/table_all_row','App\Http\Controllers\CrudeController@get_all_data'); // all information from a table..
Route::get('/table_first_row','App\Http\Controllers\CrudeController@get_single_data'); //a single and first information from a table
Route::get('/table_specific_data' , 'App\Http\Controllers\CrudeController@get_specific_data'); // a specific data from table
Route::get('/find_data_by_only_id','App\Http\Controllers\CrudeController@only_find_by_id');
Route::get('/column_list','App\Http\Controllers\CrudeController@specific_column_data_list');
Route::get('count_table_row','App\Http\Controllers\CrudeController@count_table_row');
Route::get('total_amount','App\Http\Controllers\CrudeController@total_amount');
Route::get('maximum_amount','App\Http\Controllers\CrudeController@maximum_amount');
Route::get('avarage_amount','App\Http\Controllers\CrudeController@avarage_amount');
Route::get('needed_table_data','App\Http\Controllers\CrudeController@needed_table_data');
Route::get('inner_join_table' , 'App\Http\Controllers\CrudeController@inner_join_table');
Route::get('left_join_table' , 'App\Http\Controllers\CrudeController@left_join_table');
Route::get('right_join_table' , 'App\Http\Controllers\CrudeController@right_join_table');
Route::get('full_outer_join_table' , 'App\Http\Controllers\CrudeController@full_outer_join_table');
Route::get('use_of_where' , 'App\Http\Controllers\CrudeController@use_of_where');
Route::get('search_by_where' , 'App\Http\Controllers\CrudeController@search_by_where');
Route::get('multiple_condition' , 'App\Http\Controllers\CrudeController@multiple_condition');

Route::get('multiple_data_select_Between' , 'App\Http\Controllers\CrudeController@multiple_data_select_Between');

Route::get('multiple_data_select_Not_Between' , 'App\Http\Controllers\CrudeController@multiple_data_select_Not_Between');

Route::get('multiple_data_select_condition' , 'App\Http\Controllers\CrudeController@multiple_data_select_condition');

Route::get('multiple_data_select_In' , 'App\Http\Controllers\CrudeController@multiple_data_select_In');
Route::get('multiple_data_select_Not_In' , 'App\Http\Controllers\CrudeController@multiple_data_select_Not_In');

Route::get('multiple_data_select_Null' , 'App\Http\Controllers\CrudeController@multiple_data_select_Null');

Route::get('multiple_data_select_Not_Null' , 'App\Http\Controllers\CrudeController@multiple_data_select_Not_Null');

Route::get('data_select_Order_By_DESC' , 'App\Http\Controllers\CrudeController@data_select_Order_By_DESC');

Route::get('data_select_Order_By_ASC' , 'App\Http\Controllers\CrudeController@data_select_Order_By_ASC');

Route::get('data_select_Order_By_LIMIT' , 'App\Http\Controllers\CrudeController@data_select_Order_By_LIMIT');

Route::get('Use_of_chunk' , 'App\Http\Controllers\CrudeController@Use_of_chunk');
Route::get('data_insert' , 'App\Http\Controllers\CrudeController@data_insert');
Route::get('multiple_data_insert' , 'App\Http\Controllers\CrudeController@multiple_data_insert');
Route::get('data_update' , 'App\Http\Controllers\CrudeController@data_update');
Route::get('data_update_or_insert' , 'App\Http\Controllers\CrudeController@data_update_or_insert');
Route::get('data_delete' , 'App\Http\Controllers\CrudeController@data_delete');

/************************* MODEL WITH MIGRATION PRACTICE (Objective Relational Mapping) ********************************/

Route::get('orm_data_insert',function(){
	$data =[
       'Title' => 'Welcome to model controller',
       'Description' => 'loremslds kjs ada ds dsd ajsdlsdjlsd sdj sdljs dljdfsjfasj ',
       'User_id' => 1,
       'Status' => 1
	];
	App\Models\post::create($data); /**insert use korle updated_at/create_at time gula add hobe na .... Tai ata use korbo na .... R model a giye $fillable make kore nite hobe..Na hole kaj korbe na. ****/
});

Route::get('orm_data_insert_alternative',function(){
	$data = new post();
	$data->Title = 'This is Title';
	$data->Description = 'This is Description';
	$data->Status = 1;
	$data->User_id = 1;
    $data->save();

});

Route::get('find_data/{id}',function($id){
	$data = post::findOrFail($id)->Title;
	dd($data);
});

Route::get('find_data_by_condition',function(){
	$data = post::where('status','1')->firstOrFail();
	dd($data);
});

Route::get('orm_data_update',function(){
   $data = post::find(7);
   $data->Title = "This is updated data";
   $data->update();
});

Route::get('orm_data_firstOrCreate',function(){
    $data = post::firstOrCreate([
    	'Title'=>'This firstOrCreate Title',
    	'Description'=>'This is firstOrCreate Description',
    	'User_id' => 2,
    	'Status' => 1
     ]);
    $data->Description = 'This is updated firstOrCreate Description'; //save() na dileo function kaj korbe but update hobe na.... R save dile update kora jabe...kajer khetre ata diya kaj kora subidha jonok hobe...
    $data->save(); 
    dd($data);
});

Route::get('orm_data_firstOrNew',function(){
    $data = post::firstOrCreate([
    	'Title'=>'This firstOrNew Title',
    	'Description'=>'This is firstOrNew Description',
    	'User_id' => 2,
    	'Status' => 1
     ]);
    $data->Status = 0; // update korte hole array er baire value asign kore dite hobe..
    $data->save(); // save function call na korle kaj korbe na..
});

Route::get('orm_data_delete/{id}',function($id){
	$data = post::findOrFail($id);
	$data->delete();
});

Route::get('mul_orm_data_delete',function(){
   post::destroy([8,9,10]);
});

Route::get('con_orm_data_delete',function(){
   $data = post::where('status','0');
   $data->delete();
});

/************** Eloquent Reletionships ***************/

Route::get('one-to-one',function(){
  $data = User::find(1);
  dd($data->address);
});