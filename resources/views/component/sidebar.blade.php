<ul class="d-lg-block order-md-0 d-flex d-flex order-1 nav position-fixed" id="side_button_ul">
  <li class="mt-0 mt-lg-5"><a href="{{url('/')}}" class="nav-link text-dark h5 side_button col"><i
        class="fas fa-home fa-fw fa-1x"></i><span>ホーム</span></a></li>

  @if (Session::has('user_id'))
  <li class="mt-0 mt-lg-5"><a href="{{url('/profile')}}" class="nav-link btn-link text-dark h5 side_button col">
    <i class="fas fa-user-circle fa-fw fa-1x"></i><span>マイページ</span></a></li>
  @else
  <li data-toggle="modal" data-target="#myModal" class="border-base nav-link h5 mt-0 mt-lg-5 side_button text-dark col pl-0 pr-0">
    <i class="fas fa-user-circle fa-fw fa-1x"></i><span>マイページ</span></li>
  @endif

  <li type="button" data-toggle="modal" data-target="#myModal"
    class="nav-link h5 bg-base mt-0 mt-lg-5 side_button col pl-0 pr-0 btn btn-primary">
    <i class="fas fa-pen fa-fw fa-1x"></i><span>投稿</span></li>
</ul>

<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      @if (Session::has('user_id'))
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">投稿</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="閉じる"><span aria-hidden="true"
            　id="postFrom_close">&times;</span></button>
      </div>
      <!-- タブ部分 -->
      <ul id="myTab" class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">

        <li class="nav-item">
          <a href="#music" id="music-tab" class="nav-link active col" role="tab" data-toggle="tab" aria-controls="home"
            aria-selected="true">作曲</a>
        </li>

        <li class="nav-item">
          <a href="#profile" id="profile-tab" class="nav-link col" role="tab" data-toggle="tab" aria-controls="profile"
            aria-selected="false">歌詞</a>
        </li>

      </ul>

      <!-- 
        パネル部分 
      -->

      <!-- 作曲用 -->
      <div id="myTabContent" class="tab-content mt-3">
        <div id="music" class="tab-pane active" role="tabpanel" aria-labelledby="music-tab">
          <div class="modal-body">
            <form class="px-4 py-1" id="music_form">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="exampleFormEmail">タイトル</label>
                <p id="music_title_error" class="errors"></p>
                <input type="text" class="form-control music_title" placeholder="タイトル" autofocus name="music_title">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">ひとこと</label>
                <p id="music_comment_error" class="errors"></p>
                <textarea class="form-control music_comment" id="exampleFormControlTextarea1" name="music_comment"
                  rows="3"></textarea>
              </div>

              <p id="music_file_error" class="errors"></p>
              <div class="custom-file">
                <input type="file" class="custom-file-input music_file" id="customFile" name="music_file"
                  accept="audio/mpeg,audio/wav">
                <label class="custom-file-label" for="customFile">ファイル選択...</label>
              </div>

              <button id="music_button" type="button" class="btn btn-primary mt-3">
                <span class="spinner-border spinner-border-sm d-none" role="status" id="music_spiner"
                  aria-hidden="false"></span>
                投稿</button>
            </form>
          </div>
        </div>

        <!-- 歌詞用 -->
        <div id="profile" class="tab-pane" role="tabpanel" aria-labelledby="profile-tab">
          <div class="modal-body">
            <form class="px-4 py-1" id="lyrics_form">
            {{ csrf_field() }}

              <div class="form-group">
                <label for="exampleFormEmail">タイトル</label>
                <p id="lyrics_title_error" class="errors"></p>
                <input type="text" class="form-control" placeholder="タイトル" autofocus name="lyrics_title">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">ひとこと</label>
                <p id="lyrics_comment_error" class="errors"></p>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                  name="lyrics_comment"></textarea>
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">歌詞</label>
                <p id="lyrics_contents_error" class="errors"></p>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="10"
                  name="lyrics_contents"></textarea>
              </div>

              <button id="lyrics_button" type="button" class="btn btn-primary mt-3">
                <span class="spinner-border spinner-border-sm d-none" role="status" id="lyrics_spiner"
                  aria-hidden="false"></span>
                投稿
              </button>
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
            <a href="{{url('/authSingup')}}" class="btn col border-primary text-base mt-3 p-2">
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