<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'Company_name',
        'owner_speech',
        'History',
        'why_us',
        'status',
        'creator',
        'updater',
    ];
}
