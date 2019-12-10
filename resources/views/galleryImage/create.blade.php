@extends('layout')

@section('content')

<div class="card">
    <div class="card-header bg-secondary text-white">
        Select Images for Gallery
    </div>
    <div class="card-body">
        <form method="post">
            @csrf
            <div class="input-group mb-3">
                <select class="custom-select" name="layout">

                    @foreach($layouts as $l)
                    <option value="{{$l->id}}">{{$l->name}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="cat">Options</label>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">
                    Image List
                </div>
                <div class="card-body">
                    <div class="col">
                        @foreach($datas as $data)
                        <div class="card">
                            <div class="card-header">{{$data['cata_name']}}</div>
                            <div class="card-body">
                                <div class="col">
                                    @foreach($data['sub_data'] as $sub)
                                    <div class="card mt-3">
                                        <div class="card-header">{{$sub['sub_name']}}</div>
                                        <div class="card-body">
                                            <div class="row">
                                                @foreach($sub['data'] as $img)
                                                <div class="col-md-3 mb-3">

                                                    <div class=" text-center">
                                                        <label class="image-checkbox">
                                                            <img width="300" height="300" class=" img-responsive"
                                                                src="/{{$img->path}}" />
                                                            <input type="checkbox" name="images[]"
                                                                value="{{$img->id}}" />
                                                        </label>
                                                    </div>

                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

            <div class="card-footer">
                <input type="submit" class="btn btn-primary" value="Add to Layout">
            </div>

    </div>
    </form>

</div>

</div>

<script>
$(document).ready(() => {
    $(".image-checkbox").each(function() {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
        } else {
            $(this).removeClass('image-checkbox-checked');
        }
    });

    // sync the state to the input
    $(".image-checkbox").on("click", function(e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked", !$checkbox.prop("checked"))

        e.preventDefault();
    });

});
</script>
@endsection