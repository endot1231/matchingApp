<?php

namespace App\Repository;

use App\postsModel;
use App\interfaces\PostsTableInterFace;

class postsRepository implements PostsTableInterFace
{
    protected $posts;

    public function __construct(postsModel $posts)
    {
        $this->posts = $posts;
    }

    public function registPosts()
    {

    }

    public function getPosts(int $count)
    {
        $contents =$this->posts->orderBy('post_id','desc')->take(20)->get();
        return $contents;
    }

    public function getPostsById(int $post_id)
    {
        $content = $this->posts->where('post_id','=',$post_id)->first();
        return $content;
    }

    public function getPostsALL()
    {

    }
}
