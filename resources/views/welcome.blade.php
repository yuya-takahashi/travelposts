@extends('layouts.app')

@section('content')
    @if (Auth::check())
        
            <div class = "container">
                <div class = "row">
                    <div class = "offset-md-5 col-md-2">
                    <h2>都道府県を選択</h2>  
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
        </div>
            <br />
                
        <div>
            {{-- 投稿一覧 --}}
            @include('travelposts.travelposts')
        </div>
    @else
        @include('auth.login')
    @endif
@endsection