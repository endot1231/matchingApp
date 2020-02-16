@extends('layout.base')

@section('title','ログイン')

@section('contents')
<article class="container mt-5">
  <div class="row">
    <div class="col-10 offset-1 col-md-6 offset-md-3 bg-light p-5 mt-5 border border-info">
      @isset($login)
          <p>アドレスまたはパスワードが異なります。</p>
      @endisset
        <form action="/login" method="POST">
          {{ csrf_field() }}
          @if ($errors->any())
          <div class="errors">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        
            <div class="form-group">
              <label for="exampleInputEmail1">メールアドレス</label>
              <input class="form-control" type="email" name="email">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">パスワード</label>
              <input class="form-control" type="password" name="password">
            </div>
            
            <div>
              <input type="submit"  class="btn btn-primary" value="ログイン">
            </div>
          </form>
      </div>
  </div>
</article>
@endsection