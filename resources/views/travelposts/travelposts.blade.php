@if (count($travelposts) > 0)
    <div class = "container">
        <div class = "row">
        @foreach ($travelposts as $travelpost)
            <div class = "col-md-4"> 
            
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {!! link_to_route('users.show', $travelpost->user->name, ['user' => $travelpost->user->id]) !!}
                        <span class="text-muted">posted at {{ $travelpost->created_at }}</span>
                    </div>
                    <div>
                        <img src="{{ Storage::disk('s3')->url($travelpost->file) }}" alt="" class="w-100">
                        <p>{{ $travelpost->prefecture()->first()->prefecture }}</p>
                        <p>{{ $travelpost->comment }}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $travelpost->user_id)
                            {!! Form::open(['route' => ['travelposts.destroy', $travelpost->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                        @include('user_favorite.favorite_button')
                    </div>
                </div>
            
            </div>    
        @endforeach                
        </div>
    </div>
    {{-- ページネーションのリンク --}}
    {{ $travelposts->links() }}
@endif




