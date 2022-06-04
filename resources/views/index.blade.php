@extends('layout.main') @section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-sm-7 text-center">
            bau kaos-kaki
        </div>
        <div class="col-sm-5">
            <div class="card sdw bg-light">
                <div class="card-body">
                    <form>
                        <div class="form-outline mb-3">
                            <input type="text" id="link" class="form-control" autocomplete="off" />
                            <label class="form-label" for="link">
                                full link
                            </label>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-chevron-circle-down mb-3"></i>
                        </div>

                        <div class="form-outline">
                            <input type="text" id="srt" class="form-control" autocomplete="off" />
                            <label class="form-label" for="srt">
                                custom short link
                            </label>
                        </div>
                        <div class="mb-3">
                            <small id="resSrt" class="form-text text-muted"></small>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn sdw-btn bg-7">
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
            <h4>
                <div class="fa-brands fa-github"></div>
            </h4>
        </div>
    </div>
    <br />
    <div class="card sdw bg-7">
        <div class="card-header"> <i class="fa-solid fa-code"></i> simpel development</div>
        <div class="card-body">
            <h4>
                <div class="fa-brands fa-codepen"></div>
            </h4>
        </div>
    </div>
    <br />
</div>

@endsection @push('new-script')
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
            $("button").html(`<i class="fas fa-cog fa-spin"></i>`);

            $.post(url, {
                user: 'guest',
                link : link.val(),
                srt: srt.val(),
            }, (res, status)=>{
                $('#respon').removeAttr("hidden").before('<hr>')
                $("button").html("submit");
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