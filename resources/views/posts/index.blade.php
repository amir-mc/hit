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
                    image
                </th>
                <th>
                    title
                </th>
                </thead>

                <tbody>

                    @foreach($post as $pos)
                       <tr>
                           <td>
                               <img src="{{asset($pos->image)}}" alt="">

                           </td>
                           <td>  {{$pos->title}}</td>
                           <td><a href="" class="btn btn-info">edit</a></td>
                           <td><a href="" class="btn btn-warning">delete</a></td>

                       </tr>
                        @endforeach

                </tbody>
@endsection
