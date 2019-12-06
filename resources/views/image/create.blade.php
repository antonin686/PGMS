@extends('layout')

@section('content')


<div class="card">

    <div class="card-header bg-secondary text-white">
        Add An Image
    </div>

    <div class="card-body">
        <div class="input-group mb-3">
            <select class="custom-select" id="cat">
                <option value="#">Select Catagory...</option>
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
                <option value="#">Select Sub-Catagory...</option>
                @foreach($sub as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
                @endforeach

            </select>
            <div class="input-group-append">
                <label class="input-group-text" for="sub">Sub-Catagory</label>
            </div>
        </div>

        <form action="/image/store" class="dropzone" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="catagory" id="catagory">
            <input type="hidden" name="subCatagory" id="subCatagory">
            @csrf
        </form>
    </div>
</div>



<script>
$(document).ready(function() {

    $("#cat").change(function() {
        var value = $("#cat").val();
        $("#catagory").val(value);
    });

    $("#sub").change(function() {
        var value = $("#sub").val();
        $("#subCatagory").val(value);
    });

});
</script>

@endsection