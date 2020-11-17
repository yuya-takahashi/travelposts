@if (count($travelposts) > 0)
    <ul class="list-unstyled">
        @foreach ($travelposts as $travelpost)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $travelpost->user->name, ['user' => $travelpost->user->id]) !!}
                        <span class="text-muted">posted at {{ $travelpost->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <img src="{{ Storage::disk('s3')->url($travelpost->file) }}" alt="">
                        <p>{{ $travelpost->prefecture()->first()->prefecture }}</p>
                        <p>{{ $travelpost->comment }}</p>
                    </div>
                    <div>
                        @include('user_favorite.favorite_button')
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $travelposts->links() }}
@endif