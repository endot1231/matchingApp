<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\users;

class commentsModel extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'comment_id';
    const UPDATED_AT = null;
    const CREATED_AT = null;


    public function user()
    {
        return $this->belongsTo('App\users','user_id','user_id');
    }
}
