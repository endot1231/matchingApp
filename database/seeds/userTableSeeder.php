<?php

use Illuminate\Database\Seeder;
use App\users;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        users::insert([
            [
              'user_id' => '1',
              'user_name' => 'サンプルユーザー1',
              'email' => '',
              'password' => '',
              'comment' => '自己紹介が入ります。',
              'icon'=>'defalut/1.svg'
            ],
            [
                'user_id' => '2',
                'user_name' => 'サンプルユーザー2',
                'email' => '',
                'password' => '',
                'comment' => '自己紹介が入ります。',
                'icon'=>'defalut/2.svg'
              ],
              [
                'user_id' => '3',
                'user_name' => 'サンプルユーザー3',
                'email' => '',
                'password' => '',
                'comment' => '自己紹介が入ります。',
                'icon'=>'defalut/3.svg'
              ],
          ]);
    }
}
