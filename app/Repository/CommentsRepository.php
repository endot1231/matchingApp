<?php

namespace App\Repository;

use App\commentsModel;
use App\interfaces\CommentsTableInterFace;

class CommentsRepository implements CommentsTableInterFace
{
    protected $comments;

    public function __construct(commentsModel $comments)
    {
        $this->comments = $comments;
    }

    public function regist(int $comment_id,int $post_id,int $user_id,string $contents)
    { 
        $data['comment_id'] = $comment_id; 
        $data['post_id'] = $post_id; 
        $data['user_id'] = $user_id;    
        $data['contents'] = $contents;

        $this->comments->create($data);
    }

    public function getComments(int $post_id)
    {
        $comments = $this->comments->where('post_id','=',$post_id)->get();
        return $comments;
    }

    public function allCount():int
    {
        return $this->comments::all()->Count();
    }
}
