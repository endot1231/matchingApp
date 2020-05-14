<?php

namespace App\Repository;

use App\musicModel;
use App\interfaces\MusicTableInterFace;

class MusicRepository implements MusicTableInterFace
{
    protected $music;

    public function __construct(musicModel $music)
    {
        $this->music = $music;
    }

    public function regist(int $music_id,int $post_id,string $filePath)
    {
        $data['music_id'] = $music_id;
        $data['post_id'] = $post_id;
        $data['filepath'] = $filePath;

        $this->music->create();
    }  
}
