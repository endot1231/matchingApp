<?php

namespace App\Service;
use App\interfaces\CommentsTableInterFace;

class CommentsService
{
  private $comments_repo;
  
  public function __construct(CommentsTableInterFace $comments_repo)
  {
    $this->comments_repo = $comments_repo;
  }

  public function regist(int $post_id,int $user_id,string $contents)
  {
    $comment_id = $this->comments_repo->allCount();
    $this->comments_repo->regist($comment_id,$post_id,$user_id,$contents);
  }
  
  public function getComments(int $post_id)
  {
    return $this->comments_repo->getComments($post_id);
  }

}