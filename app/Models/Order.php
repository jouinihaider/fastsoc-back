<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'offer_id',
    ];

    /** ************************************************* Relations ************************************************ **/

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function vendors()
    {
        return $this->belongsToMany(Vendor::class);
    }
}
