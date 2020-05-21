<?php

namespace App\Repository;

use App\lyricsModel;
use App\interfaces\LyricsTableInterFace;

class LyricsRepository implements LyricsTableInterFace
{
    protected $lyrics;

    public function __construct(lyricsModel $lyrics)
    {
        $this->lyrics = $lyrics;
    }

    public function regist(int $lyrics_id,int $post_id,string $contents)
    {
        $data['lyrics_id'] = $lyrics_id;
        $data['post_id'] = $post_id;
        $data['contents'] = $contents;

        $this->lyrics->create($data);
    }
    
    public function allCount():int
    {
        return $this->lyrics::all()->Count();
    }
}
