<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
	/**** First System of Session setup *****/
    public function set_session_1(Request $data){
       $data->session()->put('name','Rezwan');
       $data->session()->put('email','rezwanhossainsajeeb@gmail.com');
    }

    public function get_session_1(Request $data){
       echo $data->session()->get('name','default value');
       echo "<br>";
       echo $data->session()->get('email');
    }

    public function get_session_forget_1(Request $data){
       echo $data->session()->forget('email');        
    }
    
    public function mul_session_forget_1(){
      session::forget(['name','email']);
    }

    public function get_session_flush_1(Request $data){
       echo $data->session()->flush();   // Flush for all session data  
    }

    /**** Second System of Session Set ****/
    public function set_session_2(){
      session::put('phone','3409340340');
      session::put('class','11');
      session::put('name','Rezwan');
    }

    public function get_session_2(){
      return session::all();
    }

    public function get_session_forget_2(){
      session::forget('phone');
    }

    public function get_session_flush_2(){
      session::flush();
    }

    public function mul_session_forget_2(){
      session::forget(['phone','class']);
    }

    /*** Third system of set up ***/
    public function set_session_3(){
      session(['name'=>'Rezwan','email'=>'rezwanhossainsajeeb@gmail.com','phone'=>'343434343434']);
    }

    public function get_session_3(){
      return session::all();
    }

    public function get_session_forget_3(){
      session::forget(['name','email']);
    }

    public function get_session_flush_3(){
      session::flush();
    }
    
    /*** Set Message in session ***/
    public function set_message(){
    	Session::flash('message','You are successfully Loged In!');
    }

    public function get_message(){
    	return Session::get('message');
    }

    /*** Basic Test ***/
    public function condition_and_session(){
    	if(Session::has('name')){
    		Session::flash("messages","You are successfully Loged In! Your name : ".Session::get('name'));
    	}else{
    		echo "session not set";
    	}
    }


    public function get_con_message(){
    	return Session::get('messages');
    }
    
}
