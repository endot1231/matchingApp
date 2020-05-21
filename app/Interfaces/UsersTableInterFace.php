<?php

namespace App\interfaces;

interface UsersTableInterFace
{
    public function registPosts();
    public function getUserById(int $user_id);
}