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

          <div class="row text-white">        
            <div class="offset-1 col-1">
              <i class="fas fa-arrow-left fa-2x mt-1" onclick="history.back()"></i>
            </div>      
            <div class="col-8 text-center p-0">
                <h2 class="ml-5"> 
                  @if(isset($content->lyrics->post_id))
                  作詞 
                  @else
                  作曲
                  @endif   
              </h2>
          </div>
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
      @if(count($comments) > 0 )
        @each('component.comment',$comments,'comment')
      @endif
    </ul>
  </div>
</div>
@endsection