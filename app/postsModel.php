<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\musicModel;
use App\lyricsModel;
use App\users;

class postsModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $fillable = [ 'post_id', 'user_id', 'title','comment'];
    
    public function user()
    {
        return $this->belongsTo('App\users','user_id','user_id');
    }

    public function music()
    {
        return $this->hasOne('App\musicModel','post_id','post_id');
    }

    public function lyrics()
    {
        return $this->hasOne('App\lyricsModel','post_id','post_id');
    }
    
}