<?php

use Illuminate\Database\Seeder;
use App\musicModel;

class musicTableSeeder extends Seeder
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
            'music_id' => '',
            'post_id' => '',
            'filepath' => 'defalut/sample.mp3',
        ];

        $music_id =0;
        
        for($i = 10; $i < 20; $i++)
        {
            $isnertData['music_id'] = $music_id;
            $isnertData['post_id'] = $i;
            musicModel::insert($isnertData);

            ++$music_id;
        }
    }
}
