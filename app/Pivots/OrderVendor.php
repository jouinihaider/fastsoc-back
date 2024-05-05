<?php

namespace App\Pivots;


use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderVendor extends Pivot
{
    use HasFactory, SoftDeletes;

    /** ************************************************* Relations ************************************************ **/

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class,'vendor_id','id');
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
