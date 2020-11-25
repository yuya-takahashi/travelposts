@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-4">
            @include('users.card')
        </div>
    </div>
        <div>
            @include('users.navtabs')
            @include('travelposts.travelposts')
        </div>
@endsection