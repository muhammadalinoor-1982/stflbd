<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LuxuryProduct extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'luxury_id',
        'name',
        'description',
        'color',
        'size',
        'quantity',
        'regular_prise',
        'special_prise',
        'discount_prise',
        'bulk_prise',
        'production_lead_time',
        'delivery_lead_time',
        'image',
        'status',
        'creator',
        'updater',
    ];
    public function Luxury()
    {
        return $this->belongsTo(Luxury::class,'luxury_id','id');
    }
}
