<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = 'address';
    protected $fillable = ['User_id','State','City','Country'];
}
