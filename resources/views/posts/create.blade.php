@extends('layouts.app')
@section('content')

    <div class="card card-default">
    <div class="card-header">
        {{isset($posts)? 'edit':'creat'}}
    </div>

    <div class="card-body">

        @include('partials.error')




        <form action="{{isset($posts)?route('posts.update',$posts->id):route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            @if(isset($posts))
                @method('PUT')

            @endif
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" name="title" id="title" value=" {{isset($posts)? $posts->title:''}}">
        </div>
            <div class="form-group">
            <label for="dis">description</label>
                <textarea name="dis" id="dis" cols="5" rows="5" class="form-control"  >{{isset($posts)? $posts->dis:''}}</textarea>
        </div>
            <div class="form-group">
            <label for="contents">Contents</label>
                <input id="content" type="hidden" name="content">
{{--                <trix-editor id="contents"  input="content"> </trix-editor>--}}
                <textarea name="contents" placeholder="dis" id="contents"  cols="5" rows="5" class="form-control" > {{isset($posts)? $posts->contents:''}}</textarea>


            </div>

            <div class="form-group">
                <label for="category">category</label>
                <select name="category" class="form-control" id="category">
                   @foreach($categorys as $Category)
                    <option value="{{$Category->id}}"

                            @if(isset($posts))

                            @if($Category->id == $posts->category_id)
                            selected
                        @endif

                        @endif

                    >
                        {{$Category->name}}
                    </option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <label for="publish_at">Publish at</label>
                <input type="date" class="form-control" name="publish_at" id="publish_at"   value="{{isset($posts)? $posts->publish_at:''}}" >
            </div>


{{--            <div class="form-group"> <!-- Date input -->--}}

{{--                <label for="publish_at">Date Of Birth</label>--}}
{{--                <input type="date" name="publish_at" id="publish_at" value="">--}}
{{--            </div>--}}
            @if(isset($posts))
            <div class="form-group">
                <img src="{{asset($posts->image)}}">
            </div>

@endif

            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success">{{isset($posts)?'edit':'publish Post'}}</button>
            </div>
        </form>
    </div>
    </div>


@endsection

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>


<script>
   // flatpickr('#publish_at')
</script>


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

