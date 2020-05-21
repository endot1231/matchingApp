<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class musicModel extends Model
{
    protected $table = 'music';
    const UPDATED_AT = null;
    const CREATED_AT = null;


    protected $fillable = [ 'music_id', 'post_id', 'filepath'];
}
