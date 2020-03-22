<li class="item-inverted">
    <i class="far fa-comment-dots item-circ detail-circ bg-comment"></i>
    <div class="item_panel row comment_panel">
        <div class="col-2">
            <a href="{{ url('/profile') }}/{{$comment->user->user_id}}"><img class="mt-2 mb-3 item_img" src="{{ env("STORAGE_ENDPOINT") }}{{$comment->user->icon}}"/></a>
        </div>
              
        <div class="col-12 col-md-10">
            <h5 class="font-weight-bold">{{$comment->user->user_name}}</h5>
            <p>{{$comment->contents}}</p>
        </div>  

        <div class="col-12 text-right">
            <button type="button" class="btn func_button" data-toggle="modal" data-target="#modal">
                <i class="fas fa-reply"></i>
                コメント
            </button>
        </div>
    </div>
<li>

