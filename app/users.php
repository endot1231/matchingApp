<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [ 'name', 'email', 'password',
    'email_verified', 'email_verify_token',];
}
