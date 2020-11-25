    @if (Auth::user()->is_favoriting($travelpost->id))
        {!! Form::open(['route' => ['travelposts.unfavorite', $travelpost->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-xs"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(['route' => ['travelposts.favorite', $travelpost->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-xs"]) !!}
        {!! Form::close() !!}
    @endif