@extends('layout.base')

@section('title',$user->user_name)

@section('contents')
<div class="container mt-5 pl-0 pr-0">

  <header class="bg-base fixed-top">
    <div class="container">
      <div class="row text-white">
        <div class="col-1 offset-md-3">
          <i class="fas fa-arrow-left fa-2x mt-1" onclick="history.back()"></i>
        </div>      
        <div class="col-8 offset-1 offset-sm-0 col-md-5 text-left p-0">
          <h2> プロフィール</h2>
        </div>
      </div>
    </div>      
  </header>
    
  <div class="row">
    <nav class="col-12 col-lg-3 order-lg-0 order-1">
      @include('component.sidebar')
    </nav>

    <div class="col-12 col-lg-8 order-lg-1 order-0">
      @if($person === true)
      @include('component.myProfile',['user'=>$user])
      @else
      @include('component.profile',['user'=>$user])
      @endif

      @if(count($contents) > 1 )
      <ul class="item_list line_left profile_item mt-5">
        @foreach($contents as $content)
        <li class="item-inverted">
          @include('component.item',['content' => $content])
        </li>
        @endforeach
      </ul>
      @else
      <p>投稿はありません</p>
      @endif
    </div>

  </div>
</div>
@endsection