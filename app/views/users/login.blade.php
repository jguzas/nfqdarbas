@extends("layout")
@section("content")

@if ($error = $errors->first("password"))
    <div class="error">
        {{ $error }}
    </div>
@endif

    {{ Form::open([
        "route"        => "users/login",
        "autocomplete" => "off"
    ]) }}
    {{ Form::label("username", "Username") }}
    {{ Form::text("username", Input::old("username"), [
    "placeholder" => "username"
    ]) }}
    {{ Form::label("password", "Password") }}
    {{ Form::password("password", [
    "placeholder" => "●●●●●●●●●●"
    ]) }}
       {{ Form::submit("login") }}
    {{ Form::close() }}
@stop