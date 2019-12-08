@extends('layout')

@section('content')


<div class="card">

    <div class="card-header bg-secondary text-white">
        Add Image(s)
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="input-group mb-3">
                    <select class="custom-select" id="cat">

                        @foreach($cata as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach

                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="cat">Catagory</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <select class="custom-select" id="sub">

                        @foreach($sub as $s)
                        <option name="{{$s->c_id}}" value="{{$s->id}}">{{$s->name}}</option>
                        @endforeach

                    </select>
                    <div class="input-group-append">
                        <label class="input-group-text" for="sub">Sub-Catagory</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <form action="/image/store" class="dropzone" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="" name="catagory" id="catagory">
                    <input type="hidden" value="" name="subCatagory" id="subCatagory">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function() {

    init();

    $("#cat").change(function() {
        var value = $("#cat").val();
        $("#catagory").val(value);

        $("#sub option").each(function() {
            var name = $(this).attr('name');
            if (name != value) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });

    });

    $("#sub").change(function() {
        var value = $("#sub").val();
        $("#subCatagory").val(value);
    });

    function init() {
        $("#catagory").val($("#cat").val());
        $("#subCatagory").val($("#sub").val());
        var value = $("#cat").val();

        $("#sub option").each(function() {
            var name = $(this).attr('name');
            if (name != value) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    }

});
</script>

@endsection