<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addAccount;
use App\users;
use App\postsModel;


class accountController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->exists('user_id')) 
        {
            $contents = postsModel::orderBy('post_id','desc')->take(20)->get();
            return view('home.index',['contents'=>$contents ,'home' => true] );
        }

        return view('account.index');
    }

    public function singup()
    {
        return view('account.singup');
    }

    public function add(addAccount $request)
    {
        $users = new users;
        $users->user_name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password1;
        $users->icon = '';
        $users->comment = '';

        $users->save();

        return view('account.singup',['FinSingup'=>'true']);
    }

    public function login(Request $request)
    {
        return view('account.login');
    }

    public function checkLogin(Request $request)
    {
        $users = users::where('email','=',$request->email)->where('password','=',$request->password)->first();
        if(empty($users))
        {
            return view('account.login',['login'=>'false']);
        }

        $request->session()->put('user_id',$users->user_id);
        $request->session()->regenerate();

        return redirect('/');
    }
}
