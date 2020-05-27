<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\postMusic;
use App\Http\Requests\postLyrics;
use App\Http\Requests\postComment;
use App\Http\Requests\postProfile;

use App\Service\PostsService;
use App\Service\LyricsService;
use App\Service\MusicService;
use App\Service\UserService;
use App\Service\CommentsService;

class ajaxController extends Controller
{
    protected $postsService;
    protected $lyricsService;
    protected $musicService;
    protected $commentsService;
    protected $userService;

    public function __construct(PostsService $postsService,LyricsService $lyricsService,MusicService $musicService,CommentsService $commentsService,UserService $userService)
    {
       $this->postsService = $postsService;
       $this->lyricsService = $lyricsService;
       $this->musicService = $musicService;
       $this->commentsService = $commentsService;
       $this->userService = $userService;
    }

    public function getItemList(Request $request)
    {
        $Count = $request->input('PAGE');  
        $contents =$this->postsService->getPosts(10,$Count);
        return view('ajax.item_list',['contents'=>$contents]);   
    }

    public function postMusic(postMusic $request)
    {   
        $user_id =$request->session()->get('user_id');
        $music_title =$request->music_title;
        $music_content =$request->music_comment;
        $file = $request->file('music_file');
        
        $result = $this->musicService->regist($user_id,$music_title,$music_content,$file);
        
        if($result)
        {
            return['fin'=>''];
        }
        else
        {
            return['fin'=>'アップロードに失敗しました。'];
        }
    }

    public function postLyrics(postLyrics $request)
    {
        $user_id =$request->session()->get('user_id');
        $lyrics_title =$request->lyrics_title;
        $lyrics_comment =$request->lyrics_comment;
        $lyrics_contents =$request->lyrics_contents;

        $result = $this->lyricsService->regist($user_id,$lyrics_title,$lyrics_comment,$lyrics_contents);

        if($result)
        {
            return['fin'=>''];
        }
        else
        {
            return['fin'=>'アップロードに失敗しました。'];
        }
    }

    public function postComment(postComment $request)
    {
        $user_id =$request->session()->get('user_id');
        $post_id =$request->post_id;
        $comment =$request->comment;

        $this->commentsService->regist($post_id,$user_id,$comment);
        return['fin'=>''];
    }

    public function postProfile(postProfile $request)
    {
        $user_id =$request->session()->get('user_id'); 
        $user_name =$request->profile_name;
        $comment =$request->profile_comment;  
        $file = $request->file('profile_img');

        $this->userService->update($user_id,$user_name,$comment,$file);

        return['fin'=>''];
    }
}
