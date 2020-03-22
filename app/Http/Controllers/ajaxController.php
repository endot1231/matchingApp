<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\postsModel;
use App\Http\Requests\postMusic;
use App\Http\Requests\postLyrics;
use App\Http\Requests\postComment;
use App\Http\Requests\postProfile;

use App\lyricsModel;
use App\musicModel;
use App\commentsModel;
use App\users;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use App\Mail\maailSend;

class ajaxController extends Controller
{
    public function getItemList(Request $request)
    {
        $Count = $request->input('PAGE');        
        $contents = postsModel::orderBy('post_id','desc')->skip($Count)->take(10)->get();
        return view('ajax.item_list',['contents'=>$contents]);   
    }

    public function postMusic(postMusic $request)
    {   
        $postCount = postsModel::all()->Count();
        
        $user_id =$request->session()->get('user_id');
        $posts = new postsModel();
        $posts->post_id=$postCount;
        $posts->user_id =$user_id;
        $posts->title =$request->music_title;
        $posts->comment =$request->music_comment;
        $posts->save();

        $musicCount = musicModel::all()->Count();
        $fileBasePath =env('STORAGE_ENDPOINT');

        $imageName = str_shuffle(time().$request->file('music_file')->getClientOriginalName()). '.' . $request->file('music_file')->getClientOriginalExtension();//ファイル名をユニックするためstr_shuffleを使う
        $music = new musicModel();
        $music->music_id= $musicCount;
        $music->post_id = $postCount;
        $music->filepath = $user_id."/".$imageName;
        $music->save();

        \Storage::makeDirectory($user_id);

        $file = $request->file('music_file');

        \Storage::putFileAs($user_id,$file, $imageName,'public');

        return['fin'=>''];
    }

    public function postLyrics(postLyrics $request)
    {
        $postCount = postsModel::all()->Count();
        
        $user_id =$request->session()->get('user_id');
        $posts = new postsModel();
        $posts->post_id =$postCount;
        $posts->user_id =$user_id;
        $posts->title =$request->lyrics_title;
        $posts->comment = $request->lyrics_comment;
        $posts->save();

        $lryicsCount = lyricsModel::all()->Count();
        
        $lyrics = new lyricsModel();
        $lyrics->lyrics_id = $lryicsCount;
        $lyrics->post_id = $postCount;
        $lyrics->contents =$request->lyrics_contents;
        $lyrics->save();

        return['fin'=>''];
    }

    public function postComment(postComment $request)
    {
        $CommentCount = commentsModel::all()->Count();
        $user_id =$request->session()->get('user_id');
        $comment = new commentsModel();
        $comment->comment_id =$CommentCount;
        $comment->user_id =$user_id;
        $comment->post_id =$request->post_id;
        $comment->contents =$request->comment;
        $comment->save();

        return['fin'=>''];
    }

    public function postProfile(postProfile $request)
    {
        $user_id =$request->session()->get('user_id');  
        $user = users::find($user_id);
        $user->user_name =$request->profile_name;
        $user->comment =$request->profile_comment;
        $user->save();

        $file = $request->file('profile_img');
        if(isset($file))
        {
            $imageName = str_shuffle(time().$request->file('profile_img')->getClientOriginalName()). '.' . $request->file('profile_img')->getClientOriginalExtension();
            $user->icon = $user_id."/".$imageName;
            \Storage::makeDirectory($user_id);
            \Storage::putFileAs($user_id,$file, $imageName,'public');
        }

        return['fin'=>''];
    }

    function postMail(Request $request)
    {
        $name = 'ララベル太郎';
        $text = 'これからもよろしくお願いいたします。';
        $to = 'endot1231@gmail.com';
        Mail::to($to)->send(new maailSend($name, $text));
    }
}
