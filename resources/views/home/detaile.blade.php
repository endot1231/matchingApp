@extends('layout.base')

@section('contents')
<div class="container">

    <header class="bg-base item-inverted fixed-top">
      <div class="container">
        <div class="row">
            <div class="offset-lg-3 col-1 p-0">        
                @isset($content->lyrics->post_id)
                <i class="bg-lyrics far fa-edit fa-fw item-circ detail-circ p-1"  id="detaile_icon"></i>
                @else
                <i class="bg-music fas fa-music fa-fw item-circ detail-circ p-1"  id="detaile_icon"></i> 
                @endif   
            </div>

            <div class="col-10 text-center text-white p-0">
                <h2> 
                  @if(isset($content->lyrics->post_id))
                  歌詞 
                  @else
                    作曲
                  @endif   
              </h2>
          </div>   
        </div>
      </div>      
    </header>

  <div class="row">
    <nav class="col-12 col-lg-3 order-lg-0 order-1">
      @include('component.sidebar')
    </nav>   
    <ul class="col-12 col-lg-8 item_list line_left order-lg-1 order-0 comennt_list mt-5 pt-5"> 
      @include('component.detaile', ['content' => $content])
      @isset($comments)
        @each('component.comment',$comments,'comment')
      @endisset
    </ul>
  </div>
</div>
@endsection