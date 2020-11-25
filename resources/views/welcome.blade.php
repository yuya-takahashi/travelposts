@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div>
            <div>
                {{-- 投稿一覧 --}}
                @include('travelposts.travelposts')
            </div>
        </div>
    @else
        @include('auth.login')
    @endif
@endsection