@extends('layout.auth') @section('content')


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
    <div class="md-form md-outline">
        <input type="text" class="form-control" name="username" value="{{ old('username') }}" autocomplete="off">
        <label for="form1">username</label>
    </div>
    <div class="md-form md-outline">
        <input type="password" class="form-control mb-2" name="password" value="mimin" autocomplete="off">
        <label for="form1">password</label>
    </div>



    <button type="submit" id="btnLogin" class="btn btn-primary">submit</button>
</form>

@endsection

@push('new-script')
<script>
    $('#btnLogin').click(()=>$('#btnLogin').html('...'))
</script>
@endpush