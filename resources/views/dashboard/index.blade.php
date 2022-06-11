@extends('layout.main') @section('content')
<div class="container">
    <h1>Dashboard</h1>

    <br />

    <h1>Hello {{ auth()->user()->name }}</h1>

    <form id="#formOut" action="/logout" method="POST">
        @csrf
        <button type="submit" id="btnOut" class="btn btn-danger mb-2">
            <i class="fa-solid fa-right-from-bracket"></i>
            log out
        </button>
    </form>
    @if (auth()->user()->name == 'kochengpoi')
    <button id="reset" class="btn btn-danger mb-2">reset</button>
    <button
        type="button"
        class="btn btn-warning"
        data-toggle="modal"
        data-target="#Modal"
    >
        cek
    </button>
    @endif

    <br />
    <div class="card sdw col-sm-6">
        <div class="card-body">
            <table class="chat"></table>
            <hr />
            <form id="formChat">
                <input
                    type="text"
                    class="form-control mb-2"
                    id="isiChat"
                    autocomplete="off"
                />
                <button type="submit" class="btn btn-primary" id="btnSub">
                    submit
                </button>
            </form>
        </div>
    </div>
    <br /><br /><br />

    <!-- Central Modal Medium Warning -->
    <div
        class="modal fade"
        id="Modal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog modal-notify modal-warning" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="heading lead">Data Link</p>

                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                    >
                        <span aria-hidden="true" class="white-text"
                            >&times;</span
                        >
                    </button>
                </div>
                <div class="modal-body overflow-auto">
                    <table class="table">
                        <thead class="grey lighten-2">
                            <tr>
                                <th>id</th>
                                <th>user</th>
                                <th>raw</th>
                                <th>link</th>
                            </tr>
                        </thead>
                        <tbody class="tbl-link"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- MOdal-->
</div>
@endsection @push('new-script')

<script>
    $(document).ready(() => {
        function getChat() {
            $.get("http://127.0.0.1:8000/api/chat", (res) => {
                let isi = "";

                res.data.map((c) => {
                    isi += `<tr><td>${c.user}</td><td> : ${c.text}</td></tr>`;
                });

                $(".chat").html(isi);
            });
        }

        function postChat() {
            $("#formChat").submit((event) => {
                event.preventDefault();
                $("#btnSub").html("...");
                $.post(
                    "http://127.0.0.1:8000/api/chat",
                    {
                        user: "{{ auth()->user()->name }}",
                        text: $("#isiChat").val(),
                    },
                    (res) => {
                        getChat();
                        $("#btnSub").html("submit");
                        $("#isiChat").val("");
                    }
                );
            });
        }

        $("#reset").click(() => {
            $("#reset").html("...");
            $.get("http://127.0.0.1:8000/api/chat/reset", () => {
                getChat();
                $("#reset").html("reset");
            });
        });

        function getLink() {
            $.get("http://127.0.0.1:8000/api/srt", (res) => {
                let isi = "";

                res.data.map((c) => {
                    isi += `<tr><td>${c.id}</td><td>${c.user}</td><td><a href="${c.link}" class="btn btn-primary btn-sm" target="blank">go</a></td><td>${c.link}</td></tr>`;
                });

                $(".tbl-link").html(isi);
            });
        }

        $("#btnOut").click(() => $("#btnOut").html("..."));

        getLink();
        getChat();
        postChat();
    });
</script>
@endpush
