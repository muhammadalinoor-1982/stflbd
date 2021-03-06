<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Luxury extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'status',
        'creator',
        'updater',
    ];
}
