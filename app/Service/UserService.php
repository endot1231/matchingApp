<?php

namespace App\Service;
use App\interfaces\UsersTableInterFace;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class UserService
{
  private $user_repo;
  
  public function __construct(UsersTableInterFace $user_repo)
  {
    $this->user_repo = $user_repo;
  }
  
  public function regist($user_id, $music_title, $music_comment)
  {

  }

  public function update(int $user_id,string $user_name,string $comment,UploadedFile $icon)
  {
    $icon_path ="";
    
    if(isset($file))
    {
        $now = date_format(Carbon::now(), 'YmdHis');
        $name = $icon->getClientOriginalName();

        $tmpFileName = $now . '_' . $name;
        $tmpFilePath = storage_path('app/tmp/').$tmpFileName;
        
        Image::make($icon)->orientate()->save($tmpFilePath);
        $imageName = str_shuffle(time().$icon->getClientOriginalName()). '.' .$icon->getClientOriginalExtension();
        
        \Storage::makeDirectory($user_id);
        $tmpFile=new File( $tmpFilePath);
       
        \Storage::putFileAs($user_id,$tmpFile,$imageName,'public');
        \Storage::disk('local')->delete('tmp/'.$tmpFileName );

        $icon_path = $user_id."/".$imageName;
    }

    $this->user_repo->update($user_id,$user_name,$comment,$icon_path);
  }

  public function getUserById(int $user_id)
  {
    return $this->user_repo->getUserById($user_id);
  }

}