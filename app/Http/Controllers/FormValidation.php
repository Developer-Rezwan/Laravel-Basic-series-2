<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class FormValidation extends Controller
{
    public function create(){
    	return view("me.form");
    }

    public function form_data(UserRequest $data){ // akhanei validate korte chaile "UserRequest" er jaygay "Request" dite hobe
    	//echo $data->path().'</br>'; //path selection korar jonno
    	//return $data->all();
    	//echo $data->email; // eta diyeo value gula dekha jay
    	// return $data->input('email');
    	// return $data->input('email','default@gmail.com');

    	//  $test = $data->validate([
        //     'username' => ['required','max:20','min:6'] ,
        //     'email' => 'email|required|string|max:30'
    	// ]);  validation er sob kaj 

    	return $data;
    }
}
