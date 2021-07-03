<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FashionProduct extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'fashion_id',
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
    public function Fashion()
    {
        return $this->belongsTo(Fashion::class,'fashion_id','id');
    }
}
