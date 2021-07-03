<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FashionLink extends Model
{
    protected $fillable = [
        'name',
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
