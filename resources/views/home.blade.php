@extends('layout')

@section('content')

<div class="card">
    <div class="card-header bg-secondary text-light">Home</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">API KEY</span>
                    </div>
                    <input readonly value="{{$api->key}}" type="text" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">

                </div>
            </div>

            <div class="col-md-8 mx-auto">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Path</span>
                    </div>
                    <input readonly  id="myInput" value="{{$api->path}}" type="text" class="form-control"
                        aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    <div class="input-group-append">

                        <button id="btn-copy" class="btn btn-outline-secondary" data-toggle="tooltip" data-placement="top"
                            title="Copy to clipboard" onclick="myFunction()" onmouseout="outFunc()" type="button"
                            id="button-addon2">
                            Copy</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()

    $('#btn-copy').click((e) =>{
        console.log($('#btn-copy').attr('id'))
    });
})

function myFunction() {
    var copyText = document.getElementById("myInput");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    
    
}

function outFunc() {
    var tooltip = document.getElementById("myTooltip");
    tooltip.innerHTML = "Copy to clipboard";
}
</script>
@endsection