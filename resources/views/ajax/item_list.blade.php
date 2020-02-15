@if($contents !== null) 
  @foreach($contents as $content)
    @if($loop->iteration % 2 == 0)
      @include('component.item_even', ['content' => $content])
    @else
      @include('component.item_odd', ['content' => $content])
    @endif     
  @endforeach  
@endif

  