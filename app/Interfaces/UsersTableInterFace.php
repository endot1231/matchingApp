<?php

namespace App\interfaces;

interface UsersTableInterFace
{
    public function regist();
    public function update(int $user_id,string $user_name,string $cmment,string $icon_path);
    public function getUserById(int $user_id);
}