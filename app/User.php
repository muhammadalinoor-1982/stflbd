<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'custom_id',
        'name',
        'email',
        'user_phone',
        'user_nid',
        'user_address',
        'about_you',
        'nationality',
        'country',
        'image',
        'password',
        'verification_code',
        'business_type',
        'gender',
        'is_verified',
        'user_role',
        'creator',
        'updater',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->custom_id = IdGenerator::generate(['table' => 'users','field'=>'custom_id','length' => 10, 'prefix' =>'STFL-']);
        });
    }
    public function CustomerQuery()
    {
        return $this->hasMany(CustomerQuery::class);
    }
    public function CommentReply()
    {
        return $this->hasMany(CommentReply::class);
    }
}
