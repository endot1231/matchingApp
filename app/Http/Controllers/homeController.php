<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\commentsModel;
use App\postsModel;
use App\users;
use App\interfaces\PostsTableInterFace;
use App\interfaces\CommentsTableInterFace;

class homeController extends Controller
{
    protected $postsRepository;
    protected $commentsRepository;

    public function __construct(PostsTableInterFace $postsRepository,CommentsTableInterFace $commentsRepository )
    {
       $this->postsRepository = $postsRepository;
       $this->commentsRepository = $commentsRepository;
    }

    public function index(Request $request)
    {
        // コンテンツ取得
        $contents = $this->postsRepository->getPosts(20);

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
        $content = $this->postsRepository->getPostsById($id);
        
         // コメント取得
        $comment =$this->commentsRepository->getComments($id);

        return view('home.detaile',['content' =>$content,'comments'=>$comment]);
    }

    public function getProfile(Request $request,$id)
    {
        $user_id =$request->session()->get('user_id');
        
        $user = users::find($id);
        $contents = postsModel::where('user_id','=',$id)->orderBy('post_id', 'desc')->get();

        if($id == $user_id)
        {
            return view('home.profile',['contents' => $contents,'user'=>$user,'person'=>true]);
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
