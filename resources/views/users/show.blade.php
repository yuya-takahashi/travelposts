@extends('layouts.app')

@section('content')
    <div class = "container">
    <div class = "row">
        <div class = "col-md-4">
              <img src="https://i1.wp.com/madame-voyage.com/wp-content/uploads/2016/04/IMGP0083-e1460728861184.jpg?fit=1024%2C1024&ssl=1" alt="..." class="rounded-circle" width="200" height="200">
        </div>
        <div class = "col-md-8">
            
        </div>
    </div>
        <div>
            @include('users.navtabs')
            @include('travelposts.travelposts')
        </div>
@endsection

