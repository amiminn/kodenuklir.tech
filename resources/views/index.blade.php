@extends('layout.main') @section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-md-7 text-center">
            <b>kaos-kaki</b>
        </div>
        <div class="col-md-5">
            <div class="card sdw">
                <div class="card-body">
                    <form>
                        <div class="md-form md-outline">
                            <input type="text" id="link" class="form-control" autocomplete="off" />
                            <label for="link">full link</label>
                        </div>

                        <div class="text-center">
                            <i class="fas fa-chevron-circle-down"></i>
                        </div>

                        <div class="md-form md-outline">
                            <input type="text" id="srt" class="form-control" autocomplete="off" />
                            <label for="srt">custom short link</label>
                            <small id="resSrt" class="form-text text-muted"></small>
                        </div>


                        <div class="text-center">
                            <button id="subLink" type="submit" class="btn sdw-btn bg-7">
                                submit
                            </button>
                        </div>
                    </form>


                    {{-- callback response --}}
                    <div hidden id="respon" class="alert alert-success " role="alert-link ">
                        <div class="status"></div>
                        <div class="open">Open link : <a target="blank" id="trgt"></a></div>
                    </div>
                    {{-- callback response --}}

                </div>
            </div>
        </div>
    </div>
    <br />
    <div class="card sdw bg-8">
        <div class="card-header"> <i class="fas fa-cogs"></i> cara kerja</div>
        <div class="card-body">

            <div class="row">
                <div class="col-sm-5 text-center mb-4">
                    <img src="{{ asset('/img/index/c1.png') }}" style="width: 300px" class="sdw" alt="cara">
                </div>
                <div class="col-sm-7">
                    <ol>
                        <li> Form isian link(tujuan) yang akan di perpendek.</li>
                        <li> Shortlink yang akan dipakai nantinya.</li>
                        <li> Respon dan status yang akan didapat ketika submit form.</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>
    <br />
    <div class="card sdw bg-7">
        <div class="card-header"> <i class="fa-solid fa-code"></i> simpel development</div>
        <div class="card-body overflow-auto">
            <p>1. Set Route</p>
            <div class="overflow-auto">
                <img src="{{ asset('/img/index/d1.png') }}" class="sdw mb-3 " style="height: 160px" alt="route">
            </div>
            <hr>
            <p>2. Controller</p>
            <div class="overflow-auto">
                <img src="{{ asset('/img/index/d2.png') }}" class="sdw " style="height: 220px" alt="controller">
            </div>
        </div>
    </div>
    <br />
</div>

@endsection
@push('new-script')
<script>
    $(document).ready(() => {
        // all variable
        const link = $('#link')
        const srt = $('#srt')
        const url = `{{ env('APP_URL') }}:8000/api/srt`

        // function call
        realTime()

        function realTime(){
            srt.keyup(()=>{
                $('#resSrt').html(`{{ env('APP_URL') }}:8000/e-${srt.val()}` )
            })
        }
        
        $("form").submit((event) => {
            event.preventDefault();
            $("#subLink").html(`<i class="fas fa-cog fa-spin"></i>`);

            $.post(url, {
                user: 'guest',
                link : link.val(),
                srt: srt.val(),
            }, (res, status)=>{
                $('#respon').removeAttr("hidden").before('<hr>')
                $("#subLink").html("submit");
                $('.status').html(`status : ${status}`)
                console.log(res);
                const hasil = `{{ env('APP_URL') }}:8000/e-${res.data.srt}`
                $('#trgt').html(`<i class="fa-solid fa-arrow-up-right-from-square"></i> ${hasil}`).attr('href', `${hasil}`)

                console.log(status);
            })
        });
    });
</script>
@endpush