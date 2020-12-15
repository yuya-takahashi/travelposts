@extends('layouts.app')

@section('content')
<br />
    <div class = "container">
      <div class = "row">
        <div class = "col-md-4"> 
          <form method="post" action="{{ route('users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
          
            <label for="profile_image">プロフィール画像</label></br>
          
            <label for="profile_image" class="btn">
              <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" id="img" class="rounded-circle" width="250", height="250"></br>
              <input id="profile_image" type="file"  name="profile_image" onchange="previewImage(this);">
            </label>
        </div>
        <div class = "offset-md-1 col-md-5"> 
              <label>コメント編集<textarea rows="10" cols="60" class="form-control" name="comment" required>{{ $user->comment }}</textarea></label>
        </div>
        <div class = "col-md-2">
            <button type="submit" class="btn btn-primary" style="position: absolute; right: 200px; bottom: 0px"/>
              変更
            </button>
        </div>
          </form>
      </div>
    </div>
          
          <script>
            function previewImage(obj)
            {
              var fileReader = new FileReader();
              fileReader.onload = (function() {
                document.getElementById('img').src = fileReader.result;
              });
              fileReader.readAsDataURL(obj.files[0]);
            }
          </script>
        
@endsection