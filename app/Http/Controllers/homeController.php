<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\PostsService;
use App\Service\MusicService;
use App\Service\UserService;
use App\Service\CommentsService;
use League\CommonMark\Converter;

class homeController extends Controller
{
    protected $postService;
    protected $musicService;
    protected $userService;
    protected $commentsService;

    public function __construct(PostsService $postService,MusicService $musicService,UserService $userService,CommentsService $commentsService)
    {
       $this->postService = $postService;
       $this->musicService = $musicService;
       $this->userService = $userService;
       $this->commentsService = $commentsService;
    }

    public function index(Request $request)
    {
        // コンテンツ取得
        $contents = $this->postService->getPosts(10,0);

        if (!$request->session()->exists('user_id')) 
        {
            return view('home.index',['contents'=>$contents] );
        }

        // セッションIDの再発行
        $request->session()->regenerate();
        return view('home.index',['contents'=>$contents]);
    }

    public function getDetaile(Request $request,$id)
    {
        // コンテンツ取得
        $content = $this->postService->getPostsByPost_Id($id);
        
         // コメント取得
        $comment =$this->commentsService->getComments($id);

        return view('home.detaile',['content' =>$content,'comments'=>$comment]);
    }

    public function getProfile(Request $request,$id)
    {
        $user = $this->userService->getUserById($id);
        $contents =$this->postService->getPostsByUser_Id($id);

        // ユーザーIDがある場合取得
        if ($request->session()->exists('user_id')) 
        {
            $user_id =$request->session()->get('user_id');

            // セッションのユーザーIDとリクエストのユーザーIDが同じ場合マイプロフィールを表示
            if($id == $user_id)
            {
                return view('home.profile',['contents' => $contents,'user'=>$user,'person'=>true]);
            }
        }

        return view('home.profile',['contents' => $contents,'user'=>$user,'person'=>false]);
    }

    public function getMyProfile(request $request)
    {
        if ($request->session()->exists('user_id')) 
        {
            $user_id =$request->session()->get('user_id');
            $redirectUrl = '/profile/'.$user_id;
            return redirect($redirectUrl);
        }
        return redirect('/');
    }
}
