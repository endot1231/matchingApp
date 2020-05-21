<?php

namespace App\interfaces;

interface LyricsTableInterFace
{
    public function regist(int $lyrics_id,int $post_id,string $contents);
    public function allCount():int;
}