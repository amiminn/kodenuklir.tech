@extends('layout.auth') @section('content')

<form action="/register" method="POST">
    <br>
    @csrf
    <input type="text" class="form-control mb-2" placeholder="name" name="name" value="{{ old('name') }}"
        autocomplete="off">
    <input type="text" class="form-control mb-2" placeholder="username" name="username" value="{{ old('username') }}"
        autocomplete="off">
    <input type="text" class="form-control mb-2" placeholder="password" name="password" autocomplete="off">
    <button class="btn btn-primary" type="submit">submit</button>
</form>
@endsection