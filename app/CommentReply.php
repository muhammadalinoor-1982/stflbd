<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $fillable = [
        'comment',
    ];

    public function CustomerQuery()
    {
        return $this->belongsTo(CustomerQuery::class, 'customer_query_id','id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
