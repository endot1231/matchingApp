<?php

namespace App\Service;
use App\interfaces\MusicTableInterFace;
use App\interfaces\PostsTableInterFace;

use League\Flysystem\Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class MusicService
{
  private $posts_repo;
  private $music_repo;
  
  public function __construct(PostsTableInterFace $posts_repo,MusicTableInterFace $music_repo)
  {
    $this->posts_repo = $posts_repo;
    $this->music_repo = $music_repo;
  }
  
  public function regist(int $user_id,string $music_title,string $music_comment,UploadedFile $request_File):bool
  {
    $result = false;
    DB::beginTransaction();

    try
    {
      // カウント取得
      $postId = $this->posts_repo->allCount();
      $musicId =  $this->music_repo->allCount(); 
      
      // ファイル名作成
      $imageName = str_shuffle(time().$request_File->getClientOriginalName()). '.' .$request_File->getClientOriginalExtension();
      $filePath = $user_id.'/'.$imageName;

      $this->posts_repo->regist($postId,$user_id,$music_title,$music_comment);
      $this->music_repo->regist($musicId,$postId,$filePath);

      \Storage::makeDirectory($user_id);
      \Storage::putFileAs($user_id,$request_File, $imageName,'public');
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