@extends('layouts.app')

@section('content')

    {!! Form::open(['route' => 'travelposts.store', 'files' => true]) !!}
        <h3>写真を選択</h3>
        <div class="form-group">
            {!! Form::file('file', null) !!}
        <h3>都道府県を選択</h3>    
            <select type="text" class="form-control" name="prefecture_id">                          
                @foreach(config('pref') as $key => $score)
                    <option value="{{$key}}">{{$score }}</option>
                @endforeach
            </select>
        <h3>コメント</h3>
            {!! Form::textarea('comment', old('comment'), ['class' => 'form-control', 'rows' => '2']) !!}<br>
            {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) !!}
        </div>
    {!! Form::close() !!}

@endsection