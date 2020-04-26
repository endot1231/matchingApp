/*
* 投稿フォーム入力データイベント
*/
$('#button').click(function (e) 
{
    $('#music_title_error').empty();
    $('#music_comment_error').empty();
    $('#music_file_error').empty();
    $('#lyrics_title_error').empty();
    $('#lyrics_comment_error').empty();
    $('#lyrics_contents_error').empty(); 
});

/*
* 音楽投稿
*/
$('#music_button').click(function (e) {
  
  var music_title = $('.music_title').val();
  var music_comment = $(".music_comment").val();
  var file = $('.music_file')[0].files[0];

  $('#music_title_error').empty();
  $('#music_comment_error').empty();
  $('#music_file_error').empty();

  if(file == null)
  {
    $('#music_file_error').append("ファイルを選択して下さい。");
    return;
  }

  $('#music_spiner').removeClass("d-none");

  var form = $('#music_form').get(0);
  var formData = new FormData(form);

  $.ajax({
  type: "POST",
  url: "/postMusic",
  dataType:"json",
  processData: false,
  contentType: false,
  headers:
  {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  data:formData})
  .done( (data) => {
          alert("投稿が完了しました。");
          $('#postFrom_close').click();
          location.reload();
          })
          // Ajaxリクエストが失敗した時発動
          .fail( (jqXHR, textStatus, errorThrown) => {
        
              var arr = jqXHR.responseJSON.errors;
           
              $.each(arr, function(index, value)
              {
                if(index == "music_title")
                {
                  $('#music_title_error').append(value);
                }

                if(index == "music_comment")
                {
                  $('#music_comment_error').append(value);
                }

                if(index == "music_file")
                {
                  $('#music_file_error').append(value);
                }
              });                 
          })
          // Ajaxリクエストが成功・失敗どちらでも発動
          .always( (data) => {
            $('#music_spiner').addClass("d-none");
          });
});

//  ファイルパス表示
$('.custom-file-input').on('change',function(){
  $(this).next('.custom-file-label').html($(this)[0].files[0].name);
});

/*
* 歌詞投稿
*/
$('#lyrics_button').click(function (e) {
  
  var form = $('#lyrics_form').get(0);
  var formData = new FormData(form);

  $('#lyrics_title_error').empty();
  $('#lyrics_comment_error').empty();
  $('#lyrics_contents_error').empty();

  $('#lyrics_spiner').removeClass("d-none");
 
  $.ajax({
  type: "POST",
  url: "/postLyrics",
  dataType:"json",
  processData: false,
  contentType: false,
  headers:
  {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  data:formData})
  .done( (data) => {
    alert("投稿が完了しました。");
    $('#postFrom_close').click();
    location.reload();
  })
  // Ajaxリクエストが失敗した時発動
  .fail( (jqXHR, textStatus, errorThrown) => {

      var arr = jqXHR.responseJSON.errors;
   
      $.each(arr, function(index, value)
      {
        if(index == "lyrics_title")
        {
          $('#lyrics_title_error').append(value);
        }

        if(index == "lyrics_comment")
        {
          $('#lyrics_comment_error').append(value);
        }

        if(index == "lyrics_contents")
        {
          $('#lyrics_contents_error').append(value);
        }
      });                 
  })
  // Ajaxリクエストが成功・失敗どちらでも発動
  .always( (data) => {
    $('#lyrics_spiner').addClass("d-none");
  });
});


/*
* リスト選択時
*/
$('.item_list').on('click','.item',function (e) {

  var id =  $(this).attr("id");
  if (id === undefined) 
  {
    return;
  }
  if(id === "detail"){return;}

  // baseUrl取得
  var getUrl = window.location;
  var url =  getUrl.origin +"/detaile/"+id;

  location.href = url;
});


/*
* コメント登録
*/
$('#comment_button').click(function (e) {
  
  var form = $('#comment_form').get(0);
  var formData = new FormData(form);

  $('#comment_error').empty();
  $('#comment_spinner').removeClass("d-none");
 
  $.ajax({
  type: "POST",
  url: "/postComment",
  dataType:"json",
  processData: false,
  contentType: false,
  headers:
  {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  data:formData})
  .done( (data) => {
    alert("投稿が完了しました。");
    $('#comment_close').click();
    location.reload();
  })
  // Ajaxリクエストが失敗した時発動
  .fail( (jqXHR, textStatus, errorThrown) => {

      var arr = jqXHR.responseJSON.errors;
   
      $.each(arr, function(index, value)
      {
        if(index == "comment")
        {
          $('#comment_error').append(value);
        }
      });
      alert("投稿できませんでした。");                        
  })
  // Ajaxリクエストが成功・失敗どちらでも発動
  .always( (data) => {
  $('#comment_spinner').addClass("d-none");
  });
});

/*
* プロフィール更新
*/
$('#profile_button').click(function (e) {
  
  var form = $('#profile_form').get(0);
  var formData = new FormData(form);

  $('#profile_name_error').empty();
  $('#profile_comment_error').empty();
  $('#profile_spiner').removeClass("d-none");
 
  $.ajax({
  type: "POST",
  url: "/postProfile",
  dataType:"json",
  processData: false,
  contentType: false,
  headers:
  {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
  data:formData})
  .done( (data) => {
    alert("変更が完了しました。");
    $('#profile_close').click();
    location.reload();
  })
  // Ajaxリクエストが失敗した時発動
  .fail( (jqXHR, textStatus, errorThrown) => {

      var arr = jqXHR.responseJSON.errors;
   
      $.each(arr, function(index, value)
      {
        if(index == "profile_name")
        {
          $('#profile_name_error').append(value);
        }

        if(index == "profile_comment")
        {
          $('#profile_comment_error').append(value);
        }
      });       
  })
  // Ajaxリクエストが成功・失敗どちらでも発動
  .always( (data) => {
    $('#profile_spiner').addClass("d-none");
  });
});

// プロフィール画像更新
$('#profile_img_button').on('change', function (e) {
  var reader = new FileReader();
  reader.onload = function (e) {
      $("#preview").attr('src', e.target.result);
  }
  reader.readAsDataURL(e.target.files[0]);
});
