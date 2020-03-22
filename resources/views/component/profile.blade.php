<div class="container mt-5 mb-2">
    <div class="row justify-content-between">
      <div class="col-3 offset-md-4 ofset-0 text">
        <img class="mb-3 profile_img" src="{{ env("STORAGE_ENDPOINT") }}{{$user->icon}}" />
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