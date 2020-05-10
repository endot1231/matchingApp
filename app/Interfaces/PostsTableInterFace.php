<?php

namespace App\interfaces;

interface PostsTableInterFace
{
    public function registPosts();
    public function getPosts(int $count);
    public function getPostsALL();
}