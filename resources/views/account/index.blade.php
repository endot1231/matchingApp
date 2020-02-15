@extends('layout.base')

@section('contents')
<div class="container-fluid">
<article class="row home d-flex flex-column flex-sm-row">
    <div class="col d-flex flex-column align-items-center justify-content-center  bg-base">
        <h2 class="text-white text-center">ようこそ!</h2>
        <p class="text-white">本サイトは <span class="text-music">作詞</span>　<span class="text-lyrics">作曲</span>　のマッチングSNSです!</p>
    </div>
    
    <div class="col d-flex flex-column align-items-center justify-content-center">
        <a class="m-5 btn btn-primary btn-lg bg-base" href="{{ action('accountController@singup') }}">新規登録</a>
        <a class="m-5 btn btn-primary btn-lg bg-base" href="{{ action('accountController@login') }}">ログイン</a>
    </div>
</article>
</div>
@endsection