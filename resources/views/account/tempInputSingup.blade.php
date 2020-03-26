@extends('layout.base')

@section('title','新規登録')

@include('component.header', ['title' => '新規登録'])

@section('contents')
<article class="container mt-5">
  <div class="row">
    <div class="col-10 offset-1 col-md-6 offset-md-3 bg-light p-5 mt-5 border border-info">
     
      <form action="/authSingup" method="POST">
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
            <label for="exampleInputEmail">メールアドレス</label>
            <input class="form-control" id="exampleInputEmail1" type="email" name="email">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword">パスワード</label>
            <input class="form-control" id="exampleInputPassword" type="password" name="password1">
          </div>

          <div class="form-group">
            <label for="exampleInputPassword">パスワード再入力</label>
            <input class="form-control" id="exampleInputPassword" type="password" name="password2">
          </div>  

          <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                <a href="{{url('/usePolicy')}}">利用規約</a>に同意する
                </label>
              </div>
            </div>
  
          <div class="row">
            <input class="btn bg-base text-white col-3 mt-3 ml-3" type="submit" value="仮登録">
            <p class="col-12 mt-2">すでに登録済みの方は<a href="{{url('/login')}}">こちら</a>から</p>
          </div>
        </form>
      </div>
    </div>
</article>
  @endsection
  