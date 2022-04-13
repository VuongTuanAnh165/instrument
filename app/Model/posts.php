<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\user;
class posts extends Model
{
    //
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }    
}
