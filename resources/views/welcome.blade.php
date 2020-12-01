@extends('layouts.app')

@section('content')
    @if (Auth::check())
        
        <img src="{{ $image_rand }}" alt="" width="100%", height="600">
        <div class = "container">
            <div class = "row">
                <div class = "col-md-4">
                <h3>都道府県を選択</h3>  
                <form action="{{ route("travelposts.index") }}" method="GET">
                    <select type="text" class="form-control" name="prefecture_id">                          
                        @foreach(config('pref') as $key => $score)
                            <option value="{{$key}}">{{$score }}</option>
                        @endforeach
                    </select>
                        <input type="submit" value="検索">
                </form>
                </div>
            </div>
        </div>
                
        <div>
            {{-- 投稿一覧 --}}
            @include('travelposts.travelposts')
        </div>
    @else
        @include('auth.login')
    @endif
@endsection