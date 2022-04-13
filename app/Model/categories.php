<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use APP\Model\products;
use APP\Model\producttypes;
class categories extends Model
{
    //
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function producttypes()
    {
        return $this->hasMany(producttypes::class, 'id');
    }

}
