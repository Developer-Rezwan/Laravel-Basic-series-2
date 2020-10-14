<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = 'address';
    protected $fillable = ['User_id','State','City','Country'] ;

    public function user()
    {
    	return $this->belongsTo(User::class,'User_id','id' ); //(User::class,'user_id','id') akhane jodi forieng_key er nam ta table name er sathe mil thake tahole emnitei kaj korbe . (like table name user and forieng_key holo.... user_id ....tai kaj korece )... first a foreign_key and then primary key likhe dite hobe jodi kaj na kore..
    }
}

