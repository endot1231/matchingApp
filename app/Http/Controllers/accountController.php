<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addAccount;
use App\Http\Requests\tempAddAccountRequest;
use App\users;
use App\postsModel;
use Illuminate\Support\Facades\Hash;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

use App\Service\PostsService;
use App\Service\UserService;

class accountController extends Controller
{
    protected $postsService;
    protected $userService;

    public function __construct(PostsService $postsService,LyricsService $lyricsService,MusicService $musicService,CommentsService $commentsService,UserService $userService)
    {
       $this->postsService = $postsService;
       $this->userService = $userService;
    }

    public function index(Request $request)
    {
        if ($request->session()->exists('user_id')) 
        {
            $contents = postsModel::orderBy('post_id','desc')->take(20)->get();
            return view('home.index',['contents'=>$contents]);
        }

        return view('account.index');
    }

    public function showForm($email_token)
    {
        // 使用可能なトークンか
        if ( !users::where('email_verify_token',$email_token)->exists() )
        {
            return view('account.authError',['message'=>'無効なトークンです。']);
        } 
        else 
        {
            $user = users::where('email_verify_token', $email_token)->first();
            // 本登録済みユーザーか
            if ($user->status == config('const.USER_STATUS.REGISTER')) //REGISTER=1
            {
                logger("status". $user->status );
                return view('account.authError',['message'=>'すでに本登録されています。ログインして利用してください。']);
            }
            
            // ユーザーステータス更新
            $user->status = config('const.USER_STATUS.MAIL_AUTHED');
            $user->verify_at = Carbon::now();

            if($user->save()) 
            {
                return view('account.singup', ['email'=>$user->email,'email_token'=>$email_token]);
            } 
            else
            {
                return view('account.authError',['message'=>'メール認証に失敗しました。再度、メールからリンクをクリックしてください。']);
            }
        }
    }

    public function showtempSingupPage(tempAddAccountRequest $request)
    {
        $bridge_request['email'] = $request->email;
        $bridge_request['password'] = $request->password1;
        $bridge_request['password_mask'] = '******';

        return view('account.tempSingup',$bridge_request);
    }

    public function postMail(Request $request)
    {
            $user = users::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'email_verify_token' => base64_encode($request['email']),
        ]);

        $email = new EmailVerification($user);
        Mail::to($user->email)->send($email);

        return view('account.registered');
    }

    public function add(addAccount $request)
    {
        $user = users::where('email_verify_token','=',$request->email_verify_token)->first();

        $user->user_name = $request->name;
        $userIconId =rand(1,10);

        $user->icon = 'defalut/'.$userIconId.'.svg';
        $user->status = config('const.USER_STATUS.REGISTER');
        $user->comment = '';
        $user->save();
        return view('account.singup',['FinSingup'=>'true']);
    }

    public function login(Request $request)
    {
        return view('account.login');
    }

    public function checkLogin(Request $request)
    {
        $users = users::where('email','=',$request->email)->first();
        if(empty($users))
        {
            return view('account.login',['login'=>'false']);
        }

        if (!Hash::check($request->password,$users->password)) {
            // パスワード一致
             return view('account.login',['login'=>'false']);
        }
       
        $request->session()->put('user_id',$users->user_id);
        $request->session()->regenerate();

        return redirect('/');
    }
}
