@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="col-sm-8">
            <div class="col-sm-8">
                {{-- 投稿一覧 --}}
                @include('travelposts.travelposts')
            </div>
        </div>
    @else
        @include('auth.login')
    @endif
@endsection