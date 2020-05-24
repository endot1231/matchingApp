<?php

namespace App\interfaces;

interface CommentsTableInterFace
{
    public function regist(int $comment_id,int $post_id,int $user_id,string $contents);
    public function getComments(int $post_id);   
    public function allCount():int;
}