<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Customertype extends Model
{
    protected $guarded=[];

    /**
     * Get the user that owns the Landingpage.
     * 
     *  @return Relationships
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
