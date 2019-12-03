<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Reserve extends Model
{
    public function user() 
    {
        return $this->belongsTo(User::class);  
    }

    public function flight(){
        return $this->belongsTo(flight::class);
    }
}