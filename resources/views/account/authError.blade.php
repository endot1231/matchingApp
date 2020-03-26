@extends('layout.base')

@section('title','認証エラー')

@include('component.header', ['title' => '認証エラー'])

@section('contents')
<div class="container mt-5">
    <div class="row">
        <div class="col-10 offset-1 col-md-6 offset-md-3  p-5 mt-5 border border-info"> 
        <p>{{$message}}</p>

        <div class="col-12">
                <a href="{{url('/login')}}" class="btn col text-white bg-base mt-3 p-2">
                <span>ログイン</span></a>
            </div>
    
            <div class="col-12">
                <a href="{{url('/authSingup')}}" class="btn col border-primary text-base mt-3 p-2">
                <span>新規登録</span></a>
            </div>
        </div>   
    </div>
</div>
  @endsection
  