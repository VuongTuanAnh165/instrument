<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Model\Customertype;

class Customer extends Model
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

    /**
     * Get the user that owns the Landingpage.
     * 
     *  @return Relationships
     */
    public function customertype()
    {
        return $this->belongsTo(Customertype::class, 'customertype_id');
    }
}
