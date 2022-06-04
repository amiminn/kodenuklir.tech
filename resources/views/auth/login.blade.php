login

@if (session()->has('loginErr'))
    <div style="color: red">
        {{ session('loginErr') }}
    </div>
@endif

<form action="/login" method="post">
    @csrf

    @error('username')
{{ $message }}
    @enderror
    <br>
    <input type="text" name="username" value="{{ old('username') }}" autocomplete="off">
    <input type="text" name="password" autocomplete="off">
    <button type="submit">submit</button>
</form>