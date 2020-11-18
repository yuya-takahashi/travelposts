<ul class="nav nav-tabs nav-justified mb-3">
    <li class="nav-item">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            投稿一覧
        </a>
    </li>
    
    <li class="nav-item">
        <a href="{{ route('users.favoritings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.favoritings') ? 'active' : '' }}">
            お気に入り一覧
        </a>
    </li>
</ul>