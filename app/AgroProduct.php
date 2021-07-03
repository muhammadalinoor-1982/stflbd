<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgroProduct extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'agro_id',
        'name',
        'description',
        'color',
        'size',
        'quantity',
        'regular_prise',
        'special_prise',
        'discount_prise',
        'bulk_prise',
        'cultivation_time',
        'harvesting_time',
        'image',
        'status',
        'creator',
        'updater',
    ];
    public function Agro()
    {
        return $this->belongsTo(Agro::class,'agro_id','id');
    }
}
