<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'name',
        'heading',
        'dialogue',
        'status',
        'creator',
        'updater',
    ];
}
