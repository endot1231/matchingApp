<div>      
    @if(isset($content->lyrics->post_id))
    <i class="bg-lyrics far fa-edit fa-fw item-circ p-1"></i>
    @else
    <i class="bg-music fas fa-music fa-fw item-circ p-1"></i>   
    @endif     
</div>

<div class="row item_panel item" id="{{$content->post_id}}">
    <div class="col-2">
        <a href="{{ url('/profile') }}/{{$content->user->user_id}}"><img class="mt-2 mb-sm-2 item_img" src="{{ env("STORAGE_ENDPOINT") }}{{$content->user->icon}}"/></a>
    </div>

    <div class="col-12 col-sm-10 pt-1 pl-3 pl-sm-4 pt-sm-1">
        <h5 class="font-weight-bold ">{{$content->user->user_name}}</h5>
    </div>

    <div class="col-12">
        <p>{{$content->comment}}</p>
    </div>
</div>


