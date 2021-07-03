<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agro extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'status',
        'creator_name',
        'updater_name',
    ];
}
