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

    public function getComments(int $post_id)
    {
        $comments = $this->comments->where('post_id','=',$post_id)->get();
        return $comments;
    }
}
