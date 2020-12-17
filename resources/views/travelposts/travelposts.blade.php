@if ($travelposts->count() > 0)
    <div class = "container">
        <div class = "row">
        @foreach ($travelposts as $travelpost)
            <div class = "col-md-4">
                <div class="post">
                    <div class="card" style="width: 100%;">
                        <img class="card-img-top" src="{{ Storage::disk('s3')->url($travelpost->file) }}" alt="Card image cap" style="width: 100%; height: 250px;">
                        <div class="card-body">
                            
                            <div class="media-body">
                                
                                <div class="d-flex justify-content-between">
                                    <p>{{ $travelpost->prefecture()->first()->prefecture }}</p>
                                    @if (Auth::id() == $travelpost->user_id)
                                        {!! Form::open(['route' => ['travelposts.destroy', $travelpost->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </div>
                                    <p>{{ $travelpost->comment }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <img src="{{ Storage::disk('s3')->url($travelpost->user->profile_image) }}" id="img" class="rounded-circle" width="60", height="60"> 
                                        {!! link_to_route('users.show', $travelpost->user->name, ['user' => $travelpost->user->id]) !!}
                                    </div>
                                    @include('user_favorite.favorite_button')
                                </div>
                                <div class="text-muted">{{ $travelpost->created_at }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        @endforeach                
        </div>
    </div>
    {{-- ページネーションのリンク --}}
    {{ $travelposts->links() }}
    </div>
@endif

                            

                            
                           