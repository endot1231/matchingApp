<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\commentsModel;
use App\postsModel;
use App\users;

class homeController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->exists('user_id')) 
        {
            $contents = postsModel::orderBy('post_id','desc')->take(20)->get();
            return view('home.index',['contents'=>$contents] );
        }

        // セッションIDの再発行
        $request->session()->regenerate();
        $contents = postsModel::orderBy('post_id','desc')->take(20)->get();
        return view('home.index',['contents'=>$contents]);
    }

    public function getDetaile(Request $request,$id)
    {
        $comment = commentsModel::where('post_id','=',$id)->count();
        if($comment > 0)
        {
            $comment = commentsModel::where('post_id','=',$id)->get();
        }
        else
        {
            $comment = null;
        }

        $content = postsModel::where('post_id','=',$id)->first();
        return view('home.detaile',['content' =>$content,'comments'=>$comment]);
    }

    public function getProfile(Request $request,$id)
    {
        if (!$request->session()->exists('user_id')) 
        {
            return view('account.index');
        }

        $user_id =$request->session()->get('user_id');
     
        $user = users::find($id);
        $contents = postsModel::where('user_id','=',$id)->get();

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
