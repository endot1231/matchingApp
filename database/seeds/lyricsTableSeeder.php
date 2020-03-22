<?php

use Illuminate\Database\Seeder;
use App\lyricsModel;

class lyricsTableSeeder extends Seeder
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
            'lyrics_id' => '',
            'post_id' => '',
            'contents' => '歌詞がはります。',
        ];

        for($i = 0; $i < 10; ++$i)
        {
            $isnertData['lyrics_id'] = $i;
            $isnertData['post_id'] = $i;
            lyricsModel::insert($isnertData);
        }
    }
}
