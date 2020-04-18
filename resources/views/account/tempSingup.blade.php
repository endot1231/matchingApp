@extends('layout.base')

@section('title','仮登録')

@include('component.header', ['title' => '仮登録'])

@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-10 offset-1 col-md-6 offset-md-3 bg-light p-5 mt-5 border border-info">
            <form  method="POST" action='/authSingup/postMail'>
            <p>下記のメールアドレスに登録のメールをお送りいたします。
                <br>問題なければ、メール送信ボタンを押下してください。
            </p>
            {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="exampleInputEmail">メールアドレス</label>
                    <input class="form-control" id="exampleInputEmail1" type="email" name="email" value="{{$email}}" readonly>
            　  </div>
                
                <div class="form-group">
                    <label for="exampleInputPassword">パスワード</label>
                    <input class="form-control" id="exampleInputPassword" type="password" value="{{$password_mask}}" readonly>
                    <input type="hidden" name="password" value="{{$password}}">
                </div>
            
                <div>
                    <input class="btn col-12 bg-base text-white mt-3 pl-4 pr-4" type="submit" value="メール送信">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
  