@extends('layouts.app')
@section('content')
    <a href="{{route('posts.create')}}" class="btn btn-info my-2">add post</a>
    <div class="card card-default">
        <div class="card-header">
            post

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <th>

                </th>
                <th>

                </th>
                </thead>
                <tbody>
@endsection
