<?php

namespace App\Service;
use App\interfaces\MusicTableInterFace;
use App\Repository\postsRepository;
use Faker\Provider\File;
use League\Flysystem\Exception;

class UserService
{
  private $posts_repo;
  private $music_repo;
  
  public function __construct(postsRepository $posts_repo,MusicTableInterFace $music_repo)
  {
    $this->posts_repo = $posts_repo;
    $this->music_repo = $music_repo;
  }
  
  public function regist(int $user_id,string $music_title,string $music_comment,File $request_File)
  {
    DB::beginTransaction();

    try
    {
      // カウント取得
      $postId = $this->posts->all()->Count();
      $musicId =  $this->music->all()->Count(); 

      $fileBasePath =env('STORAGE_ENDPOINT');

      // ファイル名作成
      $imageName = str_shuffle(time().$request_File->getClientOriginalName()). '.' .$request_File->getClientOriginalExtension();
      $filePath = $user_id.'/'.$imageName;

      $this->posts_repo->regist($postId,$user_id,$music_title,$music_comment);
      $this->music_repo->regist($musicId,$postId,$filePath);

      \Storage::makeDirectory($user_id);
      \Storage::putFileAs($user_id,$request_File, $imageName,'public');
      DB::commit();
    }
    catch(Exception $e)
    {
      DB::rollbadk();
    }
  }

}