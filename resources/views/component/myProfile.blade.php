<div class="container mt-5 mb-2">
  <div class="row justify-content-between">

    <div class="col-3 offset-md-4 ofset-0 text">
      <img class="mb-3 profile_img" src="{{ env("STORAGE_ENDPOINT") }}{{$user->icon}}" />
    </div>

<div class="col-1 h-25 pt-2 mr-4">
      <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#setting">
        <i class="fas fa-cog"></i>
      </button>
    </div>
  </div>

  <div class="row">
    <div class="col pt-2">
      <h5 class="font-weight-bold">{{$user->user_name}}</h5>
    </div>
  </div>

  <div class="row m-2">
    {{$user->comment}}
  </div>
</div>

<div class="modal fade" id="setting" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="label1">
  <div class="modal-dialog" role="document">
      <div class="modal-content"> 
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">プロフィール編集</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる"><span aria-hidden="true"　id="postFrom_close">&times;</span></button>
          </div>
     
      <div id="myTabContent" class="tab-content mt-3">
        <div id="music" class="tab-pane active" role="tabpanel" aria-labelledby="music-tab">
         
          <div class="modal-body">
            <form class="px-4 py-1" id="profile_form">
              {{ csrf_field() }}
              
              <div class="myprofile_img_box setting_img">
                <img class="profile_img mb-5" src="{{ env("STORAGE_ENDPOINT") }}{{$user->icon}}" id="preview" />
                <label class="myprofile_img_button">
                  <i class="fas fa-camera fa-inverse"></i>
                  <input type="file" style="display:none" id="profile_img_button" name="profile_img">
                </label>
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">名前</label>
                <p id="profile_name_error" class="errors"></p>
                <input type="text" class="form-control profile_name" autofocus name="profile_name"
                  value="{{$user->user_name}}">
              </div>

              <div class="form-group">
                <label for="exampleFormControlTextarea1">自己紹介</label>
                <p id="profile_comment_error" class="errors"></p>
                <textarea class="form-control profile_comment" name="profile_comment"
                  rows="6">{{$user->comment}}</textarea>
              </div>

              <button id="profile_button" type="button" class="btn bg-base text-white col col-md-3 mt-3">
                <span class="spinner-border spinner-border-sm d-none" id="profile_spiner" ole="status"
                  aria-hidden="false"></span>
                変更</button>
            </form>
          </div>

        </div>
      </div>

    </div>
    
  </div>
</div>