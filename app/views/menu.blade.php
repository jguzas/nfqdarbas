@if (Auth::check())
    <a href="{{ URL::route("users/logout") }}">
        Atsijungti
    </a>
    <a href="/create">
        Sukurti albumą
    </a>

@else
    <a href="{{ URL::route("users/login") }}">
        Prisijungti
    </a>
@endif

