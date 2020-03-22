@extends('layout.base')

@section('title','新規登録')

@include('component.header', ['title' => '新規登録'])

@section('contents')
<article class="container mt-5">
  <div class="row">
    <div class="col-10 offset-1 col-md-6 offset-md-3 bg-light p-5 mt-5 border border-info">
      @empty($FinSingup)
      <form action="/singup" method="POST" id="account_singup_form">
        {{ csrf_field() }}

        @if ($errors->any())
        <div class="errors">
          <ul class="pl-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
         
          <div class="form-group">
              <label class="text-dark">ユーザー名</label>
              <input class="form-control" type="text" name="name">
            </div>
            
            <div class="form-group">
            <label for="exampleInputEmail1">メールアドレス</label>
            <input class="form-control" id="exampleInputEmail1" type="email" name="email" value="{{old('email')}}">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">パスワード</label>
              <input class="form-control" id="exampleInputPassword1" type="password" name="password1">
            </div>

            <div class="form-group">
              <label class="account_singup_form_item-label">再度パスワード</label>
              <input class="form-control" id="exampleInputPassword1" type="password" name="password2">
            </div>
            
            <div>
              <input class="btn btn-primary" type="submit" value="登録">
            </div>
        </form>
      </div>
    </div>
</article>
  @else
      <p class="singupFin_title">登録が完了しました!</p>
      <p class="singupFin_message">早速<a href="{{ action('accountController@login') }}">こちら</a>からログインして交流してみましょう!</p>
  @endempty
  @endsection
  