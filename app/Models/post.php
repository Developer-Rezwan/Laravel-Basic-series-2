<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{       

        //protected $table = 'my_table';  // Table name change korle .. table name ta define kore dite hobe.. by default Model name er sathe s add hoye table name select hobe..

        protected $fillable = [
        'Title',
        'Description',
        'User_id',
        'Status'
    ];

    /** Jodi specific kono column bad dite chai..tahole ->

    protected $guarded = ['title']; likhte hobe..

   // protected $timestamp = false;  // Column hisabe bad dite chaile **/

    public function user_post(){
        return $this->belongsTo(User::class , 'User_id' , 'id');
    }
    
    public function tags(){
        return $this->belongsToMany(tag::class , 'pivot' , 'post_id','tag_id');
    }
}
