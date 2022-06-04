register

<br>

<form action="/register" method="POST">
    <br>
    @csrf
    <input type="text" name="name" value="{{ old('name') }}" autocomplete="off">
    <input type="text" name="username" value="{{ old('username') }}" autocomplete="off">
    <input type="text" name="password" autocomplete="off">
    <button type="submit">submit</button>
</form>