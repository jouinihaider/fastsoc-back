<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'customers';
    protected $fillable = [
        'siren',
        'siret',
        'legal_name',
    ];

    /** ************************************************* Relations ************************************************ **/

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id', 'id');
    }
}
