@extends('layout.main') @section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-sm-7 text-center">
            kaos-kaki
        </div>
        <div class="col-sm-5">
            <div class="card sdw bg-light">
                <div class="card-body">
                    <form>
                        <div class="form-outline mb-3">
                            <input type="text" id="srt" class="form-control" autocomplete="off" />
                            <label class="form-label" for="srt">
                                u'r full link
                            </label>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-chevron-circle-down mb-3"></i>
                        </div>

                        <div class="form-outline">
                            <input type="text" id="link" class="form-control" autocomplete="off" />
                            <label class="form-label" for="link">
                                u'r custom short link
                            </label>
                        </div>
                        <div class="mb-3">
                            <small id="reslink" class="form-text text-muted"></small>
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
        <div class="card-header">cara kerja</div>
        <div class="card-body">
            <h4>
                <div class="fa-brands fa-github"></div>
            </h4>
        </div>
    </div>
    <br />
    <div class="card sdw bg-7">
        <div class="card-header">simpel development</div>
        <div class="card-body">
            <h4>
                <div class="fa-brands fa-github"></div>
            </h4>
        </div>
    </div>
    <br />
</div>

@endsection @push('new-script')
<script>
    $(document).ready(() => {
        const link = $('#link')
        const srt = $('#srt')

        function realTime(){
            link.keyup(()=>{
                $('#reslink').html(`{{ env('APP_URL') }}/e-${link.val()}` )
            })
        }
        realTime()

        $("a").click((event) => {
            event.preventDefault();
            alert('jangan diklik!')
        });

        $("form").submit((event) => {
            event.preventDefault();
            $("button").html("...");
            setTimeout(() => {
                $("button").html("submit");
                $('#respon').removeAttr("hidden").before('<hr>')
            }, 4000);
        });
    });
</script>
@endpush