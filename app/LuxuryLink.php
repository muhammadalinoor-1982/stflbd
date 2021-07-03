<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuxuryLink extends Model
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
