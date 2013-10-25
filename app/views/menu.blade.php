@if (Auth::check())
    <a href="{{ URL::route("users/logout") }}">
        logout
    </a>
    <div class="username">
        {{ $username }}
    </div>
@else
    <a href="{{ URL::route("users/login") }}">
        login
    </a>
@endif

