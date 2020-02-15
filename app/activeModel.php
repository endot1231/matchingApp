<?php

namespace App;

use App\users;
use Illuminate\Database\Eloquent\Model;

class activeModel extends Model
{
    protected $table = 'active';
    protected $primaryKey = 'session_id';
    const UPDATED_AT = null;
    const CREATED_AT = null;

    public function user()
    {
        return $this->hasOne('App\users','user_id','user_id');
    }
}
