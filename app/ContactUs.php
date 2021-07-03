<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'email',
        'phone',
        'address',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'youtube',
        'skype',
        'pinterest',
        'google_plus',
        'status',
        'creator',
        'updater',
    ];
}
