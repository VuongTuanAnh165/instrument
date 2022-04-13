<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use APP\Model\categories;
use APP\Model\producttypes;
class products extends Model
{
    
    //
   
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }

    public function product_types()
    {
        return $this->belongsTo(producttypes::class, 'producttypes_id');
    }
}
