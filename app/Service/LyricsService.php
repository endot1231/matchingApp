<?php

namespace App\Service;
use App\interfaces\LyricsTableInterFace;
use App\interfaces\PostsTableInterFace;
use League\Flysystem\Exception;
use Illuminate\Support\Facades\DB;

class LyricsService
{
  private $posts_repo;
  private $lyrics_repo;
  
  public function __construct(PostsTableInterFace $posts_repo,LyricsTableInterFace $lyrics_repo)
  {
    $this->posts_repo = $posts_repo;
    $this->lyrics_repo = $lyrics_repo;
  }
  
  public function regist(int $user_id,string $lyrics_title,string $lyrics_comment,string $lryics_contents):bool
  {
    $result = false;
    DB::beginTransaction();

    try
    {
      // カウント取得
      $postId = $this->posts_repo->allCount();
      $lyricsId =  $this->lyrics_repo->allCount(); 

      $this->posts_repo->regist($postId,$user_id,$lyrics_title,$lyrics_comment);
      $this->lyrics_repo->regist($lyricsId,$postId,$lryics_contents);

      DB::commit();
      
      $result = true;
    }
    catch(Exception $e)
    {
      DB::rollbadk();
    }
    return $result;
  }

}