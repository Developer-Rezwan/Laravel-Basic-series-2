<?php

use Illuminate\Support\Facades\Route;
use App\Models\post;
use App\Models\User;
use App\Models\address;
use App\Models\tag;
use App\Middleware\TestMiddleware;
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

Route::get('one_to_one',function(){
  $data = User::find(2); // ekhane 2 find kora mane holo user table er 2 no. Id and address table er foreignkey
  echo $data->name . "<br>";
  echo $data->email  . "<br>";
  echo $data->address->City;
});

Route::get('one_to_one_inverse',function(){

  $data = address::find(1);
  echo $data ->City;
  echo $data ->user->name;
  
});

Route::get('one_to_many',function(){
  $data = User::find(1);
  foreach ($data->posts as $post) {
     echo $post->Title ."<br>";
  }

});

Route::get('one_to_many_inverse',function(){
  $data = post::find(1);
  echo 'This Post Author :' . ($data->user_post->name).'<br/>';
  echo 'This Post Author :' .($data->user_post->email).'<br/>';
  echo "Post : <br/>".$data->Title ;
});

Route::get('many_to_many',function(){
  $data = post::find(2);
  echo "Title : ".$data->Title ."<br/>" ;
    $tag = "Tag : ";
  foreach ($data->tags as  $value) {
    $tag .= $value->tag.",";
  }
  echo substr($tag, 0 , -1);

});

Route::get('many_to_many_inverse',function(){
  $data = tag::find(1);
  echo "Tag : ".$data->tag ."<br/>" ;
  $posts = "Your Posts : ";
  foreach ($data->posts as $key => $post) {
    $posts .= $post->Title . "<br>";
  }
  echo substr($posts, 0 , -1);
});

/**** pivot table job ***/

Route::get('attach_pivot_table',function(){
  $data = post::find(2);
  $data->tags()->attach([1,2,3]); // multiple tag add er jonno array akare number pass korate hobe...otherwise single dilei hobe
});

Route::get('dettach_all_pivot_table',function(){
   $data = post::findOrFail(2);
   $data->tags()->detach(); // detach all tag of a post.
});

Route::get('dettach_specific_pivot_table',function(){
   $data = post::findOrFail(2);
   $data->tags()->detach([3]); // detach specific tag.
});

Route::get('pivot_update_or_insert_or_delete',function(){
  $data = post::find(2);
  $data->tags()->sync([2,3,4]); // already thakle insert kicu korbe na . r na thakle update korbe.r specific tag rakhte chaile just number gula likhe dite hobe ..tahole new number gula add korbe r ager gula sob delete kore dibe..
});

/**** Start Blade From Here ****/
Route::get('home','App\Http\Controllers\TestBlade@home');
Route::get('about','App\Http\Controllers\TestBlade@about');

/*** Middleware  ***/
Route::get('test_middleware',function(){
   echo "My routework";
})->middleware('testmiddleware'); // Kernel.php te ai nam a save korte hoy

// group routing er arekta rule ase..
Route::middleware('testmiddleware')->group(function(){
  Route::get('group_middleware_test',function(){
    echo "done";
  });
});


// // array pass koreo deya jay group route make kora jay..

// Route::group(['middleware' => 'testmiddleware'],function(){
//   Route::get('group_middleware_test',function(){
//     echo "done";
//   });
// });

/****** Form Validation ********/
Route::get('user/create','App\Http\Controllers\FormValidation@create');
Route::post('user','App\Http\Controllers\FormValidation@form_data');

              /***** Session set up and login *****/

              /*** First System of Session Set ***/
Route::get('set_session_1','App\Http\Controllers\SessionController@set_session_1');
Route::get('get_session_1','App\Http\Controllers\SessionController@get_session_1');
Route::get('get_session_forget_1','App\Http\Controllers\SessionController@get_session_forget_1');
Route::get('get_session_flush_1','App\Http\Controllers\SessionController@get_session_flush_1');
Route::get('mul_session_forget_1','App\Http\Controllers\SessionController@mul_session_forget_1');

              /*** Second System of Session set ****/
Route::get('set_session_2','App\Http\Controllers\SessionController@set_session_2');
Route::get('get_session_2','App\Http\Controllers\SessionController@get_session_2');
Route::get('get_session_forget_2','App\Http\Controllers\SessionController@get_session_forget_2');
Route::get('get_session_flush_2','App\Http\Controllers\SessionController@get_session_flush_2');
Route::get('mul_session_forget_2','App\Http\Controllers\SessionController@mul_session_forget_2');

             /*** Third System of Session ***/
Route::get('set_session_3','App\Http\Controllers\SessionController@set_session_3');
Route::get('get_session_3','App\Http\Controllers\SessionController@get_session_3');
Route::get('get_session_forget_3','App\Http\Controllers\SessionController@get_session_forget_3');
Route::get('get_session_flush_3','App\Http\Controllers\SessionController@get_session_flush_3');

             /*** Show Message after Session Complete ***/
Route::get('set_message','App\Http\Controllers\SessionController@set_message');
Route::get('get_message','App\Http\Controllers\SessionController@get_message');

            /*** Show Message with condition ***/
Route::get('condition_and_session','App\Http\Controllers\SessionController@condition_and_session');
Route::get('get_con_message','App\Http\Controllers\SessionController@get_con_message');
