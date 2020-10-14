<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Http\Request;

class TestBlade extends Controller
{
    public function home(){
    	$this->data['my_data'] = User::all();
    	return view('me.home',$this->data);
    }    

    public function about(){
      return view('me.about');
    }

}
