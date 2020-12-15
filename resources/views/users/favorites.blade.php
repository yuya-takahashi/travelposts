@extends('layouts.app')

@section('content')
    <div class = "container">
        <div class = "row">
            <div class = "offset-md-1 col-md-3">
                <table>
                    <tr>
                        <td><img src="{{ asset('storage/profiles/'.$user->profile_image) }}" id="img" class="rounded-circle" width="200", height="200"></td>
                    </tr>    
                    <tr>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                </table>
            </div>
            <div class = "col-md-5">
                <div class="card">
                  <div class="card-body" style="width: 100%; height: 200px;">
                    {{ $user->comment }}
                  </div>
                </div>
            </div>
            <div class = "col-md-2">
                @if (Auth::id() === $user->id)
                    {!! link_to_route('users.edit', 'プロフィール編集', ['user' => $user->id], ['class' => 'btn btn-light']) !!}
                @endif
            </div>
        </div>
    </div>
<br />
    <div class = "container">
        <div class = "row">
            <div class = "col-md-12">
                @include('users.navtabs')
                @include('travelposts.travelposts')
            </div>
        </div>
    </div>
@endsection