<?php

namespace App\Repository;

use App\postsModel;
use App\interfaces\PostsTableInterFace;

class PostsRepository implements PostsTableInterFace
{
    protected $posts;

    public function __construct(postsModel $posts)
    {
        $this->posts = $posts;
    }

    public function regist(int $post_id,int $user_id,string $title,string $comment)
    {
        $postCount = $this->posts->all()->Count();   
        $data['post_id'] = $postCount; 
        $data['user_id'] = $user_id;
        $data['title'] = $title;
        $data['comment'] = $comment;

        $this->posts->create($data);
    }

    public function getPosts(int $count,int $skip = 0)
    {
        return $this->posts->orderBy('post_id','desc')->skip($skip)->take($count)->get();
    }

    public function getPostsByPost_Id(int $post_id)
    {
        return $this->posts->where('post_id','=',$post_id)->first();      
    }
    
    public function getPostsByUser_Id(int $user_id)
    {
        return $this->posts->where('user_id','=',$user_id)->orderBy('post_id', 'desc')->get();
    }

    public function allCount():int
    {
        return $this->posts::all()->Count();
    }
}
