<li class="item-inverted">
  <div>      
      @isset($content->lyrics->post_id)
      <i class="bg-lyrics far fa-edit fa-fw item-circ detail-circ p-1"></i>
      @else
      <i class="bg-music fas fa-music fa-fw item-circ detail-circ p-1"></i> 
      @endif     
  </div>
    
  <div class="item_panel row" id="detail">
    <div class="col-2 text-center">
        <a href="{{ url('/profile') }}/{{$content->user->user_id}}"><img class="mt-2  mb-3 item_img" src="{{ env("STORAGE_ENDPOINT") }}{{$content->user->icon}}"/></a>
    </div>
  
    <div class="col-12 col-md-10">
      <h5 class="font-weight-bold">{{$content->user->user_name}}</h5>

      <h6 class="font-weight-bold mt-5">タイトル</Title></h6>
      <h6>{{$content->title}}</h6>

      <p class="font-weight-bold mt-5">ひとこと</p>
      <p>{{$content->comment}}</p>

      @isset($content->lyrics->post_id)
      <p class="font-weight-bold mt-5">歌詞</p>
      <p>{{$content->lyrics->contents}}</p>
      @else
      <audio controls class="col-12 col-md-8 p-0">
        <source src="{{ env("STORAGE_ENDPOINT") }}{{$content->music->filepath}}" type="audio/mp3">
        <p>※ご利用のブラウザでは再生することができません。</p>
      </audio>
      @endif 
    </div>

      <div class="col-12 text-right">
        <button type="button" class="btn func_button" data-toggle="modal" data-target="#modal">
            <i class="fas fa-reply"></i>
            コメント
        </button>
      </div>
  </div>
</li>


<div class="modal fade" id="modal" tabindex="-1" data-backdrop="static"　role="dialog" aria-labelledby="label1" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">

              @if (Session::has('user_id'))
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">コメント</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる" id="comment_close"><span aria-hidden="true">&times;</span></button>
              </div>
      
              <div id="myTabContent" class="tab-content mt-3">
      
                <div id="music" class="tab-pane active" role="tabpanel" aria-labelledby="music-tab">  
                    <div class="modal-body">
                        <form class="px-4 py-1" id="comment_form">
                          {{ csrf_field() }}
                          <input type="hidden" value="{{$content->post_id}}" name="post_id"/>
                            <div class="form-group">
                              <label for="exampleFormControlTextarea1">コメント</label>
                              <p id="comment_error" class="errors"></p>
                              <textarea class="form-control comment" id="exampleFormControlTextarea1" name="comment" rows="3"></textarea>
                            </div>
    
                          <button id="comment_button" type="button" class="btn btn-primary mt-3">
                            <span class="spinner-border spinner-border-sm d-none" id="comment_spiner"  role="status" aria-hidden="false"></span>
                            投稿</button>
                        </form>
                    </div> 
                </div>
              </div>
              @else
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="閉じる"><span aria-hidden="true"
                      　id="loginFrom_close">&times;</span></button>
                </div>
          
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-10 offset-1">
                          
                      <p>SNS機能を使用する場合、ログインが必要です。</p>
                      
                      <div class="col">
                      <a href="{{url('/login')}}" class="btn col text-white bg-base mt-3 p-2">
                      <span>ログイン</span></a>
                     </div>
          
                     <div class="col">
                      <a href="{{url('/singup')}}" class="btn col border-primary text-base mt-3 p-2">
                      <span>新規登録</span></a>
                    </div>
          
                      </div>
          
                    </div>
                  </div>
                </div>
                @endif
            </div>
        </div>
    </div>
