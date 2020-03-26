@extends('layout.base')

@section('title','ログイン')

@include('component.header', ['title' => 'ログイン'])

@section('contents')
<article class="container mt-5">
  <div class="row">
    <div class="col-10 offset-1 col-md-6 offset-md-3 bg-light p-5 mt-5 border border-info">
      @isset($login)
          <p class="errors">アドレスまたはパスワードが異なります。</p>
      @endisset
        <form action="/login" method="POST">
          {{ csrf_field() }}
        
            <div class="form-group">
              <label for="exampleInputEmail1">メールアドレス</label>
              <input class="form-control" type="email" name="email">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">パスワード</label>
              <input class="form-control" type="password" name="password">
            </div>
            
            <div class="row">
              <input type="submit" class="btn bg-base text-white col-3 ml-3 mt-3" value="ログイン">
              <p class="col-12 mt-2">まだ登録していない方は<a href="{{url('/authSingup')}}">こちら</a>から</p>
            </div>
          </form>
      </div>
  </div>
</article>
@endsection