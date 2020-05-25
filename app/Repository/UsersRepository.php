<?php

namespace App\Repository;

use App\users;
use App\interfaces\UsersTableInterFace;
use Egulias\EmailValidator\Warning\Comment;

class UsersRepository implements UsersTableInterFace
{
    protected $users;

    public function __construct(users $users)
    {
        $this->users = $users;
    }

    public function regist()
    {

    }

    public function update(int $user_id,string $user_name,string $comment,string $icon_path)
    {
        $user = $this->users->find($user_id);
        $user->user_name = $user_name;
        $user->Comment = $comment;

        if($icon_path !== "")
        {
            $user->icon = $icon_path; 
        }
      
        $user->save();
    }

    public function getUserById(int $user_id)
    {
        return $this->users->find($user_id);
    }
    
}