<?php

namespace App\interfaces;

interface CommentsTableInterFace
{
    public function registComment();
    public function getComments(int $post);
    public function getPostsALL();
}