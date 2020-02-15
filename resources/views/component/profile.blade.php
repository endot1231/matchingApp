<div class="container mt-5 mb-2 bg-white">
    <div class="row">
        <div class="col-3 mx-auto profile_img">
            <img class="pt-2 pb-5" src="{{$user->icon}}"/>
        </div>
    </div>

    <div class="row">            
        <div class="col pt-2">
            <h5 class="font-weight-bold">{{$user->user_name}}</h5>
        </div>
    </div>

    <div class="row  profile-comment">            
        <div class="col">
            {{$user->comment}}      
        </div>
    </div>
</div>
