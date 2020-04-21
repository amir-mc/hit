@extends('layouts.app')
@section('content')

    <div class="card card-default">
    <div class="card-header">
        post
    </div>

    <div class="card-body">

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="card alert-danger">
                    {{$error}}
                </div>
            @endforeach

        @endif



        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>

            <div class="form-group">
            <label for="dis">description</label>
                <textarea name="dis" id="dis" cols="5" rows="5" class="form-control"></textarea>

        </div>
            <div class="form-group">
            <label for="contents">Contents</label>
                <textarea name="contents" id="contents" cols="5" rows="5" class="form-control"></textarea>

        </div>

            <div class="form-group">
                <label for="publish_at">Publish at</label>
                <input type="text" class="form-control" name="publish_at" id="publish_at">
            </div>
            <div class="form-group">
                <label for="image">image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-success">publish Post</button>
            </div>
        </form>
    </div>
    </div>
@endsection


