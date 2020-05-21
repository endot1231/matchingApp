<?php

namespace App\interfaces;

interface MusicTableInterFace
{
    public function regist(int $music_id,int $post_id,string $filePath);
    public function allCount():int;
}