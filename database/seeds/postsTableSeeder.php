<?php

use Illuminate\Database\Seeder;
use App\postsModel;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $isnertData =
        [
            'post_id' => '',
            'user_id' => '',
            'title' => 'タイトルが入ります。',
            'comment' => 'コメント・ひとことが入ります。',
        ];

        for($i = 0; $i < 10; ++$i)
        {
            $isnertData['post_id'] = $i;
            $isnertData['user_id'] = rand(1,3);
            postsModel::insert($isnertData);
        }

        for($i = 10; $i < 20; ++$i)
        {
            $isnertData['post_id'] = $i;
            $isnertData['user_id'] = rand(1,3);
            postsModel::insert($isnertData);
        }
    
    }
}
