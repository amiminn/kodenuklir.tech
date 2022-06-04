<h1>Dashboard</h1>

<br>

<h1>Hello {{ auth()->user()->name }}</h1>

<form action="/logout" method="POST">
    @csrf
<button type="submit">logout</button>
</form>