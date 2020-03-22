@extends('layout.base')

@section('contents')
<div class="container">
  
    <header class="bg-base item-inverted fixed-top">
      <div class="container">
        <div class="row">

          <div class="col-md-2 order-md-0 offset-md-1 order-1 text-center col-10 text-white p-0">
              <h2>ホーム</h2>
          </div>

          <div class="col-lg-8 col-md-6 order-md-1 order-0 col-1 p-0">      
              <i class="bg-base item-circ fas fa-home p-1 fa-fw" id="home_icon"></i>
          </div>

        </div>
      </div>     
    </header>
 

  <div class="row">
    <nav class="col-12 col-lg-3 order-lg-0 order-1">
      @include('component.sidebar')
    </nav>

    <ul class="col-12 col-lg-8 order-lg-1 order-0 item_list mt-5 pt-5" id="item_list">
        @if($contents !== null) 
          @foreach($contents as $content)
            @if($loop->iteration % 2 == 0)
              @include('component.item_even', ['content' => $content])
            @else
              @include('component.item_odd', ['content' => $content])
            @endif     
          @endforeach       
        @endif
    </ul> 
  </div>
</div>

<script>
  $(window).scroll(function (e) {

    var $window = $(e.currentTarget),
        height = window.innerHeight,
        scrollTop = $window.scrollTop(),
        documentHeight = $(document).height(); 
        contentsCount = $('.item').length;

    //下端までscrollしたら
    if (documentHeight === height + scrollTop) {

      $.ajax({
      type: "POST",
      url: "/item",
      headers:
      {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data: 
      {
        "PAGE" : contentsCount
      },

      //Ajax通信が成功した場合に呼び出されるメソッド
      success: function(data, dataType){
        //出力する部分
        $(".item_list").append(data);
        },
          //Ajax通信が失敗した場合に呼び出されるメソッド
          error: function(XMLHttpRequest, textStatus, errorThrown){

        }
      });
    }
});    
</script>

@endsection




