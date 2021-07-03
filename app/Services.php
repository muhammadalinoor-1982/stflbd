<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $fillable = [
        'service_name',
        'service_type',
        'product_type',
        'transport_type',
        'delivery_method',
        'payment_method',
        'bulk_supply',
        'status',
        'creator',
        'updater',
    ];
}
