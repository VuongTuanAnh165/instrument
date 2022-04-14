<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
use APP\Model\categories;
class producttype extends Model
{
    //
    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }
}
