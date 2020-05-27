<?php

namespace App\interfaces;

interface UsersTableInterFace
{
    public function regist();
    public function getUserByEmail_Token(string $email_token);
    public function updateEmail_Token(int $user_id,string $status,Carbon $verify_at);
    public function update(int $user_id,string $user_name,string $cmment,string $icon_path);
    public function getUserById(int $user_id);
}