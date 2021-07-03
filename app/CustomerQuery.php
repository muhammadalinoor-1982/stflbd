<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomerQuery extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'query_type_id',
        'cust_query',
        'status',
        'creator',
        'updater',
    ];
    public function QueryType()
    {
        return $this->belongsTo(QueryType::class,'query_type_id','id');
    }
    public function User()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function CommentReply()
    {
        return $this->hasMany(CommentReply::class,'customer_query_id','id');
    }

}
