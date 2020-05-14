<?php

namespace App\interfaces;

interface PostsTableInterFace
{
    public function regist(int $post_id,int $user_id,string $title,string $comment,File $request_File);
    public function getPosts(int $count,int $skip);
    public function getPostsByPost_Id(int $post_id);
    public function getPostsByUser_Id(int $user_id);
}