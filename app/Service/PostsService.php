<?php

namespace App\Service;
use App\interfaces\PostsTableInterFace;

class PostsService
{
  private $posts_repo;
  
  public function __construct(PostsTableInterFace $posts_repo)
  {
    $this->posts_repo = $posts_repo;
  }
  
  public function getPosts(int $count,int $skip)
  {
    return $this->posts_repo->getPosts($count,$skip);
  }

  public function getPostsByPost_Id(int $post_id)
  {
    return $this->posts_repo->getPostsByPost_Id($post_id);
  }

  public function getPostsByUser_Id(int $user_id)
  {
    return $this->posts_repo->getPostsByUser_Id($user_id);
  }
  
}