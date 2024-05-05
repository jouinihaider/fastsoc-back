<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    /** ************************************************* Relations ************************************************ **/
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
