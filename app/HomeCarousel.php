<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeCarousel extends Model
{
    protected $fillable = [
        'name',
        'tag',
        'heading',
        'description',
        'link',
        'image',
        'event',
        'status',
        'creator',
        'updater',
    ];
}
