<?php

namespace App\Repository;

use App\users;
use App\interfaces\UsersTableInterFace;

class UsersRepository implements UsersTableInterFace
{
    protected $users;

    public function __construct(users $users)
    {
        $this->users = $users;
    }

    public function registPosts()
    {

    }

    public function getUserById(int $user_id)
    {
        return $this->users->find($user_id);
    }
    
}